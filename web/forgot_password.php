<?php require_once('Connections/config.php'); ?>
<?php
// Load the common classes
require_once('includes/common/KT_common.php');
?>
<?php
// Load the tNG classes
require_once('includes/tng/tNG.inc.php');
?>
<?php
// Make a transaction dispatcher instance
$tNGs = new tNG_dispatcher("");
?>
<?php
// Make unified connection variable
$conn_config = new KT_connection($config, $database_config);
?>

<?php
// Start trigger
$formValidation = new tNG_FormValidation();
$formValidation->addField("Email", true, "text", "email", "", "", "");
$tNGs->prepareValidation($formValidation);
// End trigger
?>
<?php
//start Trigger_ForgotPasswordCheckEmail trigger
//remove this line if you want to edit the code by hand
function Trigger_ForgotPasswordCheckEmail(&$tNG) {
  return Trigger_ForgotPassword_CheckEmail($tNG);
}
//end Trigger_ForgotPasswordCheckEmail trigger
?>
<?php
//start Trigger_ForgotPassword_Email trigger
//remove this line if you want to edit the code by hand
function Trigger_ForgotPassword_Email(&$tNG) {
  $emailObj = new tNG_Email($tNG);
  $emailObj->setFrom("star_computer@company.mail");
  $emailObj->setTo("{Email}");
  $emailObj->setCC("");
  $emailObj->setBCC("");
  $emailObj->setSubject("Email quên mật khẩu");
  //FromFile method
  $emailObj->setContentFile("includes/mailtemplates/forgot.html");
  $emailObj->setEncoding("UTF-8");
  $emailObj->setFormat("HTML/Text");
  $emailObj->setImportance("Normal");
  return $emailObj->Execute();
}
//end Trigger_ForgotPassword_Email trigger
?>
<?php
// Make an update transaction instance
$forgotpass_transaction = new tNG_update($conn_config);
$tNGs->addTransaction($forgotpass_transaction);
// Register triggers
$forgotpass_transaction->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Update1");
$forgotpass_transaction->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$forgotpass_transaction->registerTrigger("BEFORE", "Trigger_ForgotPasswordCheckEmail", 20);
$forgotpass_transaction->registerTrigger("AFTER", "Trigger_ForgotPassword_Email", 1);
$forgotpass_transaction->registerTrigger("END", "Trigger_Default_Redirect", 99, "{kt_login_redirect}");
// Add columns
$forgotpass_transaction->setTable("users");
$forgotpass_transaction->addColumn("Email", "STRING_TYPE", "POST", "Email");
$forgotpass_transaction->setPrimaryKey("Email", "STRING_TYPE", "POST", "Email");
?>
<?php
// Execute all the registered transactions
$tNGs->executeTransactions();
?>
<?php
// Get the transaction recordset
$rsusers = $tNGs->getRecordset("users");
$row_rsusers = mysql_fetch_assoc($rsusers);
$totalRows_rsusers = mysql_num_rows($rsusers);
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Forgot Password Page</title>
<link href="includes/skins/mxkollection3.css" rel="stylesheet" type="text/css" media="all" />
<script src="includes/common/js/base.js" type="text/javascript"></script>
<script src="includes/common/js/utility.js" type="text/javascript"></script>
<script src="includes/skins/style.js" type="text/javascript"></script>

<?php echo $tNGs->displayValidationRules();?>
</head>

<body>

<?php
	echo $tNGs->getErrorMsg();
?>
	<form method="post" id="form1" action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>">
	<table cellpadding="2" cellspacing="0" class="KT_tngtable1">
			<tr>
	<td class="KT_th"><label for="Email"> Email:</label></td>
	<td>
		<input type="text" name="Email" id="Email" value="<?php echo KT_escapeAttribute($row_rsusers['Email']); ?>" size="32" />
		<?php echo $tNGs->displayFieldHint("Email");?>
		<?php echo $tNGs->displayFieldError("users", "Email"); ?>
	</td>
</tr>
			<tr class="KT_buttons1"> 
				<td colspan="2">
					<div align="center">
					  <input type="submit" name="KT_Update1" id="KT_Update1" value="Gừi" />
			        </div></td>
	  </tr>      
		</table>
		
	</form>
	<p>&nbsp;</p>
</body>
</html>
