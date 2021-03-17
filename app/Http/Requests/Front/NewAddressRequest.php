<?php

namespace App\Http\Requests\Front;

use Illuminate\Foundation\Http\FormRequest;

class NewAddressRequest extends FormRequest
{
    public function rules()
    {
        return [
            'flatno' => [
                'string',
                'required',
            ],
            'landmark' =>[
                'string',
                'required',
            ],
            'state' => [
                'string',
                'required',
            ],
            'city' => [
                'string',
                'required',
            ],
            'zipcode' => [
                'integer',
                'required',
            ]
        ];
    }
}


