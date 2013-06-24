@extends('layout')
@section('content')
<div>
<h3>发新帖</h3>
<hr />
<form id="wmd-form" class="form-horizontal"  action="/group/{{$group_id}}/new_post" method="post">
  <div class="control-group">
    <label class="control-label" for="title">标题</label>
    <div class="controls">
      <input class="input-xxlarge" type="text" id="title" placeholder="标题" name="title" value="">
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="content">内容</label>
    <div class="controls">
      <div id="wmd-panel" class="wmd-panel">
      <div id="wmd-button-bar"></div>
          <div class="clearfix">
          <textarea id="wmd-input" class="wmd-input" rows="10" name="markdown"></textarea>
          <div id="wmd-preview" class="wmd-panel wmd-preview well"></div>
          </div>
      </div>
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
      <a id="wmd-submit" class="btn btn-primary">发布</a>
    </div>
  </div>
</form>
</div>
@endsection
@section('js')
<script src="/js/vendor/pagedown/Markdown.Converter.js"></script>
<script src="/js/vendor/pagedown/Markdown.Sanitizer.js"></script>
<script src="/js/vendor/pagedown/Markdown.Editor.js"></script>
<script src="/js/editor.js"></script>
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