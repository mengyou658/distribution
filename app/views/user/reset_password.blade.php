@extends('layout')
@section('content')
<div>
<h3>重置密码</h3>
<hr />

@if (Session::has('error'))
    信息填写错误 // TODO: 需修改
@endif

<form class="form-horizontal" action="/user/reset_password/{{ $token }}" method="post">
  <div class="control-group">
    <label class="control-label" for="email">电子邮件</label>
    <div class="controls">
      <input type="text" name="email" id="email" placeholder="E-mail">
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="password">新密码</label>
    <div class="controls">
      <input type="password" name="password" id="password" placeholder="Password">
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="password_confirmation">确认新密码</label>
    <div class="controls">
      <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Confirmation">
    </div>
  </div>
  <div class="control-group">
    <div class="controls">
      <input type="hidden" name="token" value="{{ $token }}">
      <button type="submit" class="btn btn-primary">确定重置</button>
    </div>
  </div>
</form>
</div>
@endsection