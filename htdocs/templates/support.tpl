<body bgcolor="#DED3B9" >
<div align="center">
<table class="main" width="800" bgcolor="#F0E8D0" border="2" 

bordercolor="#804000" style="border-collapse: collapse"><tr><td>
<h2><font face="Arial">Support</font></h2><table width="100%"><tr><td 

valign="top" width="120">
<table class="vis">&nbsp;</table></td><td valign="top" align="left">

<p><font face="Arial" color="#FF0000">{$status}</font></p>
<p><font face="Arial" color="#FF0000">{if $smarty.get.send == "message"}{if 
$sstep == "0"}Danke 

{$nick}, ihre Nachricht wurde gesendent! Der Adminstrator wird dir im Ingame 

eine Antwort schreiben!</font></p>
	<table border="1" width="100%" bgcolor="#FFFFFF" style="border-

collapse: collapse" bordercolor="#000000">
		<tr>
			<td>{$smarty.post.grund}</td>
		</tr>
		<tr>
			<td>{$smarty.post.nick}</td>
		</tr>
		<tr>
			<td>{$smarty.post.message}</td>
		</tr>
	</table>
<p><font color="#FF0000" face="Arial">{/if}{/if}</font></p>
<form action="support.php?send=message" method="post"><font 

face="Arial">Grund:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<select size="1" name="grund">
<option selected value="- Nicht angegeben -">- Nicht angegeben -</option>
<option value="Beleidigung">Beleidigung</option>
<option value="Regelverstoss">Regelverstoss</option>
<option value="Bug">Bug</option>
<option value="Sonstige Fragen">Sonstige Fragen</option>
</select></font><p><font face="Arial">Nickname: <input type="text" name="nick" 

size="24"></font></p>
<p><font face="Arial">Nachricht:<br>
<textarea rows="19" name="message" cols="53"></textarea></font></p>
<p><font face="Arial"><input type="submit" value="Senden" 

name="B1"></font></p>
</form>
</td></tr></form></table>
</td></tr></table>
</div></body>