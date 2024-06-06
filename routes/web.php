<?php

use Illuminate\Support\Facades\Route;

// 追加

use App\Http\Controllers\PostsController;

use App\Http\Controllers\PastesController;
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

// 追加するルーティング

// Route::get('hello',function(){
    // echo 'Hello World!!';
// });

Route::get('hello',[PostsController::class, 'hello']);

Route::get('hi',[PastesController::class,'hi']);

Route::get('index',[PostsController::class, 'index']);

// http://127.0.0.1:8000/index というリンクでアクセスできるページが作られた。PostsControllerのindexメソッドを利用しページを展開している

Route::get('index_Pa',[PastesController::class, 'index']);

Route::get('/create-form', [PostsController::class, 'createForm']);

Route::get('/create-form-Pa', [PastesController::class, 'createForm']);

Route::post('post/create', [PostsController::class, 'create']);

Route::post('pasta/create', [PastesController::class, 'create']);

Route::get('post/{id}/update-form', [PostsController::class, 'updateForm']);

Route::get('pasta/{id}/update-form', [PastesController::class, 'updateForm']);

Route::post('post/update', [PostsController::class, 'update']);

Route::post('pasta/update', [PastesController::class, 'update']);

Route::get('post/{id}/delete', [PostsController::class, 'delete']);

// web.php49行目のルーティングを参考に、deleteメソッドにid情報を引き渡せるようにルーティング
// 具体的には、post=>getに通信方法を変更-① urlが変わるためget通信が適している
// urlを'index'=>'post/{id}/delete'に変更-② deleteメソッドにidの情報が引き渡せるように

Route::get('pasta/{id}/delete', [PastesController::class, 'delete']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
