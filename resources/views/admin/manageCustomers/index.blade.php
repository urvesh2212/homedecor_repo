@extends('layouts.admin')
@section('content')

<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.managecustomer.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-manageCustomer">
                            <thead>
                                <tr>
                                <th width="10%">

                                </th>
                                    <th width="5%">
                                        {{ trans('cruds.managecustomer.fields.customer_id') }}
                                    </th>
                                    <th width="5%">
                                        {{ trans('cruds.managecustomer.fields.customer_email') }}
                                    </th>
                                    <th width="5%">
                                        {{ trans('cruds.managecustomer.fields.customer_name') }}
                                    </th>
                                    <th width="5%">
                                        {{ trans('cruds.managecustomer.fields.customer_number') }}
                                    </th>
                                    <th width="5%">
                                        {{ trans('cruds.managecustomer.fields.total_orders') }}
                                    </th>
                                    <th width="10%">
                                        {{ trans('cruds.managecustomer.fields.created_at') }}
                                    </th>
                                    <th width="10%">
                                        {{ trans('cruds.managecustomer.fields.updated_at') }}
                                    </th>
                                    <th width="25%">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                 @foreach($customerdata as $key => $customer)
                                    <tr data-entry-id="{{ $customer->id }}">
                                    <td></td>
                                    <td>
                                        {{ $customer->id ?? '' }}
                                    </td>
                                        <td>
                                            {{ $customer->customer_email ?? '' }}
                                        </td>
                                        <td>
                                            {{ $customer->customer_name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $customer->customer_number ?? '' }}
                                        </td>
                                        <td>
                                            {{ $customer->total_orders ?? '0' }}
                                        </td>
                                        <td>
                                            {{ $customer->created_at ?? '' }}
                                        </td>
                                        <td>
                                            {{ $customer->updated_at ?? '' }}
                                        </td>
                                        <td>

                                                <a class="btn btn-xs btn-primary" href="{{ route('admin.manage-customers.show', $customer->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>

                                                <form action="{{ route('admin.manage-customers.destroy', $customer->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
    url: "{{ route('admin.manage-customers.massDestroy') }}",
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
  let table = $('.datatable-manageCustomer:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection