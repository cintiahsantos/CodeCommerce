<?php

namespace CodeCommerce\Http\Controllers;
use CodeCommerce\Category;
use CodeCommerce\Http\Requests;
use CodeCommerce\Product;

class AdminProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $products;

    public function __construct(Product $product){
        $this->middleware('guest');
        $this->products =$product;
    }
    public function index()
    {
        //No comando abaixo todos os produtos são listados em uma unica pagina
        //$products = $this->products->all();
        //No comando abaixo os produtos são paginados de 10 em 10
        $products = $this->products->paginate(10);
        return view('product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Category $category) //Method Inject
    {
        //$categories = $category->all();
        $categories = $category->lists('name', 'id'); //para listar no combobox
        return view('product.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\ProductRequest $request)
    {
        $input = $request->all();
        $product = $this->products->fill($input);
        $product->save();
        return redirect()->route('listar-produtos');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Category $category)
    {
        $categories =$category->lists('name','id');
        $product = $this->products->find($id);
        return view('product.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\ProductRequest $request, $id)
    {
        $this->products->find($id)->update($request->all());
        return redirect()->route('listar-produtos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->products->find($id)->delete();
        return redirect()->route('listar-produtos');
    }
}
