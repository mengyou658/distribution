@extends('layout')
@section('content')
<div class="row-fluid">
    <section class="span8">
    <legend>问题</legend>
    {{ $question->title }}
    <hr />
    <div id="answer" class="">
        <legend>全部回答</legend>
        
        
        @if(!$answers->isEmpty())
            <div id="answer-list">
            @foreach ($answers as $answer)
                <div class="media">
                  <div class="pull-left">
                      <a class="btn btn-small btn-primary" href="#">
                        <i class="icon-thumbs-up"></i> 
                      </a>
                      <br />0
                      <br />
                      <a class="btn btn-small btn-primary" href="#">
                        <i class="icon-thumbs-down"></i>
                      </a>
                  </div>
                  <div class="media-body">
                    {{ $answer->content }}
                    <br/>
                    <a class="review-comments" href="javascript:;" answer_id="{{ $answer->id }}">查看评论</a>
                    <div class="answer-comments hide">评论</div>
                  </div>
                  
                </div>
            @endforeach
            </div>
            <div>{{ $answers->links() }}</div>
        @else
            No answers!
        @endif
        
        @if( Auth::check() )
        <div id="comment-reply">
            <legend>你的回答</legend>
            <div id="wmd-panel" class="wmd-panel">
            <div id="wmd-button-bar"></div>
            <form id="wmd-form" action="/ask/question/{{ $question->id }}/answer" method="post" >
                <div class="clearfix">
                <textarea id="wmd-input" class="wmd-input pull-left" name="markdown"></textarea>
                <div id="wmd-preview" class="wmd-panel wmd-preview well pull-right"></div>
                </div>
                <a id="wmd-submit" class="btn btn-primary">发布</a>
            <form>
            </div>
        </div>
        @else
        登录后方可评论 // TODO: 此处样式调整
        @endif
    </div>
    </section>
    
    <div class="span4">
        <h3>最热新闻</h3>
        <ul class="unstyled">
          <li><a href="">正态分布</a></li>
          <li><a href="">正态分布</a></li>
          <li><a href="">正态分布</a></li>
          <li><a href="">正态分布</a></li>
          <li><a href="">正态分布</a></li>
        </ul>


        <h3>标签</h3>
        <a href="#"><span class="label label-inverse">统计</span></a>
        <span class="label label-inverse">R</span>
        <span class="label label-inverse">正态分布</span>
        <span class="label label-inverse">distribution</span>
    </div>
</div>

@endsection

@section('js')
<script src="/js/vendor/pagedown/Markdown.Converter.js"></script>
<script src="/js/vendor/pagedown/Markdown.Sanitizer.js"></script>
<script src="/js/vendor/pagedown/Markdown.Editor.js"></script>  
<script src="/js/editor.js"></script>
<script>
(function () {
    $('.review-comments').click(function (){
        var _this = $(this);
        _this.next().toggle();
        
        if(!_this.next().hasClass('loaded')) {
            // 菊花
            _this.before('<span><i class="icon-spinner icon-spin icon-large"></i><span>');
            var answer_id = _this.attr('answer_id');
            $.get('/ask/answer/'+answer_id+'/comments', function(data){
               // 菊花停
               _this.prev().remove();
               
               // 添加评论
               _this.next().append(data);
               _this.next().addClass('loaded');
            });
        }
    });
})();
</script>
@endsection