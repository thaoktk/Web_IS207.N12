<!--

=========================================================
* Volt Free - Bootstrap 5 Dashboard
=========================================================

* Product Page: https://themesberg.com/product/admin-dashboard/volt-bootstrap-5-dashboard
* Copyright 2021 Themesberg (https://www.themesberg.com)
* License (https://themesberg.com/licensing)

* Designed and coded by https://themesberg.com

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software. Please contact us to request a removal.

-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="120x120" href="../assets/img/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../assets/img/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/img/favicon/favicon-16x16.png">
    <link rel="manifest" href="../assets/img/favicon/site.webmanifest">
    <link rel="mask-icon" href="../assets/img/favicon/safari-pinned-tab.svg" color="#ffffff">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">

    <!-- Sweet Alert -->
    <link type="text/css" href="../vendor/sweetalert2/dist/sweetalert2.min.css" rel="stylesheet">

    <!-- Notyf -->
    <link type="text/css" href="../vendor/notyf/notyf.min.css" rel="stylesheet">

    <!-- Volt CSS -->
    <link type="text/css" href="../css/volt.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>

    <!-- NOTICE: You can use the _analytics.html partial to include production code specific code & trackers -->

</head>

<body>

    <!-- NOTICE: You can use the _analytics.html partial to include production code specific code & trackers -->
    <?php 
    include "connect.php";
    $result = mysqli_query($connect, "SELECT * FROM sanpham");
    
    ?>

    <?php
    $error = false;
    if (isset($_POST['submit-edit']) && $_POST['submit-edit'] == 'Lưu') { 
        $id = $_GET['idEdit'];
        try {
            $resultEdit = mysqli_query($connect, "UPDATE `sanpham` SET `MaLSP` = '" . $_POST['type-edit'] . "', `TenSP` = '" . $_POST['name-edit'] . "', `TenSeries` = '" . $_POST['name-series-edit'] . "', `ChiTiet` = '" . $_POST['detail-edit'] . "', `GiaGoc` = '" . $_POST['price-first-edit'] . "', `GiaTien` = '" . $_POST['price-sec-edit'] . "', `SoLuong` = '" . $_POST['quantity-edit'] . "', `HinhAnh` = '" . $_POST['image-edit'] . "', `MoTa` = '" . $_POST['desc-edit'] . "', `New` = '" . $_POST['new-edit'] . "', `Hot` = '" . $_POST['hot-edit'] . "', `SoSao` = '" . $_POST['star-edit'] . "', `SoDanhGia` = '" . $_POST['review-edit'] . "' WHERE `sanpham`.`MaSP` = $id");
            echo "<script>
            $(document).ready(function(){
            $('#edit-success').modal('show')
            });
            </script>
            <div class='container'>
                <div class='modal' id='edit-success' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
                    <div class='modal-dialog'>
                        <div class='modal-content'>
                            <div class='modal-header'>
                                <h4 class='modal-title' id='myModalLabel'>Thành công</h4>
                            </div>
                            <div class='modal-body'>
                                <p>Cập nhật thành công!</p>
                            </div>
                            <div class='modal-footer'>
                                <a href='product.php' type='button' class='btn btn-default' >OK</a>
                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->
            </div>";
        } catch (exception $e) {
            echo "<script>
            $(document).ready(function(){
            $('#edit-fail').modal('show')
            });
            </script>
            <div class='container'>
                <div class='modal' id='edit-fail' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
                    <div class='modal-dialog'>
                        <div class='modal-content'>
                            <div class='modal-header'>
                                <h4 class='modal-title' id='myModalLabel'>Thất bại</h4>
                            </div>
                            <div class='modal-body'>
                                <p>Sản phẩm đã tồn tại. Hãy nhập lại</p>
                            </div>
                            <div class='modal-footer'>
                                <a href='product.php' type='button' class='btn btn-default' >OK</a>
                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->
            </div>";
        }} ?>
   
    <?php
    $error = false;
    if (isset($_GET['idDel'])) { 
        try {
            $resultDelete = mysqli_query($connect, "DELETE FROM `sanpham` WHERE `MaSP` = " . $_GET['idDel']);
            echo "<script>
            $(document).ready(function(){
            $('#del-success').modal('show')
            });
            </script>
            <div class='container'>
                <div class='modal' id='del-success' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
                    <div class='modal-dialog'>
                        <div class='modal-content'>
                            <div class='modal-header'>
                                <h4 class='modal-title' id='myModalLabel'>Thành công</h4>
                            </div>
                            <div class='modal-body'>
                                <p>Xóa thành công!</p>
                            </div>
                            <div class='modal-footer'>
                                <a href='product.php' type='button' class='btn btn-default' >OK</a>
                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->
            </div>";
        } catch (exception $e) {
            echo "<script>
            $(document).ready(function(){
            $('#del-fail').modal('show')
            });
            </script>
            <div class='container'>
                <div class='modal' id='del-fail' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
                    <div class='modal-dialog'>
                        <div class='modal-content'>
                            <div class='modal-header'>
                                <h4 class='modal-title' id='myModalLabel'>Thất bại</h4>
                            </div>
                            <div class='modal-body'>
                                <p>Lỗi!</p>
                            </div>
                            <div class='modal-footer'>
                                <a href='product.php' type='button' class='btn btn-default' >OK</a>
                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->
            </div>";
        }} ?>

    <?php
    $where = "";
    $search = isset($_GET['search']) ? $_GET['search'] : "";
    if ($search) {
		$where = "WHERE TenSP LIKE '%$search%' or TenSeries LIKE '%$search%' or GiaTien LIKE '%$search%'";
        $result = mysqli_query($connect,"SELECT * FROM `sanpham` $where");
	}
    ?>

    <?php include "./components/header.php" ?>

    <main class="content">

        <nav class="navbar navbar-top navbar-expand navbar-dashboard navbar-dark ps-0 pe-2 pb-0">
            <div class="container-fluid px-0">
                <div class="d-flex justify-content-between w-100" id="navbarSupportedContent">
                    <div class="d-flex align-items-center">
                        <!-- Search form -->
                        <form class="navbar-search form-inline" id="navbar-search-main" method="GET">
                            <div class="input-group input-group-merge search-bar">
                                <span class="input-group-text" id="topbar-addon">
                                    <svg class="icon icon-xs" x-description="Heroicon name: solid/search"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                        aria-hidden="true">
                                        <path fill-rule="evenodd"
                                            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </span>
                                <input type="text" class="form-control" name="search" value="<?php echo isset($_GET['search']) ? $_GET['search'] : "" ?>" placeholder="Tìm kiếm sản phẩm">
                            </div>
                        </form>
                        <!-- / Search form -->
                    </div>
                    <div class="nav-item  ms-lg-3">
                        <a class="nav-link pt-1 px-0" href="#" role="button" aria-expanded="false">
                        <span class="mb-0 font-small fw-bold text-gray-900">Logout</span>
                        </a>
                    </div>
                </div>
            </div>
        </nav>

        <div class="py-4">
            <div class="d-flex justify-content-between w-100 flex-wrap">
                <div class="mb-3 mb-lg-0">
                    <h1 class="h4">Sản phẩm</h1>
                </div>
            </div>
        </div>

        <div class="mb-4">
            <button class="btn btn-secondary" type="button" data-bs-toggle='modal' data-bs-target='#modal-create-product'>Tạo sản phẩm mới</button>
            <a href="product.php" class="ms-3 btn btn-tertiary" type="button">Làm mới</a>
        </div>

        <div class="card border-0 shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-centered table-nowrap mb-0 rounded">
                        <thead class="thead-light">
                            <tr>
                                <th class="border-0 rounded-start">Mã SP</th>
                                <th class="border-0">Tên loại SP</th>
                                <th class="border-0">Ảnh</th>
                                <th class="border-0">Tên SP</th>
                                <th class="border-0">Tên Series</th>
                                <th class="border-0">Giá tiền</th>
                                <th class="border-0">SL</th>
                                <th class="border-0">Trạng thái</th>
                                <th class="border-0 rounded-end">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            while ($row = mysqli_fetch_array($result)) {
                                $resultTenLSP = mysqli_query($connect, "SELECT TenLSP FROM `loaisanpham` WHERE MaLSP = $row[1]");
                                $TenLSP = $resultTenLSP->fetch_column();
                                $trangThai = "";
                                $styleActive = "";
                                if ($row[7] > 0) {
                                    $trangThai = "Còn hàng";
                                    $styleActive = "text-success";
                                } else {
                                    $trangThai = "Hết hàng";
                                    $styleActive = "text-danger";
                                }

                                echo "
                                <tr>
                                <td>$row[0]</td>
                                <td>$TenLSP</td>
                                <td><img src='$row[8]' class='img-table'/></td>
                                <td>$row[2]</td>
                                <td>$row[3]</td>
                                <td>$row[6]</td>
                                <td>$row[7]</td>
                                <td class='$styleActive'>$trangThai</td>
                                <td>"?>
                                <div>
                                    <a href='#edit<?=$row[0]?>' data-bs-toggle='modal'><button class='btn btn-sm btn-primary' type='button'>Sửa</button></a>
                                    <a href="?idDel=<?=$row[0]?>" type="button" class='btn btn-sm btn-primary'>Xóa</a>
                                    <div class='modal fade' id='edit<?=$row[0]?>' tabindex='-1' role='dialog' aria-labelledby='modal-default' aria-hidden='true'>
                                    <div class='modal-dialog modal-dialog-centered' role='document'>
                                        <div class='modal-content'>
                                            <div class='modal-header'>
                                                <h2 class='h6 modal-title'>Sửa sản phẩm</h2>
                                                <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                            </div>
                                            <div class='modal-body'>
                                            <form action='?idEdit=<?=$row[0]?>' method='POST'>
                                                    <div class='mb-4'>
                                                        <label>Mã loại SP</label>
                                                        <input type='number' value="<?=$row[1]?>" class='form-control' name='type-edit'>
                                                    </div>
                                                    <div class='mb-4'>
                                                        <label>Tên SP</label>
                                                        <input type='text' value="<?=$row[2]?>" class='form-control' name='name-edit'>
                                                    </div>
                                                    <div class='mb-4'>
                                                        <label>Tên Series</label>
                                                        <input type='text' value="<?=$row[3]?>" class='form-control' name='name-series-edit'>
                                                    </div>
                                                    <div class='mb-4'>
                                                        <label>Chi tiết</label>
                                                        <textarea rows="4" cols="50" class='form-control' name='detail-edit'><?=$row[4]?></textarea>
                                                    </div>
                                                    <div class='mb-4'>
                                                        <label>Giá gốc</label>
                                                        <input type='number' value="<?=$row[5]?>" class='form-control' name='price-first-edit'>
                                                    </div>
                                                    <div class='mb-4'>
                                                        <label>Giá tiền</label>
                                                        <input type='number' value="<?=$row[6]?>" class='form-control' name='price-sec-edit'>
                                                    </div>
                                                    <div class='mb-4'>
                                                        <label>Số lượng</label>
                                                        <input type='number' value="<?=$row[7]?>" class='form-control' name='quantity-edit'>
                                                    </div>
                                                    <div class='mb-4'>
                                                        <label>Hình ảnh</label>
                                                        <input type='text' value="<?=$row[8]?>" class='form-control' name='image-edit'>
                                                    </div>
                                                    <div class='mb-4'>
                                                        <label>Mô tả</label>
                                                        <textarea rows="4" cols="50" class='form-control' name='desc-edit'><?=$row[9]?></textarea>
                                                    </div>
                                                    <div class='mb-4'>
                                                        <label>Là sản phẩm mới?</label>
                                                        <input type='number' value="<?=$row[10]?>" class='form-control' name='new-edit'>
                                                        <small class="form-text text-muted">Nhập vào số: 1 là mới, 0 là không mới.</small>
                                                    </div>
                                                    <div class='mb-4'>
                                                        <label>Là sản phẩm hot?</label>
                                                        <input type='number' value="<?=$row[11]?>" class='form-control' name='hot-edit'>
                                                        <small class="form-text text-muted">Nhập vào số: 1 là mới, 0 là không hot.</small>
                                                    </div>
                                                    <div class='mb-4'>
                                                        <label>Số sao</label>
                                                        <input type='number' value="<?=$row[12]?>" class='form-control' name='star-edit'>
                                                    </div>
                                                    <div class='mb-4'>
                                                        <label>Số đánh giá</label>
                                                        <input type='number' value="<?=$row[13]?>" class='form-control' name='review-edit'>
                                                    </div>
                                                    <div class='mb-4'>
                                                        <input type='submit' class='form-control w-100 btn btn-tertiary' name='submit-edit' value="Lưu">
                                                    </div>
                                                </form>
                                            </div>
                                            <div class='modal-footer'>
                                                <button type='button' class='btn btn-link text-gray-600 ms-auto' data-bs-dismiss='modal'>Hủy</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <?php "</div>
                                </td>
                            </tr>";
                            }

                            // mysqli_close($connect);
                            ?>
                            <!-- Item -->
                            
                            <!-- End of Item -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>


     <!-- Modal Content -->
     
    <!-- End of Modal Content -->

    <?php
    $error = false;
    if (isset($_POST['submit-create']) && $_POST['submit-create'] == 'Tạo') {
        try {
            $resultCreate = mysqli_query($connect, "INSERT INTO `sanpham` (`MaSP`, `MaLSP`, `TenSP`, `TenSeries`, `ChiTiet`, `GiaGoc`, `GiaTien`, `SoLuong`, `HinhAnh`, `MoTa`, `New`, `Hot`, `SoSao`, `SoDanhGia`) VALUES (NULL, '". $_POST['type-create'] ."', '". $_POST['name-create'] ."', '". $_POST['name-series-create'] ."', '". $_POST['detail-create'] ."', '". $_POST['price-first-create'] ."', '". $_POST['price-sec-create'] ."', '". $_POST['quantity-create'] ."', '". $_POST['image-create'] ."', '". $_POST['desc-create'] ."', '". $_POST['new-create'] ."', '". $_POST['hot-create'] ."', '0', '0');");
            echo "<script>
            $(document).ready(function(){
            $('#create').modal('show')
            });
            </script>
            <div class='container'>
                <div class='modal' id='create' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
                    <div class='modal-dialog'>
                        <div class='modal-content'>
                            <div class='modal-header'>
                                <h4 class='modal-title' id='myModalLabel'>Thành công</h4>
                            </div>
                            <div class='modal-body'>
                                <p>Tạo sản phẩm thành công!</p>
                            </div>
                            <div class='modal-footer'>
                                <a href='product.php' type='button' class='btn btn-default' >OK</a>
                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->
            </div>";
        } catch (exception $e) {
            echo "<script>
            $(document).ready(function(){
            $('#create-fail').modal('show')
            });
            </script>
            <div class='container'>
                <div class='modal' id='create-fail' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
                    <div class='modal-dialog'>
                        <div class='modal-content'>
                            <div class='modal-header'>
                                <h4 class='modal-title' id='myModalLabel'>Thất bại</h4>
                            </div>
                            <div class='modal-body'>
                                <p>Sản phẩm đã tồn tại. Hãy tạo sản phẩm khác</p>
                            </div>
                            <div class='modal-footer'>
                                <a href='product.php' type='button' class='btn btn-default' >OK</a>
                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->
            </div>";
        }} ?>
        
        
        <?php 
        $list_TenLSP = mysqli_query($connect, "SELECT MaLSP,TenLSP FROM loaisanpham");
        ?>
    <!-- Modal Content -->
    <div class='modal fade' id='modal-create-product' tabindex='-1' role='dialog' aria-labelledby='modal-default' aria-hidden='true'>
        <div class='modal-dialog modal-dialog-centered' role='document'>
            <div class='modal-content'>
                <div class='modal-header'>
                    <h2 class='h6 modal-title'>Sửa sản phẩm</h2>
                    <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                </div>
                <div class='modal-body'>
                <form method='POST'>
                        <div class='mb-4'>
                            <label>Loại SP</label>
                            <select name="type-create" id="">
                            <?php 
                            while ($row = mysqli_fetch_array($list_TenLSP)) {
                                echo "<option value='$row[0]'>$row[1]</option>";
                            }
                            ?>
                            </select>
                        </div>
                        <div class='mb-4'>
                            <label>Tên SP</label>
                            <input type='text' class='form-control' name='name-create'>
                        </div>
                        <div class='mb-4'>
                            <label>Tên Series</label>
                            <input type='text' class='form-control' name='name-series-create'>
                        </div>
                        <div class='mb-4'>
                            <label>Chi tiết</label>
                            <textarea rows="4" cols="50" class='form-control' name='detail-create'></textarea>
                        </div>
                        <div class='mb-4'>
                            <label>Giá gốc</label>
                            <input type='number' class='form-control' name='price-first-create'>
                        </div>
                        <div class='mb-4'>
                            <label>Giá tiền</label>
                            <input type='number' class='form-control' name='price-sec-create'>
                        </div>
                        <div class='mb-4'>
                            <label>Số lượng</label>
                            <input type='number' class='form-control' name='quantity-create'>
                        </div>
                        <div class='mb-4'>
                            <label>Hình ảnh</label>
                            <input type='text' class='form-control' name='image-create'>
                        </div>
                        <div class='mb-4'>
                            <label>Mô tả</label>
                            <textarea rows="4" cols="50" class='form-control' name='desc-create'></textarea>
                        </div>
                        <div class='mb-4'>
                            <label>Là sản phẩm mới?</label>
                            <input type='number' class='form-control' name='new-create'>
                            <small class="form-text text-muted">Nhập vào số: 1 là mới, 0 là không mới.</small>
                        </div>
                        <div class='mb-4'>
                            <label>Là sản phẩm hot?</label>
                            <input type='number' class='form-control' name='hot-create'>
                            <small class="form-text text-muted">Nhập vào số: 1 là mới, 0 là không hot.</small>
                        </div>
                        <div class='mb-4'>
                            <input type='submit' class='form-control w-100 btn btn-tertiary' name='submit-create' value="Tạo">
                        </div>
                    </form>
                </div>
                <div class='modal-footer'>
                    <button type='button' class='btn btn-link text-gray-600 ms-auto' data-bs-dismiss='modal'>Hủy</button>
                </div>
            </div>
    </div>
    <!-- End of Modal Content -->

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