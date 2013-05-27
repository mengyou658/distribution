<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>COS</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">

        <link rel="stylesheet" href="/css/bootstrap.min.css">
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
                            <li><a href="/">首页</a></li>
                            <li><a href="/articles/">文章</a></li>
                            <li><a href="/news/">新闻</a></li>
                            <li><a href="/group/">群组</a></li>
                        </ul>
                    </div><!--/.nav-collapse -->
                    
                    <div class="nav-collapse collapse pull-right">
                        <ul class="nav">
                            @if ( Auth::check() )
                            <li><a href="/user/logout">退出</a></li>    
                            @else
                            <li><a href="/user/login">登录</a></li>
                            <li><a href="/user/register">注册</a></li>
                            @endif
                            
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"> Setting <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">test1</a></li>
                                    <li><a href="#">test2</a></li>
                                    <li class="divider"></li>
                                    <!-- <li class="nav-header">Nav header</li>
                                    <li><a href="#">Separated link</a></li>
                                    -->
                                    <li><a href="#">test3</a></li>
                                    
                                </ul>
                            </li>
                        </ul>
                    </div><!--/.nav-collapse -->
                </div>
            </div>
        </div>

        <header class="container subhead">
        <div class="row">
            <div class="span12">
                <img width="1170" src="http://cos.name/wp-content/uploads/2012/03/cropped-COS_Logo1.png" />
            </div>
        </div>
        
        
        
        <div class="subnav">
          <ul class="nav nav-pills">
            <li class="active"><a href="#typography">首页</a></li>
            <li><a href="#navbar">测试</a></li>
            <li><a href="#buttons">测试一</a></li>
            <li><a href="#forms">测试二</a></li>
          </ul>
        </div>
        
        <div class="span4">
        <ul class="breadcrumb">
          <li class="active">Home</li>
        </ul>
        </div>
        </header>
        
        <div class="container">
@yield('content')
        </div> <!-- /container -->
        <hr>
        <footer>
        <div class="container tex2jax_ignore">
        <p>
        $y^2$
        </p>
        <div class="math tex2jax_process">
        \[\mathbf{V}_1 \times \mathbf{V}_2 =  \begin{vmatrix}
\mathbf{i} &amp; \mathbf{j} &amp; \mathbf{k} \\
\frac{\partial X}{\partial u} &amp;  \frac{\partial Y}{\partial u} &amp; 0 \\
\frac{\partial X}{\partial v} &amp;  \frac{\partial Y}{\partial v} &amp; 0
\end{vmatrix}  \]
        </div>
        
            <p>&copy; COS 2013</p>
        </div>
        </footer>
        
        </head>

        <script type="text/x-mathjax-config">
          MathJax.Hub.Config({
            tex2jax: { inlineMath: [['$','$']] },
          });
        </script>
        <script type='text/javascript' src='http://cdn.mathjax.org/mathjax/latest/MathJax.js?config=TeX-AMS_HTML'></script>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="/js/vendor/jquery-1.9.1.min.js"><\/script>')</script>
        <script src="/js/vendor/bootstrap.min.js"></script>
        
        <!-- editor -->
        <script src="/js/vendor/pagedown/Markdown.Converter.js"></script>
        <script src="/js/vendor/pagedown/Markdown.Sanitizer.js"></script>
        <script src="/js/vendor/pagedown/Markdown.Editor.js"></script>        

        <script src="/js/main.js"></script>
        <script>
            (function () {
                var my_converter = Markdown.getSanitizingConverter();
                var my_editor = new Markdown.Editor(my_converter);
                my_editor.run();
                
                // 实时渲染公式
                var wmd_preview = document.getElementById("wmd-preview");
                $("#wmd-input").keyup(function(event){  
                    MathJax.Hub.Queue(["Typeset", MathJax.Hub, wmd_preview]);
                });      
            })();
            
            var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
            (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
            g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
            s.parentNode.insertBefore(g,s)}(document,'script'));
        </script>
    </body>
</html>
