<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <title>@yield('title')</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('Backend/css/all.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{asset('Backend/css/adminlte.min.css')}}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    @yield('styles')
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
    <!-- Navbar -->
   
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
   

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        @yield('content')

                    </div>
                </div>

            </div><!-- /.container-fluid -->
        </section>

    </div>
    <!-- /.content-wrapper -->
    
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{asset('Backend/js/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('Backend/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('Backend/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('Backend/js/demo.js')}}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
<link rel="stylesheet" href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css">
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script>
    $(document).ready(function () {
        //banner status
        $(".UserStatus").change(function () {
            var id = $(this).attr('rel');
            if ($(this).prop("checked") == true) {
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'post',
                    url: '/update-status',
                    data: {status: '1', id: id},
                    success: function (data) {
                        $("#message_success").show();
                        setTimeout(function () {
                            $("#message_success").fadeOut('slow');
                        }, 2000);
                    }, error: function () {
                        alert("Error");
                    }
                });
            }
            else {
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'post',
                    url: '/update-status',
                    data: {status: '0', id: id},
                    success: function (resp) {
                        $("#message_error").show();
                        setTimeout(function () {
                            $("#message_error").fadeOut('slow');
                        }, 2000);
                    }, error: function () {
                        alert("Error");
                    }
                });
            }
        });
       

    });

</script>
@yield('scripts')
</body>
</html>
