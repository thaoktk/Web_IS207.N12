<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
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

    <?php 
    include "./templates/connect.php"; 
    session_start();

    $param = "";
	$where = "";
	$searchPost = isset($_GET['searchPost']) ? $_GET['searchPost'] : "";

	if ($searchPost) {
		$where = "WHERE TieuDe LIKE '%$searchPost%'";
		$param .= "&searchPost=". $searchPost;
	}
    
    $itemsPerPage = 4;
	if(isset($_GET['page'])){
		$currentPage=$_GET['page'];
	}
	else{
			$currentPage=1;
	}  
    $offset = ($currentPage - 1) * $itemsPerPage;

	if ($searchPost) {
		$results = mysqli_query($connect,"SELECT * FROM tintuc $where order by NgayDang desc limit 4 offset $offset");
		$totalRecords = mysqli_query($connect, "SELECT * FROM tintuc $where");
	} else {
		$results = mysqli_query($connect,"SELECT * FROM tintuc order by NgayDang desc limit 4 offset $offset");
		$totalRecords = mysqli_query($connect, "SELECT * FROM tintuc");
	}

    $totalRows = $totalRecords->num_rows;
	$totalPages = ceil($totalRows / $itemsPerPage);

    $time = date_create()->format('Y-m-d H:i:s');
    $resultsPopular = mysqli_query($connect,"SELECT * FROM tintuc WHERE NgayDang <= '$time' limit 4");

    // $connect->close();
    ?>
    <?php include("./templates/header.php")?>

    <!-- Start Banner Area -->
    <section class="banner-area organic-breadcrumb">
        <div class="container">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                <div class="col-first">
                    <h1>Blog</h1>
                    <nav class="d-flex align-items-center">
                        <a href="index.php">Trang chủ<span class="lnr lnr-arrow-right"></span></a>
                        <a href="#">Blog</a>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Area -->

    <!--================Blog Categorie Area =================-->

    <!--================Blog Area =================-->
    <section class="mt-5 blog_area">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="blog_left_sidebar">
                        <?php
                        while($row=$results->fetch_row()) {
                            $resultsComment = mysqli_query($connect,"SELECT * FROM binhluan WHERE MaTin = '$row[0]'");
                            $rowsCmt = $resultsComment->num_rows;
                            echo "<article class='row blog_item'>
                            <div class='col-md-3'>
                                <div class='blog_info text-right'>
                                    <ul class='blog_meta list'>
                                        <li><a>$row[5]<i class='lnr lnr-user'></i></a></li>
                                        <li><a class='d-flex align-items-center'>$row[6]<i class='lnr lnr-calendar-full'></i></a></li>
                                        <li><a>1.2M Views<i class='lnr lnr-eye'></i></a></li>
                                        <li><a>$rowsCmt bình luận<i class='lnr lnr-bubble'></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class='col-md-9'>
                                <div class='blog_post'>
                                    <img src='$row[4]' alt=''>
                                    <div class='blog_details'>
                                        <a href='single-blog.php?idBlog=$row[0]'>
                                            <h2>$row[1]</h2>
                                        </a>
                                        <p>$row[2]</p>
                                        <a href='single-blog.php?idBlog=$row[0]' class='white_bg_btn'>Xem thêm</a>
                                    </div>
                                </div>
                            </div>
                        </article>";
                        }
                        ?>
                        <nav class="blog-pagination justify-content-center d-flex">
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
                        </nav>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="blog_right_sidebar">
                        <aside class="single_sidebar_widget search_widget">
                            <form class="input-group" action="" method="GET">
                                <input type="text" name="searchPost" class="form-control" value="<?php echo isset($_GET['searchPost']) ? $_GET['searchPost'] : "" ?>" placeholder="Tìm kiếm" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Tìm kiếm'">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="button"><i class="lnr lnr-magnifier"></i></button>
                                </span>
                            </form>
                            <div class="br"></div>
                        </aside>
                        <aside class="single_sidebar_widget author_widget">
                            <img class="author_img rounded-circle" src="https://idsb.tmgrup.com.tr/ly/uploads/images/2021/09/08/thumbs/800x531/142774.jpg" width="100" height="100" style="object-fit:cover;" alt="">
                            <h4>Tươi Phạm</h4>
                            <p>Admin</p>
                            <div class="social_icon">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-github"></i></a>
                                <a href="#"><i class="fa fa-behance"></i></a>
                            </div>
                            <p>Bất lực sinh tích cực.</p>
                            <div class="br"></div>
                        </aside>
                        <aside class="single_sidebar_widget popular_post_widget">
                            <h3 class="widget_title">Bài viết gần đây</h3>
                            <?php 
                             while ($row = $resultsPopular->fetch_row()) {
                                echo "<div class='media post_item'>
                                        <img src='$row[4]' alt='post' width='100' height='70' style='object-fit:contain;'>
                                        <div class='media-body'>
                                            <a href='single-blog.php?idBlog=$row[0]'>
                                                <h3>". substr($row[1], 0, 50) ."...</h3>
                                            </a>
                                            <p>$row[6]</p>
                                        </div>
                                    </div>";
                             }
                            ?>
                            <div class="br"></div>
                        </aside>
                        <aside class="single_sidebar_widget ads_widget">
                            <a href="#"><img class="img-fluid" src="img/blog/add.jpg" alt=""></a>
                        </aside>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================Blog Area =================-->

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
    <script src="js/main.js"></script>
    <script src="js/store/common.js"></script>
</body>

</html>