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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Trumbowyg/2.26.0/ui/trumbowyg.min.css" integrity="sha512-Zi7Hb6P4D2nWzFhzFeyk4hzWxBu/dttyPIw/ZqvtIkxpe/oCAYXs7+tjVhIDASEJiU3lwSkAZ9szA3ss3W0Vug==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- NOTICE: You can use the _analytics.html partial to include production code specific code & trackers -->

</head>

<body>

    <!-- NOTICE: You can use the _analytics.html partial to include production code specific code & trackers -->
    <?php 
    include "templates/connect.php";
    $result = mysqli_query($connect, "SELECT * FROM sanpham");
    
    ?>

    <?php
    $where = "";
    $search = isset($_GET['search']) ? $_GET['search'] : "";
    if ($search) {
		$where = "WHERE TenSP LIKE '%$search%' or TenSeries LIKE '%$search%' or GiaTien LIKE '%$search%'";
        $result = mysqli_query($connect,"SELECT * FROM `sanpham` $where");
	}
    ?>
    <?php 
  session_start(); 
  $currentUserAdmin = $_SESSION['admin-user'];
//   if (!empty($currentUserAdmin)) {
//     header("Location: ../../login.php");
// }

  if ($currentUserAdmin['MaQuyen'] == 1) { ?>

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
                        <a class="nav-link pt-1 px-0" href="?action=logout" role="button" aria-expanded="false">
                        <span class="mb-0 font-small fw-bold text-gray-900">Đăng xuất</span>
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
                                <th class="border-0">Tên sản phẩm</th>
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
                                if ($row[9] > 0) {
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
                                <td><img src='$row[10]' class='img-table'/></td>
                                <td>$row[2]</td>
                                <td>$row[3]</td>
                                <td>$row[8]</td>
                                <td>$row[9]</td>
                                <td class='$styleActive'>$trangThai</td>
                                <td>"?>
                                <div>
                                    <?php
                                    $list_TenLSP = mysqli_query($connect, "SELECT MaLSP, TenLSP FROM loaisanpham");
                                    $list_Ram = mysqli_query($connect, "SELECT Distinct(Ram) FROM sanpham order by Ram");
                                    $list_Rom = mysqli_query($connect, "SELECT Distinct(Rom) FROM sanpham order by Rom");
                                    ?>
                                    <a href='#edit<?=$row[0]?>' data-bs-toggle='modal'><button class='btn btn-sm btn-primary' type='button'>Sửa</button></a>
                                    <a data-product="<?=$row[0]?>" type="button" class='btn btn-sm btn-primary btn-delete'>Xóa</a>
                                    <div class='modal fade modal-edit' id='edit<?=$row[0]?>' tabindex='-1' role='dialog' aria-labelledby='modal-default' aria-hidden='true'>
                                    <div class='modal-dialog modal-dialog-centered' role='document'>
                                        <div class='modal-content'>
                                            <div class='modal-header'>
                                                <h2 class='h6 modal-title'>Sửa sản phẩm</h2>
                                                <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                            </div>
                                            <div class='modal-body'>
                                            <form id="product-edit-<?=$row[0]?>" class="form-edit" data-product="<?=$row[0]?>">
                                                    <div class='mb-4'>
                                                        <label class="d-block">Tên loại sản phẩm</label>
                                                        <select name="type-edit" id="">
                                                            <?php 
                                                            while ($rowTenLSP = mysqli_fetch_array($list_TenLSP)) {
                                                                $selected = $row[1] == $rowTenLSP[0] ? "selected" : "";
                                                                echo "<option value='$rowTenLSP[0]' $selected>$rowTenLSP[1]</option>";
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                    <div class='mb-4'>
                                                        <label>Tên sản phẩm</label>
                                                        <input type='text' value="<?=$row[2]?>" class='form-control' name='name-edit' required>
                                                    </div>
                                                    <div class='mb-4'>
                                                        <label>Tên Series</label>
                                                        <input type='text' value="<?=$row[3]?>" class='form-control' name='name-series-edit' required>
                                                    </div>
                                                    <div class='mb-4'>
                                                        <label class="d-block">Ram</label>
                                                        <select name="ram-edit" id="">
                                                        <?php 
                                                        while ($rowRam = mysqli_fetch_array($list_Ram)) {
                                                            $selected = $row[4] == $rowRam[0] ? "selected" : "";
                                                            echo "<option value='$rowRam[0]' $selected>$rowRam[0]</option>";
                                                        }
                                                        ?>
                                                        </select>
                                                    </div>
                                                    <div class='mb-4'>
                                                        <label class="d-block">Rom</label>
                                                        <select name="rom-edit" id="">
                                                        <?php 
                                                        while ($rowRom = mysqli_fetch_array($list_Rom)) {
                                                            $selected = $row[5] == $rowRom[0] ? "selected" : "";
                                                            echo "<option value='$rowRom[0]' $selected>$rowRom[0]</option>";
                                                        }
                                                        ?>
                                                        </select>
                                                    </div>
                                                    <div class='mb-4'>
                                                        <label>Chi tiết</label>
                                                        <textarea rows="4" cols="50" class='form-control content-blog' name='detail-edit' required><?=$row[6]?></textarea>
                                                    </div>
                                                    <div class='mb-4'>
                                                        <label>Giá gốc</label>
                                                        <input type='number' value="<?=$row[7]?>" class='form-control' name='price-first-edit' required>
                                                    </div>
                                                    <div class='mb-4'>
                                                        <label>Giá tiền</label>
                                                        <input type='number' value="<?=$row[8]?>" class='form-control' name='price-sec-edit' required>
                                                    </div>
                                                    <div class='mb-4'>
                                                        <label>Số lượng</label>
                                                        <input type='number' value="<?=$row[9]?>" class='form-control' name='quantity-edit' required>
                                                    </div>
                                                    <div class='mb-4'>
                                                        <label>Hình ảnh</label>
                                                        <input type='text' value="<?=$row[10]?>" class='form-control' name='image-edit' required>
                                                    </div>
                                                    <div class='mb-4'>
                                                        <label>Mô tả</label>
                                                        <textarea rows="4" cols="50" class='form-control content-blog' name='desc-edit' required><?=$row[11]?></textarea>
                                                    </div>
                                                    <div class='mb-4'>
                                                        <label class="d-block">Là sản phẩm mới?</label>
                                                        <select name="new-edit" id="">
                                                            <option value='0' <?php if ($row[12] == '0') { ?> selected <?php }?>>Cũ</option>
                                                            <option value='1' <?php if ($row[12] == '1') { ?> selected <?php }?>>Mới</option>
                                                        </select>
                                                    </div>
                                                    <div class='mb-4'>
                                                        <label class="d-block">Là sản phẩm hot?</label>
                                                        <select name="hot-edit" id="">
                                                            <option value='0' <?php if ($row[13] == '0') { ?> selected <?php }?>>Không hot</option>
                                                            <option value='1' <?php if ($row[13] == '1') { ?> selected <?php }?>>Hot</option>
                                                        </select>
                                                    </div>
                                                    <div class='mb-4'>
                                                        <label>Số sao</label>
                                                        <input type='number' value="<?=$row[14]?>" class='form-control' name='star-edit' required>
                                                    </div>
                                                    <div class='mb-4'>
                                                        <label>Số đánh giá</label>
                                                        <input type='number' value="<?=$row[15]?>" class='form-control' name='review-edit' required>
                                                    </div>
                                                    <div class='mb-4'>
                                                        <input type='submit' class='form-control w-100 btn btn-tertiary btn-edit' name='submit-edit' value="Lưu" data-product="<?=$row[0]?>">
                                                    </div>
                                                </form>
                                            </div>
                                            <div class='modal-footer'>
                                                <button type='button' class='btn btn-link text-gray-600 ms-auto' data-bs-dismiss='modal'>Hủy</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <?php "
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
    $list_TenLSP = mysqli_query($connect, "SELECT MaLSP, TenLSP FROM loaisanpham");
    $list_Ram = mysqli_query($connect, "SELECT Distinct(Ram) FROM sanpham order by Ram");
    $list_Rom = mysqli_query($connect, "SELECT Distinct(Rom) FROM sanpham order by Rom");
    ?>
    <!-- Modal Content -->
    <div class='modal fade modal-create' id='modal-create-product' tabindex='-1' role='dialog' aria-labelledby='modal-default' aria-hidden='true'>
        <div class='modal-dialog modal-dialog-centered' role='document'>
            <div class='modal-content'>
                <div class='modal-header'>
                    <h2 class='h6 modal-title'>Tạo sản phẩm</h2>
                    <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                </div>
                <div class='modal-body'>
                <form class="form-create">
                        <div class='mb-4'>
                            <label class="d-block">Loại sản phẩm</label>
                            <select name="type-create" id="">
                            <?php 
                            while ($rowTenLSp = mysqli_fetch_array($list_TenLSP)) {
                                echo "<option value='$rowTenLSp[0]'>$rowTenLSp[1]</option>";
                            }
                            ?>
                            </select>
                        </div>
                        <div class='mb-4'>
                            <label>Tên sản phẩm</label>
                            <input type='text' class='form-control' name='name-create' required>
                        </div>
                        <div class='mb-4'>
                            <label>Tên Series</label>
                            <input type='text' class='form-control' name='name-series-create' required>
                        </div>
                        <div class='mb-4'>
                            <label class="d-block">Ram</label>
                            <select name="ram-create" id="">
                            <?php 
                            while ($rowRam = mysqli_fetch_array($list_Ram)) {
                                echo "<option value='$rowRam[0]'>$rowRam[0]</option>";
                            }
                            ?>
                            </select>
                        </div>
                        <div class='mb-4'>
                            <label class="d-block">Rom</label>
                            <select name="rom-create" id="">
                            <?php 
                            while ($rowRom = mysqli_fetch_array($list_Rom)) {
                                echo "<option value='$rowRom[0]'>$rowRom[0]</option>";
                            }
                            ?>
                            </select>
                        </div>
                        <div class='mb-4'>
                            <label>Chi tiết</label>
                            <textarea rows="4" cols="50" class='form-control content-blog' name='detail-create' required></textarea>
                        </div>
                        <div class='mb-4'>
                            <label>Giá gốc</label>
                            <input type='number' class='form-control' name='price-first-create' required>
                        </div>
                        <div class='mb-4'>
                            <label>Giá tiền</label>
                            <input type='number' class='form-control' name='price-sec-create' required>
                        </div>
                        <div class='mb-4'>
                            <label>Số lượng</label>
                            <input type='number' class='form-control' name='quantity-create' required>
                        </div>
                        <div class='mb-4'>
                            <label>Hình ảnh</label>
                            <input type='text' class='form-control' name='image-create' required>
                        </div>
                        <div class='mb-4'>
                            <label>Mô tả</label>
                            <textarea rows="4" cols="50" class='form-control content-blog' name='desc-create' required></textarea>
                        </div>
                        <div class='mb-4'>
                            <label class="d-block">Là sản phẩm mới?</label>
                            <select name="new-create" id="">
                                <option value='0'>Cũ</option>
                                <option value='1'>Mới</option>
                            </select>
                        </div>
                        <div class='mb-4'>
                            <label class="d-block">Là sản phẩm hot?</label>
                            <select name="hot-create" id="">
                                <option value='0'>Không hot</option>
                                <option value='1'>Hot</option>
                            </select>
                        </div>
                        <div class='mb-4'>
                            <input type='submit' class='form-control w-100 btn btn-tertiary btn-create' name='submit-create' value="Tạo">
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
    <?php } else {
    echo "<main class=''>
    <div class='mt-5 w-100 h-100'>
    <h1 class='text-center'>Thông báo</h1>
    <h4 class='mt-4 text-center'>Bạn không có quyền vào trang này!</h4>
    <div class='mt-4 d-flex justify-content-center'>
      <a href='sign-in.php' class='btn btn-primary'>Quay lại</a>
    </div>
  </div>
    </main>";
   }?>
    
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Trumbowyg/2.26.0/trumbowyg.min.js" integrity="sha512-ZfWLe+ZoWpbVvORQllwYHfi9jNHUMvXR4QhjL1I6IRPXkab2Rquag6R0Sc1SWUYTj20yPEVqmvCVkxLsDC3CRQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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
   <script>
      $(document).ready(function() {
        $('.content-blog').trumbowyg({
            btns: [
                ['viewHTML'],
                ['undo', 'redo'], 
            ],
        });

        $(".content-blog").css("min-height", "300px");

        $(".modal-edit").on('hidden.bs.modal', function () {
            $(this).find("form").trigger("reset");
        });

        $(".modal-create").on('hidden.bs.modal', function () {
            $(this).find("form").trigger("reset");
        });

        $(".form-edit").each(function() {
            $(this).submit(function(e) {
                e.preventDefault()
                idForm = $(this).attr("id")
                loaiSP = $(`#${idForm} select[name="type-edit"]`).val()
                tenSP = $(`#${idForm} input[name="name-edit"]`).val()
                tenSeries = $(`#${idForm} input[name="name-series-edit"]`).val()
                chiTiet = $(`#${idForm} textarea[name="detail-edit"]`).val()
                giaGoc = $(`#${idForm} input[name="price-first-edit"]`).val()
                giaTien = $(`#${idForm} input[name="price-sec-edit"]`).val()
                sluong = $(`#${idForm} input[name="quantity-edit"]`).val()
                hinhAnh = $(`#${idForm} input[name="image-edit"]`).val()
                moTa = $(`#${idForm} textarea[name="desc-edit"]`).val()
                New = $(`#${idForm} select[name="new-edit"]`).val()
                hot = $(`#${idForm} select[name="hot-edit"]`).val()
                soSao = $(`#${idForm} input[name="star-edit"]`).val()
                soDanhGia = $(`#${idForm} input[name="review-edit"]`).val()
                ram = $(`#${idForm} select[name="ram-edit"]`).val()
                rom = $(`#${idForm} select[name="rom-edit"]`).val()
                idSP = $(this).data("product")

                if (Number(giaGoc) < Number(giaTien)) {
                    alert("Giá gốc không được nhỏ hơn giá tiền của sản phẩm!")
                    return;
                }
                $.ajax({
                        type: "POST",
                        url: "templates/request.php",
                        dataType: "json",
                        data: {
                            request: "update_product",
                            idSP: idSP,
                            loaiSP: loaiSP,
                            tenSP: tenSP,
                            tenSeries: tenSeries,
                            chiTiet: chiTiet,
                            giaGoc: giaGoc,
                            giaTien: giaTien,
                            sluong: sluong,
                            hinhAnh: hinhAnh,
                            moTa: moTa,
                            New: New,
                            hot: hot,
                            soSao: soSao,
                            soDanhGia: soDanhGia,
                            ram: ram,
                            rom: rom,
                        },
                        success: function () {
                            alert("Cập nhật sản phẩm thành công!")
                            window.location.reload();
                        },
                        error: function (e) {
                            alert("Đã xảy ra lỗi!")
                        }
                })
            })
        })

        $(".form-create").submit(function(e) {
            e.preventDefault()
            loaiSP = $(`select[name="type-create"]`).val()
            tenSP = $(`input[name="name-create"]`).val()
            tenSeries = $(`input[name="name-series-create"]`).val()
            chiTiet = $(`textarea[name="detail-create"]`).val()
            giaGoc = $(`input[name="price-first-create"]`).val()
            giaTien = $(`input[name="price-sec-create"]`).val()
            sluong = $(`input[name="quantity-create"]`).val()
            hinhAnh = $(`input[name="image-create"]`).val()
            moTa = $(`textarea[name="desc-create"]`).val()
            New = $(`select[name="new-create"]`).val()
            hot = $(`select[name="hot-create"]`).val()
            ram = $(`select[name="ram-create"]`).val()
            rom = $(`select[name="rom-create"]`).val()
            $.ajax({
                    type: "POST",
                    url: "templates/request.php",
                    dataType: "json",
                    data: {
                        request: "insert_product",
                        loaiSP: loaiSP,
                        tenSP: tenSP,
                        tenSeries: tenSeries,
                        chiTiet: chiTiet,
                        giaGoc: giaGoc,
                        giaTien: giaTien,
                        sluong: sluong,
                        hinhAnh: hinhAnh,
                        moTa: moTa,
                        New: New,
                        hot: hot,
                        ram: ram,
                        rom: rom,
                    },
                    success: function () {
                        alert("Tạo mới sản phẩm thành công!")
                        window.location.reload();
                    },
                    error: function (e) {
                        alert("Đã xảy ra lỗi!")
                    }
            })
        })

        $(".btn-delete").each(function() {
            $(this).click(function() {
                idSP = $(this).data("product")
                $.ajax({
                        type: "POST",
                        url: "templates/request.php",
                        dataType: "json",
                        data: {
                            request: "delete_product",
                            idSP: idSP,
                        },
                        success: function () {
                            alert("Xóa sản phẩm thành công!")
                            window.location.reload();
                        },
                        error: function (e) {
                            alert("Đã xảy ra lỗi!")
                            
                        }
                    })
            })
        })
    });
   </script>

</body>

</html>