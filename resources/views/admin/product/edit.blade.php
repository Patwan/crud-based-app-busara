@extends('admin.layout.admin')

@section('stylesheets')

    {!! Html::style('css/parsley.css') !!}

@endsection

@section('content')

    <h3>Edit Contact</h3>
    <hr>
    @include('admin.layout.includes.message')
    <div class="row">
        <div class= "col-md-6 col-md-offset-3">
        {!! Form::model($prod ,['route' => ['product.update',$prod->id], 'method' => 'PUT', 'files' => true, 'data-parsley-validate'=>'']) !!}
            
                <div class="form-group">
                {{ Form::label('name', '* Name') }}
                {{ Form::text('name', null, array('class' => 'form-control', 'disabled' => '', 'required'=>'','minlength'=>'5')) }}
            </div>

            <div class="form-group">
                {{ Form::label('email', 'Email (optional)') }}
                {{ Form::text('email', null, ['class' => 'form-control']) }}
            </div>

            <div class="form-group">
                {{ Form::label('description', 'Description (optional)') }}
                {{ Form::textarea('description', null, array('class' => 'form-control', 'minlength'=>'20')) }}
            </div>
            <div class="form-group">
                {{ Form::label('phone', '* Phone Number') }}
                {{ Form::text('phone', null, ['class' => 'form-control' , 'required'=>'','minlength'=>'10', 'maxlength'=>'15', 'data-parsley-phone' => ""] ) }}
            </div>

            <div class="form-group">
                {{ Form::label('age', '* Age') }}
                {{ Form::text('age', null, array('class' => 'form-control' , 'required'=>'' , 'data-parsley-type' => 'integer', 'maxlength'=>'3')) }}
            </div>

            <div class="form-group">
                {{ Form::label('imageName', '* Image') }}
                {{ Form::file('imageName',array('class' => 'form-control', 'required' => '')) }}
                <img style="max-width: 50%;" src="{{ asset('images/uploads/'.$prod->imageName) }}" alt="img" />
            </div>
                
                 {{ Form::submit('Save Changes', ['class' =>'btn btn-success btn-block'])  }}
        {!! Form::close() !!}
    </div>
    </div><!-- end of .row -->

@endsection


@section('scripts')

    {!! Html::script('js/parsley.js') !!}

    {!! Html::script('js/customParsley.js') !!}

@endsection
