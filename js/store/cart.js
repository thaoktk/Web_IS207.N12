

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
})