<?php

class Problem extends Eloquent {

    protected $table = 'problem';
    protected $primaryKey = 'pid';
    public $timestamps = false;

    public function ojinfo() {
        return $this->hasOne('OJInfo', 'vname', 'name');
    }

    public function problemCategories() {
        return $this->hasMany('ProblemCategory', 'pid', 'pid');
    }

}

