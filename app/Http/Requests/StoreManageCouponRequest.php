<?php

namespace App\Http\Requests;

use App\Models\ManagerCoupon;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreManageCouponRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('manage_coupon_create');
    }

    public function rules()
    {
        return [
            'coupon_code'   => [
                'string',
                'required',
                'unique:manage_coupons',
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
