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

<body id="category">
<?php include("./templates/header.php")?>
<?php include "./templates/connect.php"; 
	  include "./templates/product.php";

	$param = "";
	$paramSort = "";
	$orderCondition = "";
	$where = "";
	$filterCategory = "";
	$search = isset($_GET['search']) ? $_GET['search'] : "";
	$orderSort = isset($_GET['sort']) ? $_GET['sort'] : "";
	$category = isset($_GET['category']) ? $_GET['category'] : "";

	if ($search) {
		$where = "WHERE TenSP LIKE '%$search%'";
		$param .= "&search=". $search;
		$paramSort .= "&search=". $search;
	}
	if ($orderSort) {
		$orderCondition = "ORDER BY `sanpham`.`GiaTien` $orderSort";
		$param .= "&sort=". $orderSort;
	}
	if ($category) {
		$filterCategory = "WHERE TenSeries LIKE '%$category%'";
		$param .= "&category=". $category;
		$paramSort .= "&category=". $category;
	}

	$itemsPerPage = 9;
	if(isset($_GET['page'])){
		$currentPage=$_GET['page'];
	}
	else{
			$currentPage=1;
	}  

	$offset = ($currentPage - 1) * $itemsPerPage;

	if ($search) {
		$results = mysqli_query($connect,"SELECT * FROM sanpham $where $orderCondition limit 9 offset $offset");
		$totalRecords = mysqli_query($connect, "SELECT * FROM sanpham $where");
	} else if ($category) {
		$results = mysqli_query($connect,"SELECT * FROM sanpham $filterCategory $orderCondition limit 9 offset $offset");
		$totalRecords = mysqli_query($connect, "SELECT * FROM sanpham $filterCategory");
	} else {
		$results = mysqli_query($connect,"SELECT * FROM sanpham $orderCondition limit 9 offset $offset");
		$totalRecords = mysqli_query($connect, "SELECT * FROM sanpham");
	}

	$totalRows = $totalRecords->num_rows;
	$totalPages = ceil($totalRows / $itemsPerPage);
	$connect->close();
	?>

	<!-- Start Banner Area -->
	<section class="banner-area organic-breadcrumb">
		<div class="container">
			<div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
				<div class="col-first">
					<h1>Sản phẩm</h1>
					<nav class="d-flex align-items-center">
						<a href="index.php">Trang chủ<span class="lnr lnr-arrow-right"></span></a>
						<a href="#">Sản phẩm</a>
					</nav>
				</div>
			</div>
		</div>
	</section>
	<!-- End Banner Area -->
	<div class="container">
		<div class="row">
			<div class="col-xl-3 col-lg-4 col-md-5">
				<div class="sidebar-categories">
					<div class="head">Phân loại</div>
					<ul class="main-categories">
						<li class="main-nav-list"><a data-toggle="collapse" href="#fruitsVegetable" aria-expanded="false" aria-controls="fruitsVegetable"><span class="lnr lnr-arrow-right"></span>Iphone</a>
							<ul class="collapse" id="fruitsVegetable" data-toggle="collapse" aria-expanded="false" aria-controls="fruitsVegetable">
								<?php 
								while ($row = $list_SeriesIphone->fetch_row()) {
									echo "<li class='main-nav-list child'><a href='?category=$row[0]'>$row[0]</a></li>";
								}
								?>
							</ul>
						</li>

						<li class="main-nav-list"><a data-toggle="collapse" href="#meatFish" aria-expanded="false" aria-controls="meatFish"><span class="lnr lnr-arrow-right"></span>MacBook</a>
							<ul class="collapse" id="meatFish" data-toggle="collapse" aria-expanded="false" aria-controls="meatFish">
							<?php 
								while ($row = $list_SeriesMacBook->fetch_row()) {
									echo "<li class='main-nav-list child'><a href='?category=$row[0]'>$row[0]</a></li>";
								}
								?>
							</ul>
						</li>
						<li class="main-nav-list"><a data-toggle="collapse" href="#cooking" aria-expanded="false" aria-controls="cooking"><span class="lnr lnr-arrow-right"></span>Ipad</a>
							<ul class="collapse" id="cooking" data-toggle="collapse" aria-expanded="false" aria-controls="cooking">
							<?php 
								while ($row = $list_SeriesIpad->fetch_row()) {
									echo "<li class='main-nav-list child'><a href='?category=$row[0]'>$row[0]</a></li>";
								}
								?>
							</ul>
						</li>
						<li class="main-nav-list"><a data-toggle="collapse" href="#beverages" aria-expanded="false" aria-controls="beverages"><span class="lnr lnr-arrow-right"></span>AirPods</a>
							<ul class="collapse" id="beverages" data-toggle="collapse" aria-expanded="false" aria-controls="beverages">
							<?php 
								while ($row = $list_SeriesAirPods->fetch_row()) {
									echo "<li class='main-nav-list child'><a href='?category=$row[0]'>$row[0]</a></li>";
								}
								?>
							</ul>
						</li>
						<li class="main-nav-list"><a data-toggle="collapse" href="#homeClean" aria-expanded="false" aria-controls="homeClean"><span class="lnr lnr-arrow-right"></span>Apple Watch</a>
							<ul class="collapse" id="homeClean" data-toggle="collapse" aria-expanded="false" aria-controls="homeClean">
							<?php 
								while ($row = $list_SeriesWatch->fetch_row()) {
									echo "<li class='main-nav-list child'><a href='?category=$row[0]'>$row[0]</a></li>";
								}
								?>
							</ul>
						</li>
						<li class="main-nav-list"><a data-toggle="collapse" href="#officeProduct" aria-expanded="false" aria-controls="officeProduct"><span class="lnr lnr-arrow-right"></span>Phụ kiện Laptop</a>
							<ul class="collapse" id="officeProduct" data-toggle="collapse" aria-expanded="false" aria-controls="officeProduct">
								<li class="main-nav-list child"><a href="?category=Chuột Apple">Chuột Apple</a></li>
								<li class="main-nav-list child"><a href="?category=Bàn phím Magic">Bàn phím Magic</a></li>
							</ul>
						</li>
					</ul>
				</div>
				<div class="sidebar-filter mt-50">
					<div class="top-filter-head">Bộ lọc sản phẩm</div>
					<div class="common-filter">
						<div class="head">Ram</div>
						<form action="#">
							<ul>
								<li class="filter-list"><input class="pixel-radio" id="2GB" type="radio" name="brand"><label for="2GB">2GB</label></li>
								<li class="filter-list"><input class="pixel-radio" id="4GB" type="radio" name="brand"><label for="4GB">4GB</label></li>
								<li class="filter-list"><input class="pixel-radio" id="8GB" type="radio" name="brand"><label for="8GB">8GB</label></li>
								<li class="filter-list"><input class="pixel-radio" id="12GB" type="radio" name="brand"><label for="12GB">12GB</label></li>
								<li class="filter-list"><input class="pixel-radio" id="16GB" type="radio" name="brand"><label for="16GB">16GB</label></li>
							</ul>
						</form>
					</div>
					<div class="common-filter">
						<div class="head">Dung lượng lưu trữ</div>
						<form action="#">
							<ul>
								<li class="filter-list"><input class="pixel-radio" id="32GB" type="radio" name="brand"><label for="32GB">32GB</label></li>
								<li class="filter-list"><input class="pixel-radio" id="64GB" type="radio" name="brand"><label for="64GB">64GB</label></li>
								<li class="filter-list"><input class="pixel-radio" id="128GB" type="radio" name="brand"><label for="128GB">128GB</label></li>
								<li class="filter-list"><input class="pixel-radio" id="256GB" type="radio" name="brand"><label for="256GB">256GB</label></li>
								<li class="filter-list"><input class="pixel-radio" id="512GB" type="radio" name="brand"><label for="512GB">512GB</label></li>
							</ul>
						</form>
					</div>
					<div class="common-filter">
						<div class="head">Màu sắc</div>
						<form action="#">
							<ul>
								<li class="filter-list"><input class="pixel-radio" type="radio" id="black" name="color"><label for="black">Đen</label></li>
								<li class="filter-list"><input class="pixel-radio" type="radio" id="yellow" name="color"><label for="yellow">Vàng</label></li>
								<li class="filter-list"><input class="pixel-radio" type="radio" id="purple" name="color"><label for="purple">Tím</label></li>
								<li class="filter-list"><input class="pixel-radio" type="radio" id="pink" name="color"><label for="pink">Hồng</label></li>
								<li class="filter-list"><input class="pixel-radio" type="radio" id="blue" name="color"><label for="blue">Xanh</label></li>
							</ul>
						</form>
					</div>
					<div class="common-filter">
						<div class="head">Giá</div>
						<div class="price-range-area">
							<div id="price-range"></div>
							<div class="value-wrapper d-flex flex-wrap">
								<div class="price">Giá:</div>
								<div id="lower-value"></div>
								<span>VNĐ</span>
								<div class="to">từ</div>
								<div id="upper-value"></div>
								<span>VNĐ</span>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xl-9 col-lg-8 col-md-7">
				<!-- Start Filter Bar -->
				<div class="filter-bar d-flex flex-wrap align-items-center justify-content-between">
					<select id="sorting" name="sorting" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
						<option value="">Sắp xếp giá</option>
						<option <?php if (isset($_GET['sort']) && $_GET['sort'] == "asc") { ?> selected <?php }?> value="?sort=asc<?=$paramSort?>">Giá thấp đến cao</option>
						<option <?php if (isset($_GET['sort']) && $_GET['sort'] == "desc") { ?> selected <?php }?> value="?sort=desc<?=$paramSort?>">Giá cao đến thấp</option>
					</select>
					<div>
						<a href="category.php" class="genric-btn default">Làm mới</a>
					</div>
				</div>
				<!-- End Filter Bar -->
				<!-- Start Best Seller -->
				<section class="lattest-product-area pb-40 category-list">
					<div class="row" id="list-product">
						<?php 
						while($row=$results->fetch_row()) {
							$rating = addStar($row[13], $row[12]);
							echo "<div class='col-lg-4 col-md-6' title='$row[2]'>
							<div class='single-product'>
								<img class='img-fluid' src='". $row[8] ."' alt=''>
								<div class='product-details'>
									<h6 class='title'>". $row[2] ."</h6>
									<div class='price'>
										<h6>". number_format(($row[6])) ." VNĐ</h6>
										<h6 class='l-through'>". number_format(($row[5])) ." VNĐ</h6>
									</div>
									<div class='mt-2 d-flex align-items-center'>
										<div>". $rating ."</div>
										<span class='ml-2'>". $row[13] ." đánh giá</span>
									</div>
									<div class='prd-bottom'>
										<a href='cart.php' class='social-info'>
											<span class='ti-bag'></span>
											<p class='hover-text'>Mua ngay</p>
										</a>
										<a href='' class='social-info'>
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
						}

						if ($results->num_rows <= 0) {
							echo "<div class='w-100 h-100 not-found d-flex align-items-center justify-content-center'>
							<span>Không tìm thấy sản phẩm nào!</span>
							</div>";
						}
						?>
					</div>
				</section>
				<!-- End Best Seller -->
				<!-- Start Filter Bar -->
				<div class="filter-bar d-flex flex-wrap align-items-center">
					<div class="pagination ml-auto">
						<?php if ($currentPage <= 1) {
							echo "<a type='button' class='prev-arrow'><i class='fa fa-long-arrow-left' aria-hidden='true'></i></a>";
						}  else {
							echo "<a type='button' href='?page=" . ($currentPage - 1) ."$param' class='prev-arrow'><i class='fa fa-long-arrow-left' aria-hidden='true'></i></a>";
						}?>
						<?php
						for ($i = 1; $i <= $totalPages; $i++) {
							if ($i != $currentPage) {
								if ($i > $currentPage - 3 && $i < $currentPage + 3) {
									echo "<a href='?page=$i$param'>$i</a>";
								}
							} else {
								echo "<a class='active'>$i</a>";
							}
						}
						?>
						<?php if ($currentPage >= $totalPages) {
							echo "<a type='button' class='next-arrow'><i class='fa fa-long-arrow-right' aria-hidden='true'></i></a>";
						} else {
							echo "<a type='button' href='?page=" . ($currentPage + 1) ."$param' class='next-arrow'><i class='fa fa-long-arrow-right' aria-hidden='true'></i></a>";
						}?>
						
					</div>
				</div>
				<!-- End Filter Bar -->
			</div>
		</div>
	</div>

	<!-- Start related-product Area -->
	<section class="related-product-area section_gap">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-6 text-center">
					<div class="section-title">
						<h1>Deal hot của tuần</h1>
						<p>Khám phá ngay những ưu đãi hot trong tuần của chúng tôi.</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<div class="row">
					<?php 
						while($row=$list_dealHot2->fetch_row())  {
							echo "<div class='col-lg-4 col-md-4 col-sm-6 mb-20'>
							<div class='single-related-product category d-flex align-items-start'>
								<a href='single-product.php'><img src=". $row[8] ." alt=''></a>
								<div class='desc'>
									<a href='single-product.php' class='title'>". $row[2] ."</a>
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
				</div>
			</div>
		</div>
	</section>
	<!-- End related-product Area -->

	<?php include("./templates/footer.php")?>

	<!-- Modal Quick Product View
	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="container relative">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<div class="product-quick-view">
					<div class="row align-items-center">
						<div class="col-lg-6">
							<div class="quick-view-carousel">
								<div class="item" style="background: url(img/organic-food/q1.jpg);">

								</div>
								<div class="item" style="background: url(img/organic-food/q1.jpg);">

								</div>
								<div class="item" style="background: url(img/organic-food/q1.jpg);">

								</div>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="quick-view-content">
								<div class="top">
									<h3 class="head">Mill Oil 1000W Heater, White</h3>
									<div class="price d-flex align-items-center"><span class="lnr lnr-tag"></span> <span class="ml-10">$149.99</span></div>
									<div class="category">Category: <span>Household</span></div>
									<div class="available">Availibility: <span>In Stock</span></div>
								</div>
								<div class="middle">
									<p class="content">Mill Oil is an innovative oil filled radiator with the most modern technology. If you are
										looking for something that can make your interior look awesome, and at the same time give you the pleasant
										warm feeling during the winter.</p>
									<a href="#" class="view-full">View full Details <span class="lnr lnr-arrow-right"></span></a>
								</div>
								<div class="bottom">
									<div class="color-picker d-flex align-items-center">Color:
										<span class="single-pick"></span>
										<span class="single-pick"></span>
										<span class="single-pick"></span>
										<span class="single-pick"></span>
										<span class="single-pick"></span>
									</div>
									<div class="quantity-container d-flex align-items-center mt-15">
										Quantity:
										<input type="text" class="quantity-amount ml-15" value="1" />
										<div class="arrow-btn d-inline-flex flex-column">
											<button class="increase arrow" type="button" title="Increase Quantity"><span class="lnr lnr-chevron-up"></span></button>
											<button class="decrease arrow" type="button" title="Decrease Quantity"><span class="lnr lnr-chevron-down"></span></button>
										</div>

									</div>
									<div class="d-flex mt-20">
										<a href="#" class="view-btn color-2"><span>Add to Cart</span></a>
										<a href="#" class="like-btn"><span class="lnr lnr-layers"></span></a>
										<a href="#" class="like-btn"><span class="lnr lnr-heart"></span></a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div> -->



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
	<script src="js/store/explore.js"></script>
</body>

</html>