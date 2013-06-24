@extends('layout')
@section('content')
<div class="row-fluid">
    <div class="span8">
    <legend><img src="/img/test_group_pic.jpg" />{{ $group->name }}<small>{{ $group->member_count }}人加入</small></legend>
        <div class="well">
            <p>{{ $group->descr }}</p>
            @if(!$is_member)
            <a class="btn btn-small btn-primary" href="/group/{{ $group->id }}/join">加入小组</a>
            @else
            <a class="btn btn-small btn-primary" href="/group/{{ $group->id }}/quit">退出小组</a>
            @endif
        </div>
        <div>
        <legend>帖子</legend>
            @if(!$posts->isEmpty())
            @foreach ($posts as $post)
            <div class="media">
              <div class="media-body">
                <h4 class="media-heading"><a href="/group/{{ $post->group_id }}/post/{{ $post->id }}">{{ $post->title }}</a></h4>
                <p>{{ Str::limit($post->content, 100) }}</p>
                <p><a href="/group/{{ $post->group_id }}/post/{{ $post->id }}#post-comment">评论({{ $post->comment_count }})</a><span class="pull-right">{{ $post->author_name }}发表于 {{ $post->created_at->format('Y-m-d h:i'); }}</span></p>
              </div>
            </div>
            @endforeach
            @else
            <div class="alert alert-info">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                还没有帖子
            </div>
            @endif
            <div>{{ $posts->links() }}</div>
        </div>
    </div>
    <div class="span4 sidebar">
        @if($is_member)
        <p>
        <a class="btn btn-large btn-block btn-primary" href="/group/{{ $group->id }}/new_post">发新帖</a>
        </p>
        
        @endif
        <div class="sidebar-plate">
        <legend>小组成员</legend>
        <div class="sidebar-users row-fluid">
        @foreach ($users as $user)
            <div class="sidebar-user span3">
                <a href="/user/{{$user->id}}"><img src="{{$user->avatar}}" /></a>
                <a href="/user/{{$user->id}}">{{$user->username}}</a>
            </div>
        @endforeach
        </div>
        </div>
    </div>
</div>

@endsection
