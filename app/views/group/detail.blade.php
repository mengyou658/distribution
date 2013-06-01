@extends('layout')
@section('content')
<div class="row-fluid">
    <div class="span8">

    <ul class="breadcrumb">
        <li><a href="/groups">群组</a> <span class="divider">/</span></li>
        <li class="active">{{ $group->name }}</li>
    </ul>
        <div>
            {{ $group->name }}
            <br />
            {{ $group->description }}
            <br />
            @if(!$is_member)
            <a href="/group/{{ $group->id }}/join">加入小组</a>
            @else
            <a href="/group/{{ $group->id }}/quit">退出小组</a>
            @endif
        </div>
        
        <div>
            @if(!empty($posts))
                <ul>
                    @foreach ($posts as $post)
                        <li>
                            {{ $post->id }}
                            <br />
                            {{ $post->content }}
                        </li>
                    @endforeach
                </ul>
            @else
                NO posts.
            @endif
            <div>{{ $posts->links() }}</div>
        </div>
    </div>

    <div class="span4">
        <p>
        @if($is_member)
        <a class="btn btn-large btn-block btn-primary" href="/group/{{ $group->id }}/new_post">发新帖</a>
        @endif
        </p>
        <hr />
        <h3>小组成员</h3>
        <ul>
        @foreach ($users as $user)
            <li>
                {{ $user->username }}
                <br />
                {{ $user->id }}
            </li>
        @endforeach
        </ul>
    </div>
</div>

@endsection

@section('js')
<script src="/js/vendor/pagedown/Markdown.Converter.js"></script>
<script src="/js/vendor/pagedown/Markdown.Sanitizer.js"></script>
<script src="/js/vendor/pagedown/Markdown.Editor.js"></script>
<script src="/js/article_comment.js"></script>     
@endsection
