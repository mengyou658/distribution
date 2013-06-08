@extends('layout')
@section('content')
<div class="row-fluid">
  <div class="span8">
    <h3>文章</h3>
        <?php $articles = Article::orderBy('created_at', 'desc')->take(7)->get() ?>
    <div calss="home-article"> 
        <div class="headline">
            <h4><a href="/article/{{ $articles[0]->id }}">{{ $articles[0]->title }}</a></h4>
            <img class="pull-left" src="{{ $articles[0]->thumbnail }}" width="166" />
            <p>{{ $articles[0]->abstract }}</p>
            <p><a href="/article/{{ $articles[0]->id }}">阅读全文</a> 发表于 {{ $articles[0]->created_at->format('Y-m-d h:i'); }} </p>
        </div>
        
        <div class="row-fluid">
            <div class="span6">
                <ul class="unstyled">
                @for ($i = 1; $i < 4; $i ++)
                    <li><a href="{{ URL::route('article_detail', array($articles[$i]->id)) }}">{{ $articles[$i]->title }}</a></li>
                @endfor
                </ul>
            </div>
            <div class="span6">
                <ul class="unstyled">
                @for ($i = 4; $i < 7; $i ++)
                    <li><a href="{{ URL::route('article_detail', array($articles[$i]->id)) }}">{{ $articles[$i]->title }}</a></li>
                @endfor
                </ul>
            </div>
        </div>
    </div>
    <hr />
    <!-- TODO: 
    <div>
        <legend>热门问答</legend>
        
        
        <hr />
    </div>
    
    <div>
        <legend>近期活动</legend>
        <hr />
    </div>
    -->
    
    <div class="home-group">
        <legend>群组热帖</legend>
        <?php $posts = Post::orderBy('created_at', 'desc')->take(5)->get() ?>
        <ul class="unstyled">
            @foreach ($posts as $post)
                <li><a href="{{ URL::route('group_post_detail', array($post->group_id, $post->id)) }}">{{ $post->title }}</a></li>
            @endforeach
        </ul>
    </div>
  </div>
  <div class="span4">
    <div>
        <legend>标签</legend>
        <?php $tags = Tag::orderBy('refer_count', 'desc')->take(3)->get() ?>
        @if(!empty($tags))
        
            @foreach ($tags as $tag)
            <a href="{{ URL::route('tag_detail', array($tag->tag)) }}"><span class="label label-inverse">{{ $tag->tag }}</span></a>
            @endforeach
        
        @endif
    </div>
    
    <div>
        <legend>推荐小组</legend>
        <a href="/group/1">测试小组1</a>
    </div>
    
    <div>
        <legend>功能区域</legend>
    </div>
  
    <div>
        <legend>友情链接</legend>
    </div>
  
  
  </div>
</div>
@endsection