<?php

class Contest extends Eloquent {

    protected $table = 'contest';
    protected $primaryKey = 'cid';
    public $timestamps = false;

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

}

