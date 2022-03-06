<?php session_start();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login</title>
<link href="css/myadmin.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="../js/dungchung.js"></script>
</head>
<body>
<div id="login">
  <fieldset>
  <div id="login_title">star_computer!LOGIN</div>
  <div id="logo"><img src="images/banner.png" /></div>
  <form action="login.php" method="post" name="form100" id="form100">
	<div id="dangnhap">
          <div id="user">
            <label><div id="sub">Username </div>
            <input name="user" type="text" id="user2" size="20" />
            </label>
        </div>
          <div id="pass">
            <label><div id="sub">Password</div>
            <input name="pass" type="text" id="pass2" size="20" />
            </label>
        </div>  
          <div id="nut">
            <label>
            <input type="submit" name="button" id="button" value="Login!" onclick="return login();"/>
            </label>
        </div>
    </div>
  </form>
  <?php require_once('../Connections/config.php');?>
      <?php 
		if(!empty($_POST["user"]) && !empty($_POST["pass"]))
			{
				$user =$_POST["user"];
				$pass =$_POST["pass"];
				$admin = mysql_query("SELECT * FROM admin WHERE user='$user' AND pass='$pass'");
				$row_admin=mysql_fetch_assoc($admin);
				$n=mysql_num_rows($admin);
				if($n==1)
					{
						$_SESSION["admin"]=$user;
						echo "<script type='text/javascript'>alert('WELCOME TO STAR-COMPUTER');window.location='index.php'</script>";						
					}
				else echo "<script type='text/javascript'>alert('Đăng nhập thất bại!');window.location='login.php'</script>";	
			}


	?>
  </fieldset><span style="color:#CCCCCC; font-size:12px">Designer: Huỳnh Văn Được_CĐTin32A</span>  
</div>
</body>
</html>
