@extends('layout')

@section('content')
<div class="row">
    <div class="col-sm-8">

        <div class="page-header">
            <h2>最新文章<small class="pull-right"><a href="#">所有文章...</a></small></h2>
        </div>
        <div class="home-widget">
            <h3><a href="#">最新文章最新文章</a></h3>
            <div class="row">
                <div class="col-sm-3">
                    <img style="width:100%;" src="http://cos.name/wp-content/uploads/2013/05/6th-china-r-bj-500x332.jpg">
                </div>
                <div class="col-sm-9">
                    <p>
                    第六届中国 R 语言会议（北京会场）于 2013 年 5 月 18 日 ~ 19 日在中国人民大学国学馆113、114教室成功召开。会议由中国人民大学应用统计科学研究中心、中国人民大学统计学院、北京大学商务智能研究中心、统计之都（cos.name）主办。在两天的会议时间里，参会者齐聚一堂，就 R 语言在互联网、商业、统计、生物、制药、可视化等诸多方面的应用进行了深入的探讨。
                    </p>
                    <p><a href="#">阅读全文</a> <a href="#comment">评论(0)</a> <span class="pull-right">2014-11-30 12:00 </span></p>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <ul class="">
                        <li><a href="http://new.cos.name/article/2">title 1</a></li>
                        <li><a href="http://new.cos.name/article/3">title 2</a></li>
                        <li><a href="http://new.cos.name/article/4">title 3</a></li>
                    </ul>
                </div>
                <div class="col-sm-6">
                    <ul class="">
                        <li><a href="http://new.cos.name/article/2">title 1</a></li>
                        <li><a href="http://new.cos.name/article/3">title 2</a></li>
                        <li><a href="http://new.cos.name/article/4">title 3</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <hr>

    </div>
    <div class="col-sm-4">
        <div class="page-header">
            <h2>关注我们</h2>
        </div>
        <div class="page-header">
            <h2>讨论小组<small class="pull-right"><a href="#">所有活动...</a></small></h2>
        </div>
        <div class="page-header">
            <h2>近期活动<small class="pull-right"><a href="#">所有活动...</a></small></h2>
        </div>
        <div class="page-header">
            <h2>链接</h2>
        </div>
    </div>
</div>
@stop