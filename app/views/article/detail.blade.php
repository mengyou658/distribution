@extends('layout')
@section('content')
<div class="row-fluid">
    <section class="span8">
    <legend>文章</legend>

    <div id="article-content">
        <h2> {{ $article->title }} </h2>
        <p class="muted info">{{ $article->author }} <span>{{ $article->created_at->format('Y-m-d H:i') }}</span></p>
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
                <p class="info muted">{{ $article_comment->author }} <span>{{ $article_comment->created_at->format('Y-m-d H:i') }}</span></p>
                <p>{{ $article_comment->content }}</p>
                <p><a class="comment-quote" comment-quote-content="@{{ $article_comment->author }}: {{ Str::limit($article_comment->markdown, 20) }}">回复</a></p>
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
        登录后方可评论 // TODO: 此处样式调整
        @endif
    </div>
    </section>

    <div class="span4 sidebar">
        <div class="sidebar-plate">
            <legend>热门标签</legend>
            <?php $tags = Tag::orderBy('refer_count', 'desc')->take(7)->get() ?>
            @if(!$tags->isEmpty())
            
                @foreach ($tags as $tag)
                <a href="{{ URL::route('tag_detail', array($tag->tag)) }}"><span class="label label-inverse">{{ $tag->tag }}</span></a>
                @endforeach
            
            @endif
        </div>
        <div class="sidebar-plate">
            <legend>最新文章</legend>
            
            <ul class="sidebar-ul unstyled">
                <li>
                    <a class="pull-left" href="/group/"><img class="article" src="http://cos.name/wp-content/uploads/2013/05/6th-china-r-bj-500x332.jpg" /></a>
                    <div class="sidebar-ul-body">
                        <a href="">第六届中国R语言会议（北京）纪要</a>
                        <p>本届R会议，主要内容是</p>
                    </div>
                </li>
                <li>
                    
                    <div class="sidebar-ul-body">
                        <a href="">第六届中国R语言会议（北京）纪要</a>
                        <p>本届R会议，主要内容是</p>
                    </div>
                </li>
                <li>
                    
                    <div class="sidebar-ul-body">
                        <a href="">第六届中国R语言会议（北京）纪要</a>
                        <p>本届R会议，主要内容是</p>
                    </div>
                </li>
            </ul>
        </div>
      
        <div class="sidebar-plate">
            <legend>友情链接</legend>
            <ul class="sidebar-ul">
                <li>
                    <div class="sidebar-ul-body">
                        <a href="" target="_blank">厦门大学数据挖掘研究中心</a>
                    </div>
                </li>
                <li>
                    <div class="sidebar-ul-body">
                        <a href="" target="_blank">厦门大学数据挖掘研究中心</a>
                    </div>
                </li>
                <li>
                    <div class="sidebar-ul-body">
                        <a href="" target="_blank">厦门大学数据挖掘研究中心</a>
                    </div>
                </li>
            </ul>
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
