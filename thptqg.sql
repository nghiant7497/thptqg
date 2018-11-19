-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 06, 2017 at 05:16 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `thptqg`
--

-- --------------------------------------------------------

--
-- Table structure for table `bangso`
--

CREATE TABLE `bangso` (
  `id` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `TenSo` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `bangso`
--

INSERT INTO `bangso` (`id`, `TenSo`, `created_at`, `updated_at`) VALUES
('01', 'Sở GDĐT Hà Nội', NULL, NULL),
('02', 'Sở GDĐT TP Hồ Chí Minh', NULL, NULL),
('03', 'Sở GDĐT Hải Phòng', NULL, NULL),
('04', 'Sở GDĐT Đà Nẵng', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `congbodiem`
--

CREATE TABLE `congbodiem` (
  `id` int(10) UNSIGNED NOT NULL,
  `ThoiGian` timestamp NULL DEFAULT NULL,
  `DaCB` int(10) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `congbodiem`
--

INSERT INTO `congbodiem` (`id`, `ThoiGian`, `DaCB`) VALUES
(1, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `thisinh`
--

CREATE TABLE `thisinh` (
  `id` int(10) UNSIGNED NOT NULL,
  `SBD` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `CMND` varchar(9) COLLATE utf8_unicode_ci NOT NULL,
  `TenTS` text COLLATE utf8_unicode_ci NOT NULL,
  `NgaySinh` date NOT NULL,
  `MaCum` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `Toan` float DEFAULT NULL,
  `Van` float DEFAULT NULL,
  `NgoaiNgu` float DEFAULT NULL,
  `VatLi` float DEFAULT NULL,
  `HoaHoc` float DEFAULT NULL,
  `Sinh` float DEFAULT NULL,
  `DiaLi` float DEFAULT NULL,
  `LichSu` float DEFAULT NULL,
  `GDCD` float DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `thisinh`
--

INSERT INTO `thisinh` (`id`, `SBD`, `CMND`, `TenTS`, `NgaySinh`, `MaCum`, `Toan`, `Van`, `NgoaiNgu`, `VatLi`, `HoaHoc`, `Sinh`, `DiaLi`, `LichSu`, `GDCD`, `created_at`, `updated_at`) VALUES
(1, '00000001', '123456789', 'Hồ Thị Trâm Anh', '1999-05-21', '01', 5, 5, 8, 8, 4, 8, NULL, NULL, NULL, NULL, NULL),
(2, '00000002', '012345678', 'Võ Gia Bách', '1999-03-10', '01', 6, 4, 7, 8, 4, 7.5, NULL, NULL, NULL, NULL, NULL),
(3, '00000003', '293045193', 'Lý Gia Bảo', '1999-05-10', '01', 7, 6, 7, 7, 6, 7, NULL, NULL, NULL, NULL, NULL),
(4, '00000004', '869033985', 'Đỗ Thị Bảo Châu', '1999-09-10', '01', 5.5, 3, 9, 8, 8, 6, NULL, NULL, NULL, NULL, NULL),
(5, '00000005', '350964814', 'Huỳnh Lê Ngọc Dinh', '1999-10-02', '01', 6.5, 7, 7.5, 7, 4.5, 6, NULL, NULL, NULL, NULL, NULL),
(6, '00000006', '526752047', 'Trần Tuấn Đức', '1999-01-10', '01', 7, 4.5, 7, 7, 4.5, 6.5, NULL, NULL, NULL, NULL, NULL),
(7, '00000007', '660203110', 'Phan Thu Giang', '1999-08-22', '01', 5.5, 3.5, 8, 8, 4, 7, NULL, NULL, NULL, NULL, NULL),
(8, '00000008', '900907906', 'Nguyễn Thị Ánh Hồng', '1999-05-30', '01', 6, 6, 7, 7, 6.5, 7, NULL, NULL, NULL, NULL, NULL),
(9, '00000009', '802815495', 'Đoàn Phương Huyền', '1999-02-22', '01', 6.5, 2.5, 9, 8, 4, 8, NULL, NULL, NULL, NULL, NULL),
(10, '00000010', '265858333', 'Phạm Minh Khánh', '1999-06-10', '01', 5, 5.5, 7, 7, 4.5, 6.5, NULL, NULL, NULL, NULL, NULL),
(11, '00000011', '559150712', 'Dương Thùy Linh', '1999-01-01', '01', 8, 4.5, 9, 8, NULL, NULL, 4, 5, 6, NULL, NULL),
(12, '00000012', '298114934', 'Đoàn Công Minh', '1999-02-01', '01', 6, 6, 4.5, 7, NULL, NULL, 6, 6, 8, NULL, NULL),
(13, '00000013', '085149617', 'Huỳnh Ý Ngân', '1999-03-01', '01', 3, 8, 3, 4, NULL, NULL, 8, 9, 9, NULL, NULL),
(14, '00000014', '352936638', 'Võ Công Hoàng Nguyên', '1999-04-01', '01', 6.5, 6.5, 4, 7, NULL, NULL, 6.5, 6.5, 7.5, NULL, NULL),
(15, '00000015', '336947454', 'Võ Hoàng Oanh', '1999-05-01', '01', 7, 3, 7, 7, NULL, NULL, 5, 5, 6, NULL, NULL),
(16, '00000016', '594630761', 'Đỗ Hồng Minh Phúc', '1999-06-01', '01', 9, 4, 7, 8, NULL, NULL, 4, 3, 6, NULL, NULL),
(17, '00000017', '576387573', 'Đặng Gia Phong', '1999-07-01', '01', 5, 7, 4, 7, NULL, NULL, 8, 7, 8, NULL, NULL),
(18, '00000018', '548986329', 'Phạm Minh Quân', '1999-08-01', '01', 5.5, 5.5, 7, 7, NULL, NULL, 6, 5.5, 7, NULL, NULL),
(19, '00000019', '677279047', 'Phan Thị Minh Tâm', '1999-09-01', '01', 3, 8, 3.5, 5, NULL, NULL, 9, 8, 8, NULL, NULL),
(20, '00000020', '315067033', 'Trần Kim Yến', '1999-10-01', '01', 6, 6.5, 7, 7, NULL, NULL, 5, 6, 8.5, NULL, NULL),
(21, '00000021', '495186474', 'Nguyễn Ngọc Hoàng Anh', '1999-12-21', '02', 9, 3.5, 9, 8, 8.5, 6.5, NULL, NULL, NULL, NULL, NULL),
(22, '00000022', '938052133', 'Nguyễn Thị Kim Anh', '1999-01-21', '02', 9, 6.5, 7, 7, 4, 6.5, NULL, NULL, NULL, NULL, NULL),
(23, '00000023', '566435651', 'Lê Thanh Thái Bảo', '1999-02-21', '02', 8, 4.5, 7.5, 9, 6.5, 7, NULL, NULL, NULL, NULL, NULL),
(24, '00000024', '268495354', 'Trần Minh Cường', '1999-03-21', '02', 8, 7, 7, 4, 3.5, 7.5, NULL, NULL, NULL, NULL, NULL),
(25, '00000025', '327054059', 'Cao Ngọc Phương Dung', '1999-04-21', '02', 7, 6.5, 7, 7.5, 6, 6, NULL, NULL, NULL, NULL, NULL),
(26, '00000026', '086219420', 'Nguyễn Lê Mỹ Duyên', '1999-05-21', '02', 6.5, 4.5, 7.5, 8, 7, 6, NULL, NULL, NULL, NULL, NULL),
(27, '00000027', '302996791', 'Lê Đức Đông', '1999-06-21', '02', 5.5, 4.5, 8, 7, 8, 5.5, NULL, NULL, NULL, NULL, NULL),
(28, '00000028', '591084164', 'Trần Thị Thanh Hà', '1999-07-21', '02', 7, 6, 7, 7.5, 6.5, 6, NULL, NULL, NULL, NULL, NULL),
(29, '00000029', '507031078', 'Nguyễn Lê Thanh Hòa', '1999-08-21', '02', 7.5, 6.5, 6.5, 7, 5.5, 7, NULL, NULL, NULL, NULL, NULL),
(30, '00000030', '172343962', 'Nguyễn Minh Hoàng', '1999-09-21', '02', 7, 4, 8, 7, 7, 7, NULL, NULL, NULL, NULL, NULL),
(31, '00000031', '305340679', 'Nguyễn Trần Đăng Khoa', '1999-01-24', '02', 4, 8, 6.5, 7, NULL, NULL, 9, 4, 6.5, NULL, NULL),
(32, '00000032', '918463825', 'Vũ Lê Hải Lam', '1999-03-24', '02', 4.5, 7, 6.5, 6.5, NULL, NULL, 8, 7, 7, NULL, NULL),
(33, '00000033', '330570965', 'Trần Khánh Linh', '1999-02-22', '02', 4.5, 7.5, 7, 6, NULL, NULL, 8.5, 6.5, 8, NULL, NULL),
(34, '00000034', '668549503', 'Trần Thị Hồng Mai', '1999-10-24', '02', 6, 7, 7.5, 5.5, NULL, NULL, 7.5, 8, 9.5, NULL, NULL),
(35, '00000035', '620351817', 'Lưu Trọng Nghĩa', '1999-11-29', '02', 7.5, 8, 9, 8, NULL, NULL, 7, 9, 8.5, NULL, NULL),
(36, '00000036', '579735573', 'Lý Hoàng Nhi', '1999-06-12', '02', 6, 7.5, 6, 8, NULL, NULL, 4, 9.5, 8, NULL, NULL),
(37, '00000037', '245416315', 'Hoàng Ngọc Quỳnh Như', '1999-12-15', '02', 4, 7.5, 7, 7, NULL, NULL, 7, 7, 4, NULL, NULL),
(38, '00000038', '401148906', 'Đặng Cửu Uyển Phụng', '1999-08-19', '02', 6, 6.5, 8.5, 7.5, NULL, NULL, 7.5, 6.5, 5, NULL, NULL),
(39, '00000039', '604216278', 'Trần Xuân Quốc', '1999-07-20', '02', 5.5, 7, 6.5, 6.5, NULL, NULL, 7, 6, 7.5, NULL, NULL),
(40, '00000040', '719454232', 'La Bích Quỳnh', '1999-09-09', '02', 3.5, 7, 6, 7, NULL, NULL, 7, 7, 8, NULL, NULL),
(41, '00000041', '216303769', 'Lê Khắc Nguyên Tố', '1999-06-16', '02', 7, 6.5, 6, 6, 6, 8, NULL, NULL, NULL, NULL, NULL),
(42, '00000042', '912351054', 'Trần Nguyễn Thanh Thanh', '1999-07-16', '02', 4, 8, 9, 4.5, 4.5, 7, NULL, NULL, NULL, NULL, NULL),
(43, '00000043', '895274712', 'Hà Trần Phương Thảo', '1999-02-20', '02', 7.5, 4.5, 7.5, 7.5, 3, 8, NULL, NULL, NULL, NULL, NULL),
(44, '00000044', '205686103', 'Trương Thị Thanh Thảo', '1999-10-28', '02', 4.5, 7, 7, 7, 6.5, 6, NULL, NULL, NULL, NULL, NULL),
(45, '00000045', '270623072', 'Trần Quang Thiện', '1999-11-26', '02', 8, 7, 6.5, 5, 6, 7.5, NULL, NULL, NULL, NULL, NULL),
(46, '00000046', '578135611', 'La Gia Thịnh', '1999-07-20', '02', 9, 4.5, 4.5, 8, 7, 8, NULL, NULL, NULL, NULL, NULL),
(47, '00000047', '978796980', 'Huỳnh Thị Cẩm Thúy', '1999-04-15', '02', 6.5, 7, 6, 5.5, 7, 4, NULL, NULL, NULL, NULL, NULL),
(48, '00000048', '245469977', 'Châu Ngọc Minh Thư', '1999-03-31', '02', 3.5, 8, 8, 7, 5.5, 6, NULL, NULL, NULL, NULL, NULL),
(49, '00000049', '899859788', 'Nguyễn Hồng Thy', '1999-06-05', '02', 7, 6.5, 7, 6, 4, 6.5, NULL, NULL, NULL, NULL, NULL),
(50, '00000050', '209657828', 'Nguyễn Thị Thu Trang', '1999-05-15', '02', 6, 7.5, 6.5, 4, 7, 8, NULL, NULL, NULL, NULL, NULL),
(51, '00000051', '127028377', 'Nguyễn Đức Trí', '1999-08-08', '02', 9, 3, 6.5, 8.5, 8.5, 7.5, NULL, NULL, NULL, NULL, NULL),
(52, '00000052', '955483396', 'Huỳnh Thị Tú Trinh', '1999-12-08', '02', 7, 4.5, 7, 7, 6, 6.5, NULL, NULL, NULL, NULL, NULL),
(53, '00000053', '275222722', 'Đào Hiền Trinh', '1999-10-21', '02', 6.5, 6, 7.5, 7, 5, 7, NULL, NULL, NULL, NULL, NULL),
(54, '00000054', '182032621', 'Tăng Thùy Thanh Trúc', '1999-01-30', '02', 7, 8.5, 9, 4.5, 4, 4.5, NULL, NULL, NULL, NULL, NULL),
(55, '00000055', '525523656', 'Diệp Kiến Trung', '1999-09-19', '02', 5, 7, 6.5, 7, 7, 5.5, NULL, NULL, NULL, NULL, NULL),
(56, '00000056', '837133071', 'Lưu Trần Phương Uyên', '1999-04-26', '02', 6, 6.5, 8, 4.5, 6, 7, NULL, NULL, NULL, NULL, NULL),
(57, '00000057', '191403822', 'Võ Thị Thanh Vân', '1999-05-01', '02', 5.5, 7, 6, 7.5, 7, 6.5, NULL, NULL, NULL, NULL, NULL),
(58, '00000058', '463660713', 'Nguyễn Huỳnh Thảo Vy', '1999-03-18', '02', 10, 4, 4.5, 9, 9, 8, NULL, NULL, NULL, NULL, NULL),
(59, '00000059', '529410738', 'Thái Thảo Vy', '1999-09-29', '02', 7, 6, 8, 4.5, 5.5, 4, NULL, NULL, NULL, NULL, NULL),
(60, '00000060', '301753399', 'Hồ Thị Phi Yến', '1999-07-15', '02', 7.5, 5.5, 8.5, 6.5, 8, 4, NULL, NULL, NULL, NULL, NULL),
(61, '00000061', '216944022', 'Nguyễn Phương Anh', '1999-11-03', '03', 7, 3.5, 6.5, 6, 7, 10, NULL, NULL, NULL, NULL, NULL),
(62, '00000062', '141198581', 'Nguyễn Phạm Thiên Ân', '1999-12-11', '03', 4.5, 8, 9, 6.5, 4, 7, NULL, NULL, NULL, NULL, NULL),
(63, '00000063', '987499986', 'Nguyễn Gia Bảo', '1999-07-17', '03', 7.5, 6, 7, 7, 6.5, 4.5, NULL, NULL, NULL, NULL, NULL),
(64, '00000064', '500204270', 'Trần Thị Minh Diệu', '1999-11-25', '03', 4, 7, 9, 7, 4, 7, NULL, NULL, NULL, NULL, NULL),
(65, '00000065', '104898444', 'Nguyễn Bảo Giang', '1999-01-19', '03', 9, 6.5, 4.5, 7, 7, 7, NULL, NULL, NULL, NULL, NULL),
(66, '00000066', '384336970', 'Võ Thị Bích Hạnh', '1999-03-29', '03', 6, 4.5, 7, 9, 7.5, 6, NULL, NULL, NULL, NULL, NULL),
(67, '00000067', '997240632', 'Nguyễn Thị Cẩm Loan', '1999-08-28', '03', 6.5, 7, 6, 8, 7, 4.5, NULL, NULL, NULL, NULL, NULL),
(68, '00000068', '984073845', 'Nguyễn Trần Bảo My', '1999-02-28', '03', 4.5, 8, 9, 4.5, 6, 7, NULL, NULL, NULL, NULL, NULL),
(69, '00000069', '551187397', 'Lê Mẫn Như Nguyệt', '1999-06-25', '03', 8, 4, 7, 7, 9, 6, NULL, NULL, NULL, NULL, NULL),
(70, '00000070', '729852076', 'Nguyễn Ngọc Nhã Nhi', '1999-12-19', '03', 7, 6, 6.5, 7, 6, 7, NULL, NULL, NULL, NULL, NULL),
(71, '00000071', '763722498', 'Nguyễn Lê Phương Quỳnh', '1999-12-03', '03', 4, 6, 8, 4.5, 7.5, 9.5, NULL, NULL, NULL, NULL, NULL),
(72, '00000072', '529397535', 'Võ Thị Mai Tâm', '1999-09-15', '03', 9, 4, 9, 5, 9.5, 6, NULL, NULL, NULL, NULL, NULL),
(73, '00000073', '670758063', 'Lê Thị Thiên Thảo', '1999-05-29', '03', 7, 6.5, 8.5, 5.5, 5, 4.5, NULL, NULL, NULL, NULL, NULL),
(74, '00000074', '809106146', 'Quách Thanh Nhi', '1999-10-03', '03', 8, 3.5, 9, 6, 6, 7, NULL, NULL, NULL, NULL, NULL),
(75, '00000075', '535604186', 'Tiêu Anh Thư', '1999-07-21', '03', 8.5, 7, 4, 5.5, 8, 7, NULL, NULL, NULL, NULL, NULL),
(76, '00000076', '370714135', 'Dương Mỹ Trân', '1999-11-28', '03', 4.5, 7, 7.5, 8, 6.5, 6.5, NULL, NULL, NULL, NULL, NULL),
(77, '00000077', '556560747', 'Nguyễn Võ Đông Trúc', '1999-05-24', '03', 7.5, 4.5, 7, 6.5, 7, 4, NULL, NULL, NULL, NULL, NULL),
(78, '00000078', '874714791', 'Đặng Thị Khánh Uyên', '1999-08-25', '03', 7, 2.5, 6, 9, 6.5, 7, NULL, NULL, NULL, NULL, NULL),
(79, '00000079', '685182807', 'Đỗ Hà Khánh Vy', '1999-04-03', '03', 5.5, 5, 10, 7.5, 3.5, 7, NULL, NULL, NULL, NULL, NULL),
(80, '00000080', '713191819', 'Hồ Đắc Hoàng Yến', '1999-02-19', '03', 6, 7.5, 7, 7, 7, 6.5, NULL, NULL, NULL, NULL, NULL),
(81, '00000081', '230514955', 'Dương Ngọc Hiền Anh', '1999-04-21', '04', 9, 4, 6, 7, 7, 8, NULL, NULL, NULL, NULL, NULL),
(82, '00000082', '511338195', 'Kiên Quốc Bảo', '1999-02-19', '04', 4.5, 8, 8.5, 6.5, 7, 7, NULL, NULL, NULL, NULL, NULL),
(83, '00000083', '383384414', 'Nguyễn Trân Bảo Châu', '1999-04-04', '04', 7, 6.5, 7, 7.5, 4, 7, NULL, NULL, NULL, NULL, NULL),
(84, '00000084', '171463309', 'Dương Thùy Duyên', '1999-10-29', '04', 8, 4.5, 7, 7, 6, 6.5, NULL, NULL, NULL, NULL, NULL),
(85, '00000085', '691699880', 'Võ Ngọc Hân', '1999-06-13', '04', 4, 8, 8, 5.5, 6.5, 5.5, NULL, NULL, NULL, NULL, NULL),
(86, '00000086', '878040367', 'Lê Hồng Hiền', '1999-09-05', '04', 6.5, 6.5, 7, 6, 7, 6, NULL, NULL, NULL, NULL, NULL),
(87, '00000087', '134713526', 'Lương Thanh Thiên Kim', '1999-12-09', '04', 7, 6, 7, 6.5, 7, 6, NULL, NULL, NULL, NULL, NULL),
(88, '00000088', '419294793', 'Trần Đăng Khoa', '1999-08-28', '04', 9.5, 4, 7.5, 7, 6.5, 8, NULL, NULL, NULL, NULL, NULL),
(89, '00000089', '104821373', 'Hồ Thị Linh', '1999-05-14', '04', 3.5, 8, 9, 7, 6, 4.5, NULL, NULL, NULL, NULL, NULL),
(90, '00000090', '676964004', 'Bùi Thị Phương Mai', '1999-12-12', '04', 6, 6, 7, 7, 7, 6.5, NULL, NULL, NULL, NULL, NULL),
(91, '00000091', '138106537', 'Nguyễn Thị Quỳnh Như', '1999-11-24', '04', 7.5, 6, 6.5, 7, 6.5, 6, NULL, NULL, NULL, NULL, NULL),
(92, '00000092', '893573248', 'Đặng Trọng Quang', '1999-12-26', '04', 4, 8, 10, 4.5, 4.5, 7, NULL, NULL, NULL, NULL, NULL),
(93, '00000093', '090703851', 'Đỗ Trần Thiện', '1999-06-10', '04', 7, 6, 7, 7, 4.5, 6.5, NULL, NULL, NULL, NULL, NULL),
(94, '00000094', '083447495', 'Trần Minh Thư', '0000-00-00', '04', 8, 3.5, 7, 7, 7, 8, NULL, NULL, NULL, NULL, NULL),
(95, '00000095', '885010991', 'Thái Huỳnh Mai Trâm', '1999-01-10', '04', 6, 7, 6.5, 7, 7.5, 7, NULL, NULL, NULL, NULL, NULL),
(96, '00000096', '606979299', 'Lưu Nguyễn Khả Bảo Trân', '1999-03-19', '04', 4.5, 7, 8, 6, 7, 6.5, NULL, NULL, NULL, NULL, NULL),
(97, '00000097', '754375054', 'Nguyễn Thanh Thủy Trúc', '1999-08-21', '04', 7, 6.5, 6.5, 7, 6, 5.5, NULL, NULL, NULL, NULL, NULL),
(98, '00000098', '315889670', 'Nguyễn Lưu Thảo Vy', '1999-11-08', '04', 5.5, 7, 7, 6.5, 7.5, 8, NULL, NULL, NULL, NULL, NULL),
(99, '00000099', '484289233', 'Trần Nguyễn Minh Vy', '1999-12-25', '04', 10, 4, 4.5, 10, 10, 4.5, NULL, NULL, NULL, NULL, NULL),
(100, '00000100', '307389389', 'Trương Như Ý', '1999-04-27', '04', 7.5, 6, 7.5, 7.5, 4.5, 8, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tkthisinh`
--

CREATE TABLE `tkthisinh` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `idThiSinh` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tkthisinh`
--

INSERT INTO `tkthisinh` (`id`, `email`, `remember_token`, `idThiSinh`, `created_at`, `updated_at`) VALUES
(1, 'nghiant7497@gmail.com', NULL, 1, '2017-07-06 04:51:14', '2017-07-06 04:51:14');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `quyen` int(11) NOT NULL DEFAULT '0',
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `quyen`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Nguyễn Trung Nghĩa', 'nghiant7497@gmail.com', 1, '$2y$10$eBuR/52AWJGpy7.W7DyxhO.za9KFCufoQuXTK1REUqbxfPLSqBqvK', NULL, '2017-07-03 15:43:28', '2017-07-03 15:43:28'),
(2, 'Demo1', 'demo1@gmail.com', 0, '$2y$10$n83z8.RCqCrgYkPi5i6qeuss3.PuH3vxGLIZmMPw2Ilrd3dmf47MO', NULL, '2017-07-03 15:44:56', '2017-07-04 10:07:16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bangso`
--
ALTER TABLE `bangso`
  ADD PRIMARY KEY (`id`);


--
-- Indexes for table `congbodiem`
--
ALTER TABLE `congbodiem`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `thisinh`
--
ALTER TABLE `thisinh`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `thisinh_SBD_unique` (`SBD`),
  ADD UNIQUE KEY `thisinh_CMND_unique` (`CMND`),
  ADD KEY `MaCum` (`MaCum`);

--
-- Indexes for table `tkthisinh`
--
ALTER TABLE `tkthisinh`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tkthisinh_email_unique` (`email`),
  ADD KEY `idThiSinh` (`idThiSinh`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `congbodiem`
--
ALTER TABLE `congbodiem`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `thisinh`
--
ALTER TABLE `thisinh`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;
--
-- AUTO_INCREMENT for table `tkthisinh`
--
ALTER TABLE `tkthisinh`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `bangtruong`
--
ALTER TABLE `thisinh`
  ADD CONSTRAINT `thisinh_ibfk_1` FOREIGN KEY (`MaCum`) REFERENCES `bangso` (`id`);


--
-- Constraints for table `tkthisinh`
--
ALTER TABLE `tkthisinh`
  ADD CONSTRAINT `tkthisinh_ibfk_1` FOREIGN KEY (`idThiSinh`) REFERENCES `thisinh` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
