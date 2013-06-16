@extends('layout')
@section('content')
<div class="row-fluid">
<div class="span8">
<legend>新闻</legend>
    <ul class="nav nav-tabs">
    <li @if(Request::is('news')) class="active" @endif><a href="/news" >最新</a></li>
    <li @if(Request::is('news/hottest*')) class="active" @endif><a href="/news/hottest" >最热</a></li>
    </ul>
@foreach ($news as $news_item)
    <div class="media">
      <div class="pull-left">
          <a class="btn btn-primary news-digg" href="javascript:;" news-id="{{ $news_item->id }}">
            <i class="icon-thumbs-up"></i>顶 (<span>{{ $news_item->digg_count }}</span>)
          </a>
      </div>
      <div class="media-body">
        <h4 class="media-heading"><a href="{{ $news_item->link }}">{{ e($news_item->title) }}</a></h4>
        <p>{{ e($news_item->abstract) }}</p>
        <p><a href="/news/{{ $news_item->id }}">查看详情</a><a href="/news/{{ $news_item->id }}#news-comment">评论({{ $news_item->comment_count }})</a><span class="pull-right">{{ $news_item->courier_name }}投递于 {{ $news_item->created_at->format('Y-m-d h:i'); }}</span></p>
      </div>
    </div>
@endforeach
{{ $news->links() }}
</div>

    <div class="span4 sidebar">
        <p>
        <a class="btn btn-large btn-block btn-primary" href="/news/deliver">我要投递</a>
        </p>
        <hr />
        <div class="sidebar-plate">
            <legend>热门标签</legend>
            <?php $tags = Tag::orderBy('refer_count', 'desc')->take(7)->get() ?>
            @if(!$tags->isEmpty())
            
                @foreach ($tags as $tag)
                <a href="{{ URL::route('tag_detail', array($tag->id)) }}"><span class="label label-inverse">{{ $tag->tag }}</span></a>
                @endforeach
            
            @endif
        </div>
        <div class="sidebar-plate">
            <legend>最新文章</legend>
            
            <ul class="sidebar-ul unstyled">
                <li>
                    <a class="pull-left" href="/group/"><img class="article" src="http://cos.name/wp-content/uploads/2013/05/6th-china-r-bj-500x332.jpg" /></a>
                    <div class="sidebar-ul-body">
                        <a href="">第六届中国R语言会议（北京）纪要</a>
                        <p>本届R会议，主要内容是</p>
                    </div>
                </li>
                <li>
                    
                    <div class="sidebar-ul-body">
                        <a href="">第六届中国R语言会议（北京）纪要</a>
                        <p>本届R会议，主要内容是</p>
                    </div>
                </li>
                <li>
                    
                    <div class="sidebar-ul-body">
                        <a href="">第六届中国R语言会议（北京）纪要</a>
                        <p>本届R会议，主要内容是</p>
                    </div>
                </li>
            </ul>
        </div>
      
        <div class="sidebar-plate">
            <legend>友情链接</legend>
            <ul class="sidebar-ul">
                <li>
                    <div class="sidebar-ul-body">
                        <a href="" target="_blank">厦门大学数据挖掘研究中心</a>
                    </div>
                </li>
                <li>
                    <div class="sidebar-ul-body">
                        <a href="" target="_blank">厦门大学数据挖掘研究中心</a>
                    </div>
                </li>
                <li>
                    <div class="sidebar-ul-body">
                        <a href="" target="_blank">厦门大学数据挖掘研究中心</a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
@endsection
@section('js')
<script>
(function () {
    $('.news-digg').click(function(){
        var _this = $(this);
        var news_id = _this.attr('news-id');
        if (!_this.hasClass('disabled')) {
            _this.addClass('disabled');
            $.get('/news/'+news_id+'/digg', function(res){
                var digg_span = _this.find('span');
                digg_span.text(parseInt(digg_span.text())+1);
            });
        }
    });
})();
</script>
@endsection
