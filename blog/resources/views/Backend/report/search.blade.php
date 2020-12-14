@extends('Backend.Layout.master')
@section('title')
    Sales Report
@endsection

@section('styles')
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="card bg-light">
                    <div class="card-header">
                        <h3 class="card-title">Search By Date</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{url('/exportOrder')}}" method="post">
                            @csrf
                            <label>Take a Date</label>
                            <input type="date" class="form-control" name="date" @error('date') is-invalid @enderror" value="{{ old('date') }}" autocomplete="date">
                            
                        @error('date')
                            <span class="invalid-feedback " style="margin-left: 120px;" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                            <button class="btn btn-primary mt-2" type="submit">Search</button>
                        </form>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <div class="col-md-4">
                <div class="card bg-light">
                    <div class="card-header">
                        <h3 class="card-title">Search By Month</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{url('/exportMOrder')}}" method="post">@csrf
                            <LABEL>Select a Month</LABEL>
                            <select class="form-control" name="month">
                                <option value="1">January</option>
                                <option value="2">February</option>
                                <option value="3">March</option>
                                <option value="4">April</option>
                                <option value="5">May</option>
                                <option value="6">June</option>
                                <option value="7">July</option>
                                <option value="8">August</option>
9                                <option value="10">October</option>
                                <option value="11">November</option>
                                <option value="12">December</option>
                            </select>
                            <LABEL>Select a Year</LABEL>
                            <select class="form-control" name="year">
                                <option value="2020">2020</option>
                                <option value="2021">2021</option>
                            </select>
                            <button class="btn btn-primary mt-2" type="submit">Search</button>
                        </form>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <div class="col-md-4">
                <div class="card bg-light">
                    <div class="card-header">
                        <h3 class="card-title">Search By Year</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{url('/exportYOrder')}}" method="post">@csrf
                            <LABEL>Select a Month</LABEL>
                            <select class="form-control" name="year">
                                <option value="2020">2020</option>
                                <option value="2021">2021</option>
                            </select>
                            <button class="btn btn-primary mt-2" type="submit">Search</button>
                        </form>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{asset('Backend/js/Chart.min.js')}}"></script>
    <script src="{{asset('Backend/js/dashboard2.js')}}"></script>
    <script src="{{asset('Backend/js/adminlte.js')}}"></script>
    <script src="{{asset('Backend/js/jquery.mapael.min.js')}}"></script>
    <script src="{{asset('Backend/js/usa_states.min.js')}}"></script>

@endsection
