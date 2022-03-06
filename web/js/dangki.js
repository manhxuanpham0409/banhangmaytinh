// JavaScript Document
function validateResult()// Kiem tra ban da nhap ten dang nhap va mat khau chua(Tai khoan nay da dang ki)
	{
		with (document.form3)
		{
			if (ht.value=="")
			{
				alert ("Bạn chưa nhập họ tên");
				ht.focus();
				return false;
			}
			if (user.value=="")
			{
				alert ("Bạn chưa nhập tên đăng nhập");
				user.focus();
				return false;
			}
			if (pass.value=="")
			{
				alert ("Bạn chưa nhập mật khẩu");
				pass.focus();
				return false;
			}
			if (repass.value=="")
			{
				alert ("Bạn chưa xác nhận lại mật khẩu");
				user.focus();
				return false;
			}
			if (pass.value!=repass.value)
			{
				alert ("Mật khẩu có lỗi");
				pass.focus();
				return false;
			}
			if (ngay.value==0)
			{
				alert ("Bạn chưa chọn ngày sinh");
				ngay.focus();
				return false;
			}
			if (thang.value==0)
			{
				alert ("Bạn chưa chọn tháng");
				thang.focus();
				return false;
			}
			if (nam.value==0)
			{
				alert ("Bạn chưa chọn năm");
				nam.focus();
				return false;
			}
			if (dc.value=="")
			{
				alert ("Bạn chưa nhập địa chỉ");
				dc.focus();
				return false;
			}
			if (email.value=="")
			{
				alert ("Bạn chưa nhập địa chỉ email");
				email.focus();
				return false;
			}
			if (dt.value=="")
			{
				alert ("Bạn chưa nhập số điện thoại");
				dt.focus();
				return false;
			}
		 return true;
		}
	}


