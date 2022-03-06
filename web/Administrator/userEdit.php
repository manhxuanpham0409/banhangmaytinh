<?php require_once('../Connections/config.php'); ?>
<?php
//MX Widgets3 include
require_once('../includes/wdg/WDG.php');

ob_start();
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

//start Trigger_CheckPasswords trigger
//remove this line if you want to edit the code by hand
function Trigger_CheckPasswords(&$tNG) {
  $myThrowError = new tNG_ThrowError($tNG);
  $myThrowError->setErrorMsg("Could not create account.");
  $myThrowError->setField("Password");
  $myThrowError->setFieldErrorMsg("The two passwords do not match.");
  return $myThrowError->Execute();
}
//end Trigger_CheckPasswords trigger

// Start trigger
$formValidation = new tNG_FormValidation();
$formValidation->addField("Username", true, "text", "", "", "", "Nhập tên đăng nhập");
$formValidation->addField("Password", true, "text", "", "", "", " Nhập mật khẩu");
$formValidation->addField("HoTen", true, "text", "", "", "", "Họ tên");
$formValidation->addField("Dienthoai", true, "text", "", "", "", "Nhập số điện thoại");
$formValidation->addField("Email", true, "text", "email", "", "", "Nhập địa chỉ Email");
$tNGs->prepareValidation($formValidation);
// End trigger

//start Trigger_CheckOldPassword trigger
//remove this line if you want to edit the code by hand
function Trigger_CheckOldPassword(&$tNG) {
  return Trigger_UpdatePassword_CheckOldPassword($tNG);
}
//end Trigger_CheckOldPassword trigger

// Make an insert transaction instance
$ins_users = new tNG_multipleInsert($conn_config);
$tNGs->addTransaction($ins_users);
// Register triggers
$ins_users->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Insert1");
$ins_users->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$ins_users->registerTrigger("END", "Trigger_Default_Redirect", 99, "../includes/nxt/back.php");
$ins_users->registerConditionalTrigger("{POST.Password} != {POST.re_Password}", "BEFORE", "Trigger_CheckPasswords", 50);
// Add columns
$ins_users->setTable("users");
$ins_users->addColumn("Username", "STRING_TYPE", "POST", "Username");
$ins_users->addColumn("Password", "STRING_TYPE", "POST", "Password");
$ins_users->addColumn("HoTen", "STRING_TYPE", "POST", "HoTen");
$ins_users->addColumn("GioiTinh", "NUMERIC_TYPE", "POST", "GioiTinh");
$ins_users->addColumn("NgaySinh", "DATE_TYPE", "POST", "NgaySinh");
$ins_users->addColumn("DiaChi", "STRING_TYPE", "POST", "DiaChi");
$ins_users->addColumn("Dienthoai", "STRING_TYPE", "POST", "Dienthoai");
$ins_users->addColumn("Email", "STRING_TYPE", "POST", "Email");
$ins_users->addColumn("NgayDangKy", "STRING_TYPE", "POST", "NgayDangKy");
$ins_users->setPrimaryKey("idUser", "NUMERIC_TYPE");

// Make an update transaction instance
$upd_users = new tNG_multipleUpdate($conn_config);
$tNGs->addTransaction($upd_users);
// Register triggers
$upd_users->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Update1");
$upd_users->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$upd_users->registerTrigger("END", "Trigger_Default_Redirect", 99, "../includes/nxt/back.php");
$upd_users->registerConditionalTrigger("{POST.Password} != {POST.re_Password}", "BEFORE", "Trigger_CheckPasswords", 50);
$upd_users->registerTrigger("BEFORE", "Trigger_CheckOldPassword", 60);
// Add columns
$upd_users->setTable("users");
$upd_users->addColumn("Username", "STRING_TYPE", "POST", "Username");
$upd_users->addColumn("Password", "STRING_TYPE", "POST", "Password");
$upd_users->addColumn("HoTen", "STRING_TYPE", "POST", "HoTen");
$upd_users->addColumn("GioiTinh", "NUMERIC_TYPE", "POST", "GioiTinh");
$upd_users->addColumn("NgaySinh", "DATE_TYPE", "POST", "NgaySinh");
$upd_users->addColumn("DiaChi", "STRING_TYPE", "POST", "DiaChi");
$upd_users->addColumn("Dienthoai", "STRING_TYPE", "POST", "Dienthoai");
$upd_users->addColumn("Email", "STRING_TYPE", "POST", "Email");
$upd_users->addColumn("NgayDangKy", "STRING_TYPE", "POST", "NgayDangKy");
$upd_users->setPrimaryKey("idUser", "NUMERIC_TYPE", "GET", "idUser");

// Make an instance of the transaction object
$del_users = new tNG_multipleDelete($conn_config);
$tNGs->addTransaction($del_users);
// Register triggers
$del_users->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Delete1");
$del_users->registerTrigger("END", "Trigger_Default_Redirect", 99, "../includes/nxt/back.php");
// Add columns
$del_users->setTable("users");
$del_users->setPrimaryKey("idUser", "NUMERIC_TYPE", "GET", "idUser");

// Execute all the registered transactions
$tNGs->executeTransactions();

// Get the transaction recordset
$rsusers = $tNGs->getRecordset("users");
$row_rsusers = mysql_fetch_assoc($rsusers);
$totalRows_rsusers = mysql_num_rows($rsusers);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:wdg="http://ns.adobe.com/addt">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>userEdit</title><link href="../includes/skins/mxkollection3.css" rel="stylesheet" type="text/css" media="all" /><script src="../includes/common/js/base.js" type="text/javascript"></script><script src="../includes/common/js/utility.js" type="text/javascript"></script><script src="../includes/skins/style.js" type="text/javascript"></script><?php echo $tNGs->displayValidationRules();?><script src="../includes/nxt/scripts/form.js" type="text/javascript"></script><script src="../includes/nxt/scripts/form.js.php" type="text/javascript"></script><script type="text/javascript">
$NXT_FORM_SETTINGS = {
  duplicate_buttons: true,
  show_as_grid: true,
  merge_down_value: true
}
</script>
<script type="text/javascript" src="../includes/common/js/sigslot_core.js"></script>
<script type="text/javascript" src="../includes/wdg/classes/MXWidgets.js"></script>
<script type="text/javascript" src="../includes/wdg/classes/MXWidgets.js.php"></script>
<script type="text/javascript" src="../includes/wdg/classes/Calendar.js"></script>
<script type="text/javascript" src="../includes/wdg/classes/SmartDate.js"></script>
<script type="text/javascript" src="../includes/wdg/calendar/calendar_stripped.js"></script>
<script type="text/javascript" src="../includes/wdg/calendar/calendar-setup_stripped.js"></script>
<script src="../includes/resources/calendar.js"></script>
</head>

<body>
<div class="KT_tng">
  <h1>
    <?php 
// Show IF Conditional region1 
if (@$_GET['idUser'] == "") {
?>
    <?php echo NXT_getResource("Thêm user"); ?>
    <?php 
// else Conditional region1
} else { ?>
    <?php echo NXT_getResource("Cập nhật user"); ?>
    <?php } 
// endif Conditional region1
?>
    Users </h1>
  <div class="KT_tngform">
    <form method="post" id="form1" action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>">
      <?php $cnt1 = 0; ?>
      <?php do { ?>
      <?php $cnt1++; ?>
      <?php 
// Show IF Conditional region1 
if (@$totalRows_rsusers > 1) {
?>
      <h2><?php echo NXT_getResource("Record_FH"); ?> <?php echo $cnt1; ?></h2>
      <?php } 
// endif Conditional region1
?>
      <table cellpadding="2" cellspacing="0" class="KT_tngtable">
        <tr>
          <td class="KT_th"><label for="Username_<?php echo $cnt1; ?>">Tên đăng nhập:</label></td>
          <td><input type="text" name="Username_<?php echo $cnt1; ?>" id="Username_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsusers['Username']); ?>" size="32" maxlength="50" />
              <?php echo $tNGs->displayFieldHint("Username");?> <?php echo $tNGs->displayFieldError("users", "Username", $cnt1); ?> </td>
        </tr>
        <?php 
// Show IF Conditional show_old_Password_on_update_only 
if (@$_GET['idUser'] != "") {
?>
        <tr>
          <td class="KT_th"><label for="old_Password_<?php echo $cnt1; ?>">Old Mật khẩu:</label></td>
          <td><input type="password" name="old_Password_<?php echo $cnt1; ?>" id="old_Password_<?php echo $cnt1; ?>" value="" size="32" maxlength="50" />
              <?php echo $tNGs->displayFieldError("users", "old_Password", $cnt1); ?> </td>
        </tr>
        <?php } 
// endif Conditional show_old_Password_on_update_only
?>
        <tr>
          <td class="KT_th"><label for="Password_<?php echo $cnt1; ?>">Mật khẩu:</label></td>
          <td><input type="password" name="Password_<?php echo $cnt1; ?>" id="Password_<?php echo $cnt1; ?>" value="" size="32" maxlength="50" />
              <?php echo $tNGs->displayFieldHint("Password");?> <?php echo $tNGs->displayFieldError("users", "Password", $cnt1); ?> </td>
        </tr>
        <tr>
          <td class="KT_th"><label for="re_Password_<?php echo $cnt1; ?>">Re-type Mật khẩu:</label></td>
          <td><input type="password" name="re_Password_<?php echo $cnt1; ?>" id="re_Password_<?php echo $cnt1; ?>" value="" size="32" maxlength="50" />
          </td>
        </tr>
        <tr>
          <td class="KT_th"><label for="HoTen_<?php echo $cnt1; ?>">Họ tên:</label></td>
          <td><input type="text" name="HoTen_<?php echo $cnt1; ?>" id="HoTen_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsusers['HoTen']); ?>" size="32" maxlength="100" />
              <?php echo $tNGs->displayFieldHint("HoTen");?> <?php echo $tNGs->displayFieldError("users", "HoTen", $cnt1); ?> </td>
        </tr>
        <tr>
          <td class="KT_th"><label for="GioiTinh_<?php echo $cnt1; ?>">Giới tính:</label></td>
          <td>
              <input <?php if (!(strcmp(KT_escapeAttribute($row_rsusers['GioiTinh']),"1"))) {echo "CHECKED";} ?> type="radio" name="GioiTinh_<?php echo $cnt1; ?>" id="GioiTinh_<?php echo $cnt1; ?>_1" value="1" />
              <label for="GioiTinh_<?php echo $cnt1; ?>_1">Nam</label>
 

                <input <?php if (!(strcmp(KT_escapeAttribute($row_rsusers['GioiTinh']),"0"))) {echo "CHECKED";} ?> type="radio" name="GioiTinh_<?php echo $cnt1; ?>" id="GioiTinh_<?php echo $cnt1; ?>_2" value="0" />
                <label for="GioiTinh_<?php echo $cnt1; ?>_2">Nữ</label>

              <?php echo $tNGs->displayFieldError("users", "GioiTinh", $cnt1); ?> </td>
        </tr>
        <tr>
          <td class="KT_th"><label for="NgaySinh_<?php echo $cnt1; ?>">Ngày sinh:</label></td>
          <td><input name="NgaySinh_<?php echo $cnt1; ?>" id="NgaySinh_<?php echo $cnt1; ?>" value="<?php echo KT_formatDate($row_rsusers['NgaySinh']); ?>" size="10" maxlength="22" wdg:mondayfirst="false" wdg:subtype="Calendar" wdg:mask="<?php echo $KT_screen_date_format; ?>" wdg:type="widget" wdg:singleclick="false" wdg:restricttomask="no" wdg:readonly="true" />
              <?php echo $tNGs->displayFieldHint("NgaySinh");?> <?php echo $tNGs->displayFieldError("users", "NgaySinh", $cnt1); ?> </td>
        </tr>
        <tr>
          <td class="KT_th"><label for="DiaChi_<?php echo $cnt1; ?>">Địa chỉ:</label></td>
          <td><textarea name="DiaChi_<?php echo $cnt1; ?>" id="DiaChi_<?php echo $cnt1; ?>" style="width:500px;" rows="5"><?php echo KT_escapeAttribute($row_rsusers['DiaChi']); ?></textarea>
              <?php echo $tNGs->displayFieldHint("DiaChi");?> <?php echo $tNGs->displayFieldError("users", "DiaChi", $cnt1); ?> </td>
        </tr>
        <tr>
          <td class="KT_th"><label for="Dienthoai_<?php echo $cnt1; ?>">Điện thoại:</label></td>
          <td><input type="text" name="Dienthoai_<?php echo $cnt1; ?>" id="Dienthoai_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsusers['Dienthoai']); ?>" size="32" maxlength="255" />
              <?php echo $tNGs->displayFieldHint("Dienthoai");?> <?php echo $tNGs->displayFieldError("users", "Dienthoai", $cnt1); ?> </td>
        </tr>
        <tr>
          <td class="KT_th"><label for="Email_<?php echo $cnt1; ?>">Email:</label></td>
          <td><input type="text" name="Email_<?php echo $cnt1; ?>" id="Email_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsusers['Email']); ?>" size="32" maxlength="255" />
              <?php echo $tNGs->displayFieldHint("Email");?> <?php echo $tNGs->displayFieldError("users", "Email", $cnt1); ?> </td>
        </tr>
      </table>
      <input type="hidden" name="kt_pk_users_<?php echo $cnt1; ?>" class="id_field" value="<?php echo KT_escapeAttribute($row_rsusers['kt_pk_users']); ?>" />
      <input type="hidden" name="NgayDangKy_<?php echo $cnt1; ?>" id="NgayDangKy_<?php echo $cnt1; ?>" value="<?php echo date('Y/m/d'); ?>" />
      <?php } while ($row_rsusers = mysql_fetch_assoc($rsusers)); ?>
      <div class="KT_bottombuttons">
        <div>
          <?php 
      // Show IF Conditional region1
      if (@$_GET['idUser'] == "") {
      ?>
          <input type="submit" name="KT_Insert1" id="KT_Insert1" value="<?php echo NXT_getResource("Thêm"); ?>" />
          <?php 
      // else Conditional region1
      } else { ?>
          <div class="KT_operations">
            <input type="submit" name="KT_Insert1" value="<?php echo NXT_getResource("Thêm mới"); ?>" onclick="nxt_form_insertasnew(this, 'idUser')" />
          </div>
          <input type="submit" name="KT_Update1" value="<?php echo NXT_getResource("Cập nhật"); ?>" />
          <input type="submit" name="KT_Delete1" value="<?php echo NXT_getResource("Xóa"); ?>" onclick="return confirm('<?php echo NXT_getResource("Bạn có muốn xóa không?"); ?>');" />
          <?php }
      // endif Conditional region1
      ?>
          <input type="button" name="KT_Cancel1" value="<?php echo NXT_getResource("Cancel_FB"); ?>" onclick="return UNI_navigateCancel(event, '../includes/nxt/back.php')" />
        </div>
      </div>
    </form>
  </div>
  <br class="clearfixplain" />
</div>
<p>&nbsp;</p>

</body>
</html>
