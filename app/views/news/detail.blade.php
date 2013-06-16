@extends('layout')
@section('content')
<div class="row-fluid">
    <section class="span8">
    <div id="news-content">
        <h2><a href="{{ $news_item->link }}">{{ $news_item->title }}</a></h2>
        <p class="muted info">{{ e($news_item->courier_name) }} <span>{{ $news_item->created_at->format('Y-m-d H:i') }}</span></p>
        <div class="content">
        {{ e($news_item->abstract) }}
        </div>
    </div>
    <hr />
    <div id="news-comment">
        <legend>全部评论</legend>
        
        
        @if(!$news_comments->isEmpty())
            <ul id="comment-list" class="unstyled">
            @foreach ($news_comments as $news_comment) 
                <li id="news-comment-{{ $news_comment->id }}">
                <div class="pull-left avatar">
                    <img src="/img/test_group_pic.jpg" />
                </div>
                <div class="content">
                <p class="info muted">{{ $news_comment->author_name }} <span>{{ $news_comment->created_at->format('Y-m-d H:i') }}</span></p>
                <p>{{ $news_comment->content }}</p>
                <p><a class="comment-quote" comment-quote-content="回复 @{{ $news_comment->author_name }} 的评论：">回复</a>
                </div>
                </li>
            @endforeach
            </ul>
            <div>{{ $news_comments->links() }}</div>
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
            <form id="wmd-form" action="/news/{{ $news_item->id }}/comment" method="post" >
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
    </section>
    
    <div class="span4 sidebar">
        <p>
        <a class="btn btn-large btn-block btn-primary" href="/news/deliver">我要投递</a>
        </p>
        <hr />
        <div class="sidebar-plate">
            <legend>热门标签</legend>
            <?php $tags = Tag::orderBy('refer_count', 'desc')->take(7)->get() ?>
            @if(!$tags->isEmpty())
            
                @foreach ($tags as $tag)
                <a href="{{ URL::route('tag_detail', array($tag->id)) }}"><span class="label label-inverse">{{ $tag->tag }}</span></a>
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