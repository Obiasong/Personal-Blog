<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\TagsController as AdminTagsController;
use App\Http\Controllers\Admin\ArticleController as AdminArticleController;

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

Route::redirect('/', 'home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/home', [HomeController::class, 'home'])->name('home');
Route::view('/about', 'pages.how_to_use')->name('about');

Route::group(['middleware'=>'auth', 'prefix'=>'admin', 'as'=>'admin/'], function(){
    Route::resource('category', AdminCategoryController::class);
    Route::resource('tag', AdminTagsController::class);
    Route::resource('article', AdminArticleController::class);
});

require __DIR__.'/auth.php';
