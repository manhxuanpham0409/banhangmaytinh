<?php require_once('Connections/config.php'); ?>
<?php
//MX Widgets3 include
require_once('includes/wdg/WDG.php');

// Load the common classes
require_once('includes/common/KT_common.php');

// Load the tNG classes
require_once('includes/tng/tNG.inc.php');

// Make a transaction dispatcher instance
$tNGs = new tNG_dispatcher("");

// Make unified connection variable
$conn_config = new KT_connection($config, $database_config);

// Start trigger
$formValidation = new tNG_FormValidation();
$formValidation->addField("TenNguoiNhan", true, "text", "", "", "", "Nhập tên người nhận");
$formValidation->addField("DiaDiemGiaoHang", true, "text", "", "", "", "Nhập địa điểm giao hàng");
$tNGs->prepareValidation($formValidation);
// End trigger

//start Trigger_Custom trigger
function Trigger_Custom(&$tNG) {
include "luuhoadonchitiet.php";
}
//end Trigger_Custom trigger

// Make an insert transaction instance
$ins_donhang = new tNG_insert($conn_config);
$tNGs->addTransaction($ins_donhang);
// Register triggers
$ins_donhang->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Insert1");
$ins_donhang->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$ins_donhang->registerTrigger("END", "Trigger_Default_Redirect", 99, "camonkhimuahang.php");
$ins_donhang->registerTrigger("AFTER", "Trigger_Custom", 50);
// Add columns
$ins_donhang->setTable("donhang");
$ins_donhang->addColumn("TenNguoiNhan", "STRING_TYPE", "POST", "TenNguoiNhan");
$ins_donhang->addColumn("DiaDiemGiaoHang", "STRING_TYPE", "POST", "DiaDiemGiaoHang");
$ins_donhang->addColumn("ThoiDiemGiaohang", "DATE_TYPE", "POST", "ThoiDiemGiaohang");
$ins_donhang->addColumn("GhiChu", "STRING_TYPE", "POST", "GhiChu");
$ins_donhang->addColumn("idUser", "NUMERIC_TYPE", "POST", "idUser");
$ins_donhang->addColumn("ThoiDiemDatHang", "DATE_TYPE", "POST", "ThoiDiemDatHang");
$ins_donhang->setPrimaryKey("idDH", "NUMERIC_TYPE");

// Execute all the registered transactions
$tNGs->executeTransactions();

// Get the transaction recordset
$rsdonhang = $tNGs->getRecordset("donhang");
$row_rsdonhang = mysql_fetch_assoc($rsdonhang);
$totalRows_rsdonhang = mysql_num_rows($rsdonhang);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:wdg="http://ns.adobe.com/addt">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript" src="js/dungchung.js"></script>
<title>Untitled Document</title>
<link href="includes/skins/mxkollection3.css" rel="stylesheet" type="text/css" media="all" />
<script src="includes/common/js/base.js" type="text/javascript"></script>
<script src="includes/common/js/utility.js" type="text/javascript"></script>
<script src="includes/skins/style.js" type="text/javascript"></script>
<?php echo $tNGs->displayValidationRules();?>
<script type="text/javascript" src="includes/common/js/sigslot_core.js"></script>
<script type="text/javascript" src="includes/wdg/classes/MXWidgets.js"></script>
<script type="text/javascript" src="includes/wdg/classes/MXWidgets.js.php"></script>
<script type="text/javascript" src="includes/wdg/classes/Calendar.js"></script>
<script type="text/javascript" src="includes/wdg/classes/SmartDate.js"></script>
<script type="text/javascript" src="includes/wdg/calendar/calendar_stripped.js"></script>
<script type="text/javascript" src="includes/wdg/calendar/calendar-setup_stripped.js"></script>
<script src="includes/resources/calendar.js"></script>
</head>

<body>
<?php require_once('khachhang.php'); ?>
<?php require_once('xemgiohang.php'); ?>
<fieldset><legend>Thông tin nhận sản phẩm </legend>
<form method="post" id="form1" action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>">
  <table cellpadding="2" cellspacing="0" class="KT_tngtable1">
    <tr>
      <td class="KT_th"><label for="TenNguoiNhan">Tên người nhận:</label></td>
      <td><input type="text" name="TenNguoiNhan" id="TenNguoiNhan" value="<?php echo KT_escapeAttribute($row_rsdonhang['TenNguoiNhan']); ?>" size="32" />
          <?php echo $tNGs->displayFieldHint("TenNguoiNhan");?> <?php echo $tNGs->displayFieldError("donhang", "TenNguoiNhan"); ?> </td>
    </tr>
    <tr>
      <td class="KT_th"><label for="DiaDiemGiaoHang">Địa điểm giao hàng:</label></td>
      <td><textarea name="DiaDiemGiaoHang" id="DiaDiemGiaoHang" cols="50" rows="5"><?php echo KT_escapeAttribute($row_rsdonhang['DiaDiemGiaoHang']); ?></textarea>
          <?php echo $tNGs->displayFieldHint("DiaDiemGiaoHang");?> <?php echo $tNGs->displayFieldError("donhang", "DiaDiemGiaoHang"); ?> </td>
    </tr>
    <tr>
      <td class="KT_th"><label for="ThoiDiemGiaohang">Thời gian nhận:</label></td>
      <td><input name="ThoiDiemGiaohang" id="ThoiDiemGiaohang" value="<?php echo KT_formatDate($row_rsdonhang['ThoiDiemGiaohang']); ?>" size="32" wdg:mondayfirst="false" wdg:subtype="Calendar" wdg:mask="<?php echo $KT_screen_date_format; ?>" wdg:type="widget" wdg:singleclick="false" wdg:restricttomask="no" />
          <?php echo $tNGs->displayFieldHint("ThoiDiemGiaohang");?> <?php echo $tNGs->displayFieldError("donhang", "ThoiDiemGiaohang"); ?> </td>
    </tr>
    <tr>
      <td class="KT_th"><label for="GhiChu">Ghi chú:</label></td>
      <td><textarea name="GhiChu" id="GhiChu" cols="50" rows="5">        
      </textarea>
          <?php echo $tNGs->displayFieldError("donhang", "GhiChu"); ?> </td>
    </tr>
    <tr class="KT_buttons1">
      <td colspan="2" align="center"><div align="center">
        <input type="submit" name="KT_Insert1" id="KT_Insert1" value="Gửi" />      
      </div></td>
    </tr>
  </table>
  <input type="hidden" name="idUser" id="idUser" value="<?php echo $_SESSION['kt_login_id']; ?>" />
  <input type="hidden" name="ThoiDiemDatHang" id="ThoiDiemDatHang" value="<?php echo date('d/m/Y'); ?>" />
</form>
<p>&nbsp;</p>
</fieldset>
</body>
</html>
