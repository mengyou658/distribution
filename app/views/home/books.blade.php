@extends('layout')

@section('content')
<div class="row">
    <div class="col-sm-8">
        <div class="page-header">
            <legend>图书</legend>
        </div>

        <div class="">

<p>统计之都的成员编著、翻译了大量关于统计分析和R语言方面的图书。</p>
<h2>已出版</h2>
<p>读者可以点击下面每本书的链接进入该书的的页面，下载随书代码，我们还会不定期发布图书的勘误，也欢迎读者留言提问。</p>
<table>
<tbody>
<tr>
<td style="text-align: center;" width="30%"><img alt="R-in-Action" src="http://cos.name/wp-content/uploads/2013/03/r-in-action-small.jpg"><br>
<a title="《R语言实战》" href="http://cos.name/2013/03/r-in-action/" target="_blank">《R语言实战》</a></td>
<td style="text-align: center;" width="30%"><img alt="ggplot2" src="http://cos.name/wp-content/uploads/2013/05/ggplot2-212x300.jpg" width="150" height="188"><br>
<a title="《ggplot2：数据分析与图形艺术》" href="http://cos.name/2013/05/ggplot2/" target="_blank">《ggplot2：数据分析与图形艺术》</a></td>
<td style="text-align: center;" width="30%"><img alt="art-of-r-programming" src="http://cos.name/wp-content/uploads/2013/05/art-of-r-small.jpg" height="188"><br>
<a title="《R语言编程艺术》" href="http://cos.name/2013/05/the-art-r-programming/" target="_blank">《R语言编程艺术》</a></td>
</tr>
<tr>
<td style="text-align: center;" width="30%"><img alt="Dynamic-Documents-with-R-and-knitr" src="http://images.tandf.co.uk/common/jackets/crclarge/978148220/9781482203530.jpg" width="150" height="188"><br>
<a title="Dynamic Documents with R and knitr" href="http://www.crcpress.com/product/isbn/9781482203530" target="_blank">Dynamic Documents with R and knitr</a></td>
<td style="text-align: center;" width="30%"></td>
<td style="text-align: center;" width="30%"></td>
</tr>
</tbody>
</table>
<h2>免费电子书</h2>
<ul>
<li>陈堰平：<a href="http://yanping.me/shiny-tutorial/" target="_blank">shiny官方教程中文版</a>，该文档的<a href="https://github.com/yanping/shiny-tutorial" target="_blank">源代码</a></li>
<li>邱怡轩：<a href="https://github.com/yixuan/parallel-translation/blob/master/parallel_zh_CN.pdf?raw=true" target="_blank">parallel包中文文档</a>，该文档的<a href="https://github.com/yixuan/parallel-translation" target="_blank">源代码</a></li>
<li>陈钢：<a title="R入门25招" href="http://gossipcoder.com/?tag=r%E5%85%A5%E9%97%A825%E6%8B%9B" target="_blank">《R入门25招》</a></li>
<li>邓一硕：<a href="https://github.com/dengyishuo/dengyishuo.github.com/tree/master/RFinance" target="_blank">quantmod学习笔记</a></li>
<li>刘思喆：<a href="http://www.bjt.name/upload/pdf/Text%20Mining%20in%20R.pdf" target="_blank">R语言环境下的文本挖掘</a></li>
<li>刘思喆：<a title="153 分钟学会 R" href="http://cran.r-project.org/doc/contrib/Liu-FAQ.pdf" target="_blank">《153 分钟学会 R》</a></li>
<li>刘思喆：<a title="R参考卡片" href="http://cran.r-project.org/doc/contrib/Liu-R-refcard.pdf" target="_blank">《R参考卡片》</a></li>
<li>谢益辉：<a title="R语言忍者秘笈" href="https://github.com/yihui/r-ninja" target="_blank">《R语言忍者秘笈》</a>（正在编写）</li>
<li>陈丽云：<a title="在R中玩转计量" href="https://github.com/cloudly/Play-Econometrics-with-R" target="_blank">《在R中玩转计量》</a>（正在编写）</li>
</ul>
<h2>即将出版</h2>
<ul>
<li>邓一硕、刘思喆、李舰翻译：R in A Nutshell</li>
<li>陈逸波翻译：The R Book</li>
<li>邓一硕、肖楠、魏太云翻译：R Graphics Cookbook</li>
<li>李舰、肖凯编写：《数据科学中的R语言》</li>
</ul>

        </div>
        
    </div>

    <div class="col-sm-4">
        @include('sidebar')
    </div>
</div>
@stop