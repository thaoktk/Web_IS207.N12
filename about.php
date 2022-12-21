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
include "./templates/connect.php"; 
$idUser = isset($_SESSION['current-user']) ? $_SESSION['current-user']['MaND'] : null;
include("templates/header.php");
?>


	<!-- Start Banner Area -->
	<section class="banner-area organic-breadcrumb">
		<div class="container">
			<div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
				<div class="col-first">
					<h1>Giới thiệu</h1>
					<nav class="d-flex align-items-center">
						<a href="index.php">Trang chủ<span class="lnr lnr-arrow-right"></span></a>
						<a href="#">Giới thiệu</a>
					</nav>
				</div>
			</div>
		</div>
	</section>
	<!-- End Banner Area -->
	
	<!--================Contact Area =================-->
	<section class="contact_area section_gap_bottom">
		<div class="container">
			<h1 class="my-5">Giới thiệu</h1>
            <p>3TN Store là cửa hàng chuyên về các thiết bị điện tử, thông minh của Apple - Tập đoàn công nghệ lớn số một thế 
                giới. Với khẩu hiệu "Luôn mang những điều tốt đẹp nhất đến với khách hàng", chúng tôi tự hào và
                vinh hạnh khi nhận được sự ủng hộ của các khách hàng từ Bắc tới Nam trong suốt 5 năm qua.
            </p>
            <p class="mt-3">Nay để thuận tiện hơn, cũng như đem đến nhiều sự lựa chọn hơn cho các quý khách, chúng tôi đã phát triển thêm 
                website thương mại điện tử để có thể phục vụ quý khách một cách tốt hơn.
            </p>
            <p class="mt-3">
                3TN Store xin cam kết có hóa đơn, chứng từ rõ ràng cho mỗi sản phẩm, đảm báo hàng chính hãng 100%. 
                Chúng tôi sẽ luôn cải thiện chất lượng dịch vụ ngày càng tốt hơn, hỗ trợ khách hàng đổi trả, hoàn tiền,
                bảo hành sản phẩm 24/24, hỗ trợ trả góp với lãi suất 0%, đội ngũ tư vấn chuyên nghiệp, tận tình, ... 
                hứa hẹn mang đến cho khách hàng không gian mua sắm với trải nghiệm tốt nhất.
            </p>
            <p class="mt-3">Mong ràng 3TN Store sẽ luôn được đồng hành cùng các quý khách trong hiện tại và cả tương lai sau này! Xin cám ơn
                quý khách đã luôn ủng hộ 3TN Store.
            </p>
		</div>
	</section>
	<!--================Contact Area =================-->

	<?php include("./templates/footer.php")?>

	<!-- Modals error -->
	<!--================End Contact Success and Error message Area =================-->


	<script src="js/vendor/jquery-2.2.4.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
	<script src="js/vendor/bootstrap.min.js"></script>
	<script src="js/jquery.ajaxchimp.min.js"></script>
	<script src="js/jquery.nice-select.min.js"></script>
	<script src="js/jquery.sticky.js"></script>
	<script src="js/nouislider.min.js"></script>
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/main.js"></script>
	<script src="js/store/common.js"></script>
</body>

</html>