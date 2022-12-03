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
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/themify-icons.css">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/owl.carousel.css">
	<link rel="stylesheet" href="css/nice-select.css">
	<link rel="stylesheet" href="css/nouislider.min.css">
	<link rel="stylesheet" href="css/ion.rangeSlider.css" />
	<link rel="stylesheet" href="css/ion.rangeSlider.skinFlat.css" />
	<link rel="stylesheet" href="css/magnific-popup.css">
	<link rel="stylesheet" href="css/main.css">
</head>

<body>

<?php include("./templates/product.php")?>
<?php 
	session_start(); 
	include("./templates/header.php");
	$idUser = isset($_SESSION['current-user']) ? $_SESSION['current-user']['MaND'] : null;
?>

	<!-- start banner Area -->
	<section class="banner-area">
		<div class="container">
			<div class="row fullscreen align-items-center justify-content-start">
				<div class="col-lg-12">
					<div class="active-banner-slider owl-carousel">
						<!-- single-slide -->
						<div class="row single-slide align-items-center d-flex">
							<div class="col-lg-5 col-md-6">
								<div class="banner-content">
									<h1>Bộ sưu tập Iphone 14 mới</h1>
									<p>Một bước tiến nhảy vọt. Khẳng định lại vị thế. Nâng tầm giá trị sống.</p>
									<div class="add-bag d-flex align-items-center">
										<a class="add-btn" href="category.php"><span class="lnr lnr-cross"></span></a>
										<span class="add-text text-uppercase">Tìm hiểu thêm</span>
									</div>
								</div>
							</div>
							<div class="col-lg-7">
								<div class="banner-img">
									<img class="img-fluid" src="img/banner/iphone_14.png" alt="">
								</div>
							</div>
						</div>
						<!-- single-slide -->
						<div class="row single-slide">
							<div class="col-lg-5">
								<div class="banner-content">
									<h1>Bộ sưu tập Iphone 14 mới</h1>
									<p>Một bước tiến nhảy vọt. Khẳng định lại vị thế. Nâng tầm giá trị sống.</p>
									<div class="add-bag d-flex align-items-center">
										<a class="add-btn" href="category.php"><span class="lnr lnr-cross"></span></a>
										<span class="add-text text-uppercase">Tìm hiểu thêm</span>
									</div>
								</div>
							</div>
							<div class="col-lg-7">
								<div class="banner-img">
									<img class="img-fluid" src="img/banner/iphone_14_2.png" alt="">
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End banner Area -->

	<!-- start features Area -->
	<section class="features-area section_gap">
		<div class="container">
			<div class="row features-inner">
				<!-- single features -->
				<div class="col-lg-3 col-md-6 col-sm-6">
					<div class="single-features">
						<div class="f-icon">
							<img src="img/features/f-icon1.png" alt="">
						</div>
						<h6>Vận chuyển toàn quốc</h6>
						<p>Hỗ trợ mọi vùng miền</p>
					</div>
				</div>
				<!-- single features -->
				<div class="col-lg-3 col-md-6 col-sm-6">
					<div class="single-features">
						<div class="f-icon">
							<img src="img/features/f-icon2.png" alt="">
						</div>
						<h6>Chính sách hoàn tiền</h6>
						<p>Hoàn tiền nếu có lỗi</p>
					</div>
				</div>
				<!-- single features -->
				<div class="col-lg-3 col-md-6 col-sm-6">
					<div class="single-features">
						<div class="f-icon">
							<img src="img/features/f-icon3.png" alt="">
						</div>
						<h6>Hỗ trợ 24/7</h6>
						<p>Luôn có mặt khi bạn cần</p>
					</div>
				</div>
				<!-- single features -->
				<div class="col-lg-3 col-md-6 col-sm-6">
					<div class="single-features">
						<div class="f-icon">
							<img src="img/features/f-icon4.png" alt="">
						</div>
						<h6>Bảo mật thanh toán</h6>
						<p>Thông tin luôn được giữ kín</p>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- end features Area -->

	<!-- Start category Area -->
	<section class="category-area">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-8 col-md-12">
					<div class="row">
						<div class="col-lg-8 col-md-8">
							<div class="single-deal bg-dark">
								<div class="overlay"></div>
								<img class="img-fluid w-100" src="img/category/iphone.png" alt="">
								<a href="category.php" class="img-pop-up" target="_blank">
									<div class="deal-details">
										<h6 class="deal-title">Iphone 14 Series</h6>
									</div>
								</a>
							</div>
						</div>
						<div class="col-lg-4 col-md-4">
							<div class="single-deal bg-dark">
								<div class="overlay"></div>
								<img class="img-fluid w-100" src="img/category/macbook.png" alt="">
								<a href="category.php" class="img-pop-up" target="_blank">
									<div class="deal-details">
										<h6 class="deal-title">MacBook Air Series</h6>
									</div>
								</a>
							</div>
						</div>
						<div class="col-lg-4 col-md-4">
							<div class="single-deal bg-dark">
								<div class="overlay"></div>
								<img class="img-fluid w-100" src="img/category/ipads.jpg" alt="">
								<a href="category.php" class="img-pop-up" target="_blank">
									<div class="deal-details">
										<h6 class="deal-title">Ipad Series</h6>
									</div>
								</a>
							</div>
						</div>
						<div class="col-lg-8 col-md-8">
							<div class="single-deal bg-dark">
								<div class="overlay"></div>
								<img class="img-fluid w-100" src="img/category/airpods.png" alt="">
								<a href="category.php" class="img-pop-up" target="_blank">
									<div class="deal-details">
										<h6 class="deal-title">AirPods Series</h6>
									</div>
								</a>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6">
					<div class="single-deal bg-dark">
						<div class="overlay"></div>
						<img class="img-fluid img-fluid-last w-100" src="img/category/watch.png" alt="">
						<a href="category.php" class="img-pop-up" target="_blank">
							<div class="deal-details">
								<h6 class="deal-title">Apple Watch</h6>
							</div>
						</a>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End category Area -->

	<!-- start product Area -->
	<section class="owl-carousel active-product-area section_gap">
		<!-- single product slide -->
		<div class="single-product-slider">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-lg-6 text-center">
						<div class="section-title">
							<h1>Sản phẩm mới</h1>
							<p>Những sản phẩm mới nhất của cửa hàng chúng tôi.</p>
						</div>
					</div>
				</div>
				<div class="row">
					<?php
					while($row=$list_new->fetch_row())
					{
						$rating = addStar($row[15], $row[14]);
						echo "<div class='col-lg-3 col-md-6'>
							<div class='single-product'>
								<img class='img-fluid' src='$row[10]' alt=''>
								<div class='product-details'>
									<h6 class='name'>$row[2]</h6>
									<div class='price'>
										<h6 class='cost'>". number_format($row[8]) ." VNĐ</h6>
										<h6 class='l-through'>". number_format($row[7]) ." VNĐ</h6>
									</div>
									<div class='mt-2 d-flex align-items-center'>
										<div>". $rating ."</div>
										<span class='ml-2'>". $row[15] ." đánh giá</span>
									</div>
									<div class='prd-bottom'>
										<a class='social-info add-fav-btn' data-product='$row[0]' data-user='$idUser'>
											<span class='lnr lnr-heart'></span>
											<p class='hover-text'>Yêu thích</p>
										</a>
										<a href='single-product.php?idSP=$row[0]' class='social-info'>
											<span class='lnr lnr-move'></span>
											<p class='hover-text'>Chi tiết</p>
										</a>
									</div>
								</div>
							</div>
						</div>";
					}?>
				</div>
			</div>
		</div>
		<!-- single product slide -->
		<div class="single-product-slider">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-lg-6 text-center">
						<div class="section-title">
							<h1>Sản phẩm hot</h1>
							<p>Những sản phẩm bán chạy nhất tại cửa hàng chúng tôi</p>
						</div>
					</div>
				</div>
				<div class="row">
					<?php
					while($row=$list_hot->fetch_row())
					{
						$rating = addStar($row[15], $row[14]);
						echo "<div class='col-lg-3 col-md-6'>
							<div class='single-product'>
								<img class='img-fluid' src='$row[10]' alt=''>
								<div class='product-details'>
									<h6 class='name'>$row[2]</h6>
									<div class='price'>
										<h6 class='cost'>". number_format($row[8]) ." VNĐ</h6>
										<h6 class='l-through'>". number_format($row[7]) ." VNĐ</h6>
									</div>
									<div class='mt-2 d-flex align-items-center'>
										<div>". $rating ."</div>
										<span class='ml-2'>". $row[15] ." đánh giá</span>
									</div>
									<div class='prd-bottom'>
										<a class='social-info add-fav-btn' data-product='$row[0]' data-user='$idUser'>
											<span class='lnr lnr-heart'></span>
											<p class='hover-text'>Yêu thích</p>
										</a>
										<a href='single-product.php?idSP=$row[0]' class='social-info'>
											<span class='lnr lnr-move'></span>
											<p class='hover-text'>Chi tiết</p>
										</a>
									</div>
								</div>
							</div>
						</div>";
					}?>
				</div>
			</div>
		</div>
	</section>
	<!-- end product Area -->

	<!-- Start exclusive deal Area -->
	<section class="exclusive-deal-area">
		<div class="container-fluid">
			<div class="row justify-content-center align-items-center">
				<div class="col-lg-6 no-padding exclusive-left">
					<div class="row clock_sec clockdiv" id="clockdiv">
						<div class="col-lg-12">
							<h1>Đếm ngược ngày đến deal Hot!</h1>
							<p>Điều hấp dẫn gì sẽ xảy ra?</p>
						</div>
						<div class="col-lg-12">
							<div class="row clock-wrap">
								<div class="col clockinner1 clockinner">
									<h1 class="days">150</h1>
									<span class="smalltext">Ngày</span>
								</div>
								<div class="col clockinner clockinner1">
									<h1 class="hours">23</h1>
									<span class="smalltext">Giờ</span>
								</div>
								<div class="col clockinner clockinner1">
									<h1 class="minutes">47</h1>
									<span class="smalltext">Phút</span>
								</div>
								<div class="col clockinner clockinner1">
									<h1 class="seconds">59</h1>
									<span class="smalltext">Giây</span>
								</div>
							</div>
						</div>
					</div>
					<a href="" class="primary-btn">Khám phá</a>
				</div>
				<div class="col-lg-6 no-padding exclusive-right">
					<div class="active-exclusive-product-slider">
					<?php 
					while($row=$list_dealHot->fetch_row()) { 
						$rating = addStar($row[15], $row[14]);
						echo "<div class='single-exclusive-slider'>
						<img class='img-fluid' src=". $row[10] ." alt=''>
						<div class='product-details'>
							<div class='price'>
								<h6 class='cost'>". number_format($row[8]) ." VNĐ</h6>
								<h6 class='l-through'>". number_format($row[7]) ." VNĐ</h6>
							</div>
							<h4>". $row[2] ."</h4>
							<div class='mt-2 w-100 d-flex align-items-center justify-content-center'>
									<div>". $rating ."</div>
									<span class='ml-2'>". $row[15] ." đánh giá</span>
							</div>
							<div class='add-bag d-flex align-items-center justify-content-center'>
								<a href='single-product.php?idSP=$row[0]' class='social-info add-btn'><span class='lnr lnr-move'></span></a>
								<span class='add-text text-uppercase'>Chi tiết</span>
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
	<!-- End exclusive deal Area -->

	<!-- Start related-product Area -->
	<section class="mt-5 related-product-area section_gap_bottom">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-6 text-center">
					<div class="section-title">
						<h1>Deal hot của tuần</h1>
						<p>Tham khảo một số deal hot trong tuần qua của chúng tôi.</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-9">
					<div class="row">
					<?php 
						while($row=$list_dealHot2->fetch_row())  {
							echo "<div class='col-lg-4 col-md-4 col-sm-6 mb-20'>
							<div class='single-related-product d-flex'>
								<a href='single-product.php?idSP=$row[0]'><img src=". $row[10] ." alt=''></a>
								<div class='desc'>
									<a href='single-product.php?idSP=$row[0]' class='title'>". $row[2] ."</a>
									<div class='price'>
										<h6 class='cost'>". number_format($row[8]) ." VNĐ</h6>
										<h6 class='l-through'>". number_format(($row[7])) ." VNĐ</h6>
									</div>
								</div>
							</div>
						</div>";
						}
						?>
					</div>
				</div>
				<div class="col-lg-3">
					<div class="ctg-right">
						<a href="#" target="_blank">
							<img class="img-fluid d-block mx-auto" src="img/category/c5.jpg" alt="">
						</a>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End related-product Area -->

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
	
	<?php $connect->close(); ?>
	<?php include("./templates/footer.php")?>

	<script src="js/vendor/jquery-2.2.4.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
	<script src="js/vendor/bootstrap.min.js"></script>
	<script src="js/jquery.ajaxchimp.min.js"></script>
	<script src="js/jquery.nice-select.min.js"></script>
	<script src="js/jquery.sticky.js"></script>
	<script src="js/nouislider.min.js"></script>
	<script src="js/countdown.js"></script>
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/main.js"></script>
	<script src="js/store/common.js"></script>
</body>

</html>