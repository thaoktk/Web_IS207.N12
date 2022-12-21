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

<?php include "./templates/connect.php"; ?>

	<!-- Start Banner Area -->
	<section class="banner-area organic-breadcrumb">
		<div class="container">
			<div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
				<div class="col-first">
					<h1>Đăng nhập / Đăng ký</h1>
					<nav class="d-flex align-items-center">
						<a href="index.php">Trang chủ<span class="lnr lnr-arrow-right"></span></a>
						<a href="#">Đăng nhập / Đăng ký</a>
					</nav>
				</div>
			</div>
		</div>
	</section>
	<!-- End Banner Area -->
	<?php
	if (isset($_POST['submit']) && $_POST['submit'] == 'Tạo') {
		try {
			$result = mysqli_query($connect, "INSERT INTO `nguoidung` (`MaND`, `Ho`, `Ten`, `SDT`, `Email`, `TaiKhoan`, `MatKhau`, `MaQuyen`) VALUES (NULL, '" . $_POST['subname'] . "', '" . $_POST['name'] . "', '" . $_POST['phone-number'] . "', '" . $_POST['email'] . "', '" . $_POST['username'] . "', MD5('" . $_POST['password'] . "'), '3');");
			echo "<div class='mt-5 w-100'>
					<h1 class='text-center'>Thông báo</h1>
					<h4 class='mt-4 text-center'>Đăng kí tài khoản thành công</h4>
					<div class='d-flex align-items-center justify-content-center'>
						<a type='button' href='login.php' class='mt-4 genric-btn primary circle'>Đăng nhập</a>
					</div>
				</div>";
		}
		catch (exception $e) {
			echo "<div class='mt-5 w-100'>
					<h1 class='text-center'>Thông báo</h1>
					<h4 class='mt-4 text-center'>Tài khoản đã tồn tại. Bạn vui lòng chọn tài khoản khác.</h4>
					<div class='d-flex align-items-center justify-content-center'>
						<a type='button' href='register.php' class='mt-4 genric-btn primary circle'>Quay lại</a>
					</div>
				</div>";
		 }
		 $connect->close();
	} else { ?>
	<!--================Login Box Area =================-->
	<section class="login_box_area section_gap">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="login_box_img">
						<img class="img-fluid" src="img/login.jpg" alt="">
						<div class="hover">
							<h4>Đã có tài khoản?</h4>
							<p>Đăng nhập vào website của chúng tôi!</p>
							<a class="primary-btn" href="login.php">Đăng nhập</a>
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="login_form_inner ">
						<h3>Đăng ký vào trang web</h3>
						<form class="row login_form" action="?action=reg" method="POST" >
							<div class="col-md-12 form-group d-flex align-items-center">
								<input type="text" required class="form-control"  name="subname" placeholder="Họ" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Họ'">
								<input type="text" required class="ml-4 form-control"  name="name" placeholder="Tên" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Tên'">
							</div>
							<div class="col-md-12 form-group">
								<input type="number" required class="form-control" name="phone-number" placeholder="Số điện thoại" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Số điện thoại'">
							</div>
							<div class="col-md-12 form-group">
								<input type="text" required class="form-control"  name="username" placeholder="Tên đăng nhập" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Tên đăng nhập'">
							</div>
							<div class="col-md-12 form-group">
								<input type="email" required class="form-control"  name="email" placeholder="Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email'">
							</div>
							<div class="col-md-12 form-group">
								<input type="password" required class="form-control"  name="password" placeholder="Mật khẩu" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Mật khẩu'">
							</div>
							<div class="mt-4 col-md-12 form-group">
								<input type="submit" class="form-control w-100 primary-btn" name="submit" value="Tạo">
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>

<?php } ?>
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
</body>

</html>