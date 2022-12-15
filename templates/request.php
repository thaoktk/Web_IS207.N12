<?php
    include "connect.php";
    session_start();
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $time = date('Y-m-d H:i:s', time());

    if(!isset($_POST['request']) && !isset($_GET['request'])) die(null);

    switch ($_POST['request']) {
        case "insert_fav":
            $idSP = $_POST['idSP'];
            $idND = $_POST['idND'];
            $result = mysqli_query($connect, "INSERT INTO `yeuthich` (`MaSP`, `MaND`) VALUES ('". $idSP ."', '". $idND ."')");
            die (json_encode($result));
            break;
        case "delete_fav":
            $idSP = $_POST['idSP'];
            $idND = $_POST['idND'];
            $result = mysqli_query($connect, "DELETE FROM `yeuthich` where MaSP ='$idSP' and MaND = '$idND'");
            die (json_encode($result));
            break;
        case "delete_all_fav":
            $idND = $_POST['idND'];
            $result = mysqli_query($connect, "DELETE FROM `yeuthich` where MaND = '$idND'");
            die (json_encode($result));
            break;
        case "insert_comment":
            $idSP = $_POST['idSP'];
            $idND = $_POST['idND'];
            $message = $_POST['message'];
            $result = mysqli_query($connect, "INSERT INTO `binhluan` (`MaBL`, `MaSP`, `MaTin`, `MaND`, `BinhLuan`, `NgayLap`) VALUES (NULL, '$idSP', NULL, '$idND', '$message', '$time')");
            die (json_encode($result));
            break;
        case "insert_reply_comment":
            $idBL = $_POST['idBL'];
            $idND = $_POST['idND'];
            $message = $_POST['message'];
            $result = mysqli_query($connect, "INSERT INTO `traloibinhluan` (`MaTLBL`, `MaBL`, `MaND`, `BinhLuan`, `NgayLap`) VALUES (NULL, '$idBL', '$idND', '$message', '$time')");
            die (json_encode($result));
            break;
        case "insert_comment_blog":
            $idBlog = $_POST['idBlog'];
            $idND = $_POST['idND'];
            $message = $_POST['message'];
            $result = mysqli_query($connect, "INSERT INTO `binhluan` (`MaBL`, `MaSP`, `MaTin`, `MaND`, `BinhLuan`, `NgayLap`) VALUES (NULL, NULL, '$idBlog', '$idND', '$message', '$time')");
            die (json_encode($result));
            break;
        case "update_cart":
            $idUser = $_POST['idUser'];
            $idSP = $_POST['idSP'];
            $quantity = $_POST['quantity'];
            $resultTonTai = mysqli_query($connect, "SELECT * FROM giohang where MaND = $idUser and MaSP = $idSP");
            if ($resultTonTai->num_rows != 0) {
                echo json_encode(array(
                    'status'=>0,
                    'message'=>"Bạn đã thêm sản phẩm này vào giỏ hàng rồi!"
                    ));
                    break;
            } else {
                $resultGioHang = mysqli_query($connect, "INSERT INTO `giohang` (`MaND`, `MaSP`, `SoLuong`) VALUES ('$idUser', '$idSP', '$quantity')");
                echo json_encode(array(
                    'status'=>1,
                    'message'=>"Thêm thành công sản phẩm vào giỏ hàng!"
                    ));
                    break;
            }
        case "update_qty_product_cart":
            $idUser = $_POST['idUser'];
            $idSP = $_POST['idSP'];
            $qty = $_POST['qty'];
            $result = mysqli_query($connect, "UPDATE giohang SET SoLuong = $qty WHERE MaSP = $idSP and MaND = $idUser");
            die (json_encode($result));
            break;
        case "delete_product_cart":
            $idUser = $_POST['idUser'];
            $idSP = $_POST['idSP'];
            $result = mysqli_query($connect, "DELETE FROM giohang WHERE MaND = $idUser and MaSP = $idSP");
            die (json_encode($result));
            break;
        case "delete_cart":
            $idUser = $_POST['idUser'];
            $result = mysqli_query($connect, "DELETE FROM giohang WHERE MaND = $idUser");
            unset($_SESSION["free-ship"]);
            unset($_SESSION["order"]);
            die (json_encode($result));
            break;
        case "add_voucher_freeShip":
            $code = $_POST['code'];
            $resultKM = mysqli_query($connect, "SELECT CodeKM from khuyenmai WHERE CodeKM = '$code' and MaLoaiKM = '1'");
            if ($resultKM->num_rows == 0) {
                echo json_encode(array(
                    'status'=>0,
                    'message'=>"Mã này không phải mã giảm giá vận chuyển!"
                    ));
                break;
            }
            if (!isset($_SESSION["free-ship"]) || empty($_SESSION["free-ship"])) {
                $result = add_voucher_freeShip($code);
                echo json_encode(array(
                    'status'=>$result,
                    'message'=>"Dùng mã vận chuyển thành công!"
                    ));
                break;
            } else {
                echo json_encode(array(
                    'status'=>0,
                    'message'=>"Bạn đã sử dụng mã vận chuyển rồi, không thể tiếp tục dùng nữa!"
                    ));
                break;
            }
        case "add_voucher_order":
            $code = $_POST['code'];
            $resultKM = mysqli_query($connect, "SELECT CodeKM from khuyenmai WHERE CodeKM = '$code' and MaLoaiKM = '2'");
            if ($resultKM->num_rows == 0) {
                echo json_encode(array(
                    'status'=>0,
                    'message'=>"Mã này không phải mã giảm giá đơn hàng!"
                    ));
                break;
            }
            if (!isset($_SESSION["order"]) || empty($_SESSION["order"])) {
                $result = add_voucher_order($code);
                echo json_encode(array(
                    'status'=>$result,
                    'message'=>"Dùng mã đơn hàng thành công!"
                    ));
                break;
            } else {
                echo json_encode(array(
                    'status'=>0,
                    'message'=>"Bạn đã sử dụng mã đơn hàng rồi, không thể tiếp tục dùng nữa!"
                    ));
                break;
            }
            break;
        case "insert_order":
            unset($_SESSION["free-ship"]);
            unset($_SESSION["order"]);

            $idUser = $_POST['idUser'];
            $hoTen = $_POST['hoTen'];
            $sdt = $_POST['sdt'];
            $diaChi = $_POST['diaChi'];
            $ship = $_POST['ship'];
            $giamGia = $_POST['giamGia'];
            $ghiChu = $_POST['ghiChu'];
            $tongTien = $_POST['tongTien'];
            $result = mysqli_query($connect, "INSERT INTO `donhang` (`MaDH`, `MaND`, `NgayLap`, `HoTen`, `SDT`, `DiaChi`, `PhiVanChuyen`, `GiamGia`, `GhiChu`, `TongTien`, `TrangThai`) VALUES (NULL, '$idUser', '$time', '$hoTen', '$sdt', '$diaChi', '$ship', '$giamGia', '$ghiChu', '$tongTien', 'Chưa giao')");
            die (json_encode($result));
            break;
        case "update_qty_voucher": 
            $idVoucher = $_POST['idVoucher'];
            $result = mysqli_query($connect, "UPDATE khuyenmai SET SoLuong = SoLuong - 1 WHERE MaKM = $idVoucher");
            die (json_encode($result));
            break;
        case "insert_detail_order":
            $idUser = $_POST['idUser'];
            $resultOrderMax = mysqli_query($connect, "SELECT MAX(MaDH) as idOrder from donhang");
            $resultOrderMax = mysqli_fetch_assoc($resultOrderMax);
            $idOrder = $resultOrderMax['idOrder'];

            $resultOrder = mysqli_query($connect, "SELECT * from giohang where MaND = $idUser");
            while ($row = mysqli_fetch_array($resultOrder)) {
                $resultGiaTien = mysqli_query($connect, "SELECT GiaTien from sanpham where MaSP = $row[1]");
                $resultGiaTien = $resultGiaTien->fetch_column();

                $result = mysqli_query($connect, "INSERT INTO `chitietdonhang` (`MaDH`, `MaSP`, `GiaTien`, `SoLuong`) VALUES ('$idOrder', '$row[1]', '$resultGiaTien', '$row[2]')");
                $resultUpdateSP = mysqli_query($connect, "UPDATE sanpham SET SoLuong = SoLuong - 1 WHERE MaSP = $row[1]");
            }

            $result = mysqli_query($connect, "DELETE FROM giohang WHERE MaND = $idUser");

            die (json_encode($result));
            break;
    }
    
    function add_voucher_freeShip($code) {
        $_SESSION["free-ship"] = $code;
        return true;
    }

    function add_voucher_order($code) {
        $_SESSION["order"] = $code;
        return true;
    }
?>