
<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <!-- Primary Meta Tags -->
  <title>Admin</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="author" content="Themesberg">

  <!-- Favicon -->
  <link rel="apple-touch-icon" sizes="120x120" href="../../img/phone/logo.png">
  <link rel="icon" type="image/png" sizes="32x32" href="../../img/phone/logo.png">
  <link rel="icon" type="image/png" sizes="16x16" href="../../img/phone/logo.png">
  <link rel="manifest" href="../assets/img/favicon/site.webmanifest">
  <link rel="mask-icon" href="../../img/phone/logo.png" color="#ffffff">
  <meta name="msapplication-TileColor" content="#ffffff">
  <meta name="theme-color" content="#ffffff">

  <!-- Sweet Alert -->
  <link type="text/css" href="../vendor/sweetalert2/dist/sweetalert2.min.css" rel="stylesheet">

  <!-- Notyf -->
  <link type="text/css" href="../vendor/notyf/notyf.min.css" rel="stylesheet">

  <!-- Volt CSS -->
  <link type="text/css" href="../css/volt.css" rel="stylesheet">

  <!-- NOTICE: You can use the _analytics.html partial to include production code specific code & trackers -->

</head>

<body>

  <!-- NOTICE: You can use the _analytics.html partial to include production code specific code & trackers -->

  <?php include "templates/connect.php" ?>
  <?php 
  session_start(); 
  $currentUserAdmin = $_SESSION['admin-user'];
  if (isset($_GET['action']) && $_GET['action'] == 'logout') {
    unset($_SESSION['admin-user']);
    header("Location: sign-in.php");
    } 

   $resultUser = mysqli_query($connect, "SELECT count(*) as totalUser from nguoidung"); 
   $resultUser = mysqli_fetch_assoc($resultUser);
   $resultUser = $resultUser['totalUser'];

   $resultOrder = mysqli_query($connect, "SELECT count(*) as totalOrder from donhang"); 
   $resultOrder = mysqli_fetch_assoc($resultOrder);
   $resultOrder = $resultOrder['totalOrder'];

   $resultProduct = mysqli_query($connect, "SELECT count(*) as totalProduct from sanpham"); 
   $resultProduct = mysqli_fetch_assoc($resultProduct);
   $resultProduct = $resultProduct['totalProduct'];

   $resultVoucher = mysqli_query($connect, "SELECT count(*) as totalProduct from khuyenmai"); 
   $resultVoucher = mysqli_fetch_assoc($resultVoucher);
   $resultVoucher = $resultVoucher['totalProduct'];

   $resultBlog = mysqli_query($connect, "SELECT count(*) as totalBlog from tintuc"); 
   $resultBlog = mysqli_fetch_assoc($resultBlog);
   $resultBlog = $resultBlog['totalBlog'];

  if ($currentUserAdmin['MaQuyen'] == 1) { ?>
    
  
    <main class="content">
  <?php include "./components/header.php" ?>


    <nav class="navbar navbar-top navbar-expand navbar-dashboard navbar-dark ps-0 pe-2 pb-0">
      <div class="container-fluid px-0">
        <div class="d-flex justify-content-end w-100" id="navbarSupportedContent">
          <!-- Navbar links -->
          <div class="nav-item  ms-lg-3">
            <a class="nav-link pt-1 px-0" href="?action=logout" role="button" aria-expanded="false">
            <span class="mb-0 font-small fw-bold text-gray-900">Đăng xuất</span>
            </a>
          </div>
        </div>
    </nav>

    <div class="d-flex justify-content-between w-100 flex-wrap">
        <div class="mb-3 mb-lg-0">
            <h1 class="h4">Tổng quan</h1>
        </div>
    </div>

    <div class="mt-3 row">
      <div class="col-12 col-sm-6 col-xl-4 mb-4">
        <div class="card border-0 shadow">
          <div class="card-body">
            <div class="row d-block d-xl-flex align-items-center">
              <div
                class="col-12 col-xl-5 text-xl-center mb-3 mb-xl-0 d-flex align-items-center justify-content-xl-center">
                <div class="icon-shape icon-shape-primary rounded me-4 me-sm-0">
                  <svg class="icon" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path
                      d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z">
                    </path>
                  </svg>
                </div>
                <div class="d-sm-none">
                  <h2 class="h5">Người dùng</h2>
                  <h3 class="fw-extrabold mb-1"><?=$resultUser?></h3>
                </div>
              </div>
              <div class="col-12 col-xl-7 px-xl-0">
                <div class="d-none d-sm-block">
                  <h2 class="h6 text-gray-400 mb-0">Người dùng</h2>
                  <h3 class="fw-extrabold mb-2"><?=$resultUser?></h3>
                </div>
                <small class="d-flex align-items-center text-gray-500">
                  Lượng người dùng của cửa hàng
                </small>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-12 col-sm-6 col-xl-4 mb-4">
        <div class="card border-0 shadow">
          <div class="card-body">
            <div class="row d-block d-xl-flex align-items-center">
              <div
                class="col-12 col-xl-5 text-xl-center mb-3 mb-xl-0 d-flex align-items-center justify-content-xl-center">
                <div class="icon-shape icon-shape-secondary rounded me-4 me-sm-0">
                  <svg class="icon" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                      d="M10 2a4 4 0 00-4 4v1H5a1 1 0 00-.994.89l-1 9A1 1 0 004 18h12a1 1 0 00.994-1.11l-1-9A1 1 0 0015 7h-1V6a4 4 0 00-4-4zm2 5V6a2 2 0 10-4 0v1h4zm-6 3a1 1 0 112 0 1 1 0 01-2 0zm7-1a1 1 0 100 2 1 1 0 000-2z"
                      clip-rule="evenodd"></path>
                  </svg>
                </div>
                <div class="d-sm-none">
                  <h2 class="fw-extrabold h5">Đơn hàng</h2>
                  <h3 class="mb-1"><?=$resultOrder?></h3>
                </div>
              </div>
              <div class="col-12 col-xl-7 px-xl-0">
                <div class="d-none d-sm-block">
                  <h2 class="h6 text-gray-400 mb-0">Đơn hàng</h2>
                  <h3 class="fw-extrabold mb-2"><?=$resultOrder?></h3>
                </div>
                <small class="d-flex align-items-center text-gray-500">
                  Tổng số đơn hàng của cửa hàng
                </small>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-12 col-sm-6 col-xl-4 mb-4">
        <div class="card border-0 shadow">
          <div class="card-body">
            <div class="row d-block d-xl-flex align-items-center">
              <div
                class="col-12 col-xl-5 text-xl-center mb-3 mb-xl-0 d-flex align-items-center justify-content-xl-center">
                <div class="icon-shape icon-shape-tertiary rounded me-4 me-sm-0 d-flex justify-content-center align-items-center">
                <svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd"><path d="M23 6.066v12.065l-11.001 5.869-11-5.869v-12.131l11-6 11.001 6.066zm-21.001 11.465l9.5 5.069v-10.57l-9.5-4.946v10.447zm20.001-10.388l-9.501 4.889v10.568l9.501-5.069v-10.388zm-5.52 1.716l-9.534-4.964-4.349 2.373 9.404 4.896 4.479-2.305zm-8.476-5.541l9.565 4.98 3.832-1.972-9.405-5.185-3.992 2.177z"/></svg>
                </div>
                <div class="d-sm-none">
                  <h2 class="fw-extrabold h5">Sản phẩm</h2>
                  <h3 class="mb-1"><?=$resultProduct?></h3>
                </div>
              </div>
              <div class="col-12 col-xl-7 px-xl-0">
                <div class="d-none d-sm-block">
                  <h2 class="h6 text-gray-400 mb-0">Sản phẩm</h2>
                  <h3 class="fw-extrabold mb-2"><?=$resultProduct?></h3>
                </div>
                <small class="text-gray-500">
                  Tổng số sản phẩm của cửa hàng
                </small>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-12 col-sm-6 col-xl-4 mb-4">
        <div class="card border-0 shadow">
          <div class="card-body">
            <div class="row d-block d-xl-flex align-items-center">
              <div
                class="col-12 col-xl-5 text-xl-center mb-3 mb-xl-0 d-flex align-items-center justify-content-xl-center">
                <div class="icon-shape icon-shape-tertiary rounded me-4 me-sm-0 d-flex justify-content-center align-items-center">
                <svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd"><path d="M22 22h-20c-1.104 0-2-.896-2-2v-12c0-1.104.896-2 2-2h1.626l.078.283c.194.631.518 1.221.95 1.717h-2.154c-.276 0-.5.224-.5.5v5.5h20v-5.5c0-.276-.224-.5-.5-.5h-2.154c.497-.569.853-1.264 1.029-2h1.625c1.104 0 2 .896 2 2v12c0 1.104-.896 2-2 2zm-20-5v2.5c0 .276.224.5.5.5h19c.276 0 .5-.224.5-.5v-2.5h-20zm8.911-5h-2.911c.584-1.357 1.295-2.832 2-4-.647-.001-1.572.007-2 0-2.101-.035-2.987-1.806-3-3-.016-1.534 1.205-3.007 3-3 1.499.006 2.814.872 4 2.313 1.186-1.441 2.501-2.307 4-2.313 1.796-.007 3.016 1.466 3 3-.013 1.194-.899 2.965-3 3-.428.007-1.353-.001-2 0 .739 1.198 1.491 2.772 2 4h-2.911c-.241-1.238-.7-2.652-1.089-3.384-.388.732-.902 2.393-1.089 3.384zm-2.553-7.998c-1.131 0-1.507 1.918.12 1.998.237.012 2.235 0 2.235 0-1.037-1.44-1.52-1.998-2.355-1.998zm7.271 0c1.131 0 1.507 1.918-.12 1.998-.237.012-2.222 0-2.222 0 1.037-1.44 1.507-1.998 2.342-1.998z"/></svg>
                </div>
                <div class="d-sm-none">
                  <h2 class="fw-extrabold h5">Khuyến mãi</h2>
                  <h3 class="mb-1"><?=$resultVoucher?></h3>
                </div>
              </div>
              <div class="col-12 col-xl-7 px-xl-0">
                <div class="d-none d-sm-block">
                  <h2 class="h6 text-gray-400 mb-0">Khuyến mãi</h2>
                  <h3 class="fw-extrabold mb-2"><?=$resultVoucher?></h3>
                </div>
                <small class="text-gray-500">
                  Tổng số khuyến mãi của cửa hàng
                </small>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-12 col-sm-6 col-xl-4 mb-4">
        <div class="card border-0 shadow">
          <div class="card-body">
            <div class="row d-block d-xl-flex align-items-center">
              <div
                class="col-12 col-xl-5 text-xl-center mb-3 mb-xl-0 d-flex align-items-center justify-content-xl-center">
                <div class="icon-shape icon-shape-tertiary rounded me-4 me-sm-0 d-flex justify-content-center align-items-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M7 16h13v1h-13v-1zm13-3h-13v1h13v-1zm0-6h-5v1h5v-1zm0 3h-5v1h5v-1zm-17-8v17.199c0 .771-1 .771-1 0v-15.199h-2v15.98c0 1.115.905 2.02 2.02 2.02h19.958c1.117 0 2.022-.904 2.022-2.02v-17.98h-21zm19 17h-17v-15h17v15zm-9-12h-6v4h6v-4z"/></svg>
                </div>
                <div class="d-sm-none">
                  <h2 class="fw-extrabold h5">Tin tức</h2>
                  <h3 class="mb-1"><?=$resultBlog?></h3>
                </div>
              </div>
              <div class="col-12 col-xl-7 px-xl-0">
                <div class="d-none d-sm-block">
                  <h2 class="h6 text-gray-400 mb-0">Tin tức</h2>
                  <h3 class="fw-extrabold mb-2"><?=$resultBlog?></h3>
                </div>
                <small class="text-gray-500">
                Tổng số tin tức của cửa hàng
                </small>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </main>

  <?php } else {
    echo "<main class=''>
    <div class='mt-5 w-100 h-100'>
    <h1 class='text-center'>Thông báo</h1>
    <h4 class='mt-4 text-center'>Bạn không có quyền vào trang này!</h4>
    <div class='mt-4 d-flex justify-content-center'>
      <a href='../../index.php' class='btn btn-primary'>Quay lại</a>
    </div>
  </div>
    </main>";
   }?>
  <!-- Core -->
  <script src="../vendor/@popperjs/core/dist/umd/popper.min.js"></script>
  <script src="../vendor/bootstrap/dist/js/bootstrap.min.js"></script>

  <!-- Vendor JS -->
  <script src="../vendor/onscreen/dist/on-screen.umd.min.js"></script>

  <!-- Slider -->
  <script src="../vendor/nouislider/distribute/nouislider.min.js"></script>

  <!-- Smooth scroll -->
  <script src="../vendor/smooth-scroll/dist/smooth-scroll.polyfills.min.js"></script>

  <!-- Charts -->
  <script src="../vendor/chartist/dist/chartist.min.js"></script>
  <script src="../vendor/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>

  <!-- Datepicker -->
  <script src="../vendor/vanillajs-datepicker/dist/js/datepicker.min.js"></script>

  <!-- Sweet Alerts 2 -->
  <script src="../vendor/sweetalert2/dist/sweetalert2.all.min.js"></script>

  <!-- Moment JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.27.0/moment.min.js"></script>

  <!-- Vanilla JS Datepicker -->
  <script src="../vendor/vanillajs-datepicker/dist/js/datepicker.min.js"></script>

  <!-- Notyf -->
  <script src="../vendor/notyf/notyf.min.js"></script>

  <!-- Simplebar -->
  <script src="../vendor/simplebar/dist/simplebar.min.js"></script>

  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>

  <!-- Volt JS -->
  <script src="../assets/js/volt.js"></script>


</body>

</html>