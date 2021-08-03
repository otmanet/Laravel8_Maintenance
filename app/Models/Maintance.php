<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Maintance extends Model
{
    use HasFactory;
    public function Machine(){
       return $this->belongsTo('App\Models\Machine');
    }
     public function departement(){
      return $this->belongsTo('App\Models\Departement');
     }
    public function user(){
     return $this->belongsTo('App\Models\User');
    }
}