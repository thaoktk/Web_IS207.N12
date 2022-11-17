<?php 
    include "connect.php";

    if(!isset($_POST['request']) && !isset($_GET['request'])) die(null);

    switch ($_POST['request']) {
    	// lấy tất cả sản phẩm
    	case 'getall':
            getAll($connect);
    		break;
        case 'pagination' :
            pagination($connect);
            break;
        case 'getbyid':
            $sp = (new SanPhamBUS())->select_by_id("*", $_POST['id']);

            die (json_encode($sp));
            break;

        case 'getlistbyids':
            $listID = $_POST['listID'];
            $sql = "SELECT * FROM SanPham WHERE ";

            forEach($listID as $id) {
                $sql .= "MaSP=".$id." OR ";
            }
            $sql.=" 1=0";

            $result = (new DB_driver())->get_list($sql);
            
            for($i = 0; $i < sizeof($result); $i++) {
                // thêm thông tin hãng
                $result[$i]["LSP"] = (new LoaiSanPhamBUS())->select_by_id('*', $result[$i]['MaLSP']);
            }

            die (json_encode($result));
            break;

        case 'phanTich_Filters':
            phanTich_Filters();
            break;

        case 'addFromWeb1':
            addFromWeb1();
            break;

        //thêm
        case 'add':
                $data = $_POST['dataAdd'];
                $spAddArr = array(
                    'MaSP' => $data['masp'],
                    'MaLSP' => $data['company'],
                    'TenSP' => $data['name'],
                    'DonGia' => $data['price'],
                    'SoLuong' => $data['amount'],
                    'HinhAnh' => $data['img'],
                    'MaKM' => $data['promo']['name'],
                    'ManHinh' => $data['detail']['screen'],
                    'HDH' => $data['detail']['os'],
                    'CamSau' => $data['detail']['camara'],
                    'CamTruoc' => $data['detail']['camaraFront'],
                    'CPU' => $data['detail']['cpu'],
                    'Ram' => $data['detail']['ram'],
                    'Rom' => $data['detail']['rom'],
                    'SDCard' => $data['detail']['microUSB'],
                    'Pin' => $data['detail']['battery'],
                    'SoSao' => $data['star'],
                    'SoDanhGia' => $data['rateCount'],
                    'TrangThai' => $data['TrangThai']
                );

                $spBUS = new SanPhamBUS();
                die (json_encode($spBUS->add_new($spAddArr)));
            break;

        // xóa
        case 'delete':
                $spBUS = new SanPhamBUS();
                $maSPDel = $_POST['maspdelete'];
                die (json_encode($spBUS->delete_by_id($maSPDel)));
            break;

        case 'hide' :
            $id = $_POST["id"];
            $trangthai = $_POST["trangthai"];
            die (json_encode((new SanPhamBUS())->capNhapTrangThai($trangthai, $id)));
            break;
    	
    	default:
    		# code...
    		break;
    }

    function phanTich_Filters() {
        $filters = $_POST['filters'];
        $ori = "SELECT * FROM SanPham WHERE TrangThai=1 AND SoLuong>0 AND ";
        $sql = $ori;
        $db = new DB_driver();
        $db->connect();

        // $page = null;
        $tenThanhPhanCanSort = null;
        $typeSort = null;

        forEach($filters as $filter) {
            $dauBang = explode("=", $filter);
            switch ($dauBang[0]) {
                case 'search':
                    $dauBang[1] = explode("+", $dauBang[1]);
                    $dauBang[1] = join(" ", $dauBang[1]);
                    $dauBang[1] = mysqli_escape_string($db->__conn, $dauBang[1]);
                    $sql .= ($sql==$ori?"":" AND ") . " TenSP LIKE '%$dauBang[1]%' ";
                    break;

                case 'price':
                    $prices = explode("-", $dauBang[1]);
                    $giaTu = (int)$prices[0];
                    $giaDen = (int)$prices[1];

                    // nếu giá đến = 0 thì cho giá đến = 100 triệu
                    if($giaDen == 0) $giaDen = 1000000000;

                    $sql .= ($sql==$ori?"":" AND ") . " DonGia >= $giaTu AND DonGia <= $giaDen";
                    break;

                case 'company':
                    $companyID = $dauBang[1];
                    $sql .= ($sql==$ori?"":" AND ") . " MaLSP='$companyID'";
                    break;

                case 'star':
                    $soSao = (int)$dauBang[1];
                    $sql .= ($sql==$ori?"":" AND ") . " SoSao >= $soSao";
                    break;

                case 'promo':
                    // lấy id khuyến mãi
                    $loaikm = $dauBang[1];
                    $khuyenmai = (new DB_driver())->get_row("SELECT * FROM KhuyenMai WHERE LoaiKM='$loaikm'");
                    $khuyenmaiID = $khuyenmai["MaKM"];
                    
                    $sql .= ($sql==$ori?"":" AND ") . " MaKM='$khuyenmaiID'";
                    break;

                case 'sort':
                    $s = explode("-", $dauBang[1]);
                    $tenThanhPhanCanSort = $s[0];
                    $typeSort = ($s[1]=="asc"?"ASC":"DESC");
                    break;

                // case 'page':
                //     $page = $dauBang[1];
                //     break;
                
                default:
                    # code...
                    break;
            }
        }

        // sort phải để cuối
        if($tenThanhPhanCanSort != null && $typeSort != null) {
            $sql .= ($sql==$ori?" 1=1 ":""); // fix lỗi dư chữ AND 
            $sql .= " ORDER BY $tenThanhPhanCanSort $typeSort";
        }

        // Phân trang
        // if($page != 0 || $page == null) { // nếu == 0 thì trả về hết
        //     if($page == null) $page = 1; // mặc định là trang 1 (nếu không ghi gì hết)
        //     $productsPerPage = 10; // số lượng sản phẩm trong 1 trang
        //     $startIndex = ($page-1)*$productsPerPage;
        //     $sql .= ($sql==$ori?" 1=1 ":""); // fix lỗi dư chữ where
        //     $sql .= " LIMIT $startIndex,$productsPerPage";
        // }

        // chạy sql
        $result = $db->get_list($sql);
        $db->dis_connect();

        for($i = 0; $i < sizeof($result); $i++) {
            // thêm thông tin khuyến mãi
            $result[$i]["KM"] = (new KhuyenMaiBUS())->select_by_id('*', $result[$i]['MaKM']);
            // thêm thông tin hãng
            $result[$i]["LSP"] = (new LoaiSanPhamBUS())->select_by_id('*', $result[$i]['MaLSP']);
        }
        die (json_encode($result));
    }

    function addFromWeb1() {
        $spBUS = new SanPhamBUS();

        $sp = $_POST['sanpham'];
        $loaisanpham = (new DB_driver())->get_row("SELECT * FROM LoaiSanPham WHERE TenLSP='".$sp["company"]."'");

        $sanphamArr = array(
            'MaSP' => "",
            'MaLSP' => $loaisanpham['MaLSP'],
            'TenSP' => $sp['name'],
            'DonGia' => $sp['price'],
            'SoLuong' => 10,
            'HinhAnh' => $sp['img'],
            'MaKM' => $sp['MaKM'],
            'ManHinh' => $sp['detail']['screen'],
            'HDH' => $sp['detail']['os'],
            'CamSau' => $sp['detail']['camara'],
            'CamTruoc' => $sp['detail']['camaraFront'],
            'CPU' => $sp['detail']['cpu'],
            'Ram' => $sp['detail']['ram'],
            'Rom' => $sp['detail']['rom'],
            'SDCard' => $sp['detail']['microUSB'],
            'Pin' => $sp['detail']['battery'],
            'SoSao' => 0,
            'SoDanhGia' => 0,
            'TrangThai' => 1
        ); 
        
        die (json_encode($spBUS->add_new($sanphamArr)));
    }

    function getAll($connect) {
        echo $_GET['page'];
        $itemsPerPage = 9;
        if(isset($_GET['page'])){
            $currentPage=$_GET['page'];
        }
        else{
                $currentPage=1;
        }  
        $offset = ($currentPage - 1) * $itemsPerPage ;
        $sql = "SELECT * FROM sanpham limit 9 offset $offset";
        $results = $connect->query($sql);
        while($row=$results->fetch_row()) {
            $rating = addStar($row[13], $row[12]);
            echo "<div class='col-lg-4 col-md-6'>
            <div class='single-product'>
                <img class='img-fluid' src='". $row[8] ."' alt=''>
                <div class='product-details'>
                    <h6 class='title'>". $row[2] ."</h6>
                    <div class='price'>
                        <h6>". number_format(($row[6])) ." VNĐ</h6>
                        <h6 class='l-through'>". number_format(($row[5])) ." VNĐ</h6>
                    </div>
                    <div class='mt-2 d-flex align-items-center'>
                        <div>". $rating ."</div>
                        <span class='ml-2'>". $row[13] ." đánh giá</span>
                    </div>
                    <div class='prd-bottom'>
                        <a href='cart.php' class='social-info'>
                            <span class='ti-bag'></span>
                            <p class='hover-text'>Mua ngay</p>
                        </a>
                        <a href='' class='social-info'>
                            <span class='lnr lnr-heart'></span>
                            <p class='hover-text'>Yêu thích</p>
                        </a>
                        <a href='single-product.php' class='social-info'>
                            <span class='lnr lnr-move'></span>
                            <p class='hover-text'>Chi tiết</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>";
        }
    }

    function pagination($connect) {
        $itemsPerPage = 9;
        if(isset($_GET['page'])){
            $currentPage=$_GET['page'];
        }
        else{
                $currentPage=1;
        }  
        $totalRecords = mysqli_query($connect, "SELECT * FROM sanpham");
        $totalRows = $totalRecords->num_rows;
        $totalPages = ceil($totalRows / $itemsPerPage);


        for ($i = 1; $i <= $totalPages; $i++) {
            if ($i != $currentPage) {
                echo "<a href='category.php?page=$i'>$i</a>";
            } else {
                echo "<a href='category.php?page=$i' class='active'>$i</a>";
            }
        }
    }

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