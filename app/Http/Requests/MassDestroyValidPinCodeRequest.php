<?php

namespace App\Http\Requests;

use App\Models\ValidPincode;

use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyValidPinCodeRequest extends FormRequest
{
   
    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:valid_pincodes,id',
        ];
    }
}
