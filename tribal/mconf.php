<?
//Multiconfig
if(!isset($_SESSION['lang'])) {
$mconf["lang"] = 'de';
$_SESSION['lang'] = $mconf["lang"];
} else { $mconf['lang'] = $_SESSION['lang']; };
?>
