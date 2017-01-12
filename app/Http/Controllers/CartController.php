<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Cart;
use CodeCommerce\Product;
use CodeCommerce\Http\Requests;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    private $cart;

    // injeção de dependência de metodo estático
    /**
     * CartController constructor.
     * @param Cart $cart
     */
    public function __construct (Cart $cart)
    {
        $this->cart = $cart;
    }

    public function index()
    {
        //se nao existir tiver uma sessao chamada cart
        if (!Session::has('cart')){
            //crio uma sessao chamada cart
            Session::set('cart', $this->cart);
        }
        //passa o conteuda da sessão para a view e retorna a view
        return view('store.cart', ['cart'=>Session::get('cart')]);
    }

    public function add($id)
    {
        if (Session::has('cart')){
            $cart = Session::get('cart');
        } else {
            $cart = $this->cart;
        }
        $product = Product::find($id);
        $cart->add($id,$product->name, $product->price);
        Session::set('cart',$cart);
        return redirect()->route('exibir_carrinho');
    }
}
