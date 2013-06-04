@extends('layout')
@section('content')
<div class="row-fluid">
    <div class="span3">
        <h2>{{ $user->username }}</h2>
        
        <img src="{{ $user->avatar }}?s=160" />
        
    </div>
    
    <div class="span9">
    // TODO:
        <h3>简介<h3>
        <hr />
        <h3>帖子<h3>
        <hr />
        <h3>等等<h3>
        <hr />
    </div>
</div>
@endsection