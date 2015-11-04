@extends('layouts.master')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Latest 10 Questions - Click on Question to view all the Answers</div>

				@include('forms.homeform')
				<div class="panel-body">
					<h5>
						<a href="#" id="home_question" class="btn btn-link js-submit" value="2">Cancel</a>
						<!-- <button type="button" class="btn btn-link" name="foo" value="A">Link</button> -->
						<input type="hidden" class="q" name="qid" id="qid" value="2"/>
					</h5>
					<p>
						{{ Inspiring::quote() }}
					</p>
				</div>
			</div>
		</div>
	</div>
</div>
@section('javascript')
<script type="text/javascript">
//var $ = jQuery.noConflict();
$('.js-submit').click(function(){
    var upsell = $(this).attr('value');
    $('input[name="qid"]').val(upsell);
    $('#homeForm').submit();
});
</script>
@stop

@endsection
