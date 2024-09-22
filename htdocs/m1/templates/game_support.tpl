{php}
	$this->_tpl_vars['mode'] = $_GET['mode'];
	if(empty($_GET['mode'])){
		$this->_tpl_vars['mode'] = 'tickets';
	}
{/php}
<br />
	<table class="vis" width="98%" align="center" style="border-spacing: 1px; background-color: #FEE47D; border:1px solid #fee47d;-moz-border-radius:5px 5px 5px 5px;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px;">
		<tr><th>Submenu</th></tr>
		<tr><td {if $mode=='tickets'}class="selected"{/if}><a href="game.php?village={$village.id}&amp;screen=support&amp;mode=tickets">{if $mode=='tickets'}&raquo; {/if}Meus tickets</a></td></tr>
		<tr><td {if $mode=='open'}class="selected"{/if}><a href="game.php?village={$village.id}&amp;screen=support&amp;mode=open">{if $mode=='open'}&raquo; {/if}Abrir novo ticket</a></td></tr>
	</table>
</td>
<td width="80%">
	<table width="100%">
		<tr><td><h2>Suporte</h2></td></tr>
		<tr><td valign="top" width="100%">{include file="game_support_$mode.tpl" title=foo}</td></tr>
	</table>
</td>