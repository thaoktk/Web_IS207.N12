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
<script>
function hideMessage(id) {
	document.getElementById(id).style.display = "none";
};
 setTimeout(() => {
    hideMessage("success-mes")
 }, 5000);
 setTimeout(() => {
    hideMessage("error-mes")
 }, 5000);
</script>
<body>

<?php 
	include "templates/connect.php";
	include "templates/product.php";
	session_start(); 
	$idUser = isset($_SESSION['current-user']) ? $_SESSION['current-user']['MaND'] : null;

?>

    <?php
	if (isset($_POST['submit']) && $_POST['submit'] == 'Đổi mật khẩu') {

		try {
            $userResult = mysqli_query($connect, "Select * from `nguoidung` WHERE (`MaND` = '" . $_POST['id'] . "' AND `MatKhau` = '" . md5($_POST['password-old']) . "')");
            if ($userResult->num_rows > 0) {
                $result = mysqli_query($connect, "UPDATE `nguoidung` SET MatKhau = '". md5($_POST['password-new']) ."' WHERE (`MaND` = '" . $_POST['id'] . "' AND `MatKhau` = '" . md5($_POST['password-old']) . "');");
                echo "<div id='success-mes' class='mt-5 w-100'>
                <h1 class='text-center'>Thông báo</h1>
                <h4 class='mt-4 text-center text-success'>Đổi mật khẩu thành công</h4>
                </div>";
            } else {
                echo "<div id='error-mes' class='mt-5 w-100'>
                <h1 class='text-center'>Thông báo</h1>
                <h4 class='mt-4 text-center text-danger'>Mật khẩu cũ không đúng</h4>
                </div>";
             }
        } catch (exception $e) {
            echo "<div id='error-mes' class='mt-5 w-100'>
            <h1 class='text-center'>Thông báo</h1>
            <h4 class='mt-4 text-center'>$e</h4>
            </div>";
        }
	} ?>

    <?php
    if (isset($_GET['action']) && $_GET['action'] == 'logout') {
        unset($_SESSION['current-user']);
		unset($_SESSION['access_token']);
		unset($_SESSION["free-ship"]);
        unset($_SESSION["order"]);
		header("Location: login.php");
        
    } 
	$user = $_SESSION['current-user'];
	$favorites = mysqli_query($connect, "SELECT * FROM yeuthich WHERE MaND = '". $user['MaND'] ."'");
    ?>
	<?php include("./templates/header.php"); ?>
	<section class="banner-area organic-breadcrumb">
		<div class="container">
			<div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
				<div class="col-first">
					<h1><?php if (!empty($_SESSION['current-user'])) {
						$hello = isset($_SESSION['current-user']['TaiKhoan']) ? $_SESSION['current-user']['TaiKhoan'] : $_SESSION['current-user']['Ten'];
						echo "Xin chào ". $hello ." ";
					} else {
						echo "Đăng nhập / Đăng ký";
					} ?></h1>
					<nav class="d-flex align-items-center">
						<a href="index.php">Trang chủ<span class="lnr lnr-arrow-right"></span></a>
						<a href="#">
							<?php if (!empty($_SESSION['current-user'])) {
								echo "Cài đặt";
							} else {
								echo "Đăng nhập / Đăng ký";
							} ?>
						</a>
						</nav>
				</div>
			</div>
		</div>
	</section>
    <section class="product_description_area">
		<div class="container">
			<ul class="nav nav-tabs" id="myTab" role="tablist">
				<li class="nav-item">
					<a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Cài đặt</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Yêu thích</a>
				</li>
			</ul>
			<div class="tab-content" id="myTabContent">
				<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
					<?php if ($user['TaiKhoan'] !== NULL) { ?>
					<form class="row login_form d-flex flex-column align-items-center" action="" method="post">
                        <input type="hidden" name="id" value="<?=$user['MaND']?>">
						<div class="col-md-6 form-group">
							<input type="password" required class="form-control" name="password-old" placeholder="Mật khẩu cũ" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Mật khẩu cũ'">
						</div>
						<div class="col-md-6 mt-4 form-group">
							<input type="password" required class="form-control" name="password-new" placeholder="Mật khẩu mới" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Mật khẩu mới'">
						</div>
						<div class="mt-4 col-md-16 form-group">
							<input type="submit" value="Đổi mật khẩu" name="submit" class="primary-btn"/>
							<a href="#" class="text-center">Quên mật khẩu?</a>
						</div>
					</form>
					<hr>
					<?php } ?>
					<div class="mt-5 d-flex align-items-center justify-content-center">
						<a href="?action=logout" type="button" class="btn primary-btn text-white">Đăng xuất</a>
					</div>
				</div>
				<div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
					<?php
						if ($favorites->num_rows > 0) {
							echo "<button class='genric-btn primary delete-all' data-user='".$user['MaND']."'>Xóa hết</button>";
						} else {
							echo "<div class='text-center'>Không có sản phẩm nào trong danh sách yêu thích</div>";
						}
					?>
					<div class="mt-5 table-responsive d-flex flex-wrap align-items-center">
						<?php 
						while($rowFav=$favorites->fetch_row()) {
							$product = mysqli_query($connect, "SELECT * FROM sanpham WHERE MaSP = '$rowFav[0]'");
							
							while ($rowProduct = $product->fetch_row()) {
								$rating = addStar($rowProduct[13], $rowProduct[12]);
								echo "<div class='col-lg-4 col-md-6' title='$rowProduct[2]'>
										<div class='single-product'>
											<img class='img-fluid' src='". $rowProduct[8] ."' alt=''>
											<div class='product-details'>
												<h6 class='title'>". $rowProduct[2] ."</h6>
												<div class='price'>
													<h6>". number_format(($rowProduct[6])) ." VNĐ</h6>
													<h6 class='l-through'>". number_format(($rowProduct[5])) ." VNĐ</h6>
												</div>
												<div class='mt-2 d-flex align-items-center'>
													<div>". $rating ."</div>
													<span class='ml-2'>". $rowProduct[13] ." đánh giá</span>
												</div>
												<div class='prd-bottom'>
													<a href='cart.php' class='social-info'>
														<span class='ti-bag'></span>
														<p class='hover-text'>Mua ngay</p>
													</a>
													<a class='social-info delete-fav' data-product='$rowProduct[0]' data-user='". $user['MaND'] ."'>
														<span class='fa fa-trash'></span>
														<p class='hover-text'>Xóa</p>
													</a>
													<a href='single-product.php?idSP=$rowProduct[0]' class='social-info'>
														<span class='lnr lnr-move'></span>
														<p class='hover-text'>Chi tiết</p>
													</a>
												</div>
											</div>
										</div>
									</div>";
								}
						}
						?>
					</div>
				</div>
			</div>
		</div>
	</section>

	<?php $connect->close(); ?>
	<!--================End Login Box Area =================-->


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
	<script src="js/store/common.js"></script>
	<script src="js/main.js"></script>
	<script>
		$(document).ready(function(){
			$(".delete-fav").click(function() {
				idSP = parseInt($(this).data("product"))
				idND = parseInt($(this).data("user"))
				$.ajax({
					type: "POST",
					url: "templates/request.php",
					dataType: "json",
					data: {
						request: "delete_fav",
						idSP: idSP,
						idND: idND
					},
					success: function(data, status, xhr) {
						alert("Xóa thành công sản phẩm khỏi yêu thích!")
						window.location.reload();
					},
					error: function(e) {
						alert("Đã xảy ra lỗi!")
					}
				})
			})

			$(".delete-all").click(function() {
				idND = parseInt($(this).data("user"))
				$.ajax({
					type: "POST",
					url: "templates/request.php",
					dataType: "json",
					data: {
						request: "delete_all_fav",
						idND: idND
					},
					success: function(data, status, xhr) {
						alert("Xóa thành công tất cả sản phẩm khỏi yêu thích!")
						window.location.reload();
					},
					error: function(e) {
						alert("Đã xảy ra lỗi!")
					}
				})
			})
    });  
	</script>
</body>

</html>