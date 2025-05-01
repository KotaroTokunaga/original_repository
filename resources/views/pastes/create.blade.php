<!-- resources/views/pastes/create.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="page-header">新しい投稿を作成</h2>


    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('pastes.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="contents">投稿内容:</label>
            <input type="text" class="form-control" id="contents" name="contents" placeholder="投稿内容を入力">
        </div>

        <button type="submit" class="btn btn-primary">投稿する</button>
    </form>
</div>
@endsection
