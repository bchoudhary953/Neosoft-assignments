@extends('Backend.Layout.master')
@section('title')
    Dashboard
@endsection

@section('styles')
@endsection

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Dashboard</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->

<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <!-- Info boxes -->
        <div class="row">
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box">
                    <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text"><a href="/user_management" style="color: black">Active User</a></span>
                        <span class="info-box-number">{{$userCount}}</span>
                </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-danger elevation-1"><i class="ion ion-bag"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text"><a href="/admin/view-orders" style="color: black">Total Orders</a></span>
                        <span class="info-box-number">{{$ordersCount}}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->

            <!-- fix for small devices only -->
            <div class="clearfix hidden-md-up"></div>

            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Orders Delivered</span>
                        <span class="info-box-number">{{$deliveredOrder}}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-arrow-down"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text"><a href="/admin/view-coupons" style="color: black">Coupon</a></span>
                        <span class="info-box-number">{{$couponCount}}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
        </div>
    </div>
    <div class="py-12">
        <h3>Sales Chart</h3>

        <div id="barchart_material" style="width: "></div>   
    </div>
    
    <!-- /.card-body -->
   
    <!-- /.footer -->

</section>
    <!-- /.card -->

</div>


@endsection

@section('scripts')

    <script src="{{asset('Backend/js/Chart.min.js')}}"></script>
    <script src="{{asset('Backend/js/dashboard2.js')}}"></script>
    <script src="{{asset('Backend/js/adminlte.js')}}"></script>
    <script src="{{asset('Backend/js/jquery.mapael.min.js')}}"></script>
    <script src="{{asset('Backend/js/usa_states.min.js')}}"></script>
    <!-- Charting library -->
    <script src="https://unpkg.com/echarts/dist/echarts.min.js"></script>
    <!-- Chartisan -->
    <script src="https://unpkg.com/@chartisan/echarts/dist/chartisan_echarts.js"></script>
    <!-- Your application script -->
    <!--script>
      const salesChart = new Chartisan({
        el: '#sales-chart-container',
        url: "/sales_chart",
        
      });
    </script-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">

      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Months', 'Sales'],

            @php
              foreach($salesGraph as $product) {
                  echo "['".$product->month."', ".$product->total_amount."],";
              }
            @endphp
        ]);

        var options = {
          chart: {
            title: ' Bar Graph | Sales',
          },
          colors:['red'],
          bars: 'vertical', 

        };
        var chart = new google.charts.Bar(document.getElementById('barchart_material'));
        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
    <!--script type="text/javascript">

      // Load the Visualization API and the corechart package.
      google.charts.load('current', {'packages':['corechart']});

      // Set a callback to run when the Google Visualization API is loaded.
      google.charts.setOnLoadCallback(drawChart);

      // Callback that creates and populates a data table,
      // instantiates the pie chart, passes in the data and
      // draws it.
      function drawChart() {

        // Create the data table.
        var data = google.visualization.arrayToDataTable([
            ['Months','Sales'],
            @php
                foreach($salesGraph as $product){
                    echo "['".$product->month."',".$product->total_amount."],";
                }
            @endphp
            ]);
        // Set chart options
        var options = {
            title:'Monthly Data',
            hAxis:{
                title:'Months'
            },
            vAxis:{
                title: 'Orders Placed'
            },
            colors:['red'],
            chartArea: {
                width:'50%',
                height:'80%',
            }
            };

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script-->

@endsection
