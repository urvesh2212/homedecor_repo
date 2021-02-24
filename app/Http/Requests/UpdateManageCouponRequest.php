<?php

namespace App\Http\Requests;

use App\Models\ManageCoupon;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateManageCouponRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('manage_coupon_edit');
    }

    public function rules()
    {
        return [
            'coupon_code'   => [
                'string',
                'required',
                'unique:manage_coupons,coupon_code,' . request()->route('manage_coupon')->id,
            ],
            'coupon_value'  => [
                'required',
            ],
            'coupon_status' => [
                'required',
            ],
        ];
    }
}
