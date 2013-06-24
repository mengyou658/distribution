@extends('layout')
@section('content')
<div class="row-fluid">
<div class="span8">
<legend>问答</legend>

@foreach ($questions as $question)
    <div class="media">
      <div class="media-body">
        <h4 class="media-heading"><a href="/ask/question/{{ $question->id }}">{{ e($question->title) }}</a></h4>
        <p><a href="/ask/question/{{ $question->id }}#answer">回答({{ $question->answer_count }})</a><span class="pull-right">{{ $question->asker_name }}提问于 {{ $question->created_at->format('Y-m-d h:i'); }}</span></p>
      </div>
    </div>
@endforeach
{{ $questions->links() }}

</div>
  <div class="span4 sidebar">
  <p>
  <a class="btn btn-large btn-block btn-primary" href="/ask/new_question">我要提问</a>
  </p>
  <hr />
    @include('ask.sidebar')
  </div>
</div>
@endsection