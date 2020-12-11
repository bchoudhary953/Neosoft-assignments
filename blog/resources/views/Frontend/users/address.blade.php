@extends('Frontend.Layout.master')
@section('title')
    Addresses
@endsection

@section('styles')
    <link rel="stylesheet" href="{{asset('Backend/css//dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('Backend/css/responsive.bootstrap4.min.css')}}">
@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <div class="container">
        <div class="register-box justify-content-center w-100">
            <div class="card ">
                <div class="card-body register-card-body">
                    <div class="mb-4"><h4>Add Address in Your Address Book</h4></div>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form method="POST" enctype="multipart/form-data" action="{{url('/add-address')}}">
                        @csrf
                    
                        <div>
                            <div class="field_wrapper">
                                <div style="display: flex;">
                                    <input type="text" name="address1[]" id="address1[]" style="width: 320px;" placeholder="Address1" CLASS="form-control mr-2" value=""/>
                                    <input type="text" name="address2[]" id="address2[]" style="width: 320px;" placeholder="Address2" CLASS="form-control mr-2" value=""/>
                                    <input type="text" name="pin_code[]" id="pin_code[]" style="width: 150px;" placeholder="Pin Code" CLASS="form-control mr-2" value=""/>
                                    <input type="text" name="state[]" id="state[]" style="width: 150px;" placeholder="State" CLASS="form-control" value=""/>
                                    
                                    <select name="country[]" id="country[]" style="width: 150px;" CLASS="form-control">
                                          <option value="0">-- Country --</option>
                                @foreach($countries as $country)
                                        <option value="{{$country->country_name}}">{{$country->country_name}}</option>
                                @endforeach
                            </select>
                                    </select>
                                    <a href="javascript:void(0);" class="add_button" title="Add Field">Add</a>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <!-- /.col -->
                            <div class="d-flex p-2">
                                <a href=""><button type="submit" class="btn btn-primary mt-2">Add Address</button></a>
                            </div>
                            <!-- /.col -->
                        </div>
                    </form>

                </div>
                <!-- /.form-box -->
            </div><!-- /.card -->
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">View Address</h3>
                    </div>
                    <!-- /.card-header -->
                      <div class="card-body">
                        <form method="POST" enctype="multipart/form-data" action="{{url('/edit-address/'.$user->id)}}">
                            @csrf
                            <table id="example1" style="" class="table table-head-fixed text-nowrap">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Address1</th>
                                    <th>Address2</th>
                                    <th>Pin code</th>
                                    <th>State</th>
                                    <th>Country</th>
                                    <th class="align-content-center">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($user['addresses'] as $address)

                                    <tr>
                                        <td><input style="display: none; width: 100px;text-align: center" type="hidden" name="addr[]" value="{{$address->id}}">{{$address->id}}</td>
                                        <td><input style="width: 150px;text-align: center" type="text" name="address1[]" value="{{$address->address1}}"></td>
                                        <td><input style="width: 150px;text-align: center" type="text" name="address2[]" value="{{$address->address2}}"></td>
                                        <td><input style="width: 150px;text-align: center" type="text" name="pin_code[]" value="{{$address->pin_code}}"></td>
                                        <td><input style="width: 150px;text-align: center" type="text" name="state[]" value="{{$address->state}}"></td>
                                        <td><input style="width: 150px;text-align: center" type="text" name="country[]" value="{{$address->country}}"></td>
                                        <td> <input type="submit" value="update" class="btn btn-success" style="margin-right: 5px;" /><button class="btn btn-danger" ><a href="/delete-address/{{$address->id}}" style="color: white;">Delete</a></button></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </form>

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
