<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class training extends Model
{
    // Table Name
   protected $table = 'trainings';

   // Primaray Key
   public $primaryKey = 'id';

   // Timestaps
   public $timestamps = true;
}
