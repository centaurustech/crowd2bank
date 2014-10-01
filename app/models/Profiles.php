<?php 

use \Illuminate\Database\Eloquent\ModelNotFoundException;

class Profiles extends Eloquent {

     protected $table = 'user_profiles';
     public $timestamps = true;
     
}