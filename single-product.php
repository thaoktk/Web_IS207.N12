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
	<link rel="stylesheet" href="css/main.css">
</head>

<body>

<?php include "./templates/connect.php"; 
	  include "./templates/product.php";
	  
	  $idSP = isset($_GET['idSP']) ? $_GET['idSP'] : "";
	  $result = mysqli_query($connect,"SELECT * FROM sanpham WHERE MaSP = $idSP");
	  $row = $result->fetch_row();
	  $series = $row[3];
	  $listProductRelated = mysqli_query($connect,"SELECT * FROM sanpham WHERE TenSeries = '$series' and MaSP != $idSP  limit 9");
      $reviews = mysqli_query($connect, "SELECT * FROM danhgia WHERE MaSP = $idSP");
	  $comments = mysqli_query($connect, "SELECT * FROM binhluan WHERE MaSP = $idSP");
	   
 ?>
<?php include("./templates/header.php")?>

	<!-- Start Banner Area -->
	<section class="banner-area organic-breadcrumb">
		<div class="container">
			<div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
				<div class="col-first">
					<h1>Chi tiết sản phẩm</h1>
					<nav class="d-flex align-items-center">
						<a href="index.php">Trang chủ<span class="lnr lnr-arrow-right"></span></a>
						<a href="category.php">Shop<span class="lnr lnr-arrow-right"></span></a>
						<a href="#">Chi tiết</a>
					</nav>
				</div>
			</div>
		</div>
	</section>
	<!-- End Banner Area -->

	<!--================Single Product Area =================-->
	<div class="product_image_area">
		<div class="container">
			<div class="row s_product_inner">
				<div class="col-lg-6">
						<div class="single-prd-item">
							<img class="img-fluid" src="<?=$row[8]?>" alt="">
						</div>
				</div>
				<div class="col-lg-5 offset-lg-1">
					<?php 
						$tinhTrang = $row[7] > 0 ? "Còn hàng" : "Hết hàng"; 
						echo "<div class='s_product_text'>
						<h3>$row[2]</h3>
						<div class='d-flex align-items-baseline '>
						<h2>". number_format($row[6]) ." VNĐ</h2>
						<h3 class='ml-3 l-through'>". number_format($row[5]) ." VNĐ</h3>
						</div>
						<ul class='list'>
							<li><a class='active' href='#'><span>Phân loại</span> : $row[3]</a></li>
							<li><a href='#'><span>Tình trạng</span> : $tinhTrang</a></li>
						</ul>
						<p>$row[9]
						</p>
						<div class='mt-5 product_count'>
							<label for='qty'>Số lượng:</label>
							<input type='text' name='qty' id='sst' maxlength='12' value='1' title='Quantity:' class='input-text qty'>
							<button class='increase items-count' type='button'><i class='lnr lnr-chevron-up'></i></button>
							<button class='reduced items-count' type='button'><i class='lnr lnr-chevron-down'></i></button>
						</div>
						<div class='card_area d-flex align-items-center'>
							<a type='button' class='primary-btn add-to-cart text-white'>Thêm vào giỏ hàng</a>
							<a class='icon_btn'><i class='lnr lnr lnr-heart'></i></a>
						</div>
					</div>";
					?>
				</div>
			</div>
		</div>
	</div>
	<!--================End Single Product Area =================-->

	<!--================Product Description Area =================-->
	<section class="product_description_area">
		<div class="container">
			<ul class="nav nav-tabs" id="myTab" role="tablist">
				<li class="nav-item">
					<a class="nav-link" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Mô tả</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Cấu hình</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Bình luận</a>
				</li>
				<li class="nav-item">
					<a class="nav-link active" id="review-tab" data-toggle="tab" href="#review" role="tab" aria-controls="review" aria-selected="false">Đánh giá</a>
				</li>
			</ul>
			<div class="tab-content" id="myTabContent">
				<div class="tab-pane fade" id="home" role="tabpanel" aria-labelledby="home-tab">
					<?php echo "<p>$row[9]</p>"; ?>
				</div>
				<div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
					<div class="table-responsive">
						<?php echo $row[4] ?>
					</div>
				</div>
				<div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
					<div class="row">
						<div class="col-lg-6">
							<div class="comment_list">
							<?php 
							while ($rowCmt = $comments->fetch_row()) {
								$userCmt = mysqli_query($connect, "SELECT * FROM nguoidung WHERE MaND = $rowCmt[3]");
								$resultUserCmt = $userCmt->fetch_row();
								$words = explode(' ', $resultUserCmt[2]);
								$name = !empty($words[1][0]) ? $words[1][0] : $words[0][0];
								echo "<div class='review_item'>
								<div class='media'>
									<div class='d-flex'>
									<span class='avatar'>$name</span>
									</div>
									<div class='media-body'>
										<h4>$resultUserCmt[1] $resultUserCmt[2]</h4>
										<h5>$rowCmt[6]</h5>
										<a class='reply_btn' href='#'>Trả lời</a>
									</div>
									</div>
									<p>$rowCmt[4]</p>
								</div>";
							}
							?>
								<div class="review_item reply">
									<div class="media">
										<div class="d-flex">
											<img src="img/product/review-2.png" alt="">
										</div>
										<div class="media-body">
											<h4>Blake Ruiz</h4>
											<h5>12th Feb, 2018 at 05:56 pm</h5>
											<a class="reply_btn" href="#">Trả lời</a>
										</div>
									</div>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
										dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
										commodo</p>
								</div>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="review_box">
								<h4>Để lại bình luận</h4>
								<form class="row contact_form" action="contact_process.php" method="post" id="contactForm" novalidate="novalidate">
									<div class="col-md-12">
										<div class="form-group">
											<input type="text" class="form-control" id="name" name="name" placeholder="Tên của bạn">
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<input type="email" class="form-control" id="email" name="email" placeholder="Email">
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<input type="text" class="form-control" id="number" name="number" placeholder="Số điện thoại">
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<textarea class="form-control" name="message" id="message" rows="1" placeholder="Bình luận"></textarea>
										</div>
									</div>
									<div class="col-md-12 text-right">
										<button type="submit" value="submit" class="btn primary-btn">Gửi ngay</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
				<div class="tab-pane fade show active" id="review" role="tabpanel" aria-labelledby="review-tab">
					<div class="row">
						<div class="col-lg-6">
							<div class="row total_rate">
								<div class="col-6">
									<div class="box_total">
										<h5>Tổng quan</h5>
										<h4><?php echo $row[12] ?>.0</h4>
										<h6>(<?php echo $row[13] ?> đánh giá)</h6>
									</div>
								</div>
								<div class="col-6">
									<div class="rating_list">
										<h3>Dựa trên <?php echo $row[13] ?> đánh giá</h3>
										<?php $rating = addStar($row[13], $row[12]);
										echo "<div >$rating</div>"; ?>
									</div>
								</div>
							</div>
							<div class="mt-4 review_list">
								<?php 
								while ($rowRv = $reviews->fetch_row()) {
									$user = mysqli_query($connect, "SELECT * FROM nguoidung WHERE MaND = $rowRv[1]");
	  								$resultUser = $user->fetch_row();
									$rating = addStar(1, $rowRv[2]);
									$words = explode(' ', $resultUser[2]);
									$name = !empty($words[1][0]) ? $words[1][0] : $words[0][0];
									echo "<div class='review_item'>
										<div class='media'>
											<div class='d-flex'>
												<span class='avatar'>$name</span>
											</div>
											<div class='media-body'>
												<h4>$resultUser[1] $resultUser[2]</h4>
												$rating
												<h5 class='mt-2'>$rowRv[4]</h5>
											</div>
										</div>
										<p>$rowRv[3]</p>
									</div>";
								}
								?>
							</div>
						</div>
						<div class="mt-md-0 mt-4 col-lg-6">
							<div class="review_box">
								<h4>Để lại đánh giá</h4>
								<p>Đánh giá của bạn:</p>
								<div class="d-flex align-items-center">
									<div class="con mr-3">
										<i class="fa fa-star rating" aria-hidden="true" id="st1"></i>
										<i class="fa fa-star rating" aria-hidden="true" id="st2"></i>
										<i class="fa fa-star rating" aria-hidden="true" id="st3"></i>
										<i class="fa fa-star rating" aria-hidden="true" id="st4"></i>
										<i class="fa fa-star rating" aria-hidden="true" id="st5"></i>
									</div>
									<p id="rating-text"></p>
								</div>
								<form class="row contact_form" action="contact_process.php" method="post" id="contactForm" novalidate="novalidate">
									<div class="col-md-12">
										<div class="form-group">
											<textarea class="form-control" name="message" id="message" rows="1" placeholder="Đánh giá" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Đánh giá'"></textarea></textarea>
										</div>
									</div>
									<div class="col-md-12 text-right">
										<button type="submit" value="submit" class="primary-btn">Gửi ngay</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================End Product Description Area =================-->

	<!-- Start related-product Area -->
	<section class="related-product-area section_gap_bottom">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-6 text-center">
					<div class="section-title">
						<h1>Các sản phẩm tương tự</h1>
						<p>Khám phá các sản phẩm tương tự của cửa hàng chúng tôi.</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-9">
					<div class="row">
					<?php 
						while($row=$listProductRelated->fetch_row())  {
							echo "<div class='col-lg-4 col-md-4 col-sm-6 mb-20' id='$row[0]'>
							<div class='single-related-product d-flex'>
								<a href='single-product.php?idSP=$row[0]'><img src=". $row[8] ." alt=''></a>
								<div class='desc'>
									<a href='single-product.php?idSP=$row[0]' class='title'>". $row[2] ."</a>
									<div class='price'>
										<h6 class='cost'>". number_format($row[6]) ." VNĐ</h6>
										<h6 class='l-through'>". number_format(($row[5])) ." VNĐ</h6>
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
						<img class="img-fluid d-block mx-auto" src="img/category/c5.jpg" alt="">
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End related-product Area -->

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
	<script src="js/gmaps.min.js"></script>
	<script src="js/main.js"></script>
	<script src="js/store/product.js"></script>
	<script src="js/store/common.js"></script>

</body>

</html>