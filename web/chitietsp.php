<script type="text/javascript" src="js/dungchung.js"></script>
<?php require_once('Connections/config.php'); ?>
<link href="css/content.css" rel="stylesheet" type="text/css" />
<script src="SpryAssets/SpryCollapsiblePanel.js" type="text/javascript"></script>
<link href="SpryAssets/SpryCollapsiblePanel.css" rel="stylesheet" type="text/css" />
<table width="600px" border="0" align="center" cellpadding="0" cellspacing="0" class="chitietsp">
<tr><td colspan="2" class="textchitiet">CHI TIẾT </td></tr>
  <?php   $idsanpham = $_GET['idSP'];	
	$sanpham = mysql_query("SELECT TenSP,DonGia,HinhAnh,MoTa,NgayCapNhat,BaoHanh,SoLuongTonKho,Ten FROM sanpham,hangsx WHERE idSP=$idsanpham AND sanpham.AnHien=1 AND sanpham.idHang=hangsx.idHang ORDER BY sanpham.ThuTu ASC");	
	$row_sanpham = mysql_fetch_assoc($sanpham);
	
	//====================================
		//$limit: Số sản phẩm trên 1 trang
		//$n: Số sản phẩm trên 1 dong
	//====================================
	
	//====================================
		//Tang so lan xem
		mysql_query("UPDATE sanpham SET SoLanXem=SoLanXem+1WHERE idSP=$idsanpham");
	//====================================	
	do
		{
		?>
            <tr>
			<td width="40%" align="center" bgcolor="#FFFFFF">
				<img src="upload/<?php   echo $row_sanpham['HinhAnh'];?>" title="<?php   echo $row_sanpham['TenSP'];?>" width="109" height="90" hspace="5" vspace="5"></br>
			  <div class="tensp">Tên sản phẩm : <?php   echo $row_sanpham['TenSP'];?></div>
				<div class=giaban><i>Giá bán</i> : <?php   echo number_format($row_sanpham['DonGia'],0,',','.')." VNĐ";?></div          
                ><div class="baohanh"><?php   echo "Thời gian bảo hành :".$row_sanpham['BaoHanh']." tháng"?></div>
              <div class="ngaycapnhat"><?php   echo "Ngày cập nhật : ".date('d-m-Y',strtotime($row_sanpham['NgayCapNhat']));?></div>
         <div style="width:100px; float:left">       
		   <form action="chonsp.php" method="get" name="form1" class="khungdathang" id="form1">
            <label>
            <input name="soluong" type="text" class="khungsoluong" id="soluong" value="1" size="3" />
            </label>
            <label>
		    <input name="imageField" type="image" class="hinhgiohang" id="imageField" src="images/gio_hang.jpg" align="middle" <?php if(!isset($_SESSION['kt_login_id'])) echo "onclick=\"alert('Bạn chưa đăng nhập nên không thề đặt hàng !!! ');return false;\"";?>/>
            <input name="idSP" type="hidden" id="idSP" value="<?php echo $idsanpham; ?>" />
            </label>
          </form></div></a>       
              <img src="images/back.png" border="0"/><a href="#" class="chitiet" onclick="quayve();">Quay về</a>
              <td width="50%" align="justify" valign="top" bgcolor="#CCCCCC">
              <div class="mota">Mô tả :</div>
              <div class="textmota"><?php echo $row_sanpham['MoTa'];?></div>     
              <div class="mota">Hãng sản xuất :</div>
              <div class="textmota"><?php echo $row_sanpham['Ten'];?></div>          
              <p class="chitietsp">Số lượng còn  <?php echo $row_sanpham['SoLuongTonKho'];?> cái</p></td>
<?php   }
  while($row_sanpham = mysql_fetch_assoc($sanpham));
?>  
</table>


<div id="CollapsiblePanel1" class="CollapsiblePanel" style="width:600px; margin:auto;">
  <div class="CollapsiblePanelTab" tabindex="0">Gửi mail cho bạn bè</div>
  <div class="CollapsiblePanelContent">
  <?php require_once('guimailchobanbe.php'); ?>
  </div>
</div>
<script type="text/javascript">
<!--
var CollapsiblePanel1 = new Spry.Widget.CollapsiblePanel("CollapsiblePanel1", {contentIsOpen:false});
//-->
</script>
