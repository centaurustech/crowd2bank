<?php 

use \Illuminate\Database\Eloquent\ModelNotFoundException;

class Profile extends Eloquent {

     protected $table = 'user_profiles';
     public $timestamps = true;
}