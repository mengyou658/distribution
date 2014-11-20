$(function(){
    
    $('.comment-digg').click(function(){
        var _this = $(this);
        var comment_id = _this.data('comment_id');
        if (!_this.hasClass('disabled')) {
            _this.addClass('disabled');

            var posting = $.post('/comment/digg', { comment_id:comment_id });
            posting
            .done(function(data) {
                var digg_span = _this.find('span.digg-count');
                var digg_count = parseInt(digg_span.text())+1;
                digg_span.text(digg_count);
            })
            .fail(function(data) {
                // @todo: 使用 Modal 
                if (data.status == 401) {
                    alert('请登录后进行操作');
                    // @todo: 301 to login
                } else if (data.status == 400) {
                    alert('已经顶过');
                } else {
                    alert('...发生了一些错误');
                }
            });
        }
    });

    $('.comment-reply').click(function(){
        if (cur_user.id == 0) {
            alert('请登录后进行操作');
            return;
        }
        var _this = $(this);
        var comment_input = $('.comment-input');
        comment_input.text(comment_input.text()+'@'+_this.data('reply_user')+': \n');

        $('html, body').animate({
            scrollTop: comment_input.offset().top
        }, 300);
    });

});
