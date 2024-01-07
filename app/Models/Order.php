<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'payment_method',
        'is_paid',
        'receiver_name',
        'status',
    ];

    protected static function boot()
    {
        parent::boot();

        // 在刪除訂單之前，同時刪除相應的訂單明細
        static::deleting(function ($order) {
            $order->orderDetails()->delete();
        });
    }

    public function product(){
        return $this->belongsTo(Product::class);
    }

    public function cart(){
        return $this->belongsTo(Cart::class);
    }

    public function orderDetails(){
        return $this->hasMany(OrderDetail::class);
    }
}
