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
                    <h1 class="h4">Tin tức</h1>
                </div>
            </div>
        </div>

        <div class="mb-4">
            <button class="btn btn-secondary" type="button" data-bs-toggle='modal' data-bs-target='#modal-create-product'>Tạo tin tức mới</button>
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
                                <p class='text-ellipse'>$row[1]</p>
                                </td>
                                <td>
                                <p class='text-ellipse'>$row[2]</p>
                                </td>
                                <td>
                                <a data-blog='$row[0]' data-bs-toggle='modal' class='btn-detail'><button class='btn btn-sm btn-primary' type='button'>Chi tiết</button></a>
                                </td>
                                <td>
                                $row[5]
                                </td>
                                <td>
                                $row[7]
                                </td>
                                <td>"?>
                                <div>
                                    <?php 
                                    $list_TenAdmin = mysqli_query($connect, "SELECT Ho, Ten FROM nguoidung where MaQuyen = '1'");
                                    ?>
                                    <a href='#edit<?=$row[0]?>' data-bs-toggle='modal'><button class='btn btn-sm btn-primary' type='button'>Sửa</button></a>
                                    <a href="?idDel=<?=$row[0]?>" type="button" class='btn btn-sm btn-primary'>Xóa</a>
                                    <div class='modal fade' id='edit<?=$row[0]?>' tabindex='-1' role='dialog' aria-labelledby='modal-default' aria-hidden='true'>
                                    <div class='modal-dialog modal-dialog-centered' role='document'>
                                        <div class='modal-content'>
                                            <div class='modal-header'>
                                                <h2 class='h6 modal-title'>Sửa tin tức</h2>
                                                <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                            </div>
                                            <div class='modal-body'>
                                            <form action='?idEdit=<?=$row[0]?>' method='POST'>
                                                    <div class='mb-4'>
                                                        <label>Hình ảnh</label>
                                                        <textarea rows="2" cols="50"  class='form-control' name='name-edit'><?=$row[4]?></textarea>
                                                    </div>
                                                    <div class='mb-4'>
                                                        <label>Tiêu đề</label>
                                                        <textarea rows="2" cols="50" class='form-control' name='detail-edit'><?=$row[1]?></textarea>
                                                    </div>
                                                    <div class='mb-4'>
                                                        <label>Mô tả</label>
                                                        <textarea rows="2" cols="50" class='form-control' name='price-first-edit'><?=$row[2]?></textarea>
                                                    </div>
                                                    <div class='mb-4'>
                                                        <label>Nội dung</label>
                                                        <textarea rows="4" cols="50" class='form-control content-blog' name='price-sec-edit'><?=$row[3]?></textarea>
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

        <div class="modal fade" id="modal-detail-blog" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
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
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script src="https://cdn.tiny.cloud/1/ogpb1phg5t4l0schyim0425vsp9sg2so05zk2c29ktprw3v8/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
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
                            console.log(data);
                            $(".detail-blog").html(data)
                            $('#modal-detail-blog').modal('show')
                        },
                        error: function (e) {
                        }
                    })
                })
            })

            tinymce.init({
                selector: 'textarea.content-blog',
                plugins: 'codesample image link searchreplace wordcount casechange formatpainter linkchecker tinymcespellchecker permanentpen powerpaste advcode tableofcontents autocorrect',
                toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | addcomment showcomments | align lineheight | checklist numlist bullist indent outdent | removeformat',
                tinycomments_mode: 'embedded',
                tinycomments_author: 'Author name',
                mergetags_list: [
                    { value: 'First.Name', title: 'First Name' },
                    { value: 'Email', title: 'Email' },
                ]
                });
        })
    </script>

</body>

</html>