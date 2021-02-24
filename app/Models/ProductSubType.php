<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class ProductSubType extends Model 
{
    use SoftDeletes, HasFactory;

    public $table = 'product_subtype';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    const PRODUCT_SUBTYPE_STATUS_SELECT = [
        '1' => 'Active',
        '2' => 'Deactive',
    ];

    protected $fillable = [
        'stock',
        'price',
        'gst',
        'final_price',
        'hsn_code',
        'offer_price',
        'product_id',
        'product_variant_id',
        'product_subtype_status',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function productvariantid()
    {
        return $this->belongsTo(ProductVariant::class, 'product_variant_id');
    }

    public function productid()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
