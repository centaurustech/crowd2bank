<?php 

use \Illuminate\Database\Eloquent\ModelNotFoundException;

class Project extends Eloquent {

     protected $table = 'projects';
     public $timestamps = true;

     public function funds()
     {
     	return $this->hasMany('Fund', 'project_id');
     }

    public function profiles()
    {
        return $this->belongsTo('Profile', 'user_id');
    }

}