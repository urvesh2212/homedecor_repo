@extends('layouts.admin')
@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.managecustomer.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.manage-customers.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.managecustomer.fields.id') }}
                                    </th>
                                    <td>
                                        {{$customerdata->id}}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.managecustomer.fields.coupon_code') }}
                                    </th>
                                    <td>
                                        {{$customerdata->customer_name}}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.managecustomer.fields.coupon_value') }}
                                    </th>
                                    <td>
                                        
                                    </td>
                                </tr>
                        
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>



        </div>
    </div>
</div>
@endsection