@extends('layout')
@section('content')
<div class="row-fluid">
    <div class="span3">
    
      <div class="well">
        <legend>消息中心</legend>
        <ul class="nav nav-list">
          <!--
          <li class="nav-header">设置</li>
          -->
          <li class="active"><a href="/user/notices">提醒</a></li>
        </ul>
      </div>
    </div>
    
    <div class="span9">
        <legend>提醒</legend>
        @if(!$notices->isEmpty())
            <ul>
                @foreach($notices as $notice)
                    <li>{{ $notice->content }}</li>
                @endforeach
            </ul>
        @else
        @endif
        {{ $notices->links() }}
        
    </div>
</div>
@endsection