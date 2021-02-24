<?php

namespace App\Http\Requests;

use App\Models\ProductSubType;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreProductSubTypeRequest extends FormRequest
{
    public function rules()
    {
        return [
            'product_id'   => [
                'required',
            ],
            'product_variant_id' => [
                'required',
            ],
            'stock'          => [
                'required',
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'price'          => [
                'required',
            ],
            'gst' => [
                'required',
            ],
            'final_price'    => [
                'required',
            ],
            'offer_price'    => [
                'required',
            ],
            'hsn_code'       => [
                'string',
                'nullable',
            ],
            'product_subtype_status' => [
                'required',
            ],
        ];
    }
}
