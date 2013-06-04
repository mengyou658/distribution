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
          <li class="active"><a href="/user/setting/avatar">设置头像</a></li>
          <li><a href="/user/setting/security">修改密码</a></li>
          <li><a href="/user/setting/account">绑定第三方账号</a></li>
        </ul>
      </div>
    </div>
    
    <div class="span9">
        <legend>个人资料</legend>
        // MEMO: 强烈建议使用 Gavatar <br />
        // TODO: 测试上传预览
    </div>
</div>
@endsection