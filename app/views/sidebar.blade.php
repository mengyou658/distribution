<div class="page-header">
    <legend>关注统计之都</legend>
</div>
<div class="">
    <ul>
        <li>新浪微博<a href="http://weibo.com/cosname">@统计之都</a></li>
        <li>人人网<a href="http://renren.com/cosname">@统计之都</a></li>
        <li>Twitter<a href="http://twitter.com/cos_name">@cos_name</a></li>
    </ul>
</div>

<div class="page-header">
    <legend>微信公众平台</legend>
</div>
<div class="">
    <img src="/img/cos_qrcode.jpg" alt="" width="129" height="129" border="0">
    <p>微信号 CapStat</p>
    <p>我们将第一时间向您推送主站和论坛的精彩内容，以及统计之都的线下活动、竞赛、培训和会议信息。</p>
</div>

<div class="page-header">
    <legend>讨论小组<small class="pull-right"><a href="{{action('GroupController@getIndex')}}">所有小组...</a></small></legend>
</div>

<?php
    // $sidebarGroups = Cache::remember('sidebar:groups', 60, function() {
    //     return Group::orderByRaw("RAND()")->take(4)->get();
    // });
    $sidebarGroups = Group::orderByRaw("RAND()")->take(4)->get();
?>

<div class="row">
    @foreach($sidebarGroups as $group)
    <div class="col-xs-2">
        <a href="{{action('GroupController@getDetail', $group->id)}}">
        <img style="width:48px" src="/img/test_group.jpg"><!-- @todo: fixme -->
        </a>
    </div>
    <div class="col-xs-4">
        <p><a href="{{action('GroupController@getDetail', $group->id)}}">{{$group->name}}</a></p>
        <P>{{$group->short_descr}}</P>
    </div>
    @endforeach
</div>

<div class="page-header">
    <legend>近期活动<small class="pull-right"><a href="{{action('ActivityController@getIndex')}}">所有活动...</a></small></legend>
</div>

<?php
    // $sidebarActivities = Cache::remember('sidebar:activities', 60, function() {
    //     return Activity::orderByRaw("RAND()")->take(3)->get();
    // });
    $sidebarActivities = Activity::orderByRaw("RAND()")->take(3)->get();
?>

<div class="row">
    @foreach($sidebarActivities as $activity)
    <div class="col-xs-12">
        <p><a href="{{action('ActivityController@getDetail', $activity->id)}}">{{$activity->title}}</a> 
        <span class="pull-right">{{$activity->began_at->format('Y年m月d日')}}</span></p>
        <P>{{$activity->abstract}}</P>
    </div>
    @endforeach
</div>

<div class="page-header">
    <legend>链接</legend>
</div>

<div class="">
<ul class="">
<li><a href="http://stat.ruc.edu.cn" title="中国人民大学统计学院网站" target="_blank">中国人民大学统计学院</a></li>
<li><a href="http://rucdmc.net">中国人民大学数据挖掘中心</a></li>
<li><a href="http://birc.gsm.pku.edu.cn/" target="_blank">北京大学商务智能研究中心</a></li>
<li><a href="http://sam.cufe.edu.cn/" title="中央财经大学统计与数学学院网站" target="_blank">中央财经大学统计与数学学院</a></li>
<li><a href="http://tjx.cueb.edu.cn/" title="首都经济贸易大学统计学院网站" target="_blank">首经贸统计学院</a></li>
</ul>
</div>

<div class="page-header">
    <legend>第七届R会议特别赞助商</legend>
</div>

<div class="">
<ul class="">
<li><a href="http://www.wquant.com/" title="微量网" target="_blank">微量网</a></li>
<li><a href="http://supstat.com.cn/">SupStat北京数博思达数据咨询公司</a></li>
<li><a href="http://cos.name">阿里巴巴集团</a></li>
</ul>
</div>