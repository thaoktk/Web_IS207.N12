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

    <?php
    include "./templates/connect.php"; 
    include "./templates/product.php";
    session_start();
    if (!isset($_SESSION["cart"])) {
        $_SESSION["cart"] = array();
    }

    if (!empty($_SESSION["cart"])) {
        $products = mysqli_query($connect, "SELECT * FROM `sanpham` WHERE `MaSP` IN (" . implode(",", array_keys($_SESSION["cart"])) . ")");
    }
    ?>
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
                            <?php
                            if (!empty($products)) {
                                $total = 0;
                                $num = 1;
                                while ($row = mysqli_fetch_array($products)) {
                                    $total += $row[6] * $_SESSION["cart"][$row[0]];
                                    echo "<tr>
                                    <td>
                                        <div class='media'>
                                            <div class='d-flex'>
                                                <img src='$row[8]' class='img-product' >
                                            </div>
                                            <div class='media-body'>
                                                <p>$row[2]</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <button class='btn-delete ml-3 genric-btn default-border small'>Xóa</button>
                                    </td>
                                    <td>
                                        <h5 class='product-price'><span>". number_format(($row[6])) ." VNĐ</span></h5>
                                    </td>
                                    <td>
                                        <div class='product_count'>
                                            <input type='text' name='qty' data-id='1' value='". $_SESSION['cart'][$row[0]] ."' title='Số lượng mua:' class='input-text qty'>
                                            <button class='increase items-count' data-id='1' type='button'><i class='lnr lnr-chevron-up'></i></button>
                                            <button class='reduced items-count' data-id='1' type='button'><i class='lnr lnr-chevron-down'></i></button>
                                        </div>
                                    </td>
                                    <td>
                                        <h5 class='product-cost'><span>". number_format($row[6] * $_SESSION["cart"][$row[0]]) ." VNĐ</span></h5>
                                    </td>
                                </tr>";
                                }
                            }
                            ?>
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
                                    <div class="cupon_text d-flex align-items-center justify-content-end">
                                        <input type="text" placeholder="Mã giảm giá">
                                        <a class="primary-btn">Dùng</a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>

                                </td>
                                <td>

                                </td>
                                <td>

                                </td>
                                <td>
                                    <h5>Tổng tiền</h5>
                                </td>
                                <td>

                                    <h5 id="total-cost"><span><?=number_format($total)?></span> VNĐ</h5>
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

    	<!-- Start related-product Area -->
	<section class="related-product-area section_gap_bottom">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-6 text-center">
					<div class="section-title">
						<h1>Voucher hiện có</h1>
						<p>Có lẽ bạn sẽ cần đó nha. Nhanh tay nào, số lượng có hạn!</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-6">
					<h4 class="text-center">Voucher free ship</h4>
					<div class="mt-4 row">
					<?php 
						while($row=$list_VoucherFreeShip->fetch_row())  {
							echo "<div class='col-lg-4 col-md-4 col-sm-6 mb-20'>
							<div class='single-related-product d-flex'>
								<div class='desc'>
									<div class='d-flex'>
										<h5 class='text-primary'>$row[1]</h5>
										<button type='button' class='mx-4 copy-btn'>Copy</button>
									</div>
									<div class='price'>
										<h6 class='cost'>Số lượng: $row[4]</h6>
										<h6>Trị giá: <span class='text-warning'>$row[3]</span> VNĐ</h6>
									</div>
								</div>
							</div>
						</div>";
						}
						?>
					</div>
				</div>
				<div class="col-lg-6">
				<h4 class="text-center">Voucher giảm giá</h4>
						<div class="mt-4 row">
					<?php 
						while($row=$list_VoucherDiscount->fetch_row())  {
							echo "<div class='col-lg-4 col-md-4 col-sm-6 mb-20'>
							<div class='single-related-product d-flex'>
								<div class='desc'>
									<div class='d-flex'>
										<h5 class='text-primary'>$row[1]</h5>
										<button type='button' class='mx-4 copy-btn'>Copy</button>
									</div>
									<div class='price'>
										<h6 class='cost'>Số lượng: $row[4]</h6>
										<h6>Trị giá: <span class='text-warning'>$row[3]</span> VNĐ</h6>
									</div>
								</div>
							</div>
						</div>";
						}
						?>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End related-product Area -->

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