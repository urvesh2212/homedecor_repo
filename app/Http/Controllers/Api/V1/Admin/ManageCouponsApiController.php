<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreManageCouponRequest;
use App\Http\Requests\UpdateManageCouponRequest;
use App\Http\Resources\Admin\ManageCouponResource;
use App\Models\ManageCoupon;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ManageCouponsApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('manage_coupon_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ManageCouponResource(ManageCoupon::all());
    }

    public function store(StoreManageCouponRequest $request)
    {
        $manageCoupon = ManageCoupon::create($request->all());

        return (new ManageCouponResource($manageCoupon))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(ManageCoupon $manageCoupon)
    {
        abort_if(Gate::denies('manage_coupon_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ManageCouponResource($manageCoupon);
    }

    public function update(UpdateManageCouponRequest $request, ManageCoupon $manageCoupon)
    {
        $manageCoupon->update($request->all());

        return (new ManageCouponResource($manageCoupon))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(ManageCoupon $manageCoupon)
    {
        abort_if(Gate::denies('manage_coupon_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $manageCoupon->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
