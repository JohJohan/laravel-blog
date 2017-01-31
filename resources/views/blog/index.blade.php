@extends('layouts.app')

@section('title', '| All blog posts')

@section('content')
    <div class="container">
        <div class="row col-md-12">
            <h1>Blog post</h1>
        </div>
        <div class="row">
            <div class="col-md-12">
                @foreach ($posts as $post)
                    <h1>{{ $post->title }}</h1>

                    <p>{!! substr(strip_tags($post->body), 0, 250) !!} {!! strlen(strip_tags($post->body) > 250 ? '...' : '')!!}</p>
                    <p>
                        {{ date('M j, Y H:i', strtotime($post->created_at)) }}
                    </p>
                    <a href="{{ route('blog.single', $post->slug ) }}">Read more</a>
                    <hr>
                @endforeach
            </div>
        </div>
        <div class="row">
            <div class="text-center">
                {!! $posts->links(); !!}
            </div>
        </div>
    </div>

@endsection
