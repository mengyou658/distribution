@extends('layout')
@section('content')
<div class="row-fluid">
<div class="span8">
<h3>文章列表</h3>

@foreach ($articles as $article)
    <h5>{{ $article->title }}</h5>
    <img src="{{ $article->thumbnail }}" />
    <p>{{ $article->abstract }}</p>
    <hr />
@endforeach
{{ $articles->links() }}
</div>
<div class="span4">
<h4>最热文章</4>

<hr />
<h4>最新文章</4>

<hr />
<h4> Tags </4>

<hr />

</div>
</div>
@endsection