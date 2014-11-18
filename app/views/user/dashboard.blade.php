@extends('layout')

@section('content')
<div class="row">
    <div class="col-sm-3">
        <div class="page-header">
            <legend>{{$user->name}}</hlegend2>
        </div>

        <div>
            <!-- @todo: 样式分离 -->
            <img style="width:256px;height:256px;" src="/img/test_avatar.png" alt="avatar" class="img-thumbnail">
        </div>
    </div>

    <div class="col-sm-9">
        <div class="page-header">
            <legend>个人简介</legend>
        </div>

        <p>
        {{-- @todo: 这里要填入的内容 --}}
        简介： @if($user->descr) {{$user->descr}} @else 这家伙很懒，还没有写简介 @endif
        </p>
    </div>
</div>
@stop
