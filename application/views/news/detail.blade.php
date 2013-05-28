@layout('layout')
@section('content')
<div>

    {{ $news_item->title }}
    <br />
    {{ $news_item->courier }}
    <br />
    {{ $news_item->abstract }}
    <hr />
    Page: {{ $page }}
    <br />
    Comments : <br /><br />
    @forelse ($news_comments as $news_comment)
    {{ $news_comment->content }}
    <br />
    <br />
    @empty
        No news_comments!
    @endforelse
</div>
@endsection