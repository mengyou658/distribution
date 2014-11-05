@extends('layout')

@section('css')
<link href="/css/highlight/solarized_dark.css" rel="stylesheet">
@stop

@section('content')



<div>
    
<pre class=""><code class="lang-cpp">
#include <iostream>
#define IABS(x) ((x) < 0 ? -(x) : (x))

$a+b=c$ 

int main(int argc, char *argv[]) {

  /* An annoying "Hello World" example */
  for (auto i = 0; i < 0xFFFF; i++)
    cout << "Hello, World!" << endl;

  char c = '\n';
  unordered_map <string, vector<string> > m;
  m["key"] = "\\\\"; // this is an error

  return -2e3 + 12l;
}
</code></pre>

</div>

@stop

@section('js')
<script src="/js/libs/highlight.pack.js"></script>
<script>

$(function(){
    // code hightlight
    // hljs.configure({
    //     classPrefix: 'lang-'
    // });
    // $('pre code').each(function(i, block) {
    //     hljs.highlightBlock(block);
    // });

hljs.initHighlightingOnLoad();
});

</script>
@stop