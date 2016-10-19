<?php

namespace CodeCommerce\Http\Controllers;

//use Illuminate\Http\Request;
//use CodeCommerce\Http\Requests;
//use CodeCommerce\Http\Controllers\Controller;
use CodeCommerce\Category;
class WelcomeController extends Controller
{
    private $categories;
    //abaixo um exemplo de dependencia injection

    public function __construct(Category $category){
        $this->middleware('guest');
        $this->categories =$category;
    }
    public function index()
    {
       return view('welcome');
        //
    }
    public function exemplo(){
        //$nome="Cintia";
        //$sobrenome="Santos";
        //return view('exemplo')->with('nome', $nome);
        //return view('exemplo',['nome'=>$nome, 'sobrenome'=>$sobrenome]);
        //return view('exemplo',compact('nome','sobrenome'));

        $categories=$this->categories->all();
        return view('exemplo', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
