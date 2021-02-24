<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Yajra\DataTables\Facades\DataTables;
use App\Models\Order;

class ManageOrdersController extends Controller
{
    use MediaUploadingTrait;

    private $title = 'Manage Orders';
    public function index()
    {
        abort_if(Gate::denies('manage_order_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $orderdata = Order::all();
        
        return view('admin.manageOrders.index',['title' => $this->title],compact('orderdata'));
    }

    public function show($order)
    {
        abort_if(Gate::denies('manage_order_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $orderdata = Order::findorfail($order);
        return view('admin.manageOrders.show',['title' =>  $this->title], compact('orderdata'));
    }

    public function edit($order)
    {
        abort_if(Gate::denies('manage_order_edit'),Response::HTTP_FORBIDDEN,'403 Forbidden');
        $result = Order::findorfail($order);

        return view('admin.manageOrders.edit',['title'=> $this->title],compact('result'));
    }

    public function destroy($order)
    {
        abort_if(Gate::denies('manage_order_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        
        if(Order:: find($order)->delete()){
        return back()->with(['message' => 'Order Successfully Deleted']);
        }else{
        return back()->with(['message' => 'Error while deleting the order']);
        }
    }
}
