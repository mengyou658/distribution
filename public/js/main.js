(function () {
    var my_converter = Markdown.getSanitizingConverter();
    var my_editor = new Markdown.Editor(my_converter);
    my_editor.run();
    
    // 实时渲染公式
    var wmd_preview = document.getElementById('wmd-preview');
    
    $('#wmd-input').keyup(function(event){  
        MathJax.Hub.Queue(['Typeset', MathJax.Hub, wmd_preview]);
    });
    
    $('.cmt_quote').click(function(){
        var cmt_quote_content = $(this).attr('cmt_quote_content');
        var wmd_input = $('#wmd-input');
        wmd_input.val(">"+cmt_quote_content);
        $('body').animate({scrollTop:$('#cmt-reply').offset().top - 60}, 800);
        
        my_editor.refreshPreview();
        MathJax.Hub.Queue(['Typeset', MathJax.Hub, wmd_preview]);
    });            
})();