@extends('admin.layout.admin')

@section('content')

	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h1> Are you sure you want to delete <u> {{ $pro->name}} </u> from contact list? </h1>
			<br> <br>

			{{ Form::open(['route' => ['product.destroy' , $pro->id] , 'method' => 'DELETE']) }}
				{{ Form::submit('YES, DELETE THIS CONTACT' , ['class' => 'btn btn-lg btn-block btn-danger']) }}

			{{ Form::close() }}

			<br>
			{{  Html::linkRoute('product.index', '<< Go back', [], ['class' =>'btn btn-default btn-block btn-h1-spacing']) }}
			
		</div>
	</div>

@endsection