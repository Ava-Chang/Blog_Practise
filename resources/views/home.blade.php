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
        @foreach ($blogs as $blog)
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h4>{{ $blog->title }}</h4>
                        <div style="float:right" class="btn-group" role="group" aria-label="Basic example">
                            @if(Auth::user())
                                @if (Auth::user()->name == $blog->add_user)
                                    <a href="{{ URL::to('post/' . $blog->id . '/edit') }}">
                                        <button type="button" class="btn btn-warning">Edit</button>
                                    </a>&nbsp;
                                    <a href="{{ URL::to('post/' . $blog->id . '/delete') }}">
                                        <button type="button" class="btn btn-danger">Delete</button>
                                    </a>
                                @endif
                            @endif
                        </div>
                            <p>{{ $blog->updated_at->toFormattedDateString() }}  by {{ $blog->add_user }}</p>
                        </div>
                    <div class="card-body">
                       {!! $blog->content !!}
                    </div>
                </div>
            </div>
        @endforeach 
    </div>
</div>
@endsection
