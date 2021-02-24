<?php

namespace App\Http\Requests;

use App\Models\ManagerCoupon;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyManageCouponRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('manage_coupon_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:manage_coupons,id',
        ];
    }
}
