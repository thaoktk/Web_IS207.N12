

$(document).ready(function () {


    const host = "https://provinces.open-api.vn/api/";
    var callAPI = (api) => {
        return axios.get(api)
            .then((response) => {
                renderData(response.data, "province");
            });
    }
    callAPI('https://provinces.open-api.vn/api/?depth=1');
    var callApiDistrict = (api) => {
        return axios.get(api)
            .then((response) => {
                renderData(response.data.districts, "district");
            });
    }
    var callApiWard = (api) => {
        return axios.get(api)
            .then((response) => {
                renderData(response.data.wards, "ward");
            });
    }

    var renderData = (array, select) => {
        let row = ' <option disable value="">Chọn Nơi</option>';
        array.forEach(element => {
            row += `<option value="${element.code}">${element.name}</option>`
        });
        document.querySelector("#" + select).innerHTML = row
    }

    $("#province").change(() => {
        callApiDistrict(host + "p/" + $("#province").val() + "?depth=2");
        printResult();
    });
    $("#district").change(() => {
        callApiWard(host + "d/" + $("#district").val() + "?depth=2");
        printResult();
    });
    $("#ward").change(() => {
        printResult();
    })

    var printResult = () => {
        if ($("#district").val() != "" && $("#province").val() != "" &&
            $("#ward").val() != "") {
            let result = $("#province option:selected").text() +
                " | " + $("#district option:selected").text() + " | " +
                $("#ward option:selected").text();
            $("#result").text(result)
        }

    }


    tongCheckout = Number($("#total-checkout").text())
    freeShipCheckout = Number($("#ship-checkout").text())
    orderCheckout = Number($("#order-checkout").text())
    $("#total-cost-checkout").text(tongCheckout - freeShipCheckout - orderCheckout)

    tong = Number($("#total-cost .cost").text())
    freeShip = Number($("#voucher-free-ship .ship").text())
    order = Number($("#voucher-order .order").text())
    thanhTien = Number($("#total-cost-voucher .total").text(tong - freeShip - order))

    // quantity and cost
    $(".increase").each(function () {
        $(this).click(function () {
            result = $(`.input-text.qty[data-id='${$(this).data("id")}']`);
            idSP = result.data("id")
            qtyProduct = $(`.product-qty[data-id='${$(this).data("id")}']`).val()
            qty = result.val();
            qty++;
            if (qty > qtyProduct) {
                alert("Số lượng mua không được quá số lượng có sẵn!")
                return;
            }

            if (qty > 5) {
                alert("Số lượng mua không được quá 5 sản phẩm!")
                return;
            }
            result.val(qty)

            price = Number($(this).closest("tr").find(".product-price .price").text())
            $(this).closest("tr").find(".product-cost .cost").text((price * qty))

            totalCost = 0;
            $(".product-cost .cost").each(function () {
                cost = Number($(this).text())
                totalCost += cost
            })
            $("#total-cost .cost").text(totalCost)

            thanhTien = Number($("#total-cost-voucher .total").text(tong - freeShip - order))

            $.ajax({
                type: "POST",
                url: "templates/request.php",
                dataType: "json",
                data: {
                    request: "update_qty_product_cart",
                    idSP: idSP,
                    qty: null,
                    isIncrease: 1,
                },
                success: function () {
                },
                error: function (e) {
                }
            })
        })
    })

    $(".reduced").each(function () {
        $(this).click(function () {
            result = $(`.input-text.qty[data-id='${$(this).data("id")}']`);
            idSP = result.data("id")
            qty = result.val();
            qty--;
            if (qty <= 0) {
                qty = 1
            }
            result.val(qty)

            price = Number($(this).closest("tr").find(".product-price .price").text())
            $(this).closest("tr").find(".product-cost .cost").text((price * qty))

            totalCost = 0;
            $(".product-cost .cost").each(function () {
                cost = Number($(this).text())
                totalCost += cost
            })
            $("#total-cost .cost").text(totalCost)
            thanhTien = Number($("#total-cost-voucher .total").text(tong - freeShip - order))

            if (qty > 0) {
                $.ajax({
                    type: "POST",
                    url: "templates/request.php",
                    dataType: "json",
                    data: {
                        request: "update_qty_product_cart",
                        idSP: idSP,
                        qty: null,
                        isIncrease: 0,
                    },
                    success: function () {
                    },
                    error: function (e) {
                    }
                })
            }
        })
    })

    $('.input-text.qty').each(function () {
        $(this).on("input", function () {
            val = $(this).val()
            idSP = $(this).data("id")
            thanhTien = Number($("#total-cost-voucher .total").text(tong - freeShip - order))

            if (val <= 0) {
                alert("Số lượng mua phải lớn hơn 0!")
                return;
            } else {
                $.ajax({
                    type: "POST",
                    url: "templates/request.php",
                    dataType: "json",
                    data: {
                        request: "update_qty_product_cart",
                        idSP: idSP,
                        qty: val,
                        isIncrease: 1,
                    },
                    success: function () {
                        window.location.reload()
                    },
                    error: function (e) {
                    }
                })
            }
        })
    })

    $('.btn-delete').each(function () {
        $(this).click(function () {
            $(this).parent().parent().remove()

            totalCost = 0;
            $(".product-cost .cost").each(function () {
                cost = parseFloat($(this).text())
                totalCost += cost
            })
            $("#total-cost .cost").text(totalCost)
            idSP = $(this).data("id")
            thanhTien = Number($("#total-cost-voucher .total").text(tong - freeShip - order))

            $.ajax({
                type: "POST",
                url: "templates/request.php",
                dataType: "json",
                data: {
                    request: "delete_product_cart",
                    idSP: idSP,
                },
                success: function () {
                },
                error: function (e) {
                }
            })
        })
    })

    $(".btn-del-all").each(function () {
        $(this).click(function () {
            $.ajax({
                type: "POST",
                url: "templates/request.php",
                dataType: "json",
                data: {
                    request: "delete_cart"
                },
                success: function () {
                    alert("Xóa giỏ hàng thành công!")
                    window.location.reload()
                },
            })
        })
    })

    $(".btn-voucher").click(function () {
        typeVoucher = $("#select-voucher").val()
        valueVoucher = $(".input-voucher").val()
        if (valueVoucher.trim() === "") {
            alert("Hãy nhập mã giảm giá!")
            return;
        } else {
            if (typeVoucher == "free-ship") {
                $.ajax({
                    type: "POST",
                    url: "templates/request.php",
                    dataType: "json",
                    data: {
                        request: "add_voucher_freeShip",
                        code: valueVoucher
                    },
                    success: function (response) {
                        if (response.status == 0) { //Có lỗi
                            alert(response.message);
                            $(".input-voucher").val("")
                        } else { //Mua thành công
                            alert(response.message);
                            window.location.reload();
                        }
                    },
                })
            } else {
                $.ajax({
                    type: "POST",
                    url: "templates/request.php",
                    dataType: "json",
                    data: {
                        request: "add_voucher_order",
                        code: valueVoucher
                    },
                    success: function (response) {
                        if (response.status == 0) { //Có lỗi
                            alert(response.message);
                            $(".input-voucher").val("")
                        } else { //Mua thành công
                            alert(response.message);
                            window.location.reload();
                        }
                    },
                })
            }
        }
    })

    $(".btn-checkout").click(function () {
        familyName = $("#first").val()
        name = $("#last").val()
        phoneNumber = $("#phone-number").val()
        homeNumber = $("#home-number").val()

        province = $("#province option:selected").text()
        district = $("#district option:selected").text()
        ward = $("#ward option:selected").text()
        message = $("#message").val()

        if (name.trim() === "" || familyName.trim() === "" || phoneNumber.trim() === "" || homeNumber.trim() === "") {
            alert("Yêu cầu điền đầy đủ thông tin đơn hàng!")
            return;
        }

        if (province === "Chọn Nơi" || district === "Chọn Nơi" || ward === "Chọn Nơi") {
            alert("Yêu cầu điền đầy đủ thông tin đơn hàng!")
            return;
        }
    })
})


