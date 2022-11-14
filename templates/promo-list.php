<?php 
require_once('./BackEnd/ConnectionDB/DB_classes.php');

$list_new = (new SanPhamBUS())->select_by_query("*", "New = 1", 8);

$list_hot = (new SanPhamBUS())->select_by_query("*", "Hot = 1", 8);

$list_dealHot = (new SanPhamBUS())->select_by_query("*", "New = 1 and Hot = 1", 2);

$list_dealHot2 = (new SanPhamBUS())->select_by_query("*", "Hot = 1 and GiaTien <= 25000000", 9);
?>