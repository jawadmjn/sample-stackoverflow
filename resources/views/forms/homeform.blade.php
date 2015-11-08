<form class="form-horizontal" id="homeForm" role="form" method="POST" action="{{ url('showquestion') }}">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input
        type="hidden"
        class="form-control"
        name="qid"
        id="qid"
        value=""
    />
</form>