$(function(){
    
    // 防止重复点击
    $('button[type="submit"]').on('click', function () {
        var $btn = $(this).button('loading');
    });

});
