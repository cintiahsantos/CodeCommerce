<?php

namespace CodeCommerce\Http\Controllers;
use CodeCommerce\Category;
use CodeCommerce\Http\Requests;
use CodeCommerce\Product;
use CodeCommerce\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

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
        $this->products = $product;
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

    // buscar as imagens de um determinado produto passando o id do produto
    public function images($id)
    {
        $product = $this->products->find($id);
        return view('product.images', compact('product'));
    }
    public function createImage($id)
    {
        $product =$this->products->find($id);
        return view('product.createImage', compact('product'));
    }
    public function storeImage(Requests\ProductImageRequest $request, $id, ProductImage $productImage)
    {   //recupera o arquivo
        $file = $request->file('image');
        //recupera a extensao do arquivo
        $extension = $file->getClientOriginalExtension();
        //cria o objeto
        $image = $productImage::create(['product_id'=>$id,'extension'=>$extension]);
        //o comando abaixo grava o arquivo
        //o 'public local' é o local onde será armazenado o arquivo
        //e foi informado no arquivo de configuração filesystems na pasta config
        //para isso é necessário criar a pasta 'uploads' dentro da pasta public
        Storage:: disk('public_local')->put($image->id.'.'.$extension, File::get($file));
        //redireciono para a rota 'listar_imagens'
        return redirect()->route('listar-imagens', ['id'=>$id]);
    }
    public function destroyImage($id, ProductImage $productImage)
    {
        //localizo a imagem do produto
        $image = $productImage->find($id);
        //se o arquivo de imagem existe, o excluo do storage disk
        if(file_exists(public_path() . '/uploads/'.$image->id.'.'.$image->extension)) {
            Storage::disk('public_local')->delete($image->id . '.' . $image->extension);
        }
        $product = $image->product;
        //Excluo a imagem do produto no banco
        $image->delete();
        //Redireciono para a listagem de imagens do produto
        return redirect()->route('listar-imagens', ['id'=>$product->id]);
    }
}
