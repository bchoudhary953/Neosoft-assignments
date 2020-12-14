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
    @include('Backend.Layout.topbar')
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    @include('Backend.Layout.sidebar')
        <!-- Sidebar -->

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
    @include('Backend.Layout.footer')
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
<script src="{{asset('Backend/js/dashboard2.js')}}"></script>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
<script src="http://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!--script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script-->
<link rel="stylesheet" href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css">
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<!-- Charting library -->
    <script src="https://unpkg.com/echarts/dist/echarts.min.js"></script>
    <!-- Chartisan -->
    <script src="https://unpkg.com/@chartisan/echarts/dist/chartisan_echarts.js"></script>
    <!-- Your application script -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
    
<script>
    $(document).ready(function () {
        
        //banner status
        $(".BannerStatus").change(function () {
            alert("Error");
            var id = $(this).attr('rel');
            //alert(id);
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
        //category status
        $(".CategoryStatus").change(function () {
            // alert("Error");
            var id = $(this).attr('rel');
            if ($(this).prop("checked") == true) {
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'post',
                    url: '/update-category-status',
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
                    url: '/update-category-status',
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
        //CMS Page Status
        $(".CmsStatus").change(function () {
            var id = $(this).attr('rel');
            if ($(this).prop("checked") == true) {
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'post',
                    url: '/update-cms-status',
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
                    url: '/update-cms-status',
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
        //User status
        $(".UserStatus").change(function () {
            var id = $(this).attr('rel');
            if ($(this).prop("checked") == true) {
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'post',
                    url: '/update-user-status',
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
            } else {
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'post',
                    url: '/update-user-status',
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
        //product status
        $(".FeatureStatus").change(function () {
            var id = $(this).attr('rel');
            if ($(this).prop("checked") == true) {
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'post',
                    url: '/update-Product-Status',
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
                    url: '/update-Product-Status',
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
        //coupon status
        $(".CouponStatus").change(function () {
            var id = $(this).attr('rel');
            if ($(this).prop("checked") == true) {
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'post',
                    url: '/update-Coupon-Status',
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
                    url: '/update-Coupon-Status',
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
        //Add product attribute
        $(document).ready(function () {
            var maxField = 10; //Input fields increment limitation
            var addButton = $('.add_button'); //Add button selector
            var wrapper = $('.field_wrapper'); //Input field wrapper
            var fieldHTML = '<div class="d-flex"><input type="text" name="sku[]" id="sku[]" style="width: 120px;" placeholder="SKU" CLASS="form-control mr-2 mt-2" value=""/><input type="text" name="size[]" id="size[]" style="width: 120px;" placeholder="SIZE" CLASS="form-control mr-2 mt-2" value=""/><input type="text" name="price[]" id="price[]" style="width: 120px;" placeholder="PRICE" CLASS="form-control mr-2 mt-2" value=""/><input type="text" name="stock[]" id="stock[]" style="width: 120px;" placeholder="STOCK" CLASS="form-control mt-2" value=""/><a href="javascript:void(0);" class="remove_button" style="color:black">Remove</a></div>'; //New input field html
            var x = 1; //Initial field counter is 1

            //Once add button is clicked
            $(addButton).click(function () {
                //Check maximum number of input fields
                if (x < maxField) {
                    x++; //Increment field counter
                    $(wrapper).append(fieldHTML); //Add field html
                }
            });

            //Once remove button is clicked
            $(wrapper).on('click', '.remove_button', function (e) {
                e.preventDefault();
                $(this).parent('div').remove(); //Remove field html
                x--; //Decrement field counter
            });
        });
    });

</script>
@yield('scripts')
</body>
</html>
