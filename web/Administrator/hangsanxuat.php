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
$tfi_listhangsx3 = new TFI_TableFilter($conn_config, "tfi_listhangsx3");
$tfi_listhangsx3->addColumn("hangsx.Ten", "STRING_TYPE", "Ten", "%");
$tfi_listhangsx3->addColumn("hangsx.ThuTu", "NUMERIC_TYPE", "ThuTu", "=");
$tfi_listhangsx3->addColumn("hangsx.AnHien", "CHECKBOX_1_0_TYPE", "AnHien", "%");
$tfi_listhangsx3->Execute();

// Sorter
$tso_listhangsx3 = new TSO_TableSorter("rshangsx1", "tso_listhangsx3");
$tso_listhangsx3->addColumn("hangsx.Ten");
$tso_listhangsx3->addColumn("hangsx.ThuTu");
$tso_listhangsx3->addColumn("hangsx.AnHien");
$tso_listhangsx3->setDefault("hangsx.Ten");
$tso_listhangsx3->Execute();

// Navigation
$nav_listhangsx3 = new NAV_Regular("nav_listhangsx3", "rshangsx1", "../", $_SERVER['PHP_SELF'], 20);

//NeXTenesio3 Special List Recordset
$maxRows_rshangsx1 = $_SESSION['max_rows_nav_listhangsx3'];
$pageNum_rshangsx1 = 0;
if (isset($_GET['pageNum_rshangsx1'])) {
  $pageNum_rshangsx1 = $_GET['pageNum_rshangsx1'];
}
$startRow_rshangsx1 = $pageNum_rshangsx1 * $maxRows_rshangsx1;

// Defining List Recordset variable
$NXTFilter_rshangsx1 = "1=1";
if (isset($_SESSION['filter_tfi_listhangsx3'])) {
  $NXTFilter_rshangsx1 = $_SESSION['filter_tfi_listhangsx3'];
}
// Defining List Recordset variable
$NXTSort_rshangsx1 = "hangsx.Ten";
if (isset($_SESSION['sorter_tso_listhangsx3'])) {
  $NXTSort_rshangsx1 = $_SESSION['sorter_tso_listhangsx3'];
}
mysql_select_db($database_config, $config);

$query_rshangsx1 = "SELECT hangsx.Ten, hangsx.ThuTu, hangsx.AnHien, hangsx.idHang FROM hangsx WHERE {$NXTFilter_rshangsx1} ORDER BY {$NXTSort_rshangsx1}";
$query_limit_rshangsx1 = sprintf("%s LIMIT %d, %d", $query_rshangsx1, $startRow_rshangsx1, $maxRows_rshangsx1);
$rshangsx1 = mysql_query($query_limit_rshangsx1, $config) or die(mysql_error());
$row_rshangsx1 = mysql_fetch_assoc($rshangsx1);

if (isset($_GET['totalRows_rshangsx1'])) {
  $totalRows_rshangsx1 = $_GET['totalRows_rshangsx1'];
} else {
  $all_rshangsx1 = mysql_query($query_rshangsx1);
  $totalRows_rshangsx1 = mysql_num_rows($all_rshangsx1);
}
$totalPages_rshangsx1 = ceil($totalRows_rshangsx1/$maxRows_rshangsx1)-1;
//End NeXTenesio3 Special List Recordset

$nav_listhangsx3->checkBoundries();
?>
<link href="../includes/skins/mxkollection3.css" rel="stylesheet" type="text/css" media="all" />
<script src="../includes/common/js/base.js" type="text/javascript"></script>
<script src="../includes/common/js/utility.js" type="text/javascript"></script>
<script src="../includes/skins/style.js" type="text/javascript"></script>
<script src="../includes/nxt/scripts/list.js" type="text/javascript"></script>
<script src="../includes/nxt/scripts/list.js.php" type="text/javascript"></script>
<script type="text/javascript">
$NXT_LIST_SETTINGS = {
  duplicate_buttons: true,
  duplicate_navigation: true,
  row_effects: true,
  show_as_buttons: true,
  record_counter: true
}
</script>
<style type="text/css">
  /* Dynamic List row settings */
  .KT_col_Ten {width:140px; overflow:hidden;}
  .KT_col_ThuTu {width:140px; overflow:hidden;}
  .KT_col_AnHien {width:140px; overflow:hidden;}
</style>

<p>&nbsp;
<div class="KT_tng" id="listhangsx3">
  <h1>Hãng sản xuất
    <?php
  $nav_listhangsx3->Prepare();
  require("../includes/nav/NAV_Text_Statistics.inc.php");
?>
  </h1>
  <div class="KT_tnglist">
    <form action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>" method="post" id="form1">
      <div class="KT_options"> <a href="<?php echo $nav_listhangsx3->getShowAllLink(); ?>"><?php echo NXT_getResource("Show"); ?>
        <?php 
  // Show IF Conditional region1
  if (@$_GET['show_all_nav_listhangsx3'] == 1) {
?>
          <?php echo $_SESSION['default_max_rows_nav_listhangsx3']; ?>
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
  if (@$_SESSION['has_filter_tfi_listhangsx3'] == 1) {
?>
                  <a href="<?php echo $tfi_listhangsx3->getResetFilterLink(); ?>"><?php echo NXT_getResource("Reset filter"); ?></a>
                  <?php 
  // else Conditional region2
  } else { ?>
                  <a href="<?php echo $tfi_listhangsx3->getShowFilterLink(); ?>"><?php echo NXT_getResource("Show filter"); ?></a>
                  <?php } 
  // endif Conditional region2
?>
      </div>
      <table align="center" cellpadding="2" cellspacing="0" class="KT_tngtable">
        <thead>
          <tr class="KT_row_order">
            <th> <input type="checkbox" name="KT_selAll" id="KT_selAll"/>
            </th>
            <th id="Ten" class="KT_sorter KT_col_Ten <?php echo $tso_listhangsx3->getSortIcon('hangsx.Ten'); ?>"> <a href="<?php echo $tso_listhangsx3->getSortLink('hangsx.Ten'); ?>">Tên hãng</a> </th>
            <th id="ThuTu" class="KT_sorter KT_col_ThuTu <?php echo $tso_listhangsx3->getSortIcon('hangsx.ThuTu'); ?>"> <a href="<?php echo $tso_listhangsx3->getSortLink('hangsx.ThuTu'); ?>">Thứ tự</a> </th>
            <th id="AnHien" class="KT_sorter KT_col_AnHien <?php echo $tso_listhangsx3->getSortIcon('hangsx.AnHien'); ?>"> <a href="<?php echo $tso_listhangsx3->getSortLink('hangsx.AnHien'); ?>">Hiện</a> </th>
            <th>&nbsp;</th>
          </tr>
          <?php 
  // Show IF Conditional region3
  if (@$_SESSION['has_filter_tfi_listhangsx3'] == 1) {
?>
            <tr class="KT_row_filter">
              <td>&nbsp;</td>
              <td><input type="text" name="tfi_listhangsx3_Ten" id="tfi_listhangsx3_Ten" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listhangsx3_Ten']); ?>" size="20" maxlength="100" /></td>
              <td><input type="text" name="tfi_listhangsx3_ThuTu" id="tfi_listhangsx3_ThuTu" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listhangsx3_ThuTu']); ?>" size="20" maxlength="100" /></td>
              <td><input  <?php if (!(strcmp(KT_escapeAttribute(@$_SESSION['tfi_listhangsx3_AnHien']),"1"))) {echo "checked";} ?> type="checkbox" name="tfi_listhangsx3_AnHien" id="tfi_listhangsx3_AnHien" value="1" /></td>
              <td><input type="submit" name="tfi_listhangsx3" value="<?php echo NXT_getResource("Filter"); ?>" /></td>
            </tr>
            <?php } 
  // endif Conditional region3
?>
        </thead>
        <tbody>
          <?php if ($totalRows_rshangsx1 == 0) { // Show if recordset empty ?>
            <tr>
              <td colspan="5"><?php echo NXT_getResource("The table is empty or the filter you've selected is too restrictive."); ?></td>
            </tr>
            <?php } // Show if recordset empty ?>
          <?php if ($totalRows_rshangsx1 > 0) { // Show if recordset not empty ?>
            <?php do { ?>
              <tr class="<?php echo @$cnt1++%2==0 ? "" : "KT_even"; ?>">
                <td><input type="checkbox" name="kt_pk_hangsx" class="id_checkbox" value="<?php echo $row_rshangsx1['idHang']; ?>" />
                    <input type="hidden" name="idHang" class="id_field" value="<?php echo $row_rshangsx1['idHang']; ?>" />
                </td>
                <td><div class="KT_col_Ten"><?php echo KT_FormatForList($row_rshangsx1['Ten'], 20); ?></div></td>
                <td><div class="KT_col_ThuTu"><?php echo KT_FormatForList($row_rshangsx1['ThuTu'], 20); ?></div></td>
                <td><div class="KT_col_AnHien"><?php echo KT_FormatForList($row_rshangsx1['AnHien'], 20); ?></div></td>
                <td><a class="KT_edit_link" href="star_computer.php?opt=hangsanxuatEdit&idHang=<?php echo $row_rshangsx1['idHang']; ?>"><?php echo NXT_getResource("Sửa"); ?></a> <a class="KT_delete_link" href="#delete"><?php echo NXT_getResource("Xóa"); ?></a> </td>
              </tr>
              <?php } while ($row_rshangsx1 = mysql_fetch_assoc($rshangsx1)); ?>
            <?php } // Show if recordset not empty ?>
        </tbody>
      </table>
      <div class="KT_bottomnav">
        <div>
          <?php
            $nav_listhangsx3->Prepare();
            require("../includes/nav/NAV_Text_Navigation.inc.php");
          ?>
        </div>
      </div>
      <div class="KT_bottombuttons">
        <div class="KT_operations"> <a class="KT_edit_op_link" href="#" onclick="nxt_list_edit_link_form(this); return false;"><?php echo NXT_getResource("Sửa"); ?></a> <a class="KT_delete_op_link" href="#" onclick="nxt_list_delete_link_form(this); return false;"><?php echo NXT_getResource("Xóa"); ?></a> </div>
<span>&nbsp;</span><a class="KT_additem_op_link" href="star_computer.php?opt=hangsanxuatEdit&KT_back=1" onclick="return nxt_list_additem(this)"><?php echo NXT_getResource("Thêm mới"); ?></a> </div>
    </form>
  </div>
  <br class="clearfixplain" />
</div>
</p>
<?php
mysql_free_result($rshangsx1);
?>

