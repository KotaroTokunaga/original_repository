@extends('layouts.app')

@section('content')

<div class='container'>

<!-- 一行追加 -->

<p class="pull-right"><a class="btn btn-success" href="/create-form-Pa">投稿する</a></p>

<h2 class='page-header'>投稿一覧</h2>

<div id="search">
  <form action="index.blade.php" method="post">
    <input type="text" name="search" placeholder="キーワードで検索">
      <button type="submit">🔍</button>
  </form>
</div>

          <?php if(!empty($_POST['search'])){ ?>

          <div class="return_list">
            <p><a href="index.blade.php">&lt;&lt;一覧に戻る</a></p>
          </div>
          <?php } ?>

<table class='table table-hover'>

<tr>

<th>投稿No</th>

<th>投稿内容</th>

<th>投稿日時</th>

</tr>

@foreach ($lists as $list)

<tr>

<td>{{ $list->id }}</td>

<td>{{ $list->pasta }}</td>
<!-- $list->post から $list->pastaに変更 -->
<!-- おそらくpastesテーブルのカラムが、本来はpost（投稿内容を示すカラム）だったためデフォルトはpostになっていたが、自分でpastaに変更していたためここを変更する必要があった -->

<td>{{ $list->created_at }}</td>

<!-- 追加 -->

<td><a class="btn btn-primary" href="/pasta/{{ $list->id }}/update-form">更新</a></td>

<td><a class="btn btn-danger" href="/pasta/{{ $list->id }}/delete" onclick="return confirm('こちらの投稿を削除してもよろしいでしょうか？')">削除</a></td>

</tr>

@endforeach

</table>

</div>

@endsection
