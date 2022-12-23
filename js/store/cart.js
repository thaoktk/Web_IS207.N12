

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
    shipCheckout = Number($("#not-free-ship-checkout").text())
    freeShipCheckout = Number($("#ship-checkout").text())
    orderCheckout = Number($("#order-checkout").text())
    $("#total-cost-checkout").text(tongCheckout + shipCheckout - freeShipCheckout - orderCheckout)

    tong = Number($("#total-cost .cost").text())
    shipCod = Number($("#ship-cod .cost").text())
    freeShip = Number($("#voucher-free-ship .ship").text())
    order = Number($("#voucher-order .order").text())
    Number($("#total-cost-voucher .total").text(tong + shipCod - freeShip - order))

    // quantity and cost
    $(".increase").each(function () {
        $(this).click(function () {
            result = $(`.input-text.qty[data-id='${$(this).data("id")}']`);
            idSP = result.data("id")
            idUser = result.data("user")
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

            tong = Number($("#total-cost .cost").text())
            shipCod = Number($("#ship-cod .cost").text())
            freeShip = Number($("#voucher-free-ship .ship").text())
            order = Number($("#voucher-order .order").text())
            Number($("#total-cost-voucher .total").text(tong + shipCod - freeShip - order))

            $.ajax({
                type: "POST",
                url: "templates/request.php",
                dataType: "json",
                data: {
                    request: "update_qty_product_cart",
                    idUser: idUser,
                    idSP: idSP,
                    qty: qty,
                },
            })
        })
    })

    $(".reduced").each(function () {
        $(this).click(function () {
            result = $(`.input-text.qty[data-id='${$(this).data("id")}']`);
            idSP = result.data("id")
            idUser = result.data("user")
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

            tong = Number($("#total-cost .cost").text())
            shipCod = Number($("#ship-cod .cost").text())
            freeShip = Number($("#voucher-free-ship .ship").text())
            order = Number($("#voucher-order .order").text())
            Number($("#total-cost-voucher .total").text(tong + shipCod - freeShip - order))

            if (qty > 0) {
                $.ajax({
                    type: "POST",
                    url: "templates/request.php",
                    dataType: "json",
                    data: {
                        request: "update_qty_product_cart",
                        idUser: idUser,
                        idSP: idSP,
                        qty: qty,
                    },
                })
            }
        })
    })

    $('.input-text.qty').each(function () {
        $(this).on("input", function () {
            val = $(this).val()
            idSP = $(this).data("id")
            idUser = $(this).data("user")
            qtyProduct = $(`.product-qty[data-id='${$(this).data("id")}']`).val()

            if (val <= 0) {
                alert("Số lượng mua phải lớn hơn 0!")
                $(this).val("1")
                return;
            }

            if (val > qtyProduct) {
                alert("Số lượng mua không được quá số lượng có sẵn!")
                $(this).val("1")
                return;
            }

            tong = Number($("#total-cost .cost").text())
            shipCod = Number($("#ship-cod .cost").text())
            freeShip = Number($("#voucher-free-ship .ship").text())
            order = Number($("#voucher-order .order").text())
            Number($("#total-cost-voucher .total").text(tong + shipCod - freeShip - order))
            $.ajax({
                type: "POST",
                url: "templates/request.php",
                dataType: "json",
                data: {
                    request: "update_qty_product_cart",
                    idUser: idUser,
                    idSP: idSP,
                    qty: val,
                },
                success: function () {
                    window.location.reload()
                }
            })
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
            idUser = $(this).data("user")

            tong = Number($("#total-cost .cost").text())
            shipCod = Number($("#ship-cod .cost").text())
            freeShip = Number($("#voucher-free-ship .ship").text())
            order = Number($("#voucher-order .order").text())
            Number($("#total-cost-voucher .total").text(tong + shipCod - freeShip - order))

            $.ajax({
                type: "POST",
                url: "templates/request.php",
                dataType: "json",
                data: {
                    request: "delete_product_cart",
                    idSP: idSP,
                    idUser: idUser
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
            idUser = $(this).data("user")
            $.ajax({
                type: "POST",
                url: "templates/request.php",
                dataType: "json",
                data: {
                    request: "delete_cart",
                    idUser: idUser
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
        idUser = $(this).data("user")
        voucherShip = $(this).data("voucher-ship")
        voucherOrder = $(this).data("voucher-order")
        idKMShip = $(this).data("id-voucher-ship")
        idKMOrder = $(this).data("id-voucher-order")

        familyName = $("#last").val()
        name = $("#first").val()
        phoneNumber = $("#phone-number").val()
        homeNumber = $("#home-number").val()

        province = $("#province option:selected").text()
        district = $("#district option:selected").text()
        ward = $("#ward option:selected").text()
        message = $("#message").val()

        thanhTien = $("#total-cost-checkout").text()

        if (name.trim() === "" || familyName.trim() === "" || phoneNumber.trim() === "" || homeNumber.trim() === "") {
            alert("Yêu cầu điền đầy đủ thông tin đơn hàng!")
            return;
        }

        if (province === "Chọn Nơi" || district === "Chọn Nơi" || ward === "Chọn Nơi") {
            alert("Yêu cầu điền đầy đủ thông tin đơn hàng!")
            return;
        }

        $.ajax({
            type: "POST",
            url: "templates/request.php",
            dataType: "json",
            data: {
                request: "insert_order",
                idUser: idUser,
                hoTen: `${familyName} ${name}`,
                sdt: phoneNumber,
                diaChi: `${homeNumber}, ${ward}, ${district}, ${province}`,
                ship: voucherShip,
                giamGia: voucherOrder,
                ghiChu: message,
                tongTien: thanhTien
            },
            success: function (response) {
                $.ajax({
                    type: "POST",
                    url: "templates/request.php",
                    dataType: "json",
                    data: {
                        request: "insert_detail_order",
                        idUser: idUser
                    },
                    success: function (response) {
                    },
                })

                if (voucherShip !== 0) {
                    $.ajax({
                        type: "POST",
                        url: "templates/request.php",
                        dataType: "json",
                        data: {
                            request: "update_qty_voucher",
                            idVoucher: idKMShip
                        },
                        success: function (response) {
                        },
                    })
                }

                if (voucherOrder !== 0) {
                    $.ajax({
                        type: "POST",
                        url: "templates/request.php",
                        dataType: "json",
                        data: {
                            request: "update_qty_voucher",
                            idVoucher: idKMOrder
                        },
                        success: function (response) {
                        },
                    })
                }

                alert("Mua hàng thành công")
                window.location.href = "confirmation.php"
            },
            error: function (e) {
                console.log("🚀 ~ file: cart.js:389 ~ e", e)

            }
        })
    })
})


