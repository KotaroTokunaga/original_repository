@extends('layouts.app')

@section('content')
<div class="container">
    <h2>投稿を編集</h2>

    <form action="{{ route('pastes.update', $paste->id) }}" method="POST">
        @csrf
        @method('PATCH') <!-- PATCH メソッドを使用 -->

        <div class="form-group">
            <label for="pasta">投稿内容</label>
            <input type="text" name="pasta" id="pasta" value="{{ old('pasta', $paste->pasta) }}" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">更新</button>
    </form>
</div>
@endsection
