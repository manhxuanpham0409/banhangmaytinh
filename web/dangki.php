<?php require_once('Connections/config.php'); ?><?php
//MX Widgets3 include


// Code này được tải từ : www.sharecode.org 



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
  $myThrowError->setErrorMsg("Passwords do not match.");
  $myThrowError->setField("Password");
  $myThrowError->setFieldErrorMsg("Hai mật khẩu không giống nhau");
  return $myThrowError->Execute();
}
//end Trigger_CheckPasswords trigger

//start Trigger_WelcomeEmail trigger
//remove this line if you want to edit the code by hand
function Trigger_WelcomeEmail(&$tNG) {
  $emailObj = new tNG_Email($tNG);
  $emailObj->setFrom("star_computer@company.mail");
  $emailObj->setTo("{Email}");
  $emailObj->setCC("");
  $emailObj->setBCC("");
  $emailObj->setSubject("Chào mừng thành viên mới");
  //FromFile method
  $emailObj->setContentFile("includes/mailtemplates/welcome.html");
  $emailObj->setEncoding("UTF-8");
  $emailObj->setFormat("HTML/Text");
  $emailObj->setImportance("Normal");
  return $emailObj->Execute();
}
//end Trigger_WelcomeEmail trigger

//start Trigger_ActivationEmail trigger
//remove this line if you want to edit the code by hand
function Trigger_ActivationEmail(&$tNG) {
  $emailObj = new tNG_Email($tNG);
  $emailObj->setFrom("star_computer@company.mail");
  $emailObj->setTo("{Email}");
  $emailObj->setCC("");
  $emailObj->setBCC("");
  $emailObj->setSubject("Mail kích hoạt tài khoản của website bán linh kiện máy tính Star computer");
  //FromFile method
  $emailObj->setContentFile("includes/mailtemplates/activate.html");
  $emailObj->setEncoding("ISO-8859-1");
  $emailObj->setFormat("HTML/Text");
  $emailObj->setImportance("Normal");
  return $emailObj->Execute();
}
//end Trigger_ActivationEmail trigger

// Start trigger
$formValidation = new tNG_FormValidation();
$formValidation->addField("Username", true, "text", "", "", "", "Nhập tên đăng nhập");
$formValidation->addField("Password", true, "text", "", "", "", " Nhập mật khẩu");
$formValidation->addField("HoTen", true, "text", "", "", "", "Họ tên");
$formValidation->addField("Dienthoai", true, "text", "", "", "", "Nhập số điện thoại");
$formValidation->addField("Email", true, "text", "email", "", "", "Nhập địa chỉ Email");
$tNGs->prepareValidation($formValidation);
// End trigger

// Make an insert transaction instance
$userRegistration = new tNG_insert($conn_config);
$tNGs->addTransaction($userRegistration);
// Register triggers
$userRegistration->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Insert1");
$userRegistration->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$userRegistration->registerTrigger("END", "Trigger_Default_Redirect", 99, "{kt_login_redirect}");
$userRegistration->registerConditionalTrigger("{POST.Password} != {POST.re_Password}", "BEFORE", "Trigger_CheckPasswords", 50);
$userRegistration->registerTrigger("AFTER", "Trigger_WelcomeEmail", 40);
$userRegistration->registerTrigger("AFTER", "Trigger_ActivationEmail", 40);
// Add columns
$userRegistration->setTable("users");
$userRegistration->addColumn("Username", "STRING_TYPE", "POST", "Username");
$userRegistration->addColumn("Password", "STRING_TYPE", "POST", "Password");
$userRegistration->addColumn("HoTen", "STRING_TYPE", "POST", "HoTen");
$userRegistration->addColumn("GioiTinh", "NUMERIC_TYPE", "POST", "GioiTinh");
$userRegistration->addColumn("DiaChi", "STRING_TYPE", "POST", "DiaChi");
$userRegistration->addColumn("Dienthoai", "STRING_TYPE", "POST", "Dienthoai");
$userRegistration->addColumn("NgaySinh", "DATE_TYPE", "POST", "NgaySinh");
$userRegistration->addColumn("Email", "STRING_TYPE", "POST", "Email");
$userRegistration->addColumn("NgayDangKy", "STRING_TYPE", "POST", "NgayDangKy");
$userRegistration->setPrimaryKey("idUser", "NUMERIC_TYPE");

// Execute all the registered transactions
$tNGs->executeTransactions();

// Get the transaction recordset
$rsusers = $tNGs->getRecordset("users");
$row_rsusers = mysql_fetch_assoc($rsusers);
$totalRows_rsusers = mysql_num_rows($rsusers);
?>
<html xmlns:wdg="http://ns.adobe.com/addt">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/mycss.css" rel="stylesheet" type="text/css"><link href=
</head><link href="includes/skins/mxkollection3.css" rel="stylesheet" type="text/css" media="all" /><script src="includes/common/js/base.js" type="text/javascript"></script><script src="includes/common/js/utility.js" type="text/javascript"></script><script src="includes/skins/style.js" type="text/javascript"></script><?php echo $tNGs->displayValidationRules();?>
<script type="text/javascript" src="includes/common/js/sigslot_core.js"></script>
<script type="text/javascript" src="includes/wdg/classes/MXWidgets.js"></script>
<script type="text/javascript" src="includes/wdg/classes/MXWidgets.js.php"></script>
<script type="text/javascript" src="includes/wdg/classes/Calendar.js"></script>
<script type="text/javascript" src="includes/wdg/classes/SmartDate.js"></script>
<script type="text/javascript" src="includes/wdg/calendar/calendar_stripped.js"></script>
<script type="text/javascript" src="includes/wdg/calendar/calendar-setup_stripped.js"></script>
<script src="includes/resources/calendar.js"></script>
<body>
<div class="khung">
    <fieldset>
    <h1>
      <label>TRANG ĐĂNG KÍ THÀNH VIÊN</label>
    </h1>   
    
    
<?php
	echo $tNGs->getErrorMsg();
?>
	<form method="post" id="form1" action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>">
		<table width="100%" cellpadding="2" cellspacing="0" class="KT_tngtable1">
		  <tr>
	<td class="KT_th"><label for="Username">Tên đăng nhập:</label></td>
	<td>
		<input type="text" name="Username" id="Username" value="<?php echo KT_escapeAttribute($row_rsusers['Username']); ?>" size="32" />
		<?php echo $tNGs->displayFieldHint("Username");?>
		<?php echo $tNGs->displayFieldError("users", "Username"); ?>
	</td>
</tr>
		  <tr>
	<td class="KT_th"><label for="Password">Mật khẩu:</label></td>
	<td>
		<input type="password" name="Password" id="Password" value="" size="32" />
		<?php echo $tNGs->displayFieldHint("Password");?>
		<?php echo $tNGs->displayFieldError("users", "Password"); ?>
	</td>
</tr>
<tr>
	<td class="KT_th"><label for="re_Password">Re-type Mật khẩu:</label></td>
	<td>
		<input type="password" name="re_Password" id="re_Password" value="" size="32" />
	</td>
</tr>
		  <tr>
	<td class="KT_th"><label for="HoTen">Họ tên:</label></td>
	<td>
		<input type="text" name="HoTen" id="HoTen" value="<?php echo KT_escapeAttribute($row_rsusers['HoTen']); ?>" size="32" />
		<?php echo $tNGs->displayFieldHint("HoTen");?>
		<?php echo $tNGs->displayFieldError("users", "HoTen"); ?>
	</td>
</tr>
		  <tr>
	<td class="KT_th"><label for="GioiTinh_1">Giới tính:</label></td>
	<td>
	
			<input <?php if (!(strcmp(KT_escapeAttribute($row_rsusers['GioiTinh']),"1"))) {echo "CHECKED";} ?> type="radio" name="GioiTinh" id="GioiTinh_1" value="1" />
			<label for="GioiTinh_1">Nam</label>
	
			<input <?php if (!(strcmp(KT_escapeAttribute($row_rsusers['GioiTinh']),"0"))) {echo "CHECKED";} ?> type="radio" name="GioiTinh" id="GioiTinh_2" value="0" />
			<label for="GioiTinh_2">Nữ</label>
		
		<?php echo $tNGs->displayFieldError("users", "GioiTinh"); ?>
	</td>
</tr>
		  <tr>
	<td class="KT_th"><label for="DiaChi">Địa chỉ:</label></td>
	<td>
		<textarea name="DiaChi" id="DiaChi" cols="50" rows="5"><?php echo KT_escapeAttribute($row_rsusers['DiaChi']); ?></textarea>
		<?php echo $tNGs->displayFieldHint("DiaChi");?>
		<?php echo $tNGs->displayFieldError("users", "DiaChi"); ?>
	</td>
</tr>
		  <tr>
	<td class="KT_th"><label for="Dienthoai">Điện thoại:</label></td>
	<td>
		<input type="text" name="Dienthoai" id="Dienthoai" value="<?php echo KT_escapeAttribute($row_rsusers['Dienthoai']); ?>" size="32" />
		<?php echo $tNGs->displayFieldHint("Dienthoai");?>
		<?php echo $tNGs->displayFieldError("users", "Dienthoai"); ?>
	</td>
</tr>
		  <tr>
	<td class="KT_th"><label for="NgaySinh">Ngày sinh:</label></td>
	<td>
		<input name="NgaySinh" id="NgaySinh" value="<?php echo KT_formatDate($row_rsusers['NgaySinh']); ?>" size="32" wdg:mondayfirst="false" wdg:subtype="Calendar" wdg:mask="<?php echo $KT_screen_date_format; ?>" wdg:type="widget" wdg:singleclick="false" wdg:restricttomask="no" wdg:readonly="true" />
		<?php echo $tNGs->displayFieldHint("NgaySinh");?>
		<?php echo $tNGs->displayFieldError("users", "NgaySinh"); ?>
	</td>
</tr>
		  <tr>
	<td class="KT_th"><label for="Email">Email:</label></td>
	<td>
		<input type="text" name="Email" id="Email" value="<?php echo KT_escapeAttribute($row_rsusers['Email']); ?>" size="32" />
		<?php echo $tNGs->displayFieldHint("Email");?>
		<?php echo $tNGs->displayFieldError("users", "Email"); ?>
	</td>
</tr>
		  <tr class="KT_buttons1"> 
		    <td colspan="2">
					<input type="submit" name="KT_Insert1" id="KT_Insert1" value="Đăng kí" />
					<label>
					<input type="reset" name="Reset" id="button" value="Hủy">
					</label>				</td>
		  </tr>      
		</table>
		<input type="hidden" name="NgayDangKy" id="NgayDangKy" value="<?php echo date('d/m/Y');?>" />
	  </a><img src="images/back.png" border="0"/><a href="index.php" class="chitiet">Quay về trang chủ</a>	
	</form>
	<p>&nbsp;</p>
</fieldset>
  </div>
</body>