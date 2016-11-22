<?php

namespace CodeCommerce\Http\Controllers;
use CodeCommerce\Category;
use CodeCommerce\Http\Requests;

class AdminCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $categories;

    public function __construct(Category $category){
        $this->middleware('guest');
        $this->categories = $category;
    }
    public function index()
    {
        //No comando abaixo todos as categorias são listadas em uma unica pagina
        //$categories=$this->categories->all();
        //No comando abaixo categorias são paginadas de 10 em 10
        $categories=$this->categories->paginate(10);
        return view('category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\CategoryRequest $request)
    {
        $input = $request->all();
        $category = $this->categories->fill($input);
        $category->save();
        //return redirect('admin/categories');
        return redirect()->route('listar-categorias');
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
    public function edit($id)
    {
        $category = $this->categories->find($id);
        return view('category.edit', compact('category'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\CategoryRequest $request, $id)
    {
        $this->categories->find($id)->update($request->all());
        return redirect()->route('listar-categorias');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->categories->find($id)->delete();
        return redirect()->route('listar-categorias');
    }
}
