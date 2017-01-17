@extends('store.store')
@section('content')
    <section id="cart_items">
        <div class="container">
            <div class="table-reponsive cart_info">
                <table class="table table-condensed">
                    <thead>
                        <tr class="cart_menu">
                            <td class="image">Item</td>
                            <td class="description"></td>
                            <td class="price">Valor</td>
                            <td class="qtd">Qtd</td>
                            <td class="total">Total</td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- forelse é um foreach com else, utilizado para tratar o array vazio "empty" -->
                        @forelse($cart->all() as $k=>$item)
                            <tr>
                                <td class="cart_product">
                                    <a href="{{route('exibir_detalhes_produto',['id'=>$k])}}">
                                        Imagem
                                    </a>
                                </td>
                                <td class="cart_description">
                                    <h4><a href="#">{{$item['name']}}</a> </h4>
                                    <p>Código:{{$k}}</p>
                                </td>
                                <td class="cart_price">
                                    R$ {{$item['price']}}
                                </td>
                                <td class="cart_quantity">
                                    <div class="cart_qty_button">
                                        <input class="cart_qty_input" type="number" min="1" max="99" style="width: 4em;"
                                               name="quantity" id="quantity" value="{{$item['qtd']}}"
                                               onChange ="updateQty('{{$k}}',this.value)">
                                    </div>
                                </td>
                                <td class="cart_total">
                                    <p class="cart_total_price"> R${{$item['price'] * $item['qtd']}}</p>
                                </td>
                                <td class="cart_delete">
                                    <a href="{{route('excluir_item_carrinho',['id'=>$k])}}" class="cart_quantity_delete">Delete</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td class="" colspan="6">
                                    <p>Nenhum item encontrado.</p>
                                </td>
                            </tr>
                        @endforelse
                        <tr class="cart_menu">
                            <td colspan="6">
                                <div class="pull-right">
                                    <span style="margin-right:75px">
                                        TOTAL: R${{$cart->getTotal()}}
                                    </span>
                                    <a href="#" class="btn btn-success">Finalizar a Compra</a>
                                </div>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </section>
    <script>
        function updateQty(id ,value){
            var url =  "{{ route('atualizar_qtd_item_carrinho', ['id' => ':id', 'qty' => ':value']) }}";
            url = url.replace(':id', id);
            url = url.replace(':value', value);
            document.location.href = url;
        }
    </script>
@stop