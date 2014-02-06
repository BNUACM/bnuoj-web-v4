<?php

class ReplayStatus extends Eloquent {

    protected $table = 'replay_status';
    protected $primaryKey = 'runid';
    public $timestamps = false;

    public function contest() {
        return $this->belongsTo('Contest', 'contest_belong', 'cid');
    }

}

