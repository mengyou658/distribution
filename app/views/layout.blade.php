<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="COS">

    <title>统计之都 (Capital of Statistics) | 中国统计学门户网站，免费统计学服务平台 | 做正直的统计学网站</title>

    <link rel="icon" href="/favicon.ico">
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/fontawesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="/css/main.css" rel="stylesheet">
    @yield('css')

    <!--[if lt IE 9]>
      <script src="/js/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="/js/libs/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    @include('utils.mathjax')
  </head>

  <body>
    <header>
    <div class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#topnav">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/">统计之都</a>
        </div>
        <div class="navbar-collapse collapse" id="topnav">
          <img class="nav-avatar img-circle pull-right" src="/img/default-avatar.png"><!-- @todo: fixme -->
          <ul class="nav navbar-nav navbar-right">
            @if(Auth::check())
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{{Auth::user()->name}}} <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="/user/dashboard">我的主页</a></li>
                <li><a href="/user/setting/profile">个人设置</a></li>
                <li class="divider"></li>
                <li><a href="/user/logout">退出</a></li>
              </ul>
            </li>
            @else
            <li><a href="/user/login">登录</a></li>
            <li><a href="/user/signup">注册</a></li>
            @endif


          </ul>
        </div>
      </div>
    </div>

    <div class="container">
      <div class="row hidden-sm hidden-xs">
        <div class="col-xs-12 text-center">
          <img src="/img/cos_logo.png">
        </div>
      </div>

      @include('subnav')

      @if(Session::has('msg'))
      <div class="alert alert-success alert-dismissable">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      {{Session::get('msg')}}
      </div>
      @endif
    </div>
    </header>

    <div class="container">
    @yield('content')
    </div>

    <footer>
      <div class="container">
      <hr>
          <div class="">
              <ul class="nav nav-pills pull-left">
                  <li><a href="/about">关于我们</a></li>
                  <li><a href="/contact">联系我们</a></li>
                  <li><a href="/policy">免责声明</a></li>
                  <li><a href="/help">帮助中心</a></li>
              </ul>
              <p class="text-muted pull-right">&copy; 2014 cos.name</p>
          </div>
      </div>
    </footer>

    <script src="/js/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="/js/libs/ie10-viewport-bug-workaround.js"></script>

    <script src="/js/main.js"></script>
    @yield('js')
  </body>
</html>
