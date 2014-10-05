<?php 

use \Illuminate\Database\Eloquent\ModelNotFoundException;

class Profile extends Eloquent {

     protected $table = 'user_profiles';
     public $timestamps = true;

     public function funds()
     {
     	return $this->hasMany('Fund', 'user_profile_id');
     }

     public function projects()
     {
     	return $this->hasMany('Project', 'user_id');
     }

}