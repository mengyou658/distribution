@extends('layout')

@section('content')
<div class="row">
    <div class="col-sm-8">
        <div class="page-header">
            <legend>文章</legend>
        </div>

        <div class="article-detail">
            <h2>{{$article->title}}</h2>
            <p>{{$article->published_at}}</p>
            <div class="article-content">
                {{$article->content}}
            </div>
        </div>
        
        <hr class="bold">

        {{-- @include('utils.comment') --}}


        <div id="comment" class="ds-thread" data-thread-key="article-{{$article->id}}" data-title="{{$article->title}}" data-url="{{action('ArticleController@getDetail', $article->id)}}"></div>
        <script type="text/javascript">
        var duoshuoQuery = {
            short_name:"cos",
            // sso: { 
            //     login: "http://{{cur_domain()}}/user/login/",
            //     logout: "http://{{cur_domain()}}/user/logout/"
            // }
        };
        (function() {
            var ds = document.createElement('script');
            ds.type = 'text/javascript';ds.async = true;
            ds.src = (document.location.protocol == 'https:' ? 'https:' : 'http:') + '//static.duoshuo.com/embed.js';
            ds.charset = 'UTF-8';
            (document.getElementsByTagName('head')[0] 
             || document.getElementsByTagName('body')[0]).appendChild(ds);
        })();
        </script>

    </div>

    <div class="col-sm-4">
        @include('sidebar')
    </div>
</div>
@stop

@section('js')

@stop