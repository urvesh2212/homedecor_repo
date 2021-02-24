@extends('layouts.admin')
@section('content')
<div class="content">

        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.productsubtype.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.productsubtype.title_singular') }}
                </a>
            </div>
        </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.productsubtype.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">
                    <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-Productsubtype">
                        <thead>
                            <tr>
                                <th width="10">

                                </th>
                                <th>
                                    {{ trans('cruds.productsubtype.fields.id') }}
                                </th>
                                <th>
                                    {{ trans('cruds.productsubtype.fields.hsn_code') }}
                                </th>
                                <th>
                                    {{ trans('cruds.productsubtype.fields.product_name') }}
                                </th>
                                <th>
                                    {{ trans('cruds.productsubtype.fields.product_variant_name') }}
                                </th>
                                <th>
                                    {{ trans('cruds.productsubtype.fields.stock') }}
                                </th>
                                <th>
                                    {{ trans('cruds.productsubtype.fields.final_price') }}
                                </th>
                                <th>
                                    {{ trans('cruds.productsubtype.fields.offer_price') }}
                                </th>
                                <th>
                                    {{ trans('cruds.productsubtype.fields.product_subtype_status') }}
                                </th>
                                <th>
                                    &nbsp;
                                </th>
                            </tr>
                        </thead>
                    </table>
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

  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.productsubtype.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).data(), function (entry) {
          return entry.id
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

  let dtOverrideGlobals = {
    buttons: dtButtons,
    processing: true,
    serverSide: true,
    retrieve: true,
    aaSorting: [],
    ajax: "{{ route('admin.productsubtype.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{ data: 'hsn_code', name: 'hsn_code'},
{ data: 'product_name', name: 'product_name'},
{ data: 'product_variant_name', name: 'product_variant_name'},
{ data: 'stock', name: 'stock'},
{ data: 'final_price', name: 'final_price'},
{ data: 'offer_price', name: 'offer_price'},
{ data: 'product_subtype_status', name: 'product_subtype_status' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'asc' ]],
    pageLength: 50,
  };
  let table = $('.datatable-Productsubtype').DataTable(dtOverrideGlobals);
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
});

</script>
@endsection