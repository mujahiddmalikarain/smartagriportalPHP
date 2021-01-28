<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class as_stories extends Model
{
    // Table Name
   protected $table = 'as_stories';

   // Primaray Key
   public $primaryKey = 'id';

   // Timestaps
   public $timestamps = true;
}
