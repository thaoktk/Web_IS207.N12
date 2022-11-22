<?php
    include "connect.php";

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
    }
?>