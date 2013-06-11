@extends('layout')
@section('content')
<div class="row-fluid">
    <section class="span8">

    <ul class="breadcrumb">
        <li><a href="/tags">标签</a> <span class="divider">/</span></li>
        <li class="active">{{ $tag->tag }}</li>
    </ul>
    // TODO: 链接，样式
    // MEMO: 不加缓存太危险
    <div>
    <legend>文章</legend>
    @foreach( $tag->articles as $article )
        {{ $article->title }}
    @endforeach
    </div>
    
    <div>
    <legend>新闻</legend>
    @foreach( $tag->news as $news_item )
        {{ $news_item->title }}
    @endforeach
    </div>
    
    <div>
    <legend>帖子</legend>
    @foreach( $tag->posts as $post )
        {{ $post->title }}
    @endforeach
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

        <h3> whatever </h3>
        <ul class="unstyled">
          <li><a href="">正态分布</a></li>
          <li><a href="">正态分布</a></li>
          <li><a href="">正态分布</a></li>
          <li><a href="">正态分布</a></li>
          <li><a href="">正态分布</a></li>
        </ul>

    </div>

</div>
@endsection
