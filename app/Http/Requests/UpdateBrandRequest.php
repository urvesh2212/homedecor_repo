<?php

namespace App\Http\Requests;

use App\Models\Brand;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateBrandRequest extends FormRequest
{
    public function rules()
    {
        return [
            'brand_name'     => [
                'required',
            ],
            'brand_status' => [
                'required',
            ],
        ];
    }
}
