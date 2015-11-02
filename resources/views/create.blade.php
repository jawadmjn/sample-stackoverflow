@extends('layouts.master')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Create Question</div>

				<div class="panel-body">
					@include('forms.createform')
				</div>

			</div>
		</div>
	</div>
</div>
@endsection
