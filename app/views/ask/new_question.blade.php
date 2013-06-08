@extends('layout')
@section('content')
<div>
<h3>提问</h3>
<hr />
<form class="form-horizontal"  action="/ask/new_question" method="post">
  <div class="control-group">
    <label class="control-label" for="title">问题</label>
    <div class="controls">
      <textarea class="input-xxlarge" id="title" rows="3" placeholder="问题" name="title"></textarea>  
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="tags">标签</label>
    <div class="controls">  
        <input class="tags" type="text" name="tags">
    </div>
  </div>
  
  <div class="control-group">
    <div class="controls">
      <button type="submit" class="btn btn-primary">发布</button>
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