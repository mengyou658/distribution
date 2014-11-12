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
        </div>
        
        <hr>

        <div class="page-header">
            <legend>回答</legend>
        </div>

        <div class="answer-list">

            @foreach($answers as $answer)
            <div class="answer-item row">

                <div class="col-xs-1">
                    <a href="javascript:;" class="btn btn-primary answer-approve" data-answer_id="{{$answer->id}}"><i class="fa fa-caret-up"></i></a>

                    <p><span>{{$answer->vote_count}}</span></p>

                    <a href="javascript:;" class="btn btn-primary answer-oppose" data-answer_id="{{$answer->id}}"><i class="fa fa-caret-down"></i></a>
                </div>

                <div class="col-xs-11">
                    <div>
                    <img src="/img/test_avatar.png" style="width:32px;"> <!-- @todo -->
                    <span>{{$answer->user->name}}</span> @ {{$answer->created_at}}
                    </div>

                    <div>
                        {{$answer->content}}
                    </div>
                    
                </div>
            </div> 
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

<script>
$(function(){
    // code hightlight
    $('pre code').each(function(i, block) {
        hljs.highlightBlock(block);
    });

    $('.news-digg a').click(function(){
        var _this = $(this);
        var news_id = _this.data('news_id');
        if (!_this.hasClass('disabled')) {
            _this.addClass('disabled');
            var posting = $.post('/news/digg', { news_id:news_id });
            posting
            .done(function(data) {
                var digg_span = _this.parent().find('span.digg-count');
                var digg_count = parseInt(digg_span.text())+1;
                digg_span.text(digg_count);
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

});
</script>
@stop