<legend> 活动系列 </legend>
<ul class="nav nav-list">
  <!--
  <li class="nav-header">List header</li>
  -->
  <li><a href="/activities">全部</a></li>
  <!--
  <li class="divider"></li>
  -->
  <?php $series = Series::all(); ?>
  @foreach($series as $series_item)
  <li><a href="/activities/series/{{ $series_item->id }}">{{ e($series_item->name) }}</a></li>
  @endforeach

</ul>

