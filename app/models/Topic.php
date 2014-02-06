<?php

class Topic extends Eloquent {

    protected $table = 'time_bbs';
    protected $primaryKey = 'rid';
    public $timestamps = false;

    public function problem() {
        return $this->belongsTo('Problem', 'pid', 'pid');
    }

    public function discusses() {
        return $this->hasMany('Discuss', 'rid', 'rid');
    }
}

