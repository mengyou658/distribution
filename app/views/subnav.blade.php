<div class="btn-group btn-group-justified subnav">
  <a href="/" class="btn btn-primary @if(Request::is('/')) active @endif">首页</a>
  <a href="/article" class="btn btn-primary @if(Request::is('article*')) active @endif">文章</a>
  <a href="/news" class="btn btn-primary @if(Request::is('news*')) active @endif">快讯</a>
  <a href="/ask" class="btn btn-primary @if(Request::is('ask*')) active @endif">问答</a>
  <a href="/group" class="btn btn-primary @if(Request::is('group*')) active @endif">小组</a>
  <a href="/event" class="btn btn-primary @if(Request::is('event*')) active @endif">活动</a>
  <a href="/books" class="btn btn-primary @if(Request::is('books*')) active @endif">图书</a>
</div>