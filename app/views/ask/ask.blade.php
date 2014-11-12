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
            <legend>提问</legend>
        </div>

        <form class="form-horizontal" action="{{ action('AskController@postAsk') }}" method="post">
            <div class="form-group">
                <label class="col-sm-2 control-label">题目</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="Title" name="title" value="{{$title or ''}}">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">描述</label>
                <div class="col-sm-10">
                    <textarea id="editor" rows="10" name="markdown">{{$markdown or ''}}</textarea>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">标签</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control tags-input" placeholder="Tag" name="tags">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-primary btn-wide">确定</button>
                </div>
            </div>
        </form>

    </div>

    <div class="col-sm-4">
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
<script src="/js/tagmanager.js"></script>
<script>
$(function(){
    // code hightlight
    $('pre code').each(function(i, block) {
        hljs.highlightBlock(block);
    });

    $('.tags-input').tagsManager({
        tagCloseIcon: '<i class="fa fa-times"></i>',
        tagClass: 'label label-primary'
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