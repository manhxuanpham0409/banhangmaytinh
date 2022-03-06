<?php require_once('Connections/config.php'); ?>
    <?php
	// Code này được tải từ : www.sharecode.org 
	$id=$_SESSION['kt_login_id'];
	$SoSP=mysql_query("SELECT * FROM luugiohang WHERE luugiohang.iduser=$id");
	$giohang=mysql_query("SELECT luugiohang.idSP as idSP ,TenSP,sum(SL) as SL,DonGia as TongTien,HinhAnh,DonGia FROM sanpham,luugiohang WHERE sanpham.idSP=luugiohang.idSP AND luugiohang.iduser=$id GROUP BY luugiohang.idSP" );
	$row_giohang=mysql_fetch_assoc($giohang);
	$sl=(mysql_query("SELECT sum(SL) as SL FROM luugiohang WHERE iduser=$id GROUP BY iduser"));	
	$row_sl=mysql_fetch_assoc($sl);
	?>    
<link href="css/mycss.css" rel="stylesheet" type="text/css">
<link href="css/giohang.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/dungchung.js"></script>
<script type="text/javascript" src="ax.js"></script>
<div class="khung1">
        <fieldset>
        <h1>
          <label>GIỎ HÀNG CỦA BẠN CÓ </BR> <?php echo $row_sl['SL'];?> Sản phẩm</label>
        </h1>
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr class="tieude_giohang">
            <td width="178" >STT</td>
            <td width="337">Tên sản phẩm</td>
            <td width="178">Số lượng</td>
            <td width="178">Tổng tiền</td>
            <td width="85">Xóa</td>
          </tr>
          <?php $stt=1;$tt=0; do{?>
         <tr 
		 <?php if($stt%2==0) echo "bgcolor='#FFD5D5'"; else echo "bgcolor='#FFFFCC'"; ?>>
         <?php if(mysql_num_rows($giohang)!=0){?>
         <?php 
		 $tien=$row_giohang['SL']*$row_giohang['TongTien'];
		 $tt=$tt+$tien;
		 ?>
         <td id="giohang"><?php  echo $stt;?></td>
         <td id="giohang"><?php  echo $row_giohang['TenSP'];?></td>
         <td id="giohang"><?php  echo $row_giohang['SL'];?></td>
         <td id="giohang"><?php  echo number_format($tien,0,',','.')." VNĐ";?></td>
         <td align="center"><a href="xl_sanpham.php?idSP=<?php echo $row_giohang['idSP']?>"><img src="images/remove.gif" border="0"/></a></td>
         <?php  }?>
          </tr>
          <?php  $stt++; }while($row_giohang=mysql_fetch_assoc($giohang));?>
          <tr class="tieude_giohang">
          	<td colspan="5">Thành Tiền :<?php echo number_format($tt,0,',','.')." VNĐ";?></td>
          </tr>
        </table>
        <img src="images/back.png" border="0"/><a href="#" class="chitiet" onclick="quayve();">Quay về</a>
        </fieldset>
</div>
   