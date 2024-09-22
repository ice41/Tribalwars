<?php
if ($_GET["action"] === "accept_multi" and count($_POST) > 0) {
	if ($_GET['h'] == $session['hkey']) {
		$_GET["id"] = (int)$_GET["id"];
		
		//Sprawd� czy istnieje oferta:
		$counts = sql("SELECT COUNT(id) FROM `offers` WHERE `id` = '".$_GET["id"]."' AND `userid` != '".$user["id"]."'","array");
		
		if ($counts > 0) {
			//Walidacja:
			$_GET["page"] = (int)$_GET["page"];
			if ($_GET["page"] < 0) $_GET["page"] = 0;
			
			$_POST["count"] = (int)$_POST["count"];
			if ($_POST["count"] < 1) $_POST["count"] = 1;
			
			$offer_info = sql("SELECT sell,buy,sell_ress,buy_ress,multi,ratio_max,userid,from_village FROM `offers` WHERE `id` = '".$_GET["id"]."'","assoc");
			
			if ($_POST["count"] > $offer_info["multi"]) $_POST["count"] = $offer_info["multi"];
			
			$req_res = $offer_info["buy"] * $_POST["count"];
			$vresname = "r_" . $offer_info["buy_ress"];
			$required_offer_dealers = 0;
			
			for ($i = 1; $i <= $_POST["count"]; $i++) {
				$required_offer_dealers += ceil(($offer_info["buy"] / 1000));
				}
				
			if ($required_offer_dealers > $inside_dealers) {
				$error = "Você tem um pequeno comprador para aceitar a oferta";
				} else {
				if ($req_res > $village[$vresname]) {
					$error = "Tem uma pequena matéria -prima para aceitar a oferta";
					}
				}
				
			if (empty($error)) {
				if ($_POST["count"] >= $offer_info["multi"]) {
					mysql_query("DELETE FROM `offers` WHERE `id` = '".$_GET["id"]."'");
					} else {
					mysql_query("UPDATE `offers` SET `multi` = `multi` - '".$_POST["count"]."' WHERE `id` = '".$_GET["id"]."'");
					}
					
				//Wy�lij surowce:
				$to_send["wood"] = 0;
				$to_send["stone"] = 0;
				$to_send["iron"] = 0;
				
				$to_send[$offer_info["buy_ress"]] = $req_res;
				
				wyslij_kupcow($offer_info["from_village"],$village["id"],$to_send);
				
				$from_send["wood"] = 0;
				$from_send["stone"] = 0;
				$from_send["iron"] = 0;
				
				$from_send[$offer_info["sell_ress"]] = $offer_info["sell"] * $_POST["count"];
				
				wyslij_kupcow($village["id"],$offer_info["from_village"],$from_send,false);
				
				mysql_query("UPDATE `users` SET `a_oferty` = `a_oferty` + '1' WHERE `id` = '".$user["id"]."'");
				mysql_query("UPDATE `users` SET `a_oferty` = `a_oferty` + '1' WHERE `id` = '".$offer_info["userid"]."'");
				
				//Dodaj raport:
				$title = $user["username"] . " przyj� twoja ofert�";
				$res_offer = ($offer_info["buy"] * $_POST["count"]).";".($offer_info["sell"] * $_POST["count"]).";".$offer_info["buy_ress"].";".$offer_info["sell_ress"];
				
				mysql_query("INSERT INTO reports(title,time,type,in_group,receiver_userid,to_user,to_village,from_user,from_village,hives)
					 VALUES ('".$title."','".date("U")."','offer','trade','".$offer_info["userid"]."','".$offer_info["userid"]."','".$offer_info["from_village"]."','".$user["id"]."','".$village["id"]."','".$res_offer."')");
				
				$title = "Oferta aceite";
				$res_offer = $offer_info["buy"].";".$offer_info["sell"].";".$offer_info["buy_ress"].";".$offer_info["sell_ress"];
				
				mysql_query("INSERT INTO reports(title,time,type,in_group,receiver_userid,to_user,to_village,from_user,from_village,hives)
					 VALUES ('".$title."','".date("U")."','offer','trade','".$user["id"]."','".$offer_info["userid"]."','".$village["id"]."','".$offer_info["from_village"]."','".$user["id"]."','".$res_offer."')");
					 
				mysql_query("UPDATE `users` SET `new_report` = '1' WHERE `id` = '".$user["id"]."'");
				mysql_query("UPDATE `users` SET `new_report` = '1' WHERE `id` = '".$offer_info["userid"]."'");
				
				header('location: game.php?village='.$village['id'].'&screen=market&mode=other_offer&page='.$_GET["page"]);
				exit;
				}
			} else {
			$error = "A oferta não existe";
			}
		} else {
		$error = 'B��d enquanto executa ações';
		}
	}
	
if ($_GET["action"] === "search" and count($_POST) > 0) {
	if ($_GET['h'] == $session['hkey']) {
		$res_arr = array("stone","wood","iron");
		
		if (!in_array($_POST["res_sell"],$res_arr)) {
			$_POST["res_sell"] = "all";
			}
			
		if (!in_array($_POST["res_buy"],$res_arr)) {
			$_POST["res_buy"] = "all";
			}
			
		$_POST["ratio_max"] = (float)$_POST["ratio_max"];
		if ($_POST["ratio_max"] < 0) {
			$_POST["ratio_max"] = 0;
			}
		if ($_POST["ratio_max"] > 4) {
			$_POST["ratio_max"] = 4;
			}
			
		mysql_query("UPDATE `users` SET 
			`market_sell` = '".$_POST["res_sell"] ."' ,
			`market_buy` = '".$_POST["res_buy"]."' ,
			`market_ratio_max` = '".$_POST["ratio_max"]."' 
			WHERE `id` = '".$user["id"]."'");
			
		header('location: game.php?village='.$village['id'].'&screen=market&mode=other_offer');
		exit;
		} else {
		$error = 'B��d enquanto executa ações';
		}
	}
	
$user_offer = sql("SELECT market_sell,market_buy,market_ratio_max FROM `users` WHERE `id` = '".$user["id"]."'","assoc");

if (empty($user_offer["market_sell"]) || empty($user_offer["market_buy"])) {
	$search = false;
	} else {
	$search = true;
	}
	
if ($search) {
	//Utworzy� zapytanie do bazy:
	$filters = array();
	
	if ($user_offer["market_sell"] !== "all") {
		$filters[] = "`buy_ress` = '".$user_offer["market_sell"]."'";
		}
	if ($user_offer["market_buy"] !== "all") {
		$filters[] = "`sell_ress` = '".$user_offer["market_buy"]."'";
		}
	if ($user_offer["market_ratio_max"] != 0) {
		$filters[] = "`ratio_max` <= '".$user_offer["market_ratio_max"]."'";
		}
	$filters[] = "`userid` != '".$user["id"]."'";
	
	$offer_query_extends = implode(" AND ",$filters);
	
	$offers_count = sql("SELECT COUNT(id) FROM `offers` WHERE $offer_query_extends","array");
	
	if (empty($_GET["page"]) || !is_numeric($_GET["page"])) {
		$_GET["page"] = 0;
		}
		
	$_GET["page"] = (int)$_GET["page"];
	
	//Utworzy� sekcj�:
	if ($offers_count > 15) {
		$section_offers_exists = true;
		
		$max_pages = ceil($offers_count / 15);

		$sekcja_link = 'game.php?village='.$village['id'].'&screen=market&mode=other_offer&page=';
		
		for ($i = 1; $i <= $max_pages; $i++) {
			$lpage = $i - 1;
			if ($lpage == $_GET["page"]) {
				$offers_section .= '<b>&gt;'.$i.'&lt;</b>  ';
				} else {
				$offers_section .= '<a href="'.$sekcja_link.$lpage.'">['.$i.']<a>  ';
				}
			}
		}
		
	$start_ll = $_GET["page"] * 15;
	if ($start_ll < 0) {
		$start_ll = 0;
		}
	
	$query = mysql_query("SELECT id,sell,buy,sell_ress,buy_ress,multi,ratio_max,userid,x,y FROM `offers` WHERE $offer_query_extends LIMIT $start_ll , 15");
	while ($arr = mysql_fetch_assoc($query)) {
		$offers[$arr["id"]]["sell_ress"] = $arr["sell_ress"];
		$offers[$arr["id"]]["buy_ress"] = $arr["buy_ress"];
		$offers[$arr["id"]]["sell"] = $arr["sell"];
		$offers[$arr["id"]]["buy"] = $arr["buy"];
		$offers[$arr["id"]]["multi"] = $arr["multi"];
		$offers[$arr["id"]]["userid"] = $arr["userid"];
		
	// Escolha as informações do jogador:
		$uinfo = sql("SELECT username,ally FROM `users` WHERE `id` = '".$arr["userid"]."'","assoc");
		if ($uinfo["ally"] != "-1") {
			$offers[$arr["id"]]["user_allyshort"] = sql("SELECT `short` FROM `ally` WHERE `id` = '".$uinfo["ally"]."'","array");
			}
		$offers[$arr["id"]]["username"] = entparse($uinfo["username"]);
		$offers[$arr["id"]]["userally"] = $uinfo["ally"];

		// Calcule o tempo de entrega:
		$offers[$arr["id"]]["unit_running"] = format_time(get_dealer_time($village["x"],$village["y"],$arr["x"],$arr["y"]));
		
		// Verifique se é possível aceitar a oferta:
		$offer_req_dealers = ceil(($arr["buy"] / 1000));
		$vresname = "r_" . $arr["buy_ress"];
		
		if ($offer_req_dealers > $inside_dealers) {
			$offers[$arr["id"]]["message"] = "nd";
			} else {
			if ($arr["buy"] > $village[$vresname]) {
				$offers[$arr["id"]]["message"] = "nr";
				} else {
				$offers[$arr["id"]]["message"] = "ne";
				}
			}
			
		$offers[$arr["id"]]["ratio_max"] = $arr["ratio_max"];
		
		if ($arr["ratio_max"] == 1) {
			$offers[$arr["id"]]["ratio_red"] = 255;
			$offers[$arr["id"]]["ratio_green"] = 255;
			}
		if ($arr["ratio_max"] > 1) {
			$offers[$arr["id"]]["ratio_red"] = 255;
			$offers[$arr["id"]]["ratio_green"] = 100;
			}
		if ($arr["ratio_max"] < 1) {
			$offers[$arr["id"]]["ratio_red"] = 0;
			$offers[$arr["id"]]["ratio_green"] = 200;
			}
		}
		
	$tpl->assign("section_offers_exists",$section_offers_exists);
	$tpl->assign("offers_section",$offers_section);
	$tpl->assign("aktu_opage",$_GET["page"]);
	$tpl->assign("offers",$offers);
	}
 
$tpl->assign("market",$user_offer);
$tpl->assign("error",$error);
?>