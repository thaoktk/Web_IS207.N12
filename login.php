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

<?php session_start(); 
?>
	<section class="banner-area organic-breadcrumb">
		<div class="container">
			<div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
				<div class="col-first">
					<h1><?php if (!empty($_SESSION['current-user'])) {
						echo "Xin chào ". $_SESSION['current-user']['TaiKhoan'] ." ";
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
	<!-- End Banner Area -->
	<?php
	require_once( 'Facebook/autoload.php' );
	$fb = new Facebook\Facebook([
	  'app_id' => '1021828652544328',
	  'app_secret' => '34b4b98e6a0a3ac0e8c01b7881efb673',
	  'default_graph_version' => 'v15.0',
	  ]);
	$helper = $fb->getRedirectLoginHelper();
	$permissions = ['email'];
	$loginUrl = $helper->getLoginUrl('http://localhost/doan/templates/fbCallback.php', $permissions);
	?>
	<?php
	include "templates/gg-source.php";
	?>
	<?php
	include "./templates/connect.php";
	 ?>
		<?php if (empty($_SESSION['current-user'])) { ?>
				<!-- Start Banner Area -->

		<!--================Login Box Area =================-->
		<section class="login_box_area section_gap">
			<div class="container">
				<div class="row">
					<div class="col-lg-6">
						<div class="login_box_img">
							<img class="img-fluid" src="img/login.jpg" alt="">
							<div class="hover">
								<h4>Chưa có tài khoản?</h4>
								<p>Tạo tài khoản để có thêm nhiều tính năng với trang web của chúng tôi!</p>
								<a class="primary-btn" href="register.php">Tạo tài khoản</a>
							</div>
						</div>
					</div>
				<div class="col-lg-6">
					<div class="login_form_inner">
						<h3>Đăng nhập vào trang web</h3>
						<form class="row login_form" id="login">
							<div class="col-md-12 form-group">
								<input type="text" required class="form-control" id="username" name="username" placeholder="Tên đăng nhập" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Tên đăng nhập'">
							</div>
							<div class="col-md-12 form-group">
								<input type="password" required class="form-control" id="password" name="password" placeholder="Mật khẩu" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Mật khẩu'">
							</div>
							<div class="mt-4 col-md-12 form-group">
								<input type="submit" value="Đăng nhập" name="submit" class="primary-btn"/>
							</div>
						</form>
						<hr>
						<div>
							<h5 class="text-center">-Hoặc-</h5>
							<?php if(isset($authUrl)){ ?>
							<a href="<?=$authUrl?>" type="button" class="btn-login-social genric-btn success-border">Đăng nhập với Google</a>
							<?php } ?>
							<a href="<?=$loginUrl?>" type="button"  class="btn-login-social genric-btn success-border">Đăng nhập với Facebook</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<?php }  else {
		$currentUser = $_SESSION['current-user'];
		if ($currentUser['MaQuyen'] == 1) {
			header("Location: admin/pages/dashboard.php");
		} else {
			header("Location: index.php");

		}

		$connect->close();
	}?>
	<!--================End Login Box Area =================-->

	<script src="js/vendor/jquery-2.2.4.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
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
		$(document).ready(function() {
			$("#login").submit(function(e) {
				e.preventDefault()

				username = $("#username").val()
				password = $("#password").val()

				$.ajax({
                        type: "POST",
                        url: "templates/request.php",
                        dataType: "json",
                        data: {
                            request: "login",
                            username: username,
                            password: password,
                        },
                        success: function (data) {
							if (data.status == 1) {
								alert(data.message);
								window.location.reload()
							} else {
								alert(data.message);
							}
                        }
                    })
			})
		})
	</script>
</body>

</html>