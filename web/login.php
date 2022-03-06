<?php require_once('Connections/config.php'); ?>
<?php
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
$formValidation->addField("kt_login_user", true, "text", "", "", "", "");
$formValidation->addField("kt_login_password", true, "text", "", "", "", "");
$tNGs->prepareValidation($formValidation);
// End trigger

// Make a login transaction instance
$loginTransaction = new tNG_login($conn_config);
$tNGs->addTransaction($loginTransaction);
// Register triggers
$loginTransaction->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "kt_login1");
$loginTransaction->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$loginTransaction->registerTrigger("END", "Trigger_Default_Redirect", 99, "{kt_login_redirect}");
// Add columns
$loginTransaction->addColumn("kt_login_user", "STRING_TYPE", "POST", "kt_login_user");
$loginTransaction->addColumn("kt_login_password", "STRING_TYPE", "POST", "kt_login_password");
$loginTransaction->addColumn("kt_login_rememberme", "CHECKBOX_1_0_TYPE", "POST", "kt_login_rememberme", "0");
// End of login transaction instance

// Execute all the registered transactions
$tNGs->executeTransactions();

// Get the transaction recordset
$rscustom = $tNGs->getRecordset("custom");
$row_rscustom = mysql_fetch_assoc($rscustom);
$totalRows_rscustom = mysql_num_rows($rscustom);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="css/star_computer.css" rel="stylesheet" type="text/css" />
<link href="includes/skins/mxkollection3.css" rel="stylesheet" type="text/css" media="all" />
<script src="includes/common/js/base.js" type="text/javascript"></script>
<script src="includes/common/js/utility.js" type="text/javascript"></script>
<script src="includes/skins/style.js" type="text/javascript"></script>
<?php echo $tNGs->displayValidationRules();?>
</head>

<body>
<div id="right">
	<div id="item">
      <?php
	echo $tNGs->getLoginMsg();
?>
      <form method="post" id="form1" class="KT_tngformerror" action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>">
        <?php
	echo $tNGs->getErrorMsg();
?>
        <table width="95%" border="0" cellpadding="4" cellspacing="0" class="KT_tngtable">
          <tr>
            <td colspan="2" class="KT_th"><label for="kt_login_user">Username:</label>
              <p>
                <input type="text" name="kt_login_user" id="kt_login_user" value="<?php echo KT_escapeAttribute($row_rscustom['kt_login_user']); ?>" size="20" />
                <?php echo $tNGs->displayFieldHint("kt_login_user");?> <?php echo $tNGs->displayFieldError("custom", "kt_login_user"); ?> </p></td>
          </tr>
          <tr>
            <td colspan="2" class="KT_th"><label for="kt_login_password">Password:</label>
              <p><input type="password" name="kt_login_password" id="kt_login_password" value="" size="20" />
                <?php echo $tNGs->displayFieldHint("kt_login_password");?> <?php echo $tNGs->displayFieldError("custom", "kt_login_password"); ?> </p></td>
          </tr>
          <tr>
            <td class="KT_th"><label for="kt_login_rememberme">Remember me:</label></td>
            <td><input  <?php if (!(strcmp(KT_escapeAttribute($row_rscustom['kt_login_rememberme']),"1"))) {echo "checked";} ?> type="checkbox" name="kt_login_rememberme" id="kt_login_rememberme" value="1" />
                <?php echo $tNGs->displayFieldError("custom", "kt_login_rememberme"); ?> </td>
          </tr>
          <tr class="KT_buttons">
            <td colspan="2"><input type="submit" name="kt_login1" id="kt_login1" value="Login" />
              Quên mật khẩu</td>
          </tr>
        </table>
      </form>
      <p>&nbsp;</p>
	</div>
</div>
</body>
</html>
