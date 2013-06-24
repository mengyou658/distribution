<div class="well">
<legend>设置</legend>
<ul class="nav nav-list">
  <li @if(Request::is('user/setting/profile')) class="active" @endif><a href="/user/setting/profile">个人资料</a></li>
  <li @if(Request::is('user/setting/avatar')) class="active" @endif><a href="/user/setting/avatar">设置头像</a></li>
  <li @if(Request::is('user/setting/security')) class="active" @endif><a href="/user/setting/security">修改密码</a></li>
  <!--
  <li @if(Request::is('user/setting/account')) class="active" @endif><a href="/user/setting/account">绑定第三方账号</a></li>
  -->
</ul>
</div>
