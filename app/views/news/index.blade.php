@extends('layout')
@section('content')
<div>
<h3>新闻列表</h3>
<hr />

@foreach ($news as $news_item)
    {{ $news_item->title }}
    <br />
@endforeach
{{ $news->links() }}

</div>
@endsection