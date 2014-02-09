<?php

class Status extends Eloquent {

    protected $table = 'status';
    protected $primaryKey = 'runid';
    public $timestamps = false;

    // add for eager loading relations
    public function contest() {
        return $this->belongsTo('Contest', 'contest_belong', 'cid');
    }

    public function user() {
        return $this->belongsTo('User', 'username', 'username');
    }

    // add scopes
    public function scopeAccepted($query) {
        return $query->whereResult('Accepted');
    }
}

