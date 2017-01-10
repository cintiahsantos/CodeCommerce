<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Category;
use Illuminate\Http\Request;
use CodeCommerce\Product;
use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;
use CodeCommerce\Tag;

class StoreController extends Controller
{
    public function index()
    {
        //O comando comentado abaixo pega uma coleção de produtos em destaque, onde featured =1
        // embora funcione não é uma maneira elegante de programar
        //$pFeatured =Product::where('featured','=','1')->get();

        //O recomendado é usar consultas de escopo, que são craidas no model
        //e fazer a chamada deste função no controller, como nos comandos abaixo

        $pFeatured =Product::featured()->get();
        $pRecommend =Product::recommend()->get();
        $categories = Category::all();
        return view('store.index', compact('categories', 'pFeatured', 'pRecommend'));
    }

    public function category($id)
    {
        $categories = Category::all();
        $category = Category::find($id);
        $products = Product::ofCategory($id)->get();
        return view('store.category', compact('categories','products','category'));
    }

    public function product($id)
    {
        $categories = Category::all();
        $product = Product::find($id);
        return view('store.product', compact('categories', 'product'));
    }

    Public Function tag($id)
    {
        $categories = Category::all();
        $tag = Tag::find($id);
        return view('store.tag', compact('categories', 'tag'));
    }
 }
