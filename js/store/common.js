
$(document).ready(function () {
    $("#sign-up").click(function (e) {
        e.preventDefault();
        email = $("#email").val()
        password = $("#password").val()
    })

    $(".add-fav-btn").click(function () {
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

    $('.copy-btn').click(function () {
        copyText = $(this).parent().find("h5").text()
        var $temp = $("<input>");
        $("body").append($temp);
        $temp.val(copyText).select();
        document.execCommand("copy");
        $temp.remove();

        alert("Đã lấy mã giảm giá: " + copyText);
    })
})