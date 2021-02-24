<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class Brand extends Model
{
    use HasFactory;

    protected $table = "brands";
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    const BRAND_STATUS_SELECT = [
        '1' => 'Active',
        '2' => 'Deactive',
    ];

    protected $fillable = [
        'brand_name',
        'brand_status',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

}
