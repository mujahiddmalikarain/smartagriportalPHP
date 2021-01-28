<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class private_org extends Model
{
     // Table Name
   protected $table = 'private_org';

   // Primaray Key
   public $primaryKey = 'id';

   // Timestaps
   public $timestamps = true;
}