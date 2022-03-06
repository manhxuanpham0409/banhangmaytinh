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
$formValidation->addField("Ten", true, "text", "", "", "", "Nhập tên menu");
$formValidation->addField("Url", true, "text", "", "", "", "Nhập tên file");
$tNGs->prepareValidation($formValidation);
// End trigger

// Make an insert transaction instance
$ins_menu = new tNG_multipleInsert($conn_config);
$tNGs->addTransaction($ins_menu);
// Register triggers
$ins_menu->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Insert1");
$ins_menu->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$ins_menu->registerTrigger("END", "Trigger_Default_Redirect", 99, "../includes/nxt/back.php");
// Add columns
$ins_menu->setTable("menu");
$ins_menu->addColumn("Ten", "STRING_TYPE", "POST", "Ten");
$ins_menu->addColumn("Url", "STRING_TYPE", "POST", "Url");
$ins_menu->addColumn("topmenu", "CHECKBOX_1_0_TYPE", "POST", "topmenu", "1");
$ins_menu->addColumn("mainmenu", "CHECKBOX_1_0_TYPE", "POST", "mainmenu", "1");
$ins_menu->addColumn("footer", "CHECKBOX_1_0_TYPE", "POST", "footer", "1");
$ins_menu->addColumn("ThuTu", "NUMERIC_TYPE", "POST", "ThuTu");
$ins_menu->addColumn("AnHien", "CHECKBOX_1_0_TYPE", "POST", "AnHien", "1");
$ins_menu->setPrimaryKey("id", "NUMERIC_TYPE");

// Make an update transaction instance
$upd_menu = new tNG_multipleUpdate($conn_config);
$tNGs->addTransaction($upd_menu);
// Register triggers
$upd_menu->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Update1");
$upd_menu->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$upd_menu->registerTrigger("END", "Trigger_Default_Redirect", 99, "../includes/nxt/back.php");
// Add columns
$upd_menu->setTable("menu");
$upd_menu->addColumn("Ten", "STRING_TYPE", "POST", "Ten");
$upd_menu->addColumn("Url", "STRING_TYPE", "POST", "Url");
$upd_menu->addColumn("topmenu", "CHECKBOX_1_0_TYPE", "POST", "topmenu");
$upd_menu->addColumn("mainmenu", "CHECKBOX_1_0_TYPE", "POST", "mainmenu");
$upd_menu->addColumn("footer", "CHECKBOX_1_0_TYPE", "POST", "footer");
$upd_menu->addColumn("ThuTu", "NUMERIC_TYPE", "POST", "ThuTu");
$upd_menu->addColumn("AnHien", "CHECKBOX_1_0_TYPE", "POST", "AnHien");
$upd_menu->setPrimaryKey("id", "NUMERIC_TYPE", "GET", "id");

// Make an instance of the transaction object
$del_menu = new tNG_multipleDelete($conn_config);
$tNGs->addTransaction($del_menu);
// Register triggers
$del_menu->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Delete1");
$del_menu->registerTrigger("END", "Trigger_Default_Redirect", 99, "../includes/nxt/back.php");
// Add columns
$del_menu->setTable("menu");
$del_menu->setPrimaryKey("id", "NUMERIC_TYPE", "GET", "id");

// Execute all the registered transactions
$tNGs->executeTransactions();

// Get the transaction recordset
$rsmenu = $tNGs->getRecordset("menu");
$row_rsmenu = mysql_fetch_assoc($rsmenu);
$totalRows_rsmenu = mysql_num_rows($rsmenu);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
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
</head>

<body>
<?php
	echo $tNGs->getErrorMsg();
?>
<div class="KT_tng">
  <h1>
    <?php 
// Show IF Conditional region1 
if (@$_GET['id'] == "") {
?>
      <?php echo NXT_getResource("Thêm "); ?>
      <?php 
// else Conditional region1
} else { ?>
      <?php echo NXT_getResource("Cập nhật"); ?>
      <?php } 
// endif Conditional region1
?>
    Menu </h1>
  <div class="KT_tngform">
    <form method="post" id="form1" action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>">
      <?php $cnt1 = 0; ?>
      <?php do { ?>
        <?php $cnt1++; ?>
        <?php 
// Show IF Conditional region1 
if (@$totalRows_rsmenu > 1) {
?>
          <h2><?php echo NXT_getResource("Record_FH"); ?> <?php echo $cnt1; ?></h2>
          <?php } 
// endif Conditional region1
?>
        <table cellpadding="2" cellspacing="0" class="KT_tngtable">
          <tr>
            <td class="KT_th"><label for="Ten_<?php echo $cnt1; ?>">Tên menu:</label></td>
            <td><input type="text" name="Ten_<?php echo $cnt1; ?>" id="Ten_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsmenu['Ten']); ?>" size="32" maxlength="100" />
                <?php echo $tNGs->displayFieldHint("Ten");?> <?php echo $tNGs->displayFieldError("menu", "Ten", $cnt1); ?> </td>
          </tr>
          <tr>
            <td class="KT_th"><label for="Url_<?php echo $cnt1; ?>">Tên file:</label></td>
            <td><input type="text" name="Url_<?php echo $cnt1; ?>" id="Url_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsmenu['Url']); ?>" size="32" maxlength="100" />
                <?php echo $tNGs->displayFieldHint("Url");?> <?php echo $tNGs->displayFieldError("menu", "Url", $cnt1); ?> </td>
          </tr>
          <tr>
            <td class="KT_th"><label for="topmenu_<?php echo $cnt1; ?>">Topmenu:</label></td>
            <td><input  <?php if (!(strcmp(KT_escapeAttribute($row_rsmenu['topmenu']),"1"))) {echo "checked";} ?> type="checkbox" name="topmenu_<?php echo $cnt1; ?>" id="topmenu_<?php echo $cnt1; ?>" value="1" />
                <?php echo $tNGs->displayFieldError("menu", "topmenu", $cnt1); ?> </td>
          </tr>
          <tr>
            <td class="KT_th"><label for="mainmenu_<?php echo $cnt1; ?>">Mainmenu:</label></td>
            <td><input  <?php if (!(strcmp(KT_escapeAttribute($row_rsmenu['mainmenu']),"1"))) {echo "checked";} ?> type="checkbox" name="mainmenu_<?php echo $cnt1; ?>" id="mainmenu_<?php echo $cnt1; ?>" value="1" />
                <?php echo $tNGs->displayFieldError("menu", "mainmenu", $cnt1); ?> </td>
          </tr>
          <tr>
            <td class="KT_th"><label for="footer_<?php echo $cnt1; ?>">Footer:</label></td>
            <td><input  <?php if (!(strcmp(KT_escapeAttribute($row_rsmenu['footer']),"1"))) {echo "checked";} ?> type="checkbox" name="footer_<?php echo $cnt1; ?>" id="footer_<?php echo $cnt1; ?>" value="1" />
                <?php echo $tNGs->displayFieldError("menu", "footer", $cnt1); ?> </td>
          </tr>
          <tr>
            <td class="KT_th"><label for="ThuTu_<?php echo $cnt1; ?>">ThuTu:</label></td>
            <td><input type="text" name="ThuTu_<?php echo $cnt1; ?>" id="ThuTu_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsmenu['ThuTu']); ?>" size="7" />
                <?php echo $tNGs->displayFieldHint("ThuTu");?> <?php echo $tNGs->displayFieldError("menu", "ThuTu", $cnt1); ?> </td>
          </tr>
          <tr>
            <td class="KT_th"><label for="AnHien_<?php echo $cnt1; ?>">AnHien:</label></td>
            <td><input  <?php if (!(strcmp(KT_escapeAttribute($row_rsmenu['AnHien']),"1"))) {echo "checked";} ?> type="checkbox" name="AnHien_<?php echo $cnt1; ?>" id="AnHien_<?php echo $cnt1; ?>" value="1" />
                <?php echo $tNGs->displayFieldError("menu", "AnHien", $cnt1); ?> </td>
          </tr>
        </table>
        <input type="hidden" name="kt_pk_menu_<?php echo $cnt1; ?>" class="id_field" value="<?php echo KT_escapeAttribute($row_rsmenu['kt_pk_menu']); ?>" />
        <?php } while ($row_rsmenu = mysql_fetch_assoc($rsmenu)); ?>
      <div class="KT_bottombuttons">
        <div>
          <?php 
      // Show IF Conditional region1
      if (@$_GET['id'] == "") {
      ?>
            <input type="submit" name="KT_Insert1" id="KT_Insert1" value="<?php echo NXT_getResource("Thêm"); ?>" />
            <?php 
      // else Conditional region1
      } else { ?>
            <div class="KT_operations">
              <input type="submit" name="KT_Insert1" value="<?php echo NXT_getResource("Thêm mới"); ?>" onclick="nxt_form_insertasnew(this, 'id')" />
            </div>
            <input type="submit" name="KT_Update1" value="<?php echo NXT_getResource("Cập nhật"); ?>" />
            <input type="submit" name="KT_Delete1" value="<?php echo NXT_getResource("Xóa"); ?>" onclick="return confirm('<?php echo NXT_getResource("Bạn có muốn xóa mẫu tin này không ?"); ?>');" />
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
<p>&nbsp;</p>
</body>
</html>
