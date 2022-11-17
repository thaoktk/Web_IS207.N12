<?php 
    include "connect.php";

function addStar($review, $star) {
    $rating = '';
    if ($review >= 0) {
        for ($i = 1; $i <= 5; $i++) {
            if ($i <= $star) {
                $rating .= "<i class='fa fa-star star-rv'></i>";
            } else {
                $rating .= "<i class='fa fa-star-o star-rv'></i>";
            }
        }
    }

    return $rating;
}

$list_new = mysqli_query($connect, "SELECT * FROM sanpham where New = 1 limit 8");

$list_hot = mysqli_query($connect, "SELECT * FROM sanpham where Hot = 1 limit 8");

$list_dealHot = mysqli_query($connect, "SELECT * FROM sanpham where New = 1 and Hot = 1 limit 2");

$list_dealHot2 = mysqli_query($connect, "SELECT * FROM sanpham where Hot = 1 and GiaTien <= 25000000 limit 9");

$list_SeriesIphone = mysqli_query($connect, "SELECT DISTINCT(TenSeries) FROM sanpham WHERE TenSeries LIKE '%Iphone%' ORDER by TenSeries");

$list_SeriesMacBook = mysqli_query($connect, "SELECT DISTINCT(TenSeries) FROM sanpham WHERE TenSeries LIKE '%MacBook%' ORDER by TenSeries");

$list_SeriesIpad = mysqli_query($connect, "SELECT DISTINCT(TenSeries) FROM sanpham WHERE TenSeries LIKE '%Ipad%' ORDER by TenSeries");

$list_SeriesAirPods = mysqli_query($connect, "SELECT DISTINCT(TenSeries) FROM sanpham WHERE TenSeries LIKE '%AirPods%' ORDER by TenSeries");

$list_SeriesWatch = mysqli_query($connect, "SELECT DISTINCT(TenSeries) FROM sanpham WHERE TenSeries LIKE '%Apple Watch%' ORDER by TenSeries");
?>