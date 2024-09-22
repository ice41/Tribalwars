<?php
/*****************************************/
/*=======================================*/
/*     PLIK: forum.php   				 */
/*     DATA: 10.04.2011r        		 */
/*     ROLA: forum plemienia			 */
/*     AUTOR: SIR ROLAND                 */
/*=======================================*/
/*****************************************/

/*MA£E ZABESPIECZENIE PLEMION PRZED HAKERAMI :)*/

class GLOBALS {
	var $defined_globals = array();
	
	function define_global($globalname) {
		if (is_array($globalname)) {
			foreach ($globalname as $globalne) {
				$this->defined_globals[$globalne] = TRUE;
				}
			} else {
			$this->defined_globals[$globalname] = TRUE;
			}
		}
		
	function unregister_undefined_globals() {		
		$HTTP_GETS = $_GET;
		
		foreach ($HTTP_GETS as $HTTP_KEY => $HTTP_VAL) {
			unset($GLOBALS[$HTTP_KEY]);
			}
		}
	}
	
/*ZDEFINIUJ ZMIENNE POCHODZ¥CE OD USERA, KTÓRE MOG¥ BYÆ AKCEPTOWANE*/
$DS_USER_GLOBALS = new GLOBALS;
$DS_USER_GLOBALS->define_global('village');
$DS_USER_GLOBALS->define_global('id');
$DS_USER_GLOBALS->define_global('x');
$DS_USER_GLOBALS->define_global('y');
$DS_USER_GLOBALS->define_global('screen');
$DS_USER_GLOBALS->define_global('mode');
$DS_USER_GLOBALS->define_global('type');
$DS_USER_GLOBALS->define_global('target');
$DS_USER_GLOBALS->define_global('action');
$DS_USER_GLOBALS->define_global('h');
$DS_USER_GLOBALS->define_global('strona');
$DS_USER_GLOBALS->define_global('page');
$DS_USER_GLOBALS->define_global('rlog');
$DS_USER_GLOBALS->define_global('sort');
$DS_USER_GLOBALS->define_global('order');
$DS_USER_GLOBALS->define_global('filter');
$DS_USER_GLOBALS->define_global('akcja');
$DS_USER_GLOBALS->define_global('group');
$DS_USER_GLOBALS->define_global('try');
$DS_USER_GLOBALS->define_global('view');
$DS_USER_GLOBALS->define_global('item_name');
$DS_USER_GLOBALS->define_global('unit');
$DS_USER_GLOBALS->unregister_undefined_globals();
	
require ("include.inc.php");	
require ('lib/pl.php');


$sid = new sid();
$pl = new pl();
$tpl = new smarty();

$user_sid = $sid->check_sid($_COOKIE['session']);

if (is_array($user_sid)) {
	$user = sql("SELECT id,ally,ally_found,ally_lead,ally_invite,ally_diplomacy,ally_mass_mail,ally_mod_forum,ally_forum_switch,ally_forum_trust,confirm_queue FROM `users` WHERE `id` = '".$user_sid['userid']."'","assoc");
	
	$_GET['vid'] = floor((int)$_GET['vid']);
	
	$village['id'] = $_GET['vid'];
	
	if ($user['ally'] == '-1') {
		die ("Musisz wst¹piæ do sojuszu, aby wyœwietliæ t¹ stronê!");
		} else {
		$_BASE_LINK = "forum.php?vid=".$village['id'];
		
		$session = $user_sid;
		
		require ("actions/forum.php");
		
		$require_forum = true;
		
		$allyname = entparse(sql("SELECT `name` FROM `ally` WHERE `id` = '".$user['ally']."'","array"));
		
		$tpl->assign("village",$village);
		$tpl->assign("hkey",$user_sid['hkey']);
		}
	} else {
	header('LOCATION: sid_wrong.php');
	exit;
	}
?>

<?php if ($require_forum): ?>
<?php

?>
	
		<?php echo "<?";?>xml version="1.0" encoding="UTF-8"?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Fora plemienia <?php echo $allyname; ?></title>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
	<link id="favicon" rel="shortcut icon"  href="/graphic/favicon.ico" />
	
	<link rel="stylesheet" type="text/css" href="/css/game.css" />

	<link rel="stylesheet" type="text/css" href="/css/premiumBenefits.css" />

	
	<script type="text/javascript" src="/js/game.js"></script>

	<script type="text/javascript" src="/js/PremiumBenefits.js"></script>

		<script type="text/javascript" src="/js/Forum.js"></script>

	
	
	<script type="text/javascript">
	//<![CDATA[
		$(document).ready(function() {
			if (self!= top){
				$('.text a').each(function(i,link){
					$(link).attr('target', '_parent');
				});
			}
		});
	//]]>
	</script>
	
</head>

<body id="ds_body" class="header" >
	<?php $tpl->display("forum/forum.tpl"); ?>
	</div>
	</div>
	
<script type="text/javascript">
//<![CDATA[
	/*@jQuery*/setImageTitles();
	var mobile = false;
//]]>
</script>


<script type="text/javascript">
//<![CDATA[
$(document).ready(function() {
	$('.text a').each(function() {
		if ($(this).attr('target') == '_parent') {
			$(this).attr('target', '_blank');
		}
	});
});
//]]>
</script>


	<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-1897727-4']);
  _gaq.push(['_trackPageview']);
  _gaq.push(['_gat._anonymizeIp']);


  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(ga);
  })();

</script>
</body>
</html>
	
		
	
		</html>

<?php endif;?>

