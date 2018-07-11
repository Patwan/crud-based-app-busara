<!DOCTYPE html>
<html> 
<head>
	<title> PDF document </title>
	<style type="text/css">
		h1{
			color:red;
		}

		.clear{
			clear: both;
		}
		.title{
			text-decoration: underline dotted red;
			font-weight: bold;
		}
		
		table, th, td {
    		border: 1px solid #000000;
		} 

		table{
			border-spacing: 1px;
		}

		th, td{
			padding: 10px;
		}

		th{
			text-align: left;
		}

		table tr:nth-child(odd){
			background-color: #e6e6e6;
		}

		table tr:nth-child(even){
			background-color: #f2f2f2;
		}

	</style>
</head>
<body>
	<table style="width: 100%"> 
		<caption> <h1> All Contacts </h1></caption>
		<thead>
			<th> # </th>
			<th> Name</th>
			<th> Email</th>
			<th> Age </th>
			<th> Details </th>
			<th> Phone </th>
		</thead>

		<tbody>
			@forelse($pro as $p)
				<tr> 
					<td> {{ $p->id }}</td>
					<td> {{ $p->name }}</td>
					<td> {{$p->email ? "$p->email" : "Not Available"}}  </td>
					<td> {{ $p->age }} yrs </td>
					<td> {{ substr($p->description, 0, 14) }} {{ strlen($p->description) > 20 ? "...." : " " }} </td>
					<td> {{ $p->phone }}  </td>
				</tr>
				@empty
				<h3>No contacts found</h3>
			@endforelse
		</tbody>
    </table>

</body>
</html>