@extends('layout')

@section('content')
<div class="row">
    <div class="col-sm-8">

        <div class="page-header">
            <legend>文章<small class="pull-right"><a href="{{action('ArticleController@getIndex')}}">所有文章...</a></small></legend>
        </div>

        <?php
            // @todo: cache
            $indexArticles = Article::whereStatus('published')->orderBy('published_at', 'desc')->take(5)->get();
        ?>

        <div class="home-widget">
            <?php $headlineArticle = $indexArticles[0];unset($indexArticles[0]); ?>
            <h3><a href="{{action('ArticleController@getDetail', $headlineArticle->id)}}">{{$headlineArticle->title}}</a></h3>

            <!--
            <div class="row">
                <div class="col-sm-3">
                    <img style="width:100%;" src="http://cos.name/wp-content/uploads/2013/05/6th-china-r-bj-500x332.jpg">
                </div>
                <div class="col-sm-9">
                    <p>
                    {{$headlineArticle->show_abstract}}
                    </p>
                    <p><a href="{{action('ArticleController@getDetail', $headlineArticle->id)}}">阅读全文</a> <a href="{{action('ArticleController@getDetail', $headlineArticle->id)}}#comment">评论</a> <span class="pull-right">{{$headlineArticle->published_at}}</span></p>
                </div>
            </div>
            -->
            <div class="row">
                <div class="col-xs-12">
                    <p>
                    {{$headlineArticle->show_abstract}}
                    </p>
                    <p><a href="{{action('ArticleController@getDetail', $headlineArticle->id)}}">阅读全文</a> <a href="{{action('ArticleController@getDetail', $headlineArticle->id)}}#comment">评论</a> <span class="pull-right">{{$headlineArticle->published_at}}</span></p>
                </div>
            </div>

            <div class="row">
                @foreach($indexArticles as $article)
                <div class="col-sm-6">
                    <h5><a href="{{action('ArticleController@getDetail', $article->id)}}">{{$article->title}}</a></h5>
                </div>
                @endforeach
            </div>
        </div>
        <hr>

        <div class="page-header">
            <legend>快讯<small class="pull-right"><a href="{{action('NewsController@getIndex')}}">所有快讯...</a></small></legend>
        </div>

        <?php
            // @todo: cache
            $indexNewses = News::whereStatus('published')->orderBy('created_at', 'desc')->take(6)->get();
        ?>

        <div class="home-widget">
            <div class="row">
                @foreach($indexNewses as $news)
                <div class="col-sm-6">
                    <h5><a href="{{action('NewsController@getDetail', $news->id)}}">{{$news->title}}</a></h5>
                </div>
                @endforeach

            </div>
        </div>
        <hr>

        <div class="page-header">
            <legend>问答<small class="pull-right"><a href="{{action('AskController@getIndex')}}">更多问题...</a></small></legend>
        </div>


        <?php
            // @todo: cache
            $indexQuestions = Question::whereStatus('published')->orderBy('created_at', 'desc')->take(6)->get();
        ?>

        <div class="home-widget">
            <div class="row">
                @foreach($indexQuestions as $question)
                <div class="col-sm-6">
                    <h5>
                    <a href="{{action('AskController@getQuestionDetail', $question->id)}}">{{$question->title}}</a>
                    <small class="pull-right">{{$question->answer_count}}回答</small>
                    </h5>
                </div>
                @endforeach
            </div>
        </div>
        <hr>

        <div class="page-header">
            <legend>讨论<small class="pull-right"><a href="{{action('GroupController@getIndex')}}">更多讨论...</a></small></legend>
        </div>

        <?php
            // @todo: cache
            $indexPosts = Post::whereStatus('published')->orderBy('created_at', 'desc')->take(6)->get();
        ?>
        <div class="home-widget">
            <div class="row">
                @foreach($indexPosts as $post)
                <div class="col-sm-6">
                    <h5><a href="{{action('GroupController@getPostDetail', $post->id)}}">{{$post->title}}</a></h5>
                </div>
                @endforeach
            </div>
        </div>
        <hr>

    </div>
    <div class="col-sm-4">
        @include('sidebar')
    </div>
</div>
@stop