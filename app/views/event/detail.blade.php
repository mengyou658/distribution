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
                <a href="{{action('ActivityController@getJoin', $activity->id)}}" class="btn btn-primary btn-wide">报名参与活动</a>
                @else
                <a href="{{action('ActivityController@getQuit', $activity->id)}}" class="btn btn-primary btn-wide">退出活动</a>
                @endif
            </p>
        </div>
        
        <hr>
        @include('utils.comment', ['topic' => $topic, 'comments' => $comments])

    </div>

    <div class="col-sm-4">
        @include('event.sidebar.series')
        @include('sidebar')
    </div>
</div>
@stop