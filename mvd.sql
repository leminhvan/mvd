-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th8 22, 2018 lúc 07:44 AM
-- Phiên bản máy phục vụ: 10.1.32-MariaDB
-- Phiên bản PHP: 5.6.36

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `mvd`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin_preferences`
--

CREATE TABLE `admin_preferences` (
  `id` tinyint(1) NOT NULL,
  `user_panel` tinyint(1) NOT NULL DEFAULT '0',
  `sidebar_form` tinyint(1) NOT NULL DEFAULT '0',
  `messages_menu` tinyint(1) NOT NULL DEFAULT '0',
  `notifications_menu` tinyint(1) NOT NULL DEFAULT '0',
  `tasks_menu` tinyint(1) NOT NULL DEFAULT '0',
  `user_menu` tinyint(1) NOT NULL DEFAULT '1',
  `ctrl_sidebar` tinyint(1) NOT NULL DEFAULT '0',
  `transition_page` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `admin_preferences`
--

INSERT INTO `admin_preferences` (`id`, `user_panel`, `sidebar_form`, `messages_menu`, `notifications_menu`, `tasks_menu`, `user_menu`, `ctrl_sidebar`, `transition_page`) VALUES
(1, 1, 1, 1, 1, 1, 1, 1, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bvtv_donvi`
--

CREATE TABLE `bvtv_donvi` (
  `donvi_id` int(11) NOT NULL,
  `donvi_kyhieu` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `donvi_mota` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `bvtv_donvi`
--

INSERT INTO `bvtv_donvi` (`donvi_id`, `donvi_kyhieu`, `donvi_mota`) VALUES
(1, 'g', 'gram'),
(2, 'mg', 'miligram'),
(3, 'l', 'lit'),
(4, 'ml', 'mililit'),
(5, 'kg', 'kilogram'),
(6, '&micro;g', 'microgram');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bvtv_hcpha`
--

CREATE TABLE `bvtv_hcpha` (
  `id_pha` int(11) NOT NULL,
  `ten` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lot` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `ngaypha` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `exp` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `total` float DEFAULT NULL,
  `goc1` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `goc2` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `goc3` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `goc4` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pha1` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pha2` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pha3` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pha4` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sol1` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sol2` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sol3` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sol4` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `m_goc1` float DEFAULT NULL,
  `m_goc2` float DEFAULT NULL,
  `m_goc3` float DEFAULT NULL,
  `m_goc4` float DEFAULT NULL,
  `v_pha1` float DEFAULT NULL,
  `v_pha2` float DEFAULT NULL,
  `v_pha3` float DEFAULT NULL,
  `v_pha4` float DEFAULT NULL,
  `v_sol_1` float DEFAULT NULL,
  `v_sol2` float DEFAULT NULL,
  `v_sol3` float DEFAULT NULL,
  `v_sol4` float DEFAULT NULL,
  `note` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='hoa chat pha, quy ve don vi chuan, ml - mg';

--
-- Đang đổ dữ liệu cho bảng `bvtv_hcpha`
--

INSERT INTO `bvtv_hcpha` (`id_pha`, `ten`, `code`, `lot`, `ngaypha`, `exp`, `total`, `goc1`, `goc2`, `goc3`, `goc4`, `pha1`, `pha2`, `pha3`, `pha4`, `sol1`, `sol2`, `sol3`, `sol4`, `m_goc1`, `m_goc2`, `m_goc3`, `m_goc4`, `v_pha1`, `v_pha2`, `v_pha3`, `v_pha4`, `v_sol_1`, `v_sol2`, `v_sol3`, `v_sol4`, `note`) VALUES
(1, 'Azoxystrobin 1g/l', 'StSi17501', '1111', '19/06/2018', '19/09/2018', 10, '1', NULL, NULL, NULL, '2', NULL, NULL, NULL, '3', NULL, NULL, NULL, 10.26, NULL, NULL, NULL, 2.5, NULL, NULL, NULL, 7.5, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bvtv_hc_goc`
--

CREATE TABLE `bvtv_hc_goc` (
  `hcgoc_id` int(11) NOT NULL,
  `hcgoc_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `hcgoc_vicb_code` varchar(45) NOT NULL,
  `hcgoc_nhasx` varchar(255) DEFAULT NULL,
  `hcgoc_code` varchar(45) DEFAULT NULL,
  `hcgoc_lot` varchar(45) DEFAULT NULL,
  `hcgoc_hamluong` varchar(45) DEFAULT NULL,
  `hcgoc_luongnhap` varchar(45) NOT NULL,
  `hcgoc_expday` varchar(25) NOT NULL,
  `hcgoc_ngaynhap` varchar(25) NOT NULL,
  `hcgoc_nguoinhap` varchar(45) NOT NULL,
  `hcgoc_baoquan` varchar(45) DEFAULT NULL,
  `hcgoc_dathang` varchar(50) DEFAULT NULL,
  `hcgoc_lab` varchar(50) NOT NULL,
  `hcgoc_ma_hcpha` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `bvtv_hc_goc`
--

INSERT INTO `bvtv_hc_goc` (`hcgoc_id`, `hcgoc_name`, `hcgoc_vicb_code`, `hcgoc_nhasx`, `hcgoc_code`, `hcgoc_lot`, `hcgoc_hamluong`, `hcgoc_luongnhap`, `hcgoc_expday`, `hcgoc_ngaynhap`, `hcgoc_nguoinhap`, `hcgoc_baoquan`, `hcgoc_dathang`, `hcgoc_lab`, `hcgoc_ma_hcpha`) VALUES
(1, 'Ống chuẩn Iodine 0.1N', 'StMe02400', 'Việt Nam', '', '', '', '', '', '', 'admin', '', NULL, '2', ''),
(2, 'Chuẩn Na2S2O3.5H2O 0.1N', 'StVn07700', 'Việt Nam', '', '', '', '', '', '', 'admin', '25± 5', NULL, '', ''),
(3, 'Oxytetracycline', 'StDr10200', 'Dr.Ehrenstorfer', '15820000', '10708', '', '0.25_g', '', '', 'admin', '4±4', NULL, '', ''),
(4, 'Buffer solution pH 4', 'StMe11000', 'Merck', '1.09435.1000', 'HC269954', '', '1_l', '', '', 'admin', '25±5', NULL, '', ''),
(5, 'Buffer solution pH 7', 'StMe11100', 'Merck', '1.09439.9010', 'HC271555', '', '1_l', '', '', 'admin', '25±5', NULL, '', ''),
(6, 'Buffer solution pH 9', 'StMe11200', 'Merck', '1.09476.0500', 'HC380779', '', '500_ml', '', '', 'admin', '25±5', NULL, '', ''),
(7, 'Caffeine', 'StSi12800', 'Sigma', '101398769', 'BCBM1877V', '', '5_g', '', '', 'admin', '25±5', NULL, '', ''),
(8, 'Carbendazim', 'StDr16300', 'Dr.Ehrenstorfer', '10990000', '30108', '', '0.25_g', '', '', 'admin', '20±4', NULL, '', ''),
(9, 'alpha-Cypermethrin ', 'StSi17200', 'Sigma', '45806-100MG', 'SZBD100XV', '99.7', '100_mg', '04-10-2018', '10-10-2014', 'admin', 'RT', NULL, '', ''),
(10, 'Flumethrin', 'StSi17300', 'Sigma', '46417-100MG', 'SZBE118XV', '95.7', '100_mg', '28-04-2019', '10-10-2014', 'admin', 'RT', NULL, '', ''),
(11, 'Lindane', 'StSi17400', 'Sigma', '45548-250MG', 'SZBB321XV', '99.8', '250_mg', '17-11-2016', '10-10-2014', 'admin', 'RT', NULL, '', ''),
(12, 'Chlorpyriphos', 'StSi17500', 'Sigma', '45395-250MG', 'SZBD343XV', '99.7', '250_mg', '09-12-2018', '10-10-2014', 'admin', '2-8', NULL, '', ''),
(13, 'Coumaphos', 'StSi17600', 'Sigma', '45403-250MG', 'SZBD157XV', '99.8', '250_mg', '06-06-2018', '10-10-2014', 'admin', '2-8', '', '2', ''),
(14, 'Edifenphos', 'StSi17700', 'Sigma', '45467-250MG', 'SZBD147XV', '99.7', '250_mg', '27-05-2018', '10-10-2014', 'admin', '2-8', NULL, '', ''),
(15, 'Buffer solution pH 10', 'StAm18100', 'Hanna - Mỹ', '', '', '', '500_ml', '', '', 'admin', '25±5', NULL, '', ''),
(16, 'Diazinon', 'StSi18300', 'Sigma', '45428-250MG', 'SZBC067XV', '98.5', '250_mg', '07-03-2017', '10-11-2014', 'admin', '2-8', NULL, '', ''),
(17, 'Mancozeb', 'StSi18500', 'Sigma', '45553-250MG', 'SZBA195XV', '96.4', '250_mg', '14-07-2015', '10-11-2014', 'admin', 'RT', NULL, '', ''),
(18, 'Amitraz', 'StSi18600', 'Sigma', '45323-250MG', 'SZBC167XV', '96.8', '250_mg', '15-06-2015', '25-11-2014', 'admin', '-20', NULL, '', ''),
(19, 'Amitraz', 'StSi18600', 'Sigma', '45323-250MG', 'SZBE141XV', '96.3', '250_mg', '21-05-2017', '02-07-2015', 'admin', '-20', NULL, '', ''),
(20, 'Abamectin', 'StSi18700', 'Sigma', '31732-100MG', 'SZBE141XV', '98.6', '100_mg', '21-05-2017', '10-11-2014', 'admin', '-20', NULL, '', ''),
(21, 'Dichorvos', 'StSi18800', 'Sigma', '45441-250MG', 'SZBC312XV', '99.1', '250_mg', '07-11-2015', '10-11-2014', 'admin', '-20', NULL, '', ''),
(22, 'Cypermethrin 95.2%', 'StSi19100', 'Sigma', '36128-100MG', 'BCBT2496', '95.2', '100_mg', '01-10-2021', '20-06-2017', 'admin', '25±5', NULL, '', ''),
(23, 'cypermethrin-KT-94.3 %', 'StVi19100', 'chuẩn kỹ thuật', '36128-100MG', 'SZBC047XV', '94.3', '100_mg', '01-02-2017', '12-12-2016', 'admin', 'RT', NULL, '', ''),
(24, 'Fipronil', 'StSi19200', 'Sigma', '46451-100MG', 'SZBD228XV', '97.9', '100_mg', '16-08-2017', '25-11-2014', 'admin', '25±5', NULL, '', ''),
(25, 'Emamectin benzoate', 'StSi19300', 'Sigma', '31733-250MG', 'SZB9170XV', '99.4', '250_mg', '19-06-2016', '25-11-2014', 'admin', '25±5', NULL, '', ''),
(26, 'Carbaryl', 'StSi19600', 'Sigma', '32055-250MG', 'SZBB224XV', '99.8', '250_mg', '10-08-2016', '25-11-2014', 'admin', '25±5', NULL, '', ''),
(27, 'Carbaryl', 'StSi19600', 'Sigma', '32055-250MG', 'SZBB219XV', '99.8', '250_mg', '07-08-2018', '28-01-2015', 'admin', '25±5', '1', '', ''),
(28, 'Acetamiprid', 'StSi19700', 'Sigma', '33674-100MG-R', 'SZBC110XV', '99.9', '100_mg', '19-04-2017', '25-11-2014', 'admin', '25±5', NULL, '', ''),
(29, 'Permethrin', 'StSi19800', 'Sigma', '45614-250MG', 'SZBD142XV', '98.1', '250_mg', '22-05-2018', '25-11-2014', 'admin', '25±5', NULL, '', ''),
(30, 'Fenitrothion', 'StSi20100', 'Sigma', '45487', 'SZBD022XV', '95.8', '250_mg', '22-01-2018', '25-11-2014', 'admin', '2-8', NULL, '', ''),
(31, 'Carbosulfan', 'StSi20200', 'Sigma', '32005', 'SZBD086XV', '99.4', '100_mg', '27-03-2017', '25-11-2014', 'admin', '2-8', NULL, '', ''),
(32, 'Validamycin A', 'StSi20300', 'Sigma', '32347', 'SZBE045XV', '74.1', '100_mg', '14-02-2017', '13-04-2015', 'admin', 'RT', NULL, '', ''),
(33, 'Validamycin A', 'StSi20300', 'Sigma', '32347', 'SZBE045XV', '74.1', '100_mg', '14-02-2017', '25-11-2014', 'admin', 'RT', NULL, '', ''),
(34, 'Validamycin A', 'StSi20300', 'Sigma', '32347', 'BCBT1589', '73.5', '100_mg', '01-11-2019', '16-04-2017', 'admin', 'RT', NULL, '', ''),
(35, 'Zineb', 'StSi20400', 'Sigma', '45707', 'SZBD330XV', '98', '250_mg', '26-11-2018', '25-11-2014', 'admin', '2-8', NULL, '', ''),
(36, 'Fenpropathrin', 'StSu20500', 'Chemservice', 'N-11960-250MG', '1825800', '99.4', '250_mg', '31-03-2018', '25-11-2014', 'admin', '25±5', NULL, '', ''),
(37, 'Hexaconazol', 'StSi20600', 'Sigma', '34348', 'SZBC313XV', '99.3', '250_mg', '08-11-2017', '25-11-2014', 'admin', '25±5', NULL, '', ''),
(38, '2,4-D', 'StSi20700', 'Sigma', '31518', 'SZBD352XV', '99.9', '250_mg', '18-12-2018', '25-11-2014', 'admin', '25±5', '', '', ''),
(39, 'Glyphosate', 'StSi20800', 'Sigma', '45521', 'SZBD267XV', '99.7', '250_mg', '24-09-2018', '25-11-2014', 'admin', '25±5', NULL, '', ''),
(40, 'Pyridaben', 'StSi20900', 'Sigma', '46047', 'SZBD123XV', '99.6', '25_mg', '03-05-2018', '25-11-2014', 'admin', '25±5', NULL, '', ''),
(41, 'Tetramethrin', 'StSi21000', 'Sigma', '45681', 'SZBD123XV', '98.3', '250_mg', '03-05-2018', '25-11-2014', 'admin', '25±5', '', '', ''),
(42, 'Fenvalerate', 'StSi21100', 'Sigma', '45495', 'SZBE065XV', '99.5', '250_mg', '06-03-2019', '25-11-2014', 'admin', '25±5', NULL, '', ''),
(43, 'Myclobutanil', 'StSi21200', 'Sigma', '34360', 'SZBD038XV', '99.4', '100_mg', '07-02-2014', '25-11-2014', 'admin', '25±5', NULL, '', ''),
(44, 'Tricyclazol', 'StSi21300', 'Sigma', '45808', 'SZBD077XV', '99.7', '10_mg', '18-03-2018', '25-11-2014', 'admin', '25±5', NULL, '', ''),
(45, 'Chlorothalonil', 'StSi21400', 'Sigma', '36791', 'SZBD232XV', '99.3', '250_mg', '20-08-2018', '25-11-2014', 'admin', '25±5', '0', '', ''),
(46, 'Trifluralin', 'StSi21500', 'Sigma', '32061', 'SZBD106XV', '99.1', '250_mg', '16-04-2018', '25-11-2014', 'admin', '25±5', '', '', ''),
(47, 'Flusilazole', 'StSi21600', 'Sigma', '45753', 'SZBC320XV', '99.8', '100_mg', '15-11-2017', '25-11-2014', 'admin', '25±5', NULL, '', ''),
(48, 'Tebuconazole', 'StSi21700', 'Sigma', '32013', 'SZBE029XV', '99.3', '250_mg', '29-01-2019', '25-11-2014', 'admin', '25±5', NULL, '', ''),
(49, 'Difenoconazole', 'StSi21800', 'Sigma', '36531', 'SZBC193XV', '97.2', '250_mg', '11-07-2017', '25-11-2014', 'admin', '25±5', NULL, '', ''),
(50, 'Fenobucard', 'StSi21900', 'Sigma', '45488', 'SZBD326XV', '97', '250_mg', '22-11-2018', '25-11-2014', 'admin', '25±5', NULL, '', ''),
(51, 'Fenobucard', 'StSi21900', 'Sigma', '45488', 'SZBD326XV', '97', '250_mg', '22-11-2018', '28-01-2015', 'admin', '25±5', NULL, '', ''),
(52, 'Buprofezin', 'StSu22000', 'Chemservice', 'N-11350-100MG', '1637800', '99.5', '100_mg', '30-06-2016', '25-11-2014', 'admin', '25±5', NULL, '', ''),
(53, 'Cyfluthrin', 'StSu22100', 'Chemservice', 'N-11130-250MG', '1623700', '', '250_mg', '30-06-2016', '25-11-2014', 'admin', '25±5', NULL, '', ''),
(54, 'Gibberellic acid', 'StAm25600', 'United State Pharmacopeia', '', '', '', '', '', '', 'admin', '', NULL, '', ''),
(55, 'Rotenone', 'StSi25700', 'Sigma', '45656', 'SZBB201XV', '', '250_mg', '20-07-2016', '08-04-2015', 'admin', 'RT', NULL, '', ''),
(56, 'Glycyrrhizic acid', 'StAm25800', 'ChromaDex - Mỹ', '00007375', '00007375-513', '', '100_mg', '01-05-2018', '08-04-2015', 'admin', 'RT', NULL, '', ''),
(57, 'Metalaxyl', 'StSu25900', 'Supelco', 'N12380-100MG', '2624900', '', '100_mg', '30-04-2019', '13-04-2015', 'admin', 'RT', NULL, '', ''),
(58, 'Benomyl', 'StSu26000', 'Supelco', 'N11138-100MG', '3160400', '', '100_mg', '30-04-2019', '13-04-2015', 'admin', 'RT', NULL, '', ''),
(59, 'Metolachlor', 'StSi26100', 'Sigma', '36163-100MG', 'SZBE044XV', '97.6', '100_mg', '13-02-2019', '13-04-2015', 'admin', 'RT', NULL, '', ''),
(60, 'Atrazine', 'StSi26200', 'Sigma', '45330-250MG', 'SZBD158XV', '99.1', '250_mg', '07-06-2018', '13-04-2015', 'admin', 'RT', NULL, '', ''),
(61, 'Chlorantraniliprole', 'StSi26300', 'Sigma', '32510-25MG', 'SZBD106XV', '96.9', '25_mg', '16-04-2016', '13-04-2015', 'admin', 'RT', NULL, '', ''),
(62, 'Cyproconazol', 'StSi26400', 'Sigma', '46068-100MG', 'SZBC170XV', '99.6', '100_mg', '18-06-2017', '13-04-2015', 'admin', 'RT', NULL, '', ''),
(63, 'Azoxystrobin', 'StSi26500', 'Sigma', '31697-100MG', 'SZBB130XV', '99.4', '100_mg', '10-05-2016', '13-04-2015', 'admin', 'RT', NULL, '', ''),
(64, 'Cymoxanil', 'StSi26600', 'Sigma', '34326-100MG', 'SZBD170XV', '99.9', '100_mg', '19-06-2018', '13-04-2015', 'admin', 'RT', NULL, '', ''),
(65, 'Picoxystrobin', 'StSi26700', 'Sigma', '33658-100MG-R', 'SZBD116XV', '99.9', '100_mg', '26-04-2018', '13-04-2015', 'admin', 'RT', NULL, '', ''),
(66, 'Butachlor', 'StSi26800', 'Sigma', '37887-100MG', 'SZBB315XV', '97', '100_mg', '11-11-2016', '13-04-2015', 'admin', 'RT', NULL, '', ''),
(67, 'isoprothiolane', 'StSi26900', 'Sigma', '76547-50MG', 'BCBM2865V', '98', '50_mg', '11-11-2016', '13-04-2015', 'admin', '2-8', NULL, '', ''),
(68, 'Metaldehyde', 'StSi27000', 'Sigma', '36611-1G-R', 'SZBD347XV', '100', '1_g', '13-12-2017', '13-04-2015', 'admin', '2-8', NULL, '', ''),
(69, 'propiconazole', 'StSi27100', 'Sigma', '45642-250MG', 'SZBD154XV', '98.4', '250_mg', '03-06-2018', '13-04-2015', 'admin', '2-8', NULL, '', ''),
(70, 'Propanil', 'StSi27400', 'Sigma', '45639-250MG', 'SZBD100XV', '99.6', '250_mg', '10-04-2018', '15-05-2015', 'admin', '25±5', NULL, '', ''),
(71, 'Thiamethoxam', 'StSi27600', 'Sigma', '37924-100MG', 'SZBC031XV', '99.6', '100_mg', '31-01-2017', '30-05-2015', 'admin', 'RT', NULL, '', ''),
(72, 'Profenofos', 'StSi27900', 'Sigma', '45632-250MG', 'SZBC352XV', '98.6', '250_mg', '17-12-2017', '30-05-2015', 'admin', '2-8', NULL, '', ''),
(73, 'Propargite (omite)', 'StSu28000', 'Supelco', 'N-12727-100MG', '3264000', '', '100_mg', '30-06-2017', '30-05-2015', 'admin', 'RT', NULL, '', ''),
(74, 'Dimethoate', 'StSu28100', 'Supelco', 'N-11758-250MG', '2965600', '99.4', '250_mg', '01-07-2017', '30-05-2015', 'admin', 'RT', NULL, '', ''),
(75, 'Mesotrione', 'StSi28200', 'Sigma', '33855-100MG', 'SZBD087XV', '99.9', '100_mg', '28-03-2017', '30-05-2015', 'admin', '25±5', NULL, '', ''),
(76, 'Thiophanate-methyl', 'StSi28700', 'Sigma', '45688-250MG', 'SZBC220XV', '99.3', '100_ml', '07-08-2017', '25-06-2015', 'admin', '25±5', NULL, '', ''),
(77, 'Alachlor', 'StSi28800', 'Sigma', '45316-250MG', 'SZBD163XV', '99.8', '250_mg', '12-06-2018', '02-07-2015', 'admin', '25±5', '1', '', ''),
(78, 'Clomazone', 'StSi28900', 'Sigma', '4612-1MG', 'SZBC306XV', '99.7', '100_ml', '01-11-2017', '02-07-2015', 'admin', '25±5', NULL, '', ''),
(79, 'Deltamethrin', 'StSi29000', 'Sigma', '45423-250MG', 'SZBC059XV', '99.6', '250_mg', '28-02-2017', '02-07-2015', 'admin', '25±5', NULL, '', ''),
(80, 'Ethoprophos', 'StSi29100', 'Sigma', '45306-100MG', 'SZBD182XV', '93.4', '100_mg', '01-07-2018', '02-07-2015', 'admin', '2-8', NULL, '', ''),
(81, 'Fenoxanil', 'StSi29200', 'Sigma', '33872-100MG', 'SZBA305XV', '99.1', '100_mg', '01-11-2015', '02-07-2015', 'admin', '25±5', NULL, '', ''),
(82, 'Pretilachlor', 'StSi29300', 'Sigma', '31251-250MG', 'SZBD085XV', '98.7', '250_mg', '26-03-2018', '02-07-2015', 'admin', '25±5', NULL, '', ''),
(83, 'S-metolachlor', 'StSi29400', 'Sigma', '33859-100MG-R', 'SZBD352XV', '98.2', '100_mg', '18-12-2018', '02-07-2015', 'admin', '25±5', NULL, '', ''),
(84, 'Sulfadimethoxin', 'StSi29500', 'Sigma', '46794-250MG', 'SZBE015XV', '99.1', '250_mg', '15-01-2019', '02-07-2015', 'admin', '2-8', NULL, '', ''),
(85, 'Bentazon', 'StSi29600', 'Sigma', '32052-250MG', 'SZBD337XV', '99.9', '250_mg', '03-12-2018', '02-07-2015', 'admin', '25±5', NULL, '', ''),
(86, 'Fenclorim', 'StSi29700', 'Sigma', '46005-250MG', 'SZBE023XV', '99.4', '250_mg', '23-01-2019', '02-07-2015', 'admin', '25±5', NULL, '', ''),
(87, 'NAA (1-Naphthaleneacetic acid)', 'StSi35300', 'Sigma', '', '', '', '', '', '', 'admin', '', NULL, '', ''),
(88, 'Iprodione', 'StSi37900', 'Sigma', '36132-100MG', 'szbc174xv', '99.5', '100_mg', '22-06-2017', '10-03-2016', 'admin', 'RT', NULL, '', ''),
(89, 'Penoxsulam', 'StSi38000', 'Sigma', '32094-25MG', 'SZBE042XV', '97.1', '25_mg', '11-02-2017', '10-03-2016', 'admin', '', NULL, '', ''),
(90, 'Gibberellic acid', 'StSi38100', 'Sigma', '101551856', 'BCBP1754V', '90', '500_mg', '10-03-2016', '10-03-2016', 'admin', '', NULL, '', ''),
(91, 'Chlorfenapyr', 'StSi39000', 'Fluka', '37913', 'SZBC123XV', '99.6', '100_mg', '02-05-2017', '20-06-2016', 'admin', 'RT', NULL, '', ''),
(92, 'Dioctyl phthalate (DOP)', 'StVi38000', 'VICB', '', '', '', '', '', '', 'admin', '', NULL, '', ''),
(93, 'Dioctyl phthalate (DOP) 10g/L', 'StVi38001', 'VICB', '', '', '', '', '', '', 'admin', '', NULL, '', ''),
(94, 'Cyromazine', 'StHp53400', 'HPC Standards GmbH', '672836', '776420', '99.8±0.5', '250_mg', '01-04-2021', '16-03-2017', 'admin', '20', NULL, '', ''),
(95, 'Diafenthiuron', 'StHp53500', 'HPC Standards GmbH', '672837', '774781', '99.5±0.5', '250_mg', '01-08-2019', '16-03-2017', 'admin', '20', NULL, '', ''),
(96, 'Difenoconazole', 'StHp53600', 'HPC Standards GmbH', '672841', '775640', '99.9±0.5', '250_mg', '01-01-2021', '16-03-2017', 'admin', '20', NULL, '', ''),
(97, 'Dimethoate', 'StHp53700', 'HPC Standards GmbH', '672842', '779154', '99.5±0.5', '250_mg', '01-02-2022', '16-03-2017', 'admin', '4', NULL, '', ''),
(98, 'Fenobucarb', 'StHp53800', 'HPC Standards GmbH', '672849', '773633', '99.4±0.5', '250_mg', '01-11-2019', '16-03-2017', 'admin', '20', NULL, '', ''),
(99, 'Fipronil', 'StHp53900', 'HPC Standards GmbH', '672852', '776901', '97.3±0.5', '100_mg', '01-03-2021', '16-03-2017', 'admin', '20', NULL, '', ''),
(100, 'Hexaconazole', 'StHp54000', 'HPC Standards GmbH', '672859', '773281', '99.7±0.5', '100_mg', '01-02-2019', '18-03-2017', 'admin', '20', NULL, '', ''),
(101, 'Imidacloprid', 'StHp54100', 'HPC Standards GmbH', '672861', '779063', '98.7±0.5', '100_mg', '01-01-2022', '18-03-2017', 'admin', '20', NULL, '', ''),
(102, 'Iprodione', 'StHp54200', 'HPC Standards GmbH', '672862', '775997', '99.9±0.5', '100_mg', '01-03-2021', '18-03-2017', 'admin', '20', NULL, '', ''),
(103, 'Paclobutrazol', 'StHp54300', 'HPC Standards GmbH', '672877', '775886', '99.9±0.5', '250_mg', '01-01-2020', '18-03-2017', 'admin', '20', NULL, '', ''),
(104, 'Propiconazole', 'StHp54400', 'HPC Standards GmbH', '672882', '772837', '99.9±0.5', '250_mg', '01-11-2019', '18-03-2017', 'admin', '4', NULL, '', ''),
(105, 'Abamectin', 'StHp54500', 'HPC Standards GmbH', '672896', '773104', '96.8±0.5', '100_mg', '01-12-2019', '18-03-2017', 'admin', '4', NULL, '', ''),
(106, 'Deltamethrin', 'StHp54600', 'HPC Standards GmbH', '672900', '774977', '99.8±0.5', '250_mg', '01-02-2020', '18-03-2017', 'admin', '4', NULL, '', ''),
(107, 'Hexythiazox', 'StHp54700', 'HPC Standards GmbH', '672901', '775986', '99.7±0.5', '100_mg', '01-03-2019', '18-03-2017', 'admin', '20', NULL, '', ''),
(108, 'Emamectin benzoate', 'StHp54800', 'HPC Standards GmbH', '672905', '777944', '94.6±0.5', '100_mg', '01-11-2021', '18-03-2017', 'admin', '20', NULL, '', ''),
(109, 'Permethrin', 'StHp54900', 'HPC Standards GmbH', '672906', '779152', '99.9±0.5', '250_mg', '01-12-2021', '18-03-2017', 'admin', '20', NULL, '', ''),
(110, 'Etofenprox', 'StHp55000', 'HPC Standards GmbH', '672908', '774215', '98.8±0.5', '100_mg', '01-10-2019', '18-03-2017', 'admin', '20', NULL, '', ''),
(111, 'Cyfluthrin beta', 'StHp55100', 'HPC Standards GmbH', '672909', '776235', '99.8±0.5', '250_mg', '01-04-2020', '18-03-2017', 'admin', '20', NULL, '', ''),
(112, 'Cyhalothrin lambda', 'StHp55200', 'HPC Standards GmbH', '672910', '776572', '99.7±0.5', '100_mg', '01-04-2021', '18-03-2017', 'admin', '20', NULL, '', ''),
(113, 'Buprofezin', 'StHp55300', 'HPC Standards GmbH', '672928', '772217', '99.8±0.5', '100_mg', '01-02-2019', '18-03-2017', 'admin', '20', NULL, '', ''),
(114, 'Kresoxim-methyl', 'StHp55400', 'HPC Standards GmbH', '672930', '776004', '99.9±0.5', '100_mg', '01-03-2021', '18-03-2017', 'admin', '20', NULL, '', ''),
(115, 'Butachlor', 'StHp55500', 'HPC Standards GmbH', '672931', '777759', '99.5±0.5', '100_mg', '01-05-2021', '18-03-2017', 'admin', '20', NULL, '', ''),
(116, 'Indoxacarb', 'StHp55600', 'HPC Standards GmbH', '672941', '775771', '99.0±0.5', '100_mg', '01-02-2021', '18-03-2017', 'admin', '20', NULL, '', ''),
(117, 'Gentamicin sulfate salt hydrate', 'StHp55700', 'HPC Standards GmbH', '672959', '774848', '96.5±0.5', '250_mg', '01-06-2019', '18-03-2017', 'admin', '4', NULL, '', ''),
(118, 'Oxytetracyline hydrochloride', 'StHp55800', 'HPC Standards GmbH', '672968', '772043', '99.0±0.5', '250_mg', '01-02-2020', '18-03-2017', 'admin', '4', NULL, '', ''),
(119, 'Azoxystrobin', 'StHp55900', 'HPC Standards GmbH', '673826', '772924', '99.9±0.5', '100_mg', '01-05-2019', '18-03-2017', 'admin', '20', NULL, '', ''),
(120, 'Tricyclazol', 'StHp56000', 'HPC Standards GmbH', '673834', '773165', '99.1±0.5', '100_mg', '01-01-2019', '18-03-2017', 'admin', '20', NULL, '', ''),
(121, 'Propargite', 'StHp56100', 'HPC Standards GmbH', '673870', '775576', '99.0±0.5', '100_mg', '01-12-2020', '18-03-2017', 'admin', '20', NULL, '', ''),
(122, 'Spinosad', 'StHp56200', 'HPC Standards GmbH', '673889', '779153', '96.6±0.5', '100_mg', '01-01-2022', '18-03-2017', 'admin', '20', NULL, '', ''),
(123, 'Profenofos', 'StHp56300', 'HPC Standards GmbH', '673893', '776774', '96.2±0.5', '250_mg', '01-07-2021', '18-03-2017', 'admin', '4', NULL, '', ''),
(124, 'Chlorantraniliprole', 'StHp56400', 'HPC Standards GmbH', '673938', '775256', '98.7±0.5', '100_mg', '01-09-2020', '18-03-2017', 'admin', '20', NULL, '', ''),
(125, 'Flusilazole', 'StHp56500', 'HPC Standards GmbH', '673947', '775009', '99.5±0.5', '100_mg', '01-03-2020', '18-03-2017', 'admin', '20', NULL, '', ''),
(126, 'Chlorfluazuron', 'StHp56600', 'HPC Standards GmbH', '673963', '776910', '99.6±0.5', '250_mg', '01-08-2021', '18-03-2017', 'admin', '20', NULL, '', ''),
(127, '1-naphthyl acetic acid', 'StHp56700', 'HPC Standards GmbH', '673968', '776239', '99.7±0.5', '500_mg', '01-05-2021', '18-03-2017', 'admin', '20', '', '', ''),
(128, 'Prochloraz', 'StHp56800', 'HPC Standards GmbH', '673983', '774849', '99.9±0.5', '250_mg', '01-03-2021', '18-03-2017', 'admin', '20', NULL, '', ''),
(129, 'Nitenpyram', 'StHp56900', 'HPC Standards GmbH', '673984', '775982', '99.5±0.5', '100_mg', '01-01-2021', '18-03-2017', 'admin', '20', NULL, '', ''),
(130, 'Dimethomorph', 'StHp57000', 'HPC Standards GmbH', '673985', '775775', '99.4±0.5', '100_mg', '01-12-2020', '18-03-2017', 'admin', '20', NULL, '', ''),
(131, 'Chlorpyrifos ethyl', 'StHp57100', 'HPC Standards GmbH', '673986', '774823', '99.9±0.5', '250_mg', '01-09-2020', '18-03-2017', 'admin', '4', NULL, '', ''),
(132, 'Propamocarb', 'StHp57200', 'HPC Standards GmbH', '674052', '773699', '99.9±0.5', '250_mg', '01-11-2020', '18-03-2017', 'admin', '4', NULL, '', ''),
(133, 'Niclosamide', 'StHp57300', 'HPC Standards GmbH', '674464', '776922', '99.9±0.5', '100_mg', '01-02-2022', '18-03-2017', 'admin', '20', NULL, '', ''),
(134, 'Albendazole', 'StHp57400', 'HPC Standards GmbH', '674552', '778358', '99.2±0.5', '100_mg', '01-12-2021', '18-03-2017', 'admin', '20', NULL, '', ''),
(135, 'Clothianidin', 'StHp57500', 'HPC Standards GmbH', '674576', '775255', '99.9±0.5', '100_mg', '01-06-2020', '18-03-2017', 'admin', '20', NULL, '', ''),
(136, 'Trifloxystrobin', 'StHp57600', 'HPC Standards GmbH', '674693', '772154', '99.9±0.5', '100_mg', '01-01-2019', '18-03-2017', 'admin', '20', NULL, '', ''),
(137, 'Fenpyroximate', 'StHp57700', 'HPC Standards GmbH', '674698', '772119', '99.9±0.5', '100_mg', '01-01-2019', '18-03-2017', 'admin', '20', NULL, '', ''),
(138, 'Esfenvalerate', 'StHp57800', 'HPC Standards GmbH', '674824', '776541', '99.9±0.5', '100_mg', '01-05-2021', '18-03-2017', 'admin', '20', NULL, '', ''),
(139, 'Tebufenozide', 'StHp57900', 'HPC Standards GmbH', '674839', '776081', '99.9±0.5', '100_mg', '01-04-2021', '18-03-2017', 'admin', '20', NULL, '', ''),
(140, 'Oxolinic acid', 'StHp58000', 'HPC Standards GmbH', '674896', '779202', '97.6±0.5', '250_mg', '01-03-2021', '18-03-2017', 'admin', '4', NULL, '', ''),
(141, 'Fluazinam', 'StHp58100', 'HPC Standards GmbH', '675061', '772531', '98.7±0.5', '100_mg', '01-07-2019', '18-03-2017', 'admin', '20', NULL, '', ''),
(142, 'Cyazofamid', 'StHp58200', 'HPC Standards GmbH', '675123', '777867', '98.1±0.5', '100_mg', '01-08-2021', '18-03-2017', 'admin', '-20', NULL, '', ''),
(143, 'Bromadiolone', 'StHp58300', 'HPC Standards GmbH', '675124', '776763', '98.5±1.0', '100_mg', '01-07-2022', '18-03-2017', 'admin', '20', NULL, '', ''),
(144, 'Brodifacoum', 'StHp58400', 'HPC Standards GmbH', '675127', '779203', '99.8±0.5', '100_mg', '01-03-2022', '18-03-2017', 'admin', '20', NULL, '', ''),
(145, 'Fenpropathrin', 'StHp58500', 'HPC Standards GmbH', '675268', '772973', '99.2±0.5', '250_mg', '01-04-2019', '18-03-2017', 'admin', '20', NULL, '', ''),
(146, 'Myclobutanil', 'StHp58600', 'HPC Standards GmbH', '675271', '774279', '99.9±0.5', '100_mg', '01-05-2020', '18-03-2017', 'admin', '20', NULL, '', ''),
(147, 'E-metominostrobin', 'StHp58700', 'HPC Standards GmbH', '675278', '779156', '99.9±1.0', '100_mg', '01-02-2022', '18-03-2017', 'admin', '20', NULL, '', ''),
(148, 'Dinotefuran', 'StHp58800', 'HPC Standards GmbH', '675361', '777741', '99.9±0.5', '50_mg', '01-08-2020', '18-03-2017', 'admin', '4', NULL, '', ''),
(149, 'Fosetyl-aluminium', 'StHp58900', 'HPC Standards GmbH', '675372', '778427', '89.8±2.0', '250_mg', '01-12-2020', '18-03-2017', 'admin', '20', NULL, '', ''),
(150, 'Metalaxyl-M', 'StHp59000', 'HPC Standards GmbH', '675835', '777942', '99.8±0.5', '100_mg', '01-11-2021', '18-03-2017', 'admin', '4', NULL, '', ''),
(151, 'Fenitrothion', 'StHp59100', 'HPC Standards GmbH', '676107', '774616', '94.8±0.5', '250_mg', '01-07-2020', '18-03-2017', 'admin', '20', NULL, '', ''),
(152, 'Flubendiamide', 'StHp59200', 'HPC Standards GmbH', '676142', '778959', '98.4±0.5', '10_ml', '01-02-2019', '18-03-2017', 'admin', '20', NULL, '', ''),
(153, 'Acephate', 'StHp59300', 'HPC Standards GmbH', '676860', '776036', '99.7±0.5', '250_mg', '01-04-2021', '18-03-2017', 'admin', '4', NULL, '', ''),
(154, 'Warfarin', 'StSi59400', 'Sigma', '45706', 'SZBF197XV', '99.9', '250_mg', '16-07-2020', '20-04-2017', 'admin', 'RT', NULL, '', ''),
(155, 'Nereistoxin oxalate', 'StDr59500', 'Dr.Ehrenstorfer', 'DRE-C15502000', '114115', '99', '100_mg', '04-08-2020', '16-04-2017', 'admin', '20±4', NULL, '', ''),
(156, 'Carbaryl', 'StHp59600', 'HPC Standards GmbH', '672820', '776685', '99.8±0.5', '250_mg', '01-05-2021', '16-03-2017', 'admin', '20', NULL, '', ''),
(157, 'Chlorothalonil', 'StHp59700', 'HPC Standards GmbH', '672825', '776237', '99.2±0.5', '250_mg', '01-04-2021', '16-03-2017', 'admin', '20', NULL, '', ''),
(158, 'cypermethrin', 'StVi59800', 'VICB', '', 'VICB2017001', '', '100_mg', '01-12-2018', '01-12-2016', 'admin', '', NULL, '', ''),
(159, 'Isoprothiolane', 'StVi59900', 'VICB', '', 'VICB2017002', '', '20_g', '01-12-2018', '01-12-2016', 'admin', '', NULL, '', ''),
(160, 'tricyclazole', 'StVi60000', 'VICB', '', 'VICB2017003', '', '5_g', '01-12-2018', '01-12-2016', 'admin', '', NULL, '', ''),
(161, 'acetamiprid', 'StVi60100', 'VICB', '', 'VICB2017004', '', '30_g', '01-12-2018', '01-12-2016', 'admin', '', NULL, '', ''),
(162, 'thiamethoxam', 'StVi60200', 'VICB', '', 'VICB2017005', '', '30_g', '01-12-2018', '01-12-2016', 'admin', '', NULL, '', ''),
(163, 'Quinalphos', 'StVi60300', 'VICB', '', 'VICB2017006', '', '5_g', '01-12-2018', '01-12-2016', 'admin', '', NULL, '', ''),
(164, 'Butachlor', 'StVi60400', 'VICB', '', 'VICB2017007', '', '80_mg', '01-12-2018', '01-12-2016', 'admin', '', NULL, '', ''),
(165, 'Diazinon', 'StVi60500', 'VICB', '', 'VICB2017008', '', '80_mg', '01-12-2018', '01-12-2016', 'admin', '', NULL, '', ''),
(166, 'Pymetrozine', 'StVi60600', 'VICB', '', 'VICB2017009', '', '1000_mg', '01-12-2018', '01-12-2016', 'admin', '', NULL, '', ''),
(167, 'Glacial Acetic Acid', 'StUs60700', 'USP', '', '', '', '', '', '', 'admin', '20', NULL, '', ''),
(168, 'CombiTitrant5', 'StMe60800', 'Merck', '1880051000', 'HX57763105', '', '1_l', '30-11-2018', '', 'admin', 'RT', NULL, '', ''),
(169, 'Tricyclazole', 'StDr31900', 'Dr.Ehrenstorfer', 'C17810000', '40729', '98.5', '100_mg', '01-01-2019', '17-08-2015', 'admin', '20±4', NULL, '', ''),
(170, 'Carbofuran', 'StSi22200', 'Sigma', '32056-250MG', 'SZB9064XV', '99.9', '250_mg', '05-03-2016', '29-11-2014', 'admin', '25±5', NULL, '', ''),
(171, '4,4&#039;-DDT', 'StSi19400', 'Sigma', '31041-100MG', 'SZBC167XV', '99.8', '100_mg', '15-06-2017', '25-11-2014', 'admin', '25±5', NULL, '', ''),
(172, 'Mercaptodimethur', 'StSi17000', 'Sigma', '36152-100MG', 'SZBD302XV', '99.5', '250_mg', '29-10-2018', '10-10-2014', 'admin', 'RT', NULL, '', ''),
(173, 'Mercaptodimethur', 'StSi17000', 'Sigma', '36152-100MG', 'SZBD302XV', '', '250_mg', '29-11-2018', '28-01-2015', 'admin', 'RT', NULL, '', ''),
(174, 'Norfloxacin', 'StSi18400', 'Sigma', '33899-100MG-R', 'SZBD099XV', '99.8', '100_mg', '09-04-2018', '10-11-2014', 'admin', '2-8', NULL, '', ''),
(175, 'Aldicarb', 'StSi24500', 'Sigma', '33386-250MG', 'SZBC235XV', '99.9', '250_mg', '22-08-2017', '28-01-2015', 'admin', 'RT', NULL, '', ''),
(176, 'Quintozen', 'StSi24800', 'Sigma', '45653-250MG', 'SZBC313XV', '99.7', '250_mg', '08-11-2017', '28-01-2015', 'admin', 'RT', NULL, '', ''),
(177, 'Sulfaquinoxaline', 'StSi19500', 'Sigma', '45662-250MG', 'SZBD227XV', '98.8', '250_mg', '15-08-2018', '10-11-2014', 'admin', '25±5', NULL, '', ''),
(178, 'Pirimicarb', 'StSi17100', 'Sigma', '45627-250MG', 'SZBD058XV', '98.7', '250_mg', '27-02-2018', '10-10-2014', 'admin', 'RT', '', '', ''),
(179, 'Propoxur', 'StSi24700', 'Sigma', '45644-250MG', 'SZBD302XV', '99.9', '250_mg', '29-10-2018', '28-01-2015', 'admin', 'RT', NULL, '', ''),
(180, 'Aldicarb - sulfone', 'StSi24400', 'Sigma', '33387-100MG', 'SZBC313XV', '97.6', '100_mg', '08-11-2017', '28-01-2015', 'admin', 'RT', NULL, '', ''),
(181, 'Methomyl', 'StSi24600', 'Sigma', '36159-100MG', 'SZBC332XV', '99.9', '250_mg', '27-11-2017', '28-01-2015', 'admin', 'RT', NULL, '', ''),
(182, 'Aldicarb - sulfoxide', 'StSi24200', 'Sigma', '31258-100MG', 'SZBD049XV', '99.2', '100_mg', '18-02-2018', '28-01-2015', 'admin', '2-8', '', '', ''),
(183, 'Carbofuran -3-hydroxy', 'StSi24300', 'Sigma', '37896-10MG', 'SZBB174XV', '99.1', '10_mg', '23-06-2016', '28-01-2015', 'admin', '-20', NULL, '', ''),
(184, 'Abamectin', 'StDr32000', 'Dr.Ehrenstorfer', 'CA10001000', '50205', '96.4', '100_mg', '01-04-2016', '17-08-2015', 'admin', '-18±4', NULL, '', ''),
(185, 'Paclobutrazol', 'StVi64100', 'VICB', '', '64100-01', '99.9±0.5', '', '', '', 'admin', '20', NULL, '', ''),
(186, 'Propargite', 'StDr62700', 'Dr.Ehrenstorfer', 'C16430000', 'G133144', '99.55', '100_mg', '16-03-2023', '23-08-2017', 'admin', '-18±4', NULL, '', ''),
(187, 'Pymetrozine', 'StDr62800', 'Dr.Ehrenstorfer', 'C16587000', '128319', '99.0±1.0', '100_mg', '25-11-2019', '23-08-2017', 'admin', '20±4', NULL, '', ''),
(188, 'Pyrazosulfuron-ethyl', 'StDr62900', 'Dr.Ehrenstorfer', 'C16611500', '126317', '98.5', '100_mg', '16-08-2019', '23-08-2017', 'admin', '20±4', NULL, '', ''),
(189, 'Pyridaben', 'StDr63000', 'Dr.Ehrenstorfer', 'C16628000', 'G124178', '99.99', '25_mg', '05-01-2023', '23-08-2017', 'admin', '20±4', NULL, '', ''),
(190, 'Pyridalyl', 'StDr63100', 'Dr.Ehrenstorfer', 'C16629000', 'G129159', '93.57', '100_mg', '13-03-2023', '23-08-2017', 'admin', '4±4', NULL, '', ''),
(191, 'Pyriproxyfen', 'StDr63200', 'Dr.Ehrenstorfer', 'C16662500', 'G130532', '99.93', '100_mg', '06-03-2023', '23-08-2017', 'admin', '20±4', NULL, '', ''),
(192, 'Quinchlorac', 'StDr63300', 'Dr.Ehrenstorfer', 'C16705000', '120715', '98.5', '100_mg', '10-06-2019', '23-08-2017', 'admin', '20±4', NULL, '', ''),
(193, 'Quizalofop-P-ethyl', 'StDr63400', 'Dr.Ehrenstorfer', 'C16740500', '112971', '99.0±1.0', '100_mg', '08-02-2023', '23-08-2017', 'admin', '20±4', NULL, '', ''),
(194, 'Tetraconazole', 'StDr63500', 'Dr.Ehrenstorfer', 'C17395000', 'G133039', '99.67', '100_mg', '14-03-2021', '23-08-2017', 'admin', '4±4', NULL, '', ''),
(195, 'Thiamethoxam', 'StDr63600', 'Dr.Ehrenstorfer', 'C17453000', 'G133046', '99.69', '100_mg', '16-01-2021', '23-08-2017', 'admin', '20±4', NULL, '', ''),
(196, 'Thiophanate-methyl', 'StDr63700', 'Dr.Ehrenstorfer', 'C17545000', 'G125445', '99.94', '250_mg', '16-03-2021', '23-08-2017', 'admin', '20±4', NULL, '', ''),
(197, 'Triadimefon', 'StDr63800', 'Dr.Ehrenstorfer', 'C17610000', 'G129954', '98.72', '250_mg', '14-03-2023', '23-08-2017', 'admin', '20±4', NULL, '', ''),
(198, 'Triadimenol', 'StDr63900', 'Dr.Ehrenstorfer', 'C17620000', 'G130479', '98.91', '250_mg', '10-03-2023', '23-08-2017', 'admin', '20±4', NULL, '', ''),
(199, 'Thiacloprid', 'StDr64000', 'Dr.Ehrenstorfer', 'C17451000', 'G130509', '99.52', '100_mg', '03-03-2021', '23-08-2017', 'admin', '20±4', NULL, '', ''),
(200, 'Acetamiprid', 'StDr64100', 'Dr.Ehrenstorfer', 'C10013000', 'G127322', '99.72', '100_mg', '01-03-2021', '23-08-2017', 'admin', '20±4', NULL, '', ''),
(201, 'Amitraz', 'StDr64200', 'Dr.Ehrenstorfer', 'C10230000', 'G128883', '99.87', '250_mg', '16-02-2021', '23-08-2017', 'admin', '-18±4', NULL, '', ''),
(202, 'Clomazone', 'StDr65000', 'Dr.Ehrenstorfer', 'C11685000', 'G121839', '99.4', '100_mg', '22-02-2021', '23-08-2017', 'admin', '4±4', NULL, '', ''),
(203, 'Cyhalofop-butyl', 'StDr65100', 'Dr.Ehrenstorfer', 'C11858000', '113061', '99', '50_mg', '26-01-2019', '23-08-2017', 'admin', '20±4', NULL, '', ''),
(204, 'alpha-Cypermethrin', 'StDr65200', 'Dr.Ehrenstorfer', 'C11890100', 'G122389', '99.42', '100_mg', '24-01-2022', '23-08-2017', 'admin', '20±4', NULL, '', ''),
(205, 'Cyproconazole', 'StDr65300', 'Dr.Ehrenstorfer', 'C11908000', 'G123405', '98.56', '100_mg', '04-01-2020', '23-08-2017', 'admin', '20±4', NULL, '', ''),
(206, '2,4-D', 'StDr65400', 'Dr.Ehrenstorfer', 'C11940000', 'G130560', '99.93', '250_mg', '15-03-2023', '23-08-2017', 'admin', '20±4', NULL, '', ''),
(207, 'Diazinon', 'StDr65500', 'Dr.Ehrenstorfer', 'C12210000', 'G126049', '98.92', '250_mg', '01-03-2021', '23-08-2017', 'admin', '4±4', NULL, '', ''),
(208, '2,4-Dichlorophenol', 'StDr65600', 'Dr.Ehrenstorfer', 'C12451000', 'G128718', '99.87', '250_mg', '15-02-2023', '23-08-2017', 'admin', '20±4', NULL, '', ''),
(209, 'Chlorfenapyr', 'StDr65700', 'Dr.Ehrenstorfer', 'C11247500', 'G131990', '96.96', '100_mg', '07-03-2021', '23-08-2017', 'admin', '20±4', NULL, '', ''),
(210, 'Isoprothiolane', 'StDr65800', 'Dr.Ehrenstorfer', 'C14467500', 'G123323', '99.97', '100_mg', '05-01-2021', '23-08-2017', 'admin', '4±4', NULL, '', ''),
(211, 'Mesotrione', 'StDr65900', 'Dr.Ehrenstorfer', 'C14914000', 'G135575', '98.61', '100_mg', '28-03-2021', '23-08-2017', 'admin', '4±4', NULL, '', ''),
(212, 'Metalaxyl', 'StDr66000', 'Dr.Ehrenstorfer', 'C14920000', 'G127330', '99.93', '100_mg', '13-03-2023', '23-08-2017', 'admin', '20±4', NULL, '', ''),
(213, 'Metaldehyde', 'StDr66100', 'Dr.Ehrenstorfer', 'C14930000', '117050', '97±2', '250_mg', '21-12-2018', '23-08-2017', 'admin', '20±4', NULL, '', ''),
(214, 'Penoxsulam', 'StDr66200', 'Dr.Ehrenstorfer', 'C15937000', 'G126501', '99.64', '50_mg', '20-02-2021', '23-08-2017', 'admin', '20±4', NULL, '', ''),
(215, 'Picoxystrobin', 'StDr66300', 'Dr.Ehrenstorfer', 'C16206000', '106532', '99', '100_mg', '02-03-2019', '23-08-2017', 'admin', '20±4', NULL, '', ''),
(216, '2-nitrophenol sodium salt', 'StJP64300', 'TCI', 'N0222-25G', 'FIM01-CFCR', '99', '25_g', '', '18-09-2017', 'admin', 'RT', NULL, '', ''),
(217, 'Sodium 2-methoxy-5-nitrophenolate', 'StMS64400', 'Matrix', 'O98840', 'T01R', '95', '1_g', '', '18-09-2017', 'admin', 'RT', NULL, '', ''),
(218, 'Sodium 4-nitrophenolate', 'StMS64500', 'Matrix', 'O99824', 'T18N', '95', '25_g', '', '18-09-2017', 'admin', 'RT', NULL, '', ''),
(219, 'Sodium 2.4-nitrophenolate', 'StMS64600', 'Matrix', 'O97103', 'S20N', '95', '1_g', '', '18-09-2017', 'admin', 'RT', NULL, '', ''),
(220, 'Quinalphos', 'StDr64700', 'Dr.Ehrenstorfer', 'C16700000', 'G131422', '99.4', '0.25_g', '13-03-2021', '18-09-2017', 'admin', '-18±4', NULL, '', ''),
(221, 'Thiobencarb', 'StDr64800', 'Dr.Ehrenstorfer', 'C17470000', 'G150057', '98.17', '0.25_g', '17-08-2021', '18-09-2017', 'admin', '4±4', NULL, '', ''),
(222, 'Pyraclostrobin', 'StSu64900', 'Chemservice', 'N-13143-100MG', '6491300', '99.5', '100_mg', '30-06-2018', '18-09-2017', 'admin', 'RT', NULL, '', ''),
(223, 'Carbosulfan', 'StSu66500', 'Chemservice', 'N-11409-250MG', '6450200', '97.5', '250_mg', '31-03-2021', '18-09-2017', 'admin', 'RT', NULL, '', ''),
(224, 'Rotenone', 'StSu66600', 'Chemservice', 'N-13184-250MG', '5983200', '96.8', '250_mg', '30-09-2019', '18-09-2017', 'admin', 'RT', NULL, '', ''),
(225, 'Pyribenzoxim', 'StSu66700', 'Dr.Ehrenstorfer', 'C16624000', 'G149059', '98.6', '100_mg', '05-09-2020', '04-10-2017', 'admin', '20±4', NULL, '', ''),
(226, 'Thiodicarb', 'StDr71400', 'Dr.Ehrenstorfer', 'C17490000', 'G145972', '97.3', '100_mg', '25-09-2023', '21-11-2017', 'admin', '20±5', NULL, '', ''),
(227, 'Pretilachlor', 'StDr78100', 'Dr.Ehrenstorfer', 'C16287000', 'G157501', '99.8', '250_mg', '18-10-2021', '01-03-2018', 'admin', '25', '', '', ''),
(228, 'Fenoxanil', 'StDr78200', 'Dr.Ehrenstorfer', 'C13498000', '121555', '98.0', '100_mg', '23-12-2018', '01-03-2018', 'admin', 'RT', '0', '', ''),
(229, 'PHENOTHRIN', 'StDr80200', 'Dr.Ehrenstorfer', 'DRE-C16040000', 'G143911', '96,8%', '100_mg', '22-08-2023', '07-05-2018', 'Ngân', '4±4', '0', '', ''),
(230, 'Propanil', 'StDr81000', 'Dr.Ehrenstorfer', '16410000', '40316', '99.0%', '250_mg', '25-03-2020', '07-05-2018', 'Ngân', '20±4', '0', '', ''),
(231, 'Tetramethrin', 'StDr80800', 'Dr.Ehrenstorfer', '17410000', '130072', '98,0 %', '100_mg', '29-07-2019', '08-05-2018', 'Ngân', '20±4', '0', '', ''),
(232, 'Cypermethrin', 'StDr81100', 'Dr.Ehrenstorfer', 'DRE-C11890000', 'G167245', '97,39 %', '100_mg', '31-01-2024', '07-05-2018', 'Ngân', '20±4', '0', '', ''),
(233, 'Carbaryl', 'StSi19600', 'Sigma', '32055-250MG', 'SZBB224XV', '', '250_mg', '10-08-2016', '25-11-2014', 'Admin', '25±5', NULL, '2', ''),
(235, 'Carbendazim', 'StDr16300', 'Dr.Ehrenstorfer', '10990000', '30108', '99.0', '250_mg', '01-04-2019', '11-09-2014', 'Admin', '20±4', NULL, '2', ''),
(236, 'Acetone', 'SoJt04500', 'JT Baker', 'aaa', '12345', '', '4_mg', '22-08-2018', '20-06-2018', 'Admin', '', NULL, '2', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bvtv_ketqua`
--

CREATE TABLE `bvtv_ketqua` (
  `ketqua_id` int(11) NOT NULL,
  `chuan_id` int(11) NOT NULL,
  `hc_pha_id` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `s_chuan1` float NOT NULL,
  `s_chuan2` float NOT NULL,
  `m_mau` float NOT NULL,
  `v_mau` float NOT NULL,
  `s_mau` float NOT NULL,
  `hl_dk` int(11) NOT NULL,
  `dk_donvi` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ngay_tao` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `kq_phantram` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `bvtv_ketqua`
--

INSERT INTO `bvtv_ketqua` (`ketqua_id`, `chuan_id`, `hc_pha_id`, `s_chuan1`, `s_chuan2`, `m_mau`, `v_mau`, `s_mau`, `hl_dk`, `dk_donvi`, `ngay_tao`, `kq_phantram`) VALUES
(4, 11, '2,4', 12, 12, 12, 12, 12, 99, '%(w/w)', '18-06-2018', 100);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bvtv_ketqua_chando`
--

CREATE TABLE `bvtv_ketqua_chando` (
  `ketqua_id` int(11) NOT NULL,
  `chuan_id` int(11) NOT NULL,
  `hc_pha_id` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `v_reagent` float NOT NULL,
  `c_reagent` float NOT NULL,
  `m_mau` float NOT NULL,
  `v_blank` float DEFAULT NULL,
  `hl_dk` int(11) NOT NULL,
  `dk_donvi` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ngay_tao` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `kq_phantram` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `bvtv_ketqua_chando`
--

INSERT INTO `bvtv_ketqua_chando` (`ketqua_id`, `chuan_id`, `hc_pha_id`, `v_reagent`, `c_reagent`, `m_mau`, `v_blank`, `hl_dk`, `dk_donvi`, `ngay_tao`, `kq_phantram`) VALUES
(4, 11, '2,4', 12, 12, 12, 12, 99, '%(w/w)', '18-06-2018', 100);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bvtv_mau`
--

CREATE TABLE `bvtv_mau` (
  `mau_id` int(11) NOT NULL,
  `chitieu` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `type` int(2) NOT NULL DEFAULT '0',
  `ngaynhan` date DEFAULT NULL,
  `ngaytra` date NOT NULL,
  `trangthai` int(11) DEFAULT '0' COMMENT '0:moi nhan, 1: hoan thanh, 2:dangthuchien, 3:trehan',
  `ketqua` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'id cua kq',
  `donvi` varchar(100) COLLATE utf8_unicode_ci DEFAULT '%',
  `dang` int(11) DEFAULT NULL COMMENT 'dạng nền mẫu',
  `luutru` int(1) DEFAULT NULL COMMENT 'dk bao quan',
  `note` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bvtv_mau_dangnen`
--

CREATE TABLE `bvtv_mau_dangnen` (
  `id` int(11) NOT NULL,
  `kyhieu` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `mota` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `bvtv_mau_dangnen`
--

INSERT INTO `bvtv_mau_dangnen` (`id`, `kyhieu`, `mota`) VALUES
(1, 'WP', 'Wettable powder'),
(2, 'EC', 'Emulsible Concentrated');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bvtv_mau_type`
--

CREATE TABLE `bvtv_mau_type` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `bvtv_mau_type`
--

INSERT INTO `bvtv_mau_type` (`id`, `name`) VALUES
(1, 'Mẫu khách hàng'),
(2, 'PT'),
(3, 'SSLP');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bvtv_phuongphap`
--

CREATE TABLE `bvtv_phuongphap` (
  `pp_id` int(11) NOT NULL,
  `chitieu` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `maso_sop` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `phien_ban` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `hieu_luc` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ten_sop` text COLLATE utf8_unicode_ci NOT NULL,
  `nen_mau` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `hoachat` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `form_element` text COLLATE utf8_unicode_ci,
  `17025` int(11) NOT NULL DEFAULT '0',
  `chidinh` int(11) NOT NULL DEFAULT '0',
  `pp_thu` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `note` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `bvtv_phuongphap`
--

INSERT INTO `bvtv_phuongphap` (`pp_id`, `chitieu`, `maso_sop`, `phien_ban`, `hieu_luc`, `ten_sop`, `nen_mau`, `hoachat`, `form_element`, `17025`, `chidinh`, `pp_thu`, `note`) VALUES
(1, 'Azoxystrobin', '38', '02', '01-10-2017', 'Thuốc bảo vệ thực vật chứa hoạt chất Azoxystrobin - Xác định hàm lượng hoạt chất', '1,2', '1,2,g_12', NULL, 1, 0, 'GC-FID', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bvtv_pphoachat`
--

CREATE TABLE `bvtv_pphoachat` (
  `id_pp` int(11) NOT NULL,
  `ten_pp` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ma_hc` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `goc1` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `goc2` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `goc3` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `goc4` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `hc_pha1` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `hc_pha2` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `hc_pha3` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `hc_pha4` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sol1` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sol2` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sol3` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sol4` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `note` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='phuong phap pha hoa chat';

--
-- Đang đổ dữ liệu cho bảng `bvtv_pphoachat`
--

INSERT INTO `bvtv_pphoachat` (`id_pp`, `ten_pp`, `ma_hc`, `goc1`, `goc2`, `goc3`, `goc4`, `hc_pha1`, `hc_pha2`, `hc_pha3`, `hc_pha4`, `sol1`, `sol2`, `sol3`, `sol4`, `note`) VALUES
(1, 'dop 2g/l', 'StVi3801', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2', NULL, NULL, NULL, NULL),
(2, 'Azoxystrobin 1g/l', 'StSi17501', '3', NULL, NULL, NULL, '1', NULL, NULL, NULL, '2', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bvtv_tailieu_thamkhao`
--

CREATE TABLE `bvtv_tailieu_thamkhao` (
  `tk_id` int(11) NOT NULL,
  `tk_code` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `tk_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tk_sop` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tk_chidinh` int(11) DEFAULT '0',
  `tk_phuongphap` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tk_hoaly` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tk_hoatchat` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tk_link` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `tk_create` date DEFAULT NULL,
  `tk_user` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tk_note` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `bvtv_tailieu_thamkhao`
--

INSERT INTO `bvtv_tailieu_thamkhao` (`tk_id`, `tk_code`, `tk_name`, `tk_sop`, `tk_chidinh`, `tk_phuongphap`, `tk_hoaly`, `tk_hoatchat`, `tk_link`, `tk_create`, `tk_user`, `tk_note`) VALUES
(1, 'TCVN-9475:2012', 'Thuốc bvtv chứa hoạt chất Abamectin - Yêu cầu kỹ thuật và phương pháp thử', 'V21-137', 0, 'HPLC', '', 'Abamectin', 'TCVN-9475_2012-Abamectin', '2018-02-08', 'admin', ''),
(2, 'TC-07_2001', 'Thuốc trừ sâu chứa hoạt chất Acetamiprid - Yêu cầu kỹ thuật và phương pháp thử', 'V21-170', 0, 'HPLC', '', 'Acetamiprid', 'TC-07_2001-CL-Acetamiprid', '2018-02-08', 'admin', ''),
(3, 'TC- 08_2003', 'Thuốc trừ cỏ chứa hoạt chất Acetochlor - Yêu cầu kỹ thuật và phương pháp thử', '', 0, 'HPLC', '', 'Acetochlor', 'TC- 08_2003-CL-Acetochlor', '2018-02-08', 'admin', ''),
(4, 'TC-75_97', 'Thuốc trừ cỏ chứa hoạt chất Alachlor - Yêu cầu kỹ thuật và phương pháp thử', '', 0, 'GC-FID', '', 'Alachlor', 'TC-75_97-CL-Alachlor', '2018-02-08', 'admin', ''),
(5, 'TC-08_2005', 'Thuốc trừ cỏ chứa hoạt chất Albendazole - Yêu cầu kỹ thuật và phương pháp thử', '', 0, 'HPLC', '', 'Albendazole', 'TC-08_2005-CL-Albendazole', '2018-02-08', 'admin', ''),
(6, 'TCCS-36_2012', 'Thuốc bvtv chứa hoạt chất Ametryn - Yêu cầu kỹ thuật và phương pháp thử', '', 0, 'GC-FID', '', 'Ametryn', 'TCCS-36_2012-BVTV-Ametryn', '2018-02-08', 'admin', ''),
(7, 'TC-06_2001', 'Thuốc bvtv chứa hoạt chất Amitraz - Yêu cầu kỹ thuật và phương pháp thử', '', 0, 'GC-FID', '', 'Amitraz', 'TC-06_2001-CL-Amitraz', '2018-02-08', 'admin', ''),
(8, 'TCVN-10161_2013', 'Thuốc bvtv chứa hoạt chất Atrazine - Yêu cầu kỹ thuật và phương pháp thử', 'V21-179', 0, 'GC-FID', '', 'Atrazine', 'TCVN-10161_2013-Atrazine', '2018-02-08', 'admin', ''),
(9, 'TCVN-8383_2010', 'Thuốc bvtv chứa hoạt chất Azadirachtin - Yêu cầu kỹ thuật và phương pháp thử', '', 0, 'HPLC', '', 'Azadirachtin', 'TCVN-8383_2010-Azadirachtin', '2018-02-08', 'admin', ''),
(10, 'TC-02_2006', 'Thuốc trừ bệnh chứa hoạt chất Azoxystrobin - Yêu cầu kỹ thuật và phương pháp thử', 'V21-175', 0, 'GC-FID', '', 'Azoxystrobin', 'TC-02_2006-CL-Azoxystrobin', '2018-02-08', 'admin', ''),
(11, 'TCCS-09_2010', 'Thuốc bvtv chứa vi khuẩn Bacillus thuringgiensis  - Yêu cầu kỹ thuật và phương pháp thử', '', 0, 'VS', '', 'Bacillus thuringgiensis', 'TCCS-09_2010-BVTV-Bacillus thuringgiensis', '2018-02-08', 'admin', ''),
(12, 'TCVN-2741_1986', 'Thuốc trừ sâu basudin 10% dạng hạt', '', 0, 'CĐ', 'Tỉ lệ hạt, Độ rã trong nước', 'Basudin', 'TCVN-2741_1986-Basudin', '2018-02-08', 'admin', ''),
(13, 'TCCS-40_2012', 'Thuốc bvtv chứa nấm Beauveria bassiana Vuill.  - Yêu cầu kỹ thuật và phương pháp thử', '', 0, 'VS', '', 'Beauveria bassiana Vuill', 'TCCS-40_2012-BVTV-Beauveria bassiana Vuill', '2018-02-08', 'admin', ''),
(14, 'TC-109_2000', 'Thuốc trừ cỏ chứa hoạt chất Bensulfuron methyl - Yêu cầu kỹ thuật và phương pháp thử', '', 0, 'HPLC', '', 'Bensulfuron methyl', 'TC-109_2000-CL-Bensulfuron methyl', '2018-02-08', 'admin', ''),
(15, 'TC-06_2003', 'Thuốc trừ cỏ chứa hoạt chất Bentazone - Yêu cầu kỹ thuật và phương pháp thử', '', 0, 'HPLC', '', 'Bentazone', 'TC-06_2003-CL-Bentazone', '2018-02-08', 'admin', ''),
(16, 'TCCS-37_2012', 'Thuốc bvtv chứa hoạt chất Bismerthiazol (saikuzuo) - Yêu cầu kỹ thuật và phương pháp thử', '', 0, 'CĐ', '', 'Bismerthiazol', 'TCCS-37_2012-BVTV-Bismerthiazol', '2018-02-08', 'admin', ''),
(17, 'TC-115_2000', 'Thuốc trừ cỏ chứa hoạt chất Bispyribac-sodium - Yêu cầu kỹ thuật và phương pháp thử', '', 0, 'HPLC', '', 'Bispyribac sodium', 'TC-115_2000-CL-Bispyribac sodium', '2018-02-08', 'admin', ''),
(18, 'TC-90_98', 'Thuốc trừ chuột chứa hoạt chất brodifacoum - yêu cầu kỹ thuật và phương pháp thử', '', 0, 'HPLC', '', 'Brodifacoum', 'TC-90_98 – CL-Brodifacoum', '2018-02-08', 'admin', ''),
(19, 'TC-100_99', 'Thuốc trừ chuột chứa hoạt chất bromadiolone - yêu cầu kỹ thuật và phương pháp thử', '', 0, 'HPLC', '', 'Bromadiolone', 'TC-100_99 - CL-Bromadiolone', '2018-02-08', 'admin', ''),
(20, 'TCVN-9477_2012', 'Thuốc BVTV chứa hoạt chất buprofezin - yêu cầu kỹ thuật và phương pháp thử', 'V21-178', 0, 'GC-FID, HPLC', '', 'Buprofezin', 'TCVN-9477_2012-Buprofezin', '2018-02-08', 'admin', ''),
(21, 'TC-08_2006', 'Thuốc trừ cỏ chứa hoạt chất butachlor - yêu cầu kỹ thuật và phương pháp thử', 'V21-177', 0, 'GC-FID', '', 'Butachlor', 'TC-08_2006-CL-Butachlor', '2018-02-08', 'admin', ''),
(22, 'TCCS-72_2013', 'Thuốc BVTV chứa hoạt chất carbaryl - yêu cầu kỹ thuật và phương pháp thử', '', 1, 'HPLC', '', 'Carbaryl', 'TCCS-72_2013-BVTV-Carbaryl', '2018-02-08', 'admin', ''),
(23, 'TCCS-10_2007', 'Thuốc BVTV chứa hoạt chất carbendazim -yêu cầu kỹ thuật và phương pháp thử', 'V21-91', 1, 'HPLC', '', 'Carbendazim', 'TCCS-10_2007-CL-Carbendazim', '2018-02-08', 'admin', ''),
(24, 'TCCS-65_2013', 'Thuốc BVTV chứa hoạt chất carbosulfan - yêu cầu kỹ thuật và phương pháp thử', '', 0, 'GC-FID, HPLC', '', 'Carbosulfan', 'TCCS-65_2013-BVTV-Carbosulfan', '2018-02-08', 'admin', ''),
(25, 'TCVN-8380_2010', 'Thuốc trừ sâu chứa hoạt chất cartap hydrochloride - yêu cầu kỹ thuật và phương pháp thử', '', 0, 'CĐ', '', 'Cartap hydrochloride', 'TCVN-8380_2010-Cartap hydrochloride', '2018-02-08', 'admin', ''),
(26, 'TC-07_2002', 'Thuốc trừ sâu chứa hoạt chất chlorfenapyr - yêu cầu kỹ thuật và phương pháp thử', '', 0, 'HPLC', '', 'Chlorfenapyr', 'TC-07_2002-CL-Chlorfenapyr', '2018-02-08', 'admin', ''),
(27, 'TCCS-10_2010', 'Thuốc BVTV chứa hoạt chất chlorantraniliprole - yêu cầu kỹ thuật và phương pháp thử', '', 0, 'HPLC', '', 'Chlorantraniliprole', 'TCCS-10_2010-BVTV-Chlorantraniliprole', '2018-02-08', 'admin', ''),
(28, 'TCCS-30_2011', 'Thuốc BVTV chứa hoạt chất chlorpyrifos ethyl- yêu cầu kỹ thuật và phương pháp thử', 'V21-92', 1, 'GC-FID, HPLC', '', 'Chlorpyrifos ethyl', 'TCCS-30_2011-BVTV-Chlorpyrifos ethyl', '2018-02-08', 'admin', ''),
(29, 'TC-09_2006', 'Thuốc trừ sâu chứa hoạt chất chromafenozide - yêu cầu kỹ thuật và phương pháp thử', '', 0, 'HPLC', '', 'Chromafenozide', 'TC-09_2006-CL-Chromafenozide', '2018-02-08', 'admin', ''),
(30, 'TC-02_2002', 'Thuốc trừ cỏ chứa hoạt chất clefoxydim - yêu cầu kỹ thuật và phương pháp thử', '', 0, 'HPLC', '', 'Clefoxydim', 'TC-02_2002-CL-Clefoxydim', '2018-02-08', 'admin', ''),
(31, 'TC-10_2006', 'Thuốc trừ sâu chứa hoạt chất clothianidin - yêu cầu kỹ thuật và phương pháp thử', '', 0, 'HPLC', '', 'Clothianidin', 'TC-10_2006-CL-Clothianidin', '2018-02-08', 'admin', ''),
(32, 'TC-05_2007', 'Thuốc trừ bệnh chứa hoạt chất copper citrate -yêu cầu kỹ thuật và phương pháp thử', '', 0, 'HPLC', '', 'Copper citrate', 'TC-05_2007-CL-Copper citrate', '2018-02-08', 'admin', ''),
(33, 'TCVN-10157_2013', 'Thuốc BVTV chứa hoạt chất copper hydroxide -yêu cầu kỹ thuật và phương pháp thử', '', 0, 'CĐ', 'Độ bám dính', 'Copper hydrocide', 'TCVN-10157_2013-Copper hydrocide', '2018-02-08', 'admin', ''),
(34, 'TCVN-10158_2013', 'Thuốc BVTV chứa hoạt chất copper oxychloride -yêu cầu kỹ thuật và phương pháp thử', '', 0, 'CĐ', '', 'Copper oxychloride', 'TCVN-10158_2013-Copper oxychloride', '2018-02-08', 'admin', ''),
(35, 'TCVN-10159_2013', 'Thuốc BVTV chứa hoạt chất copper sulfate -yêu cầu kỹ thuật và phương pháp thử', '', 0, 'CĐ', '', 'Copper sulfate', 'TCVN-10159_2013-Copper sulfate', '2018-02-08', 'admin', ''),
(36, 'TCVN-10160_2013', 'Thuốc BVTV chứa hoạt chất cuprous oxide -yêu cầu kỹ thuật và phương pháp thử', '', 0, 'CĐ', '', 'Copper oxide', 'TCVN-10160_2013-Copper oxide', '2018-02-08', 'admin', ''),
(37, 'TC-113_2000', 'Thuốc trừ cỏ chứa hoạt chất cyclosulfamuron - yêu cầu kỹ thuật và phương pháp thử', '', 0, 'HPLC', '', 'Cyclosulfamuron', 'TC-113_2000-CL-Cyclosulfamuron', '2018-02-08', 'admin', ''),
(38, 'TC-94_98', 'Thuốc trừ sâu chứa hoạt chất cyfluthrin - yêu cầu kỹ thuật và phương pháp thử', '', 1, 'GC-FID', '', 'Cyfluthrin', 'TC-94_98- CL-Cyfluthrin', '2018-02-08', 'admin', ''),
(39, 'TCCS-64_2013', 'Thuốc BVTV chứa hoạt chất beta cyfluthrin - yêu cầu kỹ thuật và phương pháp thử', '', 0, 'GC-FID', '', 'Cyfluthrin beta', 'TCCS-64_2013-BVTV-Cyfluthrin beta', '2018-02-08', 'admin', ''),
(40, 'TC-01_2004', 'Thuốc trừ cỏ chứa hoạt chất cyhalofop butyl - yêu cầu kỹ thuật và phương pháp thử', 'V21-173', 0, 'GC-FID', '', 'Cyhalofop butyl', 'TC-01_2004-CL-Cyhalofop butyl', '2018-02-08', 'admin', ''),
(41, 'TC-01_2005', 'Thuốc trừ sâu chứa hoạt chất gamma cyhalothrin - yêu cầu kỹ thuật và phương pháp thử', '', 0, 'GC-FID', '', 'Gamma Cyhalothrin ', 'TC-01_2005-CL-Gamma Cyhalothrin ', '2018-02-08', 'admin', ''),
(42, 'TC-07_2007', 'Thuốc trừ sâu chứa hoạt chất lambda cyhalothrin - yêu cầu kỹ thuật và phương pháp thử', '', 0, 'GC-FID', '', 'Lambda Cyhalothrin', 'TC-07_2007-CL-Lambda Cyhalothrin', '2018-02-08', 'admin', ''),
(43, 'TC-09_2005', 'Thuốc trừ bệnh chứa hoạt chất cymoxanil -yêu cầu kỹ thuật và phương pháp thử', 'V21-168', 0, 'HPLC', '', 'Cymoxanil', 'TC-09_2005-CL-Cymoxanil', '2018-02-08', 'admin', ''),
(44, 'TCVN-8143_2009', 'Thuốc BVTV - Xác định hàm lượng hoạt chât cypermethrin', '', 1, 'GC-FID', '', 'Cypermethrin', 'TCVN-8143_2009-Cypermethrin', '2018-02-08', 'admin', ''),
(45, 'TCCS-06_2006', 'Thuốc trừ sâu chứa hoạt chất cypermethrin - yêu cầu kỹ thuật và phương pháp thử', 'V21-94', 1, 'GC-FID', '', 'Cypermethrin', 'TCCS-06_2006-Cypermethrin', '2018-02-08', 'admin', ''),
(46, 'TCVN-8979_2011', 'Thuốc BVTV chứa hoạt chất alpha cypermethrin - yêu cầu kỹ thuật và phương pháp thử', '', 0, 'GC-FID', '', 'Alpha Cypermethrin', 'TCVN-8979_2011-Alpha Cypermethrin', '2018-02-08', 'admin', ''),
(47, 'TC-08_2004', 'Thuốc BVTV chứa hoạt chất beta cypermethrin - yêu cầu kỹ thuật và phương pháp thử', '', 0, 'GC-FID', '', 'Beta Cypermethrin', 'TC-08_2004-CL-Beta Cypermethrin', '2018-02-08', 'admin', ''),
(48, 'TC-04_2002', 'Thuốc trừ bệnh chứa hoạt chất cyproconazole -yêu cầu kỹ thuật và phương pháp thử', 'V21-123', 0, 'GC-FID', '', 'Cyproconazole', 'TC-04_2002-CL-Cyproconazole', '2018-02-08', 'admin', ''),
(49, 'TC-08_2001', 'Thuốc trừ sâu chứa hoạt chất cyromazine - yêu cầu kỹ thuật và phương pháp thử', '', 0, 'HPLC', '', 'Cyromazine', 'TC-08_2001-CL-Cyromazine', '2018-02-08', 'admin', ''),
(50, 'TC-20_89', 'Thuốc trừ cỏ dalapon 85% bột tan trong nước', '', 0, 'CĐ', '', 'Dalapon', 'TC-20_89-CL-Dalapon', '2018-02-08', 'admin', ''),
(51, 'TCVN-8750_2011', 'Thuốc BVTV chứa hoạt chất deltamethrin - yêu cầu kỹ thuật và phương pháp thử', '', 0, 'GC-FID', 'Độ bụi', 'Deltamethrin', 'TCVN-8750_2011-Deltamethrin', '2018-02-08', 'admin', ''),
(52, 'TCCS-38_2012', 'Thuốc BVTV chứa hoạt chất diafenthiuron - yêu cầu kỹ thuật và phương pháp thử', '', 0, 'HPLC', '', 'Diafenthiuron', 'TCCS-38_2012-BVTV-Diafenthiuron', '2018-02-08', 'admin', ''),
(53, 'TCVN-9483_2012', 'Thuốc BVTV chứa hoạt chất diazinon - yêu cầu kỹ thuật và phương pháp thử', '', 0, 'GC-FID', '', 'Diazinon', 'TCVN-9483_2012-Diazinon', '2018-02-08', 'admin', ''),
(54, 'TC-03_2003', 'Thuốc trừ bệnh chứa hoạt chất difenoconazole -yêu cầu kỹ thuật và phương pháp thử', 'V21-136', 0, 'GC-FID', '', 'Difenoconazole', 'TC-03_2003-CL-Difenoconazole', '2018-02-08', 'admin', ''),
(55, 'TCVN-8382_2010', 'Thuốc BVTV chứa hoạt chất dimethoate - yêu cầu kỹ thuật và phương pháp thử', '', 0, 'GC-FID, HPLC', 'Độ bền BQ 0oC, Độ bền nhũ tương', 'Dimethoate', 'TCVN-8382_2010-Dimethoate', '2018-02-08', 'admin', ''),
(56, 'TC-11_2006', 'Thuốc trừ bệnh chứa hoạt chất dimethomorph - yêu cầu kỹ thuật và phương pháp thử', '', 0, 'HPLC', '', 'Dimethomorph', 'TC-11_2006-Dimethomorph', '2018-02-08', 'admin', ''),
(57, 'TC-03_2002', 'Thuốc trừ bệnh chứa hoạt chất diniconazole - yêu cầu kỹ thuật và phương pháp thử', '', 0, 'HPLC', '', 'Diniconazole', 'TC-03_2002-CL-Diniconazole', '2018-02-08', 'admin', ''),
(58, 'TC-12_06', 'Thuốc trừ sâu chứa hoạt chất dinotefuran - yêu cầu kỹ thuật và phương pháp thử', '', 0, 'HPLC', '', 'Dinotefuran', 'TC-12_06-CL-Dinotefuran', '2018-02-08', 'admin', ''),
(59, 'TC-96_98', 'Thuốc trừ cỏ chứa hoạt chất diuron - yêu cầu kỹ thuật và phương pháp thử', '', 0, 'HPLC', '', 'Diuron', 'TC-96_98-CL-Diuron', '2018-02-08', 'admin', ''),
(60, 'TC-12_2007', 'Thuốc trừ bệnh chứa hoạt chất edifenphos - yêu cầu kỹ thuật và phương pháp thử', '', 0, 'GC-FID', '', 'Edifenphos', 'TC-12_2007-Edifenphos', '2018-02-08', 'admin', ''),
(61, 'TCCS-66_2013', 'Thuốc BVTV chứa hoạt chất emamectin benzoate - yêu cầu kỹ thuật và phương pháp thử', 'V21-138', 0, 'HPLC', '', 'Emamectin Benzoate', 'TCCS-66_2013-BVTV-Emamectin Benzoate', '2018-02-08', 'admin', ''),
(62, 'TC-05_2006', 'Thuốc trừ bệnh chứa hoạt chất epoxiconazole - yêu cầu kỹ thuật và phương pháp thử', '', 0, 'GC-FID', '', 'Epoxiconazole', 'TC-05_2006-CL-Epoxiconazole', '2018-02-08', 'admin', ''),
(63, 'TC-01_2008', 'Thuốc trừ sâu chứa hoạt chất esfenvalerate - yêu cầu kỹ thuật và phương pháp thử', '', 0, 'GC-FID', '', 'Esfenvalerate', 'TC-01_2008-Esfenvalerate', '2018-02-08', 'admin', ''),
(64, 'TCCS-12_2010', 'Thuốc BVTV chứa hoạt chất ethaboxam -yêu cầu kỹ thuật và phương pháp thử', '', 0, 'HPLC', '', 'Ethaboxam', 'TCCS-12_2010-BVTV-Ethaboxam', '2018-02-08', 'admin', ''),
(65, 'TC-01_2007', 'Thuốc trừ sâu chứa hoạt chất ethiprole - yêu cầu kỹ thuật và phương pháp thử', '', 0, 'HPLC', '', 'Ethiprole', 'TC-01_2007-Ethiprole', '2018-02-08', 'admin', ''),
(66, 'TC-93_98', 'Thuốc trừ cỏ chứa hoạt chất ethoxysulfuron - yêu cầu kỹ thuật và phương pháp thử', '', 0, 'HPLC', '', 'Ethoxysulfuron', 'TC-93_98-CL-Ethoxysulfuron', '2018-02-08', 'admin', ''),
(67, 'TCCS-11_2010', 'Thuốc BVTV chứa hoạt chất fenbuconazole -yêu cầu kỹ thuật và phương pháp thử', '', 0, 'GC-FID', '', 'Fenbuconazole', 'TCCS-11_2010-BVTV-Fenbuconazole', '2018-02-08', 'admin', ''),
(68, 'TC-11_2007', 'Thuốc trừ sâu chứa hoạt chất fenitrothion - yêu cầu kỹ thuật và phương pháp thử', '', 1, 'GC-FID', '', 'Fenitrothion', 'TC-11_2007-CL-Fenitrothion', '2018-02-08', 'admin', ''),
(69, 'TCVN-8983_2011', 'Thuốc BVTV chứa hoạt chất fenobucarb - yêu cầu kỹ thuật và phương pháp thử', '', 1, 'GC-FID, HPLC', '', 'Fenobucarb', 'TCVN-8983_2011-Fenobucarb', '2018-02-08', 'admin', ''),
(70, 'TCCS-03_2009', 'Thuốc BVTV chứa hoạt chất fenoxanil -yêu cầu kỹ thuật và phương pháp thử', '', 0, 'GC-FID', '', 'Fenoxanil', 'TCCS-03_2009-BVTV-Fenoxanil', '2018-02-08', 'admin', ''),
(71, 'TC-01_2002', 'Thuốc trừ cỏ chứa hoạt chất fenoxapro-P-ethyl - yêu cầu kỹ thuật và phương pháp thử', '', 0, 'HPLC', '', 'Fenoxaprop_P_ethyl', 'TC-01_2002-CL-Fenoxaprop-P-ethyl', '2018-02-08', 'admin', ''),
(72, 'TC-89_98', 'Thuốc trừ sâu chứa hoạt chất fenpropathrin - yêu cầu kỹ thuật và phương pháp thử', '', 1, 'GC-FID', '', 'Fenpropathrin', 'TC-89_98-CL-Fenpropathrin', '2018-02-08', 'admin', ''),
(73, 'TC-04_2006', 'Thuốc trừ sâu chứa hoạt chất fenpyroxymate - yêu cầu kỹ thuật và phương pháp thử', '', 0, 'HPLC', '', 'Fenpyroximate', 'TC-04_2006-CL-Fenpyroximate', '2018-02-08', 'admin', ''),
(74, 'TC-13_2007', 'Thuốc trừ sâu chứa hoạt chất fenvalerate - yêu cầu kỹ thuật và phương pháp thử', '', 1, 'GC-FID', '', 'Fenvalerate', 'TC-13_2007-CL-Fenvalerate', '2018-02-08', 'admin', ''),
(75, 'TC-05_2002', 'Thuốc trừ sâu chứa hoạt chất fipronil - yêu cầu kỹ thuật và phương pháp thử', 'V21-98', 1, 'HPLC', '', 'Fipronil', 'TC-05_2002–CL-Fipronil', '2018-02-08', 'admin', ''),
(76, 'TC-01_2001', 'Thuốc trừ cỏ chứa hoạt chất fluazifop butyl - yêu cầu kỹ thuật và phương pháp thử', '', 0, 'GC-FID', '', 'Fluazifob butyl', 'TC-01_2001-CL-Fluazifob butyl', '2018-02-08', 'admin', ''),
(77, 'TCCS-42_2012', 'Thuốc BVTV chứa hoạt chất flubendiamide - yêu cầu kỹ thuật và phương pháp thử', '', 0, 'HPLC', '', 'Flubendiamide', 'TCCS-42_2012-BVTV-Flubendiamide', '2018-02-08', 'admin', ''),
(78, 'TCVN-8386_2010', 'Thuốc BVTV chứa hoạt chất flusilazole -yêu cầu kỹ thuật và phương pháp thử', 'V21-99', 1, 'GC-FID', '', 'Flusilazole', 'TCVN-8386_2010-Flusilazole', '2018-02-08', 'admin', ''),
(79, 'TC-04_2001', 'Thuốc trừ nấm bệnh chứa hoạt chất folpet -yêu cầu kỹ thuật và phương pháp thử', '', 0, 'HPLC', '', 'Folpet', 'TC-04_2001-CL-Folpet', '2018-02-08', 'admin', ''),
(80, 'TC-05_2004', 'Thuốc trừ nấm bệnh chứa hoạt chất fosetyl-aluminium -yêu cầu kỹ thuật và phương pháp thử', '', 0, 'CĐ', '', 'Fosetyl aluminium', 'TC-05_2004-CL-Fosetyl aluminium', '2018-02-08', 'admin', ''),
(81, 'TC-10_2002', 'Thuốc kích thích chứa hoạt chất gibberellic acid - yêu cầu kỹ thuật và phương pháp thử', '', 0, 'HPLC', '', 'Gibberellic acid', 'TC-10_2002-CL-Gibberellic acid', '2018-02-08', 'admin', ''),
(82, 'TCCS-01_2009', 'Thuốc BVTV chứa hoạt chất glyphosate - yêu cầu kỹ thuật và phương pháp thử', '', 0, 'HPLC', '', 'Glyphosate', 'TCCS-01_2009-BVTV-Glyphosate', '2018-02-08', 'admin', ''),
(83, 'TCVN-8381_2010', 'Thuốc BVTV chứa hoạt chất hexaconazole -yêu cầu kỹ thuật và phương pháp thử', 'V21-169', 0, 'HPLC', '', 'Hexaconazole', 'TCVN-8381_2010-Hexaconazole', '2018-02-08', 'admin', ''),
(84, 'TCCS-73_2013', 'Thuốc BVTV chứa hoạt chất hymexazole -yêu cầu kỹ thuật và phương pháp thử', '', 0, 'HPLC', '', 'Hymexazole', 'TCCS-73_2013-BVTV-Hymexazole', '2018-02-08', 'admin', ''),
(85, 'TC-03_2004', 'Thuốc trừ cỏ chứa hoạt chất imazapic - yêu cầu kỹ thuật và phương pháp thử', '', 0, 'HPLC', '', 'Imazapic', 'TC-03_2004-CL-Imazapic', '2018-02-08', 'admin', ''),
(86, 'TC-02_2004', 'Thuốc trừ cỏ chứa hoạt chất imazosulfuron - yêu cầu kỹ thuật và phương pháp thử', '', 0, 'HPLC', '', 'Imazosulfuron', 'TC-02_2004-CL-Imazosulfuron', '2018-02-08', 'admin', ''),
(87, 'TC-07_2006', 'Thuốc trừ sâu chứa hoạt chất imidacloprid - yêu cầu kỹ thuật và phương pháp thử', '', 0, 'HPLC', '', 'Imidacloprid', 'TC-07_2006-CL-Imidacloprid', '2018-02-08', 'admin', ''),
(88, 'TC-03_2005', 'Thuốc trừ sâu chứa hoạt chất indoxacarb - yêu cầu kỹ thuật và phương pháp thử', '', 0, 'HPLC', '', 'Indoxacarb', 'TC-03_2005-CL-Indoxacarb', '2018-02-08', 'admin', ''),
(89, 'TC-03_2007', 'Thuốc trừ cỏ chứa hoạt chất iodosulfuron methyl sodium - yêu cầu kỹ thuật và phương pháp thử', '', 0, 'HPLC', '', 'Iodosulfuron methyl sodium', 'TC-03_2007-CL-Iodosulfuron methyl sodium', '2018-02-08', 'admin', ''),
(90, 'TC-74_97', 'Thuốc BVTV chứa hoạt chất iprodione -yêu cầu kỹ thuật và phương pháp thử', '', 0, 'HPLC', '', 'Iprodione', 'TC-74_97-CL-Iprodione', '2018-02-08', 'admin', ''),
(91, 'TC-05_2003', 'Thuốc trừ nấm bệnh chứa hoạt chất iprovalicarb - yêu cầu kỹ thuật và phương pháp thử', '', 0, 'HPLC', '', 'Iprovalicarb', 'TC-05_2003-CL-Iprovalicarb', '2018-02-08', 'admin', ''),
(92, 'TC-31_89', 'Thuốc trừ sâu mipcin 20% dạng nhũ dầu', '', 0, 'HPLC', '', 'Isoprocarb', 'TC-31_89-Isoprocarb', '2018-02-08', 'admin', ''),
(93, 'TCVN-8749_2011', 'Thuốc BVTV chứa hoạt chất isoprothiolane -yêu cầu kỹ thuật và phương pháp thử', 'V21-122', 0, 'GC-FID, HPLC', '', 'Isoprothiolane', 'TCVN-8749_2011-Isoprothiolane', '2018-02-08', 'admin', ''),
(94, 'TCVN-8387_2010', 'Thuốc BVTV chứa hoạt chất isoxaflutole -yêu cầu kỹ thuật và phương pháp thử', '', 0, 'HPLC', '', 'Isoxaflutole', 'TCVN-8387_2010-Isoxaflutole', '2018-02-08', 'admin', ''),
(95, 'TCCS-21_2011', 'Thuốc BVTV chứa hoạt chất kasugamycin -yêu cầu kỹ thuật và phương pháp thử', '', 0, 'HPLC', '', 'Kasugamycin', 'TCCS-21_2011-BVTV-Kasugamycin', '2018-02-08', 'admin', ''),
(96, 'TC-06_2002', 'Thuốc trừ sâu chứa hoạt chất lufenuron - yêu cầu kỹ thuật và phương pháp thử', '', 0, 'HPLC', '', 'Lufenuron', 'TC-06_2002-CL-Lufenuron', '2018-02-08', 'admin', ''),
(97, 'TCCS-02_2009', 'Thuốc BVTV chứa hoạt chất mancozeb -yêu cầu kỹ thuật và phương pháp thử', '', 0, 'CĐ', '', 'Mancozeb', 'TCCS-02_2009-BVTV-Mancozeb', '2018-02-08', 'admin', ''),
(98, 'TC-30_89', 'Thuốc trừ cỏ MCPA 80% dạng bột tan trong nước', '', 0, 'CĐ', '', 'MCPA', 'TC-30_89-MCPA', '2018-02-08', 'admin', ''),
(99, 'TC-04_2004', 'Thuốc trừ cỏ chứa hoạt chất mefenacet - yêu cầu kỹ thuật và phương pháp thử', '', 0, 'HPLC', '', 'Mefenacet', 'TC-04_2004-CL-Mefenacet', '2018-02-08', 'admin', ''),
(100, 'TCCS-4_2009', 'Thuốc BVTV chứa hoạt chất metalaxyl -yêu cầu kỹ thuật và phương pháp thử', 'V21-172', 0, 'GC-FID', '', 'Metalaxyl', 'TCCS-4_2009-BVTV-Metalaxyl', '2018-02-08', 'admin', ''),
(101, 'TCCS-06_2009', 'Thuốc BVTV chứa hoạt chất metalaxyl-M -yêu cầu kỹ thuật và phương pháp thử', '', 0, 'GC-FID', '', 'Metalaxyl_M', 'TCCS-06_2009-BVTV-Metalaxyl-M', '2018-02-08', 'admin', ''),
(102, 'TC-09_2004', 'Thuốc trừ ốc sên chứa hoạt chất metaldehyde - yêu cầu kỹ thuật và phương pháp thử', 'V21-124', 0, 'GC-FID', '', 'Metaldehyde', 'TC-09_2004-CL-Metaldehyde', '2018-02-08', 'admin', ''),
(103, 'TCCS-41_2012', 'Thuốc BVTV chứa nấmMetarhizium anizopliae (Ma) - yêu cầu kỹ thuật và phương pháp thử nghiệm', '', 0, 'VS', '', 'Metarhizium anizopliae', 'TCCS-41_2012-BVTV-Metarhizium anizopliae', '2018-02-08', 'admin', ''),
(104, 'TC-95_98', 'Thuốc trừ sâu chứa hoạt chất methidathion - yêu cầu kỹ thuật và phương pháp thử', '', 0, 'GC-FID', '', 'Methidathion', 'TC-95_98-CL-Methidathion', '2018-02-08', 'admin', ''),
(105, 'TCVN-8388_2010', 'Thuốc BVTV chứa hoạt chất methomyl - yêu cầu kỹ thuật và phương pháp thử', '', 0, 'HPLC', '', 'Methomyl', 'TCVN-8388_2010-Methomyl', '2018-02-08', 'admin', ''),
(106, 'TC-13_2006', 'Thuốc trừ sâu chứa hoạt chất methoxyfenozide - yêu cầu kỹ thuật và phương pháp thử', '', 0, 'HPLC', '', 'Methoxyfenozide', 'TC-13_2006-CL-Methoxyfenozide', '2018-02-08', 'admin', ''),
(107, 'TC-04_2003', 'Thuốc trừ nấm bệnh chứa hoạt chất metiram complex-yêu cầu kỹ thuật và phương pháp thử', '', 0, 'CĐ', '', 'Metiram complex', 'TC-04_2003-CL-Metiram complex', '2018-02-08', 'admin', ''),
(108, 'TC-104_99', 'Thuốc trừ cỏ chứa hoạt chất metolachlor - yêu cầu kỹ thuật và phương pháp thử', '', 0, 'GC-FID', '', 'Metolachlor', 'TC-104_99-CL-Metolachlor', '2018-02-08', 'admin', ''),
(109, 'TCVN-8384_2010', 'Thuốc BVTV chứa hoạt chất metominostrobin-yêu cầu kỹ thuật và phương pháp thử', '', 0, 'HPLC', '', 'Metominostrobin', 'TCVN-8384_2010-Metominostrobin', '2018-02-08', 'admin', ''),
(110, 'TC-106_99', 'Thuốc trừ cỏ chứa hoạt chất metribuzin - yêu cầu kỹ thuật và phương pháp thử', '', 0, 'GC-FID', '', 'Metribuzin', 'TC-106_99-CL-Metribuzin', '2018-02-08', 'admin', ''),
(111, 'TC-103_99', 'Thuốc trừ cỏ chứa hoạt chất metsulfuron methyl - yêu cầu kỹ thuật và phương pháp thử', '', 0, 'HPLC', '', 'Metsulfuron methyl', 'TC-103_99-CL-Metsulfuron methyl', '2018-02-08', 'admin', ''),
(112, 'TCCS-43_2012', 'Thuốc BVTV chứa hoạt chất myclobutanil-yêu cầu kỹ thuật và phương pháp thử', '', 0, 'HPLC', '', 'Myclobutanil', 'TCCS-43_2012-BVTV-Myclobutanil', '2018-02-08', 'admin', ''),
(113, 'TC-32_89', 'Thuốc trừ sâu naled 90% dạng nhũ dầu', '', 0, 'CĐ', '', 'Naled', 'TC-32_89-Naled', '2018-02-08', 'admin', ''),
(114, 'TC-05_2005', 'Thuốc trừ ốc chứa hoạt chất niclosamide - yêu cầu kỹ thuật và phương pháp thử', '', 0, 'HPLC', '', 'Niclosamide', 'TC-05_2005-CL-Niclosamide', '2018-02-08', 'admin', ''),
(115, 'TCCS-7_2008', 'Thuốc BVTV chứa hoạt chất ningnanmycin-yêu cầu kỹ thuật và phương pháp thử', '', 0, 'HPLC', '', 'Ningnanmycin', 'TCCS-7_2008-BVTV-Ningnanmycin', '2018-02-08', 'admin', ''),
(116, 'TCCS-74_2013', 'Thuốc BVTV chứa hoạt chất nitenpyram-yêu cầu kỹ thuật và phương pháp thử', '', 0, 'HPLC', '', 'Nitenpyram', 'TCCS-74_2013-BVTV-Nitenpyram', '2018-02-08', 'admin', ''),
(117, 'TC-02_2007', 'Thuốc trừ sâu chứa hoạt chất novaluron - yêu cầu kỹ thuật và phương pháp thử', '', 0, 'HPLC', '', 'Novaluron', 'TC-02_2007-CL-Novaluron', '2018-02-08', 'admin', ''),
(118, 'TC-01_2006', 'Thuốc trừ cỏ chứa hoạt chất oxadiargyl - yêu cầu kỹ thuật và phương pháp thử', '', 0, 'GC-FID', '', 'Oxadiargyl', 'TC-01_2006-CL-Oxadiargyl', '2018-02-08', 'admin', ''),
(119, 'TCVN-10164_2013', 'Thuốc BVTV chứa hoạt chất oxolinic acid - yêu cầu kỹ thuật và phương pháp thử', '', 0, 'HPLC', '', 'Oxolinic acid', 'TCVN-10164_2013-Oxolinic acid', '2018-02-08', 'admin', ''),
(120, 'TC-06_2007', 'Thuốc trừ cỏ chứa hoạt chất oxyfluorfen - yêu cầu kỹ thuật và phương pháp thử', '', 0, 'GC-FID', '', 'Oxyfluorfen', 'TC-06_2007-CL-Oxyfluorfen', '2018-02-08', 'admin', ''),
(121, 'TC-14_2006', 'Thuốc kích thích sinh trưởng chứa hoạt chất paclobutrazole - yêu cầu kỹ thuật và phương pháp thử', '', 0, 'GC-FID', '', 'Paclobutrazole', 'TC-14_2006-CL-Paclobutrazole', '2018-02-08', 'admin', ''),
(122, 'TCVN-9476_2012', 'Thuốc BVTV chứa hoạt chất paraquat dichloride - yêu cầu kỹ thuật và phương pháp thử', '', 0, 'GC-FID, HPLC', '', 'Paraquat dichloride', 'TCVN-9476_2012-Paraquat dichloride', '2018-02-08', 'admin', ''),
(123, 'TCVN-9481_2012', 'Thuốc BVTV chứa hoạt chất pencycuron-yêu cầu kỹ thuật và phương pháp thử', '', 0, 'HPLC', '', 'Pencycuron', 'TCVN-9481_2012-Pencycuron', '2018-02-08', 'admin', ''),
(124, 'TC-09_2003', 'Thuốc trừ cỏ chứa hoạt chất pendimethalin - yêu cầu kỹ thuật và phương pháp thử', '', 0, 'GC-FID', '', 'Pendimethalin', 'TC-09_2003-CL-Pendimethalin', '2018-02-08', 'admin', ''),
(125, 'TC-04_2007', 'Thuốc trừ cỏ chứa hoạt chất penoxsulam - yêu cầu kỹ thuật và phương pháp thử', '', 0, 'HPLC', '', 'Penoxsulam', 'TC-04_2007-CL-Penoxsulam', '2018-02-08', 'admin', ''),
(126, 'TCCS-31_2011', 'Thuốc BVTV chứa hoạt chất permethrin - yêu cầu kỹ thuật và phương pháp thử', 'V21-100', 1, 'GC-FID, HPLC', '', 'Permethrin', 'TCCS-31_2011-BVTV-Permethrin', '2018-02-08', 'admin', ''),
(127, 'TCVN-10163_2013', 'Thuốc BVTV chứa hoạt chất phenthoate - yêu cầu kỹ thuật và phương pháp thử', '', 0, 'GC-FID', '', 'Phenthoate', 'TCVN-10163_2013-Phenthoate', '2018-02-08', 'admin', ''),
(128, 'TC-77_97', 'Thuốc trừ sâu chứa hoạt chất phosalone - yêu cầu kỹ thuật và phương pháp thử', '', 0, 'GC-FID', '', 'Phosalone', 'TC-77_97-CL-Phosalone', '2018-02-08', 'admin', ''),
(129, 'TC-04_2005', 'Thuốc trừ sâu chứa hoạt chất pirimicarb - yêu cầu kỹ thuật và phương pháp thử', '', 0, 'GC-FID', '', 'Pirimicarb', 'TC-04_2005-CL-Pirimicarb', '2018-02-08', 'admin', ''),
(130, 'TCCS-45_2012', 'Thuốc BVTV chứa hoạt chất prochloraz-yêu cầu kỹ thuật và phương pháp thử', '', 0, 'GC-FID', '', 'Prochloraz', 'TCCS-45_2012-BVTV-Prochloraz', '2018-02-08', 'admin', ''),
(131, 'TC-08_2007', 'Thuốc trừ sâu chứa hoạt chất profenofos - yêu cầu kỹ thuật và phương pháp thử', '', 0, 'GC-FID', '', 'Profenofos', 'TC-08_2007-CL-Profenofos', '2018-02-08', 'admin', ''),
(132, 'TCVN-10162_2013', 'Thuốc BVTV chứa hoạt chất propanil - yêu cầu kỹ thuật và phương pháp thử', 'V21-181', 0, 'GC-FID', '', 'Propanil', 'TCVN-10162_2013-Propanil', '2018-02-08', 'admin', ''),
(133, 'TCVN-9479_2012', 'Thuốc BVTV chứa hoạt chất propargite - yêu cầu kỹ thuật và phương pháp thử', '', 0, 'GC-FID', '', 'Propargite', 'TCVN-9479_2012-Propargite', '2018-02-08', 'admin', ''),
(134, 'TCCS-22_2011', 'Thuốc BVTV chứa hoạt chất propiconazole-yêu cầu kỹ thuật và phương pháp thử', 'V21-176', 0, 'GC-FID', '', 'Propiconazole', 'TCCS-22_2011-BVTV-Propiconazole', '2018-02-08', 'admin', ''),
(135, 'TCVN-9480_2012', 'Thuốc BVTV chứa hoạt chất propineb-yêu cầu kỹ thuật và phương pháp thử', '', 0, 'CĐ', '', 'Propineb', 'TCVN-9480_2012-Propineb', '2018-02-08', 'admin', ''),
(136, 'TCVN-8385_2010', 'Thuốc BVTV chứa hoạt chất propisochlor - yêu cầu kỹ thuật và phương pháp thử', '', 0, 'GC-FID', '', 'Propisochlor', 'TCVN-8385_2010-Propisochlor', '2018-02-08', 'admin', ''),
(137, 'TCCS-13_2010', 'Thuốc BVTV chứa hoạt chất pymetrozine - yêu cầu kỹ thuật và phương pháp thử', '', 0, 'HPLC', '', 'Pymetrozine', 'TCCS-13_2010-BVTV-Pymetrozine', '2018-02-08', 'admin', ''),
(138, 'TCCS-44_2012', 'Thuốc BVTV chứa hoạt chất pyraclostrobin - yêu cầu kỹ thuật và phương pháp thử', '', 0, 'HPLC', '', 'Pyraclostrobin', 'TCCS-44_2012-BVTV-Pyraclostrobin', '2018-02-08', 'admin', ''),
(139, 'TCCS-32_2011', 'Thuốc BVTV chứa hoạt chất pyrazosulfuron ethyl - yêu cầu kỹ thuật và phương pháp thử', '', 0, 'HPLC', '', 'Pyrazosulfuron ethyl', 'TCCS-32_2011-BVTV-Pyrazosulfuron ethyl', '2018-02-08', 'admin', ''),
(140, 'TC-03_2006', 'Thuốc trừ cỏ chứa hoạt chất pyribenzoxim - yêu cầu kỹ thuật và phương pháp thử', '', 0, 'HPLC', '', 'Pyribenzoxim', 'TC-03_2006-CL-Pyribenzoxim', '2018-02-08', 'admin', ''),
(141, 'TC-02_2003', 'Thuốc trừ sâu chứa hoạt chất pyridaben - yêu cầu kỹ thuật và phương pháp thử', 'V21-180', 0, 'GC-FID', '', 'Pyridaben', 'TC-02_2003-CL-Pyridaben', '2018-02-08', 'admin', ''),
(142, 'TC-01_2003', 'Thuốc trừ sâu chứa hoạt chất quinalphos - yêu cầu kỹ thuật và phương pháp thử', '', 0, 'GC-FID', '', 'Quinalphos', 'TC-01_2003-CL-Quinalphos', '2018-02-08', 'admin', ''),
(143, 'TC-114_2000', 'Thuốc trừ cỏ chứa hoạt chất quinclorac - yêu cầu kỹ thuật và phương pháp thử', '', 0, 'HPLC', '', 'Quinclorac', 'TC-114_2000-CL-Quinclorac', '2018-02-08', 'admin', ''),
(144, 'TC-07_2003', 'Thuốc trừ cỏ chứa hoạt chất quizalofop-P-ethyl - yêu cầu kỹ thuật và phương pháp thử', '', 0, 'GC-FID', '', 'Quizalofop_P_Ethyl', 'TC-07_2003-CL-Quizalofop-P-Ethyl', '2018-02-08', 'admin', ''),
(145, 'TCCS-6_2008', 'Thuốc BVTV chứa hoạt chất rotenone - yêu cầu kỹ thuật và phương pháp thử', '', 0, 'HPLC', '', 'Rotenone', 'TCCS-6_2008-BVTV-Rotenone', '2018-02-08', 'admin', ''),
(146, 'TC-10_2005', 'Thuốc trừ cỏ chứa hoạt chất S-metolachlor - yêu cầu kỹ thuật và phương pháp thử', '', 0, 'HPLC', '', 'S Metolachlor', 'TC-10_2005-CL-S Metolachlor', '2018-02-08', 'admin', ''),
(147, 'TC-35_89', 'Thuốc trừ cỏ simazin 50% dạng bột thấm nước - yêu cầu kỹ thuật và phương pháp thử', '', 0, 'HPLC', '', 'Simazine', 'TC-35_89-Simazine', '2018-02-08', 'admin', ''),
(148, 'TC-02_2005-CL', 'Thuốc trừ sâu chứa hoạt chất spinosad – Yêu cầu kỹ thuật và phương pháp thử', '', 0, 'HPLC', '', 'Spinosad', 'TC-02_2005-CL-Spinosad', '2018-02-08', 'admin', ''),
(149, 'TCVN-8984_2011', 'Thuốc BVTV chứa hoạt chất sulfur-yêu cầu kỹ thuật và phương pháp thử', '', 0, 'CĐ', '', 'Sulfur', 'TCVN-8984_2011-Sulfur', '2018-02-08', 'admin', ''),
(150, 'TCVN-9482_2012', 'Thuốc BVTV chứa hoạt chất tebuconazole-yêu cầu kỹ thuật và phương pháp thử', 'V21-101', 1, 'GC-FID', '', 'Tebuconazole', 'TCVN-9482_2012-Tebuconazole', '2018-02-08', 'admin', ''),
(151, 'TC-07_2005', 'Thuốc trừ bệnh chứa hoạt chất tecloftalam-yêu cầu kỹ thuật và phương pháp thử', '', 0, 'HPLC', '', 'Tecloftalam', 'TC-07_2005-CL-Tecloftalam', '2018-02-08', 'admin', ''),
(152, 'TC-06_2005', 'Thuốc trừ bệnh chứa hoạt chất tetraconazole - yêu cầu kỹ thuật và phương pháp thử', '', 0, 'GC-FID', '', 'Tetraconazole', 'TC-06_2005-CL-Tetraconazole', '2018-02-08', 'admin', ''),
(153, 'TCCS-5_2009', 'Thuốc BVTV chứa hoạt chất thiacloprid - yêu cầu kỹ thuật và phương pháp thử', '', 0, 'HPLC', '', 'Thiacloprid', 'TCCS-5_2009-BVTV-Thiacloprid', '2018-02-08', 'admin', ''),
(154, 'TCCS-67_2013', 'Thuốc BVTV chứa hoạt chất thiamethoxam - yêu cầu kỹ thuật và phương pháp thử', '', 0, 'HPLC', '', 'Thiamethoxam', 'TCCS-67_2013-BVTV-Thiamethoxam', '2018-02-08', 'admin', ''),
(155, 'TC-61_95', 'Thuốc trừ cỏ saturn 50% dạng nhũ dầu', '', 0, 'GC-FID', '', 'Thiobencarb', 'TC-61_95-CL-Thiobencarb', '2018-02-08', 'admin', ''),
(156, 'TCCS-5_2008', 'Thuốc BVTV chứa hoạt chất thiodiazole copper-yêu cầu kỹ thuật và phương pháp thử', '', 0, 'CĐ', '', 'Thiodiazole copper', 'TCCS-5_2008-BVTV-Thiodiazole copper', '2018-02-08', 'admin', ''),
(157, 'TCVN-8751_2011', 'Thuốc BVTV chứa hoạt chất thiophanate methyl-yêu cầu kỹ thuật và phương pháp thử', '', 0, 'HPLC', '', 'Thiophanate methyl', 'TCVN-8751_2011-Thiophanate methyl', '2018-02-08', 'admin', ''),
(158, 'TC-09_2007', 'Thuốc trừ sâu chứa hoạt chất thiosultap sodium (nereistoxin) - yêu cầu kỹ thuật và phương pháp thử', '', 0, 'CĐ', '', 'Thiosultap Sodium', 'TC-09_2007-Thiosultap Sodium', '2018-02-08', 'admin', ''),
(159, 'TC-99_99', 'Thuốc trừ sâu chứa hoạt chất tralomethrin - yêu cầu kỹ thuật và phương pháp thử', '', 0, 'HPLC', '', 'Tralomethrin', 'TC-99_99-CL-Tralomethrin', '2018-02-08', 'admin', ''),
(160, 'TC-02-2001', 'Thuốc trừ cỏ chứa hoạt chất triasulfuron - yêu cầu kỹ thuật và phương pháp thử', '', 0, 'HPLC', '', 'Triasulfuron', 'TC-02-2001-CL-Triasulfuron', '2018-02-08', 'admin', ''),
(161, 'TC-15_2007', 'Thuốc trừ sâu chứa hoạt chất trichlorfon - yêu cầu kỹ thuật và phương pháp thử', '', 0, 'HPLC', '', 'Trichlofon', 'TC-15_2007-CL-Trichlofon', '2018-02-08', 'admin', ''),
(162, 'TCCS-39_2012', 'Thuốc BVTV chứa nấmTrichoderma spp.- yêu cầu kỹ thuật và phương pháp thử nghiệm', '', 0, 'VS', '', 'Trichoderma spp.', 'TCCS-39_2012-BVTV-Trichoderma spp.', '2018-02-08', 'admin', ''),
(163, 'TC-08_2002', 'Thuốc trừ bệnh chứa hoạt chất tricyclazole - yêu cầu kỹ thuật và phương pháp thử', 'V21-167', 0, 'HPLC', '', 'Tricyclazole', 'TC-08_2002-CL-Tricyclazole', '2018-02-08', 'admin', ''),
(164, 'TC-02_2008', 'Thuốc trừ bệnh chứa hoạt chất trifloxystrobin - yêu cầu kỹ thuật và phương pháp thử', '', 0, 'GC-FID', '', 'Trifloxystrobin', 'TC-02_2008-CL-Trifloxystrobin', '2018-02-08', 'admin', ''),
(165, 'TCVN-9478_2012', 'Thuốc BVTV chứa hoạt chất zineb-yêu cầu kỹ thuật và phương pháp thử', '', 0, 'CĐ', '', 'Zineb', 'TCVN-9478_2012-Zineb', '2018-02-08', 'admin', ''),
(166, 'CIPAC H_tr14_21', '', 'V21-182', 0, 'GC-FID', '', 'Alpha Cypermethrin', 'CIPAC H_tr14_21-Alpha Cypermethrin', '2018-02-08', 'admin', ''),
(167, '10TCN-505_2002', 'Thuốc trừ cỏ chứa hoạt chất Trifluralin - yêu cầu kỹ thuật và phương pháp thử', 'V21-102', 1, 'GC-FID', '', 'Trifluralin', '10-TCN-505_2002-Trifluralin', '2018-02-08', 'admin', ''),
(168, '', '', 'V21-121', 0, 'GC-FID', '', 'Picoxystrobin', '-Picoxystrobin', '2018-02-08', 'admin', ''),
(169, '10TCN-524_2002', 'Thuốc trừ cỏ chứa hoạt chất 2,4-D - Yêu cầu kỹ thuật và phương pháp thử', 'V21-125', 0, 'HPLC', '', '2,4 D amine', '10-TCN-524_2002-2,4 D amine', '2018-02-08', 'admin', ''),
(170, 'Analytical method SF-40_1', '', 'V21-166', 0, 'HPLC', '', 'Mesotrione', 'Analytical method SF-40_1-Mesotrione', '2018-02-08', 'admin', ''),
(171, 'TCVN-8145_2009', 'Thuốc BVTV - Xác định hàm lượng hoạt chât Chlorothalonil', 'V21-171', 0, 'HPLC', '', 'Chlorothalonil', 'TCVN-8145_2009-Chlorothalonil', '2018-02-08', 'admin', ''),
(172, 'TCVN-3711_1982', 'Thuốc trừ dịch hại Diazinon 50% - Dạng nhũ dầu', '', 0, '', 'Độ bền nhũ tương', 'Diazinon', 'TCVN-3711_1982-Diazinon', '2018-02-08', 'admin', ''),
(173, 'TCVN-4543_1988', 'Thuốc trừ nấm bệnh Kitazin - Dạng hạt', '', 0, 'GC-FID, CĐ', 'Tỉ lệ hạt, Độ rã trong nước', 'Isopropylbenzylphotphat ', 'TCVN-4543_1988-Isopropylbenzylphotphat ', '2018-02-08', 'admin', ''),
(174, '10TCN-389_1999', 'Thuốc trừ sâu chứa hoạt chất Benfuracarb - Yêu cầu kỹ thuật và phương pháp thử', '', 0, 'GC-FID', 'Độ pH, Độ thấm ướt', 'Benfuracarb', '10-TCN-389_1999-Benfuracarb', '2018-02-08', 'admin', ''),
(175, '', '', '', 1, '', '', 'Tetramethrin', '-Tetramethrin', '2018-02-08', 'admin', ''),
(176, 'TCVN-8050_2009', 'Nguyên liệu và thành phẩm thuốc BVTV - Phương pháp thử tính chất lý hóa', '', 0, '', '', '', 'TCVN 8050:2009', '2018-02-08', 'admin', ''),
(177, 'TCVN-4851_1989', 'Nước dùng để phân tích trong phòng thí nghiệm - Yêu cầu kỹ thuật và pp thử', '', 0, '', '', '', 'TCVN 4851:1989', '2018-02-08', 'admin', ''),
(178, 'TCVN-2739_1986', 'Thuốc trừ dịch hại - Phương pháp xác điịnh độ acid và độ kiềm', '', 0, '', 'acid - kiềm', '', 'TCVN 2739:1986', '2018-02-08', 'admin', ''),
(179, 'TCVN-2743_1978', 'Thuốc trừ dịch hại - Xác định phân còn lại trên sàng', '', 0, '', 'phần còn lại trên sàng', '', 'TCVN 2743:1978', '2018-02-08', 'admin', ''),
(180, 'TCVN-2744_198', 'Thuốc trừ dịch hại - Phương pháp xác định hàm lượng nước', '', 0, '', 'hàm lượng nước', '', 'TCVN 2744:198', '2018-02-08', 'admin', ''),
(181, 'TCCS-135_2014', 'Thuốc BVTV - Yêu cầu kỹ thuật', '', 0, '', '', '', 'TCCS 135:2014', '2018-02-08', 'admin', ''),
(182, '10TCN-323_98', 'Thuốc trừ sâu chứa hoạt chất chlorfluazuron - Yêu cầu kỹ thuật và phương pháp thử', '', 0, '', '', 'Clorfluazuron', '10-TCN -323_98-Clorfluazuron', '2018-02-08', 'admin', ''),
(183, '10TCN-428_2001', 'Thuốc trừ sâu chứa hoạt chất  acephate - Yêu cầu kỹ thuật và phương pháp thử', '', 0, '', '', 'Acephate', '10-TCN-428_2001-Acephate', '2018-02-08', 'admin', ''),
(184, 'TCVN-8144_2009', 'Thuốc bvtv - Xác định hàm lượng hoạt chất Pretilachlor', '', 0, '', '', 'Pretilachlor', 'TCVN-8144_2009-Pretilachlor', '2018-02-08', 'admin', ''),
(185, '10TCN-325_1998', 'Thuốc trừ sâu chứa hoạt chất tebufenozide - Yêu cầu kỹ thuật và phương pháp thử', '', 0, '', '', 'Tebufenozide', '10-TCN-325_1998-Tebufenozide', '2018-02-08', 'admin', ''),
(186, '', 'A validated HPLC method for determination of furazolidone and oxytetracycline in the presence of related substances', '', 0, '', '', 'Oxytetracycline', '-Oxytetracycline', '2018-02-08', 'admin', ''),
(187, '', 'High-performance liquid chromatography (HPLC) as a tool for monitoring the fate of fluazinam in soil', '', 0, '', '', 'Fluazinam', '-Fluazinam', '2018-02-08', 'admin', ''),
(188, '', 'Analysis of 50% Acetochlor and Clomazone EC by HPLC', '', 0, '', '', 'Clomazone', '-Clomazone', '2018-02-08', 'admin', ''),
(189, '', 'Dissipation kinetics of kresoxim-methyl fungicide in different pH waters under sun light', '', 0, '', '', 'Kresoxim_methyl', '-Kresoxim-methyl', '2018-02-08', 'admin', ''),
(190, '', 'Estimation of etofenprox residues in tomato fruits by Quechers methodlogy and HPLC-DAD', '', 0, '', '', 'Etofenprox', '-Etofenprox', '2018-02-08', 'admin', ''),
(191, '', 'Warfarin Sodium Related Substance HPLC Analysis (HP-EUR) on Luna 5u CN 150 x 4.6mm ID', '', 0, '', '', 'Warfarin', '-Warfarin', '2018-02-08', 'admin', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `groups`
--

CREATE TABLE `groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  `bgcolor` varchar(10) DEFAULT '#607D8B 	'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`, `bgcolor`) VALUES
(1, 'admin', 'Quản trị hệ thống', '#f44336'),
(2, 'management', 'Quản lý hệ thống', '#009688');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(15) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sys_counter`
--

CREATE TABLE `sys_counter` (
  `counter_id` int(11) NOT NULL,
  `count` int(11) DEFAULT NULL,
  `timer` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sys_counter`
--

INSERT INTO `sys_counter` (`counter_id`, `count`, `timer`) VALUES
(1, 35, '2018-08-09 12:55:25'),
(2, 1, '2018-08-09 12:55:25'),
(3, 2, '2018-08-10 02:02:30'),
(4, 3, '2018-08-10 03:14:10'),
(5, 4, '2018-08-10 05:08:20'),
(6, 5, '2018-08-10 05:13:47'),
(7, 6, '2018-08-10 05:14:37'),
(8, 7, '2018-08-10 05:17:46'),
(9, 8, '2018-08-10 05:20:54'),
(10, 9, '2018-08-10 06:16:03'),
(11, 10, '2018-08-10 06:17:47'),
(12, 11, '2018-08-10 06:18:52'),
(13, 12, '2018-08-10 06:48:32'),
(14, 13, '2018-08-10 09:23:35'),
(15, 14, '2018-08-11 12:36:14'),
(16, 15, '2018-08-11 13:12:31'),
(17, 16, '2018-08-11 13:15:11'),
(18, 17, '2018-08-11 13:54:55'),
(19, 18, '2018-08-11 14:49:26'),
(20, 19, '2018-08-12 00:10:26'),
(21, 20, '2018-08-13 02:15:44'),
(22, 21, '2018-08-13 02:37:02'),
(23, 22, '2018-08-16 09:00:52'),
(24, 23, '2018-08-18 07:08:28'),
(25, 24, '2018-08-18 07:40:38'),
(26, 25, '2018-08-22 05:43:39');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sys_menu`
--

CREATE TABLE `sys_menu` (
  `menu_id` int(11) NOT NULL,
  `menu_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `menu_parent_id` int(11) NOT NULL COMMENT '0:header, 1:menu goc',
  `menu_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'javascript:void(0)',
  `menu_index` int(11) NOT NULL,
  `menu_icon` text COLLATE utf8_unicode_ci,
  `module_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sys_menu`
--

INSERT INTO `sys_menu` (`menu_id`, `menu_title`, `menu_parent_id`, `menu_url`, `menu_index`, `menu_icon`, `module_name`) VALUES
(1, 'DASHBOARD', 0, 'dashboard', 1, '<i class=\" md-dashboard\"></i>', 'dashboard'),
(4, 'NGƯỜI DÙNG', 0, '', 3, '<i class=\"md-account-child\"></i>', '1'),
(5, 'Quản lý nhóm User', 4, 'hethong/groups', 1, '<i class=\"fa fa-users\"></i>', 'user-group'),
(7, 'HÓA CHẤT', 0, '', 5, '<i class=\"md-battery-50\"></i>', '1,2'),
(9, 'Quản lý User', 4, 'hethong/users', 2, '<i class=\"fa fa-user\"></i>', 'users'),
(10, 'HỆ THỐNG', 0, '', 2, '<i class=\"md-extension\"></i>', '1'),
(11, 'Chuẩn gốc', 7, 'hoachat/chuangoc', 1, '<i class=\"md-beenhere\"></i>', 'chuangoc'),
(13, 'TÀI LIỆU THAM KHẢO', 0, 'thamkhao', 6, '<i class=\"md-my-library-books\"></i>', 'thamkhao'),
(16, 'Menu', 10, 'hethong/sys_menu', 1, NULL, 'menu'),
(17, 'Đơn vị', 10, 'hethong/donvi', 2, '', 'donvi'),
(18, 'MẪU', 0, 'mau/bvtvmau', 7, '<i class=\"md-whatshot\"></i>', 'bvtvmau'),
(19, 'Tin tức', 0, 'tintuc', 8, '', 'tintuc');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sys_useronline`
--

CREATE TABLE `sys_useronline` (
  `id` int(11) NOT NULL,
  `ip` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `session` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `timestamp` varchar(40) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sys_useronline`
--

INSERT INTO `sys_useronline` (`id`, `ip`, `session`, `timestamp`) VALUES
(402, '::1', '0q91h25gdrcrs0bmtdncv8gq1a9nmhl8', '2018-08-22 12:43:47');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tintuc_baiviet`
--

CREATE TABLE `tintuc_baiviet` (
  `id` int(11) NOT NULL,
  `id_dm` int(11) NOT NULL,
  `tieude` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mota` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thumbnail` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `noidung` text COLLATE utf8_unicode_ci NOT NULL,
  `id_tacgia` int(11) NOT NULL,
  `tukhoa` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ngaytao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `edit` text COLLATE utf8_unicode_ci,
  `trangthai` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tintuc_baiviet`
--

INSERT INTO `tintuc_baiviet` (`id`, `id_dm`, `tieude`, `mota`, `thumbnail`, `noidung`, `id_tacgia`, `tukhoa`, `ngaytao`, `edit`, `trangthai`) VALUES
(1, 1, 'test', '', '', 'Test', 0, '', '0000-00-00 00:00:00', '', 1),
(2, 1, 'Mở hộp Galaxy Note9: Chiếc Galaxy Note mạnh mẽ nhất từ trước đến nay', 'Galaxy Note9 là smartphone cao cấp nhất của Samsung và sắp bán tại VN với mức giá nằm trong khoảng 24-30 triệu đồng.', '', '<p>Galaxy Note9 vừa được Samsung trình làng đêm qua tại sự kiện Galaxy Unpacked diễn ra tại New York, Mỹ. Được Samsung gọi là chiếc Galaxy Note mạnh mẽ nhất từ trước đến nay, Galaxy Note9 không chỉ sở hữu màn hình lớn, cấu hình mạnh như những thế hệ trước mà còn là camera được nâng cấp với khả năng thay đổi khẩu độ, dung lượng pin 4000mAh \"khủng\", bộ nhớ lưu trữ tối đa 1TB, bút S-Pen với nhiều tính năng mới và mức giá 1000 USD thuộc vào hàng cao nhất trên thị trường hiện nay.</p>\r\n\r\n<p>Chúng tôi mới đây đã có cơ hội được mở hộp chiếc Galaxy Note9 ngay tại Mỹ. Mời các bạn cùng xem bên trong hộp của chiếc smartphone cao cấp này của Samsung có những gì. </p>\r\n\r\n<p> </p>\r\n\r\n<p><img alt=\"Mở hộp Galaxy Note9: Chiếc Galaxy Note mạnh mẽ nhất từ trước đến nay - Ảnh 1.\" src=\"http://genknews.genkcdn.vn/thumb_w/660/2018/8/10/dsc03169-1533887697948554064598.jpg\"></p>\r\n\r\n<p>Hộp của Galaxy Note9 nổi bật bởi hình ảnh của cây bút S-Pen. Phiên bản mà chúng tôi mở hộp là màu xanh (Ocean Blue) kèm cây bút vàng, và điều này cũng được phản ánh qua hộp của chiếc máy</p>\r\n\r\n<p> </p>\r\n\r\n<p><img alt=\"Mở hộp Galaxy Note9: Chiếc Galaxy Note mạnh mẽ nhất từ trước đến nay - Ảnh 2.\" src=\"http://genknews.genkcdn.vn/thumb_w/660/2018/8/10/dsc03174-15338876979571692375832.jpg\"></p>\r\n\r\n<p>Cách thức đóng hộp của Galaxy Note9 tương tự như những chiếc máy cao cấp của Samsung trước đây</p>\r\n\r\n<p> </p>\r\n\r\n<p><img alt=\"Mở hộp Galaxy Note9: Chiếc Galaxy Note mạnh mẽ nhất từ trước đến nay - Ảnh 3.\" src=\"http://genknews.genkcdn.vn/thumb_w/660/2018/8/10/dsc03177-153388769796190219015.jpg\"></p>\r\n\r\n<p>Phụ kiện bên trong gồm củ sạc nhanh, cáp USB-C, đầu bút S-Pen và dụng cụ thay thế, adapter microUSB sang USB-C, adapter USB-C sang USB-A, tai nghe AKG chuẩn 3.5mm và que chọc SIM</p>\r\n\r\n<p> </p>\r\n\r\n<p><img alt=\"Mở hộp Galaxy Note9: Chiếc Galaxy Note mạnh mẽ nhất từ trước đến nay - Ảnh 4.\" src=\"http://genknews.genkcdn.vn/thumb_w/660/2018/8/10/dsc03335-1533888221727523521339.jpg\"></p>\r\n\r\n<p>Galaxy Note9 sở hữu màn hình Infinity Display 6.4 inch, lớn hơn một chút so với mức 6.3 inch của Galaxy Note8</p>\r\n\r\n<p> </p>\r\n\r\n<p><img alt=\"Mở hộp Galaxy Note9: Chiếc Galaxy Note mạnh mẽ nhất từ trước đến nay - Ảnh 5.\" src=\"http://genknews.genkcdn.vn/thumb_w/660/2018/8/10/dsc03303-1533887698186422694422.jpg\"></p>\r\n\r\n<p>So sánh giữa Galaxy Note8 (trái) và Galaxy Note9 (phải), có thể thấy mặt trước của chúng rất giống nhau</p>\r\n\r\n<p> </p>\r\n\r\n<p><img alt=\"Mở hộp Galaxy Note9: Chiếc Galaxy Note mạnh mẽ nhất từ trước đến nay - Ảnh 6.\" src=\"http://genknews.genkcdn.vn/thumb_w/660/2018/8/10/dsc03308-1533887698189203687968.jpg\"></p>\r\n\r\n<p>Tuy vậy, Samsung đã có thể \"cắt gọt\" viền dưới của Note9 mỏng hơn một chút</p>\r\n\r\n<p> </p>\r\n\r\n<p><img alt=\"Mở hộp Galaxy Note9: Chiếc Galaxy Note mạnh mẽ nhất từ trước đến nay - Ảnh 7.\" src=\"http://genknews.genkcdn.vn/thumb_w/660/2018/8/10/dsc03223-1533887698063953486624.jpg\"></p>\r\n\r\n<p>Mặt lưng của Note9 chứng kiến sự thay đổi rõ ràng nhất về thiết kế. Cảm biến vân tay đã được đặt ở dưới cụm camera, giúp người dùng dễ dàng tiếp cận hơn.</p>\r\n\r\n<p> </p>\r\n\r\n<p><img alt=\"Mở hộp Galaxy Note9: Chiếc Galaxy Note mạnh mẽ nhất từ trước đến nay - Ảnh 8.\" src=\"http://genknews.genkcdn.vn/thumb_w/660/2018/8/10/dsc03184-15338876979821820754193.jpg\"></p>\r\n\r\n<p>Cụm camera nay cũng được nằm trên một mảng cùng màu sắc với máy (ví dụ trong trường hợp này là xanh), thay vì là màu đen như trên tất cả các phiên bản màu sắc của Note8</p>\r\n\r\n<p> </p>\r\n\r\n<p><img alt=\"Mở hộp Galaxy Note9: Chiếc Galaxy Note mạnh mẽ nhất từ trước đến nay - Ảnh 9.\" src=\"http://genknews.genkcdn.vn/thumb_w/660/2018/8/10/dsc03271-15338876981361553479738.jpg\"></p>\r\n\r\n<p>Chúng ta có thể thấy rõ sự khác biệt này khi đặt Note9 và Note8 cạnh nhau</p>\r\n\r\n<p> </p>\r\n\r\n<p><img alt=\"Mở hộp Galaxy Note9: Chiếc Galaxy Note mạnh mẽ nhất từ trước đến nay - Ảnh 10.\" src=\"http://genknews.genkcdn.vn/thumb_w/660/2018/8/10/dsc03201-15338876979971114798961.jpg\"></p>\r\n\r\n<p>Cạnh trái của Note9 là nút tăng giảm âm lượng và nút để kích hoạt trợ lý ảo Bixby, tương tự như Note8</p>\r\n\r\n<p> </p>\r\n\r\n<p><img alt=\"Mở hộp Galaxy Note9: Chiếc Galaxy Note mạnh mẽ nhất từ trước đến nay - Ảnh 11.\" src=\"http://genknews.genkcdn.vn/thumb_w/660/2018/8/10/dsc03208-15338876980161289120621.jpg\"></p>\r\n\r\n<p>Cạnh dưới của máy là cổng USB-C, jack cắm tai nghe 3.5mm, loa ngoài và bút S-Pen</p>\r\n\r\n<p> </p>\r\n\r\n<p><img alt=\"Mở hộp Galaxy Note9: Chiếc Galaxy Note mạnh mẽ nhất từ trước đến nay - Ảnh 12.\" src=\"http://genknews.genkcdn.vn/thumb_w/660/2018/8/10/dsc03219-15338876980441921131954.jpg\"></p>\r\n\r\n<p>Phiên bản màu xanh của Galaxy Note9 có bút S-Pen màu vàng, tạo nên điểm nhấn độc đáo. Các phiên bản màu sắc còn lại của Note9 sẽ có bút S-Pen trùng khớp với màu của máy.</p>\r\n\r\n<p> </p>\r\n\r\n<p><img alt=\"Mở hộp Galaxy Note9: Chiếc Galaxy Note mạnh mẽ nhất từ trước đến nay - Ảnh 13.\" src=\"http://genknews.genkcdn.vn/thumb_w/660/2018/8/10/dsc03302-1533887698184307516862.jpg\"></p>\r\n\r\n<p>Khi ghi chú ở màn hình Always-on Display, màu của nét vẽ sẽ giống với màu của bút</p>\r\n\r\n<p> </p>\r\n\r\n<p><img alt=\"Mở hộp Galaxy Note9: Chiếc Galaxy Note mạnh mẽ nhất từ trước đến nay - Ảnh 14.\" src=\"http://genknews.genkcdn.vn/thumb_w/660/2018/8/10/dsc03294-15338876981682029111219.jpg\"></p>\r\n\r\n<p>Năm nay, bút S-Pen trên Note9 được nâng cấp mạnh với sự có mặt của công nghệ Bluetooth. Người dùng sẽ có thể sử dụng bút để điều khiển từ xa ở một số ứng dụng như chụp ảnh, nghe nhạc hay thuyết trình. Thời lượng pin của bút S-Pen là 30 phút và có thể sạc đầy trong 40 giây. Cần lưu ý rằng khi bút S-Pen hết pin, người dùng vẫn có thể thao tác viết/vẽ bình thường và chỉ các ứng dụng liên quan đến Bluetooth mới không sử dụng được.</p>\r\n\r\n<p> </p>\r\n\r\n<p><img alt=\"Mở hộp Galaxy Note9: Chiếc Galaxy Note mạnh mẽ nhất từ trước đến nay - Ảnh 15.\" src=\"http://genknews.genkcdn.vn/thumb_w/660/2018/8/10/dsc03289-1533887698163922634672.jpg\"></p>\r\n\r\n<p>Một ứng dụng khác của bút S-Pen trên Note9 là cho phép mở khóa máy từ xa bằng cách bấm vào nút trên bút</p>\r\n\r\n<p> </p>\r\n\r\n<p><img alt=\"Mở hộp Galaxy Note9: Chiếc Galaxy Note mạnh mẽ nhất từ trước đến nay - Ảnh 16.\" src=\"http://genknews.genkcdn.vn/thumb_w/660/2018/8/10/dsc03295-15338876981741696126654.jpg\"></p>\r\n\r\n<p>Người dùng có thể tùy ý điều chỉnh hành vi của bút S-Pen khi bấm nút một hoặc hai lần thông qua ứng dụng cài đặt</p>\r\n\r\n<p> </p>\r\n\r\n<p><img alt=\"Mở hộp Galaxy Note9: Chiếc Galaxy Note mạnh mẽ nhất từ trước đến nay - Ảnh 17.\" src=\"http://genknews.genkcdn.vn/thumb_w/660/2018/8/10/dsc03351-1533888221739464497267.jpg\"></p>\r\n\r\n<p>Bên cạnh các tính năng mới liên quan đến Bluetooth, bút S-Pen mới còn được Samsung cải thiện ngòi bút để đem lại độ chính xác cao hơn</p>\r\n\r\n<p> </p>\r\n\r\n<p><img alt=\"Mở hộp Galaxy Note9: Chiếc Galaxy Note mạnh mẽ nhất từ trước đến nay - Ảnh 18.\" src=\"http://genknews.genkcdn.vn/thumb_w/660/2018/8/10/dsc03240-15338876980921005558053.jpg\"></p>\r\n\r\n<p>Galaxy Note9 vẫn được trang bị cảm biến mống mắt và công nghệ nhận dạng khuôn mặt như các thế hệ trước</p>\r\n\r\n<p> </p>\r\n\r\n<p><img alt=\"Mở hộp Galaxy Note9: Chiếc Galaxy Note mạnh mẽ nhất từ trước đến nay - Ảnh 19.\" src=\"http://genknews.genkcdn.vn/thumb_w/660/2018/8/10/dsc03241-15338876980981897930984.jpg\"></p>\r\n\r\n<p>Camera của Galaxy Note9 tương tự như S9+ với khẩu độ kép, tính năng zoom quang học và chụp ảnh xóa phông. Tuy nhiên trên Note9, Samsung đã tích hợp AI để đem đến những bức ảnh đẹp hơn.</p>\r\n\r\n<p> </p>\r\n\r\n<p><img alt=\"Mở hộp Galaxy Note9: Chiếc Galaxy Note mạnh mẽ nhất từ trước đến nay - Ảnh 20.\" src=\"http://genknews.genkcdn.vn/thumb_w/660/2018/8/10/dsc03359-15338882217442026697021.jpg\"></p>\r\n\r\n<p>Ngoài ra, Galaxy Note9 còn nhiều nâng cấp khác như pin 4000mAh, bộ nhớ trong 128/512GB, loa kép... Giá bán dự kiến của Galaxy Note9 VN là 24.490.000 đồng và 29.490.000 đồng.</p>', 1, 'Note9', '2018-08-11 13:28:57', '', 2),
(4, 1, 'aaaa', '', '', '<p>ssss</p>', 0, '', '2018-08-11 13:57:31', '', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tintuc_danhmuc`
--

CREATE TABLE `tintuc_danhmuc` (
  `id` int(11) NOT NULL,
  `ten_dm` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tintuc_danhmuc`
--

INSERT INTO `tintuc_danhmuc` (`id`, `ten_dm`) VALUES
(1, 'Tin mới');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `sinhnhat` varchar(50) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `avatar` text,
  `gioitinh` varchar(20) NOT NULL,
  `phanquyen` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `sinhnhat`, `phone`, `avatar`, `gioitinh`, `phanquyen`) VALUES
(1, '127.0.0.1', 'admin', '$2y$08$W4MjVDfFCqUN2nR9oYPSdet9egCrwT86le0oAOFLeiw/L76R7Tihy', '', 'admin@admin.com', '', NULL, NULL, NULL, 1268889823, 1534916618, 1, 'Lê Minh Vấn', '', '15-02-1992', '01667654356', '4.jpg', 'Nam', '1_0,4_0,5_0,5_1,5_2,5_3,5_4,9_0,9_1,9_2,9_3,9_4,7_0,11_0,11_1,11_2,11_3,11_4,10_0,16_0,16_1,16_2,16_3,16_4,17_0,17_1,17_2,17_3,17_4,13_0,13_1,13_2,13_3,13_4,18_0,18_1,18_2,18_3,18_4,19_0,19_1,19_2,19_3,19_4'),
(2, '::1', 'tuyetngan', '$2y$08$.uy9mc7Ks3AkJoFSwPlQFO8.fppaZNxHMfpwqq39JBlgevr2ELPVS', NULL, 'tuyetnganct@vinacert.vn', NULL, NULL, NULL, NULL, 1517895114, 1529553991, 1, 'Hứa Tuyết Ngân', '', '', '', '8.jpg', 'Nữ', '1_0,4_0,9_0,9_1,7_0,11_0,11_1,11_2,11_3,10_0,17_0,17_1,17_2,17_3,13_0'),
(18, '', 'a', '', NULL, 'a@gmail.com', '6750a57799247eeb42bed1cc339e048daa5fa38e', NULL, NULL, NULL, 0, NULL, 0, 'a', '', '10-08-2018', '1111111111', '8.jpg', 'Nam', '1_0,');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users_groups`
--

CREATE TABLE `users_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(90, 1, 2),
(89, 1, 1),
(91, 2, 2);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin_preferences`
--
ALTER TABLE `admin_preferences`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `bvtv_donvi`
--
ALTER TABLE `bvtv_donvi`
  ADD PRIMARY KEY (`donvi_id`);

--
-- Chỉ mục cho bảng `bvtv_hcpha`
--
ALTER TABLE `bvtv_hcpha`
  ADD PRIMARY KEY (`id_pha`);

--
-- Chỉ mục cho bảng `bvtv_hc_goc`
--
ALTER TABLE `bvtv_hc_goc`
  ADD PRIMARY KEY (`hcgoc_id`);

--
-- Chỉ mục cho bảng `bvtv_ketqua`
--
ALTER TABLE `bvtv_ketqua`
  ADD PRIMARY KEY (`ketqua_id`);

--
-- Chỉ mục cho bảng `bvtv_ketqua_chando`
--
ALTER TABLE `bvtv_ketqua_chando`
  ADD PRIMARY KEY (`ketqua_id`);

--
-- Chỉ mục cho bảng `bvtv_mau`
--
ALTER TABLE `bvtv_mau`
  ADD PRIMARY KEY (`mau_id`);

--
-- Chỉ mục cho bảng `bvtv_mau_dangnen`
--
ALTER TABLE `bvtv_mau_dangnen`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `bvtv_mau_type`
--
ALTER TABLE `bvtv_mau_type`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `bvtv_phuongphap`
--
ALTER TABLE `bvtv_phuongphap`
  ADD PRIMARY KEY (`pp_id`);

--
-- Chỉ mục cho bảng `bvtv_pphoachat`
--
ALTER TABLE `bvtv_pphoachat`
  ADD PRIMARY KEY (`id_pp`);

--
-- Chỉ mục cho bảng `bvtv_tailieu_thamkhao`
--
ALTER TABLE `bvtv_tailieu_thamkhao`
  ADD PRIMARY KEY (`tk_id`);

--
-- Chỉ mục cho bảng `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `sys_counter`
--
ALTER TABLE `sys_counter`
  ADD PRIMARY KEY (`counter_id`);

--
-- Chỉ mục cho bảng `sys_menu`
--
ALTER TABLE `sys_menu`
  ADD PRIMARY KEY (`menu_id`);

--
-- Chỉ mục cho bảng `sys_useronline`
--
ALTER TABLE `sys_useronline`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tintuc_baiviet`
--
ALTER TABLE `tintuc_baiviet`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tintuc_danhmuc`
--
ALTER TABLE `tintuc_danhmuc`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  ADD KEY `fk_users_groups_users1_idx` (`user_id`),
  ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin_preferences`
--
ALTER TABLE `admin_preferences`
  MODIFY `id` tinyint(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `bvtv_donvi`
--
ALTER TABLE `bvtv_donvi`
  MODIFY `donvi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `bvtv_hcpha`
--
ALTER TABLE `bvtv_hcpha`
  MODIFY `id_pha` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `bvtv_hc_goc`
--
ALTER TABLE `bvtv_hc_goc`
  MODIFY `hcgoc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=237;

--
-- AUTO_INCREMENT cho bảng `bvtv_ketqua`
--
ALTER TABLE `bvtv_ketqua`
  MODIFY `ketqua_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `bvtv_ketqua_chando`
--
ALTER TABLE `bvtv_ketqua_chando`
  MODIFY `ketqua_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `bvtv_mau`
--
ALTER TABLE `bvtv_mau`
  MODIFY `mau_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `bvtv_mau_dangnen`
--
ALTER TABLE `bvtv_mau_dangnen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `bvtv_mau_type`
--
ALTER TABLE `bvtv_mau_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `bvtv_phuongphap`
--
ALTER TABLE `bvtv_phuongphap`
  MODIFY `pp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `bvtv_pphoachat`
--
ALTER TABLE `bvtv_pphoachat`
  MODIFY `id_pp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `bvtv_tailieu_thamkhao`
--
ALTER TABLE `bvtv_tailieu_thamkhao`
  MODIFY `tk_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=192;

--
-- AUTO_INCREMENT cho bảng `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT cho bảng `sys_counter`
--
ALTER TABLE `sys_counter`
  MODIFY `counter_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT cho bảng `sys_menu`
--
ALTER TABLE `sys_menu`
  MODIFY `menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `sys_useronline`
--
ALTER TABLE `sys_useronline`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=403;

--
-- AUTO_INCREMENT cho bảng `tintuc_baiviet`
--
ALTER TABLE `tintuc_baiviet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `tintuc_danhmuc`
--
ALTER TABLE `tintuc_danhmuc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
