<div class="page-header">
    <legend>文章分类</legend>
</div>
<ul class="nav nav-pills nav-stacked">
    <li @if(!isset($curCategoryId)) class="active" @endif ><a href="/article">全部文章</a></li>
    
    <?php
    $categories = Category::orderBy('order')->get();
    ?>
    @foreach($categories as $category)

    <li @if(isset($curCategoryId) && $category->id == $curCategoryId) class="active" @endif >
        <a href="{{action('ArticleController@getCategory', $category->id)}}">{{$category->name}}</a>
    </li>

    @endforeach
</ul>