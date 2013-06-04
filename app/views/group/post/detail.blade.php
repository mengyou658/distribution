@extends('layout')
@section('content')
<div class="row-fluid">
    <section class="span8">

    <ul class="breadcrumb">
        <li><a href="/groups">群组</a> <span class="divider">/</span></li>
        <li><a href="/group/{{ $post->group_id }}">{{ $post->group_name }}</a> <span class="divider">/</span></li>
        <li class="active">{{ $post->title }}</li>
    </ul>
    {{ $post->author }}
    <br />
    {{ $post->title }}
    <br />
    {{ $post->content }}
    <br />
    <hr />
    <div id="post-comment" class="">
        <legend>全部评论</legend>
        @if(!$post_comments->isEmpty())
            <ul id="post-comment-list">
            @foreach ($post_comments as $post_comment)
                <li id="post-comment-{{ $post_comment->id }}" class="">{{ $post_comment->content }}<a class="comment-quote" comment-quote-content="{{ $post_comment->markdown }}">回复</a></li>
            @endforeach
            </ul>
            <div>{{ $post_comments->links() }}</div>
        @else
            No post_comments!
        @endif
        
        @if( !Auth::check() )
        登录后方可评论 // TODO: 此处样式调整
        @elseif( !$is_member )
        加入小组后方可评论
        @else
        <div id="comment-reply">
            <legend>你的评论</legend>
            <div id="wmd-panel" class="wmd-panel">
            <div id="wmd-button-bar"></div>
            <form id="wmd-form" action="/group/{{ $post->group_id }}/post/{{ $post->id }}/comment" method="post" >
                <div class="clearfix">
                <textarea id="wmd-input" class="wmd-input pull-left" name="markdown"></textarea>
                <div id="wmd-preview" class="wmd-panel wmd-preview well pull-right"></div>
                </div>
                <a id="wmd-submit" class="btn btn-primary">发布</a>
            <form>
            </div>
        </div>
        @endif
    </div>
    </section>
    
    <div class="span4">
        <h3>最新帖子</h3>
        <ul class="unstyled">
          <li><a href="">正态分布</a></li>
          <li><a href="">正态分布</a></li>
          <li><a href="">正态分布</a></li>
          <li><a href="">正态分布</a></li>
          <li><a href="">正态分布</a></li>
        </ul>


        <h3>标签</h3>
        <a href="#"><span class="label label-inverse">统计</span></a>
        <span class="label label-inverse">R</span>
        <span class="label label-inverse">正态分布</span>
        <span class="label label-inverse">distribution</span>
    </div>
</div>

@endsection

@section('js')
<script src="/js/vendor/pagedown/Markdown.Converter.js"></script>
<script src="/js/vendor/pagedown/Markdown.Sanitizer.js"></script>
<script src="/js/vendor/pagedown/Markdown.Editor.js"></script>  
<script src="/js/editor.js"></script>
@endsection