@extends('layout')

@section('content')
<div class="row">
    <div class="col-sm-3">
        @include('user.setting.sidebar')
    </div>

    <div class="col-sm-9">
        <div class="page-header">
            <legend>修改密码</legend>
        </div>

        <form class="form-horizontal" action="{{ action('UserController@postSettingPassword') }}" method="post">

        <div class="form-group">
            <label  class="col-sm-2 control-label">当前密码</label>
            <div class="col-sm-4">
                <input type="password" class="form-control" placeholder="Current Password" name="cur_password">
            </div>
        </div>

        <div class="form-group">
            <label  class="col-sm-2 control-label">新密码</label>
            <div class="col-sm-4">
                <input type="password" class="form-control" placeholder="New Password" name="new_password">
            </div>
        </div>

        <div class="form-group">
            <label  class="col-sm-2 control-label">确认新密码</label>
            <div class="col-sm-4">
                <input type="password" class="form-control" placeholder="Reenter New Password" name="reenter_new_password">
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-primary btn-wide">修改</button>
            </div>
        </div>
    </form>

    </div>
</div>
@stop
