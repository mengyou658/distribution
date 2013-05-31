@extends('layout')
@section('content')
<div>
@if ( $msg = Session::get('msg', false) )
<div class="alert alert-info">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <h5>{{ $msg }}</h5>
</div>
@endif
<h3>注册</h3>
<hr />
<form class="form-horizontal"  action="/user/register" method="post">
  <div class="control-group">
    <label class="control-label" for="inputEmail">Email</label>
    <div class="controls">
      <input type="text" name="email" id="inputEmail" placeholder="Email">
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="inputNickname">用户名</label>
    <div class="controls">
      <input type="text" id="inputNickname" name="username" placeholder="Username">
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="inputPassword">密码</label>
    <div class="controls">
      <input type="password" id="inputPassword" name="password" placeholder="Password">
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="inputPasswordAgain">再次输入</label>
    <div class="controls">
      <input type="password" id="inputPasswordAgain" name="password_again" placeholder="Again">
    </div>
  </div>
  <div class="control-group">
    <div class="controls">
      <button type="submit" class="btn">确定</button>
    </div>
  </div>
</form>
</div>
@endsection