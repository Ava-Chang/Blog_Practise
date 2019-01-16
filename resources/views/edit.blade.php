@extends('layouts.app')

@section('content')
<div class="container">
    <div class="container">
        <form action='edit' method="Post" accept-charset="utf-8">
            @csrf
            <div class="form-group">
                <label for="exampleFormControlTextarea1">標題</label>
                    <input class="form-control" type="text" name="title" rows="1" value="{{ $article->title }}" readonly="readonly">
            </div>
            <div class="form-group">
                <textarea name='content' id='editor1' rows="10" cols="80">
                    {!! $article->content !!}
                </textarea>
                    <script>
                        CKEDITOR.replace('editor1');
                    </script>
            </div>
            <button type="submit" class="btn btn-primary">
                更新文章
            </button>
        </form>
    </div>
</div>
@endsection