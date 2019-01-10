@extends('layouts.app')

@section('content')
<div class="container">
    <h1 align="center">文章區</h1>
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <div class="row justify-content-center">
        @foreach ($blogs as $blogData)
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <h4>{{ $blogData->title }}</h4>
                            @if ($sessionUser == $blogData->add_user)
                                <a href="{{ URL::to('post/' . $blogData->id . '/edit') }}">
                                    <button type="button" class="btn btn-warning">Edit</button>
                                </a>&nbsp;
                                <a href="{{ URL::to('post/' . $blogData->id . '/delete') }}">
                                    <button type="button" class="btn btn-danger">Delete</button>
                                </a>
                            @endif
                        </div>
                            <p>{{ $blogData->updated_at->toFormattedDateString() }} create by {{ $blogData->add_user }}</p>
                        </div>
                    <div class="card-body">
                       {{ $blogData->content }}
                    </div>
                </div>
            </div>
        @endforeach 
    </div>
</div>
@endsection
