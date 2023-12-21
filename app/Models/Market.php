<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Market extends Model
{
    use HasFactory;

    public function seller(){
        return $this->belongsTo(Seller::class);
    }

    public function products(){
        return $this->hasMany(Product::class);
    }
}
