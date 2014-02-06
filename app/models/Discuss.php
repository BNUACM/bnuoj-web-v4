<?php

class Discuss extends Eloquent {

    protected $table = 'discuss';
    public $timestamps = false;

    public function user() {
        $this->belongsTo('User', 'uname', 'username');
    }

    public function topic() {
        $this->belongsTo('Topic', 'rid', 'rid');
    }

}

