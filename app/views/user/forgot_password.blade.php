@extends('layout')
@section('content')
<div>
<h3>重置密码</h3>
<hr />

@if (Session::has('error'))
    没有这个用户
@elseif (Session::has('success'))
    重置邮件已经寄送
@endif

<form class="form-horizontal"  action="/user/forgot_password" method="post">
  <div class="control-group">
    <label class="control-label" for="email">电子邮件</label>
    <div class="controls">
      <input type="text" name="email" id="email" placeholder="E-mail">
    </div>
  </div>
  <div class="control-group">
    <div class="controls">
      <button type="submit" class="btn btn-primary">确定重置</button>
    </div>
  </div>
</form>
</div>
@endsection