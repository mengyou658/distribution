@extends('layout')
@section('content')
<div class="row-fluid">
<div class="span8">
<h3>帖子列表</h3>

@foreach ($posts as $post)
    <h5><a href="/group/{{ $post->group_id }}/post/{{ $post->id }}">{{ $post->title }}</a></h5>
    <p>{{ $post->content }}</p>
    <p><a href="/group/{{ $post->group_id }}">{{ $post->group_name }}</a></p>
    <hr />
@endforeach
{{ $posts->links() }}
</div>
<div class="span4">
<h4>推荐小组 <small class="pull-right"><a href="/groups">全部小组</a></small></4>

<hr />

<h4>最热帖子</4>

<hr />

<h4>标签</4>

<hr />

</div>
</div>
@endsection