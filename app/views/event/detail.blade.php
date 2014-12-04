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

            <div>
                <h5>参加人</h5>
                @foreach($activity->members as $member)
                    <p><img src="{{$member->show_avatar}}">{{$member->name}}</p>
                @endforeach
            </div>
        </div>
        
        <hr>
        {{-- @include('utils.comment') --}}

        <div id="comment" class="ds-thread" data-thread-key="activity-{{$activity->id}}" data-title="{{$activity->title}}" data-url="{{action('ActivityController@getDetail', $activity->id)}}"></div>
        <script type="text/javascript">
        var duoshuoQuery = {
            short_name:"cos",
            // sso: { 
            //     login: "http://{{cur_domain()}}/user/login/",
            //     logout: "http://{{cur_domain()}}/user/logout/"
            // }
        };
        (function() {
            var ds = document.createElement('script');
            ds.type = 'text/javascript';ds.async = true;
            ds.src = (document.location.protocol == 'https:' ? 'https:' : 'http:') + '//static.duoshuo.com/embed.js';
            ds.charset = 'UTF-8';
            (document.getElementsByTagName('head')[0] 
             || document.getElementsByTagName('body')[0]).appendChild(ds);
        })();
        </script>

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