// JavaScript Document
function LayNoiDung(url)
{	
	url+="&thdiem=".concat((new Date()).getTime());	

	try{ 
	var h;
	if(window.ActiveXObject) h=new ActiveXObject("Microsoft.XMLHTTP");				
	else h= new XMLHttpRequest();	
	h.onreadystatechange=function() {
			if (h.readyState==4) 				
				if (h.status==200) 
					document.getElementById('xl_sanpham').innerHTML=h.responseText;				
				else alert("Không lấy dữ liệu được. " + h.statusText+ "-"+ h.responseText);
	}
	h.open("GET",url,true);	
	h.send(null);	
	}
	catch (e) { alert("Lỗi "+ e.description + "-"+ h.responseText);}
}
// Hien gio hang
function giohang(url)
{	
	url+="&thdiem=".concat((new Date()).getTime());	

	try{ 
	var h;
	if(window.ActiveXObject) h=new ActiveXObject("Microsoft.XMLHTTP");				
	else h= new XMLHttpRequest();	
	h.onreadystatechange=function() {
			if (h.readyState==4) 				
				if (h.status==200) 
					document.getElementById('giohang').innerHTML=h.responseText;				
				else alert("Không lấy dữ liệu được. " + h.statusText+ "-"+ h.responseText);
	}
	h.open("GET",url,true);	
	h.send(null);	
	}
	catch (e) { alert("Lỗi "+ e.description + "-"+ h.responseText);}
}
/* End */