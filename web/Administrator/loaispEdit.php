<?php require_once('../Connections/config.php'); ?>
<?php
// Load the common classes
require_once('../includes/common/KT_common.php');

// Load the tNG classes
require_once('../includes/tng/tNG.inc.php');

// Load the KT_back class
require_once('../includes/nxt/KT_back.php');

// Make a transaction dispatcher instance
$tNGs = new tNG_dispatcher("../");

// Make unified connection variable
$conn_config = new KT_connection($config, $database_config);

// Start trigger
$formValidation = new tNG_FormValidation();
$formValidation->addField("Ten", true, "text", "", "", "", "Nhập tên loại sản phẩm");
$formValidation->addField("idCL", true, "numeric", "", "", "", "Chọn tên chủng loại");
$tNGs->prepareValidation($formValidation);
// End trigger

//start Trigger_CheckDetail trigger
//remove this line if you want to edit the code by hand
function Trigger_CheckDetail(&$tNG) {
  $tblFldObj = new tNG_CheckDetailRecord($tNG);
  $tblFldObj->setTable("sanpham");
  $tblFldObj->setFieldName("idLoaiSP");
  $tblFldObj->setErrorMsg("Không thể xóa {Ten} vì còn nhiều sản phẩm");
  return $tblFldObj->Execute();
}
//end Trigger_CheckDetail trigger

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

$colname_chungloai = "-1";
if (isset($_GET['1'])) {
  $colname_chungloai = $_GET['1'];
}
mysql_select_db($database_config, $config);
$query_chungloai = sprintf("SELECT idCL, TenCL FROM chungloai WHERE AnHien = %s ORDER BY TenCL ASC", GetSQLValueString($colname_chungloai, "int"));
$chungloai = mysql_query($query_chungloai, $config) or die(mysql_error());
$row_chungloai = mysql_fetch_assoc($chungloai);
$totalRows_chungloai = mysql_num_rows($chungloai);

mysql_select_db($database_config, $config);
$query_ch_loai = "SELECT idCL, TenCL FROM chungloai WHERE AnHien = 1 ORDER BY TenCL ASC";
$ch_loai = mysql_query($query_ch_loai, $config) or die(mysql_error());
$row_ch_loai = mysql_fetch_assoc($ch_loai);
$totalRows_ch_loai = mysql_num_rows($ch_loai);

// Make an insert transaction instance
$ins_loaisp = new tNG_multipleInsert($conn_config);
$tNGs->addTransaction($ins_loaisp);
// Register triggers
$ins_loaisp->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Insert1");
$ins_loaisp->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$ins_loaisp->registerTrigger("END", "Trigger_Default_Redirect", 99, "../includes/nxt/back.php");
// Add columns
$ins_loaisp->setTable("loaisp");
$ins_loaisp->addColumn("Ten", "STRING_TYPE", "POST", "Ten");
$ins_loaisp->addColumn("idCL", "NUMERIC_TYPE", "POST", "idCL");
$ins_loaisp->addColumn("ThuTu", "NUMERIC_TYPE", "POST", "ThuTu");
$ins_loaisp->addColumn("AnHien", "CHECKBOX_1_0_TYPE", "POST", "AnHien", "1");
$ins_loaisp->setPrimaryKey("idLoaiSP", "NUMERIC_TYPE");

// Make an update transaction instance
$upd_loaisp = new tNG_multipleUpdate($conn_config);
$tNGs->addTransaction($upd_loaisp);
// Register triggers
$upd_loaisp->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Update1");
$upd_loaisp->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$upd_loaisp->registerTrigger("END", "Trigger_Default_Redirect", 99, "../includes/nxt/back.php");
// Add columns
$upd_loaisp->setTable("loaisp");
$upd_loaisp->addColumn("Ten", "STRING_TYPE", "POST", "Ten");
$upd_loaisp->addColumn("idCL", "NUMERIC_TYPE", "POST", "idCL");
$upd_loaisp->addColumn("ThuTu", "NUMERIC_TYPE", "POST", "ThuTu");
$upd_loaisp->addColumn("AnHien", "CHECKBOX_1_0_TYPE", "POST", "AnHien");
$upd_loaisp->setPrimaryKey("idLoaiSP", "NUMERIC_TYPE", "GET", "idLoaiSP");

// Make an instance of the transaction object
$del_loaisp = new tNG_multipleDelete($conn_config);
$tNGs->addTransaction($del_loaisp);
// Register triggers
$del_loaisp->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Delete1");
$del_loaisp->registerTrigger("END", "Trigger_Default_Redirect", 99, "../includes/nxt/back.php");
$del_loaisp->registerTrigger("BEFORE", "Trigger_CheckDetail", 40);
// Add columns
$del_loaisp->setTable("loaisp");
$del_loaisp->setPrimaryKey("idLoaiSP", "NUMERIC_TYPE", "GET", "idLoaiSP");

// Execute all the registered transactions
$tNGs->executeTransactions();

// Get the transaction recordset
$rsloaisp = $tNGs->getRecordset("loaisp");
$row_rsloaisp = mysql_fetch_assoc($rsloaisp);
$totalRows_rsloaisp = mysql_num_rows($rsloaisp);
?><head>
<link href="../includes/skins/mxkollection3.css" rel="stylesheet" type="text/css" media="all" />
<script src="../includes/common/js/base.js" type="text/javascript"></script>
<script src="../includes/common/js/utility.js" type="text/javascript"></script>
<script src="../includes/skins/style.js" type="text/javascript"></script>
<?php echo $tNGs->displayValidationRules();?>
<script src="../includes/nxt/scripts/form.js" type="text/javascript"></script>
<script src="../includes/nxt/scripts/form.js.php" type="text/javascript"></script>
<script type="text/javascript">
$NXT_FORM_SETTINGS = {
  duplicate_buttons: true,
  show_as_grid: true,
  merge_down_value: true
}
</script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"></head>
<body>
<?php
	echo $tNGs->getErrorMsg();
?>
<div class="KT_tng">
  <h1>
    <?php 
// Show IF Conditional region1 
if (@$_GET['idLoaiSP'] == "") {
?>
      <?php echo NXT_getResource("Thêm"); ?>
      <?php 
// else Conditional region1
} else { ?>
      <?php echo NXT_getResource("Cập nhật"); ?>
      <?php } 
// endif Conditional region1
?>
      loại sản phẩm</h1>
  <div class="KT_tngform">
    <form method="post" id="form1" action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>">
      <?php $cnt1 = 0; ?>
      <?php do { ?>
        <?php $cnt1++; ?>
        <?php 
// Show IF Conditional region1 
if (@$totalRows_rsloaisp > 1) {
?>
          <h2><?php echo NXT_getResource("Record_FH"); ?> <?php echo $cnt1; ?></h2>
          <?php } 
// endif Conditional region1
?>
        <table cellpadding="2" cellspacing="0" class="KT_tngtable">
          <tr>
            <td class="KT_th"><label for="Ten_<?php echo $cnt1; ?>">Tên loại sản phẩm:</label></td>
            <td><input type="text" name="Ten_<?php echo $cnt1; ?>" id="Ten_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsloaisp['Ten']); ?>" size="32" maxlength="30" />
                <?php echo $tNGs->displayFieldHint("Ten");?> <?php echo $tNGs->displayFieldError("loaisp", "Ten", $cnt1); ?> </td>
          </tr>
          <tr>
            <td class="KT_th"><label for="idCL_<?php echo $cnt1; ?>">Chủng loại:</label></td>
            <td><select name="idCL_<?php echo $cnt1; ?>" id="idCL_<?php echo $cnt1; ?>">
              <option value=""><?php echo NXT_getResource("Select one..."); ?></option>
              <?php 
do {  
?>
              <option value="<?php echo $row_ch_loai['idCL']?>"<?php if (!(strcmp($row_ch_loai['idCL'], $row_rsloaisp['idCL']))) {echo "SELECTED";} ?>><?php echo $row_ch_loai['TenCL']?></option>
              <?php
} while ($row_ch_loai = mysql_fetch_assoc($ch_loai));
  $rows = mysql_num_rows($ch_loai);
  if($rows > 0) {
      mysql_data_seek($ch_loai, 0);
	  $row_ch_loai = mysql_fetch_assoc($ch_loai);
  }
?>
        </select>
                <?php echo $tNGs->displayFieldError("loaisp", "idCL", $cnt1); ?> </td>
          </tr>
          <tr>
            <td class="KT_th"><label for="ThuTu_<?php echo $cnt1; ?>">Thứ tự:</label></td>
            <td><input type="text" name="ThuTu_<?php echo $cnt1; ?>" id="ThuTu_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsloaisp['ThuTu']); ?>" size="7" maxlength="5" />
                <?php echo $tNGs->displayFieldHint("ThuTu");?> <?php echo $tNGs->displayFieldError("loaisp", "ThuTu", $cnt1); ?> </td>
          </tr>
          <tr>
            <td class="KT_th"><label for="AnHien_<?php echo $cnt1; ?>">Hiện:</label></td>
            <td><input  <?php if (!(strcmp(KT_escapeAttribute($row_rsloaisp['AnHien']),"1"))) {echo "checked";} ?> type="checkbox" name="AnHien_<?php echo $cnt1; ?>" id="AnHien_<?php echo $cnt1; ?>" value="1" />
                <?php echo $tNGs->displayFieldError("loaisp", "AnHien", $cnt1); ?> </td>
          </tr>
        </table>
        <input type="hidden" name="kt_pk_loaisp_<?php echo $cnt1; ?>" class="id_field" value="<?php echo KT_escapeAttribute($row_rsloaisp['kt_pk_loaisp']); ?>" />
        <?php } while ($row_rsloaisp = mysql_fetch_assoc($rsloaisp)); ?>
      <div class="KT_bottombuttons">
        <div>
          <?php 
      // Show IF Conditional region1
      if (@$_GET['idLoaiSP'] == "") {
      ?>
            <input type="submit" name="KT_Insert1" id="KT_Insert1" value="<?php echo NXT_getResource("Thêm"); ?>" />
            <?php 
      // else Conditional region1
      } else { ?>
            <div class="KT_operations">
              <input type="submit" name="KT_Insert1" value="<?php echo NXT_getResource("Thêm mới"); ?>" onClick="nxt_form_insertasnew(this, 'idLoaiSP')" />
            </div>
            <input type="submit" name="KT_Update1" value="<?php echo NXT_getResource("Cập nhật"); ?>" />
            <input type="submit" name="KT_Delete1" value="<?php echo NXT_getResource("Xóa"); ?>" onClick="return confirm('<?php echo NXT_getResource("Bạn có muốn xóa không"); ?>');" />
            <?php }
      // endif Conditional region1
      ?>
          <input type="button" name="KT_Cancel1" value="<?php echo NXT_getResource("Cancel_FB"); ?>" onClick="return UNI_navigateCancel(event, '../includes/nxt/back.php')" />
        </div>
      </div>
    </form>
  </div>
  <br class="clearfixplain" />
</div>
<p>&nbsp;</p>
</body>
<?php
mysql_free_result($chungloai);

mysql_free_result($ch_loai);
?>
