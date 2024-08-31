<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Paste;

use Illuminate\Support\Facades\DB;

class PastesController extends Controller
{

        public function __construct(){

        $this->middleware('auth');

    }

    // indexメソッド
    public function index()
    {
        // データベースから全ての投稿を取得
        $lists = Paste::all();

        // ビューにデータを渡して表示
        return view('pastes.index', compact('lists'));
    }



    public function hi(){

        echo 'Hi, nice to meet you Wataru!!<br>';

        echo 'コントローラーから';

    }

    // 検索機能
    public function search(Request $request){

        //検索クエリを取得
        $search = $request->input('search');

        // 検索キーワードが存在する場合にのみ検索を実行
        $lists = Paste::when($search, function ($query, $search) {
            return $query->where('pasta', 'like', '%' . $search . '%');
        })->get();

        // $list = DB::table('pastes')->get();

        // 検索結果がない場合の処理
    if ($lists->isEmpty()) {
        return view('pastes.index', ['message' => '検索結果は0件です']);
    }

        // ビューに結果を渡す
        return view('pastes.index', compact('lists'));

    }

        // 新規作成フォーム
    public function create()
    {
        return view('pastes.create');
    }

    // 新規作成後処理
           public function store(Request $request)
    {
        // バリデーション
        $request->validate([
            'pasta' => 'required|string|max:255',
        ]);

        // データを保存
        Paste::create([
            'pasta' => $request->input('pasta'),
        ]);

        return redirect()->route('pastes.index');
    }

    // 既存の投稿を編集するためのメソッド
    public function edit($id)
    {
        $paste = Paste::findOrFail($id); // 特定のIDの投稿を取得
        return view('pastes.edit', compact('paste')); // ビューにデータを渡す
    }

    // 更新メソッド（editメソッドと併せて使用される）
    public function update(Request $request, $id)
    {
        // バリデーション
        $request->validate([
            'pasta' => 'required|string|max:255',
        ]);

        // 投稿を更新
        $paste = Paste::findOrFail($id);
        $paste->update([
            'pasta' => $request->input('pasta'),
        ]);

        return redirect()->route('pastes.index');
    }

    public function delete($id){
        $paste = Paste::findOrFail($id); // 特定のIDの投稿を取得
        $paste->delete(); // 投稿を削除
        return redirect()->route('pastes.index');

    }

}
