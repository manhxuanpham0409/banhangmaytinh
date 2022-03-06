<?php require_once('Connections/config.php'); ?>
<?php session_start();?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
$id=$_SESSION['kt_login_id'];
$sp=$_GET['idSP'];
$sl=$_GET['soluong'];
$sanpham=mysql_query("SELECT SoLuongTonKho FROM sanpham WHERE idSP=$sp");
$row_sanpham=mysql_fetch_assoc($sanpham);
$sl2=$row_sanpham['SoLuongTonKho'];
if($sl>$sl2)
	{
		echo "<script type='text/javascript'>alert('Đặt hàng không thành công ! Chỉ còn $sl2 sản phẩm');</script>";
	}
else
	{

	mysql_query("UPDATE sanpham SET SoLanMua=SoLanMua+1,SoLuongTonKho=SoLuongTonKho-$sl 
				WHERE idSP=$sp");
	mysql_query("INSERT INTO luugiohang VALUES('',$sp,$id,$sl)");
	//Tang so lan mua	
	}
$head=$_SERVER['HTTP_REFERER'];
header("location: $head");			
?>
