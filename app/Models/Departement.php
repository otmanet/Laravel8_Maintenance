<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departement extends Model
{
    use HasFactory;
    public function machine(){
        return $this->hasMany('App\Models\Machine');
    }
      public function maintence(){
        return $this->hasMany('App\Models\Maintance');
      }
}