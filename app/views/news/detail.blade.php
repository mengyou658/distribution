@extends('layout')

@section('content')
<div class="row">
    <div class="col-sm-8">
        <div class="page-header">
            <legend>快讯</legend>
        </div>

        <div class="news-list">
            <div class="news-item row">
                <div class="col-xs-1 text-center news-digg">
                    <a href="javascript:;" class="btn btn-primary @if($isDugg) disabled @endif" data-news_id="{{$news->id}}"><i class="fa fa-caret-up"></i></a>
                    <p><span class="digg-count">{{$news->digg_count}}</span></p>
                </div>

                <div class="col-xs-11">
                    <h2><a href="{{$news->source}}" target="_blank">{{$news->title}}</a> <small> ({{$news->source_host}})</small></h2>
                    <blockquote>
                        {{$news->content}}
                    </blockquote>
                    <p><a href="{{action('NewsController@getDetail', $news->id)}}#comment"> 发表评论 </a> / <a href="javascript:;">{{$news->user->name}}</a> @ {{$news->created_at}} </p>
                </div>
            </div>
        </div>
        
        <hr class="bold">

        @include('utils.comment', ['topic' => $topic, 'comments' => $comments])

    </div>

    <div class="col-sm-4">
        @include('sidebar')
    </div>
</div>
@stop

@section('js')
<script>
$(function(){
    
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