@extends('layout')

@section('content')
<div class="row">
    <div class="col-sm-3">
        <div class="page-header">
            <legend>{{$user->name}}</hlegend2>
        </div>

        <div>
            <img src="/img/test_avatar.png" alt="avatar" class="img-thumbnail">
        </div>
    </div>

    <div class="col-sm-9">
        <div class="page-header">
            <legend>个人简介</legend>
        </div>

        <p>
        简介：这家伙很懒，还没有写简介
        </p>
    </div>
</div>
@stop
