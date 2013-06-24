@extends('layout')
@section('content')
<div>
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
    <div class="controls">
      <button type="submit" class="btn btn-primary">确定</button>
    </div>
  </div>
</form>
</div>
@endsection