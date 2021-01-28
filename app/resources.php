<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class resources extends Model
{
    // Table Name
   protected $table = 'resources';

   // Primaray Key
   public $primaryKey = 'id';

   // Timestaps
   public $timestamps = true;
}
