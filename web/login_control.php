<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login dang nhap</title>
</head>
<body>
<?php require_once('Connections/config.php'); ?>
<?php   
$_SESSION['flag']=0;
$user_name=$_POST['username'];
$pass_word=$_POST['password'];
$sql = "select * from `user` where `user` like '".$user_name."' and `pass` like'".$pass_word."'";
$result = mysql_query($sql,$connection);
if(!$result)
{
	$_SESSION['flag']=0;
	header("Location: index.php");
	
}
else 
{
	if(mysql_num_rows($result)!=0) 
	{	
	    $_SESSION['flag']=1;
		$_SESSION['tendangnhap']=$user_name;
	}
	else
	{
		$_SESSION['flag']=0;
	}
}
echo "<script type='text/javascript'>window.location='index.php?mod=home'</script>";	
?>
</body>
</html>
