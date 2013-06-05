@extends('layout')
@section('content')
<div class="row-fluid">
    <div class="span3">
    
      <div class="well">
        <legend>设置</legend>
        <ul class="nav nav-list">
          <!--
          <li class="nav-header">设置</li>
          -->
          <li><a href="/user/setting/profile">个人资料</a></li>
          <li class="active"><a href="/user/setting/avatar">设置头像</a></li>
          <li><a href="/user/setting/security">修改密码</a></li>
          <li><a href="/user/setting/account">绑定第三方账号</a></li>
        </ul>
      </div>
    </div>
    
    <div class="span9">
        <legend>设置头像</legend>
        
        <form class="form-horizontal" enctype="multipart/form-data" action="/user/setting/avatar" method="post">
            <fieldset>
            <div class="control-group">
              <label class="control-label" for="avatar">选择头像</label>
              <div class="controls">
                {{ Form::file('avatar', array('id'=>'avatar', 'title'=>'浏览')) }} // TODO: 接收post
              </div>
            </div>
            <div class="control-group">
              <label class="control-label" for="avatar-preview">预览</label>
              <div class="controls">
                <div class="row-fluid">
                    <div class="span4">
                        <img id="avatar-preview-big" src="{{ $user->avatar }}?s=128" />
                    </div>
                    <div class="span4">
                        <img id="avatar-preview-small" src="{{ $user->avatar }}?s=48" />
                    </div>
                </div>
              </div>
            </div>
            <div class="control-group">
              <div class="controls">
                <button type="submit" class="btn btn-primary">上传修改</button>
              </div>
            </div>
            </fieldset>
        </form>
    </div>
</div>
@endsection
@section('js')
<script>
/*
  fork from Bootstrap - File Input
  custom .change event
*/
$(function() {

$('input[type=file]').each(function(i,elem){
  if (typeof $(this).attr('data-bfi-disabled') != 'undefined') {
    return;
  }
  var buttonWord = 'Browse';

  if (typeof $(this).attr('title') != 'undefined') {
    buttonWord = $(this).attr('title');
  }
  var $elem = $(elem);
  var input = $('<div>').append( $elem.eq(0).clone() ).html();
  $elem.replaceWith('<a class="file-input-wrapper btn btn-success ' + $elem.attr('class') + '">'+buttonWord+input+'</a>');
})
.promise().done( function(){
  $('.file-input-wrapper').mousemove(function(cursor) {

    var input, wrapper,
      wrapperX, wrapperY,
      inputWidth, inputHeight,
      cursorX, cursorY;
    wrapper = $(this);
    input = wrapper.find("input");
    wrapperX = wrapper.offset().left;
    wrapperY = wrapper.offset().top;
    inputWidth= input.width();
    inputHeight= input.height();
    cursorX = cursor.pageX;
    cursorY = cursor.pageY;
    moveInputX = cursorX - wrapperX - inputWidth + 20;
    moveInputY = cursorY- wrapperY - (inputHeight/2);
    input.css({
      left:moveInputX,
      top:moveInputY
    });
  });

  $('.file-input-wrapper input[type=file]').change(function(){
    // START: CUSTOM by G_will
    var reader = new FileReader();
    var file = $(this)[0].files[0];
    if(!( /image/i ).test(file.type)){
        alert("请使用图片文件");
        return;
    }
    reader.onload = function (e) {
        $('#avatar-preview-big')
        .attr('src', e.target.result)
        .height(128).width(128);
        $('#avatar-preview-small')
        .attr('src', e.target.result)
        .height(48).width(48);
    };
    reader.readAsDataURL(file);
    // END
    
    $(this).parent().next('.file-input-name').remove();
    if ($(this).prop('files').length > 1) {
      $(this).parent().after('<span class="file-input-name">'+$(this)[0].files.length+' files</span>');
    }
    else {
      $(this).parent().after('<span class="file-input-name">'+$(this).val().replace('C:\\fakepath\\','')+'</span>');
    }
  });
});

var cssHtml = '<style>'+
  '.file-input-wrapper { overflow: hidden; position: relative; cursor: pointer; z-index: 1; }'+
  '.file-input-wrapper input[type=file], .file-input-wrapper input[type=file]:focus, .file-input-wrapper input[type=file]:hover { position: absolute; top: 0; left: 0; cursor: pointer; opacity: 0; filter: alpha(opacity=0); z-index: 99; outline: 0; }'+
  '.file-input-name { margin-left: 8px; }'+
  '</style>';
$('link[rel=stylesheet]').eq(0).before(cssHtml);

});

// TODO: 没有选择文件时，不能点击上传
</script>
@endsection