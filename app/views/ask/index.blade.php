@extends('layout')

@section('content')
<div class="row">
    <div class="col-sm-8">
        <div class="page-header">
            <legend>等待回答 <small class="pull-right"><a href="{{action('AskController@getPending')}}">全部...</a></small></legend>
        </div>

        <div class="question-list">

        </div>

        <div class="page-header">
            <legend>最新问题 <small class="pull-right"><a href="{{action('AskController@getHottest')}}">全部...</a></small></legend>
        </div>

        <div class="question-list">

        </div>

    </div>

    <div class="col-sm-4">
        <a class="btn btn-primary btn-block" href="{{action('AskController@getAsk')}}">提问</a>
        
        @include('sidebar')
    </div>
</div>
@stop