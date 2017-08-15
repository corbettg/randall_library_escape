<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
      protected $fillable = ['name', 'user', 'phone'];
      public $timestamps = false;

      public function session() {
          return $this->belongsTo('App\session');
      }

}
