@extends('layout')

@section('content')
<div class="page-header">
<legend>登录</legend>
</div>
<hr>
<form class="form-horizontal" role="form" action="{{ action('UserController@postLogin') }}" method="post">
    <!--
    <div class="form-group">
        <label for="inputEmail" class="col-sm-2 control-label">邮箱</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" id="inputEmail" placeholder="Email" name="email">
        </div>
    </div>
    -->

    <div class="form-group">
        <label for="inputName" class="col-sm-2 control-label">用户名</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" id="inputName" placeholder="Name" name="name">
        </div>
    </div>

    <div class="form-group">
        <label for="inputPassword" class="col-sm-2 control-label">密码</label>
        <div class="col-sm-4">
            <input type="password" class="form-control" id="inputPassword" placeholder="Password" name="password">
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <input type="hidden" name="refer" value="{{$refer}}">
            <button type="submit" class="btn btn-default">确定</button>
        </div>
    </div>
</form>
@stop

@section('js')
@stop