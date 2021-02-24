<?php

namespace App\Http\Requests;

use App\Models\Brand;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreBrandRequest extends FormRequest
{
    public function rules()
    {
        return [
            'brand_name'   => [
                'string',
                'required',
            ],
            'brand_status' => [
                'required',
            ],
        ];
    }
}