@layout('layout')
@section('content')
<div>
@if ( $msg = Session::get('msg', false) )
<div class="alert alert-info">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <h5>{{ $msg }}</h5>
</div>
@endif
<hr />

<div class="well">
<ul id="comments">
    <li id="comment_1">
        <div class="cmt_author">
            abc 
        </div>
        <div class="cmt_content">
            abc_content $a+b$ @G_will
        </div>
        
        <a class="cmt_quote" cmt_quote_content="abc abc_content $a+b$" >
            回复
        </a>
    </li>
    <hr />
    <li id="comment_2">
        <div class="cmt_author">
            abc22222
        </div>
        <div class="cmt_content">
            abc_content22222 $a+b$ @G_will @abcef @df @343fd
        </div>
        <a class="cmt_quote">
            回复
        </a>
    </li>
</ul>
</div>

<div id="cmt-reply">
<h2>editor</h2>

<div class="wmd-panel">

<div id="wmd-button-bar"></div>
<textarea class="wmd-input pull-left" id="wmd-input" >
This is the *first* editor.
------------------------------

@G_will @user @dd

Just plain **Markdown**, except that the input is sanitized:

$a+b=c$ 

<marquee>I'm the ghost from the past!</marquee>
</textarea>
<div id="wmd-preview" class="wmd-panel wmd-preview well pull-right"></div>
</div>
<a id="submit" class="btn btn-primary">确定</a>
</div>
</div>
@endsection