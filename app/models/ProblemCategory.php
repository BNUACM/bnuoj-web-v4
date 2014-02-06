<?php

class ProblemCategory extends Eloquent {

    protected $table = 'problem_category';
    protected $primaryKey = 'pcid';
    public $timestamps = false;

    public function problem() {
        return $this->belongsTo('Problem', 'pid', 'pid');
    }

    public function category() {
        return $this->belongsTo('Category', 'catid', 'id');
    }
}

