-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 17, 2022 at 03:43 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `3tn-shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `anhsanpham`
--

CREATE TABLE `anhsanpham` (
  `MaSP` int(11) NOT NULL,
  `Id` int(11) NOT NULL,
  `Anh1` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `Anh2` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `Anh3` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `binhluan`
--

CREATE TABLE `binhluan` (
  `MaBL` int(11) NOT NULL,
  `MaSP` int(11) DEFAULT NULL,
  `MaTin` int(11) DEFAULT NULL,
  `MaND` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `BinhLuan` longtext COLLATE utf8_unicode_ci NOT NULL,
  `LuotThich` int(11) NOT NULL,
  `NgayLap` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `chitietdonhang`
--

CREATE TABLE `chitietdonhang` (
  `MaDH` int(11) NOT NULL,
  `MaSP` int(11) NOT NULL,
  `SoLuong` int(11) NOT NULL,
  `ThanhTien` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `danhgia`
--

CREATE TABLE `danhgia` (
  `MaSP` int(11) NOT NULL,
  `MaND` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `SoSao` int(11) NOT NULL,
  `NoiDung` longtext COLLATE utf8_unicode_ci NOT NULL,
  `NgayLap` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `donhang`
--

CREATE TABLE `donhang` (
  `MaHD` int(11) NOT NULL,
  `MaND` int(11) NOT NULL,
  `NgayLap` datetime NOT NULL,
  `SDT` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `DiaChi` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `PhuongThucTT` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `PhiVanChuyen` float NOT NULL,
  `GiamGia` float NOT NULL,
  `TongTien` float NOT NULL,
  `TrangThai` varchar(70) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `khuyenmai`
--

CREATE TABLE `khuyenmai` (
  `MaKM` int(11) NOT NULL,
  `CodeKM` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `MaLoaiKM` int(11) DEFAULT NULL,
  `GiaTriKM` float NOT NULL,
  `SoLuong` int(11) NOT NULL,
  `NgayBD` datetime NOT NULL,
  `NgayKT` datetime NOT NULL,
  `TrangThai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `loaikhuyenmai`
--

CREATE TABLE `loaikhuyenmai` (
  `MaLoaiKM` int(11) NOT NULL,
  `TenLoaiKM` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `loaisanpham`
--

CREATE TABLE `loaisanpham` (
  `MaLSP` int(11) NOT NULL,
  `TenLSP` varchar(70) COLLATE utf8_unicode_ci NOT NULL,
  `HinhAnh` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `loaisanpham`
--

INSERT INTO `loaisanpham` (`MaLSP`, `TenLSP`, `HinhAnh`) VALUES
(1, 'Iphone', ''),
(2, 'Macbook', NULL),
(3, 'Ipad', NULL),
(4, 'AirPods', NULL),
(5, 'Apple Watch', NULL),
(6, 'Chuột Apple', NULL),
(7, 'Bàn phím Magic', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `nguoidung`
--

CREATE TABLE `nguoidung` (
  `MaND` int(11) NOT NULL,
  `Ho` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Ten` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `SDT` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `TaiKhoan` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `MatKhau` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `MaQuyen` int(11) NOT NULL,
  `TrangThai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `phanquyen`
--

CREATE TABLE `phanquyen` (
  `MaQuyen` int(11) NOT NULL,
  `TenQuyen` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE `sanpham` (
  `MaSP` int(11) NOT NULL,
  `MaLSP` int(11) NOT NULL,
  `TenSP` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `TenSeries` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ChiTiet` longtext COLLATE utf8_unicode_ci NOT NULL,
  `GiaGoc` int(11) NOT NULL,
  `GiaTien` int(11) NOT NULL,
  `SoLuong` int(10) UNSIGNED NOT NULL DEFAULT 1,
  `HinhAnh` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `MoTa` longtext COLLATE utf8_unicode_ci NOT NULL,
  `New` int(11) NOT NULL,
  `Hot` int(11) NOT NULL,
  `SoSao` int(11) NOT NULL,
  `SoDanhGia` int(11) NOT NULL,
  `TrangThai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`MaSP`, `MaLSP`, `TenSP`, `TenSeries`, `ChiTiet`, `GiaGoc`, `GiaTien`, `SoLuong`, `HinhAnh`, `MoTa`, `New`, `Hot`, `SoSao`, `SoDanhGia`, `TrangThai`) VALUES
(1, 1, 'Iphone 11 64GB Xanh', 'Iphone 11', '<table class=\"table\">\r\n							<tbody>\r\n								<tr>\r\n									<td>\r\n										<h5>Màn hình:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>IPS LCD6.1\", Liquid Retina</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Hệ điều hành:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>iOS 15</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Camera sau:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>2 camera 12 MP</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Camera trước:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>12 MP</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Chip:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>Apple A13 Bionic</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>RAM:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>4 GB</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Dung lượng lưu trữ:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>64 GB</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>SIM:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>1 Nano SIM & 1 eSIM, Hỗ trợ 4G</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Pin, Sạc:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>3110 mAh, 18 W</h5>\r\n									</td>\r\n								</tr>\r\n							</tbody>\r\n						</table>', 14990000, 11990000, 69, 'https://cdn.tgdd.vn/Products/Images/42/153856/iphone-xi-xanhla-600x600.jpg', 'iPhone 11 là chiếc điện thoại thuộc dòng iPhone được ra mắt vào ngày 10 tháng 9 năm 2019 cùng với iPhone 11 Pro và iPhone 11 Pro Max bởi CEO Tim Cook. Đây là phiên bản kế nhiệm của iPhone XR, với giá bán khởi điểm là 699 USD, rẻ hơn 50 USD so với iPhone XR. iPhone 11 được trang bị vi xử lý Apple A13 Bionic cùng với máy ảnh kép với tính năng chụp góc siêu rộng. Tuy nhiên iPhone 11 chỉ được trang bị sẵn sạc phổ thông 5W trong hộp giống với các thế hệ iPhone tiền nhiệm. Trong khi iPhone 11 Pro và 11 Pro Max được trang bị sạc nhanh 18W, mặc dù 3 phiên bản này đều sỡ hữu công nghệ sạc nhanh.', 0, 0, 4, 1, 1),
(2, 1, 'Iphone 11 64GB Tím', 'Iphone 11', '<table class=\"table\">\r\n							<tbody>\r\n								<tr>\r\n									<td>\r\n										<h5>Màn hình:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>IPS LCD6.1\", Liquid Retina</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Hệ điều hành:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>iOS 15</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Camera sau:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>2 camera 12 MP</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Camera trước:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>12 MP</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Chip:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>Apple A13 Bionic</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>RAM:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>4 GB</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Dung lượng lưu trữ:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>64 GB</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>SIM:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>1 Nano SIM & 1 eSIM, Hỗ trợ 4G</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Pin, Sạc:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>3110 mAh, 18 W</h5>\r\n									</td>\r\n								</tr>\r\n							</tbody>\r\n						</table>', 14990000, 11990000, 16, 'https://cdn.tgdd.vn/Products/Images/42/213031/iphone-12-violet-1-600x600.jpg', 'iPhone 11 là chiếc điện thoại thuộc dòng iPhone được ra mắt vào ngày 10 tháng 9 năm 2019 cùng với iPhone 11 Pro và iPhone 11 Pro Max bởi CEO Tim Cook. Đây là phiên bản kế nhiệm của iPhone XR, với giá bán khởi điểm là 699 USD, rẻ hơn 50 USD so với iPhone XR. iPhone 11 được trang bị vi xử lý Apple A13 Bionic cùng với máy ảnh kép với tính năng chụp góc siêu rộng. Tuy nhiên iPhone 11 chỉ được trang bị sẵn sạc phổ thông 5W trong hộp giống với các thế hệ iPhone tiền nhiệm. Trong khi iPhone 11 Pro và 11 Pro Max được trang bị sạc nhanh 18W, mặc dù 3 phiên bản này đều sỡ hữu công nghệ sạc nhanh.', 0, 1, 2, 1, 1),
(3, 2, 'MacBook Air M1 2020 16GB/256GB/7-core GPU (Z124000DE) Xám', 'MacBook Air', '<table class=\"table\">\r\n							<tbody>\r\n								<tr>\r\n									<td>\r\n										<h5>CPU:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>Apple M1</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>RAM:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>16 GB</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Ổ cứng:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>256 GB SSD</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Màn hình:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>13.3\"Retina (2560 x 1600)</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Card màn hình:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>Card tích hợp7 nhân GPU</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Cổng kết nối:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>2 x Thunderbolt 3 (USB-C)Jack tai nghe 3.5 mm</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Thiết kế:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>Vỏ kim loại nguyên khối</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Kích thước, khối lượng:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>Dài 304.1 mm - Rộng 212.4 mm - Dày 4.1 mm đến 16.1 mm - Nặng 1.29 kg</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Thời điểm ra mắt:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>2020</h5>\r\n									</td>\r\n								</tr>\r\n							</tbody>\r\n						</table>', 33490000, 30290000, 54, 'https://cdn.tgdd.vn/Products/Images/44/239552/apple-macbook-air-m1-2020-z124000de-1-org.jpg', 'MacBook Air 13 2020 – Thiết kế nhỏ gọn, cấu hình mạnh mẽ. Macbook của Apple với cấu hình mạnh luôn được người dùng chào đón. Phiên bản MacBook Air năm 2020 cũng không ngoại lệ. MacBook Air 13 2020 sở hữu thiết kế đẹp mắt cùng cấu hình cực khỏe với nhiều tính năng hấp dẫn. Chiếc laptop mỏng nhẹ, cấu hình cao này hứa hẹn sẽ mang lại những trải nghiệm ấn tượng.', 0, 1, 0, 0, 1),
(4, 2, 'MacBook Pro M2 2022 8GB/256GB/10-core GPU (MNEH3SA/A) Bạc', 'MacBook Pro', '<table class=\"table\">\r\n							<tbody>\r\n								<tr>\r\n									<td>\r\n										<h5>CPU:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>Apple M2100GB/s</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>RAM:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>8 GB</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Ổ cứng:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>256 GB SSD</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Màn hình:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>13.3\"Retina (2560 x 1600)</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Card màn hình:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>Card tích hợp, 10 nhân GPU</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Cổng kết nối:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>2 x Thunderbolt 3Jack tai nghe 3.5 mm</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Thiết kế:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>Vỏ kim loại</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Kích thước, khối lượng:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>Dài 304.1 mm - Rộng 212.4 mm - Dày 15.6 mm - Nặng 1.4 kg</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Thời điểm ra mắt:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>6/2022</h5>\r\n									</td>\r\n								</tr>\r\n							</tbody>\r\n						</table>', 35990000, 32890000, 13, 'https://cdn.tgdd.vn/Products/Images/44/282828/apple-macbook-pro-13-inch-m2-2022-1-1.jpg', 'MacBook Pro M2 2022 là siêu phẩm mạnh nhất nhà Táo tính đến thời điểm hiện tại. Sở hữu con chip M2 silicon thế hệ mới mang tới hiệu suất và tốc độ vượt trội so với chip M1, khả năng xử lý đa tác vụ, đồ hoạ tuyệt vời nhờ sức mạnh từ 8-core CPU và 10-core GPU,... MacBook Pro M2 nhận được đánh giá cao từ chuyên gia và tín đồ yêu công nghệ.', 0, 0, 0, 0, 1),
(5, 2, 'MacBook Pro 16 M1 Max 2021 10 core-CPU/32GB/1TB core-GPU (MK1A3SA/A) Bạc', 'MacBook Pro', '<table class=\"table\">\r\n							<tbody>\r\n								<tr>\r\n									<td>\r\n										<h5>CPU:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>Apple M1 Max400GB/s</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>RAM:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>32 GB</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Ổ cứng:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>1 TB SSD</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Màn hình:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>16.2\"Liquid Retina XDR display (3456 x 2234)120Hz</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Card màn hình:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>Card tích hợp, 32 nhân GPU</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Cổng kết nối:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>HDMI3 x Thunderbolt 4 USB-CJack tai nghe 3.5 mm</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Thiết kế:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>Vỏ kim loại nguyên khối</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Kích thước, khối lượng:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>Dài 355.7 mm - Rộng 248.1 mm - Dày 16.8 mm - Nặng 2.2 kg</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Thời điểm ra mắt:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>10/2021</h5>\r\n									</td>\r\n								</tr>\r\n							</tbody>\r\n						</table>', 85990000, 82690000, 0, 'https://cdn.tgdd.vn/Products/Images/44/253582/apple-macbook-pro-16-m1-max-2021-bac-1.jpg', 'MacBook Pro 16 inch với những cải tiến vượt bậc về mặt hiệu năng, hứa hẹn giúp người dùng có trải nghiệm mượt mà trong các tác vụ nặng như chỉnh sửa hình ảnh phức tạp, render video,... hướng đến đối tượng người dùng có nhu cầu sản xuất, sáng tạo nội dung, kỹ thuật, côn nghệ chuyên nghiệp.', 0, 0, 5, 2, 0),
(6, 3, 'iPad Pro M1 11 inch WiFi Cellular 1TB (2021) Xám', 'Ipad Pro', '<table class=\"table\">\r\n							<tbody>\r\n								<tr>\r\n									<td>\r\n										<h5>Màn hình:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>11\"Liquid Retina</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Hệ điều hành:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>iPadOS 15</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Chip:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>Apple M1</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>RAM:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>16 GB</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Dung lượng lưu trữ:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>1 TB</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>SIM:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>1 Nano SIM hoặc 1 eSIM</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Camera sau:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>Chính 12 MP & Phụ 10 MP, TOF 3D LiDAR</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Camera trước:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>12 MP</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Pin, Sạc:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>28.65 Wh (~ 7538 mAh)20 W</h5>\r\n									</td>\r\n								</tr>\r\n							</tbody>\r\n						</table>', 46990000, 41990000, 39, 'https://cdn.tgdd.vn/Products/Images/522/269329/pad-pro-m1-11-inch-wifi-cellular-1tb-2021-xam-thumb-600x600.jpeg', 'Máy tính bảng iPad Pro M1 11 inch WiFi Cellular 1TB (2021) thiết kế hình hộp vát cạnh vuông vức, hiện đại với thân máy bằng kim loại chắc chắn, hoàn thiện tỉ mỉ và sang trọng, trọng lượng nhẹ, kích cỡ hợp lý thuận tiện sử dụng và mang theo.', 1, 1, 0, 0, 1),
(7, 3, 'iPad Pro M1 11 inch WiFi 128GB (2021) Xám', 'Ipad Pro', '<table class=\"table\">\r\n							<tbody>\r\n								<tr>\r\n									<td>\r\n										<h5>Màn hình:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>11\"Liquid Retina</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Hệ điều hành:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>iPadOS 15</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Chip:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>Apple M1</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>RAM:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>8 GB</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Dung lượng lưu trữ:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>128 GB</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Camera sau:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>Chính 12 MP & Phụ 10 MP, TOF 3D LiDAR</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Camera trước:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>12 MP</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Pin, Sạc:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>28.65 Wh (~ 7538 mAh)20 W</h5>\r\n									</td>\r\n								</tr>\r\n							</tbody>\r\n						</table>', 22990000, 20490000, 136, 'https://cdn.tgdd.vn/Products/Images/522/237695/ipad-pro-m1-11-inch-wifi-gray-9-600x600.jpg', 'iPad Pro M1 11 inch Wifi 128GB (2021) được gia công rắn chắc bằng khung nhôm, trọng lượng chỉ 466 g cho tổng thể gọn nhẹ giúp người dùng cảm thấy thoải mái, dễ chịu hơn mỗi khi cầm nắm sử dụng.', 1, 0, 0, 0, 1),
(8, 1, 'iPhone 14 Pro 128GB Bạc', 'Iphone 14', '<table class=\"table\">\r\n							<tbody>\r\n								<tr>\r\n									<td>\r\n										<h5>Màn hình:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>OLED6.1\"Super Retina XDR</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Hệ điều hành:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>iOS 16</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Camera sau:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>Chính 48 MP & Phụ 12 MP, 12 MP</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Camera trước:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>12 MP</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Chip:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>Apple A16 Bionic</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>RAM:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>6 GB</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Dung lượng lưu trữ:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>128 GB</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>SIM:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>1 Nano SIM & 1 eSIM, Hỗ trợ 5G</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Pin, Sạc:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>3200 mAh, 20 W</h5>\r\n									</td>\r\n								</tr>\r\n							</tbody>\r\n						</table>', 30990000, 30590000, 50, 'https://cdn.tgdd.vn/Products/Images/42/247508/iphone-14-pro-bac-thumb-600x600.jpg', 'Thừa hưởng phong cách thiết kế tối giản, hiện đại của thế hệ iPhone 13 series, iPhone 14 Pro vẫn sở hữu cạnh viền vát phẳng và hệ thống camera được bố trí một cách hợp lý trong một cụm hình vuông. Giờ đây cụm tai thỏ quen thuộc đã được loại bỏ và thay thế vào đó là hình notch độc đáo dễ nhận diện.', 0, 0, 0, 0, 1),
(9, 4, 'Apple Watch S6 40mm viền nhôm dây silicone Đỏ', 'Apple Watch S6', '<table class=\"table\">\r\n							<tbody>\r\n								<tr>\r\n									<td>\r\n										<h5>Màn hình:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>OLED 1.57 inch</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Thời lượng pin:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>Khoảng 1.5 ngày</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Kết nối với hệ điều hành:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>iPhone 8 trở lên với iOS phiên bản mới nhất</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Mặt:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>Ion-X strengthened glass</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Tính năng cho sức khỏe:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>Tính lượng calories tiêu thụ, Đo nồng độ oxy (SpO2), Tính quãng đường chạy, Điện tâm đồ, Chế độ luyện tập, Theo dõi giấc ngủ, Đo nhịp timĐếm số bước chân</h5>\r\n									</td>\r\n								</tr>\r\n							</tbody>\r\n						</table>', 9990000, 6493000, 50, 'https://cdn.tgdd.vn/Products/Images/7077/229044/apple-watch-s6-40mm-vien-nhom-day-cao-su-red-do-cont-1-org-org.jpg', 'Apple Watch Series 6 mang đến những nâng cấp hữu ích để hỗ trợ người dùng một cách tối ưu nhất. Nổi bật trong số đó là chip xử lý S6 cải thiện hiệu năng, hệ điều hành WatchOS 7 với nhiều tính năng mới hứa hẹn sẽ mang đến những trải nghiệm tốt hơn, thú vị hơn.', 1, 1, 0, 0, 1),
(10, 4, 'Apple Watch SE 40mm viền nhôm dây silicone Xanh đen', 'Apple Watch SE', '<table class=\"table\">\r\n							<tbody>\r\n								<tr>\r\n									<td>\r\n										<h5>Màn hình:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>OLED 1.57 inch</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Thời lượng pin:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>Khoảng 1.5 ngày</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Kết nối với hệ điều hành:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>iPhone 8 trở lên với iOS phiên bản mới nhất</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Mặt:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>Ion-X strengthened glass</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Tính năng cho sức khỏe:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>Tính lượng calories tiêu thụ, Tính quãng đường chạy, Điện tâm đồ, Chế độ luyện tập, Theo dõi giấc ngủ, Đo nhịp timĐếm số bước chân</h5>\r\n									</td>\r\n								</tr>\r\n							</tbody>\r\n						</table>', 8990000, 6742000, 0, 'https://cdn.tgdd.vn/Products/Images/7077/234918/se-40mm-vien-nhom-day-cao-su-xanh-den-01.jpg', 'Apple Watch SE 40mm viền nhôm dây silicone hồng có thiết kế bo tròn 4 góc giúp thao tác vuốt chạm thoải mái hơn. Mặt kính cường lực Ion-X strengthened glass với kích thước 1.57 inch, hiển thị rõ ràng. Khung viền nhôm chắc chắn cùng dây đeo silicone có độ đàn hồi cao, êm ái, tạo cảm giác thoải mái khi đeo.', 0, 0, 0, 0, 0),
(11, 1, 'Iphone 13 Pro Max 128GB Xanh lá', 'Iphone 13', '<table class=\"table\">\r\n							<tbody>\r\n								<tr>\r\n									<td>\r\n										<h5>Màn hình:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>OLED6.7\"Super Retina XDR</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Hệ điều hành:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>iOS 15</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Camera sau:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>3 camera 12 MP</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Camera trước:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>12 MP</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Chip:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>Apple A15 Bionic</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>RAM:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>6 GB</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Dung lượng lưu trữ:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>128 GB</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>SIM:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>1 Nano SIM & 1 eSIM, Hỗ trợ 5G</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Pin, Sạc:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>4352 mAh, 20 W</h5>\r\n									</td>\r\n								</tr>\r\n							</tbody>\r\n						</table>', 33990000, 28490000, 29, 'https://cdn.tgdd.vn/Products/Images/42/230529/iphone-13-pro-max-xanh-la-thumb-1-600x600.jpg', 'Điện thoại iPhone 13 Pro Max 128 GB - siêu phẩm được mong chờ nhất ở nửa cuối năm 2021 đến từ Apple. Máy có thiết kế không mấy đột phá khi so với người tiền nhiệm, bên trong đây vẫn là một sản phẩm có màn hình siêu đẹp, tần số quét được nâng cấp lên 120 Hz mượt mà, cảm biến camera có kích thước lớn hơn, cùng hiệu năng mạnh mẽ với sức mạnh đến từ Apple A15 Bionic, sẵn sàng cùng bạn chinh phục mọi thử thách.', 0, 1, 0, 0, 1),
(12, 1, 'Iphone 14 Pro Max 128GB Bạc', 'Iphone 14', '<table class=\"table\">\r\n							<tbody>\r\n								<tr>\r\n									<td>\r\n										<h5>Màn hình:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>OLED6.7\"Super Retina XDR</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Hệ điều hành:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>iOS 16</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Camera sau:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>Chính 48 MP & Phụ 12 MP, 12 MP</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Camera trước:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>12 MP</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Chip:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>Apple A16 Bionic</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>RAM:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>6 GB</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Dung lượng lưu trữ:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>128 GB</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>SIM:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>1 Nano SIM & 1 eSIM, Hỗ trợ 5G</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Pin, Sạc:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>4323 mAh, 20 W</h5>\r\n									</td>\r\n								</tr>\r\n							</tbody>\r\n						</table>', 33990000, 33590000, 14, 'https://cdn.tgdd.vn/Products/Images/42/251192/iphone-14-pro-max-bac-thumb-600x600.jpg', 'Sản phẩm có trong mình một diện mạo bắt mắt nhờ lối tạo hình vuông vức bắt trend tương tự thế hệ iPhone 13 series, đây được xem là kiểu thiết kế rất thành công trên các thế hệ trước khi tạo nên cơn sốt toàn cầu về kiểu dáng thiết kế điện thoại cho đến nay. ', 1, 1, 0, 0, 1),
(13, 1, 'Iphone 12 64GB Tím', 'Iphone 12', '<table class=\"table\">\r\n							<tbody>\r\n								<tr>\r\n									<td>\r\n										<h5>Màn hình:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>OLED6.1\"Super Retina XDR</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Hệ điều hành:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>iOS 15</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Camera sau:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>2 camera 12 MP</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Camera trước:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>12 MP</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Chip:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>Apple A14 Bionic</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>RAM:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>4 GB</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Dung lượng lưu trữ:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>64 GB</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>SIM:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>1 Nano SIM & 1 eSIM, Hỗ trợ 5G</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Pin, Sạc:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>2815 mAh, 20 W</h5>\r\n									</td>\r\n								</tr>\r\n							</tbody>\r\n						</table>', 19990000, 16990000, 13, 'https://cdn.tgdd.vn/Products/Images/42/213031/iphone-12-violet-1-600x600.jpg', 'Trong những tháng cuối năm 2020, Apple đã chính thức giới thiệu đến người dùng cũng như iFan thế hệ iPhone 12 series mới với hàng loạt tính năng bứt phá, thiết kế được lột xác hoàn toàn, hiệu năng đầy mạnh mẽ và một trong số đó chính là iPhone 12 64GB.', 0, 0, 0, 0, 1),
(14, 1, 'Iphone 12 64GB Đen', 'Iphone 12', '<table class=\"table\">\r\n							<tbody>\r\n								<tr>\r\n									<td>\r\n										<h5>Màn hình:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>OLED6.1\"Super Retina XDR</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Hệ điều hành:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>iOS 15</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Camera sau:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>2 camera 12 MP</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Camera trước:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>12 MP</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Chip:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>Apple A14 Bionic</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>RAM:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>4 GB</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Dung lượng lưu trữ:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>64 GB</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>SIM:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>1 Nano SIM & 1 eSIM, Hỗ trợ 5G</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Pin, Sạc:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>2815 mAh, 20 W</h5>\r\n									</td>\r\n								</tr>\r\n							</tbody>\r\n						</table>', 19990000, 16990000, 13, 'https://www.nguyenkim.com/images/detailed/698/10047698-dien-thoai-iphone-12-64gb-den-1.jpg', 'Trong những tháng cuối năm 2020, Apple đã chính thức giới thiệu đến người dùng cũng như iFan thế hệ iPhone 12 series mới với hàng loạt tính năng bứt phá, thiết kế được lột xác hoàn toàn, hiệu năng đầy mạnh mẽ và một trong số đó chính là iPhone 12 64GB.', 0, 1, 0, 0, 1),
(15, 1, 'Iphone 13 Pro Max 128GB Xám', 'Iphone 13', '<table class=\"table\">\r\n							<tbody>\r\n								<tr>\r\n									<td>\r\n										<h5>Màn hình:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>OLED6.7\"Super Retina XDR</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Hệ điều hành:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>iOS 15</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Camera sau:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>3 camera 12 MP</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Camera trước:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>12 MP</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Chip:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>Apple A15 Bionic</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>RAM:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>6 GB</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Dung lượng lưu trữ:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>128 GB</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>SIM:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>1 Nano SIM & 1 eSIM, Hỗ trợ 5G</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Pin, Sạc:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>4352 mAh, 20 W</h5>\r\n									</td>\r\n								</tr>\r\n							</tbody>\r\n						</table>', 33990000, 28490000, 29, 'https://www.nguyenkim.com/images/detailed/756/dien-thoai-iphone-13-pro-max-512gb-xam-1.jpg', 'Điện thoại iPhone 13 Pro Max 128 GB - siêu phẩm được mong chờ nhất ở nửa cuối năm 2021 đến từ Apple. Máy có thiết kế không mấy đột phá khi so với người tiền nhiệm, bên trong đây vẫn là một sản phẩm có màn hình siêu đẹp, tần số quét được nâng cấp lên 120 Hz mượt mà, cảm biến camera có kích thước lớn hơn, cùng hiệu năng mạnh mẽ với sức mạnh đến từ Apple A15 Bionic, sẵn sàng cùng bạn chinh phục mọi thử thách.', 0, 1, 0, 0, 1),
(16, 2, 'MacBook Air M1 2020 16GB/256GB/7-core GPU (Z124000DE) Vàn đồng', 'MacBook Air', '<table class=\"table\">\r\n							<tbody>\r\n								<tr>\r\n									<td>\r\n										<h5>CPU:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>Apple M1</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>RAM:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>16 GB</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Ổ cứng:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>256 GB SSD</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Màn hình:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>13.3\"Retina (2560 x 1600)</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Card màn hình:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>Card tích hợp7 nhân GPU</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Cổng kết nối:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>2 x Thunderbolt 3 (USB-C)Jack tai nghe 3.5 mm</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Thiết kế:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>Vỏ kim loại nguyên khối</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Kích thước, khối lượng:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>Dài 304.1 mm - Rộng 212.4 mm - Dày 4.1 mm đến 16.1 mm - Nặng 1.29 kg</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Thời điểm ra mắt:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>2020</h5>\r\n									</td>\r\n								</tr>\r\n							</tbody>\r\n						</table>', 33490000, 30290000, 54, 'https://cdn.tgdd.vn/Products/Images/44/239552/macbook-air-m1-2020-gold-01-org.jpg', 'MacBook Air 13 2020 – Thiết kế nhỏ gọn, cấu hình mạnh mẽ. Macbook của Apple với cấu hình mạnh luôn được người dùng chào đón. Phiên bản MacBook Air năm 2020 cũng không ngoại lệ. MacBook Air 13 2020 sở hữu thiết kế đẹp mắt cùng cấu hình cực khỏe với nhiều tính năng hấp dẫn. Chiếc laptop mỏng nhẹ, cấu hình cao này hứa hẹn sẽ mang lại những trải nghiệm ấn tượng.', 0, 1, 0, 0, 1),
(17, 2, 'MacBook Pro M2 2022 8GB/256GB/10-core GPU (MNEH3SA/A) Xám', 'MacBook Pro', '<table class=\"table\">\r\n							<tbody>\r\n								<tr>\r\n									<td>\r\n										<h5>CPU:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>Apple M2100GB/s</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>RAM:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>8 GB</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Ổ cứng:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>256 GB SSD</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Màn hình:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>13.3\"Retina (2560 x 1600)</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Card màn hình:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>Card tích hợp, 10 nhân GPU</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Cổng kết nối:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>2 x Thunderbolt 3Jack tai nghe 3.5 mm</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Thiết kế:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>Vỏ kim loại</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Kích thước, khối lượng:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>Dài 304.1 mm - Rộng 212.4 mm - Dày 15.6 mm - Nặng 1.4 kg</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Thời điểm ra mắt:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>6/2022</h5>\r\n									</td>\r\n								</tr>\r\n							</tbody>\r\n						</table>', 35990000, 32890000, 13, 'https://cdn.tgdd.vn/Products/Images/44/282828/apple-macbook-pro-13-inch-m2-2022-1.jpg', 'MacBook Pro M2 2022 là siêu phẩm mạnh nhất nhà Táo tính đến thời điểm hiện tại. Sở hữu con chip M2 silicon thế hệ mới mang tới hiệu suất và tốc độ vượt trội so với chip M1, khả năng xử lý đa tác vụ, đồ hoạ tuyệt vời nhờ sức mạnh từ 8-core CPU và 10-core GPU,... MacBook Pro M2 nhận được đánh giá cao từ chuyên gia và tín đồ yêu công nghệ.', 1, 0, 0, 0, 1),
(18, 2, 'MacBook Pro 16 M1 Max 2021 10 core-CPU/32GB/1TB core-GPU (MK1A3SA/A) Xám', 'MacBook Pro', '<table class=\"table\">\r\n							<tbody>\r\n								<tr>\r\n									<td>\r\n										<h5>CPU:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>Apple M1 Max400GB/s</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>RAM:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>32 GB</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Ổ cứng:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>1 TB SSD</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Màn hình:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>16.2\"Liquid Retina XDR display (3456 x 2234)120Hz</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Card màn hình:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>Card tích hợp, 32 nhân GPU</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Cổng kết nối:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>HDMI3 x Thunderbolt 4 USB-CJack tai nghe 3.5 mm</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Thiết kế:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>Vỏ kim loại nguyên khối</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Kích thước, khối lượng:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>Dài 355.7 mm - Rộng 248.1 mm - Dày 16.8 mm - Nặng 2.2 kg</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Thời điểm ra mắt:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>10/2021</h5>\r\n									</td>\r\n								</tr>\r\n							</tbody>\r\n						</table>', 85990000, 82690000, 0, 'https://cdn.tgdd.vn/Products/Images/44/253582/apple-macbook-pro-16-m1-max-2021-1.jpg', 'MacBook Pro 16 inch với những cải tiến vượt bậc về mặt hiệu năng, hứa hẹn giúp người dùng có trải nghiệm mượt mà trong các tác vụ nặng như chỉnh sửa hình ảnh phức tạp, render video,... hướng đến đối tượng người dùng có nhu cầu sản xuất, sáng tạo nội dung, kỹ thuật, côn nghệ chuyên nghiệp.', 0, 0, 5, 2, 0),
(19, 2, 'MacBook Pro 14 M1 Max 2021 10-core CPU/32GB/512GB/24-core GPU (Z15G) Xám', 'MacBook Pro', '<table class=\"table\">\r\n							<tbody>\r\n								<tr>\r\n									<td>\r\n										<h5>CPU:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>Apple M1 Max400GB/s</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>RAM:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>32 GB</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Ổ cứng:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>512 GB SSD</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Màn hình:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>14.2\"Liquid Retina XDR display (3024 x 1964)120Hz</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Card màn hình:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>Card tích hợp, 24 nhân GPU</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Cổng kết nối:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>HDMI3 x Thunderbolt 4 USB-CJack tai nghe 3.5 mm</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Thiết kế:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>Vỏ kim loại nguyên khối</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Kích thước, khối lượng:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>Dài 312.6 mm - Rộng 221.2 mm - Dày 15.5 mm - Nặng 1.6 kg</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Thời điểm ra mắt:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>10/2021</h5>\r\n									</td>\r\n								</tr>\r\n							</tbody>\r\n						</table>', 71900000, 63600000, 35, 'https://cdn.tgdd.vn/Products/Images/44/263914/macbook-pro-14-m1-max-2021-10-core-cpu-xam-1.jpg', 'Khoác lên mình vẻ ngoài mới lạ so với các dòng Mac trước đó, thiết kế màn hình tai thỏ ấn tượng, bắt mắt cùng bộ hiệu năng đỉnh cao M1 Max mạnh mẽ, MacBook Pro 14 inch M1 Max 2021 xứng tầm là chiếc laptop cao cấp chuyên dụng dành cho dân kỹ thuật - đồ họa, sáng tạo nội dung.', 1, 1, 0, 0, 1),
(20, 3, 'iPad Pro M1 11 inch WiFi Cellular 2TB (2021) Bạc', 'Ipad Pro', '<table class=\"table\">\r\n							<tbody>\r\n								<tr>\r\n									<td>\r\n										<h5>Màn hình:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>11\"Liquid Retina</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Hệ điều hành:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>iPadOS 15</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Chip:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>Apple M1</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>RAM:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>16 GB</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Dung lượng lưu trữ:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>2 TB</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>SIM:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>1 Nano SIM hoặc 1 eSIM</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Camera sau:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>Chính 12 MP & Phụ 10 MP, TOF 3D LiDAR</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Camera trước:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>12 MP</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Pin, Sạc:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>28.65 Wh (~ 7538 mAh), 20 W</h5>\r\n									</td>\r\n								</tr>\r\n							</tbody>\r\n						</table>', 55990000, 50990000, 39, 'https://cdn.tgdd.vn/Products/Images/522/269330/ipad-pro-m1-11-inch-wifi-cellular-bac-1.jpg', 'Máy tính bảng iPad Pro M1 11 inch WiFi Cellular 1TB (2021) thiết kế hình hộp vát cạnh vuông vức, hiện đại với thân máy bằng kim loại chắc chắn, hoàn thiện tỉ mỉ và sang trọng, trọng lượng nhẹ, kích cỡ hợp lý thuận tiện sử dụng và mang theo.', 0, 0, 3, 1, 1),
(21, 2, 'MacBook Pro 14 M1 Pro 2021 10-core CPU/32GB/512GB/16-core GPU (Z15J001N0) Bạc', 'MacBook Pro', '<table class=\"table\">\r\n							<tbody>\r\n								<tr>\r\n									<td>\r\n										<h5>CPU:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>Apple M1 Pro200GB/s</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>RAM:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>32 GB</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Ổ cứng:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>512 GB SSD</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Màn hình:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>14.2\"Liquid Retina XDR display (3024 x 1964)120Hz</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Card màn hình:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>Card tích hợp, 16 nhân GPU</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Cổng kết nối:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>HDMI3 x Thunderbolt 4 USB-CJack tai nghe 3.5 mm</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Thiết kế:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>Vỏ kim loại nguyên khối</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Kích thước, khối lượng:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>Dài 312.6 mm - Rộng 221.2 mm - Dày 15.5 mm - Nặng 1.6 kg</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Thời điểm ra mắt:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>10/2021</h5>\r\n									</td>\r\n								</tr>\r\n							</tbody>\r\n						</table>', 71900000, 63050000, 0, 'https://cdn.tgdd.vn/Products/Images/44/275442/macbook-pro-14-inch-m1-pro-2021-10-core-cpu-bac-1.jpg', 'Khoác lên mình vẻ ngoài mới lạ so với các dòng Mac trước đó, thiết kế màn hình tai thỏ ấn tượng, bắt mắt cùng bộ hiệu năng đỉnh cao M1 Max mạnh mẽ, MacBook Pro 14 inch M1 Max 2021 xứng tầm là chiếc laptop cao cấp chuyên dụng dành cho dân kỹ thuật - đồ họa, sáng tạo nội dung.', 0, 0, 0, 0, 1),
(22, 3, 'iPad Pro M2 12.9 inch WiFi Cellular 256GB Bạc', 'Ipad Pro', '<table class=\"table\">\r\n							<tbody>\r\n								<tr>\r\n									<td>\r\n										<h5>Màn hình:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>11\"Liquid Retina</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Hệ điều hành:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>iPadOS 15</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Chip:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>Apple M1</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>RAM:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>16 GB</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Dung lượng lưu trữ:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>2 TB</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>SIM:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>1 Nano SIM hoặc 1 eSIM</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Camera sau:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>Chính 12 MP & Phụ 10 MP, TOF 3D LiDAR</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Camera trước:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>12 MP</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Pin, Sạc:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>28.65 Wh (~ 7538 mAh), 20 W</h5>\r\n									</td>\r\n								</tr>\r\n							</tbody>\r\n						</table>', 39990000, 38990000, 39, 'https://cdn.tgdd.vn/Products/Images/522/295468/ipad-pro-m2-5g-sliver-1.jpg', 'Sau chuỗi sản phẩm iPhone 14 series được ra mắt thì Apple tiếp tục giới thiệu đến người dùng các mẫu iPad 2022. Trong đó máy tính bảng iPad Pro M2 12.9 inch WiFi Cellular 256GB được nhiều người dùng quan tâm bởi cấu hình mạnh mẽ, màn hình lớn phục vụ tốt cho công việc lẫn giải trí.', 0, 0, 3, 1, 1),
(23, 4, 'Apple Watch Series 7 LTE 41mm Trắng', 'Apple Watch S7', '<table class=\"table\">\r\n							<tbody>\r\n								<tr>\r\n									<td>\r\n										<h5>Màn hình:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>OLED 1.61 inch</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Thời lượng pin:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>Khoảng 18 giờ (ở chế độ sử dụng thông thường)Khoảng 1.5 ngày (ở chế độ tiết kiệm pin)</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Kết nối với hệ điều hành:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>iPhone 8 trở lên với iOS phiên bản mới nhất</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Mặt:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>Ion-X strengthened glass</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Tính năng cho sức khỏe:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>Tính lượng calories tiêu thụ, Tính quãng đường chạy, Điện tâm đồ, Chế độ luyện tập, Theo dõi giấc ngủ, Đo nhịp timĐếm số bước chân</h5>\r\n									</td>\r\n								</tr>\r\n							</tbody>\r\n						</table>', 14990000, 12690000, 15, 'https://cdn.tgdd.vn/Products/Images/7077/250639/apple-watch-s7-lte-41mm-vang-1.jpg', 'Thiết kế của Apple Watch S7 GPS thừa hưởng nhiều nét tương đồng với \"người anh\" Apple Watch S6 nhưng các góc cạnh được vát tròn mềm mại hơn mang đến cho người đeo cảm giác thanh lịch nhưng không kém phần năng động. Chiếc smartwatch thế hệ thứ 7 được nhà Táo trang bị màn hình OLED 1.61 inch với viền màn hình mỏng hơn 40%, nâng diện tích màn hình lên 20% và nội dung hiển thị trên màn hình cũng nhiều hơn 50% so với thế hệ cũ.', 1, 0, 0, 0, 1);
INSERT INTO `sanpham` (`MaSP`, `MaLSP`, `TenSP`, `TenSeries`, `ChiTiet`, `GiaGoc`, `GiaTien`, `SoLuong`, `HinhAnh`, `MoTa`, `New`, `Hot`, `SoSao`, `SoDanhGia`, `TrangThai`) VALUES
(24, 4, 'Apple Watch Series 7 GPS 41mm Xanh dương', 'Apple Watch S7', '<table class=\"table\">\r\n							<tbody>\r\n								<tr>\r\n									<td>\r\n										<h5>Màn hình:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>OLED 1.57 inch</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Thời lượng pin:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>Khoảng 1.5 ngày</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Kết nối với hệ điều hành:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>iPhone 8 trở lên với iOS phiên bản mới nhất</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Mặt:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>Ion-X strengthened glass</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Tính năng cho sức khỏe:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>Tính lượng calories tiêu thụ, Tính quãng đường chạy, Điện tâm đồ, Chế độ luyện tập, Theo dõi giấc ngủ, Đo nhịp timĐếm số bước chân</h5>\r\n									</td>\r\n								</tr>\r\n							</tbody>\r\n						</table>', 11990000, 9990000, 59, 'https://cdn.tgdd.vn/Products/Images/7077/249906/apple-watch-s7-41mm-gps-xanh-duong-1-1.jpg', 'Thiết kế của Apple Watch S7 GPS thừa hưởng nhiều nét tương đồng với \"người anh\" Apple Watch S6 nhưng các góc cạnh được vát tròn mềm mại hơn mang đến cho người đeo cảm giác thanh lịch nhưng không kém phần năng động. Chiếc smartwatch thế hệ thứ 7 được nhà Táo trang bị màn hình OLED 1.61 inch với viền màn hình mỏng hơn 40%, nâng diện tích màn hình lên 20% và nội dung hiển thị trên màn hình cũng nhiều hơn 50% so với thế hệ cũ.', 1, 0, 0, 0, 1),
(25, 4, ' Apple Watch S8 LTE 41mm dây thép Vàng', 'Apple Watch S8', '<table class=\"table\">\r\n							<tbody>\r\n								<tr>\r\n									<td>\r\n										<h5>Màn hình:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>OLED 1.9 inch</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Thời lượng pin:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>Khoảng 18 giờ (ở chế độ sử dụng thông thường), Khoảng 1.5 ngày (ở chế độ tiết kiệm pin)</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Kết nối với hệ điều hành:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>iPhone 8 trở lên với iOS phiên bản mới nhất</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Mặt:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>Kính Sapphire, 41 mm</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Tính năng cho sức khỏe:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>Theo dõi chu kì kinh nguyệt, Tính quãng đường chạy, Nhắc nhở nhịp tim cao, thấpTheo dõi mức độ stress, Đo nồng độ oxy (SpO2), Đếm số bước chân, Chấm điểm giấc ngủ, Theo dõi giấc ngủ, Điện tâm đồ, Đo lượng tiêu thụ oxy tối đa (VO2 max), Ước tính ngày rụng trứng, Cảm biến nhiệt độ, Đo nhịp tim</h5>\r\n									</td>\r\n								</tr>\r\n							</tbody>\r\n						</table>', 21990000, 21190000, 5, 'https://cdn.tgdd.vn/Products/Images/7077/289840/apple-watch-s8-lte-41mm-day-thep-vang-1.jpg', 'Đồng hồ thông minh Apple Watch S8 LTE 41mm dây thép với định hướng là một trong những dòng sản phẩm cao cấp đứng đầu trong phân khúc nên được hãng trang bị cho nhiều tính năng cao cấp. Ngoài ra, đồng hồ còn khoác lên mình diện mạo thời thượng, giúp cho người đeo toát lên vẻ thần thái.', 1, 0, 0, 0, 1),
(26, 1, 'iPhone 13 mini 128GB Hồng', 'Iphone 13', '<table class=\"table\">\r\n							<tbody>\r\n								<tr>\r\n									<td>\r\n										<h5>Màn hình:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>OLED5.4\"Super Retina XDR</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Hệ điều hành:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>iOS 15</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Camera sau:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>2 camera 12 MP</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Camera trước:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>12 MP</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Chip:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>Apple A15 Bionic</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>RAM:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>4 GB</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Dung lượng lưu trữ:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>128 GB</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>SIM:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>1 Nano SIM & 1 eSIM, Hỗ trợ 5G</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Pin, Sạc:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>2438 mAh20 W</h5>\r\n									</td>\r\n								</tr>\r\n							</tbody>\r\n						</table>', 21990000, 17490000, 6, 'https://www.nguyenkim.com/images/detailed/755/dien-thoai-iphone-13-mini-128gb-hong-1.jpg', 'iPhone 13 mini được Apple ra mắt với hàng loạt nâng cấp về cấu hình và các tính năng hữu ích, lại có thiết kế vừa vặn. Chiếc điện thoại này hứa hẹn là một thiết bị hoàn hảo hướng tới những khách hàng thích sự nhỏ gọn nhưng vẫn giữ được sự mạnh mẽ bên trong. ', 0, 1, 0, 0, 1),
(27, 1, 'iPhone 13 mini 128GB Xanh dương', 'Iphone 13', '<table class=\"table\">\r\n							<tbody>\r\n								<tr>\r\n									<td>\r\n										<h5>Màn hình:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>OLED5.4\"Super Retina XDR</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Hệ điều hành:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>iOS 15</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Camera sau:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>2 camera 12 MP</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Camera trước:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>12 MP</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Chip:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>Apple A15 Bionic</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>RAM:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>4 GB</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Dung lượng lưu trữ:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>128 GB</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>SIM:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>1 Nano SIM & 1 eSIM, Hỗ trợ 5G</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Pin, Sạc:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>2438 mAh20 W</h5>\r\n									</td>\r\n								</tr>\r\n							</tbody>\r\n						</table>', 21990000, 17490000, 6, 'https://cdn.tgdd.vn/Products/Images/42/236780/iphone-13-mini-blue-2-600x600.jpg', 'iPhone 13 mini được Apple ra mắt với hàng loạt nâng cấp về cấu hình và các tính năng hữu ích, lại có thiết kế vừa vặn. Chiếc điện thoại này hứa hẹn là một thiết bị hoàn hảo hướng tới những khách hàng thích sự nhỏ gọn nhưng vẫn giữ được sự mạnh mẽ bên trong. ', 0, 1, 0, 0, 1),
(28, 1, 'iPhone 13 mini 512GB Đỏ', 'Iphone 13', '<table class=\"table\">\r\n							<tbody>\r\n								<tr>\r\n									<td>\r\n										<h5>Màn hình:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>OLED, 5.4\"Super Retina XDR</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Hệ điều hành:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>iOS 15</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Camera sau:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>2 camera 12 MP</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Camera trước:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>12 MP</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Chip:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>Apple A15 Bionic</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>RAM:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>4 GB</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Dung lượng lưu trữ:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>512 GB</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>SIM:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>1 Nano SIM & 1 eSIM, Hỗ trợ 5G</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Pin, Sạc:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>2438 mAh, 20 W</h5>\r\n									</td>\r\n								</tr>\r\n							</tbody>\r\n						</table>', 30990000, 22490000, 6, 'https://www.nguyenkim.com/images/detailed/755/dien-thoai-iphone-13-mini-128gb-do-1.jpg', 'iPhone 13 mini 512 GB là chiếc điện thoại có thiết kế nhỏ gọn, ngoại hình khá là dễ thương khi nằm gọn trong bàn tay nhưng lại gây bất ngờ hơn nữa với sức mạnh hiệu năng đáng kinh ngạc, màn hình OLED siêu nét cùng camera nhiếp ảnh chuyên nghiệp.', 0, 1, 0, 0, 1),
(29, 1, 'iPhone 14 128GB Trắng', 'Iphone 14', '<table class=\"table\">\r\n							<tbody>\r\n								<tr>\r\n									<td>\r\n										<h5>Màn hình:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>OLED6.1\"Super Retina XDR</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Hệ điều hành:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>iOS 16</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Camera sau:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>2 camera 12 MP</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Camera trước:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>12 MP</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Chip:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>Apple A15 Bionic</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>RAM:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>6 GB</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Dung lượng lưu trữ:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>128 GB</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>SIM:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>1 Nano SIM & 1 eSIM, Hỗ trợ 5G</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Pin, Sạc:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>3279 mAh20 W</h5>\r\n									</td>\r\n								</tr>\r\n							</tbody>\r\n						</table>', 24990000, 22790000, 12, 'https://www.nguyenkim.com/images/product/829/dien-thoai-iphone-14-128gb-trang-1.jpg', 'Sau bao khoảng thời gian dài chờ đợi thì vào ngày 08/09 chiếc điện thoại iPhone 14 cũng đã chính thức được lộ diện, với hàng loạt thông số kỹ thuật ấn tượng từ camera cho đến hiệu năng cực khủng. Từ ngày 14/10/2022 tại Thế Giới Di Động cũng đã chính thức mở bán tất cả các phiên bản iPhone 14 series để người dùng có thể sớm ngày được trải nghiệm.', 1, 0, 0, 0, 1),
(30, 1, 'iPhone 14 128GB Tím', 'Iphone 14', '<table class=\"table\">\r\n							<tbody>\r\n								<tr>\r\n									<td>\r\n										<h5>Màn hình:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>OLED6.1\"Super Retina XDR</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Hệ điều hành:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>iOS 16</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Camera sau:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>2 camera 12 MP</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Camera trước:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>12 MP</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Chip:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>Apple A15 Bionic</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>RAM:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>6 GB</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Dung lượng lưu trữ:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>128 GB</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>SIM:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>1 Nano SIM & 1 eSIM, Hỗ trợ 5G</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Pin, Sạc:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>3279 mAh20 W</h5>\r\n									</td>\r\n								</tr>\r\n							</tbody>\r\n						</table>', 24990000, 22790000, 3, 'https://cdn01.dienmaycholon.vn/filewebdmclnew/DMCL21/Picture//Apro/Apro_product_31414/iphone-14-128gb_main_827_1020.png.webp', 'Sau bao khoảng thời gian dài chờ đợi thì vào ngày 08/09 chiếc điện thoại iPhone 14 cũng đã chính thức được lộ diện, với hàng loạt thông số kỹ thuật ấn tượng từ camera cho đến hiệu năng cực khủng. Từ ngày 14/10/2022 tại Thế Giới Di Động cũng đã chính thức mở bán tất cả các phiên bản iPhone 14 series để người dùng có thể sớm ngày được trải nghiệm.', 1, 0, 0, 0, 1),
(31, 2, 'MacBook Air M2 2022 16GB/256GB/8-core GPU (Z16000051) Xanh đen', 'MacBook Air', '<table class=\"table\">\r\n							<tbody>\r\n								<tr>\r\n									<td>\r\n										<h5>CPU:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>Apple M2100GB/s</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>RAM:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>16 GB</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Ổ cứng:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>256 GB SSD</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Màn hình:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>13.6\"Liquid Retina (2560 x 1664)</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Card màn hình:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>Card tích hợp, 8 nhân GPU</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Cổng kết nối:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>2 x Thunderbolt 3, MagSafe 3, Jack tai nghe 3.5 mm</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Thiết kế:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>Vỏ kim loại</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Kích thước, khối lượng:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>Dài 304.1 mm - Rộng 215 mm - Dày 11.3 mm - Nặng 1.24 kg</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Thời điểm ra mắt:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>6/2022</h5>\r\n									</td>\r\n								</tr>\r\n							</tbody>\r\n						</table>', 38990000, 36490000, 2, 'https://cdn.tgdd.vn/Products/Images/44/289472/apple-macbook-air-m2-2022-16gb-256gb-1-2.jpg', 'Với sức mạnh bùng nổ đến từ bộ vi xử lý M2 cùng thiết kế của một chiếc laptop cao cấp - sang trọng, MacBook Air M2 đáp ứng đầy đủ mọi nhu cầu từ học tập, văn phòng đến đồ họa, kỹ thuật nâng cao.', 0, 1, 0, 0, 1),
(32, 2, 'MacBook Air M2 2022 16GB/512GB/10-core GPU (Z1610003L) Vàng', 'MacBook Air', '<table class=\"table\">\r\n							<tbody>\r\n								<tr>\r\n									<td>\r\n										<h5>CPU:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>Apple M2100GB/s</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>RAM:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>16 GB</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Ổ cứng:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>256 GB SSD</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Màn hình:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>13.6\"Liquid Retina (2560 x 1664)</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Card màn hình:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>Card tích hợp, 8 nhân GPU</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Cổng kết nối:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>2 x Thunderbolt 3, MagSafe 3, Jack tai nghe 3.5 mm</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Thiết kế:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>Vỏ kim loại</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Kích thước, khối lượng:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>Dài 304.1 mm - Rộng 215 mm - Dày 11.3 mm - Nặng 1.24 kg</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Thời điểm ra mắt:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>6/2022</h5>\r\n									</td>\r\n								</tr>\r\n							</tbody>\r\n						</table>', 46990000, 41790000, 5, 'https://cdn.tgdd.vn/Products/Images/44/289441/apple-macbook-air-m2-2022-16gb-1-1.jpg', 'MacBook Air M2 2022 một lần nữa đã khẳng định vị thế hàng đầu của Apple trong phân khúc laptop cao cấp - sang trọng vào giữa năm 2022 khi sở hữu phong cách thiết kế thời thượng, đẳng cấp cùng sức mạnh bộc phá đến từ bộ vi xử lý Apple M2 mạnh mẽ.', 0, 1, 0, 0, 1),
(33, 2, 'MacBook Air M2 2022 8GB/256GB/8-core GPU (MLXW3SA/A) Xám', 'MacBook Air', '<table class=\"table\">\r\n							<tbody>\r\n								<tr>\r\n									<td>\r\n										<h5>CPU:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>Apple M2100GB/s</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>RAM:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>8 GB</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Ổ cứng:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>256 GB SSD</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Màn hình:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>13.6\"Liquid Retina (2560 x 1664)</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Card màn hình:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>Card tích hợp, 8 nhân GPU</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Cổng kết nối:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>2 x Thunderbolt 3, MagSafe 3, Jack tai nghe 3.5 mm</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Thiết kế:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>Vỏ kim loại</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Kích thước, khối lượng:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>Dài 304.1 mm - Rộng 215 mm - Dày 11.3 mm - Nặng 1.24 kg</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Thời điểm ra mắt:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>6/2022</h5>\r\n									</td>\r\n								</tr>\r\n							</tbody>\r\n						</table>', 32990000, 31190000, 0, 'https://cdn.tgdd.vn/Products/Images/44/282827/apple-macbook-air-m2-2022-01.jpg', 'Siêu phẩm MacBook Air M2 được trình làng vào giữa năm 2022 một lần nữa đã khẳng định vị thế của Apple trong phân khúc laptop cao cấp - sang trọng, đánh bật mọi rào cản với con chip Apple M2 đầy mạnh mẽ cùng lối thiết kế lịch lãm, thời thượng đặc trưng cùng thời lượng pin lên đến 18 giờ ấn tượng. ', 0, 1, 0, 0, 0),
(34, 4, 'AirPods Pro (2nd Gen) MagSafe Charge Apple MQD83 Trắng', 'AirPods Pro', '<table class=\"table\">\r\n							<tbody>\r\n								<tr>\r\n									<td>\r\n										<h5>Thời gian tai nghe:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>Dùng 6 giờ</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Thời gian hộp sạc:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>Dùng 30 giờ</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Cổng sạc:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>LightningSạc không dây QiSạc MagSafe</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Công nghệ âm thanh:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>Active Noise Cancellation Adaptive EQChip Apple H2</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Hỗ trợ kết nối:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>Bluetooth 5.3</h5>\r\n									</td>\r\n								</tr>\r\n							</tbody>\r\n						</table>', 6990000, 6490000, 4, 'https://cdn.tgdd.vn/Products/Images/54/289781/airpods-pro-2nd-generation-0.jpg', 'Thiết kế tai nghe AirPods Pro 2 gọn nhẹ, kiểu dáng hiện đại\r\nVề phần thiết kế, nhà Apple vẫn giữ nguyên kiểu dáng quen thuộc của những phiên bản tiền nhiệm trước đó như: Thiết kế gọn nhẹ, đường bo góc tinh tế, gam màu trắng trang nhã bao bọc trọn vẹn tai nghe và hộp sạc.', 0, 1, 0, 0, 1),
(35, 4, 'AirPods Pro MagSafe Charge Apple MLWK3 Trắng', 'AirPods Pro', '<table class=\"table\">\r\n							<tbody>\r\n								<tr>\r\n									<td>\r\n										<h5>Thời gian tai nghe:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>Dùng 5 giờ - Sạc 2 giờ</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Cổng sạc:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>LightningSạc không dây Sạc MagSafe</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Công nghệ âm thanh:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>Active Noise Cancellation Chip Apple H1 Transparency Mode Spatial Audio Custom High Dynamic Range Amplifier Custom high-excursion Apple driver Adaptive EQ</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Hỗ trợ kết nối:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>Bluetooth 5.0</h5>\r\n									</td>\r\n								</tr>\r\n							</tbody>\r\n						</table>', 6790000, 4990000, 6, 'https://cdn.tgdd.vn/Products/Images/54/253802/bluetooth-airpods-pro-magsafe-charge-apple-mlwk3-0-1.jpg', 'Thiết kế cao cấp, đeo vừa vặn với nút tai silicone\r\nTai nghe Bluetooth AirPods Pro MagSafe Charge Apple MLWK3 trắng được chế tác với vẻ ngoài tinh giản, gam màu trắng trẻ trung, sáng đẹp, phối hợp tuyệt vời với mọi trang phục từ đời thường đến công sở, dự tiệc của bạn. ', 1, 0, 0, 0, 1),
(36, 4, 'AirPods Max Apple Đỏ', 'AirPods Max', '<table class=\"table\">\r\n							<tbody>\r\n								<tr>\r\n									<td>\r\n										<h5>Thời gian tai nghe:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>Dùng 20 giờ - Sạc 3 giờ</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Cổng sạc:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>Lightning</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Công nghệ âm thanh:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>Active Noise Cancellation Chip Apple H1 Transparency Mode Spatial Audio Adaptive EQ</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Hỗ trợ kết nối:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>Bluetooth 5.0</h5>\r\n									</td>\r\n								</tr>\r\n							</tbody>\r\n						</table>', 13990000, 11490000, 14, 'https://cdn.tgdd.vn/Products/Images/54/236331/bluetooth-airpods-max-apple-hong-1.jpg', 'Tai Bluetooth AirPods Max Apple MGYH3/ MGYJ3/ MGYL3 dễ dàng cuốn hút bạn ngay từ cái nhìn đầu tiên, với nét sang trọng và cực kỳ tinh tế đến từ sự tối giản trong thiết kế và màu sắc, tạo sự khác biệt ấn tượng với các sản phẩm tai nghe hiện có trên thị trường.', 1, 0, 4, 1, 1),
(37, 4, 'AirPods Max Apple Xanh dương', 'AirPods Max', '<table class=\"table\">\r\n							<tbody>\r\n								<tr>\r\n									<td>\r\n										<h5>Thời gian tai nghe:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>Dùng 20 giờ - Sạc 3 giờ</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Cổng sạc:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>Lightning</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Công nghệ âm thanh:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>Active Noise Cancellation Chip Apple H1 Transparency Mode Spatial Audio Adaptive EQ</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Hỗ trợ kết nối:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>Bluetooth 5.0</h5>\r\n									</td>\r\n								</tr>\r\n							</tbody>\r\n						</table>', 13990000, 11490000, 7, 'https://cdn.tgdd.vn/Products/Images/54/236331/bluetooth-airpods-max-apple-1-org.jpg', 'Tai Bluetooth AirPods Max Apple MGYH3/ MGYJ3/ MGYL3 dễ dàng cuốn hút bạn ngay từ cái nhìn đầu tiên, với nét sang trọng và cực kỳ tinh tế đến từ sự tối giản trong thiết kế và màu sắc, tạo sự khác biệt ấn tượng với các sản phẩm tai nghe hiện có trên thị trường.', 0, 0, 0, 0, 1),
(38, 4, 'AirPods Max Apple Xanh lá', 'AirPods Max', '<table class=\"table\">\r\n							<tbody>\r\n								<tr>\r\n									<td>\r\n										<h5>Thời gian tai nghe:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>Dùng 20 giờ - Sạc 3 giờ</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Cổng sạc:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>Lightning</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Công nghệ âm thanh:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>Active Noise Cancellation Chip Apple H1 Transparency Mode Spatial Audio Adaptive EQ</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Hỗ trợ kết nối:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>Bluetooth 5.0</h5>\r\n									</td>\r\n								</tr>\r\n							</tbody>\r\n						</table>', 13990000, 11490000, 3, 'https://cdn.tgdd.vn/Products/Images/54/236331/bluetooth-airpods-max-apple-xanh-1.jpg', 'Tai Bluetooth AirPods Max Apple MGYH3/ MGYJ3/ MGYL3 dễ dàng cuốn hút bạn ngay từ cái nhìn đầu tiên, với nét sang trọng và cực kỳ tinh tế đến từ sự tối giản trong thiết kế và màu sắc, tạo sự khác biệt ấn tượng với các sản phẩm tai nghe hiện có trên thị trường.', 0, 0, 0, 0, 1),
(39, 4, 'AirPods Max Apple MGYJ3 Bạc', 'AirPods Max', '<table class=\"table\">\r\n							<tbody>\r\n								<tr>\r\n									<td>\r\n										<h5>Thời gian tai nghe:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>Dùng 20 giờ - Sạc 3 giờ</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Cổng sạc:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>Lightning</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Công nghệ âm thanh:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>Active Noise Cancellation Chip Apple H1 Transparency Mode Spatial Audio Adaptive EQ</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Hỗ trợ kết nối:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>Bluetooth 5.0</h5>\r\n									</td>\r\n								</tr>\r\n							</tbody>\r\n						</table>', 13990000, 11490000, 1, 'https://cdn.tgdd.vn/Products/Images/54/296860/tai-nghe-chup-tai-bluetooth-airpods-max-apple-mgyj3-bac-1.jpg', 'Tai nghe chụp tai Bluetooth AirPods Max Apple MGYJ3 mang đến một thiết kế thời trang, sang chảnh, cùng nhiều công nghệ hiện đại được tích hợp như: Công nghệ chống ồn chủ động, công nghệ Bluetooth 5.0, Adaptive EQ,...', 1, 1, 0, 0, 1),
(40, 4, 'AirPods 3 Wireless Charge Apple MME73 Trắng', 'AirPods 3', '<table class=\"table\">\r\n							<tbody>\r\n								<tr>\r\n									<td>\r\n										<h5>Thời gian tai nghe:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>Dùng 6 giờ - Sạc 2 giờ</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Cổng sạc:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>Sạc không dây, Lightning</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Công nghệ âm thanh:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>Chip Apple H1, Adaptive EQ, Spatial Audio, Custom High Dynamic Range Amplifier, Custom high-excursion Apple driver</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Hỗ trợ kết nối:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>Bluetooth 5.0</h5>\r\n									</td>\r\n								</tr>\r\n							</tbody>\r\n						</table>', 5490000, 4390000, 3, 'https://cdn.tgdd.vn/Products/Images/54/250701/airpods-3-hop-sac-khong-day-0.jpg', 'Airpods 3 có thiết kế tương tự như AirPods Pro nhưng không còn phần eartips, đường viền và thân ngắn hơn cho âm thanh truyền tải đến tai tối ưu. Bề mặt tai nghe Bluetooth Apple phủ sắc trắng thời thượng, được làm từ các vật liệu tái chế với độ bền cao, bảo vệ môi trường sống của con người. ', 1, 1, 0, 0, 1),
(41, 4, 'AirPods 3 Lightning Charge Apple MPNY3 Trắng', 'AirPods 3', '<table class=\"table\">\r\n							<tbody>\r\n								<tr>\r\n									<td>\r\n										<h5>Thời gian tai nghe:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>Dùng 6 giờ - Sạc 2 giờ</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Cổng sạc:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>Sạc không dây, Lightning</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Công nghệ âm thanh:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>Chip Apple H1, Adaptive EQ, Spatial Audio, Custom High Dynamic Range Amplifier, Custom high-excursion Apple driver</h5>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n										<h5>Hỗ trợ kết nối:</h5>\r\n									</td>\r\n									<td>\r\n										<h5>Bluetooth 5.0</h5>\r\n									</td>\r\n								</tr>\r\n							</tbody>\r\n						</table>', 5390000, 4290000, 0, 'https://cdn.tgdd.vn/Products/Images/54/290053/tai-nghe-bluetooth-airpods-3-lightning-charge-apple-mpny3-trang-1.jpg', 'Tai nghe Bluetooth AirPods 3 Lightning Charge Apple MPNY3 Trắng sở hữu thiết kế gọn nhẹ, màu sắc trang nhã cùng nhiều công nghệ hiện đại đang chờ đón các iFan như: kết nối Bluetooth, Adaptive EQ, Chip Apple H1,...', 1, 0, 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tintuc`
--

CREATE TABLE `tintuc` (
  `MaTin` int(11) NOT NULL,
  `TieuDe` longtext COLLATE utf8_unicode_ci NOT NULL,
  `NoiDung` longtext COLLATE utf8_unicode_ci NOT NULL,
  `HinhAnh` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `NguoiTao` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `LuotXem` int(11) NOT NULL,
  `NgayDang` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `traloibinhluan`
--

CREATE TABLE `traloibinhluan` (
  `MaTLBL` int(11) NOT NULL,
  `MaBL` int(11) NOT NULL,
  `MaND` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `BinhLuan` longtext COLLATE utf8_unicode_ci NOT NULL,
  `LuotThich` int(11) NOT NULL,
  `NgayLap` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `yeuthich`
--

CREATE TABLE `yeuthich` (
  `MaSP` int(11) NOT NULL,
  `MaND` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anhsanpham`
--
ALTER TABLE `anhsanpham`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `anhsanpham_fk_1` (`MaSP`);

--
-- Indexes for table `binhluan`
--
ALTER TABLE `binhluan`
  ADD PRIMARY KEY (`MaBL`),
  ADD KEY `MaSP` (`MaSP`),
  ADD KEY `MaTin` (`MaTin`),
  ADD KEY `MaND` (`MaND`);

--
-- Indexes for table `danhgia`
--
ALTER TABLE `danhgia`
  ADD KEY `MaSP` (`MaSP`),
  ADD KEY `MaND` (`MaND`);

--
-- Indexes for table `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`MaHD`),
  ADD KEY `MaND` (`MaND`);

--
-- Indexes for table `khuyenmai`
--
ALTER TABLE `khuyenmai`
  ADD PRIMARY KEY (`MaKM`),
  ADD KEY `MaLoaiKM` (`MaLoaiKM`);

--
-- Indexes for table `loaikhuyenmai`
--
ALTER TABLE `loaikhuyenmai`
  ADD PRIMARY KEY (`MaLoaiKM`);

--
-- Indexes for table `loaisanpham`
--
ALTER TABLE `loaisanpham`
  ADD PRIMARY KEY (`MaLSP`);

--
-- Indexes for table `nguoidung`
--
ALTER TABLE `nguoidung`
  ADD PRIMARY KEY (`MaND`),
  ADD KEY `MaQuyen` (`MaQuyen`);

--
-- Indexes for table `phanquyen`
--
ALTER TABLE `phanquyen`
  ADD PRIMARY KEY (`MaQuyen`);

--
-- Indexes for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`MaSP`),
  ADD KEY `MaLSP` (`MaLSP`);

--
-- Indexes for table `tintuc`
--
ALTER TABLE `tintuc`
  ADD PRIMARY KEY (`MaTin`);

--
-- Indexes for table `traloibinhluan`
--
ALTER TABLE `traloibinhluan`
  ADD PRIMARY KEY (`MaTLBL`),
  ADD KEY `MaBL` (`MaBL`),
  ADD KEY `MaND` (`MaND`);

--
-- Indexes for table `yeuthich`
--
ALTER TABLE `yeuthich`
  ADD KEY `MaSP` (`MaSP`),
  ADD KEY `MaND` (`MaND`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `binhluan`
--
ALTER TABLE `binhluan`
  MODIFY `MaBL` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `khuyenmai`
--
ALTER TABLE `khuyenmai`
  MODIFY `MaKM` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `loaisanpham`
--
ALTER TABLE `loaisanpham`
  MODIFY `MaLSP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `nguoidung`
--
ALTER TABLE `nguoidung`
  MODIFY `MaND` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `MaSP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `tintuc`
--
ALTER TABLE `tintuc`
  MODIFY `MaTin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `traloibinhluan`
--
ALTER TABLE `traloibinhluan`
  MODIFY `MaTLBL` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `anhsanpham`
--
ALTER TABLE `anhsanpham`
  ADD CONSTRAINT `anhsanpham_fk_1` FOREIGN KEY (`MaSP`) REFERENCES `sanpham` (`MaSP`);

--
-- Constraints for table `donhang`
--
ALTER TABLE `donhang`
  ADD CONSTRAINT `donhang_ibfk_1` FOREIGN KEY (`MaND`) REFERENCES `nguoidung` (`MaND`);

--
-- Constraints for table `khuyenmai`
--
ALTER TABLE `khuyenmai`
  ADD CONSTRAINT `khuyenmai_ibfk_1` FOREIGN KEY (`MaLoaiKM`) REFERENCES `loaikhuyenmai` (`MaLoaiKM`);

--
-- Constraints for table `nguoidung`
--
ALTER TABLE `nguoidung`
  ADD CONSTRAINT `nguoidung_ibfk_1` FOREIGN KEY (`MaQuyen`) REFERENCES `phanquyen` (`MaQuyen`);

--
-- Constraints for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_ibfk_1` FOREIGN KEY (`MaLSP`) REFERENCES `loaisanpham` (`MaLSP`);

--
-- Constraints for table `yeuthich`
--
ALTER TABLE `yeuthich`
  ADD CONSTRAINT `yeuthich_ibfk_1` FOREIGN KEY (`MaSP`) REFERENCES `sanpham` (`MaSP`),
  ADD CONSTRAINT `yeuthich_ibfk_2` FOREIGN KEY (`MaND`) REFERENCES `nguoidung` (`MaND`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
