@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('cruds.validpincodes.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.validpincodes.update", [$validpincodes->id]) }}">
                        @method('PUT')
                        @csrf
                        <div class="form-group {{ $errors->has('pin_code') ? 'has-error' : '' }}">
                            <label class="required" for="pin_code">{{ trans('cruds.validpincodes.fields.pin_code') }}</label>
                            <input class="form-control" type="text" name="pin_code" id="pin_code" value="{{ old('pin_code', $validpincodes->pin_code) }}" required>
                            @if($errors->has('pin_code'))
                                <span class="help-block" role="alert">{{ $errors->first('pin_code') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.validpincodes.fields.pin_code_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('pincode_status') ? 'has-error' : '' }}">
                            <label class="required">{{ trans('cruds.validpincodes.fields.pincode_status') }}</label>
                            <select class="form-control" name="pincode_status" id="pincode_status" required>
                                <option value disabled {{ old('pincode_status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(\App\Models\ValidPincode::PINCODE_STATUS_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('pincode_status', $validpincodes->pincode_status) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('pincode_status'))
                                <span class="help-block" role="alert">{{ $errors->first('pincode_status') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.validpincodes.fields.pincode_status_helper') }}</span>
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