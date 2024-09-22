<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Paste;

use App\Http\Requests\CustomRequest;

use Illuminate\Support\Facades\DB;

class PastesController extends Controller
{

        public function __construct(){

        $this->middleware('auth');

    }

    public function login()
    {
        return view('auth.login');
    }

    // indexメソッド
    public function index()
    {
        // データベースから全ての投稿を取得
        $lists = Paste::all();

        //現在のユーザーIDを基にフィルタリング
        $userId = auth()->id();

        // 投稿をユーザーIDでフィルタリング
        // $pastes = Paste::where('user_id', $userId)->get();

        // ビューにデータを渡して表示
        //return view('pastes.index', compact('lists'));
        return view('pastes.index', compact('lists'));
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

        // バリデーション前に入力内容を確認
    dd($request->input('name')); // ここで値を確認

        // バリデーション
        $request->validate([
            'pasta' => 'required|string|max:255',
            'name' => ['required', 'not_only_spaces'],
        ]);

        // デバッグ: 入力データを確認
        dd($request->all());

        // データを保存
        $list = Paste::create([
            'pasta' => $request->input('pasta'),
            'user_id' => auth()->id(), // 現在のユーザーIDを保存
        ]);

        // デバッグ出力
    dd($list); // ここで保存したデータを確認

        return redirect()->route('pastes.index');
    }

    // 既存の投稿を編集するためのメソッド
    public function edit($id)
    {
        $list = Paste::findOrFail($id); // 特定のIDの投稿を取得
        return view('pastes.edit', compact('list')); // ビューにデータを渡す
    }

    // 更新メソッド（editメソッドと併せて使用される）
    //public function update(Request $request, $id)09142035変更->
    public function update(Request $request, $pasteId)
    {
        // バリデーション
        $request->validate([
            'pasta' => 'required|string|max:255',
        ]);

        // 投稿を取得
        $userId = auth()->id(); // LaravelのAuthファサードを使用して現在のユーザーIDを取得

        $list = Paste::findOrFail($pasteId);

        // 権限チェック
        if ($list->user_id !== $userId) {

        // 権限がない場合のレスポンス
        return response()->json(['error' => '権限がありません'], 403);
        }
        // このコードでは、特定の投稿が現在のユーザーによって作成されたものであるかを確認しています。投稿の user_id が現在のユーザーのIDと一致しない場合、403 Forbidden エラーを返して、権限がないことを通知します。

        //投稿を更新
        $list->update([
            'pasta' => $request->input('pasta'),
        ]);

        //更新後、投稿一覧にリダイレクト
        return redirect()->route('pastes.index');
    }

    public function delete($pastaId){



        // 投稿を取得
        $userId = auth()->id(); // LaravelのAuthファサードを使用して現在のユーザーIDを取得
        $list = Paste::findOrFail($pastaId);
        // 権限チェック
        if ($list->user_id !== $userId) {
        // 権限がない場合のレスポンス
        return response()->json(['error' => '権限がありません'], 403);
        }
        // このコードでは、現在ログインしているユーザーのIDを取得し、そのIDに基づいてデータベースからそのユーザーの投稿を取得している

        // これにより、ユーザーごとに投稿をフィルタリングし、他のユーザーの投稿が見えないようにすることが可能



        // 投稿を削除
        $list->delete();

        // 投稿一覧にリダイレクト
        return redirect()->route('pastes.index');

    }
}
