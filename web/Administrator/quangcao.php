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
$tfi_listquangcao2 = new TFI_TableFilter($conn_config, "tfi_listquangcao2");
$tfi_listquangcao2->addColumn("quangcao.MoTa", "STRING_TYPE", "MoTa", "%");
$tfi_listquangcao2->addColumn("quangcao.Url", "STRING_TYPE", "Url", "%");
$tfi_listquangcao2->addColumn("quangcao.Ngaydang", "DATE_TYPE", "Ngaydang", "=");
$tfi_listquangcao2->addColumn("quangcao.NgayKT", "DATE_TYPE", "NgayKT", "=");
$tfi_listquangcao2->addColumn("quangcao.AnHien", "NUMERIC_TYPE", "AnHien", "=");
$tfi_listquangcao2->Execute();

// Sorter
$tso_listquangcao2 = new TSO_TableSorter("rsquangcao1", "tso_listquangcao2");
$tso_listquangcao2->addColumn("quangcao.MoTa");
$tso_listquangcao2->addColumn("quangcao.Url");
$tso_listquangcao2->addColumn("quangcao.Ngaydang");
$tso_listquangcao2->addColumn("quangcao.NgayKT");
$tso_listquangcao2->addColumn("quangcao.AnHien");
$tso_listquangcao2->setDefault("quangcao.MoTa");
$tso_listquangcao2->Execute();

// Navigation
$nav_listquangcao2 = new NAV_Regular("nav_listquangcao2", "rsquangcao1", "../", $_SERVER['PHP_SELF'], 10);

//NeXTenesio3 Special List Recordset
$maxRows_rsquangcao1 = $_SESSION['max_rows_nav_listquangcao2'];
$pageNum_rsquangcao1 = 0;
if (isset($_GET['pageNum_rsquangcao1'])) {
  $pageNum_rsquangcao1 = $_GET['pageNum_rsquangcao1'];
}
$startRow_rsquangcao1 = $pageNum_rsquangcao1 * $maxRows_rsquangcao1;

// Defining List Recordset variable
$NXTFilter_rsquangcao1 = "1=1";
if (isset($_SESSION['filter_tfi_listquangcao2'])) {
  $NXTFilter_rsquangcao1 = $_SESSION['filter_tfi_listquangcao2'];
}
// Defining List Recordset variable
$NXTSort_rsquangcao1 = "quangcao.MoTa";
if (isset($_SESSION['sorter_tso_listquangcao2'])) {
  $NXTSort_rsquangcao1 = $_SESSION['sorter_tso_listquangcao2'];
}
mysql_select_db($database_config, $config);

$query_rsquangcao1 = "SELECT quangcao.MoTa, quangcao.Url, quangcao.Ngaydang, quangcao.NgayKT, quangcao.AnHien, quangcao.idQC FROM quangcao WHERE {$NXTFilter_rsquangcao1} ORDER BY {$NXTSort_rsquangcao1}";
$query_limit_rsquangcao1 = sprintf("%s LIMIT %d, %d", $query_rsquangcao1, $startRow_rsquangcao1, $maxRows_rsquangcao1);
$rsquangcao1 = mysql_query($query_limit_rsquangcao1, $config) or die(mysql_error());
$row_rsquangcao1 = mysql_fetch_assoc($rsquangcao1);

if (isset($_GET['totalRows_rsquangcao1'])) {
  $totalRows_rsquangcao1 = $_GET['totalRows_rsquangcao1'];
} else {
  $all_rsquangcao1 = mysql_query($query_rsquangcao1);
  $totalRows_rsquangcao1 = mysql_num_rows($all_rsquangcao1);
}
$totalPages_rsquangcao1 = ceil($totalRows_rsquangcao1/$maxRows_rsquangcao1)-1;
//End NeXTenesio3 Special List Recordset

$nav_listquangcao2->checkBoundries();
?>
<?php require_once('../Connections/config.php'); ?>
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
  .KT_col_MoTa {width:140px; overflow:hidden;}
  .KT_col_Url {width:140px; overflow:hidden;}
  .KT_col_Ngaydang {width:140px; overflow:hidden;}
  .KT_col_NgayKT {width:70px; overflow:hidden;}
  .KT_col_AnHien {width:70px; overflow:hidden;}
</style>
<p>&nbsp;
<div class="KT_tng" id="listquangcao2">
  <h1> Quảng cáo
    <?php
  $nav_listquangcao2->Prepare();
  require("../includes/nav/NAV_Text_Statistics.inc.php");
?>
  </h1>
  <div class="KT_tnglist">
    <form action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>" method="post" id="form1">
      <div class="KT_options"> <a href="<?php echo $nav_listquangcao2->getShowAllLink(); ?>"><?php echo NXT_getResource("Show"); ?>
        <?php 
  // Show IF Conditional region1
  if (@$_GET['show_all_nav_listquangcao2'] == 1) {
?>
          <?php echo $_SESSION['default_max_rows_nav_listquangcao2']; ?>
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
  if (@$_SESSION['has_filter_tfi_listquangcao2'] == 1) {
?>
                  <a href="<?php echo $tfi_listquangcao2->getResetFilterLink(); ?>"><?php echo NXT_getResource("Reset filter"); ?></a>
                  <?php 
  // else Conditional region2
  } else { ?>
                  <a href="<?php echo $tfi_listquangcao2->getShowFilterLink(); ?>"><?php echo NXT_getResource("Show filter"); ?></a>
                  <?php } 
  // endif Conditional region2
?>
      </div>
      <table align="center" cellpadding="2" cellspacing="0" class="KT_tngtable">
        <thead>
          <tr class="KT_row_order">
            <th> <input type="checkbox" name="KT_selAll" id="KT_selAll"/>            </th>
            <th align="center" class="KT_sorter KT_col_MoTa <?php echo $tso_listquangcao2->getSortIcon('quangcao.MoTa'); ?>" id="MoTa"> <a href="<?php echo $tso_listquangcao2->getSortLink('quangcao.MoTa'); ?>">Mô tả</a> </th>
            <th id="Url" class="KT_sorter KT_col_Url <?php echo $tso_listquangcao2->getSortIcon('quangcao.Url'); ?>"> <a href="<?php echo $tso_listquangcao2->getSortLink('quangcao.Url'); ?>">Link</a> </th>
            <th id="Ngaydang" class="KT_sorter KT_col_Ngaydang <?php echo $tso_listquangcao2->getSortIcon('quangcao.Ngaydang'); ?>"> <div align="center"><a href="<?php echo $tso_listquangcao2->getSortLink('quangcao.Ngaydang'); ?>">Ngày đăng <br />
            quảng cáo</a> </div></th>
            <th id="NgayKT" class="KT_sorter KT_col_NgayKT <?php echo $tso_listquangcao2->getSortIcon('quangcao.NgayKT'); ?>"> <a href="<?php echo $tso_listquangcao2->getSortLink('quangcao.NgayKT'); ?>">Ngày kết thúc</a> </th>
            <th id="AnHien" class="KT_sorter KT_col_AnHien <?php echo $tso_listquangcao2->getSortIcon('quangcao.AnHien'); ?>"> <a href="<?php echo $tso_listquangcao2->getSortLink('quangcao.AnHien'); ?>">Hiện</a> </th>
            <th>&nbsp;</th>
          </tr>
          <?php 
  // Show IF Conditional region3
  if (@$_SESSION['has_filter_tfi_listquangcao2'] == 1) {
?>
            <tr class="KT_row_filter">
              <td>&nbsp;</td>
              <td><input type="text" name="tfi_listquangcao2_MoTa" id="tfi_listquangcao2_MoTa" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listquangcao2_MoTa']); ?>" size="20" maxlength="100" /></td>
              <td><input type="text" name="tfi_listquangcao2_Url" id="tfi_listquangcao2_Url" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listquangcao2_Url']); ?>" size="20" maxlength="250" /></td>
              <td><input type="text" name="tfi_listquangcao2_Ngaydang" id="tfi_listquangcao2_Ngaydang" value="<?php echo @$_SESSION['tfi_listquangcao2_Ngaydang']; ?>" size="10" maxlength="22" /></td>
              <td><div align="center">
                <input type="text" name="tfi_listquangcao2_NgayKT" id="tfi_listquangcao2_NgayKT" value="<?php echo @$_SESSION['tfi_listquangcao2_NgayKT']; ?>" size="10" maxlength="22" />
              </div></td>
              <td><select name="tfi_listquangcao2_AnHien" id="tfi_listquangcao2_AnHien">
                  <option value="menuitem1" <?php if (!(strcmp("menuitem1", KT_escapeAttribute(@$_SESSION['tfi_listquangcao2_AnHien'])))) {echo "SELECTED";} ?>>[ Label ]</option>
                  <option value="menuitem2" <?php if (!(strcmp("menuitem2", KT_escapeAttribute(@$_SESSION['tfi_listquangcao2_AnHien'])))) {echo "SELECTED";} ?>>[ Label ]</option>
                </select>              </td>
              <td><input type="submit" name="tfi_listquangcao2" value="<?php echo NXT_getResource("Filter"); ?>" /></td>
            </tr>
            <?php } 
  // endif Conditional region3
?>
        </thead>
        <tbody>
          <?php if ($totalRows_rsquangcao1 == 0) { // Show if recordset empty ?>
            <tr>
              <td colspan="7"><?php echo NXT_getResource("The table is empty or the filter you've selected is too restrictive."); ?></td>
            </tr>
            <?php } // Show if recordset empty ?>
          <?php if ($totalRows_rsquangcao1 > 0) { // Show if recordset not empty ?>
            <?php do { ?>
              <tr class="<?php echo @$cnt1++%2==0 ? "" : "KT_even"; ?>">
                <td><input type="checkbox" name="kt_pk_quangcao" class="id_checkbox" value="<?php echo $row_rsquangcao1['idQC']; ?>" />
                    <input type="hidden" name="idQC" class="id_field" value="<?php echo $row_rsquangcao1['idQC']; ?>" />                </td>
                <td><div class="KT_col_MoTa"><?php echo KT_FormatForList($row_rsquangcao1['MoTa'], 20); ?></div></td>
                <td><div class="KT_col_Url"><?php echo KT_FormatForList($row_rsquangcao1['Url'], 20); ?></div></td>
                <td><div class="KT_col_Ngaydang"><?php echo KT_formatDate($row_rsquangcao1['Ngaydang']); ?></div></td>
                <td><div class="KT_col_NgayKT"><?php echo KT_formatDate($row_rsquangcao1['NgayKT']); ?></div></td>
                <td><div class="KT_col_AnHien"><?php echo KT_FormatForList($row_rsquangcao1['AnHien'], 10); ?></div></td>
                <td><a class="KT_edit_link" href="star_computer.php?opt=quangcaoEdit&idQC=<?php echo $row_rsquangcao1['idQC']; ?>&amp;KT_back=1"><?php echo NXT_getResource("Sửa"); ?></a> <a class="KT_delete_link" href="#delete"><?php echo NXT_getResource("Xóa"); ?></a> </td>
              </tr>
              <?php } while ($row_rsquangcao1 = mysql_fetch_assoc($rsquangcao1)); ?>
            <?php } // Show if recordset not empty ?>
        </tbody>
      </table>
      <div class="KT_bottomnav">
        <div>
          <?php
            $nav_listquangcao2->Prepare();
            require("../includes/nav/NAV_Text_Navigation.inc.php");
          ?>
        </div>
      </div>
      <div class="KT_bottombuttons">
        <div class="KT_operations"> <a class="KT_edit_op_link" href="#" onclick="nxt_list_edit_link_form(this); return false;"><?php echo NXT_getResource("Sửa"); ?></a> <a class="KT_delete_op_link" href="#" onclick="nxt_list_delete_link_form(this); return false;"><?php echo NXT_getResource("Xóa"); ?></a> </div>
<span>&nbsp;</span><a class="KT_additem_op_link" href="star_computer.php?opt=quangcaoEdit&KT_back=1" onclick="return nxt_list_additem(this)"><?php echo NXT_getResource("Thêm mới"); ?></a> </div>
    </form>
  </div>
  <br class="clearfixplain" />
</div>
</p>
<?php
mysql_free_result($rsquangcao1);
?>
