@extends('layouts.app')

@section('title', '| Edit comment')

@section('content')
    <div class="container">
        <nav class="navbar navbar-default">
            <ul class="nav navbar-nav">
                <li class=""><a href="{{ route('comments.index') }}">All comments</a></li>
                <li class="active"><a href="{{ route('comments.edit', $comment->id) }}">Edit comment</a></li>
                <li class=""><a href="{{ route('comments.delete', $comment->id) }}">Delete comment</a></li>
            </ul>
        </nav>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Edit comment</h1>
                {{ Form::model($comment, ['route' => ['comments.update', $comment->id], 'method' => 'PUT'])}}

                {{ Form::label('name', 'Name:') }}
                {{ Form::text('name', null, ['class' => 'form-control', 'disabled' => 'disabled']) }}

                {{ Form::label('email', 'Email:') }}
                {{ Form::text('email', null, ['class' => 'form-control', 'disabled' => 'disabled']) }}

                {{ Form::label('comment', 'Comment:') }}
                {{ Form::textarea('comment', null,[ 'class' => 'form-control'])}}

                {{ Form::submit('Update comment', ['class' => 'btn btn-block btn-success']) }}

                {{ Form::close() }}

            </div>
        </div>
    </div>
@endsection
