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
    
    
    $('.cmt_quote').click(function(){
        var cmt_quote_content = $(this).attr('cmt_quote_content');
        var wmd_input = $('#wmd-input');
        wmd_input.val(">"+cmt_quote_content);
        $('body').animate({scrollTop:$('#cmt-reply').offset().top - 60}, 800);
        
        my_editor.refreshPreview();
        MathJax.Hub.Queue(['Typeset', MathJax.Hub, wmd_preview]);
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
    $('#submit').click(function(){
        var preview = $('#wmd-preview').html();
        $.post('/test', {'md_input':preview}, function(result){
            console.log('success');
            location.reload();
        });
    });
    */
})();