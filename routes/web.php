<?php

use Illuminate\Support\Facades\Route;

// 追加

use App\Http\Controllers\PostsController;

use App\Http\Controllers\PastesController;

use App\Http\Controllers\Auth\LoginController;
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

// パスタ好きの集うサイト_投稿一覧ページ
Route::get('index_Pa',[PastesController::class, 'index'])->name('pastes.index');

// http://127.0.0.1:8000/index_Pa というリンクでアクセスできるページが作られた。PastesControllerのindex_Paメソッドを利用しページを展開している

Route::get('/create-form', [PostsController::class, 'createForm']);

Route::get('/create-form-Pa', [PastesController::class, 'create'])->name('pastes.create');

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

Route::get('/home', [PastesController::class, 'index']);

Route::post('logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/custom-logout-route', function () {
    return view('welcome'); // カスタムのビューにリダイレクト
})->name('custom.logout');

Route::post('/search', [PastesController::class, 'search'])->name('pastes.search');

// 投稿編集画面のルートを定義、（// パスタ好きの集うサイト_投稿編集）
Route::get('/pastes/{id}/edit', [PastesController::class, 'edit'])->name('pastes.edit');

// 投稿更新処理のルートを定義（POSTまたはPATCHメソッドを使用）
Route::patch('/pastes/{id}', [PastesController::class, 'update'])->name('pastes.update');

// 投稿を削除するためのリクエスト
Route::delete('/pastes/{id}', [PastesController::class, 'delete'])->name('pastes.delete');

Route::post('/pastes/store', [PastesController::class, 'store'])->name('pastes.store');
