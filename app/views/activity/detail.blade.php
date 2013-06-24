@extends('layout')
@section('content')
<div class="row-fluid">
  <div class="span8">
    <legend>活动</legend>

    <div id="activity-content" class="well">
        <h2>{{ e($activity->title) }}</h2>
        <p>{{ e($activity->descr) }}</p>
        <p>其他信息</p>
        <p>
        @if($joined)
        <a href="/activity/{{ $activity->id }}/quit" class="btn btn-primary">退出活动</a>
        @else
        <a href="/activity/{{ $activity->id }}/join" class="btn btn-primary">报名参加</a>
        @endif
        </p>
    </div>
    
    <div id="activity-comment">
        <legend>全部评论</legend>
        
        
        @if(!$activity_comments->isEmpty())
            <ul id="comment-list" class="unstyled">
            @foreach ($activity_comments as $activity_comment) 
                <li id="activity-comment-{{ $activity_comment->id }}">
                <div class="pull-left avatar">
                    <img src="/img/test_group_pic.jpg" />
                </div>
                <div class="content">
                <p class="info muted">{{ $activity_comment->author_name }} <span>{{ $activity_comment->created_at->format('Y-m-d H:i') }}</span></p>
                <p>{{ $activity_comment->content }}</p>
                <p><a class="comment-quote" comment-quote-content="回复 @{{ $activity_comment->author_name }} 的评论：">回复</a>
                </div>
                </li>
            @endforeach
            </ul>
            <div>{{ $activity_comments->links() }}</div>
        @else
        <div class="alert alert-info">
           <button type="button" class="close" data-dismiss="alert">&times;</button>
            还没有人评论
        </div>
        @endif
        
        @if( Auth::check() )
        <div id="comment-reply">
            <legend>你的评论</legend>
            <div id="wmd-panel" class="wmd-panel">
            <div id="wmd-button-bar"></div>
            <form id="wmd-form" action="/activity/{{ $activity->id }}/comment" method="post" >
                <div class="clearfix">
                <textarea id="wmd-input" class="wmd-input" name="markdown" rows="7"></textarea>
                <div id="wmd-preview" class="wmd-panel wmd-preview well"></div>
                </div>
                <a id="wmd-submit" class="btn btn-primary">发布</a>
            <form>
            </div>
        </div>
        @else
        <div class="alert alert-block">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            登录后才能评论
        </div>
        @endif
    </div>
  </div>

  <div class="span4 sidebar">
      @include('activity.sidebar')
      <div class="sidebar-plate">
        <legend>参加人员</legend>
          <div class="sidebar-users row-fluid">
            @foreach ($users as $user)
                <div class="sidebar-user span3">
                    <a href="/user/{{$user->id}}"><img src="{{$user->avatar}}" /></a>
                    <a href="/user/{{$user->id}}">{{$user->username}}</a>
                </div>
            @endforeach
          </div>
      </div>
  </div>
</div>
@endsection

@section('js')
<script src="/js/vendor/pagedown/Markdown.Converter.js"></script>
<script src="/js/vendor/pagedown/Markdown.Sanitizer.js"></script>
<script src="/js/vendor/pagedown/Markdown.Editor.js"></script>  
<script src="/js/editor.js"></script>
@endsection