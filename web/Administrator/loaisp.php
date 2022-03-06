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
$tfi_listloaisp2 = new TFI_TableFilter($conn_config, "tfi_listloaisp2");
$tfi_listloaisp2->addColumn("loaisp.Ten", "STRING_TYPE", "Ten", "%");
$tfi_listloaisp2->addColumn("chungloai.TenCL", "STRING_TYPE", "TenCL", "%");
$tfi_listloaisp2->addColumn("loaisp.AnHien", "CHECKBOX_1_0_TYPE", "AnHien", "%");
$tfi_listloaisp2->Execute();

// Sorter
$tso_listloaisp2 = new TSO_TableSorter("rsloaisp1", "tso_listloaisp2");
$tso_listloaisp2->addColumn("loaisp.Ten");
$tso_listloaisp2->addColumn("chungloai.TenCL");
$tso_listloaisp2->addColumn("loaisp.AnHien");
$tso_listloaisp2->setDefault("loaisp.Ten");
$tso_listloaisp2->Execute();

// Navigation
$nav_listloaisp2 = new NAV_Regular("nav_listloaisp2", "rsloaisp1", "../", $_SERVER['PHP_SELF'], 20);

mysql_select_db($database_config, $config);
$query_Recordset1 = "SELECT TenCL, idCL FROM chungloai ORDER BY TenCL";
$Recordset1 = mysql_query($query_Recordset1, $config) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);

//NeXTenesio3 Special List Recordset
$maxRows_rsloaisp1 = $_SESSION['max_rows_nav_listloaisp2'];
$pageNum_rsloaisp1 = 0;
if (isset($_GET['pageNum_rsloaisp1'])) {
  $pageNum_rsloaisp1 = $_GET['pageNum_rsloaisp1'];
}
$startRow_rsloaisp1 = $pageNum_rsloaisp1 * $maxRows_rsloaisp1;

// Defining List Recordset variable
$NXTFilter_rsloaisp1 = "1=1";
if (isset($_SESSION['filter_tfi_listloaisp2'])) {
  $NXTFilter_rsloaisp1 = $_SESSION['filter_tfi_listloaisp2'];
}
// Defining List Recordset variable
$NXTSort_rsloaisp1 = "loaisp.Ten";
if (isset($_SESSION['sorter_tso_listloaisp2'])) {
  $NXTSort_rsloaisp1 = $_SESSION['sorter_tso_listloaisp2'];
}
mysql_select_db($database_config, $config);

$query_rsloaisp1 = "SELECT loaisp.Ten, chungloai.TenCL, loaisp.AnHien, loaisp.idLoaiSP FROM loaisp LEFT JOIN chungloai ON loaisp.idCL = chungloai.idCL WHERE {$NXTFilter_rsloaisp1} ORDER BY {$NXTSort_rsloaisp1}";
$query_limit_rsloaisp1 = sprintf("%s LIMIT %d, %d", $query_rsloaisp1, $startRow_rsloaisp1, $maxRows_rsloaisp1);
$rsloaisp1 = mysql_query($query_limit_rsloaisp1, $config) or die(mysql_error());
$row_rsloaisp1 = mysql_fetch_assoc($rsloaisp1);

if (isset($_GET['totalRows_rsloaisp1'])) {
  $totalRows_rsloaisp1 = $_GET['totalRows_rsloaisp1'];
} else {
  $all_rsloaisp1 = mysql_query($query_rsloaisp1);
  $totalRows_rsloaisp1 = mysql_num_rows($all_rsloaisp1);
}
$totalPages_rsloaisp1 = ceil($totalRows_rsloaisp1/$maxRows_rsloaisp1)-1;
//End NeXTenesio3 Special List Recordset

$nav_listloaisp2->checkBoundries();
?><head>
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
  .KT_col_Ten {width:140px; overflow:hidden;}
  .KT_col_TenCL {width:140px; overflow:hidden;}
  .KT_col_AnHien {width:140px; overflow:hidden;}
</style>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"></head>
<body>

<div class="KT_tng" id="listloaisp2">
  <h1>
    Loại sản phẩm
      <?php
  $nav_listloaisp2->Prepare();
  require("../includes/nav/NAV_Text_Statistics.inc.php");
?>
  </h1>
  <div class="KT_tnglist">
    <form action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>" method="post" id="form1">
      <div class="KT_options">
        <a href="<?php echo $nav_listloaisp2->getShowAllLink(); ?>"><?php echo NXT_getResource("Show"); ?>
<?php 
  // Show IF Conditional region1
  if (@$_GET['show_all_nav_listloaisp2'] == 1) {
?>
          <?php echo $_SESSION['default_max_rows_nav_listloaisp2']; ?> 
<?php 
  // else Conditional region1
  } else { ?>
         <?php echo NXT_getResource("all"); ?>
<?php } 
  // endif Conditional region1
?>
          <?php echo NXT_getResource("records"); ?></a>
					&nbsp;
					&nbsp;
<?php 
  // Show IF Conditional region2
  if (@$_SESSION['has_filter_tfi_listloaisp2'] == 1) {
?>
        <a href="<?php echo $tfi_listloaisp2->getResetFilterLink(); ?>"><?php echo NXT_getResource("Reset filter"); ?></a>
<?php 
  // else Conditional region2
  } else { ?>
        <a href="<?php echo $tfi_listloaisp2->getShowFilterLink(); ?>"><?php echo NXT_getResource("Show filter"); ?></a>
<?php } 
  // endif Conditional region2
?>
      </div>
      <table cellpadding="2" cellspacing="0" class="KT_tngtable">
        <thead>
          <tr class="KT_row_order">
            <th>
              <input type="checkbox" name="KT_selAll" id="KT_selAll"/>
            </th>
            <th id="Ten" class="KT_sorter KT_col_Ten <?php echo $tso_listloaisp2->getSortIcon('loaisp.Ten'); ?>">
              <a href="<?php echo $tso_listloaisp2->getSortLink('loaisp.Ten'); ?>">Tên loại sản phẩm</a>
            </th>
            <th id="TenCL" class="KT_sorter KT_col_TenCL <?php echo $tso_listloaisp2->getSortIcon('chungloai.TenCL'); ?>">
              <a href="<?php echo $tso_listloaisp2->getSortLink('chungloai.TenCL'); ?>">Chủng loại</a>
            </th>
            <th id="AnHien" class="KT_sorter KT_col_AnHien <?php echo $tso_listloaisp2->getSortIcon('loaisp.AnHien'); ?>">
              <a href="<?php echo $tso_listloaisp2->getSortLink('loaisp.AnHien'); ?>">Hiện</a>
            </th>
            <th>&nbsp;</th>
          </tr>
<?php 
  // Show IF Conditional region3
  if (@$_SESSION['has_filter_tfi_listloaisp2'] == 1) {
?>
          <tr class="KT_row_filter">
            <td>&nbsp;</td>
            	<td><input type="text" name="tfi_listloaisp2_Ten" id="tfi_listloaisp2_Ten" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listloaisp2_Ten']); ?>" size="20" maxlength="30" /></td>
            	<td><input type="text" name="tfi_listloaisp2_TenCL" id="tfi_listloaisp2_TenCL" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listloaisp2_TenCL']); ?>" size="20" maxlength="100" /></td>
            	<td><input  <?php if (!(strcmp(KT_escapeAttribute(@$_SESSION['tfi_listloaisp2_AnHien']),"1"))) {echo "checked";} ?> type="checkbox" name="tfi_listloaisp2_AnHien" id="tfi_listloaisp2_AnHien" value="1" /></td>
            
            <td><input type="submit" name="tfi_listloaisp2" value="<?php echo NXT_getResource("Filter"); ?>" /></td>
          </tr>
<?php } 
  // endif Conditional region3
?>
        </thead>
        <tbody>
<?php if ($totalRows_rsloaisp1 == 0) { // Show if recordset empty ?>
          <tr>
            <td colspan="5"><?php echo NXT_getResource("The table is empty or the filter you've selected is too restrictive."); ?></td>
          </tr>
<?php } // Show if recordset empty ?>
<?php if ($totalRows_rsloaisp1 > 0) { // Show if recordset not empty ?>
<?php do { ?>
          <tr class="<?php echo @$cnt1++%2==0 ? "" : "KT_even"; ?>">
            <td>
              <input type="checkbox" name="kt_pk_loaisp" class="id_checkbox" value="<?php echo $row_rsloaisp1['idLoaiSP']; ?>" />
              <input type="hidden" name="idLoaiSP" class="id_field" value="<?php echo $row_rsloaisp1['idLoaiSP']; ?>" />
            </td>
            <td>
              <div class="KT_col_Ten"><?php echo KT_FormatForList($row_rsloaisp1['Ten'], 20); ?></div>
            </td>
            <td>
              <div class="KT_col_TenCL"><?php echo KT_FormatForList($row_rsloaisp1['TenCL'], 20); ?></div>
            </td>
            <td>
              <div class="KT_col_AnHien"><?php echo KT_FormatForList($row_rsloaisp1['AnHien'], 20); ?></div>
            </td>
            <td>
              <a class="KT_edit_link" href="star_computer.php?opt=loaispEdit&idLoaiSP=<?php echo $row_rsloaisp1['idLoaiSP']; ?>&amp;KT_back=1"><?php echo NXT_getResource("Sửa"); ?></a>
              <a class="KT_delete_link" href="#delete"><?php echo NXT_getResource("Xóa"); ?></a>
            </td>
          </tr>
<?php } while ($row_rsloaisp1 = mysql_fetch_assoc($rsloaisp1)); ?>
<?php } // Show if recordset not empty ?>
        </tbody>
      </table>
      <div class="KT_bottomnav">
        <div>
          <?php
            $nav_listloaisp2->Prepare();
            require("../includes/nav/NAV_Text_Navigation.inc.php");
          ?>
        </div>
      </div>
      <div class="KT_bottombuttons">
        <div class="KT_operations">
          <a class="KT_edit_op_link" href="#" onclick="nxt_list_edit_link_form(this); return false;"><?php echo NXT_getResource("Sửa"); ?></a>
          <a class="KT_delete_op_link" href="#" onclick="nxt_list_delete_link_form(this); return false;"><?php echo NXT_getResource("Xóa"); ?></a>
        </div>
        <span>&nbsp;</span><a class="KT_additem_op_link" href="star_computer.php?opt=loaispEdit&KT_back=1" onclick="return nxt_list_additem(this)"><?php echo NXT_getResource("Thêm mới"); ?></a>
      </div>
    </form>
  </div>
  <br class="clearfixplain" />
</div>
<p>&nbsp;</p>
</body>
<?php
mysql_free_result($Recordset1);

mysql_free_result($rsloaisp1);
?>
