@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('cruds.brand.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.brand.update", [$brand->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                    
                        <div class="form-group {{ $errors->has('brand_name') ? 'has-error' : '' }}">
                            <label class="required" for="brand_name">{{ trans('cruds.brand.fields.brand_name') }}</label>
                            <input class="form-control" type="text" name="brand_name" id="brand_name" value="{{ old('brand_name', $brand->brand_name) }}" required>
                            @if($errors->has('brand_name'))
                                <span class="help-block" role="alert">{{ $errors->first('brand_name') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.brand.brand_name_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('brand_status') ? 'has-error' : '' }}">
                            <label class="required">{{ trans('cruds.brand.fields.brand_status') }}</label>
                            <select class="form-control" name="brand_status" id="brand_status" required>
                                <option value disabled {{ old('brand_status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\Brand::BRAND_STATUS_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('brand_status', $brand->brand_status) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('brand_status'))
                                <span class="help-block" role="alert">{{ $errors->first('brand_status') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.brand.fields.brand_status_helper') }}</span>
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

@section('scripts')
@endsection