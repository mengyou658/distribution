@extends('layout')
@section('content')
<div>

    {{ $news_item->title }}
    <br />
    {{ $news_item->courier }}
    <br />
    {{ $news_item->abstract }}
    <hr />
    Page: {{ $news_comments->links() }}
    <br />
    Comments : <br /><br />
    @if(count($news_comments) > 0)
        @foreach ($news_comments as $news_comment)
            {{ $news_comment->content }}
            <br />
            <br />
        @endforeach
    @else
        No news_comments!
    @endif
</div>
@endsection