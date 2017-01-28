@extends('layouts.app')

@section('title', '| Comments')

@section('content')
    <div class="container">
        <nav class="navbar navbar-default">
            <ul class="nav navbar-nav">
                <li class="active"><a href="{{ route('posts.index') }}">All comments</a></li>
            </ul>
        </nav>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <h1>All comments</h1>
            </div>
            <div class="col-md-2">

            </div>
            <div class="col-md-12">
                <hr>
            </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <table class="table">
                <thead>
                    <th>#</th>
                    <th>Title</th>
                    <th>Post</th>
                    <th>Body</th>
                    <th>Created at</th>
                    <th>#</th>
                </thead>
                <tbody>
                    @foreach ($comments as $comment)
                    <tr>
                        <th>{{ $comment->id }}</th>
                        <td>{{ $comment->name }}</td>
                        <td><a href="{{ route('posts.show', $comment->post_id) }}" class="btn btn-default" ><i class="fa fa-book"></i> {{ $comment->post_id }}</a></td>
                        <td>{{ substr($comment->comment, 0, 50) }}{{ strlen($comment->comment) >= 50 ? '...' : '' }}</td>
                        <td>{{ date('j M, Y', strtotime($comment->created_at)) }}</td>
                        <td>
                            <a href="{{ route('comments.edit', $comment->id) }}" class="btn btn-sm btn-success"><i class="fa fa-cogs"></i></a>
                            <a href="{{ route('comments.delete', $comment->id) }}" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="text-center">
                {!! $comments->links(); !!}
            </div>
          </div>
        </div>
    </div>
@endsection
