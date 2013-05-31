@extends('layout')
@section('content')
<div class="row-fluid">
<div class="span8">

<!--<ul class="breadcrumb">
    <li><a href="#">Home</a> <span class="divider">/</span></li>
    <li><a href="#">Library</a> <span class="divider">/</span></li>
    <li class="active">Data</li>
</ul>-->

<div>
    <h2> {{ $article->title }} </h2>
    <br />
    {{ $article->author }} 发表于 {{ date("Y-m-d H:i", strtotime($article->created_at)) }}
    <br />
    <div class="aritcle-content">
    {{ $article->content }}
    </div>
</div>
    <hr />
    <br />
    Comments : <br /><br />
    {{ $article_comments->links() }}
    <br/>
    @if(count($article_comments) > 0)
        @foreach ($article_comments as $article_comment)
            {{ $article_comment->content }}
            <br />
            <br />
        @endforeach
    @else
        No article_comments!
    @endif
    <br />
    

   
</div>
<div class="span4">
<h3> 最新文章 </h3>
<ul class="unstyled">
  <li><a href="">正态分布</a></li>
  <li><a href="">正态分布</a></li>
  <li><a href="">正态分布</a></li>
  <li><a href="">正态分布</a></li>
  <li><a href="">正态分布</a></li>
</ul>


<h3> Tags </h3>
<a href="#"><span class="label label-inverse">统计</span></a>
<span class="label label-inverse">R</span>
<span class="label label-inverse">正态分布</span>
<span class="label label-inverse">distribution</span>
</div>
</div>
</div>
@endsection