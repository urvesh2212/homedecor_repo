@extends('layouts.admin')
@section('content')
    <div class="content">
            <div style="margin-bottom: 10px;" class="row">
                <div class="col-lg-12">
                    <a class="btn btn-success" href="{{ route('admin.manage-banner.create') }}">
                            {{ trans('global.add') }} {{ trans('cruds.bannerslider.title_singular') }}
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
                        {{ trans('cruds.bannerslider.title_singular') }} {{ trans('global.list') }}
                    </div>
                    <div class="panel-body">
                        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-bannerslider">
                            <thead>
                            <tr>
                                <th width="10">

                                </th>
                                <th>
                                    {{ trans('cruds.bannerslider.fields.id') }}
                                </th>
                                <th>
                                    {{ trans('cruds.bannerslider.fields.banner_img') }}
                                </th>
                                <th>
                                    {{ trans('cruds.bannerslider.fields.banner_status') }}
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
                url: "{{ route('admin.manage-banner.massDestroy') }}",
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
                ajax: "{{ route('admin.manage-banner.index') }}",
                columns: [
                    { data: 'placeholder', name: 'placeholder' },
                    { data: 'id', name: 'id' },
                    { data: 'bannerslider_img', name: 'bannerslider_img', sortable: false, searchable: false },
                    { data: 'bannerslider_status', name: 'bannerslider_status' },
                    { data: 'actions', name: '{{ trans('global.actions') }}' }
                ],
                orderCellsTop: true,
                order: [[ 1, 'asc' ]],
                pageLength: 10,
            };
            let table = $('.datatable-bannerslider').DataTable(dtOverrideGlobals);
            $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
                $($.fn.dataTable.tables(true)).DataTable()
                    .columns.adjust();
            });

        });

    </script>
@endsection
