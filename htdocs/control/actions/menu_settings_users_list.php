<?php

	$tbl_name = "users";
	$adjacents = 3;
	$query = "SELECT COUNT(*) as num FROM $tbl_name";
	$total_pages = $db->fet_array($db->query($query));
	$total_pages = $total_pages['num'];
	$targetpage = "menu.php?screen=settings_users";
	$limit = 20;
	$page = $func->EscapeString($_GET['page']);
	if($page){
		$start = ($page - 1) * $limit;
	}else{
		$start = 0;
	}
	$sql = "SELECT * FROM $tbl_name LIMIT $start, $limit";
	$result = $db->query($sql);
	
	if($page == 0) $page = 1;
	$prev = $page - 1;
	$next = $page + 1;
	$lastpage = ceil($total_pages/$limit);
	$lpm1 = $lastpage - 1;

	$pagination = "";
	if($lastpage > 1){	
		$pagination .= "<div class=\"pagination\">";
		if($page > 1){
			$pagination.= "<a href=\"$targetpage&page=$prev\">&laquo;</a>";
		}
		else
			 { 	}
		if($lastpage < 7 + ($adjacents * 2)){
			for($counter = 1; $counter <= $lastpage; $counter++){
				if($counter == $page)
					$pagination.= "<span class=\"current\">$counter</span>";
				else
					$pagination.= "<a href=\"$targetpage&page=$counter\">$counter</a>";					
			}
		}elseif($lastpage > 5 + ($adjacents * 2)){
			if($page < 1 + ($adjacents * 2)){
				for($counter = 1; $counter < 4 + ($adjacents * 2); $counter++){
					if($counter == $page)
						$pagination.= "<span class=\"current\">$counter</span>";
					else
						$pagination.= "<a href=\"$targetpage&page=$counter\">$counter</a>";					
				}
				$pagination.= "...";
				$pagination.= "<a href=\"$targetpage&page=$lpm1\">$lpm1</a>";
				$pagination.= "<a href=\"$targetpage&page=$lastpage\">$lastpage</a>";		
			}elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2)){
				$pagination.= "<a href=\"$targetpage&page=1\">1</a>";
				$pagination.= "<a href=\"$targetpage&page=2\">2</a>";
				$pagination.= "...";
				for($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++){
					if($counter == $page)
						$pagination.= "<span class=\"current\">$counter</span>";
					else
						$pagination.= "<a href=\"$targetpage&page=$counter\">$counter</a>";					
				}
				$pagination.= "...";
				$pagination.= "<a href=\"$targetpage&page=$lpm1\">$lpm1</a>";
				$pagination.= "<a href=\"$targetpage&page=$lastpage\">$lastpage</a>";		
			}else{
				$pagination.= "<a href=\"$targetpage&page=1\">1</a>";
				$pagination.= "<a href=\"$targetpage&page=2\">2</a>";
				$pagination.= "...";
				for($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++){
					if($counter == $page)
						$pagination.= "<span class=\"current\">$counter</span>";
					else
						$pagination.= "<a href=\"$targetpage&page=$counter\">$counter</a>";					
				}
			}
		}
		if($page < $counter - 1) {
			$pagination.= "<a href=\"$targetpage&page=$next\">&raquo;</a>";
		}else{
			$pagination.= "</div>\n";
		}
	}
?>
<table class="vis" width="100%" style="border-spacing:1px; background-color:#FEE47D;">
	<tr><th>Jogador</th><th>E-mail</th></tr>
<?
	while($row = $db->fet_array($result)){
		echo "<tr><td><a href='menu.php?screen=settings_users&mode=edit&id=".$row['id']."'>".$func->EscapeString(urldecode($row['username']))."</a></td><td align=\"center\"><a href=\"mailto:".$row['mail']."\">".$row['mail']."</a></td></tr>";
	}
	if($pagination){
?>
	<tr><td colspan="2" align="center"><?=$pagination;?></td></tr>
<? } ?>
</table>