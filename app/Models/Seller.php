<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seller extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'type',
        'status',
        'rating',
        'startdate',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function markets(){
        return $this->hasMany(Market::class);
    }
}
