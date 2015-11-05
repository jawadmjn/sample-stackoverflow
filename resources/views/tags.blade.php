@extends('layouts.master')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Click on a Tag for releated search</div>

				<div class="panel-body">
					<!-- This loop getting all the Questions title and exploding w/t "SPACE " -->
					@foreach ($questions as $key => $value)
						<?php $tag[] = explode(" ", $value->title); ?>
					@endforeach

					<!-- This loop getting Single values from each array stored in tag[] -->
					@foreach ($tag as $key => $value)
						@foreach ($value as $key => $singlevalue)
						<!-- if statement storing all the single values in another tags if its leanghty enough to be a tag -->
							@if (strlen($singlevalue) > 2)
								<?php $utag[] = $singlevalue; ?>
							@endif
						@endforeach
					@endforeach

					<!-- Make every single value unique, so no repeating of tags -->
					<?php $utag = array_unique($utag); ?>

					@foreach ($utag as $value)
						<a href="tag/{{ $value }}" class="btn btn-default">{{ $value }}</a>
					@endforeach

				</div>
			</div>
		</div>
	</div>
</div>
@endsection