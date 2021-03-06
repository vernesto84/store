<?php

Route::get('/', function()
{  
    // Con la funcion with() podemos traer todos los salesmanes
    // con sus respectivos products. Esta funcion recibe como parametro
    // alguna relacion que tenga el modelo al que se este llamando y
    // la incluye en los resultados que devuelve el get()
    $salesmans = Salesman::with('products')->get();
    return View::make('initial', array('salesmans'=> $salesmans));
    
    //$salesmans = Salesman::all();    
    //return View::make('initial')->with('salesmans', $salesmans);
});
 
Route::get('salesman', 'SalesmanController@showSalesmans');
 
Route::post('salesman', 'SalesmanController@createSalesman');

Route::get("salesman/{id}", [
"as"   => "salesman.show",
"uses" => "SalesmanController@show"
])->where('id', '[0-9]+');
Route::get("salesman/create", [
"as"   => "salesman.create",
"uses" => "SalesmanController@create"
]);
 
Route::get('products', 'ProductsController@index');
 
Route::post('products', 'ProductsController@createProduct');

Route::get("products/{id}", [
	"as"   => "products.show",
	"uses" => "ProductsController@show"
]);

Route::get("products/{product}/edit", [
	"as"   => "products.edit",
	"uses" => "ProductsController@edit"
]);

Route::post('/products/{product}/update', [
	'as' => 'products.update', 
	'uses' => 'ProductsController@updateProduct'
]);
