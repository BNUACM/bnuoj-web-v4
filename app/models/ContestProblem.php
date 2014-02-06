<?php

class ContestProblem extends Eloquent {

    protected $table = 'contest_problem';
    protected $primaryKey = 'cpid';
    public $timestamps = false;

    public function label() {
        return $this->lable;
    }

    public function problem() {
        return $this->hasOne('Problem', 'pid', 'pid');
    }

    public function contest() {
        return $this->belongsTo('Contest', 'cid', 'cid');
    }

}

