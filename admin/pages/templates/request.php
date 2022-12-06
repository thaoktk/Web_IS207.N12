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
            $idBlog = $_POST['idBlog'];
            $result = mysqli_query($connect, "SELECT NoiDung FROM tintuc WHERE MaTin = $idBlog");
            $result = $result->fetch_column();
            die (json_encode($result));
            break;
    }

?>