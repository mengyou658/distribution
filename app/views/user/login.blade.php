@extends('layout')
@section('content')
<div>
@if ( $msg = Session::get('msg', false) )
<div class="alert alert-info">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    {{ $msg }}
</div>
@endif
<h3>登录</h3>
<hr />
<form class="form-horizontal"  action="/user/login" method="post">
  <div class="control-group">
    <label class="control-label" for="inputEmail">Email</label>
    <div class="controls">
      <input type="text" name="email" id="inputEmail" placeholder="Email">
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="inputPassword">Password</label>
    <div class="controls">
      <input type="password" name="password" id="inputPassword" placeholder="Password">
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