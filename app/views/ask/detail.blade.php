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
                  <div class="pull-left attitude">
                      <a class="btn btn-small btn-primary approve" href="javascript:;" answer-id="{{ $answer->id }}">
                        <i class="icon-caret-up"></i>
                      </a>
                      <span class="count">0</span>
                      <a class="btn btn-small btn-primary oppose" href="javascript:;" answer-id="{{ $answer->id }}">
                        <i class="icon-caret-down"></i>
                      </a>
                  </div>
                  <div class="media-body">
                      <p class="info muted">{{ $answer->author_name }} <span class="pull-right">{{ $answer->created_at->format('Y-m-d H:i') }}</span></p>
                      <p>  {{ e($answer->content) }}</p>
                     
                      <a class="review-comments" href="javascript:;" answer-id="{{ $answer->id }}">{{ $answer->comment_count }}条评论</a>
                      <div class="answer-comments well hide">
                        @if(Auth::check())
                        <div>
                        <textarea class="input-block-level" rows="2"></textarea>
                        </div>
                        <a class="btn btn-primary btn-small answer-comment-submit" href="javascript:;" answer-id="{{ $answer->id }}" author="{{ Auth::user()->username }}">评论</a><a class="btn btn-primary btn-small answer-comment-cancel" href="javascript:;" >取消</a>
                        @endif
                      </div>
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
                <textarea id="wmd-input" class="wmd-input" name="markdown"></textarea>
                <div id="wmd-preview" class="wmd-panel wmd-preview well"></div>
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
    

    <div class="span4 sidebar">
      <p>
      <a class="btn btn-large btn-block btn-primary" href="/ask/new_question">我要提问</a>
      </p>
      <hr />
        @include('ask.sidebar')
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
            var answer_id = _this.attr('answer-id');
            $.get('/ask/answer/'+answer_id+'/comments', function(data){
                // 菊花停
                _this.prev().remove();

                comments = eval(data);
                comments_html = '<div class="comment-list">';
                for(i=0;i<comments.length;i++) {
                    comments_html_item = '<div><span class="muted">'+comments[i].author_name+'：</span>'+comments[i].content+' - '+comments[i].created_at+'</div>';
                    comments_html += comments_html_item;
                }
                comments_html += '</div>'
                _this.next().append(comments_html);
                _this.next().addClass('loaded');
            });
        }
    });
    
    $('.approve').click(function(){
        var _this = $(this);
        var answer_id = _this.attr('answer-id');
        if (!_this.hasClass('disabled')) {
            _this.addClass('disabled');
            $.get('/ask/answer/'+answer_id+'/approve', function(res){
                var attitude_span = _this.parent().find('span');
                var oppose = _this.parent().find('.oppose');
                if(oppose.hasClass('disabled')) {
                    attitude_span.text(parseInt(attitude_span.text())+2);
                    oppose.removeClass('disabled');
                }else {
                    attitude_span.text(parseInt(attitude_span.text())+1);
                }
            });
        }
    });
    
    $('.oppose').click(function(){
        var _this = $(this);
        var answer_id = _this.attr('answer-id');
        if (!_this.hasClass('disabled')) {
            _this.addClass('disabled');
            $.get('/ask/answer/'+answer_id+'/oppose', function(res){
                var attitude_span = _this.parent().find('span');
                var approve = _this.parent().find('.approve');
                if(approve.hasClass('disabled')) {
                    attitude_span.text(parseInt(attitude_span.text())-2);
                    approve.removeClass('disabled');
                }else {
                    attitude_span.text(parseInt(attitude_span.text())-1);
                }
            });
        }
    });

    $('.answer-comment-submit').click(function(){
        var _this = $(this);
        var answer_id = _this.attr('answer-id');
        var content = _this.parent().find('textarea').val();
        var author = _this.attr('author');
        $.post('/ask/answer/'+answer_id+'/comment', {'content':content}, function(data){
            if (data === '0') {
                var comments_html_item = '<div><span class="muted">'+author+'：</span>'+content+' - 刚刚</div>';
                var comments_list = _this.parent().find('.comment-list');
                comments_list.prepend(comments_html_item);
            }
        });
        
    });
    
    $('.answer-comment-cancel').click(function(){
        $(this).parent().toggle()
    });
    
})();
</script>
@endsection