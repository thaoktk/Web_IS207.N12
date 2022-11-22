$(document).ready(function () {
    $(".increase").click(function () {
        value = $(".input-text.qty").val()
        value++;
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
        $.ajax({
            type: "POST",
            url: "templates/request.php",
            dataType: "json",
            data: {
                request: "insert_fav",
                idSP: idSP,
                idND: idND
            },
            success: function (data, status, xhr) {
                alert("Thêm thành công sản phẩm vào yêu thích!")
            },
            error: function (e) {
                alert("Bạn đã thêm sản phẩm này vào yêu thích rồi!")
            }
        })
    })
})
