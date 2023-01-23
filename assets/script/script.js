$(function() {
    $(".heart").on("click", function() {
        $(this).toggleClass("is-active");
    });
});
jQuery(document).ready(function ($) {

    $('#ko_like').on('submit', function (e) {
        e.preventDefault();
        let post_id=$('#post_like_id').val();
        let user_id=$('#user_like_id').val();
        $.ajax({
            url: '/wp-admin/admin-ajax.php',
            type: "post",
            data: {
                action: "add_like",
                post_id:post_id,
                user_id:user_id
            },
            beforeSend:function (response) {
                $('.loading-like').css("display","flex");
                $('.ko_btn_like').css("opacity","0");
            },
            success: function (response) {

                $('.loading-like').css("display","none");
                $('.ko_btn_like').css("opacity","1");
                $('.count-like').text(response.count)

            },
            complete: function (response) {



            },
            error: function (error) {
               /* alert("خطا")*/
            },
        })
    })
})