@extends('layout')
@section('content')
<div class="row-fluid">
    <section class="span8">

    {{ $news_item->title }}
    <br />
    {{ $news_item->courier }}
    <br />
    {{ $news_item->abstract }}
    <hr />
    <div id="news-comment" class="">
        <legend>全部评论</legend>
        
        
        @if(!empty($news_comments))
            <ul id="news-comment-list">
            @foreach ($news_comments as $news_comment)
                <li id="news-comment-{{ $news_comment->id }}" class="">{{ $news_comment->content }}<a class="comment-quote" comment-quote-content="{{ $news_comment->markdown }}">回复</a></li>
            @endforeach
            </ul>
            <div>{{ $news_comments->links() }}</div>
        @else
            No news_comments!
        @endif
        
        @if( Auth::check() )
        <div id="comment-reply">
            <legend>你的评论</legend>
            <div id="wmd-panel" class="wmd-panel">
            <div id="wmd-button-bar"></div>
            <form id="wmd-form" action="/news/{{ $news_item->id }}/comment" method="post" >
                <div class="clearfix">
                <textarea id="wmd-input" class="wmd-input pull-left" name="markdown"></textarea>
                <div id="wmd-preview" class="wmd-panel wmd-preview well pull-right"></div>
                </div>
                <a id="wmd-submit" class="btn btn-primary">发布</a>
            <form>
            </div>
        </div>
        @else
        登录后方可评论 // TODO: 此处样式调整
        @endif
    </div>
    </section>
    
    <div class="span4">
        <h3>最热新闻</h3>
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