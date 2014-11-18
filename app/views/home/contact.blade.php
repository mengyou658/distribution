@extends('layout')

@section('content')
<div class="row">
    <div class="col-sm-8">
        <div class="page-header">
            <legend>联系我们</legend>
        </div>

        <div class="">

<p>Email：contact@cos.name<br>
新浪微博：<a href="http://weibo.com/cosname">@统计之都</a><br>
人人网：<a href="http://renren.com/cosname">@统计之都</a><br>
Twitter：<a href="http://twitter.com/cos_name">@cos_name</a><br>
QQ群：321311420<br>
微信：CapStat</p>

        </div>
        
    </div>

    <div class="col-sm-4">
        @include('sidebar')
    </div>
</div>
@stop