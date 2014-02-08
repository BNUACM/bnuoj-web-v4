<?php

class Contest extends Eloquent {

    protected $table = 'contest';
    protected $primaryKey = 'cid';
    public $timestamps = false;

    protected $hidden = array('password', 'allp');
    protected $appends = array('is_running', 'final_time');

    // add for eager loading relations
    public function statuses() {
        return $this->hasMany('Status', 'contest_belong', 'cid');
    }

    public function replayStatuses() {
        return $this->hasMany('ReplayStatus', 'contest_belong', 'cid');
    }

    public function users() {
        return $this->hasManyThrough('User', 'ContestUser', 'cid', 'username');
    }

    public function contestClarifies() {
        return $this->hasMany('ContestClarify', 'cid', 'cid');
    }

    public function contestProblems() {
        return $this->hasMany('ContestProblem', 'cid', 'cid');
    }

    public function challenges() {
        return $this->hasMany('Challenge', 'cid', 'cid');
    }

    // add custom attributes
    public function getIsChallengingAttribute() {
        if ($this->hasCha) return false;
        return time() > strtotime($this->attributes["challenge_start_time"]) && time() < strtotime($this->attributes["challenge_end_time"]);
    }

    public function getIsCodingAttribute() {
        if ($this->hasCha) return false;
        return time() > strtotime($this->attributes["start_time"]) && time() < strtotime($this->attributes["end_time"]);
    }

    public function getIsIntermissionAttribute() {
        if ($this->hasCha) return false;
        return time() > strtotime($this->attributes["end_time"]) && time() < strtotime($this->attributes["challenge_start_time"]);
    }

    public function getIsRunningAttribute() {
        if ($this->hasCha) return $this->isCoding || $this->isIntermission || $this->isChallenging;
        return $this->isCoding;
    }

    public function getFinalTimeAttribute() {
        if ($this->hasCha) return $this->attributes["challenge_end_time"];
        return $this->attributes["end_time"];
    }

    public function getReportAttribute($value) {
        if ($this->isRunning) return "";
        return $value;
    }    

    // add scopes
    public function scopeStandard($query) {
        return $query->whereIsvirtual(0);
    }

    public function scopeVirtual($query) {
        return $query->whereIsvirtual(1);
    }

    public function scopeRunning($query) {
        return $query->whereRaw('
            start_time < NOW() AND
            (
                end_time > NOW() OR
                (
                    has_cha = 1 AND
                    challenge_end_time > NOW()
                )
            )
        ');
    }

    public function scopeScheduled($query) {
        return $query->whereRaw('start_time > NOW()');
    }

}

