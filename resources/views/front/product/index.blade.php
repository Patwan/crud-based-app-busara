@extends('front.layout.admin')

@section('stylesheets')

	{!! Html::style('css/table.css') !!}

@endsection

@section('content')

<h3>All Contacts</h3>
<div class="container">
    <div class="row">
    	<div class="row">
    		 <div class='col-md-2 md-offset-5'>
				<a href="{{ route('get.pdf') }}" class='btn btn-md btn-block btn-primary pull-right'> Download as PDF</a>
			</div>	
    	</div>
    	<div class="row">
			<div class="col-md-8">
	        	<table style="width: 100%;" class='table tabble-hover'>
					<thead>
						<th> # </th>
						<th> Name</th>
						<th> Email</th>
						<th> Age </th>
						<th> Details </th>
						<th> Phone </th>
						<th> Photo </th>
					</thead>

					<tbody>
						@forelse($con as $co)
							<tr> 
								<td> {{ $co->id }}</td>
								<td> {{ $co->name }}</td>
								<td> {{$co->email ? "$co->email" : "Not Available"}}  </td>
								<td> {{ $co->age }} yrs </td>
								<td> {{ substr($co->description, 0, 14) }} {{ strlen($co->description) > 14 ? "...." : " " }} </td>
								<td> {{ $co->phone }}  </td>
								<td> 
									@if( $co->imageName )
										<img style="width: 110%;" src="{{ asset('images/uploads/'.$co->imageName) }}" alt="img" />
									@else
										Not available
									@endif
								</td>
							</tr>
							@empty
							<h3>No contacts found</h3>
						@endforelse
						{!! $con->links(); !!}
					</tbody>
				</table>

	    		 <div class='text-center'>
					<b> All rights reserved.</b>
				</div>
			</div>
		</div>
    </div>
</div>

@endsection