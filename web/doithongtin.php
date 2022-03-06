<?php require_once('Connections/config.php'); ?><?php
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

// Make an update transaction instance
$upd_users = new tNG_update($conn_config);
$tNGs->addTransaction($upd_users);
// Register triggers
$upd_users->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Update1");
$upd_users->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$upd_users->registerTrigger("END", "Trigger_Default_Redirect", 99, "doithanhcong.php");
$upd_users->registerConditionalTrigger("{POST.Password} != {POST.re_Password}", "BEFORE", "Trigger_CheckPasswords", 50);
$upd_users->registerTrigger("BEFORE", "Trigger_CheckOldPassword", 60);
// Add columns
$upd_users->setTable("users");
$upd_users->addColumn("Username", "STRING_TYPE", "POST", "Username");
$upd_users->addColumn("Password", "STRING_TYPE", "POST", "Password");
$upd_users->addColumn("HoTen", "STRING_TYPE", "POST", "HoTen");
$upd_users->addColumn("GioiTinh", "NUMERIC_TYPE", "POST", "GioiTinh");
$upd_users->addColumn("DiaChi", "STRING_TYPE", "POST", "DiaChi");
$upd_users->addColumn("Dienthoai", "STRING_TYPE", "POST", "Dienthoai");
$upd_users->addColumn("Email", "STRING_TYPE", "POST", "Email");
$upd_users->addColumn("NgayDangKy", "STRING_TYPE", "POST", "NgayDangKy");
$upd_users->addColumn("NgaySinh", "DATE_TYPE", "POST", "NgaySinh");
$upd_users->setPrimaryKey("idUser", "NUMERIC_TYPE", "SESSION", "kt_login_id");

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
<title>Thay đổi thông  tin</title>
<link href="css/mycss.css" rel="stylesheet" type="text/css">
<style>
.chitiet{color:#46aa10; font-family:Verdana, Arial, Helvetica, sans-serif; font-size:11px;}
.chitiet:link,.chitiet:vistied{text-decoration:underline}
.hinh {
	height: 90px;
	width: 109px;
}
.chitiet:hover{ text-decoration:none}
</style><link href="includes/skins/mxkollection3.css" rel="stylesheet" type="text/css" media="all" /><script src="includes/common/js/base.js" type="text/javascript"></script><script src="includes/common/js/utility.js" type="text/javascript"></script><script src="includes/skins/style.js" type="text/javascript"></script><?php echo $tNGs->displayValidationRules();?>
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
<div class="khung">
    <fieldset><h1><label>THAY ĐỔI THÔNG TIN</label></h1>
    
    
    
<?php
	echo $tNGs->getErrorMsg();
?>
<form method="post" id="form1" action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>">
  <table width="100%" cellpadding="2" cellspacing="0" class="KT_tngtable1">
    <tr>
      <td class="KT_th"><label for="Username">Tên đăng nhập:</label></td>
      <td><input type="text" name="Username" id="Username" value="<?php echo KT_escapeAttribute($row_rsusers['Username']); ?>" size="32" />
          <?php echo $tNGs->displayFieldHint("Username");?> <?php echo $tNGs->displayFieldError("users", "Username"); ?> </td>
    </tr>
    <tr>
      <td class="KT_th"><label for="old_Password">Old Mật khẩu:</label></td>
      <td><input type="password" name="old_Password" id="old_Password" value="" size="32" />
          <?php echo $tNGs->displayFieldError("users", "old_Password"); ?> </td>
    </tr>
    <tr>
      <td class="KT_th"><label for="Password">Mật khẩu:</label></td>
      <td><input type="password" name="Password" id="Password" value="" size="32" />
          <?php echo $tNGs->displayFieldHint("Password");?> <?php echo $tNGs->displayFieldError("users", "Password"); ?> </td>
    </tr>
    <tr>
      <td class="KT_th"><label for="re_Password">Re-type Mật khẩu:</label></td>
      <td><input type="password" name="re_Password" id="re_Password" value="" size="32" />      </td>
    </tr>
    <tr>
      <td class="KT_th"><label for="HoTen">Họ tên:</label></td>
      <td><input type="text" name="HoTen" id="HoTen" value="<?php echo KT_escapeAttribute($row_rsusers['HoTen']); ?>" size="32" />
          <?php echo $tNGs->displayFieldHint("HoTen");?> <?php echo $tNGs->displayFieldError("users", "HoTen"); ?> </td>
    </tr>
    <tr>
      <td class="KT_th"><label for="GioiTinh_1">Giới tính:</label></td>
      <td>
        <input <?php if (!(strcmp(KT_escapeAttribute($row_rsusers['GioiTinh']),"1"))) {echo "CHECKED";} ?> type="radio" name="GioiTinh" id="GioiTinh_1" value="1" />
        <label for="GioiTinh_1">Nam</label>


            <input <?php if (!(strcmp(KT_escapeAttribute($row_rsusers['GioiTinh']),"0"))) {echo "CHECKED";} ?> type="radio" name="GioiTinh" id="GioiTinh_2" value="0" />
            <label for="GioiTinh_2">Nữ</label>

        <?php echo $tNGs->displayFieldError("users", "GioiTinh"); ?> </td>
    </tr>
    <tr>
      <td class="KT_th"><label for="label2">NgaySinh:</label></td>
      <td><input name="NgaySinh" id="NgaySinh" value="<?php echo KT_formatDate($row_rsusers['NgaySinh']); ?>" size="32" wdg:mondayfirst="false" wdg:subtype="Calendar" wdg:mask="<?php echo $KT_screen_date_format; ?>" wdg:type="widget" wdg:singleclick="false" wdg:restricttomask="no" wdg:readonly="true" />
          <?php echo $tNGs->displayFieldHint("NgaySinh");?> <?php echo $tNGs->displayFieldError("users", "NgaySinh"); ?> </td>
    </tr>
    <tr>
      <td class="KT_th"><label for="DiaChi">Địa chỉ:</label></td>
      <td><textarea name="DiaChi" id="DiaChi" cols="50" rows="5"><?php echo KT_escapeAttribute($row_rsusers['DiaChi']); ?></textarea>
          <?php echo $tNGs->displayFieldHint("DiaChi");?> <?php echo $tNGs->displayFieldError("users", "DiaChi"); ?> </td>
    </tr>
    <tr>
      <td class="KT_th"><label for="Dienthoai">Điện thoại:</label></td>
      <td><input type="text" name="Dienthoai" id="Dienthoai" value="<?php echo KT_escapeAttribute($row_rsusers['Dienthoai']); ?>" size="32" />
          <?php echo $tNGs->displayFieldHint("Dienthoai");?> <?php echo $tNGs->displayFieldError("users", "Dienthoai"); ?> </td>
    </tr>
    <tr>
      <td class="KT_th"><label for="Email">Email:</label></td>
      <td><input type="text" name="Email" id="Email" value="<?php echo KT_escapeAttribute($row_rsusers['Email']); ?>" size="32" />
          <?php echo $tNGs->displayFieldHint("Email");?> <?php echo $tNGs->displayFieldError("users", "Email"); ?> </td>
    </tr>
    <tr class="KT_buttons1">
      <td colspan="2"><div align="center">
        <input type="submit" name="KT_Update1" id="KT_Update1" value="Cập nhật" />      
        <label>
        <input type="reset" name="Reset" id="button" value="Hủy" />
        </label>
      </div></td>
    </tr>
  </table>
  <input type="hidden" name="NgayDangKy" id="NgayDangKy" value="<?php echo date('Y/m/d'); ?>" />
    </a><img src="images/back.png" border="0"/><a href="index.php" class="chitiet">Quay về trang chủ</a>
</form>
</fieldset>
</div>
</body>
</html>

