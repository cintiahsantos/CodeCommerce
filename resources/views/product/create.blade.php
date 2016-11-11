@extends('app')
@section ('content')
    <div class="container">
        <h1>Create Product</h1>
        <!--{{print_r($errors)}} -->
        @if ($errors->any())
            <ul class ="alert">
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        @endif
        {!! Form::open(['route'=>'gravar-produto'])!!}
        <div class="form-group">
            {!! Form::label('name','Name:') !!}
            {!! Form::text('name',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('description','Description:') !!}
            {!! Form::textarea('description',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('price','Price:') !!}
            {!! Form::text('price',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('featured','Featured?') !!}
            {!! Form::label('Yes','Yes') !!}
            {!! Form::radio('featured', 1) !!}
            {!! Form::label('No','No') !!}
            {!! Form::radio('featured', 0, 1) !!}
        </div>
        <div class="form-group">
            {!! Form::label('recommend','Recommend?') !!}
            {!! Form::label('Yes','Yes') !!}
            {!! Form::radio('recommend', 1) !!}
            {!! Form::label('No','No') !!}
            {!! Form::radio('recommend', 0, 1) !!}
        </div>
        <div class="form-group">
            {!! Form::submit('Add Product',['class'=>'btn btn-primary']) !!}
        </div>

        {!! Form::close()!!}
    </div>
@endsection