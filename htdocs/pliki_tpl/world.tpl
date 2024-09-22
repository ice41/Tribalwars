<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>Plemionawars - gra online</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="start.css" />
        <link rel="shortcut icon" href="/graphic/favicon.ico" type="image/x-icon" />
		<meta name="description" content="Plemionawars to przeglądarkowa gra online, z akcją osadzoną w średniowieczu. Gracz posiada małą wioskę, którą ma doprowadzić do władzy i chwały." />
		<meta name="keywords" content="Browsergame, Browsergames, Browserspiel, Onlinespiel, Onlinegame, Mittelalter, Ritter, Burg, Burgen, Dorf, Krieg, Kampf, K&auml;mpfen, Ruhm, Ehre, Die St&auml;mme" />
		<link rel="stylesheet" type="text/css" href="index.css?1232382056" />
		<!--[if lt IE 7]>
		<link rel="stylesheet" type="text/css" href="index_ie6.css" media="screen"/>
		<![endif]-->
									<script type="text/javascript">
		if(top!=self)
			top.location=self.location;
		</script>
				<style type="text/css">
		
			

		
		</style>
	</head>

	<body>


		<body>
<body>
	
		<div id="index_body">
			<div id="main">
			<div id="header">
				<h1><a href="/index.php" style="background:url(graphic/index/bg-logo.jpg) no-repeat 100% 0;">Triburile - Jocul online</a></h1>
				<div class="navigation">
					<div class="navigation-holder">
						<div class="navigation-wrapper">
							<div id="navigation_span">
								{php}
								$lcount = count($this->_tpl_vars["linki"]);
								{/php}
								{foreach from=$linki key=link item=value}
									{php}$i++{/php}
									<a href="{$link}"/>{$value}</a>
									{php} if ($lcount != $i) echo"-";{/php}
								{/foreach}
							</div>
						</div>
				</div>
				</div>
				<span class="paladin"><img src="graphic/index/bg-paladin-new.png" alt="" /></span>			</div>		<div id="content">
			<div id="screenshot" style="visibility:hidden" onclick="hide_screenshot();">
				<div id="screenshot_image"></div>
			</div>
		<div class="container-block-full">
			<div class="container-top-full"></div>
				<div class="container">
					<div class="info-block register">
						<h2 class="register">Em qual mundo você deseja fazer login após o registro?</h2>
												<p><a href="register.php?mode=new_account&amp;server=mundo{$serwer}" style="font-size: 18px;"> &raquo; Mundo {$serwer} (recomendado)</a></p>
						<br />
												<table>
							<tr>
								<th>Świat</th>
								
							</tr>
							{foreach from=$serwery item=serwer}
							<tr class="lit">
								<td width="100" align="center">
									<a href="register.php?mode=new_account&amp;server=mundo{$serwer}"><span class="world_button_active">Mundo {$serwer}</span></a>
								</td>
								
							</tr>{/foreach}

                                                                                                                <tr class="row_a">
								
														
			
													</table>
					</div>
				</div>
				<div class="container-bottom-full"></div>
			 </div>
			</div><!-- content -->
						<div class="closure">
				&copy; 2013 &middot;				
                                
                			</div>		</div><!-- main -->