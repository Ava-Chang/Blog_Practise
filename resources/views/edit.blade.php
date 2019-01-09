@extends('layouts.app')

@section('content')
<div class="container">
    <div class="container">
        <form action='edit' method="Post" accept-charset="utf-8">
            @csrf
            <div class="form-group">
                <label for="exampleFormControlTextarea1">標題</label>
                    <input class="form-control" type="text" name="title" rows="1" value="{{ $article->title }}">
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">文章內容</label>
                    <textarea class="form-control" type="text" name="content" rows="3">{{ $article->content }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">
                更新文章
            </button>
        </form>
    </div>
</div>
@endsection