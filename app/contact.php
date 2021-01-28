<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class contact extends Model
{
    // Table Name
   protected $table = 'contact';

   // Primaray Key
   public $primaryKey = 'id';

   // Timestaps
   public $timestamps = true;
}
