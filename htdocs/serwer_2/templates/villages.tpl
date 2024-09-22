<?xml version="1.0"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Plemiona gra online</title>
<link rel="stylesheet" type="text/css" href="stamm.css" />
<meta http-equiv="Content-Type" content="text/html; charset=windows-1250" />
<script src="script.js?1159978916" type="text/javascript"></script>
</head>
<body style="margin-top:6px;">
<center>
	<table cellspacing="0" cellpadding="0" style="330">
		<tr>
			<td style="background-color:#F8F4E8;">
				<center>
					{if $sekcja}
						<table class="vis" style="width:330px ;">
							<tr>
								<td>
									<div style="width: 270;">
										{$sekcja_wiosek}
									</div>
								</td>
							</tr>
						</table>
					{/if}
					
					<table class="vis" style="width:330px ;">
						<tr>
							<th>Twoje wioski:</th>
						</tr>
						{foreach from=$wioski_gracza item=wioska}
							<tr>
								<td>{$wioska.link}</td>
							</tr>
						{/foreach}
					</table>
				</center>
			</td>
		</tr>
	</table>
</center>
</body>
</html>
