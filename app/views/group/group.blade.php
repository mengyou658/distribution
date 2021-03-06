@extends('layout')

@section('content')
<div class="row">
    <div class="col-sm-8">

        <div class="page-header">
            <legend>全部小组</legend>
        </div>

        <div class="group-list row">
            @foreach($groups as $group)
            <div class="col-sm-6">
                <div class="row">
                    <div class="col-xs-3">
                        <img src="{{$group->thumbnail}}">
                    </div>

                    <div class="col-xs-9">
                        <h4>
                            <a href="{{action('GroupController@getDetail', $group->id)}}">{{$group->name}}</a>
                            <small class="pull-right">{{$group->discuss->post_count}}帖子</small>
                        </h4>
                    </div>
                </div>
                <hr>
            </div>
            @endforeach
        </div>
    </div>

    <div class="col-sm-4">
        @include('sidebar')
    </div>
</div>
@stop