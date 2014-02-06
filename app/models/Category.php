<?php

class Category extends Eloquent {

    protected $table = 'category';
    public $timestamps = false;

    public function problems() {
        return $this->hasManyThrough('Problem', 'ProblemCategory', 'catid', 'pid');
    }
}

