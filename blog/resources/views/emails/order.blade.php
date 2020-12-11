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
        <tr><td>Thank You for shopping with us. Your order detail are as below:-</td></tr>
        <tr><td>&nbsp;</td></tr>
        <tr><td>Order No.: {{$order_id}}</td></tr>
        <tr><td>&nbsp;</td></tr>
        <tr>
            <td>
                <table width="95%" cellpadding="5" cellspacing="5" bgcolor="#cccccc" border="1">
                    <tr>
                        <td>Product Name</td>
                        <td>Product Code</td>
                        <td>Quantity</td>
                        <td>Unit Price</td>
                    </tr>
                    @foreach($orders['orders'] as $product)
                    <tr>
                        <td>{{$product['product_name']}}</td>
                        <td>{{$product['product_code']}}</td>
                        <td>{{$product['product_qty']}}</td>
                        <td>{{$product['product_price']}}</td>
                    </tr>
                    @endforeach
                    <tr>
                        <td colspan="5" align="right">Total:</td>
                        <td>{{$orders['grand_total']}}</td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr><td>Bill to:-</td></tr>
        <tr>
            <td>
                <table width="100%" cellpadding="10" cellspacing="10" bgcolor="#cccccc" border="1">
                    <tr>
                        <td width="50%">User Address</td>
                        <td>{{$userDetail['address1']}},{{$userDetail['address2']}},{{$userDetail['pin_code']}},{{$userDetail['state']}},{{$userDetail['country']}}</td>
                    </tr>
                    <tr>
                        <td width="50%">Billing Address</td>
                        <td>{{$userDetail['address1']}},{{$userDetail['address2']}},{{$userDetail['pin_code']}},{{$userDetail['state']}},{{$userDetail['country']}}</td>
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
