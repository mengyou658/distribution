@extends('layout')
@section('content')
<div class="row-fluid">
    <div class="span3">
        @include('user.setting.sidebar')
    </div>
    
    <div class="span9">
        <legend>个人资料</legend>
        <form class="form-horizontal" action="/user/setting/profile" method="post">
            <fieldset>
            <div class="control-group">
              <label class="control-label" for="title">头衔</label>
              <div class="controls">
                <input class="span7" type="text" id="title" name="title" placeholder="Title" value="{{ $user->title }}" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label" for="intro">个人简介</label>
              <div class="controls">
                <textarea rows="5" class="span7" id="intro" placeholder="Introduction" name="intro">{{ $user->intro }}</textarea>
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