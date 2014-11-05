@extends('layout')

@section('content')
<div class="row">
    <div class="col-sm-8">
        <div class="page-header">
            <legend>快讯推送</legend>
        </div>

        <form class="form-horizontal" action="{{ action('NewsController@postDeliver') }}" method="post">
            <div class="form-group">
                <label class="col-sm-2 control-label">标题</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" placeholder="Title" name="title">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">网址</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" placeholder="URL" name="source" value="{{$source}}">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">简述</label>
                <div class="col-sm-8">
                    <textarea class="form-control" rows="4" placeholder="Description" name="content"></textarea>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-primary btn-wide">确定</button>
                </div>
            </div>
        </form>

    </div>

    <div class="col-sm-4">
        @include('sidebar')
    </div>
</div>
@stop

@section('js')
@stop