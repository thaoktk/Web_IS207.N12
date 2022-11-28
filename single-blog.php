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
    <?php 
    include "./templates/connect.php"; 
    session_start();
    $idUser = isset($_SESSION['current-user']) ? $_SESSION['current-user']['MaND'] : null;

    $idBlog = isset($_GET['idBlog']) ? $_GET['idBlog'] : "";
    $result = mysqli_query($connect,"SELECT * FROM tintuc WHERE MaTin = $idBlog");
    $row = $result->fetch_row();

    $resultPrevPost = mysqli_query($connect,"SELECT * FROM tintuc WHERE MaTin = ". (int)$idBlog - 1 ."");
    $rowPrevPost = $resultPrevPost->fetch_row();

    $resultNextPost = mysqli_query($connect,"SELECT * FROM tintuc WHERE MaTin = ". (int)$idBlog + 1 ."");
    $rowNextPost = $resultNextPost->fetch_row();

    $comments = mysqli_query($connect, "SELECT * FROM binhluan WHERE MaTin = $idBlog order by NgayLap desc");
    $time = date_create()->format('Y-m-d H:i:s');
    $resultsPopular = mysqli_query($connect,"SELECT * FROM tintuc WHERE NgayDang <= '$time' and MaTin != $idBlog limit 4");
    ?>
<?php include("./templates/header.php")?>

    <!-- Start Banner Area -->
    <section class="banner-area organic-breadcrumb">
        <div class="container">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                <div class="col-first">
                    <h1>Chi tiết blog</h1>
                    <nav class="d-flex align-items-center">
                        <a href="index.php">Trang chủ<span class="lnr lnr-arrow-right"></span></a>
                        <a href="blog.php">BLog<span class="lnr lnr-arrow-right"></span></a>
                        <a href="#">Chi tiết</a>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Area -->

    <!--================Blog Area =================-->
    <section class="blog_area single-post-area section_gap">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 posts-list">
                    <div class="single-post row">
                        <div class="col-lg-12">
                            <div class="feature-img">
                                <img class="img-fluid" src="<?=$row[4]?>" alt="">
                            </div>
                        </div>
                        <div class="col-lg-3  col-md-3">
                            <div class="blog_info text-right">
                                <ul class="blog_meta list">
                                    <li><a href="#"><?=$row[5]?><i class="lnr lnr-user"></i></a></li>
                                    <li><a href="#"><?=$row[7]?><i class="lnr lnr-calendar-full"></i></a></li>
                                    <li><a href="#">1.2M Views<i class="lnr lnr-eye"></i></a></li>
                                    <li><a href="#">06 Comments<i class="lnr lnr-bubble"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-9 blog_details">
                            <h2 class="mb-4"><?=$row[1]?></h2>
                            <?=$row[3]?>
                        </div>
                    </div>
                    <div class="navigation-area">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-12 nav-left flex-row d-flex justify-content-start align-items-center">
                            <?php if (isset($rowPrevPost)) {
                                echo "<div class='thumb'>
                                    <a href='single-blog.php?idBlog=$rowPrevPost[0]'><img class='img-fluid' width='80' height='40' style='object-fit:contain;' src='$rowPrevPost[4]' alt=''></a>
                                </div>
                                <div class='detials'>
                                    <p>Bài trước</p>
                                    <a href='single-blog.php?idBlog=$rowPrevPost[0]' title='$rowPrevPost[1]'>
                                    <h4>". substr($rowPrevPost[1], 0, 25) ."...</h4></a>
                                </div>"; } ?>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12 nav-right flex-row d-flex justify-content-end align-items-center">
                            <?php if (isset($rowNextPost)) {
                               echo  "<div class='detials'>
                                    <p>Bài tiếp</p>
                                    <a href='single-blog.php?idBlog=$rowNextPost[0]' title='$rowNextPost[1]'>
                                        <h4>". substr($rowNextPost[1], 0, 25) ."...</h4>
                                    </a>
                                    </div>
                                    <div class='thumb'>
                                        <a href='single-blog.php?idBlog=$rowNextPost[0]'><img class='img-fluid'  width='80' height='40' style='object-fit:contain;'  src='$rowNextPost[4]' alt=''></a>
                                    </div>";
                            } ?>
                            </div>
                        </div>
                    </div>
                    <div class="comments-area">
                        <h4>05 Bình luận</h4>
                        <?php
                        while ($rowCmt = $comments->fetch_row()) {
                            $userCmt = mysqli_query($connect, "SELECT * FROM nguoidung WHERE MaND = $rowCmt[3]");
                            $resultUserCmt = $userCmt->fetch_row();
                            $words = explode(' ', $resultUserCmt[2]);
                            $name = !empty($words[1][0]) ? $words[1][0] : $words[0][0];
                            echo "<div class='comment-list'>
                            <div class='single-comment justify-content-between d-flex'>
                                <div class='user justify-content-between d-flex'>
                                    <div class='thumb'>
                                        <span class='avatar'>$name</span>
                                    </div>
                                    <div class='desc'>
                                        <h5>$resultUserCmt[1] $resultUserCmt[2]</h5>
                                        <p class='date'>$rowCmt[5]</p>
                                        <p class='comment'>
                                            $rowCmt[4]
                                        </p>
                                    </div>
                                </div>
                                <div class='reply-btn'>
                                    <button class='btn-reply text-uppercase' data-comment='$rowCmt[0]' data-user='$idUser'>Trả lời</button>
                                </div>
                            </div>
                        </div>";
                        }
                        ?>
                        <div class="comment-list left-padding">
                            <div class="single-comment justify-content-between d-flex">
                                <div class="user justify-content-between d-flex">
                                    <div class="thumb">
                                        <img src="img/blog/c2.jpg" alt="">
                                    </div>
                                    <div class="desc">
                                        <h5><a href="#">Elsie Cunningham</a></h5>
                                        <p class="date">December 4, 2018 at 3:12 pm </p>
                                        <p class="comment">
                                            Never say goodbye till the end comes!
                                        </p>
                                    </div>
                                </div>
                                <div class="reply-btn">
                                    <a href="" class="btn-reply text-uppercase">reply</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="comment-form">
                        <h4>Để lại bình luận</h4>
                        <form method="POST">
                            <div class="form-group">
                                <textarea id="comment" class="form-control mb-10 cmt-input" rows="5" name="message" placeholder="Bình luận" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Bình luận'" required></textarea>
                            </div>
                            <input type="submit" name="submit" value="Gửi bình luận" class="primary-btn submit_btn" data-blog='<?=$idBlog?>' data-user='<?=$idUser?>'>
                        </form>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="blog_right_sidebar">
                        <aside class="single_sidebar_widget search_widget">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search Posts" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Tìm kiếm'">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="button"><i class="lnr lnr-magnifier"></i></button>
                                </span>
                            </div><!-- /input-group -->
                            <div class="br"></div>
                        </aside>
                        <aside class="single_sidebar_widget author_widget">
                            <img class="author_img rounded-circle" src="img/blog/author.png" alt="">
                            <h4>Ba Tê Nờ</h4>
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
                            <h3 class="widget_title">Bài viết phổ biến</h3>
                            <?php 
                             while ($row = $resultsPopular->fetch_row()) {
                                echo "<div class='media post_item'>
                                        <img src='$row[4]' alt='post' width='100' height='70' style='object-fit:contain;'>
                                        <div class='media-body'>
                                            <a href='single-blog.php?idBlog=$row[0]'>
                                                <h3>". substr($row[1], 0, 50) ."...</h3>
                                            </a>
                                            <p>$row[7]</p>
                                        </div>
                                    </div>";
                             }
                            ?>
                        </aside>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================Blog Area =================-->

    <?php include("./templates/footer.php")?>

    <script src="js/vendor/jquery-2.2.4.min.js"></script>
    <script src="//js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
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
    <!-- <script type="text/javascript">
       bkLib.onDomLoaded(function() {
        new nicEditor({fullPanel : true}).panelInstance('comment');
  });
    </script> -->
</body>

</html>