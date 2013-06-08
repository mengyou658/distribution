@extends('layout')
@section('content')
<div class="row-fluid">
<div class="span8">
<legend>文章列表</legend>

@foreach ($articles as $article)
    <div class="media">
      <a class="pull-left" href="/article/{{ $article->id }}">
        <img src="{{ $article->thumbnail }}" width="166">
        <br />
        // TODO: css 标宽度
      </a>
      <div class="media-body">
        <h4 class="media-heading">{{ $article->title }}</h4>
        {{ $article->abstract }}
        <p><a href="/article/{{ $article->id }}">阅读全文</a> 发表于 {{ $article->created_at->format('Y-m-d h:i'); }}</p>
      </div>
    </div>
@endforeach
{{ $articles->links() }}
</div>
<div class="span4">
<h4>最热文章</4>

<hr />
<h4>最新文章</4>

<hr />
<h4>标签</4>

<hr />

</div>
</div>
@endsection