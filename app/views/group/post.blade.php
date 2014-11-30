@extends('layout')

@section('content')
<div class="row">
    <div class="col-sm-8">

        <div class="page-header">
            <legend>最新帖子</legend>
        </div>


        <div class="post-list">
            @foreach($posts as $post)
            <div class="post-item">
                <h4>
                    <a href="{{action('GroupController@getPostDetail', $post->id)}}">{{{$post->title}}}</a>
                    <small class="pull-right">{{$post->user->show_name}} @ {{$post->created_at}}</small>
                </h4>
            </div>
            @endforeach

            {{$posts->links()}}
        </div>

    </div>

    <div class="col-sm-4">
        @include('sidebar')
    </div>
</div>
@stop