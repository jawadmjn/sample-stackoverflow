@extends('layouts.master')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Question</div>

				<div class="panel-body">

					<h2>You are logged in! Timestamps {{ $title }}</h2>
					<h5>Answer 1:</h5>
					<p>
						{{ $answer }}
					</p>

					<h2>Your Answer ?</h2>
					@include('forms.answerform')
				</div>
			</div>
		</div>
	</div>
</div>
@endsection