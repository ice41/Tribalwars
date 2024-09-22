<?php
require ('include.ini.php');



	if ($_GET['akcja'] == 'aktywuj' and isset($_POST)) {

                $user = parse($_POST['user']);
				$kod = parse($_POST['password']);
				$kod_sql = mysql_query("SELECT * FROM gracze WHERE nazwa = '$user' AND kod = '$kod'");
                $kod_ilosc = mysql_num_rows($kod_sql);
                if ($kod_ilosc == 0) {
				$return = "Podano zle dane";
				} elseif ($kod_sql['aktywowano'] == 1) {
				$return = "A conta já está ativada!";
				} elseif ($kod_ilosc == 1 && $kod_sql['aktywowano'] == 0) {
				$update = mysql_query("UPDATE gracze SET aktywowano = 1 WHERE kod = '".$_POST['kod']."'");

        
    }
}	
	
if ($_GET['akcja']) {
$sprawdz = true;
}
if ($_GET['aktywowano'] && $_GET['kod']) {
$aktywowano = true;
$user = $_GET['aktywowano'];
$kod = $_GET['kod'];
$update = mysql_query("UPDATE gracze SET aktywowano = 1 WHERE kod = '$kod' && nazwa = '$user'");
}
?>
<?php if (!$sprawdz && !$aktywowano) { ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

	<head>
		<title>Plemiona - gra online</title>		
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<meta name="description" content="Tribos é um jogo de navegador online. Cada jogador tem uma pequena aldeia para levar ao poder e à glória." />
		<meta name="keywords" content="Gra online, Gry online, Gra przegl�darkowa, gry przegl�darkowe, gry, wiki, gry pl, statystyki, Multiplayer, darmowa, darmowy, darmowe, strategia, �redniowiecze, forum" />
		<link rel="stylesheet" type="text/css" href="index.css" />

		<script type="text/javascript" src="/js/index.js"></script>
        <link rel="shortcut icon" href="/graphic/favicon.ico" type="image/x-icon" />
						
		<script type="text/javascript">
		//<![CDATA[
			var mobile = false;
		//]]>
		</script>
	</head>

	<body>
	<style type="text/css">
<!--
	.pb-outer div,.pb-outer span,.pb-outer applet,.pb-outer object,.pb-outer iframe,.pb-outer h1,.pb-outer h2,.pb-outer h3,.pb-outer h4,.pb-outer h5,.pb-outer h6,.pb-outer p,.pb-outer blockquote,.pb-outer pre,.pb-outer a,.pb-outer abbr,.pb-outer acronym,.pb-outer address,.pb-outer big,.pb-outer cite,.pb-outer code,.pb-outer del,.pb-outer dfn,.pb-outer em,.pb-outer img,.pb-outer ins,.pb-outer kbd,.pb-outer q,.pb-outer s,.pb-outer samp,.pb-outer small,.pb-outer strike,.pb-outer strong,.pb-outer sub,.pb-outer sup,.pb-outer tt,.pb-outer var,.pb-outer b,.pb-outer u,.pb-outer i,.pb-outer center,.pb-outer dl,.pb-outer dt,.pb-outer dd,.pb-outer ol,.pb-outer ul,.pb-outer li,.pb-outer fieldset,.pb-outer form,.pb-outer label,.pb-outer legend,.pb-outer table,.pb-outer caption,.pb-outer tbody,.pb-outer tfoot,.pb-outer thead,.pb-outer tr,.pb-outer th,.pb-outer td,.pb-outer article,.pb-outer aside,.pb-outer canvas,.pb-outer details,.pb-outer embed,.pb-outer figure,.pb-outer figcaption,.pb-outer footer,.pb-outer header,.pb-outer hgroup,.pb-outer menu,.pb-outer nav,.pb-outer output,.pb-outer ruby,.pb-outer section,.pb-outer summary,.pb-outer time,.pb-outer mark,.pb-outer audio,.pb-outer video{margin:0;padding:0;border:0;font-size:100%;font:inherit;vertical-align:baseline}.pb-outer ol,.pb-outer ul{list-style:none}.pb-outer blockquote,.pb-outer q{quotes:none}.pb-outer blockquote:before,.pb-outer blockquote:after,.pb-outer q:before,.pb-outer q:after{content:'';content:none}.pb-outer table{border-collapse:collapse;border-spacing:0}#pbar{position:static;margin-left:auto;margin-right:auto;text-align:center;top:0;width:100%;z-index:999;clear:both;left:0}.pb-outer{background:#cdb585 url(http://cdn.portal-bar.innogames.de/images/staemme-bg-header-top.png) 0 0 repeat-x;color:#804000;height:25px;position:relative;text-align:center;top:0;left:0;z-index:3000;font:12px/1.4em Helvetica,Tahoma,Arial,Sans-serif !important;min-width:984px}.pb-outer p{font:1em/1.4em Helvetica,Tahoma,Arial,Sans-serif}.pb-outer h3{font:bold 1.05em/1em Helvetica,Tahoma,Arial,Sans-serif}.pb-outer h4{font:bold 1em/1.4em Helvetica,Tahoma,Arial,Sans-serif}.pb-outer .pb-inner a:link{color:#804000;text-decoration:none}.pb-outer .pb-inner a:visited{color:#ddd;text-decoration:none}.pb-outer .pb-inner a:hover{color:#fff;text-decoration:none}.pb-outer .pb-inner{margin:0 auto;height:25px;width:1050px;position:relative;padding:2px 0 0}.pb-outer .pb-inner .pb-cntnt .pb-home a{background:url(http://cdn.portal-bar.innogames.de/images/staemme-logo.png) no-repeat 0 0;width:180px;height:20px;display:block;float:left;margin:3px 0 0 20px}.pb-outer .pb-inner .pb-home a span{display:none}.pb-outer .pb-inner .pb-cntnt{float:left;width:100%}.pb-outer .pb-inner .pb-cntnt .pb-moregames-sec .pb-moregames-overview-lists,.pb-outer .pb-inner .pb-cntnt .pb-mygames-sec .pb-mygames-and-moregames-overview-lists{color:#fff}.pb-outer .clear{display:table;width:100%}.pb-tab{background:url(http://cdn.portal-bar.innogames.de/images/staemme-bg-header-bottom.png) 0 0 repeat-x transparent;height:4px;top:0;position:relative}.pb-outer .pb-inner .pb-lang-sec,.pb-outer .pb-inner .pb-cntnt .pb-moregames-sec,.pb-outer .pb-inner .pb-cntnt .pb-mygames-sec,.pb-outer .pb-inner .pb-cntnt .pb-sec-news,.pb-outer .pb-inner .pb-sec-error{position:relative;text-align:left;zoom:1}.pb-outer .pb-inner .pb-lang-sec .pb-lang-select{float:left;margin:1px 0 0 20px;background:url(http://cdn.portal-bar.innogames.de/images/staemme-sprite_01.png) no-repeat -319px -855px;width:51px;height:22px;position:relative;cursor:pointer}.pb-outer .pb-inner .pb-lang-sec .pb-lang-select .pb-lang-button{background:url(http://cdn.portal-bar.innogames.de/images/staemme-sprite_01.png) -320px -654px;width:15px;height:16px;position:relative;left:32px;top:-9px;cursor:pointer}.pb-outer .pb-inner .pb-lang-sec .pb-lang-select:hover .pb-lang-button{background-position:-320px -588px}.pb-outer .pb-inner .pb-lang-sec .pb-lang-select:active .pb-lang-button{background-position:-571px -588px}.pb-outer .pb-inner .pb-lang-sec .pb-lang-select .pb-lang-content{width:18px;height:12px;position:relative;top:5px;left:6px;background:url(http://cdn.portal-bar.innogames.de/images/staemme-sprite_01.png) no-repeat 0 -657px}.pb-outer.pb-outer-ae .pb-inner .pb-lang-sec .pb-lang-select{direction:ltr}.pb-outer .pb-inner .pb-lang-sec .pb-lang-sec-options ul{height:auto;overflow-x:hidden;overflow-y:auto}.pb-outer .pb-inner .pb-lang-sec .pb-lang-sec-options{display:none;z-index:1;position:absolute;clear:both;left:220px;top:22px;width:auto;background:#d0b88b url(http://cdn.portal-bar.innogames.de/images/staemme-noise.jpg) repeat 0 0;border-width:1px;border-style:solid;border-color:#D6C7A9 #9F875A #A99367;box-shadow:0 3px 10px 2px rgba(0, 0, 0, 0.5);-moz-box-shadow:0 3px 10px 2px rgba(0, 0, 0, 0.5);-webkit-box-shadow:0 3px 10px 2px rgba(0, 0, 0, 0.5);-webkit-border-radius:3px;-moz-border-radius:3px;border-radius:3px}.pb-outer .pb-inner .pb-lang-sec .pb-lang-sec-options ul li{width:100%;height:22px;padding:2px 0;background:url(http://cdn.portal-bar.innogames.de/images/staemme-separator-lang.gif) no-repeat center top}.pb-outer .pb-inner .pb-lang-sec .pb-lang-sec-options ul li:first-child{background:none;padding:2px 0}.pb-outer .pb-inner .pb-lang-sec .pb-lang-sec-options ul li:first-child:hover{box-shadow:-moz-box-shadow: inset 0 0 1px 0 rgba(0,0,0,0.2);-webkit-box-shadow:inset 0 0 1px 0 rgba(0,0,0,0.2);box-shadow:inset 0 0 1px 0 rgba(0,0,0,0.2);-o-box-shadow:inset 0 0 1px 0 rgba(0,0,0,0.2);-ms-box-shadow:inset 0 0 1px 0 rgba(0,0,0,0.2)}.pb-outer .pb-inner .pb-lang-sec .pb-lang-sec-options ul li:hover{background-color:#c8b082;-moz-box-shadow:0 -1px 3px 0 rgba(0, 0, 0, 0.1) inset;-webkit-box-shadow:0 -1px 3px 0 rgba(0, 0, 0, 0.1) inset;box-shadow:0 -1px 3px 0 rgba(0, 0, 0, 0.1) inset;-o-box-shadow:0 -1px 3px 0 rgba(0, 0, 0, 0.1) inset;-ms-box-shadow:0 -1px 3px 0 rgba(0, 0, 0, 0.1) inset}.pb-outer .pb-inner .pb-lang-sec .pb-lang-sec-options ul li a{color:#804000;padding:4px 6px 0 4px;display:block}.pb-outer .pb-inner .pb-lang-sec .pb-lang-sec-options ul li a span{padding-left:25px}.pb-outer .pb-inner .pb-moregames-sec .pb-moregames-select{float:left;margin:1px 0 0 20px;background:url(http://cdn.portal-bar.innogames.de/images/staemme-bg-select-left.png) no-repeat 0 0;width:auto;height:22px;position:relative;cursor:pointer}.pb-outer .pb-inner .pb-moregames-sec .pb-moregames-select .pb-moregames-button{background:url(http://cdn.portal-bar.innogames.de/images/staemme-sprite_01.png) -320px -654px;width:15px;height:16px;position:absolute;right:3px;top:3px}.pb-outer .pb-inner .pb-moregames-sec .pb-moregames-select:hover .pb-moregames-button{background-position:-320px -588px}.pb-outer .pb-inner .pb-moregames-sec .pb-moregames-select:active .pb-moregames-button{background-position:-571px -588px}.pb-outer .pb-inner .pb-moregames-sec .pb-moregames-select .pb-moregames-content{width:auto;height:22px;position:relative;top:0;right:0;margin-left:11px;background:url(http://cdn.portal-bar.innogames.de/images/staemme-bg-select-right.png) no-repeat 100% 0}.pb-outer .pb-inner .pb-moregames-sec .pb-moregames-select .pb-moregames-content span{position:relative;display:inline-block;top:4px;left:-4px;font-size:.95em;padding-right:20px;text-shadow:0 -1px 1px #fff}.pb-outer .pb-inner .pb-moregames-sec .pb-moregames-overview-lists{display:none;clear:both;position:absolute;left:290px;top:22px;width:580px;border-width:1px;border-style:solid;border-color:#A48F64 #9F875A #9F875A;background:#d0b88b url(http://cdn.portal-bar.innogames.de/images/staemme-noise.jpg) repeat 0 0;box-shadow:0 3px 10px 2px rgba(0, 0, 0, 0.5), inset 0 3px 10px rgba(0, 0, 0, 0.5);-moz-box-shadow:0 3px 10px 2px rgba(0, 0, 0, 0.5), inset 0 3px 10px rgba(0, 0, 0, 0.5);-webkit-box-shadow:0 3px 10px 2px rgba(0, 0, 0, 0.5), inset 0 3px 10px rgba(0, 0, 0, 0.5);-webkit-border-radius:3px;-moz-border-radius:3px;border-radius:3px}.pb-outer .pb-inner .pb-moregames-sec .pb-moregames-overview-lists h3{color:#804000;background:url(http://cdn.portal-bar.innogames.de/images/staemme-bg-sec.png) repeat-x 0 0;height:21px;border-right:1px solid #a99367;border-left:1px solid #a99367;padding:7px 10px 0;text-shadow:1px 0 1px #EEDEC2}.pb-outer .pb-inner .pb-moregames-sec .pb-moregames-overview-lists .pb-moregames-overview{padding:0 0 0 10px;width:580px}.pb-outer.pb-outer-ae .pb-inner .pb-moregames-sec .pb-moregames-overview-lists .pb-moregames-overview{padding:0 0 0 0;margin:0 0 0 -10px}.pb-outer .pb-inner .pb-moregames-sec .pb-moregames-overview-lists .pb-moregames-overview li{float:left;margin:10px 10px 10px 0;position:relative;overflow:hidden;height:106px}.pb-outer .pb-inner .pb-moregames-sec .pb-moregames-overview-lists .pb-moregames-overview li > a{color:#fff}.pb-outer.pb-outer-ae .pb-inner .pb-moregames-sec .pb-moregames-overview-lists .pb-moregames-overview li{margin:10px 0 10px 10px}.pb-outer .pb-inner .pb-moregames-sec .pb-moregames-overview-lists ul li .pb-caption{position:absolute;background:#000;opacity:.8;filter:progid:DXImageTransform.Microsoft.Alpha(Opacity=80);-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=80)";width:178px;height:106px;left:0;top:76px;border-right:1px solid #714A23;border-left:1px solid #714A23;border-top:1px solid #3c3c3c;cursor:pointer}.pb-outer .pb-inner .pb-moregames-sec .pb-moregames-overview-lists ul li .feature{width:556px}.pb-outer .pb-inner .pb-moregames-sec .pb-moregames-overview-lists ul li .pb-caption h4{color:#fff;margin:10px 0 10px 10px;text-shadow:0 1px 1px #000}.pb-outer .pb-inner .pb-moregames-sec .pb-moregames-overview-lists ul li .pb-caption p{margin-left:10px;font-size:10px;text-shadow:0 0 1px #000;font-weight:bold}.pb-outer .pb-inner .pb-moregames-sec .pb-moregames-overview-lists ul li div.pb-ribbon{background:url(http://cdn.portal-bar.innogames.de/images/staemme-moregames-teaser-ribbon.png) no-repeat 0 0;position:absolute;top:-2px;right:-1px;width:38px;height:37px;z-index:1}.pb-outer .pb-inner .pb-moregames-sec .pb-moregames-overview-lists ul li div.pb-ribbon-soon{background:url(http://cdn.portal-bar.innogames.de/images/staemme-moregames-teaser-soon-ribbon.png) no-repeat 0 0;position:absolute;top:-1px;right:-1px;width:76px;height:54px;z-index:1}.pb-outer .pb-inner .pb-sec-news .pb-news{display:none;float:left;margin:1px 0 0 20px;background:url(http://cdn.portal-bar.innogames.de/images/staemme-sprite_01.png) no-repeat 0 -429px;width:302px;height:22px;position:relative}.pb-outer .pb-inner .pb-sec-news .pb-news .pb-news-content{width:288px;height:16px;position:relative;top:3px;left:6px;overflow:hidden}.pb-outer .pb-inner .pb-sec-news .pb-news .pb-news-content ul li a{color:#333;margin-right:5px}.pb-outer .pb-inner .pb-sec-error .pb-sec-error-button{float:left;margin:0 0 0 11px;background:url(http://cdn.portal-bar.innogames.de/images/staemme-error-message-lft.png) no-repeat 0 0;height:19px;position:relative}.pb-outer .pb-inner .pb-sec-error .pb-sec-error-button div{float:left;background:url(http://cdn.portal-bar.innogames.de/images/staemme-error-message-mid.png) repeat-x 0 0;margin:0 0 0 10px;font-size:.9em;padding-top:3px}.pb-outer .pb-inner .pb-sec-error .pb-sec-error-button div span.pb-sec-error-bullet{display:block;padding:0 5px 0 0;background:url(http://cdn.portal-bar.innogames.de/images/staemme-sprite_01.png) no-repeat -320px -988px;width:13px;height:16px;position:relative;top:-3px}.pb-outer .pb-inner .pb-sec-error .pb-sec-error-button span{float:left;display:block;height:19px;background:url(http://cdn.portal-bar.innogames.de/images/staemme-error-message-rt.png) no-repeat top right;padding:0 10px 0 0}.pb-outer .pb-inner .pb-flag{background:url('http://cdn.portal-bar.innogames.de/images/staemme-sprite_01.png') no-repeat top left;height:12px}.pb-outer .pb-inner #pb-flag-de{background-position:0 -1105px}.pb-outer .pb-inner #pb-flag-en{background-position:0 -721px}.pb-outer .pb-inner #pb-flag-fr{background-position:0 -1361px}.pb-outer .pb-inner #pb-flag-es{background-position:0 -1393px}.pb-outer .pb-inner #pb-flag-it{background-position:0 -1297px}.pb-outer .pb-inner #pb-flag-gr{background-position:0 -753px}.pb-outer .pb-inner #pb-flag-nl{background-position:0 -689px}.pb-outer .pb-inner #pb-flag-ro{background-position:0 -977px}.pb-outer .pb-inner #pb-flag-se{background-position:0 -1041px}.pb-outer .pb-inner #pb-flag-cz{background-position:0 -785px}.pb-outer .pb-inner #pb-flag-pl{background-position:0 -1201px}.pb-outer .pb-inner #pb-flag-hu{background-position:0 -1137px}.pb-outer .pb-inner #pb-flag-sk{background-position:0 -817px}.pb-outer .pb-inner #pb-flag-dk{background-position:0 -1233px}.pb-outer .pb-inner #pb-flag-no{background-position:0 -1169px}.pb-outer .pb-inner #pb-flag-pt{background-position:0 -849px}.pb-outer .pb-inner #pb-flag-jp{background-position:0 -1713px}.pb-outer .pb-inner #pb-flag-ru{background-position:0 -913px}.pb-outer .pb-inner #pb-flag-br{background-position:0 -1009px}.pb-outer .pb-inner #pb-flag-tr{background-position:0 -1329px}.pb-outer .pb-inner #pb-flag-ch{background-position:0 -1073px}.pb-outer .pb-inner #pb-flag-kr{background-position:0 -881px}.pb-outer .pb-inner #pb-flag-ae{background-position:0 -1457px}.pb-outer .pb-inner #pb-flag-bg{background-position:0 -657px}.pb-outer .pb-inner #pb-flag-th{background-position:0 -1745px}.pb-outer .pb-inner #pb-flag-ba{background-position:0 -1265px}.pb-outer .pb-inner #pb-flag-fi{background-position:0 -1425px}.pb-outer .pb-inner #pb-flag-hr{background-position:0 -1649px}.pb-outer .pb-inner #pb-flag-il{background-position:0 -1585px}.pb-outer .pb-inner #pb-flag-lt{background-position:0 -1553px}.pb-outer .pb-inner #pb-flag-si{background-position:0 -1521px}.pb-outer .pb-inner #pb-flag-us{background-position:0 -1777px}.pb-outer .pb-inner #pb-flag-id{background-position:0 -1617px}.pb-outer .pb-inner #pb-flag-uk{background-position:0 -1489px}.pb-outer .pb-inner #pb-flag-ts{background-position:0 -1681px}.pb-outer .pb-inner #pb-flag-zz,.pb-outer .pb-inner #pb-flag-xx{background-position:0 -1809px}.pb-outer .pb-inner #pb-flag-ar{background-position:0 -1874px}.pb-outer .pb-inner #pb-flag-mx{background-position:0 -1841px}#pb-ticker-wrapper.has-js{display:block}#pb-ticker{width:308px;height:20px;display:block;position:relative;overflow:hidden;left:-20px}#pb-ticker-title{padding-top:9px;color:#990000;font-weight:bold;text-transform:uppercase;display:none}#pb-ticker-content{margin:0;position:absolute;color:#333;overflow:hidden;white-space:nowrap}#pb-ticker-content a{text-decoration:none;color:#fff;font-size:.95em;text-shadow:0 1px 1px #000}#pb-ticker-content a:hover{text-decoration:underline;color:#f1f1f1}#pb-ticker-content a span{text-shadow:none}#pb-ticker-content a em{font-style:italic}#pb-ticker-content a strong{font-weight:bold}#pb-ticker-swipe{padding-top:9px;position:absolute;top:0;display:none !important;width:800px;height:23px}#pb-ticker-swipe span{margin-left:1px;border-bottom:1px solid #1F527B;height:12px;width:7px;display:block}.js-hidden{display:none}#no-js-news{padding:10px 0 0 45px;color:#F8F0DB}.left #pb-ticker-swipe{left:80px}.left #pb-ticker-controls,.left #pb-ticker-content,.left #pb-ticker-title,.left #pb-ticker{float:left}.left #pb-ticker-controls{padding-left:6px}.right #pb-ticker-swipe{right:80px}.right #pb-ticker-controls,.right #pb-ticker-content,.right #pb-ticker-title,.right #pb-ticker{float:right}.right #pb-ticker-controls{padding-right:6px}*+html .pb-outer .pb-inner .pb-cntnt,*+html .pb-outer .pb-inner,*+html .pb-outer .pb-inner .pb-moregames-sec .pb-moregames-select .pb-moregames-content span,*+html .pb-outer .pb-inner .pb-moregames-sec,*+html .pb-outer .pb-inner .pb-lang-sec,*+html .pb-outer .pb-inner .pb-cntnt .pb-moregames-sec,*+html .pb-outer .pb-inner .pb-cntnt .pb-mygames-sec,*+html .pb-outer .pb-inner .pb-cntnt .pb-sec-news,*+html .pb-outer .pb-inner .pb-connect-button,*+html .pb-outer .pb-inner .pb-sec-error,*+html .pb-outer .pb-inner .pb-cntnt{zoom:1}*+html .pb-outer .pb-inner .pb-moregames-sec,*+html .pb-outer .pb-inner .pb-lang-sec{float:left;position:static !important}*+html .pb-outer .pb-inner{clear:both}*+html .pb-outer .pb-inner .pb-sec-news .pb-news .pb-news-content span{top:0}*+html .pb-outer .pb-inner .pb-moregames-sec .pb-moregames-overview-lists .pb-moregames-overview{margin-bottom:10px}*+html .pb-outer .pb-inner .pb-lang-sec .pb-lang-sec-options ul li{display:block;min-width:140px}-->
</style>
<script type="text/javascript">
	
try{$j=jQuery;Function.prototype.bind=function(obj){var that=this;return function(){return that.apply(obj,arguments);};};var Portal={};Portal.Bar=function(){var _instance=this;var _iRefreshCrossSellingPauseOnItems=9000;var _sExternalRef=null;var _eContainer=$j('#pbar');var _aIntervalIds={};var _aObservers={};var _bInitialized=false;var _bTickerInitialized=false;var _bVisible=true;this.EVNT_PB_SHOW='pbar.show';this.EVNT_PB_HIDE='pbar.hide';var _init=function(){_parseExternalRef();_build();};var _build=function(){_eContainer.find("#pb-tab-slide-open").hide();_eContainer.find("#pb-tab-slide-close").show();_eContainer.find("#pb-tab-slide-open").click(function(){$j("div.pb-outer").slideToggle("fast");_eraseCookie('pBarVisibility');_instance.trigger(_instance.EVNT_PB_SHOW);_bVisible=true;});_eContainer.find("#pb-tab-slide-close").click(function(){$j("div.pb-outer").slideUp("fast");_createCookie('pBarVisibility','hide',14);_instance.trigger(_instance.EVNT_PB_HIDE);_bVisible=false;});_eContainer.find(".pb-tab a").click(function(){$j(".pb-tab a").toggle();return false;});var sPBarVisibility=_readCookie('pBarVisibility');if(sPBarVisibility&&sPBarVisibility=='hide'){_eContainer.find('.pb-outer').hide();_eContainer.find('#pb-tab-slide-open').show();_eContainer.find('#pb-tab-slide-close').hide();_bVisible=false;}else{_eContainer.find('.pb-outer').show();_eContainer.find('#pb-tab-slide-open').hide();_eContainer.find('#pb-tab-slide-close').show();_bVisible=true;}
_eContainer.find('.pb-outer').show();_bVisible=true;_eContainer.find('.pb-moregames-overview li').hover(function(){$j(".pb-caption",this).stop().animate({top:'0px'},{queue:false,duration:160});},function(){$j(".pb-caption",this).stop().animate({top:'76px'},{queue:false,duration:160});});_eContainer.find('.pb-cntnt .pb-moregames-sec .pb-moregames-overview-lists').toggle();_eContainer.find('.pb-cntnt .pb-moregames-sec .pb-moregames-overview-lists').hover(function(){$j(this).show(50);},function(){$j(this).hide(50);});_eContainer.find(".pb-cntnt .pb-lang-sec .pb-lang-sec-options").toggle();_eContainer.find(".pb-cntnt .pb-lang-sec .pb-lang-sec-options").hover(function(){$j(this).show(50);},function(){$j(this).hide(50);});_eContainer.find('.pb-cntnt .pb-moregames-sec .pb-moregames-overview-lists').hide();_eContainer.find('.pb-cntnt .pb-lang-sec .pb-lang-sec-options').hide();_eContainer.find('.pb-cntnt .pb-lang-sec .pb-lang-select').bind('click',function(){_eContainer.find(".pb-cntnt .pb-lang-sec .pb-lang-sec-options").toggle();_eContainer.find(".pb-cntnt .pb-lang-sec .pb-lang-sec-options").hover(function(){$j(this).show(50);},function(){$j(this).hide(50);});_eContainer.find('.pb-cntnt .pb-moregames-sec .pb-moregames-overview-lists').hide();});_eContainer.find('.pb-cntnt .pb-moregames-sec .pb-moregames-select').bind('click',function(){_eContainer.find('.pb-cntnt .pb-moregames-sec .pb-moregames-overview-lists').toggle();_eContainer.find('.pb-cntnt .pb-moregames-sec .pb-moregames-overview-lists').hover(function(){$j(this).show(50);},function(){$j(this).hide(50);});_eContainer.find('.pb-cntnt .pb-lang-sec .pb-lang-sec-options').hide();});if(_sExternalRef!=null){var eIgLink=_eContainer.find('.pb-home a');var aFlags=_eContainer.find('.pb-lang-sec-options ul li a');var aGames=_eContainer.find('ul.pb-moregames-overview li a');var aCpFeeds=_eContainer.find('ul#pb-ticker-news li a');eIgLink.each(function(){_replaceRef($(this),_sExternalRef);});aFlags.each(function(){_replaceRef($(this),_sExternalRef);});aGames.each(function(){_replaceRef($(this),_sExternalRef);});aCpFeeds.each(function(){_replaceRef($(this),_sExternalRef);});}
var eTicker=_eContainer.find('.pb-sec-news .pb-news .pb-news-content ul#pb-ticker-news');if(eTicker.length>0){_eContainer.find('.pb-sec-news .pb-news').show();if(!_bTickerInitialized){eTicker.ticker({debugMode:true,titleText:'',displayType:'fade',pauseOnItems:_iRefreshCrossSellingPauseOnItems});_bTickerInitialized=true;}else{eTicker.unbind();eTicker.ticker({debugMode:true,titleText:'',displayType:'fade',pauseOnItems:_iRefreshCrossSellingPauseOnItems});}}};var _replaceRef=function(eAnker,sExternalRef){var sUrl=eAnker.attr('href');var sUrl=sUrl.replace(/ref=[\w_]+/,'ref='+sExternalRef);eAnker.attr('href',sUrl);}
var _parseExternalRef=function(){sQuery=document.location.search.substr(1,document.location.search.length);if(sQuery!=''){aKeysAndVals=sQuery.split('&');for(i=0;i<aKeysAndVals.length;++i){aKeyValTuple=aKeysAndVals[i].split('=');if(aKeyValTuple.length>1){if(aKeyValTuple[0]=='ref'){_sExternalRef=aKeyValTuple[1];break;}}}}};var _createCookie=function(sName,sValue,iDays){var sExpires="";if(iDays){var dDate=new Date();dDate.setTime(dDate.getTime()+(iDays*24*60*60*1000));sExpires="; expires="+dDate.toGMTString();}
document.cookie=sName+"="+sValue+sExpires+"; path=/";};var _readCookie=function(sName){var sNameEQ=sName+"=";var aPieces=document.cookie.split(';');for(var i=0;i<aPieces.length;i++){var sValue=aPieces[i];while(sValue.charAt(0)==' ')
sValue=sValue.substring(1,sValue.length);if(sValue.indexOf(sNameEQ)==0)
return sValue.substring(sNameEQ.length,sValue.length);}
return null;};var _eraseCookie=function(sName){_createCookie(sName,"",-1);};this.observe=function(sEventName,fCallback){if(!_aObservers[sEventName]){_aObservers[sEventName]=new Array();}
_aObservers[sEventName].push(fCallback);return fCallback;};this.unobserve=function(sEventName,fCallback){if(!_aObservers[sEventName]){return false;}
if(null==fCallback){_aObservers[sEventName]=[];}
var iIdx=$j.inArray(fCallback,_aObservers[sEventName]);if(iIdx<0){return false;}
_aObservers[sEventName].splice(iIdx,1);return true;};this.trigger=function(){var a=$j.makeArray(arguments);var sName=a.shift();if(!_aObservers[sName]){return;}
for(var i in _aObservers[sName]){_aObservers[sName][i].apply(undefined,a);}};this.isVisible=function(){return _bVisible;};this.run=function(){_init();};};(function($j){$j.fn.ticker=function(options){var opts=$j.extend({},$j.fn.ticker.defaults,options);var newsID='#'+$j(this).attr('id');var tagType=$j(this).get(0).tagName;return this.each(function(){var settings={position:0,time:0,distance:0,newsArr:{},play:true,paused:false,contentLoaded:false,dom:{contentID:'#pb-ticker-content',titleID:'#pb-ticker-title',titleElem:'#pb-ticker-title SPAN',tickerID:'#pb-ticker',wrapperID:'#pb-ticker-wrapper',revealID:'#pb-ticker-swipe',revealElem:'#pb-ticker-swipe SPAN',controlsID:'#pb-ticker-controls',prevID:'#pb-prev',nextID:'#pb-next',playPauseID:'#pb-play-pause'}};if(tagType!='UL'&&tagType!='OL'&&opts.htmlFeed===true){debugError('Cannot use <'+tagType.toLowerCase()+'> type of element for this plugin - must of type <ul> or <ol>');return false;}
opts.direction=='rtl'?opts.direction='right':opts.direction='left';initialisePage();function countSize(obj){var size=0,key;for(key in obj){if(obj.hasOwnProperty(key))size++;}
return size;};function debugError(obj){if(opts.debugMode){if(window.console&&window.console.log){window.console.log(obj);}
else{alert(obj);}}}
function initialisePage(){$j(settings.dom.wrapperID).append('<div id="'+settings.dom.tickerID.replace('#','')+'"><div id="'+settings.dom.titleID.replace('#','')+'"><span><!-- --></span></div><p id="'+settings.dom.contentID.replace('#','')+'"></p><div id="'+settings.dom.revealID.replace('#','')+'"><span><!-- --></span></div></div>');$j(settings.dom.wrapperID).removeClass('no-js').addClass('has-js '+opts.direction);$j(settings.dom.tickerElem+','+settings.dom.contentID).hide();if(opts.controls){$j(settings.dom.controlsID).live('click mouseover mousedown mouseout mouseup',function(e){var button=e.target.id;if(e.type=='click'){switch(button){case settings.dom.prevID.replace('#',''):settings.paused=true;$j(settings.dom.playPauseID).addClass('paused');manualChangeContent(button);break;case settings.dom.nextID.replace('#',''):settings.paused=true;$j(settings.dom.playPauseID).addClass('paused');manualChangeContent(button);break;case settings.dom.playPauseID.replace('#',''):if(settings.play==true){settings.paused=true;$j(settings.dom.playPauseID).addClass('paused');pauseTicker();}
else{settings.paused=false;$j(settings.dom.playPauseID).removeClass('paused');restartTicker();}
break;}}
else if(e.type=='mouseover'&&$j('#'+button).hasClass('controls')){$j('#'+button).addClass('over');}
else if(e.type=='mousedown'&&$j('#'+button).hasClass('controls')){$j('#'+button).addClass('down');}
else if(e.type=='mouseup'&&$j('#'+button).hasClass('controls')){$j('#'+button).removeClass('down');}
else if(e.type=='mouseout'&&$j('#'+button).hasClass('controls')){$j('#'+button).removeClass('over');}});$j(settings.dom.wrapperID).append('<ul id="'+settings.dom.controlsID.replace('#','')+'"><li id="'+settings.dom.playPauseID.replace('#','')+'" class="controls"></li><li id="'+settings.dom.prevID.replace('#','')+'" class="controls"></li><li id="'+settings.dom.nextID.replace('#','')+'" class="controls"></li></ul>');}
if(opts.displayType!='fade'){$j(settings.dom.contentID).mouseover(function(){if(settings.paused==false){pauseTicker();}}).mouseout(function(){if(settings.paused==false){restartTicker();}});}
processContent();}
function processContent(){if(settings.contentLoaded==false){if(opts.ajaxFeed){if(opts.feedType=='xml'){$j.ajax({url:opts.feedUrl,cache:false,dataType:opts.feedType,async:true,success:function(data){count=0;for(var a=0;a<data.childNodes.length;a++){if(data.childNodes[a].nodeName=='rss'){xmlContent=data.childNodes[a];}}
for(var i=0;i<xmlContent.childNodes.length;i++){if(xmlContent.childNodes[i].nodeName=='channel'){xmlChannel=xmlContent.childNodes[i];}}
for(var x=0;x<xmlChannel.childNodes.length;x++){if(xmlChannel.childNodes[x].nodeName=='item'){xmlItems=xmlChannel.childNodes[x];var title,link=false;for(var y=0;y<xmlItems.childNodes.length;y++){if(xmlItems.childNodes[y].nodeName=='title'){title=xmlItems.childNodes[y].lastChild.nodeValue;}
else if(xmlItems.childNodes[y].nodeName=='link'){link=xmlItems.childNodes[y].lastChild.nodeValue;}
if((title!==false&&title!='')&&link!==false){settings.newsArr['item-'+count]={type:opts.titleText,content:'<a href="'+link+'">'+title+'</a>'};count++;title=false;link=false;}}}}
if(countSize(settings.newsArr<1)){debugError('Couldn\'t find any content from the XML feed for the ticker to use!');return false;}
setupContentAndTriggerDisplay();settings.contentLoaded=true;}});}
else{debugError('Code Me!');}}
else if(opts.htmlFeed){if($j(newsID+' LI').length>0){$j(newsID+' LI').each(function(i){settings.newsArr['item-'+i]={type:opts.titleText,content:$j(this).html()};});setupContentAndTriggerDisplay();}
else{debugError('Couldn\'t find HTML any content for the ticker to use!');return false;}}
else{debugError('The ticker is set to not use any types of content! Check the settings for the ticker.');return false;}}}
function setupContentAndTriggerDisplay(){settings.contentLoaded=true;$j(settings.dom.titleElem).html(settings.newsArr['item-'+settings.position].type);$j(settings.dom.contentID).html(settings.newsArr['item-'+settings.position].content);if(settings.position==(countSize(settings.newsArr)-1)){settings.position=0;}
else{settings.position++;}
distance=$j(settings.dom.contentID).width();time=distance/opts.speed;revealContent();}
function revealContent(){$j(settings.dom.contentID).css('opacity','1');if(settings.play){var offset=$j(settings.dom.titleElem).width()+20;$j(settings.dom.revealID).css(opts.direction,offset+'px');if(opts.displayType=='fade'){$j(settings.dom.revealID).hide(0,function(){$j(settings.dom.contentID).css(opts.direction,offset+'px').fadeIn(opts.fadeInSpeed,postReveal);});}
else if(opts.displayType=='scroll'){}
else{$j(settings.dom.revealElem).show(0,function(){$j(settings.dom.contentID).css(opts.direction,offset+'px').show();animationAction=opts.direction=='right'?{marginRight:distance+'px'}:{marginLeft:distance+'px'};$j(settings.dom.revealID).css('margin-'+opts.direction,'0px').delay(20).animate(animationAction,time,'linear',postReveal);});}}
else{return false;}};function postReveal(){if(settings.play){$j(settings.dom.contentID).delay(opts.pauseOnItems).fadeOut(opts.fadeOutSpeed);if(opts.displayType=='fade'){$j(settings.dom.contentID).fadeOut(opts.fadeOutSpeed,function(){$j(settings.dom.wrapperID).find(settings.dom.revealElem+','+settings.dom.contentID).hide().end().find(settings.dom.tickerID+','+settings.dom.revealID).show().end().find(settings.dom.tickerID+','+settings.dom.revealID).removeAttr('style');setupContentAndTriggerDisplay();});}
else{$j(settings.dom.revealID).hide(0,function(){$j(settings.dom.contentID).fadeOut(opts.fadeOutSpeed,function(){$j(settings.dom.wrapperID).find(settings.dom.revealElem+','+settings.dom.contentID).hide().end().find(settings.dom.tickerID+','+settings.dom.revealID).show().end().find(settings.dom.tickerID+','+settings.dom.revealID).removeAttr('style');setupContentAndTriggerDisplay();});});}}
else{$j(settings.dom.revealElem).hide();}}
function pauseTicker(){settings.play=false;$j(settings.dom.tickerID+','+settings.dom.revealID+','+settings.dom.titleID+','+settings.dom.titleElem+','+settings.dom.revealElem+','+settings.dom.contentID).stop(true,true);$j(settings.dom.revealID+','+settings.dom.revealElem).hide();$j(settings.dom.wrapperID).find(settings.dom.titleID+','+settings.dom.titleElem).show().end().find(settings.dom.contentID).show();}
function restartTicker(){settings.play=true;settings.paused=false;postReveal();}
function manualChangeContent(direction){pauseTicker();switch(direction){case'prev':if(settings.position==0){settings.position=countSize(settings.newsArr)-2;}
else if(settings.position==1){settings.position=countSize(settings.newsArr)-1;}
else{settings.position=settings.position-2;}
$j(settings.dom.titleElem).html(settings.newsArr['item-'+settings.position].type);$j(settings.dom.contentID).html(settings.newsArr['item-'+settings.position].content);break;case'next':$j(settings.dom.titleElem).html(settings.newsArr['item-'+settings.position].type);$j(settings.dom.contentID).html(settings.newsArr['item-'+settings.position].content);break;}
if(settings.position==(countSize(settings.newsArr)-1)){settings.position=0;}
else{settings.position++;}}});};$j.fn.ticker.defaults={speed:0.10,ajaxFeed:false,feedUrl:'',feedType:'xml',displayType:'reveal',htmlFeed:true,debugMode:true,controls:false,titleText:'',direction:'ltr',pauseOnItems:3000,fadeInSpeed:600,fadeOutSpeed:300};})(jQuery);}catch(e){}</script>

<script type="text/javascript">
<!--
$(function() {
    var pb = new Portal.Bar();
    pb.run();
});
// -->
</script>

<div id="pbar">
	<div class="pb-outer pb-outer-pl">
	<div class="pb-inner">
		<div class="pb-cntnt">
			<div class="pb-home">
				<!--<a href="http://www.innogames.com?ref=ds_portalbar_innogames" target="_blank" title="Przejd� do innogames.com"><span>Innogames.com</span></a>-->
			</div>
							<div class="pb-lang-sec">
					<div class="pb-lang-select">
						<div class="pb-lang-content" id="pb-flag-pl"></div>
						<div class="pb-lang-button"></div>
					</div>
					<div class="pb-lang-sec-options">
						<ul>
															
															<li><a href="http://plemiona.pl"><span id="pb-flag-pl"
																		 class="pb-flag pb-flag-pl">Tribos</span></a>
								</li>
													</ul>
					</div>
				</div>
										<div class="pb-moregames-sec">
					<div class="pb-moregames-select">
						<div class="pb-moregames-content">
							<span>Polecamy:</span>
						</div>
						<div class="pb-moregames-button"></div>
					</div>
					<div class="pb-moregames-overview-lists">
						<h3>Graj teraz</h3>
						<ul class="pb-moregames-overview clear">
																								<li id="pb_game_thumb pb_game_foe">
																				<a href="http://pl.forgeofempires.com?ref=ds_portalbar_moregames" target="_blank"><img
											src="http://cdn.portal-bar.innogames.de/images/thumbs/foe-180x106.jpg"
											title="Forge Of Empires" width="180" height="106"/></a>
										<a href="http://pl.forgeofempires.com?ref=ds_portalbar_moregames" title="Forge Of Empires" target="_blank">
											<div class="pb-caption">
												<h4>Forge Of Empires</h4>
												<p>Prowad� swoje miasto przez wieki ludzko�ci, poczynaj�c od epoki kamienia, i stw�rz wielkie imperium!</p>
											</div>
										</a>
									</li>
																																<li id="pb_game_thumb pb_game_grepo">
																				<a href="http://pl.grepolis.com?ref=ds_portalbar_moregames" target="_blank"><img
											src="http://cdn.portal-bar.innogames.de/images/thumbs/grepo-180x106.jpg"
											title="Grepolis" width="180" height="106"/></a>
										<a href="http://pl.grepolis.com?ref=ds_portalbar_moregames" title="Grepolis" target="_blank">
											<div class="pb-caption">
												<h4>Grepolis</h4>
												<p>Zbuduj majestatyczne miasta, zawrzyj pot�ne sojusze, wybierz swojego boga i podbij �wiat!</p>
											</div>
										</a>
									</li>
																																<li id="pb_game_thumb pb_game_west">
																				<a href="http://www.the-west.pl?ref=ds_portalbar_moregames" target="_blank"><img
											src="http://cdn.portal-bar.innogames.de/images/thumbs/west-180x106.jpg"
											title="The West" width="180" height="106"/></a>
										<a href="http://www.the-west.pl?ref=ds_portalbar_moregames" title="The West" target="_blank">
											<div class="pb-caption">
												<h4>The West</h4>
												<p>Odkryj dziewicze terytoria, prze�yj pasjonuj�ce przygody i pojedynkuj si� z innymi graczami. The West czeka na ciebie!</p>
											</div>
										</a>
									</li>
																																	
													</ul>
					</div>
				</div>
										<div class="pb-sec-news">
					<div class="pb-news">
						<div id="pb-ticker-wrapper" class="pb-news-content">
							<ul id="pb-ticker-news" class="js-hidden">
																	<li><a href="http://om.grepolis.com/grepo/pl/?ref=ds_portalbar_x2"
										   target="_blank"><p>Grepolis &ndash; Wznie� imperium w antycznej Grecji</p></a></li>
																	<li><a href="http://corporate.innogames.com/en/jobs/?ref=ds_portalbar_x2"
										   target="_blank"><p>Marzysz o karierze w bran�y gier? Z�&oacute;� aplikacj�!</p></a></li>
																	<li><a href="http://www.innogames.com/pl/?ref=ds_portalbar_x2"
										   target="_blank"><p>InnoGames.com - Wszystkie gry w skr&oacute;cie</p></a></li>
																	<li><a href="http://om.forgeofempires.com/foe/pl/?ref=ds_portalbar_x2"
										   target="_blank"><p>Forge of Empires &ndash; Strategia o epokach cywilizacji</p></a></li>
																	<li><a href="http://om.the-west.pl/west/pl/?ref=ds_portalbar_x2"
										   target="_blank"><p>The West &ndash; Przemierzaj prerie jako prawdziwy kowboj</p></a></li>
															</ul>
						</div>
					</div>
				</div>
					</div>
	</div>
</div>

<div class="pb-tab"></div></div>


		<div id="index_body">
			<div id="main">
						<div id="header">
				<h1>
					<a href="/index.php" style="background:url(graphic/index/bg-logo.jpg) no-repeat 100% 0;">
						<p style="position: absolute; top: -300px">Tribos</p>
					</a>
				</h1>
				<div class="navigation">
					<div class="navigation-holder">
						<div class="navigation-wrapper">
							<div id="navigation_span">
								<a href="rules.php">Regras</a>
									 - 																										<a href="team.php">Equipa</a>
									 - 																										<a href="hall_of_fame.php">Hall da Fama</a>
							</div>
						</div>
				</div>
				</div>
				<span class="paladin"><img src="graphic/index/bg-paladin-new.png" alt="" /></span>			</div>
							<div id="content">
					<div class="container-block">
						<div class="container-top"></div>
						<div class="container">
													<div class="info-block">
								<h2>Tribos</h2>
								<p>Tribos é um jogo de browser passado Idade Média. Cada jogador é senhor de uma pequena aldeia, a qual ele deve ajudar a ganhar poder e glória.</p>

																		<a class="btn-kostenlos-anmelden" href="register.php">Registro grátis!</a>
									
								<div>
																		
										   							</div>
	   							<div class="clear"></div>
							</div>
						
						<!--  tracking_snipping_landing -->
						<!-- Google Code for Staemme LP Visitors Remarketing List -->
<script type="text/javascript">
/* <![CDATA[ */
var google_conversion_id = 1026023037;
var google_conversion_language = "en";
var google_conversion_format = "3";
var google_conversion_color = "666666";
var google_conversion_label = "HMILCLPCngIQ_byf6QM";
var google_conversion_value = 0;
/* ]]> */
</script>
<script type="text/javascript" src="http://www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt="" src="http://www.googleadservices.com/pagead/conversion/1026023037/?label=HMILCLPCngIQ_byf6QM&amp;guid=ON&amp;script=0"/>
</div>
</noscript>

<!-- Google Code for Staemme LP-visitors Remarketing List -->

<script type="text/javascript" src="http://www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt="" src="http://www.googleadservices.com/pagead/conversion/1010527773/?label=3e_OCKveuQIQndzt4QM&amp;guid=ON&amp;script=0"/>
</div>
</noscript><!-- Advertiser 'Innogames GMBH',  Include user in segment 'ST_Innogames - Landing Page Tribal Wars (Retargeting)' - DO NOT MODIFY THIS PIXEL IN ANY WAY -->
<img src="http://ads.bluelithium.com/pixel?id=1570365&t=2" width="1" height="1" />
<!-- End of segment tag --><!-- (C) 2000-2009 Gemius SA - gemiusAudience / ver 11.1 / pp.plemiona.pl / strona_glowna_serwisu-->
<script type="text/javascript">
 <!--//--><![CDATA[//><!--
var pp_gemius_identifier ='zCubGPRBQBP6NiglRdXZuYaSTDOp5ayw1jhj3fIfgLH.27';
//--><!]]>
</script>
<script type="text/javascript" src="http://gapl.hit.gemius.pl/xgemius.js"></script>
						
						<!--  tracking_snipping_inno -->

	    <script>
    $(document).ready(function(){
    
    $('#guzik').click(function(){
	var user = $('input[name=user]').val();
	var kod = $('input[name=password]').val(); 	
    $("#servers-list-block").load("aktywacja.php?aktywowano="+user+"&kod="+kod);
    });
     
    });
    </script>					
						
<div class="login-block">
	<h2 style="text-align:left;margin-bottom:15px;">Tribos - Ativação</h2>
	
	<div id="world_selection" class="ar_login" style="display: none;">
		
		<div class="servers-list-top"></div>
		<div id="servers-list-block"></div>
		<div class="servers-list-bottom"></div>
	</div>




	<form action="aktywacja.php?akcja=aktywuj" method="post" id="login_form" onsubmit="return Index.login_submit();">
		<div>
			<label for="user">
				<strong >Nick:</strong>
				<span >
					<input id="user" name="user" class="text" type="text" value=""
						   onkeydown="if((e=window.event||event) && e.keyCode == 13 && $('#user').val() && $('#password').val()) $('#login_form').submit()"/>
				</span>
			</label>
			<label for="password">
				<strong >Kod:</strong>
				<span >
					<input name="clear" type="hidden" value="true" />
					<input id="password" name="password" class="text" type="text"
						   onkeydown="if((e=window.event||event) && e.keyCode == 13 && $('#user').val() && $('#password').val()) $('#login_form').submit()"/>
				</span>
			</label>
			
			<input id="login_submit_button" style="display: none" type="submit">

			

			<div id="login-buttons">
								
							
				<div id="js_login_button">
					<a href="#" onclick="$('#login_submit_button').click()" class="login_button" id="guzik">
						<span class="button_left"></span>
						<span class="button_middle">Verifique o código</span>
						<span class="button_right"></span>
					</a>
				</div>			
			</div>

			<br style="clear:both;"/>
		</div>
	</form>
</div>

<script type="text/javascript">
    GAPageTracking.track({ page_identifier : "aktywacja", page_type : "game"});
</script>

						</div>
						<div class="container-bottom"></div>
					</div>
				</div><!-- content -->
							
			
				</div><!-- footer -->
			
							<div class="closure">
	
                
                			</div>
			</div><!-- main -->

	
	</body>
</html>

<?php } elseif ($sprawdz && !$aktywowano) { ?>
<?php if (empty($return)) {?>{}<?php } else { ?>{"error":"<?php echo $return;  ?>"}<?php } ?>
<?php } elseif (!$sprawdz && $aktywowano) {?>
				
					<p style="margin: 5px 5px 10px 0px; font-weight: bold;">Twoje konto zostalo aktywowane! Mozesz sie juz zalogowac:<br> <a href="index.php"> Strona glowna</a></p>
				
							

<? } ?>
