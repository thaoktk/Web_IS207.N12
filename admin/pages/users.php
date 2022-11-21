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
    $result = mysqli_query($connect, "SELECT * FROM nguoidung");
    
    ?>

    <?php
    $error = false;
    if (isset($_POST['submit-edit']) && $_POST['submit-edit'] == 'Lưu') { 
        $id = $_GET['idEdit'];

        $resultEdit = mysqli_query($connect, "UPDATE `nguoidung` SET `Ho` = '" . $_POST['subname-edit'] . "', `Ten` = '" . $_POST['name-edit'] . "', `SDT` = '" . $_POST['phone-number-edit'] . "', `Email` = '" . $_POST['email-edit'] . "', `TaiKhoan` = '" . $_POST['account-edit'] . "', `MatKhau` = MD5('" . $_POST['pass-edit'] . "'), `MaQuyen` = '" . $_POST['privilege-edit'] . "', `TrangThai` = '" . $_POST['status-edit'] . "' WHERE `nguoidung`.`MaND` = $id");
        if (!$resultEdit) {
            $error = "Không thể cập nhật tài khoản";
        }  mysqli_close($connect);
        if ($error !== false) { ?>
            <script>
        $(document).ready(function(){
        $('#edit-fail').modal('show')
        });
        </script>
        <div class="container">
            <div class="modal" id="edit-fail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel">Thất bại</h4>
                        </div>
                        <div class="modal-body">
                            <p><?php echo $error ?></p>
                        </div>
                        <div class="modal-footer">
                            <a href="users.php" type="button" class="btn btn-default" >OK</a>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
        </div>
        <?php } else { ?>
            <script>
        $(document).ready(function(){
        $('#edit-success').modal('show')
        });
        </script>
        <div class="container">
            <div class="modal" id="edit-success" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel">Thành công</h4>
                        </div>
                        <div class="modal-body">
                            <p>Cập nhật thành công!</p>
                        </div>
                        <div class="modal-footer">
                            <a href="users.php" type="button" class="btn btn-default" >OK</a>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
        </div>
        <?php } } ?>
   
    <?php
    $error = false;
    if (isset($_GET['idDel'])) { 

        $resultDelete = mysqli_query($connect, "DELETE FROM `nguoidung` WHERE `MaND` = " . $_GET['idDel']);
        if (!$resultDelete) {
            $error = "Không thể xóa tài khoản";
        } 
         mysqli_close($connect);
        if ($error !== false) { ?>
            <script>
        $(document).ready(function(){
        $('#del-fail').modal('show')
        });
        </script>
        <div class="container">
            <div class="modal" id="del-fail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel">Thất bại</h4>
                        </div>
                        <div class="modal-body">
                            <p><?php echo $error ?></p>
                        </div>
                        <div class="modal-footer">
                            <a href="users.php" type="button" class="btn btn-default" >OK</a>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
        </div>
        <?php } else { ?>
            <script>
        $(document).ready(function(){
        $('#del-success').modal('show')
        });
        </script>
        <div class="container">
            <div class="modal" id="del-success" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel">Thành công</h4>
                        </div>
                        <div class="modal-body">
                            <p>Xóa thành công!</p>
                        </div>
                        <div class="modal-footer">
                            <a href="users.php" type="button" class="btn btn-default" >OK</a>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
        </div>
        <?php } } ?>

    <?php
    $where = "";
    $search = isset($_GET['search']) ? $_GET['search'] : "";
    if ($search) {
		$where = "WHERE TaiKhoan LIKE '%$search%' or SDT LIKE '%$search%' or Ho LIKE '%$search%' or Ten LIKE '%$search%' or Email LIKE '%$search%'";
        $result = mysqli_query($connect,"SELECT * FROM `nguoidung` $where");
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
                                <input type="text" class="form-control" name="search" value="<?php echo isset($_GET['search']) ? $_GET['search'] : "" ?>" placeholder="Tìm kiếm tài khoản">
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
                    <h1 class="h4">Người dùng</h1>
                </div>
            </div>
        </div>

        <div class="mb-4">
            <button class="btn btn-secondary" type="button" data-bs-toggle='modal' data-bs-target='#modal-create'>Tạo tài khoản mới</button>
            <a href="users.php" class="ms-3 btn btn-tertiary" type="button">Làm mới</a>
        </div>

        <div class="card border-0 shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-centered table-nowrap mb-0 rounded">
                        <thead class="thead-light">
                            <tr>
                                <th class="border-0 rounded-start">Mã người dùng</th>
                                <th class="border-0">Họ</th>
                                <th class="border-0">Tên</th>
                                <th class="border-0">SĐT</th>
                                <th class="border-0">Email</th>
                                <th class="border-0">Tài khoản</th>
                                <th class="border-0">Mã quyền</th>
                                <th class="border-0">Trạng thái</th>
                                <th class="border-0 rounded-end">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            while ($row = mysqli_fetch_array($result)) {
                                $trangThai = "";
                                $styleActive = "";
                                if ($row[8] == 1) {
                                    $trangThai = "Kích hoạt";
                                    $styleActive = "text-success";
                                } else {
                                    $trangThai = "Block";
                                    $styleActive = "text-danger";
                                }

                                echo "
                                <tr>
                                <td>$row[0]</td>
                                <td>$row[1]</td>
                                <td>$row[2]</td>
                                <td>$row[3]</td>
                                <td>$row[4]</td>
                                <td>$row[5]</td>
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
                                                <h2 class='h6 modal-title'>Sửa tài khoản</h2>
                                                <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                            </div>
                                            <div class='modal-body'>
                                                <form action='?idEdit=<?=$row[0]?>' method='POST'>
                                                    <div class='mb-4'>
                                                        <label>Họ</label>
                                                        <input type='text' value="<?=$row[1]?>" class='form-control' name='subname-edit'>
                                                    </div>
                                                    <div class='mb-4'>
                                                        <label>Tên</label>
                                                        <input type='text' value="<?=$row[2]?>" class='form-control' name='name-edit'>
                                                    </div>
                                                    <div class='mb-4'>
                                                        <label>SĐT</label>
                                                        <input type='number' value="<?=$row[3]?>" class='form-control' name='phone-number-edit'>
                                                    </div>
                                                    <div class='mb-4'>
                                                        <label>Email</label>
                                                        <input type='email' value="<?=$row[4]?>" class='form-control' name='email-edit'>
                                                    </div>
                                                    <div class='mb-4'>
                                                        <label>Tài khoản</label>
                                                        <input type='text' value="<?=$row[5]?>" class='form-control' name='account-edit'>
                                                    </div>
                                                    <div class='mb-4'>
                                                        <label>Mật khẩu</label>
                                                        <input type='text' value="<?=$row[6]?>" class='form-control' name='pass-edit'>
                                                    </div>
                                                    <div class='mb-4'>
                                                        <label>Mã quyền</label>
                                                        <input type='number' value="<?=$row[7]?>" class='form-control' name='privilege-edit'>
                                                    </div>
                                                    <div class='mb-4'>
                                                        <label>Trạng thái</label>
                                                        <input type='number' value="<?=$row[8]?>" class='form-control' name='status-edit'>
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

    <?php
    $error = false;
    if (isset($_POST['submit-create']) && $_POST['submit-create'] == 'Tạo') {
        $result = mysqli_query($connect, "INSERT INTO `nguoidung` (`MaND`, `Ho`, `Ten`, `SDT`, `Email`, `TaiKhoan`, `MatKhau`, `MaQuyen`, `TrangThai`) VALUES (NULL, '" . $_POST['subname-create'] . "', '" . $_POST['name-create'] . "', '" . $_POST['phone-number-create'] . "', '" . $_POST['email-create'] . "', '" . $_POST['account-create'] . "', MD5('" . $_POST['pass-create'] . "'), '" . $_POST['privilege-create'] . "', '1');");

        if (!$result) {
            if (strpos(mysqli_error($connect), "Duplicate entry") !== true) {
               $error = "Tài khoản đã tồn tại. Bạn vui lòng chọn tài khoản khác.";
            }
        }
        mysqli_close($connect);
        if ($error !== false) { ?>
            <script>
        $(document).ready(function(){
        $('#create-fail').modal('show')
        });
        </script>
        <div class="container">
            <div class="modal" id="create-fail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel">Thát bại</h4>
                        </div>
                        <div class="modal-body">
                            <p><?php echo $error ?></p>
                        </div>
                        <div class="modal-footer">
                            <a href="users.php" type="button" class="btn btn-default" >OK</a>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
        </div>
        <?php } else { ?>
            <script>
        $(document).ready(function(){
        $('#create').modal('show')
        });
        </script>
        <div class="container">
            <div class="modal" id="create" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel">Thành công</h4>
                        </div>
                        <div class="modal-body">
                            <p>Tạo tài khoản thành công!</p>
                        </div>
                        <div class="modal-footer">
                            <a href="users.php" type="button" class="btn btn-default" >OK</a>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
        </div>
        <?php } } ?>
                

    <!-- Modal Content -->
    <div class="modal fade" id="modal-create" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="h6 modal-title">Tạo tài khoản mới</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST">
                        <div class="mb-4">
                            <label>Họ</label>
                            <input type="text" required class="form-control" name="subname-create">
                        </div>
                        <div class="mb-4">
                            <label>Tên</label>
                            <input type="text" required class="form-control" name="name-create">
                        </div>
                        <div class="mb-4">
                            <label>SĐT</label>
                            <input type="number" required class="form-control" name="phone-number-create">
                        </div>
                        <div class="mb-4">
                            <label>Email</label>
                            <input type="email" required class="form-control" name="email-create">
                        </div>
                        <div class="mb-4">
                            <label>Tài khoản</label>
                            <input type="text" required class="form-control" name="account-create">
                        </div>
                        <div class="mb-4">
                            <label>Mật khẩu</label>
                            <input type="password" required class="form-control" name="pass-create">
                        </div>
                        <div class="mb-4">
                            <label>Mã quyền</label>
                            <input type="number" required class="form-control" name="privilege-create">
                        </div>
                        <div class="mb-4">
                            <label>Trạng thái</label>
                            <input type="number" required class="form-control" name="status-create">
                        </div>
                        <div class="mb-4">
                            <input type="submit" class="form-control w-100 btn btn-tertiary" name="submit-create" value="Tạo">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-link text-gray-600 ms-auto" data-bs-dismiss="modal">Hủy</button>
                </div>
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