@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('cruds.productsubtype.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.productsubtype.update", [$productsubtype->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        
                        <div class="form-group {{ $errors->has('product_id') ? 'has-error' : '' }}">
                            <label class="required" for="product_id">{{ trans('cruds.product.fields.product_name') }}</label>
                            <select class="form-control select2" name="product_id" id="product_id" required>
                                @foreach($productdata as $pdata => $pname)
                                    <option value="{{ $pdata }}" {{ (old('product_id') ? old('product_id') : $pdata ?? '') == $productsubtype->productid->id ? 'selected' : '' }}>{{ $pname }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('product_id'))
                                <span class="help-block" role="alert">{{ $errors->first('product_id') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.product.fields.catid_helper') }}</span>
                        </div>

                        <div class="form-group {{ $errors->has('product_variant_id') ? 'has-error' : '' }}">
                            <label class="required" for="product_variant_id">{{ trans('cruds.productsubtype.fields.product_variant_name') }}</label>
                            <select class="form-control select2" name="product_variant_id" id="product_variant_id" required>
                                @foreach($productvariantdata as $pvid => $pvname)
                                    <option value="{{ $pvid }}" {{ (old('product_variant_id') ? old('product_variant_id') : $pvid ?? '') == $productsubtype->productvariantid->id ? 'selected' : '' }}>{{ $pvname }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('product_variant_id'))
                                <span class="help-block" role="alert">{{ $errors->first('product_variant_id') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.productsubtype.fields.product_variant_name_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('hsn_code') ? 'has-error' : '' }}">
                            <label for="hsn_code">{{ trans('cruds.productsubtype.fields.hsn_code') }}</label>
                            <input class="form-control" name="hsn_code" id="hsn_code" value="{{ old('hsn_code', $productsubtype->hsn_code) }}">
                            @if($errors->has('hsn_code'))
                                <span class="help-block" role="alert">{{ $errors->first('hsn_code') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.product.fields.hsn_code_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('stock') ? 'has-error' : '' }}">
                        <label class="required" for="stock">{{ trans('cruds.productsubtype.fields.stock') }}</label>
                        <input class="form-control" type="number" name="stock" id="stock" value="{{ old('stock', $productsubtype->stock) }}" step="1" min="0" required>
                        @if($errors->has('stock'))
                            <span class="help-block" role="alert">{{ $errors->first('stock') }}</span>
                        @endif
                        <span class="help-block">{{ trans('cruds.productsubtype.fields.stock_helper') }}</span>
                    </div>
                    <div class="form-group {{ $errors->has('price') ? 'has-error' : '' }}">
                        <label class="required" for="price">{{ trans('cruds.productsubtype.fields.price') }}</label>
                        <input class="form-control" type="number" name="price" id="price"  value="{{ old('price', $productsubtype->price) }}" min="0" required>
                        @if($errors->has('price'))
                            <span class="help-block" role="alert">{{ $errors->first('price') }}</span>
                        @endif
                        <span class="help-block">{{ trans('cruds.productsubtype.fields.price_helper') }}</span>
                    </div>
                    <div class="form-group {{ $errors->has('gst') ? 'has-error' : '' }}">
                        <label for="gst">{{ trans('cruds.productsubtype.fields.gst') }} %</label>
                        <input class="form-control" type="number" name="gst" id="gst" value="{{ old('gst', $productsubtype->gst) }}" min="0" required>
                        @if($errors->has('gst'))
                            <span class="help-block" role="alert">{{ $errors->first('gst') }}</span>
                        @endif
                        <span class="help-block">{{ trans('cruds.productsubtype.fields.gst_helper') }}</span>
                    </div>

                    <div class="form-group">
                        <label class="required" for="final_price_disabled">{{ trans('cruds.productsubtype.fields.final_price') }}</label>
                        <input class="form-control" type="number" name="final_price_disabled" id="final_price_disabled" value="{{ old('final_price', $productsubtype->final_price) }}" disabled>
                    </div>

                    <div class="form-group {{ $errors->has('final_price') ? 'has-error' : '' }}">
                        <input class="form-control" type="hidden" name="final_price" id="final_price" value="{{ old('final_price', $productsubtype->final_price) }}">
                        @if($errors->has('final_price'))
                            <span class="help-block" role="alert">{{ $errors->first('final_price') }}</span>
                        @endif
                        <span class="help-block">{{ trans('cruds.productsubtype.fields.final_price_helper') }}</span>
                    </div>
                    <div class="form-group {{ $errors->has('offer_price') ? 'has-error' : '' }}">
                        <label for="offer_price">{{ trans('cruds.productsubtype.fields.offer_price') }}</label>
                        <input class="form-control" type="number" name="offer_price" id="offer_price" value="{{ old('offer_price', $productsubtype->offer_price) }}" min="0">
                        @if($errors->has('offer_price'))
                            <span class="help-block" role="alert">{{ $errors->first('offer_price') }}</span>
                        @endif
                        <span class="help-block">{{ trans('cruds.productsubtype.fields.offer_price_helper') }}</span>
                    </div>
                    <div class="form-group {{ $errors->has('product_subtype_status') ? 'has-error' : '' }}">
                        <label class="required">{{ trans('cruds.productsubtype.fields.product_subtype_status') }}</label>
                        <select class="form-control" name="product_subtype_status" id="product_subtype_status" required>
                            <option value disabled {{ old('product_status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                            @foreach(App\Models\ProductSubType::PRODUCT_SUBTYPE_STATUS_SELECT as $key => $label)
                                <option value="{{ $key }}" {{  $productsubtype->product_subtype_status === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('product_subtype_status'))
                            <span class="help-block" role="alert">{{ $errors->first('product_subtype_status') }}</span>
                        @endif
                        <span class="help-block">{{ trans('cruds.productsubtype.fields.product_status_helper') }}</span>
                    </div>
            
                        <div class="form-group">
                            <button class="btn btn-danger" type="submit">
                                {{ trans('global.update') }}
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
<script>
$("#price").on('keypress',function(e){
    var key = window.e ? e.keyCode : e.which;
    if (e.keyCode === 8 || e.keyCode === 46) {
        return true;
    } else if ( key < 48 || key > 57 ) {
        return false;
    } else {
        return true;
    }
  });


  $(document).on('keyup','#gst,#price',function(){
    var product_price = $('#price').val();
    var gst = $('#gst').val();
    if(gst == null || undefined){

    }else{
      var number = (parseFloat(product_price) * parseFloat(gst) / 100);
    var val = parseFloat(product_price) + parseFloat(number);
    $('#final_price').val(val);
    $("#final_price_disabled").val(val);
    }
  });

  $(document).ready(function(){
    var product_price = $('#price').val();
    var gst = $('#gst').val();
    var number = (parseFloat(product_price) * parseFloat(gst) / 100);
    var val = parseFloat(product_price) + parseFloat(number);
    $('#final_price').val(val);
    $("#final_price_disabled").val(val);
  });
</script>
@endsection