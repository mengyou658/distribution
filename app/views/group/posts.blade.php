@extends('layout')
@section('content')
<div class="row-fluid">
<div class="span8">
<legend>帖子</legend>
@foreach ($posts as $post)
    <div class="media">
      <div class="media-body">
        <h4 class="media-heading"><a href="/group/{{ $post->group_id }}/post/{{ $post->id }}">{{ $post->title }}</a></h4>
        <p>{{ Str::limit($post->content, 140) }}</p>
        <p>发表在<a href="/group/{{ $post->group_id }}">{{ $post->group_name }}</a><a href="/group/{{ $post->group_id }}/post/{{ $post->id }}#post-comment">评论({{ $post->comment_count }})</a><span class="pull-right">{{ $post->author_name }}发表于 {{ $post->created_at->format('Y-m-d h:i'); }}</span></p>
      </div>
    </div>
@endforeach
{{ $posts->links() }}
</div>

  <div class="span4 sidebar">
    <p>
    <a class="btn btn-large btn-block btn-primary" href="/groups">查看全部群组</a>
    </p>
    <div class="sidebar-plate">
        <legend>推荐小组</legend>
        <?php $groups = Group::orderBy('created_at', 'desc')->take(3)->get(); ?>
        @if(!$groups->isEmpty())
        <ul class="sidebar-ul unstyled">
            @foreach ($groups as $group)
            <li>
                <a class="pull-left" href="/group/{{$group->id}}"><img src="{{$group->pic}}" /></a>
                <div class="sidebar-ul-body">
                    <a href="/group/{{$group->id}}">{{$group->name}}</a><span>{{ $group->member_count }}人加入</span>
                    <p>{{ Str::limit($group->descr, 10) }}</p>
                </div>
            </li>
            @endforeach
        </ul>
        @endif
    </div>
    <div class="sidebar-plate">
        <legend>热门标签</legend>
        <?php $tags = Tag::orderBy('refer_count', 'desc')->take(7)->get() ?>
        @if(!$tags->isEmpty())
        
            @foreach ($tags as $tag)
            <a href="{{ URL::route('tag_detail', array($tag->tag)) }}"><span class="label label-inverse">{{ $tag->tag }}</span></a>
            @endforeach
        
        @endif
    </div>
    
    <div class="sidebar-plate">
        <legend>近期活动</legend>
        <ul class="sidebar-ul unstyled">
            <li>
                <div class="sidebar-ul-body">
                    <a href="">R沙龙</a><span>15人参加</span>
                    <p>本期R沙龙，主要内容是</p>
                </div>
            </li>
            <li>
                <div class="sidebar-ul-body">
                    <a href="">R沙龙</a><span>15人参加</span>
                    <p>本期R沙龙，主要内容是</p>
                </div>
            </li>
            <li>
                <div class="sidebar-ul-body">
                    <a href="">R沙龙</a><span>15人参加</span>
                    <p>本期R沙龙，主要内容是</p>
                </div>
            </li>
        </ul>
    </div>
  
    <div class="sidebar-plate">
        <legend>友情链接</legend>
        <ul class="sidebar-ul">
            <li>
                <div class="sidebar-ul-body">
                    <a href="" target="_blank">厦门大学数据挖掘研究中心</a>
                </div>
            </li>
            <li>
                <div class="sidebar-ul-body">
                    <a href="" target="_blank">厦门大学数据挖掘研究中心</a>
                </div>
            </li>
            <li>
                <div class="sidebar-ul-body">
                    <a href="" target="_blank">厦门大学数据挖掘研究中心</a>
                </div>
            </li>
        </ul>
    </div>
  </div>
</div>
@endsection