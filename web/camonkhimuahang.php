<?php require_once('Connections/config.php'); ?>
<?php ob_start();?>
<?php 

// Code này được tải từ : www.sharecode.org 

$idUser=$_SESSION['kt_login_id'];
mysql_query("DELETE from luugiohang WHERE iduser=$idUser");
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style type="text/css">
<!--
.style1 {
	color: #FF0000;
	font-weight: bold;
}
-->
</style>
<div align="center">
  <h1>Cảm ơn quý khách đã đặt hàng tại <span class="style1">Star Computer</span></h1>
<script>
var s=5; 
setTimeout("document.location='index.php'", s *1000); 
setInterval("document.getElementById('sogiay').innerHTML=s--",1000);
</script> 
<center>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<p>Quay lại trang chủ !<a href='index.php'>Tại đây </a></p>
<P>Quay lại trang chủ sau <font color="#0000FF"><span id="sogiay"></span></font> &nbsp; giây nữa
</center> 
</div>
