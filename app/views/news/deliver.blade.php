@extends('layout')
@section('content')
<div>
<h3>新闻投递</h3>
<hr />
<form class="form-horizontal"  action="/news/deliver" method="post">
  <div class="control-group">
    <label class="control-label" for="title">标题</label>
    <div class="controls">
      <input class="input-xxlarge" type="text" id="title" placeholder="标题" name="title" value="">
    </div>
  </div>
  
  <div class="control-group">
    <label class="control-label" for="link">链接</label>
    <div class="controls">
      <input class="input-xxlarge" type="text" id="link" placeholder="链接地址" name="link" value="">
    </div>
  </div>
  
  <div class="control-group">
    <label class="control-label" for="abstract">摘要</label>
    <div class="controls">
      <textarea class="input-xxlarge" id="abstract" rows="3" placeholder="摘要" name="abstract"></textarea>  
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="tags">标签</label>
    <div class="controls">  
        <input class="tags span2" type="text" name="tags" placeholder="标签">
    </div>
  </div>
  
  <div class="control-group">
    <div class="controls">
      <button type="submit" class="btn btn-primary">投递</button>
    </div>
  </div>
</form>
</div>
@endsection
@section('js')
<script src="/js/vendor/bootstrap-tagmanager.js"></script>
<script>
(function () {
    $(".tags").tagsManager({
        tagClass: 'label label-inverse',
        tagCloseIcon: '<i class="icon-remove"></i>',
    });
})();
</script>
@endsection