<?php

class ContestClarify extends Eloquent {

    protected $table = 'contest_clarify';
    protected $primaryKey = 'ccid';
    public $timestamps = false;

    public function user() {
        return $this->belongsTo('User', 'username', 'username');
    }

    public function contest() {
        return $this->belongsTo('Contest', 'cid', 'cid');
    }


}

