@extends('layouts.admin')
@section('content')
<div class="content">
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.validpincodes.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.validpincodes.title_singular') }}
                </a>
            </div>
        </div>

        <div class="col-md-12">
            @if (session('success'))
            <div class="alert alert-success alert-dismissible" role="alert">
                {{session('success')}}
            </div>
            @endif
            @if(session('error'))
            <div class="alert alert-error alert-dismissible" role="alert">
                {{session('error')}}
            </div>
            @endif
        </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.validpincodes.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-validpincode">
                            <thead>
                                <tr>
                                    <th width="10">

                                    </th>
                                    <th>
                                        {{ trans('cruds.validpincodes.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.validpincodes.fields.pin_code') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.validpincodes.fields.pincode_status') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($validpincodes as $key => $validpincode)
                                    <tr data-entry-id="{{ $validpincode->id }}">
                                        <td>

                                        </td>
                                        <td>
                                            {{ $validpincode->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $validpincode->pin_code ?? '' }}
                                        </td>
                                        <td>
                                        @if($validpincode->pincode_status == '1')
                                        <span class="label label-warning">{{\App\Models\ValidPincode::PINCODE_STATUS_SELECT[$validpincode->pincode_status] ?? ''}}</span>
                                        @else
                                        <span class="label label-success">{{\App\Models\ValidPincode::PINCODE_STATUS_SELECT[$validpincode->pincode_status] ?? ''}}<span>
                                        </td>
                                        @endif
                                        <td>
                                                <a class="btn btn-xs btn-info" href="{{ route('admin.validpincodes.edit',$validpincode->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>

                                                <form action="{{ route('admin.validpincodes.destroy', $validpincode->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                                </form>
                                

                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>



        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)

  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.validpincodes.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)

  
  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'asc' ]],
    pageLength: 50,
  });
  let table = $('.datatable-validpincode:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection