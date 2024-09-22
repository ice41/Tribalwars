<?php 
$error = "";

if ($_GET['action'] === 'new_offer' && count($_POST) > 0) {
	if ($_GET['h'] == $session['hkey']) {
		$res_arr = array("stone","wood","iron","all");
		
		if (!in_array($_POST["res_sell"],$res_arr)) {
			$error = "Selecione a matéria -prima apropriada para oferecer";
			}
			
		if (!in_array($_POST["res_buy"],$res_arr) && empty($error)) {
			$error = "Selecione a matéria -prima apropriada para comprar";
			}
			
		if (empty($error)) {
			//Walidacja zmiennych numerycznych:
			$_POST["sell"] = floor((int)$_POST["sell"]);
			$_POST["buy"] = floor((int)$_POST["buy"]);
			$_POST["multi"] = floor((int)$_POST["multi"]);
			
			if ($_POST["multi"] < 1) {
				$_POST["multi"] = 1;
				}
			
			if ($_POST["sell"] < 10) {
				$error = 'Deve oferecer pelo menos 10 recursos';
				}
				
			if ($_POST["sell"] != 0) {
				$stosunek_oferty = $_POST["buy"] / $_POST["sell"];
				} else {
				$stosunek_oferty = 0;
				}
				
			if ($stosunek_oferty < 0) {
				$stosunek_oferty = 0;
				}
				
			//Sprasowa� numer:
			$kropki = substr_count($stosunek_oferty,".");
			if ($kropki > 0) {
				$array = explode(".",$stosunek_oferty);
				$stosunek_oferty = $array[0] . "." . substr($array[1],0,2);
				}
			
			
			if ($stosunek_oferty > 4 || $stosunek_oferty < 0.25 && empty($error)) {
				$error = 'A proporção da oferta deve estar na faixa de 0,25 para 4';
				}
				
			if (($_POST["sell"] * $_POST["multi"]) > $village["r_".$_POST["res_sell"]] && empty($error)) {
				$error = "Tem uma pequena matéria -prima para definir a oferta";
				}
				
			if (empty($error) && $_POST["multi"] < 50000) {
				//Obliczy� ilo�� wymaganych kupc�w
				for ($i = 1; $i <= $_POST["multi"]; $i++) {
					$required_dealers += ceil(($_POST["sell"] / 1000));
					}
				}
			
			if ($required_dealers > $inside_dealers && empty($error)) {
				$error = "Tem um pequeno comprador para configurar uma oferta";
				}
				
			//Je�li nie ma �adnego b��du, to w tym wypadku dodaj ofert�:			
				
			if (empty($error)) {
				$res_minus = $_POST["sell"] * $_POST["multi"];
				mysql_query("INSERT INTO offers(sell,buy,sell_ress,buy_ress,multi,from_village,time,ratio_max,userid,x,y)
					VALUES (
					'".$_POST["sell"]."','".$_POST["buy"]."','".$_POST["res_sell"]."','".$_POST["res_buy"]."','".$_POST["multi"]."',
					'".$village["id"]."','".date("U")."','".$stosunek_oferty."','".$user["id"]."','".$village["x"]."','".$village["y"]."')");
					
				mysql_query("UPDATE `villages` SET `dealers_outside` = `dealers_outside` + '$required_dealers' , `r_".$_POST["res_sell"]."` = `r_".$_POST["res_sell"]."` - '".$res_minus."' WHERE `id` = '".$village["id"]."'");
				
				header('location: game.php?village='.$village['id'].'&screen=market&mode=own_offer');
				exit;
				}
			}
		} else {
		$error = 'Estará realizando ações.';
		}
	}
	
//Wybra� w�asne oferty:
$query = mysql_query("SELECT id,sell_ress,buy_ress,sell,buy,multi,time FROM `offers` WHERE `from_village` = '".$village["id"]."'");
while ($arr = mysql_fetch_array($query)) {
	$offers[$arr["id"]]["sell_ress"] = $arr["sell_ress"];
	$offers[$arr["id"]]["buy_ress"] = $arr["buy_ress"];
	$offers[$arr["id"]]["sell"] = $arr["sell"];
	$offers[$arr["id"]]["buy"] = $arr["buy"];
	$offers[$arr["id"]]["multi"] = $arr["multi"];
	$offers[$arr["id"]]["time"] = $pl->format_date($arr["time"]);
	}
	
if ($_GET['action'] === 'modify_offers' && count($_POST) > 0) {
	if ($_GET['h'] == $session['hkey']) {
		$action = false;
		if (isset($_POST["delete"]) && !$action) {
			$action = true;
			
			foreach ($offers as $id => $info) {
				if (isset($_POST["id_$id"])) {
					$do_odd_deal = 0;
					$sur_do_odd = $info["sell"] * $info["multi"];
					
					for ($i = 1; $i <= $info["multi"]; $i++) {
						$do_odd_deal += ceil(($info["sell"] / 1000));
						}
						
					mysql_query("UPDATE `villages` SET `dealers_outside` = `dealers_outside` - '$do_odd_deal', `r_".$info["sell_ress"]."` = `r_".$info["sell_ress"]."` + '$sur_do_odd' WHERE `id` = '".$village["id"]."'");
					mysql_query("DELETE FROM `offers` WHERE `id` = '$id'");
					}
				}
				
			header('location: game.php?village='.$village['id'].'&screen=market&mode=own_offer');
			exit;
			}
		if (isset($_POST["increase"]) && !$action) {
			$action = true;
			$_POST["mod_count"] = floor((int)$_POST["mod_count"]);
			if ($_POST["mod_count"] < 1 || $_POST["mod_count"] > 5000) {
				$error = "Dê o valor correto";
				} else {
				
				$req_wood = 0;
				$req_stone = 0;
				$req_iron = 0;
				$req_dealers = 0;
				
				foreach ($offers as $id => $info) {
					if (isset($_POST["id_$id"])) {
						$edit_offers[] = $id;
						
						if ($info["sell_ress"] === "wood") {
							$req_wood += $info["sell"] * $_POST["mod_count"];
							}
						if ($info["sell_ress"] === "stone") {
							$req_stone += $info["sell"] * $_POST["mod_count"];
							}
						if ($info["sell_ress"] === "iron") {
							$req_iron += $info["sell"] * $_POST["mod_count"];
							}
							
						for ($i = 1; $i <= $_POST["mod_count"]; $i++) {
							$req_dealers += ceil(($info["sell"] / 1000));
							}
						}
					}
					
				if (is_array($edit_offers)) {
					if ($village["r_wood"] >= $req_wood && $village["r_stone"] >= $req_stone && $village["r_iron"] >= $req_iron && $inside_dealers >= $req_dealers) {
						mysql_query("UPDATE `villages` SET
							`r_wood` = `r_wood` - '$req_wood' ,
							`r_stone` = `r_stone` - '$req_stone' ,
							`r_iron` = `r_iron` - '$req_iron' ,
							`dealers_outside` = `dealers_outside` + '$req_dealers'
							WHERE `id` = '".$village["id"]."'");
						foreach ($edit_offers as $id) {
							mysql_query("UPDATE `offers` SET `multi` = `multi` + '".$_POST["mod_count"]."' WHERE `id` = '$id'");
							}
						header('location: game.php?village='.$village['id'].'&screen=market&mode=own_offer');
						exit;
						} else {
						$error = "Tem recursos por pouco e compra para que possa vincular a quantidade de ofertas";
						}
					}
				}
			}
		if (isset($_POST["decrease"]) && !$action) {
			$action = true;
			$_POST["mod_count"] = floor((int)$_POST["mod_count"]);
			if ($_POST["mod_count"] < 1 || $_POST["mod_count"] > 5000) {
				$error = "Dê o valor correto";
				} else {
				$to_add = false;
				
				$add_wood = 0;
				$add_stone = 0;
				$add_iron = 0;
				$add_dealers = 0;
				
				foreach ($offers as $id => $info) {
					if (isset($_POST["id_$id"])) {
						$to_add = true;
						
						if ($_POST["mod_count"] >= $info["multi"]) {
							if ($info["sell_ress"] === "wood") {
								$add_wood += $info["sell"] * $info["multi"];
								}
							if ($info["sell_ress"] === "stone") {
								$add_stone += $info["sell"] * $info["multi"];
								}
							if ($info["sell_ress"] === "iron") {
								$add_iron += $info["sell"] * $info["multi"];
								}
							
							for ($i = 1; $i <= $info["multi"]; $i++) {
								$add_dealers += ceil(($info["sell"] / 1000));
								}
							mysql_query("DELETE FROM `offers` WHERE `id` = '$id'");
							} else {
							if ($info["sell_ress"] === "wood") {
								$add_wood += $info["sell"] * $_POST["mod_count"];
								}
							if ($info["sell_ress"] === "stone") {
								$add_stone += $info["sell"] * $_POST["mod_count"];
								}
							if ($info["sell_ress"] === "iron") {
								$add_iron += $info["sell"] * $_POST["mod_count"];
								}
							
							for ($i = 1; $i <= $_POST["mod_count"]; $i++) {
								$add_dealers += ceil(($info["sell"] / 1000));
								}
							mysql_query("UPDATE `offers` SET `multi` = `multi` - '".$_POST["mod_count"]."' WHERE `id` = '$id'");
							}
						}
					}
					
				if ($to_add) {
					mysql_query("UPDATE `villages` SET
						`r_wood` = `r_wood` + '$add_wood' ,
						`r_stone` = `r_stone` + '$add_stone' ,
						`r_iron` = `r_iron` + '$add_iron' ,
						`dealers_outside` = `dealers_outside` - '$add_dealers'
						WHERE `id` = '".$village["id"]."'");
					}
				
				header('location: game.php?village='.$village['id'].'&screen=market&mode=own_offer');
				exit;
				}
			}
		} else {
		$error = 'Estará realizando ações.';
		}
	}
	
$tpl->assign("error",$error);
$tpl->assign("offers",$offers);
?>