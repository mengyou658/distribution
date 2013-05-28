@layout('layout')
@section('content')
<div>
<h3>新闻列表</h3>
<hr />
@forelse ($news as $news_item)
    {{ $news_item->title }}
    <br />
@empty
    No news!
@endforelse
<br />
page: {{ $page }}
</div>
@endsection