<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyManageCouponRequest;
use App\Http\Requests\StoreManageCouponRequest;
use App\Http\Requests\UpdateManageCouponRequest;
use App\Models\ManageCoupon;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ManageCouponsController extends Controller
{

    private $title = 'Manage Coupons';

    public function index()
    {
        abort_if(Gate::denies('manage_coupon_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $manageCoupons = ManageCoupon::all();

        return view('admin.manageCoupons.index',['title' => $this->title], compact('manageCoupons'));
    }

    public function create()
    {
        abort_if(Gate::denies('manage_coupon_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.manageCoupons.create',['title' => $this->title]);
    }

    public function store(StoreManageCouponRequest $request)
    {
        $manageCoupon = ManageCoupon::create($request->all());

        return redirect()->route('admin.manage-coupons.index');
    }

    public function edit(ManageCoupon $manageCoupon)
    {
        abort_if(Gate::denies('manage_coupon_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
       
        return view('admin.manageCoupons.edit',['title' =>  $this->title], compact('manageCoupon'));
    }

    public function update(UpdateManageCouponRequest $request, ManageCoupon $manageCoupon)
    {
        $manageCoupon->update($request->all());

        return redirect()->route('admin.manage-coupons.index',['title' =>  $this->title]);
    }

    public function show(ManageCoupon $manageCoupon)
    {
        abort_if(Gate::denies('manage_coupon_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.manageCoupons.show',['title' =>  $this->title], compact('manageCoupon'));
    }

    public function destroy(ManageCoupon $manageCoupon)
    {
        abort_if(Gate::denies('manage_coupon_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $manageCoupon->delete();

        return back();
    }

    public function massDestroy(MassDestroyManageCouponRequest $request)
    {
        ManageCoupon::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
