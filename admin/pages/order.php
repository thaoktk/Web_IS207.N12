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
    include "templates/connect.php";
    $result = mysqli_query($connect, "SELECT * FROM donhang");
    
    ?>

    <?php
    $where = "";
    $search = isset($_GET['search']) ? $_GET['search'] : "";
    if ($search) {
		$where = "WHERE HoTen LIKE '%$search%' or SDT LIKE '%$search%' or DiaChi LIKE '%$search%' or GhiChu LIKE '%$search%'";
        $result = mysqli_query($connect,"SELECT * FROM `donhang` $where");
	}
    ?>

<?php 
  session_start(); 
  $currentUserAdmin = $_SESSION['admin-user'];
  if (isset($_GET['action']) && $_GET['action'] == 'logout') {
    unset($_SESSION['admin-user']);
    header("Location: sign-in.php");
    } 

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
                                <input type="text" class="form-control" name="search" value="<?php echo isset($_GET['search']) ? $_GET['search'] : "" ?>" placeholder="Tìm kiếm tài khoản">
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
                    <h1 class="h4">Đơn hàng</h1>
                </div>
            </div>
        </div>

        <div class="mb-4">
            <a href="order.php" class="btn btn-tertiary" type="button">Làm mới</a>
        </div>

        <div class="card border-0 shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-centered table-nowrap mb-0 rounded">
                        <thead class="thead-light">
                            <tr>
                                <th class="border-0 rounded-start">Mã đơn</th>
                                <th class="border-0">Tài khoản</th>
                                <th class="border-0">Ngày mua</th>
                                <th class="border-0">Họ tên</th>
                                <th class="border-0">SDT</th>
                                <th class="border-0">Địa chỉ</th>
                                <th class="border-0">Giảm giá vận chuyển</th>
                                <th class="border-0">Giảm giá đơn hàng</th>
                                <th class="border-0">Sản phẩm</th>
                                <th class="border-0">Ghi chú</th>
                                <th class="border-0">Tổng tiền</th>
                                <th class="border-0">Trạng thái</th>
                                <th class="border-0 rounded-end">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            while ($row = mysqli_fetch_array($result)) {
                                $resultAccount = mysqli_query($connect, "SELECT TaiKhoan from nguoidung where MaND = $row[1]");
                                $resultAccount = $resultAccount->fetch_column();
                                echo "
                                <tr>
                                <td>$row[0]</td>
                                <td>$resultAccount</td>
                                <td>$row[2]</td>
                                <td>$row[3]</td>
                                <td>$row[4]</td>
                                <td>$row[5]</td>
                                <td><span>".number_format($row[6])."</span> <span>VNĐ</span></td>
                                <td><span>".number_format($row[7])."</span> <span>VNĐ</span></td>
                                <td>
                                    <a data-order='$row[0]' data-bs-toggle='modal' class='btn-detail'><button class='btn btn-sm btn-primary' type='button'>Chi tiết</button></a>
                                </td>
                                <td>$row[8]</td>
                                <td><span>".number_format($row[9])."</span> <span>VNĐ</span></td>
                                <td>$row[10]</td>
                                <td>"?>
                                <div>
                                    <a href='#edit<?=$row[0]?>' data-bs-toggle='modal'><button class='btn btn-sm btn-primary' type='button'>Sửa</button></a>
                                    <div class='modal fade' id='edit<?=$row[0]?>' tabindex='-1' role='dialog' aria-labelledby='modal-default' aria-hidden='true'>
                                    <div class='modal-dialog modal-dialog-centered' role='document'>
                                        <div class='modal-content'>
                                            <div class='modal-header'>
                                                <h2 class='h6 modal-title'>Sửa đơn hàng</h2>
                                                <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                            </div>
                                            <div class='modal-body'>
                                                <form id="order-edit-<?=$row[0]?>" class="form-edit" data-order="<?=$row[0]?>">
                                                    <div class='mb-4'>
                                                        <label class="d-block">Trạng thái</label>
                                                        <select name="status-edit" id="">
                                                            <option value="Đã giao" <?php if ($row[10] == 'Đã giao') {echo "selected";} ?>>Đã giao</option>
                                                            <option value="Chưa giao" <?php if ($row[10] == 'Chưa giao') {echo "selected";} ?>>Chưa giao</option>
                                                            <option value="Đang giao" <?php if ($row[10] == 'Đang giao') {echo "selected";} ?>>Đang giao</option>
                                                        </select>
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

    <!-- Modal Content -->
    <div class="modal fade" id="modal-detail" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="h6 modal-title">Chi tiết đơn hàng</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table class="table table-centered table-nowrap mb-0 rounded">
                        <thead class="thead-light">
                            <tr>
                                <th class="border-0 rounded-start">Hình ảnh</th>
                                <th class="border-0">Tên sản phẩm</th>
                                <th class="border-0">Giá tiền</th>
                                <th class="border-0 rounded-end">Số lượng</th>
                            </tr>
                        </thead>
                        <tbody class="table-body">

                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-link text-gray-600 ms-auto" data-bs-dismiss="modal">Hủy</button>
                </div>
            </div>
        </div>
    </div>
    <!-- End of Modal Content -->
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
        $(document).ready(function() {
            $(".form-edit").each(function() {
                    $(this).submit(function(e) {
                        e.preventDefault()
                        idForm = $(this).attr("id")
                        trangThai = $(`#${idForm} select[name="status-edit"]`).val()
                        idOrder = $(this).data("order")

                        $.ajax({
                                type: "POST",
                                url: "templates/request.php",
                                dataType: "json",
                                data: {
                                    request: "update_order",
                                    idOrder: idOrder,
                                    trangThai: trangThai,
                                },
                                success: function () {
                                    alert("Cập nhật thông tin đơn hàng thành công!")
                                    window.location.reload();
                                },
                                error: function (e) {
                                    alert("Đã xảy ra lỗi!")
                                }
                        })
                    })
            })

            $(".btn-detail").each(function() {
                $(this).click(function() {
                    idOrder = $(this).data("order")
                    $.ajax({
                        type: "POST",
                        url: "templates/request.php",
                        dataType: "json",
                        data: {
                            request: "getDetailOrder",
                            idOrder: idOrder
                        },
                        success: function(data) {
                            let tr;
                            for (let item of data) {
                                tr += `
                                <tr>
                                <td>
                                    <img src='${item.hinhAnh}' class='img-table'/>
                                </td>
                                <td><p class='text-ellipse' title='${item.tenSP}'>${item.tenSP}</p></td>
                                <td><span>${item.gia}</span><span>VNĐ</span></td>
                                <td class='text-center'>${item.sluong}</td>
                                </tr>
                                `
                            }
                            $('#modal-detail').modal('show')
                            $(".table-body").html(tr)
                        },
                        error: function (e) {
                        }
                    })
                })
            })
        })
    </script>

</body>

</html>