<?php
    include "connect.php";
    session_start();

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
            $time = date('Y-m-d H:i:s');
            $result = mysqli_query($connect, "INSERT INTO `binhluan` (`MaBL`, `MaSP`, `MaTin`, `MaND`, `BinhLuan`, `NgayLap`) VALUES (NULL, '$idSP', NULL, '$idND', '$message', '$time')");
            die (json_encode($result));
            break;
        case "insert_reply_comment":
            $idBL = $_POST['idBL'];
            $idND = $_POST['idND'];
            $message = $_POST['message'];
            $time = date('Y-m-d H:i:s');
            $result = mysqli_query($connect, "INSERT INTO `traloibinhluan` (`MaTLBL`, `MaBL`, `MaND`, `BinhLuan`, `NgayLap`) VALUES (NULL, '$idBL', '$idND', '$message', '$time')");
            die (json_encode($result));
            break;
        case "insert_comment_blog":
            $idBlog = $_POST['idBlog'];
            $idND = $_POST['idND'];
            $message = $_POST['message'];
            $time = date('Y-m-d H:i:s');
            $result = mysqli_query($connect, "INSERT INTO `binhluan` (`MaBL`, `MaSP`, `MaTin`, `MaND`, `BinhLuan`, `NgayLap`) VALUES (NULL, NULL, '$idBlog', '$idND', '$message', '$time')");
            die (json_encode($result));
            break;
        case "update_cart":
           $result = update_cart(true);
            echo json_encode(array(
            'status'=>$result,
            'message'=>"Thêm sản phẩm thành công"
            ));
            break;
        case "update_qty_product_cart":
            $idSP = $_POST['idSP'];
            $qty = $_POST['qty'];
            $isIncrease = $_POST['isIncrease'];
            $result = update_qty_product_cart($idSP, $qty, $isIncrease);
            die (json_encode($result));
            break;
        case "delete_product_cart":
            $idSP = $_POST['idSP'];
            $result = delete_product_cart($idSP);
            die (json_encode($result));
            break;
        case "delete_cart":
            $result = delete_cart();
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
    }


    function update_cart($add = false) {
        $id = $_POST['idSP'];
        $quantity = $_POST['quantity'];
        if ($quantity == 0) {
            unset($_SESSION["cart"][$id]);
        } else {
            if (!isset($_SESSION["cart"][$id])) {
                $_SESSION["cart"][$id] = 0;
            }
            if ($add) {
                $_SESSION["cart"][$id] += $quantity;
            } else {
                $_SESSION["cart"][$id] = $quantity;
            }
            //Kiểm tra số lượng sản phẩm tồn kho
//            $addProduct = mysqli_query($con, "SELECT `quantity` FROM `product` WHERE `id` = " . $id);
//            $addProduct = mysqli_fetch_assoc($addProduct);
//            if ($_SESSION["cart"][$id] > $addProduct['quantity']) {
//                $_SESSION["cart"][$id] = $addProduct['quantity'];
//                $GLOBALS['changed_cart'] = true;
//            }
        }
        return true;
    }

    function update_qty_product_cart($idSP, $qty = 1, $isIncrease) {
        if ($isIncrease == 1) {
            if ($qty) {
                $_SESSION["cart"][$idSP] = $qty;
            } else {
                $_SESSION["cart"][$idSP] += 1;
            }
        } else {
            if ($_SESSION["cart"][$idSP] > 1) {
                $_SESSION["cart"][$idSP] -= 1;
            }
        }
        return true;
    }

    function delete_product_cart($idSP) {
        unset($_SESSION["cart"][$idSP]);
        return true;
    }

    function delete_cart() {
        unset($_SESSION["cart"]);
        return true;
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