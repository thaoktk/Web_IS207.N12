$(document).ready(function () {
    $("#submit-comment").click(function (e) {
        e.preventDefault();
        idND = parseInt($(this).data("user"))
        cmt = $(".cmt-input").val()
        if (idND) {
            if (cmt.trim() !== "") {
                if ($(".cmt-input").attr("placeholder") == "Trả lời bình luận") {
                    idBL = $("#submit-comment").attr("data-cmtReply")
                    $.ajax({
                        type: "POST",
                        url: "templates/request.php",
                        dataType: "json",
                        data: {
                            request: "insert_reply_comment",
                            idBL: idBL,
                            idND: idND,
                            message: cmt
                        },
                        success: function () {
                            window.location.reload();
                        },
                        error: function (e) {
                            alert("Hãy nhập bình luận!")
                        }
                    })
                } else {
                    idBlog = parseInt($(this).data("blog"))
                    $.ajax({
                        type: "POST",
                        url: "templates/request.php",
                        dataType: "json",
                        data: {
                            request: "insert_comment",
                            idBlog: idBlog,
                            idND: idND,
                            message: cmt
                        },
                        success: function () {
                            window.location.reload();
                        },
                        error: function (e) {
                            alert("Hãy nhập bình luận!")
                        }
                    })
                }
            }
        } else {
            alert("Bạn phải đăng nhập mới được sử dụng tính năng này!")
            return;
        }
    })
})