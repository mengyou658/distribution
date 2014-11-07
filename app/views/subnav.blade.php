      <!--
      <div class="navbar navbar-default">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#subnav">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand visible-xs" href="/">统计之都</a>
          </div>

          <div class="collapse navbar-collapse" id="subnav">
            <ul class="nav navbar-nav">
              <li @if(Request::is('/')) class="active" @endif ><a href="/">首页</a></li>
              <li @if(Request::is('article*')) class="active" @endif ><a href="/article">文章</a></li>
              <li @if(Request::is('news*')) class="active" @endif ><a href="/news">快讯</a></li>
              <li @if(Request::is('ask*')) class="active" @endif ><a href="/ask">问答</a></li>
              <li @if(Request::is('group*')) class="active" @endif ><a href="/group">讨论</a></li>
              <li @if(Request::is('event*')) class="active" @endif ><a href="/event">活动</a></li>
            </ul>
          </div>
        </div>
      </div>
      -->

      <div class="btn-group btn-group-justified subnav">
        <a href="/" class="btn btn-primary @if(Request::is('/')) active @endif">首页</a>
        <a href="/article" class="btn btn-primary @if(Request::is('article*')) active @endif">文章</a>
        <a href="/news" class="btn btn-primary @if(Request::is('news*')) active @endif">快讯</a>
        <a href="/ask" class="btn btn-primary @if(Request::is('ask*')) active @endif">问答</a>
        <a href="/group" class="btn btn-primary @if(Request::is('group*')) active @endif">讨论</a>
        <a href="/event" class="btn btn-primary @if(Request::is('event*')) active @endif">活动</a>
      </div>