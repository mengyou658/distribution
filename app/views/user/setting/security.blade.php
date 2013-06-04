@extends('layout')
@section('content')
<div class="row-fluid">
    <div class="span3">
    
      <div class="well">
        <legend>设置</legend>
        <ul class="nav nav-list">
          <!--
          <li class="nav-header">设置</li>
          -->
          <li><a href="/user/setting/profile">个人资料</a></li>
          <li><a href="/user/setting/avatar">设置头像</a></li>
          <li class="active"><a href="/user/setting/security">修改密码</a></li>
          <li><a href="/user/setting/account">绑定第三方账号</a></li>
        </ul>
      </div>
    </div>
    
    <div class="span9">
        <legend>修改密码</legend>
        <form class="form-horizontal" action="/user/setting/security" method="post">
            <fieldset>
            <div class="control-group">
              <label class="control-label" for="old_password">旧密码</label>
              <div class="controls">
                <input type="password" id="old_password" name="old_password" placeholder="Old Password">
              </div>
            </div>
            <div class="control-group">
              <label class="control-label" for="new_password">新密码</label>
              <div class="controls">
                <input type="password" id="new_password" name="new_password" placeholder="New Password">
              </div>
            </div>
            <div class="control-group">
              <label class="control-label" for="new_password_again">确认新密码</label>
              <div class="controls">
                <input type="password" id="new_password_again" name="new_password_again" placeholder="Confirmation">
              </div>
            </div>
            <div class="control-group">
              <div class="controls">
                <button type="submit" class="btn btn-primary">修改</button>
              </div>
            </div>
            </fieldset>
        </form>
    </div>
</div>
@endsection