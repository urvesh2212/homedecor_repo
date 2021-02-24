<?php

namespace App\Http\Requests;

use App\Models\Product;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreProductRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('product_create');
    }

    public function rules()
    {
        return [
            'product_img.*'  => [
                'required',
            ],
            'catid_id'       => [
                'required',
                'integer',
            ],
            'subcatid_id'    => [
                'required',
                'integer',
            ],
            'product_name'   => [
                'string',
                'required',
            ],
            'product_status' => [
                'required',
            ],
        ];
    }
}
