@extends('app')
@section ('content')
    <div class="container">
        <h1>Upload Image</h1>
        <!--{{print_r($errors)}} -->
        @if ($errors->any())
            <ul class ="alert">
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        @endif
        <!-- o 'enctype'=>"multipart/form-data" permite o envio de arquivos pelo formulario -->
        {!! Form::open(['route'=>['gravar-imagem',$product->id],'method'=>'post', 'enctype'=>"multipart/form-data"])!!}
        <div class="form-group">
            {!! Form::label('image','Image:') !!}
            {!! Form::file('image', null,['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Upload Image',['class'=>'btn btn-primary']) !!}
        </div>

        {!! Form::close()!!}
    </div>
@endsection