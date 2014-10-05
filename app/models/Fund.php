<?php 

use \Illuminate\Database\Eloquent\ModelNotFoundException;

class Fund extends Eloquent {

     protected $table = 'funds';
     public $timestamps = true;

    public function projects()
    {
        return $this->belongsTo('Project', 'project_id');
    }

    public function profiles()
    {
        return $this->belongsTo('Profile', 'user_profile_id');
    }
}