@extends('layout')

@section('css')
<link href="/css/jasny-bootstrap.min.css" rel="stylesheet">
@stop

@section('content')
<div class="row">
    <div class="col-sm-3">
        @include('user.setting.sidebar')
    </div>

    <div class="col-sm-9">
        <div class="page-header">
            <legend>修改头像</legend>
        </div>

        <!-- @todo: 抽离 css -->
        <form class="form-horizontal" action="{{ action('UserController@postSettingAvatar') }}" method="post">
        <div class="form-group">
            <label class="col-sm-2 control-label">个人头像</label>
            <div class="col-sm-8">
                <div class="fileinput fileinput-new" data-provides="fileinput">
                <div class="fileinput-new thumbnail" style="width: 220px; height: 220px;">
                    <img alt="" src="/img/test_avatar.png" style="height: 100%; width: 100%; display: block;">
                </div>
                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 220px; max-height: 220px;"></div>
                <div>
                    <span class="btn btn-default btn-file"><span class="fileinput-new">选择图片</span>
                    <span class="fileinput-exists">替换图片</span><input type="file" name="avatar"></span>
                    <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">取消选择</a>
                </div>
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-primary">上传头像</button>
            </div>
        </div>
    </form>

    </div>
</div>
@stop

@section('js')
<script src="/js/jasny-bootstrap.min.js"></script>
@stop