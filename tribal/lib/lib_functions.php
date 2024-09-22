<?php
function html_format_number($number) {
	$number = round((int)$number);
	
	$string = number_format($number);
	
	$string = str_replace(",",".",$string);
	
	return $string;
	}
	
function integralize($number,$min,$max,$function = "NONE") {
	$number = (int)$number;
	$functions = array("floor,round,ceil");
	
	if (!in_array($function,$functions)) {
		$function = "NONE";
		}
		
	if ($function != "NONE") {
		$number = $function($number);
		}
	
	if ($number < $min) {
		$number = $min;
		}
		
	if ($number > $max) {
		$number = $max;
		}
		
	return $number;
	}
	
function real_string($str) {
	$str = preg_replace("/[A-Za-z0-9_\\]/","",$str);
	
	return $str;
	}
	
function parse_string($str) {
	$str = str_repace("\\","",$str);
	
	$array = array(
		"~" => "\\001",
		"`" => "\\002",
		"!" => "\\003",
		"@" => "\\004",
		"$" => "\\005",
		"%" => "\\006",
		"^" => "\\007",
		"&" => "\\008",
		"*" => "\\009",
		"(" => "\\010",
		")" => "\\011",
		"-" => "\\012",
		"+" => "\\013",
		"=" => "\\014",
		"{" => "\\015",
		"}" => "\\016",
		"|" => "\\017",
		":" => "\\018",
		";" => "\\019",
		'"' => "\\020",
		"'" => "\\021",
		"<" => "\\022",
		"," => "\\023",
		">" => "\\024",
		"." => "\\025",
		"/" => "\\026",
		"?" => "\\027",
		"\n" => "\\028",
		"\t" => "\\029",
		"ê" => "\\030",
		"Ê" => "\\031",
		"ó" => "\\032",
		"Ó" => "\\033",
		"¹" => "\\034",
		"¥" => "\\035",
		"œ" => "\\036",
		"Œ" => "\\037",
		"¿" => "\\038",
		"¯" => "\\039",
		"Ÿ" => "\\040",
		"" => "\\041",
		"æ" => "\\042",
		"Æ" => "\\043",
		);
	}
?>