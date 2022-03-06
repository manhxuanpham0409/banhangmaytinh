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
$tfi_listhiensomautin1 = new TFI_TableFilter($conn_config, "tfi_listhiensomautin1");
$tfi_listhiensomautin1->addColumn("hiensomautin.TenMauTin", "STRING_TYPE", "TenMauTin", "%");
$tfi_listhiensomautin1->addColumn("hiensomautin.SoMauTin", "NUMERIC_TYPE", "SoMauTin", "=");
$tfi_listhiensomautin1->Execute();

// Sorter
$tso_listhiensomautin1 = new TSO_TableSorter("rshiensomautin1", "tso_listhiensomautin1");
$tso_listhiensomautin1->addColumn("hiensomautin.TenMauTin");
$tso_listhiensomautin1->addColumn("hiensomautin.SoMauTin");
$tso_listhiensomautin1->setDefault("hiensomautin.TenMauTin");
$tso_listhiensomautin1->Execute();

// Navigation
$nav_listhiensomautin1 = new NAV_Regular("nav_listhiensomautin1", "rshiensomautin1", "../", $_SERVER['PHP_SELF'], 10);

//NeXTenesio3 Special List Recordset
$maxRows_rshiensomautin1 = $_SESSION['max_rows_nav_listhiensomautin1'];
$pageNum_rshiensomautin1 = 0;
if (isset($_GET['pageNum_rshiensomautin1'])) {
  $pageNum_rshiensomautin1 = $_GET['pageNum_rshiensomautin1'];
}
$startRow_rshiensomautin1 = $pageNum_rshiensomautin1 * $maxRows_rshiensomautin1;

// Defining List Recordset variable
$NXTFilter_rshiensomautin1 = "1=1";
if (isset($_SESSION['filter_tfi_listhiensomautin1'])) {
  $NXTFilter_rshiensomautin1 = $_SESSION['filter_tfi_listhiensomautin1'];
}
// Defining List Recordset variable
$NXTSort_rshiensomautin1 = "hiensomautin.TenMauTin";
if (isset($_SESSION['sorter_tso_listhiensomautin1'])) {
  $NXTSort_rshiensomautin1 = $_SESSION['sorter_tso_listhiensomautin1'];
}
mysql_select_db($database_config, $config);

$query_rshiensomautin1 = "SELECT hiensomautin.TenMauTin, hiensomautin.SoMauTin, hiensomautin.idSoMauTin FROM hiensomautin WHERE {$NXTFilter_rshiensomautin1} ORDER BY {$NXTSort_rshiensomautin1}";
$query_limit_rshiensomautin1 = sprintf("%s LIMIT %d, %d", $query_rshiensomautin1, $startRow_rshiensomautin1, $maxRows_rshiensomautin1);
$rshiensomautin1 = mysql_query($query_limit_rshiensomautin1, $config) or die(mysql_error());
$row_rshiensomautin1 = mysql_fetch_assoc($rshiensomautin1);

if (isset($_GET['totalRows_rshiensomautin1'])) {
  $totalRows_rshiensomautin1 = $_GET['totalRows_rshiensomautin1'];
} else {
  $all_rshiensomautin1 = mysql_query($query_rshiensomautin1);
  $totalRows_rshiensomautin1 = mysql_num_rows($all_rshiensomautin1);
}
$totalPages_rshiensomautin1 = ceil($totalRows_rshiensomautin1/$maxRows_rshiensomautin1)-1;
//End NeXTenesio3 Special List Recordset

$nav_listhiensomautin1->checkBoundries();
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
  .KT_col_TenMauTin {width:350px; overflow:hidden;}
  .KT_col_SoMauTin {width:210px; overflow:hidden;}
</style>

<div class="KT_tng" id="listhiensomautin1">
  <h1> Hiện thị số mẫu tin
    <?php
  $nav_listhiensomautin1->Prepare();
  require("../includes/nav/NAV_Text_Statistics.inc.php");
?>
  </h1>
  <div class="KT_tnglist">
    <form action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>" method="post" id="form1">
      <div class="KT_options"> <a href="<?php echo $nav_listhiensomautin1->getShowAllLink(); ?>"><?php echo NXT_getResource("Show"); ?>
            <?php 
  // Show IF Conditional region1
  if (@$_GET['show_all_nav_listhiensomautin1'] == 1) {
?>
              <?php echo $_SESSION['default_max_rows_nav_listhiensomautin1']; ?>
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
  if (@$_SESSION['has_filter_tfi_listhiensomautin1'] == 1) {
?>
                  <a href="<?php echo $tfi_listhiensomautin1->getResetFilterLink(); ?>"><?php echo NXT_getResource("Reset filter"); ?></a>
                  <?php 
  // else Conditional region2
  } else { ?>
                  <a href="<?php echo $tfi_listhiensomautin1->getShowFilterLink(); ?>"><?php echo NXT_getResource("Show filter"); ?></a>
                  <?php } 
  // endif Conditional region2
?>
      </div>
      <table align="center" cellpadding="4" cellspacing="0" class="KT_tngtable">
        <thead>
          <tr class="KT_row_order">
            <th> <input type="checkbox" name="KT_selAll" id="KT_selAll"/>
            </th>
            <th id="TenMauTin" class="KT_sorter KT_col_TenMauTin <?php echo $tso_listhiensomautin1->getSortIcon('hiensomautin.TenMauTin'); ?>"> <a href="<?php echo $tso_listhiensomautin1->getSortLink('hiensomautin.TenMauTin'); ?>">Tên mẫu tin</a> </th>
            <th id="SoMauTin" class="KT_sorter KT_col_SoMauTin <?php echo $tso_listhiensomautin1->getSortIcon('hiensomautin.SoMauTin'); ?>"> <a href="<?php echo $tso_listhiensomautin1->getSortLink('hiensomautin.SoMauTin'); ?>">Số mẫu tin được hiển thị</a> </th>
            <th>&nbsp;</th>
          </tr>
          <?php 
  // Show IF Conditional region3
  if (@$_SESSION['has_filter_tfi_listhiensomautin1'] == 1) {
?>
            <tr class="KT_row_filter">
              <td>&nbsp;</td>
              <td><input type="text" name="tfi_listhiensomautin1_TenMauTin" id="tfi_listhiensomautin1_TenMauTin" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listhiensomautin1_TenMauTin']); ?>" size="20" maxlength="100" /></td>
              <td><input type="text" name="tfi_listhiensomautin1_SoMauTin" id="tfi_listhiensomautin1_SoMauTin" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listhiensomautin1_SoMauTin']); ?>" size="20" maxlength="100" /></td>
              <td><input type="submit" name="tfi_listhiensomautin1" value="<?php echo NXT_getResource("Filter"); ?>" /></td>
            </tr>
            <?php } 
  // endif Conditional region3
?>
        </thead>
        <tbody>
          <?php if ($totalRows_rshiensomautin1 == 0) { // Show if recordset empty ?>
            <tr>
              <td colspan="4"><?php echo NXT_getResource("The table is empty or the filter you've selected is too restrictive."); ?></td>
            </tr>
            <?php } // Show if recordset empty ?>
          <?php if ($totalRows_rshiensomautin1 > 0) { // Show if recordset not empty ?>
            <?php do { ?>
              <tr class="<?php echo @$cnt1++%2==0 ? "" : "KT_even"; ?>">
                <td><input type="checkbox" name="kt_pk_hiensomautin" class="id_checkbox" value="<?php echo $row_rshiensomautin1['idSoMauTin']; ?>" />
                    <input type="hidden" name="idSoMauTin" class="id_field" value="<?php echo $row_rshiensomautin1['idSoMauTin']; ?>" />
                </td>
                <td><div class="KT_col_TenMauTin"><?php echo KT_FormatForList($row_rshiensomautin1['TenMauTin'], 50); ?></div></td>
                <td><div class="KT_col_SoMauTin"><?php echo KT_FormatForList($row_rshiensomautin1['SoMauTin'], 30); ?></div></td>
                <td><a class="KT_edit_link" href="star_computer.php?opt=hienthisomautinEdit&idSoMauTin=<?php echo $row_rshiensomautin1['idSoMauTin']; ?>&amp;KT_back=1"><?php echo NXT_getResource("Sửa"); ?></a></td>
              </tr>
              <?php } while ($row_rshiensomautin1 = mysql_fetch_assoc($rshiensomautin1)); ?>
            <?php } // Show if recordset not empty ?>
        </tbody>
      </table>
      <div class="KT_bottomnav">
        <div>
          <?php
            $nav_listhiensomautin1->Prepare();
            require("../includes/nav/NAV_Text_Navigation.inc.php");
          ?>
        </div>
      </div>
      <div class="KT_bottombuttons">
        <div class="KT_operations"> <a class="KT_edit_op_link" href="#" onclick="nxt_list_edit_link_form(this); return false;"><?php echo NXT_getResource("Sửa"); ?></a></div>
        <span>&nbsp;</span><a class="KT_additem_op_link" href="star_computer.php?opt=hienthisomautinEdit&KT_back=1" onclick="return nxt_list_additem(this)"><?php echo NXT_getResource("Thêm mới"); ?></a> </div>
    </form>
  </div>
  <br class="clearfixplain" />
</div>
<?php
mysql_free_result($rshiensomautin1);
?>
