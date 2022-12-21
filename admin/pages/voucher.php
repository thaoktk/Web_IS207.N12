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

    <!-- NOTICE: You can use the _analytics.html partial to include production code specific code & trackers -->

</head>

<body>

    <!-- NOTICE: You can use the _analytics.html partial to include production code specific code & trackers -->

    <?php 
    include "templates/connect.php";
    $result = mysqli_query($connect, "SELECT * FROM khuyenmai");
    
    ?>

<?php
    $where = "";
    $search = isset($_GET['search']) ? $_GET['search'] : "";
    if ($search) {
		$where = "WHERE CodeKM LIKE '%$search%' or GiaTriKM LIKE '%$search%'";
        $result = mysqli_query($connect,"SELECT * FROM `khuyenmai` $where");
	}
    ?>

<?php 
  session_start(); 
  $currentUserAdmin = isset($_SESSION['admin-user']) ? $_SESSION['admin-user'] : null;
  if (isset($_GET['action']) && $_GET['action'] == 'logout') {
    unset($_SESSION['admin-user']);
    header("Location: sign-in.php");
    } 

    if (isset($currentUserAdmin) && $currentUserAdmin['MaQuyen'] == 1) { ?>

    <?php include "./components/header.php" ?>
    <main class="content">

        <nav class="navbar navbar-top navbar-expand navbar-dashboard navbar-dark ps-0 pe-2 pb-0">
            <div class="container-fluid px-0">
                <div class="d-flex justify-content-between w-100" id="navbarSupportedContent">
                    <div class="d-flex align-items-center">
                        <!-- Search form -->
                        <form class="navbar-search form-inline" id="navbar-search-main">
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
                                <input type="text" class="form-control" id="topbarInputIconLeft" name="search" value="<?php echo isset($_GET['search']) ? $_GET['search'] : "" ?>" placeholder="Tìm kiếm"
                                    >
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
                    <h1 class="h4">Khuyến mãi</h1>
                </div>
            </div>
        </div>

        <div class="mb-4">
            <button class="btn btn-secondary" type="button" data-bs-toggle='modal' data-bs-target='#create'>Tạo khuyến mãi mới</button>
            <a href="voucher.php" class="ms-3 btn btn-tertiary" type="button">Làm mới</a>
        </div>

        <div class="card border-0 shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-centered table-nowrap mb-0 rounded">
                        <thead class="thead-light">
                            <tr>
                                <th class="border-0 rounded-start">Mã KM</th>
                                <th class="border-0">Loại KM</th>
                                <th class="border-0">Code</th>
                                <th class="border-0">Giá trị</th>
                                <th class="border-0">Số lượng</th>
                                <th class="border-0">Trạng thái</th>
                                <th class="border-0 rounded-end">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while ($row = mysqli_fetch_array($result)) {
                                $resultTenLKM = mysqli_query($connect, "SELECT TenLoaiKM FROM `loaikhuyenmai` WHERE MaLoaiKM = $row[2]");
                                $TenLKM = $resultTenLKM->fetch_column();
                                $trangThai = "";
                                $styleActive = "";
                                if ($row[4] > 0) {
                                    $trangThai = "Còn mã";
                                    $styleActive = "text-success";
                                } else {
                                    $trangThai = "Hết mã";
                                    $styleActive = "text-danger";
                                }

                                echo "<tr>
                                <td>$row[0]</td>
                                <td>
                                $TenLKM
                                </td>
                                <td>
                                $row[1]
                                </td>
                                <td>
                                ". number_format(($row[3])) ." VNĐ
                                </td>
                                <td>
                                $row[4]
                                </td>
                                <td class='$styleActive'>
                                    $trangThai
                                </td>
                                <td>"?>
                                <div>
                                    <?php 
                                    $list_LoaiKM = mysqli_query($connect, "SELECT MaLoaiKM, TenLoaiKM FROM loaikhuyenmai");
                                    ?>
                                    <a href='#edit<?=$row[0]?>' data-bs-toggle='modal'><button class='btn btn-sm btn-primary' type='button'>Sửa</button></a>
                                    <a type="button" class='btn btn-sm btn-primary btn-delete' data-voucher="<?=$row[0]?>">Xóa</a>
                                    <div class='modal fade modal-edit' id='edit<?=$row[0]?>' tabindex='-1' role='dialog' aria-labelledby='modal-default' aria-hidden='true'>
                                    <div class='modal-dialog modal-dialog-centered' role='document'>
                                        <div class='modal-content'>
                                            <div class='modal-header'>
                                                <h2 class='h6 modal-title'>Sửa khuyến mãi</h2>
                                                <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                            </div>
                                            <div class='modal-body'>
                                            <form id="voucher-edit-<?=$row[0]?>" class="form-edit" data-voucher="<?=$row[0]?>">
                                                    <div class='mb-4'>
                                                        <label class="d-block">Loại KM</label>
                                                        <select name="type-voucher-edit" id="">
                                                            <?php 
                                                            while ($rowLoaiKM = mysqli_fetch_array($list_LoaiKM)) {
                                                                $selected = $row[2] == $rowLoaiKM[0] ? "selected" : "";
                                                                echo "<option value='$rowLoaiKM[0]' $selected>$rowLoaiKM[1]</option>";
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                    <div class='mb-4'>
                                                        <label>Giá trị</label>
                                                        <input type='number' value="<?=$row[3]?>" class='form-control' name='price-edit' required>
                                                    </div>
                                                    <div class='mb-4'>
                                                        <label>Số lượng</label>
                                                        <input type='number' value="<?=$row[4]?>" class='form-control' name='qty-edit' required>
                                                    </div>
                                                    <div class='mb-4'>
                                                        <input type='submit' class='form-control w-100 btn btn-tertiary btn-edit' name='submit-edit' value="Lưu"  data-voucher="<?=$row[0]?>">
                                                    </div>
                                                </form>
                                            </div>
                                            <div class='modal-footer'>
                                                <button type='button' class='btn btn-link text-gray-600 ms-auto ' data-bs-dismiss='modal'>Hủy</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <?php "
                                </td>
                            </tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <?php 
            $list_LoaiKM = mysqli_query($connect, "SELECT MaLoaiKM, TenLoaiKM FROM loaikhuyenmai");
            ?>

        <div class='modal fade' id='create' tabindex='-1' role='dialog' aria-labelledby='modal-default' aria-hidden='true'>
            <div class='modal-dialog modal-dialog-centered' role='document'>
                <div class='modal-content'>
                    <div class='modal-header'>
                        <h2 class='h6 modal-title'>Tạo khuyến mãi</h2>
                        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                    </div>
                    <div class='modal-body'>
                    <form class="form-create">
                            <div class='mb-4'>
                                <label class="d-block">Loại KM</label>
                                <select name="type-voucher-create" id="">
                                    <?php 
                                    while ($rowLoaiKM = mysqli_fetch_array($list_LoaiKM)) {
                                        echo "<option value='$rowLoaiKM[0]'>$rowLoaiKM[1]</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class='mb-4'>
                                <label>Code</label>
                                <input type="text" maxlength="10" class='form-control code-voucher' name='code-create' required>
                                <button class="mt-3 btn btn-secondary generator" type="button">Tạo code</button>
                            </div>
                            <div class='mb-4'>
                                <label>Giá trị</label>
                                <input type='number'class='form-control' name='price-create' required>
                            </div>
                            <div class='mb-4'>
                                <label>Số lượng</label>
                                <input type='number' class='form-control' name='qty-create' required>
                            </div>
                            <div class='mb-4'>
                                <input type='submit' class='form-control w-100 btn btn-tertiary btn-create' name='submit-create' value="Lưu">
                            </div>
                        </form>
                    </div>
                    <div class='modal-footer'>
                        <button type='button' class='btn btn-link text-gray-600 ms-auto' data-bs-dismiss='modal'>Hủy</button>
                    </div>
                </div>
            </div>
        </div>

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

    <!-- Core -->
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
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
        var generated = '',
            possible  =  "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";

        function generateCodes(length) {
            generated = generateCode(length);
            $(".code-voucher").val(generated);
        }

        function generateCode(length) {
            var text = "";

            for ( var i=0; i < length; i++ ) {
                text += possible.charAt(Math.floor(Math.random() * possible.length));
            }

            return text;
        }

        $(".generator").on("click", function(e) {
            generateCodes(10);
            return false;
            });

        $("#create").on('hidden.bs.modal', function () {
            $(this).find("form").trigger("reset");
        });

        $(".modal-edit").on('hidden.bs.modal', function () {
            $(this).find("form").trigger("reset");
        });

        $(".form-edit").each(function() {
            $(this).submit(function(e) {
                e.preventDefault()
                idForm = $(this).attr("id")
                loaiKM = $(`#${idForm} select[name="type-voucher-edit"]`).val()
                giaTri = $(`#${idForm} input[name="price-edit"]`).val()
                sluong = $(`#${idForm} input[name="qty-edit"]`).val()
                idKM = $(this).data("voucher")

                if (Number(sluong) < 0) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Lỗi',
                        text: 'Só lượng không được nhỏ hơn 0!',
                        })
                    return;
                }

                if (loaiKM == 1) {
                    if (Number(giaTri) > 50000) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Lỗi',
                            text: 'Giá trị của khuyến mãi vận chuyển không được lớn hơn 50,000 đồng!',
                            })
                        return;
                    }
                } else {
                    if (Number(giaTri) > 500000) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Lỗi',
                            text: 'Giá trị của khuyến mãi đơn hàng không được lớn hơn 500,000 đồng!',
                            })
                        return;
                    }
                }

                $.ajax({
                        type: "POST",
                        url: "templates/request.php",
                        dataType: "json",
                        data: {
                            request: "update_voucher",
                            idKM: idKM,
                            loaiKM: loaiKM,
                            giaTri: giaTri,
                            sluong: sluong
                        },
                        success: function () {
                            Swal.fire({
                                icon: 'success',
                                title: 'Thành công',
                                text: 'Cập nhật khuyến mãi thành công!',
                                }).then(function() {
                                window.location.reload()
                            })
                        },
                        error: function (e) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Lỗi',
                                text: 'Đã xảy ra lỗi!',
                                })
                        }
                    })
            })
        })

        $(".form-create").submit(function(e) {
            e.preventDefault()
            loaiKM = $(`select[name="type-voucher-create"]`).val()
            giaTri = $(`input[name="price-create"]`).val()
            sluong = $(`input[name="qty-create"]`).val()
            code = $(`input[name="code-create"]`).val()

            if (Number(sluong) < 0) {
                Swal.fire({
                    icon: 'error',
                    title: 'Lỗi',
                    text: 'Só lượng không được nhỏ hơn 0!',
                    })
                return;
            }

            if (loaiKM == 1) {
                if (Number(giaTri) > 50000) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Lỗi',
                        text: 'Giá trị của khuyến mãi vận chuyển không được lớn hơn 50,000 đồng!',
                        })
                    return;
                }
            } else {
                if (Number(giaTri) > 500000) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Lỗi',
                        text: 'Giá trị của khuyến mãi đơn hàng không được lớn hơn 500,000 đồng!',
                        })
                    return;
                }
            }

            $.ajax({
                        type: "POST",
                        url: "templates/request.php",
                        dataType: "json",
                        data: {
                            request: "insert_voucher",
                            code: code,
                            loaiKM: loaiKM,
                            giaTri: giaTri,
                            sluong: sluong
                        },
                        success: function () {
                            Swal.fire({
                                icon: 'success',
                                title: 'Thành công',
                                text: 'Tạo khuyến mãi mới thành công!',
                                }).then(function() {
                                window.location.reload()
                            })
                        },
                        error: function (e) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Lỗi',
                                text: 'Đã xảy ra lỗi!',
                                })
                        }
                    })
        })

        $(".btn-delete").each(function() {
            $(this).click(function() {
                idKM = $(this).data("voucher")
                $.ajax({
                        type: "POST",
                        url: "templates/request.php",
                        dataType: "json",
                        data: {
                            request: "delete_voucher",
                            idKM: idKM,
                        },
                        success: function () {
                            Swal.fire({
                                icon: 'success',
                                title: 'Thành công',
                                text: 'Xóa khuyến mãi thành công!',
                                }).then(function() {
                                window.location.reload()
                            })
                        },
                        error: function (e) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Lỗi',
                                text: 'Đã xảy ra lỗi!',
                                })
                        }
                    })
            })
        })
    </script>

</body>

</html>