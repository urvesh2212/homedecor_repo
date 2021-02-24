@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.productvariant.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.productvariant.update",[$productvariant->id]) }}" enctype="multipart/form-data" >
                        @method('PUT')
                        @csrf
                        <div class="form-group {{ $errors->has('product_variant_name') ? 'has-error' : '' }}">
                            <label class="required" for="product_variant_name">{{ trans('cruds.productvariant.fields.product_variant_name') }}</label>
                            <input class="form-control" type="text" name="product_variant_name" id="product_variant_name" value="{{ old('product_variant_name', $productvariant->product_variant_name) }}" required>
                            @if($errors->has('product_variant_name'))
                                <span class="help-block" role="alert">{{ $errors->first('product_variant_name') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.productvariant.fields.product_variant_name_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('product_variant_status') ? 'has-error' : '' }}">
                            <label class="required">{{ trans('cruds.productvariant.fields.product_variant_status') }}</label>
                            <select class="form-control" name="product_variant_status" id="product_variant_status" required>
                                <option value disabled {{ old('product_variant_status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\ProductVariant::PRODUCT_VARIANT_STATUS_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('product_variant_status', $productvariant->product_variant_status) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('product_variant_status'))
                                <span class="help-block" role="alert">{{ $errors->first('product_variant_status') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.productvariant.fields.product_variant_status_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-danger" type="submit">
                                {{ trans('global.save') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>



        </div>
    </div>
</div>
@endsection