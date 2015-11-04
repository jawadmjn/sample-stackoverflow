@extends('layouts.master')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Latest 10 Questions - Click on Question to view all the Answers</div>

				@include('forms.homeform')
				<div class="panel-body">

					<?php $i = 1; ?>
					@foreach ($questions as $key => $value)

						<h5>Question:
							<a href="#" id="home_question" class="btn btn-link js-submit" value="{{ $value->id }}">{{ $value->title }}</a>
						</h5>
						<p>
							{{ $value->description }}
						</p>

					<?php $i++; ?>
					@endforeach

				</div>
			</div>
		</div>
	</div>
</div>
@section('javascript')
<script type="text/javascript">
//var $ = jQuery.noConflict();
$('.js-submit').click(function(){
    var qid = $(this).attr('value');
    $('input[name="qid"]').val(qid);
    $('#homeForm').submit();
});
</script>
@stop

@endsection
