@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Click on a Tag for releated search</div>

                <div class="panel-body">
                    @foreach ($tag as $value)
                        <a href="tag/{{ $value }}" class="btn btn-default">{{ $value }}</a>
                    @endforeach
                </div>

            </div>
        </div>
    </div>
</div>
@endsection