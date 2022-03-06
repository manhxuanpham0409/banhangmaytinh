<?php require_once('Connections/config.php');
if(isset($_GET['idSP']))
{
	
	$idSP=$_GET['idSP'];
	mysql_query("UPDATE sanpham SET SoLanMua=SoLanMua+1,SoLuongTonKho=SoLuongTonKho+(SELECT sum(SL) FROM luugiohang WHERE idSP=$idSP GROUP BY idSP) WHERE idSP=$idSP");	
	$sql= "DELETE FROM luugiohang WHERE idSP=$idSP";
	$result = mysql_query($sql,$config);
}
echo "<script type='text/javascript'>window.location='".$_SERVER['HTTP_REFERER']."'</script>";
mysql_close($config);	
?>