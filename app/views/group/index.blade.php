@extends('layout')

@section('content')
<div class="row">
    <div class="col-sm-8">

        <div class="page-header">
            <legend>最新帖子 <small class="pull-right"><a href="{{action('GroupController@getPost')}}">全部...</a></small></legend>
        </div>

        <div class="post-list">

        </div>

        <div class="page-header">
            <legend>活跃小组 <small class="pull-right"><a href="{{action('GroupController@getGroup')}}">全部...</a></small></legend>
        </div>
        
        <div class="group-list">

        </div>
    </div>

    <div class="col-sm-4">
        @include('sidebar')
    </div>
</div>
@stop