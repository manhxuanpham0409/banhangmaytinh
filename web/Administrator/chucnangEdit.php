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
$tNGs->prepareValidation($formValidation);
// End trigger

//start Trigger_FileDelete trigger
//remove this line if you want to edit the code by hand 
function Trigger_FileDelete(&$tNG) {
  $deleteObj = new tNG_FileDelete($tNG);
  $deleteObj->setFolder("../images/");
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
  $uploadObj->setFolder("../images/");
  $uploadObj->setMaxSize(1500);
  $uploadObj->setAllowedExtensions("png, jpg, JGP, gif");
  $uploadObj->setRename("auto");
  return $uploadObj->Execute();
}
//end Trigger_FileUpload trigger

if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? "'" . doubleval($theValue) . "'" : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

mysql_select_db($database_config, $config);
$query_Recordset1 = "SELECT TenCN, idNhomCN FROM nhomchucnang ORDER BY TenCN";
$Recordset1 = mysql_query($query_Recordset1, $config) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);

// Make an insert transaction instance
$ins_chucnang = new tNG_multipleInsert($conn_config);
$tNGs->addTransaction($ins_chucnang);
// Register triggers
$ins_chucnang->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Insert1");
$ins_chucnang->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$ins_chucnang->registerTrigger("END", "Trigger_Default_Redirect", 99, "../includes/nxt/back.php");
$ins_chucnang->registerTrigger("AFTER", "Trigger_FileUpload", 97);
// Add columns
$ins_chucnang->setTable("chucnang");
$ins_chucnang->addColumn("TenCN", "STRING_TYPE", "POST", "TenCN");
$ins_chucnang->addColumn("urlHinh", "FILE_TYPE", "FILES", "urlHinh");
$ins_chucnang->addColumn("NoiDung", "STRING_TYPE", "POST", "NoiDung");
$ins_chucnang->addColumn("idNhomCN", "NUMERIC_TYPE", "POST", "idNhomCN");
$ins_chucnang->addColumn("AnHien", "CHECKBOX_1_0_TYPE", "POST", "AnHien", "1");
$ins_chucnang->setPrimaryKey("idCN", "NUMERIC_TYPE");

// Make an update transaction instance
$upd_chucnang = new tNG_multipleUpdate($conn_config);
$tNGs->addTransaction($upd_chucnang);
// Register triggers
$upd_chucnang->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Update1");
$upd_chucnang->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$upd_chucnang->registerTrigger("END", "Trigger_Default_Redirect", 99, "../includes/nxt/back.php");
$upd_chucnang->registerTrigger("AFTER", "Trigger_FileUpload", 97);
// Add columns
$upd_chucnang->setTable("chucnang");
$upd_chucnang->addColumn("TenCN", "STRING_TYPE", "POST", "TenCN");
$upd_chucnang->addColumn("urlHinh", "FILE_TYPE", "FILES", "urlHinh");
$upd_chucnang->addColumn("NoiDung", "STRING_TYPE", "POST", "NoiDung");
$upd_chucnang->addColumn("idNhomCN", "NUMERIC_TYPE", "POST", "idNhomCN");
$upd_chucnang->addColumn("AnHien", "CHECKBOX_1_0_TYPE", "POST", "AnHien");
$upd_chucnang->setPrimaryKey("idCN", "NUMERIC_TYPE", "GET", "idCN");

// Make an instance of the transaction object
$del_chucnang = new tNG_multipleDelete($conn_config);
$tNGs->addTransaction($del_chucnang);
// Register triggers
$del_chucnang->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Delete1");
$del_chucnang->registerTrigger("END", "Trigger_Default_Redirect", 99, "../includes/nxt/back.php");
$del_chucnang->registerTrigger("AFTER", "Trigger_FileDelete", 98);
// Add columns
$del_chucnang->setTable("chucnang");
$del_chucnang->setPrimaryKey("idCN", "NUMERIC_TYPE", "GET", "idCN");

// Execute all the registered transactions
$tNGs->executeTransactions();

// Get the transaction recordset
$rschucnang = $tNGs->getRecordset("chucnang");
$row_rschucnang = mysql_fetch_assoc($rschucnang);
$totalRows_rschucnang = mysql_num_rows($rschucnang);
session_start();
?>
<?php if($_SESSION['kt_login_id']) {?>
<script src="../includes/common/js/base.js" type="text/javascript"></script>
<script type="text/javascript" src="Editor/scripts/innovaeditor.js"></script>
<script src="../includes/common/js/utility.js" type="text/javascript"></script><script src="../includes/skins/style.js" type="text/javascript"></script><?php echo $tNGs->displayValidationRules();?><script src="../includes/nxt/scripts/form.js" type="text/javascript"></script><script src="../includes/nxt/scripts/form.js.php" type="text/javascript"></script><script type="text/javascript">
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
if (@$_GET['idCN'] == "") {
?>
    <?php echo NXT_getResource("Thêm"); ?>
    <?php 
// else Conditional region1
} else { ?>
    <?php echo NXT_getResource("Cập nhật"); ?>
    <?php } 
// endif Conditional region1
?>
    Chức năng</h1>
  <div class="KT_tngform">
    <form method="post" id="form1" action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>" enctype="multipart/form-data">
      <?php $cnt1 = 0; ?>
      <?php do { ?>
      <?php $cnt1++; ?>
      <?php 
// Show IF Conditional region1 
if (@$totalRows_rschucnang > 1) {
?>
      <h2><?php echo NXT_getResource("Record_FH"); ?> <?php echo $cnt1; ?></h2>
      <?php } 
// endif Conditional region1
?>
      <table align="center" cellpadding="2" cellspacing="0" class="KT_tngtable">
        <tr>
          <td class="KT_th"><label for="TenCN_<?php echo $cnt1; ?>">Tên chức năng</label></td>
          <td><input type="text" name="TenCN_<?php echo $cnt1; ?>" id="TenCN_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rschucnang['TenCN']); ?>" size="32" maxlength="100" />
              <?php echo $tNGs->displayFieldHint("TenCN");?> <?php echo $tNGs->displayFieldError("chucnang", "TenCN", $cnt1); ?> </td>
        </tr>
        <tr>
          <td class="KT_th"><label for="urlHinh_<?php echo $cnt1; ?>">Hình icon</label></td>
          <td><input type="file" name="urlHinh_<?php echo $cnt1; ?>" id="urlHinh_<?php echo $cnt1; ?>" size="32" />
              <?php echo $tNGs->displayFieldError("chucnang", "urlHinh", $cnt1); ?> </td>
        </tr>
        <tr>
          <td class="KT_th"><label for="NoiDung_<?php echo $cnt1; ?>">Nội dung</label></td>
          <td><textarea name="NoiDung_<?php echo $cnt1; ?>" id="NoiDung_<?php echo $cnt1; ?>" style="width:500px;"rows="5"><?php echo KT_escapeAttribute($row_rschucnang['NoiDung']); ?></textarea>
                        <?php echo $tNGs->displayFieldHint("NoiDung");?> <?php echo $tNGs->displayFieldError("chucnang", "NoiDung", $cnt1); ?>
                        
     <script>
    var oEdit1 = new InnovaEditor("oEdit1");

    /***************************************************
      SETTING EDITOR DIMENSION (WIDTH x HEIGHT)
    ***************************************************/

    oEdit1.width=775;//You can also use %, for example: oEdit1.width="100%"
    oEdit1.height=350;


    /***************************************************
      SHOWING DISABLED BUTTONS
    ***************************************************/

    oEdit1.btnPrint=false;
    oEdit1.btnPasteText=true;
    oEdit1.btnFlash=true;
    oEdit1.btnMedia=true;
    oEdit1.btnLTR=true;
    oEdit1.btnRTL=true;
    oEdit1.btnSpellCheck=false;
    oEdit1.btnStrikethrough=true;
    oEdit1.btnSuperscript=true;
    oEdit1.btnSubscript=true;
    oEdit1.btnClearAll=true;
    oEdit1.btnSave=true;
    oEdit1.btnStyles=true; //Show "Styles/Style Selection" button

    /***************************************************
      APPLYING STYLESHEET
      (Using external css file)
    ***************************************************/

    oEdit1.css="style/test.css"; //Specify external css file here

    /***************************************************
      APPLYING STYLESHEET
      (Using predefined style rules)
    ***************************************************/
    /*
    oEdit1.arrStyle = [["BODY",false,"","font-family:Verdana,Arial,Helvetica;font-size:x-small;"],
          [".ScreenText",true,"Screen Text","font-family:Tahoma;"],
          [".ImportantWords",true,"Important Words","font-weight:bold;"],
          [".Highlight",true,"Highlight","font-family:Arial;color:red;"]];

    If you'd like to set the default writing to "Right to Left", you can use:

    oEdit1.arrStyle = [["BODY",false,"","direction:rtl;unicode-bidi:bidi-override;"]];
    */


    /***************************************************
      ENABLE ASSET MANAGER ADD-ON
    ***************************************************/

    oEdit1.cmdAssetManager = "modalDialogShow('/star_computer/web/Administrator/Editor/assetmanager/assetmanager.php',640,465)"; //Command to open the Asset Manager add-on.
    //Use relative to root path (starts with "/")

    /***************************************************
      ADDING YOUR CUSTOM LINK LOOKUP
    ***************************************************/

    oEdit1.cmdInternalLink = "modelessDialogShow('links.htm',365,270)"; //Command to open your custom link lookup page.

    /***************************************************
      ADDING YOUR CUSTOM CONTENT LOOKUP
    ***************************************************/

    oEdit1.cmdCustomObject = "modelessDialogShow('objects.htm',365,270)"; //Command to open your custom content lookup page.

    /***************************************************
      USING CUSTOM TAG INSERTION FEATURE
    ***************************************************/

    oEdit1.arrCustomTag=[["First Name","{%first_name%}"],
        ["Last Name","{%last_name%}"],
        ["Email","{%email%}"]];//Define custom tag selection

    /***************************************************
      SETTING COLOR PICKER's CUSTOM COLOR SELECTION
    ***************************************************/

    oEdit1.customColors=["#ff4500","#ffa500","#808000","#4682b4","#1e90ff","#9400d3","#ff1493","#a9a9a9"];//predefined custom colors

    /***************************************************
      SETTING EDITING MODE

      Possible values:
        - "HTMLBody" (default)
        - "XHTMLBody"
        - "HTML"
        - "XHTML"
    ***************************************************/

    oEdit1.mode="XHTMLBody";


    oEdit1.REPLACE("NoiDung_<?php echo $cnt1; ?>");
  </script>
            </td>
        </tr>
        <tr>
          <td class="KT_th"><label for="idNhomCN_<?php echo $cnt1; ?>">Thuộc nhóm:</label></td>
          <td><select name="idNhomCN_<?php echo $cnt1; ?>" id="idNhomCN_<?php echo $cnt1; ?>">
            <option value=""><?php echo NXT_getResource("Select one..."); ?></option>
            <?php 
do {  
?>
            <option value="<?php echo $row_Recordset1['idNhomCN']?>"<?php if (!(strcmp($row_Recordset1['idNhomCN'], $row_rschucnang['idNhomCN']))) {echo "SELECTED";} ?>><?php echo $row_Recordset1['TenCN']?></option>
            <?php
} while ($row_Recordset1 = mysql_fetch_assoc($Recordset1));
  $rows = mysql_num_rows($Recordset1);
  if($rows > 0) {
      mysql_data_seek($Recordset1, 0);
	  $row_Recordset1 = mysql_fetch_assoc($Recordset1);
  }
?>
          </select>
              <?php echo $tNGs->displayFieldError("chucnang", "idNhomCN", $cnt1); ?> </td>
        </tr>
        <tr>
          <td class="KT_th"><label for="AnHien_<?php echo $cnt1; ?>">Hiện</label></td>
          <td><input  <?php if (!(strcmp(KT_escapeAttribute($row_rschucnang['AnHien']),"1"))) {echo "checked";} ?> type="checkbox" name="AnHien_<?php echo $cnt1; ?>" id="AnHien_<?php echo $cnt1; ?>" value="1" />
              <?php echo $tNGs->displayFieldError("chucnang", "AnHien", $cnt1); ?> </td>
        </tr>
      </table>
      <input type="hidden" name="kt_pk_chucnang_<?php echo $cnt1; ?>" class="id_field" value="<?php echo KT_escapeAttribute($row_rschucnang['kt_pk_chucnang']); ?>" />
      <?php } while ($row_rschucnang = mysql_fetch_assoc($rschucnang)); ?>
      <div class="KT_bottombuttons">
        <div>
          <?php 
      // Show IF Conditional region1
      if (@$_GET['idCN'] == "") {
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
<?php
mysql_free_result($Recordset1);
 } else {?>
<script>
var s=5; 
setTimeout("document.location='index.php'", s *1000); 
setInterval("document.getElementById('sogiay').innerHTML=s--",1000);
</script> 
<center>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<p>Đăng nhập không thành công!<a href='index.php'>login</a></p>
<P>Sẽ quay lại sau <span id="sogiay"></span> &nbsp;giây nữa
</center> 
<?php }?>