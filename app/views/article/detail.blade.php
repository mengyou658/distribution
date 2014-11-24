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
            <div class="article-content">
                {{$article->content}}
            </div>
        </div>
        
        <hr class="bold">

        @include('utils.comment')

    </div>

    <div class="col-sm-4">
        @include('sidebar')
    </div>
</div>
@stop

@section('js')
<script src="/js/comment.js"></script>
@stop