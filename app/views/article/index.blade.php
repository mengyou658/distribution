@extends('layout')

@section('content')
<div class="row">
    <div class="col-sm-8">
        <div class="page-header">
            <legend>文章</legend>
        </div>

        <div class="article-list">
            @foreach($articles as $article)
            <div class="article-item">
                <h1><a href="{{ action('ArticleController@getDetail', $article->id) }}">{{ $article->title }}</a></h1>
                
                <div>
                    <img src="">
                </div>
                <div>
                    {{$article->abstract}}
                </div>
                <p><a href="#">阅读全文</a> <a href="#comment">发表评论</a></p>
            </div>
            <hr>
            @endforeach

            {{$articles->links()}}
        </div>

    </div>

    <div class="col-sm-4">
        @include('article.sidebar.category')
        @include('sidebar')
    </div>
</div>
@stop