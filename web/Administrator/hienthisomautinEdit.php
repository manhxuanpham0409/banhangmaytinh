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
$formValidation->addField("TenMauTin", true, "text", "", "", "", "Nhập tên mẫu tin");
$formValidation->addField("SoMauTin", true, "numeric", "", "", "", "Nhập số mẫu tin");
$tNGs->prepareValidation($formValidation);
// End trigger

// Make an insert transaction instance
$ins_hiensomautin = new tNG_multipleInsert($conn_config);
$tNGs->addTransaction($ins_hiensomautin);
// Register triggers
$ins_hiensomautin->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Insert1");
$ins_hiensomautin->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$ins_hiensomautin->registerTrigger("END", "Trigger_Default_Redirect", 99, "../includes/nxt/back.php");
// Add columns
$ins_hiensomautin->setTable("hiensomautin");
$ins_hiensomautin->addColumn("TenMauTin", "STRING_TYPE", "POST", "TenMauTin");
$ins_hiensomautin->addColumn("SoMauTin", "NUMERIC_TYPE", "POST", "SoMauTin");
$ins_hiensomautin->setPrimaryKey("idSoMauTin", "NUMERIC_TYPE");

// Make an update transaction instance
$upd_hiensomautin = new tNG_multipleUpdate($conn_config);
$tNGs->addTransaction($upd_hiensomautin);
// Register triggers
$upd_hiensomautin->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Update1");
$upd_hiensomautin->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$upd_hiensomautin->registerTrigger("END", "Trigger_Default_Redirect", 99, "../includes/nxt/back.php");
// Add columns
$upd_hiensomautin->setTable("hiensomautin");
$upd_hiensomautin->addColumn("TenMauTin", "STRING_TYPE", "POST", "TenMauTin");
$upd_hiensomautin->addColumn("SoMauTin", "NUMERIC_TYPE", "POST", "SoMauTin");
$upd_hiensomautin->setPrimaryKey("idSoMauTin", "NUMERIC_TYPE", "GET", "idSoMauTin");

// Make an instance of the transaction object
$del_hiensomautin = new tNG_multipleDelete($conn_config);
$tNGs->addTransaction($del_hiensomautin);
// Register triggers
$del_hiensomautin->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Delete1");
$del_hiensomautin->registerTrigger("END", "Trigger_Default_Redirect", 99, "../includes/nxt/back.php");
// Add columns
$del_hiensomautin->setTable("hiensomautin");
$del_hiensomautin->setPrimaryKey("idSoMauTin", "NUMERIC_TYPE", "GET", "idSoMauTin");

// Execute all the registered transactions
$tNGs->executeTransactions();

// Get the transaction recordset
$rshiensomautin = $tNGs->getRecordset("hiensomautin");
$row_rshiensomautin = mysql_fetch_assoc($rshiensomautin);
$totalRows_rshiensomautin = mysql_num_rows($rshiensomautin);
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
if (@$_GET['idSoMauTin'] == "") {
?>
      <?php echo NXT_getResource("Thêm"); ?>
      <?php 
// else Conditional region1
} else { ?>
      <?php echo NXT_getResource("Cập nhật"); ?>
      <?php } 
// endif Conditional region1
?> 
      cho hiển thị số mẫu tin</h1>
  <div class="KT_tngform">
    <form method="post" id="form1" action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>">
      <?php $cnt1 = 0; ?>
      <?php do { ?>
        <?php $cnt1++; ?>
        <?php 
// Show IF Conditional region1 
if (@$totalRows_rshiensomautin > 1) {
?>
          <h2><?php echo NXT_getResource("Record_FH"); ?> <?php echo $cnt1; ?></h2>
          <?php } 
// endif Conditional region1
?>
        <table align="center" cellpadding="2" cellspacing="0" class="KT_tngtable">
          <tr>
            <td class="KT_th"><label for="TenMauTin_<?php echo $cnt1; ?>">Tên mẫu tin</label></td>
            <td><input type="text" name="TenMauTin_<?php echo $cnt1; ?>" id="TenMauTin_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rshiensomautin['TenMauTin']); ?>" size="32" maxlength="100" />
                <?php echo $tNGs->displayFieldHint("TenMauTin");?> <?php echo $tNGs->displayFieldError("hiensomautin", "TenMauTin", $cnt1); ?> </td>
          </tr>
          <tr>
            <td class="KT_th"><label for="SoMauTin_<?php echo $cnt1; ?>">Số mẫu tin hiện thị</label></td>
            <td><input type="text" name="SoMauTin_<?php echo $cnt1; ?>" id="SoMauTin_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rshiensomautin['SoMauTin']); ?>" size="2" />
                <?php echo $tNGs->displayFieldHint("SoMauTin");?> <?php echo $tNGs->displayFieldError("hiensomautin", "SoMauTin", $cnt1); ?> </td>
          </tr>
        </table>
        <input type="hidden" name="kt_pk_hiensomautin_<?php echo $cnt1; ?>" class="id_field" value="<?php echo KT_escapeAttribute($row_rshiensomautin['kt_pk_hiensomautin']); ?>" />
        <?php } while ($row_rshiensomautin = mysql_fetch_assoc($rshiensomautin)); ?>
      <div class="KT_bottombuttons">
        <div>
          <?php 
      // Show IF Conditional region1
      if (@$_GET['idSoMauTin'] == "") {
      ?>
            <input type="submit" name="KT_Insert1" id="KT_Insert1" value="<?php echo NXT_getResource("Thêm"); ?>" />
            <?php 
      // else Conditional region1
      } else { ?>
            <div class="KT_operations"></div>
            <input type="submit" name="KT_Update1" value="<?php echo NXT_getResource("Cập nhật"); ?>" />
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

