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
	<?php if ($user['confirm_queue']): ?>
		<?php echo "<?";?>xml version="1.0" encoding="UTF-8"<?php echo "?>"; ?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
		<html xmlns="http://www.w3.org/1999/xhtml">
			<head>
				<title>Forum sojuszu <?php echo $allyname; ?></title>
				<meta http-equiv="content-type" content="text/html; charset=windows-1250" />

				<link rel="stylesheet" type="text/css" href="game.css?1331133567" />
				<link rel="stylesheet" type="text/css" href="styl.css?1331133567" />
				<script src="/js/script.js?1159978916" type="text/javascript"></script>

			</head>

			<body id="ds_body" class="header" >
				<table align="center" style="margin:auto; margin-top: 15px; width: 100%;padding:5px;">
					<tr>
						<td>
							<table class="content-border" id="content_value" style="border-collapse: collapse; width: 100%; padding: 10px;">
								<tr>
									<td>
										<?php $tpl->display("forum/forum.tpl"); ?>
									</td>
								</tr>
							</table>
						</td>
					</tr>
				</table>
			</body>
		</html>
	<?php else: ?>
		<head>
			<title>Forum sojuszu <?php echo $allyname; ?></title>
			<link rel="stylesheet" type="text/css" href="stamm.css" />
			<meta http-equiv="Content-Type" content="text/html; charset=windows-1250" />
			<script src="script.js?1159978916" type="text/javascript"></script>
		</head>

		<body style="margin-top:6px;">
			<?php $tpl->display("forum/forum.tpl"); ?>
		</body>
	<?php endif;?>
<?php endif;?>

