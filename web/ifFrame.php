<?php
require_once('Connections/config.php');
$qc=mysql_query("SELECT Url,urlHinh,MoTa FROM quangcao WHERE AnHien=1 AND Curdate() BETWEEN Ngaydang AND NgayKT");
$row_qc=mysql_fetch_assoc($qc);
$rowTotalqc=mysql_num_rows($qc);
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<?php if ($rowTotalqc>0) {?>
<marquee direction="left" behavior="alternate" scrollamount="4" scrolldelay="10" width="167" height="150" onMouseOver="this.stop()" onMouseOut="this.start()">
  <?php do{?>
    <a href="<?php echo $row_qc['Url'];?>">
      <img src="quangcao/<?php echo $row_qc['urlHinh'];?>" border="0" align="left" class="hinhqc" title="<?php echo $row_qc['MoTa'];?>"/></a>
    <?php }while($row_qc=mysql_fetch_assoc($qc));?>
  </marquee>
<?php }else {?>
	<img src="quangcao/defeault.gif">
<?php }?>  
</body>
</html>
