@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Your search for the tag - <b>{{ $tag }}</b></div>

                @include('forms.homeform')
                <div class="panel-body home_style">

                    @foreach ($questions as $key => $value)

                        <h5>Question:
                            <a href="#" id="home_question" class="btn btn-link js-submit" value="{{ $value->id }}">{{ $value->title }}</a>
                        </h5>
                        <p>
                        <?php
                        // strip tags to avoid breaking any html
                        $string = strip_tags($value->description);

                        if (strlen($string) > 45) {

                            // truncate string
                            $stringCut = substr($string, 0, 45);

                            // make sure it ends in a word so assassinate doesn't become ass...
                            $string = substr($stringCut, 0, strrpos($stringCut, ' ')).'<span> ....  Click on Question to Read More</span>';
                            echo $string;
                        }
                        else
                        {
                            echo $value->description;
                        }
                        ?>
                        </p>
                        <hr>
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