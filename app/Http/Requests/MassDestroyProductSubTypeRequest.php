<?php

namespace App\Http\Requests;

use App\Models\ProductSubType;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyProductSubTypeRequest extends FormRequest
{

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:product_subtype,id',
        ];
    }
}
