<div class="page-header">
    <legend>系列活动</legend>
</div>
<ul class="nav nav-pills nav-stacked">
    <li @if(!isset($curSeriesId)) class="active" @endif ><a href="/event">全部活动</a></li>
    
    <?php
    $serieses = Series::orderBy('order')->get();
    ?>
    @foreach($serieses as $series)

    <li @if(isset($curSeriesId) && $series->id == $curSeriesId) class="active" @endif >
        <a href="{{action('ActivityController@getSeries', $series->id)}}">{{$series->name}}</a>
    </li>

    @endforeach
</ul>