@extends('Backend.Layout.master')
@section('title')
    Registered User Report Result
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
                     <h3 class="card-title">ALL REGISTERED USER OF
                            @php
                                if(isset($date))
                                {
                                    echo $date ;
                                }
                                elseif(isset($month) && isset($year))
                                    echo $month-$year;
                                else
                                        echo  $year;

                            @endphp
                        </h3>     
                </div>
                <!-- /.card-header -->
                <div id="message_success" style="display: none;" class="alert alert-success">Status Enabled</div>
                <div id="message_error" style="display: none;" class="alert alert-danger">Status Disabled</div>

                <div class="card-body table-responsive">
                    <table class="table table-head-fixed text-nowrap"  id="example1">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Status</th>
                            <th colspan="2">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php
                            $s1=1;
                        @endphp
                        @foreach($users as $row)
                            <tr>
                                <td>{{$s1++}}</td>
                                <td>{{$row->first_name}}</td>
                                <td>{{$row->last_name}}</td>
                                <td>{{$row->email}}</span></td>
                                <td>{{$row->user_type}}</td>
                                <td>
                                    <input type="checkbox" style="width: 20px;" name="status" class="UserStatus" data-toggle="toggle" rel="{{$row->id}}" data-on="Enabled" data-off="Disabled" data-onstyle="success" data-offstyle="danger"  @if($row['status']=="1")checked @endif>
                                    <div id="myElem" style="display: none;" class="alert alert-success">Status Enabled</div>
                                </td>
                                <td><a href="/role-edit/{{$row->id}}"> <button class="btn btn-success"><i class="fas fa-pen"></i></button></a></td>
                                <td>
                                    <form action="/role-delete/{{$row->id}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger" type="submit"><i class="fas fa-trash"></i></button>
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
