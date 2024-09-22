					<h2>Village Mover</h2>
					Ein kleines Tool, um Dörfer zu bewegen.<br />
					<table width="100%">
					<tr>
					<td width="100%" align="right">
					{if !isset($smarty.get.show_player)}
					<h2><a href="index.php?screen=Mover&show_player">Nur Dörfer zeigen, die einem Spieler anzeigen</a></h2>
					{/if}
					{if !isset($smarty.get.show_barbs)}
					<h2><a href="index.php?screen=Mover&show_barbs">Alle Dörfer zeigen</a></h2>
					{/if}
					{if !isset($smarty.get.show_only_barbs)}
					<h2><a href="index.php?screen=Mover&show_only_barbs">Nur Barbarendörfer zeigen</a></h2>
					{/if}
					</td>
					</tr>
					</table>
					{if !empty($message)}
					<h3>Nachricht</h3>
					{$message}
					<a href="index.php?screen=Mover{if isset($page)}{$page}{/if}">Zurück</a>
					{/if}
					{if !empty($msg)}
					<h1>Dörferliste:</h1>
					<table class="vis">
					<th>DorfId</th><th>Besitzer Name</th><th>Dorfname</th><th>Koordinaten</th>
					{foreach from=$msg item=ms }
					{$ms}
					{/foreach}
					</table>
					{/if}
					<br />
					<form action="index.php?screen=Mover{if isset($page)}{$page}{/if}" method="post">
					{if !isset($message) && isset($page) }
					<table width="300px" class="vis">
					  <tr>
						<th colspan="2"><a name="confirm">Dorf bewegen</a></th>
					  </tr>
					  <tr>
						<td width="40%" align="right">
						  <label for="name" style="display:block">Dorf-Id</label></td><td width="60%" align="middle"><input type="text" name="id" id="name" value="{if isset($id)}{$id}{/if}" size="11" />
						</td>
					  </tr>
					  <tr>
						<td width="40%" align="right">
						  <label for="xy" style="display:block">Bewege Nach (xxx|yyy)</label></td><td width="60%" align="middle"><input type="text" name="xy" id="xy" size="9" value="{if isset($xy)}{$xy}{/if}" />
						</td>
					  <tr>
						<td colspan="2" align="center">
						  <input type="submit" value="Bewegen!" />
						</td>
					  </tr>
					</table>{/if}
					</form>
					<br />
					<table width="100%">
					  <tr>
						<td align="right"><a href="?screen=Mover">Start</a><br /><br />Code by <a href="http://dslan.gfx-dose.de/user-11587.html">InsertNameHere</a></td>
					  </tr>
					</table>