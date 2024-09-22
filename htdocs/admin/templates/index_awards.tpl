{$javascript}
<h3><center><font color="#884000">{$headline}</font></center></h3>
<p>
<center>
     {$text}
</center>
</p>
<center>
	     <input type="button" value="Reset" onclick="javascript:check('index.php?screen=awards&action=reset')"/>
</center>
{if isset($status)}
{$status}
<script type="text/javascript">
window.setTimeout(" location.href = 'index.php?screen=awards' ","2000");
</script>
{/if}
     <br/>
{$version}

     