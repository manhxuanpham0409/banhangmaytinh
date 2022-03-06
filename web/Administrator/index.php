<?php require_once('../Connections/config.php'); ?>
<?php
// Load the common classes
require_once('../includes/common/KT_common.php');

// Load the tNG classes
require_once('../includes/tng/tNG.inc.php');

// Make a transaction dispatcher instance
$tNGs = new tNG_dispatcher("../");

// Make unified connection variable
$conn_config = new KT_connection($config, $database_config);

// Start trigger
$formValidation = new tNG_FormValidation();
$formValidation->addField("kt_login_user", true, "text", "", "", "", "");
$formValidation->addField("kt_login_password", true, "text", "", "", "", "");
$tNGs->prepareValidation($formValidation);
// End trigger

// Start trigger
$formValidation1 = new tNG_FormValidation();
$formValidation1->addField("kt_login_user", true, "text", "", "", "", "");
$formValidation1->addField("kt_login_password", true, "text", "", "", "", "");
$tNGs->prepareValidation($formValidation1);
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
// End of login transaction instance

// Make a login transaction instance
$loginTransaction1 = new tNG_login($conn_config);
$tNGs->addTransaction($loginTransaction1);
// Register triggers
$loginTransaction1->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "kt_login2");
$loginTransaction1->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation1);
$loginTransaction1->registerTrigger("END", "Trigger_Default_Redirect", 99, "{kt_login_redirect}");
// Add columns
$loginTransaction1->addColumn("kt_login_user", "STRING_TYPE", "POST", "kt_login_user");
$loginTransaction1->addColumn("kt_login_password", "STRING_TYPE", "POST", "kt_login_password");
// End of login transaction instance

// Make a logout transaction instance
$logoutTransaction = new tNG_logoutTransaction($conn_config);
$tNGs->addTransaction($logoutTransaction);
// Register triggers
$logoutTransaction->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "GET", "KT_logout_now");
$logoutTransaction->registerTrigger("END", "Trigger_Default_Redirect", 99, "../index.php");
// Add columns
// End of logout transaction instance

// Execute all the registered transactions
$tNGs->executeTransactions();

// Get the transaction recordset
$rscustom = $tNGs->getRecordset("custom");
$row_rscustom = mysql_fetch_assoc($rscustom);
$totalRows_rscustom = mysql_num_rows($rscustom);
 session_start();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login</title>
<link href="css/myadmin.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="../js/dungchung.js"></script>
<link href="../includes/skins/mxkollection3.css" rel="stylesheet" type="text/css" media="all" />
<script src="../includes/common/js/base.js" type="text/javascript"></script>
<script src="../includes/common/js/utility.js" type="text/javascript"></script>
<script src="../includes/skins/style.js" type="text/javascript"></script>
<?php echo $tNGs->displayValidationRules();?>
</head>
<body>
<div id="login">
  <fieldset>
  <div id="login_title">star_computer!LOGIN</div>
  <div id="logo"><img src="images/banner.png" /></div>
	<div id="dangnhap">
          <div id="user">
            <form method="post" id="form1" class="KT_tngformerror" action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>">
              <table cellpadding="2" cellspacing="0" class="KT_tngtable1">
                <tr>
                  <td class="KT_th"><label for="kt_login_user">Username:</label>
                    <br />
                    <input type="text" name="kt_login_user" id="kt_login_user" value="<?php echo KT_escapeAttribute($row_rscustom['kt_login_user']); ?>" size="20" />
                      <?php echo $tNGs->displayFieldHint("kt_login_user");?> <?php echo $tNGs->displayFieldError("custom", "kt_login_user"); ?> </td>
                </tr>
                <tr>
                  <td class="KT_th"><label for="kt_login_password">Password:</label>
                    <br />
                    <input type="password" name="kt_login_password" id="kt_login_password" value="" size="20" />
                      <?php echo $tNGs->displayFieldHint("kt_login_password");?> <?php echo $tNGs->displayFieldError("custom", "kt_login_password"); ?> </td>
                </tr>
                <tr>
                  <td><input type="submit" name="kt_login2" id="kt_login2" value="Login" /> 
                                        <a href="<?php echo $logoutTransaction->getLogoutLink(); ?>">Thoát</a></td>
                </tr>
              </table>
            </form>
            
          </div>            
  </div>
  </fieldset>
  <span style="color:#CCCCCC; font-size:12px">Designer: Huỳnh Văn Được</span></div>
</body>
</html>
