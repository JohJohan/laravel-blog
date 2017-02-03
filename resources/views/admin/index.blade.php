@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <p>Welcome back <strong>{{ Auth::user()->name }}</strong>!</p>
                </div>
            </div>
        </div>


        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">Recent posts</div>

                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <th>
                                    #
                                </th>
                                <th>
                                    Title
                                </th>
                                <th class="text-center">
                                    Comments
                                </th>
                                <th class="text-right">
                                    Action
                                </th>
                            </thead>
                            <tbody>
                                @foreach ($posts as $post)
                                <tr>
                                    <td>
                                        {{ $post->id }}
                                    </td>
                                    <td>
                                        {{ $post->title }}
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('comments.index' )}}">{{ $post->comments->count()}}</a>
                                    </td>
                                    <td class="text-right">
                                        <a href="{{ route('posts.show', $post->id) }}" class="btn btn-default btn-sm">View</a>
                                        <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-success btn-sm">Edit</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="text-center">
                        <a href="{{ route('posts.index')}}" class="btn btn-default">View all posts</a>
                        {{-- {!! $posts->links() !!} --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
