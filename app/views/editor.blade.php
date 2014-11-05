@extends('layout')

@section('css')
<link href="/css/highlight/github.css" rel="stylesheet">
<link href="/css/bootstrap-markdown.min.css" rel="stylesheet">
@stop

@section('content')

<textarea id="editor" rows="10"></textarea>


<div>
    
<pre><code class="lang-cpp">
#include <iostream>
#define IABS(x) ((x) < 0 ? -(x) : (x))

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

<script src="/js/libs/marked.min.js"></script>
<script src="/js/libs/to-markdown.js"></script>
<script src="/js/bootstrap-markdown.js"></script>
<script src="/js/bootstrap-markdown.zh.js"></script>
<script>
$(function(){
    // code hightlight
    $('pre code').each(function(i, block) {
        hljs.highlightBlock(block);
    });

    // @todo: tab 缩进
    // @todo: 应该直接写进 bootstrap-markdown line 738 
    /*
    $("#editor").keydown(function(e) {
        if(e.keyCode === 9) { // tab was pressed
            // get caret position/selection
            var start = this.selectionStart;
            var end = this.selectionEnd;

            var $this = $(this);
            var value = $this.val();

            // set textarea value to: text before caret + tab + text after caret
            $this.val(value.substring(0, start)
                        + "    "
                        + value.substring(end));

            // put caret at right position again (add one for the tab)
            this.selectionStart = this.selectionEnd = start + 4;

            // prevent the focus lose
            e.preventDefault();
        }
    });
    */

    $("#editor").markdown({
        language:'zh',
        iconlibrary: 'fa',
        onPreview: function(e) {

            if (e.isDirty()) {

                // hack
                setTimeout(function(){
                    preview = $('.md-preview');
                    MathJax.Hub.Queue(['Typeset', MathJax.Hub, preview[0]]);

                    // hightlight
                    preview.find('pre code').each(function(i, block) {
                        hljs.highlightBlock(block);
                    });
                }, 100);

            }
            else {

            }

        },
        onFocus: function(e) {
            
        },
    });

});
</script>
@stop