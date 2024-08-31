@extends('layouts.app')

@section('content')

<div class='container'>

<!-- 一行追加 -->

<p class="pull-right"><a class="btn btn-success" href="{{ route('pastes.create') }}">投稿する</a></p>

<h2 class='page-header'>投稿一覧</h2>

<div id="search">
  <form action="{{ route('pastes.search') }}" method="post">
    @csrf
    <input type="text" name="search" value="{{request('search') }}" placeholder="キーワードで検索">
      <button type="submit">🔍</button>
  </form>
</div>

<!-- 検索結果が見つかった時、「一覧に戻る」を表示 -->
 @if(request('search'))
    @if(isset($message))
        <p>{{ $message }}</p>
    @else

        <div class="return_list">
            <p><a href="{{ route('pastes.index') }}">&lt;&lt;一覧に戻る</a></p>
        </div>
    @endif
 @endif

@if(isset($lists) && $lists->isNotEmpty())
<table class='table table-hover'>

<tr>

<th>投稿No</th>

<th>投稿内容</th>

<th>投稿日時</th>

<th>更新</th>

<th>削除</th>

</tr>

@foreach ($lists as $list)
            <tr>
                <td>{{ $list->id }}</td>
                <td>{{ $list->pasta }}</td>
                <td>{{ $list->created_at }}</td>
                <td>
                    <a class="btn btn-primary" href="{{ route('pastes.edit', $list->id) }}">更新</a>
                </td>
                <td>
                    <form action="{{ route('pastes.delete', $list->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('こちらの投稿を削除してもよろしいですか？')">削除</button>
                    </form>
                    <!-- formの閉じタブが抜けていたため、削除ボタンを押してもどの投稿かに関わらず投稿No.の若い順から削除されてしまっていた。 -->
                </td>
            </tr>
        @endforeach
    </table>

@endif

</div>

@endsection
