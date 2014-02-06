<?php

class Challenge extends Eloquent {

    protected $table = 'challenge';
    protected $primaryKey = 'cha_id';
    public $timestamps = false;

    public function contest() {
        return $this->belongsTo('Contest', 'cid', 'cid');
    }

    public function user() {
        return $this->belongsTo('User', 'username', 'username');
    }
}

