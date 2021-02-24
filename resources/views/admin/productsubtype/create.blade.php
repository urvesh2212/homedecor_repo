@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.productsubtype.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.productsubtype.store") }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group {{ $errors->has('productdata') ? 'has-error' : '' }}">
                            <label class="required" for="productdata">{{ trans('cruds.productsubtype.fields.product_name') }}</label>
                            <select class="form-control select2" name="product_id" id="product_id" required>
                                @foreach($productdata as $id => $productname)
                                    <option value="{{ $id }}" {{ old('product_id') == $id ? 'selected' : '' }}>{{ $productname }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('productdata'))
                                <span class="help-block" role="alert">{{ $errors->first('productdata') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.productsubtype.fields.product_name_helper') }}</span>
                        </div>

                        <div class="form-group {{ $errors->has('productvariantdata') ? 'has-error' : '' }}">
                            <label class="required" for="productvariantdata">{{ trans('cruds.productsubtype.fields.product_variant_name') }}</label>
                            <select class="form-control select2" name="product_variant_id" id="product_variant_id" required>
                                @foreach($productvariantdata as $id => $variantname)
                                    <option value="{{ $id }}" {{ old('product_variant_id') == $id ? 'selected' : '' }}>{{ $variantname }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('productvariantdata'))
                                <span class="help-block" role="alert">{{ $errors->first('productvariantdata') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.productsubtype.fields.product_variant_name_helper') }}</span>
                        </div>

                        <div class="form-group {{ $errors->has('hsn_code') ? 'has-error' : '' }}">
                            <label for="hsn_code">{{ trans('cruds.productsubtype.fields.hsn_code') }}</label>
                            <input class="form-control" type="text" name="hsn_code" id="hsn_code" value="{{ old('hsn_code', '') }}">
                            @if($errors->has('hsn_code'))
                                <span class="help-block" role="alert">{{ $errors->first('hsn_code') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.productsubtype.fields.hsn_code_helper') }}</span>
                        </div>

                        <div class="form-group {{ $errors->has('stock') ? 'has-error' : '' }}">
                            <label class="required" for="stock">{{ trans('cruds.productsubtype.fields.stock') }}</label>
                            <input class="form-control" type="number" name="stock" id="stock" value="{{ old('stock', '') }}" step="1" min="0" required>
                            @if($errors->has('stock'))
                                <span class="help-block" role="alert">{{ $errors->first('stock') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.productsubtype.fields.stock_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('price') ? 'has-error' : '' }}">
                            <label class="required" for="price">{{ trans('cruds.productsubtype.fields.price') }}</label>
                            <input class="form-control" type="number" name="price" id="price"  value="{{ old('price', '') }}" min="0" required>
                            @if($errors->has('price'))
                                <span class="help-block" role="alert">{{ $errors->first('price') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.productsubtype.fields.price_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('gst') ? 'has-error' : '' }}">
                            <label for="gst">{{ trans('cruds.productsubtype.fields.gst') }} %</label>
                            <input class="form-control" type="number" name="gst" id="gst" value="{{ old('gst', '') }}" min="0" required>
                            @if($errors->has('gst'))
                                <span class="help-block" role="alert">{{ $errors->first('gst') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.productsubtype.fields.gst_helper') }}</span>
                        </div>

                        <div class="form-group">
                            <label class="required" for="final_price_disabled">{{ trans('cruds.productsubtype.fields.final_price') }}</label>
                            <input class="form-control" type="number" name="final_price_disabled" id="final_price_disabled" value="{{ old('final_price', '') }}" disabled>
                        </div>

                        <div class="form-group {{ $errors->has('final_price') ? 'has-error' : '' }}">
                            <input class="form-control" type="hidden" name="final_price" id="final_price" value="{{ old('final_price', '') }}">
                            @if($errors->has('final_price'))
                                <span class="help-block" role="alert">{{ $errors->first('final_price') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.productsubtype.fields.final_price_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('offer_price') ? 'has-error' : '' }}">
                            <label for="offer_price">{{ trans('cruds.productsubtype.fields.offer_price') }}</label>
                            <input class="form-control" type="number" name="offer_price" id="offer_price" value="{{ old('offer_price', '') }}" min="0">
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
                                    <option value="{{ $key }}" {{ old('product_subtype_status', '1') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('product_subtype_status'))
                                <span class="help-block" role="alert">{{ $errors->first('product_subtype_status') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.productsubtype.fields.product_status_helper') }}</span>
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
<script type="text/javascript">
    var uploadedProductImgMap = {}
Dropzone.options.productImgDropzone = {
    url: '{{ route('admin.products.storeMedia') }}',
    maxFilesize: 10, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 10,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').append('<input type="hidden" name="product_img[]" value="' + response.name + '">')
      uploadedProductImgMap[file.name] = response.name
    },
    removedfile: function (file) {
      console.log(file)
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedProductImgMap[file.name]
      }
      $('form').find('input[name="product_img[]"][value="' + name + '"]').remove()
    },
    init: function () {
@if(isset($product) && $product->product_img)
      var files = {!! json_encode($product->product_img) !!}
          for (var i in files) {
          var file = files[i]
          this.options.addedfile.call(this, file)
          this.options.thumbnail.call(this, file, file.preview)
          file.previewElement.classList.add('dz-complete')
          $('form').append('<input type="hidden" name="product_img[]" value="' + file.file_name + '">')
        }
@endif
    },
     error: function (file, response) {
         if ($.type(response) === 'string') {
             var message = response //dropzone sends it's own error messages in string
         } else {
             var message = response.errors.file
         }
         file.previewElement.classList.add('dz-error')
         _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
         _results = []
         for (_i = 0, _len = _ref.length; _i < _len; _i++) {
             node = _ref[_i]
             _results.push(node.textContent = message)
         }

         return _results
     }
}

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
</script>
@endsection