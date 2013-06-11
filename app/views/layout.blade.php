<!DOCTYPE html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]> <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]> <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>统计之都 | 中国统计学门户网站，免费统计学服务平台</title>
        <meta name="description" content="中国统计学门户网站，免费统计学服务平台。">
        <meta name="viewport" content="width=device-width">
        <link rel="stylesheet" href="/css/bootstrap.min.css">
        <link rel="stylesheet" href="/css/font-awesome.min.css">
        <style>
            body {
                padding-top: 60px;
                padding-bottom: 40px;
                
            }
        </style>
        <link rel="stylesheet" href="/css/bootstrap-responsive.min.css">
        <link rel="stylesheet" href="/css/main.css">

        <script src="/js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->
        
        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>
                    <a class="brand" href="/">统计之都</a>
                    <div class="nav-collapse collapse">
                        <ul class="nav">
                            <!--
                            <li><a href="/">首页</a></li>
                            <li><a href="/articles">文章</a></li>
                            <li><a href="/news">新闻</a></li>
                            <li><a href="/group">群组</a></li>
                            -->
                        </ul>
                    </div><!--/.nav-collapse -->
                    
                    <div class="nav-collapse collapse pull-right">
                        <ul class="nav">
                            @if ( Auth::check() )
                            
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Hi {{ Auth::user()->username }} ({{ Auth::user()->notice_count }}) <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="/user">个人中心</a></li>
                                    <li><a href="/user/setting">设置</a></li>
                                    <li><a href="/user/notices">提醒 ({{ Auth::user()->notice_count }}) </a></li>
                                    <li class="divider"></li>
                                    <!-- <li class="nav-header">Nav header</li>
                                    <li><a href="#">Separated link</a></li>
                                    -->
                                    <li><a href="/user/logout">退出</a></li>
                                    
                                </ul>
                            </li>
                            @else
                            <li><a href="/user/login">登录</a></li>
                            <li><a href="/user/register">注册</a></li>
                            @endif
                            
                            
                        </ul>
                    </div><!--/.nav-collapse -->
                </div>
            </div>
        </div>

        <header class="container subhead">
        
            <div class="row-fluid">
                
                <div class="span12">
                    <img id="logo-banner" src="/img/cos_logo.png" />
                </div>
               
            </div>
            <!--<div class="subnav">
              <ul class="nav nav-pills">
                <li class="active"><a href="#typography">首页</a></li>
                <li><a href="#navbar">测试</a></li>

              </ul>
            </div>
            -->
            <div class="subnav">
                <ul class="nav nav-pills">
                  <li @if(Request::is('/')) class="active" @endif><a href="/">首页</a></li>
                  <li @if(Request::is('article*')) class="active" @endif><a href="/articles">文章</a></li>
                  <li @if(Request::is('news*')) class="active" @endif><a href="/news">新闻</a></li>
                  <li @if(Request::is('group*')) class="active" @endif><a href="/group">群组</a></li>
                  <li @if(Request::is('ask*')) class="active" @endif><a href="/ask">问答</a></li>
                  <li @if(Request::is('translation*')) class="active" @endif><a href="/translations">翻译</a></li>
                  <li @if(Request::is('event*')) class="active" @endif><a href="/events">活动</a></li>
                  <li @if(Request::is('task*')) class="active" @endif><a href="/tasks">任务</a></li>
                  <li @if(Request::is('project*')) class="active" @endif><a href="/projects">项目</a></li>
                </ul>
            </div>
            @if ( $msg = Session::get('msg', false) )
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                {{ $msg }}
            </div>
            @endif
        </header>
        
        <div class="container">
@yield('content')
        </div> <!-- /container -->
        
        <footer>
            <div class="container">
            <hr />
                <div class="">
                    <ul class="nav nav-pills pull-left">
                        <li><a href="/about">关于我们</a></li>
                        <li><a href="/contact">联系我们</a></li>
                        <li><a href="/policy">免责声明</a></li>
                        <li><a href="/help">帮助中心</a></li>
                    </ul>
                    <p class="muted pull-right">&copy; 2013 cos.name, all rights reserved</p>
                </div>
            </div>
        </footer>

        <!-- start: 全局 -->
@include('utils.mathjax')
        
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="/js/vendor/jquery-1.9.1.min.js"><\/script>')</script>
        <script src="/js/vendor/bootstrap.min.js"></script>
        <!-- end: 全局 -->
        
        <!-- start: editor -->
@yield('js')      
        <!-- end: editor -->
        
        <script src="/js/main.js"></script>
        <script>
            var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
            (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
            g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
            s.parentNode.insertBefore(g,s)}(document,'script'));
        </script>
        
    </body>
</html>
