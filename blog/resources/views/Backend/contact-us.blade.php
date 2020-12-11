@extends('Backend.Layout.master')
@section('title')
    Contact Us Messages
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
                    <h3 class="card-title"> Messages </h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive">
                    <table class="table table-head-fixed text-nowrap"  id="example1">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>User ID</th>
                            <th> Name</th>
                            <th>Email</th>
                            <th>Message</th>
                            <th>Subject</th>
                            <th>Response</th>
                            <th colspan="2">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($messages as $row)
                            <tr>
                                <td>{{$row->id}}</td>
                                <td>{{$row->user_id}}</td>
                                <td>{{$row->name}}</td>
                                <td>{{$row->email}}</span></td>
                                <td>{{$row->message}}</td>
                                <td>{{$row->subject}}</td>
                                <td>{{$row->response}}</td>
                                <td><a href="/query-response/{{$row->id}}"> <button class="btn btn-success">Response</button></a></td>
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
