@layout('layout')
@section('content')
<div>
<h3>文章列表</h3>
<hr />
@forelse ($articles as $article)
    {{ $article->title }}
    <br />
@empty
    No articles!
@endforelse
</div>
@endsection