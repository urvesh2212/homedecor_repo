@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('cruds.manageOrder.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.manage-orders.update", [$result->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div>
                        <span>{{$result->id}}</span>
                        </div>
                    </form>
                </div>
            </div>



        </div>
    </div>
</div>
@endsection