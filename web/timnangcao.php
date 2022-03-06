<?php require_once('Connections/config.php'); ?>
<?php
//MX Widgets3 include
require_once('includes/wdg/WDG.php');

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
$query_Recordset1 = "SELECT  idCL, TenCL FROM chungloai ORDER BY TenCL";
$Recordset1 = mysql_query($query_Recordset1, $config) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);

mysql_select_db($database_config, $config);
$query_Recordset2 = "SELECT  idLoaiSP, idCL, Ten FROM loaisp ORDER BY Ten";
$Recordset2 = mysql_query($query_Recordset2, $config) or die(mysql_error());
$row_Recordset2 = mysql_fetch_assoc($Recordset2);
$totalRows_Recordset2 = mysql_num_rows($Recordset2);
?>
<style type="text/css">
<!--
.style2 {
	font-size: 18px
}
#form2 .KT_tngtable1 .KT_th #timnangcao {
}
-->
</style>
<script src="includes/common/js/base.js" type="text/javascript"></script>
<script src="includes/common/js/utility.js" type="text/javascript"></script>
<script type="text/javascript" src="includes/common/js/sigslot_core.js"></script>
<script type="text/javascript" src="includes/wdg/classes/MXWidgets.js"></script>
<script type="text/javascript" src="includes/wdg/classes/MXWidgets.js.php"></script>
<script type="text/javascript" src="includes/wdg/classes/JSRecordset.js"></script>
<script type="text/javascript" src="includes/wdg/classes/DependentDropdown.js"></script>
<?php
//begin JSRecordset
$jsObject_Recordset2 = new WDG_JsRecordset("Recordset2");
echo $jsObject_Recordset2->getOutput();
//end JSRecordset
?>
<link href="includes/skins/arktic/tng.css" rel="stylesheet" type="text/css">
<form action="display_search.php" method="get" name="form2" id="form2">
<table width="167" class="KT_tngtable1" align="center">
<tr>
	<td class="KT_th">Tên : </td>
    <td class="KT_th"><label>
      <input name="tensp" type="text" id="texttim" value="<?php if(!$_GET['tensp']) echo "Nhập tên...";echo $_GET['tensp'];?>" size="15"  onclick="if(value=='Nhập tên...') value=''" onBlur="if(value=='') value='Nhập tên...';" />
    </label></td>
</tr>

<tr>
<td class="KT_th">Chủng loại : </td>
<td class="KT_th">
    <select name="select" id="select">
     <option value=""></option>
      <?php
do {  
?>
      <option value="<?php echo $row_Recordset1['idCL']?>"><?php echo $row_Recordset1['TenCL']?></option>
      <?php
} while ($row_Recordset1 = mysql_fetch_assoc($Recordset1));
  $rows = mysql_num_rows($Recordset1);
  if($rows > 0) {
      mysql_data_seek($Recordset1, 0);
	  $row_Recordset1 = mysql_fetch_assoc($Recordset1);
  }
?>
    </select></td>
</tr>  
  
<tr>
<td class="KT_th">Loại  : </td>
<td class="KT_th">
    <select wdg:subtype="DependentDropdown" name="select1" id="select1" wdg:type="widget" wdg:recordset="Recordset2" wdg:displayfield="Ten" wdg:valuefield="idLoaiSP" wdg:fkey="idCL" wdg:triggerobject="select">
    </select></td>    
</tr>
<tr>
  <td class="KT_th">Giá từ :</td>
  <td class="KT_th"><label>
    <select name="gia1" id="gia1">
      <option value="">Chọn giá</option>
      <?php for($i=0;$i<=50000000;$i+=1000000){ ?>
		<option value="<?php echo $i;?>"><?php echo number_format($i,0,',','.');?></option>	
	 <?php }?>
    </select>
  </label></td>
</tr>
<tr>
  <td class="KT_th">Đến :</td>
  <td class="KT_th"><label>
    <select name="gia2" id="gia2">
     <option value="">Chọn giá</option>
      <?php for($i=1000000;$i<=50000000;$i+=2000000){ ?>
		<option value="<?php echo $i;?>"><?php echo number_format($i,0,',','.');?></option>	
	 <?php }?>
    </select>
  </label></td>
</tr>
<tr>
  <td colspan="2" align="center" class="KT_th"><label>
    <input type="submit" name="button" id="button" value="Search">
  </label></td>
  </tr>    
  </table>
</form>
