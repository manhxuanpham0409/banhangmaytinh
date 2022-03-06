<?php require_once('Connections/config.php'); ?>
<?php
$danhmuckhac=mysql_query("SELECT idCN,TenCN,urlHinh FROM chucnang WHERE AnHien=1 AND idNhomCN=3 ORDER BY TenCN ASC");
$row_danhmuckhac=mysql_fetch_assoc($danhmuckhac);
?>
<script type="text/javascript" src="js/dropdowncontent.js"></script>
<link href="css/star_computer.css" rel="stylesheet" type="text/css" />
<div class="khungchinh">
<div id="giohang">
<fieldset><legend><img src="images/giohang.gif" /><?php if($_SESSION['kt_login_id']!="") echo " Chào ".$_SESSION['kt_HoTen'];?></legend>
    <?php
    	$id=$_SESSION['kt_login_id'];
		if($_SESSION['kt_login_id']=="") echo "Bạn chưa đăng nhập";
		else
		 {
		 	
			$sl=(mysql_query("SELECT sum(SL) as SL FROM luugiohang WHERE iduser=$id GROUP BY iduser"));	
			$row_sl=mysql_fetch_assoc($sl);
			echo "Bạn đã chọn <span style='color:#FF0000'> ".$row_sl['SL']." </span> sản phẩm</br>";
			echo "<a href='index.php?mod=xemgiohang' class='dangki'>Xem giỏ hàng</a>";
		}	
	?>    
</fieldset>
  <!--Tim kiem san pham-->
<p><a href="#" class="text2" id="searchlink" rel="subcontent">Tìm kiếm</a></p>
<DIV id="subcontent" style="position:absolute; visibility: hidden; border: 9px solid blue; background-image:url(Administrator/images/banner.png); background-color:#999999; width: 408px; height:120px; padding: 8px;">
<?php require_once('timkiem.php'); ?>
</DIV>
</div>
<!--Phan gio hang-->
<?php
$menu=@mysql_query("SELECT url,id,Ten FROM menu WHERE AnHien=1 ");
$row_menu=mysql_fetch_assoc($menu);
$chucnang=@mysql_query("SELECT idCN FROM chucnang WHERE AnHien=1 ");
$row_chucnang=mysql_fetch_assoc($chucnang);
?>
<?php
if(isset($_GET['tensp'])) include"sanpham.php";
else
{
	if(isset($_GET['mod'])) //Neu chon cac chuc nang cua trang web
	{
		switch($_GET['mod'])
		{
			case hangsx:include"hangsx.php";break;
			case sanpham:include"sanpham.php";break;
			case chitietsp:include"chitietsp.php";break;
			case timkiem:include"timkiem.php";break;
			case tintuc:include"tintuc.php";break;
			case dangki:include"dangki.php";break;
			case xemgiohang: include"xemgiohang.php";break;
			case dangnhap:include"dangnhap.php";break;
			case doithongtin:include"doithongtin.php";break;
			case xemhoadon:include"xemhoadon.php";break;
			case dangki:include "dangki.php";break;
			case searchnangcao:include"search.php";break;
			default: include("home.php");break;		
			
		}
	}
	if(isset($_GET['idmenu'])) //Neu chon cac menu cua trang web
	{	
			 do{
				
				$url=$row_menu['url'];
				$idmenu=$_GET['idmenu'];
				if($idmenu==$row_menu['id']) include("$url");
				
			  }
			while($row_menu=mysql_fetch_assoc($menu));
	
	}
	if(isset($_GET['idCN'])) //Neu chon cac menu cua trang web
	{	
			 do{				
				$url=$row_chucnang['url'];
				$idCN=$_GET['idCN'];
				if($idCN==$row_chucnang['idCN']) include("chucnang.php");				
			  }
			while($row_chucnang=mysql_fetch_assoc($chucnang));
	
	}
	if(!isset($_GET['mod'])&& !isset($_GET['idmenu']) && !isset($_GET['idCN']))
	{
		include"home.php";
	}	 
}
?>
<div id="danhmuckhac">
	<div id="chucnangkhac">DANH MỤC KHÁC...</div>
    <?php if(mysql_num_rows($danhmuckhac)!=0) {do{?>    
    <div id="danhmuccon"><img src="images/<?php echo $row_danhmuckhac['urlHinh'];?>" hspace=5/><a class="link" href="index.php?idCN=<?php echo $row_danhmuckhac['idCN'];?>"><?php echo $row_danhmuckhac['TenCN'];?></a></div>
    <?php }while($row_danhmuckhac=mysql_fetch_assoc($danhmuckhac));}?> 
    <!--footer-->
</div>
<script type="text/javascript">dropdowncontent.init("searchlink", "left-bottom", 500, "mouseover")</script>
</div>
