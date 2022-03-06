<?php require_once('../Connections/config.php');?>
<?php
// Load the common classes
ob_start();
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
$tfi_listusers3 = new TFI_TableFilter($conn_config, "tfi_listusers3");
$tfi_listusers3->addColumn("users.HoTen", "STRING_TYPE", "HoTen", "%");
$tfi_listusers3->addColumn("users.Username", "STRING_TYPE", "Username", "%");
$tfi_listusers3->addColumn("users.DiaChi", "STRING_TYPE", "DiaChi", "%");
$tfi_listusers3->addColumn("users.NgaySinh", "DATE_TYPE", "NgaySinh", "=");
$tfi_listusers3->addColumn("users.Email", "STRING_TYPE", "Email", "%");
$tfi_listusers3->Execute();

// Sorter
$tso_listusers3 = new TSO_TableSorter("rsusers1", "tso_listusers3");
$tso_listusers3->addColumn("users.HoTen");
$tso_listusers3->addColumn("users.Username");
$tso_listusers3->addColumn("users.DiaChi");
$tso_listusers3->addColumn("users.NgaySinh");
$tso_listusers3->addColumn("users.Email");
$tso_listusers3->setDefault("users.HoTen");
$tso_listusers3->Execute();

// Navigation
$nav_listusers3 = new NAV_Regular("nav_listusers3", "rsusers1", "../", $_SERVER['PHP_SELF'], 20);

//NeXTenesio3 Special List Recordset
$maxRows_rsusers1 = $_SESSION['max_rows_nav_listusers3'];
$pageNum_rsusers1 = 0;
if (isset($_GET['pageNum_rsusers1'])) {
  $pageNum_rsusers1 = $_GET['pageNum_rsusers1'];
}
$startRow_rsusers1 = $pageNum_rsusers1 * $maxRows_rsusers1;

// Defining List Recordset variable
$NXTFilter_rsusers1 = "1=1";
if (isset($_SESSION['filter_tfi_listusers3'])) {
  $NXTFilter_rsusers1 = $_SESSION['filter_tfi_listusers3'];
}
// Defining List Recordset variable
$NXTSort_rsusers1 = "users.HoTen";
if (isset($_SESSION['sorter_tso_listusers3'])) {
  $NXTSort_rsusers1 = $_SESSION['sorter_tso_listusers3'];
}
mysql_select_db($database_config, $config);

$query_rsusers1 = "SELECT users.HoTen, users.Username, users.GioiTinh, users.DiaChi, users.Dienthoai, users.NgaySinh, users.Email, users.NgayDangKy, users.idUser FROM users WHERE {$NXTFilter_rsusers1} ORDER BY {$NXTSort_rsusers1}";
$query_limit_rsusers1 = sprintf("%s LIMIT %d, %d", $query_rsusers1, $startRow_rsusers1, $maxRows_rsusers1);
$rsusers1 = mysql_query($query_limit_rsusers1, $config) or die(mysql_error());
$row_rsusers1 = mysql_fetch_assoc($rsusers1);

if (isset($_GET['totalRows_rsusers1'])) {
  $totalRows_rsusers1 = $_GET['totalRows_rsusers1'];
} else {
  $all_rsusers1 = mysql_query($query_rsusers1);
  $totalRows_rsusers1 = mysql_num_rows($all_rsusers1);
}
$totalPages_rsusers1 = ceil($totalRows_rsusers1/$maxRows_rsusers1)-1;
//End NeXTenesio3 Special List Recordset

$nav_listusers3->checkBoundries();
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
  .KT_col_HoTen {width:140px; overflow:hidden;}
  .KT_col_Username {width:105px; overflow:hidden;}
  .KT_col_DiaChi {width:210px; overflow:hidden;}
  .KT_col_NgaySinh {width:70px; overflow:hidden;}
  .KT_col_Email {width:196px; overflow:hidden;}
</style>
<div class="KT_tng" id="listusers3">
  <h1>Quản lý user
    <?php
  $nav_listusers3->Prepare();
  require("../includes/nav/NAV_Text_Statistics.inc.php");
?>
  </h1>
  <div class="KT_tnglist">
    <form action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>" method="post" id="form1">
      <div class="KT_options"> <a href="<?php echo $nav_listusers3->getShowAllLink(); ?>"><?php echo NXT_getResource("Show"); ?>
        <?php 
  // Show IF Conditional region1
  if (@$_GET['show_all_nav_listusers3'] == 1) {
?>
          <?php echo $_SESSION['default_max_rows_nav_listusers3']; ?>
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
  if (@$_SESSION['has_filter_tfi_listusers3'] == 1) {
?>
                  <a href="<?php echo $tfi_listusers3->getResetFilterLink(); ?>"><?php echo NXT_getResource("Reset filter"); ?></a>
                  <?php 
  // else Conditional region2
  } else { ?>
                  <?php } 
  // endif Conditional region2
?>
      </div>
      <table width="900" align="center" cellpadding="2" cellspacing="0" class="KT_tngtable">
        <thead>
          <tr class="KT_row_order">
            <th> <input type="checkbox" name="KT_selAll" id="KT_selAll"/>
            </th>
            <th id="HoTen" class="KT_sorter KT_col_HoTen <?php echo $tso_listusers3->getSortIcon('users.HoTen'); ?>"> <a href="<?php echo $tso_listusers3->getSortLink('users.HoTen'); ?>">Họ tên</a> </th>
            <th id="Username" class="KT_sorter KT_col_Username <?php echo $tso_listusers3->getSortIcon('users.Username'); ?>"> <a href="<?php echo $tso_listusers3->getSortLink('users.Username'); ?>">Tên đăng nhập</a> </th>
            <th id="DiaChi" class="KT_sorter KT_col_DiaChi <?php echo $tso_listusers3->getSortIcon('users.DiaChi'); ?>"> <a href="<?php echo $tso_listusers3->getSortLink('users.DiaChi'); ?>">Địa chỉ</a> </th>
            <th id="NgaySinh" class="KT_sorter KT_col_NgaySinh <?php echo $tso_listusers3->getSortIcon('users.NgaySinh'); ?>"> <a href="<?php echo $tso_listusers3->getSortLink('users.NgaySinh'); ?>">Ngày sinh</a> </th>
            <th id="Email" class="KT_sorter KT_col_Email <?php echo $tso_listusers3->getSortIcon('users.Email'); ?>"> <a href="<?php echo $tso_listusers3->getSortLink('users.Email'); ?>">Email</a> </th>
            <th>&nbsp;</th>
          </tr>
          <?php 
  // Show IF Conditional region3
  if (@$_SESSION['has_filter_tfi_listusers3'] == 1) {
?>
            <tr class="KT_row_filter">
              <td>&nbsp;</td>
              <td><input type="text" name="tfi_listusers3_HoTen" id="tfi_listusers3_HoTen" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listusers3_HoTen']); ?>" size="20" maxlength="100" /></td>
              <td><input type="text" name="tfi_listusers3_Username" id="tfi_listusers3_Username" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listusers3_Username']); ?>" size="10" maxlength="50" /></td>
              <td><input type="text" name="tfi_listusers3_DiaChi" id="tfi_listusers3_DiaChi" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listusers3_DiaChi']); ?>" size="25" maxlength="255" /></td>
              <td><input type="text" name="tfi_listusers3_NgaySinh" id="tfi_listusers3_NgaySinh" value="<?php echo @$_SESSION['tfi_listusers3_NgaySinh']; ?>" size="10" maxlength="22" /></td>
              <td><input type="text" name="tfi_listusers3_Email" id="tfi_listusers3_Email" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listusers3_Email']); ?>" size="25" maxlength="255" /></td>
              <td><input type="submit" name="tfi_listusers3" value="<?php echo NXT_getResource("Filter"); ?>" /></td>
            </tr>
            <?php } 
  // endif Conditional region3
?>
        </thead>
        <tbody>
          <?php if ($totalRows_rsusers1 == 0) { // Show if recordset empty ?>
            <tr>
              <td colspan="7"><?php echo NXT_getResource("The table is empty or the filter you've selected is too restrictive."); ?></td>
            </tr>
            <?php } // Show if recordset empty ?>
          <?php if ($totalRows_rsusers1 > 0) { // Show if recordset not empty ?>
            <?php do { ?>
              <tr class="<?php echo @$cnt1++%2==0 ? "" : "KT_even"; ?>">
                <td><input type="checkbox" name="kt_pk_users" class="id_checkbox" value="<?php echo $row_rsusers1['idUser']; ?>" />
                    <input type="hidden" name="idUser" class="id_field" value="<?php echo $row_rsusers1['idUser']; ?>" />
                </td>
                <td><div class="KT_col_HoTen"><?php echo KT_FormatForList($row_rsusers1['HoTen'], 20); ?></div></td>
                <td><div class="KT_col_Username"><?php echo KT_FormatForList($row_rsusers1['Username'], 15); ?></div></td>
                <td><div class="KT_col_DiaChi"><?php echo KT_FormatForList($row_rsusers1['DiaChi'], 30); ?></div></td>
                <td><div class="KT_col_NgaySinh"><?php echo KT_formatDate($row_rsusers1['NgaySinh']); ?></div></td>
                <td><div class="KT_col_Email"><?php echo KT_FormatForList($row_rsusers1['Email'], 28); ?></div></td>
                <td><a class="KT_edit_link" href="star_computer.php?opt=userEdit&idUser=<?php echo $row_rsusers1['idUser']; ?>"><?php echo NXT_getResource("Sửa"); ?></a> <a class="KT_delete_link" href="#delete"><?php echo NXT_getResource("Xóa"); ?></a> </td>
              </tr>
              <?php } while ($row_rsusers1 = mysql_fetch_assoc($rsusers1)); ?>
            <?php } // Show if recordset not empty ?>
        </tbody>
      </table>
      <div class="KT_bottomnav">
        <div>
          <?php
            $nav_listusers3->Prepare();
            require("../includes/nav/NAV_Text_Navigation.inc.php");
          ?>
        </div>
      </div>
      <div class="KT_bottombuttons">
        <div class="KT_operations"> <a href="#" class="KT_edit_op_link" id="textmoi" onclick="nxt_list_edit_link_form(this); return false;"><?php echo NXT_getResource("Sửa"); ?></a> <a href="#" class="KT_delete_op_link" id="textmoi" onclick="nxt_list_delete_link_form(this); return false;"><?php echo NXT_getResource("Xóa"); ?></a> </div>
<span>&nbsp;</span><a href="star_computer.php?opt=userEdit&KT_back=1" class="KT_additem_op_link" id="textmoi" onclick="return nxt_list_additem(this)"><?php echo NXT_getResource("Thêm mới"); ?></a> </div>
    </form>
  </div>
  <br class="clearfixplain" />
</div>
<?php
mysql_free_result($rsusers1);
?>

