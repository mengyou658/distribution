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
          <li class="active"><a href="/user/setting/profile">个人资料</a></li>
          <li><a href="/user/setting/avatar">设置头像</a></li>
          <li><a href="/user/setting/security">修改密码</a></li>
          <li><a href="/user/setting/account">绑定第三方账号</a></li>
        </ul>
      </div>
    </div>
    
    <div class="span9">
        <legend>个人资料</legend>
        <form class="form-horizontal" action="/user/setting/profile" method="post">
            <fieldset>
            <div class="control-group">
              <label class="control-label" for="title">头衔</label>
              <div class="controls">
                <input class="span7" type="text" id="title" name="title" placeholder="title">
              </div>
            </div>
            <div class="control-group">
              <label class="control-label" for="intro">个人简介</label>
              <div class="controls">
                <textarea rows="5" class="span7" id="intro" placeholder="introduction" name="intro"></textarea>
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