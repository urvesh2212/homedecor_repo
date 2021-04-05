<?php

namespace App\Http\Requests\Front;

use Illuminate\Foundation\Http\FormRequest;

class AddToCartRequest extends FormRequest
{
    public function rules()
    {
        return [
            'productid' => [
                'string',
                'required',
            ]
        ];
    }
}


