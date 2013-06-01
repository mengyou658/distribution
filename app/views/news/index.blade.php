@extends('layout')
@section('content')
<div class="row-fluid">
<div class="span8">
<h3>最新新闻</h3>

@foreach ($news as $news_item)
    <h5>{{ $news_item->title }}</h5>
    <p>{{ $news_item->abstract }}</p>
    <hr />
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