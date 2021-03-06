<?php

use App\Http\Controllers\PizzaController;
use Doctrine\DBAL\Schema\Index;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/pizzas', 'PizzaController@index');

Route::get('/pizzas/{id}', 'PizzaController@show');

//rest

// Route::resource('rest', 'RestTestController')->names('restTest');

Route::group(['namespace' => 'Blog', 'prefix' => 'blog'], function(){
    Route::resource('posts', 'PostController')->names('blog.posts');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Админка Блога
$groupData = [
    'namespace' => 'Blog\Admin',
    'prefix'    => 'admin/blog',
];
Route::group($groupData, function () {
  //BlogCategory
  $methods = ['index', 'edit', 'update', 'create', 'store',];
  Route:: resource('categories', 'CategoryController')
     ->only($methods)
     ->names('blog.admin.categories');
});
