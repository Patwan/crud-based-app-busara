@extends('admin.layout.admin')

@section('stylesheets')

    {!! Html::style('css/parsley.css') !!}

@endsection

@section('content')

    <h4 style="color: blue;"> <u> All fields marked with <strong> * </strong>are mandatory </u> </h4>
    @include('admin.layout.includes.message')
    <hr>

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            {!! Form::open(['route' => 'api.store', 'method' => 'POST', 'files' => true, 'data-parsley-validate'=>'']) !!}

            <div class="form-group">
                {{ Form::label('name', '* Name') }}
                {{ Form::text('name', null, array('class' => 'form-control','required'=>'', 'placeholder' => 'e.g Nelson Mandela', 'minlength'=>'5', 'maxlength'=>'15')) }}
            </div>

            <div class="form-group">
                {{ Form::label('email', 'Email (optional)') }}
                {{ Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'e.g email@email.com']) }}
            </div>

            <div class="form-group">
                {{ Form::label('description', 'Description (optional)') }}
                {{ Form::textarea('description', null, array('class' => 'form-control', 'minlength'=>'20', 'placeholder' => 'Please insert a minimum of 20 and a maximum of 180 characters')) }}
            </div>
            <div class="form-group">
                {{ Form::label('phone', '* Phone Number') }}
                {{ Form::text('phone', null, array('class' => 'form-control' , 'required'=>'','minlength'=>'10', 'maxlength'=>'15', 'placeholder' => 'e.g +254*********', 'data-parsley-phone' => "")) }}
            </div>

            <div class="form-group">
                {{ Form::label('age', '* Age') }}
                {{ Form::text('age', null, array('class' => 'form-control' , 'required'=>'' , 'maxlength'=>'3', 'data-parsley-type' => 'integer', 'placeholder' => 'e.g 100')) }}
            </div>

            <div class="form-group">
                {{ Form::label('imageName', ' * Upload Photo') }}
                {{ Form::file('imageName', ['class' => 'form-control', 'required' => '']) }}
            </div>

             {{ Form::submit('Create', array('class' => 'btn btn-default')) }}
            {!! Form::close() !!}

        </div>
    </div>
@endsection

@section('scripts')

    {!! Html::script('js/parsley.js') !!}
    {!! Html::script('js/customParsley.js') !!}

@endsection