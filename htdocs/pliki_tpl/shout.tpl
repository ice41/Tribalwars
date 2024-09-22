<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>Plemiona - gra online</title>
		<link rel="shortcut icon" href="graphic/favicon.ico" type="image/x-icon" />
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<meta name="description" content="Plemiona to przegl¹darkowa gra online. Ka¿dy gracz posiada ma³¹ wioskê, któr¹ ma doprowadziæ do w³adzy i chwa³y." />
		<link rel="stylesheet" type="text/css" href="../index.css" />
		<meta http-equiv="refresh" content="1">
									
					<center><table class="vis">
						{foreach from=$wiadomosci item=w key=id}
							<tr>
								<td width="20%">{$w.gracz}
								<p><strong>{$w.data}</strong>
								<td width="70%"><p>{$w.text}</p>
							
							</tr>
							
						{/foreach}
									<form name="wys" action="shout.php?akcja=wiadomosc" method="post">

									<tr><td colspan="2"><input name="gracz" type="text" value="{$user_info.nazwa}" /><input name="text" type="text" value="" size="100"/><input name="submit" type="submit" value="Wyœlij" />
									</form>									</table>