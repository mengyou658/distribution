@extends('layout')
@section('content')
<div class="row-fluid">
    <div class="span3">
        <legend>{{ $user->username }}<small>{{ $user->title }}</small></legend>
        
        <img src="{{ $user->avatar }}?s=160" />
        
    </div>
    <div class="span9">
        <legend>简介</legend>
        <p>{{ $user->intro?$user->intro:"这家伙很懒什么都没留下..." }}</p>
        <br />
        <p class="text-info">发表过{{ $user->post_count }}篇帖子，投递过{{ $user->news_count }}篇新闻。</p>
    </div>
</div>
@endsection