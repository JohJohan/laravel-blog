@extends('layouts.app')

@section('title', '| View posts')

@section('content')

    <div class="container">
        <nav class="navbar navbar-default">
            <ul class="nav navbar-nav">
                <li><a href="{{ route('posts.index') }}">Alle posts</a></li>
                <li class="active"><a href="{{ route('posts.show', $post->id) }}">Bekijk posts</a></li>
                <li><a href="{{ route('posts.edit', $post->id) }}">Bewerk post</a></li>
            </ul>
        </nav>
    </div>

    @if($post) :

    <div class="container">
        <div class="row">

            <div class="col-md-8">
                <h1>{{ $post->title }}</h1>
                {!! $post->body !!}
                <hr>
                @if (isset($post->featured_image))
                    <img src="{{ asset('img/' . $post->featured_image) }}" alt="" class="img-responsive"/>
                @endif
                <div class="tags">
                @foreach ($post->tags as $tags)
                    <span class="label label-default">{{$tags->name}}</span>
                @endforeach
                </div>

                <div class="comments" style="margin-top: 50px">
                    <h3>Comments <small>{{ $post->comments()->count() }} total</small></h3>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Comment</th>
                                    <th>#</th>
                                </tr>
                            </thead>
                            <tbody>
                                    @foreach ($post->comments as $comment)
                                        <tr>
                                            <td>{{ $comment->name }}</td>
                                            <td>{{ $comment->email }}</td>
                                            <td>{{ $comment->comment }}</td>
                                            <td>
                                                <a href="{{ route('comments.edit', $comment->id) }}" class="btn btn-xs btn-default"><i class="fa fa-cogs"></i></a>
                                                <a href="{{ route('comments.delete', $comment->id) }}" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="well">
                    <dl class="dl-horizontal">
                        <dt>Slug</dt>
                        <dd><a href="{{ url('blog/' . $post->slug)  }}">{{ $post->slug }}</a></dd>
                    </dl>
                    <dl class="dl-horizontal">
                        <dt>category</dt>
                        <dd>{{ $post->category->name }}</dd>
                    </dl>
                    <dl class="dl-horizontal">
                        <dt>Created at:</dt>
                        <dd>{{ date('M j, Y H:i', strtotime($post->created_at)) }}</dd>
                    </dl>

                    <dl class="dl-horizontal">
                        <dt>Last updated:</dt>
                        <dd>{{ date('M j, Y H:i', strtotime($post->updated_at)) }}</dd>
                    </dl>
                    <hr>
                    <div class="row">
                        <div class="col-sm-6">
                            {!! Html::linkRoute('posts.edit', 'Edit', array($post->id), array('class' => 'btn btn-success btn-block')); !!}
                        </div>
                        <div class="col-sm-6">
                            {!! Form::open(['route' => ['posts.destroy', $post->id], 'method' => 'DELETE']) !!}
                            {{ Form::submit('Delete', ['class' => 'btn btn-danger btn-block']) }}
                            {!! Form::close() !!}
                        </div>
                        <div class="col-md-12">
                            <a href="{{ route('posts.index') }}" class="btn btn-default btn-block">See all posts</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @else
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <h1>Helaas geen post gevonden</h1>
                    <a href="{{ route('posts.index') }}" class="btn btn-default">Ga terug</a>
                </div>
            </div>
        </div>

    @endif

@endsection
