<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tender extends Model
{
    // Table Name
   protected $table = 'tender';

   // Primaray Key
   public $primaryKey = 'id';

   // Timestaps
   public $timestamps = true;
}
