@extends('layout')
@section('content')
<div class="row-fluid">
    <section class="span8">
    <legend>文章</legend>

    <div id="article-content">
        <h2> {{ $article->title }} </h2>
        <p class="muted info">{{ $article->author_name }} <span>{{ $article->created_at->format('Y-m-d H:i') }}</span></p>
        <div class="content">
        {{ $article->content }}
        </div>
    </div>
    <hr />
    <div id="article-comment">
        <legend>全部评论</legend>
        @if(!$article_comments->isEmpty())
            <ul id="comment-list" class="unstyled">
            @foreach ($article_comments as $article_comment) 
                <li id="article-comment-{{ $article_comment->id }}">
                <div class="pull-left avatar">
                    <img src="/img/test_group_pic.jpg" />
                </div>
                <div class="content">
                <p class="info muted">{{ $article_comment->author_name }} <span>{{ $article_comment->created_at->format('Y-m-d H:i') }}</span></p>
                <p>{{ $article_comment->content }}</p>
                <p><a class="comment-quote" comment-quote-content="@{{ $article_comment->author_name }}: {{ Str::limit($article_comment->markdown, 20) }}">回复</a></p>
                </div>
                </li>
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
                <textarea id="wmd-input" class="wmd-input" name="markdown" rows="5"></textarea>
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
    </section>

    <div class="span4 sidebar">
        @include('article.sidebar')
    </div>

</div>
@endsection

@section('js')
<script src="/js/vendor/pagedown/Markdown.Converter.js"></script>
<script src="/js/vendor/pagedown/Markdown.Sanitizer.js"></script>
<script src="/js/vendor/pagedown/Markdown.Editor.js"></script>  
<script src="/js/editor.js"></script>
@endsection
