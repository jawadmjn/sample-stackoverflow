@extends('layouts.master')

@section('content')

<?php use App\Models\tags; ?>

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Latest 10 Questions - Click on Question to view all the Answers</div>

                @include('forms.homeform')
                <div class="panel-body home_style">

                    @if ($questions == null )
                        No Questions, <a href="{{ url('createview') }}" class="btn btn-link js-submit">Create Now</a>
                    @else
                        @foreach ($questions as $key => $value)
                            <h5>Question:
                                <a href="#" class="btn btn-link js-submit" value="{{ $value->id }}">{{ $value->title }}</a>
                            </h5>
                            <p>
                            <?php
                            // strip tags to avoid breaking any html
                            $string = strip_tags($value->description);

                            if (strlen($string) > 45) {

                                // truncate string
                                $stringCut = substr($string, 0, 45);

                                // for making sure it ends in a word so assassinate doesn't become ass...
                                $string = substr($stringCut, 0, strrpos($stringCut, ' ')).'<span> ... Click on Question to Read More<span>';
                                echo $string;
                            }
                            else
                            {
                                echo $value->description;
                            }
                            ?>
                            </p>

                            <!-- Start of creating Tags for each question -->
                            <?php $tag = tags::get_questiontag($value->title); ?>
                            <!-- ! END of creating Tags for each question -->

                            @if($tag != null)
                            @foreach ($tag as $value)
                                <a href="tag/{{ $value }}" class="btn btn-default">{{ $value }}</a>
                            @endforeach
                            @endif
                            <hr>
                        @endforeach
                    @endif

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
