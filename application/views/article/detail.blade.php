@layout('layout')
@section('content')
<div class="row-fluid">
<div class="span8">
<ul class="breadcrumb">
    <li><a href="#">Home</a> <span class="divider">/</span></li>
    <li><a href="#">Library</a> <span class="divider">/</span></li>
    <li class="active">Data</li>
</ul>
<div class="well">
    {{ $article->title }}
    <br />
    {{ $article->author }}
    <br />
    <div class="aritcle-content">
    {{ $article->content }}
    </div>
</div>
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
<div class="span4">
<h3 > Tags </h3>
<a href="#"><span class="label label-inverse">统计</span></a>
<span class="label label-inverse">R</span>
<span class="label label-inverse">正态分布</span>
<span class="label label-inverse">distribution</span>
</div>
</div>
</div>
@endsection