@extends('layouts.app')

@section('title', '| Edit tag')

@section('stylesheets')
    {!! Html::style('css/select2.min.css') !!}
@endsection


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Edit '{{ $tag->name }}'</h1>

                {{ Form::model($tag, ['route' => ['tags.update', $tag->id], 'method' => 'PUT']) }}

                    {{ Form::label('name', 'Title:') }}
                    {{ Form::text('name', null, ['class' => 'form-control'])}}

                    {{ Form::submit('Save tag', ['class' => 'btn btn-success']) }}

                {{ Form::close() }}
          </div>
        </div>
    </div>

@endsection

@section('scripts')
    {!! Html::script('js/select2.min.js') !!}
@endsection
