@extends('layout')

@section('content')
<div class="row">
    <div class="col-sm-8">
        <div class="page-header">
            <legend>文章</legend>
        </div>

        <div class="article-detail">
            <h2>{{$article->title}}</h2>
            <p>{{$article->published_at}}</p>
            <div>
                {{$article->content}}
            </div>
        </div>
        
        <hr class="bold">

        @include('utils.comment', ['topic' => $topic, 'comments' => $comments, 'refer' => $refer])

    </div>

    <div class="col-sm-4">
        @include('sidebar')
    </div>
</div>
@stop