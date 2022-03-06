<?php require_once('Connections/config.php'); ?>
<?php
mysql_select_db($database_config, $config);
$query_footer="SELECT id,Ten from menu WHERE AnHien=1 AND footer=1 ORDER BY ThuTu ASC";
$menufooter=mysql_query($query_footer, $config) or die(mysql_error());
$row_menufooter=mysql_fetch_assoc($menufooter);
$nfooter=mysql_num_rows($menufooter);
$ifooter=1;
?>
<?php do{ ?>
	 		<a href="index.php?idmenu=<?php echo $row_menufooter['id'];?>" class="linkfooter">
			<?php echo $row_menufooter['Ten'];?></a>						     		
			<?php if($ifooter<$nfooter) echo " | ";
			   else echo "";
			   $ifooter++;
		  }
		while($row_menufooter=mysql_fetch_assoc($menufooter));
?></a>
<br />
Copyright&copy;<strong>Star computer</strong> 2010-2011| 182 Nguyen Van Troi Stress-DakNong City-Designer:Mr Huynh Van Duoc Hotline:0126.536.0034-0909.257.034    
