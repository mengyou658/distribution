@extends('layout')

@section('css')
<link href="/css/jasny-bootstrap.min.css" rel="stylesheet">
@stop

@section('content')
<div class="row">
    <div class="col-sm-3">
        @include('user.setting.sidebar')
    </div>

    <div class="col-sm-9">
    </div>
</div>
@stop

@section('js')
<script src="/js/jasny-bootstrap.min.js"></script>
@stop