<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Category;
use Illuminate\Http\Request;
use CodeCommerce\Product;
use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;

class StoreController extends Controller
{
    public function index()
    {
        //O comando abaixo pega uma coleção de produtos em destaque, onde featured =1
        // embora funcione não é uma maneira elegante de programar
        //$pFeatured =Product::where('featured','=','1')->get();

        //O recomendado é usar consultas de escopo, que são craidas no model
        //e fazer a chamada deste função no controller, como nos comandos abaixo

        $pFeatured =Product::featured()->get();
        $pRecommend =Product::recommend()->get();

        $categories = Category::all();
        return view('store.index', compact('categories', 'pFeatured', 'pRecommend'));
    }

    public function productsByCategory($id)
   {
       //Retorna uma coleção de produtos de acordo com a query de escopo "scopeFeatured"
       // e em seguida "escopeByCategory, ou seja produtos em destaque de uma determinada categoria"
       $pFeatured = Product::featured()->byCategory($id)->get();

       //Retorna uma coleção de produtos de acordo com a query de escopo "scopeRecommend"
       // e em seguida "escopeByCategory, ou seja produtos, recomendados de uma determinada categoria"
       $pRecommend = Product::recommend()->byCategory($id)->get();

       $categories = Category::all();
       return view('store.index', compact('categories', 'pFeatured', 'pRecommend'));
   }

 }
