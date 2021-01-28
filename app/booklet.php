<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class booklet extends Model
{
    // Table Name
   protected $table = 'booklets';

   // Primaray Key
   public $primaryKey = 'id';

   // Timestaps
   public $timestamps = true;
}
