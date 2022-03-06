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
$tfi_listmenu1 = new TFI_TableFilter($conn_config, "tfi_listmenu1");
$tfi_listmenu1->addColumn("menu.Ten", "STRING_TYPE", "Ten", "%");
$tfi_listmenu1->addColumn("menu.Url", "STRING_TYPE", "Url", "%");
$tfi_listmenu1->addColumn("menu.topmenu", "NUMERIC_TYPE", "topmenu", "=");
$tfi_listmenu1->addColumn("menu.mainmenu", "NUMERIC_TYPE", "mainmenu", "=");
$tfi_listmenu1->addColumn("menu.footer", "NUMERIC_TYPE", "footer", "=");
$tfi_listmenu1->addColumn("menu.AnHien", "NUMERIC_TYPE", "AnHien", "=");
$tfi_listmenu1->Execute();

// Sorter
$tso_listmenu1 = new TSO_TableSorter("rsmenu1", "tso_listmenu1");
$tso_listmenu1->addColumn("menu.Ten");
$tso_listmenu1->addColumn("menu.Url");
$tso_listmenu1->addColumn("menu.topmenu");
$tso_listmenu1->addColumn("menu.mainmenu");
$tso_listmenu1->addColumn("menu.footer");
$tso_listmenu1->addColumn("menu.AnHien");
$tso_listmenu1->setDefault("menu.Ten");
$tso_listmenu1->Execute();

// Navigation
$nav_listmenu1 = new NAV_Regular("nav_listmenu1", "rsmenu1", "../", $_SERVER['PHP_SELF'], 20);

//NeXTenesio3 Special List Recordset
$maxRows_rsmenu1 = $_SESSION['max_rows_nav_listmenu1'];
$pageNum_rsmenu1 = 0;
if (isset($_GET['pageNum_rsmenu1'])) {
  $pageNum_rsmenu1 = $_GET['pageNum_rsmenu1'];
}
$startRow_rsmenu1 = $pageNum_rsmenu1 * $maxRows_rsmenu1;

// Defining List Recordset variable
$NXTFilter_rsmenu1 = "1=1";
if (isset($_SESSION['filter_tfi_listmenu1'])) {
  $NXTFilter_rsmenu1 = $_SESSION['filter_tfi_listmenu1'];
}
// Defining List Recordset variable
$NXTSort_rsmenu1 = "menu.Ten";
if (isset($_SESSION['sorter_tso_listmenu1'])) {
  $NXTSort_rsmenu1 = $_SESSION['sorter_tso_listmenu1'];
}
mysql_select_db($database_config, $config);

$query_rsmenu1 = "SELECT menu.Ten, menu.Url, menu.topmenu, menu.mainmenu, menu.footer, menu.AnHien, menu.id FROM menu WHERE {$NXTFilter_rsmenu1} ORDER BY {$NXTSort_rsmenu1}";
$query_limit_rsmenu1 = sprintf("%s LIMIT %d, %d", $query_rsmenu1, $startRow_rsmenu1, $maxRows_rsmenu1);
$rsmenu1 = mysql_query($query_limit_rsmenu1, $config) or die(mysql_error());
$row_rsmenu1 = mysql_fetch_assoc($rsmenu1);

if (isset($_GET['totalRows_rsmenu1'])) {
  $totalRows_rsmenu1 = $_GET['totalRows_rsmenu1'];
} else {
  $all_rsmenu1 = mysql_query($query_rsmenu1);
  $totalRows_rsmenu1 = mysql_num_rows($all_rsmenu1);
}
$totalPages_rsmenu1 = ceil($totalRows_rsmenu1/$maxRows_rsmenu1)-1;
//End NeXTenesio3 Special List Recordset

$nav_listmenu1->checkBoundries();
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
  .KT_col_Url {width:140px; overflow:hidden;}
  .KT_col_topmenu {width:70px; overflow:hidden;}
  .KT_col_mainmenu {width:70px; overflow:hidden;}
  .KT_col_footer {width:70px; overflow:hidden;}
  .KT_col_AnHien {width:70px; overflow:hidden;}
</style>
<div class="KT_tng" id="listmenu1">
  <h1> Menu
    <?php
  $nav_listmenu1->Prepare();
  require("../includes/nav/NAV_Text_Statistics.inc.php");
?>
  </h1>
  <div class="KT_tnglist">
    <form action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>" method="post" id="form1">
      <div class="KT_options"> <a href="<?php echo $nav_listmenu1->getShowAllLink(); ?>"><?php echo NXT_getResource("Show"); ?>
            <?php 
  // Show IF Conditional region1
  if (@$_GET['show_all_nav_listmenu1'] == 1) {
?>
              <?php echo $_SESSION['default_max_rows_nav_listmenu1']; ?>
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
  if (@$_SESSION['has_filter_tfi_listmenu1'] == 1) {
?>
                  <a href="<?php echo $tfi_listmenu1->getResetFilterLink(); ?>"><?php echo NXT_getResource("Reset filter"); ?></a>
                  <?php 
  // else Conditional region2
  } else { ?>
                  <a href="<?php echo $tfi_listmenu1->getShowFilterLink(); ?>"><?php echo NXT_getResource("Show filter"); ?></a>
                  <?php } 
  // endif Conditional region2
?>
      </div>
      <table cellpadding="2" cellspacing="0" class="KT_tngtable">
        <thead>
          <tr class="KT_row_order">
            <th> <input type="checkbox" name="KT_selAll" id="KT_selAll"/>            </th>
            <th id="Ten" class="KT_sorter KT_col_Ten <?php echo $tso_listmenu1->getSortIcon('menu.Ten'); ?>"> <a href="<?php echo $tso_listmenu1->getSortLink('menu.Ten'); ?>">Tên menu</a> </th>
            <th id="Url" class="KT_sorter KT_col_Url <?php echo $tso_listmenu1->getSortIcon('menu.Url'); ?>"> <a href="<?php echo $tso_listmenu1->getSortLink('menu.Url'); ?>">Tên file</a> </th>
            <th id="topmenu" class="KT_sorter KT_col_topmenu <?php echo $tso_listmenu1->getSortIcon('menu.topmenu'); ?>"> <a href="<?php echo $tso_listmenu1->getSortLink('menu.topmenu'); ?>">Topmenu</a> </th>
            <th id="mainmenu" class="KT_sorter KT_col_mainmenu <?php echo $tso_listmenu1->getSortIcon('menu.mainmenu'); ?>"> <a href="<?php echo $tso_listmenu1->getSortLink('menu.mainmenu'); ?>">Mainmenu</a> </th>
            <th id="footer" class="KT_sorter KT_col_footer <?php echo $tso_listmenu1->getSortIcon('menu.footer'); ?>"> <a href="<?php echo $tso_listmenu1->getSortLink('menu.footer'); ?>">Footer</a> </th>
            <th id="AnHien" class="KT_sorter KT_col_AnHien <?php echo $tso_listmenu1->getSortIcon('menu.AnHien'); ?>"> <a href="<?php echo $tso_listmenu1->getSortLink('menu.AnHien'); ?>">Hiện</a> </th>
            <th>&nbsp;</th>
          </tr>
          <?php 
  // Show IF Conditional region3
  if (@$_SESSION['has_filter_tfi_listmenu1'] == 1) {
?>
            <tr class="KT_row_filter">
              <td>&nbsp;</td>
              <td><input type="text" name="tfi_listmenu1_Ten" id="tfi_listmenu1_Ten" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listmenu1_Ten']); ?>" size="20" maxlength="100" /></td>
              <td><input type="text" name="tfi_listmenu1_Url" id="tfi_listmenu1_Url" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listmenu1_Url']); ?>" size="20" maxlength="100" /></td>
              <td><input type="text" name="tfi_listmenu1_topmenu" id="tfi_listmenu1_topmenu" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listmenu1_topmenu']); ?>" size="10" maxlength="100" /></td>
              <td><input type="text" name="tfi_listmenu1_mainmenu" id="tfi_listmenu1_mainmenu" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listmenu1_mainmenu']); ?>" size="10" maxlength="100" /></td>
              <td><input type="text" name="tfi_listmenu1_footer" id="tfi_listmenu1_footer" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listmenu1_footer']); ?>" size="10" maxlength="100" /></td>
              <td><input type="text" name="tfi_listmenu1_AnHien" id="tfi_listmenu1_AnHien" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listmenu1_AnHien']); ?>" size="10" maxlength="100" /></td>
              <td><input type="submit" name="tfi_listmenu1" value="<?php echo NXT_getResource("Filter"); ?>" /></td>
            </tr>
            <?php } 
  // endif Conditional region3
?>
        </thead>
        <tbody>
          <?php if ($totalRows_rsmenu1 == 0) { // Show if recordset empty ?>
            <tr>
              <td colspan="8"><?php echo NXT_getResource("The table is empty or the filter you've selected is too restrictive."); ?></td>
            </tr>
            <?php } // Show if recordset empty ?>
          <?php if ($totalRows_rsmenu1 > 0) { // Show if recordset not empty ?>
            <?php do { ?>
              <tr class="<?php echo @$cnt1++%2==0 ? "" : "KT_even"; ?>">
                <td><input type="checkbox" name="kt_pk_menu" class="id_checkbox" value="<?php echo $row_rsmenu1['id']; ?>" />
                    <input type="hidden" name="id" class="id_field" value="<?php echo $row_rsmenu1['id']; ?>" />                </td>
                <td><div class="KT_col_Ten"><?php echo KT_FormatForList($row_rsmenu1['Ten'], 20); ?></div></td>
                <td><div class="KT_col_Url"><?php echo KT_FormatForList($row_rsmenu1['Url'], 20); ?></div></td>
                <td><div class="KT_col_topmenu"><?php echo KT_FormatForList($row_rsmenu1['topmenu'], 10); ?></div></td>
                <td><div class="KT_col_mainmenu"><?php echo KT_FormatForList($row_rsmenu1['mainmenu'], 10); ?></div></td>
                <td><div class="KT_col_footer"><?php echo KT_FormatForList($row_rsmenu1['footer'], 10); ?></div></td>
                <td><div class="KT_col_AnHien"><?php echo KT_FormatForList($row_rsmenu1['AnHien'], 10); ?></div></td>
                <td><a class="KT_edit_link" href="star_computer.php?opt=menuEdit&id=<?php echo $row_rsmenu1['id']; ?>&amp;KT_back=1"><?php echo NXT_getResource("Sửa"); ?></a><a class="KT_delete_link" href="#delete"><?php echo NXT_getResource("Xóa"); ?></a> </td>
              </tr>
              <?php } while ($row_rsmenu1 = mysql_fetch_assoc($rsmenu1)); ?>
            <?php } // Show if recordset not empty ?>
        </tbody>
      </table>
      <div class="KT_bottomnav">
        <div>
          <?php
            $nav_listmenu1->Prepare();
            require("../includes/nav/NAV_Text_Navigation.inc.php");
          ?>
        </div>
      </div>
      <div class="KT_bottombuttons">
        <div class="KT_operations"> <a class="KT_edit_op_link" href="#" onClick="nxt_list_edit_link_form(this); return false;"><?php echo NXT_getResource("Sửa"); ?></a> <a class="KT_delete_op_link" href="#" onClick="nxt_list_delete_link_form(this); return false;"><?php echo NXT_getResource("Xóa"); ?></a> </div>
        <span>&nbsp;</span><a class="KT_additem_op_link" href="star_computer.php?opt=menuEdit&KT_back=1" onClick="return nxt_list_additem(this)"><?php echo NXT_getResource("Thêm mới"); ?></a> </div>
    </form>
  </div>
  <br class="clearfixplain" />
</div>
<?php
mysql_free_result($rsmenu1);
?>
