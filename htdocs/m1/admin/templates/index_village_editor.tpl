<h2>Editare sate</h2>
{if $result neq ""}
	<h4>{$result}</h4>
	<p>Nivele satului ales au fost modificate cu succes!</p>
{/if}
<h4>Editare sate</h4>
<form action="index.php?screen=village_editor&amp;action=edit" method="POST">
Schimbati nivelele cladirilor din urmatoarele sate
<select name="name">
{foreach from=$v item=village}
	<option value="{$village.name|urldecode}">{$village.name|urldecode}</option>
{foreachelse}
	<option value="">-- keine D�rfer vorhanden</option>
{/foreach}
</select> 
<br />
<table class="vis">
	<tr>
		<th>Cladire</th>
		<th>Nivel*</th>
	</tr>
	{foreach from=$needed key=name item=dbname}
	<tr>
		<td><img src="../graphic/buildings/{$dbname}.png"> {$name}</td>
		<td><input name="{$dbname}" id="{$dbname}" type="text" size="5" value="na" style="text-align:center;border:1px solid #804000;background-color:#F8F4E8;" /></td>
	</tr>
	{/foreach}
	<tr>
		<td colspan="2">
		<input type="submit" value="Editeaza" style="text-align:center;border:2px solid #804000;background-color:#F8F4E8;padding:3px;width:100%;" /> 
		</td>
	</tr>
</table>


<h4>Optiuni:</h5>
<br />
<a href="javascript:set_maxstage()">&raquo; Seteaza toate nivele la maxim</a><br />
<a href="javascript:set_all_na()">&raquo; Seteaza toate nivele <i>NA</i></a>
</form>

<script type="text/javascript">
<!--

/**
 * JavaScript Functions generated by village_editor eXtension 
 */

{literal}
function set_maxstage() {
{/literal}

{foreach from=$max_lvl item=level key=dname}
	document.getElementById('{$dname}').value = {$level};
{/foreach}

{literal}
}
{/literal}

{literal}
function set_all_na() {
{/literal}

{foreach from=$max_lvl item=level key=dname}
	document.getElementById('{$dname}').value = "na";
{/foreach}

{literal}
}
{/literal}
//-->
</script>

<!--  
Debugger:
{$v_debug}
-->