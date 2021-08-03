<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Machine extends Model
{
    use HasFactory;

    public function departement(){
        return $this->belongsTo('App\Models\Departement');
    }
    public function maintence(){
        return $this->hasMany('App\Models\Maintance');
    }
}