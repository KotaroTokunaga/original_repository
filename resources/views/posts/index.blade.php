@extends('layouts.app')
<!-- @extendsで指定されたapp.blade.phpの方が親となり、index.blade.php（このファイル）の方がビューファイルとなる -->

@section('content')
<!-- @section('content')」と、一番下の「@endsection」の2行が追加されました。

これで、親である「app.balde.php」内の「@yield('content')」で指定されている箇所に、設定したセクション範囲内にあるコードが反映されるようになります。 -->

<div class='container'>

<!-- 投稿するボタン追加 -->

<p class="pull-right"><a class="btn btn-success" href="/create-form">投稿する</a></p>

<h2 class='page-header'>投稿一覧</h2>

<table class='table table-hover'>

<tr>

<th>投稿No</th>

<th>投稿内容</th>

<th>投稿日時</th>

<!-- 追加 -->

<th></th>

<th></th>

</tr>

@foreach ($lists as $list)

<tr>

<td>{{ $list->id }}</td>

<td>{{ $list->post }}</td>

<td>{{ $list->created_at }}</td>

<!-- 追加 -->

<td><a class="btn btn-primary" href="/post/{{$list->id}}/update-form">更新</a></td>

<td><a class="btn btn-danger" href="/post/{{$list->id}}/delete" onclick="return confirm('こちらの投稿を削除してもよろしいですか？')">削除</a></td>

</tr>

@endforeach

</table>

</div>

@endsection
