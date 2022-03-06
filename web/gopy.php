<?php require_once('Connections/config.php'); ?>
<?php



// Code này được tải từ : www.sharecode.org 




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
$formValidation->addField("Email", true, "text", "", "", "", "Nhập địa chỉ mail");
$formValidation->addField("NoiDung", true, "text", "", "", "", "Nhập nội dung");
$tNGs->prepareValidation($formValidation);
// End trigger

// Make an insert transaction instance
$ins_gopy = new tNG_insert($conn_config);
$tNGs->addTransaction($ins_gopy);
// Register triggers
$ins_gopy->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Insert1");
$ins_gopy->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
// Add columns
$ins_gopy->setTable("gopy");
$ins_gopy->addColumn("Email", "STRING_TYPE", "POST", "Email");
$ins_gopy->addColumn("NoiDung", "STRING_TYPE", "POST", "NoiDung");
$ins_gopy->addColumn("HoTen", "STRING_TYPE", "POST", "HoTen");
$ins_gopy->addColumn("DiaChi", "STRING_TYPE", "POST", "DiaChi");
$ins_gopy->addColumn("Ngay", "DATE_TYPE", "POST", "Ngay");
$ins_gopy->setPrimaryKey("idGopy", "NUMERIC_TYPE");

// Execute all the registered transactions
$tNGs->executeTransactions();

// Get the transaction recordset
$rsgopy = $tNGs->getRecordset("gopy");
$row_rsgopy = mysql_fetch_assoc($rsgopy);
$totalRows_rsgopy = mysql_num_rows($rsgopy);
?>
<link href="includes/skins/mxkollection3.css" rel="stylesheet" type="text/css" media="all" />
<script src="includes/common/js/base.js" type="text/javascript"></script>
<script src="includes/common/js/utility.js" type="text/javascript"></script>
<script src="includes/skins/style.js" type="text/javascript"></script>
<script src="SpryAssets/SpryCollapsiblePanel.js" type="text/javascript"></script>
<?php echo $tNGs->displayValidationRules();?>
<form method="post" id="form1" action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>">
  <table width="100%" cellpadding="2" cellspacing="0" class="KT_tngtable1">
    <tr>
      <td class="KT_th"><label for="Email">Email:</label></td>
      <td><input type="text" name="Email" id="Email" value="<?php echo KT_escapeAttribute($row_rsgopy['Email']); ?>" size="32" />
          <?php echo $tNGs->displayFieldHint("Email");?> <?php echo $tNGs->displayFieldError("gopy", "Email"); ?> </td>
    </tr>
    <tr>
      <td class="KT_th"><label for="NoiDung">Nội dung:</label></td>
      <td><textarea name="NoiDung" id="NoiDung" cols="50" rows="5"><?php echo KT_escapeAttribute($row_rsgopy['NoiDung']); ?></textarea>
          <?php echo $tNGs->displayFieldHint("NoiDung");?> <?php echo $tNGs->displayFieldError("gopy", "NoiDung"); ?> </td>
    </tr>
    <tr>
      <td class="KT_th"><label for="HoTen">Họ tên</label></td>
      <td><input type="text" name="HoTen" id="HoTen" value="<?php echo KT_escapeAttribute($row_rsgopy['HoTen']); ?>" size="32" />
          <?php echo $tNGs->displayFieldHint("HoTen");?> <?php echo $tNGs->displayFieldError("gopy", "HoTen"); ?> </td>
    </tr>
    <tr>
      <td class="KT_th"><label for="DiaChi">Địa chỉ</label></td>
      <td><input type="text" name="DiaChi" id="DiaChi" value="<?php echo KT_escapeAttribute($row_rsgopy['DiaChi']); ?>" size="32" />
          <?php echo $tNGs->displayFieldHint("DiaChi");?> <?php echo $tNGs->displayFieldError("gopy", "DiaChi"); ?> </td>
    </tr>
    <tr class="KT_buttons1">
      <td colspan="2">
        <input type="submit" name="KT_Insert1" id="KT_Insert1" value="Gửi" />
</td>
    </tr>
  </table>
  <input type="hidden" name="Ngay" id="Ngay" value="<?php echo date('d/m/Y'); ?>" />
</form>

