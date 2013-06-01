@extends('layout')
@section('content')
<div>
<h3>登录</h3>
<hr />
<form class="form-horizontal"  action="/user/login" method="post">
  <div class="control-group">
    <label class="control-label" for="inputEmail">电子邮件</label>
    <div class="controls">
      <input type="text" name="email" id="inputEmail" placeholder="Email">
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="inputPassword">密码</label>
    <div class="controls">
      <input type="password" name="password" id="inputPassword" placeholder="Password">
    </div>
  </div>
  <div class="control-group">
    <div class="controls">
      <button type="submit" class="btn btn-primary">确定</button>
      <a class="btn btn-info" href="/user/register">注册</a>
    </div>
  </div>
</form>
</div>
@endsection