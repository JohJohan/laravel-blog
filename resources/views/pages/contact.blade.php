@extends('layouts.app')

@section('title', '| Contact')

@section('content')


		<div class="container body">
			<div class="row">
				<div class="col-md-12">
					<h1>Contact</h1>
					<hr>
					<form class="" action="{{ url('contact') }}" method="post">
						{{ csrf_field() }}
						<div class="form-group">
							<label for="email">Email:</label>
							<input type="email" name="email" id="email" class="form-control" placeholder="email@mail.com">
						</div>
						<div class="form-group">
							<label for="subject">Subject:</label>
							<input type="text" name="subject" id="subject" class="form-control" placeholder="website ..">
						</div>
						<div class="form-group">
							<label for="message">Message:</label>
							<textarea type="email" name="message" id="message" class="form-control" placeholder="Type your text"></textarea>
						</div>

						<input type="submit" name="name" value="Submit" class="btn btn-default">
					</form>
				</div>
			</div>
		</div>

@endsection
