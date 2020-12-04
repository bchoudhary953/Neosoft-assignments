<!doctype html>
<!DOCTYPE html>
<html>
<head>
    <title>Add User</title>
</head>
<body>
    <div>
    <div class="register-box justify-content-center" style="width: 600px; margin-left: 200px;">
        <div class="card ">
            <div class="card-body register-card-body">
                <div class="mb-4"><h4>Add User</h4></div>
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <form method="POST" enctype="multipart/form-data" action="{{url('/save')}}">
                    @csrf
                    <div class="input-group mb-3">
                        First Name:
                        <input type="text" id="first_name" name="first_name" class="form-control @error('first_name') is-invalid @enderror" value="{{ old('first_name') }}" autocomplete="first_name" autofocus placeholder="First Name">
                        @error('first_name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="input-group mb-3">
                        Last Name:
                        <input type="text" id="last_name"  name="last_name" class="form-control @error('last_name') is-invalid @enderror" value="{{ old('last_name') }}" autocomplete="last_name" autofocus placeholder="Last Name">
                        @error('last_name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror   
                    </div>
                    <div class="input-group mb-3">
                        Email :
                        <input type="email" id="email"  name="email" class="form-control @error('email') is-invalid @enderror"value="{{ old('email') }}"autocomplete="email" autofocus placeholder="Email">
                        @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror 
                    </div>
                    <div class="input-group mb-3">
                        Mobile Number:
                        <input type="text" id="mobile_no" name="mobile_no" autocomplete="mobile_no" class="form-control @error('mobile_no') is-invalid @enderror"value="{{ old('mobile_no') }}" autofocus placeholder="Mobile Number">
                        @error('mobile_no')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror 
                    </div>
                    <div class="input-group mb-3">
                        City:
                        <input type="text" id="city" name="city" autocomplete="city" class="form-control @error('city') is-invalid @enderror"value="{{ old('city') }}" autofocus placeholder="City">
                        @error('city')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror 
                    </div>
                    <div class="input-group mb-3">
                        Gender:
                        <input type="text" id="gender" name="gender" autocomplete="gender" class="form-control @error('gender') is-invalid @enderror"value="{{ old('gender') }}" autofocus placeholder="Gender">
                        @error('gender')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror 
                    </div>
                    
                   <div class="input-group mb-3">
                         Profile Photo:
                        <input type="file" name="image" class="form-control @error('gender') is-invalid @enderror"value="{{ old('image') }}">
                          @if ($errors->has('file'))
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $errors->first('file') }}</strong>
                              </span>
                          @endif 
                    </div>
                    <div class="row">
                        <!-- /.col -->
                        <div class="d-flex p-2">
                            <a href=""><button type="submit" class="btn btn-primary m-2 ml-5">Add User</button></a>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
            </div>
            <!-- /.form-box -->
        </div><!-- /.card -->
    </div>
    </div>
   
</body>
</html>
