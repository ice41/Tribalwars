<?xml version="1.0" encoding="UTF-8"?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>Plemiona - Pomoc - Œwiat {$serwerid}</title>
		<meta http-equiv="content-type" content="text/html; charset=windows-1250" />
		<link rel="shortcut icon" href="/graphic/favicon.ico" type="image/x-icon" />
		<link rel="stylesheet" type="text/css" href="game.css?1331133567" />
		<link rel="stylesheet" type="text/css" href="styl.css?1331133567" />
		<script src="/js/script.js?1159978916" type="text/javascript"></script>

	</head>

	<body id="ds_body" class="header" >
		<table align="center" style="margin:auto; margin-top: 15px; width: 820px;padding:5px;">
			<tr>
				<td>
					<table class="content-border" id="content_value" style="border-collapse: collapse; width: 100%; padding: 10px;">
						<tr>
							<td>
								<h3>Plemiona - Pomoc</h3>
								
								<table>
									<tbody>
										<tr>
											<td valign="top">
												<table class="vis modemenu" style="width: 125px;">
													<tbody>	
														{foreach from=$modes item=f_mode key=link}
															<tr>
																{if $f_mode == $mode}
																	<td width="100" class="selected">
																		<a href="help.php?mode={$f_mode}">{$link} </a>
																	</td>
																{else}
																	<td width="100">
																		<a href="help.php?mode={$f_mode}">{$link} </a>
																	</td>
																{/if}
															</tr>
														{/foreach}
													</tbody>
												</table>
											</td>
											<td valign="top">
												{if in_array($mode,$modes)}
													{include file="help_$mode.tpl"}
												{/if}
											</td>
										</tr>
									</tbody>
								</table>
								
							</td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
	</body>
</html>