<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//Route::get('admin/categories','AdminCategoriesController@index');
//Route::get('admin/products','AdminProductsController@index');

Route::pattern ('id', '[0-9]+');
Route::group(['prefix'=>'admin'], function(){
        Route::group(['prefix'=>'categories'], function(){
                Route::get('',['as'=> 'listar-categoria','uses' => 'AdminCategoriesController@index']);
                Route::post('create',['as'=> 'inserir-categoria','uses' => 'AdminCategoriesController@index']);
                Route::get('read/{id}',['as'=> 'consultar-categoria','uses' => 'AdminCategoriesController@index']);
                Route::put('update/{id}',['as'=> 'atualizar-categoria','uses' => 'AdminCategoriesController@index']);
                Route::delete('delete/{id}',['as'=> 'excluir-categoria','uses' => 'AdminCategoriesController@index']);
        });
        Route::group(['prefix'=>'products'], function(){
                Route::get('',['as'=> 'listar-produto','uses' => 'AdminProductsController@index']);
                Route::post('create',['as'=> 'inserir-produto','uses' => 'AdminProductsController@index']);
                Route::get('read/{id}',['as'=> 'consultar-produto','uses' => 'AdminProductsController@index']);
                Route::put('upadate/{id}',['as'=> 'atualizar-produto','uses' => 'AdminProductsController@index']);
                Route::delete('delete/{id}',['as'=> 'excluir-produto','uses' => 'AdminProductsController@index']);
        }) ;
});


//Route::get('/','WelcomeController@index');
//Route::get('exemplo','WelcomeController@exemplo');

// ---------------- Definindo valor padrão de rota com parâmetro id -------
/*
Route::pattern('id','[0-9]+');
Route::get('user/{id?}', function($id = 123) // se não existe id enatão valor padrao de $id = Cintia
{ if($id)
    return "olá $id";
    return "Não possui ID"; //utilizo quando na passagem de parâmetro da função comparo $id=null
});
/*

//---------------- Nomeando as rotas (RoutName) ------------------
// 'produtos-legais' é a url gerada
// 'produtos' é o nome da rota
/*
Route::get('produtos-legais',['as' => 'produtos',function(){
    echo Route::currentRouteName(); //exibe qual é a rota que está sendo acessada
}]);
*/

//---------------- Redirecionando para a rota que chama produtos ----------
/*
redirect()->route('produtos');
*/

//---------------- Visualizando a url da rota produtos ---------------
/*
echo route('produtos');
*/

//---------------- Agrupando rotas utilizando prefixo --------------
// o prefix é usado para informar o prefixo que será utilizado na composição
// da rota, com o Route::get. No caso abaixo teriamos a rota 'admim/produtos'
/*
Route::group(['prefix'=>'admin'],function(){
    Route::get('produtos',function(){
        return "Produtos";
    });
});
*/

//---------------- Passando id e Retornando nome do objeto instanciado --------------
/*
Route::get('category/{id}',function($id){
    $category = new \CodeCommerce\Category();
    $c = $category->find($id);
    return $c->name;
});
*/

//---------------- Passando model (instancia do objeto) por rota --------------
// Só ira funcionar se o parametro {category} for associado
// ao model CodeCommerce\Category no arquivo RouteServiceProvider.php
/*
Route::get('category/{category}', function(\CodeCommerce\Category $category){
        //dd($category);  //dump and die
        return $category->name;
});
*/