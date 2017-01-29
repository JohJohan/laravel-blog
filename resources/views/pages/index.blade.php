@extends('layouts.app')

@section('title', '| Home')

@section('content')


		<div class="container body">
			<div class="row">
				<div class="col-md-12">
					<div class="jumbotron">
						<h1>Voerum</h1>
						<p class="lead">Welkom.</p>
						<p><a href="#" class="btn btn-primary btn-lg">Populair post</a></p>
					</div>
				</div>
			</div>

			<div class="row">
				@foreach ($posts as $post)
				<div class="col-md-8">
					<div class="post">
						<h3>{{ $post->title }}</h3>
						<p>{{ substr(strip_tags($post->body), 0, 300) }}</p>
						<a href="{{ route('blog.single', $post->slug) }}" class="btn btn-primary">Read more</a>
					</div>
				</div>
				@endforeach
				<div class="col-md-3 col-md-offset-1">
					<h2>Sidebar</h2>
				</div>

			</div>
		</div>

@endsection
