	function dangnhap()// Kiem tra ban da nhap ten dang nhap va mat khau chua(Tai khoan nay da dang ki)
	{
		with (document.form10)
		{
			if (username.value=="")
			{
				alert ("Tên đăng nhập chưa có");
				username.focus();
				return false;
			}
			if (password.value=="")
			{
				alert ("Bạn chưa nhập mật khẩu");
				password.focus();
				return false;
			}
			return true;
		}
	}
