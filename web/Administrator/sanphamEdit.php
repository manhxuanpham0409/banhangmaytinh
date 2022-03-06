<?php require_once('../Connections/config.php'); ?>
<?php
//MX Widgets3 include
require_once('../includes/wdg/WDG.php');

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
$formValidation->addField("TenSP", true, "text", "", "", "", "Nhập tên sản phẩm");
$formValidation->addField("idHang", true, "numeric", "", "", "", "Chọn hãng sản xuất");
$formValidation->addField("idCL", true, "numeric", "", "", "", "Chọn chủng loại");
$formValidation->addField("idLoaiSP", true, "numeric", "", "", "", "Chọn loại sản phẩm");
$formValidation->addField("HinhAnh", true, "", "", "", "", "Chọn hình");
$formValidation->addField("DonGia", true, "double", "", "", "", "Nhập đơn giá");
$tNGs->prepareValidation($formValidation);
// End trigger

//start Trigger_FileDelete trigger
//remove this line if you want to edit the code by hand 
function Trigger_FileDelete(&$tNG) {
  $deleteObj = new tNG_FileDelete($tNG);
  $deleteObj->setFolder("../upload/");
  $deleteObj->setDbFieldName("HinhAnh");
  return $deleteObj->Execute();
}
//end Trigger_FileDelete trigger

//start Trigger_FileUpload trigger
//remove this line if you want to edit the code by hand 
function Trigger_FileUpload(&$tNG) {
  $uploadObj = new tNG_FileUpload($tNG);
  $uploadObj->setFormFieldName("HinhAnh");
  $uploadObj->setDbFieldName("HinhAnh");
  $uploadObj->setFolder("../upload/");
  $uploadObj->setMaxSize(1500);
  $uploadObj->setAllowedExtensions("png, jpg, JGP, gif");
  $uploadObj->setRename("auto");
  return $uploadObj->Execute();
}
//end Trigger_FileUpload trigger

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

mysql_select_db($database_config, $config);
$query_hangsx = "SELECT idHang, Ten FROM hangsx ORDER BY Ten ASC";
$hangsx = mysql_query($query_hangsx, $config) or die(mysql_error());
$row_hangsx = mysql_fetch_assoc($hangsx);
$totalRows_hangsx = mysql_num_rows($hangsx);

mysql_select_db($database_config, $config);
$query_chungloai = "SELECT idCL, TenCL FROM chungloai ORDER BY TenCL ASC";
$chungloai = mysql_query($query_chungloai, $config) or die(mysql_error());
$row_chungloai = mysql_fetch_assoc($chungloai);
$totalRows_chungloai = mysql_num_rows($chungloai);

mysql_select_db($database_config, $config);
$query_loaisp = "SELECT idLoaiSP, idCL, Ten FROM loaisp ORDER BY Ten ASC";
$loaisp = mysql_query($query_loaisp, $config) or die(mysql_error());
$row_loaisp = mysql_fetch_assoc($loaisp);
$totalRows_loaisp = mysql_num_rows($loaisp);

// Make an insert transaction instance
$ins_sanpham = new tNG_multipleInsert($conn_config);
$tNGs->addTransaction($ins_sanpham);
// Register triggers
$ins_sanpham->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Insert1");
$ins_sanpham->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$ins_sanpham->registerTrigger("END", "Trigger_Default_Redirect", 99, "../includes/nxt/back.php");
$ins_sanpham->registerTrigger("AFTER", "Trigger_FileUpload", 97);
// Add columns
$ins_sanpham->setTable("sanpham");
$ins_sanpham->addColumn("TenSP", "STRING_TYPE", "POST", "TenSP");
$ins_sanpham->addColumn("idHang", "NUMERIC_TYPE", "POST", "idHang");
$ins_sanpham->addColumn("idCL", "NUMERIC_TYPE", "POST", "select");
$ins_sanpham->addColumn("idLoaiSP", "NUMERIC_TYPE", "POST", "select1");
$ins_sanpham->addColumn("MoTa", "STRING_TYPE", "POST", "MoTa");
$ins_sanpham->addColumn("HinhAnh", "FILE_TYPE", "FILES", "HinhAnh");
$ins_sanpham->addColumn("DonGia", "DOUBLE_TYPE", "POST", "DonGia");
$ins_sanpham->addColumn("BaoHanh", "NUMERIC_TYPE", "POST", "BaoHanh");
$ins_sanpham->addColumn("SoLuongTonKho", "NUMERIC_TYPE", "POST", "SoLuongTonKho");
$ins_sanpham->addColumn("ThuTu", "NUMERIC_TYPE", "POST", "ThuTu");
$ins_sanpham->addColumn("AnHien", "CHECKBOX_1_0_TYPE", "POST", "AnHien", "1");
$ins_sanpham->addColumn("NgayCapNhat", "DATE_TYPE", "POST", "NgayCapNhat");
$ins_sanpham->setPrimaryKey("idSP", "NUMERIC_TYPE");

// Make an update transaction instance
$upd_sanpham = new tNG_multipleUpdate($conn_config);
$tNGs->addTransaction($upd_sanpham);
// Register triggers
$upd_sanpham->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Update1");
$upd_sanpham->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$upd_sanpham->registerTrigger("END", "Trigger_Default_Redirect", 99, "../includes/nxt/back.php");
$upd_sanpham->registerTrigger("AFTER", "Trigger_FileUpload", 97);
// Add columns
$upd_sanpham->setTable("sanpham");
$upd_sanpham->addColumn("TenSP", "STRING_TYPE", "POST", "TenSP");
$upd_sanpham->addColumn("idHang", "NUMERIC_TYPE", "POST", "idHang");
$upd_sanpham->addColumn("idCL", "NUMERIC_TYPE", "POST", "select");
$upd_sanpham->addColumn("idLoaiSP", "NUMERIC_TYPE", "POST", "select1");
$upd_sanpham->addColumn("MoTa", "STRING_TYPE", "POST", "MoTa");
$upd_sanpham->addColumn("HinhAnh", "FILE_TYPE", "FILES", "HinhAnh");
$upd_sanpham->addColumn("DonGia", "DOUBLE_TYPE", "POST", "DonGia");
$upd_sanpham->addColumn("BaoHanh", "NUMERIC_TYPE", "POST", "BaoHanh");
$upd_sanpham->addColumn("SoLuongTonKho", "NUMERIC_TYPE", "POST", "SoLuongTonKho");
$upd_sanpham->addColumn("ThuTu", "NUMERIC_TYPE", "POST", "ThuTu");
$upd_sanpham->addColumn("AnHien", "CHECKBOX_1_0_TYPE", "POST", "AnHien");
$upd_sanpham->addColumn("NgayCapNhat", "DATE_TYPE", "POST", "NgayCapNhat");
$upd_sanpham->setPrimaryKey("idSP", "NUMERIC_TYPE", "GET", "idSP");

// Make an instance of the transaction object
$del_sanpham = new tNG_multipleDelete($conn_config);
$tNGs->addTransaction($del_sanpham);
// Register triggers
$del_sanpham->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Delete1");
$del_sanpham->registerTrigger("END", "Trigger_Default_Redirect", 99, "../includes/nxt/back.php");
$del_sanpham->registerTrigger("AFTER", "Trigger_FileDelete", 98);
// Add columns
$del_sanpham->setTable("sanpham");
$del_sanpham->setPrimaryKey("idSP", "NUMERIC_TYPE", "GET", "idSP");

// Execute all the registered transactions
$tNGs->executeTransactions();

// Get the transaction recordset
$rssanpham = $tNGs->getRecordset("sanpham");
$row_rssanpham = mysql_fetch_assoc($rssanpham);
$totalRows_rssanpham = mysql_num_rows($rssanpham);
?><html xmlns:wdg="http://ns.adobe.com/addt"><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../includes/skins/mxkollection3.css" rel="stylesheet" type="text/css" media="all" /><script src="../includes/common/js/base.js" type="text/javascript"></script><script src="../includes/common/js/utility.js" type="text/javascript"></script><script src="../includes/skins/style.js" type="text/javascript"></script><?php echo $tNGs->displayValidationRules();?><script src="../includes/nxt/scripts/form.js" type="text/javascript"></script><script src="../includes/nxt/scripts/form.js.php" type="text/javascript"></script><script type="text/javascript">
$NXT_FORM_SETTINGS = {
  duplicate_buttons: true,
  show_as_grid: true,
  merge_down_value: true
}
</script>
<script type="text/javascript" src="../includes/common/js/sigslot_core.js"></script>
<script type="text/javascript" src="../includes/wdg/classes/MXWidgets.js"></script>
<script type="text/javascript" src="../includes/wdg/classes/MXWidgets.js.php"></script>
<script type="text/javascript" src="../includes/wdg/classes/JSRecordset.js"></script>
<script type="text/javascript" src="../includes/wdg/classes/DependentDropdown.js"></script>
<?php
//begin JSRecordset
$jsObject_loaisp = new WDG_JsRecordset("loaisp");
echo $jsObject_loaisp->getOutput();
//end JSRecordset
?></head>
<body>
<?php
	echo $tNGs->getErrorMsg();
?>
<div class="KT_tng">
  <h1>
    <?php 
// Show IF Conditional region1 
if (@$_GET['idSP'] == "") {
?>
<?php echo NXT_getResource("Thêm "); ?>
<?php 
// else Conditional region1
} else { ?>
<?php echo NXT_getResource("Cập nhật "); ?>
<?php } 
// endif Conditional region1
?>
sản phẩm  </h1>
  <div class="KT_tngform">
    <form method="post" id="form1" action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>" enctype="multipart/form-data">
      <?php $cnt1 = 0; ?>
      <?php do { ?>
      <?php $cnt1++; ?>
      <?php 
// Show IF Conditional region1 
if (@$totalRows_rssanpham > 1) {
?>
      <h2><?php echo NXT_getResource("Record_FH"); ?> <?php echo $cnt1; ?></h2>
      <?php } 
// endif Conditional region1
?>
      <table cellpadding="2" cellspacing="0" class="KT_tngtable">
        <tr>
	<td class="KT_th"><label for="TenSP_<?php echo $cnt1; ?>">Tên sản phẩm:</label></td>
	<td>
		<input type="text" name="TenSP_<?php echo $cnt1; ?>" id="TenSP_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rssanpham['TenSP']); ?>" size="32" maxlength="100" />
		<?php echo $tNGs->displayFieldHint("TenSP");?>
		<?php echo $tNGs->displayFieldError("sanpham", "TenSP", $cnt1); ?>	</td>
</tr>
        <tr>
	<td class="KT_th"><label for="idHang_<?php echo $cnt1; ?>">Hãng sx:</label></td>
	<td>
		<select name="idHang_<?php echo $cnt1; ?>" id="idHang_<?php echo $cnt1; ?>">
      <option value=""><?php echo NXT_getResource("Select one..."); ?></option>
<?php 
do {  
?>
			<option value="<?php echo $row_hangsx['idHang']?>"<?php if (!(strcmp($row_hangsx['idHang'], $row_rssanpham['idHang']))) {echo "SELECTED";} ?>><?php echo $row_hangsx['Ten']?></option>
<?php
} while ($row_hangsx = mysql_fetch_assoc($hangsx));
  $rows = mysql_num_rows($hangsx);
  if($rows > 0) {
      mysql_data_seek($hangsx, 0);
	  $row_hangsx = mysql_fetch_assoc($hangsx);
  }
?>
		</select>
		<?php echo $tNGs->displayFieldError("sanpham", "idHang", $cnt1); ?>	</td>
</tr>
        <tr>
	<td class="KT_th"><label for="select">Tên chủng loại:</label></td>
	<td><select name="select" id="select">
    <option value=""><?php echo NXT_getResource("Select one..."); ?></option>
      <?php
do {  
?>
      <option value="<?php echo $row_chungloai['idCL']?>"><?php echo $row_chungloai['TenCL']?></option>
      <?php
} while ($row_chungloai = mysql_fetch_assoc($chungloai));
  $rows = mysql_num_rows($chungloai);
  if($rows > 0) {
      mysql_data_seek($chungloai, 0);
	  $row_chungloai = mysql_fetch_assoc($chungloai);
  }
?>
    </select>
	  <?php echo $tNGs->displayFieldError("sanpham", "idCL", $cnt1); ?></td>
</tr>
        <tr>
	<td class="KT_th"><label for="select1">Loại sản phẩm:</label></td>
	<td><select wdg:subtype="DependentDropdown" name="select1" id="select1" wdg:type="widget" wdg:recordset="loaisp" wdg:displayfield="Ten" wdg:valuefield="idLoaiSP" wdg:fkey="idCL" wdg:triggerobject="select">
    </select>
	  <?php echo $tNGs->displayFieldError("sanpham", "idLoaiSP", $cnt1); ?></td>
</tr>
        <tr>
	<td class="KT_th"><label for="MoTa_<?php echo $cnt1; ?>">Mô tả:</label></td>
	<td>
		<textarea name="MoTa_<?php echo $cnt1; ?>" id="MoTa_<?php echo $cnt1; ?>" style="width:400px;" rows="5"><?php echo KT_escapeAttribute($row_rssanpham['MoTa']); ?></textarea>
		<?php echo $tNGs->displayFieldHint("MoTa");?>
		<?php echo $tNGs->displayFieldError("sanpham", "MoTa", $cnt1); ?>	</td>
</tr>
        <tr>
	<td class="KT_th"><label for="HinhAnh_<?php echo $cnt1; ?>">Hình ảnh:</label></td>
	<td>
		<input type="file" name="HinhAnh_<?php echo $cnt1; ?>" id="HinhAnh_<?php echo $cnt1; ?>" size="32" />
		<?php echo $tNGs->displayFieldError("sanpham", "HinhAnh", $cnt1); ?>	</td>
</tr>
        <tr>
	<td class="KT_th"><label for="DonGia_<?php echo $cnt1; ?>">Đơn giá :</label></td>
	<td>
		<input type="text" name="DonGia_<?php echo $cnt1; ?>" id="DonGia_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rssanpham['DonGia']); ?>" size="32" />
		<?php echo $tNGs->displayFieldHint("DonGia");?>
		<?php echo $tNGs->displayFieldError("sanpham", "DonGia", $cnt1); ?>	</td>
</tr>
        <tr>
	<td class="KT_th"><label for="BaoHanh_<?php echo $cnt1; ?>">Thời gian bảo hành:</label></td>
	<td>
		<input type="text" name="BaoHanh_<?php echo $cnt1; ?>" id="BaoHanh_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rssanpham['BaoHanh']); ?>" size="2" />
		<?php echo $tNGs->displayFieldHint("BaoHanh");?>
		<?php echo $tNGs->displayFieldError("sanpham", "BaoHanh", $cnt1); ?>	</td>
</tr>
        <tr>
	<td class="KT_th"><label for="SoLuongTonKho_<?php echo $cnt1; ?>">Tồn kho:</label></td>
	<td>
		<input type="text" name="SoLuongTonKho_<?php echo $cnt1; ?>" id="SoLuongTonKho_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rssanpham['SoLuongTonKho']); ?>" size="7" />
		<?php echo $tNGs->displayFieldHint("SoLuongTonKho");?>
		<?php echo $tNGs->displayFieldError("sanpham", "SoLuongTonKho", $cnt1); ?>	</td>
</tr>
        <tr>
	<td class="KT_th"><label for="ThuTu_<?php echo $cnt1; ?>">ThuTu:</label></td>
	<td>
		<input type="text" name="ThuTu_<?php echo $cnt1; ?>" id="ThuTu_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rssanpham['ThuTu']); ?>" size="7" />
		<?php echo $tNGs->displayFieldHint("ThuTu");?>
		<?php echo $tNGs->displayFieldError("sanpham", "ThuTu", $cnt1); ?>	</td>
</tr>
        <tr>
	<td class="KT_th"><label for="AnHien_<?php echo $cnt1; ?>">AnHien:</label></td>
	<td>
		<input  <?php if (!(strcmp(KT_escapeAttribute($row_rssanpham['AnHien']),"1"))) {echo "checked";} ?> type="checkbox" name="AnHien_<?php echo $cnt1; ?>" id="AnHien_<?php echo $cnt1; ?>" value="1" />
		<?php echo $tNGs->displayFieldError("sanpham", "AnHien", $cnt1); ?>	</td>
</tr>
        <tr>
          <td colspan="2" class="KT_th">&nbsp;</td>
          </tr>     
      </table>
      <input type="hidden" name="kt_pk_sanpham_<?php echo $cnt1; ?>" class="id_field" value="<?php echo KT_escapeAttribute($row_rssanpham['kt_pk_sanpham']); ?>" />
      
<input type="hidden" name="NgayCapNhat_<?php echo $cnt1; ?>" id="NgayCapNhat_<?php echo $cnt1; ?>" value="<?php echo date('d/m/Y'); ?>" />

      
      <?php } while ($row_rssanpham = mysql_fetch_assoc($rssanpham)); ?>
      <div class="KT_bottombuttons">
        <div>
          <?php 
      // Show IF Conditional region1
      if (@$_GET['idSP'] == "") {
      ?>
          <input type="submit" name="KT_Insert1" id="KT_Insert1" value="<?php echo NXT_getResource("Thêm "); ?>" />
          <?php 
      // else Conditional region1
      } else { ?>
          
	<div class="KT_operations">
	<input type="submit" name="KT_Insert1" value="<?php echo NXT_getResource("Thêm mới"); ?>" onClick="nxt_form_insertasnew(this, 'idSP')" />
	</div>
	

          <input type="submit" name="KT_Update1" value="<?php echo NXT_getResource("Cập nhật"); ?>" />
          <input type="submit" name="KT_Delete1" value="<?php echo NXT_getResource("Xóa"); ?>" onClick="return confirm('<?php echo NXT_getResource("Are you sure?"); ?>');" />
          <?php }
      // endif Conditional region1
      ?>
          <input type="button" name="KT_Cancel1" value="<?php echo NXT_getResource("Cancel_FB"); ?>" onClick="return UNI_navigateCancel(event, '../includes/nxt/back.php')" />
        </div>
      </div>
    </form>
  
        <form id="form2" method="post" action="">
        </form>
  </div>
  <br class="clearfixplain" />
</div>
<p>&nbsp;</p>


</body>

<?php
mysql_free_result($hangsx);

mysql_free_result($chungloai);

mysql_free_result($loaisp);
?>
