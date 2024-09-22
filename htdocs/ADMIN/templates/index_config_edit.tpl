<h2>Config Editor</h2>

{if !empty($action_text)}
<h3>Actiune</h3>
{$action_text}
{/if}

<form action="index.php?screen=config_edit&update=y" method="post">
<table class="vis">
{foreach from=$to_cfg item=cfg}
<tr>
	<th>{$cfg.desc|htmlspecialchars}</th>
</tr>
<tr>
	<td>
	{if $cfg.type == "text"}
		<input type="text" name="{$cfg.name}" value="{$cfg.default}" />
	{/if}
	
	{if $cfg.type == "numeric"}
		<input type="text" name="{$cfg.name}" value="{$cfg.default}" size="8" />
	{/if}
	
	{if $cfg.type == "select"}
		<select name="{$cfg.name}">
			<option value="a" {if $cfg.default == "a"}selected="selected"{/if}>{$cfg.a}</option>
			<option value="b" {if $cfg.default == "b"}selected="selected"{/if}>{$cfg.b}</option>
		</select>
	{/if}
	</td>
</tr>
{/foreach}
</table>

<br />
<input type="submit" value="Ąndern" />
</form>

{literal}
<script type="text/javascript">
/**
 * DO NOT REMOVE THIS
 */
 
window.onload = _init_agrafix;

function _init_agrafix() { 
	 var st = document.getElementById("serverTime");
	 var parentP = st.parentNode;
}
</script>
{/literal}
<!--
End of Extension
-->