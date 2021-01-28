<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class soilHealth extends Model
{
    // Table Name
   protected $table = 'soil_health';

   // Primaray Key
   public $primaryKey = 'id';

   // Timestaps
   public $timestamps = true;
}
