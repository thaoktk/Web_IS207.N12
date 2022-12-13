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
    <!-- Primary Meta Tags -->
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
    $result = mysqli_query($connect, "SELECT * FROM tintuc");
    
    ?>

<?php
    $where = "";
    $search = isset($_GET['search']) ? $_GET['search'] : "";
    if ($search) {
		$where = "WHERE TieuDe LIKE '%$search%' or NoiDung LIKE '%$search%'";
        $result = mysqli_query($connect,"SELECT * FROM `tintuc` $where");
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
                                <input type="text" class="form-control" id="topbarInputIconLeft" placeholder="Tìm kiếm"
                                    aria-label="Search" aria-describedby="topbar-addon">
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
                    <h1 class="h4">Tin tức</h1>
                </div>
            </div>
        </div>

        <div class="mb-4">
            <button class="btn btn-secondary" type="button" data-bs-toggle='modal' data-bs-target='#modal-create'>Tạo tin tức mới</button>
            <a href="blog.php" class="ms-3 btn btn-tertiary" type="button">Làm mới</a>
        </div>

        <div class="card border-0 shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-centered table-nowrap mb-0 rounded">
                        <thead class="thead-light">
                            <tr>
                                <th class="border-0 rounded-start">Mã Tin</th>
                                <th class="border-0">HÌnh ảnh</th>
                                <th class="border-0">Tiêu đề</th>
                                <th class="border-0">Mô tả</th>
                                <th class="border-0">Nội dung</th>
                                <th class="border-0">Người tạo</th>
                                <th class="border-0">Ngày đăng</th>
                                <th class="border-0 rounded-end">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while ($row = mysqli_fetch_array($result)) {
                                echo "<tr>
                                <td>$row[0]</td>
                                <td>
                                <img src='$row[4]' class='img-fluid' width='100' height='80' style='object-fit:contain;'/>
                                </td>
                                <td>
                                <p class='text-ellipse' title='$row[1]'>$row[1]</p>
                                </td>
                                <td>
                                <p class='text-ellipse' title='$row[2]'>$row[2]</p>
                                </td>
                                <td>
                                <a data-blog='$row[0]' data-bs-toggle='modal' class='btn-detail'><button class='btn btn-sm btn-primary' type='button'>Chi tiết</button></a>
                                </td>
                                <td>
                                $row[5]
                                </td>
                                <td>
                                $row[6]
                                </td>
                                <td>"?>
                                <div>
                                    <?php 
                                    $list_TenAdmin = mysqli_query($connect, "SELECT Ho, Ten FROM nguoidung where MaQuyen = '1'");
                                    ?>
                                    <a href='#edit<?=$row[0]?>' data-bs-toggle='modal'><button class='btn btn-sm btn-primary' type='button'>Sửa</button></a>
                                    <a data-blog="<?=$row[0]?>" type="button" class='btn btn-sm btn-primary btn-delete'>Xóa</a>
                                    <div class='modal fade modal-edit' id='edit<?=$row[0]?>' tabindex='-1' role='dialog' aria-labelledby='modal-default' aria-hidden='true'>
                                    <div class='modal-dialog modal-dialog-centered' role='document'>
                                        <div class='modal-content'>
                                            <div class='modal-header'>
                                                <h2 class='h6 modal-title'>Sửa tin tức</h2>
                                                <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                            </div>
                                            <div class='modal-body'>
                                            <form id="blog-edit-<?=$row[0]?>" class="form-edit" data-blog="<?=$row[0]?>">
                                                    <div class='mb-4'>
                                                        <label>Hình ảnh</label>
                                                        <textarea rows="2" cols="50"  class='form-control' name='image-edit' required><?=$row[4]?></textarea>
                                                    </div>
                                                    <div class='mb-4'>
                                                        <label>Tiêu đề</label>
                                                        <textarea rows="2" cols="50" class='form-control' name='label-edit' required><?=$row[1]?></textarea>
                                                    </div>
                                                    <div class='mb-4'>
                                                        <label>Mô tả</label>
                                                        <textarea rows="3" cols="50" class='form-control' name='desc-edit' required><?=$row[2]?></textarea>
                                                    </div>
                                                    <div class='mb-4'>
                                                        <label>Nội dung</label>
                                                        <textarea rows="4" cols="50" class='form-control content-blog' name='content-edit' required><?=$row[3]?></textarea>
                                                    </div>
                                                    <div class='mb-4'>
                                                        <label class="d-block">Người tạo</label>
                                                        <select name="user-edit" id="">
                                                            <?php 
                                                            while ($rowTenAdmin = mysqli_fetch_array($list_TenAdmin)) {
                                                                $selected = $row[5] == $rowTenAdmin[0] . " " . $rowTenAdmin[1] ? "selected" : "";
                                                                echo "<option value='$rowTenAdmin[0] $rowTenAdmin[1]' $selected>$rowTenAdmin[0] $rowTenAdmin[1]</option>";
                                                            }
                                                            ?>
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

        <div class="modal fade modal-create" id="modal-detail-blog" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2 class="h6 modal-title">Chi tiết tin tức</h2>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body detail-blog">
                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-link text-gray-600 ms-auto" data-bs-dismiss="modal">Đóng</button>
                    </div>
                </div>
            </div>
        </div>
    <!-- Core -->
    <?php 
    $list_TenAdmin = mysqli_query($connect, "SELECT Ho, Ten FROM nguoidung where MaQuyen = '1'");
    ?>
    <div class='modal fade modal-create' id='modal-create' tabindex='-1' role='dialog' aria-labelledby='modal-default' aria-hidden='true'>
        <div class='modal-dialog modal-dialog-centered' role='document'>
            <div class='modal-content'>
                <div class='modal-header'>
                    <h2 class='h6 modal-title'>Tạo tin tức</h2>
                    <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                </div>
                <div class='modal-body'>
                <form class="form-create">
                        <div class='mb-4'>
                            <label>Hình ảnh</label>
                            <textarea rows="2" cols="50"  class='form-control' name='image-create' required></textarea>
                        </div>
                        <div class='mb-4'>
                            <label>Tiêu đề</label>
                            <textarea rows="2" cols="50" class='form-control' name='label-create' required></textarea>
                        </div>
                        <div class='mb-4'>
                            <label>Mô tả</label>
                            <textarea rows="3" cols="50" class='form-control' name='desc-create' required></textarea>
                        </div>
                        <div class='mb-4'>
                            <label>Nội dung</label>
                            <textarea rows="4" cols="50" class='form-control content-blog' name='content-create' required></textarea>
                        </div>
                        <div class='mb-4'>
                            <label class="d-block">Người tạo</label>
                            <select name="user-create" id="">
                                <?php 
                                while ($rowTenAdmin = mysqli_fetch_array($list_TenAdmin)) {
                                    echo "<option value='$rowTenAdmin[0] $rowTenAdmin[1]'>$rowTenAdmin[0] $rowTenAdmin[1]</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class='mb-4'>
                            <input type='submit' class='form-control w-100 btn btn-tertiary' name='submit-create' value="Lưu">
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
      <a href='../../index.php' class='btn btn-primary'>Quay lại</a>
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
            $(".btn-detail").each(function() {
                $(this).click(function() {
                    idBlog = $(this).data("blog")
                    $.ajax({
                        type: "POST",
                        url: "templates/request.php",
                        dataType: "json",
                        data: {
                            request: "getDetailBlog",
                            idBlog: idBlog
                        },
                        success: function(data) {
                            $(".detail-blog").html(data)
                            $('#modal-detail-blog').modal('show')
                        },
                        error: function (e) {
                        }
                    })
                })
            })

            $(".modal-edit").on('hidden.bs.modal', function () {
                $(this).find("form").trigger("reset");
            });

            $(".modal-create").on('hidden.bs.modal', function () {
                $(this).find("form").trigger("reset");
            });

            $('.content-blog').trumbowyg({
            btns: [
                ['viewHTML'],
                ['undo', 'redo'], // Only supported in Blink browsers
                ],
            });

            $(".content-blog").css("min-height", "300px");

            $(".form-edit").each(function() {
                $(this).submit(function(e) {
                    e.preventDefault()
                    idForm = $(this).attr("id")
                    hinhAnh = $(`#${idForm} textarea[name="image-edit"]`).val()
                    tieuDe = $(`#${idForm} textarea[name="label-edit"]`).val()
                    moTa = $(`#${idForm} textarea[name="desc-edit"]`).val()
                    noiDung = $(`#${idForm} textarea[name="content-edit"]`).val()
                    nguoiTao = $(`#${idForm} select[name="user-edit"]`).val()
                    idBlog = $(this).data("blog")

                    $.ajax({
                            type: "POST",
                            url: "templates/request.php",
                            dataType: "json",
                            data: {
                                request: "update_blog",
                                idBlog: idBlog,
                                hinhAnh: hinhAnh,
                                tieuDe: tieuDe,
                                moTa: moTa,
                                noiDung: noiDung,
                                nguoiTao: nguoiTao,
                            },
                            success: function () {
                                alert("Cập nhật tin tức thành công!")
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
                    hinhAnh = $(`textarea[name="image-create"]`).val()
                    tieuDe = $(`textarea[name="label-create"]`).val()
                    moTa = $(`textarea[name="desc-create"]`).val()
                    noiDung = $(`textarea[name="content-create"]`).val()
                    nguoiTao = $(`select[name="user-create"]`).val()

                    $.ajax({
                            type: "POST",
                            url: "templates/request.php",
                            dataType: "json",
                            data: {
                                request: "insert_blog",
                                hinhAnh: hinhAnh,
                                tieuDe: tieuDe,
                                moTa: moTa,
                                noiDung: noiDung,
                                nguoiTao: nguoiTao,
                            },
                            success: function () {
                                alert("Tạo mới tin tức thành công!")
                                window.location.reload();
                            },
                            error: function (e) {
                                alert("Đã xảy ra lỗi!")
                            }
                    })
            })

            $(".btn-delete").each(function() {
            $(this).click(function() {
                idBlog = $(this).data("blog")
                $.ajax({
                        type: "POST",
                        url: "templates/request.php",
                        dataType: "json",
                        data: {
                            request: "delete_blog",
                            idBlog: idBlog,
                        },
                        success: function () {
                            alert("Xóa tin tức thành công!")
                            window.location.reload();
                        },
                        error: function (e) {
                            alert("Đã xảy ra lỗi!")
                            
                        }
                    })
            })
        })
        })
    </script>

</body>

</html>