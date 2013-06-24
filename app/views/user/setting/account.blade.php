@extends('layout')
@section('content')
<div class="row-fluid">
    <div class="span3">
      @include('user.setting.sidebar')
    </div>
    
    <div class="span9">
        <legend>绑定第三方账号</legend>
        // TODO: weibo <br />
        // TODO: github <br />
        // TODO: qq
    </div>
</div>
@endsection