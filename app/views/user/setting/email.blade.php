@extends('layout')

@section('content')
<div class="row">
    <div class="col-sm-3">
        @include('user.setting.sidebar')
    </div>

    <div class="col-sm-9">
        <div class="page-header">
            <legend>修改邮箱</legend>
        </div>

        <form class="form-horizontal" action="{{ action('UserController@postSettingEmail') }}" method="post">
        <div class="form-group">
            <label class="col-sm-2 control-label">邮箱地址</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" placeholder="E-mail" name="email" value="{{Auth::user()->email}}">            
            </div>
        </div>

        <!--
        <div class="form-group">
            <label  class="col-sm-2 control-label">密码</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" placeholder="Password" name="password">
            </div>
        </div>
        -->

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-primary btn-wide">修改</button>
            </div>
        </div>
    </form>

    </div>
</div>
@stop
