<div id="comment" class="comment">

    @if(Session::has('comment_message'))
    <div class="alert alert-success alert-dismissable">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    {{Session::get('comment_message')}}
    </div>
    @endif

    <div class="comment-list">
        @foreach($comments as $comment)
        <div id="comment-{{$comment->id}}" class="comment-item row">
            <div class="comment-avatar col-xs-2">
                <a href="{{action('UserController@getDetail', $comment->user->id)}}">
                <img style="width:100%" class="" src="{{$comment->user->show_avatar}}">
                </a>
            </div>

            <div class="col-xs-10">
                <div class="comment-meta">
                <p class="text-muted"><a href="{{action('UserController@getDetail', $comment->user->id)}}"> {{$comment->user->show_name}} </a><span class="pull-right">{{$comment->created_at}}</span></p>
                </div>

                <div class="comment-content">
                    {{$comment->content}}
                </div>

                <div class="comment-operation">
                    <p class="pull-right">
                    <a class="comment-digg btn btn-link @if(isset($isDuggs[$comment->id])) disabled @endif" href="javascript:;" data-comment_id="{{$comment->id}}">顶[<span class="digg-count">{{$comment->digg_count}}</span>]</a>
                    <a class="comment-reply btn btn-link" href="javascript:;" data-reply_user="{{$comment->user->name}}">回复</a>
                </div>
            </div>
        </div>
        <hr>
        @endforeach

        {{$comments->links()}}
    </div>

    @if(Auth::check())
    <form id="comment-form" action="{{action('CommentController@postIndex')}}" method="post">
    
    <h4>发表评论</h4>

    <div class="form-group">

        <!--
        <label>发表评论</label>
        -->

        <textarea class="form-control comment-input" id="editor" rows="10" name="markdown"></textarea>
        <input type="hidden" name="topic_id" value="{{$topic->id}}">
        <input type="hidden" name="refer" value="{{$refer}}#comment">
    </div>
    <button type="submit" class="btn btn-primary btn-wide">发布</button>
    </form>

    @else
    <h4>发表评论</h4>
    <div class="alert alert-dismissable alert-info">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <a href="/user/login?refer={{$refer}}" class="alert-link">登录</a>后才能发表评论
    </div>
    @endif
</div>
