@extends('layout')

@section('content')
<div class="row">
    <div class="col-sm-8">

        <div class="page-header">
            <legend>活动</legend>
        </div>

        <div class="event-list">
            <div class="row">
            @foreach($activities as $activity)
            <div class="col-sm-4">
                <div class="thumbnail">
                    <img style="width: 200px;" src="/img/test_event.png" alt="...">
                    <div class="caption">
                        <h3>{{{$activity->title}}}</h3>
                        <p>{{$activity->abstract}}</p>
                        <p><a href="{{action('ActivityController@getDetail', $activity->id)}}" class="btn btn-primary btn-wide">查看详情</a></p>
                    </div>
                </div>
            </div>
            @endforeach
            </div>
            {{$activities->links()}}
        </div>
        
    </div>

    <div class="col-sm-4">
        @include('event.sidebar.series')
        @include('sidebar')
    </div>
</div>
@stop