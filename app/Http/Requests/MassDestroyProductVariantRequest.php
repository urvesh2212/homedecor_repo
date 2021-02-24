<?php

namespace App\Http\Requests;

use App\Models\ProductVariant;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyProductVariantRequest extends FormRequest
{

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:product_variant,id',
        ];
    }
}
