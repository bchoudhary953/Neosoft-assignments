<!doctype HTML>
<html>
<head><title></title></head>
<body>
<table>
    <tr><td>Dear {{$user['name']}}!</td></tr>
    <tr><td>&nbsp;</td></tr>
    <tr><td>Response to your query:-</td></tr>
    <tr><td>&nbsp;</td></tr>
    <tr>
        <td>
            <table style="width: 600px;" border="1">
                <tr>
                    <td width="50%">Name</td>
                    <td width="50%">{{$user['name']}}</td>
                </tr>
                <tr>
                    <td width="50%">Email</td>
                    <td width="50%">{{$user['email']}}</td>
                </tr>
                <tr>
                    <td width="50%">Message</td>
                    <td width="50%">{{$user['message']}}</td>
                </tr>
                <tr>
                    <td width="50%">Subject</td>
                    <td width="50%">{{$user['subject']}}</td>
                </tr>
                <tr>
                    <td width="50%">Response</td>
                    <td width="50%">{{$user['response']}}</td>
                </tr>
            </table>
        </td>
    </tr>
    <tr><td>Thanks & Regard,</td></tr>
    <tr><td>E-commerce Website</td></tr>
</table>
</body>
</html>
