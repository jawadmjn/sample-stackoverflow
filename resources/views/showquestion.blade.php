@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Question</div>

                <div class="panel-body">

                  <h1>Q: {{ $results['title'] }}</h1>
                  <h4>Total {{ $results['answer']->total() }} Answers available</h4>
                    {!! $results['answer']->appends(['qid' => $qid])->render() !!}
                    @foreach ($results['answer'] as $key => $value)
                        <h5>Answer:</h5>
                        <p>
                            {{ $value->description }}
                        </p>
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