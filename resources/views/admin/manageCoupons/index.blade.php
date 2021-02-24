@extends('layouts.admin')
@section('content')
<div class="content">
    @can('manage_coupon_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.manage-coupons.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.manageCoupon.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.manageCoupon.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-manageCoupon">
                            <thead>
                                <tr>
                                    <th width="10">

                                    </th>
                                    <th>
                                        {{ trans('cruds.manageCoupon.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.manageCoupon.fields.coupon_code') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.manageCoupon.fields.coupon_value') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.manageCoupon.fields.coupon_status') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($manageCoupons as $key => $manageCoupon)
                                    <tr data-entry-id="{{ $manageCoupon->id }}">
                                        <td>

                                        </td>
                                        <td>
                                            {{ $manageCoupon->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $manageCoupon->coupon_code ?? '' }}
                                        </td>
                                        <td>
                                            {{ $manageCoupon->coupon_value ?? '' }}
                                        </td>
                                        <td>
                                        @if($manageCoupon->coupon_status == '1')
                                        <span class="label label-warning">{{App\Models\manageCoupon::COUPON_STATUS_SELECT[$manageCoupon->coupon_status] ?? ''}}</span>
                                        @else
                                        <span class="label label-success">{{App\Models\manageCoupon::COUPON_STATUS_SELECT[$manageCoupon->coupon_status] ?? ''}}<span>
                                        </td>
                                        @endif
                                        <td>
                                            @can('manage_coupon_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('admin.manage-coupons.show', $manageCoupon->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('manage_coupon_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('admin.manage-coupons.edit', $manageCoupon->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('manage_coupon_delete')
                                                <form action="{{ route('admin.manage-coupons.destroy', $manageCoupon->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                                </form>
                                            @endcan

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
@can('manage_coupon_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.manage-coupons.massDestroy') }}",
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
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'asc' ]],
    pageLength: 50,
  });
  let table = $('.datatable-manageCoupon:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection