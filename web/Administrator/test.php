<?php require_once('../Connections/config.php'); ?>
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

mysql_select_db($database_config, $config);
$query_master1nhomchucnang = "SELECT * FROM nhomchucnang ORDER BY TenCN";
$master1nhomchucnang = mysql_query($query_master1nhomchucnang, $config) or die(mysql_error());
$row_master1nhomchucnang = mysql_fetch_assoc($master1nhomchucnang);
$totalRows_master1nhomchucnang = mysql_num_rows($master1nhomchucnang);

mysql_select_db($database_config, $config);
$query_detail2chucnang = "SELECT * FROM chucnang WHERE idNhomCN=123456789 ORDER BY TenCN";
$detail2chucnang = mysql_query($query_detail2chucnang, $config) or die(mysql_error());
$row_detail2chucnang = mysql_fetch_assoc($detail2chucnang);
$totalRows_detail2chucnang = mysql_num_rows($detail2chucnang);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<table border="1">
  <?php do { ?>
    <tr>
      <td><b><?php echo $row_master1nhomchucnang['TenCN']; ?></b></td>
    </tr>
    <?php
  if ($totalRows_master1nhomchucnang>0) {
    $nested_query_detail2chucnang = str_replace("123456789", $row_master1nhomchucnang['idNhomCN'], $query_detail2chucnang);
    mysql_select_db($database_config);
    $detail2chucnang = mysql_query($nested_query_detail2chucnang, $config) or die(mysql_error());
    $row_detail2chucnang = mysql_fetch_assoc($detail2chucnang);
    $totalRows_detail2chucnang = mysql_num_rows($detail2chucnang);
    $nested_sw = false;
    if (isset($row_detail2chucnang) && is_array($row_detail2chucnang)) {
      do { //Nested repeat
?>
      <tr>
        <td>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row_detail2chucnang['TenCN']; ?></td>
      </tr>
      <?php
      } while ($row_detail2chucnang = mysql_fetch_assoc($detail2chucnang)); //Nested move next
    }
  }
?>
    <?php } while ($row_master1nhomchucnang = mysql_fetch_assoc($master1nhomchucnang)); ?>
</table>
</body>
</html>
<?php
mysql_free_result($master1nhomchucnang);

mysql_free_result($detail2chucnang);
?>
