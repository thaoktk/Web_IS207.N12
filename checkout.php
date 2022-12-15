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
    <link rel="stylesheet" href="css/themify-icons.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/nice-select.css">
    <link rel="stylesheet" href="css/nouislider.min.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/main.css">
</head>

<body>

    <?php
    include "templates/connect.php"; 
    include "templates/product.php";
    session_start();
    $total = 0;
    $products = array();
    $idUser = isset($_SESSION['current-user']) ? $_SESSION['current-user']['MaND'] : null;

    $resultGioHang = mysqli_query($connect, "SELECT * FROM giohang where MaND = $idUser");

    while ($rowGioHang = mysqli_fetch_array($resultGioHang)) {
        $resultSP = mysqli_query($connect, "SELECT * FROM sanpham where MaSP = $rowGioHang[1]");
        $resultSP = mysqli_fetch_array($resultSP);

        $products[] = array(
            "maSP"=>$resultSP[0],
            "hinhAnh"=>$resultSP[10],
            "tenSP"=>$resultSP[2],
            "gia"=>$resultSP[8],
            "soLuong"=>$rowGioHang[2],
            "soLuongSan"=>$resultSP[9],
        );
    }

    $voucherFreeShip = isset($_SESSION["free-ship"]) ? $_SESSION["free-ship"] : null;
    $voucherOrder = isset($_SESSION["order"]) ? $_SESSION["order"] : null;

    $resultKMOrder = 0;
    $resultKMFreeShip = 0;
    $idKMFreeShip = '';
    $idKMOrder = '';

    if (isset($_SESSION["order"])) {
        $KMOrder = mysqli_query($connect, "SELECT MaKM, GiaTriKM from khuyenmai WHERE CodeKM = '".$_SESSION["order"]."'");
        $KMOrder = $KMOrder->fetch_row();
        $resultKMOrder = $KMOrder[1];
        $idKMOrder = $KMOrder[0];
    }

    if (isset($_SESSION["free-ship"])) {
        $KMFreeShip = mysqli_query($connect, "SELECT MaKM, GiaTriKM from khuyenmai WHERE CodeKM = '".$_SESSION["free-ship"]."'");
        $KMFreeShip = $KMFreeShip->fetch_row();
        $resultKMFreeShip = $KMFreeShip[1];
        $idKMFreeShip = $KMFreeShip[0];
    }
    
    include("templates/header.php");
    ?>

    <!-- Start Banner Area -->
    <section class="banner-area organic-breadcrumb">
        <div class="container">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                <div class="col-first">
                    <h1>Thủ tục thanh toán</h1>
                    <nav class="d-flex align-items-center">
                        <a href="index.php">Trang chủ<span class="lnr lnr-arrow-right"></span></a>
                        <a href="#">Thanh toán</a>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Area -->

    <!--================Checkout Area =================-->
    <section class="checkout_area section_gap">
        <div class="container">
            <div class="billing_details">
                <div class="row">
                    <div class="col-lg-8">
                        <h3>Nhập chi tiết đơn hàng</h3>
                        <form class="row contact_form">
                            <div class="col-md-6 form-group p_star">
                                <input type="text" class="form-control" id="last" name="family-name" required placeholder="Họ">
                            </div>
                            <div class="col-md-6 form-group p_star">
                                <input type="text" class="form-control" id="first" name="name" required placeholder="Tên">
                            </div>
                            <div class="col-md-6 form-group p_star">
                                <input type="number" class="form-control" id="phone-number" name="number" placeholder="Số điện thoại">
                            </div>
                            <div class="col-md-12 form-group shipping_box">
                                <p class="text-left">Địa chỉ</p>
                                <select name="" id="province" class="shipping_select">
                                </select>
                                <select name="" id="district" class="shipping_select">
                                    <option disabled  value="">Chọn Quận</option>
                                </select>
                                <select name="" id="ward" class="shipping_select">
                                    <option  disabled value="">Chọn Phường</option>
                                </select>
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <input type="text" class="form-control" id="home-number" name="home-number" required placeholder="Số nhà">
                            </div>
                            <div class="col-md-12 form-group">
                                <textarea class="form-control" name="message" id="message" rows="1" placeholder="Ghi chú thêm cho đơn hàng"></textarea>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-4">
                        <div class="order_box">
                            <h2>Đơn hàng của bạn</h2>
                            <?php
                            if (!empty($products)) {
                            ?>
                            <div>
                                <ul class="list">
                                    <li><a href="#">Sản phẩm <span>Giá</span></a></li>
                                    <?php
                                    if (!empty($products)) {
                                        foreach ($products as $row) {
                                            $total += $row['gia'] * $row['soLuong'];
                                            echo "<li>
                                            <a style='display: flex; border-bottom: 1px solid #ccc'>
                                            <span class='product-buy-checkout'>". $row['tenSP'] ."</span>
                                            <span class='middle'>x ". $row['soLuong'] ."</span>
                                             <span class='last'>". $row["gia"] ."</span>
                                             <span> VNĐ</span>
                                             </a>
                                             </li>";
                                        }
                                    }
                                    ?>
                                </ul>
                                <ul class="list list_2">
                                    <li><a class="d-flex justify-content-between">
                                        <span>Tổng</span> 
                                        <div>
                                            <span id="total-checkout"><?=$total?></span>
                                            <span>VNĐ</span> 
                                        </div>
                                    </a></li>
                                    <li><a class="d-flex justify-content-between">
                                        <?php if (isset($_SESSION["free-ship"])) {?>
                                            <span>Vận chuyển</span>
                                            <?php if (isset($_SESSION["free-ship"])) {?>
                                            <div>
                                            <span id="ship-checkout"><?=$resultKMFreeShip?></span>
                                            <span>VNĐ</span> 
                                            </div>
                                            <?php }?>
                                            <?php }?>
                                        </a></li>
                                        <li><a class="d-flex justify-content-between">
                                        <?php if (isset($_SESSION["order"])) {?>
                                            <span>Đơn hàng</span>
                                            <?php if (isset($_SESSION["order"])) {?>
                                            <div>
                                            <span id="order-checkout"><?=$resultKMOrder?></span>
                                            <span>VNĐ</span> 
                                            </div>
                                            <?php }?>
                                            <?php }?>
                                        </a></li>
                                    <li><a class="d-flex justify-content-between">
                                        <span>Thành tiền </span>
                                        <?php if (isset($_SESSION["free-ship"]) || isset($_SESSION["order"])) {
                                                ?>
                                            <div>
                                            <span id="total-cost-checkout">0</span>
                                            <span>VNĐ</span> 
                                            </div>
                                            <?php }?>
                                    </a></li>
                                </ul>
                                <a 
                                class="primary-btn btn-checkout" 
                                data-user='<?=$idUser?>' 
                                data-voucher-ship='<?=$resultKMFreeShip?>'
                                data-voucher-order='<?=$resultKMOrder?>'
                                data-id-voucher-ship='<?=$idKMFreeShip?>'
                                data-id-voucher-order='<?=$idKMOrder?>'
                                >
                                Thanh toán
                                </a>
                            </div>

                            <?php } else { ?>
                                <h3 class="mt-5 text-center">Bạn chưa có sản phẩm nào trong giỏ hàng!</h3>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Checkout Area =================-->

    <?php include("./templates/footer.php")?>


    <script src="js/vendor/jquery-2.2.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.26.1/axios.min.js" integrity="sha512-bPh3uwgU5qEMipS/VOmRqynnMXGGSRv+72H/N260MQeXZIK4PG48401Bsby9Nq5P5fz7hy5UGNmC/W1Z51h2GQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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