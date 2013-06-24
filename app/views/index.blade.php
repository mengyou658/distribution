@extends('layout')
@section('content')
<div class="row-fluid">
  <div class="span8">
    <legend>最新文章</legend>
    <?php $articles = Article::orderBy('created_at', 'desc')->take(7)->get() ?>
    <div class="home-plate"> 
        <div class="headline">
            <h4><a href="/article/{{ $articles[0]->id }}">{{ $articles[0]->title }}</a></h4>
            <img class="pull-left" src="{{ $articles[0]->thumbnail }}" />
            <p>{{ $articles[0]->abstract }}</p>
            <p><a href="/article/{{ $articles[0]->id }}">阅读全文</a> <a href="/article/{{ $articles[0]->id }}#article-comment">评论({{ $articles[0]->comment_count }})</a> <span class="pull-right">发表于 {{ $articles[0]->created_at->format('Y-m-d h:i'); }} </span></p>
        </div>
        
        <div class="row-fluid">
            <div class="span6">
                <ul class="">
                @for ($i = 1; $i < 4; $i ++)
                    <li><a href="{{ URL::route('article_detail', array($articles[$i]->id)) }}">{{ $articles[$i]->title }}</a></li>
                @endfor
                </ul>
            </div>
            <div class="span6">
                <ul class="">
                @for ($i = 4; $i < 7; $i ++)
                    <li><a href="{{ URL::route('article_detail', array($articles[$i]->id)) }}">{{ $articles[$i]->title }}</a></li>
                @endfor
                </ul>
            </div>
        </div>
    </div>
    <hr />
    <?php $news = News::orderBy('created_at', 'desc')->take(7)->get() ?>
    <div class="home-plate">
        <legend>最新新闻</legend>
        <div class="headline">
            <h4><a href="/news/{{ $news[0]->id }}">{{ $news[0]->title }}</a></h4>
            <p>{{ $news[0]->abstract }}</p>
            <p><a href="{{ $news[0]->link }}">阅读原文</a> <a href="/news/{{ $news[0]->id }}#news-comment">评论({{ $news[0]->comment_count }})</a> <span class="pull-right">发表于 {{ $news[0]->created_at->format('Y-m-d h:i'); }} </span></p>
        </div>
        
        <div class="row-fluid">
            <div class="span6">
                <ul class="">
                @for ($i = 1; $i < 4; $i ++)
                    <li><a href="{{ URL::route('news_detail', array($news[$i]->id)) }}">{{ $articles[$i]->title }}</a></li>
                @endfor
                </ul>
            </div>
            <div class="span6">
                <ul class="">
                @for ($i = 4; $i < 7; $i ++)
                    <li><a href="{{ URL::route('news_detail', array($news[$i]->id)) }}">{{ $articles[$i]->title }}</a></li>
                @endfor
                </ul>
            </div>
        </div>
    </div>
    <hr />
    <!-- TODO: 
    <div>
        <legend>近期活动</legend>
        <hr />
    </div>
    -->
    
    <?php $posts = Post::orderBy('created_at', 'desc')->take(7)->get() ?>
    <div class="home-plate">
        <legend>群组热帖</legend>
        <div class="headline">
            <h4><a href="/group/{{ $posts[0]->group_id }}/post/{{ $posts[0]->id }}">{{ $posts[0]->title }}</a></h4>
            <p>{{ $posts[0]->content }}</p>
            <p>发表在<a href="/group/{{ $posts[0]->group_id }}">{{ $posts[0]->group_name }}</a>  <a href="/group/{{ $posts[0]->group_id }}/post/{{ $posts[0]->id }}">阅读帖子</a> <a href="/group/{{ $posts[0]->group_id }}/post/{{ $posts[0]->id }}#post-comment">评论({{ $posts[0]->comment_count }})</a> <span class="pull-right">发表于 {{ $posts[0]->created_at->format('Y-m-d h:i'); }} </span></p>
        </div>
        
        <div class="row-fluid">
            <div class="span6">
                <ul class="">
                @for ($i = 1; $i < 4; $i ++)
                    <li><a href="{{ URL::route('group_post_detail', array($posts[$i]->group_id, $posts[$i]->id)) }}">{{ $posts[$i]->title }}</a></li>
                @endfor
                </ul>
            </div>
            <div class="span6">
                <ul class="">
                @for ($i = 4; $i < 7; $i ++)
                    <li><a href="{{ URL::route('group_post_detail', array($posts[$i]->group_id, $posts[$i]->id)) }}">{{ $posts[$i]->title }}</a></li>
                @endfor
                </ul>
            </div>
        </div>
    </div>
  </div>
  
  
  <div class="span4 sidebar">
@include('sidebar')
  </div>
</div>
@endsection