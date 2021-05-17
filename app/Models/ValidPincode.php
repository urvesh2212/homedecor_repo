<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class ValidPincode extends Model
{

    use  HasFactory;
    
    public $table = 'valid_pincodes';
    
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];


    const PINCODE_STATUS_SELECT = [
        '1' => 'Active',
        '2' => 'Deactive',
    ];

    protected $fillable = [

        'pin_code',
        'pincode_status',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
