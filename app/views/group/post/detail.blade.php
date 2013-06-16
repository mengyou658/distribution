@extends('layout')
@section('content')
<div class="row-fluid">
    <section class="span8">
    <div id="post-content">
        <h2>{{ $post->title }}</a></h2>
        <p class="muted info">{{ $post->author_name }} <span>{{ $post->group_name }}</span><span>{{ $post->created_at->format('Y-m-d H:i') }}</span></p>
        <div class="content">
        {{ $post->content }}
        </div>
    </div>
    <hr />
    <div id="post-comment" class="">
        <legend>全部评论</legend>
        @if(!$post_comments->isEmpty())
            <ul id="comment-list" class="unstyled">
            @foreach ($post_comments as $post_comment) 
                <li id="post-comment-{{ $post_comment->id }}">
                <div class="pull-left avatar">
                    <img src="/img/test_group_pic.jpg" />
                </div>
                <div class="content">
                <p class="info muted">{{ $post_comment->author_name }} <span>{{ $post_comment->created_at->format('Y-m-d H:i') }}</span></p>
                <p>{{ $post_comment->content }}</p>
                <p><a class="comment-quote" comment-quote-content="@{{ $post_comment->author }}: {{ Str::limit($post_comment->markdown, 20) }}">回复</a></p>
                </div>
                </li>
            @endforeach
            </ul>
            <div>{{ $post_comments->links() }}</div>
        @else
        <div class="alert alert-info">
           <button type="button" class="close" data-dismiss="alert">&times;</button>
            还没有人评论
        </div>
        @endif
        
        @if( !Auth::check() )
        <div class="alert alert-block">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            登录后才能评论
        </div>
        @elseif( !$is_member )
        <div class="alert alert-block">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            加入小组后才能评论
        </div>
        @else
        <div id="comment-reply">
            <legend>你的评论</legend>
            <div id="wmd-panel" class="wmd-panel">
            <div id="wmd-button-bar"></div>
            <form id="wmd-form" action="/group/{{ $post->group_id }}/post/{{ $post->id }}/comment" method="post" >
                <div class="clearfix">
                <textarea id="wmd-input" class="wmd-input" name="markdown"></textarea>
                <div id="wmd-preview" class="wmd-panel wmd-preview well"></div>
                </div>
                <a id="wmd-submit" class="btn btn-primary">发布</a>
            <form>
            </div>
        </div>
        @endif
    </div>
    </section>
    
  <div class="span4 sidebar">
    <div class="sidebar-plate">
        <legend>推荐小组</legend>
        <?php $groups = Group::orderBy('created_at', 'desc')->take(3)->get(); ?>
        @if(!$groups->isEmpty())
        <ul class="sidebar-ul unstyled">
            @foreach ($groups as $group)
            <li>
                <a class="pull-left" href="/group/{{$group->id}}"><img src="{{$group->pic}}" /></a>
                <div class="sidebar-ul-body">
                    <a href="/group/{{$group->id}}">{{$group->name}}</a><span>{{ $group->member_count }}人加入</span>
                    <p>{{ Str::limit($group->descr, 10) }}</p>
                </div>
            </li>
            @endforeach
        </ul>
        @endif
    </div>
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
        <legend>近期活动</legend>
        <ul class="sidebar-ul unstyled">
            <li>
                <div class="sidebar-ul-body">
                    <a href="">R沙龙</a><span>15人参加</span>
                    <p>本期R沙龙，主要内容是</p>
                </div>
            </li>
            <li>
                <div class="sidebar-ul-body">
                    <a href="">R沙龙</a><span>15人参加</span>
                    <p>本期R沙龙，主要内容是</p>
                </div>
            </li>
            <li>
                <div class="sidebar-ul-body">
                    <a href="">R沙龙</a><span>15人参加</span>
                    <p>本期R沙龙，主要内容是</p>
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