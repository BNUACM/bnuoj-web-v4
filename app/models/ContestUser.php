<?php

class ContestUser extends Eloquent {

    protected $table = 'contest_user';
    protected $primaryKey = 'cuid';
    public $timestamps = false;

    public function contest() {
        return $this->belongsTo('Contest', 'cid', 'cid');
    }

    public function user() {
        return $this->hasOne('User', 'username', 'username');
    }

}

