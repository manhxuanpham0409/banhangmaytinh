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
$formValidation->addField("mailNG", true, "text", "", "", "", "Nhập địa chỉ ");
$formValidation->addField("loinhan", true, "text", "", "", "", "Nhập nội dung");
$tNGs->prepareValidation($formValidation);
// End trigger

//start Trigger_SendEmail trigger
//remove this line if you want to edit the code by hand
function Trigger_SendEmail(&$tNG) {
  $emailObj = new tNG_Email($tNG);
  $emailObj->setFrom("{mailNG}");
  $emailObj->setTo("star_computer@company.mail");
  $emailObj->setCC("");
  $emailObj->setBCC("");
  $emailObj->setSubject("Liên hệ của khách hàng");
  //WriteContent method
  $emailObj->setContent("{loinhan}");
  $emailObj->setEncoding("UTF-8");
  $emailObj->setFormat("HTML/Text");
  $emailObj->setImportance("Normal");
  return $emailObj->Execute();
}
//end Trigger_SendEmail trigger

// Make an insert transaction instance
$ins_lienhe = new tNG_insert($conn_config);
$tNGs->addTransaction($ins_lienhe);
// Register triggers
$ins_lienhe->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Insert1");
$ins_lienhe->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$ins_lienhe->registerTrigger("END", "Trigger_Default_Redirect", 99, "index.php");
$ins_lienhe->registerTrigger("AFTER", "Trigger_SendEmail", 98);
// Add columns
$ins_lienhe->setTable("lienhe");
$ins_lienhe->addColumn("mailNG", "STRING_TYPE", "POST", "mailNG");
$ins_lienhe->addColumn("loinhan", "STRING_TYPE", "POST", "loinhan");
$ins_lienhe->addColumn("Ngaygui", "DATE_TYPE", "POST", "Ngaygui");
$ins_lienhe->setPrimaryKey("idMail", "NUMERIC_TYPE");

// Execute all the registered transactions
$tNGs->executeTransactions();

// Get the transaction recordset
$rslienhe = $tNGs->getRecordset("lienhe");
$row_rslienhe = mysql_fetch_assoc($rslienhe);
$totalRows_rslienhe = mysql_num_rows($rslienhe);
?><link href="css/mycss.css" rel="stylesheet" type="text/css">
<link href="includes/skins/mxkollection3.css" rel="stylesheet" type="text/css" media="all" />
<script src="includes/common/js/base.js" type="text/javascript"></script>
<script src="includes/common/js/utility.js" type="text/javascript"></script>
<script src="includes/skins/style.js" type="text/javascript"></script>
<?php echo $tNGs->displayValidationRules();?>
<body>
<div class="khung">
    <fieldset>
    <h1><label>TRANG LIÊN HỆ</label></h1>
    <p>&nbsp;
      <?php
	echo $tNGs->getErrorMsg();
?>
    <form method="post" id="form1" action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>">
      <table cellpadding="2" cellspacing="0" class="KT_tngtable1">
        <tr>
          <td class="KT_th"><label for="mailNG">Mail của bạn </label></td>
          <td><input type="text" name="mailNG" id="mailNG" value="<?php echo KT_escapeAttribute($row_rslienhe['mailNG']); ?>" size="32" />
              <?php echo $tNGs->displayFieldHint("mailNG");?> <?php echo $tNGs->displayFieldError("lienhe", "mailNG"); ?> </td>
        </tr>
        <tr>
          <td class="KT_th"><label for="loinhan">Nội dung cần liên hệ :</label></td>
          <td><textarea name="loinhan" id="loinhan" cols="50" rows="5"><?php echo KT_escapeAttribute($row_rslienhe['loinhan']); ?></textarea>
              <?php echo $tNGs->displayFieldHint("loinhan");?> <?php echo $tNGs->displayFieldError("lienhe", "loinhan"); ?> </td>
        </tr>
        <tr class="KT_buttons1">
          <td colspan="2"><input type="submit" name="KT_Insert1" id="KT_Insert1" value="Gửi liên hệ" />
          </td>
        </tr>
      </table>
      <input type="hidden" name="Ngaygui" id="Ngaygui" value="<?php echo date('d/m/Y'); ?>" />
    </form>
    <p>&nbsp;</p>
    </p>
    </fieldset>
</div>
</body>
