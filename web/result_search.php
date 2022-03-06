<?php require_once('Connections/config.php'); ?>
<?php
$tensp=$_GET['tensp'];
$idCL=$_GET['select'];
$idLoaiSP=$_GET['select1'];
$gia1=$_GET['gia1'];
$gia2=$_GET['gia2'];
$start=0;
$limit=18;
include("phantrang.php");
$p= new Pager;	
$start = $p->findStart($limit);
//echo $_SERVER['REQUEST_URI']."</br>";
mysql_select_db($database_config, $config);
if($tensp!="Nhập tên..." and $idCL=="" and $idLoaiSP=="" and $gia1=="" and $gia2=="")
{
	//echo $tensp;
	$count=mysql_num_rows(mysql_query("SELECT idSP,TenSP, MoTa, HinhAnh, DonGia, BaoHanh, NgayCapNhat, SoLuongTonKho FROM sanpham 
				WHERE TenSP LIKE '%$tensp%'"));	
	$query_sanpham = ("SELECT idSP,TenSP, MoTa, HinhAnh, DonGia, BaoHanh, NgayCapNhat, SoLuongTonKho FROM sanpham 
				WHERE TenSP LIKE '%$tensp%' LIMIT $start,$limit");
	$thongbao=" với từ khóa $tensp";			
}
elseif($tensp!="Nhập tên..." and $idCL!="" and $idLoaiSP!="" and $gia1=="" and $gia2=="")
{
	//echo "Tim ten va chungloai,loaisanpham";
	$count=mysql_num_rows(mysql_query("SELECT idSP,TenSP, MoTa, HinhAnh, DonGia, BaoHanh, 		NgayCapNhat, SoLuongTonKho FROM sanpham 
				WHERE TenSP LIKE '%$tensp%' AND idCL=$idCL AND idLoaiSP=$idLoaiSP"));	
	$query_sanpham = ("SELECT idSP,TenSP, MoTa, HinhAnh, DonGia, BaoHanh, NgayCapNhat, 	SoLuongTonKho FROM sanpham 
				WHERE TenSP LIKE '%$tensp%' AND idCL=$idCL AND idLoaiSP=$idLoaiSP LIMIT $start,$limit");
	//$thongbao=" với từ khóa $tensp";
}
elseif($tensp!="Nhập tên..." and $idCL!="" and $idLoaiSP!="" and $gia1!="" and $gia2!="") 
{
	//echo "Tim ten,chungloai,loaisanpham,gia1,gia2";
	$count=mysql_num_rows(mysql_query("SELECT idSP,TenSP, MoTa, HinhAnh, DonGia, BaoHanh, NgayCapNhat, SoLuongTonKho FROM sanpham 
				WHERE TenSP LIKE '%$tensp%' AND idCL=$idCL AND idLoaiSP=$idLoaiSP AND DonGia BETWEEN $gia1 AND $gia2"));	
	$query_sanpham = ("SELECT idSP,TenSP, MoTa, HinhAnh, DonGia, BaoHanh, NgayCapNhat, SoLuongTonKho FROM sanpham 
				WHERE TenSP LIKE '%$tensp%' AND idCL=$idCL AND idLoaiSP=$idLoaiSP AND DonGia BETWEEN $gia1 AND $gia2 LIMIT $start,$limit");
}
elseif($tensp=="Nhập tên..." and $idCL!="" and $idLoaiSP!="" and $gia1=="" and $gia2=="") 
{
	//echo "Tim chungloai,loaisanpham";
	$count=mysql_num_rows(mysql_query("SELECT idSP,TenSP, MoTa, HinhAnh, DonGia, BaoHanh, NgayCapNhat, SoLuongTonKho FROM sanpham 
				WHERE idCL=$idCL AND idLoaiSP=$idLoaiSP"));
	$query_sanpham = ("SELECT idSP,TenSP, MoTa, HinhAnh, DonGia, BaoHanh, NgayCapNhat, SoLuongTonKho FROM sanpham 
				WHERE idCL=$idCL AND idLoaiSP=$idLoaiSP LIMIT $start,$limit");
}
elseif($tensp=="Nhập tên..." and $idCL=="" and $idLoaiSP=="" and $gia1!="" and $gia2!="") 
{
	$count=mysql_num_rows(mysql_query("SELECT idSP,TenSP, MoTa, HinhAnh, DonGia, BaoHanh, NgayCapNhat, SoLuongTonKho FROM sanpham 
				WHERE DonGia BETWEEN $gia1 AND $gia2"));
	$query_sanpham = ("SELECT idSP,TenSP, MoTa, HinhAnh, DonGia, BaoHanh, NgayCapNhat, SoLuongTonKho FROM sanpham 
				WHERE DonGia BETWEEN $gia1 AND $gia2 ORDER BY DonGia DESC LIMIT $start,$limit ");
	$thongbao=" với giá từ $gia1 đến $gia2";
}
elseif($tensp=="Nhập tên..." and $idCL!="" and $idLoaiSP!="" and $gia1!="" and $gia2!="")
{
	//echo "Tim chungloai,loaisanpham,gia1,gia2";
	$count=mysql_num_rows(mysql_query("SELECT idSP,TenSP, MoTa, HinhAnh, DonGia, BaoHanh, NgayCapNhat, SoLuongTonKho FROM sanpham 
				WHERE idCL=$idCL AND idLoaiSP=$idLoaiSP AND DonGia BETWEEN $gia1 AND $gia2"));
	$query_sanpham = ("SELECT idSP,TenSP, MoTa, HinhAnh, DonGia, BaoHanh, NgayCapNhat, SoLuongTonKho FROM sanpham 
				WHERE idCL=$idCL AND idLoaiSP=$idLoaiSP AND DonGia BETWEEN $gia1 AND $gia2 LIMIT $start,$limit");
}
elseif($tensp!="Nhập tên..." and $idCL=="" and $idLoaiSP=="" and $gia1!="" and $gia2!="")
{
	//echo "Tim chungloai,loaisanpham,gia1,gia2";
	$count=mysql_num_rows(mysql_query("SELECT idSP,TenSP, MoTa, HinhAnh, DonGia, BaoHanh, NgayCapNhat, SoLuongTonKho FROM sanpham 
				WHERE TenSP LIKE '%$tensp%' AND DonGia BETWEEN $gia1 AND $gia2"));
	$query_sanpham = ("SELECT idSP,TenSP, MoTa, HinhAnh, DonGia, BaoHanh, NgayCapNhat, SoLuongTonKho FROM sanpham 
				WHERE TenSP LIKE '%$tensp%' AND DonGia BETWEEN $gia1 AND $gia2 LIMIT $start,$limit");
}
else 
{
	echo "<script type='text/javascript'>alert('Khôngthực hiện được !!!');window.location='".$_SERVER['HTTP_REFERER']."'</script>";
}
$sanpham = mysql_query($query_sanpham, $config) or die(mysql_error());
$row_sanpham = mysql_fetch_assoc($sanpham);
$totalRows_sanpham = mysql_num_rows($sanpham);
$pages = $p->findPages($count, $limit);	
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/content.css" rel="stylesheet" type="text/css" />
<div class="khung">
<table width="600px" border="0" align="center" cellpadding="0" cellspacing="0">   
<?php if($totalRows_sanpham!=0){?>
<tr>
<td class="thanhthongtin" colspan="3" align="center">Tìm được :<?php echo $totalRows_sanpham ." / ".$count;?>  sản phẩm </td>
</tr>
<tr class="phansanpham">
<?php $n=0;do { ?>
  <?php if($n%3==0)echo "<tr class='phansanpham'>";$n++;?>
		<td align="center"><fieldset>
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
            <a class="chitiet" href="index.php?mod=chitietsp&idSP=<?php echo $row_sanpham['idSP'];?>" title="Chi tiết <?php echo $row_sanpham['TenSP'];?>">Chi tiết>></a>
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
	<?php if($n%3==0) echo "</tr>";	
		}
	while($row_sanpham = mysql_fetch_assoc($sanpham));
?>
</tr>
 <tr>
  	<td colspan="3" align="center"><?php $pagelist = $p->pageList($_GET['page'], $pages);echo $pagelist;?></td>
  </tr>
 <?php }else { ?>
 <tr>
<td class="thanhthongtin" colspan="3" align="center">Không tìm được dữ liệu yêu cầu</td>
</tr>
 <?php }?> 
</table>
</div>