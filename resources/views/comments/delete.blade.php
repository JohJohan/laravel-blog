@extends('layouts.app')

@section('title', '| Edit comment')

@section('content')
    <div class="container">
        <nav class="navbar navbar-default">
            <ul class="nav navbar-nav">
                <li class=""><a href="{{ route('comments.index') }}">All comments</a></li>
                <li class=""><a href="{{ route('comments.edit', $comment->id) }}">Edit comment</a></li>
                <li class="active"><a href="{{ route('comments.delete', $comment->id) }}">Delete comment</a></li>
            </ul>
        </nav>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Delete comment</h1>
                <p>
                    <strong>Name:</strong>{{ $comment->name}}<br/>
                    <strong>Email:</strong>{{ $comment->email}}<br/>
                    <strong>Comment:</strong>{{ $comment->comment}}<br/>
                </p>
                {{ Form::model($comment, ['route' => ['comments.destroy', $comment->id], 'method' => 'DELETE']) }}

                {{ Form::submit('Delete comment', ['class' => 'btn btn-block btn-danger']) }}

                {{ Form::close() }}

            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <hr>
                <a href="{{ route('posts.show', $comment->post->id) }}" class="btn btn-default"><i class="fa fa-chevron-left"></i> View post</a>
            </div>
        </div>
    </div>
@endsection
