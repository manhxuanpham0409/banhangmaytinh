<?php require_once('../Connections/config.php'); ?>
<?php
// Load the common classes
require_once('../includes/common/KT_common.php');

// Load the tNG classes
require_once('../includes/tng/tNG.inc.php');

// Make a transaction dispatcher instance
$tNGs = new tNG_dispatcher("../");

// Make unified connection variable
$conn_config = new KT_connection($config, $database_config);

if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? "'" . doubleval($theValue) . "'" : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

mysql_select_db($database_config, $config);
$query_master1nhomchucnang = "SELECT * FROM nhomchucnang ORDER BY TenCN";
$master1nhomchucnang = mysql_query($query_master1nhomchucnang, $config) or die(mysql_error());
$row_master1nhomchucnang = mysql_fetch_assoc($master1nhomchucnang);
$totalRows_master1nhomchucnang = mysql_num_rows($master1nhomchucnang);

mysql_select_db($database_config, $config);
$query_detail2chucnang = "SELECT idCN, TenCN FROM chucnang WHERE idNhomCN = 123456789 ORDER BY TenCN ASC";
$detail2chucnang = mysql_query($query_detail2chucnang, $config) or die(mysql_error());
$row_detail2chucnang = mysql_fetch_assoc($detail2chucnang);
$totalRows_detail2chucnang = mysql_num_rows($detail2chucnang);

// Make a logout transaction instance
$logoutTransaction = new tNG_logoutTransaction($conn_config);
$tNGs->addTransaction($logoutTransaction);
// Register triggers
$logoutTransaction->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "GET", "KT_logout_now");
$logoutTransaction->registerTrigger("END", "Trigger_Default_Redirect", 99, "index.php");
// Add columns
// End of logout transaction instance

// Execute all the registered transactions
$tNGs->executeTransactions();

// Get the transaction recordset
$rscustom = $tNGs->getRecordset("custom");
$row_rscustom = mysql_fetch_assoc($rscustom);
$totalRows_rscustom = mysql_num_rows($rscustom);
?>
<?php if($_SESSION['kt_login_id']) {?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Adminitrator</title>
<link href="css/myadmin.css" rel="stylesheet" type="text/css" />
<link type="text/css" rel="stylesheet" href="css/global.css"  />
<link type="text/css" rel="stylesheet" href="css/main.css"  />
<link href="css/menu.css" rel="stylesheet" type="text/css" />
<link href="../includes/skins/mxkollection3.css" rel="stylesheet" type="text/css" media="all" />
<script src="../includes/common/js/base.js" type="text/javascript"></script>
<script src="../includes/common/js/utility.js" type="text/javascript"></script>
<script src="../includes/skins/style.js" type="text/javascript"></script>
<script type="text/javascript" src="js/lib/jquery-core.js"></script>
<script type="text/javascript" src="js/menu.js"></script>
</head>

<body>
<div class="admin">
    		<h2 align="left"><?php echo "Ng?????i qu???n tr??? : ".$_SESSION['kt_HoTen'];?></h2>
    <div class="MenuWrapper02">
    	<div class="MenuWrapper">
            <ul id="menu">
                          <li class="First"><a href="star_computer.php" title="Trang ch??nh"  class="Active Hover"><span class="LeftBg"><span class="RightBg">Trang ch???</span></span></a></li>
                	<ul>
                    	<li class="FirstItem">
                        <marquee behavior="slide" align="middle" direction="right" width="600" loop="-1">
                        C??ng ty c??? ph???n d???ch v??? Star computer</marquee>
                        </li>
                    </ul>
                
                <li><a href="#" title="Qu???n l??" ><span class="LeftBg"><span class="RightBg">Qu???n l??</span></span></a>
                	<ul>
                        <li class="FirstItem"><a href="star_computer.php?opt=user">Qu???n l?? user</a></li>
                        <li><a href="star_computer.php?opt=hangsanxuat" title="Qu???n l?? h??ng s???n xu???t">Qu???n l?? h??ng s???n xu???t</a></li>
                        <li><a href="star_computer.php?opt=chungloai" title="Qu???n l?? ch???ng lo???i">Qu???n l?? ch???ng lo???i</a></li>
                        <li><a href="star_computer.php?opt=loaisp" title="Qu???n l?? lo???i s???n ph???m">Qu???n l?? lo???i s???n ph???m</a></li>
                        <li><a href="star_computer.php?opt=sanpham" title="Qu???n l?? S???n ph???m">Qu???n l?? s???n ph???m</a></li>
                        <li><a href="star_computer.php?opt=menu" title="Qu???n l?? menu">Qu???n l?? menu</a></li>
                    </ul>
                </li>
          
                <li><a href="#" title="Qu???ng c??o"><span class="LeftBg"><span class="RightBg">Qu???ng c??o</span></span></a>
                	<ul>
                        <li class="FirstItem"><a href="star_computer.php?opt=quangcao" title="Qu???ng c??o">Qu???ng c??o</a></li>
                        <li ><a href="star_computer.php?opt=dangquangcao" title="????ng qu???ng c??o">????ng qu???ng c??o</a>
                       <!--<a href="" title="">Qu???n l?? S???n ph???m</a></li>
                       <li>  <li><a href="#" title="Th???i trang">Th???i trang</a></li>
                        <li><a href="#" title="L??m ?????p">L??m ?????p</a></li>
                        <li><a href="#" title="T??nh y??u">T??nh y??u</a></li>
                        <li><a href="#" title="Du h???c">Du h???c</a></li>-->
                    </ul>                    
                </li>
       <li><a href="#" title="B??i vi???t"><span class="LeftBg"><span class="RightBg">B??i vi???t</span></span></a>  
       <ul>
       <li class="FirstItem"><a href="star_computer.php?opt=chucnang" title="Hi???n th??? c??c b??i vi???t">Hi???n th??? c??c b??i vi???t</a></li>
       </ul>
                    
           

  <?php do { ?>      
<li> 
   <a href="#" title="<?php echo $row_master1nhomchucnang['TenCN']; ?>" ><span class="LeftBg">
   	<span class="RightBg"><?php echo $row_master1nhomchucnang['TenCN']; ?></span></span>
   </a>
 <ul>    
   <?php
  if ($totalRows_master1nhomchucnang>0) 
  {
    $nested_query_detail2chucnang = str_replace("123456789", $row_master1nhomchucnang['idNhomCN'], $query_detail2chucnang);
    mysql_select_db($database_config);
    $detail2chucnang = mysql_query($nested_query_detail2chucnang, $config) or die(mysql_error());
    $row_detail2chucnang = mysql_fetch_assoc($detail2chucnang);
    $totalRows_detail2chucnang = mysql_num_rows($detail2chucnang);
    $nested_sw = false;
    if (isset($row_detail2chucnang) && is_array($row_detail2chucnang)) 
	{
	do 
	{ //Nested repeat ?>
    	<li class="FirstItem">
        <a href="star_computer.php?opt=chucnangEdit&idCN=<?php echo $row_detail2chucnang['idCN']; ?>" title="<?php echo $row_detail2chucnang['TenCN']; ?>"><?php echo $row_detail2chucnang['TenCN']; ?>
        </a></li>
      
	<?php
	} while ($row_detail2chucnang = mysql_fetch_assoc($detail2chucnang)); //Nested move next
    }
  }
?>
</ul></li>
<?php } while ($row_master1nhomchucnang = mysql_fetch_assoc($master1nhomchucnang)); ?>      

<!----> 
<li><a href="#" title="Vi???c l??m" ><span class="LeftBg"><span class="RightBg">Qu???n l?? hi???n th???</span></span></a>
<ul>
<li class="FirstItem"><a href="star_computer.php?opt=hienthisomautin" title="Hi???n th??? s??? m???u tin">Hi???n th??? s??? m???u tin</a></li>
<!-- <li><a href="#" title="H???c ???????ng">H???c ???????ng</a></li>-->
</ul>
</li>

<!---->
  <li><a href="<?php echo $logoutTransaction->getLogoutLink(); ?>" title="Logout"><span class="LeftBg"><span class="RightBg">Tho??t</span></span></a>  
</ul>
<!---->
<div class="content">
                <?php  switch($_GET['opt'])
                    {
                        case user:include("user.php");break;
                        case userEdit:include("userEdit.php");break;
                        case hangsanxuat:include("hangsanxuat.php");break;
                        case hangsanxuatEdit:include("hangsanxuatEdit.php");break;
                        case chungloai:include("chungloai.php");break;
                        case chungloaiEdit:include("chungloaiEdit.php");break;
                        case loaisp:include("loaisp.php");break;
                        case sanpham:include("sanpham.php");break;
                        case sanphamEdit:include("sanphamEdit.php");break;
                        case chungloai:include("chungloai.php");break;
                        case loaisp:include("loaisp.php");break;
                        case loaispEdit:include("loaispEdit.php");break;
                        case dangquangcao:include("quangcaoEdit.php");break;
                        case quangcao:include("quangcao.php");break;
                        case quangcaoEdit:include("quangcaoEdit.php");break;
                        case chucnangEdit:include("chucnangEdit.php");break;
                        case chucnang:include("chucnang.php");break;
                        case hienthisomautin:include("hienthisomautin.php");break;
                        case hienthisomautinEdit:include("hienthisomautinEdit.php");break;
                        case menu:include("menu.php");break;
                        case menuEdit:include("menuEdit.php");break;
                        default:echo "<img src='../images/banner.png'/>";break;
                        
                    }
             ?>
         </div>
</div>
</div> 
</div>                         
</body>

	<!-- JS Library -->
    	<script type="text/javascript" src="js/lib/jquery-core.js"></script>
        <script type="text/javascript" src="js/menu.js"></script>
    <!-- End. JS Library -->

    <!-- Page Scripts -->
		
    <!-- End. Page Scripts -->
</html>
<?php
mysql_free_result($master1nhomchucnang);
mysql_free_result($detail2chucnang);
} else { ?>
<script>
var s=5; 
setTimeout("document.location='index.php'", s *1000); 
setInterval("document.getElementById('sogiay').innerHTML=s--",1000);
</script> 
<center>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<p>????ng nh???p kh??ng th??nh c??ng!<a href='index.php'>login</a></p>
<P>S??? quay l???i sau <span id="sogiay"></span> &nbsp;gi??y n???a
</center> 
<?php }?>
