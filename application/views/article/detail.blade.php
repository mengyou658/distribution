@layout('layout')
@section('content')
<div>

    {{ $article->title }}
    <br />
    {{ $article->author }}
    <br />
    {{ $article->content }}
    <hr />
    Page: {{ $page }}
    <br />
    Comments : <br /><br />
    @forelse ($article_comments as $article_comment)
    {{ $article_comment->content }}
    <br />
    <br />
    @empty
        No article_comments!
    @endforelse
</div>
@endsection