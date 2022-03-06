<?php require_once('Connections/config.php'); ?>
  <?php   
  // Code này được tải từ : www.sharecode.org 
  	$idCL=$_GET['idCL']; 
  	$idloaisp = $_GET['idloaisp']; 
	$idHang = $_GET['idHang'];
	$tensp=$_GET['tensp']; 	
	include("phantrang.php");
	$p= new Pager;	
	//Số sản phẩm trên 1 dong
	$sosptren1dong=mysql_fetch_assoc(mysql_query("SELECT SoMauTin FROM hiensomautin WHERE idSoMauTin=5"));
	$limit =$sosptren1trang['SoMauTin'];// So san pham tren cung 1 trang
	$col=0;//So san pham cung 1 dong	
	$sosptren1trang=mysql_fetch_assoc(mysql_query("SELECT SoMauTin FROM hiensomautin WHERE idSoMauTin=4"));
	$n =$sosptren1dong['SoMauTin'];// So san pham tren cung 1 dong
	//Cac bien yeu cau
	$limit =$sosptren1trang['SoMauTin'];// So san pham tren cung 1 trang	
	$start = $p->findStart($limit);
	if(isset($idloaisp) && isset($idCL))
	{
		$count=mysql_num_rows(mysql_query("SELECT idSP FROM sanpham WHERE idLoaiSP=$idloaisp AND idCL=$idCL"));	
		$sanpham = mysql_query("SELECT idSP,TenSP,DonGia,HinhAnh,NgayCapNhat,Ten,SoLuongTonKho
										FROM sanpham,loaisp
										WHERE sanpham.idLoaiSP=loaisp.idLoaiSP AND sanpham.idLoaiSP=$idloaisp AND sanpham.idCL=$idCL
										LIMIT $start,$limit");
		$row_sanpham = mysql_fetch_assoc($sanpham);
		$xuat_ten=$row_sanpham['Ten'];
	}
	else if(isset($idHang))
	{
		$count=mysql_num_rows(mysql_query("SELECT idSP FROM sanpham WHERE idHang=$idHang AND AnHien=1"));
		$sanpham = mysql_query("SELECT idSP,TenSP,DonGia,HinhAnh,NgayCapNhat,Ten ,SoLuongTonKho 
								FROM sanpham,hangsx WHERE sanpham.idHang=hangsx.idHang AND hangsx.idHang=$idHang AND sanpham.AnHien=1 LIMIT $start,$limit");	
		$row_sanpham = mysql_fetch_assoc($sanpham);
		$xuat_ten=$row_sanpham['Ten'];
	}	
	else if(isset($tensp) && $tensp!="")
	{
		$count=mysql_num_rows(mysql_query("SELECT idSP FROM sanpham	WHERE TenSP LIKE '%$tensp%' AND AnHien=1"));
		$sanpham = mysql_query("SELECT distinct idSP,TenSP,DonGia,HinhAnh,NgayCapNhat,SoLuongTonKho 
		FROM sanpham,loaisp,chungloai,hangsx WHERE sanpham.idLoaiSP=loaisp.idLoaiSP AND sanpham.idCL=chungloai.idCL AND sanpham.idHang=hangsx.idHang AND (TenSP LIKE '%$tensp%' OR loaisp.Ten LIKE '%$tensp%' OR TENCL LIKE '%$tensp%' OR hangsx.Ten LIKE '%$tensp%') ORDER BY TenSP ASC LIMIT $start,$limit");
   		$row_sanpham = mysql_fetch_assoc($sanpham);
		$xuat_ten=$tensp;
	}	
	$pages = $p->findPages($count, $limit);	
?><head>
  <link href="css/content.css" rel="stylesheet" type="text/css" />
</head>

<table width="600px" border="0" align="center" cellpadding="0" cellspacing="0">   
<tr>
<td class="thanhthongtin" colspan="<?php echo $n; ?>" align="center">
<?php if($count!=0) echo "HIỆN CÓ $count SẢN PHẨM : ".$xuat_ten;else echo "KHÔNG TÌM THẤY DỮ LIỆU YÊU CẦU"; ?></td>
</tr>
<tr class="phansanpham">
	<?php   if($count!=0)
	{
	do{
		$idSP=$row_sanpham['idSP'];
		$chungloai=mysql_query("SELECT TenCL FROM sanpham,chungloai WHERE sanpham.idCL=chungloai.idCL AND idSP=$idSP");
		$row_chungloai=mysql_fetch_assoc($chungloai);
		if($col%$n==0)echo "<tr class='phansanpham'>";
		$col++;?>
		<td align="center"><fieldset><legend class="legend"><?php echo $row_chungloai['TenCL'];?></legend>
		<img src="upload/<?php echo $row_sanpham['HinhAnh'];?>" title="<?php echo $row_sanpham['TenSP'];?>" width="109" height="90" align="bottom" hspace="5" vspace="5"></br>
		<div class="tensp"><?php echo $row_sanpham['TenSP'];?></div>
		<div class="giaban"><i>Giá bán</i> :<?php echo number_format($row_sanpham['DonGia'],0,',','.')." VNĐ";?></div>
        <div class="ngaycapnhat"><?php echo "Ngày cập nhật : ".date('d-m-Y',strtotime($row_sanpham['NgayCapNhat']));?></div>
        
        <?php if($row_sanpham['SoLuongTonKho']!=0){;//Neu het hang?> 
		<form action="chonsp.php" method="get" name="form1" class="khungdathang" id="form1">
            <label>
            <input name="soluong" type="text" class="khungsoluong" id="soluong" value="1" size="3"/>
            </label>
            <label>
		    <input name="imageField" type="image" class="hinhgiohang" id="imageField" src="images/gio_hang.jpg" align="middle" 		<?php 
			if(!isset($_SESSION['kt_login_id'])) 
			{
				echo "onclick=\"alert('Bạn chưa đăng nhập nên không thề đặt hàng !!! ');return false;\"";
			}
			?>/>
            <input name="idSP" type="hidden" id="idSP" value="<?php echo $row_sanpham['idSP']; ?>" />
            </label>
            <a class="chitiet" href="index.php?mod=chitietsp&idSP=<?php echo $row_sanpham['idSP'];?>" title="Chi tiết <?php echo $row_sp['TenSP'];?>">Chi tiết>></a>
          </form>
  <?php } else {?>
  <form action="chonsp.php" method="get" name="form1" class="khungdathang" id="form1">
            <label>
            <input name="soluong" type="text" class="khungsoluong" id="soluong" value="1" size="3" disabled="disabled"/>
            </label>
            <label>
		   <img src="images/gio_hang1.gif" class="hinhgiohang"/>
            <input name="idSP" type="hidden" id="idSP" value="<?php echo $row_sanpham['idSP']; ?>" />
            </label>
            <span class="giaban">Hết hàng</span>
          </form>
  <?php }?>
               
	</fieldset></td>
	<?php if($col%$n==0) echo "</tr>";	
		}
	while($row_sanpham = mysql_fetch_assoc($sanpham));
}
?>
</tr>
  <tr>
  	<td colspan="<?php echo $n; ?>" align="center"><?php $pagelist = $p->pageList($_GET['page'], $pages);echo $pagelist;?></td>
  </tr>
</table>


