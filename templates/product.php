<?php 
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
?>