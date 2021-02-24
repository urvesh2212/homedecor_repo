@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.manageOrder.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.manage-coupons.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.manageOrder.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $orderdata->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{trans('cruds.manageOrder.fields.bill_no') }}
                                    </th>
                                    <td>
                                        {{ $orderdata->bill_no }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{trans('cruds.manageOrder.fields.customer_id') }}
                                    </th>
                                    <td>
                                        {{ $orderdata->customer_id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{trans('cruds.manageOrder.fields.total_items')}}
                                    </th>
                                    <td>
                                        {{ $orderdata->total_item }}
                                    </td>
                                </tr>                                <tr>
                                    <th>
                                        {{ trans('cruds.manageOrder.fields.total_amount')}}
                                    </th>
                                    <td>
                                        {{ $orderdata->total_amount }}
                                    </td>
                                </tr>                                <tr>
                                    <th>
                                        {{ trans('cruds.manageOrder.fields.total_delivery_amount')}}
                                    </th>
                                    <td>
                                        {{ $orderdata->total_delivery_amount ?? '0' }}
                                    </td>
                                </tr>                          
                                      <tr>
                                    <th>
                                        {{trans('cruds.manageOrder.fields.created_at')  }}
                                    </th>
                                    <td>
                                        {{ $orderdata->created_at }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                    {{trans('cruds.manageOrder.fields.updated_at')}}
                                    </th>
                                    <td>
                                        {{ $orderdata->updated_at }}
                                    </td>
                                </tr>
                      
                                <tr>
                                    <th>
                                        {{ trans('cruds.manageOrder.fields.status') }}
                                    </th>
                                    <td>
                                    {{ App\Models\Order::ORDER_STATUS_SELECT[$orderdata->order_status] ?? '' }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.manage-orders.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>



        </div>
    </div>
</div>
@endsection