<?php require_once('Connections/config.php'); ?>
<?php
 
// Code này được tải từ : www.sharecode.org 

mysql_select_db($database_config, $config);
$query_main="SELECT url,id,Ten from menu WHERE AnHien=1 AND mainmenu=1 ORDER BY ThuTu ASC";
$main=mysql_query($query_main, $config) or die(mysql_error());
$row_main=mysql_fetch_assoc($main);

$query_topmenu="SELECT id,Ten from menu WHERE AnHien=1 AND topmenu=1 ORDER BY ThuTu ASC";
$topmenu=mysql_query($query_topmenu, $config) or die(mysql_error());
$row_topmenu=mysql_fetch_assoc($topmenu);
$n_menu=mysql_num_rows($topmenu);//So dong cua topmenu
$i_menu=1;
?>
<script src="Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
<link href="css/star_computer.css" rel="stylesheet" type="text/css">
<div id="nen" align="center">	
    <div id="top">
    <?php do{?>
		<a href="index.php?idmenu=<?php echo $row_topmenu['id'];?>" id="link">
		<?php echo $row_topmenu['Ten'];?>
        </a>
	<?php if($i_menu<$n_menu) echo " | ";
						   else echo "";
						   $i_menu++;
					    }
					while($row_topmenu=mysql_fetch_assoc($topmenu));
					?></a>
    </div>
  <div id="banner">
    <script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0','width','779','height','210','src','banner_images/banner','quality','high','pluginspage','http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash','movie','banner_images/banner' ); //end AC code
</script><noscript><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0" width="779" height="210" onerror="class='anhinh'">
      <param name="movie" value="banner_images/banner.swf" />
      <param name="quality" value="high" />
      <embed src="banner_images/banner.swf" quality="high" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="779" height="210"></embed>
    </object>
  </noscript></div>
<div id="menu">
<?php do{?>
        <div class="item" align="center">
        <a class="menu" href="index.php?idmenu=<?php echo $row_main['id'];?>">
			<?php echo $row_main['Ten']?>
        </a>
        </div>
<?php }while($row_main=mysql_fetch_assoc($main));?></div>
    <div id="bottom"></div>
</div>
