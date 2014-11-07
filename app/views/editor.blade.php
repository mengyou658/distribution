@extends('layout')

@section('css')
<link href="/css/highlight/github.css" rel="stylesheet">
<link href="/css/bootstrap-markdown.min.css" rel="stylesheet">
<link href="/css/tagmanager.css" rel="stylesheet">
@stop

@section('content')

<textarea id="editor" rows="10"></textarea>


<form class="form-horizontal"  method="post">
    <div class="form-group">
        <label class="col-sm-2 control-label">题目</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" placeholder="Title" name="title">
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">标签</label>
        <div class="col-sm-10">
            <input type="text" class="form-control tags-input" placeholder="Title" name="tags">
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-primary btn-wide">确定</button>
        </div>
    </div>
</form>

<div>



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

    // @todo: tab 缩进
    // @todo: 应该直接写进 bootstrap-markdown line 738 
    /*
    $("#editor").keydown(function(e) {
        if(e.keyCode === 9) { // tab was pressed
            // get caret position/selection
            var start = this.selectionStart;
            var end = this.selectionEnd;

            var $this = $(this);
            var value = $this.val();

            // set textarea value to: text before caret + tab + text after caret
            $this.val(value.substring(0, start)
                        + "    "
                        + value.substring(end));

            // put caret at right position again (add one for the tab)
            this.selectionStart = this.selectionEnd = start + 4;

            // prevent the focus lose
            e.preventDefault();
        }
    });
    */

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
            else {

            }

        },
    });

});
</script>
@stop