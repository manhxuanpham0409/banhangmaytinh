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
$tfi_listchucnang3 = new TFI_TableFilter($conn_config, "tfi_listchucnang3");
$tfi_listchucnang3->addColumn("chucnang.TenCN", "STRING_TYPE", "TenCN", "%");
$tfi_listchucnang3->addColumn("chucnang.NoiDung", "STRING_TYPE", "NoiDung", "%");
$tfi_listchucnang3->addColumn("nhomchucnang.idNhomCN", "NUMERIC_TYPE", "idNhomCN", "=");
$tfi_listchucnang3->Execute();

// Sorter
$tso_listchucnang3 = new TSO_TableSorter("rschucnang1", "tso_listchucnang3");
$tso_listchucnang3->addColumn("chucnang.TenCN");
$tso_listchucnang3->addColumn("chucnang.NoiDung");
$tso_listchucnang3->addColumn("nhomchucnang.TenCN");
$tso_listchucnang3->setDefault("chucnang.TenCN");
$tso_listchucnang3->Execute();

// Navigation
$nav_listchucnang3 = new NAV_Regular("nav_listchucnang3", "rschucnang1", "../", $_SERVER['PHP_SELF'], 20);

mysql_select_db($database_config, $config);
$query_Recordset1 = "SELECT TenCN, idNhomCN FROM nhomchucnang ORDER BY TenCN";
$Recordset1 = mysql_query($query_Recordset1, $config) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);

//NeXTenesio3 Special List Recordset
$maxRows_rschucnang1 = $_SESSION['max_rows_nav_listchucnang3'];
$pageNum_rschucnang1 = 0;
if (isset($_GET['pageNum_rschucnang1'])) {
  $pageNum_rschucnang1 = $_GET['pageNum_rschucnang1'];
}
$startRow_rschucnang1 = $pageNum_rschucnang1 * $maxRows_rschucnang1;

// Defining List Recordset variable
$NXTFilter_rschucnang1 = "1=1";
if (isset($_SESSION['filter_tfi_listchucnang3'])) {
  $NXTFilter_rschucnang1 = $_SESSION['filter_tfi_listchucnang3'];
}
// Defining List Recordset variable
$NXTSort_rschucnang1 = "chucnang.TenCN";
if (isset($_SESSION['sorter_tso_listchucnang3'])) {
  $NXTSort_rschucnang1 = $_SESSION['sorter_tso_listchucnang3'];
}
mysql_select_db($database_config, $config);

$query_rschucnang1 = "SELECT chucnang.TenCN, chucnang.NoiDung, nhomchucnang.TenCN AS idNhomCN, chucnang.idCN FROM chucnang LEFT JOIN nhomchucnang ON chucnang.idNhomCN = nhomchucnang.idNhomCN WHERE {$NXTFilter_rschucnang1} ORDER BY {$NXTSort_rschucnang1}";
$query_limit_rschucnang1 = sprintf("%s LIMIT %d, %d", $query_rschucnang1, $startRow_rschucnang1, $maxRows_rschucnang1);
$rschucnang1 = mysql_query($query_limit_rschucnang1, $config) or die(mysql_error());
$row_rschucnang1 = mysql_fetch_assoc($rschucnang1);

if (isset($_GET['totalRows_rschucnang1'])) {
  $totalRows_rschucnang1 = $_GET['totalRows_rschucnang1'];
} else {
  $all_rschucnang1 = mysql_query($query_rschucnang1);
  $totalRows_rschucnang1 = mysql_num_rows($all_rschucnang1);
}
$totalPages_rschucnang1 = ceil($totalRows_rschucnang1/$maxRows_rschucnang1)-1;
//End NeXTenesio3 Special List Recordset

$nav_listchucnang3->checkBoundries();
?><link href="../includes/skins/mxkollection3.css" rel="stylesheet" type="text/css" media="all" /><script src="../includes/common/js/base.js" type="text/javascript"></script><script src="../includes/common/js/utility.js" type="text/javascript"></script><script src="../includes/skins/style.js" type="text/javascript"></script><script src="../includes/nxt/scripts/list.js" type="text/javascript"></script><script src="../includes/nxt/scripts/list.js.php" type="text/javascript"></script><script type="text/javascript">
$NXT_LIST_SETTINGS = {
  duplicate_buttons: true,
  duplicate_navigation: true,
  row_effects: true,
  show_as_buttons: true,
  record_counter: true
}
</script><style type="text/css">
  /* Dynamic List row settings */
  .KT_col_TenCN {width:210px; overflow:hidden;}
  .KT_col_NoiDung {width:140px; overflow:hidden;}
  .KT_col_idNhomCN {width:140px; overflow:hidden;}
.style1 {color: #555555}
</style>
<p>&nbsp;
<div class="KT_tng" id="listchucnang3">
  <h1>Danh sách các bài viết
    <?php
  $nav_listchucnang3->Prepare();
  require("../includes/nav/NAV_Text_Statistics.inc.php");
?>
  </h1>
  <div class="KT_tnglist">
    <form action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>" method="post" id="form1">
      <div class="KT_options"> <a href="<?php echo $nav_listchucnang3->getShowAllLink(); ?>"><?php echo NXT_getResource("Show"); ?>
            <?php 
  // Show IF Conditional region1
  if (@$_GET['show_all_nav_listchucnang3'] == 1) {
?>
            <?php echo $_SESSION['default_max_rows_nav_listchucnang3']; ?>
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
  if (@$_SESSION['has_filter_tfi_listchucnang3'] == 1) {
?>
                            <a href="<?php echo $tfi_listchucnang3->getResetFilterLink(); ?>"><?php echo NXT_getResource("Reset filter"); ?></a>
                            <?php 
  // else Conditional region2
  } else { ?>
                            <?php } 
  // endif Conditional region2
?>
      </div>
      <table cellpadding="2" cellspacing="0" class="KT_tngtable">
        <thead>
          <tr class="KT_row_order">
            <th> <input type="checkbox" name="KT_selAll" id="KT_selAll"/>
            </th>
            <th id="TenCN" class="KT_sorter KT_col_TenCN <?php echo $tso_listchucnang3->getSortIcon('chucnang.TenCN'); ?>"> <a href="<?php echo $tso_listchucnang3->getSortLink('chucnang.TenCN'); ?>">Tên chức năng</a> </th>
            <th id="NoiDung" class="KT_sorter KT_col_NoiDung <?php echo $tso_listchucnang3->getSortIcon('chucnang.NoiDung'); ?>" align="center"> <a href="<?php echo $tso_listchucnang3->getSortLink('chucnang.NoiDung'); ?>">Nội dung</a> </th>
            <th id="idNhomCN" class="KT_sorter KT_col_idNhomCN <?php echo $tso_listchucnang3->getSortIcon('nhomchucnang.TenCN'); ?>"> <a href="<?php echo $tso_listchucnang3->getSortLink('nhomchucnang.TenCN'); ?>">Nhóm chức năng</a> </th>
            <th class="style1"><a href="<?php echo $tso_listchucnang3->getSortLink('nhomchucnang.TenCN'); ?>">Chức năng</a></th>
          </tr>
          <?php 
  // Show IF Conditional region3
  if (@$_SESSION['has_filter_tfi_listchucnang3'] == 1) {
?>
          <tr class="KT_row_filter">
            <td>&nbsp;</td>
            <td><input type="text" name="tfi_listchucnang3_TenCN" id="tfi_listchucnang3_TenCN" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listchucnang3_TenCN']); ?>" size="20" maxlength="100" /></td>
            <td><input type="text" name="tfi_listchucnang3_NoiDung" id="tfi_listchucnang3_NoiDung" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listchucnang3_NoiDung']); ?>" size="20" maxlength="100" /></td>
            <td><select name="tfi_listchucnang3_idNhomCN" id="tfi_listchucnang3_idNhomCN">
              <option value="" <?php if (!(strcmp("", @$_SESSION['tfi_listchucnang3_idNhomCN']))) {echo "SELECTED";} ?>><?php echo NXT_getResource("None"); ?></option>
              <?php
do {  
?>
              <option value="<?php echo $row_Recordset1['idNhomCN']?>"<?php if (!(strcmp($row_Recordset1['idNhomCN'], @$_SESSION['tfi_listchucnang3_idNhomCN']))) {echo "SELECTED";} ?>><?php echo $row_Recordset1['TenCN']?></option>
              <?php
} while ($row_Recordset1 = mysql_fetch_assoc($Recordset1));
  $rows = mysql_num_rows($Recordset1);
  if($rows > 0) {
      mysql_data_seek($Recordset1, 0);
	  $row_Recordset1 = mysql_fetch_assoc($Recordset1);
  }
?>
            </select>
            </td>
            <td><input type="submit" name="tfi_listchucnang3" value="<?php echo NXT_getResource("Filter"); ?>" /></td>
          </tr>
          <?php } 
  // endif Conditional region3
?>
        </thead>
        <tbody>
          <?php if ($totalRows_rschucnang1 == 0) { // Show if recordset empty ?>
          <tr>
            <td colspan="5"><?php echo NXT_getResource("The table is empty or the filter you've selected is too restrictive."); ?></td>
          </tr>
          <?php } // Show if recordset empty ?>
          <?php if ($totalRows_rschucnang1 > 0) { // Show if recordset not empty ?>
          <?php do { ?>
          <tr class="<?php echo @$cnt1++%2==0 ? "" : "KT_even"; ?>">
            <td><input type="checkbox" name="kt_pk_chucnang" class="id_checkbox" value="<?php echo $row_rschucnang1['idCN']; ?>" />
                <input type="hidden" name="idCN" class="id_field" value="<?php echo $row_rschucnang1['idCN']; ?>" />
            </td>
            <td><div class="KT_col_TenCN"><?php echo KT_FormatForList($row_rschucnang1['TenCN'], 30); ?></div></td>
            <td><div class="KT_col_NoiDung"><?php echo KT_FormatForList($row_rschucnang1['NoiDung'], 20); ?></div></td>
            <td><div class="KT_col_idNhomCN"><?php echo KT_FormatForList($row_rschucnang1['idNhomCN'], 20); ?></div></td>
            <td><div align="center"><a class="KT_edit_link" href="star_computer.php?opt=chucnangEdit&idCN=<?php echo $row_rschucnang1['idCN']; ?>&amp;KT_back=1"><?php echo NXT_getResource("Sửa"); ?></a> <a class="KT_delete_link" href="#delete"><?php echo NXT_getResource("Xóa"); ?></a> </div></td>
          </tr>
          <?php } while ($row_rschucnang1 = mysql_fetch_assoc($rschucnang1)); ?>
          <?php } // Show if recordset not empty ?>
        </tbody>
      </table>
      <div class="KT_bottomnav">
        <div>
          <?php
            $nav_listchucnang3->Prepare();
            require("../includes/nav/NAV_Text_Navigation.inc.php");
          ?>
        </div>
      </div>
      <div class="KT_bottombuttons">
        <div class="KT_operations"> <a class="KT_edit_op_link" href="#" onclick="nxt_list_edit_link_form(this); return false;"><?php echo NXT_getResource("Sửa"); ?></a> <a class="KT_delete_op_link" href="#" onclick="nxt_list_delete_link_form(this); return false;"><?php echo NXT_getResource("Xóa"); ?></a> </div>
        <span>&nbsp;</span><a class="KT_additem_op_link" href="star_computer.php?opt=chucnangEdit&KT_back=1" onclick="return nxt_list_additem(this)"><?php echo NXT_getResource("Thêm mới"); ?></a> </div>
    </form>
  </div>
  <br class="clearfixplain" />
</div>
</p>
<?php
mysql_free_result($Recordset1);

mysql_free_result($rschucnang1);
?>