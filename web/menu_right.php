<?php require_once('Connections/config.php'); ?>
<?php
// Load the common classes
require_once('includes/common/KT_common.php');

// Load the common classes
require_once('includes/common/KT_common.php');

// Load the tNG classes
require_once('includes/tng/tNG.inc.php');

// Load the tNG classes
require_once('includes/tng/tNG.inc.php');

// Make a transaction dispatcher instance
$tNGs = new tNG_dispatcher("");

// Make a transaction dispatcher instance
$tNGs = new tNG_dispatcher("");

// Make unified connection variable
$conn_config = new KT_connection($config, $database_config);

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

// Start trigger
$formValidation2 = new tNG_FormValidation();
$formValidation2->addField("kt_login_user", true, "text", "", "", "", "");
$formValidation2->addField("kt_login_password", true, "text", "", "", "", "");
$tNGs->prepareValidation($formValidation2);
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
$loginTransaction->addColumn("kt_login_rememberme", "CHECKBOX_1_0_TYPE", "POST", "kt_login_rememberme", "0");
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

// Make a login transaction instance
$loginTransaction2 = new tNG_login($conn_config);
$tNGs->addTransaction($loginTransaction2);
// Register triggers
$loginTransaction2->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "kt_login3");
$loginTransaction2->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation2);
$loginTransaction2->registerTrigger("END", "Trigger_Default_Redirect", 99, "{kt_login_redirect}");
// Add columns
$loginTransaction2->addColumn("kt_login_user", "STRING_TYPE", "POST", "kt_login_user");
$loginTransaction2->addColumn("kt_login_password", "STRING_TYPE", "POST", "kt_login_password");
// End of login transaction instance

// Make a logout transaction instance
$logoutTransaction = new tNG_logoutTransaction($conn_config);
$tNGs->addTransaction($logoutTransaction);
// Register triggers
$logoutTransaction->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "GET", "KT_logout_now");
$logoutTransaction->registerTrigger("END", "Trigger_Default_Redirect", 99, "index.php");
// Add columns
// End of logout transaction instance

// Execute all the registered transactions
$tNGs->executeTransactions();

// Execute all the registered transactions
$tNGs->executeTransactions();

// Get the transaction recordset
$rscustom = $tNGs->getRecordset("custom");
$row_rscustom = mysql_fetch_assoc($rscustom);
$totalRows_rscustom = mysql_num_rows($rscustom);
 session_start();?>
 <?php  
$tinnoibat=mysql_fetch_assoc(mysql_query("SELECT SoMauTin FROM tintuc,hiensomautin WHERE TinNoiBat=idSoMauTin"));
$limit_tinnoibat=$tinnoibat['SoMauTin'];
$tintuc=mysql_query("SELECT idTin,TieuDe FROM tintuc WHERE AnHien= 1 AND TinNoiBat=1 LIMIT 0,$limit_tinnoibat");
$row_tintuc=mysql_fetch_assoc($tintuc);

$spmoi=mysql_fetch_assoc(mysql_query("SELECT SoMauTin FROM hiensomautin WHERE idSoMauTin=2"));
$limit_spmoi=$spmoi['SoMauTin'];
$sanpham=mysql_query("SELECT idSP,TenSP,HinhAnh FROM sanpham WHERE AnHien= 1 ORDER BY idSP DESC LIMIT 0,$limit_spmoi");
$row_sanpham=mysql_fetch_assoc($sanpham);

$spbanchay=mysql_fetch_assoc(mysql_query("SELECT SoMauTin FROM hiensomautin WHERE idSoMauTin=3"));
$limit_spbanchay=$spbanchay['SoMauTin'];
$banchay=mysql_query("SELECT idSP,TenSP,HinhAnh FROM sanpham WHERE AnHien= 1 ORDER BY SoLanMua DESC LIMIT 0,$limit_spbanchay");
$row_banchay=mysql_fetch_assoc($banchay);
?>

<link href="css/star_computer.css" rel="stylesheet" type="text/css" />
<link href="css/content.css" rel="stylesheet" type="text/css" />
<link href="includes/skins/mxkollection3.css" rel="stylesheet" type="text/css" media="all" />
<script src="includes/common/js/base.js" type="text/javascript"></script>
<script src="includes/common/js/utility.js" type="text/javascript"></script>
<script src="includes/skins/style.js" type="text/javascript"></script>
<?php echo $tNGs->displayValidationRules();?>
<link href="includes/skins/mxkollection3.css" rel="stylesheet" type="text/css" media="all" />
<script src="includes/common/js/base.js" type="text/javascript"></script>
<script src="includes/common/js/utility.js" type="text/javascript"></script>
<script src="includes/skins/style.js" type="text/javascript"></script>
<script type="text/javascript" src="ax.js"></script>
<script src="../Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
 <div id="right">
  <div id="item">
    <form method="post" id="form1" class="KT_tngformerror" action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>">
      <table width="98%" cellpadding="2" cellspacing="0" class="KT_tngtable1">
      <tr>
          <td colspan="2" align="center" class="textdn">
		  <?php 
		  if($_SESSION['kt_login_id']=="") echo "ĐĂNG NHẬP";
		  else echo "<a href='index.php?mod=doithongtin' class='textdn'>ĐỔI THÔNG TIN</a>";
		  ?></td>
        </tr>
        <tr>
          <td class="KT_th"><label for="kt_login_user">Username:</label>
              <p>
                <input type="text" name="kt_login_user" id="kt_login_user" value="<?php echo KT_escapeAttribute($row_rscustom['kt_login_user']); ?>" size="20" />
                <?php echo $tNGs->displayFieldHint("kt_login_user");?> <?php echo $tNGs->displayFieldError("custom", "kt_login_user"); ?> </p></td>
        </tr>
        <tr>
          <td class="KT_th"><label for="kt_login_password">Password:</label>
              <p>
                <input type="password" name="kt_login_password" id="kt_login_password" value="" size="20" />
                <?php echo $tNGs->displayFieldHint("kt_login_password");?> <?php echo $tNGs->displayFieldError("custom", "kt_login_password"); ?> </p></td>
        </tr>
        <tr>
          <td><span class="dangki"><a target="inan" onclick="open('forgot_password.php','inan','width=400, height=200, scrollbars=yes, left=250',scrollbars=0);" href="forgot_password.php"class="dangki">Quên mật khẩu</a></span></td>
        </tr>
        <tr>
          <td><input type="submit" name="kt_login3" id="kt_login3" value="Login" />
            <a href="index.php?mod=dangki" class="dangki">Đăng kí</a> | <a href="logout.php" class="dangki">Thoát</a></td>
        </tr>
      </table>
    </form>
  </div>
 <div id="title">TÌM NÂNG CAO</div>
 	<div id="item" style="float:left;"> <?php require_once('timnangcao.php'); ?>
    </div>
<!--giohang-->  
<div id="title">GIỎ HÀNG</div>
 <div id="item" style="float:left">
<?php require_once('hiengiohang.php'); ?>
 </div>
 <!--gio hang-->
<!--san pham moi-->  
<div id="item">   
    <div id="title"><?php echo $limit_spmoi ;?> SẢN PHẨM MỚI</div>
    <div class="tinnoibat">   	  
      <ul>
	  <?php if(mysql_num_rows($sanpham)!=0){do{?>
   	  <li>
      <a href="index.php?idSP=<?php echo $row_sanpham['idSP'];?>&mod=chitietsp" class="linktinnoibat">
      	<img src="upload/<?php   echo $row_sanpham['HinhAnh'];?>" border="0" width="20" height="20">
   	  <?php echo $row_sanpham['TenSP'];?>
      </a>
      </li>
      <?php }while($row_sanpham=mysql_fetch_assoc($sanpham));} else echo " Không có sản phẩm nào"; ?>   
      </ul>	
    </div>
</div>
<!--san pham moi--> 

<!--san pham ban chay-->
<div id="item">
    <!-- San pham ban chay -->
  <div id="title"><?php echo $limit_spbanchay ;?> SẢN PHẨM BÁN CHẠY</div>
    <div class="tinnoibat">   	  
      <ul><?php if(mysql_num_rows($banchay)!=0){do{?>
   	 <li> <a href="index.php?idSP=<?php   echo $row_banchay['idSP'];?>&mod=chitietsp" class="linktinnoibat"><img src="upload/<?php echo $row_banchay['HinhAnh'];?>" border="0" width="20" height="20">
   	   <?php echo $row_banchay['TenSP'];?></a></li>
      <?php }while($row_banchay=mysql_fetch_assoc($banchay));} else echo " Không có sản phẩm nào"; ?>  
      </ul> 	
    </div> 
<!--san pham ban chay--> 
<!--Binh chon-->
<div id="item">
 <div id="title">BÌNH CHỌN</div>
<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,0,0" width="167" height="170" align="middle">
<param name="movie" value="http://localhost/star_computer/web/WebPoll/poll.swf?setWIDTH=167&pollid=7&owner=phpjabbers.com&phpURL=http://localhost/star_computer/web/WebPoll/" />
<param name="quality" value="high" />
<param name="bgcolor" value="#FFFFFF" />
<embed src="http://localhost/star_computer/web/WebPoll/poll.swf?setWIDTH=167&pollid=7&owner=phpjabbers.com&phpURL=http://localhost/star_computer/web/WebPoll/" quality="high" bgcolor="#ffffff" width="167" height="170" align="middle" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" />
</object>
  
  </div>
<!--end binh chon-->
<!--quang cao-->   
<!--Begin quang cao-->
<div id="item">      
<div id="title">QUẢNG CÁO</div>
<iframe src="ifFrame.php" scrolling="no" frameborder="0" height="200px">
</div>
</div>
</div>
 