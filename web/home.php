<?php require_once('Connections/config.php'); ?>
<?php

// Code này được tải từ : www.sharecode.org 


if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? "'" . doubleval($theValue) . "'" : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

mysql_select_db($database_config, $config);
$query_master1chungloai = "SELECT * FROM chungloai ORDER BY TenCL DESC";
$master1chungloai = mysql_query($query_master1chungloai, $config) or die(mysql_error());
$row_master1chungloai = mysql_fetch_assoc($master1chungloai);
$totalRows_master1chungloai = mysql_num_rows($master1chungloai);

mysql_select_db($database_config, $config);
$query_detail2sanpham = "SELECT * FROM sanpham WHERE idCL=123456789 AND SoLuongTonKho<>0 ORDER BY idSP DESC  LIMIT 0,1";
$detail2sanpham = mysql_query($query_detail2sanpham, $config) or die(mysql_error());
$row_detail2sanpham = mysql_fetch_assoc($detail2sanpham);
$totalRows_detail2sanpham = mysql_num_rows($detail2sanpham);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/content.css" rel="stylesheet" type="text/css">
<title>Untitled Document</title>
</head>

<body>
<table width="600px" border="0" align="center" cellpadding="0" cellspacing="0">
<tr><td class="thanhthongtin" colspan="3">STAR COMPUTER</td></tr> 
  <?php do { ?>
     <?php if($n%3==0)echo "<tr class='phansanpham'>";$n++;?>
    <?php
  if ($totalRows_master1chungloai>0) {
    $nested_query_detail2sanpham = str_replace("123456789", $row_master1chungloai['idCL'], $query_detail2sanpham);
    mysql_select_db($database_config);
    $detail2sanpham = mysql_query($nested_query_detail2sanpham, $config) or die(mysql_error());
    $row_detail2sanpham = mysql_fetch_assoc($detail2sanpham);
    $totalRows_detail2sanpham = mysql_num_rows($detail2sanpham);
    $nested_sw = false;
    if (isset($row_detail2sanpham) && is_array($row_detail2sanpham)) {
      do { //Nested repeat
?>
   
        <td align="center" ><fieldset><legend class="legend"><?php echo $row_master1chungloai['TenCL']; ?></legend>
		<img src="upload/<?php echo $row_detail2sanpham['HinhAnh'];?>" title="<?php echo $row_detail2sanpham['TenSP'];?>" width="109" height="90" align="bottom" hspace="5" vspace="5"></br>
		<img src="images/new.gif" width="33" height="16" align="top" />
		<div class="tensp"><?php echo $row_detail2sanpham['TenSP'];?></div>
		<div class="giaban"><i>Giá bán</i> :<?php echo number_format($row_detail2sanpham['DonGia'],0,',','.')." VNĐ";?></div>
        <div class="ngaycapnhat"><?php echo "Ngày cập nhật : ".date('d-m-Y',strtotime($row_detail2sanpham['NgayCapNhat']));?></div>
        
        <?php if($row_detail2sanpham['SoLuongTonKho']!=0){;//Neu het hang?> 
		<form action="chonsp.php" method="get" name="form1" class="khungdathang" id="form1">
            <label>
            <input name="soluong" type="text" class="khungsoluong" id="soluong" value="1" size="3"/>
            </label>
            <label>
		    <input name="imageField" type="image" class="hinhgiohang" id="imageField" src="images/gio_hang.jpg" align="middle" 		<?php 
			if(!isset($_SESSION['kt_login_id'])) 
			{
				echo "onclick=\"alert('Bạn chưa đăng nhập nên không thề đặt hàng !!! ');return false;\"";
			}
			?>/>
            <input name="idSP" type="hidden" id="idSP" value="<?php echo $row_detail2sanpham['idSP']; ?>" />
            </label>
            <a class="chitiet" href="index.php?mod=chitietsp&idSP=<?php echo $row_detail2sanpham['idSP'];?>" title="Chi tiết <?php echo $row_detail2sanpham['TenSP'];?>">Chi tiết>></a>
          </form>
  <?php } else {?>
  <form action="chonsp.php" method="get" name="form1" class="khungdathang" id="form1">
            <label>
            <input name="soluong" type="text" class="khungsoluong" id="soluong" value="1" size="3" disabled="disabled"/>
            </label>
            <label>
		   <img src="images/gio_hang1.gif" class="hinhgiohang"/>
            <input name="idSP" type="hidden" id="idSP" value="<?php echo $row_detail2sanpham['idSP']; ?>" />
            </label>
            <span class="giaban">Hết hàng</span>
          </form>
  <?php }?>               
	</fieldset></td>
      
      <?php
	
      } while ($row_detail2sanpham = mysql_fetch_assoc($detail2sanpham)); //Nested move next
    }
  }

?>
    <?php 
	if($n%3==0) echo "</tr>";
	} while ($row_master1chungloai = mysql_fetch_assoc($master1chungloai)); ?>
</table>
</body>
</html>
<?php
mysql_free_result($master1chungloai);

mysql_free_result($detail2sanpham);
?>
