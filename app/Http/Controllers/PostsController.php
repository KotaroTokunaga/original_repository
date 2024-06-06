<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// 追加

use Illuminate\Support\Facades\DB;

class PostsController extends Controller
{

    public function __construct(){

        $this->middleware('auth');

    }

    //helloメソッドを追加

    public function hello(){
        echo 'Hello World!!<br>';

        echo'コントローラーkyara';
    }

    // indexメソッド追加

    public function index()
    {
        $list = DB::table('posts')->get();
        // 「DB::table('posts')」でpostsテーブルを指定し、「->get()」でデータを取得している

        return view('posts.index',['lists'=>$list]);
        // posts.indexは、「postsディレクトリの中にあるindex.blade.phpを呼びだす」ということ
        // $listという変数を"lists"という名前でビューに渡している

    }

    // createFormメソッドを追加
    public function createForm(){
            return view('posts.createForm');
        }

    // createメソッドを追加
    public function create(Request $request){

        $post = $request->input('newPost');

        DB::table('posts')->insert([

            'post' => $post

        ]);

        return redirect('/index');

    }

    public function updateForm($id){
        // ⏫()内に$idを追加

        $post = DB::table('posts')

        ->where('id',$id)
        // 第二引数を1=>$idに変更

        ->first();

        return view('posts.updateForm', ['post' => $post]);

    }

    public function update(Request $request){

        $id = $request->input('id');

        $up_post = $request->input('upPost');

        // name属性が「id」「upPost」で指定されているフォームの値を、別々の変数で取得しています。-- ① --

        DB::table('posts')

        ->where('id',$id)

        ->update(

            ['post' => $up_post]

        );

        // 「->where('id', $id)」という記述により、受け取ったidと一致した投稿を対象としています。最後に「->update();」と記述している部分で、postsテーブルのレコードを更新しています。 -- ② --

        return redirect('/index');

        // 更新後の処理です。リダイレクトで指定したURLは、投稿一覧ページへとなっています。 -- ③ --

        }

        public function delete($id){

            DB::table('posts')

            ->where('id', $id)

            ->delete();


            return redirect('/index');

        }

    }
