@extends('layout')

@section('content')
<div class="row">
    <div class="col-sm-8">

        <div class="page-header">
            <legend>活动</legend>
        </div>

        <div class="event-detail">
            <h1>{{$activity->title}}</h1>

            <div>
                {{$activity->content}}
            </div>
            <p>
                @if (!$isJoined)
                <a href="{{action('ActivityController@getJoin', $activity->id)}}" class="btn btn-primary btn-wide activity-join">报名参与活动</a>
                @else
                <a href="{{action('ActivityController@getQuit', $activity->id)}}" class="btn btn-primary btn-wide activity-quit">退出活动</a>
                @endif
            </p>
        </div>
        
        <hr>
        @include('utils.comment', ['topic' => $topic, 'comments' => $comments, 'refer' => $refer])

    </div>

    <div class="col-sm-4">
        @include('event.sidebar.series')
        @include('sidebar')
    </div>
</div>
@stop

@section('js')
<script>
$(function(){
    
    // 防止重复点击
    $('.activity-join, .activity-quit').on('click', function () {
        var $btn = $(this).button('loading');
    });

});
</script>
@stop