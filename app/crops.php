<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class crops extends Model
{
    // Table Name
   protected $table = 'crops';

   // Primaray Key
   public $primaryKey = 'id';

   // Timestaps
   public $timestamps = true;
}
