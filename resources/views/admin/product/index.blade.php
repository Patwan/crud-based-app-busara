@extends('admin.layout.admin')

@section('content')

<h3>All Contacts</h3>
 @include('admin.layout.includes.message')
 <hr>
<div class="container">
    <div class="row">
		<div class="col-md-8">
        	<table class='table tabble-hover'>
				<thead>
					<th> # </th>
					<th> Name</th>
					<th> Email</th>>
					<th> Description </th>
					<th> Phone </th>
					<th> Image</th>
					<th> Created On</th>
					<th> Action</th>
				</thead>

				<tbody>
					 @forelse($pro as $prod)
						<tr> 
							<th> {{ $prod->id }} </th>
							<th> {{$prod->name}}  </th>
							<th> {{$prod->email ? "$prod->email" : "Not available"}}  </th>
							<td> {{ substr($prod->description, 0, 17) }} {{ strlen($prod->description) > 17? "...." : " " }}</td>
							<th> {{$prod->phone}}  </th>
							<th> 
								@if( $prod->imageName )
									<img style="width: 130%;" src="{{ asset('images/uploads/'.$prod->imageName) }}" alt="img" />
								@else
									Not available
								@endif
							</th>
							<td> {{ date('M j, Y', strtotime($prod->created_at )) }}</td>
							<td> 
								<a href="{{ route('product.edit', $prod->id)}}" class="btn btn-success btn-sm">Edit Product</a>

								<br>

								<a href="{{ route('product.delete', $prod->id) }}" class="btn btn-danger btn-block"> Delete </a>

						    </td>
						</tr>
						@empty
						<h3>No Contacts found</h3>
					@endforelse
						{!! $pro->links();!!}
				</tbody>
			</table>
    		 <div class='text-center'>
				<b> Project by <a href="http://pwebk.com"> Martin Ndungu</a></b>
			</div>
		</div>
    </div>
</div>


@endsection