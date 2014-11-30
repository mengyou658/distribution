@extends('layout')

@section('content')
<div class="row">
    <div class="col-sm-8">
        <div class="page-header">
            <legend>问答</legend>
        </div>

        <div class="page-header">
            <legend>等待回答 <small class="pull-right"><a href="{{action('AskController@getPending')}}">全部...</a></small></legend>
        </div>

        <div class="question-list">
            @foreach($pendingQuestions as $question)
            <div class="question-item">
                <h3>
                    <a href="{{action('AskController@getQuestionDetail', $question->id)}}">{{{$question->title}}}</a>
                    <small class="pull-right">{{$question->answer_count}}回答</small>
                </h3>
            </div>
            @endforeach
        </div>

        <div class="page-header">
            <legend>最新问题 <small class="pull-right"><a href="{{action('AskController@getHottest')}}">全部...</a></small></legend>
        </div>

        <div class="question-list">
            @foreach($hottestQuestions as $question)
            <div class="question-item">
                <h3>
                    <a href="{{action('AskController@getQuestionDetail', $question->id)}}">{{{$question->title}}}</a>
                    <small class="pull-right">{{$question->answer_count}}回答</small>
                </h3>
            </div>
            @endforeach
        </div>

    </div>

    <div class="col-sm-4">
        <a class="btn btn-primary btn-block" href="{{action('AskController@getAsk')}}">提问</a>
        
        @include('sidebar')
    </div>
</div>
@stop