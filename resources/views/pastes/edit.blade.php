@extends('layouts.app')

@section('content')
<div class="container">
    <h2>投稿を編集</h2>

    <form action="{{ route('pastes.update', $paste->id) }}" method="POST">
        @csrf
        @method('PUT') <!-- PUT メソッドを使用 -->

        <div class="form-group">
            <label for="contents">投稿内容</label>
            <input type="text" name="contents" id="pasta" value="{{ old('contents', $paste->contents) }}"
            class="form-control" required>
            <!-- 上記label、inputタグ内のpastaになっている記述を全てcontentsに変更 -->

            @if ($errors->has('contents'))
              <div class="text-red-500 text-sm mt-1">
                {{ $errors->first('contents') }}
              </div>
            @endif

        </div>

        <button type="submit" class="btn btn-primary">更新</button>
    </form>

</div>
@endsection
