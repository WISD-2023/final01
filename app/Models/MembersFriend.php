<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MembersFriend extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'friend_id',
        'date',
    ];

    public function user(){
        return $this->belongsTo(User::class, 'friend_id', 'id');
    }
}
