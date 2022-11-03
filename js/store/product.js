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
})