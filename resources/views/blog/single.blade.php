@extends('layouts.app')
<?php $title = htmlspecialchars($post->title);  ?>
@section('title', "| $title ")

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>{{ $post->title }}</h1>
                {!! $post->body !!}
                <p>
                    {{ date('M j, Y H:i', strtotime($post->created_at)) }}
                </p>
                <hr>
                <p>
                    Posted In: {{ $post->category->name }}
                </p>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 class="comments-title"><i class="fa fa-comment-o"></i>  {{ $post->comments()->count() }} Comments</h3>
    			@foreach($comments as $comment)

    				<div class="comment">
    					<div class="author-info">

    						<img src="{{ "https://www.gravatar.com/avatar/" . md5(strtolower(trim($comment->email))) . "?s=50&d=monsterid" }}" class="author-image">
    						<div class="author-name">
    							<h4>{{ $comment->name }}</h4>
    							<p class="author-time">{{ date('F nS, Y - g:iA' ,strtotime($comment->created_at)) }}</p>
    						</div>

    					</div>

    					<div class="comment-content">
    						{{ $comment->comment }}
    					</div>

    				</div>
			    @endforeach
                <hr>
                <div class="text-center">
                    {!! $comments->links(); !!}
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div id="comment-form" class="col-md-12">
                <h3>Create comment</h3>
                {{ Form::open(['route' => ['comments.store', $post->id], 'method' => 'POST']) }}
                    <div class="row">
                        <div class="col-md-6">
                            {{ Form::label('name', 'Name:') }}
                            {{ Form::text('name', null, ['class' => 'form-control']) }}
                        </div>
                        <div class="col-md-6">
                            {{ Form::label('email', 'Email:') }}
                            {{ Form::text('email', null, ['class' => 'form-control']) }}
                        </div>
                        <div class="col-md-12">
                            {{ Form::label('comment', 'Comment:') }}
                            {{ Form::textarea('comment', null, ['class' => 'form-control', 'rows' => '5']) }}
                            {{ Form::submit('Add comment', ['class' => 'btn btn-success btn-block'])}}
                        </div>
                    </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>

@endsection
