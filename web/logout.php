<?php session_start();require_once('Connections/config.php'); ?>
<?php ob_start();?>
<?php 
$idUser=$_SESSION['kt_login_id'];
mysql_query("DELETE from luugiohang WHERE iduser=$idUser");
session_destroy();
header("Location: index.php");
?>
