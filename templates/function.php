<?php 
function loginFromSocialCallBack($socialUser, $connect) {
    $result = mysqli_query($connect, "Select `MaND`,`TaiKhoan`,`Email`,`Ten` from `nguoidung` WHERE `Email` ='" . $socialUser['email'] . "'");
    if ($result->num_rows == 0) {
        $result = mysqli_query($connect, "INSERT INTO `nguoidung` (`MaND`, `Ho`, `Ten`, `SDT`, `Email`, `TaiKhoan`, `MatKhau`, `MaQuyen`) VALUES (NULL, NULL, '" . $socialUser['name'] . "',NULL, '" . $socialUser['email'] . "', NULL, NULL, 3);");
        if (!$result) {
            echo mysqli_error($connect);
            exit;
        }
        $result = mysqli_query($connect, "Select `MaND`,`TaiKhoan`,`Email`,`Ten` from `nguoidung` WHERE `Email` ='" . $socialUser['email'] . "'");
    }
    if ($result->num_rows > 0) {
        $user = mysqli_fetch_assoc($result);
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $_SESSION['current-user'] = $user;
        header('Location: ../index.php');
    }
}
?>