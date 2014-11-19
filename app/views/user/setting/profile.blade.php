@extends('layout')

@section('content')
<div class="row">
    <div class="col-sm-3">
        @include('user.setting.sidebar')
    </div>

    <div class="col-sm-9">
        <div class="page-header">
            <legend>个人信息</legend>
        </div>



        <form class="form-horizontal" action="{{ action('UserController@postSettingProfile') }}" method="post">
        
        <div class="form-group">
            <label class="col-sm-2 control-label">昵称</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" placeholder="Nickname" name="nickname" value="{{Auth::user()->nickname}}">            
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">个人网站</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" placeholder="URL" name="website" value="{{Auth::user()->website}}">            
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">性别</label>
            <div class="col-sm-6">
                <label class="radio-inline">
                <input type="radio" name="sex" value="female" @if(Auth::user()->sex=='female') checked @endif >女
                </label>
                <label class="radio-inline">
                <input type="radio" name="sex" value="male" @if(Auth::user()->sex=='male') checked @endif >男
                </label>
                <label class="radio-inline">
                <input type="radio" name="sex" value="unknown" @if(Auth::user()->sex=='unknown') checked @endif >保密
                </label>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">个人简介</label>
            <div class="col-sm-8">
                <textarea class="form-control" rows="4" placeholder="Description" name="descr">{{Auth::user()->descr}}</textarea>
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
