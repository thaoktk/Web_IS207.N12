<!-- Start Header Area -->

<header class="header_area sticky-header">
        <div class="main_menu">
            <nav class="navbar navbar-expand-lg navbar-light main_box">
                <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <a class="navbar-brand logo_h" href="index.php"><img src="img/phone/logo.png" alt="" width="50" height="50"><span class="logo-text">3TN Store</span></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                        <ul class="nav navbar-nav menu_nav ml-auto">
                            <li class="nav-item active"><a class="nav-link" href="index.php">Trang chủ</a></li>
                            <li class="nav-item">
                                <a href="category.php" class="nav-link">Shop</a>
                            </li>
                            <li class="nav-item">
                                <a href="blog.php" class="nav-link">Tin tức</a>
                            </li>
                            <li class="nav-item"><a class="nav-link" href="contact.php">Liên hệ</a></li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right d-flex flex-row align-items-center justify-content-between">
                            <li class="nav-item">
                                <button class="search"><span class="lnr lnr-magnifier" id="search"></span></button>
                            </li>
                            <li class="nav-item"><a href="cart.php" class=" nav-cart"><span class="ti-bag"></span>
                                    <div class="cart-qty"><?php $quantity = isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0;
                                    echo $quantity; ?></div>
                                </a></li>
                            <li class="nav-item">
                                <a href="<?php
                                 if (isset($_SESSION['current-user'])) {
                                    echo "setting.php";
                                }  else {
                                    echo "login.php";
                                }?>" class=""><span class="ti-user"></span></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
        <div class="search_input" id="search_input_box">
            <div class="container">
                <form id="product-search" action="category.php" method="GET" class="d-flex justify-content-between">
                    <input type="text" name="search" class="form-control" placeholder="Tìm kiếm" value="<?php echo isset($_GET['search']) ? $_GET['search'] : "" ?>">
                    <button type="submit" class="btn"></button>
                    <span class="lnr lnr-cross" id="close_search" title="Close Search"></span>
                </form>
            </div>
        </div>
    </header>
    <!-- End Header Area -->