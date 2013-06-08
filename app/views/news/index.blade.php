@extends('layout')
@section('content')
<div class="row-fluid">
<div class="span8">
<legend>新闻</legend>
    <ul class="nav nav-tabs">
    <li @if(Request::is('news')) class="active" @endif><a href="/news" >最新</a></li>
    <li @if(Request::is('news/hottest*')) class="active" @endif><a href="/news/hottest" >最热</a></li>
    </ul>
@foreach ($news as $news_item)
    <div class="media">
      <a class="pull-left btn btn-primary" href="#">
        <i class="icon-thumbs-up"></i>顶
      </a>
      <div class="media-body">
        <h4 class="media-heading"><a href="{{ $news_item->link }}">{{ $news_item->title }}</a></h4>
        {{ $news_item->abstract }}
        <p><a href="/news/{{ $news_item->id }}">评论</a></p>
      </div>
    </div>
@endforeach


{{ $news->links() }}
</div>
<div class="span4">
<p>
<a class="btn btn-large btn-block btn-primary" href="/news/deliver">我要投递</a>
</p>
<hr />
<h4>最热新闻</4>

<hr />

<h4>标签</4>

<hr />

</div>
</div>
@endsection