<?php require_once('Connections/config.php'); ?>
<?php if (isset($_SESSION['kt_login_id'])){?>
<?php
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

$colname_khachhang = "-1";
if (isset($_SESSION['kt_login_id'])) {
  $colname_khachhang = $_SESSION['kt_login_id'];
}
mysql_select_db($database_config, $config);
$query_khachhang = sprintf("SELECT HoTen, Username, Password, DiaChi, Dienthoai, Email, NgayDangKy, NgaySinh, GioiTinh FROM users WHERE idUser = %s", GetSQLValueString($colname_khachhang, "int"));
$khachhang = mysql_query($query_khachhang, $config) or die(mysql_error());
$row_khachhang = mysql_fetch_assoc($khachhang);
$totalRows_khachhang = mysql_num_rows($khachhang);
//Thong ke danh sach dat hang
$id=$_SESSION['kt_login_id'];
$SoSP=mysql_query("SELECT * FROM luugiohang WHERE luugiohang.iduser=$id");
$giohang=mysql_query("SELECT luugiohang.idSP as idSP ,TenSP, count(luugiohang.idSP)as SL,Sum(DonGia) as TongTien FROM sanpham,luugiohang WHERE sanpham.idSP=luugiohang.idSP AND luugiohang.iduser=$id GROUP BY luugiohang.idSP");
$row_giohang=mysql_fetch_assoc($giohang);
?>
<link href="css/mycss.css" rel="stylesheet" type="text/css">
<link href="css/giohang.css" rel="stylesheet" type="text/css" />
<div class="khung1">
    <fieldset>
    <h1>
      <label>TH??NG TIN KH??CH H??NG</label></h1>    
   <table width="400" border="0" align="center" cellpadding="4" cellspacing="0">
      <tr>
        <td width="192" class="noidung">H??? t??n</td>
        <td width="192" class="textdangki"><?php echo $row_khachhang['HoTen']; ?></td>
     </tr>
      <tr>
        <td class="noidung">T??n ????ng nh???p</td>
        <td class="textdangki"><?php echo $row_khachhang['Username']; ?></td>
     </tr>
      <tr>
        <td class="noidung">Gi???i t??nh</td>
        <td class="textdangki"><?php if($row_khachhang['GioiTinh']==0) echo "N???";else echo "Nam"; ?></td>
     </tr>
      <tr>
        <td class="noidung">Ng??y sinh</td>
        <td class="textdangki"><?php echo date(('d-n-Y'),strtotime($row_khachhang['NgaySinh'])); ?></td>
      </tr>
      <tr>
        <td class="noidung">?????a ch???</td>
        <td class="textdangki"><?php echo $row_khachhang['DiaChi']; ?></td>
     </tr>
      <tr>
        <td class="noidung">??i???n tho???i</td>
        <td class="textdangki"><?php echo $row_khachhang['Dienthoai']; ?></td>
     </tr>
      <tr>
        <td class="noidung">Email</td>
        <td class="textdangki"><?php echo $row_khachhang['Email']; ?></td>
     </tr>
      <tr>
        <td class="noidung">Ng??y t???o t??i kho???n</td>
        <td class="textdangki"><?php echo $row_khachhang['NgayDangKy']; ?></td>
     </tr>
      <tr>
        <td class="noidung">&nbsp;</td>
        <td><a href="index.php?mod=doithongtin" class="quayve">?????i th??ng tin</a></td>
      </tr>
    </table>
    </fieldset>
</div>
<?php
mysql_free_result($khachhang);
}
else
echo "<script type='text/javascript'>alert('B???n ch??a ????ng nh???p!');window.location='logout.php';</script>";	
?>
