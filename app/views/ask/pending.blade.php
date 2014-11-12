@extends('layout')

@section('content')
<div class="row">
    <div class="col-sm-8">
        <div class="page-header">
            <legend>等待回答</legend>
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

            {{$pendingQuestions->links()}}
        </div>


    </div>

    <div class="col-sm-4">
        <a class="btn btn-primary btn-block" href="{{action('AskController@getAsk')}}">提问</a>
        
        @include('sidebar')
    </div>
</div>
@stop