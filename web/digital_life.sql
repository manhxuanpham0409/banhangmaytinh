-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Generation Time: Feb 13, 2011 at 10:01 AM
-- Server version: 5.0.51
-- PHP Version: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- Database: `digital_life`
-- 

-- --------------------------------------------------------

-- 
-- Table structure for table `admin`
-- 

CREATE TABLE `admin` (
  `idAdmin` int(2) NOT NULL auto_increment,
  `ho_ten` char(30) NOT NULL,
  `user` char(100) NOT NULL,
  `pass` char(100) NOT NULL,
  `GioiTinh` varchar(1) NOT NULL,
  `NgaySinh` date NOT NULL,
  `DiaChi` varchar(255) NOT NULL,
  `DienThoai` varchar(50) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `NgayTao` date NOT NULL,
  PRIMARY KEY  (`idAdmin`),
  UNIQUE KEY `user` (`user`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

-- 
-- Dumping data for table `admin`
-- 

INSERT INTO `admin` VALUES (3, 'duocmaster', 'duocmaster', 'duocmaster', '1', '2010-12-01', 'Tang Nhơn Phú', '01265360034', 'huynhvanduoc11011989@yahoo.com', '2010-12-12');
INSERT INTO `admin` VALUES (4, 'g', 'g', 'g', '1', '1928-07-29', 'g', 'g', 'g', '2010-12-12');

-- --------------------------------------------------------

-- 
-- Table structure for table `banner`
-- 

CREATE TABLE `banner` (
  `STT` int(11) NOT NULL,
  `Ten` varchar(255) NOT NULL,
  `UrlHinh` varchar(255) NOT NULL,
  `Width` varchar(255) NOT NULL,
  `Height` varchar(255) NOT NULL,
  `ThuTu` int(11) NOT NULL,
  `AnHien` tinyint(1) NOT NULL,
  PRIMARY KEY  (`STT`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Dumping data for table `banner`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `chucnang`
-- 

CREATE TABLE `chucnang` (
  `idCN` int(9) NOT NULL auto_increment,
  `TenCN` varchar(100) NOT NULL,
  `urlHinh` varchar(100) default NULL,
  `NoiDung` text NOT NULL,
  `idNhomCN` tinyint(1) NOT NULL,
  `AnHien` tinyint(1) NOT NULL default '1',
  PRIMARY KEY  (`idCN`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='Loại hỗ trợ' AUTO_INCREMENT=20 ;

-- 
-- Dumping data for table `chucnang`
-- 

INSERT INTO `chucnang` VALUES (15, 'Bảng báo giá', 'bao_gia.png', '', 3, 1);
INSERT INTO `chucnang` VALUES (16, 'Chăm sóc khách hàng', 'refresh.gif', '\r\n\r\n<p>Chưa cập nhật</p>', 3, 1);
INSERT INTO `chucnang` VALUES (17, 'Khuyến mãi', 'khuyen_mai.png', '\r\n\r\n<div align="center"><span style="FONT-SIZE: 14pt; COLOR: #006400"><span style="COLOR: #006400">Lap top - Hàng chính hãng - Bảo hành chính </span>hãng</span></div>\r\n\r\n<div align="center"><span style="FONT-SIZE: 24pt; COLOR: #ff0000">Tặng Norton 3 tháng bản quyền , khi mua Lap top bất kỳ</span></div>\r\n\r\n<div align="center"><span style="FONT-SIZE: 24pt; COLOR: #ff0000"></span><span style="FONT-SIZE: 24pt; COLOR: #ff0000"></span></div>\r\n\r\n<div align="center"><span style="FONT-SIZE: 24pt; COLOR: #ff0000">&nbsp;</span></div>\r\n\r\n<div align="center"><span style="FONT-SIZE: 14pt; COLOR: #ff0000">Dell Notebook - Hàng chính hãng - Bảo hành 1 năm -Tặng chuột quang</span></div>\r\n\r\n<div align="center"><span style="FONT-SIZE: 14pt; COLOR: #ff0000">Tặng bộ loa SoundMax120 ,khi mua LapTop Dell core i3(14/02/2011 -> SLCH)</span></div>', 3, 1);
INSERT INTO `chucnang` VALUES (13, 'Dịch vụ sữa chữa', 'dich_vu_sua_chua.png', '\r\n\r\n<div id="contentwrapper">\r\n	\r\n<div id="contentcolumn">\r\n		\r\n<div class="cat-service">\r\n			\r\n<div class="cat-service-title">\r\n				\r\n<div class="cat-service-title-left fl"><a href="http://vinacom.dyndns.info/vinacom/index.php?language=vi&amp;nv=about&amp;op=Dich-vu-sua-chua" rel="nofollow" target="_blank"><strong><span style="COLOR: #993366; FONT-SIZE: 16pt">DỊCH VỤ SỬA CHỮA MÁY TÍNH, MÁY IN TẠI NHÀ</span></strong></a></div></div></div>\r\n		\r\n<div class="service of">\r\n			\r\n<div class="service-content">\r\n				\r\n<p class="service-detail-content"><span style="FONT-SIZE: 16pt">&nbsp;</span></p>\r\n				\r\n<p style="LINE-HEIGHT: 150%" class="service-detail-content"><strong><span style="TEXT-DECORATION: underline"><span style="LINE-HEIGHT: 150%; COLOR: #993366; FONT-SIZE: 16pt">Chúng tôi cung cấp các dịch vụ sau:</span></span></strong></p>\r\n				\r\n<p style="LINE-HEIGHT: 150%; TEXT-INDENT: -18pt; MARGIN-LEFT: 36pt" class="service-detail-content"><span style="LINE-HEIGHT: 150%; COLOR: #993366; FONT-SIZE: 16pt">- </span><span style="LINE-HEIGHT: 150%; COLOR: #993366; FONT-SIZE: 16pt">Sửa chữa máy tính, máy in tại nhà</span></p>\r\n				\r\n<p style="LINE-HEIGHT: 150%; TEXT-INDENT: -18pt; MARGIN-LEFT: 36pt" class="service-detail-content"><span style="LINE-HEIGHT: 150%; COLOR: #993366; FONT-SIZE: 16pt">- </span><span style="COLOR: #800000; FONT-SIZE: 14pt">Đổ mực máy in</span></p>\r\n				\r\n<p style="LINE-HEIGHT: 150%; TEXT-INDENT: -18pt; MARGIN-LEFT: 36pt" class="service-detail-content"><span style="LINE-HEIGHT: 150%; COLOR: #993366; FONT-SIZE: 16pt">- </span><span style="LINE-HEIGHT: 150%; COLOR: #993366; FONT-SIZE: 16pt">Cài đặt máy tính, máy in</span></p>\r\n				\r\n<p style="LINE-HEIGHT: 150%; TEXT-INDENT: -18pt; MARGIN-LEFT: 36pt" class="service-detail-content"><span style="LINE-HEIGHT: 150%; COLOR: #993366; FONT-SIZE: 16pt">- </span><span style="LINE-HEIGHT: 150%; COLOR: #993366; FONT-SIZE: 16pt">Khôi phục dữ liệu bị mất.</span></p>\r\n				\r\n<p style="LINE-HEIGHT: 150%; TEXT-INDENT: -18pt; MARGIN-LEFT: 36pt" class="service-detail-content"><span style="LINE-HEIGHT: 150%; COLOR: #993366; FONT-SIZE: 16pt">- </span><span style="LINE-HEIGHT: 150%; COLOR: #993366; FONT-SIZE: 16pt">Cài đặt tất cả các phần mềm theo yêu cầu.</span></p>\r\n				\r\n<p style="LINE-HEIGHT: 150%; TEXT-INDENT: -18pt; MARGIN-LEFT: 36pt" class="service-detail-content"><span style="LINE-HEIGHT: 150%; COLOR: #993366; FONT-SIZE: 16pt">- </span><span style="LINE-HEIGHT: 150%; COLOR: #993366; FONT-SIZE: 16pt">Tư vấn lắp đặt máy tính, hệ thống mạng LAN, WAN…</span></p>\r\n				\r\n<p style="LINE-HEIGHT: 150%; MARGIN-LEFT: 18pt" class="service-detail-content"><span style="LINE-HEIGHT: 150%; COLOR: #993366; FONT-SIZE: 16pt">&nbsp;</span></p>\r\n				\r\n<p style="LINE-HEIGHT: 150%" class="service-detail-content"><strong><span style="TEXT-DECORATION: underline"><span style="LINE-HEIGHT: 150%; COLOR: #993366; FONT-SIZE: 16pt">Bảng giá dịch vụ:</span></span></strong></p>\r\n				\r\n<p style="LINE-HEIGHT: 150%; TEXT-INDENT: -18pt; MARGIN-LEFT: 36pt" class="service-detail-content"><span style="LINE-HEIGHT: 150%; COLOR: #993366; FONT-SIZE: 16pt">- </span><span style="LINE-HEIGHT: 150%; COLOR: #993366; FONT-SIZE: 16pt">Cài đặt máy tính (windows, office, vietkey, antivirus): 80.000 đ (ban ngày) và 100.000 đ (ban đêm)</span></p>\r\n				\r\n<p style="LINE-HEIGHT: 150%; TEXT-INDENT: -18pt; MARGIN-LEFT: 36pt" class="service-detail-content"><span style="LINE-HEIGHT: 150%; COLOR: #993366; FONT-SIZE: 16pt">- </span><span style="LINE-HEIGHT: 150%; COLOR: #993366; FONT-SIZE: 16pt">Đổ mực máy in: 60.000 đ (máy in A4) và 180.000 đ (máy in A3).</span></p>\r\n				\r\n<p style="LINE-HEIGHT: 150%; TEXT-INDENT: -18pt; MARGIN-LEFT: 36pt" class="service-detail-content"><span style="LINE-HEIGHT: 150%; COLOR: #993366; FONT-SIZE: 16pt">- </span><span style="LINE-HEIGHT: 150%; COLOR: #993366; FONT-SIZE: 16pt">Diệt virus, sửa lỗi win: 50.000 đ ( ban ngày ) 70.000 đ (ban đêm).</span></p>\r\n				\r\n<p style="LINE-HEIGHT: 150%; TEXT-INDENT: -18pt; MARGIN-LEFT: 36pt" class="service-detail-content"><span style="LINE-HEIGHT: 150%; COLOR: #993366; FONT-SIZE: 16pt">- </span><span style="LINE-HEIGHT: 150%; COLOR: #993366; FONT-SIZE: 16pt">Cứu dữ liệu ổ cứng: thỏa thuận.</span></p>\r\n				\r\n<p style="LINE-HEIGHT: 150%" class="service-detail-content"><strong><span style="TEXT-DECORATION: underline"><span style="LINE-HEIGHT: 150%; COLOR: #993366; FONT-SIZE: 16pt">Thông tin lien hệ:</span></span></strong></p>\r\n				\r\n<p style="LINE-HEIGHT: 150%" class="service-detail-content"><strong><span style="LINE-HEIGHT: 150%; COLOR: #993366; FONT-SIZE: 18pt">Dịch vụ sửa chữa máy tính Star computer</span></strong></p>\r\n				\r\n<div style="LINE-HEIGHT: 150%" class="service-detail-content"><span style="LINE-HEIGHT: 150%; COLOR: #993366; FONT-SIZE: 16pt">Địa chỉ : <strong>182 Nguyen Van Troi Stress-DakNong city</strong></span></div>\r\n				\r\n<div style="LINE-HEIGHT: 150%" class="service-detail-content"><span style="LINE-HEIGHT: 150%; COLOR: #993366; FONT-SIZE: 16pt">Điện thoại:0126.536.0034-0909.257.034</span></div>\r\n				\r\n<div style="LINE-HEIGHT: 150%" class="service-detail-content"><span style="LINE-HEIGHT: 150%; COLOR: #993366; FONT-SIZE: 16pt"></span><strong><span style="LINE-HEIGHT: 150%; COLOR: #993366; FONT-SIZE: 16pt">Website: <a href="http://starcomputer.com.vn/star_computer/index.php?idCN=13">http://starcomputer.com.vn/star_computer/index.php?idCN=13</a></span></strong></div></div></div></div></div>', 3, 1);
INSERT INTO `chucnang` VALUES (14, 'Thuê máy tính', 'tu_van_1.png', '<span style="FONT-FAMILY: Verdana; COLOR: #1f1f1f; FONT-SIZE: 8.5pt; mso-bidi-font-family: Arial">\r\n	<o:p>&nbsp; \r\n		\r\n<p style="TEXT-ALIGN: center" align="center"><span style="FONT-SIZE: 10pt"><strong><span style="FONT-FAMILY: Arial; COLOR: black; FONT-SIZE: 9pt">Danh sách máy tính để bàn cho thuê</span></strong><span style="FONT-FAMILY: Verdana; COLOR: #1f1f1f; FONT-SIZE: 8.5pt; mso-bidi-font-family: Arial"> \r\n					<o:p></o:p></<?xml:namespace>\r\n				\r\n<p style="MARGIN: 0in 0in 0pt" class="MsoNormal"><span style="FONT-FAMILY: Arial; COLOR: black; FONT-SIZE: 9pt">\r\n						<o:p><span style="FONT-SIZE: 10pt">&nbsp; \r\n								\r\n<table style="WIDTH: 502px; BORDER-COLLAPSE: collapse; HEIGHT: 909px; mso-yfti-tbllook: 480; mso-padding-alt: 0in 5.4pt 0in 5.4pt" class="MsoNormalTable" border="0" cellspacing="0" cellpadding="0" width="502">\r\n									\r\n<tbody>\r\n										\r\n<tr style="HEIGHT: 0.2in; mso-yfti-irow: 0; mso-yfti-firstrow: yes">\r\n											\r\n<td style="BORDER-BOTTOM: #ece9d8; BORDER-LEFT: #ece9d8; PADDING-BOTTOM: 0in; PADDING-LEFT: 5.4pt; WIDTH: 5.95in; PADDING-RIGHT: 5.4pt; BACKGROUND: #3399ff; HEIGHT: 0.2in; BORDER-TOP: #ece9d8; BORDER-RIGHT: #ece9d8; PADDING-TOP: 0in" valign="top" width="571" colspan="2">\r\n												\r\n<p style="TEXT-ALIGN: center; MARGIN: 0in 15.95pt 0pt 0in; tab-stops: 423.0pt" class="MsoNormal" align="center"><span style="FONT-FAMILY: Times New Roman; COLOR: #ffffff; FONT-SIZE: 10pt"><strong>Tên máy:Pegasus Atom</strong><span style="COLOR: white"> </span></span></p></td>\r\n										</tr>\r\n										\r\n<tr style="HEIGHT: 103.05pt; mso-yfti-irow: 1">\r\n											\r\n<td style="BORDER-BOTTOM: #ece9d8; BORDER-LEFT: #ece9d8; PADDING-BOTTOM: 0in; PADDING-LEFT: 5.4pt; WIDTH: 239.4pt; PADDING-RIGHT: 5.4pt; BACKGROUND: #e6e6e6; HEIGHT: 103.05pt; BORDER-TOP: #ece9d8; BORDER-RIGHT: #ece9d8; PADDING-TOP: 0in" valign="top" width="319">\r\n												\r\n<p style="MARGIN: 0in 0in 0pt"><span class="apple-style-span"><span style="FONT-FAMILY: Arial; COLOR: #1f1f1f; FONT-SIZE: 10pt; TEXT-DECORATION: underline; mso-ansi-language: EN-NZ; mso-bidi-font-weight: bold" lang="EN-NZ">Sản phẩm</span></span><span class="apple-style-span"><span style="FONT-FAMILY: Arial; COLOR: #1f1f1f; FONT-SIZE: 10pt; mso-ansi-language: EN-NZ; mso-bidi-font-weight: bold" lang="EN-NZ">:</span></span><span class="apple-style-span"><span style="FONT-FAMILY: Arial; COLOR: #1f1f1f; FONT-SIZE: 10pt; mso-ansi-language: VI; mso-bidi-font-weight: bold" lang="VI">Kích thước nhở gọn</span></span><span class="apple-converted-space"><span style="FONT-FAMILY: Arial; COLOR: #1f1f1f; FONT-SIZE: 10pt; mso-ansi-language: VI; mso-bidi-font-weight: bold" lang="VI">&nbsp;</span></span><span class="apple-style-span"><span style="FONT-FAMILY: Arial; COLOR: #1f1f1f; FONT-SIZE: 10pt; mso-ansi-language: VI; mso-bidi-font-weight: bold" lang="VI">:Cao18cm X, Rộng: 20cm X,</span></span><span class="apple-converted-space"><span style="FONT-FAMILY: Arial; COLOR: #1f1f1f; FONT-SIZE: 10pt; mso-ansi-language: VI; mso-bidi-font-weight: bold" lang="VI">&nbsp;</span></span><span class="apple-style-span"><span style="FONT-FAMILY: Arial; COLOR: #1f1f1f; FONT-SIZE: 10pt; mso-ansi-language: VI; mso-bidi-font-weight: bold" lang="VI">Dài: 20.55 cm. Nguồn 200W , 24 pin</span></span><span class="apple-style-span"><span style="FONT-FAMILY: Arial; COLOR: #1f1f1f; FONT-SIZE: 10pt; mso-ansi-language: EN-NZ; mso-bidi-font-weight: bold" lang="EN-NZ">.</span></span><span class="apple-style-span"><span style="FONT-FAMILY: Arial; FONT-SIZE: 10pt; mso-ansi-language: EN-NZ; mso-bidi-font-family: ''Times New Roman''; mso-bidi-font-weight: bold" lang="EN-NZ"> \r\n															<o:p></o:p></<?xml:namespace>\r\n														\r\n<p style="MARGIN: 0in 0in 0pt"><span style="TEXT-DECORATION: underline"><span style="FONT-FAMILY: Arial; COLOR: #1f1f1f; FONT-SIZE: 10pt; mso-ansi-language: EN-NZ; mso-bidi-font-weight: bold" lang="EN-NZ">Cấu hình:</span> \r\n																<o:p></o:p></span></p>\r\n														\r\n<p style="MARGIN: 0in 0in 0pt"><span style="FONT-FAMILY: Arial; COLOR: #1f1f1f; FONT-SIZE: 10pt; mso-ansi-language: VI; mso-bidi-font-weight: bold" lang="VI">+ C</span><span style="FONT-FAMILY: Arial; COLOR: #1f1f1f; FONT-SIZE: 10pt; mso-ansi-language: EN-NZ; mso-bidi-font-weight: bold" lang="EN-NZ">PU:</span><span style="FONT-FAMILY: Arial; COLOR: #1f1f1f; FONT-SIZE: 10pt; mso-ansi-language: VI; mso-bidi-font-weight: bold" lang="VI"> Intel Atom 1.6 Mhz (dual core)</span><span style="FONT-FAMILY: Arial; COLOR: #1f1f1f; FONT-SIZE: 10pt; mso-ansi-language: EN-NZ; mso-bidi-font-weight: bold" lang="EN-NZ">. \r\n																<o:p></o:p>\r\n																\r\n<p style="MARGIN: 0in 0in 0pt"><span style="FONT-FAMILY: Arial; COLOR: #1f1f1f; FONT-SIZE: 10pt; mso-ansi-language: VI; mso-bidi-font-weight: bold" lang="VI">+ Ram: 1 GB DDR2</span><span style="FONT-FAMILY: Arial; COLOR: #1f1f1f; FONT-SIZE: 10pt; mso-ansi-language: EN-NZ; mso-bidi-font-weight: bold" lang="EN-NZ"> buss 800 có thể nâng lên 2GB. \r\n																		<o:p></o:p></span></p>\r\n																\r\n<p style="MARGIN: 0in 0in 0pt"><span style="FONT-FAMILY: Arial; COLOR: #1f1f1f; FONT-SIZE: 10pt; mso-ansi-language: VI; mso-bidi-font-weight: bold" lang="VI">+ HDD: </span><span style="FONT-FAMILY: Arial; COLOR: #1f1f1f; FONT-SIZE: 10pt; mso-ansi-language: EN-NZ; mso-bidi-font-weight: bold" lang="EN-NZ">16</span><span style="FONT-FAMILY: Arial; COLOR: #1f1f1f; FONT-SIZE: 10pt; mso-ansi-language: VI; mso-bidi-font-weight: bold" lang="VI">0 GB \r\n																		<o:p></o:p></span></p>\r\n																\r\n<p style="MARGIN: 0in 0in 0pt"><span style="FONT-FAMILY: Arial; COLOR: #1f1f1f; FONT-SIZE: 10pt; mso-ansi-language: VI; mso-bidi-font-weight: bold" lang="VI">+ Mainboard</span><span style="FONT-FAMILY: Arial; COLOR: #1f1f1f; FONT-SIZE: 10pt; mso-ansi-language: EN-NZ; mso-bidi-font-weight: bold" lang="EN-NZ">:</span><span style="FONT-FAMILY: Arial; COLOR: #1f1f1f; FONT-SIZE: 10pt; mso-ansi-language: VI; mso-bidi-font-weight: bold" lang="VI"> Chipset 945G</span><span style="FONT-FAMILY: Arial; COLOR: #1f1f1f; FONT-SIZE: 10pt; mso-ansi-language: EN-NZ; mso-bidi-font-weight: bold" lang="EN-NZ"> \r\n																		<o:p></o:p>\r\n																		\r\n<p style="MARGIN: 0in 0in 0pt"><span style="FONT-FAMILY: Arial; COLOR: #1f1f1f; FONT-SIZE: 10pt; mso-ansi-language: EN-NZ; mso-bidi-font-weight: bold" lang="EN-NZ">+</span><span style="FONT-FAMILY: Arial; COLOR: #1f1f1f; FONT-SIZE: 10pt; mso-ansi-language: VI; mso-bidi-font-weight: bold" lang="VI">VGA <span class="apple-style-span">Onboard</span> 256MB.&nbsp; \r\n																				<o:p></o:p></span></p>\r\n																		\r\n<p style="MARGIN: 0in 0in 0pt"><span style="FONT-FAMILY: Arial; COLOR: #1f1f1f; FONT-SIZE: 10pt; mso-ansi-language: VI; mso-bidi-font-weight: bold" lang="VI">+ Ổ đọc đĩa DVD ROM<span class="apple-converted-space">&nbsp;</span>Samsung \r\n																				<o:p></o:p></span></p>\r\n																		\r\n<p style="TEXT-ALIGN: center; MARGIN: 0in 0in 0pt" class="MsoNormal" align="center"><span style="FONT-FAMILY: Arial; COLOR: black">\r\n																				<o:p><span style="FONT-SIZE: 10pt">&nbsp;</span></o:p></?xml:namespace></p></<?xml:namespace></p></span></p></span></p></td>\r\n											\r\n<td style="BORDER-BOTTOM: #ece9d8; BORDER-LEFT: #ece9d8; PADDING-BOTTOM: 0in; PADDING-LEFT: 5.4pt; WIDTH: 189pt; PADDING-RIGHT: 5.4pt; BACKGROUND: #f3f3f3; HEIGHT: 103.05pt; BORDER-TOP: #ece9d8; BORDER-RIGHT: #ece9d8; PADDING-TOP: 0in" valign="top" width="252">\r\n												\r\n<p style="TEXT-ALIGN: center; MARGIN: 0in 0in 0pt" class="MsoNormal" align="center"><span style="FONT-FAMILY: Times New Roman; FONT-SIZE: 10pt"><span style="COLOR: black">&nbsp;</span><span style="FONT-FAMILY: Arial; COLOR: black"> \r\n															<o:p></o:p></<?xml:namespace>\r\n														\r\n<p style="TEXT-ALIGN: center; MARGIN: 0in 0in 0pt" class="MsoNormal" align="center"><span style="FONT-FAMILY: Times New Roman; FONT-SIZE: 10pt"><span style="COLOR: black">&nbsp;</span><span style="FONT-FAMILY: Arial; COLOR: black"> \r\n																	<o:p></o:p></<?xml:namespace>\r\n																\r\n<p style="TEXT-ALIGN: center; MARGIN: 0in 0in 0pt" class="MsoNormal" align="center"><span style="FONT-FAMILY: Times New Roman; FONT-SIZE: 10pt"><span style="COLOR: black">&nbsp;</span><span style="FONT-FAMILY: Arial; COLOR: black"> \r\n																			<o:p></o:p></<?xml:namespace>\r\n																		\r\n<p style="TEXT-ALIGN: center; MARGIN: 0in 0in 0pt" class="MsoNormal" align="center"><span style="FONT-FAMILY: Arial; COLOR: black">\r\n																				<v:shapetype id="_x0000_t75" stroked="f" filled="f" path="m@4@5l@4@11@9@11@9@5xe" o:preferrelative="t" o:spt="75" coordsize="21600,21600">\r\n																					<v:stroke joinstyle="miter"></v:stroke>\r\n																					<v:formulas>\r\n																						<v:f eqn="if lineDrawn pixelLineWidth 0"></v:f>\r\n																						<v:f eqn="sum @0 1 0"></v:f>\r\n																						<v:f eqn="sum 0 0 @1"></v:f>\r\n																						<v:f eqn="prod @2 1 2"></v:f>\r\n																						<v:f eqn="prod @3 21600 pixelWidth"></v:f>\r\n																						<v:f eqn="prod @3 21600 pixelHeight"></v:f>\r\n																						<v:f eqn="sum @0 0 1"></v:f>\r\n																						<v:f eqn="prod @6 1 2"></v:f>\r\n																						<v:f eqn="prod @7 21600 pixelWidth"></v:f>\r\n																						<v:f eqn="sum @8 21600 0"></v:f>\r\n																						<v:f eqn="prod @7 21600 pixelHeight"></v:f>\r\n																						<v:f eqn="sum @10 21600 0"></v:f></v:formulas>\r\n																					<v:path o:connecttype="rect" gradientshapeok="t" o:extrusionok="f"></v:path>\r\n																					<o:lock aspectratio="t" v:ext="edit"></o:lock></v:shapetype>\r\n																				<o:p><span style="FONT-FAMILY: Times New Roman; FONT-SIZE: 10pt">&nbsp;</span></o:p></?xml:namespace></p></span></p></span></p></span></p></td>\r\n										</tr>\r\n										\r\n<tr style="HEIGHT: 12.6pt; mso-yfti-irow: 2">\r\n											\r\n<td style="BORDER-BOTTOM: #ece9d8; BORDER-LEFT: #ece9d8; PADDING-BOTTOM: 0in; PADDING-LEFT: 5.4pt; WIDTH: 5.95in; PADDING-RIGHT: 5.4pt; BACKGROUND: #3399ff; HEIGHT: 12.6pt; BORDER-TOP: #ece9d8; BORDER-RIGHT: #ece9d8; PADDING-TOP: 0in" valign="top" width="571" colspan="2">\r\n												\r\n<p style="TEXT-ALIGN: center; MARGIN: 0in 0in 0pt" class="MsoNormal" align="center"><span style="FONT-FAMILY: Times New Roman; FONT-SIZE: 10pt"><strong><span style="COLOR: white; mso-ansi-language: EN-NZ; mso-fareast-language: VI; mso-font-kerning: 18.0pt" lang="EN-NZ">Tên máy </span></strong><strong><span style="COLOR: white; mso-ansi-language: VI; mso-fareast-language: VI; mso-font-kerning: 18.0pt" lang="VI">DELL GX 270 </span></strong><strong><span style="COLOR: white; mso-ansi-language: EN-NZ; mso-fareast-language: VI; mso-font-kerning: 18.0pt" lang="EN-NZ">. đứng và nằm</span></strong><b><span style="FONT-FAMILY: Arial; COLOR: white; FONT-SIZE: 10pt"> \r\n																<o:p></o:p></<?xml:namespace></b></span></p></td>\r\n										</tr>\r\n										\r\n<tr style="HEIGHT: 1.1in; mso-yfti-irow: 3">\r\n											\r\n<td style="BORDER-BOTTOM: #ece9d8; BORDER-LEFT: #ece9d8; PADDING-BOTTOM: 0in; PADDING-LEFT: 5.4pt; WIDTH: 239.4pt; PADDING-RIGHT: 5.4pt; BACKGROUND: #e6e6e6; HEIGHT: 1.1in; BORDER-TOP: #ece9d8; BORDER-RIGHT: #ece9d8; PADDING-TOP: 0in" valign="top" width="319">\r\n												\r\n<p style="MARGIN: 0in 0in 0pt" class="MsoNormal"><span style="FONT-FAMILY: Arial; COLOR: #1f1f1f; FONT-SIZE: 10pt; mso-fareast-language: VI">\r\n														<o:p>&nbsp;</o:p>\r\n														\r\n<div style="BORDER-BOTTOM: #cccccc 1pt solid; BORDER-LEFT: #cccccc 1pt solid; PADDING-BOTTOM: 3pt; PADDING-LEFT: 5pt; PADDING-RIGHT: 5pt; BORDER-TOP: #cccccc 1pt solid; BORDER-RIGHT: #cccccc 1pt solid; PADDING-TOP: 3pt; mso-element: para-border-div; mso-border-alt: solid #CCCCCC .75pt">\r\n															\r\n<p style="BORDER-BOTTOM: medium none; BORDER-LEFT: medium none; PADDING-BOTTOM: 0in; MARGIN: 0in 0in 0pt; PADDING-LEFT: 0in; PADDING-RIGHT: 0in; BORDER-TOP: medium none; BORDER-RIGHT: medium none; PADDING-TOP: 0in; mso-padding-alt: 3.0pt 5.0pt 3.0pt 5.0pt; mso-border-alt: solid #CCCCCC .75pt; mso-outline-level: 1" class="MsoNormal"><span style="FONT-FAMILY: Arial; COLOR: #1f1f1f; FONT-SIZE: 10pt; mso-ansi-language: EN-NZ; mso-fareast-language: VI; mso-bidi-font-weight: bold; mso-font-kerning: 18.0pt" lang="EN-NZ">+CPU:</span><span style="FONT-FAMILY: Arial; COLOR: #1f1f1f; FONT-SIZE: 10pt; mso-ansi-language: VI; mso-fareast-language: VI; mso-bidi-font-weight: bold; mso-font-kerning: 18.0pt" lang="VI">Intel Pentium 4 2.8GHz, </span><span style="FONT-FAMILY: Arial; COLOR: #1f1f1f; FONT-SIZE: 10pt; mso-ansi-language: EN-NZ; mso-fareast-language: VI; mso-bidi-font-weight: bold; mso-font-kerning: 18.0pt" lang="EN-NZ">+Ram:</span><span style="FONT-FAMILY: Arial; COLOR: #1f1f1f; FONT-SIZE: 10pt; mso-ansi-language: VI; mso-fareast-language: VI; mso-bidi-font-weight: bold; mso-font-kerning: 18.0pt" lang="VI">512MB </span><span style="FONT-FAMILY: Arial; COLOR: #1f1f1f; FONT-SIZE: 10pt; mso-ansi-language: EN-NZ; mso-fareast-language: VI; mso-bidi-font-weight: bold; mso-font-kerning: 18.0pt" lang="EN-NZ">Buss 400. Nâng tối đa lên 2 GB \r\n																	<o:p></o:p></span></p>\r\n															\r\n<p style="BORDER-BOTTOM: medium none; BORDER-LEFT: medium none; PADDING-BOTTOM: 0in; MARGIN: 0in 0in 0pt; PADDING-LEFT: 0in; PADDING-RIGHT: 0in; BORDER-TOP: medium none; BORDER-RIGHT: medium none; PADDING-TOP: 0in; mso-padding-alt: 3.0pt 5.0pt 3.0pt 5.0pt; mso-border-alt: solid #CCCCCC .75pt; mso-outline-level: 1" class="MsoNormal"><span style="FONT-FAMILY: Arial; COLOR: #1f1f1f; FONT-SIZE: 10pt; mso-ansi-language: EN-NZ; mso-fareast-language: VI; mso-bidi-font-weight: bold; mso-font-kerning: 18.0pt" lang="EN-NZ">+HDD:8</span><span style="FONT-FAMILY: Arial; COLOR: #1f1f1f; FONT-SIZE: 10pt; mso-ansi-language: VI; mso-fareast-language: VI; mso-bidi-font-weight: bold; mso-font-kerning: 18.0pt" lang="VI">0GB</span><span style="FONT-FAMILY: Arial; COLOR: #1f1f1f; FONT-SIZE: 10pt; mso-ansi-language: EN-NZ; mso-fareast-language: VI; mso-bidi-font-weight: bold; mso-font-kerning: 18.0pt" lang="EN-NZ">. \r\n																	<o:p></o:p>\r\n																	\r\n<p style="BORDER-BOTTOM: medium none; BORDER-LEFT: medium none; PADDING-BOTTOM: 0in; MARGIN: 0in 0in 0pt; PADDING-LEFT: 0in; PADDING-RIGHT: 0in; BORDER-TOP: medium none; BORDER-RIGHT: medium none; PADDING-TOP: 0in; mso-padding-alt: 3.0pt 5.0pt 3.0pt 5.0pt; mso-border-alt: solid #CCCCCC .75pt; mso-outline-level: 1" class="MsoNormal"><span style="FONT-FAMILY: Arial; COLOR: #1f1f1f; FONT-SIZE: 10pt; mso-ansi-language: EN-NZ; mso-fareast-language: VI; mso-bidi-font-weight: bold; mso-font-kerning: 18.0pt" lang="EN-NZ">+VGA </span><span class="apple-style-span"><span style="FONT-FAMILY: Arial; COLOR: #1f1f1f; FONT-SIZE: 10pt; mso-ansi-language: VI" lang="VI">Onboard</span></span><span class="apple-style-span"><span style="FONT-FAMILY: Arial; COLOR: #1f1f1f; FONT-SIZE: 10pt; mso-ansi-language: EN-NZ" lang="EN-NZ"> 96MB</span> \r\n																			<o:p></o:p></span></p>\r\n																	\r\n<p style="BORDER-BOTTOM: medium none; BORDER-LEFT: medium none; PADDING-BOTTOM: 0in; MARGIN: 0in 0in 0pt; PADDING-LEFT: 0in; PADDING-RIGHT: 0in; BORDER-TOP: medium none; BORDER-RIGHT: medium none; PADDING-TOP: 0in; mso-padding-alt: 3.0pt 5.0pt 3.0pt 5.0pt; mso-border-alt: solid #CCCCCC .75pt; mso-outline-level: 1" class="MsoNormal"><span style="FONT-FAMILY: Arial; COLOR: #1f1f1f; FONT-SIZE: 10pt; mso-ansi-language: EN-NZ; mso-fareast-language: VI; mso-bidi-font-weight: bold; mso-font-kerning: 18.0pt" lang="EN-NZ">+CD Rom</span><span style="mso-fareast-language: VI; mso-bidi-font-weight: bold; mso-font-kerning: 18.0pt"> \r\n																			<o:p></o:p>\r\n																			\r\n<p style="TEXT-ALIGN: center; MARGIN: 0in 0in 0pt" class="MsoNormal" align="center"><span style="FONT-FAMILY: Arial; COLOR: black">\r\n																					<o:p><span style="FONT-SIZE: 10pt">&nbsp;</span></o:p></?xml:namespace></p></<?xml:namespace></p></span></p></div></?xml:namespace></p></td>\r\n											\r\n<td style="BORDER-BOTTOM: #ece9d8; BORDER-LEFT: #ece9d8; PADDING-BOTTOM: 0in; PADDING-LEFT: 5.4pt; WIDTH: 189pt; PADDING-RIGHT: 5.4pt; BACKGROUND: #f3f3f3; HEIGHT: 1.1in; BORDER-TOP: #ece9d8; BORDER-RIGHT: #ece9d8; PADDING-TOP: 0in" valign="top" width="252">\r\n												\r\n<p style="TEXT-ALIGN: center; MARGIN: 0in 0in 0pt" class="MsoNormal" align="center"><span style="FONT-FAMILY: Times New Roman; COLOR: black; FONT-SIZE: 10pt">&nbsp;</span></p>\r\n												\r\n<p style="TEXT-ALIGN: center; MARGIN: 0in 0in 0pt" class="MsoNormal" align="center"><span style="COLOR: black">&nbsp;</span></p>\r\n												\r\n<p style="TEXT-ALIGN: center; MARGIN: 0in 0in 0pt" class="MsoNormal" align="center"><span style="COLOR: black">&nbsp;</span><span style="FONT-FAMILY: Arial; COLOR: black"> \r\n														<o:p></o:p></<?xml:namespace></p></td>\r\n										</tr>\r\n										\r\n<tr style="HEIGHT: 12.8pt; mso-yfti-irow: 4">\r\n											\r\n<td style="BORDER-BOTTOM: #ece9d8; BORDER-LEFT: #ece9d8; PADDING-BOTTOM: 0in; PADDING-LEFT: 5.4pt; WIDTH: 5.95in; PADDING-RIGHT: 5.4pt; BACKGROUND: #3399ff; HEIGHT: 12.8pt; BORDER-TOP: #ece9d8; BORDER-RIGHT: #ece9d8; PADDING-TOP: 0in" valign="top" width="571" colspan="2">\r\n												\r\n<p style="TEXT-ALIGN: center; MARGIN: 0in 0in 0pt" class="MsoNormal" align="center"><span style="FONT-FAMILY: Times New Roman; FONT-SIZE: 10pt"><strong><span style="COLOR: white; FONT-SIZE: 11pt; mso-ansi-language: FR; mso-bidi-font-weight: normal" lang="FR">Tên máy: HP Pavilion</span></strong><span style="FONT-FAMILY: Arial; COLOR: white"> \r\n															<o:p></o:p></<?xml:namespace></span></p></td>\r\n										</tr>\r\n										\r\n<tr style="HEIGHT: 84.15pt; mso-yfti-irow: 5">\r\n											\r\n<td style="BORDER-BOTTOM: #ece9d8; BORDER-LEFT: #ece9d8; PADDING-BOTTOM: 0in; PADDING-LEFT: 5.4pt; WIDTH: 239.4pt; PADDING-RIGHT: 5.4pt; BACKGROUND: #e6e6e6; HEIGHT: 84.15pt; BORDER-TOP: #ece9d8; BORDER-RIGHT: #ece9d8; PADDING-TOP: 0in" valign="top" width="319">\r\n												\r\n<p style="MARGIN: 0in 0in 0pt" class="MsoNormal"><span style="FONT-FAMILY: Arial; COLOR: #1f1f1f; FONT-SIZE: 10pt; mso-ansi-language: FR" lang="FR">Cấu hình&nbsp;: \r\n														<o:p></o:p></span></p>\r\n												\r\n<p style="MARGIN: 0in 0in 0pt" class="MsoNormal"><span style="FONT-FAMILY: Times New Roman; COLOR: #1f1f1f; FONT-SIZE: 10pt">+CPU&nbsp;: Intel<span style="mso-spacerun: yes">&nbsp; </span>Dual core 2.66 GB \r\n														<o:p></o:p>\r\n														\r\n<p style="MARGIN: 0in 0in 0pt" class="MsoNormal"><span style="FONT-FAMILY: Times New Roman; COLOR: #1f1f1f; FONT-SIZE: 10pt">+ Ram&nbsp;: 1GB nâng lên 4 GB. \r\n																<o:p></o:p></span></p>\r\n														\r\n<p style="MARGIN: 0in 0in 0pt" class="MsoNormal"><span style="FONT-FAMILY: Times New Roman; COLOR: #1f1f1f; FONT-SIZE: 10pt">+HDD&nbsp;: 160GB \r\n																<o:p></o:p>\r\n																\r\n<p style="MARGIN: 0in 0in 0pt" class="MsoNormal"><span style="FONT-FAMILY: Times New Roman; COLOR: #1f1f1f; FONT-SIZE: 10pt">+Mainboard&nbsp;: intel 845 \r\n																		<o:p></o:p>\r\n																		\r\n<p style="MARGIN: 0in 0in 0pt" class="MsoNormal"><span style="FONT-FAMILY: Times New Roman; COLOR: #1f1f1f; FONT-SIZE: 10pt">+VGA onboard 128 \r\n																				<o:p></o:p></span></p>\r\n																		\r\n<p style="MARGIN: 0in 0in 0pt" class="MsoNormal"><span style="FONT-FAMILY: Times New Roman; COLOR: #1f1f1f; FONT-SIZE: 10pt">+CD Rom \r\n																				<o:p></o:p></span></p>\r\n																		\r\n<p style="MARGIN: 0in 0in 0pt" class="MsoNormal"><span style="FONT-FAMILY: Times New Roman; COLOR: #1f1f1f; FONT-SIZE: 10pt">&nbsp; \r\n																				<o:p></o:p>\r\n																				\r\n<p style="MARGIN: 0in 0in 0pt" class="MsoNormal"><span style="COLOR: black">\r\n																						<o:p><span style="FONT-FAMILY: Times New Roman; FONT-SIZE: 10pt">&nbsp;</span></o:p></?xml:namespace></p></span></p></mainboard&nbsp;:></p></hdd&nbsp;:></p></cpu&nbsp;:></p></td>\r\n											\r\n<td style="BORDER-BOTTOM: #ece9d8; BORDER-LEFT: #ece9d8; PADDING-BOTTOM: 0in; PADDING-LEFT: 5.4pt; WIDTH: 189pt; PADDING-RIGHT: 5.4pt; BACKGROUND: #f3f3f3; HEIGHT: 84.15pt; BORDER-TOP: #ece9d8; BORDER-RIGHT: #ece9d8; PADDING-TOP: 0in" valign="top" width="252">\r\n												\r\n<p style="TEXT-ALIGN: center; MARGIN: 0in 0in 0pt" class="MsoNormal" align="center"><span style="FONT-FAMILY: Arial; COLOR: black">\r\n														<o:p><span style="FONT-SIZE: 10pt">&nbsp;</span></o:p>&nbsp;\r\n														\r\n<p style="TEXT-ALIGN: center; MARGIN: 0in 0in 0pt" class="MsoNormal" align="center"><span style="FONT-FAMILY: Arial; COLOR: black">\r\n																<o:p>&nbsp;&nbsp;&nbsp;&nbsp; </o:p></?xml:namespace></p></?xml:namespace></p></td>\r\n										</tr>\r\n										\r\n<tr style="HEIGHT: 12.8pt; mso-yfti-irow: 6">\r\n											\r\n<td style="BORDER-BOTTOM: #ece9d8; BORDER-LEFT: #ece9d8; PADDING-BOTTOM: 0in; PADDING-LEFT: 5.4pt; WIDTH: 5.95in; PADDING-RIGHT: 5.4pt; BACKGROUND: #3399ff; HEIGHT: 12.8pt; BORDER-TOP: #ece9d8; BORDER-RIGHT: #ece9d8; PADDING-TOP: 0in" valign="top" width="571" colspan="2">\r\n												\r\n<p style="TEXT-ALIGN: center; MARGIN: 0in 50.15pt 0pt 0in" class="MsoNormal" align="center"><span style="FONT-FAMILY: Times New Roman; FONT-SIZE: 10pt"><strong><span style="COLOR: white; mso-ansi-language: EN-NZ; mso-fareast-language: VI; mso-font-kerning: 18.0pt" lang="EN-NZ">Tên máy </span></strong><strong><span style="COLOR: white; mso-ansi-language: VI; mso-fareast-language: VI; mso-font-kerning: 18.0pt" lang="VI">DELL GX 2</span></strong><strong><span style="COLOR: white; mso-ansi-language: EN-NZ; mso-fareast-language: VI; mso-font-kerning: 18.0pt" lang="EN-NZ">8</span></strong><strong><span style="COLOR: white; mso-ansi-language: VI; mso-fareast-language: VI; mso-font-kerning: 18.0pt" lang="VI">0 </span></strong><strong><span style="COLOR: white; mso-ansi-language: EN-NZ; mso-fareast-language: VI; mso-font-kerning: 18.0pt" lang="EN-NZ">. đứng và nằm</span></strong><span style="FONT-FAMILY: Arial; COLOR: white"> \r\n															<o:p></o:p></<?xml:namespace></span></p></td>\r\n										</tr>\r\n										\r\n<tr style="HEIGHT: 90.45pt; mso-yfti-irow: 7">\r\n											\r\n<td style="BORDER-BOTTOM: #ece9d8; BORDER-LEFT: #ece9d8; PADDING-BOTTOM: 0in; PADDING-LEFT: 5.4pt; WIDTH: 239.4pt; PADDING-RIGHT: 5.4pt; BACKGROUND: #e6e6e6; HEIGHT: 90.45pt; BORDER-TOP: #ece9d8; BORDER-RIGHT: #ece9d8; PADDING-TOP: 0in" valign="top" width="319">\r\n												\r\n<div style="BORDER-BOTTOM: #cccccc 1pt solid; BORDER-LEFT: #cccccc 1pt solid; PADDING-BOTTOM: 3pt; PADDING-LEFT: 5pt; PADDING-RIGHT: 5pt; BORDER-TOP: #cccccc 1pt solid; BORDER-RIGHT: #cccccc 1pt solid; PADDING-TOP: 3pt; mso-element: para-border-div; mso-border-alt: solid #CCCCCC .75pt">\r\n													\r\n<p style="BORDER-BOTTOM: medium none; BORDER-LEFT: medium none; PADDING-BOTTOM: 0in; MARGIN: 0in 0in 0pt; PADDING-LEFT: 0in; PADDING-RIGHT: 0in; BORDER-TOP: medium none; BORDER-RIGHT: medium none; PADDING-TOP: 0in; mso-padding-alt: 3.0pt 5.0pt 3.0pt 5.0pt; mso-border-alt: solid #CCCCCC .75pt; mso-outline-level: 1" class="MsoNormal"><span style="FONT-FAMILY: Arial; COLOR: #1f1f1f; FONT-SIZE: 10pt; mso-ansi-language: EN-NZ; mso-fareast-language: VI; mso-bidi-font-weight: bold; mso-font-kerning: 18.0pt" lang="EN-NZ">Cấu hình: \r\n															<o:p></o:p></span></p>\r\n													\r\n<p style="BORDER-BOTTOM: medium none; BORDER-LEFT: medium none; PADDING-BOTTOM: 0in; MARGIN: 0in 0in 0pt; PADDING-LEFT: 0in; PADDING-RIGHT: 0in; BORDER-TOP: medium none; BORDER-RIGHT: medium none; PADDING-TOP: 0in; mso-padding-alt: 3.0pt 5.0pt 3.0pt 5.0pt; mso-border-alt: solid #CCCCCC .75pt; mso-outline-level: 1" class="MsoNormal"><span style="FONT-SIZE: 10pt"><span style="FONT-FAMILY: Times New Roman; COLOR: #1f1f1f">+CPU:</span><span style="FONT-FAMILY: Arial; COLOR: #1f1f1f; FONT-SIZE: 10pt; mso-ansi-language: VI; mso-fareast-language: VI; mso-bidi-font-weight: bold; mso-font-kerning: 18.0pt" lang="VI">Intel Pentium 4 </span><span style="FONT-FAMILY: Arial; COLOR: #1f1f1f; FONT-SIZE: 10pt; mso-ansi-language: EN-NZ; mso-fareast-language: VI; mso-bidi-font-weight: bold; mso-font-kerning: 18.0pt" lang="EN-NZ"><span style="mso-spacerun: yes">&nbsp;</span>3.0</span><span style="FONT-FAMILY: Arial; COLOR: #1f1f1f; FONT-SIZE: 10pt; mso-ansi-language: VI; mso-fareast-language: VI; mso-bidi-font-weight: bold; mso-font-kerning: 18.0pt" lang="VI">GHz, </span><span style="FONT-FAMILY: Arial; COLOR: #1f1f1f; FONT-SIZE: 10pt; mso-ansi-language: EN-NZ; mso-fareast-language: VI; mso-bidi-font-weight: bold; mso-font-kerning: 18.0pt" lang="EN-NZ">+Ram:</span><span style="FONT-FAMILY: Arial; COLOR: #1f1f1f; FONT-SIZE: 10pt; mso-ansi-language: VI; mso-fareast-language: VI; mso-bidi-font-weight: bold; mso-font-kerning: 18.0pt" lang="VI">512MB </span><span style="FONT-FAMILY: Arial; COLOR: #1f1f1f; FONT-SIZE: 10pt; mso-ansi-language: EN-NZ; mso-fareast-language: VI; mso-bidi-font-weight: bold; mso-font-kerning: 18.0pt" lang="EN-NZ">Buss 800. Nâng tối đa lên 4 GB \r\n																<o:p></o:p></span></span></p>\r\n													\r\n<p style="BORDER-BOTTOM: medium none; BORDER-LEFT: medium none; PADDING-BOTTOM: 0in; MARGIN: 0in 0in 0pt; PADDING-LEFT: 0in; PADDING-RIGHT: 0in; BORDER-TOP: medium none; BORDER-RIGHT: medium none; PADDING-TOP: 0in; mso-padding-alt: 3.0pt 5.0pt 3.0pt 5.0pt; mso-border-alt: solid #CCCCCC .75pt; mso-outline-level: 1" class="MsoNormal"><span style="FONT-FAMILY: Arial; COLOR: #1f1f1f; FONT-SIZE: 10pt; mso-ansi-language: EN-NZ; mso-fareast-language: VI; mso-bidi-font-weight: bold; mso-font-kerning: 18.0pt" lang="EN-NZ">+HDD:8</span><span style="FONT-FAMILY: Arial; COLOR: #1f1f1f; FONT-SIZE: 10pt; mso-ansi-language: VI; mso-fareast-language: VI; mso-bidi-font-weight: bold; mso-font-kerning: 18.0pt" lang="VI">0GB</span><span style="FONT-FAMILY: Arial; COLOR: #1f1f1f; FONT-SIZE: 10pt; mso-ansi-language: EN-NZ; mso-fareast-language: VI; mso-bidi-font-weight: bold; mso-font-kerning: 18.0pt" lang="EN-NZ">. \r\n															<o:p></o:p>\r\n															\r\n<p style="MARGIN: 0in 0in 0pt" class="MsoNormal"><span style="FONT-FAMILY: Arial; COLOR: #1f1f1f; FONT-SIZE: 10pt; mso-ansi-language: EN-NZ" lang="EN-NZ">+ Mainboard&nbsp;: intel 915 \r\n																	<o:p></o:p></span></p>\r\n															\r\n<div style="BORDER-BOTTOM: #cccccc 1pt solid; BORDER-LEFT: #cccccc 1pt solid; PADDING-BOTTOM: 3pt; PADDING-LEFT: 5pt; PADDING-RIGHT: 5pt; BORDER-TOP: #cccccc 1pt solid; BORDER-RIGHT: #cccccc 1pt solid; PADDING-TOP: 3pt; mso-element: para-border-div; mso-border-alt: solid #CCCCCC .75pt">\r\n																\r\n<p style="BORDER-BOTTOM: medium none; BORDER-LEFT: medium none; PADDING-BOTTOM: 0in; MARGIN: 0in 0in 0pt; PADDING-LEFT: 0in; PADDING-RIGHT: 0in; BORDER-TOP: medium none; BORDER-RIGHT: medium none; PADDING-TOP: 0in; mso-padding-alt: 3.0pt 5.0pt 3.0pt 5.0pt; mso-border-alt: solid #CCCCCC .75pt; mso-outline-level: 1" class="MsoNormal"><span style="FONT-FAMILY: Arial; COLOR: #1f1f1f; FONT-SIZE: 10pt; mso-ansi-language: EN-NZ; mso-fareast-language: VI; mso-bidi-font-weight: bold; mso-font-kerning: 18.0pt" lang="EN-NZ">+VGA </span><span class="apple-style-span"><span style="FONT-FAMILY: Arial; COLOR: #1f1f1f; FONT-SIZE: 10pt; mso-ansi-language: VI" lang="VI">Onboard</span></span><span class="apple-style-span"><span style="FONT-FAMILY: Arial; COLOR: #1f1f1f; FONT-SIZE: 10pt; mso-ansi-language: EN-NZ" lang="EN-NZ"> 128MB</span> \r\n																		<o:p></o:p></span></p>\r\n																\r\n<p style="BORDER-BOTTOM: medium none; BORDER-LEFT: medium none; PADDING-BOTTOM: 0in; MARGIN: 0in 0in 0pt; PADDING-LEFT: 0in; PADDING-RIGHT: 0in; BORDER-TOP: medium none; BORDER-RIGHT: medium none; PADDING-TOP: 0in; mso-padding-alt: 3.0pt 5.0pt 3.0pt 5.0pt; mso-border-alt: solid #CCCCCC .75pt; mso-outline-level: 1" class="MsoNormal"><span style="FONT-FAMILY: Times New Roman; FONT-SIZE: 10pt"><span style="COLOR: #1f1f1f">+CD Rom</span><span style="mso-fareast-language: VI; mso-bidi-font-weight: bold; mso-font-kerning: 18.0pt"> \r\n																			<o:p></o:p></<?xml:namespace>\r\n																		\r\n<p style="LINE-HEIGHT: 14.25pt; MARGIN: 0in 0in 0pt; mso-outline-level: 1" class="MsoNormal"><span style="FONT-FAMILY: Arial; COLOR: #1f1f1f; FONT-SIZE: 10pt; mso-ansi-language: VI; mso-fareast-language: VI; mso-font-kerning: 18.0pt" lang="VI">\r\n																				<o:p>&nbsp;</o:p>\r\n																				\r\n<p style="TEXT-ALIGN: center; MARGIN: 0in 0in 0pt" class="MsoNormal" align="center"><span style="COLOR: black">\r\n																						<o:p><span style="FONT-FAMILY: Times New Roman; FONT-SIZE: 10pt">&nbsp;</span></o:p></?xml:namespace></p></?xml:namespace></p></span></p></div></span></p></div></td>\r\n											\r\n<td style="BORDER-BOTTOM: #ece9d8; BORDER-LEFT: #ece9d8; PADDING-BOTTOM: 0in; PADDING-LEFT: 5.4pt; WIDTH: 189pt; PADDING-RIGHT: 5.4pt; BACKGROUND: #f3f3f3; HEIGHT: 90.45pt; BORDER-TOP: #ece9d8; BORDER-RIGHT: #ece9d8; PADDING-TOP: 0in" valign="top" width="252">\r\n												\r\n<p style="TEXT-ALIGN: center; MARGIN: 0in 0in 0pt" class="MsoNormal" align="center"><span style="FONT-FAMILY: Times New Roman; FONT-SIZE: 10pt"><span style="COLOR: #1f1f1f">&nbsp;</span><span style="COLOR: black"> \r\n															<o:p></o:p></<?xml:namespace>\r\n														\r\n<p style="TEXT-ALIGN: center; MARGIN: 0in 0in 0pt" class="MsoNormal" align="center"><span style="FONT-FAMILY: Times New Roman; FONT-SIZE: 10pt"><span style="COLOR: #1f1f1f">&nbsp;</span><span style="COLOR: black"> \r\n																	<o:p></o:p></<?xml:namespace>\r\n																\r\n<p style="TEXT-ALIGN: center; MARGIN: 0in 0in 0pt" class="MsoNormal" align="center"><span style="COLOR: black">\r\n																		<o:p><span style="FONT-SIZE: 10pt">&nbsp;&nbsp;&nbsp;&nbsp;</span></o:p></?xml:namespace></p></span></p></span></p></td>\r\n										</tr>\r\n										\r\n<tr style="HEIGHT: 12.8pt; mso-yfti-irow: 8">\r\n											\r\n<td style="BORDER-BOTTOM: #ece9d8; BORDER-LEFT: #ece9d8; PADDING-BOTTOM: 0in; PADDING-LEFT: 5.4pt; WIDTH: 5.95in; PADDING-RIGHT: 5.4pt; BACKGROUND: #3399ff; HEIGHT: 12.8pt; BORDER-TOP: #ece9d8; BORDER-RIGHT: #ece9d8; PADDING-TOP: 0in" valign="top" width="571" colspan="2">\r\n												\r\n<p style="TEXT-ALIGN: center; MARGIN: 0in 0in 0pt" class="MsoNormal" align="center"><span style="FONT-FAMILY: Times New Roman; FONT-SIZE: 10pt"><span class="apple-style-span"><b style="mso-bidi-font-weight: normal"><span style="COLOR: white; FONT-SIZE: 11pt; mso-ansi-language: EN-NZ" lang="EN-NZ">Tên máy: </span></b></span><strong><span style="COLOR: white; FONT-SIZE: 11pt; mso-ansi-language: VI; mso-bidi-font-weight: normal" lang="VI">Dell Optiplex 755</span></strong><span style="COLOR: white; FONT-SIZE: 11pt; mso-ansi-language: VI" lang="VI"> \r\n															<o:p></o:p></<?xml:namespace></span></p></td>\r\n										</tr>\r\n										\r\n<tr style="HEIGHT: 98.1pt; mso-yfti-irow: 9; mso-yfti-lastrow: yes">\r\n											\r\n<td style="BORDER-BOTTOM: #ece9d8; BORDER-LEFT: #ece9d8; PADDING-BOTTOM: 0in; PADDING-LEFT: 5.4pt; WIDTH: 239.4pt; PADDING-RIGHT: 5.4pt; BACKGROUND: #e6e6e6; HEIGHT: 98.1pt; BORDER-TOP: #ece9d8; BORDER-RIGHT: #ece9d8; PADDING-TOP: 0in" valign="top" width="319">\r\n												\r\n<p style="MARGIN: 0in 0in 0pt" class="MsoNormal"><span class="apple-style-span"><span style="FONT-FAMILY: Arial; COLOR: #1f1f1f; FONT-SIZE: 10pt; mso-ansi-language: VI" lang="VI">CPU: </span></span><span class="apple-style-span"><span style="FONT-FAMILY: Arial; FONT-SIZE: 10pt; mso-ansi-language: EN-NZ; mso-bidi-font-family: ''Times New Roman''" lang="EN-NZ">\r\n															<o:p></o:p></?xml:namespace>\r\n														\r\n<p style="MARGIN: 0in 0in 0pt" class="MsoNormal"><span class="apple-style-span"><span style="FONT-FAMILY: Arial; COLOR: #1f1f1f; FONT-SIZE: 10pt; mso-ansi-language: FR" lang="FR">+</span></span><span class="apple-style-span"><span style="FONT-FAMILY: Arial; COLOR: #1f1f1f; FONT-SIZE: 10pt; mso-ansi-language: VI" lang="VI"> Intel Core 2 Duo E7400 2x2.8GHz</span></span><span class="apple-style-span"><span style="FONT-FAMILY: Arial; COLOR: #1f1f1f; FONT-SIZE: 10pt; mso-ansi-language: FR" lang="FR"> \r\n																	<o:p></o:p></<?xml:namespace>\r\n																\r\n<p style="MARGIN: 0in 0in 0pt" class="MsoNormal"><span class="apple-style-span"><span style="FONT-FAMILY: Arial; COLOR: #1f1f1f; FONT-SIZE: 10pt; mso-ansi-language: EN-NZ" lang="EN-NZ">+ intel dual core E2220 2.4</span></span><span style="FONT-FAMILY: Arial; COLOR: #1f1f1f; FONT-SIZE: 10pt; mso-ansi-language: VI" lang="VI"><br />\r\n																		<span class="apple-style-span">+Ram: 2GB<span style="mso-spacerun: yes">&nbsp; </span>buss 800 nâng lên 8 GB</span><br />\r\n																		<span class="apple-style-span">+HDD: 320GB </span></span><span class="apple-style-span"><span style="FONT-FAMILY: Arial; COLOR: #1f1f1f; FONT-SIZE: 10pt; mso-ansi-language: EN-NZ" lang="EN-NZ">\r\n																			<o:p></o:p></?xml:namespace>\r\n																		\r\n<p style="MARGIN: 0in 0in 0pt" class="MsoNormal"><span class="apple-style-span"><span style="FONT-FAMILY: Arial; COLOR: #1f1f1f; FONT-SIZE: 10pt; mso-fareast-font-family: Arial; mso-ansi-language: EN-NZ" lang="EN-NZ">+</span></span><span class="apple-style-span"><span style="FONT-FAMILY: Arial; COLOR: #1f1f1f; FONT-SIZE: 10pt; mso-fareast-font-family: Arial; mso-ansi-language: VI" lang="VI">Chipset Mainboard:</span></span><span class="apple-converted-space"><span style="FONT-FAMILY: Arial; COLOR: #1f1f1f; FONT-SIZE: 10pt; mso-fareast-font-family: Arial; mso-ansi-language: VI" lang="VI">&nbsp;</span></span><span class="apple-style-span"><span style="FONT-FAMILY: Arial; COLOR: #1f1f1f; FONT-SIZE: 10pt; mso-fareast-font-family: Arial; mso-ansi-language: VI; mso-bidi-font-weight: bold" lang="VI"><a href="http://www.toitim.net/www..vn/redirector.php@url=http_253A_252F_252F.vn_252Fs_252Fintel%2Bq35%2Bexpress" target="_blank"><span style="COLOR: blue; FONT-SIZE: 10pt; TEXT-DECORATION: underline; mso-ansi-font-size: 10.0pt; mso-bidi-font-size: 10.0pt">Intel Q35 Express</span></a></span></span><span style="FONT-FAMILY: Arial; COLOR: #1f1f1f; FONT-SIZE: 10pt; mso-fareast-font-family: Arial; mso-ansi-language: VI" lang="VI"><br />\r\n																				<span class="apple-style-span">+</span></span><span style="FONT-FAMILY: Arial; COLOR: #1f1f1f; FONT-SIZE: 10pt; mso-ansi-language: VI; mso-fareast-language: VI; mso-bidi-font-weight: bold; mso-font-kerning: 18.0pt" lang="VI"> VGA </span><span class="apple-style-span"><span style="FONT-FAMILY: Arial; COLOR: #1f1f1f; FONT-SIZE: 10pt; mso-fareast-font-family: Arial; mso-ansi-language: VI" lang="VI">Onboard 512MB</span></span><span style="FONT-FAMILY: Arial; COLOR: #1f1f1f; FONT-SIZE: 10pt; mso-fareast-font-family: Arial; mso-ansi-language: VI" lang="VI"><br />\r\n																				<span class="apple-style-span">+DVD_RW</span></span><span style="COLOR: black"> \r\n																				<o:p></o:p></<?xml:namespace></p></span></p></span></p></span></p></td>\r\n											\r\n<td style="BORDER-BOTTOM: #ece9d8; BORDER-LEFT: #ece9d8; PADDING-BOTTOM: 0in; PADDING-LEFT: 5.4pt; WIDTH: 189pt; PADDING-RIGHT: 5.4pt; BACKGROUND: #f3f3f3; HEIGHT: 98.1pt; BORDER-TOP: #ece9d8; BORDER-RIGHT: #ece9d8; PADDING-TOP: 0in" valign="top" width="252">\r\n												\r\n<p style="TEXT-ALIGN: center; MARGIN: 0in 0in 0pt" class="MsoNormal" align="center"><span style="FONT-FAMILY: Times New Roman; COLOR: black; FONT-SIZE: 10pt">&nbsp; \r\n														<o:p></o:p>\r\n														\r\n<p style="TEXT-ALIGN: center; MARGIN: 0in 0in 0pt" class="MsoNormal" align="center"><span style="COLOR: black">\r\n																<o:p><span style="FONT-SIZE: 10pt">&nbsp;</span></o:p></?xml:namespace></p></span></p></td>\r\n										</tr>\r\n									</tbody>\r\n								</table></span></o:p>\r\n						\r\n<p style="MARGIN: 0in 0in 0pt" class="MsoNormal">\r\n							<o:p><span style="FONT-FAMILY: Times New Roman">&nbsp;</span></o:p></?xml:namespace></?xml:namespace></p></span></p></o:p></?xml:namespace>', 3, 1);
INSERT INTO `chucnang` VALUES (3, 'Download Driver', 'pointer_green_2.gif', '\r\n\r\n<div><span style="COLOR: #9400d3"><span style="COLOR: #000000">1. GIGABYTE<br />\r\n			<br />\r\n			Card màn hình, Mainboard, DVD Firmware, Card Wi-fi<br />\r\n			<br />\r\n			Tất cả những phần cứng nào mà mang nhãn mác của Gigabyte thì bạn vào trang này<br />\r\n			<br />\r\n			<br />\r\n			Trang chủ<br />\r\n			</span><a class="bbc_url" title="External link" href="http://www.gigabyte.com.tw/" rel="nofollow external"><span style="COLOR: #284b72">http://www.gigabyte.com.tw</span></a><br />\r\n		<br />\r\n		<span style="COLOR: #000000">Trang download driver:<br />\r\n			</span><a class="bbc_url" title="External link" href="http://www.gigabyte.com.tw/Support/Default.aspx" rel="nofollow external"><span style="COLOR: #284b72">http://www.gigabyte....rt/Default.aspx</span></a><br />\r\n		<br />\r\n		<br />\r\n		<span style="COLOR: #000000">Chọn driver cần download cho phần cứng và download nh&eacute;<br />\r\n			<br />\r\n			<br />\r\n			2. ASUS<br />\r\n			<br />\r\n			Card màn hình, card mạng, mainboard, DVD, ....<br />\r\n			<br />\r\n			Trang chủ:<br />\r\n			</span><a class="bbc_url" title="External link" href="http://www.asus.com/index.aspx" rel="nofollow external"><span style="COLOR: #284b72">http://www.asus.com/index.aspx</span></a><br />\r\n		<br />\r\n		<br />\r\n		<span style="COLOR: #000000">Trang Download<br />\r\n			</span><a class="bbc_url" title="External link" href="http://support.asus.com/download/dow...Language=en-us" rel="nofollow external"><span style="COLOR: #284b72">http://support.asus.....Language=en-us</span></a><br />\r\n		<br />\r\n		<br />\r\n		<span style="COLOR: #000000">3. INTEL<br />\r\n			Driver mainboard, Card mạng, ...<br />\r\n			<br />\r\n			trang chủ:<br />\r\n			</span><a class="bbc_url" title="External link" href="http://www.intel.com/" rel="nofollow external"><span style="COLOR: #284b72">http://www.intel.com</span></a><br />\r\n		<br />\r\n		<br />\r\n		<span style="COLOR: #000000">Trang download<br />\r\n			</span><a class="bbc_url" title="External link" href="http://downloadcenter.intel.com/defa..._nav2_download" rel="nofollow external"><span style="COLOR: #284b72">http://downloadcente...._nav2_download</span></a><br />\r\n		<br />\r\n		<br />\r\n		<span style="COLOR: #000000">4. MSI<br />\r\n			Card màn hình, Mainboard, DVD, ...<br />\r\n			<br />\r\n			Trang chủ:<br />\r\n			</span><a class="bbc_url" title="External link" href="http://global.msi.com.tw/" rel="nofollow external"><span style="COLOR: #284b72">http://global.msi.com.tw/</span></a><br />\r\n		<br />\r\n		<br />\r\n		<span style="COLOR: #000000">Trang download:<br />\r\n			</span><a class="bbc_url" title="External link" href="http://global.msi.com.tw/index.php?func=downloadindex" rel="nofollow external"><span style="COLOR: #284b72">http://global.msi.co...c=downloadindex</span></a><br />\r\n		<br />\r\n		<br />\r\n		<span style="COLOR: #000000">5. ABIT<br />\r\n			Card màn hình, Maiboard, ...<br />\r\n			<br />\r\n			Trang chủ:<br />\r\n			</span><a class="bbc_url" title="External link" href="http://www.abit.com.tw/page/en/index.php" rel="nofollow external"><span style="COLOR: #284b72">http://www.abit.com....ge/en/index.php</span></a><br />\r\n		<br />\r\n		<br />\r\n		<span style="COLOR: #000000">Trang download:<br />\r\n			</span><a class="bbc_url" title="External link" href="http://www.abit.com.tw/page/en/downl...s/download.gif" rel="nofollow external"><span style="COLOR: #284b72">http://www.abit.com.....s/download.gif</span></a><br />\r\n		<br />\r\n		<br />\r\n		<br />\r\n		<span style="COLOR: #000000">6. ASROCK<br />\r\n			Mainboard<br />\r\n			<br />\r\n			Trang chủ:<br />\r\n			</span><a class="bbc_url" title="External link" href="http://www.asrock.com/index.asp" rel="nofollow external"><span style="COLOR: #284b72">http://www.asrock.com/index.asp</span></a><br />\r\n		<br />\r\n		<br />\r\n		<span style="COLOR: #000000">Trang download<br />\r\n			</span><a class="bbc_url" title="External link" href="http://www.asrock.com/support/Download.asp" rel="nofollow external"><span style="COLOR: #284b72">http://www.asrock.co...rt/Download.asp</span></a><br />\r\n		<br />\r\n		<br />\r\n		<span style="COLOR: #000000">7. NVIDIA<br />\r\n			Card màn hình, Mainboard, Chipset<br />\r\n			<br />\r\n			Trang chủ:<br />\r\n			</span><a class="bbc_url" title="External link" href="http://www.nvidia.com/page/home.html" rel="nofollow external"><span style="COLOR: #284b72">http://www.nvidia.com/page/home.html</span></a><br />\r\n		<br />\r\n		<br />\r\n		<span style="COLOR: #000000">Trang download driver:<br />\r\n			</span><a class="bbc_url" title="External link" href="http://www.nvidia.com/content/drivers/drivers.asp" rel="nofollow external"><span style="COLOR: #284b72">http://www.nvidia.co...ers/drivers.asp</span></a><br />\r\n		<br />\r\n		<span style="COLOR: #000000">8. ATI<br />\r\n			Card màn hình, Chipset<br />\r\n			<br />\r\n			Trang chủ:<br />\r\n			</span><a class="bbc_url" title="External link" href="http://www.ati.com/" rel="nofollow external"><span style="COLOR: #284b72">http://www.ati.com</span></a><br />\r\n		<br />\r\n		<br />\r\n		<span style="COLOR: #000000">Trang download:<br />\r\n			</span><a class="bbc_url" title="External link" href="http://ati.amd.com/support/driver.html" rel="nofollow external"><span style="COLOR: #284b72">http://ati.amd.com/support/driver.html</span></a><br />\r\n		<br />\r\n		<span style="COLOR: #000000">9. HP - COMPAQ<br />\r\n			<br />\r\n			Máy in, máy chụp hình, máy laptop, Máy desktop ...<br />\r\n			<br />\r\n			Trang chủ:<br />\r\n			</span><a class="bbc_url" title="External link" href="http://www.hp.com/" rel="nofollow external"><span style="COLOR: #284b72">http://www.hp.com</span></a><br />\r\n		<br />\r\n		<br />\r\n		<span style="COLOR: #000000">Trang download:<br />\r\n			</span><a class="bbc_url" title="External link" href="http://welcome.hp.com/country/us/en/...isplay=drivers" rel="nofollow external"><span style="COLOR: #284b72">http://welcome.hp.co....isplay=drivers</span></a><br />\r\n		<br />\r\n		<br />\r\n		<span style="COLOR: #000000">10. CANON<br />\r\n			Máy in, máy chụp hình...<br />\r\n			<br />\r\n			Trang chủ:<br />\r\n			</span><a class="bbc_url" title="External link" href="http://www.canon.com/" rel="nofollow external"><span style="COLOR: #284b72">http://www.canon.com</span></a><br />\r\n		<br />\r\n		<br />\r\n		<span style="COLOR: #000000">Trang download:<br />\r\n			</span><a class="bbc_url" title="External link" href="http://www.canon-asia.com/index.jsp?fuseaction=support" rel="nofollow external"><span style="COLOR: #284b72">http://www.canon-asi...eaction=support</span></a><br />\r\n		<br />\r\n		<br />\r\n		<span style="COLOR: #000000">11. DELL<br />\r\n			Máy Laptop<br />\r\n			<br />\r\n			Trang chủ:<br />\r\n			</span><a class="bbc_url" title="External link" href="http://www.dell.com/" rel="nofollow external"><span style="COLOR: #284b72">http://www.dell.com</span></a><br />\r\n		<br />\r\n		<br />\r\n		<span style="COLOR: #000000">Trang download:<br />\r\n			</span><a class="bbc_url" title="External link" href="http://support.dell.com/support/down...=us&amp;l=en&amp;s=gen" rel="nofollow external"><span style="COLOR: #284b72">http://support.dell.com/support/down...=us...;l=en&amp;s=gen</span></a><br />\r\n		<br />\r\n		<span style="COLOR: #000000">12. SIS<br />\r\n			<br />\r\n			Chipset cho các phần cứng, ví dụ: Card âm thanh, card màn hình SIS...<br />\r\n			<br />\r\n			Trang chủ:<br />\r\n			</span><a class="bbc_url" title="External link" href="http://www.sis.com/" rel="nofollow external"><span style="COLOR: #284b72">http://www.sis.com/</span></a><br />\r\n		<br />\r\n		<br />\r\n		<span style="COLOR: #000000">Trang download:<br />\r\n			</span><a class="bbc_url" title="External link" href="http://www.sis.com/download/agreemen...url=/download/" rel="nofollow external"><span style="COLOR: #284b72">http://www.sis.com/d....url=/download/</span></a><br />\r\n		<br />\r\n		<br />\r\n		<span style="COLOR: #000000">13. VIA Chipset<br />\r\n			<br />\r\n			Chipset cho phần cứng dùng VIA<br />\r\n			Ví dụ: Card âm thanh, card màn hình VIA<br />\r\n			<br />\r\n			<br />\r\n			Trang chủ:<br />\r\n			</span><a class="bbc_url" title="External link" href="http://www.via.com.tw/" rel="nofollow external"><span style="COLOR: #284b72">http://www.via.com.tw</span></a><br />\r\n		<br />\r\n		<br />\r\n		<span style="COLOR: #000000">Trang download<br />\r\n			</span><a class="bbc_url" title="External link" href="http://www.viaarena.com/default.aspx?PageID=2" rel="nofollow external"><span style="COLOR: #284b72">http://www.viaarena....t.aspx?PageID=2</span></a><br />\r\n		<br />\r\n		<br />\r\n		<span style="COLOR: #000000">14. CMEDIA - Card âm thanh<br />\r\n			<br />\r\n			Driver cho card âm thanh dùng Chipset CMEDIA (ví dụ CMI-8738)<br />\r\n			<br />\r\n			Trang chủ:<br />\r\n			</span><a class="bbc_url" title="External link" href="http://www.cmedia.com/" rel="nofollow external"><span style="COLOR: #284b72">http://www.cmedia.com</span></a><br />\r\n		<br />\r\n		<br />\r\n		<span style="COLOR: #000000">Trang download<br />\r\n			</span><a class="bbc_url" title="External link" href="http://www.cmedia.com.tw/?q=en/driver" rel="nofollow external"><span style="COLOR: #284b72">http://www.cmedia.com.tw/?q=en/driver</span></a><br />\r\n		<br />\r\n		<span style="COLOR: #000000">15. SONY<br />\r\n			Máy chụp hình, Laptop, DVD, MP3 Player<br />\r\n			<br />\r\n			Trang chủ:<br />\r\n			</span><a class="bbc_url" title="External link" href="http://www.sony.com/" rel="nofollow external"><span style="COLOR: #284b72">http://www.sony.com</span></a><br />\r\n		<br />\r\n		<br />\r\n		<span style="COLOR: #000000">Trang download:<br />\r\n			</span><a class="bbc_url" title="External link" href="http://esupport.sony.com/perl/select....com/index.php" rel="nofollow external"><span style="COLOR: #284b72">http://esupport.sony.....com/index.php</span></a><br />\r\n		<br />\r\n		<br />\r\n		<br />\r\n		<span style="COLOR: #000000">16. FOXCONN<br />\r\n			Bo mạch chủ, card màn hình ...<br />\r\n			<br />\r\n			<br />\r\n			Trang chủ:<br />\r\n			</span><a class="bbc_url" title="External link" href="http://www.foxconnchannel.com/" rel="nofollow external"><span style="COLOR: #284b72">http://www.foxconnchannel.com</span></a><br />\r\n		<br />\r\n		<span style="COLOR: #000000">Download:<br />\r\n			</span><a class="bbc_url" title="External link" href="http://www.foxconnchannel.com/support/downloads.aspx" rel="nofollow external"><span style="COLOR: #284b72">http://www.foxconnch.../downloads.aspx</span></a><br />\r\n		<span style="COLOR: #000000">Ảnh Đính Kèm<br />\r\n			<br />\r\n			<br />\r\n			17. ECS<br />\r\n			Mainboad, card màn hình ...<br />\r\n			<br />\r\n			Trang chủ:<br />\r\n			</span><a class="bbc_url" title="External link" href="http://www.ecs.com.tw/" rel="nofollow external"><span style="COLOR: #284b72">http://www.ecs.com.tw</span></a><br />\r\n		<br />\r\n		<span style="COLOR: #000000">Download:<br />\r\n			</span><a class="bbc_url" title="External link" href="http://www.ecs.com.tw/ECSWebSite/Dow......D=6&amp;LanID=9" rel="nofollow external"><span style="COLOR: #284b72">http://www.ecs.com.t.......D=6&amp;LanID=9</span></a><br />\r\n		<br />\r\n		<span style="COLOR: #000000">18. YAHAMA Sound Card<br />\r\n			<br />\r\n			Download: </span><a class="bbc_url" title="External link" href="http://www.yamaha.co.jp/english/prod...downloads.html" rel="nofollow external"><span style="COLOR: #284b72">http://www.yamaha.co....downloads.html</span></a><br />\r\n		<br />\r\n		<span style="COLOR: #000000">19. S3 Graphics Card<br />\r\n			Sản xuất card màn hình S3<br />\r\n			<br />\r\n			Địa chỉ trang chủ:<br />\r\n			</span><a class="bbc_url" title="External link" href="http://www.s3graphics.com/" rel="nofollow external"><span style="COLOR: #284b72">http://www.s3graphics.com/</span></a><br />\r\n		<br />\r\n		<span style="COLOR: #000000">Download trang:<br />\r\n			</span><a class="bbc_url" title="External link" href="http://www.s3graphics.com/en/resources/drivers/" rel="nofollow external"><span style="COLOR: #284b72">http://www.s3graphic...ources/drivers/</span></a><br />\r\n		<br />\r\n		<span style="COLOR: #000000">Theo Bệnh Viện Tin Học </span><br />\r\n		</span></div>', 1, 1);
INSERT INTO `chucnang` VALUES (6, 'Games', 'pointer_green_1_1.gif', '\r\n\r\n<h2><a class="title" href="http://gioithieugame.com/6739/gioi-thieu-huong-dan-thu-thuat-choi-game/huong-dan-choi-tales-of-hearts-phan-12.html" rel="bookmark">Hướng dẫn chơi: Tales of Hearts – Phần 12</a></h2>\r\n\r\n<div class="info"><span class="date">Tháng Tám 1st, 2010</span> \r\n	\r\n<div class="fixed">&nbsp;</div></div>\r\n\r\n<div class="content" align="justify"><a href="http://gioithieugame.com/6739/gioi-thieu-huong-dan-thu-thuat-choi-game/huong-dan-choi-tales-of-hearts-phan-12.html">\r\n		<img border="0" hspace="5" vspace="5" align="left" src="http://img2.gioithieugame.com/d1/thumb/1280540464-tales-of-hearts-165-jpg.jpg" width="140" height="80" /></a>Tại cổng nước, nhóm Shingu nhìn thấy Marin đang tháo nước ra nên vội chạy lên cản trở Marin. Shingu hỏi nếu Marin cứ tháo nước như vậy thì người dân trong thành phố sẽ như thế nào có biết không. Marin lạnh lùng: “Không sao đâu, sẽ chẳng có ai mắng tôi cả, sẽ không ai quan tâm tới tôi, không một ai…” Marin tiếp: “Chỉ mới có một năm thôi mà Kyashiti (tên của cô người hầu muốn tự tử) đã có thể quên người yêu của mình rồi, tôi gh&eacute;t cô ta.” Inesu nói: “Bộ tự mình tìm ra một con đường sống khác cũng là một cái tội hay sao?” Marin: “Không, là tôi ghen tỵ, do tôi không thể tìm được một cách sống mới, tôi chỉ có thể làm những việc như bây giờ…” Nói xong cô nhảy xuống sông. Shingu nhảy theo, Beriru lo lắng cho cậu ta nên vội chạy tới khóa cổng nước lại để giảm sức đẩy của dòng chảy, nhưng khóa không được vì nó quá nặng. Inesu kêu hai người tránh ra, đá một phát một thế là cần quay khóa lại được ngay. Trong lúc Hisui vẫn còn đang ngạc nhiên bởi sức mạnh khỏe như trâu của Inesu thì cô ta quay lại ra lệnh đuổi theo hai người đó ngay.</div>\r\n\r\n<div class="content" align="justify">\r\n	\r\n<h2><a class="title" href="http://gioithieugame.com/6733/gioi-thieu-huong-dan-thu-thuat-choi-game/gioi-thieu-preview-game-assassins-creed-brotherhood.html" rel="bookmark">Giới thiệu game: Assassin’s Creed: Brotherhood</a></h2>\r\n	\r\n<div class="info"><span class="date">Tháng Bảy 31st, 2010</span> \r\n		\r\n<div class="fixed">&nbsp;</div></div>\r\n	\r\n<div class="content" align="justify"><a href="http://gioithieugame.com/6733/gioi-thieu-huong-dan-thu-thuat-choi-game/gioi-thieu-preview-game-assassins-creed-brotherhood.html">\r\n			<img border="0" hspace="5" vspace="5" align="left" src="http://img2.gioithieugame.com/d1/thumb/Abstergo_1920x1200_AC_1273521447_640w.jpg" width="140" height="80" /></a>Như bạn đã biết, <a href="http://gioithieugame.com/tag/assassins-creed-brotherhood"><span style="COLOR: #2970a6">Assassin’s Creed: Brotherhood</span></a> là phần tiếp theo của <a href="http://gioithieugame.com/4890/gioi-thieu-huong-dan-thu-thuat-choi-game/gioi-thieu-review-game-assassins-creed-2.html"><span style="COLOR: #2970a6">Assassin’s Creed II</span></a>. Bạn vẫn sẽ vào vai Ezio (trong chế độ chơi đơn, không phải trong chế độ multiplayer), nhưng Ezio hiện giờ đã 40 tuổi. Bạn vẫn sẽ đi vòng quanh nước Ý, nhưng kì này nhiệm vụ chính của Ezio sẽ là tại thành phố Rome. Có thể nói chế độ chơi đơn của phiên bản này khá giống với những gì mà bản Assassin Creed II đã thể hiện.</div>\r\n	\r\n<div class="content" align="justify">\r\n		\r\n<h2><a class="title" href="http://gioithieugame.com/6742/tin-tuc-game/diep-vien-007-dat-chan-len-ca-he-wii-va-ds-vao-cuoi-nam-nay.html" rel="bookmark">Điệp viên 007 đặt chân lên cả hệ Wii và DS vào cuối năm nay</a></h2>\r\n		\r\n<div class="info"><span class="date">Tháng Tám 1st, 2010</span> \r\n			\r\n<div class="fixed">&nbsp;</div></div>\r\n		\r\n<div class="content">\r\n			\r\n<p align="justify"><a href="http://gioithieugame.com/6742/tin-tuc-game/diep-vien-007-dat-chan-len-ca-he-wii-va-ds-vao-cuoi-nam-nay.html">\r\n					<img border="0" hspace="5" vspace="5" align="left" src="http://img2.gioithieugame.com/d1/thumb/1280593068-goldeneye-007-20100615013426289-640w-640x480-jpg.jpg" width="140" height="80" /></a>Được công bố lần đầu tiên tại Hội chợ E3 2010, GoldenEye – tựa game mới nhất của chàng điệp viên tài hoa James Bond – chỉ được công bố dành cho hệ Wii.</p><br />\r\n			</div></div></div>', 2, 1);
INSERT INTO `chucnang` VALUES (19, 'Giải đáp', 'pointer_green_1.gif', '<span style="COLOR: #800000">\r\n	\r\n<p class="MsoNormal" align="left"><b><span style="FONT-SIZE: 10pt; COLOR: red; FONT-FAMILY: Arial">1. Kh</span><span style="FONT-SIZE: 10pt; COLOR: red; FONT-FAMILY: Arial">ắ</span><span style="FONT-SIZE: 10pt; COLOR: red; FONT-FAMILY: Arial">c ph</span><span style="FONT-SIZE: 10pt; COLOR: red; FONT-FAMILY: Arial">ụ</span><span style="FONT-SIZE: 10pt; COLOR: red; FONT-FAMILY: Arial">c l</span><span style="FONT-SIZE: 10pt; COLOR: red; FONT-FAMILY: Arial">ổ</span><span style="FONT-SIZE: 10pt; COLOR: red; FONT-FAMILY: Arial">i m</span><span style="FONT-SIZE: 10pt; COLOR: red; FONT-FAMILY: Arial">ấ</span><span style="FONT-SIZE: 10pt; COLOR: red; FONT-FAMILY: Arial">t shortcut trong Send To</span></b></p>\r\n	\r\n<p class="MsoNormal" align="left"><span style="FONT-SIZE: 10pt; COLOR: black; FONT-FAMILY: Arial">Bạn tạo shortcut cho một hay nhiều ứng dụng sau khi xong , khi bạn nhấn chuột phải vào một</span></p>\r\n	\r\n<p class="MsoNormal" align="left"><span style="FONT-SIZE: 10pt; COLOR: black; FONT-FAMILY: Arial">thư mục hay tập tin và chọn chức năng Send To , các shortcut này sẽ không hiển thị ra theo như</span></p>\r\n	\r\n<p class="MsoNormal" align="left"><span style="FONT-SIZE: 10pt; COLOR: black; FONT-FAMILY: Arial">ý muốn của bạn . Nguyên nhân do đường dẩn của SendTo bạn chưa thiết lập đúng cách .</span></p>\r\n	\r\n<p class="MsoNormal" align="left">Mắc dù bạn ch&eacute;p shortcut vào trong thư mục <strong>Documents and Settings\\\r\n			<tên b kho< tài></tên>ả</strong><strong><span style="FONT-SIZE: 10pt; COLOR: black; FONT-FAMILY: Arial">n </span><span style="FONT-SIZE: 10pt; COLOR: black; FONT-FAMILY: Arial">đă</span><span style="FONT-SIZE: 10pt; COLOR: black; FONT-FAMILY: Arial">ng</span></strong></p>\r\n	\r\n<p class="MsoNormal" align="left"><strong><span style="FONT-SIZE: 10pt; COLOR: black; FONT-FAMILY: Arial">nh</span><span style="FONT-SIZE: 10pt; COLOR: black; FONT-FAMILY: Arial">ậ</span>p>\\SendTo tuy nhiên nó vẩn không xuất hiện các shortcut .</strong></p>\r\n	\r\n<p class="MsoNormal" align="left"><span style="FONT-SIZE: 10pt; COLOR: black; FONT-FAMILY: Arial"><strong>Để giải quyết lổi này bạn mở Notepad và ch&eacute;p đoạn mã sau vào :</strong></span></p>\r\n	\r\n<p class="MsoNormal" align="left"><span style="FONT-SIZE: 10pt; COLOR: blue; FONT-FAMILY: Arial"><strong>Set WshShell = CreateObject("WScript.Shell")</strong></span></p>\r\n	\r\n<p class="MsoNormal" align="left"><span style="FONT-SIZE: 10pt; COLOR: blue; FONT-FAMILY: Arial"><strong>USFolderPath = "HKCU\\Software\\Microsoft\\Windows\\CurrentVersion\\Explorer\\User Shell</strong></span></p>\r\n	\r\n<p class="MsoNormal" align="left"><span style="FONT-SIZE: 10pt; COLOR: blue; FONT-FAMILY: Arial"><strong>Folders"</strong></span></p>\r\n	\r\n<p class="MsoNormal" align="left"><span style="FONT-SIZE: 10pt; COLOR: blue; FONT-FAMILY: Arial"><strong>On Error resume next</strong></span></p>\r\n	\r\n<p class="MsoNormal" align="left"><span style="FONT-SIZE: 10pt; COLOR: blue; FONT-FAMILY: Arial"><strong>WshShell.RegWrite "HKCR\\exefile\\shellex\\DropHandler\\", "{86C86720-42A0-1069-A2E8-</strong></span></p>\r\n	\r\n<p class="MsoNormal" align="left"><span style="FONT-SIZE: 10pt; COLOR: blue; FONT-FAMILY: Arial"><strong>08002B30309D}", "REG_SZ"</strong></span></p>\r\n	\r\n<p class="MsoNormal" align="left"><span style="FONT-SIZE: 10pt; COLOR: blue; FONT-FAMILY: Arial"><strong>WshShell.RegWrite "HKCR\\lnkfile\\shellex\\DropHandler\\", "{00021401-0000-0000-C000-</strong></span></p>\r\n	\r\n<p class="MsoNormal" align="left"><span style="FONT-SIZE: 10pt; COLOR: blue; FONT-FAMILY: Arial"><strong>000000000046}", "REG_SZ"</strong></span></p>\r\n	\r\n<p class="MsoNormal" align="left"><span style="FONT-SIZE: 10pt; COLOR: blue; FONT-FAMILY: Arial"><strong>WshShell.RegWrite USFolderPath &amp; "\\SendTo", "%USERPROFILE%\\SendTo",</strong></span></p>\r\n	\r\n<p class="MsoNormal" align="left"><span style="FONT-SIZE: 10pt; COLOR: blue; FONT-FAMILY: Arial"><strong>"REG_EXPAND_SZ"</strong></span></p>\r\n	\r\n<p class="MsoNormal" align="left"><span style="FONT-SIZE: 10pt; COLOR: blue; FONT-FAMILY: Arial"><strong>Wshshell.RUN ("regsvr32.exe shell32.dll /i /s")</strong></span></p>\r\n	\r\n<p class="MsoNormal" align="left"><span style="FONT-SIZE: 10pt; COLOR: blue; FONT-FAMILY: Arial"><strong>MsgUser = Msgbox ("Fixed the Send To menu. Restart Windows for the changes to take effect",</strong></span></p>\r\n	\r\n<p class="MsoNormal" align="left"><span style="FONT-SIZE: 10pt; COLOR: blue; FONT-FAMILY: Arial"><strong>4160, "''Send To'' menu fix for Windows XP")</strong></span></p>\r\n	\r\n<p class="MsoNormal" align="left"><span style="FONT-SIZE: 10pt; COLOR: blue; FONT-FAMILY: Arial"><strong>Set WshShell = Nothing</strong></span></p>\r\n	\r\n<div class="MsoNormal" align="left"><span style="FONT-SIZE: 10pt; COLOR: black; FONT-FAMILY: Arial"><strong>Lưu tập tin này và đặt tên là fixsendto.vbs</strong></span></div><span style="FONT-SIZE: 10pt; COLOR: black; FONT-FAMILY: Arial">\r\n		\r\n<p class="MsoNormal" align="left"><strong><span style="FONT-SIZE: 10pt; COLOR: red; FONT-FAMILY: Arial">2. Thêm link c</span><span style="FONT-SIZE: 10pt; COLOR: red; FONT-FAMILY: Arial">ủ</span><span style="FONT-SIZE: 10pt; COLOR: red; FONT-FAMILY: Arial">a m</span><span style="FONT-SIZE: 10pt; COLOR: red; FONT-FAMILY: Arial">ộ</span><span style="FONT-SIZE: 10pt; COLOR: red; FONT-FAMILY: Arial">t website </span><span style="FONT-SIZE: 10pt; COLOR: red; FONT-FAMILY: Arial">đế</span><span style="FONT-SIZE: 10pt; COLOR: red; FONT-FAMILY: Arial">n Start Menu</span></strong></p>\r\n		\r\n<p class="MsoNormal" align="left"><span style="FONT-SIZE: 10pt; COLOR: black; FONT-FAMILY: Arial"><strong>Bạn có muốn thêm link của một website mà bạn yêu thích đến Start Menu hay không ? Nếu</strong></span></p>\r\n		\r\n<p class="MsoNormal" align="left"><span style="FONT-SIZE: 10pt; COLOR: black; FONT-FAMILY: Arial"><strong>muốn mời các bạn “vọc” cùng tôi .</strong></span></p>\r\n		\r\n<p class="MsoNormal" align="left"><span style="FONT-SIZE: 10pt; COLOR: black; FONT-FAMILY: Arial"><strong>Mở Notepad và ch&eacute;p đoạn mã sau vào :</strong></span></p>\r\n		\r\n<p class="MsoNormal" align="left"><span style="FONT-SIZE: 10pt; COLOR: blue; FONT-FAMILY: Arial"><strong>Windows Registry Editor Version 5.00</strong></span></p>\r\n		\r\n<p class="MsoNormal" align="left"><span style="FONT-SIZE: 10pt; COLOR: blue; FONT-FAMILY: Arial"><strong>[HKEY_CLASSES_ROOT\\CLSID\\{2559a1f6-21d7-11d4-bdaf-00c04f60b9f0}]</strong></span></p>\r\n		\r\n<p class="MsoNormal" align="left"><span style="FONT-SIZE: 10pt; COLOR: blue; FONT-FAMILY: Arial"><strong>@="www.vnechip.com"</strong></span></p>\r\n		\r\n<p class="MsoNormal" align="left"><span style="FONT-SIZE: 10pt; COLOR: blue; FONT-FAMILY: Arial"><strong>[HKEY_CLASSES_ROOT\\CLSID\\{2559a1f6-21d7-11d4-bdaf-00c04f60b9f0}\\DefaultIcon]</strong></span></p>\r\n		\r\n<p class="MsoNormal" align="left"><span style="FONT-SIZE: 10pt; COLOR: blue; FONT-FAMILY: Arial"><strong>@="%SystemRoot%\\\\system32\\\\shell32.dll,-47"</strong></span></p>\r\n		\r\n<p class="MsoNormal" align="left"><span style="FONT-SIZE: 10pt; COLOR: blue; FONT-FAMILY: Arial"><strong>[HKEY_CLASSES_ROOT\\CLSID\\{2559a1f6-21d7-11d4-bdaf-</strong></span></p>\r\n		\r\n<p class="MsoNormal" align="left"><span style="FONT-SIZE: 10pt; COLOR: blue; FONT-FAMILY: Arial"><strong>00c04f60b9f0}\\Instance\\InitPropertyBag]</strong></span></p>\r\n		\r\n<p class="MsoNormal" align="left"><span style="FONT-SIZE: 10pt; COLOR: blue; FONT-FAMILY: Arial"><strong>"CLSID"="{13709620-C279-11CE-A49E-444553540000}"</strong></span></p>\r\n		\r\n<p class="MsoNormal" align="left"><span style="FONT-SIZE: 10pt; COLOR: blue; FONT-FAMILY: Arial"><strong>"method"="ShellExecute"</strong></span></p>\r\n		\r\n<p class="MsoNormal" align="left"><span style="FONT-SIZE: 10pt; COLOR: blue; FONT-FAMILY: Arial"><strong>"Command"="VNECHIP – Where People Go To Know"</strong></span></p>\r\n		\r\n<p class="MsoNormal" align="left"><span style="FONT-SIZE: 10pt; COLOR: blue; FONT-FAMILY: Arial"><strong>"Param1"="http://www.vnechip.com"</strong></span></p>\r\n		\r\n<div class="MsoNormal" align="left"><span style="FONT-SIZE: 10pt; COLOR: black; FONT-FAMILY: Arial"><strong>Lưu tập tin này lại và đặt tên là addwebstartmenu.reg .</strong></span></div><span style="FONT-SIZE: 10pt; COLOR: black; FONT-FAMILY: Arial">\r\n			\r\n<p class="MsoNormal" align="left"><strong><span style="FONT-SIZE: 10pt; COLOR: red; FONT-FAMILY: Arial">3. Thay </span><span style="FONT-SIZE: 10pt; COLOR: red; FONT-FAMILY: Arial">đổ</span><span style="FONT-SIZE: 10pt; COLOR: red; FONT-FAMILY: Arial">i l</span><span style="FONT-SIZE: 10pt; COLOR: red; FONT-FAMILY: Arial">ầ</span><span style="FONT-SIZE: 10pt; COLOR: red; FONT-FAMILY: Arial">n truy c</span><span style="FONT-SIZE: 10pt; COLOR: red; FONT-FAMILY: Arial">ậ</span><span style="FONT-SIZE: 10pt; COLOR: red; FONT-FAMILY: Arial">p tr</span><span style="FONT-SIZE: 10pt; COLOR: red; FONT-FAMILY: Arial">ướ</span><span style="FONT-SIZE: 10pt; COLOR: red; FONT-FAMILY: Arial">c </span><span style="FONT-SIZE: 10pt; COLOR: red; FONT-FAMILY: Arial">đ</span><span style="FONT-SIZE: 10pt; COLOR: red; FONT-FAMILY: Arial">ó trong khóa Registry Editor</span></strong></p>\r\n			\r\n<p class="MsoNormal" align="left"><span style="FONT-SIZE: 10pt; COLOR: black; FONT-FAMILY: Arial"><strong>Bạn làm việc xong với Registry Editor và sau đó thoát khỏi Registry Editor , mặc định Windows</strong></span></p>\r\n			\r\n<p class="MsoNormal" align="left"><span style="FONT-SIZE: 10pt; COLOR: black; FONT-FAMILY: Arial"><strong>XP sẽ lưu khóa , giá trị làm việc trước đó của bạn .</strong></span></p>\r\n			\r\n<p class="MsoNormal" align="left"><span style="FONT-SIZE: 10pt; COLOR: black; FONT-FAMILY: Arial"><strong>Để hạn chế truy cập của người dùng kế tiếp lần sau vào ngay khóa hay giá trị trong Registry mà</strong></span></p>\r\n			\r\n<p class="MsoNormal" align="left"><span style="FONT-SIZE: 10pt; COLOR: black; FONT-FAMILY: Arial"><strong>bạn mở trước đó bạn nên thay đổi lần truy cập trước của bạn .</strong></span></p>\r\n			\r\n<p class="MsoNormal" align="left"><span style="FONT-SIZE: 10pt; COLOR: blue; FONT-FAMILY: Arial"><strong>Welcome To VNECHIP http://www.vnechip.com - Where People Go To Know</strong></span></p>\r\n			\r\n<p class="MsoNormal" align="left"><span style="FONT-SIZE: 10pt; COLOR: blue; FONT-FAMILY: Arial"><strong>VNECHIP – Advanced Technologies , 24/7 Support , Free Fastest Online</strong></span></p>\r\n			\r\n<p class="MsoNormal" align="left"><span style="FONT-SIZE: 10pt; COLOR: black; FONT-FAMILY: Arial"><strong>Bạn mở Notepad và ch&eacute;p đoạn mã sau vào :</strong></span></p>\r\n			\r\n<p class="MsoNormal" align="left"><span style="FONT-SIZE: 10pt; COLOR: blue; FONT-FAMILY: Arial"><strong>Option Explicit</strong></span></p>\r\n			\r\n<p class="MsoNormal" align="left"><span style="FONT-SIZE: 10pt; COLOR: blue; FONT-FAMILY: Arial"><strong>On Error Resume Next</strong></span></p>\r\n			\r\n<p class="MsoNormal" align="left"><span style="FONT-SIZE: 10pt; COLOR: blue; FONT-FAMILY: Arial"><strong>Dim WSHShell</strong></span></p>\r\n			\r\n<p class="MsoNormal" align="left"><span style="FONT-SIZE: 10pt; COLOR: blue; FONT-FAMILY: Arial"><strong>Set WSHShell=Wscript.CreateObject("Wscript.Shell")</strong></span></p>\r\n			\r\n<p class="MsoNormal" align="left"><span style="FONT-SIZE: 10pt; COLOR: blue; FONT-FAMILY: Arial"><strong>WSHShell.RegDelete</strong></span></p>\r\n			\r\n<p class="MsoNormal" align="left"><span style="FONT-SIZE: 10pt; COLOR: blue; FONT-FAMILY: Arial"><strong>"HKCU\\Software\\Microsoft\\Windows\\CurrentVersion\\Applets\\Regedit\\LastKey"</strong></span></p>\r\n			\r\n<p class="MsoNormal" align="left"><span style="FONT-SIZE: 10pt; COLOR: blue; FONT-FAMILY: Arial"><strong>WSHShell.Run "REGEDIT"</strong></span></p>\r\n			\r\n<p class="MsoNormal" align="left"><span style="FONT-SIZE: 10pt; COLOR: blue; FONT-FAMILY: Arial"><strong>Set WSHShell = Nothing</strong></span></p>\r\n			\r\n<div class="MsoNormal" align="left"><span style="FONT-SIZE: 10pt; COLOR: black; FONT-FAMILY: Arial"><strong>Lưu lại và đặt tên cho tập tin này là lastregistry.vbs</strong></span></div><span style="FONT-SIZE: 10pt; COLOR: black; FONT-FAMILY: Arial">\r\n				\r\n<p class="MsoNormal" align="left"><strong><span style="FONT-SIZE: 10pt; COLOR: red; FONT-FAMILY: Arial">4. Thay </span><span style="FONT-SIZE: 10pt; COLOR: red; FONT-FAMILY: Arial">đổ</span><span style="FONT-SIZE: 10pt; COLOR: red; FONT-FAMILY: Arial">i thanh tiêu </span><span style="FONT-SIZE: 10pt; COLOR: red; FONT-FAMILY: Arial">đề</span><span style="FONT-SIZE: 10pt; COLOR: red; FONT-FAMILY: Arial,Bold"> </span><span style="FONT-SIZE: 10pt; COLOR: red; FONT-FAMILY: Arial">trong Internet Explorer</span></strong></p>\r\n				\r\n<p class="MsoNormal" align="left"><span style="FONT-SIZE: 10pt; COLOR: black; FONT-FAMILY: Arial"><strong>Để thay đổi tên trên thanh tiêu đề (Title) của trình duyệt Internet Explorer bạn có thể dùng</strong></span></p>\r\n				\r\n<p class="MsoNormal" align="left"><span style="FONT-SIZE: 10pt; COLOR: black; FONT-FAMILY: Arial"><strong>Registry Editor tuy nhiên nếu bạn là người mới sử dụng Registry lần đầu , bạn sẽ cãm thấy rất</strong></span></p>\r\n				\r\n<p class="MsoNormal" align="left"><span style="FONT-SIZE: 10pt; COLOR: black; FONT-FAMILY: Arial"><strong>khó khăn và bở ngở .</strong></span></p>\r\n				\r\n<p class="MsoNormal" align="left"><span style="FONT-SIZE: 10pt; COLOR: black; FONT-FAMILY: Arial"><strong>Cách làmm sau đây ta sẽ dùng kịch bãn (script) sử dụng công nghệ Windows Scripting Host của</strong></span></p>\r\n				\r\n<p class="MsoNormal" align="left"><span style="FONT-SIZE: 10pt; COLOR: black; FONT-FAMILY: Arial"><strong>Microsoft để giải quyết vấn đề . Đầu tiên bạn mở Notepad lên và ch&eacute;p đọan mã sau vào :</strong></span></p>\r\n				\r\n<p class="MsoNormal" align="left"><span style="FONT-SIZE: 10pt; COLOR: blue; FONT-FAMILY: Arial"><strong>Option Explicit</strong></span></p>\r\n				\r\n<p class="MsoNormal" align="left"><span style="FONT-SIZE: 10pt; COLOR: blue; FONT-FAMILY: Arial"><strong>Set ws = WScript.CreateObject("WScript.Shell")</strong></span></p>\r\n				\r\n<p class="MsoNormal" align="left"><span style="FONT-SIZE: 10pt; COLOR: blue; FONT-FAMILY: Arial"><strong>Dim ws, t, p, p1, n, cn, mybox, itemtype, vbdefaultbutton</strong></span></p>\r\n				\r\n<p class="MsoNormal" align="left"><span style="FONT-SIZE: 10pt; COLOR: blue; FONT-FAMILY: Arial"><strong>p = "HKCU\\Software\\Microsoft\\Internet Explorer\\Main\\Window Title"</strong></span></p>\r\n				\r\n<p class="MsoNormal" align="left"><span style="FONT-SIZE: 10pt; COLOR: blue; FONT-FAMILY: Arial"><strong>itemtype = "REG_SZ"</strong></span></p>\r\n				\r\n<p class="MsoNormal" align="left"><span style="FONT-SIZE: 10pt; COLOR: blue; FONT-FAMILY: Arial"><strong>n = "Advanced Technologies , Fastest Online"</strong></span></p>\r\n				\r\n<p class="MsoNormal" align="left"><span style="FONT-SIZE: 10pt; COLOR: blue; FONT-FAMILY: Arial"><strong>Ws.RegWrite p, n, itemtype</strong></span></p>\r\n				\r\n<p class="MsoNormal" align="left"><span style="FONT-SIZE: 10pt; COLOR: blue; FONT-FAMILY: Arial"><strong>p1 = "HKCU\\Software\\Microsoft\\Internet Explorer\\Main\\"</strong></span></p>\r\n				\r\n<p class="MsoNormal" align="left"><span style="FONT-SIZE: 10pt; COLOR: blue; FONT-FAMILY: Arial"><strong>n = ws.RegRead(p1 &amp; "Window Title")</strong></span></p>\r\n				\r\n<p class="MsoNormal" align="left"><span style="FONT-SIZE: 10pt; COLOR: blue; FONT-FAMILY: Arial"><strong>t = "Thay doi ten cho thanh tieu de"</strong></span></p>\r\n				\r\n<p class="MsoNormal" align="left"><span style="FONT-SIZE: 10pt; COLOR: blue; FONT-FAMILY: Arial"><strong>cn = InputBox("Nhap ten moi cho thanh tieu de va nhan nut OK .", t, n)</strong></span></p>\r\n				\r\n<p class="MsoNormal" align="left"><span style="FONT-SIZE: 10pt; COLOR: blue; FONT-FAMILY: Arial"><strong>If cn &lt;> "" Then</strong></span></p>\r\n				\r\n<p class="MsoNormal" align="left"><span style="FONT-SIZE: 10pt; COLOR: blue; FONT-FAMILY: Arial"><strong>ws.RegWrite p1 &amp; "Window Title", cn</strong></span></p>\r\n				\r\n<p class="MsoNormal" align="left"><span style="FONT-SIZE: 10pt; COLOR: blue; FONT-FAMILY: Arial"><strong>End If</strong></span></p>\r\n				\r\n<p class="MsoNormal" align="left"><span style="FONT-SIZE: 10pt; COLOR: blue; FONT-FAMILY: Arial"><strong>VisitKelly''s Korner</strong></span></p>\r\n				\r\n<p class="MsoNormal" align="left"><span style="FONT-SIZE: 10pt; COLOR: blue; FONT-FAMILY: Arial"><strong>Sub VisitKelly''s Korner</strong></span></p>\r\n				\r\n<p class="MsoNormal" align="left"><span style="FONT-SIZE: 10pt; COLOR: blue; FONT-FAMILY: Arial"><strong>If MsgBox("Welcome to http://www.vnechip.com" &amp; vbCRLF &amp; vbCRLF &amp;"VNECHIP",</strong></span></p>\r\n				\r\n<p class="MsoNormal" align="left"><span style="FONT-SIZE: 10pt; COLOR: blue; FONT-FAMILY: Arial"><strong>vbQuestion + vbYesNo + vbDefaultButton, "VNECHIP – Where People Go To Know") =6 Then</strong></span></p>\r\n				\r\n<p class="MsoNormal" align="left"><span style="FONT-SIZE: 10pt; COLOR: blue; FONT-FAMILY: Arial"><strong>ws.Run "http://www.vnechip.com"</strong></span></p>\r\n				\r\n<p class="MsoNormal" align="left"><span style="FONT-SIZE: 10pt; COLOR: blue; FONT-FAMILY: Arial"><strong>End If</strong></span></p>\r\n				\r\n<p class="MsoNormal" align="left"><span style="FONT-SIZE: 10pt; COLOR: blue; FONT-FAMILY: Arial"><strong>End Sub</strong></span></p>\r\n				\r\n<p class="MsoNormal" align="left"><span style="FONT-SIZE: 10pt; COLOR: black; FONT-FAMILY: Arial"><strong>Lưu tập tin này lại với tên là changetitle.vbs</strong></span></p><span style="FONT-SIZE: 10pt; COLOR: red; FONT-FAMILY: Arial">\r\n					\r\n<p class="MsoNormal" align="left"><strong><span style="FONT-SIZE: 10pt; COLOR: red; FONT-FAMILY: Arial">5. Cho ph&eacute;p </span><span style="FONT-SIZE: 10pt; COLOR: red; FONT-FAMILY: Arial">đă</span><span style="FONT-SIZE: 10pt; COLOR: red; FONT-FAMILY: Arial">ng nh</span><span style="FONT-SIZE: 10pt; COLOR: red; FONT-FAMILY: Arial">ậ</span><span style="FONT-SIZE: 10pt; COLOR: red; FONT-FAMILY: Arial">p Remote Desktop</span></strong></p>\r\n					\r\n<p class="MsoNormal" align="left"><span style="FONT-SIZE: 10pt; COLOR: black; FONT-FAMILY: Arial"><strong>Để tự động đăng nhập từ một máy tính chạy hệ điều hành Windows XP thông qua chức năng</strong></span></p>\r\n					\r\n<p class="MsoNormal" align="left"><span style="FONT-SIZE: 10pt; COLOR: black; FONT-FAMILY: Arial"><strong>Remote Desktop . Trước tiên bạn đăng nhập vào máy tính với quyền Administrator</strong></span></p>\r\n					\r\n<p class="MsoNormal" align="left"><span style="FONT-SIZE: 10pt; COLOR: black; FONT-FAMILY: Arial"><strong>Vào Start – Run gõ mmc và nhấn phím Enter . Chọn File – Add/Remove Snap-in . Chọn Add và</strong></span></p>\r\n					\r\n<p class="MsoNormal" align="left"><span style="FONT-SIZE: 10pt; COLOR: black; FONT-FAMILY: Arial"><strong>khi đó nhấn Add/Remove Snap-in . Chọn tiếp Add – Group Policy , chọn Add và khi đó nhấn</strong></span></p>\r\n					\r\n<p class="MsoNormal" align="left"><span style="FONT-SIZE: 10pt; COLOR: black; FONT-FAMILY: Arial"><strong>Finish . Nhấn Close và chọn OK .</strong></span></p>\r\n					\r\n<p class="MsoNormal" align="left"><strong><span style="FONT-SIZE: 10pt; COLOR: black; FONT-FAMILY: Arial">Bạn mở tiếp </span><span style="FONT-SIZE: 10pt; COLOR: blue; FONT-FAMILY: Arial">Local Computer Policy/Computer Configuration/Administrative Templates/Windows</span></strong></p>\r\n					\r\n<p class="MsoNormal" align="left"><span style="FONT-SIZE: 10pt; COLOR: blue; FONT-FAMILY: Arial"><strong>Components/Terminal Services/Encryption and Security</strong></span></p>\r\n					\r\n<div class="MsoNormal" align="left"><strong><span style="FONT-SIZE: 10pt; COLOR: black; FONT-FAMILY: Arial">Tìm </span><span style="FONT-SIZE: 10pt; COLOR: blue; FONT-FAMILY: Arial">Always prompt client for password upon connection </span><span style="FONT-SIZE: 10pt; COLOR: black; FONT-FAMILY: Arial">và chọn mục Disabled</span></strong></div><span style="FONT-SIZE: 10pt; COLOR: black; FONT-FAMILY: Arial">\r\n						\r\n<p class="MsoNormal" align="left"><strong><span style="FONT-SIZE: 10pt; COLOR: red; FONT-FAMILY: Arial">6. Sao ch&eacute;p th</span><span style="FONT-SIZE: 10pt; COLOR: red; FONT-FAMILY: Arial">ư</span><span style="FONT-SIZE: 10pt; COLOR: red; FONT-FAMILY: Arial,Bold"> </span><span style="FONT-SIZE: 10pt; COLOR: red; FONT-FAMILY: Arial">m</span><span style="FONT-SIZE: 10pt; COLOR: red; FONT-FAMILY: Arial">ụ</span><span style="FONT-SIZE: 10pt; COLOR: red; FONT-FAMILY: Arial">c b</span><span style="FONT-SIZE: 10pt; COLOR: red; FONT-FAMILY: Arial">ằ</span><span style="FONT-SIZE: 10pt; COLOR: red; FONT-FAMILY: Arial">ng dòng l</span><span style="FONT-SIZE: 10pt; COLOR: red; FONT-FAMILY: Arial">ệ</span><span style="FONT-SIZE: 10pt; COLOR: red; FONT-FAMILY: Arial">nh</span></strong></p>\r\n						\r\n<p class="MsoNormal" align="left"><span style="FONT-SIZE: 10pt; COLOR: black; FONT-FAMILY: Arial"><strong>Trong môi trường Command Promt bạn có thể sử dụng lệnh Xcopy để sao ch&eacute;p các thư mục từ</strong></span></p>\r\n						\r\n<p class="MsoNormal" align="left"><span style="FONT-SIZE: 10pt; COLOR: black; FONT-FAMILY: Arial"><strong>ổ đĩa này sang ổ đĩa khác .</strong></span></p>\r\n						\r\n<p class="MsoNormal" align="left"><span style="FONT-SIZE: 10pt; COLOR: black; FONT-FAMILY: Arial"><strong>Giả sữ bạn muốn sao ch&eacute;p tòan bộ thư mục Phuoc trong ổ đĩa G: sang ổ đĩa N: bạn làm như</strong></span></p>\r\n						\r\n<p class="MsoNormal" align="left"><span style="FONT-SIZE: 10pt; COLOR: black; FONT-FAMILY: Arial"><strong>sau :</strong></span></p>\r\n						\r\n<p class="MsoNormal" align="left"><span style="FONT-SIZE: 10pt; COLOR: black; FONT-FAMILY: Arial"><strong>Vào Start – Run gỏ cmd và nhấn phím Enter . Trong cửa sổ Comand Prompt bạn gỏ như sau :</strong></span></p>\r\n						\r\n<p class="MsoNormal" align="left"><strong><span style="FONT-SIZE: 10pt; COLOR: blue; FONT-FAMILY: Arial">xcopy /E /Y /Q "G:\\Phuoc\\*.*" "N:\\Phuoc\\*.*" </span><span style="FONT-SIZE: 10pt; COLOR: black; FONT-FAMILY: Arial">Nhấn phím Enter .</span></strong></p>\r\n						\r\n<p class="MsoNormal" align="left"><span style="FONT-SIZE: 10pt; COLOR: black; FONT-FAMILY: Arial"><strong>Trong đó :</strong></span></p>\r\n						\r\n<p class="MsoNormal" align="left"><strong>xcopy : Chức năng sao ch&eacute;p tất cả các tập tin và thư mục bao gồm các thư mục .</strong></p>\r\n						\r\n<p class="MsoNormal" align="left"><strong>/E : Ch&eacute;p tất cả các thư mục con .</strong></p>\r\n						\r\n<p class="MsoNormal" align="left"><strong>/Y : Nếu nơi đến (Destination) của thư mục mà bạn muốn sao ch&eacute;p đến tồn tại tập tin này thì bạn</strong></p>\r\n						\r\n<p class="MsoNormal" align="left"><span style="FONT-SIZE: 10pt; COLOR: black; FONT-FAMILY: Arial"><strong>có thể ghi đè nó .</strong></span></p>\r\n						\r\n<p class="MsoNormal" align="left"><strong>/Q : Không cho hiển thị thông tin trong quá trình sao ch&eacute;p .</strong></p>\r\n						\r\n<p class="MsoNormal" align="left"><strong><span style="FONT-SIZE: 10pt; COLOR: black; FONT-FAMILY: Arial">Để tìm hiểu thêm về lệnh này , bạn có thể dùng lệnh </span><span style="FONT-SIZE: 10pt; COLOR: blue; FONT-FAMILY: Arial">xcopy /? </span><span style="FONT-SIZE: 10pt; COLOR: black; FONT-FAMILY: Arial">Và nhấn phím Enter hoặc chọn</span></strong></p>\r\n						\r\n<div class="MsoNormal" align="left"><strong>Help and Support để xem thông tin chi tiết về lệnh này .</strong></div>\r\n						\r\n<div class="MsoNormal" align="left"><span style="FONT-SIZE: 10pt; COLOR: black; FONT-FAMILY: Arial">&nbsp;</span></div>\r\n						\r\n<div class="MsoNormal" align="left"><span style="FONT-SIZE: 10pt; COLOR: black; FONT-FAMILY: Arial"><strong><span style="FONT-SIZE: 10pt; COLOR: red; FONT-FAMILY: Arial">7. Chat trong m</span><span style="FONT-SIZE: 10pt; COLOR: red; FONT-FAMILY: Arial">ạ</span><span style="FONT-SIZE: 10pt; COLOR: red; FONT-FAMILY: Arial">ng LAN</span></strong></span></div>\r\n						\r\n<div class="MsoNormal" align="left"><span style="FONT-SIZE: 10pt; COLOR: black; FONT-FAMILY: Arial"><strong>&nbsp;Để chat trong mạng LAN bạn dùng trình tiện ích Net Send , chẳng hạn như bạn muốn gởi một</strong></span></div>\r\n						\r\n<div class="MsoNormal" align="left"><span style="FONT-SIZE: 10pt; COLOR: black; FONT-FAMILY: Arial"><span style="FONT-SIZE: 10pt; COLOR: black; FONT-FAMILY: Arial"></span><strong><span style="FONT-SIZE: 10pt; COLOR: black; FONT-FAMILY: Arial">thông điệp cho một máy tính nào đó trong mạng LAN thì bạn làm như sau :</span><span style="FONT-SIZE: 10pt; COLOR: black; FONT-FAMILY: Arial">Vào Start - Run gõ cmd và nhấn phím Enter . Gõ net send [tên máy tính/địa chĩ IP của máy tính</span><span style="FONT-SIZE: 10pt; COLOR: black; FONT-FAMILY: Arial">đó] [thôpng điệp cần gửi nhấn Enter .</span><span style="FONT-SIZE: 10pt; COLOR: black; FONT-FAMILY: Arial">Chẳng hạn như bạn muốn gởi thông điệp đến một máy tính có địa chỉ IP là 10.96.50.1 và thông</span><span style="FONT-SIZE: 10pt; COLOR: black; FONT-FAMILY: Arial">điệp là : Ăn sáng nha cưng ! thì bạn làm như sau :</span><span style="FONT-SIZE: 10pt; COLOR: blue; FONT-FAMILY: Arial">net send 10.96.50.1 An sang nha cung !</span></strong></span></div>\r\n						\r\n<div class="MsoNormal" align="left"><span style="FONT-SIZE: 10pt; COLOR: black; FONT-FAMILY: Arial"><span style="FONT-SIZE: 10pt; COLOR: blue; FONT-FAMILY: Arial">&nbsp;</span></span></div>\r\n						\r\n<div class="MsoNormal" align="left"><span style="FONT-SIZE: 10pt; COLOR: black; FONT-FAMILY: Arial"><span style="FONT-SIZE: 10pt; COLOR: blue; FONT-FAMILY: Arial"><span style="FONT-SIZE: 10pt; COLOR: red; FONT-FAMILY: Arial"><strong>8. Windows Messenger</strong></span></span></span></div>\r\n						\r\n<div class="MsoNormal" align="left"><span style="FONT-SIZE: 10pt; COLOR: black; FONT-FAMILY: Arial"><span style="FONT-SIZE: 10pt; COLOR: blue; FONT-FAMILY: Arial"><strong>&nbsp;Đây là một dịch vụ thường trú của Windows XP dành cho việc kết nối Internet. Bạn có thể vô<span style="FONT-SIZE: 10pt; COLOR: black; FONT-FAMILY: Arial">hiệu hoá nó bằng cách mở Start/All Programs/Windows messenger.</span><span style="FONT-SIZE: 10pt; COLOR: black; FONT-FAMILY: Arial">Trong lần chạy đầu tiên, bạn sẽ thấy hộp thoại chào mừng, bạn bấm nút Cancel để đóng hộp </span><span style="FONT-SIZE: 10pt; COLOR: black; FONT-FAMILY: Arial">thoại này. Trong lần chạy sau, bạn mở menu Tools/Options/Preferences, xoá dấu chọn 2 mục</span><span style="FONT-SIZE: 10pt; COLOR: black; FONT-FAMILY: Arial">Run this program when Windows starts và Allow this program to run in the background.</span></strong></span></span></div>\r\n						\r\n<div class="MsoNormal" align="right"><span style="FONT-SIZE: 10pt; COLOR: black; FONT-FAMILY: Arial"><span style="FONT-SIZE: 10pt; COLOR: blue; FONT-FAMILY: Arial"><span style="FONT-SIZE: 10pt; COLOR: black; FONT-FAMILY: Arial"><em>Nguồn : <span style="COLOR: #0000ff">http://www.vnechip.com </span></em></span></span></span></div></span></span></span></span></span></span>', 1, 1);
INSERT INTO `chucnang` VALUES (11, 'Laptop trả góp', 'lap_top_tra_gop.png', '', 3, 1);
INSERT INTO `chucnang` VALUES (5, 'Music&Moves', 'pointer_green.gif', '', 2, 1);
INSERT INTO `chucnang` VALUES (4, 'Photos', 'pointer_green.gif', '\r\n<p style="margin: 0in 0in 10pt;" class="MsoNormal"><span style="">\r\n		\r\n		<v:shapetype coordsize="21600,21600" o:spt="75" o:preferrelative="t" path="m@4@5l@4@11@9@11@9@5xe" filled="f" stroked="f" id="_x0000_t75">\r\n			\r\n			<v:stroke joinstyle="miter"></v:stroke>\r\n			\r\n			<v:formulas>\r\n				\r\n				<v:f eqn="if lineDrawn pixelLineWidth 0"></v:f>\r\n				\r\n				<v:f eqn="sum @0 1 0"></v:f>\r\n				\r\n				<v:f eqn="sum 0 0 @1"></v:f>\r\n				\r\n				<v:f eqn="prod @2 1 2"></v:f>\r\n				\r\n				<v:f eqn="prod @3 21600 pixelWidth"></v:f>\r\n				\r\n				<v:f eqn="prod @3 21600 pixelHeight"></v:f>\r\n				\r\n				<v:f eqn="sum @0 0 1"></v:f>\r\n				\r\n				<v:f eqn="prod @6 1 2"></v:f>\r\n				\r\n				<v:f eqn="prod @7 21600 pixelWidth"></v:f>\r\n				\r\n				<v:f eqn="sum @8 21600 0"></v:f>\r\n				\r\n				<v:f eqn="prod @7 21600 pixelHeight"></v:f>\r\n				\r\n				<v:f eqn="sum @10 21600 0"></v:f></v:formulas>\r\n			\r\n			<v:path o:extrusionok="f" gradientshapeok="t" o:connecttype="rect"></v:path>\r\n			\r\n			<o:lock v:ext="edit" aspectratio="t"></o:lock></v:shapetype>\r\n		\r\n</span></p>\r\n<p style="margin: 0in 0in 10pt;" class="MsoNormal"><span lang="VI" style="font-family: ''Arial'',''sans-serif'';">\r\n				\r\n		<o:p></o:p>\r\n				\r\n</span></p>\r\n<p style="text-align: center;">\r\n					Chưa cập nhật<br />\r\n	</p>\r\n<!--\r\n?xml:namespace\r\n-->\r\n\r\n<p>&nbsp;</p>\r\n<!--\r\n?xml:namespace\r\n-->\r\n\r\n<p>&nbsp;</p>', 2, 1);
INSERT INTO `chucnang` VALUES (12, 'Sinh viên', 'danh_cho_SV.png', '\r\n\r\n<p class="Title" align="left">&nbsp;</p>\r\n\r\n<h2>''Ngày hội máy tính'' dành cho sinh viên</h2>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p class="Lead" align="left">Giữa tháng 9, hãng máy tính HP, nhà sản xuất bộ vi xử lý AMD và công ty bán lẻ máy tính Bảo An sẽ cùng kết hợp để tổ chức sự kiện dành cho sinh viên các trường công nghệ tại Hà Nội. </p>\r\n\r\n<p class="Normal" align="left">Chương trình dự kiến mở màn tại ĐH Bách Khoa đầu tiên vào thứ bảy 19/9, tiếp sau sẽ là ĐH Giao thông Vận tải (26/9) và ĐH Khoa học Tự nhiên - Quốc gia Hà Nội (10/10).</p>\r\n\r\n<table border="0" cellspacing="0" cellpadding="3" width="1" align="center">\r\n	\r\n<tbody>\r\n		\r\n<tr>\r\n			\r\n<td></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p class="Normal" align="left">Các nhà tổ chức mong muốn đem đến những kiến thức bổ ích và giải pháp toàn diện cho sinh viên khi lựa chọn và sử dụng máy tính. Ngoài ra, chương trình còn là sân chơi để giao lưu, học hỏi và là cơ hội tốt để sinh viên có thể chọn mua cho mình các sản phẩm công nghệ chính hãng với giá khá mềm.</p>\r\n\r\n<p class="Normal">Mỗi chương trình sẽ diễn ra trọn một ngày (từ 9h đến 22h) với nhiều hoạt động dành cho sinh viên như hội chợ công nghệ với gian hàng của các hãng nổi tiếng về phần cứng và phần mềm như ECS, MSI, Kingston, Cooler Master, WD, D-Link, Viami Software... Chương trình còn có bán hàng giá ưu đãi cho sinh viên, hội thảo công nghệ, thi đấu game với hệ thống máy tính cấu hình cao, thi xây dựng cấu hình máy tính, giao lưu giải đáp thắc mắc, văn nghệ tổng hợp, bốc thăm trúng thưởng...</p>\r\n\r\n<p class="Normal">Dự kiến trong chương trình, HP, AMD và Bảo An sẽ đưa ra cấu hình máy tính để bàn hiệu năng cao với giá ưu đãi sinh viên.</p>\r\n\r\n<p class="Normal">Chi tiết về chương trình được cập nhật trên website <a href="http://www.starcomputer.com.vn">www.starcomputer.com.vn</a></p>', 3, 1);

-- --------------------------------------------------------

-- 
-- Table structure for table `chungloai`
-- 

CREATE TABLE `chungloai` (
  `idCL` int(9) NOT NULL auto_increment,
  `TenCL` varchar(250) NOT NULL,
  `LinhTinh` tinyint(1) default '0',
  `AnHien` tinyint(1) default '1',
  PRIMARY KEY  (`idCL`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='Chủng loại sản phẩm' AUTO_INCREMENT=15 ;

-- 
-- Dumping data for table `chungloai`
-- 

INSERT INTO `chungloai` VALUES (1, ' Mainboard', 0, 1);
INSERT INTO `chungloai` VALUES (2, 'CPU', 0, 1);
INSERT INTO `chungloai` VALUES (6, 'Destop', 0, 1);
INSERT INTO `chungloai` VALUES (3, 'HDD', 0, 1);
INSERT INTO `chungloai` VALUES (7, 'Keyboard', 0, 1);
INSERT INTO `chungloai` VALUES (9, 'HDD External', 0, 1);
INSERT INTO `chungloai` VALUES (4, 'Ram', 0, 1);
INSERT INTO `chungloai` VALUES (8, 'Soundcard', 0, 1);
INSERT INTO `chungloai` VALUES (10, 'Mouse', 0, 1);
INSERT INTO `chungloai` VALUES (11, 'Loa', 0, 1);
INSERT INTO `chungloai` VALUES (12, 'Máy chiếu', 0, 1);
INSERT INTO `chungloai` VALUES (13, 'Máy chủ', 0, 1);
INSERT INTO `chungloai` VALUES (14, 'Bộ nguồn', 0, 1);

-- --------------------------------------------------------

-- 
-- Table structure for table `counter`
-- 

CREATE TABLE `counter` (
  `counter` int(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Dumping data for table `counter`
-- 

INSERT INTO `counter` VALUES (10405);

-- --------------------------------------------------------

-- 
-- Table structure for table `donhang`
-- 

CREATE TABLE `donhang` (
  `idDH` int(4) NOT NULL auto_increment,
  `idUser` int(4) NOT NULL default '0',
  `ThoiDiemDatHang` date NOT NULL default '0000-00-00',
  `ThoiDiemGiaohang` date NOT NULL default '0000-00-00',
  `TenNguoiNhan` varchar(100) NOT NULL default '',
  `DiaDiemGiaoHang` varchar(255) NOT NULL default '',
  `TinhTrang` tinyint(1) NOT NULL default '0',
  `GhiChu` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`idDH`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

-- 
-- Dumping data for table `donhang`
-- 

INSERT INTO `donhang` VALUES (1, 21, '2011-01-29', '2011-01-31', 'Huynh Van Duoc', 'DakNong', 0, '        \r\n     Mang tan noi ');
INSERT INTO `donhang` VALUES (2, 21, '2011-01-29', '2011-01-31', 'Huynh Van Duoc', 'Binh Duong', 0, '        \r\n      ');
INSERT INTO `donhang` VALUES (3, 21, '2011-01-29', '2011-01-02', 'duoc', 'dsds', 0, '        \r\n      ');
INSERT INTO `donhang` VALUES (4, 21, '2011-01-29', '2011-01-29', 'Huynh Van Duoc', 'fgfgf', 0, '        \r\n      ');
INSERT INTO `donhang` VALUES (5, 21, '2011-01-29', '2011-01-29', 'Huynh Van Duoc', 'DaKnong', 0, '        \r\n      Mang toi anh Huynh Van Duoc');
INSERT INTO `donhang` VALUES (6, 21, '2011-01-29', '2011-01-29', '3', 'sd', 0, '        \r\n      ');
INSERT INTO `donhang` VALUES (7, 21, '2011-01-29', '2011-01-29', 'Huynh Van Duoc', 'Binh Duong', 0, '        \r\n      ');
INSERT INTO `donhang` VALUES (8, 21, '2011-01-29', '2011-01-29', 'fdf', 'dfdfd', 0, '        \r\n      ');
INSERT INTO `donhang` VALUES (9, 21, '2011-01-29', '2011-01-28', 'Huynh Van Duoc', 'DaKNong', 0, '        \r\n      ');
INSERT INTO `donhang` VALUES (10, 21, '2011-01-29', '2011-01-31', 'duoc', '`dfdfdf', 0, '        \r\n      ');
INSERT INTO `donhang` VALUES (11, 21, '2011-01-30', '2011-01-30', 'duoc', 'daknong', 0, '        \r\n      ');
INSERT INTO `donhang` VALUES (12, 20, '2011-01-30', '2011-01-31', 'duoc', '123', 0, '        \r\n      ');
INSERT INTO `donhang` VALUES (13, 21, '2011-02-01', '2011-02-28', 'Huynh Van Duoc', 'DakNong', 0, '        \r\n      ');
INSERT INTO `donhang` VALUES (14, 21, '2011-02-02', '2011-02-28', 'Duoc', 'DakNong', 0, '        \r\n      ');
INSERT INTO `donhang` VALUES (15, 21, '2011-02-02', '2011-02-14', 'Huynh Van Duoc', 'Thành phố DakNong', 0, '        \r\n      ');
INSERT INTO `donhang` VALUES (16, 21, '2011-02-11', '2011-02-11', 'Huynh Van Duoc', 'DakNong', 0, '        \r\n      ');

-- --------------------------------------------------------

-- 
-- Table structure for table `donhangchitiet`
-- 

CREATE TABLE `donhangchitiet` (
  `idChiTiet` int(4) NOT NULL auto_increment,
  `idDH` int(4) NOT NULL default '0',
  `idSP` int(4) NOT NULL default '0',
  `SoLuong` int(4) NOT NULL default '0',
  `Gia` int(4) NOT NULL default '0',
  PRIMARY KEY  (`idChiTiet`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=805 ;

-- 
-- Dumping data for table `donhangchitiet`
-- 

INSERT INTO `donhangchitiet` VALUES (1, 1, 33, 1, 2500000);
INSERT INTO `donhangchitiet` VALUES (2, 1, 35, 1, 1760000);
INSERT INTO `donhangchitiet` VALUES (3, 1, 21, 1, 146000);
INSERT INTO `donhangchitiet` VALUES (4, 1, 36, 1, 12500000);
INSERT INTO `donhangchitiet` VALUES (5, 1, 33, 1, 2500000);
INSERT INTO `donhangchitiet` VALUES (6, 2, 33, 1, 2500000);
INSERT INTO `donhangchitiet` VALUES (7, 1, 35, 1, 1760000);
INSERT INTO `donhangchitiet` VALUES (8, 2, 35, 1, 1760000);
INSERT INTO `donhangchitiet` VALUES (9, 1, 21, 1, 146000);
INSERT INTO `donhangchitiet` VALUES (10, 2, 21, 1, 146000);
INSERT INTO `donhangchitiet` VALUES (11, 1, 36, 1, 12500000);
INSERT INTO `donhangchitiet` VALUES (12, 2, 36, 1, 12500000);
INSERT INTO `donhangchitiet` VALUES (13, 1, 33, 1, 2500000);
INSERT INTO `donhangchitiet` VALUES (14, 2, 33, 1, 2500000);
INSERT INTO `donhangchitiet` VALUES (15, 3, 33, 1, 2500000);
INSERT INTO `donhangchitiet` VALUES (16, 1, 35, 1, 1760000);
INSERT INTO `donhangchitiet` VALUES (17, 2, 35, 1, 1760000);
INSERT INTO `donhangchitiet` VALUES (18, 3, 35, 1, 1760000);
INSERT INTO `donhangchitiet` VALUES (19, 1, 21, 1, 146000);
INSERT INTO `donhangchitiet` VALUES (20, 2, 21, 1, 146000);
INSERT INTO `donhangchitiet` VALUES (21, 3, 21, 1, 146000);
INSERT INTO `donhangchitiet` VALUES (22, 1, 36, 1, 12500000);
INSERT INTO `donhangchitiet` VALUES (23, 2, 36, 1, 12500000);
INSERT INTO `donhangchitiet` VALUES (24, 3, 36, 1, 12500000);
INSERT INTO `donhangchitiet` VALUES (25, 1, 33, 1, 2500000);
INSERT INTO `donhangchitiet` VALUES (26, 1, 35, 1, 1760000);
INSERT INTO `donhangchitiet` VALUES (27, 1, 21, 1, 146000);
INSERT INTO `donhangchitiet` VALUES (28, 1, 36, 1, 12500000);
INSERT INTO `donhangchitiet` VALUES (29, 2, 33, 1, 2500000);
INSERT INTO `donhangchitiet` VALUES (30, 2, 35, 1, 1760000);
INSERT INTO `donhangchitiet` VALUES (31, 2, 21, 1, 146000);
INSERT INTO `donhangchitiet` VALUES (32, 2, 36, 1, 12500000);
INSERT INTO `donhangchitiet` VALUES (33, 3, 33, 1, 2500000);
INSERT INTO `donhangchitiet` VALUES (34, 3, 35, 1, 1760000);
INSERT INTO `donhangchitiet` VALUES (35, 3, 21, 1, 146000);
INSERT INTO `donhangchitiet` VALUES (36, 3, 36, 1, 12500000);
INSERT INTO `donhangchitiet` VALUES (37, 4, 33, 1, 2500000);
INSERT INTO `donhangchitiet` VALUES (38, 4, 35, 1, 1760000);
INSERT INTO `donhangchitiet` VALUES (39, 4, 21, 1, 146000);
INSERT INTO `donhangchitiet` VALUES (40, 4, 36, 1, 12500000);
INSERT INTO `donhangchitiet` VALUES (41, 1, 33, 1, 2500000);
INSERT INTO `donhangchitiet` VALUES (42, 2, 33, 1, 2500000);
INSERT INTO `donhangchitiet` VALUES (43, 3, 33, 1, 2500000);
INSERT INTO `donhangchitiet` VALUES (44, 4, 33, 1, 2500000);
INSERT INTO `donhangchitiet` VALUES (45, 5, 33, 1, 2500000);
INSERT INTO `donhangchitiet` VALUES (46, 1, 26, 1, 180000);
INSERT INTO `donhangchitiet` VALUES (47, 2, 26, 1, 180000);
INSERT INTO `donhangchitiet` VALUES (48, 3, 26, 1, 180000);
INSERT INTO `donhangchitiet` VALUES (49, 4, 26, 1, 180000);
INSERT INTO `donhangchitiet` VALUES (50, 5, 26, 1, 180000);
INSERT INTO `donhangchitiet` VALUES (51, 1, 20, 1, 20000000);
INSERT INTO `donhangchitiet` VALUES (52, 2, 20, 1, 20000000);
INSERT INTO `donhangchitiet` VALUES (53, 3, 20, 1, 20000000);
INSERT INTO `donhangchitiet` VALUES (54, 4, 20, 1, 20000000);
INSERT INTO `donhangchitiet` VALUES (55, 5, 20, 1, 20000000);
INSERT INTO `donhangchitiet` VALUES (56, 1, 32, 1, 177000);
INSERT INTO `donhangchitiet` VALUES (57, 2, 32, 1, 177000);
INSERT INTO `donhangchitiet` VALUES (58, 3, 32, 1, 177000);
INSERT INTO `donhangchitiet` VALUES (59, 4, 32, 1, 177000);
INSERT INTO `donhangchitiet` VALUES (60, 5, 32, 1, 177000);
INSERT INTO `donhangchitiet` VALUES (61, 1, 33, 1, 2500000);
INSERT INTO `donhangchitiet` VALUES (62, 2, 33, 1, 2500000);
INSERT INTO `donhangchitiet` VALUES (63, 3, 33, 1, 2500000);
INSERT INTO `donhangchitiet` VALUES (64, 4, 33, 1, 2500000);
INSERT INTO `donhangchitiet` VALUES (65, 5, 33, 1, 2500000);
INSERT INTO `donhangchitiet` VALUES (66, 1, 33, 1, 2500000);
INSERT INTO `donhangchitiet` VALUES (67, 2, 33, 1, 2500000);
INSERT INTO `donhangchitiet` VALUES (68, 3, 33, 1, 2500000);
INSERT INTO `donhangchitiet` VALUES (69, 4, 33, 1, 2500000);
INSERT INTO `donhangchitiet` VALUES (70, 5, 33, 1, 2500000);
INSERT INTO `donhangchitiet` VALUES (71, 1, 33, 1, 2500000);
INSERT INTO `donhangchitiet` VALUES (72, 2, 33, 1, 2500000);
INSERT INTO `donhangchitiet` VALUES (73, 3, 33, 1, 2500000);
INSERT INTO `donhangchitiet` VALUES (74, 4, 33, 1, 2500000);
INSERT INTO `donhangchitiet` VALUES (75, 5, 33, 1, 2500000);
INSERT INTO `donhangchitiet` VALUES (76, 1, 34, 1, 35000000);
INSERT INTO `donhangchitiet` VALUES (77, 1, 35, 1, 1760000);
INSERT INTO `donhangchitiet` VALUES (78, 1, 36, 1, 12500000);
INSERT INTO `donhangchitiet` VALUES (79, 2, 34, 1, 35000000);
INSERT INTO `donhangchitiet` VALUES (80, 2, 35, 1, 1760000);
INSERT INTO `donhangchitiet` VALUES (81, 2, 36, 1, 12500000);
INSERT INTO `donhangchitiet` VALUES (82, 3, 34, 1, 35000000);
INSERT INTO `donhangchitiet` VALUES (83, 3, 35, 1, 1760000);
INSERT INTO `donhangchitiet` VALUES (84, 3, 36, 1, 12500000);
INSERT INTO `donhangchitiet` VALUES (85, 4, 34, 1, 35000000);
INSERT INTO `donhangchitiet` VALUES (86, 4, 35, 1, 1760000);
INSERT INTO `donhangchitiet` VALUES (87, 4, 36, 1, 12500000);
INSERT INTO `donhangchitiet` VALUES (88, 5, 34, 1, 35000000);
INSERT INTO `donhangchitiet` VALUES (89, 5, 35, 1, 1760000);
INSERT INTO `donhangchitiet` VALUES (90, 5, 36, 1, 12500000);
INSERT INTO `donhangchitiet` VALUES (91, 6, 34, 1, 35000000);
INSERT INTO `donhangchitiet` VALUES (92, 6, 35, 1, 1760000);
INSERT INTO `donhangchitiet` VALUES (93, 6, 36, 1, 12500000);
INSERT INTO `donhangchitiet` VALUES (94, 1, 20, 1, 20000000);
INSERT INTO `donhangchitiet` VALUES (95, 1, 21, 1, 146000);
INSERT INTO `donhangchitiet` VALUES (96, 1, 23, 1, 176000);
INSERT INTO `donhangchitiet` VALUES (97, 1, 32, 1, 177000);
INSERT INTO `donhangchitiet` VALUES (98, 1, 35, 1, 1760000);
INSERT INTO `donhangchitiet` VALUES (99, 2, 20, 1, 20000000);
INSERT INTO `donhangchitiet` VALUES (100, 2, 21, 1, 146000);
INSERT INTO `donhangchitiet` VALUES (101, 2, 23, 1, 176000);
INSERT INTO `donhangchitiet` VALUES (102, 2, 32, 1, 177000);
INSERT INTO `donhangchitiet` VALUES (103, 2, 35, 1, 1760000);
INSERT INTO `donhangchitiet` VALUES (104, 3, 20, 1, 20000000);
INSERT INTO `donhangchitiet` VALUES (105, 3, 21, 1, 146000);
INSERT INTO `donhangchitiet` VALUES (106, 3, 23, 1, 176000);
INSERT INTO `donhangchitiet` VALUES (107, 3, 32, 1, 177000);
INSERT INTO `donhangchitiet` VALUES (108, 3, 35, 1, 1760000);
INSERT INTO `donhangchitiet` VALUES (109, 4, 20, 1, 20000000);
INSERT INTO `donhangchitiet` VALUES (110, 4, 21, 1, 146000);
INSERT INTO `donhangchitiet` VALUES (111, 4, 23, 1, 176000);
INSERT INTO `donhangchitiet` VALUES (112, 4, 32, 1, 177000);
INSERT INTO `donhangchitiet` VALUES (113, 4, 35, 1, 1760000);
INSERT INTO `donhangchitiet` VALUES (114, 5, 20, 1, 20000000);
INSERT INTO `donhangchitiet` VALUES (115, 5, 21, 1, 146000);
INSERT INTO `donhangchitiet` VALUES (116, 5, 23, 1, 176000);
INSERT INTO `donhangchitiet` VALUES (117, 5, 32, 1, 177000);
INSERT INTO `donhangchitiet` VALUES (118, 5, 35, 1, 1760000);
INSERT INTO `donhangchitiet` VALUES (119, 6, 20, 1, 20000000);
INSERT INTO `donhangchitiet` VALUES (120, 6, 21, 1, 146000);
INSERT INTO `donhangchitiet` VALUES (121, 6, 23, 1, 176000);
INSERT INTO `donhangchitiet` VALUES (122, 6, 32, 1, 177000);
INSERT INTO `donhangchitiet` VALUES (123, 6, 35, 1, 1760000);
INSERT INTO `donhangchitiet` VALUES (124, 7, 20, 1, 20000000);
INSERT INTO `donhangchitiet` VALUES (125, 7, 21, 1, 146000);
INSERT INTO `donhangchitiet` VALUES (126, 7, 23, 1, 176000);
INSERT INTO `donhangchitiet` VALUES (127, 7, 32, 1, 177000);
INSERT INTO `donhangchitiet` VALUES (128, 7, 35, 1, 1760000);
INSERT INTO `donhangchitiet` VALUES (129, 1, 24, 1, 180000);
INSERT INTO `donhangchitiet` VALUES (130, 1, 23, 1, 176000);
INSERT INTO `donhangchitiet` VALUES (131, 1, 32, 1, 177000);
INSERT INTO `donhangchitiet` VALUES (132, 1, 32, 1, 177000);
INSERT INTO `donhangchitiet` VALUES (133, 2, 24, 1, 180000);
INSERT INTO `donhangchitiet` VALUES (134, 2, 23, 1, 176000);
INSERT INTO `donhangchitiet` VALUES (135, 2, 32, 1, 177000);
INSERT INTO `donhangchitiet` VALUES (136, 2, 32, 1, 177000);
INSERT INTO `donhangchitiet` VALUES (137, 3, 24, 1, 180000);
INSERT INTO `donhangchitiet` VALUES (138, 3, 23, 1, 176000);
INSERT INTO `donhangchitiet` VALUES (139, 3, 32, 1, 177000);
INSERT INTO `donhangchitiet` VALUES (140, 3, 32, 1, 177000);
INSERT INTO `donhangchitiet` VALUES (141, 4, 24, 1, 180000);
INSERT INTO `donhangchitiet` VALUES (142, 4, 23, 1, 176000);
INSERT INTO `donhangchitiet` VALUES (143, 4, 32, 1, 177000);
INSERT INTO `donhangchitiet` VALUES (144, 4, 32, 1, 177000);
INSERT INTO `donhangchitiet` VALUES (145, 5, 24, 1, 180000);
INSERT INTO `donhangchitiet` VALUES (146, 5, 23, 1, 176000);
INSERT INTO `donhangchitiet` VALUES (147, 5, 32, 1, 177000);
INSERT INTO `donhangchitiet` VALUES (148, 5, 32, 1, 177000);
INSERT INTO `donhangchitiet` VALUES (149, 6, 24, 1, 180000);
INSERT INTO `donhangchitiet` VALUES (150, 6, 23, 1, 176000);
INSERT INTO `donhangchitiet` VALUES (151, 6, 32, 1, 177000);
INSERT INTO `donhangchitiet` VALUES (152, 6, 32, 1, 177000);
INSERT INTO `donhangchitiet` VALUES (153, 7, 24, 1, 180000);
INSERT INTO `donhangchitiet` VALUES (154, 7, 23, 1, 176000);
INSERT INTO `donhangchitiet` VALUES (155, 7, 32, 1, 177000);
INSERT INTO `donhangchitiet` VALUES (156, 7, 32, 1, 177000);
INSERT INTO `donhangchitiet` VALUES (157, 8, 24, 1, 180000);
INSERT INTO `donhangchitiet` VALUES (158, 8, 23, 1, 176000);
INSERT INTO `donhangchitiet` VALUES (159, 8, 32, 1, 177000);
INSERT INTO `donhangchitiet` VALUES (160, 8, 32, 1, 177000);
INSERT INTO `donhangchitiet` VALUES (161, 9, 24, 1, 180000);
INSERT INTO `donhangchitiet` VALUES (162, 9, 23, 1, 176000);
INSERT INTO `donhangchitiet` VALUES (163, 9, 32, 1, 177000);
INSERT INTO `donhangchitiet` VALUES (164, 9, 32, 1, 177000);
INSERT INTO `donhangchitiet` VALUES (165, 1, 35, 1, 1760000);
INSERT INTO `donhangchitiet` VALUES (166, 2, 35, 1, 1760000);
INSERT INTO `donhangchitiet` VALUES (167, 3, 35, 1, 1760000);
INSERT INTO `donhangchitiet` VALUES (168, 4, 35, 1, 1760000);
INSERT INTO `donhangchitiet` VALUES (169, 5, 35, 1, 1760000);
INSERT INTO `donhangchitiet` VALUES (170, 6, 35, 1, 1760000);
INSERT INTO `donhangchitiet` VALUES (171, 7, 35, 1, 1760000);
INSERT INTO `donhangchitiet` VALUES (172, 8, 35, 1, 1760000);
INSERT INTO `donhangchitiet` VALUES (173, 9, 35, 1, 1760000);
INSERT INTO `donhangchitiet` VALUES (174, 10, 35, 1, 1760000);
INSERT INTO `donhangchitiet` VALUES (175, 1, 35, 1, 1760000);
INSERT INTO `donhangchitiet` VALUES (176, 2, 35, 1, 1760000);
INSERT INTO `donhangchitiet` VALUES (177, 3, 35, 1, 1760000);
INSERT INTO `donhangchitiet` VALUES (178, 4, 35, 1, 1760000);
INSERT INTO `donhangchitiet` VALUES (179, 5, 35, 1, 1760000);
INSERT INTO `donhangchitiet` VALUES (180, 6, 35, 1, 1760000);
INSERT INTO `donhangchitiet` VALUES (181, 7, 35, 1, 1760000);
INSERT INTO `donhangchitiet` VALUES (182, 8, 35, 1, 1760000);
INSERT INTO `donhangchitiet` VALUES (183, 9, 35, 1, 1760000);
INSERT INTO `donhangchitiet` VALUES (184, 10, 35, 1, 1760000);
INSERT INTO `donhangchitiet` VALUES (185, 1, 35, 1, 1760000);
INSERT INTO `donhangchitiet` VALUES (186, 2, 35, 1, 1760000);
INSERT INTO `donhangchitiet` VALUES (187, 3, 35, 1, 1760000);
INSERT INTO `donhangchitiet` VALUES (188, 4, 35, 1, 1760000);
INSERT INTO `donhangchitiet` VALUES (189, 5, 35, 1, 1760000);
INSERT INTO `donhangchitiet` VALUES (190, 6, 35, 1, 1760000);
INSERT INTO `donhangchitiet` VALUES (191, 7, 35, 1, 1760000);
INSERT INTO `donhangchitiet` VALUES (192, 8, 35, 1, 1760000);
INSERT INTO `donhangchitiet` VALUES (193, 9, 35, 1, 1760000);
INSERT INTO `donhangchitiet` VALUES (194, 10, 35, 1, 1760000);
INSERT INTO `donhangchitiet` VALUES (195, 1, 35, 1, 1760000);
INSERT INTO `donhangchitiet` VALUES (196, 2, 35, 1, 1760000);
INSERT INTO `donhangchitiet` VALUES (197, 3, 35, 1, 1760000);
INSERT INTO `donhangchitiet` VALUES (198, 4, 35, 1, 1760000);
INSERT INTO `donhangchitiet` VALUES (199, 5, 35, 1, 1760000);
INSERT INTO `donhangchitiet` VALUES (200, 6, 35, 1, 1760000);
INSERT INTO `donhangchitiet` VALUES (201, 7, 35, 1, 1760000);
INSERT INTO `donhangchitiet` VALUES (202, 8, 35, 1, 1760000);
INSERT INTO `donhangchitiet` VALUES (203, 9, 35, 1, 1760000);
INSERT INTO `donhangchitiet` VALUES (204, 10, 35, 1, 1760000);
INSERT INTO `donhangchitiet` VALUES (205, 1, 35, 1, 1760000);
INSERT INTO `donhangchitiet` VALUES (206, 2, 35, 1, 1760000);
INSERT INTO `donhangchitiet` VALUES (207, 3, 35, 1, 1760000);
INSERT INTO `donhangchitiet` VALUES (208, 4, 35, 1, 1760000);
INSERT INTO `donhangchitiet` VALUES (209, 5, 35, 1, 1760000);
INSERT INTO `donhangchitiet` VALUES (210, 6, 35, 1, 1760000);
INSERT INTO `donhangchitiet` VALUES (211, 7, 35, 1, 1760000);
INSERT INTO `donhangchitiet` VALUES (212, 8, 35, 1, 1760000);
INSERT INTO `donhangchitiet` VALUES (213, 9, 35, 1, 1760000);
INSERT INTO `donhangchitiet` VALUES (214, 10, 35, 1, 1760000);
INSERT INTO `donhangchitiet` VALUES (215, 1, 35, 1, 1760000);
INSERT INTO `donhangchitiet` VALUES (216, 2, 35, 1, 1760000);
INSERT INTO `donhangchitiet` VALUES (217, 3, 35, 1, 1760000);
INSERT INTO `donhangchitiet` VALUES (218, 4, 35, 1, 1760000);
INSERT INTO `donhangchitiet` VALUES (219, 5, 35, 1, 1760000);
INSERT INTO `donhangchitiet` VALUES (220, 6, 35, 1, 1760000);
INSERT INTO `donhangchitiet` VALUES (221, 7, 35, 1, 1760000);
INSERT INTO `donhangchitiet` VALUES (222, 8, 35, 1, 1760000);
INSERT INTO `donhangchitiet` VALUES (223, 9, 35, 1, 1760000);
INSERT INTO `donhangchitiet` VALUES (224, 10, 35, 1, 1760000);
INSERT INTO `donhangchitiet` VALUES (225, 1, 35, 1, 1760000);
INSERT INTO `donhangchitiet` VALUES (226, 2, 35, 1, 1760000);
INSERT INTO `donhangchitiet` VALUES (227, 3, 35, 1, 1760000);
INSERT INTO `donhangchitiet` VALUES (228, 4, 35, 1, 1760000);
INSERT INTO `donhangchitiet` VALUES (229, 5, 35, 1, 1760000);
INSERT INTO `donhangchitiet` VALUES (230, 6, 35, 1, 1760000);
INSERT INTO `donhangchitiet` VALUES (231, 7, 35, 1, 1760000);
INSERT INTO `donhangchitiet` VALUES (232, 8, 35, 1, 1760000);
INSERT INTO `donhangchitiet` VALUES (233, 9, 35, 1, 1760000);
INSERT INTO `donhangchitiet` VALUES (234, 10, 35, 1, 1760000);
INSERT INTO `donhangchitiet` VALUES (235, 1, 35, 1, 1760000);
INSERT INTO `donhangchitiet` VALUES (236, 2, 35, 1, 1760000);
INSERT INTO `donhangchitiet` VALUES (237, 3, 35, 1, 1760000);
INSERT INTO `donhangchitiet` VALUES (238, 4, 35, 1, 1760000);
INSERT INTO `donhangchitiet` VALUES (239, 5, 35, 1, 1760000);
INSERT INTO `donhangchitiet` VALUES (240, 6, 35, 1, 1760000);
INSERT INTO `donhangchitiet` VALUES (241, 7, 35, 1, 1760000);
INSERT INTO `donhangchitiet` VALUES (242, 8, 35, 1, 1760000);
INSERT INTO `donhangchitiet` VALUES (243, 9, 35, 1, 1760000);
INSERT INTO `donhangchitiet` VALUES (244, 10, 35, 1, 1760000);
INSERT INTO `donhangchitiet` VALUES (245, 1, 35, 1, 1760000);
INSERT INTO `donhangchitiet` VALUES (246, 2, 35, 1, 1760000);
INSERT INTO `donhangchitiet` VALUES (247, 3, 35, 1, 1760000);
INSERT INTO `donhangchitiet` VALUES (248, 4, 35, 1, 1760000);
INSERT INTO `donhangchitiet` VALUES (249, 5, 35, 1, 1760000);
INSERT INTO `donhangchitiet` VALUES (250, 6, 35, 1, 1760000);
INSERT INTO `donhangchitiet` VALUES (251, 7, 35, 1, 1760000);
INSERT INTO `donhangchitiet` VALUES (252, 8, 35, 1, 1760000);
INSERT INTO `donhangchitiet` VALUES (253, 9, 35, 1, 1760000);
INSERT INTO `donhangchitiet` VALUES (254, 10, 35, 1, 1760000);
INSERT INTO `donhangchitiet` VALUES (255, 1, 35, 1, 1760000);
INSERT INTO `donhangchitiet` VALUES (256, 2, 35, 1, 1760000);
INSERT INTO `donhangchitiet` VALUES (257, 3, 35, 1, 1760000);
INSERT INTO `donhangchitiet` VALUES (258, 4, 35, 1, 1760000);
INSERT INTO `donhangchitiet` VALUES (259, 5, 35, 1, 1760000);
INSERT INTO `donhangchitiet` VALUES (260, 6, 35, 1, 1760000);
INSERT INTO `donhangchitiet` VALUES (261, 7, 35, 1, 1760000);
INSERT INTO `donhangchitiet` VALUES (262, 8, 35, 1, 1760000);
INSERT INTO `donhangchitiet` VALUES (263, 9, 35, 1, 1760000);
INSERT INTO `donhangchitiet` VALUES (264, 10, 35, 1, 1760000);
INSERT INTO `donhangchitiet` VALUES (265, 1, 35, 1, 1760000);
INSERT INTO `donhangchitiet` VALUES (266, 2, 35, 1, 1760000);
INSERT INTO `donhangchitiet` VALUES (267, 3, 35, 1, 1760000);
INSERT INTO `donhangchitiet` VALUES (268, 4, 35, 1, 1760000);
INSERT INTO `donhangchitiet` VALUES (269, 5, 35, 1, 1760000);
INSERT INTO `donhangchitiet` VALUES (270, 6, 35, 1, 1760000);
INSERT INTO `donhangchitiet` VALUES (271, 7, 35, 1, 1760000);
INSERT INTO `donhangchitiet` VALUES (272, 8, 35, 1, 1760000);
INSERT INTO `donhangchitiet` VALUES (273, 9, 35, 1, 1760000);
INSERT INTO `donhangchitiet` VALUES (274, 10, 35, 1, 1760000);
INSERT INTO `donhangchitiet` VALUES (275, 1, 35, 1, 1760000);
INSERT INTO `donhangchitiet` VALUES (276, 2, 35, 1, 1760000);
INSERT INTO `donhangchitiet` VALUES (277, 3, 35, 1, 1760000);
INSERT INTO `donhangchitiet` VALUES (278, 4, 35, 1, 1760000);
INSERT INTO `donhangchitiet` VALUES (279, 5, 35, 1, 1760000);
INSERT INTO `donhangchitiet` VALUES (280, 6, 35, 1, 1760000);
INSERT INTO `donhangchitiet` VALUES (281, 7, 35, 1, 1760000);
INSERT INTO `donhangchitiet` VALUES (282, 8, 35, 1, 1760000);
INSERT INTO `donhangchitiet` VALUES (283, 9, 35, 1, 1760000);
INSERT INTO `donhangchitiet` VALUES (284, 10, 35, 1, 1760000);
INSERT INTO `donhangchitiet` VALUES (285, 1, 35, 1, 1760000);
INSERT INTO `donhangchitiet` VALUES (286, 2, 35, 1, 1760000);
INSERT INTO `donhangchitiet` VALUES (287, 3, 35, 1, 1760000);
INSERT INTO `donhangchitiet` VALUES (288, 4, 35, 1, 1760000);
INSERT INTO `donhangchitiet` VALUES (289, 5, 35, 1, 1760000);
INSERT INTO `donhangchitiet` VALUES (290, 6, 35, 1, 1760000);
INSERT INTO `donhangchitiet` VALUES (291, 7, 35, 1, 1760000);
INSERT INTO `donhangchitiet` VALUES (292, 8, 35, 1, 1760000);
INSERT INTO `donhangchitiet` VALUES (293, 9, 35, 1, 1760000);
INSERT INTO `donhangchitiet` VALUES (294, 10, 35, 1, 1760000);
INSERT INTO `donhangchitiet` VALUES (295, 1, 35, 1, 1760000);
INSERT INTO `donhangchitiet` VALUES (296, 2, 35, 1, 1760000);
INSERT INTO `donhangchitiet` VALUES (297, 3, 35, 1, 1760000);
INSERT INTO `donhangchitiet` VALUES (298, 4, 35, 1, 1760000);
INSERT INTO `donhangchitiet` VALUES (299, 5, 35, 1, 1760000);
INSERT INTO `donhangchitiet` VALUES (300, 6, 35, 1, 1760000);
INSERT INTO `donhangchitiet` VALUES (301, 7, 35, 1, 1760000);
INSERT INTO `donhangchitiet` VALUES (302, 8, 35, 1, 1760000);
INSERT INTO `donhangchitiet` VALUES (303, 9, 35, 1, 1760000);
INSERT INTO `donhangchitiet` VALUES (304, 10, 35, 1, 1760000);
INSERT INTO `donhangchitiet` VALUES (305, 1, 28, 1, 4990000);
INSERT INTO `donhangchitiet` VALUES (306, 2, 28, 1, 4990000);
INSERT INTO `donhangchitiet` VALUES (307, 3, 28, 1, 4990000);
INSERT INTO `donhangchitiet` VALUES (308, 4, 28, 1, 4990000);
INSERT INTO `donhangchitiet` VALUES (309, 5, 28, 1, 4990000);
INSERT INTO `donhangchitiet` VALUES (310, 6, 28, 1, 4990000);
INSERT INTO `donhangchitiet` VALUES (311, 7, 28, 1, 4990000);
INSERT INTO `donhangchitiet` VALUES (312, 8, 28, 1, 4990000);
INSERT INTO `donhangchitiet` VALUES (313, 9, 28, 1, 4990000);
INSERT INTO `donhangchitiet` VALUES (314, 10, 28, 1, 4990000);
INSERT INTO `donhangchitiet` VALUES (315, 11, 28, 1, 4990000);
INSERT INTO `donhangchitiet` VALUES (316, 12, 37, 1, 50000);
INSERT INTO `donhangchitiet` VALUES (317, 12, 37, 1, 50000);
INSERT INTO `donhangchitiet` VALUES (318, 12, 37, 1, 50000);
INSERT INTO `donhangchitiet` VALUES (319, 1, 36, 1, 12500000);
INSERT INTO `donhangchitiet` VALUES (320, 1, 35, 1, 1760000);
INSERT INTO `donhangchitiet` VALUES (321, 1, 27, 1, 4950000);
INSERT INTO `donhangchitiet` VALUES (322, 2, 36, 1, 12500000);
INSERT INTO `donhangchitiet` VALUES (323, 2, 35, 1, 1760000);
INSERT INTO `donhangchitiet` VALUES (324, 2, 27, 1, 4950000);
INSERT INTO `donhangchitiet` VALUES (325, 3, 36, 1, 12500000);
INSERT INTO `donhangchitiet` VALUES (326, 3, 35, 1, 1760000);
INSERT INTO `donhangchitiet` VALUES (327, 3, 27, 1, 4950000);
INSERT INTO `donhangchitiet` VALUES (328, 4, 36, 1, 12500000);
INSERT INTO `donhangchitiet` VALUES (329, 4, 35, 1, 1760000);
INSERT INTO `donhangchitiet` VALUES (330, 4, 27, 1, 4950000);
INSERT INTO `donhangchitiet` VALUES (331, 5, 36, 1, 12500000);
INSERT INTO `donhangchitiet` VALUES (332, 5, 35, 1, 1760000);
INSERT INTO `donhangchitiet` VALUES (333, 5, 27, 1, 4950000);
INSERT INTO `donhangchitiet` VALUES (334, 6, 36, 1, 12500000);
INSERT INTO `donhangchitiet` VALUES (335, 6, 35, 1, 1760000);
INSERT INTO `donhangchitiet` VALUES (336, 6, 27, 1, 4950000);
INSERT INTO `donhangchitiet` VALUES (337, 7, 36, 1, 12500000);
INSERT INTO `donhangchitiet` VALUES (338, 7, 35, 1, 1760000);
INSERT INTO `donhangchitiet` VALUES (339, 7, 27, 1, 4950000);
INSERT INTO `donhangchitiet` VALUES (340, 8, 36, 1, 12500000);
INSERT INTO `donhangchitiet` VALUES (341, 8, 35, 1, 1760000);
INSERT INTO `donhangchitiet` VALUES (342, 8, 27, 1, 4950000);
INSERT INTO `donhangchitiet` VALUES (343, 9, 36, 1, 12500000);
INSERT INTO `donhangchitiet` VALUES (344, 9, 35, 1, 1760000);
INSERT INTO `donhangchitiet` VALUES (345, 9, 27, 1, 4950000);
INSERT INTO `donhangchitiet` VALUES (346, 10, 36, 1, 12500000);
INSERT INTO `donhangchitiet` VALUES (347, 10, 35, 1, 1760000);
INSERT INTO `donhangchitiet` VALUES (348, 10, 27, 1, 4950000);
INSERT INTO `donhangchitiet` VALUES (349, 11, 36, 1, 12500000);
INSERT INTO `donhangchitiet` VALUES (350, 11, 35, 1, 1760000);
INSERT INTO `donhangchitiet` VALUES (351, 11, 27, 1, 4950000);
INSERT INTO `donhangchitiet` VALUES (352, 13, 36, 1, 12500000);
INSERT INTO `donhangchitiet` VALUES (353, 13, 35, 1, 1760000);
INSERT INTO `donhangchitiet` VALUES (354, 13, 27, 1, 4950000);
INSERT INTO `donhangchitiet` VALUES (355, 1, 33, 100, 250000000);
INSERT INTO `donhangchitiet` VALUES (356, 1, 33, 1, 2500000);
INSERT INTO `donhangchitiet` VALUES (357, 1, 33, 1, 2500000);
INSERT INTO `donhangchitiet` VALUES (358, 1, 33, 1, 2500000);
INSERT INTO `donhangchitiet` VALUES (359, 2, 33, 100, 250000000);
INSERT INTO `donhangchitiet` VALUES (360, 2, 33, 1, 2500000);
INSERT INTO `donhangchitiet` VALUES (361, 2, 33, 1, 2500000);
INSERT INTO `donhangchitiet` VALUES (362, 2, 33, 1, 2500000);
INSERT INTO `donhangchitiet` VALUES (363, 3, 33, 100, 250000000);
INSERT INTO `donhangchitiet` VALUES (364, 3, 33, 1, 2500000);
INSERT INTO `donhangchitiet` VALUES (365, 3, 33, 1, 2500000);
INSERT INTO `donhangchitiet` VALUES (366, 3, 33, 1, 2500000);
INSERT INTO `donhangchitiet` VALUES (367, 4, 33, 100, 250000000);
INSERT INTO `donhangchitiet` VALUES (368, 4, 33, 1, 2500000);
INSERT INTO `donhangchitiet` VALUES (369, 4, 33, 1, 2500000);
INSERT INTO `donhangchitiet` VALUES (370, 4, 33, 1, 2500000);
INSERT INTO `donhangchitiet` VALUES (371, 5, 33, 100, 250000000);
INSERT INTO `donhangchitiet` VALUES (372, 5, 33, 1, 2500000);
INSERT INTO `donhangchitiet` VALUES (373, 5, 33, 1, 2500000);
INSERT INTO `donhangchitiet` VALUES (374, 5, 33, 1, 2500000);
INSERT INTO `donhangchitiet` VALUES (375, 6, 33, 100, 250000000);
INSERT INTO `donhangchitiet` VALUES (376, 6, 33, 1, 2500000);
INSERT INTO `donhangchitiet` VALUES (377, 6, 33, 1, 2500000);
INSERT INTO `donhangchitiet` VALUES (378, 6, 33, 1, 2500000);
INSERT INTO `donhangchitiet` VALUES (379, 7, 33, 100, 250000000);
INSERT INTO `donhangchitiet` VALUES (380, 7, 33, 1, 2500000);
INSERT INTO `donhangchitiet` VALUES (381, 7, 33, 1, 2500000);
INSERT INTO `donhangchitiet` VALUES (382, 7, 33, 1, 2500000);
INSERT INTO `donhangchitiet` VALUES (383, 8, 33, 100, 250000000);
INSERT INTO `donhangchitiet` VALUES (384, 8, 33, 1, 2500000);
INSERT INTO `donhangchitiet` VALUES (385, 8, 33, 1, 2500000);
INSERT INTO `donhangchitiet` VALUES (386, 8, 33, 1, 2500000);
INSERT INTO `donhangchitiet` VALUES (387, 9, 33, 100, 250000000);
INSERT INTO `donhangchitiet` VALUES (388, 9, 33, 1, 2500000);
INSERT INTO `donhangchitiet` VALUES (389, 9, 33, 1, 2500000);
INSERT INTO `donhangchitiet` VALUES (390, 9, 33, 1, 2500000);
INSERT INTO `donhangchitiet` VALUES (391, 10, 33, 100, 250000000);
INSERT INTO `donhangchitiet` VALUES (392, 10, 33, 1, 2500000);
INSERT INTO `donhangchitiet` VALUES (393, 10, 33, 1, 2500000);
INSERT INTO `donhangchitiet` VALUES (394, 10, 33, 1, 2500000);
INSERT INTO `donhangchitiet` VALUES (395, 11, 33, 100, 250000000);
INSERT INTO `donhangchitiet` VALUES (396, 11, 33, 1, 2500000);
INSERT INTO `donhangchitiet` VALUES (397, 11, 33, 1, 2500000);
INSERT INTO `donhangchitiet` VALUES (398, 11, 33, 1, 2500000);
INSERT INTO `donhangchitiet` VALUES (399, 13, 33, 100, 250000000);
INSERT INTO `donhangchitiet` VALUES (400, 13, 33, 1, 2500000);
INSERT INTO `donhangchitiet` VALUES (401, 13, 33, 1, 2500000);
INSERT INTO `donhangchitiet` VALUES (402, 13, 33, 1, 2500000);
INSERT INTO `donhangchitiet` VALUES (403, 14, 33, 100, 250000000);
INSERT INTO `donhangchitiet` VALUES (404, 14, 33, 1, 2500000);
INSERT INTO `donhangchitiet` VALUES (405, 14, 33, 1, 2500000);
INSERT INTO `donhangchitiet` VALUES (406, 14, 33, 1, 2500000);
INSERT INTO `donhangchitiet` VALUES (407, 1, 36, 1, 12500000);
INSERT INTO `donhangchitiet` VALUES (408, 1, 36, 1, 12500000);
INSERT INTO `donhangchitiet` VALUES (409, 1, 36, 1, 12500000);
INSERT INTO `donhangchitiet` VALUES (410, 1, 41, 1, 145000);
INSERT INTO `donhangchitiet` VALUES (411, 1, 42, 1, 145000);
INSERT INTO `donhangchitiet` VALUES (412, 1, 42, 1, 145000);
INSERT INTO `donhangchitiet` VALUES (413, 1, 43, 1, 1120000);
INSERT INTO `donhangchitiet` VALUES (414, 2, 36, 1, 12500000);
INSERT INTO `donhangchitiet` VALUES (415, 2, 36, 1, 12500000);
INSERT INTO `donhangchitiet` VALUES (416, 2, 36, 1, 12500000);
INSERT INTO `donhangchitiet` VALUES (417, 2, 41, 1, 145000);
INSERT INTO `donhangchitiet` VALUES (418, 2, 42, 1, 145000);
INSERT INTO `donhangchitiet` VALUES (419, 2, 42, 1, 145000);
INSERT INTO `donhangchitiet` VALUES (420, 2, 43, 1, 1120000);
INSERT INTO `donhangchitiet` VALUES (421, 3, 36, 1, 12500000);
INSERT INTO `donhangchitiet` VALUES (422, 3, 36, 1, 12500000);
INSERT INTO `donhangchitiet` VALUES (423, 3, 36, 1, 12500000);
INSERT INTO `donhangchitiet` VALUES (424, 3, 41, 1, 145000);
INSERT INTO `donhangchitiet` VALUES (425, 3, 42, 1, 145000);
INSERT INTO `donhangchitiet` VALUES (426, 3, 42, 1, 145000);
INSERT INTO `donhangchitiet` VALUES (427, 3, 43, 1, 1120000);
INSERT INTO `donhangchitiet` VALUES (428, 4, 36, 1, 12500000);
INSERT INTO `donhangchitiet` VALUES (429, 4, 36, 1, 12500000);
INSERT INTO `donhangchitiet` VALUES (430, 4, 36, 1, 12500000);
INSERT INTO `donhangchitiet` VALUES (431, 4, 41, 1, 145000);
INSERT INTO `donhangchitiet` VALUES (432, 4, 42, 1, 145000);
INSERT INTO `donhangchitiet` VALUES (433, 4, 42, 1, 145000);
INSERT INTO `donhangchitiet` VALUES (434, 4, 43, 1, 1120000);
INSERT INTO `donhangchitiet` VALUES (435, 5, 36, 1, 12500000);
INSERT INTO `donhangchitiet` VALUES (436, 5, 36, 1, 12500000);
INSERT INTO `donhangchitiet` VALUES (437, 5, 36, 1, 12500000);
INSERT INTO `donhangchitiet` VALUES (438, 5, 41, 1, 145000);
INSERT INTO `donhangchitiet` VALUES (439, 5, 42, 1, 145000);
INSERT INTO `donhangchitiet` VALUES (440, 5, 42, 1, 145000);
INSERT INTO `donhangchitiet` VALUES (441, 5, 43, 1, 1120000);
INSERT INTO `donhangchitiet` VALUES (442, 6, 36, 1, 12500000);
INSERT INTO `donhangchitiet` VALUES (443, 6, 36, 1, 12500000);
INSERT INTO `donhangchitiet` VALUES (444, 6, 36, 1, 12500000);
INSERT INTO `donhangchitiet` VALUES (445, 6, 41, 1, 145000);
INSERT INTO `donhangchitiet` VALUES (446, 6, 42, 1, 145000);
INSERT INTO `donhangchitiet` VALUES (447, 6, 42, 1, 145000);
INSERT INTO `donhangchitiet` VALUES (448, 6, 43, 1, 1120000);
INSERT INTO `donhangchitiet` VALUES (449, 7, 36, 1, 12500000);
INSERT INTO `donhangchitiet` VALUES (450, 7, 36, 1, 12500000);
INSERT INTO `donhangchitiet` VALUES (451, 7, 36, 1, 12500000);
INSERT INTO `donhangchitiet` VALUES (452, 7, 41, 1, 145000);
INSERT INTO `donhangchitiet` VALUES (453, 7, 42, 1, 145000);
INSERT INTO `donhangchitiet` VALUES (454, 7, 42, 1, 145000);
INSERT INTO `donhangchitiet` VALUES (455, 7, 43, 1, 1120000);
INSERT INTO `donhangchitiet` VALUES (456, 8, 36, 1, 12500000);
INSERT INTO `donhangchitiet` VALUES (457, 8, 36, 1, 12500000);
INSERT INTO `donhangchitiet` VALUES (458, 8, 36, 1, 12500000);
INSERT INTO `donhangchitiet` VALUES (459, 8, 41, 1, 145000);
INSERT INTO `donhangchitiet` VALUES (460, 8, 42, 1, 145000);
INSERT INTO `donhangchitiet` VALUES (461, 8, 42, 1, 145000);
INSERT INTO `donhangchitiet` VALUES (462, 8, 43, 1, 1120000);
INSERT INTO `donhangchitiet` VALUES (463, 9, 36, 1, 12500000);
INSERT INTO `donhangchitiet` VALUES (464, 9, 36, 1, 12500000);
INSERT INTO `donhangchitiet` VALUES (465, 9, 36, 1, 12500000);
INSERT INTO `donhangchitiet` VALUES (466, 9, 41, 1, 145000);
INSERT INTO `donhangchitiet` VALUES (467, 9, 42, 1, 145000);
INSERT INTO `donhangchitiet` VALUES (468, 9, 42, 1, 145000);
INSERT INTO `donhangchitiet` VALUES (469, 9, 43, 1, 1120000);
INSERT INTO `donhangchitiet` VALUES (470, 10, 36, 1, 12500000);
INSERT INTO `donhangchitiet` VALUES (471, 10, 36, 1, 12500000);
INSERT INTO `donhangchitiet` VALUES (472, 10, 36, 1, 12500000);
INSERT INTO `donhangchitiet` VALUES (473, 10, 41, 1, 145000);
INSERT INTO `donhangchitiet` VALUES (474, 10, 42, 1, 145000);
INSERT INTO `donhangchitiet` VALUES (475, 10, 42, 1, 145000);
INSERT INTO `donhangchitiet` VALUES (476, 10, 43, 1, 1120000);
INSERT INTO `donhangchitiet` VALUES (477, 11, 36, 1, 12500000);
INSERT INTO `donhangchitiet` VALUES (478, 11, 36, 1, 12500000);
INSERT INTO `donhangchitiet` VALUES (479, 11, 36, 1, 12500000);
INSERT INTO `donhangchitiet` VALUES (480, 11, 41, 1, 145000);
INSERT INTO `donhangchitiet` VALUES (481, 11, 42, 1, 145000);
INSERT INTO `donhangchitiet` VALUES (482, 11, 42, 1, 145000);
INSERT INTO `donhangchitiet` VALUES (483, 11, 43, 1, 1120000);
INSERT INTO `donhangchitiet` VALUES (484, 13, 36, 1, 12500000);
INSERT INTO `donhangchitiet` VALUES (485, 13, 36, 1, 12500000);
INSERT INTO `donhangchitiet` VALUES (486, 13, 36, 1, 12500000);
INSERT INTO `donhangchitiet` VALUES (487, 13, 41, 1, 145000);
INSERT INTO `donhangchitiet` VALUES (488, 13, 42, 1, 145000);
INSERT INTO `donhangchitiet` VALUES (489, 13, 42, 1, 145000);
INSERT INTO `donhangchitiet` VALUES (490, 13, 43, 1, 1120000);
INSERT INTO `donhangchitiet` VALUES (491, 14, 36, 1, 12500000);
INSERT INTO `donhangchitiet` VALUES (492, 14, 36, 1, 12500000);
INSERT INTO `donhangchitiet` VALUES (493, 14, 36, 1, 12500000);
INSERT INTO `donhangchitiet` VALUES (494, 14, 41, 1, 145000);
INSERT INTO `donhangchitiet` VALUES (495, 14, 42, 1, 145000);
INSERT INTO `donhangchitiet` VALUES (496, 14, 42, 1, 145000);
INSERT INTO `donhangchitiet` VALUES (497, 14, 43, 1, 1120000);
INSERT INTO `donhangchitiet` VALUES (498, 15, 36, 1, 12500000);
INSERT INTO `donhangchitiet` VALUES (499, 15, 36, 1, 12500000);
INSERT INTO `donhangchitiet` VALUES (500, 15, 36, 1, 12500000);
INSERT INTO `donhangchitiet` VALUES (501, 15, 41, 1, 145000);
INSERT INTO `donhangchitiet` VALUES (502, 15, 42, 1, 145000);
INSERT INTO `donhangchitiet` VALUES (503, 15, 42, 1, 145000);
INSERT INTO `donhangchitiet` VALUES (504, 15, 43, 1, 1120000);
INSERT INTO `donhangchitiet` VALUES (505, 1, 130, 2, 4608000);
INSERT INTO `donhangchitiet` VALUES (506, 2, 130, 2, 4608000);
INSERT INTO `donhangchitiet` VALUES (507, 3, 130, 2, 4608000);
INSERT INTO `donhangchitiet` VALUES (508, 4, 130, 2, 4608000);
INSERT INTO `donhangchitiet` VALUES (509, 5, 130, 2, 4608000);
INSERT INTO `donhangchitiet` VALUES (510, 6, 130, 2, 4608000);
INSERT INTO `donhangchitiet` VALUES (511, 7, 130, 2, 4608000);
INSERT INTO `donhangchitiet` VALUES (512, 8, 130, 2, 4608000);
INSERT INTO `donhangchitiet` VALUES (513, 9, 130, 2, 4608000);
INSERT INTO `donhangchitiet` VALUES (514, 10, 130, 2, 4608000);
INSERT INTO `donhangchitiet` VALUES (515, 11, 130, 2, 4608000);
INSERT INTO `donhangchitiet` VALUES (516, 13, 130, 2, 4608000);
INSERT INTO `donhangchitiet` VALUES (517, 14, 130, 2, 4608000);
INSERT INTO `donhangchitiet` VALUES (518, 15, 130, 2, 4608000);
INSERT INTO `donhangchitiet` VALUES (519, 16, 130, 2, 4608000);
INSERT INTO `donhangchitiet` VALUES (520, 1, 57, 22, 34518000);
INSERT INTO `donhangchitiet` VALUES (521, 2, 57, 22, 34518000);
INSERT INTO `donhangchitiet` VALUES (522, 3, 57, 22, 34518000);
INSERT INTO `donhangchitiet` VALUES (523, 4, 57, 22, 34518000);
INSERT INTO `donhangchitiet` VALUES (524, 5, 57, 22, 34518000);
INSERT INTO `donhangchitiet` VALUES (525, 6, 57, 22, 34518000);
INSERT INTO `donhangchitiet` VALUES (526, 7, 57, 22, 34518000);
INSERT INTO `donhangchitiet` VALUES (527, 8, 57, 22, 34518000);
INSERT INTO `donhangchitiet` VALUES (528, 9, 57, 22, 34518000);
INSERT INTO `donhangchitiet` VALUES (529, 10, 57, 22, 34518000);
INSERT INTO `donhangchitiet` VALUES (530, 11, 57, 22, 34518000);
INSERT INTO `donhangchitiet` VALUES (531, 13, 57, 22, 34518000);
INSERT INTO `donhangchitiet` VALUES (532, 14, 57, 22, 34518000);
INSERT INTO `donhangchitiet` VALUES (533, 15, 57, 22, 34518000);
INSERT INTO `donhangchitiet` VALUES (534, 16, 57, 22, 34518000);
INSERT INTO `donhangchitiet` VALUES (535, 1, 57, 1, 1569000);
INSERT INTO `donhangchitiet` VALUES (536, 2, 57, 1, 1569000);
INSERT INTO `donhangchitiet` VALUES (537, 3, 57, 1, 1569000);
INSERT INTO `donhangchitiet` VALUES (538, 4, 57, 1, 1569000);
INSERT INTO `donhangchitiet` VALUES (539, 5, 57, 1, 1569000);
INSERT INTO `donhangchitiet` VALUES (540, 6, 57, 1, 1569000);
INSERT INTO `donhangchitiet` VALUES (541, 7, 57, 1, 1569000);
INSERT INTO `donhangchitiet` VALUES (542, 8, 57, 1, 1569000);
INSERT INTO `donhangchitiet` VALUES (543, 9, 57, 1, 1569000);
INSERT INTO `donhangchitiet` VALUES (544, 10, 57, 1, 1569000);
INSERT INTO `donhangchitiet` VALUES (545, 11, 57, 1, 1569000);
INSERT INTO `donhangchitiet` VALUES (546, 13, 57, 1, 1569000);
INSERT INTO `donhangchitiet` VALUES (547, 14, 57, 1, 1569000);
INSERT INTO `donhangchitiet` VALUES (548, 15, 57, 1, 1569000);
INSERT INTO `donhangchitiet` VALUES (549, 16, 57, 1, 1569000);
INSERT INTO `donhangchitiet` VALUES (550, 1, 4, 199, 155220000);
INSERT INTO `donhangchitiet` VALUES (551, 2, 4, 199, 155220000);
INSERT INTO `donhangchitiet` VALUES (552, 3, 4, 199, 155220000);
INSERT INTO `donhangchitiet` VALUES (553, 4, 4, 199, 155220000);
INSERT INTO `donhangchitiet` VALUES (554, 5, 4, 199, 155220000);
INSERT INTO `donhangchitiet` VALUES (555, 6, 4, 199, 155220000);
INSERT INTO `donhangchitiet` VALUES (556, 7, 4, 199, 155220000);
INSERT INTO `donhangchitiet` VALUES (557, 8, 4, 199, 155220000);
INSERT INTO `donhangchitiet` VALUES (558, 9, 4, 199, 155220000);
INSERT INTO `donhangchitiet` VALUES (559, 10, 4, 199, 155220000);
INSERT INTO `donhangchitiet` VALUES (560, 11, 4, 199, 155220000);
INSERT INTO `donhangchitiet` VALUES (561, 13, 4, 199, 155220000);
INSERT INTO `donhangchitiet` VALUES (562, 14, 4, 199, 155220000);
INSERT INTO `donhangchitiet` VALUES (563, 15, 4, 199, 155220000);
INSERT INTO `donhangchitiet` VALUES (564, 16, 4, 199, 155220000);
INSERT INTO `donhangchitiet` VALUES (565, 1, 4, 1, 780000);
INSERT INTO `donhangchitiet` VALUES (566, 2, 4, 1, 780000);
INSERT INTO `donhangchitiet` VALUES (567, 3, 4, 1, 780000);
INSERT INTO `donhangchitiet` VALUES (568, 4, 4, 1, 780000);
INSERT INTO `donhangchitiet` VALUES (569, 5, 4, 1, 780000);
INSERT INTO `donhangchitiet` VALUES (570, 6, 4, 1, 780000);
INSERT INTO `donhangchitiet` VALUES (571, 7, 4, 1, 780000);
INSERT INTO `donhangchitiet` VALUES (572, 8, 4, 1, 780000);
INSERT INTO `donhangchitiet` VALUES (573, 9, 4, 1, 780000);
INSERT INTO `donhangchitiet` VALUES (574, 10, 4, 1, 780000);
INSERT INTO `donhangchitiet` VALUES (575, 11, 4, 1, 780000);
INSERT INTO `donhangchitiet` VALUES (576, 13, 4, 1, 780000);
INSERT INTO `donhangchitiet` VALUES (577, 14, 4, 1, 780000);
INSERT INTO `donhangchitiet` VALUES (578, 15, 4, 1, 780000);
INSERT INTO `donhangchitiet` VALUES (579, 16, 4, 1, 780000);
INSERT INTO `donhangchitiet` VALUES (580, 1, 77, 1, 179000);
INSERT INTO `donhangchitiet` VALUES (581, 2, 77, 1, 179000);
INSERT INTO `donhangchitiet` VALUES (582, 3, 77, 1, 179000);
INSERT INTO `donhangchitiet` VALUES (583, 4, 77, 1, 179000);
INSERT INTO `donhangchitiet` VALUES (584, 5, 77, 1, 179000);
INSERT INTO `donhangchitiet` VALUES (585, 6, 77, 1, 179000);
INSERT INTO `donhangchitiet` VALUES (586, 7, 77, 1, 179000);
INSERT INTO `donhangchitiet` VALUES (587, 8, 77, 1, 179000);
INSERT INTO `donhangchitiet` VALUES (588, 9, 77, 1, 179000);
INSERT INTO `donhangchitiet` VALUES (589, 10, 77, 1, 179000);
INSERT INTO `donhangchitiet` VALUES (590, 11, 77, 1, 179000);
INSERT INTO `donhangchitiet` VALUES (591, 13, 77, 1, 179000);
INSERT INTO `donhangchitiet` VALUES (592, 14, 77, 1, 179000);
INSERT INTO `donhangchitiet` VALUES (593, 15, 77, 1, 179000);
INSERT INTO `donhangchitiet` VALUES (594, 16, 77, 1, 179000);
INSERT INTO `donhangchitiet` VALUES (595, 1, 130, 1, 2304000);
INSERT INTO `donhangchitiet` VALUES (596, 2, 130, 1, 2304000);
INSERT INTO `donhangchitiet` VALUES (597, 3, 130, 1, 2304000);
INSERT INTO `donhangchitiet` VALUES (598, 4, 130, 1, 2304000);
INSERT INTO `donhangchitiet` VALUES (599, 5, 130, 1, 2304000);
INSERT INTO `donhangchitiet` VALUES (600, 6, 130, 1, 2304000);
INSERT INTO `donhangchitiet` VALUES (601, 7, 130, 1, 2304000);
INSERT INTO `donhangchitiet` VALUES (602, 8, 130, 1, 2304000);
INSERT INTO `donhangchitiet` VALUES (603, 9, 130, 1, 2304000);
INSERT INTO `donhangchitiet` VALUES (604, 10, 130, 1, 2304000);
INSERT INTO `donhangchitiet` VALUES (605, 11, 130, 1, 2304000);
INSERT INTO `donhangchitiet` VALUES (606, 13, 130, 1, 2304000);
INSERT INTO `donhangchitiet` VALUES (607, 14, 130, 1, 2304000);
INSERT INTO `donhangchitiet` VALUES (608, 15, 130, 1, 2304000);
INSERT INTO `donhangchitiet` VALUES (609, 16, 130, 1, 2304000);
INSERT INTO `donhangchitiet` VALUES (610, 1, 124, 1, 750000);
INSERT INTO `donhangchitiet` VALUES (611, 2, 124, 1, 750000);
INSERT INTO `donhangchitiet` VALUES (612, 3, 124, 1, 750000);
INSERT INTO `donhangchitiet` VALUES (613, 4, 124, 1, 750000);
INSERT INTO `donhangchitiet` VALUES (614, 5, 124, 1, 750000);
INSERT INTO `donhangchitiet` VALUES (615, 6, 124, 1, 750000);
INSERT INTO `donhangchitiet` VALUES (616, 7, 124, 1, 750000);
INSERT INTO `donhangchitiet` VALUES (617, 8, 124, 1, 750000);
INSERT INTO `donhangchitiet` VALUES (618, 9, 124, 1, 750000);
INSERT INTO `donhangchitiet` VALUES (619, 10, 124, 1, 750000);
INSERT INTO `donhangchitiet` VALUES (620, 11, 124, 1, 750000);
INSERT INTO `donhangchitiet` VALUES (621, 13, 124, 1, 750000);
INSERT INTO `donhangchitiet` VALUES (622, 14, 124, 1, 750000);
INSERT INTO `donhangchitiet` VALUES (623, 15, 124, 1, 750000);
INSERT INTO `donhangchitiet` VALUES (624, 16, 124, 1, 750000);
INSERT INTO `donhangchitiet` VALUES (625, 1, 124, 22, 16500000);
INSERT INTO `donhangchitiet` VALUES (626, 2, 124, 22, 16500000);
INSERT INTO `donhangchitiet` VALUES (627, 3, 124, 22, 16500000);
INSERT INTO `donhangchitiet` VALUES (628, 4, 124, 22, 16500000);
INSERT INTO `donhangchitiet` VALUES (629, 5, 124, 22, 16500000);
INSERT INTO `donhangchitiet` VALUES (630, 6, 124, 22, 16500000);
INSERT INTO `donhangchitiet` VALUES (631, 7, 124, 22, 16500000);
INSERT INTO `donhangchitiet` VALUES (632, 8, 124, 22, 16500000);
INSERT INTO `donhangchitiet` VALUES (633, 9, 124, 22, 16500000);
INSERT INTO `donhangchitiet` VALUES (634, 10, 124, 22, 16500000);
INSERT INTO `donhangchitiet` VALUES (635, 11, 124, 22, 16500000);
INSERT INTO `donhangchitiet` VALUES (636, 13, 124, 22, 16500000);
INSERT INTO `donhangchitiet` VALUES (637, 14, 124, 22, 16500000);
INSERT INTO `donhangchitiet` VALUES (638, 15, 124, 22, 16500000);
INSERT INTO `donhangchitiet` VALUES (639, 16, 124, 22, 16500000);
INSERT INTO `donhangchitiet` VALUES (640, 1, 6, 99, 201960000);
INSERT INTO `donhangchitiet` VALUES (641, 2, 6, 99, 201960000);
INSERT INTO `donhangchitiet` VALUES (642, 3, 6, 99, 201960000);
INSERT INTO `donhangchitiet` VALUES (643, 4, 6, 99, 201960000);
INSERT INTO `donhangchitiet` VALUES (644, 5, 6, 99, 201960000);
INSERT INTO `donhangchitiet` VALUES (645, 6, 6, 99, 201960000);
INSERT INTO `donhangchitiet` VALUES (646, 7, 6, 99, 201960000);
INSERT INTO `donhangchitiet` VALUES (647, 8, 6, 99, 201960000);
INSERT INTO `donhangchitiet` VALUES (648, 9, 6, 99, 201960000);
INSERT INTO `donhangchitiet` VALUES (649, 10, 6, 99, 201960000);
INSERT INTO `donhangchitiet` VALUES (650, 11, 6, 99, 201960000);
INSERT INTO `donhangchitiet` VALUES (651, 13, 6, 99, 201960000);
INSERT INTO `donhangchitiet` VALUES (652, 14, 6, 99, 201960000);
INSERT INTO `donhangchitiet` VALUES (653, 15, 6, 99, 201960000);
INSERT INTO `donhangchitiet` VALUES (654, 16, 6, 99, 201960000);
INSERT INTO `donhangchitiet` VALUES (655, 1, 16, 112, 336000000);
INSERT INTO `donhangchitiet` VALUES (656, 2, 16, 112, 336000000);
INSERT INTO `donhangchitiet` VALUES (657, 3, 16, 112, 336000000);
INSERT INTO `donhangchitiet` VALUES (658, 4, 16, 112, 336000000);
INSERT INTO `donhangchitiet` VALUES (659, 5, 16, 112, 336000000);
INSERT INTO `donhangchitiet` VALUES (660, 6, 16, 112, 336000000);
INSERT INTO `donhangchitiet` VALUES (661, 7, 16, 112, 336000000);
INSERT INTO `donhangchitiet` VALUES (662, 8, 16, 112, 336000000);
INSERT INTO `donhangchitiet` VALUES (663, 9, 16, 112, 336000000);
INSERT INTO `donhangchitiet` VALUES (664, 10, 16, 112, 336000000);
INSERT INTO `donhangchitiet` VALUES (665, 11, 16, 112, 336000000);
INSERT INTO `donhangchitiet` VALUES (666, 13, 16, 112, 336000000);
INSERT INTO `donhangchitiet` VALUES (667, 14, 16, 112, 336000000);
INSERT INTO `donhangchitiet` VALUES (668, 15, 16, 112, 336000000);
INSERT INTO `donhangchitiet` VALUES (669, 16, 16, 112, 336000000);
INSERT INTO `donhangchitiet` VALUES (670, 1, 22, 95, 87400000);
INSERT INTO `donhangchitiet` VALUES (671, 2, 22, 95, 87400000);
INSERT INTO `donhangchitiet` VALUES (672, 3, 22, 95, 87400000);
INSERT INTO `donhangchitiet` VALUES (673, 4, 22, 95, 87400000);
INSERT INTO `donhangchitiet` VALUES (674, 5, 22, 95, 87400000);
INSERT INTO `donhangchitiet` VALUES (675, 6, 22, 95, 87400000);
INSERT INTO `donhangchitiet` VALUES (676, 7, 22, 95, 87400000);
INSERT INTO `donhangchitiet` VALUES (677, 8, 22, 95, 87400000);
INSERT INTO `donhangchitiet` VALUES (678, 9, 22, 95, 87400000);
INSERT INTO `donhangchitiet` VALUES (679, 10, 22, 95, 87400000);
INSERT INTO `donhangchitiet` VALUES (680, 11, 22, 95, 87400000);
INSERT INTO `donhangchitiet` VALUES (681, 13, 22, 95, 87400000);
INSERT INTO `donhangchitiet` VALUES (682, 14, 22, 95, 87400000);
INSERT INTO `donhangchitiet` VALUES (683, 15, 22, 95, 87400000);
INSERT INTO `donhangchitiet` VALUES (684, 16, 22, 95, 87400000);
INSERT INTO `donhangchitiet` VALUES (685, 1, 62, 12, 13584000);
INSERT INTO `donhangchitiet` VALUES (686, 2, 62, 12, 13584000);
INSERT INTO `donhangchitiet` VALUES (687, 3, 62, 12, 13584000);
INSERT INTO `donhangchitiet` VALUES (688, 4, 62, 12, 13584000);
INSERT INTO `donhangchitiet` VALUES (689, 5, 62, 12, 13584000);
INSERT INTO `donhangchitiet` VALUES (690, 6, 62, 12, 13584000);
INSERT INTO `donhangchitiet` VALUES (691, 7, 62, 12, 13584000);
INSERT INTO `donhangchitiet` VALUES (692, 8, 62, 12, 13584000);
INSERT INTO `donhangchitiet` VALUES (693, 9, 62, 12, 13584000);
INSERT INTO `donhangchitiet` VALUES (694, 10, 62, 12, 13584000);
INSERT INTO `donhangchitiet` VALUES (695, 11, 62, 12, 13584000);
INSERT INTO `donhangchitiet` VALUES (696, 13, 62, 12, 13584000);
INSERT INTO `donhangchitiet` VALUES (697, 14, 62, 12, 13584000);
INSERT INTO `donhangchitiet` VALUES (698, 15, 62, 12, 13584000);
INSERT INTO `donhangchitiet` VALUES (699, 16, 62, 12, 13584000);
INSERT INTO `donhangchitiet` VALUES (700, 1, 45, 34, 3400000);
INSERT INTO `donhangchitiet` VALUES (701, 2, 45, 34, 3400000);
INSERT INTO `donhangchitiet` VALUES (702, 3, 45, 34, 3400000);
INSERT INTO `donhangchitiet` VALUES (703, 4, 45, 34, 3400000);
INSERT INTO `donhangchitiet` VALUES (704, 5, 45, 34, 3400000);
INSERT INTO `donhangchitiet` VALUES (705, 6, 45, 34, 3400000);
INSERT INTO `donhangchitiet` VALUES (706, 7, 45, 34, 3400000);
INSERT INTO `donhangchitiet` VALUES (707, 8, 45, 34, 3400000);
INSERT INTO `donhangchitiet` VALUES (708, 9, 45, 34, 3400000);
INSERT INTO `donhangchitiet` VALUES (709, 10, 45, 34, 3400000);
INSERT INTO `donhangchitiet` VALUES (710, 11, 45, 34, 3400000);
INSERT INTO `donhangchitiet` VALUES (711, 13, 45, 34, 3400000);
INSERT INTO `donhangchitiet` VALUES (712, 14, 45, 34, 3400000);
INSERT INTO `donhangchitiet` VALUES (713, 15, 45, 34, 3400000);
INSERT INTO `donhangchitiet` VALUES (714, 16, 45, 34, 3400000);
INSERT INTO `donhangchitiet` VALUES (715, 1, 78, 100, 47500000);
INSERT INTO `donhangchitiet` VALUES (716, 2, 78, 100, 47500000);
INSERT INTO `donhangchitiet` VALUES (717, 3, 78, 100, 47500000);
INSERT INTO `donhangchitiet` VALUES (718, 4, 78, 100, 47500000);
INSERT INTO `donhangchitiet` VALUES (719, 5, 78, 100, 47500000);
INSERT INTO `donhangchitiet` VALUES (720, 6, 78, 100, 47500000);
INSERT INTO `donhangchitiet` VALUES (721, 7, 78, 100, 47500000);
INSERT INTO `donhangchitiet` VALUES (722, 8, 78, 100, 47500000);
INSERT INTO `donhangchitiet` VALUES (723, 9, 78, 100, 47500000);
INSERT INTO `donhangchitiet` VALUES (724, 10, 78, 100, 47500000);
INSERT INTO `donhangchitiet` VALUES (725, 11, 78, 100, 47500000);
INSERT INTO `donhangchitiet` VALUES (726, 13, 78, 100, 47500000);
INSERT INTO `donhangchitiet` VALUES (727, 14, 78, 100, 47500000);
INSERT INTO `donhangchitiet` VALUES (728, 15, 78, 100, 47500000);
INSERT INTO `donhangchitiet` VALUES (729, 16, 78, 100, 47500000);
INSERT INTO `donhangchitiet` VALUES (730, 1, 92, 123, 1649184000);
INSERT INTO `donhangchitiet` VALUES (731, 2, 92, 123, 1649184000);
INSERT INTO `donhangchitiet` VALUES (732, 3, 92, 123, 1649184000);
INSERT INTO `donhangchitiet` VALUES (733, 4, 92, 123, 1649184000);
INSERT INTO `donhangchitiet` VALUES (734, 5, 92, 123, 1649184000);
INSERT INTO `donhangchitiet` VALUES (735, 6, 92, 123, 1649184000);
INSERT INTO `donhangchitiet` VALUES (736, 7, 92, 123, 1649184000);
INSERT INTO `donhangchitiet` VALUES (737, 8, 92, 123, 1649184000);
INSERT INTO `donhangchitiet` VALUES (738, 9, 92, 123, 1649184000);
INSERT INTO `donhangchitiet` VALUES (739, 10, 92, 123, 1649184000);
INSERT INTO `donhangchitiet` VALUES (740, 11, 92, 123, 1649184000);
INSERT INTO `donhangchitiet` VALUES (741, 13, 92, 123, 1649184000);
INSERT INTO `donhangchitiet` VALUES (742, 14, 92, 123, 1649184000);
INSERT INTO `donhangchitiet` VALUES (743, 15, 92, 123, 1649184000);
INSERT INTO `donhangchitiet` VALUES (744, 16, 92, 123, 1649184000);
INSERT INTO `donhangchitiet` VALUES (745, 1, 70, 300, 37200000);
INSERT INTO `donhangchitiet` VALUES (746, 2, 70, 300, 37200000);
INSERT INTO `donhangchitiet` VALUES (747, 3, 70, 300, 37200000);
INSERT INTO `donhangchitiet` VALUES (748, 4, 70, 300, 37200000);
INSERT INTO `donhangchitiet` VALUES (749, 5, 70, 300, 37200000);
INSERT INTO `donhangchitiet` VALUES (750, 6, 70, 300, 37200000);
INSERT INTO `donhangchitiet` VALUES (751, 7, 70, 300, 37200000);
INSERT INTO `donhangchitiet` VALUES (752, 8, 70, 300, 37200000);
INSERT INTO `donhangchitiet` VALUES (753, 9, 70, 300, 37200000);
INSERT INTO `donhangchitiet` VALUES (754, 10, 70, 300, 37200000);
INSERT INTO `donhangchitiet` VALUES (755, 11, 70, 300, 37200000);
INSERT INTO `donhangchitiet` VALUES (756, 13, 70, 300, 37200000);
INSERT INTO `donhangchitiet` VALUES (757, 14, 70, 300, 37200000);
INSERT INTO `donhangchitiet` VALUES (758, 15, 70, 300, 37200000);
INSERT INTO `donhangchitiet` VALUES (759, 16, 70, 300, 37200000);
INSERT INTO `donhangchitiet` VALUES (760, 1, 35, 23, 13455000);
INSERT INTO `donhangchitiet` VALUES (761, 2, 35, 23, 13455000);
INSERT INTO `donhangchitiet` VALUES (762, 3, 35, 23, 13455000);
INSERT INTO `donhangchitiet` VALUES (763, 4, 35, 23, 13455000);
INSERT INTO `donhangchitiet` VALUES (764, 5, 35, 23, 13455000);
INSERT INTO `donhangchitiet` VALUES (765, 6, 35, 23, 13455000);
INSERT INTO `donhangchitiet` VALUES (766, 7, 35, 23, 13455000);
INSERT INTO `donhangchitiet` VALUES (767, 8, 35, 23, 13455000);
INSERT INTO `donhangchitiet` VALUES (768, 9, 35, 23, 13455000);
INSERT INTO `donhangchitiet` VALUES (769, 10, 35, 23, 13455000);
INSERT INTO `donhangchitiet` VALUES (770, 11, 35, 23, 13455000);
INSERT INTO `donhangchitiet` VALUES (771, 13, 35, 23, 13455000);
INSERT INTO `donhangchitiet` VALUES (772, 14, 35, 23, 13455000);
INSERT INTO `donhangchitiet` VALUES (773, 15, 35, 23, 13455000);
INSERT INTO `donhangchitiet` VALUES (774, 16, 35, 23, 13455000);
INSERT INTO `donhangchitiet` VALUES (775, 1, 28, 122, 59536000);
INSERT INTO `donhangchitiet` VALUES (776, 2, 28, 122, 59536000);
INSERT INTO `donhangchitiet` VALUES (777, 3, 28, 122, 59536000);
INSERT INTO `donhangchitiet` VALUES (778, 4, 28, 122, 59536000);
INSERT INTO `donhangchitiet` VALUES (779, 5, 28, 122, 59536000);
INSERT INTO `donhangchitiet` VALUES (780, 6, 28, 122, 59536000);
INSERT INTO `donhangchitiet` VALUES (781, 7, 28, 122, 59536000);
INSERT INTO `donhangchitiet` VALUES (782, 8, 28, 122, 59536000);
INSERT INTO `donhangchitiet` VALUES (783, 9, 28, 122, 59536000);
INSERT INTO `donhangchitiet` VALUES (784, 10, 28, 122, 59536000);
INSERT INTO `donhangchitiet` VALUES (785, 11, 28, 122, 59536000);
INSERT INTO `donhangchitiet` VALUES (786, 13, 28, 122, 59536000);
INSERT INTO `donhangchitiet` VALUES (787, 14, 28, 122, 59536000);
INSERT INTO `donhangchitiet` VALUES (788, 15, 28, 122, 59536000);
INSERT INTO `donhangchitiet` VALUES (789, 16, 28, 122, 59536000);
INSERT INTO `donhangchitiet` VALUES (790, 1, 37, 235, 109980000);
INSERT INTO `donhangchitiet` VALUES (791, 2, 37, 235, 109980000);
INSERT INTO `donhangchitiet` VALUES (792, 3, 37, 235, 109980000);
INSERT INTO `donhangchitiet` VALUES (793, 4, 37, 235, 109980000);
INSERT INTO `donhangchitiet` VALUES (794, 5, 37, 235, 109980000);
INSERT INTO `donhangchitiet` VALUES (795, 6, 37, 235, 109980000);
INSERT INTO `donhangchitiet` VALUES (796, 7, 37, 235, 109980000);
INSERT INTO `donhangchitiet` VALUES (797, 8, 37, 235, 109980000);
INSERT INTO `donhangchitiet` VALUES (798, 9, 37, 235, 109980000);
INSERT INTO `donhangchitiet` VALUES (799, 10, 37, 235, 109980000);
INSERT INTO `donhangchitiet` VALUES (800, 11, 37, 235, 109980000);
INSERT INTO `donhangchitiet` VALUES (801, 13, 37, 235, 109980000);
INSERT INTO `donhangchitiet` VALUES (802, 14, 37, 235, 109980000);
INSERT INTO `donhangchitiet` VALUES (803, 15, 37, 235, 109980000);
INSERT INTO `donhangchitiet` VALUES (804, 16, 37, 235, 109980000);

-- --------------------------------------------------------

-- 
-- Table structure for table `gopy`
-- 

CREATE TABLE `gopy` (
  `idGopy` int(11) NOT NULL auto_increment,
  `Ngay` date NOT NULL default '0000-00-00',
  `NoiDung` text NOT NULL,
  `Email` varchar(255) default NULL,
  `HoTen` varchar(255) default NULL,
  `DiaChi` varchar(255) default NULL,
  PRIMARY KEY  (`idGopy`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

-- 
-- Dumping data for table `gopy`
-- 

INSERT INTO `gopy` VALUES (4, '2011-02-02', 'Dep qua', 'duoc@company.mail', NULL, NULL);

-- --------------------------------------------------------

-- 
-- Table structure for table `guimail`
-- 

CREATE TABLE `guimail` (
  `idMail` int(11) NOT NULL auto_increment,
  `mailNG` varchar(100) NOT NULL,
  `mailNN` varchar(100) NOT NULL,
  `loinhan` text NOT NULL,
  `link` varchar(250) NOT NULL,
  `idSP` int(11) NOT NULL,
  `Ngaygui` date NOT NULL,
  PRIMARY KEY  (`idMail`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

-- 
-- Dumping data for table `guimail`
-- 

INSERT INTO `guimail` VALUES (1, 'star_computer@companu.mail', 'duoc@company.mail', 'dsds', '/star_computer/index.php?mod=chitietsp&idSP=43', 43, '0000-00-00');
INSERT INTO `guimail` VALUES (2, 'star_computer@companu.mail', 'duoc@company.mail', 'dsds', '/star_computer/index.php?mod=chitietsp&idSP=43', 43, '0000-00-00');
INSERT INTO `guimail` VALUES (3, 'star_computer@companu.mail', 'duoc@company.mail', 'dsds', '/star_computer/index.php?mod=chitietsp&idSP=43', 43, '0000-00-00');
INSERT INTO `guimail` VALUES (4, 'star_computer@companu.mail', 'duoc@company.mail', 'dsds', '/star_computer/index.php?mod=chitietsp&idSP=43', 43, '0000-00-00');
INSERT INTO `guimail` VALUES (5, 'star_computer@companu.mail', 'duoc@company.mail', 'dsds', '/star_computer/index.php?mod=chitietsp&idSP=43', 43, '0000-00-00');
INSERT INTO `guimail` VALUES (6, 'star_computer@companu.mail', 'duoc@company.mail', 'dsds', '/star_computer/index.php?mod=chitietsp&idSP=43', 43, '0000-00-00');
INSERT INTO `guimail` VALUES (7, 'star_computer@companu.mail', 'duoc@company.mail', 'dsds', '/star_computer/index.php?mod=chitietsp&idSP=43', 43, '0000-00-00');
INSERT INTO `guimail` VALUES (8, 'star_computer@companu.mail', 'duoc@company.mail', 'dsds', '/star_computer/index.php?mod=chitietsp&idSP=43', 43, '0000-00-00');
INSERT INTO `guimail` VALUES (9, 'star_computer@companu.mail', 'duoc@company.mail', 'dsds', '/star_computer/index.php?mod=chitietsp&idSP=43', 43, '0000-00-00');
INSERT INTO `guimail` VALUES (10, 'duoc@company.mail', 'star_computer@company.mail', 'Sản phẩm này mới nè !!!', 'http://localhost/star_computer/index.php?mod=chitietsp&idSP=52', 52, '0000-00-00');
INSERT INTO `guimail` VALUES (11, 'duoc@company.mail', 'star_computer@company.mail', 'Sản phẩm này mới nè !!!', 'http://localhost/star_computer/index.php?mod=chitietsp&idSP=52', 52, '0000-00-00');
INSERT INTO `guimail` VALUES (12, 'duoc@company.mail', 'star_computer@company.mail', 'Dep', 'http://localhost/star_computer/index.php?mod=chitietsp&idSP=49', 49, '0000-00-00');

-- --------------------------------------------------------

-- 
-- Table structure for table `hangsx`
-- 

CREATE TABLE `hangsx` (
  `idHang` int(2) NOT NULL auto_increment,
  `Ten` varchar(100) NOT NULL,
  `ThuTu` int(11) NOT NULL,
  `AnHien` tinyint(1) NOT NULL default '1',
  PRIMARY KEY  (`idHang`),
  UNIQUE KEY `Ten` (`Ten`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='Hãng ' AUTO_INCREMENT=29 ;

-- 
-- Dumping data for table `hangsx`
-- 

INSERT INTO `hangsx` VALUES (2, 'IBM', 1, 1);
INSERT INTO `hangsx` VALUES (27, 'Transcend', 1, 1);
INSERT INTO `hangsx` VALUES (26, 'Khác...', 1, 0);
INSERT INTO `hangsx` VALUES (21, 'Inter', 2, 1);
INSERT INTO `hangsx` VALUES (16, 'ASUS', 4, 1);
INSERT INTO `hangsx` VALUES (13, 'SAMSUNG', 5, 1);
INSERT INTO `hangsx` VALUES (23, 'Dell', 3, 1);
INSERT INTO `hangsx` VALUES (28, 'Hp', 1, 1);
INSERT INTO `hangsx` VALUES (24, 'AMD', 1, 1);

-- --------------------------------------------------------

-- 
-- Table structure for table `hiensomautin`
-- 

CREATE TABLE `hiensomautin` (
  `idSoMauTin` int(2) NOT NULL,
  `TenMauTin` varchar(100) NOT NULL,
  `SoMauTin` int(2) NOT NULL,
  PRIMARY KEY  (`idSoMauTin`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Dùng để giới hạn mau tin trong LIMIT';

-- 
-- Dumping data for table `hiensomautin`
-- 

INSERT INTO `hiensomautin` VALUES (1, 'Tin nổi bật', 5);
INSERT INTO `hiensomautin` VALUES (2, 'Sản phẩm mới', 5);
INSERT INTO `hiensomautin` VALUES (3, 'Sản phẩm bán chạy', 5);
INSERT INTO `hiensomautin` VALUES (4, 'Số sản phẩm trên 1 trang', 9);
INSERT INTO `hiensomautin` VALUES (5, 'Số sản phẩm trên 1 dòng', 3);
INSERT INTO `hiensomautin` VALUES (0, 'Sản phẩm xem nhiều nhất', 5);

-- --------------------------------------------------------

-- 
-- Table structure for table `khuyenmai`
-- 

CREATE TABLE `khuyenmai` (
  `idKM` int(2) NOT NULL,
  `idLoaiSP` int(2) NOT NULL,
  `NoidungKM` varchar(250) NOT NULL,
  `HinhAnh` varchar(250) default NULL,
  `ThoiGianBD` date NOT NULL,
  `ThoiGianKT` date NOT NULL,
  PRIMARY KEY  (`idKM`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Khuyến mãi';

-- 
-- Dumping data for table `khuyenmai`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `lienhe`
-- 

CREATE TABLE `lienhe` (
  `idMail` int(11) NOT NULL auto_increment,
  `mailNG` varchar(100) NOT NULL,
  `loinhan` text NOT NULL,
  `Ngaygui` date NOT NULL,
  PRIMARY KEY  (`idMail`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

-- 
-- Dumping data for table `lienhe`
-- 

INSERT INTO `lienhe` VALUES (4, 'duoc@company.mail', 'Không đăng kí được', '2011-02-07');

-- --------------------------------------------------------

-- 
-- Table structure for table `lienket`
-- 

CREATE TABLE `lienket` (
  `idLienKet` int(11) NOT NULL,
  `Ten` varchar(255) NOT NULL,
  `Url` varchar(255) NOT NULL,
  `ThuTu` int(11) NOT NULL,
  `AnHien` tinyint(1) NOT NULL,
  PRIMARY KEY  (`idLienKet`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Liên kết';

-- 
-- Dumping data for table `lienket`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `loaisp`
-- 

CREATE TABLE `loaisp` (
  `idLoaiSP` int(11) NOT NULL auto_increment,
  `idCL` int(11) NOT NULL,
  `Ten` varchar(100) NOT NULL,
  `ThuTu` int(11) NOT NULL,
  `AnHien` tinyint(1) NOT NULL,
  PRIMARY KEY  (`idLoaiSP`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=29 ;

-- 
-- Dumping data for table `loaisp`
-- 

INSERT INTO `loaisp` VALUES (1, 1, 'Asus', 1, 1);
INSERT INTO `loaisp` VALUES (2, 1, 'Intel', 2, 1);
INSERT INTO `loaisp` VALUES (3, 1, 'Gigabyte', 3, 1);
INSERT INTO `loaisp` VALUES (22, 12, 'Sony', 1, 1);
INSERT INTO `loaisp` VALUES (5, 2, 'Intel', 1, 1);
INSERT INTO `loaisp` VALUES (6, 2, 'AMD', 2, 1);
INSERT INTO `loaisp` VALUES (7, 6, 'SamSung', 2, 1);
INSERT INTO `loaisp` VALUES (8, 3, 'SamSung', 1, 1);
INSERT INTO `loaisp` VALUES (9, 4, 'Kinhmax', 1, 1);
INSERT INTO `loaisp` VALUES (10, 4, 'SamSung', 2, 1);
INSERT INTO `loaisp` VALUES (11, 4, 'ELIXIR', 1, 1);
INSERT INTO `loaisp` VALUES (12, 4, 'Transcend', 0, 1);
INSERT INTO `loaisp` VALUES (13, 7, 'Mitsumi', 1, 1);
INSERT INTO `loaisp` VALUES (14, 7, 'Genius', 2, 1);
INSERT INTO `loaisp` VALUES (15, 8, 'Creative', 2, 1);
INSERT INTO `loaisp` VALUES (16, 9, 'Transcend', 1, 1);
INSERT INTO `loaisp` VALUES (17, 9, 'SamSung', 2, 1);
INSERT INTO `loaisp` VALUES (18, 10, 'Mitsumi', 1, 1);
INSERT INTO `loaisp` VALUES (19, 10, 'Gesnius', 2, 1);
INSERT INTO `loaisp` VALUES (20, 11, 'SoundMax', 2, 1);
INSERT INTO `loaisp` VALUES (21, 11, 'HUYNDAI', 2, 1);
INSERT INTO `loaisp` VALUES (23, 12, 'Acer', 2, 1);
INSERT INTO `loaisp` VALUES (24, 13, 'Hp', 2, 1);
INSERT INTO `loaisp` VALUES (25, 13, 'IBM', 2, 1);
INSERT INTO `loaisp` VALUES (26, 14, 'Arrow', 1, 1);
INSERT INTO `loaisp` VALUES (27, 14, 'Acbel', 2, 1);
INSERT INTO `loaisp` VALUES (28, 6, 'Dell', 2, 1);

-- --------------------------------------------------------

-- 
-- Table structure for table `luugiohang`
-- 

CREATE TABLE `luugiohang` (
  `idGH` int(11) NOT NULL auto_increment,
  `idSP` int(3) NOT NULL,
  `iduser` int(3) NOT NULL,
  `SL` int(11) NOT NULL default '0',
  PRIMARY KEY  (`idGH`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=328 ;

-- 
-- Dumping data for table `luugiohang`
-- 

INSERT INTO `luugiohang` VALUES (327, 89, 21, 1);

-- --------------------------------------------------------

-- 
-- Table structure for table `menu`
-- 

CREATE TABLE `menu` (
  `id` int(11) NOT NULL auto_increment,
  `Ten` varchar(100) NOT NULL,
  `Url` varchar(100) NOT NULL,
  `topmenu` int(1) NOT NULL,
  `mainmenu` int(1) NOT NULL,
  `footer` mediumint(1) NOT NULL,
  `ThuTu` int(11) NOT NULL,
  `AnHien` tinyint(1) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='Các thành phần trên Menu chinh' AUTO_INCREMENT=13 ;

-- 
-- Dumping data for table `menu`
-- 

INSERT INTO `menu` VALUES (4, 'TIN TỨC', 'tintuc.php', 1, 1, 1, 4, 1);
INSERT INTO `menu` VALUES (5, 'BẢO HÀNH', 'baohanh.php', 1, 1, 1, 5, 1);
INSERT INTO `menu` VALUES (7, 'KHÁCH HÀNG', 'khachhang.php', 1, 1, 1, 7, 1);
INSERT INTO `menu` VALUES (8, 'ĐĂNG KÍ', 'dangki.php', 1, 1, 0, 5, 1);
INSERT INTO `menu` VALUES (9, 'TRANG CHỦ', 'home.php', 1, 1, 1, 1, 1);
INSERT INTO `menu` VALUES (10, 'GIỚI THIỆU', 'gioithieu.php', 1, 1, 1, 1, 1);
INSERT INTO `menu` VALUES (12, 'LIÊN HỆ', 'lienhe.php', 1, 1, 1, 10, 1);

-- --------------------------------------------------------

-- 
-- Table structure for table `nhomchucnang`
-- 

CREATE TABLE `nhomchucnang` (
  `idNhomCN` int(11) NOT NULL auto_increment,
  `TenCN` varchar(250) NOT NULL,
  PRIMARY KEY  (`idNhomCN`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

-- 
-- Dumping data for table `nhomchucnang`
-- 

INSERT INTO `nhomchucnang` VALUES (3, 'Danh mục khác');
INSERT INTO `nhomchucnang` VALUES (1, 'Hỗ trợ');
INSERT INTO `nhomchucnang` VALUES (2, 'Giải trí');

-- --------------------------------------------------------

-- 
-- Table structure for table `quangcao`
-- 

CREATE TABLE `quangcao` (
  `idQC` int(11) NOT NULL auto_increment,
  `MoTa` text NOT NULL,
  `Url` varchar(250) NOT NULL,
  `urlHinh` varchar(250) NOT NULL,
  `Ngaydang` date NOT NULL,
  `NgayKT` date NOT NULL,
  `AnHien` tinyint(1) NOT NULL default '1',
  PRIMARY KEY  (`idQC`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

-- 
-- Dumping data for table `quangcao`
-- 

INSERT INTO `quangcao` VALUES (6, 'Bkav', 'http://bkav.com.vn', 'images_1.jpg', '2011-02-13', '2011-06-29', 1);
INSERT INTO `quangcao` VALUES (7, 'Kis', 'http://kis.com.vn', 'ABHSRIQCAMOZFSHCAZHW02QCAQ31LCUCAD62NY8CAJV23SSCA8NZPBYCAVD9RI8CAZJGONXCAYZ3HRICASY1VZ2CA2ARC8VCAN2SU2WCAH645GZCASZ57HHCAC76H69CAJFXYRDCAP0LBLVCAHOI144CAHR809Q_1.jpg', '2011-02-13', '2011-02-15', 1);

-- --------------------------------------------------------

-- 
-- Table structure for table `sanpham`
-- 

CREATE TABLE `sanpham` (
  `idSP` int(11) NOT NULL auto_increment,
  `TenSP` varchar(100) NOT NULL,
  `idCL` int(11) default '0',
  `idLoaiSP` int(11) default '0',
  `idHang` int(11) default '0',
  `MoTa` text,
  `HinhAnh` varchar(250) default NULL,
  `DonGia` double NOT NULL,
  `BaoHanh` int(2) default '0',
  `NgayCapNhat` date NOT NULL,
  `SoLanXem` int(11) default '0',
  `SoLanMua` int(11) default '0',
  `TinhTrang` int(11) default '0' COMMENT 'Còn hàng hay không còn hàng',
  `SoLuongTonKho` int(11) default '0',
  `ThuTu` int(11) NOT NULL,
  `AnHien` tinyint(1) NOT NULL,
  PRIMARY KEY  (`idSP`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='Sản phẩm' AUTO_INCREMENT=131 ;

-- 
-- Dumping data for table `sanpham`
-- 

INSERT INTO `sanpham` VALUES (1, 'Mainboard asus-DEKN', 1, 1, 16, NULL, 'CA1O29PUCAGP4IHUCASXBFVOCA830PC5CA5LJYFCCA2A8QG3CACT5AEGCAL72RWUCABLLEN7CADHBRHECA0AAZV9CAMA1PC5CARALGK6CAVSBT8DCA6Q62BUCA2IVTBTCA4V9YDSCA2O9KICCAUB00ZF_1.jpg', 1400000, 36, '2011-02-03', 0, 9, 0, 199, 1, 1);
INSERT INTO `sanpham` VALUES (2, 'Mainboard Intel-GTH', 1, 2, 21, NULL, 'CA0HY9SICAMH1B1RCAFVCVC3CAY1MTAJCA93AAJACANS6E4LCATGHF76CAMF74ADCAZAEIDHCAF7VB22CA1V4DYBCAMM1JLSCAIVXJ9WCAM0PDL0CAOH1IAOCAI1HWAZCAAAQH7LCACSVKNMCAD5ONH8.jpg', 12340000, 36, '2011-02-03', 0, 10, 0, NULL, 2, 1);
INSERT INTO `sanpham` VALUES (3, 'Mainboard asus-GTH', 1, 1, 16, NULL, 'CA5BZPVLCA1E279QCA5NWPKRCAY5I5R7CAB1LIEPCA0KJORHCAV4C6G3CANOLGEACA4YCO9QCAFNRBR8CAL5NUINCAN109XACAKAWSH1CA1653WECAUYHJDICA2N8URLCAWF9WJ6CAOSJHKECAY2REMU.jpg', 1234000, 36, '2011-02-03', 0, 4, 0, 200, 2, 1);
INSERT INTO `sanpham` VALUES (4, 'Celeron-D430', 2, 6, 24, 'Socket 775-512k-bus-800', 'CAHYX77FCAU7MCB6CAKEK83FCARKCRRDCAKF9ER5CAHMNCTQCAMWECUCCAZ77T8JCA2460TKCAQM3I0MCA0UA9XTCA94THOQCAFKNWVMCA638WRTCA3FJ0APCASBIO9QCAEJHF9MCAWCER7HCA1E7MPR.jpg', 780000, 36, '2011-02-03', 0, 10, 0, 0, 1, 1);
INSERT INTO `sanpham` VALUES (5, 'Celeron-E300', 2, 6, 24, 'socket 775-1M-Bus:800-2.5Ghz', 'CAJ9LIE1CABNSJC2CAMSL9X7CAYH76LXCAX5AJCYCAWCZ3T6CAA3YMMFCAAF1GM8CAG6PSOICAY51Z5BCAJAOTG2CAC1QTPUCA0OYF8SCAWCC8O0CAWOBDLCCAFAEXUTCAEQS2VVCA53ED41CABZWOMF.jpg', 983000, 36, '2011-02-03', 0, 2, 0, 100, 2, 1);
INSERT INTO `sanpham` VALUES (6, 'Core2 Duo-E7500', 2, 5, 21, '3Ghz-socket775-3M-bus 800', 'images.jpg', 2040000, 36, '2011-02-03', 0, 2, 0, 0, 2, 1);
INSERT INTO `sanpham` VALUES (7, 'Corei7 -661', 2, 5, 21, '3Ghz-socket775-4M- 2core,22treads ', 'CAL946ZGCA1PMJH9CAJ5XHLPCARW2WXJCA5D1GN0CA843A0BCAO5L7L1CA0ZL9CZCA1DH6RTCAHYZRLSCAQ2ZEYOCA6PJ2FTCA7BIKOKCA38Y7Q9CASE3JO0CAVR6TUTCAWBTTYGCA0AOA5CCAQCH81M.jpg', 2340000, 36, '2011-02-03', 0, 0, 0, 12, 3, 1);
INSERT INTO `sanpham` VALUES (8, 'Intel pentum4-DGT56', 2, 5, 21, NULL, 'imagesyuyuy.jpg', 1500000, 36, '2011-02-03', 0, 4, 0, 11, 2, 1);
INSERT INTO `sanpham` VALUES (9, 'Intel penltum4-D4000', 2, 5, 21, 'socket 775-2M-Bus 800-3Ghz', 'imagesyuyyuyuyuy.jpg', 1200000, 36, '2011-02-03', 0, 0, 0, 10, 3, 1);
INSERT INTO `sanpham` VALUES (10, 'Corei7 -E5200', 2, 5, 21, 'socket 775-4M- 4Cores-bus 800-3.2Ghz', 'imagestrtytyttr.jpg', 4000000, 36, '2011-02-03', 0, 0, 0, 12, 2, 1);
INSERT INTO `sanpham` VALUES (11, 'Core2 Duo-F4500', 2, 5, 21, 'Socket 755-3.2Ghz-bus 800-2Core', 'imagesfrererere.jpg', 230000, 36, '2011-02-03', 0, 0, 0, 10, 2, 1);
INSERT INTO `sanpham` VALUES (12, 'Core2-D4300', 2, 5, 21, 'Soxket775-bus:800-3GHz', 'CA2QCHZSCAG4N1N1CA49KNQ1CAL7Y3Z3CAV80YW4CAMBF961CAXCW0WHCAR5MC13CAQ75TTRCA44XUVKCAFICGRTCAL8NNQMCAVR4G4VCAAZ50G4CA8G73MGCAAX94A5CASJ3BWUCAFBIJP4CAL0LSZT.jpg', 2300000, 36, '2011-02-03', 0, 0, 0, 12, 3, 1);
INSERT INTO `sanpham` VALUES (13, 'Penttum', 2, 5, 21, 'SocKet775-Bus800-3Ghz-2M', 'CASPOXH1CAQKHOBCCAD69LL8CAT9HGEJCA5K7KGMCA4AK73DCAE07WJNCA0U88MZCAGEI0V3CA4SJ134CAIH2VCHCAU6O675CAMFDZ4ACA9X233ACAYPTKNZCAPV1BQ2CAU6LJYXCAC0RYU3CAVULM77.jpg', 15600000, 36, '2011-02-03', 0, 0, 0, 23, 2, 1);
INSERT INTO `sanpham` VALUES (14, 'Core2 Duo-F5000', 2, 5, 21, 'Socket775-Bus800-3Ghz-2M-2Core', 'imagesfrererere_1.jpg', 2000000, 36, '2011-02-03', 0, 0, 0, 200, 3, 1);
INSERT INTO `sanpham` VALUES (15, 'Mainboard Intel-5600', 1, 2, 21, 'Bus800-socket755-4Slot-8usb-', 'CA8QX5QDCAVK5F0OCAKX0OFVCAD6GIUHCAHQ7A09CAAU4X7YCA0GY23DCAJ0VJORCAO5ISTSCAVC9C2KCAXH5DGLCAZJ4XC3CAS5K35TCAE3WXIZCA7920JCCAF50NZ8CADHX8XDCAWSO8YWCA2P8E1L.jpg', 1200000, 36, '2011-02-03', 0, 1, 0, 2, 1, 1);
INSERT INTO `sanpham` VALUES (16, 'SysMaster740N', 6, 7, 13, '17",5tr màu', 'CA0YV4P5CAQVPIDDCAUGV5R4CAZX1XPECA10I0Q2CA2OFUVMCAF90UKZCAOY7GT3CAC5KE9VCARA6I77CA8SKZ7JCA5N9F95CAVI68NVCA9Q6JK5CAA3VOGICAQM0XXGCAURPO5XCAX892UQCADRSK4D.jpg', 3000000, 36, '2011-02-03', 0, 1, 0, 0, 1, 1);
INSERT INTO `sanpham` VALUES (17, 'SysMaster741N', 6, 7, 13, '1600x668,Độ tương phản 50.000:1-Thời gian đáp ựng5(ms)', 'CA1JJQMCCASI03E0CATBSKV3CAPTZO5WCAA520QZCA5I0IZSCAZIAMPICAJEAWX6CA2CJF80CANVD2VHCAB8RGGICA5GMDFMCA0KWSFHCAB72GR1CAE4OFTDCAKQ5KXXCA39TJXVCAECSAKXCAAWLHY3.jpg', 2300000, 24, '2011-02-03', 0, 0, 0, 200, 1, 1);
INSERT INTO `sanpham` VALUES (18, 'Samsung B2030', 6, 7, 13, '1600x900,DVI,Độ tương phản 50.000:1,Thời gian đáp ứng 5(ms)', 'CA4O8E1HCAEQJ5E3CA1I9GK1CAGDX499CAKH4XP4CAF37PTCCAVKG0YLCA0NQ8Y2CACJ9PPGCAHGEIO3CAFV9CEUCAADGBOBCABA2WF9CA61X87BCAL8MVLJCAP9QNURCA75Y35NCAVL4K00CAV3OOCG.jpg', 2350000, 24, '2011-02-03', 0, 2, 0, 21, 2, 1);
INSERT INTO `sanpham` VALUES (19, 'Samsung P2030', 6, 7, 13, '20" 1600x900,DVI,Độ tương phản 50:000:1,Thời gian đáp ứng 5(ms)', 'CA5NBFT1CAT4RI2MCAH0UCMACA9CK06FCAU1M26CCAINVWIECAU2Y2JKCASQSM9NCA8MS73XCAUKHL1OCAAGNDG6CAZQCPT1CAZPI5A3CA9FVY94CA456BRACA2LGME0CAEMF4MWCAFHN3N3CAE6RQGG.jpg', 3050000, 24, '2011-02-03', 0, 7, 0, 230, 2, 1);
INSERT INTO `sanpham` VALUES (20, 'Samsung LED EX2020X', 6, 7, 13, '20" 1600x900,DVI,Độ tương phản 50:000:1,Thời gian đáp ứng 5(ms)', 'CA7AH5CBCA1F6PBJCA2BSTGXCA40WLWECAQXCIO0CA72SO9SCAK902H3CARWN82ICA9YQSIRCAQ4QJKWCAZ1PLSUCA8JJRP2CAQXR2H0CAVK3SDECANZFUBVCAJ5S1GDCAO9J698CAUSF3AXCAYNZH3H.jpg', 3100000, 24, '2011-02-03', 0, 2, 0, 21, 3, 1);
INSERT INTO `sanpham` VALUES (21, 'Samsung P2370H', 6, 7, 13, '1920x1080,DVI,Độ phân giải 50:000:1,Thời gian đáp ựng(ms)', 'CA8I3WLJCAOS2JSLCA4NAAQUCARS14N3CA34BYAPCAO61H11CAWSQTS6CAH2A1YMCA419R0BCAWVJKUPCAJBJAAUCAU5EQ6TCA9YD360CAZRMB1VCANTT6BZCAFKY2UDCAG62OTJCARWB5C2CA99WFTU.jpg', 3100000, 24, '2011-02-03', 0, 1, 0, 3, 1, 1);
INSERT INTO `sanpham` VALUES (22, 'Samsung sata', 3, 8, 13, 'Sata-3Gb/s-7.200 rpm-8MB cache-500Gb', 'CA1N7X9NCAGWGOWRCAXM8QWCCAVQIRCNCANWTXR9CAX9U718CAZPL29ZCAH8TJ39CACVRX4MCAE903KXCA04A1HECAR4PLD3CALZLM3ACAWL9AQKCA006CRTCAE2GEC0CA94ET2GCA1WMA2RCAE0R11K.jpg', 920000, 12, '2011-02-03', 0, 9, 0, 0, 2, 1);
INSERT INTO `sanpham` VALUES (23, '250GB-Samsung sata 2', 3, 8, 13, 'Sata-3Gb/s-72.000 rpm-32MB Cache', 'CA1VEXDECAPKHA0HCABMJ65JCAX1CC76CAWMYM67CAJCKK5QCARVW48YCAIC0UPPCA50R5EWCA5JPLTPCA47FG9WCAMO2TMNCAHJMO6UCANFE9VYCADBML4GCA0AWC4HCA5LXFBGCALHID3CCAQBXW88.jpg', 760000, 12, '2011-02-03', 0, 4, 0, 26, 2, 1);
INSERT INTO `sanpham` VALUES (24, '320Gb Samsung Sata', 3, 8, 13, 'Sata-3Gb/s-72.000 rpm-8MB Cache', 'CA4FX8AJCAKT3CDKCARWPHUOCAID6X18CAR9EGFYCA1Q2CH6CAYJ70CCCAW6RCCYCA05579QCAP6YRKVCA1VVQ23CAXY6VOTCALWI5FOCANIDJZBCAPXK9LPCASK2XKXCA45IYUCCAJPBO3HCA6QUIKS.jpg', 870000, 12, '2011-02-03', 0, 0, 0, 23, 1, 1);
INSERT INTO `sanpham` VALUES (25, '500GB Samsung', 3, 8, 13, 'Sata-3GB/s-72.000 rpm-8MB cache', 'CAAMG8UWCAA873RFCAY17WA6CAK5LMZ8CAANO4KYCA07UPL2CAWV1YOJCANK7ARLCAQAJ0HTCA5B1YNUCAIK7VVICAUY1JPDCAPTYTTUCAGPNDL0CA905WBMCA6R1Q9MCAVYRTM0CAYUD4SOCA5NQ59W.jpg', 950000, 12, '2011-02-03', 0, 0, 0, 12, 1, 1);
INSERT INTO `sanpham` VALUES (26, '1Tb Samsung', 3, 8, 13, 'Sata-3Gb/s-72.000 rpm 16Cache', 'CAB5F70YCA2M8UUWCAR1NE5ZCAF366DXCAZG751RCASNBX4CCAY08MGGCA50M0NSCAEHURMJCACGPWKKCALERNXCCAQ1BT4ACASOYI1CCA7EVHPMCAT2LH3TCA1U6DISCA0CMW0ZCAS09Y2RCAJZIKKO.jpg', 1530000, 12, '2011-02-03', 0, 0, 0, 12, 4, 1);
INSERT INTO `sanpham` VALUES (27, '521MB DDR2 800', 4, 9, 26, NULL, 'CAC96AM7CAVR3XJTCADNV7M9CAAKNZH1CAUV4IDECAGK7C5ICAYW3X1PCA066MGPCA80WLMSCAY3468MCAZ2FK46CA27YIY3CAHDIE67CA562K2KCAHMFHL4CA7BK0J6CAANEBE8CAH3YAS2CAKK3C47.jpg', 332000, 36, '2011-02-03', 0, 1, 0, 119, 1, 1);
INSERT INTO `sanpham` VALUES (28, '512 MB DDR 400', 4, 9, 26, 'PC 3200 KINHMAX-BGA', 'CA0HVRKTCA2AD1H5CAGABCQKCAU81IBZCA5HHIINCAD5ZTA8CAHLHD59CAB5FA3GCA0PJ6M7CAOCYZNYCA1BS38HCAIJPYPRCAL4WRDMCAF4QCBMCA1RR7Y7CAO9R1ONCAOKPJO1CAMT8NKHCAM2Q12O.jpg', 488000, 36, '2011-02-03', 0, 4, 0, 0, 2, 1);
INSERT INTO `sanpham` VALUES (29, '1GB DDR 400', 4, 9, 26, 'PC3200 KINHMAX-BGA', 'CAC3XBNJCAS8M6QFCAJQ750WCAF67XKTCAXDPNSCCAN04LSLCAWQZAENCARWX7XTCA2N1BOWCADL69U5CACDT81NCARU4IAXCAG02D0XCAY3ZMJHCAVU07RXCAU3H6C2CARXKOMHCAC9104ICAQ1K98C.jpg', 477000, 36, '2011-02-03', 0, 0, 0, 122, 2, 1);
INSERT INTO `sanpham` VALUES (30, '1GB DDR2 1066', 4, 9, 26, 'pc 1280 KINHMAX-BGA', 'CAEBXC55CAUQ2C08CA3MPJI8CAROLSLOCAZH42G9CAFFV4G4CA2ZH3P5CALT496CCAMRF85DCAOP3LC0CA35A2WMCA53U38VCAZ93LYJCAM14R6XCAHBA343CANW1MJLCAX3KH6TCAKT6C74CA1L6PDF.jpg', 478000, 36, '2011-02-03', 0, 0, 0, 100, 2, 1);
INSERT INTO `sanpham` VALUES (31, '2GB DDR2 800', 4, 9, 26, 'PC 640 KINHMAX-BGA', 'CAL98AANCA2LWZ90CA1M9TE7CA5QBF56CAOMG3RVCA54I1EVCA4404Y4CABAOLQWCAE5194ICAF4PR22CADK5YWJCA34UGC1CAVGDUGZCAGHUGNRCAO5JU0ACAJ5YZRTCA908B3GCAY3X668CAADD6SS.jpg', 500000, 36, '2011-02-03', 0, 0, 0, 123, 3, 1);
INSERT INTO `sanpham` VALUES (32, '3GB DDR3 1333', 4, 9, 26, 'PC 10600 KINHMAX-BGA', 'CAEMB01ECAU9WCV4CA98PNTCCA3L5NHNCAOYD861CA2M1SJ1CAP3DTA8CA18S3IFCAPM9EPHCAJ94YKRCA87RNBNCACDZR1MCA9LQ19XCA759SKDCAODTGSECAZXIPLHCAK9B4RFCA50SGQCCAMKSA3N.jpg', 1541000, 36, '2011-02-03', 0, 0, 0, 200, 1, 1);
INSERT INTO `sanpham` VALUES (33, '4BG DDR2 800 kit', 4, 10, 26, 'SAMSUNG BUS 800', 'CAUUYVSOCA3FQMJNCASCFG76CAO99F57CACO552OCAYLZQ3FCA2VUU27CA7PUP4FCAP8C17JCANR484GCAGT2QJJCA2ENRNXCADRUY6PCAYFPUD1CAXDL8TMCA46GO59CA3IGQCOCA5VCK71CATBQDZ4.jpg', 1500000, 36, '2011-02-03', 0, 0, 0, 12, 2, 1);
INSERT INTO `sanpham` VALUES (34, '2GB DDR2 800', 4, 10, 26, 'SAMSUNG-BUS 800', 'CAXXCFNZCA1WKEMTCAQQ16MWCAW07EQ7CA6LK1DBCAQBPB3BCAV9M5HUCACBCKDZCAA7ZM62CA744HV3CAGE6TYHCA17D39ZCA6GUB72CADEX107CADVJ91VCA47Z237CA1Q6YS3CAW24M3ECAU3XVVV.jpg', 1073000, 36, '2011-02-03', 0, 0, 0, 300, 2, 1);
INSERT INTO `sanpham` VALUES (35, '1GB DDR2 800', 4, 11, 26, 'ELIXIR Tản nhiệt', 'CAORY1E8CAZ7W17ICAFVZ69ACA5VZREHCA4K85CVCAEU60EQCAIKQYSMCA3QXJE5CAUC338ECAV4GOOACAI71G74CA4AK3IZCAUBS51ECALRF8FYCA6BUX26CAK79JEMCAFLZ601CAVR34HWCAW4MYY9.jpg', 585000, 36, '2011-02-03', 0, 1, 0, 0, 1, 1);
INSERT INTO `sanpham` VALUES (36, '2GB DDR2 800', 4, 11, 26, 'ELIXIR -Tản nhiệt', 'CADT06H7CAWB0TA7CAQVDES2CALV8KUCCAOSN0E4CA62OQVZCA7YXODTCA43D1CWCA2MFU95CAWMHJWZCAG5GD2TCA2IDU7ZCAMGZJ8ZCAD0S0G7CAEAX3WTCA3XL30FCAPVD66ACAZD1WBUCAXX0V1Y.jpg', 819000, 36, '2011-02-03', 0, 0, 0, 3, 3, 1);
INSERT INTO `sanpham` VALUES (37, '1GB DDR2 667', 4, 12, 26, 'PC5300 Transcend', 'CA1P32X0CA3JXCY5CA8HXEC3CA3WIUTJCA6YWWKMCA360M84CANGBQQZCAFOL20LCAV7G9XECA2T2BZ4CA4PPXZ1CAS77UFTCA96N0PNCAGHZQTDCAI494NVCAELU1J5CA5CRYVJCAQ80QQ8CA1LZKOW.jpg', 468000, 36, '2011-02-03', 0, 1, 0, 0, 1, 1);
INSERT INTO `sanpham` VALUES (38, '2GB DDR2 667', 4, 12, 26, 'PC5300 -Transcend', 'CAYNL110CA5M03ESCAZTAL2JCAY9GEE0CA4C6DMZCAHI1QP7CA2CM2L7CAFA7XJGCAAZ052NCA2I16Q1CABT5AFCCA0215V9CA4R6UAACAAN6HZFCAFD3VJHCA13WN37CAGOSVZHCAR6LZN1CA6QTEHB.jpg', 995000, 36, '2011-02-03', 0, 0, 0, 100, 2, 1);
INSERT INTO `sanpham` VALUES (39, 'Mitsumi R562171', 7, 13, 26, 'PS/2', 'banphim (5).jpg', 140000, 12, '2011-02-03', 0, 0, 0, 100, 2, 1);
INSERT INTO `sanpham` VALUES (40, 'Mitsumi R562014', 7, 13, 26, 'PS/2 Tiếng hoa', 'banphim (3).jpg', 145000, 12, '2011-02-03', 0, 0, 0, 122, 1, 1);
INSERT INTO `sanpham` VALUES (41, 'Mitsumi (đem)', 7, 13, 26, 'PS/2 Multimedia', 'banphim (6).jpg', 150000, 12, '2011-02-03', 0, 0, 0, 90, 1, 1);
INSERT INTO `sanpham` VALUES (42, 'Genius Numpad', 7, 14, 26, 'USB Bàn phím số', 'banphim (2).jpg', 98000, 12, '2011-02-03', 0, 2, 0, 100, 1, 1);
INSERT INTO `sanpham` VALUES (43, 'Genius KB110', 7, 14, 26, 'PS/2', 'banphim (11).jpg', 145000, 12, '2011-02-03', 0, 2, 0, 12, 1, 1);
INSERT INTO `sanpham` VALUES (44, 'Genius KB110 USB', 7, 14, 26, 'USB ', 'banphim (8).jpg', 150000, 12, '2011-02-03', 0, 3, 0, 299, 1, 1);
INSERT INTO `sanpham` VALUES (45, 'Genius 220', 7, 14, 26, 'USB Mutimedia mỏng', 'banphim (18).jpg', 100000, 12, '2011-02-03', 0, 1, 0, 0, 1, 1);
INSERT INTO `sanpham` VALUES (46, 'Genius  SlimStar 220 Pro', 7, 14, 26, 'USB Multimedia', 'banphim (30).jpg', 140000, 12, '2011-02-03', 0, 0, 0, 23, 1, 1);
INSERT INTO `sanpham` VALUES (47, 'Creative 5.1vx', 8, 15, 26, 'PCI,Bass-Treble Control 3D,Digital I/O', 'CA0CGHWVCAU311MGCAS4MJGPCADEQY79CARWPGHSCAQK2A0WCAWWF4SLCAFY0DMGCARQUDGGCABZBQWVCAI1UYQPCAG40YCYCAKGWD1ZCAE8PPSCCAX39ORWCAL86NB0CAIOZ5NVCAV7SRX1CAW1PVPY.jpg', 121000, 12, '2011-02-03', 0, 0, 0, 12, 2, 1);
INSERT INTO `sanpham` VALUES (48, 'Creative 6.1vx', 8, 15, 26, 'PCI,Bass-Treble ConTrol 3D,Digital I/O', 'CA01NSFFCAXYX3LYCA3YZW9OCA8NFW76CA6DD36UCAE0335YCAHG1W7WCAF6WW9BCAX1W0O6CAEM9L3XCAPCDZ21CAYIH80VCAG73GQMCAC6CPHJCAW18C0DCADZRWX0CA02JNLZCAAIQ5E7CAUJ8X2T.jpg', 120000, 12, '2011-02-03', 0, 0, 0, 23, 2, 1);
INSERT INTO `sanpham` VALUES (49, 'Creative 5.1', 8, 15, 26, 'PCI ,Bass-Treble,3D ,Gigital I/O', 'CA2S9DH7CAMI43KGCAXGF4OPCA045JPYCAELHWPRCA17QF78CAM3AEUACAHOWQZ0CA4H5WI2CAH56PNZCAPIPO4MCAL5JTLPCAC7TATGCA7F6ANDCAYB1U24CA7H5NCACAV22E3OCASSIPQUCAEJPLFT.jpg', 100000, 12, '2011-02-03', 0, 0, 0, 10, 1, 1);
INSERT INTO `sanpham` VALUES (50, 'Creative  7.1 Audigy', 8, 15, 26, 'PCI,Bass-Treble Control 3D,Digital I/O', 'CA6VATCCCAL97BLACAH7BX22CA93N998CA7Y9QPCCA4WB8JXCA43PTGSCAT0DY65CALOOMCICA6ZABFVCAWQPZLPCAFUX02MCAAD6S8OCA7XYN2DCA53LBMBCAO0WHHOCACBJGRXCAZLUV8LCAA57N4Q.jpg', 121000, 12, '2011-02-03', 0, 0, 0, 100, 2, 1);
INSERT INTO `sanpham` VALUES (51, 'Creative  7.1 SBX-Audio', 8, 15, 26, 'PCI Bass-Treble-3D-Digital i/O', 'CA79CZ3DCA8HDOF4CASUB2LGCA5P7Q0KCAZV17FKCA794USLCAY5GGHICACAI2S5CAM4EEA1CAVJ4FOXCASEWTX2CAW0N4JOCAQDVJACCAZ0XSN0CABQC66PCACB72SACATES0O1CA5K6IJMCAL5O41E.jpg', 121000, 12, '2011-02-03', 0, 0, 0, 100, 1, 1);
INSERT INTO `sanpham` VALUES (52, 'Creative  7.1 SBX-Titanlum', 8, 15, 26, 'PCI Bass-Treble Control 3D-Digital I/O', 'CAAT02X4CAAIFSB5CAA09E3RCA9HLS2QCAC0VGKYCA2URJ8VCA5ARW4JCA1TLQZDCAWXBU0ECASOXRFRCA8PSLU8CARPTUH1CA182GWLCAI4BNODCAQVB3SACALN6BMACAFKK8SICAT5Z59OCA8P3HF6.jpg', 121000, 12, '2011-02-03', 0, 0, 0, 12, 1, 1);
INSERT INTO `sanpham` VALUES (53, 'Creative 2.1 XFI GO ', 8, 15, 26, 'sp/2 24 bit Decoder & Recorder Xfi CMMSS 3D&Crystallizer', 'CAE85GCTCAOFE6BDCAWZ8JM5CAKNSEGYCAJGBRBJCAMWH3WJCAUCY1PLCAZS0262CADO6ORSCA2C3Q6OCA3F3AHGCAJHWP9ZCA7NWVAECALPWLZJCAKOB0CXCAT95NM0CAFXDO1WCAHDXWG3CA64TJ4N.jpg', 121000, 12, '2011-02-03', 0, 0, 0, 12, 2, 1);
INSERT INTO `sanpham` VALUES (54, 'Creative 5.1 Surround ', 8, 15, 26, 'PCI sp-5.1 124bit Dec,Rec,99Bd SNR SNR Xfi CMSS 3D&Dolby Digital EAX', 'CAGPBBNOCA42GM4RCAGSEOPXCAT8GHW0CAGLH05ECAIWQYH6CAAPYQ3SCA9AKQHFCA0JS9GJCABBZZ3NCAGPCDUSCAONQY7ECAYG74NNCA0BDXBMCA1BFOI8CADK3WJTCAIPO8KKCA55W3TSCANBAV7I.jpg', 121000, 12, '2011-02-03', 0, 1, 0, 234, 1, 1);
INSERT INTO `sanpham` VALUES (55, 'Creative  SB Play USB', 8, 15, 26, 'USB 2.0 -90dB SNR MIcrophone ,Heaphone out', 'CANLVQG1CAX4088ICACEIWXCCAQ3183SCA97FJQFCANS3PMXCAWZESJZCAW1ZWOICALNT4ABCA01JUGUCA2I0KK4CANFNYV9CAJ71DGOCACWHZB3CATAQ25BCAN4OA8ACA34ITPWCA3X5V70CAIUPH7M.jpg', 430000, 12, '2011-02-03', 0, 1, 0, 19, 1, 1);
INSERT INTO `sanpham` VALUES (56, 'Sound Blaster Easy Record ', 8, 15, 26, 'Thiết bị dùng thu âm KTS chất lượng cao Sound Blaster,USB 2.0 Hỗ trợ 4 cổng ngoại', 'CAL7O5HFCAQIT3YUCA4FOF8ZCAE4E7ELCA0WULFECAGB78C8CALUQOPOCAFMKCYECAZIW9N0CA2S2V46CAJ7BPZKCAOFOY27CAXS58OQCAX1KQSICA8WGGIKCAULPUUUCATG38DXCAHDHAMJCA6RU2AZ.jpg', 750000, 12, '2011-02-03', 0, 0, 0, 100, 1, 1);
INSERT INTO `sanpham` VALUES (57, '120GB Transcend Mobil', 9, 16, 27, 'USB 2.0 Box 1.8"', 'CA1RMB1RCAW33ZQTCAGCOPADCAPNVFA1CAHCPDVLCAN4C113CAMPDQ8SCA5YUSLUCA4B9MZACA68QLB4CAUFC3C0CAN2A968CAIVSPGKCACZ1PPOCA8MP4LHCA1ZA18TCAOFYU0ECARP5EXQCA955M2O.jpg', 1569000, 12, '2011-02-03', 0, 2, 0, 0, 1, 1);
INSERT INTO `sanpham` VALUES (58, '160Gb Transcend Mobil', 9, 16, 27, 'USB 2.0 ,Box 2.5"', 'CA57VZOACAJMTL7ZCAE9ASR2CAU18603CAHKSNZ0CADZLH0RCAUFL9DOCA4EKKGKCAA7M6MNCACIT7T6CA32SS15CASWCR59CAPLKJFJCAFOA48DCA6VJA2CCASHAQH9CAV5T30YCA0U1W44CAD9Z586.jpg', 993000, 12, '2011-02-03', 0, 0, 0, 34, 2, 1);
INSERT INTO `sanpham` VALUES (59, '500 Transcend Mobil', 9, 16, 27, 'USB 2.0 Bx 2.5"', 'CAFUR8LCCA3IMZT2CAMZRIS6CAUKF2NBCA7VKUQCCAHM6YTYCADL0G06CAT1OVIRCANSIOV6CAFOT9YDCAMKKL52CAZR5VOJCAAWA1OVCAFZSLQHCAWY5140CAOETQLPCATUHOQUCAP9A1J5CAGHN6C7.jpg', 1192000, 12, '2011-02-03', 0, 0, 0, 12, 1, 1);
INSERT INTO `sanpham` VALUES (60, '500 Transcend StoreFet ', 9, 16, 27, 'USB 2.0 Box3.5"-Auto Backup', 'CAIISCZTCAX11SOACALNPCK1CAWVOMCVCAZB8EAECAN5FQSPCA2V5194CAA6EX1HCAIK07QXCAJIN8N2CAR0BW7YCAWXA12LCAXYWH20CAEE73BVCA1Z13WQCATJQ445CAFALXT5CAH6D8SVCARZ5XKL.jpg', 2034000, 12, '2011-02-03', 0, 0, 0, 12, 2, 1);
INSERT INTO `sanpham` VALUES (61, '1Tb Transcend StoreJet', 9, 16, 27, NULL, 'CAVU21GMCAJ0P37ZCA8S13K9CANT1B0BCAZFIVEDCAD5C7UBCAG9W3WWCA7ZBGROCA4A8WUJCAGY0P0SCAJPDWXHCARI23RRCAZ512VRCAZI3NGECAPFTTU1CA0GIR0JCAQ5E1Y7CA8UT6I8CA5K0PJA.jpg', 2520000, 12, '2011-02-03', 0, 0, 0, 12, 1, 1);
INSERT INTO `sanpham` VALUES (62, '250GB-Samsung G2', 9, 17, 13, 'USB 2.0- Box 2.5"-Auto Backup,Chống sốc,mã hóa', 'CAGBEAHYCADRZ69TCA7W74BDCAEGVW8KCAB11N1SCA7FY2OMCAG4O4GRCAFHF19CCAG9K9D7CA0HZ5ULCAY54NE4CADE92NFCAHR4XMLCAT8NV0VCA8FYKHECAJJ5AQPCAR70KUBCA9G0ACMCAUDXE2D.jpg', 1132000, 12, '2011-02-03', 0, 3, 0, 0, 1, 1);
INSERT INTO `sanpham` VALUES (63, '320Gb SamSungG2', 9, 17, 13, 'USB 2.0,Box 2.5",AutoBackup,Chống sốc,mã hóa', 'CAM00Z3SCADMWJOECAKC44VTCAAK3A1PCAP33DHRCAZYQNZPCAYAJC71CAZ8PZVZCA2PXQRRCABC02G0CA9PDSMCCAXMQRTQCAOPSLXOCAVTMXCOCAEUAUZECA84Y78RCAZZJGQ5CAABG28GCAJHMN84.jpg', 1420000, 12, '2011-02-03', 0, 5, 0, 20, 1, 1);
INSERT INTO `sanpham` VALUES (64, '1Tb SamsungG2', 9, 17, 13, 'USB 2.0,Auto Backup,chống sốc,mã hóa', 'CAZEQGYWCAHPTKPYCAXF1KJBCAFY103LCA0RXVZHCALC1HP1CAWPFQMGCASC71N5CAYT8BLICAUW2SR4CABAOLA7CA007EXBCA2IPVMWCAI9UYEMCAFS39Y4CA4IIIWYCATBECAFCA02BQD0CAGTSFYE.jpg', 1728000, 12, '2011-02-03', 0, 6, 0, 8, 1, 1);
INSERT INTO `sanpham` VALUES (65, 'Mitsumi Scroll', 10, 18, 26, 'PS/2 Optical', 'CA0E1UTFCARI24FPCAY1N8WFCA1E8NKFCA43NB5DCAE9GGG0CAP1AXU7CAPIY2TBCAKPIEP5CA9ZHN8DCADAJFP8CAFCJU5CCASTUL1RCAS1D91PCA9XC9XUCAVYH1S3CA6MO161CA1F3U5JCAG54LAA.jpg', 83000, 12, '2011-02-03', 0, 0, 0, 10, 1, 1);
INSERT INTO `sanpham` VALUES (66, 'Mitsumi Scroll 6702', 10, 18, 26, 'PS/2 Optical', 'CA2SYQI6CAB22CDSCAU0SGXDCAJLHLMFCAXT7FKACAPHMSE4CAFK58RCCA0COXU2CA40F32LCA71G5ZBCAD5I2R9CAMUYY5SCADMX1W2CAXGXV5RCAZ8E6QWCANZFRZSCAA3NT7ECA1NA20NCAOCKRX5.jpg', 119000, 12, '2011-02-03', 0, 0, 0, 120, 2, 1);
INSERT INTO `sanpham` VALUES (67, 'Mitsumi Scroll 6703', 10, 18, 26, 'PS/2 Optical', 'CA5QIMJ7CARE436SCAT86KZ1CAZFAVS4CAJAG1OLCA2D1KYACAMCFUT0CAH7I0SRCAUMO92DCAD0CRGTCANQB0XSCA45KU4VCA20BVB0CANNRXQ1CAXHN81DCARQSN6ACANFNOGKCANM7KWOCAS8O6X5.jpg', 129000, 12, '2011-02-03', 0, 0, 0, 300, 2, 1);
INSERT INTO `sanpham` VALUES (68, 'Mitsumi 6603(Mini)', 10, 18, 26, 'USB Optical', 'CA5HI4KVCAFDXSN2CABUJM5UCA35WSFQCAEQ1M18CAAXJSV0CAL7X5EOCAPIVDU4CAJ1O98WCAB0MKVACACL2BZOCAMOLH12CA1S8ENICA62CB5KCAGUHU35CARS4F9RCA1KLSSRCAC2GMHGCAKNO1UB.jpg', 129000, 12, '2011-02-03', 0, 0, 0, 200, 2, 1);
INSERT INTO `sanpham` VALUES (69, 'Genius 120', 10, 19, 26, 'PS/2 Optical', 'CA6IA10MCAWRS89DCADMEALYCALIAYGFCAYLNEBWCAUIMVR6CAW23ABKCAV61ZLNCA48C523CAKSO8CPCAXYYNS7CAQMIFWUCAGGW15JCAY5ZJOYCA8XYOI7CA6XMHDKCA2HLZZNCAV9T4GQCAOWD5Q0.jpg', 117000, 12, '2011-02-03', 0, 0, 0, 300, 12, 1);
INSERT INTO `sanpham` VALUES (70, 'Genius NS11x', 10, 19, 26, 'USB Optical', 'CA65KG21CACYMALECAX0Z9TLCAETPOI4CAO1SSK5CAS2MG1RCAQX3QSXCA289YUBCA2OTS0QCA5AQRP5CARP4AL0CAGNU8KQCAQ5ZSV3CAO9ZHSUCAWEW0GJCA4YHAYKCANIPXT2CAQI3HQ2CAIZ3ORF.jpg', 124000, 12, '2011-02-03', 0, 1, 0, 0, 2, 1);
INSERT INTO `sanpham` VALUES (71, 'Genius  310,310X', 10, 19, 26, 'USB Optical', 'CA66AK60CAER8ERECAVM9YXJCAXD32ROCA5XW550CAUGB775CAIXVB04CA04C974CATPD9TFCA5IH2Q5CA987QCBCAM3TRUMCA1B1OZ2CAKPE88FCAMD90QKCAUFLWQDCAG1FYHSCARWFO26CAIHH9CN.jpg', 145000, 12, '2011-02-03', 0, 0, 0, 100, 1, 1);
INSERT INTO `sanpham` VALUES (72, 'Genius 311', 10, 19, 26, 'USB - Laser', 'CAHAANMOCAFMGGDPCAILNA1XCAUQ5EEHCA60F4YXCAOPTX5MCAFKPQU8CASRQ6IGCA9AOJJQCA2DHG6BCA0UPHV8CAD1KCRUCAPITL08CAETYZESCARGDQ44CAHFCZ0ICAM40S98CASCENLYCAYDEROL.jpg', 200000, 12, '2011-02-03', 0, 0, 0, 300, 1, 1);
INSERT INTO `sanpham` VALUES (73, 'Genius  305', 10, 19, 26, 'USB Laser', 'CAJHL23OCABHATIFCAC3CSS2CARJ4LHSCAVULF5VCA39L6OACA477HY7CAMITXB0CADLW7TVCA3SA7OJCAIPOEGCCAKIDAIVCATQ2VYCCA5I1GDSCAE008XVCANP5RFVCAZ7JAU1CAAB4HMYCA67TZMV.jpg', 196000, 12, '2011-02-03', 0, 0, 0, 400, 1, 1);
INSERT INTO `sanpham` VALUES (74, 'Genius Mini Navi', 10, 19, 26, 'Không dây', 'CAN77RKYCAZ0HQ0LCAVCT96DCAFZ041WCA1S2HOKCA8YDWYCCA6WAR8LCAAE65XRCAB4D1LTCA5FC4P8CA23V36BCA2HC8CKCARU5SEYCA1J9M2MCA1UA8KHCAWD2Y1UCAVHSW30CA09E8Y9CAILBA0G.jpg', 254000, 12, '2011-02-03', 0, 0, 0, 100, 1, 1);
INSERT INTO `sanpham` VALUES (75, 'Genius 915', 10, 19, 26, 'Bluetooth LASER', 'CARBZOGGCA8K7WM9CATD2LHBCASGPF7OCAXWSK9ICA8FHAFDCAK4ULY0CA0NIIGSCAE5FNTSCA1ITCN6CA6T361VCAUC3PBKCA9FR101CAM7D90PCA1NKCCPCA9G5NB9CA06RJDJCA6OMNWOCAZKG2Q8.jpg', 1075000, 12, '2011-02-03', 0, 3, 0, 9, 1, 1);
INSERT INTO `sanpham` VALUES (76, 'Genius  T925', 10, 19, 26, 'Không dây-Laser,Scroll 4D,Srcoll cảm ứng', 'CAZ3U5WGCAG1BENOCAJRLT47CA5X3KLGCABH11L9CAWQSVMBCAL4X23JCA84EVOUCAJ3X0E4CAQU389ICA4OREOICAP1S8MHCAVIMXV4CA26SHSDCASS27QBCA2EG4SUCAWMG72MCACDRCO4CAVJXJZY.jpg', 743000, 12, '2011-02-03', 0, 2, 0, 1232, 1, 1);
INSERT INTO `sanpham` VALUES (77, 'Genius  Traveler 915', 10, 19, 26, 'Không dây Laser,dây rút ', 'CAZW7EMPCA1J3YS4CA51MHDTCA7A6RUKCA517KDSCANM9KN6CAIOFTO3CAH3FJFVCAJIN1YCCAFO9T2ZCA4SDZG3CADUJBBNCA8YUQTRCAFITTY3CA38Y9LTCADFU5WXCAKBIYNLCAGXSVNPCAC62CH2.jpg', 179000, 12, '2011-02-03', 0, 2, 0, 298, 2, 1);
INSERT INTO `sanpham` VALUES (78, 'SoundMax v-5/2.0', 11, 20, 26, 'USB voice', 'CA1FIY26CA41XFC1CA6NVK1VCABEL2H1CAM5MCZECAO5KWS2CAU9FG2SCAGF6ERCCAFAUV5JCAT9R5S1CAKXGCQHCA0LO6UICAS0ICOCCATYXP5JCA00UY7RCASU3ISWCAWVOXPTCAP8LUW8CAIFERBP.jpg', 475000, 12, '2011-02-03', 0, 1, 0, 0, 2, 1);
INSERT INTO `sanpham` VALUES (79, 'SoundMax v-SD', 11, 20, 26, '3D,Bass-Treble control 25WRMS', 'CA2CT1VPCAQ2A2AXCAODKI5BCAVW2RZ3CAENQHANCAWFNSMVCAVBXRPSCAIXX9T4CA8Z90ATCAAR0RLCCA5UI492CAMXPBR6CAXBBP9CCAIEBHXMCAVQCTOVCAEE3SQSCA230GDUCADUIG4RCA41ESWE.jpg', 400000, 12, '2011-02-03', 0, 0, 0, 133, 2, 1);
INSERT INTO `sanpham` VALUES (80, 'SoundMax v-audio', 11, 20, 26, '3D,Bass,Treble,1sub,2 Speaker,60RMS', 'CA6EQ47NCAJ20ME8CARGNB0BCAQMWRLXCAWG56J6CAVX1P2UCA2UR0VICARL05BKCAC7V0JGCAMGQYG6CA9VGOGDCA2BBY89CAK0X20UCAPD9KQBCAQSOPPBCAMB6UAQCAZ4MARKCABG8IAVCA5912BM.jpg', 1200000, 12, '2011-02-03', 0, 7, 0, 113, 2, 1);
INSERT INTO `sanpham` VALUES (81, 'SoundMax A3000', 11, 20, 26, '3D,Bass,Treble,1Sub,5Speaker,100RMS', 'CADNXXT3CA1X1F2QCA00RXXSCA530Y5CCA2258T5CAMTIWUZCA9IBLGZCAMQK90XCAZAP4IFCAHB01FECA9Y1IH3CAMQD3A9CAA2A5QICAK4PLYUCA157E1LCAK12N1GCA2NGA5PCATCV4SYCAG9RX3B.jpg', 2000000, 12, '2011-02-03', 0, 1, 0, 233, 1, 1);
INSERT INTO `sanpham` VALUES (82, 'SoundMax A5000', 11, 20, 26, '3D,Bass,treble,1Sub,4Speaker,90RMS', 'CA6H0B2YCAWETA1WCA5UZRNYCAVADW81CAOO9B2LCAYHNZPSCAYUF5ANCA50C2ICCAPXX8GLCAB81G9UCACJIUCECARIN2SDCAEQ2DYNCAE8050ICAGZ1ZD2CA9JV78VCAKU2RFICAFJ2RAOCA0U8MOY.jpg', 1500000, 12, '2011-02-03', 0, 9, 0, 78, 2, 1);
INSERT INTO `sanpham` VALUES (83, 'SoundMax v-B10', 11, 20, 26, '3D,Bass,treble,1Sub,5Speakers,100RMS', 'CAH6U33BCA2E205UCAXYEDRJCAYV2518CAQN4YP0CAECPBOWCAX1ON22CA2TX7HGCACM0SURCAKNUZXVCA5IXS0YCAAJBUNHCASEXKZYCAMGTY4HCAK24BQLCA8MUR90CA2VEKT3CAHDLC69CA50VW0T.jpg', 2000000, 12, '2011-02-03', 0, 1, 0, 129, 2, 1);
INSERT INTO `sanpham` VALUES (84, 'SoundMax B50', 11, 20, 26, '3D,Bass,treble,1Sub,5Speakers,60MRS', 'CAMBOUOBCASI5QD3CA75RRZICA5NYO3RCAV7VJ2ICAKM1AS6CANRMIOCCAJ4PI1HCA2HN1LICA6R82KLCA4V6HDACAYYBES4CA9HQSJ5CAHNFJJ2CAQU5DBOCAGXIO00CA1452QLCAQ6X43ICAZBCHOQ.jpg', 1350000, 12, '2011-02-03', 0, 20, 0, 6, 1, 1);
INSERT INTO `sanpham` VALUES (85, 'SoundMax B51 5.1', 11, 20, 26, '3D,Bass,treble,1Sub,5 Speakers,60RMS', 'CAY7SEDJCAYY3FPDCAEQRFH3CAGOSTXGCA89NGSECA36B1JGCA1W3NDHCA4RQOCYCAC167WPCA2JYCN9CAKGQW5GCARRC58RCATKSWDYCATC0ALUCA1VEP23CA01FAW6CA2NE4RACA2LEQMKCAO3GNFI.jpg', 201000, 12, '2011-02-03', 0, 9, 0, 4, 1, 1);
INSERT INTO `sanpham` VALUES (86, 'SoundMax 2.0', 11, 20, 26, '3D,Bass,treble,2 voice', 'CAX4ATI0CAQ0KTSYCAC8493BCAQY3UCTCASGCC28CA99330OCA5UK5GUCA05DEEWCAXCXSEWCAEG7F6VCAB3FYL9CAUGWGCWCAVTEXNNCA8C18M3CAQ67ZT4CAUBMIQKCA71WF5ACA1RIFJACADTQBQO.jpg', 700000, 12, '2011-02-03', 0, 10, 0, 114, 1, 1);
INSERT INTO `sanpham` VALUES (87, 'HUYNDAI 480 D08', 11, 21, 26, '3D,Bass,Treble,1Sub,2Speakers', 'CA6EQ47NCAJ20ME8CARGNB0BCAQMWRLXCAWG56J6CAVX1P2UCA2UR0VICARL05BKCAC7V0JGCAMGQYG6CA9VGOGDCA2BBY89CAK0X20UCAPD9KQBCAQSOPPBCAMB6UAQCAZ4MARKCABG8IAVCA5912BM_1.jpg', 1132000, 12, '2011-02-03', 0, 14, 0, NULL, 1, 1);
INSERT INTO `sanpham` VALUES (88, 'HUYNDAI 610F', 11, 21, 26, '3D,Bass,treble,2Speaker,100RMS', 'CAIJ43YSCAR8DKKICAUEK4E6CAHXLZ0ICA3YQ8OECAMEZUF4CA578PQLCATG048XCAF9E5R9CAMEUP8KCAA312JICABC32KECA1WQ4HTCAAZVDWKCAA3AG39CAB0RYSVCAUANLNECA5SW4XMCAYEAEAD.jpg', 1240000, 12, '2011-02-03', 0, 20, 0, NULL, 2, 1);
INSERT INTO `sanpham` VALUES (89, 'HUYNDAI HY-210', 11, 21, 26, '3D,Bass,Treble,100RMS', 'CAWQSADECAF6XBSVCAILTW4DCAUK53D7CALAKQNPCA0D8XYFCARSPOTACAWNU1Z8CAPF7VH2CAHCD130CA9U8J3OCAG3B3ZYCAEAPYWACANQLDHXCA40M6DECA2D2M9MCAT7AI6BCAUD60Q0CA56AI0G.jpg', 1210000, 12, '2011-02-03', 0, 3, 0, 7, 1, 1);
INSERT INTO `sanpham` VALUES (90, 'Giagabyte G31M', 1, 3, 26, 'Chipset Intel G31/IC7,s/p 775,bus 1600(OC),PCI EX16,PCI E1,PATA  ,4 satall,Dual 2xDDR2-1600/800/667 ', 'CAV37HNHCAFB4P8FCAF1HDSKCAYUKWXXCAZ7L49QCAOEEX3BCAV94CJ8CAYC00QWCA32HTV5CAF5VF77CAVWSV5JCA3RAEURCACCT252CA1IWHZCCATS8GJ7CAHHBIYZCAI8E9DGCAMZXJTWCA9ZH2PD.jpg', 1043000, 36, '2011-02-05', 0, 2, 0, 122, 2, 1);
INSERT INTO `sanpham` VALUES (91, 'Sony VPL-ES7', 12, 22, 26, '2.00 ansi lmens,XGA(1024x768),400:1,weight:2.9kg,phóng to màng hình 40-300".Máy chiếu bảo hành 2 năm, riêng bóng đèn hình bảo hành 3 năm', '51EA.jpg', 11345000, 24, '2011-02-05', 0, 0, 0, 21, 1, 1);
INSERT INTO `sanpham` VALUES (92, 'Sony VPL-EX7', 12, 22, 26, '2.00 ansi lmens,XGA(1024x768),400:1,weight:2.9kg,phóng to màng hình 40-300".Máy chiếu bảo hành 2 năm, riêng bóng đèn hình bảo hành 3 năm', 'CA00DROUCAQKPU4CCAQUXB8DCAH4QKDDCAZHFVUJCA4AOI1CCAQCFKHDCA2X3CNYCADO7AH7CAQRIZ1LCABH4QZJCAOOW6YVCAQKNV01CA9K6ELGCAPP57HKCAI1WPNSCA1QRIAICAMLPUX4CA7QQQ7H.jpg', 13408000, 24, '2011-02-05', 0, 4, 0, 0, 1, 1);
INSERT INTO `sanpham` VALUES (93, 'Sony VPL-EX130', 12, 22, 26, '2.00 ansi lmens,XGA(1024x768),400:1,weight:2.9kg,phóng to màng hình 40-300".Máy chiếu bảo hành 2 năm, riêng bóng đèn hình bảo hành 3 năm', 'CA2HD7RMCAH4WPOECAIEFX3KCAW11P1FCA2BNF0SCA4TUOEKCAO96KTVCA09MAGJCAJKS9JCCAOH248QCA4F52SFCA6C01K1CAJIF17UCAC5GIQPCAWWWNKHCAKEHCVNCASTVSH7CA9RHHNZCAVL6XKU.jpg', 20183000, 24, '2011-02-05', 0, 0, 0, 12, 1, 1);
INSERT INTO `sanpham` VALUES (94, 'Sony VPL-DX11', 12, 22, 26, '2.00 ansi lmens,XGA(1024x768),400:1,weight:2.9kg,phóng to màng hình 40-300".Máy chiếu bảo hành 2 năm, riêng bóng đèn hình bảo hành 3 năm', 'CA3ECQBGCA11VSKLCANRUGJNCAGUFBDNCALP9H0DCAF8EAPZCAW9ENQRCA0QUWAYCAOI7301CAORR9YVCAHHFZS1CAC292JXCA7VOYH9CAE5C2LLCA8AADMSCA6Z2YCQCAVGZG7PCAE644J7CAYJMRZO.jpg', 14506000, 24, '2011-02-05', 0, 2, 0, 124, 1, 1);
INSERT INTO `sanpham` VALUES (95, 'Sony VPL-DX12', 12, 22, 26, '2.00 ansi lmens,XGA(1024x768),400:1,weight:2.9kg,phóng to màng hình 40-300".Máy chiếu bảo hành 2 năm, riêng bóng đèn hình bảo hành 3 năm', 'CA4X01F4CAIJ4RFJCADM800GCA915XNECA5QM416CAGIE2HJCAJYTHR7CA31G7D1CAW6NOFGCAD6ZCCLCASNJJQVCA0GDI0ZCAXTQHPVCA0CM1G6CA8FUPB0CAB6XPCPCAJWMOTICA4YOLHFCANVR4CZ.jpg', 20108000, 24, '2011-02-05', 0, 5, 0, 12, 1, 1);
INSERT INTO `sanpham` VALUES (96, 'Sony VPL-ES8', 12, 22, 26, '2.00 ansi lmens,XGA(1024x768),400:1,weight:2.9kg,phóng to màng hình 40-300".Máy chiếu bảo hành 2 năm, riêng bóng đèn hình bảo hành 3 năm', 'CA93RXU3CA337QQMCAJFFOJUCAAMWNZXCAX6XZD9CAHK339HCAEGKGZ0CAN2E4GJCAQJAPF3CAD5D9NYCAEOLX9OCAYOIZSTCAXHJDY1CAFNTQQNCA3Q2POKCA4UG5JXCAAC7001CAAK9MN3CA4HKBJ4.jpg', 30809000, 24, '2011-02-05', 0, 5, 0, 12, 1, 1);
INSERT INTO `sanpham` VALUES (97, 'Sony VPL-DX14', 12, 22, 26, '2.00 ansi lmens,XGA(1024x768),400:1,weight:2.9kg,phóng to màng hình 40-300".Máy chiếu bảo hành 2 năm, riêng bóng đèn hình bảo hành 3 năm', 'CA5IKENTCAJ3CIQ9CABC4444CAPTAKZCCAQQDQ0TCAJRNQ3ECAYNBE3MCAJHQZ8UCA4JNT98CAX8ZT02CAJX720VCA0D6WHYCA92HGAECARMM85ICALL1MA7CAORX2N0CA27KKTACAG9B8BFCA19ZKKW.jpg', 13405000, 24, '2011-02-05', 0, 2, 0, 1, 2, 1);
INSERT INTO `sanpham` VALUES (98, 'Sony VPL-ES10', 12, 22, 26, '2.00 ansi lmens,XGA(1024x768),400:1,weight:2.9kg,phóng to màng hình 40-300".Máy chiếu bảo hành 2 năm, riêng bóng đèn hình bảo hành 3 năm', 'CA7S9HNBCAQRKHK6CACBYREECA2IH0POCALMXCFICA8M20QHCANV2KCTCA3ITAQPCAWNB875CA4VUKKWCA5CBXL3CA4KFK17CAWQV13FCASFUU0DCAE0X685CAB5EVKICAU3HPL9CA0OUBUSCAS4MCHK.jpg', 40003000, 24, '2011-02-05', 0, 2, 0, 10, 1, 1);
INSERT INTO `sanpham` VALUES (99, 'Sony VPL-EX132', 12, 22, 26, '2.00 ansi lmens,XGA(1024x768),400:1,weight:2.9kg,phóng to màng hình 40-300".Máy chiếu bảo hành 2 năm, riêng bóng đèn hình bảo hành 3 năm', 'CA77S3T0CA9DIWZ3CAHTS725CA6JAEKJCAV9W5JJCAWVCRE0CABOSLE8CAQI16VXCAP3BZAMCARQCW1ICA6BMN3GCATZ2HLDCAK4ZPK1CATUFCUDCADZZRP5CAIDZ666CAZJBPIZCAGC2E97CAFM8DVH.jpg', 1508000, 24, '2011-02-05', 0, 3, 0, 23, 1, 1);
INSERT INTO `sanpham` VALUES (100, 'Acer X1130P', 12, 23, 26, '2.00 ansi lmens,XGA(1024x768),400:1,weight:2.9kg,phóng to màng hình 40-300".Máy chiếu bảo hành 2 năm, riêng bóng đèn hình bảo hành 5 tháng(1500 giờ)\r\n', 'CA93RXU3CA337QQMCAJFFOJUCAAMWNZXCAX6XZD9CAHK339HCAEGKGZ0CAN2E4GJCAQJAPF3CAD5D9NYCAEOLX9OCAYOIZSTCAXHJDY1CAFNTQQNCA3Q2POKCA4UG5JXCAAC7001CAAK9MN3CA4HKBJ4_1.jpg', 11234000, 24, '2011-02-05', 0, 1, 0, 132, 1, 1);
INSERT INTO `sanpham` VALUES (101, 'Acer P1130', 12, 23, 26, '2.00 ansi lmens,XGA(1024x768),400:1,weight:2.9kg,phóng to màng hình 40-300".Máy chiếu bảo hành 2 năm, riêng bóng đèn hình bảo hành 5 tháng', 'CAAHTKN6CAUBU7YECACZJKKOCA9QM4JKCAK4VTGPCATTQWYFCAC7098ACA298BEVCAAMM6VTCAFLSURBCA8DI3E4CABP7M56CAS8GQM7CANMLE27CA416281CA36Y8AGCAZ1AFJRCAF1BCSACA4X72XV.jpg', 12809000, 24, '2011-02-05', 0, 1, 0, 0, 1, 1);
INSERT INTO `sanpham` VALUES (102, 'Acer P11301', 12, 23, 26, '2.00 ansi lmens,XGA(1024x768),400:1,weight:2.9kg,phóng to màng hình 40-300".Máy chiếu bảo hành 2 năm, riêng bóng đèn hình bảo hành 5 tháng', 'CABAHH18CAMZ8JUQCAYS1RTBCAGCM8J3CA1A5AWJCAGJZ120CA7T0ZS5CATXFIK3CAS4F2NYCAVNYQV0CA46X2G8CA76QI6ICAOXRT5LCAD6AVQFCAZNSM0WCAMHJI1VCADVX1QZCA2MOYNGCAAIZVZF.jpg', 23089000, 24, '2011-02-05', 0, 4, 0, NULL, 1, 1);
INSERT INTO `sanpham` VALUES (103, 'Acer P1130', 12, 23, 21, '2.00 ansi lmens,XGA(1024x768),400:1,weight:2.9kg,phóng to màng hình 40-300".Máy chiếu bảo hành 2 năm, riêng bóng đèn hình bảo hành 5 tháng', 'CAH9WEX7CA116IWGCA72ZBIFCAM5B8YKCAFHEY0GCATUSXVDCAJMY8L5CAB8FYLZCA8RYKUJCAW5EWCXCAVJXAUFCANCS3PHCA1YPXRJCA34VZWBCA4JZ9YHCA5RZT8PCA07SBGTCAINH2E0CAIJ5XBF.jpg', 23089000, 24, '2011-02-05', 0, 0, 0, 2, 1, 1);
INSERT INTO `sanpham` VALUES (104, 'Acer P126', 12, 23, 26, '2.00 ansi lmens,XGA(1024x768),400:1,weight:2.9kg,phóng to màng hình 40-300".Máy chiếu bảo hành 2 năm, riêng bóng đèn hình bảo hành 5 tháng', 'CAH3267WCA3MV8YVCAHTIQWNCA646AU0CA2GPRL0CA9F2ZNHCA71N0T0CA30PONOCAYA5XIICAHHC6YKCAWEKPI4CASIFAZ9CA1V4R8CCA5DOKPUCAJ5AWPYCAG7RJ2GCAIYIKBICAVAEISWCAW2F27H.jpg', 11267000, 24, '2011-02-05', 0, 2, 0, 1, 1, 1);
INSERT INTO `sanpham` VALUES (105, 'Acer P04', 12, 23, 26, '2.00 ansi lmens,XGA(1024x768),400:1,weight:2.9kg,phóng to màng hình 40-300".Máy chiếu bảo hành 2 năm, riêng bóng đèn hình bảo hành 5 tháng', 'CAIDECROCACN7C7RCA5BQDW4CA7YLXDOCAKM034FCA8B1AGXCA49GDKPCAPQ9U7QCAFQW1GBCA2HDJPMCA4UT19ACAXPTAU1CAK1KRXQCA625CI6CAH6OJ8JCA0P77SZCABALM7OCAYDXVK3CAWVA3DQ.jpg', 18045000, 24, '2011-02-05', 0, 1, 0, 1, 1, 1);
INSERT INTO `sanpham` VALUES (106, 'Acer P02', 12, 23, 26, '2.00 ansi lmens,XGA(1024x768),400:1,weight:2.9kg,phóng to màng hình 40-300".Máy chiếu bảo hành 2 năm, riêng bóng đèn hình bảo hành 5 tháng', 'CAJS4KSSCASB3XMJCAPH2LPTCA687R3MCA8369NRCASP015YCA8WO9VYCA5TULZ3CA8CXWBZCAAQ4XIDCAZH285YCANB1UH3CARW9NS9CAJXRMKPCAB4S9FZCACY4YGFCADHXHTWCAXJ7XGGCAZ3KZKH.jpg', 30078000, 24, '2011-02-05', 0, 1, 0, 0, 1, 1);
INSERT INTO `sanpham` VALUES (107, 'Acer P09', 12, 23, 26, '2.00 ansi lmens,XGA(1024x768),400:1,weight:2.9kg,phóng to màng hình 40-300".Máy chiếu bảo hành 2 năm, riêng bóng đèn hình bảo hành 5 tháng', 'CAO2WIQKCAVF1NDLCAPFEYIXCA4HMT21CA404D2MCAMSBL0ICAHIMMTVCA2RCP2LCAZWWG0DCAGPXW2MCACB8S8WCA01XSG9CA6JEK9JCA7OIS28CA3607RNCAT3LZ3LCAPEA0FBCAM3IEB0CAW6NWWV.jpg', 1728000, 24, '2011-02-05', 0, 3, 0, NULL, 1, 1);
INSERT INTO `sanpham` VALUES (108, 'Acer P23', 12, 23, 26, '2.00 ansi lmens,XGA(1024x768),400:1,weight:2.9kg,phóng to màng hình 40-300".Máy chiếu bảo hành 2 năm, riêng bóng đèn hình bảo hành 5 tháng', 'CAON3L6LCAX6NQ2MCALRQ9L7CACD3CLWCARLU038CADR2WJ4CA6GZ37ICAXFMIMECA4QX9AGCAUFMG7DCAG7NMQDCANTRSR7CACNUVNYCALQNHDACAQD5KAHCAV42WXRCAAPKSIPCAU8DY11CA2Y893U.jpg', 19508000, 24, '2011-02-05', 0, 3, 0, 0, 1, 1);
INSERT INTO `sanpham` VALUES (109, 'Hp ML150 G6', 13, 24, 28, 'Intel @ Xeon Processor E520(2.26 Ghz,80W,8MB,DDR3-1066,Ht,Turbo 1/1/2/2) 1x 8MB level 3 cache,4GB(2x2GB) PC3-1066 Register DIMMs,Embedded NC382i Dual  port Gigabit Adapter,HP Smart Array', 'CA68ME64CAYG6RRACA1HVQ64CAEJOIXGCA9I2KL6CAB66GXDCAIZ607KCANN1OTGCAHR9QY3CA1S2EYBCANQFZ9ECADS7GSOCAK8TTLRCA1DOUQ4CA223GVACAEF3UZ7CAPE7AMRCAT031JPCAGMH31R.jpg', 33762000, 36, '2011-02-06', 0, 2, 0, 20, 1, 1);
INSERT INTO `sanpham` VALUES (110, 'HP DL360 G6 E520', 13, 24, 28, 'Intel @ Xeon Processor E520(3 Ghz,80W,8MB,DDR3-1066,Ht,Turbo 1/1/2/2) 1x 8MB level 3 cache,4GB(2x2GB) PC3-1066 Register DIMMs,Embedded NC382i Dual  port Gigabit Adapter,HP Smart Array', 'CABKX0VVCA0LZ4O5CADM3WYLCAIZ173BCA9U5DMXCA3V59DPCATASRLVCAPIL7TOCA41YTJDCA6L8CPNCAI7Z6F2CAA7517ECATTX208CA7I3TVVCAXYASHACAE7SIJDCARZ02WVCADSP37NCAAGPAV0.jpg', 50643000, 12, '2011-02-06', 0, 0, 0, 12, 1, 1);
INSERT INTO `sanpham` VALUES (111, 'IBM System x 3200m3', 13, 25, 2, 'Intel @ Quad Processor E520(2.26 Ghz,80W,8MB,DDR2-1333,Ht,Turbo 1/1/2/2) 1x 8MB level 3 cache,4GB(2x2GB) PC3-1066 Register DIMMs,Embedded NC382i Dual  port Gigabit Adapter,HP Smart Array', 'CAD2LRWOCAWG07NKCAR9PC3RCAXCFWOBCA8SUADACAFC74TQCAZDI5O5CASNLOJMCAKU0P1ZCAHM281BCAV1F4W0CA5CHASBCAOZA3Z1CAUSELS2CA0707M0CA2ZTWP2CA4VINFPCAION7ODCA5H3NWL.jpg', 43120000, 36, '2011-02-06', 0, 2, 0, 23, 1, 1);
INSERT INTO `sanpham` VALUES (112, 'IBM System DEL', 13, 25, 2, 'Intel @ Xeon Processor E520(2.26 Ghz,80W,8MB,DDR3-1066,Ht,Turbo 1/1/2/2) 1x 8MB level 3 cache,4GB(2x2GB) PC3-1066 Register DIMMs,Embedded NC382i Dual  port Gigabit Adapter,HP Smart Array', 'CAM2RQ9XCA6YADC2CAISL2TUCA76PHG3CAAA8A5ECA9N80SCCA9BTANLCA6VO688CAPZLMV3CAQGHISYCA2EFTGECAQSF3GYCA32B91FCA9LSRL3CATHNW0CCAO1II0GCA0VV6PGCACD46LJCA6I3Z05.jpg', 60609000, 36, '2011-02-06', 0, 3, 0, 2, 1, 1);
INSERT INTO `sanpham` VALUES (113, 'IBM System X360', 13, 25, 2, 'Intel @ Xeon Processor E520(2.26 Ghz,80W,8MB,DDR3-1066,Ht,Turbo 1/1/2/2) 1x 8MB level 3 cache,4GB(2x2GB) PC3-1066 Register DIMMs,Embedded NC382i Dual  port Gigabit Adapter,HP Smart Array', 'CARI4ZGUCAYHN1VGCAZM33VJCAC40199CA0UNUPRCA39Y23LCA9K1QZVCA59EQ9PCATIYN4RCAUW8YK8CA6LQ27MCAHNAS7SCASXS0T1CAHKHUCPCAI13HEQCATP1APICA5JDNFVCA0H8JY9CAC0EZRK.jpg', 41203000, 24, '2011-02-06', 0, 0, 0, 1, 1, 1);
INSERT INTO `sanpham` VALUES (114, 'Arrow 420W', 14, 26, 26, 'Có 3 đầu cắm nguồn', 'bonguon (20).jpg', 179000, 12, '2011-02-07', 0, 0, 0, 10, 1, 1);
INSERT INTO `sanpham` VALUES (115, 'Arrow 450W', 14, 26, 26, 'Có 2 đầu cắm nguồn , 2sata , 4p CPU', 'bonguon (11).jpg', 199000, 12, '2011-02-07', 0, 0, 0, 2, 2, 1);
INSERT INTO `sanpham` VALUES (116, 'Arrow 500W', 14, 26, 26, 'Fan 8 cm, 2đầu cắm nguồn,2sata,4p CPU', 'bonguon (5).jpg', 218000, 24, '2011-02-07', 0, 0, 0, 2, 3, 1);
INSERT INTO `sanpham` VALUES (117, 'Arrow 500W ', 14, 26, 26, 'Fan 12 cm,có 3 đầu cắm,2 stata,4 p CPU', 'bonguon (1).jpg', 259000, 12, '2011-02-07', 0, 0, 0, 23, 2, 1);
INSERT INTO `sanpham` VALUES (118, 'Arrow 550W ', 14, 26, 26, 'Fan 12 cm,Có 3 đầu cắm,2sata,4p CPU', 'bonguon (1)_1.jpg', 318000, 24, '2011-02-07', 0, 0, 0, 23, 3, 1);
INSERT INTO `sanpham` VALUES (119, 'Arrow 600W ', 14, 26, 26, '2Fan 8cm,Có 3 đầu cắm nguồn,2sata,4+4p CPU', 'bonguon (2).jpg', 338000, 24, '2011-02-07', 0, 0, 0, 12, 2, 1);
INSERT INTO `sanpham` VALUES (120, 'Arrow 650W ', 14, 26, 26, 'Fan 12 cm,có 3 đầu cắm nguồn,1 sata(codegen)', 'bonguon (3).jpg', 377000, 24, '2011-02-07', 0, 0, 0, 12, 2, 1);
INSERT INTO `sanpham` VALUES (121, 'Arrow 1200W ', 14, 26, 26, 'Fan 12 cm,có 3 đầu cắm nguồn', 'bonguon (4).jpg', 348000, 24, '2011-02-07', 0, 0, 0, 23, 3, 1);
INSERT INTO `sanpham` VALUES (122, 'Arrow 800W ', 14, 26, 26, 'Fann 12,có 10 đấu cắm', 'bonguon (14).jpg', 450000, 24, '2011-02-07', 0, 0, 0, 23, 3, 1);
INSERT INTO `sanpham` VALUES (123, 'Acbel 350W', 14, 27, 26, 'Acbel Fan 12cm, 3 sata,3ata,1 CPI-Exp,4+4 p CPU,24pins', 'bonguon (19).jpg', 477000, 24, '2011-02-07', 0, 0, 0, 23, 2, 1);
INSERT INTO `sanpham` VALUES (124, 'Acbel 400W', 14, 27, 26, 'Fan 12cm,3 ata,4 sata,1PCI-Exp,4+4p CPU', 'bonguon (12).jpg', 750000, 24, '2011-02-07', 0, 2, 0, 0, 1, 1);
INSERT INTO `sanpham` VALUES (125, 'Acbel 450W', 14, 27, 26, 'Fan 12cm,hiệu năng 80%, 8cm,5 ata,2 sata, 4pCPU', 'bonguon (9).jpg', 930000, 24, '2011-02-07', 0, 0, 0, 23, 3, 1);
INSERT INTO `sanpham` VALUES (126, 'Acbel 600W', 14, 27, 26, 'Fan12cm,hiệu năng 80%,5ata,2sata,', 'bonguon (10).jpg', 1245000, 24, '2011-02-07', 0, 0, 0, 23, 3, 1);
INSERT INTO `sanpham` VALUES (127, 'Acbel 510W', 14, 27, 26, 'Fan 12cm,80%,4ata,1sata, 4+4 pCPU', 'bonguon (22).jpg', 1271000, 24, '2011-02-07', 0, 0, 0, 2, 2, 1);
INSERT INTO `sanpham` VALUES (128, 'Acbel Ax1200W', 14, 27, 26, 'Fan 12cm,80%,4ata,2sata,4+4p CPU', 'bonguon (23).jpg', 14508000, 24, '2011-02-07', 0, 2, 0, 23, 3, 1);
INSERT INTO `sanpham` VALUES (129, '19" Dell ÉN9891', 6, 28, 23, '1280x1024 Độ tương phản 800:1 thới gian đáp ứng 5ms', 'CADPCGE9CAAE6B7SCA3WP2EVCAP35LL8CAW7L7L8CAHKB2F5CAOZEVY1CAPSBHOQCAQREJ62CA1WOP90CAC1IIV8CAT7BP0HCA1RCJB9CAGDOEAACASZL8VTCAT5BGPPCAKTL3JYCASG6X4SCAQLXHIB.jpg', 3089000, 36, '2011-02-07', 0, 0, 0, 24, 5, 1);
INSERT INTO `sanpham` VALUES (130, '20" Dell IN191N', 6, 28, 23, '1600x900 Dsub+DVI,Độ tương phản 1000:1 , thời gian đáp ứng 5ms', 'CA24YQ9NCAKFYEXICA9IT7SSCAS41KZ4CA32M5ZICAVD7LOMCAI0B5BUCAG6PW6RCA49F7PCCAL68XVOCAVNKOA3CAOH1UUDCANXHONZCA7YAEGUCAWWUKD8CADDOG7PCA8BF73UCAD177FKCA7PDRWZ.jpg', 2304000, 36, '2011-02-07', 0, 2, 0, 0, 3, 1);

-- --------------------------------------------------------

-- 
-- Table structure for table `tintuc`
-- 

CREATE TABLE `tintuc` (
  `idTin` int(2) NOT NULL auto_increment,
  `TieuDe` varchar(100) NOT NULL,
  `TomTat` varchar(200) NOT NULL,
  `UrlHinh` varchar(100) default NULL,
  `Ngay` datetime NOT NULL,
  `NoiDung` text NOT NULL,
  `TinNoiBat` tinyint(1) default '0',
  `SoLanDoc` int(11) default '0',
  `AnHien` tinyint(1) NOT NULL,
  `idUser` varchar(3) default NULL,
  PRIMARY KEY  (`idTin`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='Tin tức' AUTO_INCREMENT=18 ;

-- 
-- Dumping data for table `tintuc`
-- 

INSERT INTO `tintuc` VALUES (6, 'Chụp hình minh họa', 'Chụp hình minh họa cho website hay bất kỳ một ảnh nào trên màn hình máy tính đang là nhu cầu cho người soạn thảo hướng dẫn thực hành máy thông qua tương tác hình ảnh. Chính vì thế mà hiện có khá nhiều', '', '2010-12-05 10:07:13', 'Tuy nhiên, khi bạn muốn sử dụng một chương trình chụp hình miễn phí, không cần cài đặt riêng thì có thể dùng FireFox để chụp hình minh họa website với các Add Ons kèm theo do hãng thứ ba cung cấp hoàn toàn miễn phí.<br />\r\n<br />\r\nVới Screen Grab, bạn có thể chụp hình toàn bộ Website và lưu với định dạng PNG. Add Ons này dung lượng nhỏ gọn, bạn có thể tải dùng miễn phí tại <a href="https://addons.mozilla.org/firefox/1146" target="_blank">https://addons.mozilla.org/firefox/1146</a> . Yêu cầu máy phải cài Java Runtime.<br />\r\n<br />\r\nTương tự như Screen Grad là Page Saver. Tuy nhiên, Page Saver thì lại không yêu cầu Java. Bạn có thể tải miễn phí tại <a href="http://pearlcrescent.com/products/pagesaver" target="_blank">http://pearlcrescent.com/products/pagesaver</a> .<br />\r\n<br />\r\nHơn hẳn hai Add ons là Snagit. Snagit ngoài phiên bản tự chạy không cần cài đặt và phiên bản cho PC nay đã có thêm phiên bản tích hợp trên Firefox. Bạn có thể tải dùng tại <a href="http://www.techsmith.com/snagit/accessories/firefox.asp" target="_blank">http://www.techsmith.com/snagit/accessories/firefox.asp</a> .<br />\r\n<br />\r\nAdd ons này sau khi cài đặt sẽ hiển thị một thanh công cụ trên Firefox. Thông qua toolbar này, bạn có thể sử dụng Snagit để chụp toàn cửa sổ màn hình, web page, màn hình tự chọn hay text. Hình ảnh được lưu dưới nhiều định dạng thông dụng và có thể gởi thông qua file đính kèm, lưu vào clipboards, printer hay email.<br />\r\n<br />\r\n(Theo_Thanh_Nien) \r\n\r\n<p> </p>', 1, 323, 1, '');
INSERT INTO `tintuc` VALUES (9, 'Tool SQLDumpSplitter', 'Tool SQLDumpSplitter dùng để chia nhỏ file *.sql với dung lượng lớn.\r\n', '', '2010-12-05 10:17:28', 'undefined<!--\r\nundefinedsizec\r\nundefined-->\r\nundefined\r\nundefined<!--\r\nundefined/sizec\r\nundefined-->\r\nundefinedCách thức: Chương trình sẽ tạo ra 1 file *.sql cấu trúc data (cái này mình sẽ restone đầu tiên) và tạo ra các file chứa dữ liệu (dạng insert)<br />\r\n<br />\r\nBước 1: Chọn file *.sql cần chia nhỏ<br />\r\nBước 2: Chọn dung lượng file muốn chia nhỏ<br />\r\nBước 3: Chọn nơi lưu trũ file chia chỏ<br />\r\nBước 4: Execute<br />\r\n<br />\r\nThế là xong, up từng cái một lên server rồi restone.<br />\r\n<br />\r\nChú ý: chạy file DataStructure.sql đầu tiê nh&eacute;<br />\r\n<br />\r\nNguồn: freecodevn ', 1, 306, 1, '');
INSERT INTO `tintuc` VALUES (8, 'WinHTTrack Website Copier', 'Đây là phần mềm miễn phí, mã nguồn mở, hỗ trợ 25 ngôn ngữ. Giao diện của nó rất đơn giản, giúp bạn nhanh chóng tải về cùng lúc nhiều website để đọc ở chế độ offline. ', '', '2010-12-05 09:33:11', '\r\n<div class="postcontent">Bạn vào chương trình, chọn New Project, điền vào các website mà mình muốn tải về hoặc lấy danh mục website từ một file text. Khi xong, chương trình còn tạo một file Index bao gồm tất cả các đường kết nối (link) đến các website trong dự án (Project) của bạn, <br />\r\n	Nếu có dạng file mới mà chương trình chưa nhận dạng được, bạn vẫn có thể tự thiết lập để chương trình hiểu file đó là dạng nào. Ngoài ra, nếu chuyên nghiệp, bạn có thể chỉnh thêm luật tải về, các giới hạn thiết lập đối với file, cấp độ tải về (chương trình sẽ tải về cả nội dung những đường link trong website đó, dựa theo mức mà bạn chọn). Nếu một lần lên Internet mà tải chưa hết thì lần sau lên bạn chỉ cần chọn Continue là xong; còn nếu muốn xem website đó nay thay đổi thế nào thì chọn Update để tải mới cập nhật.<br />\r\n	<br />\r\n	<a href="http://www.httrack.com/httrack-3.40-2.exe" target="_blank">http://www.httrack.com/httrack-3.40-2.exe</a> </div>', 1, 308, 1, '');
INSERT INTO `tintuc` VALUES (10, 'Tool SQLDumpSplitter', 'Tool SQLDumpSplitter dùng để chia nhỏ file *.sql với dung lượng lớn.', '', '2010-12-05 10:18:33', '<span style="FONT-SIZE: 18pt">Tool SQLDumpSplitter (Chia nhỏ file *.sql) \r\nundefined<!--\r\nundefinedsizec\r\nundefined-->\r\nundefined\r\nundefined<!--\r\nundefined/sizec\r\nundefined-->\r\nundefined<br />\r\n	<br />\r\n	</span>--------------------------------------------------------------------------------<br />\r\n<br />\r\nTool SQLDumpSplitter dùng để chia nhỏ file *.sql với dung lượng lớn.<br />\r\nCách thức: Chương trình sẽ tạo ra 1 file *.sql cấu trúc data (cái này mình sẽ restone đầu tiên) và tạo ra các file chứa dữ liệu (dạng insert)<br />\r\n<br />\r\nBước 1: Chọn file *.sql cần chia nhỏ<br />\r\nBước 2: Chọn dung lượng file muốn chia nhỏ<br />\r\nBước 3: Chọn nơi lưu trũ file chia chỏ<br />\r\nBước 4: Execute<br />\r\n<br />\r\nThế là xong, up từng cái một lên server rồi restone.<br />\r\n<br />\r\nChú ý: chạy file DataStructure.sql đầu tiên nh&eacute;<br />\r\n<br />\r\nNguồn: freecodevn ', 1, 311, 1, '');
INSERT INTO `tintuc` VALUES (11, 'Duyệt web … offline với Teleport Pro', 'Công cụ mạnh mẽ nhưng thân thiện và đơn giản, cho phép bạn download cả một trang web về ổ cứng của mình để duyệt offline, hoặc tự động tìm, lọc và download các file nhất định theo ý muốn được lưu trên', '', '2010-12-05 10:19:35', '<span style="FONT-FAMILY: Times New Roman">Sau khi cài đặt, để bắt đầu download, bạn chọn <i>File > New Project Wizzard</i>. Trong danh mục lựa chọn, có ba lựa chọn đáng chú ý nhất: <br />\r\n	<br />\r\n	\r\n	<!--\r\n	fontc\r\n	-->\r\n	</span>\r\n<!--\r\n/fontc\r\n-->\r\n\r\n<!--\r\nfonto:Arial\r\n-->\r\n<span style="FONT-FAMILY: Times New Roman">\r\nundefined<!--\r\nundefined/fonto\r\nundefined-->\r\nundefined<i>- </i>Create a browsable copy of a website on my hard drive: download toàn bộ website về máy tính và duyệt web .. offline. Bạn sẽ có một phiên bản copy giống hệt như website gốc, nhưng nằm sẵn trên ổ cứng và có thể “truy cập” bất cứ lúc nào mà không cần kết nối internet.<i> </i><br />\r\n	<br />\r\n	\r\n	<!--\r\n	fontc\r\n	-->\r\n	</span>\r\n<!--\r\n/fontc\r\n-->\r\n\r\n<!--\r\nfonto:Arial\r\n-->\r\n<span style="FONT-FAMILY: Times New Roman">\r\nundefined<!--\r\nundefined/fonto\r\nundefined-->\r\nundefined- Search a website for files of a certain type: tìm và download các dạng file nhất định về máy. Bạn thăm một website có rất nhiều wallpaper đẹp, nhưng không muốn mở từng ảnh một và chọn “save as…” nhàm chán? Teleport pro sẽ tự động tìm và download tất cả các file có đuôi .jpg, .bmp, .png.. về ổ cứng. <br />\r\n	<br />\r\n	\r\n	<!--\r\n	fontc\r\n	-->\r\n	</span>\r\n<!--\r\n/fontc\r\n-->\r\n\r\n<!--\r\nfonto:Arial\r\n-->\r\n<span style="FONT-FAMILY: Times New Roman">\r\nundefined<!--\r\nundefined/fonto\r\nundefined-->\r\nundefined- Retrieve one or more files at known address: download 1 hay nhiều file từ các địa chỉ đã biết, dùng để download tất cả file từ một địa chỉ bất kì. \r\nundefined<!--\r\nundefinedfontc\r\nundefined-->\r\nundefined</span>\r\n<!--\r\n/fontc\r\n-->\r\n\r\n\r\n<div align="center">\r\nundefined<!--\r\nundefinedfonto:Arial\r\nundefined-->\r\nundefined<span style="FONT-FAMILY: Times New Roman">\r\nundefined<!--\r\nundefined/fonto\r\nundefined-->\r\nundefined\r\n		<img class="linked-image" src="http://images4.dantri.com.vn/Uploaded/trungn/Tele1.jpg" border="0" /> \r\n		<!--\r\n		fontc\r\n		-->\r\n		</span>\r\n	<!--\r\n	/fontc\r\n	-->\r\n	<br />\r\n	</div>\r\n\r\n<div>\r\nundefined<!--\r\nundefinedfonto:Arial\r\nundefined-->\r\nundefined<span style="FONT-FAMILY: Times New Roman">\r\nundefined<!--\r\nundefined/fonto\r\nundefined-->\r\nundefinedSau khi đã chọn mục mình muốn, bạn sẽ đến bước thứ 2: điền địa chỉ website cần download và “độ sâu link” mà phần mềm sẽ qu&eacute;t. Mặc định là 3 link, có nghĩa Teleport Pro sẽ qu&eacute;t link gốc, các trang cấp 1 liên quan tới trang gốc, các trang cấp 2 có link tới trang cấp 1, và các trang cấp 3 có link tới trang cấp 2. <br />\r\n		\r\n		<!--\r\n		fontc\r\n		-->\r\n		</span>\r\n	<!--\r\n	/fontc\r\n	-->\r\n	\r\n	<!--\r\n	fonto:Arial\r\n	-->\r\n	<span style="FONT-FAMILY: Times New Roman">\r\nundefined<!--\r\nundefined/fonto\r\nundefined-->\r\nundefined\r\n		<img class="linked-image" src="http://images4.dantri.com.vn/Uploaded/trungn/Tele2.jpg" border="0" /> <br />\r\n		<br />\r\n		\r\n		<!--\r\n		fontc\r\n		-->\r\n		</span>\r\n	<!--\r\n	/fontc\r\n	-->\r\n	\r\n	<!--\r\n	fonto:Arial\r\n	-->\r\n	<span style="FONT-FAMILY: Times New Roman">\r\nundefined<!--\r\nundefined/fonto\r\nundefined-->\r\nundefinedBước thứ 3, tùy thuộc vào mục đích sử dụng phần mềm của bạn, ở đây tôi chọn ‘<i>search a website for flies of a certain type’ </i>nhấn Add, chọn Graphic, điền Username và mật khẩu để truy cập website nếu cần và nhấn <i>Next</i>, <i>Finish</i>, lưu project lên ổ cứng. <br />\r\n		<br />\r\n		\r\n		<!--\r\n		fontc\r\n		-->\r\n		</span>\r\n	<!--\r\n	/fontc\r\n	-->\r\n	\r\n	<!--\r\n	fonto:Arial\r\n	-->\r\n	<span style="FONT-FAMILY: Times New Roman">\r\nundefined<!--\r\nundefined/fonto\r\nundefined-->\r\nundefinedSau khi đã hoàn thành tất cả các bước trên, bạn chỉ việc nhấn <i>Start</i> và Teleport Pro sẽ tự động qu&eacute;t website, down toàn bộ ảnh tìm được trên site về folder đã chọn. Bạn cũng có thể yêu cầu phần mềm chỉ tìm file có kích thước nhất định, đuôi file nhất định, chỉ tìm tại website gốc hay link sang website khác, v.v, tất cả đều rất trực quan và đơn giản. <br />\r\n		<br />\r\n		\r\n		<!--\r\n		fontc\r\n		-->\r\n		</span>\r\n	<!--\r\n	/fontc\r\n	-->\r\n	\r\n	<!--\r\n	fonto:Arial\r\n	-->\r\n	<span style="FONT-FAMILY: Times New Roman">\r\nundefined<!--\r\nundefined/fonto\r\nundefined-->\r\nundefined\r\n		<img class="linked-image" src="http://images4.dantri.com.vn/Uploaded/trungn/Tele3.jpg" border="0" /> <br />\r\n		<br />\r\n		\r\n		<!--\r\n		fontc\r\n		-->\r\n		</span>\r\n	<!--\r\n	/fontc\r\n	-->\r\n	\r\n	<!--\r\n	fonto:Arial\r\n	-->\r\n	<span style="FONT-FAMILY: Times New Roman">\r\nundefined<!--\r\nundefined/fonto\r\nundefined-->\r\nundefinedTeleport Pro còn hỗ trợ Resume, có nghĩa tất cả công việc đang thực hiện dang dở sẽ được lưu lại. Nhấn Stop, toàn bộ project đang down dang dở sẽ đựơc lưu lại và tiếp tục lần sau khi bạn nhấn Play. Bạn đọc có thể xem thêm ở trang chủ tại <a href="http://www.tenmax.com/teleport/pro/home.htm" target="_blank">đây</a>.<br />\r\n		<br />\r\n		<br />\r\n		\r\n		<!--\r\n		fontc\r\n		-->\r\n		</span>\r\n	<!--\r\n	/fontc\r\n	-->\r\n	\r\n	<!--\r\n	fonto:Arial\r\n	-->\r\n	<span style="FONT-FAMILY: Times New Roman">\r\nundefined<!--\r\nundefined/fonto\r\nundefined-->\r\nundefinedDownload phiên bản mới nhất 1.50 dùng thử 30 lần tại <span style="FONT-FAMILY: Times New Roman; TEXT-DECORATION: underline"><a href="http://www.tenmax.com/teleport/pro/download.htm" target="_blank">đây</a></span>. <br />\r\n		<br />\r\n		\r\n		<!--\r\n		fontc\r\n		-->\r\n		</span>\r\n	<!--\r\n	/fontc\r\n	-->\r\n	\r\n	<!--\r\n	fonto:Arial\r\n	-->\r\n	<span style="FONT-FAMILY: Times New Roman">\r\nundefined<!--\r\nundefined/fonto\r\nundefined-->\r\nundefinedHay phiên bản 1.47 tại <span style="FONT-FAMILY: Times New Roman; TEXT-DECORATION: underline"><a href="http://rapidshare.com/files/27899013/Teleport_Pro_v1.47.zip" target="_blank">đây</a></span>. <br />\r\n		<br />\r\n		Carck: </span></div>\r\n\r\n<div><span style="FONT-FAMILY: Times New Roman"><a href="http://rapidshare.com/files/66655812/T.e.l.e.p.0.r.t.Pr0.1.5O_4all_J.rar">http://rapidshare.com/files/66655812/T.e.l.e.p.0.r.t.Pr0.1.5O_4all_J.rar</a></span></div>\r\n\r\n<div><span style="FONT-FAMILY: Times New Roman"><br />\r\n		\r\n		<!--\r\n		fontc\r\n		-->\r\n		</span></div>\r\n<!--\r\n/fontc\r\n-->\r\n', 1, 310, 1, '');
INSERT INTO `tintuc` VALUES (12, 'Firebug - Giới thiệu chung và cài đặt', 'Firebug là một plugin của FireFox rất hữu ích và hỗ trợ rất tốt đối với các Web designer trong việc debug javascript, chỉnh sửa giao diện và css. Ngoài ra với Firebug bạn có thể đo được tốc độ tải của', '', '2010-12-05 10:20:11', 'Tất nhiên là để có thể sử dụng được Firebug thì bạn phải <a href="http://www.khkt.net/chu-de/33461/Tim-Hieu-FIREFOX/" target="_blank">download và cài đặt Firefox</a> trước tiên.<br />\r\n<br />\r\nSau đó bạn chỉ việc vào đường dẫn này <a href="https://addons.mozilla.org/en-US/firefox/addon/1843" target="_blank">https://addons.mozilla.org/en-US/firefox/addon/1843</a> và bấm vào download để tiến hành install Firebug vào Firefox.<br />\r\n', 1, 304, 1, '');
INSERT INTO `tintuc` VALUES (13, 'FireBug - Kích hoạt trong FireFox', 'Sau khi đã tiến hành xong các bước cài đặt Firebug vào FireFox, các bạn có thể kích hoạt bằng cách vào Menu Tools > Addon.', '', '2010-12-05 10:21:00', 'Sau đó click chọn Firebug và disable hay enable tùy bạn, tất nhiên phải enable thì mới có thể sử dụng được. Lưu ý: khi bạn thấy nút Disable tức là Firebug hiện đang enable như hình vẽ dưới đây.<br />\r\n<br />\r\n\r\n<img class="linked-image" src="http://i25.photobucket.com/albums/c93/LoneVagabond/tutorials/firebug/fb_01.gif" border="0" /><br />\r\n<br />\r\nTiếp đến bạn phải enable Firebug một lần nữa, bởi vì bước trên chỉ là bước kích hoạt Firebug đối với <a href="http://www.khkt.net/chu-de/33461/Tim-Hieu-FIREFOX/" target="_blank">FireFox</a>. Bạn chọn Menu Tools > Firebug > Bỏ check Disable Firebug.<br />\r\n<br />\r\n\r\n<img class="linked-image" src="http://i25.photobucket.com/albums/c93/LoneVagabond/tutorials/firebug/fb_02.gif" border="0" /><br />\r\n<br />\r\n<b>GIỚI THIỆU CÁC TAB CỦA FIREBUG</b><br />\r\n<br />\r\nĐể mở Firebug bạn có thể dùng các cách sau:<br />\r\n1. Chọn Tools > Firebug > Open Firebug.<br />\r\n2. Right click chuột lên bất kỳ chỗ nào của website (ngoại trừ flash) và chọn Inspect Elements.<br />\r\n<br />\r\nSau khi Firebug được mở sẽ có hình như sau:<br />\r\n<br />\r\n\r\n<img class="linked-image" src="http://i25.photobucket.com/albums/c93/LoneVagabond/tutorials/firebug/fb_03.gif" border="0" /><br />\r\n<br />\r\nCác tab chính của Firebug bao gồm:<br />\r\n<br />\r\n<b>A. Console:</b> Thể hiện các thông số chạy nền của trình duyệt: Các thông báo lỗi, cảnh báo, <a href="http://www.khkt.net/dien-dan/30/JavaScript-VBScript/" target="_blank">javascript</a>, <a href="http://www.khkt.net/chu-de/24387/Ky-thuat-lap-trinh-Ajax/" target="_blank">ajax request</a>...<br />\r\n<br />\r\n<b>B. <a href="http://www.khkt.net/dien-dan/29/HTML-CSS/" target="_blank">HTML</a>:</b> Thể hiện các thành phần <a href="http://www.khkt.net/dien-dan/29/HTML-CSS/" target="_blank">HTML và CSS</a><br />\r\n<br />\r\n<b>C. <a href="http://www.khkt.net/dien-dan/29/HTML-CSS/" target="_blank">CSS</a>:</b> Các thành phần <a href="http://www.khkt.net/dien-dan/29/HTML-CSS/" target="_blank">CSS</a> của website.<br />\r\n<br />\r\n<b>D. <a href="http://www.khkt.net/dien-dan/30/JavaScript-VBScript/" target="_blank">Javascript</a>:</b> Các thành phần <a href="http://www.khkt.net/dien-dan/30/JavaScript-VBScript/" target="_blank">javascript</a>.<br />\r\n<br />\r\n<b>E. DOM:</b> Các đối tượng của <a href="http://www.vietsol.net/" target="_blank">website</a>.<br />\r\n<br />\r\n<b>F. NET:</b> Thông tin các file liên quan được sử dụng cho <a href="http://www.vietsol.net/" target="_blank">trang web</a> như: tên file, <a href="http://www.khkt.net/dien-dan/192/Host-amp-Domain-for-Vietnamese/" target="_blank">domain</a>, thời gian load, thứ tự load.<br />\r\n', 1, 306, 1, '');
INSERT INTO `tintuc` VALUES (14, 'Hướng dẫn sử dụng các tab trong FireBug', 'A. Console:\r\nĐây là phần thể hiện các thông số chạy nền như Javascript, XML, HTTPRequest... và các thông báo lỗi, warning. Bạn muốn hiển thị thông số nào thì có thể chọn phần Option nằm ở góc bên phải', '', '2010-12-05 10:21:58', '<strong>A. Console:<br />\r\n	</strong>Đây là phần thể hiện các thông số chạy nền như <a href="http://www.khkt.net/dien-dan/30/JavaScript-VBScript/" target="_blank">Javascript</a>, XML, HTTPRequest... và các thông báo lỗi, warning. Bạn muốn hiển thị thông số nào thì có thể chọn phần Option nằm ở góc bên phải của tab này và check vào phần muốn hiển thị.<br />\r\n<br />\r\n<b>B. HTML:</b><br />\r\nPhần này hiển thị HTML của trang đang được xem. Chức năng này gần giống như View Source một trang web. Tuy nhiên lại được hỗ trợ rất nhiều tính năng kèm theo.<br />\r\n<br />\r\n<b>1. Inspect Element:</b><br />\r\nĐây là chức năng dùng để xem nội dung html của một đoạn nào đó bạn muốn xem. Đồng thời bạn có thể biết được các thông số: Các thẻ html của phần giao diện bạn muốn xem, các style element và css của phần giao diện đó.<br />\r\n<br />\r\nVí dụ: ở site <a href="http://www.khkt.net/" target="_blank">http://www.khkt.net</a> tôi dùng chức năng Inspect Element cho danh mục <a href="http://www.khkt.net/dien-dan/215/DIEU-HANH/" target="_blank">ĐIỀU HÀNH</a>. Tôi right click chuột vào chữ <a href="http://www.khkt.net/dien-dan/215/DIEU-HANH/" target="_blank">ĐIỀU HÀNH</a> và chọn Inspect Element như dưới đây:<br />\r\n<br />\r\n\r\n<img class="linked-image" src="http://i25.photobucket.com/albums/c93/LoneVagabond/tutorials/firebug/fb_04.jpg" border="0" /><br />\r\n<br />\r\nKết quả sẽ xuất hiện đúng đoạn HTML của phần giao diện mà tôi muốn Inspect.<br />\r\n<br />\r\n\r\n<img class="linked-image" src="http://i25.photobucket.com/albums/c93/LoneVagabond/tutorials/firebug/fb_05.jpg" border="0" /><br />\r\n<br />\r\nBạn có thể edit trực tiếp đoạn <a href="http://www.khkt.net/dien-dan/29/HTML-CSS/" target="_blank">HTML</a> này bằng cách bấm vào nút Edit ở góc trên bên trái. <a href="http://www.khkt.net/chu-de/33461/Tim-Hieu-FIREFOX/" target="_blank">FireFox</a> sẽ xuất hiện luôn giao diện thay đổi cho bạn. Ngoài ra bạn cũng có thể chỉnh trực tiếp <a href="http://www.khkt.net/dien-dan/29/HTML-CSS/" target="_blank">css</a> và <a href="http://www.vietsol.net/" target="_blank">giao diện website</a> cũng sẽ đổi theo ngay lập tức. Chức năng này rất tuyệt khi bạn phải ngồi sửa giao diện html hoặc đang cắt layout cho website. Bạn không cần phải dùng các Editor như <a href="http://www.khkt.net/dien-dan/33/Frontpage-amp-Dreamwaver/" target="_blank">Dream Weaver</a> rồi phải dùng browser xem lại mất thời gian. Bạn có thể sửa trực quan bằng Firebug và cảm thấy ok rồi mới dùng Editor chỉnh 1 lần. <br />\r\n<br />\r\n\r\n<img class="linked-image" src="http://i25.photobucket.com/albums/c93/LoneVagabond/tutorials/firebug/fb_06.jpg" border="0" /><br />\r\n<br />\r\nBên phần Style còn có chức năng để bạn bỏ chọn các style bằng cách nhấp trái chuột vào phía trước style đó. Hoặc cũng có thể thêm style bằng cách chọn một style rồi bấm phím Enter để có thêm dòng chèn style. Ngoài ra bạn còn có thể right click chuột vào từng thành phần và chọn các tính năng tương ứng.<br />\r\n<br />\r\nVề phần Style, khi bạn chọn tag tương ứng bên <a href="http://www.khkt.net/dien-dan/29/HTML-CSS/" target="_blank">HTML</a> thì Style sẽ xuất hiện các css tương ứng. Ngoài ra phần Style còn có tab Layout giúp bạn có cái nhìn trực quan hơn về kích thước hiển thị.<br />\r\n', 1, 306, 1, '');
INSERT INTO `tintuc` VALUES (15, 'Thiết kế banner với Banner Maker Pro', 'Chỉ cần một phần mềm đơn giản mang tên Banner Maker Pro 6, bạn có thể dễ dàng thiết kế các banner nhanh chóng nhưng không kém phần chuyên nghiệp, không cần dùng đến các chương trình đồ họa phức tạp nh', '', '2010-12-05 10:24:53', 'Banner Maker Pro 6 là một phần mềm chuyên dụng giúp bạn thiết kế các banner động và tĩnh, các button và logo với rất nhiều công cụ kèm theo mà không cần bạn phải có kiến thức nhiều về các thao tác xử lý đồ họa. Chương trình có dung lượng 3,85 MB, tương thích với mọi hệ điều hành, tải bản dùng thử 15 ngày tại địa chỉ <a href="http://www.bannermakerpro.com/download.html" target="_blank">http://www.bannermakerpro.com/download.html</a>.<br />\r\n<br />\r\nSau khi khởi động chương trình, những thao tác thiết kế banner đã được chương trình xếp gọn thành các thẻ nằm ở trên cùng giao diện màn hình. Để bắt tay vào công việc, bạn chọn thẻ Size và chọn lựa kích cỡ một banner mình sẽ tạo. Có một số kích cỡ banner đã được chương trình đưa vào list. Còn nếu bạn muốn tự tạo một banner có kích cỡ riêng, hãy nhập các thông số vào khung Width (độ dài) và Height (độ cao). Nhấn Next để sang thẻ tiếp theo.<br />\r\n<br />\r\nThẻ Background cho ph&eacute;p bạn chọn màu nền của banner (nút Select a Color) hay dùng một bức ảnh để làm nền (Select background Image), bạn có thể tùy ý thay đổi kiểu hiển thị của khung nền trong mục Shape. Thẻ Boder cho bạn các tùy chọn về khung của banner. Thẻ Images cho ph&eacute;p bạn chèn vào banner một hay nhiều bức ảnh và bạn có thể quy định về kích thước, vị trí của các ảnh này một cách tùy ý. Nếu muốn đưa vào banner các dòng text, bạn chọn thẻ Text, sau đó chọn tiếp thẻ Text+ để đưa thêm các hiệu ứng hiển thị cho các dòng text.<br />\r\n<br />\r\nMặc định các dòng text sẽ nằm trên một đường thẳng, nếu muốn chúng hiển thị theo vòng tròn hay các hình dạng tùy ý bạn chọn thẻ Angle, nhập dòng text vào khung New text và chọn một kiểu hiển thị thích hợp trong các mục Gradient hay 3D Effect.<br />\r\n<br />\r\nSau khi đã hoàn thành, nếu muốn thêm các hiệu ứng động cho banner, bạn chọn thẻ Animation > One step Animation và lựa chọn 1 hiệu ứng mà bạn thấy đẹp mắt nhất. Nếu muốn lưu banner, chọn thẻ Save > Save. Trong thẻ Save này lại có một số tùy chọn cho bạn như Preview (xem trước), Send via Email (gửi banner đi dưới dạng email), GIF/JPEG Compress (n&eacute;n ảnh để giảm dung lượng).', 1, 312, 1, '');
INSERT INTO `tintuc` VALUES (16, 'Soundsnap ', 'Soundsnap là một thư viện khổng lồ gồm hàng nghìn đoạn âm thanh khác nhau, từ các giai điệu nhạc cho tới các loại tiếng động, âm thanh như tiếng người biểu lộ các cảm xúc, tiếng giao thông, tiếng động', '', '2010-12-05 10:25:28', '<br />\r\n<br />\r\nMỗi đề mục lớn lại được chia nhỏ thành các đề mục cụ thể hơn để bạn dễ tìm kiếm các âm thanh theo nhu cầu.<br />\r\n<br />\r\nThư viện này không chỉ thích hợp cho những người dùng bình thường, cần sử dụng âm thanh cho nhạc chuông điện thoại hay các mục đích giải trí khác, mà còn đáp ứng tốt nhu cầu của các nhà thiết kế âm thanh chuyên nghiệp, các nhà sản xuất nhạc, phim, phát triển web hay trò chơi...<br />\r\n<br />\r\nSoundsnap cung cấp âm thanh ở các định dạng mp3, wav và aif. Bạn có thể sử dụng các âm thanh này hoàn toàn miễn phí cho việc sử dụng cá nhân hoặc tích hợp trong các sản phẩm thương mại. Bên cạnh đó, bạn cũng có thể chia sẻ các tác phẩm âm thanh của mình và giao lưu với cộng đồng Soundsnap. <br />\r\n', 0, 305, 1, '');
INSERT INTO `tintuc` VALUES (17, 'Các trang web tải font', 'Tại các trang Web sau đây, bạn sẽ có thể tìm cho mình những phông chữ (font) đẹp, lạ theo ý thích. Có thể tải miễn phí hay đăng ký làm thành viên để tải các phông đặc biệt, còn nếu là phông thương mại', '', '2010-12-10 17:02:37', 'Các phông ở đây được xếp theo thứ tự ABC, theo bảng mã, có cả phông dành cho máy Macintosh. Để tiện lợi cho người truy cập, các trang còn có phần tìm kiếm và danh sách phông được tải nhiều nhất.<br />\r\n<br />\r\nwww.1001freefonts.com<br />\r\nwww.acidfonts.com<br />\r\nwww.fontsville.com<br />\r\nwww.highfonts.com ', 0, 608, 1, '');

-- --------------------------------------------------------

-- 
-- Table structure for table `users`
-- 

CREATE TABLE `users` (
  `idUser` int(11) NOT NULL auto_increment,
  `HoTen` varchar(100) NOT NULL default '',
  `Username` varchar(50) NOT NULL default '',
  `Password` varchar(50) NOT NULL,
  `DiaChi` varchar(255) default NULL,
  `Dienthoai` varchar(255) default NULL,
  `Email` varchar(255) NOT NULL default '',
  `NgayDangKy` date NOT NULL default '0000-00-00',
  `idGroup` int(11) NOT NULL default '0',
  `NgaySinh` date default NULL,
  `GioiTinh` tinyint(1) default NULL,
  `Active` int(11) default NULL,
  `RandomKey` varchar(255) default NULL,
  `LoginNumber` int(11) default '0',
  `DisableDate` datetime default NULL,
  `Expiration` int(11) default NULL,
  PRIMARY KEY  (`idUser`),
  UNIQUE KEY `Username` (`Username`),
  UNIQUE KEY `Email` (`Email`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=35 ;

-- 
-- Dumping data for table `users`
-- 

INSERT INTO `users` VALUES (21, 'Được', 'duoc', '202cb962ac59075b964b07152d234b70', 'DakNong', '01265360034', 'duoc@company.mail', '2011-01-30', 0, '2011-01-02', 1, 1, 'f29c0f1c5f3cc955ceed26b4a4d6e1d9', 0, '0000-00-00 00:00:00', 0);
INSERT INTO `users` VALUES (20, 'duocmaster', 'duocmaster', '202cb962ac59075b964b07152d234b70', '456, abc chấm  cơm chấm vê en', '01265360034', 'star_computer@company.mail', '2011-01-31', 1, '1971-01-01', 1, 1, '1e932f24dc0aa4e7a6ac2beec387416d', 0, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

-- 
-- Table structure for table `users_online`
-- 

CREATE TABLE `users_online` (
  `visitor` varchar(15) NOT NULL,
  `lastvisit` int(14) NOT NULL,
  `username` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Dumping data for table `users_online`
-- 

INSERT INTO `users_online` VALUES ('127.0.0.1', 1297566047, '');

-- --------------------------------------------------------

-- 
-- Table structure for table `webpoll_answers_ver`
-- 

CREATE TABLE `webpoll_answers_ver` (
  `ID` int(11) NOT NULL auto_increment,
  `QUESTION_ID` int(11) default NULL,
  `ORDER_ID` int(10) default NULL,
  `ANSWER` text,
  `COUNT` int(11) default NULL,
  PRIMARY KEY  (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

-- 
-- Dumping data for table `webpoll_answers_ver`
-- 

INSERT INTO `webpoll_answers_ver` VALUES (1, 1, 0, 'Answer 1', 0);
INSERT INTO `webpoll_answers_ver` VALUES (2, 1, 1, 'Answer 2', 0);
INSERT INTO `webpoll_answers_ver` VALUES (20, 7, 3, 'BÃƒÂ¬nh thÃ†Â°Ã¡Â»Âng', 5);
INSERT INTO `webpoll_answers_ver` VALUES (19, 7, 2, 'HÃ†Â¡i Ã„Â‘Ã¡ÂºÂ¹p', 51);
INSERT INTO `webpoll_answers_ver` VALUES (18, 7, 1, 'Ã„ÂÃ¡ÂºÂ¹p ', 102);

-- --------------------------------------------------------

-- 
-- Table structure for table `webpoll_colors_ver`
-- 

CREATE TABLE `webpoll_colors_ver` (
  `ID` int(11) NOT NULL auto_increment,
  `SET_NAME` varchar(200) default NULL,
  `POLL_BG` varchar(7) default NULL,
  `QUESTION_BG` varchar(7) default NULL,
  `QUESTION_TXT` varchar(7) default NULL,
  `ANSWER_TXT` varchar(7) default NULL,
  `MOUSE_OVER` varchar(7) default NULL,
  `MOUSE_OUT` varchar(7) default NULL,
  `VOTE_BTN_BG` varchar(7) default NULL,
  `VOTE_BTN_TXT` varchar(7) default NULL,
  `TOTAL_VOTES` varchar(7) default NULL,
  `VOTES_BAR` varchar(7) default NULL,
  PRIMARY KEY  (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

-- 
-- Dumping data for table `webpoll_colors_ver`
-- 

INSERT INTO `webpoll_colors_ver` VALUES (1, 'Default Color Set', '999966', '000000', 'FFFFFF', 'FFFFFF', '999966', 'FFFFFF', '000000', 'FFFFFF', '000000', '000000');
INSERT INTO `webpoll_colors_ver` VALUES (7, 'set 1', 'FFFFFF', 'FFFFFF', '000000', '006600', 'FFFFFF', 'FFFFFF', 'FFFFFF', '006600', 'CC0033', 'FFFF33');

-- --------------------------------------------------------

-- 
-- Table structure for table `webpoll_questions_ver`
-- 

CREATE TABLE `webpoll_questions_ver` (
  `ID` int(11) NOT NULL auto_increment,
  `COLOR_SET_ID` varchar(11) default NULL,
  `DAYS` varchar(5) default NULL,
  `WIDTH` varchar(10) default NULL,
  `HEIGHT` varchar(10) default NULL,
  `QUESTION` varchar(100) default NULL,
  `SHOW_RESULT` varchar(100) default NULL,
  `ON_VOTE` varchar(100) default NULL,
  `CUSTOM_MSG` varchar(100) default NULL,
  `BTN_MSG` varchar(100) default NULL,
  `TOTAL_MSG` varchar(100) default NULL,
  `POLL_START` datetime default NULL,
  `POLL_END` datetime default NULL,
  `ALLOW_VOTE` varchar(5) default NULL,
  `USE_TIME_INTERVAL` varchar(5) default NULL,
  `VIEW_RESULTS` varchar(5) default NULL,
  `VIEW_RESULTS_TITLE` varchar(100) default NULL,
  PRIMARY KEY  (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

-- 
-- Dumping data for table `webpoll_questions_ver`
-- 

INSERT INTO `webpoll_questions_ver` VALUES (1, '7', '0', '200', '400', 'Question?', 'amount_percent', 'total', '', 'Vote me!', 'Total votes:', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'true', 'false', 'true', 'view results');
INSERT INTO `webpoll_questions_ver` VALUES (7, '7', '0', '167', '170', 'BÃ¡ÂºÂ¡n thÃ¡ÂºÂ¥y trang web nÃƒÂ y nhÃ†Â° thÃ¡ÂºÂ¿ nÃƒÂ o ?', 'amount_percent', 'total', '', 'BÃƒÂ¬nh chÃ¡Â»Ân', 'Total: ', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'true', 'false', 'true', 'KÃ¡ÂºÂ¿t quÃ¡ÂºÂ£ bÃƒÂ¬nh chÃ¡Â»Ân');

-- --------------------------------------------------------

-- 
-- Table structure for table `webpoll_votes_ver`
-- 

CREATE TABLE `webpoll_votes_ver` (
  `ID` int(11) NOT NULL auto_increment,
  `QUESTION_ID` int(11) default NULL,
  `ANSWER_ID` int(11) default NULL,
  `IP` varchar(25) default NULL,
  `DT` datetime default NULL,
  PRIMARY KEY  (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

-- 
-- Dumping data for table `webpoll_votes_ver`
-- 

INSERT INTO `webpoll_votes_ver` VALUES (11, 7, 18, '127.0.0.1', '2011-02-08 18:50:31');
INSERT INTO `webpoll_votes_ver` VALUES (10, 7, 20, '127.0.0.1', '2011-02-07 09:55:38');
INSERT INTO `webpoll_votes_ver` VALUES (12, 7, 19, '127.0.0.1', '2011-02-13 06:55:27');
INSERT INTO `webpoll_votes_ver` VALUES (13, 7, 18, '127.0.0.1', '2011-02-13 10:00:31');
