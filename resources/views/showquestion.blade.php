@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Question</div>

                <div class="panel-body">

                    <h1>Q: {{ $title }}</h1>

                    <?php $i = 1; ?>
                    @foreach ($answer as $key => $value)
                        <h5>Answer {{ $i }}:</h5>
                        <p>
                            {{ $value->description }}
                        </p>
                    <?php $i++; ?>
                    <hr>
                    @endforeach

                    <h2>Your Answer ?</h2>
                    @include('forms.answerform')
                </div>
            </div>
        </div>
    </div>
</div>

@section('javascript')
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.1.47/jquery.form-validator.min.js"></script>
<script type="text/javascript">
$.validate({
    form : '#createForm',
    borderColorOnError : '#d3d3d3'
});
</script>
@stop

@endsection