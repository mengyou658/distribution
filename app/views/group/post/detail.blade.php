@extends('layout')

@section('css')
<link href="/css/highlight/github.css" rel="stylesheet">
<link href="/css/bootstrap-markdown.min.css" rel="stylesheet">
<link href="/css/tagmanager.css" rel="stylesheet">
@stop

@section('content')
<div class="row">
    <div class="col-sm-8">
        <div class="page-header">
            <legend>帖子</legend>
        </div>

        <div class="post-detail">
            <h2>{{$post->title}}</h2>
            <p>{{$post->created_at}}</p>
            <div>
                {{$post->content}}
            </div>
        </div>
        
        <hr>
        <div class="page-header">
            <legend>评论</legend>
        </div>
        @include('group.post.comment', ['topic' => $topic, 'comments' => $comments, 'refer' => $refer])

    </div>

    <div class="col-sm-4">
        <a class="btn btn-primary btn-block" href="{{action('GroupController@getNewPost', $group->id)}}">发新帖</a>

        @include('sidebar')
    </div>
</div>
@stop


@section('js')
<script src="/js/libs/highlight.pack.js"></script>
<script src="/js/libs/marked.min.js"></script>
<script src="/js/libs/to-markdown.js"></script>
<script src="/js/bootstrap-markdown.js"></script>
<script src="/js/bootstrap-markdown.zh.js"></script>
<script src="/js/comment.js"></script>
<script>
$(function(){
    // code hightlight
    $('pre code').each(function(i, block) {
        hljs.highlightBlock(block);
    });

    $("#editor").markdown({
        language:'zh',
        iconlibrary: 'fa',
        onPreview: function(e) {
            if (e.isDirty()) {
                // hack
                setTimeout(function(){
                    preview = $('.md-preview');
                    MathJax.Hub.Queue(['Typeset', MathJax.Hub, preview[0]]);

                    // hightlight
                    preview.find('pre code').each(function(i, block) {
                        hljs.highlightBlock(block);
                    });
                }, 100);

            }
        },
    });

});
</script>
@stop