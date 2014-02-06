<?php

class Usertag extends Eloquent {

    protected $table = 'usertag';
    public $timestamps = false;

    public function user() {
        return $this->belongsTo('User', 'username', 'username');
    }
}

