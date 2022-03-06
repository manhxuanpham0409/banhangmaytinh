<?php require_once('Connections/config.php'); ob_start();?>
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
$formValidation->addField("mailNG", true, "text", "", "", "", "Nhập địa chì người gửi");
$formValidation->addField("mailNN", true, "text", "", "", "", "Nhập địa chì người nhận");
$tNGs->prepareValidation($formValidation);
// End trigger

//start Trigger_SendEmail trigger
//remove this line if you want to edit the code by hand
function Trigger_SendEmail(&$tNG) {
  $emailObj = new tNG_Email($tNG);
  $emailObj->setFrom("star_computer@company.mail");
  $emailObj->setTo("{mailNN}");
  $emailObj->setCC("");
  $emailObj->setBCC("");
  $emailObj->setSubject("Star compter -linh kiện máy tính");
  //WriteContent method
  $emailObj->setContent("Bạn nhận được mail từ site: Star computer , do yêu cầu của : {mailNG}\n.....????\nLink xem sản phẩm:\n{link}\n\n\n<P>{loinhan}</P>\n<P>{link}</P>");
  $emailObj->setEncoding("UTF-8");
  $emailObj->setFormat("HTML/Text");
  $emailObj->setImportance("Normal");
  return $emailObj->Execute();
}
//end Trigger_SendEmail trigger

// Make an insert transaction instance
$ins_guimail = new tNG_insert($conn_config);
$tNGs->addTransaction($ins_guimail);
// Register triggers
$ins_guimail->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Insert1");
$ins_guimail->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$ins_guimail->registerTrigger("AFTER", "Trigger_SendEmail", 98);
// Add columns
$ins_guimail->setTable("guimail");
$ins_guimail->addColumn("mailNG", "STRING_TYPE", "POST", "mailNG");
$ins_guimail->addColumn("mailNN", "STRING_TYPE", "POST", "mailNN");
$ins_guimail->addColumn("loinhan", "STRING_TYPE", "POST", "loinhan");
$ins_guimail->addColumn("Ngaygui", "STRING_TYPE", "POST", "Ngaygui");
$ins_guimail->addColumn("link", "STRING_TYPE", "POST", "link");
$ins_guimail->addColumn("idSP", "STRING_TYPE", "POST", "idSP");
$ins_guimail->setPrimaryKey("idMail", "NUMERIC_TYPE");

// Execute all the registered transactions
$tNGs->executeTransactions();

// Get the transaction recordset
$rsguimail = $tNGs->getRecordset("guimail");
$row_rsguimail = mysql_fetch_assoc($rsguimail);
$totalRows_rsguimail = mysql_num_rows($rsguimail);
?>
<link href="includes/skins/mxkollection3.css" rel="stylesheet" type="text/css" media="all" />
<script src="includes/common/js/base.js" type="text/javascript"></script>
<script src="includes/common/js/utility.js" type="text/javascript"></script>
<script src="includes/skins/style.js" type="text/javascript"></script>
<?php echo $tNGs->displayValidationRules();?>
<?php
	echo $tNGs->getErrorMsg();
?>
<form method="post" id="form1" action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>">
  <table cellpadding="2" cellspacing="0" class="KT_tngtable1" width="600px">
    <tr>
      <td class="KT_th"><label for="mailNG">Địa chỉ người gửi:</label></td>
      <td><input type="text" name="mailNG" id="mailNG" value="<?php echo KT_escapeAttribute($row_rsguimail['mailNG']); ?>" size="32" />
          <?php echo $tNGs->displayFieldHint("mailNG");?> <?php echo $tNGs->displayFieldError("guimail", "mailNG"); ?> </td>
    </tr>
    <tr>
      <td class="KT_th"><label for="mailNN">Địa chỉ người nhận:</label></td>
      <td><input type="text" name="mailNN" id="mailNN" value="<?php echo KT_escapeAttribute($row_rsguimail['mailNN']); ?>" size="32" />
          <?php echo $tNGs->displayFieldHint("mailNN");?> <?php echo $tNGs->displayFieldError("guimail", "mailNN"); ?> </td>
    </tr>
    <tr>
      <td class="KT_th"><label for="loinhan">Lời nhắn</label></td>
      <td><textarea name="loinhan" id="loinhan" cols="50" rows="5"><?php echo KT_escapeAttribute($row_rsguimail['loinhan']); ?></textarea>
          <?php echo $tNGs->displayFieldHint("loinhan");?> <?php echo $tNGs->displayFieldError("guimail", "loinhan"); ?> </td>
    </tr>
    <tr class="KT_buttons1">
      <td colspan="2"><input type="submit" name="KT_Insert1" id="KT_Insert1" value="Gửi mail" />
      </td>
    </tr>
  </table>
  <input type="hidden" name="Ngaygui" id="Ngaygui" value="<?php echo date('d/m/Y'); ?>" />
  <input type="hidden" name="link" id="link" value="http://localhost/star_computer/index.php?mod=chitietsp&idSP=<?php echo $_GET['idSP']; ?>" />
  <input type="hidden" name="idSP" id="idSP" value="<?php echo $_GET['idSP']; ?>" />
</form>

