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

<h2>editor</h2>
<div class="wmd-panel">
<div id="wmd-button-bar"></div>
<textarea class="wmd-input pull-left" id="wmd-input">
This is the *first* editor.
------------------------------

Just plain **Markdown**, except that the input is sanitized:

$a+b=c$ 

<marquee>I'm the ghost from the past!</marquee>
</textarea>
<div id="wmd-preview" class="wmd-panel wmd-preview well pull-right"></div>
</div>



</div>
@endsection
@section('content')