@extends('layouts.app')

@section('title', '| All tags')

@section('stylesheets')
    {!! Html::style('css/select2.min.css') !!}
@endsection


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h1>All tags</h1>
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                        </tr>
                    </thead>
                    @foreach ($tags as $tag)
                    <tr>
                        <td><a href="{{ route('tags.show',$tag->id) }}">{{ $tag->id }}</a></td>
                        <td><a href="{{ route('tags.show',$tag->id) }}">{{ $tag->name }}</a></td>
                    </tr>
                    @endforeach
                </table>
          </div>
          <div class="col-md-4">
              <div class="well">
                  {!! Form::open(['route' => 'tags.store']) !!}
                  <h2>New tag</h2>
                  {{ Form::label('name', 'Name:') }}
                  {{ Form::text('name', null, ['class' => 'form-control']) }}
                  {{ Form::submit('Create new tag', ['class' => 'btn btn-block btn-success']) }}
                  {!! Form::close() !!}
              </div>
          </div>
        </div>
    </div>

@endsection

@section('scripts')
    {!! Html::script('js/select2.min.js') !!}
@endsection
