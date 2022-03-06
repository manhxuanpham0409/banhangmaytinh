<?php require_once('Connections/config.php'); ?>
<?php  

// Code này được tải từ : www.sharecode.org 


/*chung loai*/
$chungloai=mysql_query("SELECT idCL,TenCL FROM chungloai WHERE AnHien=1 AND LinhTinh=0 ORDER BY TenCL ASC");
$row_chungloai=mysql_fetch_assoc($chungloai);
/*hang san xuat*/
$hang_sx=mysql_query("SELECT idHang,Ten FROM hangsx WHERE AnHien=1 ORDER BY Ten ASC LIMIT 0,10");
$row_hang_sx=mysql_fetch_assoc($hang_sx);
/*linh tinh*/
$linhtinh=mysql_query("SELECT idCL,TenCL FROM chungloai WHERE AnHien=1 AND LinhTinh=1 ORDER BY TenCL ASC");
$row_linhtinh=mysql_fetch_assoc($linhtinh);
/*Ho tro*/
$hotro=mysql_query("SELECT idCN,TenCN,urlHinh FROM chucnang WHERE AnHien=1 AND idNhomCN=1 ORDER BY TenCN ASC");
$row_hotro=mysql_fetch_assoc($hotro);
/*Giai tri*/
$giaitri=mysql_query("SELECT idCN,TenCN,urlHinh FROM chucnang WHERE AnHien=1 AND idNhomCN=2 ORDER BY TenCN ASC");
$row_giaitri=mysql_fetch_assoc($giaitri);
?>
<link href="css/star_computer.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery-1.2.2.pack.js"></script>
<script type="text/javascript" src="js/ddaccordion.js">


/***********************************************
* Accordion Content script- (c) Dynamic Drive DHTML code library (www.dynamicdrive.com)
* Visit http://www.dynamicDrive.com for hundreds of DHTML scripts
* This notice must stay intact for legal use
***********************************************/

</script>
<script type="text/javascript">
ddaccordion.init({
	headerclass: "submenuheader", //Shared CSS class name of headers group
	contentclass: "submenu", //Shared CSS class name of contents group
	revealtype: "click", //Reveal content when user clicks or onmouseover the header? Valid value: "click" or "mouseover
	collapseprev: true, //Collapse previous content (so only one open at any time)? true/false 
	defaultexpanded: [], //index of content(s) open by default [index1, index2, etc] [] denotes no content
	onemustopen: false, //Specify whether at least one header should be open always (so never all headers closed)
	animatedefault: false, //Should contents open by default be animated into view?
	persiststate: true, //persist state of opened contents within browser session?
	toggleclass: ["", ""], //Two CSS classes to be applied to the header when it's collapsed and expanded, respectively ["class1", "class2"]
	togglehtml: ["suffix", "<img src='images/plus.gif' class='statusicon' />", "<img src='images/minus.gif' class='statusicon' />"], //Additional HTML added to the header when it's collapsed and expanded, respectively  ["position", "html1", "html2"] (see docs)
	animatespeed: "normal", //speed of animation: "fast", "normal", or "slow"
	oninit:function(headers, expandedindices){ //custom code to run when headers have initalized
		//do nothing
	},
	onopenclose:function(header, index, state, isuseractivated){ //custom code to run whenever a header is opened or closed
		//do nothing
	}
})
</script>
<style type="text/css">
.glossymenu{
margin: 0px;
padding: 0;
width: 135px; /*width of menu*/
border: 1px solid #9A9A9A;
}
.glossymenu a.menuitem{
background: black url(images/glossyback.gif) repeat-x bottom left;
font: bold 11px Arial, Helvetica, sans-serif;
color: white;
display: block;
position: relative; /*To help in the anchoring of the ".statusicon" icon image*/
width: auto;
padding: 7px 0;
padding-left: 10px;
text-decoration: none;
}
.glossymenu a.menuitem:visited, .glossymenu .menuitem:active{
color: white;
}
.glossymenu a.menuitem .statusicon{ /*CSS for icon image that gets dynamically added to headers*/
position: absolute;
top: 5px;
right: 5px;
border: none;
}

.glossymenu a.menuitem:hover{
background-image: url(images/bgfooter.gif);
}

.glossymenu div.submenu{ /*DIV that contains each sub menu*/
background: white;
}

.glossymenu div.submenu ul{ /*UL of each sub menu*/
list-style-type: none;
margin: 0;
padding: 0;
}

.glossymenu div.submenu ul li{
border-bottom: 1px solid #CCCCCC;
height:25px;
max-height:25px;
}

.glossymenu div.submenu ul li a{
display: block;
font: normal 13px Arial, Helvetica, sans-serif;
color: black;
text-decoration: none;
padding: 5px 0;
padding-left: 10px;
}

.glossymenu div.submenu ul li a:hover{
background: #DFDCCB;
colorz: white;
}
</style>
<div id="left">
<!--Hang san xuat-->
<div id="hangsanxuat">
 <span id="titlehangsanxuat">HÃNG SẢN XUẤT</span>
   <?php if(mysql_num_rows($hang_sx)!=0) {do{?>    
    <div id="name"><img src="images/pointer_green.gif" width="16" height="9"/>
    <a class="linktrai" href="index.php?mod=sanpham&idHang=<?php echo $row_hang_sx['idHang'];?>">
    	<?php echo $row_hang_sx['Ten']."&nbsp;";?>
    </a>
    </div>
    <?php }while($row_hang_sx=mysql_fetch_assoc($hang_sx));} ?>
</div>
<!--Ket thuc hang san xuat-->
<!--chung loai-->
<div id="hangsanxuat"><span id="titlehangsanxuat">CHỦNG LOẠI</span></div>
<div class="glossymenu" style="float:left">
	<?php do {?>
	 <a class="menuitem submenuheader" href="#"><?php echo $row_chungloai['TenCL'];?></a>
     <div class="submenu">
        <ul>
        	<?php   
			$idchungloai = $row_chungloai['idCL'];
			$loaisp=mysql_query("SELECT distinct c.idLoaiSP as idLoaiSP,Ten
FROM chungloai a, loaisp b, sanpham c
WHERE a.idCL = c.idCL
AND c.idLoaiSP = b.idLoaiSP AND c.idCL=$idchungloai AND c.AnHien=1 ORDER BY Ten ASC");
            $row_loaisp=mysql_fetch_assoc($loaisp);
			$total_loaisp=mysql_num_rows($loaisp);?>
			<?php if($total_loaisp!=0){do{ ?>
              <li>
              <a href="index.php?mod=sanpham&idCL=<?php echo $row_chungloai['idCL'];?>&idloaisp=<?php echo $row_loaisp['idLoaiSP'];?>">
			  <?php echo $row_loaisp['Ten'];?>
              </a>
              </li>
              <?php }while($row_loaisp=mysql_fetch_assoc($loaisp));?>
            <?php }//end if?>  
        </ul>
      </div>
    <?php }while($row_chungloai=mysql_fetch_assoc($chungloai));?>
</div>
<!--Ket thuc chung loai-->
<!--/*Ho tro */-->
<div id="hangsanxuat">
<div id="titlehangsanxuat">HỖ TRỢ</div>
 <?php do{?>    
    <div id="name"><img src="images/<?php echo $row_hotro['urlHinh'];?>" width="16" height="9"/>
  <a class="linktrai" href="index.php?idCN=<?php echo $row_hotro['idCN'];?>">
  <?php echo $row_hotro['TenCN']."&nbsp;";?></a></div>
  <?php }while($row_hotro=mysql_fetch_assoc($hotro));?>
</div>
<!--Ket thuc ho tro-->

<!--Giai tri-->
<div id="hangsanxuat">
<div id="titlehangsanxuat">GIẢI TRÍ</div>
<?php do{?>    
  <div id="name"><img src="images/<?php echo $row_giaitri['urlHinh'];?>" width="16" height="9"/>
  <a class="linktrai" href="index.php?idCN=<?php echo $row_giaitri['idCN'];?>">
  	<?php echo $row_giaitri['TenCN']."&nbsp;";?>
  </a>
  </div>
<?php }while($row_giaitri=mysql_fetch_assoc($giaitri));?>
</div>
<!--Ket thuc giai tri-->

<!--Thong ke -->
<div id="hangsanxuat">
<div id="titlehangsanxuat">THỐNG KÊ</div>
	<div id="name">&nbsp;Lượt truy cập : <?php require_once('Hitcounter/counter.php');?></div>
    <div id="name">&nbsp;Online  : <?php require_once('usersonline/onlinesql.php');?></div>    
</div>
<!--Ket thuc thong ke-->
</div>
