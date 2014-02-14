<?php

class Status extends Eloquent {

    protected $table = 'status';
    protected $primaryKey = 'runid';
    public $timestamps = false;

    // add for eager loading relations
    public function contest() {
        return $this->belongsTo('Contest', 'contest_belong', 'cid');
    }

    public function user() {
        return $this->belongsTo('User', 'username', 'username');
    }

    public function languageName() {
        return $this->hasOne('LanguageName', 'id', 'language');
    }

    // add scopes
    public function scopeAccepted($query) {
        return $query->whereResult('Accepted');
    }

    public function scopePublic($query) {
        return $query->leftJoin('contest', 'status.contest_belong', '=', 'contest.cid')->whereRaw('(contest_belong = 0 OR end_time<NOW())');
        // return $query->whereRaw('(contest_belong = 0 OR contest_belong IN (SELECT cid FROM contest WHERE end_time<NOW()))');
    }

    // add custom attributes
    public function getViewableAttribute() {
        if (Auth::check() && (
                Auth::user()->is_admin ||
                strcasecmp(Auth::user()->username, $this->username) == 0 ||
                ($this->isshared == 1 && (
                    $this->contest_belong == 0 || $this->contest->is_ended
                 ))
            )) {
            return true;
        }
        return false;
    }

}

