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
            $time = date_create()->format('Y-m-d H:i:s');
            $result = mysqli_query($connect, "INSERT INTO `binhluan` (`MaBL`, `MaSP`, `MaTin`, `MaND`, `BinhLuan`, `NgayLap`) VALUES (NULL, '$idSP', NULL, '$idND', '$message', '$time')");
            die (json_encode($result));
            break;
        case "insert_reply_comment":
            $idBL = $_POST['idBL'];
            $idND = $_POST['idND'];
            $message = $_POST['message'];
            $time = date_create()->format('Y-m-d H:i:s');
            $result = mysqli_query($connect, "INSERT INTO `traloibinhluan` (`MaTLBL`, `MaBL`, `MaND`, `BinhLuan`, `NgayLap`) VALUES (NULL, '$idBL', '$idND', '$message', '$time')");
            die (json_encode($result));
            break;
        case "insert_comment_blog":
            $idBlog = $_POST['idBlog'];
            $idND = $_POST['idND'];
            $message = $_POST['message'];
            $time = date_create()->format('Y-m-d H:i:s');
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
    
    
?>