<?php

namespace App\Http\Requests;

use App\Models\ProductSubType;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateProductSubTypeRequest extends FormRequest
{
    public function rules()
    {
        return [
            'product_id'       => [
                'required',
                'integer',
            ],
            'product_variant_id'    => [
                'required',
                'integer',
            ],
            'hsn_code'   => [
                'string',
                'required',
            ],
            'stock' => [
                'required',
            ],
            'price' => [
                'required',
            ],
            'gst' => [
                'required',
            ],
            'final_price' => [
                'required',
            ],
            'offer_price' => [
                'required',
            ],
            'product_subtype_status' => [
                'required',
            ],
        ];
    }
}
