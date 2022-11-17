$(document).ready(function () {
    $(".product_ram button").click(function (e) {
        $(".product_ram").find(".primary-border").addClass("default-border").removeClass("primary-border")
        $(this).addClass("primary-border").removeClass("default-border")
    })

    $(".product_color button").click(function (e) {
        $(".product_color").find(".primary-border").addClass("default-border").removeClass("primary-border")
        $(this).addClass("primary-border").removeClass("default-border")
    })

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
})
