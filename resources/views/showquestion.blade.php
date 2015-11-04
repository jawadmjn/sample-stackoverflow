@extends('layouts.master')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Question</div>

				<div class="panel-body">

					<h1>{{ $title }}</h1>

					<?php $i = 1; ?>
					@foreach ($answer as $key => $value)
						<h5>Answer {{ $i }}:</h5>
						<p>
							{{ $value->description }}
						</p>
					<?php $i++; ?>
					@endforeach

					<h2>Your Answer ?</h2>
					@include('forms.answerform')
				</div>
			</div>
		</div>
	</div>
</div>
@endsection