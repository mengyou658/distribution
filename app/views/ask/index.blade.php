@extends('layout')

@section('content')
<div class="row">
    <div class="col-sm-8">
        <div class="page-header">
            <h2>问答</h2>
        </div>

        <div class="question-list">
            @foreach($questions as $question)

            @endforeach

            {{$questions->links()}}
        </div>

    </div>

    <div class="col-sm-4">
        @include('sidebar')
    </div>
</div>
@stop