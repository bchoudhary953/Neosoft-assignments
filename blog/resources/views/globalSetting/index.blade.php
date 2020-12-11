@extends('Frontend.Layout.master')

@section('title', 'Settings')

@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">List of Settings</h3>
                <div class="box-tools">
                   <!-- <a href="{{ route('globalSetting.create') }}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Add Setting </a> -->
                </div>
            </div>
            <div class="box-body">
                {{ csrf_field() }}
                <div class="col-sm-12" style="overflow: scroll;overflow-y: hidden;">
                    <table id="globalSetting" class="table table-striped table-bordered table-hover datatable">
                        <thead>
                            <tr>
                                <th> #</th>
                                <th> Setting Name</th>
                                <th> Setting Value</th>
                                <th width="180px"> Actions</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                        <tfoot>
                        <tr>
                                <th>#</th>
                                <th>Setting Name</th>
                                <th>Setting Value</th>
                                <th width="180px">Actions</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script>
$(document).ready(function(){
    //Loader.init('show');

    var oTable = $('#globalSetting').DataTable({
        /*
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'copy',
                className: "btn-sm",
                exportOptions: {
                    columns: [ 0,1,2,3,4,5,6,7],
                     pageLength:'all'

                }
            },
            {
                extend: 'csv',
                className: "btn-sm",
                exportOptions: {
                    columns: [ 0,1,2,3,4,5,6,7],
                     pageLength:'all'

                }
            },
            {
                extend: 'excel',
                className: "btn-sm",
                exportOptions: {
                    columns: [ 0,1,2,3,4,5,6,7],
                     pageLength:'all'

                }
            },
            {
                extend: 'pdf',
                className: "btn-sm",
                pageSize: 'LEGAL',
                exportOptions: {
                    columns: [ 0,1,2,3,4,5,6,7],
                     pageLength:'all'

                }
            },
            {
                extend: 'print',
                className: "btn-sm",
                exportOptions: {
                    columns: [ 0,1,2,3,4,5,6,7],
                     pageLength:'all'

                }
            }
        ],
        */
        responsive: true,
        // Pagination settings
        //dom: "<'row'<'col-sm-12'tr>> <'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7 dataTables_pager'lp>>",
        lengthMenu: [5, 10, 25, 50],
        pageLength: 10,
        language: {
            'lengthMenu': 'Display _MENU_',
        },
        orderable: false,
        searching: true,
        processing: true,
        serverSide: true,
        stateSave: true,

        //stateDuration:-1,
        ajax: {
            url: '{{ route("get_globalSetting") }}',
            data: function (d) {
              d.registration_date = $('input[name=registration_date]').val();
              d.filter_type = $('#filter_type').val();
              d.key = $('#key').val();
              d.start_date = $('#start_date').val();
              d.end_date = $('#end_date').val();
            }
        },
        initComplete:function(){
            $('#globalSetting_length').parent().addClass('adjust-display');
            $('#globalSetting_filter').parent().addClass('filter-adjust');
            $('#globalSetting_wrapper').parent().addClass('adjust-wrapper');

            //setTimeout(function() {
                //Loader.init('hide');
            //}, 500);
        },
        columns: [
            {data: 'DT_RowIndex'},
            {data: 'setting_name'},
            {data: 'setting_value'},
            {data: 'action', name: 'action', orderable: false, searchable: false}
        ],

    });
});
</script>
@endsection

