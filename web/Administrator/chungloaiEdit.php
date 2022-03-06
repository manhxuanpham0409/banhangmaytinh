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
$formValidation->addField("TenCL", true, "text", "", "", "", "Nhập tên chủng loại");
$tNGs->prepareValidation($formValidation);
// End trigger

//start Trigger_CheckDetail trigger
//remove this line if you want to edit the code by hand
function Trigger_CheckDetail(&$tNG) {
  $tblFldObj = new tNG_CheckDetailRecord($tNG);
  $tblFldObj->setTable("sanpham");
  $tblFldObj->setFieldName("idCL");
  $tblFldObj->setErrorMsg("Không thể xóa ! vì {TenCL} còn có nhiều sản phẩm");
  return $tblFldObj->Execute();
}
//end Trigger_CheckDetail trigger

// Make an insert transaction instance
$ins_chungloai = new tNG_multipleInsert($conn_config);
$tNGs->addTransaction($ins_chungloai);
// Register triggers
$ins_chungloai->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Insert1");
$ins_chungloai->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$ins_chungloai->registerTrigger("END", "Trigger_Default_Redirect", 99, "../includes/nxt/back.php");
// Add columns
$ins_chungloai->setTable("chungloai");
$ins_chungloai->addColumn("TenCL", "STRING_TYPE", "POST", "TenCL");
$ins_chungloai->addColumn("LinhTinh", "CHECKBOX_1_0_TYPE", "POST", "LinhTinh", "0");
$ins_chungloai->addColumn("AnHien", "CHECKBOX_1_0_TYPE", "POST", "AnHien", "1");
$ins_chungloai->setPrimaryKey("idCL", "NUMERIC_TYPE");

// Make an update transaction instance
$upd_chungloai = new tNG_multipleUpdate($conn_config);
$tNGs->addTransaction($upd_chungloai);
// Register triggers
$upd_chungloai->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Update1");
$upd_chungloai->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$upd_chungloai->registerTrigger("END", "Trigger_Default_Redirect", 99, "../includes/nxt/back.php");
// Add columns
$upd_chungloai->setTable("chungloai");
$upd_chungloai->addColumn("TenCL", "STRING_TYPE", "POST", "TenCL");
$upd_chungloai->addColumn("LinhTinh", "CHECKBOX_1_0_TYPE", "POST", "LinhTinh");
$upd_chungloai->addColumn("AnHien", "CHECKBOX_1_0_TYPE", "POST", "AnHien");
$upd_chungloai->setPrimaryKey("idCL", "NUMERIC_TYPE", "GET", "idCL");

// Make an instance of the transaction object
$del_chungloai = new tNG_multipleDelete($conn_config);
$tNGs->addTransaction($del_chungloai);
// Register triggers
$del_chungloai->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Delete1");
$del_chungloai->registerTrigger("END", "Trigger_Default_Redirect", 99, "../includes/nxt/back.php");
$del_chungloai->registerTrigger("BEFORE", "Trigger_CheckDetail", 40);
// Add columns
$del_chungloai->setTable("chungloai");
$del_chungloai->setPrimaryKey("idCL", "NUMERIC_TYPE", "GET", "idCL");

// Execute all the registered transactions
$tNGs->executeTransactions();

// Get the transaction recordset
$rschungloai = $tNGs->getRecordset("chungloai");
$row_rschungloai = mysql_fetch_assoc($rschungloai);
$totalRows_rschungloai = mysql_num_rows($rschungloai);
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
if (@$_GET['idCL'] == "") {
?>
      <?php echo NXT_getResource("Thêm"); ?>
      <?php 
// else Conditional region1
} else { ?>
      <?php echo NXT_getResource("Cập nhật"); ?>
      <?php } 
// endif Conditional region1
?> 
      chủng loại </h1>
  <div class="KT_tngform">
    <form method="post" id="form1" action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>">
      <?php $cnt1 = 0; ?>
      <?php do { ?>
        <?php $cnt1++; ?>
        <?php 
// Show IF Conditional region1 
if (@$totalRows_rschungloai > 1) {
?>
          <h2><?php echo NXT_getResource("Record_FH"); ?> <?php echo $cnt1; ?></h2>
          <?php } 
// endif Conditional region1
?>
        <table align="center" cellpadding="2" cellspacing="0" class="KT_tngtable">
          <tr>
            <td class="KT_th"><label for="TenCL_<?php echo $cnt1; ?>">Tên chủng loại</label></td>
            <td><input type="text" name="TenCL_<?php echo $cnt1; ?>" id="TenCL_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rschungloai['TenCL']); ?>" size="30" maxlength="30" />
                <?php echo $tNGs->displayFieldHint("TenCL");?> <?php echo $tNGs->displayFieldError("chungloai", "TenCL", $cnt1); ?> </td>
          </tr>
          <tr>
            <td class="KT_th"><label for="LinhTinh_<?php echo $cnt1; ?>">Linh tinh</label></td>
            <td><input  <?php if (!(strcmp(KT_escapeAttribute($row_rschungloai['LinhTinh']),"1"))) {echo "checked";} ?> type="checkbox" name="LinhTinh_<?php echo $cnt1; ?>" id="LinhTinh_<?php echo $cnt1; ?>" value="1" />
                <?php echo $tNGs->displayFieldError("chungloai", "LinhTinh", $cnt1); ?> </td>
          </tr>
          <tr>
            <td class="KT_th"><label for="AnHien_<?php echo $cnt1; ?>">Hiện</label></td>
            <td><input  <?php if (!(strcmp(KT_escapeAttribute($row_rschungloai['AnHien']),"1"))) {echo "checked";} ?> type="checkbox" name="AnHien_<?php echo $cnt1; ?>" id="AnHien_<?php echo $cnt1; ?>" value="1" />
                <?php echo $tNGs->displayFieldError("chungloai", "AnHien", $cnt1); ?> </td>
          </tr>
        </table>
        <input type="hidden" name="kt_pk_chungloai_<?php echo $cnt1; ?>" class="id_field" value="<?php echo KT_escapeAttribute($row_rschungloai['kt_pk_chungloai']); ?>" />
        <?php } while ($row_rschungloai = mysql_fetch_assoc($rschungloai)); ?>
      <div class="KT_bottombuttons">
        <div>
          <?php 
      // Show IF Conditional region1
      if (@$_GET['idCL'] == "") {
      ?>
            <input type="submit" name="KT_Insert1" id="KT_Insert1" value="<?php echo NXT_getResource("Thêm"); ?>" />
            <?php 
      // else Conditional region1
      } else { ?>
            <div class="KT_operations">
              <input type="submit" name="KT_Insert1" value="<?php echo NXT_getResource("Thêm mới"); ?>" onclick="nxt_form_insertasnew(this, 'idCL')" />
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
