<?php

namespace App\Http\Requests;

use App\Models\ProductVariant;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreProductVariantRequest extends FormRequest
{
    public function rules()
    {
        return [
            'product_variant_name' => [
                'string',
                'required',
            ],
        ];
    }
}
