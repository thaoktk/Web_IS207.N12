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
            alert("Bạn không được mua quá 5 sản phẩm cho 1 đơn!")
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

    $(".input-text.qty").on("input", function () {
        val = $(this).val()
        quantity = parseInt($(".quantity-product span").text())
        if (Number(val) <= 0) {
            alert("Số lượng mua không được nhỏ hơn 0!")
            $(this).val("1")
            return;
        }

        if (Number(val) > Number(quantity)) {
            alert("Số lượng mua không được lớn hơn số lượng có sẵn!")
            $(this).val("1")
            return;
        }

        if (Number(val) > 5) {
            alert("Bạn không được mua quá 5 sản phẩm cho 1 đơn!")
            $(this).val("1")
            return;
        }
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

        if (cmt.trim() == "") {
            alert("Hãy nhập bình luận!")
            return;
        }
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
        idUser = parseInt($(this).data("user"))

        if (idUser) {
            $.ajax({
                type: "POST",
                url: 'templates/request.php',
                data: {
                    request: "update_cart",
                    idUser: idUser,
                    idSP: idSP,
                    quantity: quantity
                },
                success: function (data) {
                    response = JSON.parse(data)
                    if (response.status == 1) {
                        alert(response.message);
                        window.location.reload()
                    } else {
                        alert(response.message);
                    }
                }
            });
        } else {
            alert("Bạn phải đăng nhập mới được thêm vào giỏ hàng!")
            return;
        }
    })

    $("#review-btn").click(function (e) {
        e.preventDefault()
        idUser = $(this).data("user")
        idSP = $(this).data("product")
        noiDung = $(".content-review").val()
        count = 0;

        $(".rating").each(function () {
            color = $(this).css("color")

            if (color == "rgb(255, 165, 0)") {
                count++
            }
        })

        if (count == 0) {
            alert("Hãy chọn số sao bạn muốn đánh giá!")
            return;
        }

        if (idUser) {
            $.ajax({
                type: "POST",
                url: 'templates/request.php',
                data: {
                    request: "insert_review",
                    idUser: idUser,
                    idSP: idSP,
                    noiDung: noiDung,
                    soSao: count,
                },
                success: function (data) {
                    response = JSON.parse(data)
                    if (response.status == 1) {
                        alert(response.message);
                        window.location.reload()
                    } else {
                        alert(response.message);
                    }
                }
            });
        } else {
            alert("Bạn phải đăng nhập mới được đánh giá!")
            return;
        }
    })
})
