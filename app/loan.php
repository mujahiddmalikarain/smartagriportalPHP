<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class loan extends Model
{
    // Table Name
   protected $table = 'loan';

   // Primaray Key
   public $primaryKey = 'id';

   // Timestaps
   public $timestamps = true;
}
