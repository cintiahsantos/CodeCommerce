@extends('app')
@section ('content')
    <div class="container">
        <h1>Categories</h1>
        <br>
        <a href="{{route('inserir-categoria')}}" class ="btn btn-default">Insert</a>
        <br>
        <br>
        <table class ="table">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Action</th>
            </tr>
            @foreach($categories as $category)
            <tr>
                <td> {{$category->id}} </td>
                <td> {{$category->name}} </td>
                <td> {{$category->description}} </td>
                <td>
                    <a href="{{route('excluir-categoria',['id'=>$category->id])}}">Delete</a> |
                    <a href="{{route('editar-categoria',['id'=>$category->id])}}">Edit</a>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
@endsection