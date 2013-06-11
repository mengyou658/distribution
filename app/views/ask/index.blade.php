@extends('layout')
@section('content')
<div class="row-fluid">
<div class="span8">
<legend>问答</legend>

@foreach ($questions as $question)
    <h5><a href="/ask/question/{{ $question->id }}">{{ $question->title }}</a></h5>
    <hr />
@endforeach
{{ $questions->links() }}
</div>
<div class="span4">
<p>
<a class="btn btn-large btn-block btn-primary" href="/ask/new_question">我要提问</a>
</p>
<hr />
<h4>最热新闻</4>

<hr />

<h4>标签</4>

<hr />

</div>
</div>
@endsection