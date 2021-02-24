<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class ProductVariant extends Model 
{
    use SoftDeletes, HasFactory;

    public $table = 'product_variant';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    const PRODUCT_VARIANT_STATUS_SELECT = [
        '1' => 'Active',
        '2' => 'Deactive',
    ];

    protected $fillable = [
        
        'product_variant_name',
        'product_variant_status',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

}
