@extends('layouts.app')

@section('title', '| Create new posts')

@section('stylesheets')
    {!! Html::style('css/parsley.css') !!}
    {!! Html::style('css/select2.min.css') !!}
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>

    <script type="text/javascript">
            tinymce.init({
                selector: 'textarea',
                plugins: 'link code',
                menubar: false

            });
    </script>
@endsection

@section('content')

    <div class="container">
        <nav class="navbar navbar-default">
            <ul class="nav navbar-nav">
                <li><a href="{{ route('posts.index') }}">Alle posts</a></li>
            </ul>
        </nav>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h1>Create new post</h1>
                <hr>

                {!! Form::open(['route' => 'posts.store', 'data-parsley-validate' => '', 'files' => true]) !!}
                    {{ Form::label('title', 'Title:')}}
                    {{ Form::text('title', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '255'))}}

                    {{ Form::label('slug', 'Slug:') }}
                    {{ Form::text('slug', null, array('class' => 'form-control', 'required' => '', 'minLenght' => '5', 'maxLenght' => '255')) }}

                    {{ Form::label('category_id', 'Category:') }}
                    <select name="category_id" class="form-control">
                        @foreach ($categories as $categorie)
                            <option value="{{ $categorie->id }}">{{ $categorie->name }}</option>
                        @endforeach
                    </select>

                    {{ Form::label('tags', 'Tags:') }}
                    <select name="tags[]" multiple="multiple" class="form-control select2-multi">
                        @foreach ($tags as $tag)
                            <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                        @endforeach
                    </select>

                    {{ Form::label('featured_image', 'Updload featured image:')}}
                    {{ Form::file('featured_image', null, array('class' => 'form-control'))}}

                    {{ Form::label('body', 'Post body:')}}
                    {{ Form::textarea('body', null, array('class' => 'form-control'))}}

                    {{ Form::submit('Create post', array('class' => 'btn btn-success btn-lg btn-block'))}}

                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    {!! Html::script('js/parsley.min.js') !!}
    {!! Html::script('js/select2.min.js') !!}
    <script type="text/javascript">
        $(document).ready(function() {
          $(".select2-multi").select2();
        });
    </script>
@endsection
