$(document).ready(function () {
    quantityProduct = parseInt($(".quantity-product span").text())
    if (quantityProduct > 0) {
        $(".product_count").show()
        $(".add-to-cart").show()
    } else {
        $(".product_count").hide()
        $(".add-to-cart").hide()
    }

    $(".increase").click(function () {
        value = $(".input-text.qty").val()
        value++;
        quantity = parseInt($(".quantity-product span").text())
        if (value > quantity) {
            alert("Số lượng mua không được lớn hơn số lượng có sẵn!")
            return;
        }

        if (value > 5) {
            alert("Bạn không được mua quá 10 sản phẩm cho 1 đơn!")
            return;
        }
        $(".input-text.qty").val(value)
    })

    $(".reduced").click(function () {
        value = $(".input-text.qty").val()
        value--;
        if (value <= 0) {
            value = 1
        }
        $(".input-text.qty").val(value)
    })

    $(".input-text.qty").change(function () {

    })

    $("#st1").click(function () {
        $(".fa-star.rating").css("color", "#777777");
        $("#st1").css("color", "orange");
        $("#rating-text").text("Quá tệ!")
    });
    $("#st2").click(function () {
        $(".fa-star.rating").css("color", "#777777");
        $("#st1, #st2").css("color", "orange");
        $("#rating-text").text("Tệ!")
    });
    $("#st3").click(function () {
        $(".fa-star.rating").css("color", "#777777")
        $("#st1, #st2, #st3").css("color", "orange");
        $("#rating-text").text("Bình thường")
    });
    $("#st4").click(function () {
        $(".fa-star.rating").css("color", "#777777");
        $("#st1, #st2, #st3, #st4").css("color", "orange");
        $("#rating-text").text("Tốt!")
    });
    $("#st5").click(function () {
        $(".fa-star.rating").css("color", "#777777");
        $("#st1, #st2, #st3, #st4, #st5").css("color", "orange");
        $("#rating-text").text("Tuyệt vời!")
    });

    $(".icon_btn").click(function () {
        idSP = parseInt($(this).data("product"))
        idND = parseInt($(this).data("user"))
        if (idND) {
            $.ajax({
                type: "POST",
                url: "templates/request.php",
                dataType: "json",
                data: {
                    request: "insert_fav",
                    idSP: idSP,
                    idND: idND
                },
                success: function () {
                    alert("Thêm thành công sản phẩm vào yêu thích!")
                },
                error: function (e) {
                    alert("Bạn đã thêm sản phẩm này vào yêu thích rồi!")
                }
            })
        } else {
            alert("Bạn phải đăng nhập mới được sử dụng tính năng này!")
        }
    })

    $(".reply_btn").each(function () {
        $(this).click(function () {
            idCmtReply = $(this).data("comment")
            $("#submit-comment").attr("data-cmtReply", idCmtReply)
            $(".cmt-input").focus()
            $(".cmt-input").attr("placeholder", "Trả lời bình luận");
        })
    })


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
                    idSP = parseInt($(this).data("product"))
                    $.ajax({
                        type: "POST",
                        url: "templates/request.php",
                        dataType: "json",
                        data: {
                            request: "insert_comment",
                            idSP: idSP,
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

    $(".add-to-cart").click(function () {
        quantity = parseInt($(".input-text.qty").val())
        idSP = parseInt($(this).data("product"))

        $.ajax({
            type: "POST",
            url: 'templates/request.php',
            data: {
                request: "update_cart",
                idSP: idSP,
                quantity: quantity
            },
            success: function (response) {
                response = JSON.parse(response);
                if (response.status == 0) { //Có lỗi
                    alert(response.message);
                } else { //Mua thành công
                    alert(response.message);
                    window.location.reload();
                }
            }
        });
    })
})
