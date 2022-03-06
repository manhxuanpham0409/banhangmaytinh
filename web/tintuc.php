<?php require_once('Connections/config.php'); ?>
<link href="css/mycss.css" rel="stylesheet" type="text/css">
<div class="khung">
    <fieldset>
<h1><label>TIN TỨC</label></h1>
  
        <?php   if(isset($_GET['idtintuc']))
			{
				$idtintuc=$_GET['idtintuc'];
				////////////////////////////////////////////////////////////////////////////
				mysql_query("UPDATE tintuc SET SoLanDoc=SoLanDoc+1 WHERE idTin=$idtintuc");//
				//Tang so nguoi doc                                                        //
				////////////////////////////////////////////////////////////////////////////				
				$noibat=mysql_query("SELECT TieuDe,UrlHinh,NoiDung,Ngay FROM tintuc WHERE idTin=$idtintuc AND AnHien=1");
				$row_noibat=mysql_fetch_assoc($noibat);
				$urlHinh=$row_noibat['UrlHinh'];;
				?>                
                <div class="tieude"><img src="images/arrow.gif" width="9" height="6" />
    <?php   echo $row_noibat['TieuDe'];?></div>                
    <div class="ngaycapnhat">Ngày viết :<?php   echo date('d-m-Y',strtotime($row_noibat['Ngay']));?></div>
                <div class="hinh">
					<?php   if($urlHinh) echo "<img src='upload/$urlHinh' align='left'/>"; ?>
                </div>
                <div class="noidung"><?php   echo $row_noibat['NoiDung']; ?></div>
                <img src="images/back.png" border="0"/><a href="<?php   echo $_SERVER['HTTP_REFERER'];?>" class="quayve">Quay về</a>
                
		 <?php   }
				
			else
			{
				$tintuc=mysql_query("SELECT idTin,TieuDe,TomTat,UrlHinh,NoiDung,Ngay FROM tintuc WHERE AnHien=1 ORDER BY idTin DESC");
				$row_tintuc=mysql_fetch_assoc($tintuc);?>
                <?php   do{?>
                <img src="images/arrow.gif" width="9" height="6" />
                <span class="tieude1"><a href="index.php?mod=tintuc&idtintuc=<?php echo $row_tintuc['idTin']; ?>" class="linktieude"><?php echo $row_tintuc['TieuDe'];?></a><span style="font-size:9px; font-family:Arial, Helvetica, sans-serif; color:#000000; padding-left:5px; font-weight:500">(Ngày viết : <?php   echo date('d-m-Y',strtotime($row_tintuc['Ngay']));?>)</span></span>
                <div class="tomtat"><?php   echo $row_tintuc['TomTat']; ?></div>
				<div class="gach"></div>
                <?php   } while($row_tintuc=mysql_fetch_assoc($tintuc));?>
               
                
			<?php   } ?>
		
	
  </fieldset>
</div>

