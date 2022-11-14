<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/phone/logo.png">
    <!-- Author Meta -->
    <meta name="author" content="CodePixar">
    <!-- Meta Description -->
    <meta name="description" content="">
    <!-- Meta Keyword -->
    <meta name="keywords" content="">
    <!-- meta character set -->
    <meta charset="UTF-8">
    <!-- Site Title -->
    <title>3TN - Apple Shop</title>

    <!--
            CSS
            ============================================= -->
    <link rel="stylesheet" href="css/linearicons.css">
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/themify-icons.css">
    <link rel="stylesheet" href="css/nice-select.css">
    <link rel="stylesheet" href="css/nouislider.min.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/main.css">

</head>

<body>

    <?php include("./templates/header.php")?>

    <!-- Start Banner Area -->
    <section class="banner-area organic-breadcrumb">
        <div class="container">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                <div class="col-first">
                    <h1>Giỏ hàng</h1>
                    <nav class="d-flex align-items-center">
                        <a href="index.php">Trang chủ<span class="lnr lnr-arrow-right"></span></a>
                        <a href="#">Giỏ hàng</a>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Area -->

    <!--================Cart Area =================-->
    <section class="cart_area">
        <div class="container">
            <div class="cart_inner">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Sản phẩm</th>
                                <th scope="col"></th>
                                <th scope="col">Giá</th>
                                <th scope="col">Số lượng</th>
                                <th scope="col">Tổng tiền</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="media">
                                        <div class="d-flex">
                                            <img src="img/orange.png" with="200" height="100" alt="">
                                        </div>
                                        <div class="media-body">
                                            <p>Iphone 14 Pro Max</p>
                                            <p>Trắng, 256GB</p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <button class="btn-delete ml-3 genric-btn default-border small">Xóa</button>
                                </td>
                                <td>
                                    <h5 class="product-price">$ <span>360.00</span></h5>
                                </td>
                                <td>
                                    <div class="product_count">
                                        <input type="text" name="qty" data-id="1" value="1" title="Quantity:" class="input-text qty">
                                        <button class="increase items-count" data-id="1" type="button"><i class="lnr lnr-chevron-up"></i></button>
                                        <button class="reduced items-count" data-id="1" type="button"><i class="lnr lnr-chevron-down"></i></button>
                                    </div>
                                </td>
                                <td>
                                    <h5 class="product-cost">$<span>360</span></h5>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="media">
                                        <div class="d-flex">
                                            <img src="img/orange.png" with="200" height="100" alt="">
                                        </div>
                                        <div class="media-body">
                                            <p>MacBook Pro 2021</p>
                                            <p>Trắng, 256GB</p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <button class="btn-delete ml-3 genric-btn default-border small">Xóa</button>
                                </td>
                                <td>
                                    <h5 class="product-price">$ <span>360.00</span></h5>
                                </td>
                                <td>
                                    <div class="product_count">
                                        <input type="text" name="qty" data-id="2" maxlength="12" value="1" title="Quantity:" class="input-text qty">
                                        <button class="increase items-count" data-id="2" type="button"><i class="lnr lnr-chevron-up"></i></button>
                                        <button class="reduced items-count" data-id="2" type="button"><i class="lnr lnr-chevron-down"></i></button>
                                    </div>
                                </td>
                                <td>
                                    <h5 class="product-cost">$<span>360</span></h5>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="media">
                                        <div class="d-flex">
                                            <img src="img/orange.png" with="200" height="100" alt="">
                                        </div>
                                        <div class="media-body">
                                            <p>Ipad Mini 2020</p>
                                            <p>Trắng, 256GB</p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <button class="btn-delete ml-3 genric-btn default-border small">Xóa</button>
                                </td>
                                <td>
                                    <h5 class="product-price">$ <span>360.00</span></h5>
                                </td>
                                <td>
                                    <div class="product_count">
                                        <input type="text" name="qty" data-id="3" value="1" title="Quantity:" class="input-text qty">
                                        <button class="increase items-count" data-id="3" type="button"><i class="lnr lnr-chevron-up"></i></button>
                                        <button class="reduced items-count" data-id="3" type="button"><i class="lnr lnr-chevron-down"></i></button>
                                    </div>
                                </td>
                                <td>
                                    <h5 class="product-cost">$<span>360</span></h5>
                                </td>
                            </tr>
                            <tr class="bottom_button">
                                <td>
                                    <a class="gray_btn">Xóa hết</a>
                                </td>
                                <td>
                                </td>
                                <td>
                                </td>
                                <td>
                                </td>
                                <td>
                                    <div class="cupon_text d-flex align-items-center">
                                        <input type="text" placeholder="Mã giảm giá">
                                        <a class="primary-btn">Dùng</a>
                                        <a class="gray_btn">Xóa</a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>

                                </td>
                                <td>

                                </td>
                                <td>
                                    <h5>Tổng tiền</h5>
                                </td>
                                <td>
                                    <h5 id="total-cost">$<span>2160</span></h5>
                                </td>
                            </tr>
                            <tr class="out_button_area">
                                <td>

                                </td>
                                <td>

                                </td>
                                <td>

                                </td>
                                <td>
                                    <div class="checkout_btn_inner d-flex align-items-center">
                                        <a class="gray_btn" href="#">Tiếp tục shopping</a>
                                        <a class="primary-btn" href="checkout.php">Đi đến thanh toán</a>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <!--================End Cart Area =================-->

    <?php include("./templates/footer.php")?>
    
    <script src="js/vendor/jquery-2.2.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.26.1/axios.min.js" integrity="sha512-bPh3uwgU5qEMipS/VOmRqynnMXGGSRv+72H/N260MQeXZIK4PG48401Bsby9Nq5P5fz7hy5UGNmC/W1Z51h2GQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="js/vendor/bootstrap.min.js"></script>
    <script src="js/jquery.ajaxchimp.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    <script src="js/nouislider.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <!--gmaps Js-->
    <script src="js/main.js"></script>
    <script src="js/store/common.js"></script>
    <script src="js/store/cart.js"></script>
</body>

</html>