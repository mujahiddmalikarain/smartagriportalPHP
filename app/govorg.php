<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class govorg extends Model
{
    // Table Name
   protected $table = 'gov_org';

   // Primaray Key
   public $primaryKey = 'id';

   // Timestaps
   public $timestamps = true;
}
