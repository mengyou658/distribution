@extends('layout')
@section('content')
<div class="row-fluid">
    <section class="span8">

    <ul class="breadcrumb">
        <li><a href="#">文章</a> <span class="divider">/</span></li>
        <li class="active">{{ $article->title }}</li>
    </ul>

    <div id="article-content">
        <h2> {{ $article->title }} </h2>
        <br />
        {{ $article->author }} 发表于 {{ date("Y-m-d H:i", strtotime($article->created_at)) }}
        <br />
        <div class="aritcle-content">
        {{ $article->content }}
        </div>
    </div>
    <hr />
    <div id="article-comment" class="">
        <legend>全部评论</legend>
        
        
        @if(!$article_comments->isEmpty())
            <ul id="article-comment-list">
            @foreach ($article_comments as $article_comment)
                <li id="article-comment-{{ $article_comment->id }}" class="">{{ $article_comment->content }}<a class="comment-quote" comment-quote-content="{{ $article_comment->markdown }}">回复</a></li>
            @endforeach
            </ul>
            <div>{{ $article_comments->links() }}</div>
        @else
            No article_comments!
        @endif
        
        @if( Auth::check() )
        <div id="comment-reply">
            <legend>你的评论</legend>
            <div id="wmd-panel" class="wmd-panel">
            <div id="wmd-button-bar"></div>
            <form id="wmd-form" action="/article/{{ $article->id }}/comment" method="post" >
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
        <h3> 最新文章 </h3>
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
