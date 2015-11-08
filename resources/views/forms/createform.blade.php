@if( isset($error) )
<h3 class="custom-error">* {{ $error }}</h3>
@endif
<form class="form-horizontal" id="createForm" role="form" method="POST" action="{{ url('createquestion') }}">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	<div class="form-group">
		<label class="col-md-1 control-label"><b>Title</b></label>
		<div class="col-md-6">
			<input
				type="text"
				class="form-control"
				name="title"
				id="title"
				data-validation="required custom"
	            data-validation-error-msg="Enter Question's Title"
				value="{{ old('title') }}"
			/>
		</div>
	</div>

	<div class="form-group">
		<label class="col-md-1 control-label">Description</label>
		<div class="col-md-6">
			<textarea class="form-control"
				id="detail"
				name="detail"
				rows="3"
				data-validation="required custom"
	            data-validation-error-msg="Enter Question's Description"
				value="{{ old('detail') }}"
				></textarea>
		</div>
	</div>

	<div class="form-group">
		<div class="col-md-5 col-md-offset-2">
			<button type="submit" class="btn btn-primary">
				Register
			</button>
			<a href="{{ url('/') }}" id="cancel" class="btn btn-info" role="button">Cancel</a>
		</div>
	</div>
</form>