@extends('app')
@section ('content')
    <div class="container">
        <h1>Edit Product: {{ $product->name }}</h1>
        <!--{{print_r($errors)}} -->
        @if ($errors->any())
            <ul class ="alert">
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        @endif
        {!! Form::open(['route'=>['atualizar-produto', $product->id], 'method'=>'put'])!!}
        <div class="form-group">
            {!! Form::label('name','Name:') !!}
            {!! Form::text('name',$product->name,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('description','Description:') !!}
            {!! Form::textarea('description',$product->description,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('price','Price:') !!}
            {!! Form::text('price',$product->price,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('featured','Featured?') !!}
            {!! Form::label('Yes','Yes') !!}
            {!! Form::radio('featured', 1, $product->featured==1 )!!}
            {!! Form::label('No','No') !!}
            {!! Form::radio('featured', 0, $product->featured==0) !!}
        </div>
        <div class="form-group">
            {!! Form::label('recommend','Recommend?') !!}
            {!! Form::label('Yes','Yes') !!}
            {!! Form::radio('recommend', 1, $product->recommend==1) !!}
            {!! Form::label('No','No') !!}
            {!! Form::radio('recommend', 0, $product->recommend==0) !!}
        </div>
        <div class="form-group">
            {!! Form::submit('Save Product',['class'=>'btn btn-primary']) !!}
        </div>

        {!! Form::close()!!}
    </div>
@endsection