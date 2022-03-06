<?php require_once('../Connections/config.php'); ?>
<?php
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
$formValidation->addField("Ten", true, "text", "", "", "", "Nhập tên hãng sãn xuất");
$tNGs->prepareValidation($formValidation);
// End trigger

//start Trigger_CheckDetail trigger
//remove this line if you want to edit the code by hand
function Trigger_CheckDetail(&$tNG) {
  $tblFldObj = new tNG_CheckDetailRecord($tNG);
  $tblFldObj->setTable("sanpham");
  $tblFldObj->setFieldName("idHang");
  $tblFldObj->setErrorMsg("Không thể xóa ! vì {Ten} còn sản phẩm");
  return $tblFldObj->Execute();
}
//end Trigger_CheckDetail trigger

// Make an insert transaction instance
$ins_hangsx = new tNG_multipleInsert($conn_config);
$tNGs->addTransaction($ins_hangsx);
// Register triggers
$ins_hangsx->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Insert1");
$ins_hangsx->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$ins_hangsx->registerTrigger("END", "Trigger_Default_Redirect", 99, "../includes/nxt/back.php");
// Add columns
$ins_hangsx->setTable("hangsx");
$ins_hangsx->addColumn("Ten", "STRING_TYPE", "POST", "Ten");
$ins_hangsx->addColumn("ThuTu", "NUMERIC_TYPE", "POST", "ThuTu");
$ins_hangsx->addColumn("AnHien", "CHECKBOX_1_0_TYPE", "POST", "AnHien", "1");
$ins_hangsx->setPrimaryKey("idHang", "NUMERIC_TYPE");

// Make an update transaction instance
$upd_hangsx = new tNG_multipleUpdate($conn_config);
$tNGs->addTransaction($upd_hangsx);
// Register triggers
$upd_hangsx->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Update1");
$upd_hangsx->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$upd_hangsx->registerTrigger("END", "Trigger_Default_Redirect", 99, "../includes/nxt/back.php");
// Add columns
$upd_hangsx->setTable("hangsx");
$upd_hangsx->addColumn("Ten", "STRING_TYPE", "POST", "Ten");
$upd_hangsx->addColumn("ThuTu", "NUMERIC_TYPE", "POST", "ThuTu");
$upd_hangsx->addColumn("AnHien", "CHECKBOX_1_0_TYPE", "POST", "AnHien");
$upd_hangsx->setPrimaryKey("idHang", "NUMERIC_TYPE", "GET", "idHang");

// Make an instance of the transaction object
$del_hangsx = new tNG_multipleDelete($conn_config);
$tNGs->addTransaction($del_hangsx);
// Register triggers
$del_hangsx->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Delete1");
$del_hangsx->registerTrigger("END", "Trigger_Default_Redirect", 99, "../includes/nxt/back.php");
$del_hangsx->registerTrigger("BEFORE", "Trigger_CheckDetail", 40);
// Add columns
$del_hangsx->setTable("hangsx");
$del_hangsx->setPrimaryKey("idHang", "NUMERIC_TYPE", "GET", "idHang");

// Execute all the registered transactions
$tNGs->executeTransactions();

// Get the transaction recordset
$rshangsx = $tNGs->getRecordset("hangsx");
$row_rshangsx = mysql_fetch_assoc($rshangsx);
$totalRows_rshangsx = mysql_num_rows($rshangsx);
?>
<link href="../includes/skins/mxkollection3.css" rel="stylesheet" type="text/css" media="all" />
<script src="../includes/common/js/base.js" type="text/javascript"></script>
<script src="../includes/common/js/utility.js" type="text/javascript"></script>
<script src="../includes/skins/style.js" type="text/javascript"></script>
<?php echo $tNGs->displayValidationRules();?>
<script src="../includes/nxt/scripts/form.js" type="text/javascript"></script>
<script src="../includes/nxt/scripts/form.js.php" type="text/javascript"></script>
<script type="text/javascript">
$NXT_FORM_SETTINGS = {
  duplicate_buttons: true,
  show_as_grid: true,
  merge_down_value: true
}
</script>
<?php
	echo $tNGs->getErrorMsg();
?>
<div class="KT_tng">
  <h1>
    <?php 
// Show IF Conditional region1 
if (@$_GET['idHang'] == "") {
?>
      <?php echo NXT_getResource("Thêm hãng "); ?>
      <?php 
// else Conditional region1
} else { ?>
      <?php echo NXT_getResource("Cập nhật "); ?>
      <?php } 
// endif Conditional region1
?> 
      hãng sản xuất</h1>
  <div class="KT_tngform">
    <form method="post" id="form1" action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>">
      <?php $cnt1 = 0; ?>
      <?php do { ?>
        <?php $cnt1++; ?>
        <?php 
// Show IF Conditional region1 
if (@$totalRows_rshangsx > 1) {
?>
          <h2><?php echo NXT_getResource("Record_FH"); ?> <?php echo $cnt1; ?></h2>
          <?php } 
// endif Conditional region1
?>
        <table align="center" cellpadding="2" cellspacing="0" class="KT_tngtable">
          <tr>
            <td class="KT_th"><label for="Ten_<?php echo $cnt1; ?>">Tên hãng</label></td>
            <td><input type="text" name="Ten_<?php echo $cnt1; ?>" id="Ten_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rshangsx['Ten']); ?>" size="32" maxlength="100" />
                <?php echo $tNGs->displayFieldHint("Ten");?> <?php echo $tNGs->displayFieldError("hangsx", "Ten", $cnt1); ?> </td>
          </tr>
          <tr>
            <td class="KT_th"><label for="ThuTu_<?php echo $cnt1; ?>">Thứ tự</label></td>
            <td><input type="text" name="ThuTu_<?php echo $cnt1; ?>" id="ThuTu_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rshangsx['ThuTu']); ?>" size="7" />
                <?php echo $tNGs->displayFieldHint("ThuTu");?> <?php echo $tNGs->displayFieldError("hangsx", "ThuTu", $cnt1); ?> </td>
          </tr>
          <tr>
            <td class="KT_th"><label for="AnHien_<?php echo $cnt1; ?>">Hiện</label></td>
            <td><input name="AnHien_<?php echo $cnt1; ?>" type="checkbox" id="AnHien_<?php echo $cnt1; ?>" value="1" checked="checked"  <?php if (!(strcmp(KT_escapeAttribute($row_rshangsx['AnHien']),"1"))) {echo "checked";} ?> />
                <?php echo $tNGs->displayFieldError("hangsx", "AnHien", $cnt1); ?> </td>
          </tr>
        </table>
        <input type="hidden" name="kt_pk_hangsx_<?php echo $cnt1; ?>" class="id_field" value="<?php echo KT_escapeAttribute($row_rshangsx['kt_pk_hangsx']); ?>" />
        <?php } while ($row_rshangsx = mysql_fetch_assoc($rshangsx)); ?>
      <div class="KT_bottombuttons">
        <div>
          <?php 
      // Show IF Conditional region1
      if (@$_GET['idHang'] == "") {
      ?>
            <input type="submit" name="KT_Insert1" id="KT_Insert1" value="<?php echo NXT_getResource("Thêm"); ?>" />
            <?php 
      // else Conditional region1
      } else { ?>
            <div class="KT_operations"></div>
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
