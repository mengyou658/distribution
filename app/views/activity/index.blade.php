@extends('layout')
@section('content')
<div class="row-fluid">
  <div class="span9">
    <legend>活动</legend>

    <div class="row-fluid">
@foreach($activities as $i => $activity)
    @if($i%3==0)
    <ul class="thumbnails">
    @endif
        <li class="span4">
            <div class="thumbnail">
              <img src="{{ $activity->pic }}">
              <div class="caption">
                <h3>{{ e($activity->title) }}</h3>
                <p>{{ e(Str::limit($activity->descr, 100)) }}</p>
                <p><a href="/activity/{{ $activity->id }}" class="btn btn-primary">参加</a></p>
              </div>
            </div>
          </li>
    @if($i%3==2)
    </ul>
    @endif    
@endforeach
    </div>
  </div>
    
    
  <div class="span3 sidebar">
      @include('activity.sidebar')
  </div>
</div>
@endsection