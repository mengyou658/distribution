@extends('layout')

@section('css')
<link href="/css/highlight/github.css" rel="stylesheet">
@stop

@section('content')
<div class="row">
    <div class="col-sm-8">
        <div class="page-header">
            <legend>问题</legend>
        </div>

        <div class="question-detail">
            <h2>{{{$question->title}}}</h2>

            <div class="">
                {{$question->content}}
            </div>

            <a class="toggle-question-comment" href="javascript:;">展开评论</a>
            <div id="question-comment" class=""></div>
        </div>
        
        <hr class="bold">

        <div class="page-header">
            <legend>回答</legend>
        </div>

        <div class="answer-list">

            @foreach($answers as $answer)
            <div class="answer-item row">

                <div class="col-xs-1  text-center answer-digg">
                    <a href="javascript:;" class="btn btn-primary answer-approve @if(isset($attitudes[$answer->id]) && $attitudes[$answer->id] == 'approve') disabled @endif " data-answer_id="{{$answer->id}}">
                    <i class="fa fa-caret-up"></i>
                    </a>

                    <p><span class="vote-count">{{$answer->vote_count}}</span></p>

                    <a href="javascript:;" class="btn btn-primary answer-oppose @if(isset($attitudes[$answer->id]) && $attitudes[$answer->id] == 'oppose') disabled @endif" data-answer_id="{{$answer->id}}">
                    <i class="fa fa-caret-down"></i>
                    </a>
                </div>

                <div class="col-xs-11">
                    <div>
                    <img src="{{$answer->user->show_avatar}}" style="width:32px;"> <!-- @todo -->
                    <span>{{$answer->user->name}}</span> @ {{$answer->created_at}}
                    </div>

                    <div>
                        {{$answer->content}}
                    </div>
                    
                </div>
            </div> 
            <hr>
            @endforeach

            {{$answers->links()}}
        </div>



    </div>

    <div class="col-sm-4">
        <a class="btn btn-primary btn-block" href="{{action('AskController@getQuestionAnswer', $question->id)}}">我来回答</a>
        @include('sidebar')
    </div>
</div>
@stop

@section('js')
<script src="/js/libs/highlight.pack.js"></script>

<script>var duoshuoQuery = {short_name:"cos"};</script>
<script src="http://static.duoshuo.com/embed.js"></script>

<script>
$(function(){
    // code hightlight
    $('pre code').each(function(i, block) {
        hljs.highlightBlock(block);
    });

    $('.answer-approve').click(function(){
        var _this = $(this);
        var answer_id = _this.data('answer_id');
        if (!_this.hasClass('disabled')) {
            _this.addClass('disabled');
            var _this_oppose = _this.parent().find('.answer-oppose');
            if (_this_oppose.hasClass('disabled')) {
                _this_oppose.removeClass('disabled');
            }
            var posting = $.post('/ask/answer/approve', { answer_id:answer_id });
            posting
            .done(function(data) {
                var count_span = _this.parent().find('p span.vote-count');
                count_span.text(data.vote_count);
            })
            .fail(function(data) {
                // @todo: 使用 Modal 
                if (data.status == 401) {
                    alert('请登录后进行操作');
                    // @todo: 301 to login
                } else if (data.status == 400) {
                    alert('已经顶过');
                } else {
                    alert('...发生了一些错误');
                }
            }); 
        }
    });

    $('.answer-oppose').click(function(){
        var _this = $(this);
        var answer_id = _this.data('answer_id');
        if (!_this.hasClass('disabled')) {
            _this.addClass('disabled');
            var _this_oppose = _this.parent().find('.answer-approve');
            if (_this_oppose.hasClass('disabled')) {
                _this_oppose.removeClass('disabled');
            }
            var posting = $.post('/ask/answer/oppose', { answer_id:answer_id });
            posting
            .done(function(data) {
                var count_span = _this.parent().find('p span.vote-count');
                count_span.text(data.vote_count);
            })
            .fail(function(data) {
                // @todo: 使用 Modal 
                if (data.status == 401) {
                    alert('请登录后进行操作');
                    // @todo: 301 to login
                } else if (data.status == 400) {
                    alert('已经顶过');
                } else {
                    alert('...发生了一些错误');
                }
            }); 
        }
    });

    // $('.toggle-question-comment').click(function(){
    //     var _this = $(this);
    //     var container = _this.next();
        

    //     if (!container.hasClass('loaded')) {
    //         var el = document.createElement('div');
    //         el.setAttribute('data-thread-key', '文章的本地ID');//必选参数
    //         el.setAttribute('data-url', '你网页的网址');//必选参数
    //         el.setAttribute('data-author-key', '作者的本地用户ID');//可选参数
    //         DUOSHUO.EmbedThread(el);
    //         container.append(el);
    //         container.addClass('loaded');
    //     }
    //     else {
    //         container.toggle();
    //     }
        
    // });

});
</script>
@stop