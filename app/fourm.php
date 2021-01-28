<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class fourm extends Model
{
      // Table Name
   protected $table = 'fourm';

   // Primaray Key
   public $primaryKey = 'id';

   // Timestaps
   public $timestamps = true;
}
