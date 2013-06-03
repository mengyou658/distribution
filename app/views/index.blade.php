@extends('layout')
@section('content')
<div class="row-fluid">
  <div class="span8">
  // TODO: 硬编码测试数据，需调整
  <br />
  // TODO: 样式等功能完善后调整
    <div>
        <legend>最新文章</legend>
        
        <?php $articles = Article::orderBy('created_at', 'desc')->take(5)->get() ?>
        <ul class="unstyled">
            @foreach ($articles as $article)
                <li><a href="{{ URL::route('article_detail', array($article->id)) }}">{{ $article->title }}</a></li>
            @endforeach
        </ul>
        
        <hr />
    </div>
    
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
    
    <div>
        <legend>群组热帖</legend>
        <?php $posts = Post::orderBy('created_at', 'desc')->take(5)->get() ?>
        <ul class="unstyled">
            @foreach ($posts as $post)
                <li><a href="{{ URL::route('group_post_detail', array($post->group_id, $post->id)) }}">{{ $post->title }}</a></li>
            @endforeach
        </ul>
        
        <hr />
    </div>
  </div>
  <div class="span4">
    <div>
        <legend>标签</legend>
        <?php $tags = Tag::orderBy('refer_counts', 'desc')->take(10)->get() ?>
        @if(!empty($tags))
        <ul class="unstyled">
            @foreach ($tags as $tag)
                <li><a href="{{ URL::route('tag_detail', array($tag->tag)) }}">{{ $tag->tag }}</a></li>
            @endforeach
        </ul>  
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