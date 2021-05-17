<?php

namespace App\Http\Requests;

use App\Models\ValidPincode;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdatevalidPincodeRequest extends FormRequest
{
  
    public function rules()
    {
        return [
            'pin_code'  => [
                'string',
                'required',
                'unique:valid_pincodes',
            ],
            'pincode_status' => [
                'required',
            ],
        ];
    }
}
