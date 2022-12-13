<?php
    include "connect.php";
    session_start();

    if(!isset($_POST['request']) && !isset($_GET['request'])) die(null);

    switch ($_POST['request']) {
        case "getDetailBlog":
            $idBlog = $_POST['idBlog'];
            $result = mysqli_query($connect, "SELECT NoiDung FROM tintuc WHERE MaTin = $idBlog");
            $result = $result->fetch_column();
            die (json_encode($result));
            break;
        case "insert_voucher":
            $loaiKM = $_POST['loaiKM'];
            $code = $_POST['code'];
            $giaTri = $_POST['giaTri'];
            $sluong = $_POST['sluong'];
            $result = mysqli_query($connect, "INSERT INTO khuyenmai (`MaKM`, `CodeKM`, `MaLoaiKM`, `GiaTriKM`, `SoLuong`) VALUES (NULL, '$code', '$loaiKM', '$giaTri', '$sluong');");
            die (json_encode($result));
            break;
        case "update_voucher":
            $idKM = $_POST['idKM'];
            $loaiKM = $_POST['loaiKM'];
            $giaTri = $_POST['giaTri'];
            $sluong = $_POST['sluong'];
            $result = mysqli_query($connect, "UPDATE khuyenmai SET MaLoaiKM = $loaiKM, GiaTriKM = $giaTri, SoLuong = $sluong WHERE MaKM = $idKM");
            die (json_encode($result));
            break;
        case "delete_voucher":
            $idKM = $_POST['idKM'];
            $result = mysqli_query($connect, "DELETE FROM khuyenmai WHERE MaKM = $idKM");
            die (json_encode($result));
            break;
        case "insert_product":
            $tenSP = $_POST['tenSP'];
            $loaiSP = $_POST['loaiSP'];
            $hinhAnh = $_POST['hinhAnh'];
            $tenSeries = $_POST['tenSeries'];
            $chiTiet = $_POST['chiTiet'];
            $giaGoc = $_POST['giaGoc'];
            $giaTien = $_POST['giaTien'];
            $sluong = $_POST['sluong'];
            $moTa = $_POST['moTa'];
            $hot = $_POST['hot'];
            $new = $_POST['New'];
            $ram = $_POST['ram'];
            $rom = $_POST['rom'];
            $result = mysqli_query($connect, "INSERT INTO `sanpham` (`MaSP`, `MaLSP`, `TenSP`, `TenSeries`, `Ram`, `Rom` ,`ChiTiet`, `GiaGoc`, `GiaTien`, `SoLuong`, `HinhAnh`, `MoTa`, `New`, `Hot`, `SoSao`, `SoDanhGia`) VALUES (NULL, '$loaiSP', '$tenSP', '$tenSeries','$ram','$rom', '$chiTiet', '$giaGoc', '$giaTien', '$sluong', '$hinhAnh', '$moTa', '$new', '$hot', '0', '0');");
            die (json_encode($result));
            break;
        case "update_product":
            $idSP = $_POST['idSP'];
            $tenSP = $_POST['tenSP'];
            $loaiSP = $_POST['loaiSP'];
            $hinhAnh = $_POST['hinhAnh'];
            $tenSeries = $_POST['tenSeries'];
            $chiTiet = $_POST['chiTiet'];
            $giaGoc = $_POST['giaGoc'];
            $giaTien = $_POST['giaTien'];
            $sluong = $_POST['sluong'];
            $moTa = $_POST['moTa'];
            $hot = $_POST['hot'];
            $new = $_POST['New'];
            $soSao = $_POST['soSao'];
            $soDanhGia = $_POST['soDanhGia'];
            $ram = $_POST['ram'];
            $rom = $_POST['rom'];
            $result = mysqli_query($connect,"UPDATE sanpham SET MaLSP = '$loaiSP', TenSP = '$tenSP', TenSeries = '$tenSeries', ChiTiet = '$chiTiet', Ram = '$ram', Rom = '$rom', GiaGoc = '$giaGoc', GiaTien = '$giaTien', SoLuong = '$sluong', HinhAnh = '$hinhAnh', MoTa = '$moTa', New = '$new', Hot = '$hot', SoSao = '$soSao', SoDanhGia = '$soDanhGia' WHERE MaSP = $idSP");
            die (json_encode($result));
            break;
        case "delete_product":
            $idSP = $_POST['idSP'];
            $result = mysqli_query($connect, "DELETE FROM sanpham WHERE MaSP = $idSP");
            die (json_encode($result));
            break;
        case "update_blog":
            $idBlog = $_POST['idBlog'];
            $hinhAnh = $_POST['hinhAnh'];
            $tieuDe = $_POST['tieuDe'];
            $moTa = $_POST['moTa'];
            $noiDung = $_POST['noiDung'];
            $nguoiTao = $_POST['nguoiTao'];
            $result = mysqli_query($connect,"UPDATE tintuc SET HinhAnh = '$hinhAnh', TieuDe = '$tieuDe', MoTaNgan = '$moTa', NoiDung = '$noiDung', NguoiTao = '$nguoiTao' WHERE MaTin = $idBlog");
            die (json_encode($result));
            break;
        case "insert_blog":
            $hinhAnh = $_POST['hinhAnh'];
            $tieuDe = $_POST['tieuDe'];
            $moTa = $_POST['moTa'];
            $noiDung = $_POST['noiDung'];
            $nguoiTao = $_POST['nguoiTao'];
            $time = date_create()->format('Y-m-d H:i:s');
            $result = mysqli_query($connect, "INSERT INTO `tintuc` (`MaTin`, `TieuDe`, `MoTaNgan`, `NoiDung`, `HinhAnh`, `NguoiTao`, `NgayDang`) VALUES (NULL, '$tieuDe', '$moTa', '$noiDung', '$hinhAnh', '$nguoiTao', '$time')");
            die (json_encode($result));
            break;
        case "delete_blog":
            $idBlog = $_POST['idBlog'];
            $result = mysqli_query($connect, "DELETE FROM tintuc WHERE MaTin = $idBlog");
            die (json_encode($result));
            break;
        case "update_user":
            $iUser = $_POST['iUser'];
            $ho = $_POST['ho'];
            $ten = $_POST['ten'];
            $sdt = $_POST['sdt'];
            $email = $_POST['email'];
            $taiKhoan = $_POST['taiKhoan'];
            $matKhau = $_POST['matKhau'];
            $maQuyen = $_POST['maQuyen'];
            $result = mysqli_query($connect,"UPDATE nguoidung SET Ho = '$ho', Ten = '$ten', SDT = '$sdt', Email = '$email', TaiKhoan = '$taiKhoan', MatKhau = '$matKhau' WHERE MaND = $idUser");
            die (json_encode($result));
            break;
    }

?>