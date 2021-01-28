<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class mvideos extends Model
{
   // Table Name
   protected $table = 'm_videos';

   // Primaray Key
   public $primaryKey = 'id';

   // Timestaps
   public $timestamps = true;
}
