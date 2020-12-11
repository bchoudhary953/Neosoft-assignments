<!doctype HTML>
<html>
<head></head>
<body>
<table width="700px" border="0" cellpadding="0" cellspacing="0" >
    <tr><td>&nbsp;</td></tr>
    <tr><td><img src="{{asset('Frontend/img/home/logo.png')}}"></td></tr>
    <tr><td>&nbsp;</td></tr>
    <tr><td>Hello {{$orders['name']}},</td></tr>
    <tr><td>&nbsp;</td></tr>
    <tr><td>Thank You for shopping with us. You can check your order status:-</td></tr>
    <tr><td>&nbsp;</td></tr>
    <tr><td>Order No.: {{$orders['id']}}</td></tr>
    <tr><td>&nbsp;</td></tr>
    <tr><td>Order Status.: {{$orders['order_status']}}</td></tr>
    <tr><td>&nbsp;</td></tr>
    <tr><td>Bill to:-</td></tr>
    <tr>
        <td>
            <table width="100%" cellpadding="10" cellspacing="10" bgcolor="#cccccc">
                <tr>
                    <td width="50%">User Address</td>
                    <td>{{$userDetail['address1']}},{{$userDetail['address2']}},{{$userDetail['pin_code']}},{{$userDetail['state']}},{{$userDetail['country']}}</td>
                </tr>
                <tr>
                    <td width="50%">Billing Address</td>
                    <td>{{$orders['address1']}},{{$orders['address2']}},{{$orders['pin_code']}},{{$orders['state']}},{{$orders['country']}}</td>
                </tr>
                <tr>
                    <td width="50%">Shipping Address</td>
                    <td>{{$shippingDetail['address1']}},{{$shippingDetail['address2']}},{{$shippingDetail['pin_code']}},{{$shippingDetail['state']}},{{$shippingDetail['country']}}</td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td>
            <table>
                <tr>
                    <td colspan="5" align="right">Payment Method:</td>
                    <td>{{$orders['payment_method']}}</td>
                </tr>
            </table>
        </td>
    </tr>
</table>
</body>
</html>
