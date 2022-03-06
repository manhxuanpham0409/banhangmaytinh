<?php require_once('Connections/config.php'); ?>
<?php
$idUser=$_SESSION['kt_login_id'];
mysql_query("INSERT INTO donhangchitiet(idDH,idSP,SoLuong,Gia)
SELECT idDH,luugiohang.idSP,SL,SL*DonGia as Gia FROM luugiohang,donhang,sanpham WHERE luugiohang.iduser=donhang.idUser AND luugiohang.idSP=sanpham.idSP AND luugiohang.iduser=$idUser");
?>
