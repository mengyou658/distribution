(function () {
    var my_converter = Markdown.getSanitizingConverter();
    var my_editor = new Markdown.Editor(my_converter);
    my_editor.run();
    
    // 实时渲染公式
    var wmd_preview = document.getElementById('wmd-preview');
    $('#wmd-input').keyup(function(event){  
        MathJax.Hub.Queue(['Typeset', MathJax.Hub, wmd_preview]);
    });
    
    // my_editor.refreshPreview(); // 刷新编辑器预览
    
    
    $('.comment-quote').click(function(){
        var cmt_quote_content = $(this).attr('comment-quote-content');
        var wmd_input = $('#wmd-input');
        wmd_input.val(">"+cmt_quote_content.replace(/\n/g, '\n> ')+'\n');
        $('body').animate({scrollTop:$('#comment-reply').offset().top - 60}, 800);
        
        my_editor.refreshPreview();
        MathJax.Hub.Queue(['Typeset', MathJax.Hub, wmd_preview]);
    });
    
    $('.pager li a').each(function(){
        $(this).attr('href', $(this).attr('href')+'#article-comment'); // TODO: 丑，找更好的方法。
    });
    
    $('#wmd-submit').click(function(){
        if ( $('#wmd-input').val().trim().length < 3 ) {
            $(this).before('<div class="alert"><button type="button" class="close" data-dismiss="alert">&times;</button>内容太短</div>');
        } else {
            $('#wmd-preview-content').val($('#wmd-preview').html());
            $('#wmd-form').submit()
        }
    });
    
    /*
    // for @ 
    $('.cmt_content').each(function(){
        var content = $(this).text().trim() + ' ';
        var content_f = content.replace(/(@\S{4,12})\s/g, function(str){
            var name = str.trim().slice(1);
            //console.log(name);
            return '<a href="/user/'+name+'">'+str.trim()+'</a> ';
        });
        $(this).html(content_f);
    });
    
    // for test
    
    */
})();