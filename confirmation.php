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
session_start();
include "./templates/connect.php"; 
$idUser = isset($_SESSION['current-user']) ? $_SESSION['current-user']['MaND'] : null;

$resultOrder = mysqli_query($connect, "SELECT * FROM `donhang` WHERE MaND = $idUser order by NgayLap DESC limit 1");
$resultOrder = $resultOrder->fetch_array();

$resultSP = mysqli_query($connect, "SELECT * FROM `chitietdonhang` WHERE MaDH = $resultOrder[0]");

include("templates/header.php");
?>

	<!-- Start Banner Area -->
	<section class="banner-area organic-breadcrumb">
		<div class="container">
			<div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
				<div class="col-first">
					<h1>Thông tin đơn hàng</h1>
					<nav class="d-flex align-items-center">
						<a href="index.php">Trang chủ<span class="lnr lnr-arrow-right"></span></a>
						<a href="#">Đơn hàng</a>
					</nav>
				</div>
			</div>
		</div>
	</section>
	<!-- End Banner Area -->

	<!--================Order Details Area =================-->
	<section class="order_details section_gap">
		<?php
		if ($resultOrder) {
		?>
		<div class="container">
			<h3 class="title_confirmation">Cảm ơn bạn. Đơn hàng của bạn đang được chuyển đi.</h3>
			<div class="row order_d_inner">
				<div class="col-lg-4">
					<div class="details_item">
						<h4>Thông tin đơn hàng</h4>
						<ul class="list">
							<li><span class="mr-3">Mã đơn: </span><?=$resultOrder[0]?></li>
							<li><span class="mr-3">Ngày đặt: </span><?=$resultOrder[2]?></li>
							<li><span class="mr-3">Tổng tiền: </span><?=number_format($resultOrder[9])?> VNĐ</li>
							<li><span class="mr-3">Tiền vận chuyển: </span> 50,000 VNĐ</li>
						</ul>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="details_item">
						<h4>Địa chỉ đơn hàng</h4>
						<ul class="list">
							<li><span class="mr-3">Người nhận: </span><?=$resultOrder[3]?></li>
							<li><span class="mr-3">Số điện thoại: </span><?=$resultOrder[4]?></li>
							<li><span class="mr-3">Địa chỉ: </span><?=$resultOrder[5]?></li>
							<li><span class="mr-3">Thanh toán: </span> Trực tiếp</li>
						</ul>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="details_item">
						<h4>Địa chỉ shop</h4>
						<ul class="list">
							<li><span class="mr-3">Số nhà: </span> 143 Hẻm 6</li>
							<li><span class="mr-3">Đường: </span> Hàn Thuyên</li>
							<li><span class="mr-3">Phường: </span> Linh Trung</li>
							<li><span class="mr-3">Thành phố: </span> Thủ Đức</li>
						</ul>
					</div>
				</div>
				
			</div>
			<div class="order_details_table">
				<h2>Chi tiết đơn hàng</h2>
				<div class="table-responsive">
					<table class="table">
						<thead>
							<tr>
								<th scope="col">Hình ảnh</th>
								<th scope="col">Sản phẩm</th>
								<th scope="col">Số lượng</th>
								<th scope="col">Giá tiền</th>
							</tr>
						</thead>
						<tbody>
							<?php
							while ($row = mysqli_fetch_array($resultSP)) {
								$resultChiTietSP = mysqli_query($connect, "SELECT * FROM `sanpham` WHERE MaSP = $row[1]");
								$resultChiTietSP = $resultChiTietSP->fetch_array();
								echo "<tr>
								<td>
									<img class='img-fluid' src='$resultChiTietSP[10]' style='width: 100px; height: 50px; object-fit: contain; background: white; padding: 3px'/>
								</td>
								<td>
									<p>$resultChiTietSP[2]</p>
								</td>
								<td>
									<h5>x $row[3]</h5>
								</td>
								<td>
									<p>". number_format($row[2]) ." VNĐ</p>
								</td>
							</tr>";
							}
							?>
							<tr>
								<td>
									<h4>Giảm giá vận chuyển</h4>
								</td>
								<td>
								</td>
								<td>
									<h5></h5>
								</td>
								<td>
									<p><?=number_format($resultOrder[6])?> VNĐ</p>
								</td>
							</tr>
							<tr>
								<td>
									<h4>Giảm giá đơn hàng</h4>
								</td>
								<td>
								</td>
								<td>
									<h5></h5>
								</td>
								<td>
									<p><?=number_format($resultOrder[7])?> VNĐ</p>
								</td>
							</tr>
							<tr>
								<td>
									<h4>Thành tiền</h4>
								</td>
								<td>
								</td>
								<td>
									<h5></h5>
								</td>
								<td>
									<p><?=number_format($resultOrder[9])?> VNĐ</p>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>

			<div class="mt-5 checkout_btn_inner d-flex align-items-center justify-content-center">
				<a class="gray_btn btn" href="index.php">Quay về trang chủ</a>
			</div>
		</div>
		<?php } else {?>
			<div>
				<p class="text-center">Bạn chưa đặt hàng! Hãy chọn mua và quay lại sau nhé</p>
				<a class="mt-5 gray_btn btn" href="category.php">Tiếp tục shopping</a>
			</div>
		<?php }?>		
	</section>
	<!--================End Order Details Area =================-->

	<?php include("./templates/footer.php")?>


	<script src="js/vendor/jquery-2.2.4.min.js"></script>
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
</body>

</html>