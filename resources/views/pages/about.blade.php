@extends('layouts.app')

@section('title', '| About')

@section('content')


		<div class="container body">
			<div class="row">
				<div class="col-md-12">
					<h1>About {{ $data['fullname']}}</h1>
				</div>
			</div>
		</div>

@endsection
