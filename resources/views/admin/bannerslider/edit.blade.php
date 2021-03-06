@extends('layouts.admin')
@section('content')
    <div class="content">

        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        {{ trans('global.edit') }} {{ trans('cruds.bannerslider.title_singular') }}
                    </div>
                    <div class="panel-body">
                        <form method="POST" action="{{ route("admin.manage-banner.update",[$manage_banner->id] ) }}" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="form-group {{ $errors->has('bannerslider_img') ? 'has-error' : '' }}">
                                <label class="required" for="bannerslider_img">{{ trans('cruds.bannerslider.fields.banner_img') }}</label>
                                <div class="needsclick dropzone" id="category_img-dropzone">
                                </div>
                                @if($errors->has('bannerslider_img'))
                                    <span class="help-block" role="alert">{{ $errors->first('bannerslider_img') }}</span>
                                @endif
                                <span class="help-block">{{ trans('cruds.bannerslider.fields.banner_img_helper') }}</span>
                            </div>
                            <div class="form-group {{ $errors->has('bannerslider_status') ? 'has-error' : '' }}">
                                <label class="required">{{ trans('cruds.bannerslider.fields.banner_status') }}</label>
                                <select class="form-control" name="bannerslider_status" id="bannerslider_status" required>
                                    <option value disabled {{ old('bannerslider_status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                    @foreach(App\Models\BannerSlider::BANNER_STATUS_SELECT as $key => $label)
                                        <option value="{{ $key }}" {{ old('bannerslider_status', $manage_banner->bannerslider_status) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('bannerslider_status'))
                                    <span class="help-block" role="alert">{{ $errors->first('bannerslider_status') }}</span>
                                @endif
                                <span class="help-block">{{ trans('cruds.bannerslider.fields.banner_status_helper') }}</span>
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
    <script>
        var uploadedCategoryImgMap = {}
        Dropzone.options.categoryImgDropzone = {
            url: '{{ route('admin.manage-banner.storeMedia') }}',
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
                $('form').append('<input type="hidden" name="bannerslider_img[]" value="' + response.name + '">')
                uploadedCategoryImgMap[file.name] = response.name
            },
            removedfile: function (file) {
                console.log(file)
                file.previewElement.remove()
                var name = ''
                if (typeof file.file_name !== 'undefined') {
                    name = file.file_name
                } else {
                    name = uploadedCategoryImgMap[file.name]
                }
                $('form').find('input[name="bannerslider_img[]"][value="' + name + '"]').remove()
            },
            init: function () {
                @if(isset($manage_banner) && $manage_banner->bannerslider_img)
                var files = {!! json_encode($manage_banner->bannerslider_img) !!}
                    for (var i in files) {
                    var file = files[i]
                    this.options.addedfile.call(this, file)
                    this.options.thumbnail.call(this, file, file.preview)
                    file.previewElement.classList.add('dz-complete')
                    $('form').append('<input type="hidden" name="bannerslider_img[]" value="' + file.file_name + '">')
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
    </script>
@endsection
