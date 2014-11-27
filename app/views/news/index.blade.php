@extends('layout')

@section('content')
<div class="navbar navbar-inverse" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".deliver-source">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/news">&nbsp;&nbsp;&nbsp;&nbsp;快讯</a>
        </div>

        <div class="collapse navbar-collapse deliver-source" >
            <form class="navbar-form text-center deliver-source-form" action="{{action('NewsController@getDeliver')}}" method="get">
                <div class="form-group">
                <input type="text" class="form-control deliver-source-input" placeholder="输入你要分享资讯的链接" name="source">
                </div>
                <button type="submit" class="btn btn-primary btn-wide deliver-source-submit">分享</button>
            </form>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-8">
        <!--
        <div class="page-header">
            <legend class="">快讯</legend>
        </div>
        -->
        <div class="btn-group">
            <a class="btn btn-primary @if($orderBy == 'created_at') active @endif" href="/news">最新</a>
            <a class="btn btn-primary @if($orderBy == 'digg_count') active @endif" href="/news?order_by=digg_count">最热</a>
        </div>

        <div class="news-list">
            @foreach($newses as $news)
            <div class="news-item row">
                <div class="col-xs-1 text-center news-digg">
                    <a href="javascript:;" class="btn btn-primary @if(isset($isDuggs[$news->id])) disabled @endif" data-news_id="{{$news->id}}"><i class="fa fa-caret-up"></i></a>
                    <p><span class="digg-count">{{$news->digg_count}}</span></p>
                </div>

                <div class="col-xs-11">
                    <h2><a href="{{action('NewsController@getDetail', $news->id)}}">{{$news->title}}</a> <small> ({{$news->source_host}})</small></h2>
                    <blockquote>
                        {{$news->content}}
                    </blockquote>
                    <p><a href="{{action('NewsController@getDetail', $news->id)}}#comment"> 发表评论 </a> / <a href="javascript:;">{{$news->user->show_name}}</a> @ {{$news->created_at}} </p>
                </div>
            </div>
            <hr>
            @endforeach

            <?php
            switch ($orderBy) {
                case 'created_at':
                    $links = $newses->links();
                    break;
                case 'digg_count':
                    $links = $newses->appends(array('order_by' => 'digg_count'))->links();
                    break;
            }
            ?>
            {{$links}}
        </div>
        
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