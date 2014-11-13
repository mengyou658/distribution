@extends('layout')

@section('content')
<div class="row">
    <div class="col-sm-8">

        <div class="page-header">
            <legend>{{{$group->name}}}</legend>
        </div>

        <div class="group-detail">
            <img src="{{$group->thumbnail}}">

            <div>
                {{$group->descr}}
            </div>
        </div>

        <hr>

        <div class="post-list">
            @foreach($posts as $post)
            <div class="post-item">
                <h4>
                    <a href="{{action('GroupController@getPostDetail', $post->id)}}">{{{$post->title}}}</a>
                    <small class="pull-right">{{$post->user->name}} @ {{$post->created_at}}</small>
                </h4>
            </div>
            @endforeach

            {{$posts->links()}}
        </div>

    </div>

    <div class="col-sm-4">
        <a class="btn btn-primary btn-block" href="{{action('GroupController@getNewPost', $group->id)}}">发帖</a>
        @include('sidebar')
    </div>
</div>
@stop