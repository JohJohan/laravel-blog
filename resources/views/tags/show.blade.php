@extends('layouts.app')

@section('title', "| $tag->name")

@section('stylesheets')
    {!! Html::style('css/select2.min.css') !!}
@endsection


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h1>{{ $tag->name }} Tag <small>{{ $tag->posts()->count() }} Posts</small></h1>

            </div>
            <div class="col-md-2">
                <a href="{{ route('tags.edit', $tag->id) }}" class="btn btn-primary btn-block">Edit tag</a>
            </div>
            <div class="col-md-2">
                {!! Form::open(['route' => ['tags.destroy', $tag->id], 'method' => 'DELETE']) !!}
                {{ Form::submit('Delete', ['class' => 'btn btn-danger btn-block']) }}
                {!! Form::close() !!}
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <table class="table">
                    <thead>
                        <th>#</th>
                        <th>Title</th>
                        <th>Tags</th>
                        <th></th>
                    </thead>
                    <tbody>
                        @foreach ($tag->posts as $post)
                        <tr>
                            <th>{{ $post->id}}</th>
                            <th>{{ $post->title}}</th>
                            <th>@foreach ($post->tags as $tag) <span class="label label-default">{{ $tag->name }}</span>  @endforeach</th>
                            <th><a href="{{ route('posts.show', $post->id) }}" class="btn btn-default btn-sm">View post</a></th>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    {!! Html::script('js/select2.min.js') !!}
@endsection
