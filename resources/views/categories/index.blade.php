@extends('layouts.app')

@section('title', '| All categories')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h1>All categories</h1>
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                        </tr>
                    </thead>
                    @foreach ($categories as $categorie)
                    <tr>
                        <td>{{ $categorie->id }}</td>
                        <td>{{ $categorie->name }}</td>
                    </tr>
                    @endforeach
                </table>
                <div class="text-center">
                    {{-- {!! $categorie->links(); !!} --}}
                </div>
          </div>
          <div class="col-md-4">
              <div class="well">
                  {!! Form::open(['route' => 'categories.store']) !!}
                  <h2>New category</h2>
                  {{ Form::label('name', 'Name:') }}
                  {{ Form::text('name', null, ['class' => 'form-control']) }}
                  {{ Form::submit('Create new category', ['class' => 'btn btn-block btn-success']) }}
                  {!! Form::close() !!}
              </div>
          </div>
        </div>
    </div>

@endsection
