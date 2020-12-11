@extends('Backend.Layout.master')
@section('title')
    CMS Page Management
@endsection

@section('styles')
    <link rel="stylesheet" href="{{asset('Backend/css//dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('Backend/css/responsive.bootstrap4.min.css')}}">
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h3 class="card-title">Category Management</h3>
                </div>
                <!-- /.card-header -->
                <div id="message_success" style="display: none;" class="alert alert-success">Status Enabled</div>
                <div id="message_error" style="display: none;" class="alert alert-danger">Status Disabled</div>

                <div><a class="btn btn-primary m-3 p-1" style=" width:140px;" href="{{url('/admin/add-cms-page')}}"><i class="fa fa-plus"></i> Add CMS Page</a></div>
                <div class="card-body table-responsive">
                    <table class="table table-head-fixed text-nowrap" id="example1">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>CMS Page URL</th>
                            <th>Created On</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($cms as $row1)
                            <tr>
                                <td>{{$row1->id}}</td>
                                <td>{{$row1->title}}</td>
                                <td>{{$row1->url}}</td>
                                <td>{{$row1->created_at}}</td>
                                <td>
                                    <input type="checkbox" name="status" class="CmsStatus" data-toggle="toggle" rel="{{$row1->id}}" data-on="Enabled"
                                           data-off="Disabled" data-onstyle="success" data-offstyle="danger"  @if($row1['status']=="1")checked @endif>
                                    <div id="myElem" style="display: none;" class="alert alert-success">Status Enabled</div>
                                </td>
                                <td><a href="/admin/edit-cms-page/{{$row1->id}}"><button class="btn btn-success mr-2"><i class="fas fa-pen"></i></button></a>
                                    <a href="/admin/delete-cms-page/{{$row1->id}}"><button class="btn btn-danger" ><i class="fas fa-trash"></i></button></a></td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{asset('Backend/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('Backend/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('Backend/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('Backend/js/responsive.bootstrap4.min.js')}}"></script>
    <script>
        $(function () {
            $("#example1").DataTable({
                "responsive": true,
                "autoWidth": false,
            });
        });
    </script>
@endsection
