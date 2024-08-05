<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'sku',
        'user_name',
        'user_email',
        'user_city',
        'user_address',
        'user_phone',
        'note',
        'payment_method',
        'status',
    ];

    public function products()
    {
        return $this->hasMany(OrderDetail::class);
    }

    public function bill() 
    {
        return $this->hasOne(Bill::class);
    }
}