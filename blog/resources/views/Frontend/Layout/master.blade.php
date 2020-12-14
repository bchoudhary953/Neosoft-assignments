<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>@yield('title')</title>
    <link href="{{asset('Frontend/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('Frontend/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('Frontend/css/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{asset('Frontend/css/price-range.css')}}" rel="stylesheet">
    <link href="{{asset('Frontend/css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('Frontend/css/main.css')}}" rel="stylesheet">
    <link href="{{asset('Frontend/css/responsive.css')}}" rel="stylesheet">
    @yield('styles')
    <script src="{{asset('Frontend/js/html5shiv.js')}}"></script>
    <script src="{{asset('Frontend/js/respond.min.js')}}"></script>
    <![endif]-->
    <link rel="shortcut icon" href="{{asset('/Frontend/img/ico/favicon.ico')}}">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{asset('/Frontend/img/ico/apple-touch-icon-144-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{asset('/Frontend/img/ico/apple-touch-icon-114-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{asset('/Frontend/img/ico/apple-touch-icon-72-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" href="{{asset('/Frontend/img/ico/apple-touch-icon-57-precomposed.png')}}">
</head><!--/head-->

<body>
<!--/header-->
@include('Frontend.Layout.header');
@yield('content')

@include('Frontend.Layout.footer')
<!--/Footer-->


@yield('scripts')
<script src="{{asset('Frontend/js/jquery.js')}}"></script>
<script src="{{asset('Frontend/js/bootstrap.min.js')}}"></script>
<script src="{{asset('Frontend/js/jquery.scrollUp.min.js')}}"></script>
<script src="{{asset('Frontend/js/price-range.js')}}"></script>
<script src="{{asset('Frontend/js/jquery.prettyPhoto.js')}}"></script>
<script src="{{asset('Frontend/js/main.js')}}"></script>
<script src="{{asset('Frontend/js/jquery-migrate-1.4.1.min.js')}}"></script>

<script>
    //Add address
    $(document).ready(function () {
            var maxField = 10; //Input fields increment limitation
            var addButton = $('.add_button'); //Add button selector
            var wrapper = $('.field_wrapper'); //Input field wrapper
            var fieldHTML = '<div style="display: flex;"><input type="text" name="address1[]" id="address1[]" style="width: 550px;" placeholder="Address1" CLASS="form-control mr-2 mt-2" value=""/>' +
            '<input type="text" name="address2[]" id="address2[]" style="width: 550px;" placeholder="Address2" CLASS="form-control mr-2 mt-2" value=""/>' +
            '<input type="text" name="pin_code[]" id="pin_code[]" style="width: 150px;" placeholder="Pin Code" CLASS="form-control mr-2 mt-2" value=""/>' +
            '<input type="text" name="state[]" id="state[]" style="width: 150px;" placeholder="State" CLASS="form-control mt-2" value=""/><input type="text" name="country[]" id="country[]" style="width: 150px;" placeholder="Country" CLASS="form-control mt-2" value=""/><a href="javascript:void(0);" class="remove_button" style="color:black">Remove</a></div>'; //New input field html
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

    //Billing address to shipping address
        $('#billtoship').click(function (){
            if (this.checked){
                $('#shipping_first_name').val($('#billing_first_name').val());
                $('#shipping_address1').val($('#billing_address1').val());
                $('#shipping_address2').val($('#billing_address2').val());
                $('#shipping_pin_code').val($('#billing_pin_code').val());
                $('#shipping_state').val($('#billing_state').val());
                $('#shipping_country').val($('#billing_country').val());
                $('#shipping_mobile_no').val($('#billing_mobile_no').val());

            }
        });
        //add existing address to billing address
        $('#addtobill').click(function (){
            if (this.checked){
                $('#billing_address1').val($('#billing1_address1').val());
                $('#billing_address2').val($('#billing1_address2').val());
                $('#billing_pin_code').val($('#billing1_pin_code').val());
                $('#billing_state').val($('#billing1_state').val());
                $('#billing_country').val($('#billing1_country').val());
              //  $('#shipping_mobile_no').val($('#billing_mobile_no').val());

            }
        });/*
        $('#addtobill').click(function (){
          
              var ele = document.getElementsByName('billing_address'); 
                  
                for(i = 0; i < ele.length; i++) { 

                    if(ele[i].checked) {
                        $('#billing_address1').val($('#billing1_address1').val());
                    
                        $('#billing_address2').val($('#billing1_address2').val());
                        $('#billing_pin_code').val($('#billing1_pin_code').val());
                        $('#billing_state').val($('#billing1_state').val());
                        $('#billing_country').val($('#billing1_country').val());
                      //  $('#shipping_mobile_no').val($('#billing_mobile_no').val());
                }
            }
        
        });*/
        //add existing address to shipping address
        $('#addtoship').click(function (){
            if (this.checked) {
                $('#shipping_address1').val($('#shipping1_address1').val());
                $('#shipping_address2').val($('#shipping1_address2').val());
                $('#shipping_pin_code').val($('#shipping1_pin_code').val());
                $('#shipping_state').val($('#shipping1_state').val());
                $('#shipping_country').val($('#shipping1_country').val());
                //  $('#shipping_mobile_no').val($('#billing_mobile_no').val());

            }
        });
        $(document).ready(function(){
        $('#selSize').change(function(){
            var idSize = $(this).val();
           // alert(idSize);
            $.ajax({
                type: 'get',
                url: '/get-product',
                data: {idSize:idSize},
                success:function(data){
                    console.log(data);
                    $('#getPrice').htm;("US"+resp);
                },error:function(){
                    alert("Error");
                }
            });

        });
    });
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
</body>
</html>
