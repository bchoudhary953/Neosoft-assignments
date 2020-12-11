<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<div align="center">
		<a href="{{route('export_excel.excel')}}" class="btn btn-success">Export to excel</a>
	</div>
<table>
	<tr>
		<th>ID</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email</th>
	</tr>
	@foreach($users as $user)
	<tr>
		<td>{{$user->id}}</td>
		<td>{{$user->first_name}}</td>
		<td>{{$user->last_name}}</td>
		<td>{{$user->email}}</td>
	</tr>
	@endforeach
</table>
</body>
</html>