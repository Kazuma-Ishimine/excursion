// 削除ボタン
const delete_buttons = document.getElementsByClassName('delete_button');
Array.prototype.forEach.call(delete_buttons,delete_button=>
    delete_button.addEventListener('click', function(e) {
        const form_id = 'form_' + e.target.id;
        var dialog_bool = window.confirm('削除しますか?');
        if (dialog_bool === true) {
            document.getElementById(form_id).submit();
        } else {
            return false;
        }
}));

window.$ = window.jQuery = require('jquery');

// いいね機能
$(function() {
    var like = $('.like-toggle');
    var likeCommentId;
    like.on('click', function() {
        var $this = $(this);
        likeCommentId = $this.data('comment-id');
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '/comments/likes',
            method: 'POST',
            data: {
                'comment_id': likeCommentId
            },
        });
        .done(function(data) {
            $this.toggleClass('liked');
            $this.next('.like-counter').html(data.comment_likes_count);
        });
        .fail(function() {
            console.log('fail');
        });
    });
});