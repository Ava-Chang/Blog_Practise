@extends('layouts.app')

@section('content')
<div class="container">
    <div class="container">
        <form action="create" method="Post" accept-charset="utf-8">
            @csrf
            <div class="form-group">
                <label for="exampleFormControlTextarea1">標題</label>
                    <input class="form-control" type="text" name="title" rows="1">
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">文章內容</label>
                    <textarea name='content' id='editor1' rows="10" cols="80"></textarea>
                    <script>
                        CKEDITOR.replace('editor1');
                    </script>
            </div>
            <button type="submit" class="btn btn-primary">
                發佈
            </button>
        </form>
    </div>
</div>
@endsection