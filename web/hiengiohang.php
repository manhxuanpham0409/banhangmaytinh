<?php require_once('Connections/config.php'); ?>
<?php
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

$currentPage = $_SERVER["PHP_SELF"];

$maxRows_gh = 5;
$pageNum_gh = 0;
if (isset($_GET['pageNum_gh'])) {
  $pageNum_gh = $_GET['pageNum_gh'];
}
$startRow_gh = $pageNum_gh * $maxRows_gh;

$colname_gh = "-1";
if (isset($_SESSION['kt_login_id'])) {
  $colname_gh = $_SESSION['kt_login_id'];
}
mysql_select_db($database_config, $config);
$query_gh = sprintf("SELECT luugiohang.idSP as idSP ,TenSP,SL,DonGia as TongTien,HinhAnh,DonGia FROM sanpham,luugiohang WHERE sanpham.idSP=luugiohang.idSP AND luugiohang.iduser=%s ORDER BY idGH DESC", GetSQLValueString($colname_gh, "int"));
$query_limit_gh = sprintf("%s LIMIT %d, %d", $query_gh, $startRow_gh, $maxRows_gh);
$gh = mysql_query($query_limit_gh, $config) or die(mysql_error());
$row_gh = mysql_fetch_assoc($gh);

if (isset($_GET['totalRows_gh'])) {
  $totalRows_gh = $_GET['totalRows_gh'];
} else {
  $all_gh = mysql_query($query_gh);
  $totalRows_gh = mysql_num_rows($all_gh);
}
$totalPages_gh = ceil($totalRows_gh/$maxRows_gh)-1;

$queryString_gh = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_gh") == false && 
        stristr($param, "totalRows_gh") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_gh = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_gh = sprintf("&totalRows_gh=%d%s", $totalRows_gh, $queryString_gh);

$TFM_LimitLinksEndCount = 10;
$TFM_temp = $pageNum_gh + 1;
$TFM_startLink = max(1,$TFM_temp - intval($TFM_LimitLinksEndCount/2));
$TFM_temp = $TFM_startLink + $TFM_LimitLinksEndCount - 1;
$TFM_endLink = min($TFM_temp, $totalPages_gh + 1);
if($TFM_endLink != $TFM_temp) $TFM_startLink = max(1,$TFM_endLink - $TFM_LimitLinksEndCount + 1);
?>
<table width="170px" border="0" cellspacing="0" cellpadding="0">
 <tr>
 <td width="88" align="center" class="chitiet">SẢN PHẨM</td> 
 <td width="40" align="center" class="chitiet">SL</td> 
 <td width="48" align="center" class="chitiet">$</td>
 </tr>
<?php if($totalRows_gh!=0){?>
<?php do { ?>
<?php 
 $tt=$row_gh['SL']*$row_gh['DonGia'];
 $tongtien=$tongtien+$tt;
 $tongsl=$tongsl+$row_gh['SL']; 
 ?>
 <tr>
 <td class="ngaycapnhat" id="gach" style="padding-left:5px;"><a href="index.php?mod=chitietsp&idSP=<?php echo $row_gh['idSP'];?>"><img src="upload/<?php echo $row_gh['HinhAnh'];?>" width="30" height="30" border="0" alt="<?php echo $row_gh['TenSP'];?>"/></a></td>
 <td align="center" class="ngaycapnhat" id="gach"><?php echo $row_gh['SL'];?></td>
 <td align="right" class="ngaycapnhat" id="gach"><?php echo number_format($tt,0,',','.');?></td>
 </tr>
<?php } while ($row_gh = mysql_fetch_assoc($gh)); ?>
<?php }?>
<tr>
 <td class="ngaycapnhat" style="padding-left:5px;">TỔNG TIỀN</td>
 <td align="center" class="ngaycapnhat"><?php echo $tongsl;?></td>
 <td align="center" class="ngaycapnhat"><?php echo number_format($tongtien,0,',','.');?></td>
 </tr>
 <?php if($_SESSION['kt_login_id']!="" and $totalRows_gh!=0){?>
  <tr>
   <td colspan="3" align="center" class="chitiet"><a href="index.php?mod=xemhoadon" class="chitiet">Xem hóa đơn</a></td>
 </tr>
 <tr>
 <td colspan="3" align="center" class="chitiet">Trang : 
     <?php
for ($i = $TFM_startLink; $i <= $TFM_endLink; $i++) {
  $TFM_LimitPageEndCount = $i -1;
  if($TFM_LimitPageEndCount != $pageNum_gh) {
    printf('<a href="'."%s?pageNum_gh=%d%s", $currentPage, $TFM_LimitPageEndCount, $queryString_gh.'">');
    echo "$i</a>";
  }else{
    echo "<strong class='chitiet'>$i</strong>";
  }
if($i != $TFM_endLink) echo(" ][ ");}
?></td>
 </tr>
 <?php }?>
 </table> 
<?php
mysql_free_result($gh);
?>
