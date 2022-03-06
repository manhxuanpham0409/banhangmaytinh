<?php require_once('Connections/config.php'); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/mycss.css" rel="stylesheet" type="text/css">
<?php 
	$idCN=$_GET['idCN'];
	$CN=mysql_query("SELECT NoiDung,TenCN FROM chucnang WHERE AnHien=1 AND idCN=$idCN");
	$row_CN=mysql_fetch_assoc($CN);
?> 
<div class="khung">
    <fieldset>
    <h1><label><?php echo $row_CN['TenCN'];?></label></h1>
  	<?php echo $row_CN['NoiDung'];?>
    </fieldset>
</div>