<?php

class Message extends Eloquent {

    protected $table = 'mail';
    protected $primaryKey = 'mailid';
    public $timestamps = false;

    public function sendUser() {
        return $this->belongsTo('User', 'sender', 'username');
    }

    public function receiveUser() {
        return $this->belongsTo('User', 'reciever', 'username');
    }

}

