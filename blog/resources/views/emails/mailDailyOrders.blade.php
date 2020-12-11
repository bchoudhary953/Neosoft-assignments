<!doctype HTML>
<html>
<head><title></title></head>
<body>
<table>
    <tr><td>Dear Administrator!</td></tr>
    <tr><td>&nbsp;</td></tr>
    <tr><td>
            <table style="width: 600px; border: 1px solid black;" >
                <tr>
                    <td>Order ID</td>
                    <td>User ID</td>
                    <td>User name</td>
                    <td>Total</td>
                    <td>Payment Method</td>
                    <td>Order Status</td>
                </tr>
                @foreach($orders as $order)
                <tr>
                    <td> {{$order['id']}}</td>
                    <td> {{$order['user_id']}}</td>
                    <td> {{$order['name']}}</td>
                    <td> {{$order['grand_total']}}</td>
                    <td> {{$order['payment_method']}}</td>
                    <td> {{$order['order_status']}}</td>
                </tr>
                @endforeach
            </table>
        </td></tr>
    <tr><td>&nbsp;</td></tr>
    <tr><td>Thanks & Regard,</td></tr>
    <tr><td>E-commerce Website</td></tr>
</table>
</body>
</html>
