function quayve()
{
	window.history.back();
}

function thanhtoan()
	{
		with (document.form7)
		{
			if(sosp.value!=0)
			{			
				if (pt.value=="")
				{
					alert ("Bạn chưa chọn phương thức");
					pt.focus();
					return false;
				}
				if (sodt.value=="")
				{
					alert ("Bạn chưa nhập số điện thoại");
					sodt.focus();
					return false;
				}
				if (dcnguoinhan.value=="")
				{
					alert ("Bạn chưa nhập địa chỉ người nhận");
					dcnguoinhan.focus();
					return false;
				}
			}
			else 
			{
				alert ("Bạn chưa chọn sản phẩm!");
				return false;	
			}
		return true;
		}
	}

function login()
{
	with (document.form100)
		{
				
				if (user.value=="")
				{
					alert ("Nhập username");
					user.focus();
					return false;
				}
				if (pass.value=="")
				{
					alert ("Nhập password");
					pass.focus();
					return false;
				}
		}
	return true;
}
		

function themhsx()
{
	with (document.form034)
		{
				
				if (tenhang.value=="")
				{
					alert ("Bạn chưa nhập tên hãng sản xuất");
					tenhang.focus();
					return false;
				}
				if (thutu.value=="")
				{
					alert ("Nhập thứ tự");
					thutu.focus();
					return false;
				}
		}
	return true;
}
		

function themsp()
{
	
	with (document.form80)
		{
				
				if (TenSP.value=="")
				{
					alert ("Bạn chưa nhập tên sản phẩm");
					TenSP.focus();
					return false;
				}
				if (DonGia.value=="")
				{
					alert ("Bạn chưa nhập giá của sản phẩm");
					DonGia.focus();
					return false;
				}
				
		}
		return true;	
}

/*tintuc*/
function dangtin()
{
	
	with (document.form99)
		{
				
				if (td.value=="")
				{
					alert ("Tiêu đề chưa có");
					td.focus();
					return false;
				}
				if (tt.value=="")
				{
					alert ("Tóm tắt chưa có");
					tt.focus();
					return false;
				}
				if (nd.value=="")
				{
					alert ("Nội dung chưa có");
					nd.focus();
					return false;
				}				
		}
		return true;	
}
