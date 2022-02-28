import $ from 'jquery';

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
        })
        .done(function(data) {
            $this.toggleClass('liked');
            $this.next('.like-counter').html(data.comment_likes_count);
        })
        .fail(function() {
            console.log('fail');
        });
    });
});