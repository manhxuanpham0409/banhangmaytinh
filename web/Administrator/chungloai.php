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
$tfi_listchungloai1 = new TFI_TableFilter($conn_config, "tfi_listchungloai1");
$tfi_listchungloai1->addColumn("chungloai.TenCL", "STRING_TYPE", "TenCL", "%");
$tfi_listchungloai1->addColumn("chungloai.LinhTinh", "NUMERIC_TYPE", "LinhTinh", "=");
$tfi_listchungloai1->addColumn("chungloai.AnHien", "CHECKBOX_1_0_TYPE", "AnHien", "%");
$tfi_listchungloai1->Execute();

// Sorter
$tso_listchungloai1 = new TSO_TableSorter("rschungloai1", "tso_listchungloai1");
$tso_listchungloai1->addColumn("chungloai.TenCL");
$tso_listchungloai1->addColumn("chungloai.LinhTinh");
$tso_listchungloai1->addColumn("chungloai.AnHien");
$tso_listchungloai1->setDefault("chungloai.TenCL");
$tso_listchungloai1->Execute();

// Navigation
$nav_listchungloai1 = new NAV_Regular("nav_listchungloai1", "rschungloai1", "../", $_SERVER['PHP_SELF'], 30);

//NeXTenesio3 Special List Recordset
$maxRows_rschungloai1 = $_SESSION['max_rows_nav_listchungloai1'];
$pageNum_rschungloai1 = 0;
if (isset($_GET['pageNum_rschungloai1'])) {
  $pageNum_rschungloai1 = $_GET['pageNum_rschungloai1'];
}
$startRow_rschungloai1 = $pageNum_rschungloai1 * $maxRows_rschungloai1;

// Defining List Recordset variable
$NXTFilter_rschungloai1 = "1=1";
if (isset($_SESSION['filter_tfi_listchungloai1'])) {
  $NXTFilter_rschungloai1 = $_SESSION['filter_tfi_listchungloai1'];
}
// Defining List Recordset variable
$NXTSort_rschungloai1 = "chungloai.TenCL";
if (isset($_SESSION['sorter_tso_listchungloai1'])) {
  $NXTSort_rschungloai1 = $_SESSION['sorter_tso_listchungloai1'];
}
mysql_select_db($database_config, $config);

$query_rschungloai1 = "SELECT chungloai.TenCL, chungloai.LinhTinh, chungloai.AnHien, chungloai.idCL FROM chungloai WHERE {$NXTFilter_rschungloai1} ORDER BY {$NXTSort_rschungloai1}";
$query_limit_rschungloai1 = sprintf("%s LIMIT %d, %d", $query_rschungloai1, $startRow_rschungloai1, $maxRows_rschungloai1);
$rschungloai1 = mysql_query($query_limit_rschungloai1, $config) or die(mysql_error());
$row_rschungloai1 = mysql_fetch_assoc($rschungloai1);

if (isset($_GET['totalRows_rschungloai1'])) {
  $totalRows_rschungloai1 = $_GET['totalRows_rschungloai1'];
} else {
  $all_rschungloai1 = mysql_query($query_rschungloai1);
  $totalRows_rschungloai1 = mysql_num_rows($all_rschungloai1);
}
$totalPages_rschungloai1 = ceil($totalRows_rschungloai1/$maxRows_rschungloai1)-1;
//End NeXTenesio3 Special List Recordset

$nav_listchungloai1->checkBoundries();
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
  .KT_col_TenCL {width:140px; overflow:hidden;}
  .KT_col_LinhTinh {width:140px; overflow:hidden;}
  .KT_col_AnHien {width:140px; overflow:hidden;}
</style>

<div class="KT_tng" id="listchungloai1">
  <h1> Chủng loại
    <?php
  $nav_listchungloai1->Prepare();
  require("../includes/nav/NAV_Text_Statistics.inc.php");
?>
  </h1>
  <div class="KT_tnglist">
    <form action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>" method="post" id="form1">
      <div class="KT_options"> <a href="<?php echo $nav_listchungloai1->getShowAllLink(); ?>"><?php echo NXT_getResource("Show"); ?>
            <?php 
  // Show IF Conditional region1
  if (@$_GET['show_all_nav_listchungloai1'] == 1) {
?>
              <?php echo $_SESSION['default_max_rows_nav_listchungloai1']; ?>
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
  if (@$_SESSION['has_filter_tfi_listchungloai1'] == 1) {
?>
                  <a href="<?php echo $tfi_listchungloai1->getResetFilterLink(); ?>"><?php echo NXT_getResource("Reset filter"); ?></a>
                  <?php 
  // else Conditional region2
  } else { ?>
                  <a href="<?php echo $tfi_listchungloai1->getShowFilterLink(); ?>"><?php echo NXT_getResource("Show filter"); ?></a>
                  <?php } 
  // endif Conditional region2
?>
      </div>
      <table align="center" cellpadding="2" cellspacing="0" class="KT_tngtable">
        <thead>
          <tr class="KT_row_order">
            <th> <input type="checkbox" name="KT_selAll" id="KT_selAll"/>
            </th>
            <th id="TenCL" class="KT_sorter KT_col_TenCL <?php echo $tso_listchungloai1->getSortIcon('chungloai.TenCL'); ?>"> <a href="<?php echo $tso_listchungloai1->getSortLink('chungloai.TenCL'); ?>">TenCL</a> </th>
            <th id="LinhTinh" class="KT_sorter KT_col_LinhTinh <?php echo $tso_listchungloai1->getSortIcon('chungloai.LinhTinh'); ?>"> <a href="<?php echo $tso_listchungloai1->getSortLink('chungloai.LinhTinh'); ?>">LinhTinh</a> </th>
            <th id="AnHien" class="KT_sorter KT_col_AnHien <?php echo $tso_listchungloai1->getSortIcon('chungloai.AnHien'); ?>"> <a href="<?php echo $tso_listchungloai1->getSortLink('chungloai.AnHien'); ?>">AnHien</a> </th>
            <th>&nbsp;</th>
          </tr>
          <?php 
  // Show IF Conditional region3
  if (@$_SESSION['has_filter_tfi_listchungloai1'] == 1) {
?>
            <tr class="KT_row_filter">
              <td>&nbsp;</td>
              <td><input type="text" name="tfi_listchungloai1_TenCL" id="tfi_listchungloai1_TenCL" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listchungloai1_TenCL']); ?>" size="20" maxlength="30" /></td>
              <td><input type="text" name="tfi_listchungloai1_LinhTinh" id="tfi_listchungloai1_LinhTinh" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listchungloai1_LinhTinh']); ?>" size="20" maxlength="5" /></td>
              <td><input  <?php if (!(strcmp(KT_escapeAttribute(@$_SESSION['tfi_listchungloai1_AnHien']),"1"))) {echo "checked";} ?> type="checkbox" name="tfi_listchungloai1_AnHien" id="tfi_listchungloai1_AnHien" value="1" /></td>
              <td><input type="submit" name="tfi_listchungloai1" value="<?php echo NXT_getResource("Filter"); ?>" /></td>
            </tr>
            <?php } 
  // endif Conditional region3
?>
        </thead>
        <tbody>
          <?php if ($totalRows_rschungloai1 == 0) { // Show if recordset empty ?>
            <tr>
              <td colspan="5"><?php echo NXT_getResource("The table is empty or the filter you've selected is too restrictive."); ?></td>
            </tr>
            <?php } // Show if recordset empty ?>
          <?php if ($totalRows_rschungloai1 > 0) { // Show if recordset not empty ?>
            <?php do { ?>
              <tr class="<?php echo @$cnt1++%2==0 ? "" : "KT_even"; ?>">
                <td><input type="checkbox" name="kt_pk_chungloai" class="id_checkbox" value="<?php echo $row_rschungloai1['idCL']; ?>" />
                    <input type="hidden" name="idCL" class="id_field" value="<?php echo $row_rschungloai1['idCL']; ?>" />
                </td>
                <td><div class="KT_col_TenCL"><?php echo KT_FormatForList($row_rschungloai1['TenCL'], 20); ?></div></td>
                <td><div class="KT_col_LinhTinh"><?php echo KT_FormatForList($row_rschungloai1['LinhTinh'], 20); ?></div></td>
                <td><div class="KT_col_AnHien"><?php echo KT_FormatForList($row_rschungloai1['AnHien'], 20); ?></div></td>
                <td><a class="KT_edit_link" href="star_computer.php?opt=chungloaiEdit&idCL=<?php echo $row_rschungloai1['idCL']; ?>&amp;KT_back=1"><?php echo NXT_getResource("Sửa"); ?></a> <a class="KT_delete_link" href="#delete"><?php echo NXT_getResource("Xóa"); ?></a> </td>
              </tr>
              <?php } while ($row_rschungloai1 = mysql_fetch_assoc($rschungloai1)); ?>
            <?php } // Show if recordset not empty ?>
        </tbody>
      </table>
      <div class="KT_bottomnav">
        <div>
          <?php
            $nav_listchungloai1->Prepare();
            require("../includes/nav/NAV_Text_Navigation.inc.php");
          ?>
        </div>
      </div>
      <div class="KT_bottombuttons">
        <div class="KT_operations"> <a class="KT_edit_op_link" href="#" onclick="nxt_list_edit_link_form(this); return false;"><?php echo NXT_getResource("Sửa"); ?></a> <a class="KT_delete_op_link" href="#" onclick="nxt_list_delete_link_form(this); return false;"><?php echo NXT_getResource("Xóa"); ?></a> </div>
        <span>&nbsp;</span><a class="KT_additem_op_link" href="star_computer.php?opt=chungloaiEdit&KT_back=1" onclick="return nxt_list_additem(this)"><?php echo NXT_getResource("Thêm mới"); ?></a> </div>
    </form>
  </div>
  <br class="clearfixplain" />
</div>

<?php
mysql_free_result($rschungloai1);
?>
