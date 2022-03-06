<?php require_once('../Connections/config.php'); ?>
<?php
// Load the common classes
require_once('../includes/common/KT_common.php');

// Load the required classes
require_once('../includes/tfi/TFI.php');
require_once('../includes/tso/TSO.php');
require_once('../includes/nav/NAV.php');

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

// Filter
$tfi_listsanpham1 = new TFI_TableFilter($conn_config, "tfi_listsanpham1");
$tfi_listsanpham1->addColumn("sanpham.TenSP", "STRING_TYPE", "TenSP", "%");
$tfi_listsanpham1->addColumn("hangsx.Ten", "STRING_TYPE", "Ten", "%");
$tfi_listsanpham1->addColumn("chungloai.TenCL", "STRING_TYPE", "TenCL", "%");
$tfi_listsanpham1->addColumn("loaisp.Ten", "STRING_TYPE", "Ten1", "%");
$tfi_listsanpham1->addColumn("sanpham.SoLuongTonKho", "NUMERIC_TYPE", "SoLuongTonKho", "=");
$tfi_listsanpham1->Execute();

// Sorter
$tso_listsanpham1 = new TSO_TableSorter("rssanpham1", "tso_listsanpham1");
$tso_listsanpham1->addColumn("sanpham.TenSP");
$tso_listsanpham1->addColumn("hangsx.Ten");
$tso_listsanpham1->addColumn("chungloai.TenCL");
$tso_listsanpham1->addColumn("loaisp.Ten");
$tso_listsanpham1->addColumn("sanpham.SoLuongTonKho");
$tso_listsanpham1->setDefault("sanpham.TenSP");
$tso_listsanpham1->Execute();

// Navigation
$nav_listsanpham1 = new NAV_Regular("nav_listsanpham1", "rssanpham1", "../", $_SERVER['PHP_SELF'], 30);

mysql_select_db($database_config, $config);
$query_Recordset1 = "SELECT Ten, idHang FROM hangsx ORDER BY Ten";
$Recordset1 = mysql_query($query_Recordset1, $config) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);

mysql_select_db($database_config, $config);
$query_Recordset2 = "SELECT TenCL, idCL FROM chungloai ORDER BY TenCL";
$Recordset2 = mysql_query($query_Recordset2, $config) or die(mysql_error());
$row_Recordset2 = mysql_fetch_assoc($Recordset2);
$totalRows_Recordset2 = mysql_num_rows($Recordset2);

mysql_select_db($database_config, $config);
$query_Recordset3 = "SELECT Ten, idLoaiSP FROM loaisp ORDER BY Ten";
$Recordset3 = mysql_query($query_Recordset3, $config) or die(mysql_error());
$row_Recordset3 = mysql_fetch_assoc($Recordset3);
$totalRows_Recordset3 = mysql_num_rows($Recordset3);

//NeXTenesio3 Special List Recordset
$maxRows_rssanpham1 = $_SESSION['max_rows_nav_listsanpham1'];
$pageNum_rssanpham1 = 0;
if (isset($_GET['pageNum_rssanpham1'])) {
  $pageNum_rssanpham1 = $_GET['pageNum_rssanpham1'];
}
$startRow_rssanpham1 = $pageNum_rssanpham1 * $maxRows_rssanpham1;

// Defining List Recordset variable
$NXTFilter_rssanpham1 = "1=1";
if (isset($_SESSION['filter_tfi_listsanpham1'])) {
  $NXTFilter_rssanpham1 = $_SESSION['filter_tfi_listsanpham1'];
}
// Defining List Recordset variable
$NXTSort_rssanpham1 = "sanpham.TenSP";
if (isset($_SESSION['sorter_tso_listsanpham1'])) {
  $NXTSort_rssanpham1 = $_SESSION['sorter_tso_listsanpham1'];
}
mysql_select_db($database_config, $config);

$query_rssanpham1 = "SELECT sanpham.TenSP, hangsx.Ten, chungloai.TenCL, loaisp.Ten AS Ten1, sanpham.SoLanXem, sanpham.SoLanMua, sanpham.SoLuongTonKho, sanpham.AnHien, sanpham.idSP FROM ((sanpham LEFT JOIN hangsx ON sanpham.idHang = hangsx.idHang) LEFT JOIN chungloai ON sanpham.idCL = chungloai.idCL) LEFT JOIN loaisp ON sanpham.idLoaiSP = loaisp.idLoaiSP WHERE {$NXTFilter_rssanpham1} ORDER BY {$NXTSort_rssanpham1}";
$query_limit_rssanpham1 = sprintf("%s LIMIT %d, %d", $query_rssanpham1, $startRow_rssanpham1, $maxRows_rssanpham1);
$rssanpham1 = mysql_query($query_limit_rssanpham1, $config) or die(mysql_error());
$row_rssanpham1 = mysql_fetch_assoc($rssanpham1);

if (isset($_GET['totalRows_rssanpham1'])) {
  $totalRows_rssanpham1 = $_GET['totalRows_rssanpham1'];
} else {
  $all_rssanpham1 = mysql_query($query_rssanpham1);
  $totalRows_rssanpham1 = mysql_num_rows($all_rssanpham1);
}
$totalPages_rssanpham1 = ceil($totalRows_rssanpham1/$maxRows_rssanpham1)-1;
//End NeXTenesio3 Special List Recordset

$nav_listsanpham1->checkBoundries();
?>
<link href="../includes/skins/mxkollection3.css" rel="stylesheet" type="text/css" media="all" /><script src="../includes/common/js/base.js" type="text/javascript"></script><script src="../includes/common/js/utility.js" type="text/javascript"></script><script src="../includes/skins/style.js" type="text/javascript"></script><script src="../includes/nxt/scripts/list.js" type="text/javascript"></script><script src="../includes/nxt/scripts/list.js.php" type="text/javascript"></script><script type="text/javascript">
$NXT_LIST_SETTINGS = {
  duplicate_buttons: true,
  duplicate_navigation: true,
  row_effects: true,
  show_as_buttons: true,
  record_counter: true
}
</script><style type="text/css">
  /* Dynamic List row settings */
  .KT_col_TenSP {width:140px; overflow:hidden;}
  .KT_col_Ten {width:140px; overflow:hidden;}
  .KT_col_TenCL {width:140px; overflow:hidden;}
  .KT_col_Ten1 {width:140px; overflow:hidden;}
  .KT_col_SoLuongTonKho {width:70px; overflow:hidden;}
</style>
<div class="KT_tng" id="listsanpham1">
  <h1> Danh sách tất cả các sản phẩm
    <?php
  $nav_listsanpham1->Prepare();
  require("../includes/nav/NAV_Text_Statistics.inc.php");
?>
  </h1>
  <div class="KT_tnglist">
    <form action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>" method="post" id="form1">
      <div class="KT_options"> <a href="<?php echo $nav_listsanpham1->getShowAllLink(); ?>"><?php echo NXT_getResource("Show"); ?>
            <?php 
  // Show IF Conditional region1
  if (@$_GET['show_all_nav_listsanpham1'] == 1) {
?>
            <?php echo $_SESSION['default_max_rows_nav_listsanpham1']; ?>
            <?php 
  // else Conditional region1
  } else { ?>
            <?php echo NXT_getResource("all"); ?>
            <?php } 
  // endif Conditional region1
?>
            <?php echo NXT_getResource("records"); ?></a> &nbsp;
        &nbsp;
                            <?php 
  // Show IF Conditional region2
  if (@$_SESSION['has_filter_tfi_listsanpham1'] == 1) {
?>
                            <a href="<?php echo $tfi_listsanpham1->getResetFilterLink(); ?>"><?php echo NXT_getResource("Reset filter"); ?></a>
                            <?php 
  // else Conditional region2
  } else { ?>
                            <a href="<?php echo $tfi_listsanpham1->getShowFilterLink(); ?>"><?php echo NXT_getResource("Show filter"); ?></a>
                            <?php } 
  // endif Conditional region2
?>
      </div>
      <table align="center" cellpadding="2" cellspacing="0" class="KT_tngtable">
        <thead>
          <tr class="KT_row_order">
            <th> <input type="checkbox" name="KT_selAll" id="KT_selAll"/>
            </th>
            <th id="TenSP" class="KT_sorter KT_col_TenSP <?php echo $tso_listsanpham1->getSortIcon('sanpham.TenSP'); ?>"> <a href="<?php echo $tso_listsanpham1->getSortLink('sanpham.TenSP'); ?>">Tên sản phẩm</a> </th>
            <th id="Ten" class="KT_sorter KT_col_Ten <?php echo $tso_listsanpham1->getSortIcon('hangsx.Ten'); ?>"> <a href="<?php echo $tso_listsanpham1->getSortLink('hangsx.Ten'); ?>">Hãng sx</a> </th>
            <th id="TenCL" class="KT_sorter KT_col_TenCL <?php echo $tso_listsanpham1->getSortIcon('chungloai.TenCL'); ?>"> <a href="<?php echo $tso_listsanpham1->getSortLink('chungloai.TenCL'); ?>">Tên chủng loại</a> </th>
            <th id="Ten1" class="KT_sorter KT_col_Ten1 <?php echo $tso_listsanpham1->getSortIcon('loaisp.Ten'); ?>"> <a href="<?php echo $tso_listsanpham1->getSortLink('loaisp.Ten'); ?>">Loại sản phẩm</a> </th>
            <th id="SoLuongTonKho" class="KT_sorter KT_col_SoLuongTonKho <?php echo $tso_listsanpham1->getSortIcon('sanpham.SoLuongTonKho'); ?>"> <a href="<?php echo $tso_listsanpham1->getSortLink('sanpham.SoLuongTonKho'); ?>">Tồn kho</a> </th>
            <th>&nbsp;</th>
          </tr>
          <?php 
  // Show IF Conditional region3
  if (@$_SESSION['has_filter_tfi_listsanpham1'] == 1) {
?>
          <tr class="KT_row_filter">
            <td>&nbsp;</td>
            <td><input type="text" name="tfi_listsanpham1_TenSP" id="tfi_listsanpham1_TenSP" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listsanpham1_TenSP']); ?>" size="20" maxlength="100" /></td>
            <td><input type="text" name="tfi_listsanpham1_Ten" id="tfi_listsanpham1_Ten" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listsanpham1_Ten']); ?>" size="20" maxlength="100" /></td>
            <td><input type="text" name="tfi_listsanpham1_TenCL" id="tfi_listsanpham1_TenCL" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listsanpham1_TenCL']); ?>" size="20" maxlength="100" /></td>
            <td><input type="text" name="tfi_listsanpham1_Ten1" id="tfi_listsanpham1_Ten1" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listsanpham1_Ten1']); ?>" size="20" maxlength="100" /></td>
            <td><input type="text" name="tfi_listsanpham1_SoLuongTonKho" id="tfi_listsanpham1_SoLuongTonKho" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listsanpham1_SoLuongTonKho']); ?>" size="10" maxlength="100" /></td>
            <td><input type="submit" name="tfi_listsanpham1" value="<?php echo NXT_getResource("Filter"); ?>" /></td>
          </tr>
          <?php } 
  // endif Conditional region3
?>
        </thead>
        <tbody>
          <?php if ($totalRows_rssanpham1 == 0) { // Show if recordset empty ?>
          <tr>
            <td colspan="7"><?php echo NXT_getResource("The table is empty or the filter you've selected is too restrictive."); ?></td>
          </tr>
          <?php } // Show if recordset empty ?>
          <?php if ($totalRows_rssanpham1 > 0) { // Show if recordset not empty ?>
          <?php do { ?>
          <tr class="<?php echo @$cnt1++%2==0 ? "" : "KT_even"; ?>">
            <td><input type="checkbox" name="kt_pk_sanpham" class="id_checkbox" value="<?php echo $row_rssanpham1['idSP']; ?>" />
                <input type="hidden" name="idSP" class="id_field" value="<?php echo $row_rssanpham1['idSP']; ?>" />
            </td>
            <td><div class="KT_col_TenSP"><?php echo KT_FormatForList($row_rssanpham1['TenSP'], 20); ?></div></td>
            <td><div class="KT_col_Ten"><?php echo KT_FormatForList($row_rssanpham1['Ten'], 20); ?></div></td>
            <td><div class="KT_col_TenCL"><?php echo KT_FormatForList($row_rssanpham1['TenCL'], 20); ?></div></td>
            <td><div class="KT_col_Ten1"><?php echo KT_FormatForList($row_rssanpham1['Ten1'], 20); ?></div></td>
            <td><div class="KT_col_SoLuongTonKho"><?php echo KT_FormatForList($row_rssanpham1['SoLuongTonKho'], 10); ?></div></td>
            <td><a class="KT_edit_link" href="star_computer.php?opt=sanphamEdit&idSP=<?php echo $row_rssanpham1['idSP']; ?>&amp;KT_back=1"><?php echo NXT_getResource("Sửa"); ?></a> <a class="KT_delete_link" href="#delete"><?php echo NXT_getResource("Xóa"); ?></a> </td>
          </tr>
          <?php } while ($row_rssanpham1 = mysql_fetch_assoc($rssanpham1)); ?>
          <?php } // Show if recordset not empty ?>
        </tbody>
      </table>
      <div class="KT_bottomnav">
        <div>
          <?php
            $nav_listsanpham1->Prepare();
            require("../includes/nav/NAV_Text_Navigation.inc.php");
          ?>
        </div>
      </div>
      <div class="KT_bottombuttons">
        <div class="KT_operations"> <a class="KT_edit_op_link" href="#" onclick="nxt_list_edit_link_form(this); return false;"><?php echo NXT_getResource("Sửa"); ?></a> <a class="KT_delete_op_link" href="#" onclick="nxt_list_delete_link_form(this); return false;"><?php echo NXT_getResource("Xóa"); ?></a> </div>
        <span>&nbsp;</span><a class="KT_additem_op_link" href="star_computer.php?opt=sanphamEdit&KT_back=1" onclick="return nxt_list_additem(this)"><?php echo NXT_getResource("Thêm mới"); ?></a> </div>
    </form>
  </div>
  <br class="clearfixplain" />
</div>
<?php
mysql_free_result($Recordset1);
mysql_free_result($Recordset2);
mysql_free_result($Recordset3);
mysql_free_result($rssanpham1);
?>
