-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 15, 2022 at 11:31 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `banhang`
--

-- --------------------------------------------------------

--
-- Table structure for table `chitietxe`
--

CREATE TABLE `chitietxe` (
  `MaXe` char(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  `KhoiLuong` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ChieuDai` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ChieuRong` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ChieuCao` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `KhoangCachTrucBanh` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `DoCaoYen` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `KhoangSangGamXe` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `DungTichBinhXang` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `LopTruoc` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `LopSau` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `PhuocTruoc` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `PhuocSau` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `LoaiDongCo` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CongSuatToiDa` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `DungTichNhot` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `TieuThu` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `LoaiChuyenDong` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `HeThongKhoiDong` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Momen` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `DungTichXyLanh` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `DungTichPitTong` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `HanhTrinhPitTong` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `TiSoNen` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `chitietxe`
--

INSERT INTO `chitietxe` (`MaXe`, `KhoiLuong`, `ChieuDai`, `ChieuRong`, `ChieuCao`, `KhoangCachTrucBanh`, `DoCaoYen`, `KhoangSangGamXe`, `DungTichBinhXang`, `LopTruoc`, `LopSau`, `PhuocTruoc`, `PhuocSau`, `LoaiDongCo`, `CongSuatToiDa`, `DungTichNhot`, `TieuThu`, `LoaiChuyenDong`, `HeThongKhoiDong`, `Momen`, `DungTichXyLanh`, `DungTichPitTong`, `HanhTrinhPitTong`, `TiSoNen`) VALUES
('X1', '122kg', '2.019', '727', '1.104', '1.278 mm', '795 mm', '151 mm', '4,5 lít', '90/80-17M/C 46P', '120/70-17M/C 58P', 'Ống lồng, giảm trấn thủy lực', 'Lò xo trụ ', 'PGM-FI, 4 kỳ, DOHC, xy-lanh đơn, côn 6 số, làm mát bằng dung dịch', '11,5kW/9.000 vòng/phút', '1,1 lít khi thay nhớt 1,3 lít khi rã máy', '1,99L/100km', 'Cơ khí', 'Điện', 'Điện', '149,1 cm3', '57,3 mm', '57,8 mm', '11,3:1'),
('X2', '117 kg', '1,985', '670', '1,100', '1,290', '795', '155', '4,2 lít', '90/80-17M/C 46P', '120/70-17M/C 58P', 'Cuộn lò xo', 'Van điều tiết thủy lực', '4 thì, 4 van, SOHC, làm mát bằng dung dịch', '11,3 kW (15,4 PS) / 8.500 vòng/phút', '', '2,00L/100km', 'Cơ khí', 'Điện', '', '150 CC', '57,0 mm', '58,7 mm', '10,4:1'),
('X3', '96kg', '1.871mm', '686mm', '1.101mm', '1.255mm', '761mm', '120mm', '4,9 lít', '80/90-14M/C 40P', '90/90-14M/C 46P', 'Ống lồng, giảm chấn thủy lực', 'Lò xo trụ đơn, giảm chấn thủy ', 'Xăng, 4 kỳ, 1 xi-lanh, làm mát bằng không khí', '6,59kW/7.500 vòng/phút', '0,65 lít khi thay dầu 0,8 lít khi rã máy', '1,88 (L/100km)', 'Đai', 'Điện', '9,29Nm/6.000 vò', '109,5cm3', '47,0mm', '63,1mm', '10,0:1'),
('X4', '97kg', '1.914mm', '688mm', '1.075mm', '1.224mm', '769mm', '138mm', '3,7 lít', '70/90 - 17 M/C 38P', '80/90 - 17 M/C 50P', 'Ống lồng, giảm chấn thủy lực', 'Lò xo trụ, giảm chấn thủy lực', 'Xăng, 4 kỳ, 1 xi-lanh, làm mát bằng không khí', '6,12 kW / 7.500 vòng/phút', '1 lít (khi rã máy)0,8 lít (khi thay nhớt)', '1,90 lít', 'Cơ khí, 4 số tròn', 'Điện/ Đạp chân', '8,44 Nm/5.500 v', '109,1cm3', '50mm', '55,6mm', '9,0:1'),
('X5', '189 kg', '2.080 mm', '790 mm', '1.060 mm', '1.410 mm', '785 mm', '145 mm', '17,1 Lít', '120/70 ZR17M/C', '160/60 ZR17M/C', 'Ống lồng, giảm chấn thuỷ lực, ', 'Lò xo trụ đơn Prolink, tải trư', '4 kỳ, 2 xi lanh, DOHC, làm mát bằng chất lỏng', '35 kW / 8600 vòng/phút', '2,5 lít khi thay nhớt 2,7 lít khi thay nhớt và bộ ', '3,59 lít/100km', 'Cơ khí', 'Điện', '43 Nm / 6500 vò', '471 cc', '67 mm', '66,8 mm', '10,7:1'),
('X6', '96kg', '1.890mm', '665mm', '1.035mm', '1.200mm', '770mm', '130mm', '4,2 lít', '70/90 - 17 38P (Lốp có săm)', '80/90 - 17 44P (Lốp có săm)', 'Kiểu ống lồng', 'Giảm chấn thủy lực lò xo trụ', '4 thì, 2 van SOHC, làm mát bằng không khí', '6,60KW (9.0PS/8.000 vòng/phút)', '1 L', '1,99 (L/100km)', '4 số tròn', 'Điện / Cần khởi động', '9,0Nm (0.92kgf-', '110.3 cc', '51,0mm', '54,0mm', '9,3:1'),
('X7', '99 kg', '1850 mm', '705 mm', '1120mm', '1260 mm', '770 mm', '135 mm', '4,2 L', '80/80 - 14 43P (Lốp có săm)', '110/70 - 14 56P (Lốp có săm)', 'Kiểu ống lồng', 'Giảm chấn thủy lực lò xo trụ', 'Blue Core, 4 kỳ, 2 van, SOHC, Làm mát bằng không khí cưỡng bức', '7,0 kW (9,5 ps) / 8.000 vòng /phút', '0,84 L', '1,87 (L/100km)', 'CVT', 'Khởi động điện', '9,6 N.m/ 5.500 ', '125 cc', '52,4 mm', '57,9 mm', '9,5 : 1'),
('X8', '104 kg', '1.931 mm', '711 mm', '1.083 mm', '1.258 mm', '756 mm', '133 mm', '4,6 lít', '70/90 - 17 M/C 38P', '80/90 - 17 M/C 50P', 'Ống lồng, giảm chấn thủy lực', 'Lò xo trụ, giảm chấn thủy lực', 'Xăng, làm mát bằng không khí, 4 kỳ, 1 xy-lanh', '6,83 kW/7.500 vòng/phút', '0,9 lít (rã máy); 0,7 lít (thay nhớt)', '1.54 L', '4 số tròn', 'Điện & Đạp chân', '10,2 Nm/5.500 v', '124,9 cm3', '52,4 mm', '57,9 mm', '9,3 : 1'),
('X9', '116 kg', '1.950 mm', '669 mm', '1.100 mm', '1.304 mm', '765 mm', '130 mm', '5,6 lít', '80/90-16M/C 43P', 'Ống lồng, giảm chấn thủy lực', 'Phuộc đơn', '4 kỳ, 4 van, làm mát bằng dung', '8,2 kW/8500 vòng/phút', 'Sau khi xả: 0,8 lít', 'Sau khi rã máy: 0,9 lít', '2,16 lít/100km', 'Tự động, vô cấp', 'Điện', '', '124,8 cm3', '53,5 mm', '55,5 mm', '11,5:1');

-- --------------------------------------------------------

--
-- Table structure for table `donhang`
--

CREATE TABLE `donhang` (
  `MaDonHang` int(11) NOT NULL,
  `TenXe` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `NgayDK` date DEFAULT NULL,
  `GhiChu` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `MaXe` char(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  `MaKhachHang` char(8) COLLATE utf8_unicode_ci DEFAULT NULL,
  `TrangThai` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `donhang`
--

INSERT INTO `donhang` (`MaDonHang`, `TenXe`, `NgayDK`, `GhiChu`, `MaXe`, `MaKhachHang`, `TrangThai`) VALUES
(18, 'Future 125 FI', '2022-06-13', 'Gửi xe sớm cho tôi nha.', 'X8', 'KH1', 0),
(19, 'CB500F 2021', '2022-06-14', '', 'X5', 'KH2', 0);

-- --------------------------------------------------------

--
-- Table structure for table `giaodien`
--

CREATE TABLE `giaodien` (
  `Id` int(11) NOT NULL,
  `Img` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `giaodien`
--

INSERT INTO `giaodien` (`Id`, `Img`) VALUES
(1, '../image/Home/Banner/banner1.jpg'),
(2, '../image/Home/Banner/banner2.jpg'),
(3, '../image/Home/Banner/banner3.jpg'),
(4, '../image/Home/Banner/banner4.jpg'),
(5, '../image/Home/Banner/banner5.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `hang`
--

CREATE TABLE `hang` (
  `TenHang` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `Logo` longtext COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hang`
--

INSERT INTO `hang` (`TenHang`, `Logo`) VALUES
('HONDA', '../image/Hang/Logo/HONDA.jpg'),
('YAMAHA', '../image/Hang/Logo/YAMAHA.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `khachhang`
--

CREATE TABLE `khachhang` (
  `MaKhachHang` char(8) COLLATE utf8_unicode_ci NOT NULL,
  `TenKhachHang` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `DiaChi` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `SDT` char(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Email` char(45) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `khachhang`
--

INSERT INTO `khachhang` (`MaKhachHang`, `TenKhachHang`, `DiaChi`, `SDT`, `Email`) VALUES
('KH1', 'Phạm Thanh Tuấn', 'Số 90 - KP1 - Thống Nhất - Biên Hòa - Đồng Nai', '0937793307', 'thanhtuan2k1ptt1@gmail.com'),
('KH2', 'Trần Văn Long', 'Bình Dương', '0381953762', 'tranlong@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `loaixe`
--

CREATE TABLE `loaixe` (
  `MaLoai` char(3) COLLATE utf8_unicode_ci NOT NULL,
  `TenLoai` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `loaixe`
--

INSERT INTO `loaixe` (`MaLoai`, `TenLoai`) VALUES
('XCT', 'Xe Côn Tay'),
('XMT', 'Xe Mô Tô'),
('XSO', 'Xe Số'),
('XTG', 'Xe Tay Ga');

-- --------------------------------------------------------

--
-- Table structure for table `taikhoan`
--

CREATE TABLE `taikhoan` (
  `Username` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Password` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `taikhoan`
--

INSERT INTO `taikhoan` (`Username`, `Password`) VALUES
('thanhtuan', '123'),
('nam', '1'),
('an', '1'),
('admin', '1');

-- --------------------------------------------------------

--
-- Table structure for table `xe`
--

CREATE TABLE `xe` (
  `MaXe` char(5) COLLATE utf8_unicode_ci NOT NULL,
  `TenXe` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Gia` float DEFAULT NULL,
  `Hinh` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `TenHang` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `MaLoai` char(3) COLLATE utf8_unicode_ci DEFAULT NULL,
  `HienThi` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `xe`
--

INSERT INTO `xe` (`MaXe`, `TenXe`, `Gia`, `Hinh`, `TenHang`, `MaLoai`, `HienThi`) VALUES
('X1', 'Winner X', 46160000, '../image/Sanpham/WinnerX.png', 'HONDA', 'XCT', 1),
('X2', 'Exciter 150', 44500000, '../image/Sanpham/Exciter-Mat-Black-004-1.png', 'YAMAHA', 'XSO', 1),
('X3', 'Vision', 30230200, '../image/Sanpham/Vision.png', 'HONDA', 'XTG', 1),
('X4', 'Wave Alpha 110cc', 17859300, '../image/Sanpham/WaveAlpha110cc.png', 'HONDA', 'XSO', 0),
('X5', 'CB500F 2021', 179490000, '../image/Sanpham/CB500F2021.png', 'HONDA', 'XCT', 1),
('X6', 'Sirius', 21700000, '../image/Sanpham/Sirius.png', 'YAMAHA', 'XSO', 1),
('X7', 'Janus', 31400000, '../image/Sanpham/Janus.png', 'YAMAHA', 'XTG', 0),
('X8', 'Future 125 FI', 30328400, '../image/Sanpham/Future125FI.png', 'HONDA', 'XSO', 1),
('X9', 'Sh mode 125cc', 54186500, '../image/Sanpham/Shmode125cc.png', 'HONDA', 'XTG', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chitietxe`
--
ALTER TABLE `chitietxe`
  ADD KEY `FK_ctxe_xe` (`MaXe`);

--
-- Indexes for table `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`MaDonHang`),
  ADD KEY `MaXe` (`MaXe`),
  ADD KEY `MaKhachHang` (`MaKhachHang`);

--
-- Indexes for table `giaodien`
--
ALTER TABLE `giaodien`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `hang`
--
ALTER TABLE `hang`
  ADD PRIMARY KEY (`TenHang`);

--
-- Indexes for table `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`MaKhachHang`);

--
-- Indexes for table `loaixe`
--
ALTER TABLE `loaixe`
  ADD PRIMARY KEY (`MaLoai`);

--
-- Indexes for table `xe`
--
ALTER TABLE `xe`
  ADD PRIMARY KEY (`MaXe`),
  ADD KEY `FK_xe_h` (`TenHang`),
  ADD KEY `MaLoai` (`MaLoai`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `donhang`
--
ALTER TABLE `donhang`
  MODIFY `MaDonHang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `giaodien`
--
ALTER TABLE `giaodien`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chitietxe`
--
ALTER TABLE `chitietxe`
  ADD CONSTRAINT `FK_ctxe_xe` FOREIGN KEY (`MaXe`) REFERENCES `xe` (`MaXe`);

--
-- Constraints for table `donhang`
--
ALTER TABLE `donhang`
  ADD CONSTRAINT `donhang_ibfk_1` FOREIGN KEY (`MaXe`) REFERENCES `xe` (`MaXe`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `donhang_ibfk_2` FOREIGN KEY (`MaKhachHang`) REFERENCES `khachhang` (`MaKhachHang`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `xe`
--
ALTER TABLE `xe`
  ADD CONSTRAINT `FK_xe_h` FOREIGN KEY (`TenHang`) REFERENCES `hang` (`TenHang`),
  ADD CONSTRAINT `xe_ibfk_1` FOREIGN KEY (`MaLoai`) REFERENCES `loaixe` (`MaLoai`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
