<form class="form-horizontal" id="createForm" role="form" method="POST" action="{{ url('createanswer') }}">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">

	<div class="form-group">
		<div class="col-md-6">
			<input
				type="hidden"
				class="form-control"
				name="qid"
				id="qid"
				value="{{ $qid }}"
			/>
			<textarea class="form-control"
				id="detail"
				name="detail"
				rows="3"
				data-validation="required custom"
	            data-validation-error-msg="Enter Answer"
				></textarea>
		</div>
	</div>

	<div class="form-group">
		<div class="col-md-5 col-md-offset-0">
			<button type="submit" class="btn btn-primary">
				Post Your Answer
			</button>
		</div>
	</div>
</form>