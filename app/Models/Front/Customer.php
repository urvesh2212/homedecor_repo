<?php

namespace App\Models\Front;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'uid',
        'customer_name',
        'customer_number',
        'customer_password',
        'customer_email',
        'wishlist',
        'cart_items',
        'total_orders',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $casts = [

        'cart_items' => 'array',
        'wishlist' => 'array'
    ];
    
    public function customerorder(){

        return $this->hasMany(\App\Models\Order::class,'customer_id');
    }

    public  function customeraddress()
    {
        return $this->hasMany(CustomerAddress::class,'customerid','uid');
    }



}
