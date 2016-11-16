@extends('app')
@section ('content')
    <div class="container">
    <h1>Products</h1>
        <br>
        <a href="{{route('inserir-produto')}}" class ="btn btn-default">Insert</a>
        <br>
        <br>
        <table class ="table">
            <tr>
                <th>ID</th>
                <th>Category</th>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Featured</th>
                <th>Recommend</th>
                <th>Action</th>
            </tr>
            @foreach($products as $product)
                <tr>
                    <td> {{$product->id}} </td>
                    <td> {{$product->category->name}}</td>
                    <td> {{$product->name}} </td>
                    <td> {{$product->description}} </td>
                    <td> {{$product->price}} </td>
                    <td> @if($product->featured==1)Yes
                         @else No
                         @endif
                    </td>
                    <td> @if ($product->recommend==1)Yes
                        @else No
                        @endif</td>
                    <td>
                        <a href="{{route('excluir-produto',['id'=>$product->id])}}">Delete</a> |
                        <a href="{{route('editar-produto',['id'=>$product->id])}}">Edit</a>
                    </td>
                </tr>
            @endforeach
        </table>
        <!-- O comando abaixo reideriza e exibe os botoes da paginação informada no AdminProductsController -->
        {!! $products->render() !!}
    </div>
@endsection