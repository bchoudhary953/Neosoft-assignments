<!doctype HTML>
<html>
<head><title></title></head>
<body>
<table>
    <tr><td>Dear Administrator!</td></tr>
    <tr><td>&nbsp;</td></tr>
    <tr>
            <table style="width: 600px; border: 1px solid black;" >
                <tr>
                    <td>User ID</td>
                    <td>Product ID</td>
                    <td>Product Name</td>
                </tr>
                @foreach($wishlists as $wish)
                    <tr>
                        <td> {{$wish['user_id']}}</td>
                        <td> {{$wish['product_id']}}</td>
                        <td> {{$wish['product_name']}}</td>
                    </tr>
                @endforeach
            </table>
        </tr>
    <tr><td>&nbsp;</td></tr>
    <tr><td>Thanks & Regard,</td></tr>
    <tr><td>E-commerce Website</td></tr>
</table>
</body>
</html>
