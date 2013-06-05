@extends('layout')
@section('content')
<div class="row-fluid">
<div class="span8">
<h3>标签云集</h3>

@foreach ($tags as $tag)
    <a href="/tag/{{ $tag->tag }}"><span class="label label-inverse">{{ $tag->tag }}</span></a>
@endforeach

</div>
<div class="span4">
<h4>最热文章</4>

<hr />
<h4>最新文章</4>

<hr />

<h4>最新帖子</4>

<hr />

</div>
</div>
@endsection