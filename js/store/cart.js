

$(document).ready(function () {
    // quantity and cost
    $(".increase").click(function () {
        result = $(`.input-text.qty[data-id='${$(this).data("id")}']`);
        qty = result.val();
        qty++;
        result.val(qty)

        price = parseFloat($(this).closest("tr").find(".product-price span").text())
        $(this).closest("tr").find(".product-cost span").text(price * qty)

        totalCost = 0;
        $(".product-cost span").each(function () {
            cost = parseFloat($(this).text())
            totalCost += cost
        })
        $("#total-cost span").text(totalCost)
    })

    $(".reduced").click(function () {
        result = $(`.input-text.qty[data-id='${$(this).data("id")}']`);
        qty = result.val();
        qty--;
        if (qty <= 0) {
            qty = 1
        }
        result.val(qty)

        price = parseFloat($(this).closest("tr").find(".product-price span").text())
        $(this).closest("tr").find(".product-cost span").text(price * qty)

        totalCost = 0;
        $(".product-cost span").each(function () {
            cost = parseFloat($(this).text())
            totalCost += cost
        })
        $("#total-cost span").text(totalCost)
    })

    $('.btn-delete').click(function () {
        $(this).parent().parent().remove()

        totalCost = 0;
        $(".product-cost span").each(function () {
            cost = parseFloat($(this).text())
            totalCost += cost
        })
        $("#total-cost span").text(totalCost)
    })

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

})


