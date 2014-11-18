@extends('layout')

@section('content')
<div class="row">
    <div class="col-sm-8">
        <div class="page-header">
            <legend>帮助中心</legend>
        </div>

        <div class="">
待续...

<h1>标题一</h1>

<h2>标题二</h2>

<h3>标题三</h3>

<h4>标题四</h4>

<h5>标题五</h5>

<h6>标题六</h6>

<p>段落，用户在统计之都发表的内容（包含但不限于统计之都目前各产品功能里的内容）仅表明其个人的立场和观点，并不代表统计之都的立场或观点。作为内容的发表者，需自行对所发表内容负责，因所发表内容引发的一切纠纷，由该内容的发表者承担全部法律及连带责任。统计之都不承担任何法律及连带责任。</p>

<ul>
    <li>列表一</li>
    <li>列表二</li>
    <li>列表三</li>
</ul>
        </div>
        
    </div>

    <div class="col-sm-4">
        @include('sidebar')
    </div>
</div>
@stop