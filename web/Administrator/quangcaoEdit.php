<?php require_once('../Connections/config.php'); ?>
<?php
//MX Widgets3 include
require_once('../includes/wdg/WDG.php');

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
$formValidation->addField("MoTa", true, "text", "", "", "", "Nhập mô tả");
$formValidation->addField("Url", true, "text", "", "", "", "Nhập Link");
$formValidation->addField("urlHinh", true, "", "", "", "", "Chọn hình");
$tNGs->prepareValidation($formValidation);
// End trigger

//start Trigger_FileDelete trigger
//remove this line if you want to edit the code by hand 
function Trigger_FileDelete(&$tNG) {
  $deleteObj = new tNG_FileDelete($tNG);
  $deleteObj->setFolder("../quangcao/");
  $deleteObj->setDbFieldName("urlHinh");
  return $deleteObj->Execute();
}
//end Trigger_FileDelete trigger

//start Trigger_FileUpload trigger
//remove this line if you want to edit the code by hand 
function Trigger_FileUpload(&$tNG) {
  $uploadObj = new tNG_FileUpload($tNG);
  $uploadObj->setFormFieldName("urlHinh");
  $uploadObj->setDbFieldName("urlHinh");
  $uploadObj->setFolder("../quangcao/");
  $uploadObj->setMaxSize(1500);
  $uploadObj->setAllowedExtensions("png, jpg, JGP, gif");
  $uploadObj->setRename("auto");
  return $uploadObj->Execute();
}
//end Trigger_FileUpload trigger

// Make an insert transaction instance
$ins_quangcao = new tNG_multipleInsert($conn_config);
$tNGs->addTransaction($ins_quangcao);
// Register triggers
$ins_quangcao->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Insert1");
$ins_quangcao->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$ins_quangcao->registerTrigger("END", "Trigger_Default_Redirect", 99, "../includes/nxt/back.php");
$ins_quangcao->registerTrigger("AFTER", "Trigger_FileUpload", 97);
// Add columns
$ins_quangcao->setTable("quangcao");
$ins_quangcao->addColumn("MoTa", "STRING_TYPE", "POST", "MoTa");
$ins_quangcao->addColumn("Url", "STRING_TYPE", "POST", "Url");
$ins_quangcao->addColumn("urlHinh", "FILE_TYPE", "FILES", "urlHinh");
$ins_quangcao->addColumn("NgayKT", "DATE_TYPE", "POST", "NgayKT");
$ins_quangcao->addColumn("AnHien", "CHECKBOX_1_0_TYPE", "POST", "AnHien", "1");
$ins_quangcao->addColumn("Ngaydang", "DATE_TYPE", "POST", "Ngaydang");
$ins_quangcao->setPrimaryKey("idQC", "NUMERIC_TYPE");

// Make an update transaction instance
$upd_quangcao = new tNG_multipleUpdate($conn_config);
$tNGs->addTransaction($upd_quangcao);
// Register triggers
$upd_quangcao->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Update1");
$upd_quangcao->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$upd_quangcao->registerTrigger("END", "Trigger_Default_Redirect", 99, "../includes/nxt/back.php");
$upd_quangcao->registerTrigger("AFTER", "Trigger_FileUpload", 97);
// Add columns
$upd_quangcao->setTable("quangcao");
$upd_quangcao->addColumn("MoTa", "STRING_TYPE", "POST", "MoTa");
$upd_quangcao->addColumn("Url", "STRING_TYPE", "POST", "Url");
$upd_quangcao->addColumn("urlHinh", "FILE_TYPE", "FILES", "urlHinh");
$upd_quangcao->addColumn("NgayKT", "DATE_TYPE", "POST", "NgayKT");
$upd_quangcao->addColumn("AnHien", "CHECKBOX_1_0_TYPE", "POST", "AnHien");
$upd_quangcao->addColumn("Ngaydang", "DATE_TYPE", "POST", "Ngaydang");
$upd_quangcao->setPrimaryKey("idQC", "NUMERIC_TYPE", "GET", "idQC");

// Make an instance of the transaction object
$del_quangcao = new tNG_multipleDelete($conn_config);
$tNGs->addTransaction($del_quangcao);
// Register triggers
$del_quangcao->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Delete1");
$del_quangcao->registerTrigger("END", "Trigger_Default_Redirect", 99, "../includes/nxt/back.php");
$del_quangcao->registerTrigger("AFTER", "Trigger_FileDelete", 98);
// Add columns
$del_quangcao->setTable("quangcao");
$del_quangcao->setPrimaryKey("idQC", "NUMERIC_TYPE", "GET", "idQC");

// Execute all the registered transactions
$tNGs->executeTransactions();

// Get the transaction recordset
$rsquangcao = $tNGs->getRecordset("quangcao");
$row_rsquangcao = mysql_fetch_assoc($rsquangcao);
$totalRows_rsquangcao = mysql_num_rows($rsquangcao);
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
<script type="text/javascript" src="../includes/common/js/sigslot_core.js"></script>
<script type="text/javascript" src="../includes/wdg/classes/MXWidgets.js"></script>
<script type="text/javascript" src="../includes/wdg/classes/MXWidgets.js.php"></script>
<script type="text/javascript" src="../includes/wdg/classes/Calendar.js"></script>
<script type="text/javascript" src="../includes/wdg/classes/SmartDate.js"></script>
<script type="text/javascript" src="../includes/wdg/calendar/calendar_stripped.js"></script>
<script type="text/javascript" src="../includes/wdg/calendar/calendar-setup_stripped.js"></script>
<script src="../includes/resources/calendar.js"></script>
<div class="KT_tng">
  <h1>
    <?php 
// Show IF Conditional region1 
if (@$_GET['idQC'] == "") {
?>
      <?php echo NXT_getResource("Thêm "); ?>
      <?php 
// else Conditional region1
} else { ?>
      <?php echo NXT_getResource("Cập nhật"); ?>
      <?php } 
// endif Conditional region1
?>
    Quảng cáo</h1>
  <div class="KT_tngform">
    <form method="post" id="form1" action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>" enctype="multipart/form-data">
      <?php $cnt1 = 0; ?>
      <?php do { ?>
        <?php $cnt1++; ?>
        <?php 
// Show IF Conditional region1 
if (@$totalRows_rsquangcao > 1) {
?>
          <h2><?php echo NXT_getResource("Record_FH"); ?> <?php echo $cnt1; ?></h2>
          <?php } 
// endif Conditional region1
?>
        <table align="center" cellpadding="2" cellspacing="0" class="KT_tngtable">
          <tr>
            <td class="KT_th"><label for="MoTa_<?php echo $cnt1; ?>">Mô tả:</label></td>
            <td><textarea name="MoTa_<?php echo $cnt1; ?>" id="MoTa_<?php echo $cnt1; ?>" rows="5" style="width:300px;"><?php echo KT_escapeAttribute($row_rsquangcao['MoTa']); ?></textarea>
                <?php echo $tNGs->displayFieldHint("MoTa");?> <?php echo $tNGs->displayFieldError("quangcao", "MoTa", $cnt1); ?> </td>
          </tr>
          <tr>
            <td class="KT_th"><label for="Url_<?php echo $cnt1; ?>">Link:</label></td>
            <td><input type="text" name="Url_<?php echo $cnt1; ?>" id="Url_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsquangcao['Url']); ?>" size="32" maxlength="250" />
                <?php echo $tNGs->displayFieldHint("Url");?> <?php echo $tNGs->displayFieldError("quangcao", "Url", $cnt1); ?> </td>
          </tr>
          <tr>
            <td class="KT_th"><label for="urlHinh_<?php echo $cnt1; ?>">Hình:</label></td>
            <td><input type="file" name="urlHinh_<?php echo $cnt1; ?>" id="urlHinh_<?php echo $cnt1; ?>" size="32" />
                <?php echo $tNGs->displayFieldError("quangcao", "urlHinh", $cnt1); ?> </td>
          </tr>
          <tr>
            <td class="KT_th"><label for="NgayKT_<?php echo $cnt1; ?>">Ngày kết thúc:</label></td>
            <td><input name="NgayKT_<?php echo $cnt1; ?>" id="NgayKT_<?php echo $cnt1; ?>" value="<?php echo KT_formatDate($row_rsquangcao['NgayKT']); ?>" size="10" maxlength="22" wdg:mondayfirst="false" wdg:subtype="Calendar" wdg:mask="<?php echo $KT_screen_date_format; ?>" wdg:type="widget" wdg:singleclick="false" wdg:restricttomask="no" wdg:readonly="true" />
                <?php echo $tNGs->displayFieldHint("NgayKT");?> <?php echo $tNGs->displayFieldError("quangcao", "NgayKT", $cnt1); ?> </td>
          </tr>
          <tr>
            <td class="KT_th"><label for="AnHien_<?php echo $cnt1; ?>">Hiện:</label></td>
            <td><input  <?php if (!(strcmp(KT_escapeAttribute($row_rsquangcao['AnHien']),"1"))) {echo "checked";} ?> type="checkbox" name="AnHien_<?php echo $cnt1; ?>" id="AnHien_<?php echo $cnt1; ?>" value="1" />
                <?php echo $tNGs->displayFieldError("quangcao", "AnHien", $cnt1); ?> </td>
          </tr>
        </table>
        <input type="hidden" name="kt_pk_quangcao_<?php echo $cnt1; ?>" class="id_field" value="<?php echo KT_escapeAttribute($row_rsquangcao['kt_pk_quangcao']); ?>" />
        <input type="hidden" name="Ngaydang_<?php echo $cnt1; ?>" id="Ngaydang_<?php echo $cnt1; ?>" value="<?php echo date('d/m/Y'); ?>" />
        <?php } while ($row_rsquangcao = mysql_fetch_assoc($rsquangcao)); ?>
      <div class="KT_bottombuttons">
        <div>
          <?php 
      // Show IF Conditional region1
      if (@$_GET['idQC'] == "") {
      ?>
            <input type="submit" name="KT_Insert1" id="KT_Insert1" value="<?php echo NXT_getResource("Thêm"); ?>" />
            <?php 
      // else Conditional region1
      } else { ?>
            <div class="KT_operations">
              <input type="submit" name="KT_Insert1" value="<?php echo NXT_getResource("Thêm mới"); ?>" onclick="nxt_form_insertasnew(this, 'idQC')" />
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
