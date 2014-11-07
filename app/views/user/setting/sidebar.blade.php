<div class="page-header">
    <legend>设置</legend>
</div>
<ul class="nav nav-pills nav-stacked">

    <li class=" @if(Request::is('user/setting/profile')) active @endif">
        <a href="/user/setting/profile">个人信息</a>
    </li>
    <li class=" @if(Request::is('user/setting/email')) active @endif">
        <a href="/user/setting/email">修改邮箱</a>
    </li>
    <li class=" @if(Request::is('user/setting/avatar')) active @endif">
        <a href="/user/setting/avatar">修改头像</a>
    </li>
    <li class=" @if(Request::is('user/setting/password')) active @endif">
        <a href="/user/setting/password">修改密码</a>
    </li>

</ul>