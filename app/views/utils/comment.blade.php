<div id="comment" class="comment">

    @if(Session::has('comment_message'))
    <div class="alert alert-success alert-dismissable">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    {{Session::get('comment_message')}}
    </div>
    @endif

    <div class="comment-list">
        @foreach($comments as $comment)
        <div id="comment-{{$comment->id}}" class="comment-item">
            <div class="comment-avatar">
                <img class="" src="{{$comment->user->avatar}}">
            </div>

            <div class="">
                <div class="comment-meta">
                <p>{{{$comment->user->name}}} <span>{{$comment->created_at}}</span></p>
                </div>

                <div class="comment-content">
                    {{$comment->content}}
                </div>

            </div>
        </div>
        @endforeach

        {{$comments->links()}}
    </div>


    <form action="{{action('CommentController@postIndex')}}" method="post">
    
    <h4>发表评论</h4>

    <div class="form-group">

        <!--
        <label>发表评论</label>
        -->

        <textarea class="form-control" rows="3" name="content"></textarea>
        <input type="hidden" name="topic_id" value="{{$topic->id}}">
        <input type="hidden" name="refer" value="{{$refer}}#comment">
    </div>
    <button type="submit" class="btn btn-primary btn-wide">发布</button>
    </form>

</div>