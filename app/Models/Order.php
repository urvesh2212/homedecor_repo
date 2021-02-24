<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class Order extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'orders';
    
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    
    const ORDER_STATUS_SELECT = [
        '1' => 'Processing',
        '2' => 'Out For Delivery',
        '3' => 'Delivered'
    ];

    protected $fillable = [
        'bill_no',
        'customer_id',
        'address',
        'tota_amount',
        'total_discount',
        'total_deliveryamt',
        'total_item',
        'total_item_qty',
        'order_status',
        'payment_status',
        'updated_at'
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
