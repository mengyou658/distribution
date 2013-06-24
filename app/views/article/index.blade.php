@extends('layout')
@section('content')
<div class="row-fluid">
<div class="span8">
<legend>文章</legend>

@foreach ($articles as $article)
<div class="media">
  <a class="pull-left" href="/article/{{ $article->id }}">
    <img src="{{ $article->thumbnail }}" />
  </a>
  <div class="media-body">
    <h4 class="media-heading"><a href="/article/{{ $article->id }}">{{ e($article->title) }}</a></h4>
    <p>{{ Str::limit($article->abstract, 136) }}</p>
    <p><a href="/article/{{ $article->id }}">阅读全文</a> <a href="/article/{{ $article->id }}#article-comment">评论({{ $article->comment_count }})</a> <span class="pull-right">发表于 {{ $article->created_at->format('Y-m-d h:i'); }}</span></p>
  </div>
</div>
@endforeach


{{ $articles->links() }}
</div>
<div class="span4 sidebar">
    <div class="sidebar-plate">
        <legend>文章栏目</legend>
        <?php $categories = Category::whereParent_id(0)->get() ?>
        @if(!$categories->isEmpty())
        <ul class="sidebar-ul">
            @foreach ($categories as $category)
            <li>
                <div class="sidebar-ul-body">
                    <a href="{{ URL::route('articles_category', array($category->id)) }}" >{{ $category->name }}</a>
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
        <legend>最热文章</legend>
        
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