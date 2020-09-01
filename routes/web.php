<?php
use App\Product;
use App\Category;
use App\Image;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Prueba con imagenes//

Route::get('/prueba', function(){
 

   $producto = App\Product::find(1);

   $producto->images()->saveMany([

      new App\Image(['url'=> 'Imagenes/avatar.png']),
      new App\Image(['url'=> 'Imagenes/avatar2.png']),


   ]);
   

   return $producto;
   

});

//Mostrar resultados//
Route::get('/resultados', function(){

     $image= App\Image::orderBy('id','Desc')->get();
     return $image;

    
});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin', function () {
   return view('plantilla.admin');
})->name('admin');

Route::get('/', function() {
return view ('tienda.index');
});

Route::resource('admin/category','Admin\AdminCategoryController')->names('admin.category');

Route::get('cancelar/{ruta}', function ($ruta){
 return redirect()->route($ruta)->with('datos','Accion cancelada');
})->name('cancelar');

Route::resource('admin/product','Admin\AdminProductController')->names('admin.product');
