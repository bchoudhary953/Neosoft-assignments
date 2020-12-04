<!doctype html>
<!DOCTYPE html>
<html>
<head>
	<title>User List</title>
</head>
<body>
	<div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h3 class="card-title">User List</h3>
                </div>
                <!-- /.card-header -->
                <div id="message_success" style="display: none;" class="alert alert-sm alert-success">Status Enabled</div>
                <div id="message_error" style="display: none;" class="alert alert-danger">Status Disabled</div>
                <div><a class="btn btn-primary m-3 p-1" style=" width:140px;" href="{{url('/add-user')}}"><i class="fa fa-plus"></i> Add User</a></div>
                <div class="card-body table-responsive">
                    <table class="table table-head-fixed text-nowrap" id="example1">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Moobile Number</th>
                            <th>City</th>
                            <th>Gender</th>
                            <th>Image</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($user as $row1)
                            <tr>
                                <td>{{$row1->id}}</td>
                                <td>{{$row1->first_name}}</td>
                                <td>{{$row1->last_name}}</td>
                                <td>{{$row1->email}}</td>
                                <td>{{$row1->mobile_no}}</td>
                                <td>{{$row1->city}}</td>
                                <td>{{$row1->gender}}</td>
                                <td><img src="{{asset('/upload/user/'.$row1->profile_photo)}}" style="width: 250px;"></td>
                                <td>
                                    <input type="checkbox" name="status" class="UserStatus" data-toggle="toggle" rel="{{$row1->id}}" data-on="Enabled"
                                           data-off="Disabled" data-onstyle="success" data-offstyle="danger"  @if($row1['status']=="1")checked @endif>
                                    <div id="myElem" style="display: none;" class="alert alert-success">Status Enabled</div>
                                </td>
                                <td><a href="/edit-user/{{$row1->id}}"><button class="btn btn-success mr-2"><i class="fas fa-pen"></i></button></a>
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>