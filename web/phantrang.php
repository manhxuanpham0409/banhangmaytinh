<link href="css/content.css" rel="stylesheet" type="text/css" />
<?php   
class Pager
{
	function findStart($limit)
		{
			if((!isset($_GET['page'])) || ($_GET['page'])=="1")
			{
				$start = 0;
				$_GET['page'] = 1;
			}
			else
			{
				$start =($_GET['page']-1)*$limit;
			}
			return $start;
		}
		
		//Trả về số trang dựa trên số dòng và giới hạn mỗi trang $limit ***************************
		function findPages($count,$limit)
		{
			if(($count % $limit)==0) 
				$pages = $count / $limit;
			else
				$pages = floor($count / $limit)+1;
			return $pages;		
		}
		//Trả về danh sách trang dạng "Trang đầu tiên < [các trang] > Trang cuối cùng"**************
		function pageList($curpage,$pages)
		{
			$page_list.="<a href='#'></a>";
			//$page_list .="";
			//In trang đầu tiên và những link tới trang trước nếu cần
			if(($curpage!=1) && ($curpage!=0))
				{
					$page_list.="<a  class =phantrang href=\"".$_SERVER['REQUEST_URI']."&page=1\" title=\"Đầu tiên tiên\">Đầu</a> ";
									
				}
				
			if(($curpage-1)>0)
				{
					$page_list.= "<a  class =phantrang  href=\"".$_SERVER['REQUEST_URI']."&page=".($curpage-1)."\" title=\"Về trang trước\">Trước</a> ";			
				}
			//In danh sach cac trang va lam cho cac trang hien tai va bat link o chan
			for($i=1;$i<=$pages;$i++)
			{
				if($i== $curpage)
					{
						$page_list.= "<b class=phantrang>".$i."</b>";
					}
				else
					{
					$page_list.= " <a class =phantrang href=\"".$_SERVER['REQUEST_URI']."&page=".$i."\" title=\"Trang ".$i."\">".$i."</a> ";
					}	
				$page_list.="";	
			}
			//In link cac trang tiep theo va trang cuoi neu can 
			if(($curpage+1) <= $pages)
				{
					$page_list.="<a class =phantrang  href=\"".$_SERVER['REQUEST_URI']."&page=".($curpage+1)."\" title=\"Đến trang sau \">Sau</a> ";
				}
			if(($curpage != $pages) && ($pages!=0))
				{
					$page_list.="<a  class =phantrang href=\"".$_SERVER['REQUEST_URI']."&page=".$pages."\" title=\"Trang cuối cùng\">Cuối</a> ";
				}
			$page_list .= "</td>\n";
			return $page_list;
		}
		//**********************************************************************************
		
}
	

?>
