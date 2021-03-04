<?php

namespace App\Http\Requests;

use App\Models\Brand;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyBrandRequest extends FormRequest
{
    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:brands,id',
        ];
    }
}
