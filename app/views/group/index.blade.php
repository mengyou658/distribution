@extends('layout')
@section('content')
<div class="row-fluid">
<div class="span8">
<h3>全部群组</h3>
    <div class="row-fluid">
    <?php 
        $group_count = count($groups);
    ?>
    <div class="span6">
        @for ($i = 0; $i < ceil($group_count/2); $i++)
        <h5>{{ $groups[$i]->name }}{{ $groups[$i]->id }}</h5>
        <p>{{ $groups[$i]->description }}</p>
        <hr />
        @endfor
    </div>
    <div class="span6">
        @for ($i = ceil($group_count/2); $i < $group_count ; $i++)
        <h5>{{ $groups[$i]->name }}{{ $groups[$i]->id }}</h5>
        <p>{{ $groups[$i]->description }}</p>
        <hr />
        @endfor
    </div>
    </div>
</div>
<div class="span4">
<p>
<a class="btn btn-large btn-block btn-primary" href="/group/apply">申请建立小组</a>
</p>
<hr />

<h4>推荐小组</4>

<hr />

<h4>热门小组</4>

<hr />

<h4>标签</4>

<hr />

</div>
</div>
@endsection