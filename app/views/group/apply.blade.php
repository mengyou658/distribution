@extends('layout')
@section('content')
<div>
<h3>申请建立小组</h3>
<hr />
<form class="form-horizontal"  action="/group/apply" method="post">
  <div class="control-group">
    <label class="control-label" for="name">小组名字</label>
    <div class="controls">
      <input class="input-xxlarge" type="text" id="name" placeholder="小组名字" name="name" value="">
    </div>
  </div>
  
  <div class="control-group">
    <label class="control-label" for="pic">小组图片</label>
    <div class="controls">
      {{ Form::file('pic', array('id'=>'link', 'title'=>'选择图片')) }} // TODO: 图片上传
    </div>
  </div>
  
  <div class="control-group">
    <label class="control-label" for="descr">小组描述</label>
    <div class="controls">
      <textarea class="input-xxlarge" id="descr" rows="5" placeholder="描述" name="descr"></textarea>  
    </div>
  </div>
  
  <div class="control-group">
    <div class="controls">
      <button type="submit" class="btn btn-primary">确定</button>
    </div>
  </div>
</form>
</div>
@endsection
@section('js')
<script src="/js/vendor/bootstrap.file-input.js"></script>
@endsection