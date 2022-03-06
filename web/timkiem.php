<link href="css/star_computer.css" rel="stylesheet" type="text/css">
<div id="phantimkiem">
<fieldset>
<legend style="color:#CCFF00; font-size:1.1em; font:Verdana, Arial, Helvetica, sans-serif;">Tìm kiếm</legend>
<div id="Ftimkiem">
	<div id="input">
   	  <form action="display_search.php" method="GET" name="form1" id="form1">
   	  <input name="tensp" type="text" id="texttim" value="<?php if(!$_GET['tensp']) echo "Nhập tên...";echo $_GET['tensp'];?>" size="30"  onclick="if(value=='Nhập tên...') value=''" onBlur="if(value=='') value='Nhập tên...';" />
  	  <input name="imageField" type="image" id="imageField" onClick="if(tensp.value=='' || tensp.value=='Nhập tên...') { alert('Bạn chưa nhập tên sản phẩm'); return false;}" src="images/seach.jpg" align="middle" />
   	  </form>
</div>  
</div>
</fieldset>
</div>