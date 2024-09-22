<?php /* Smarty version 2.6.14, created on 2011-12-17 13:55:28
         compiled from index_refugee_camp.tpl */ ?>
<h2>Narzêdzie do dodawania wiosek</h2>

<?php if (! empty ( $this->_tpl_vars['error'] )): ?>
	<font class="error"><?php echo $this->_tpl_vars['error']; ?>
</font><br /><br />
<?php else: ?>	
	<form method="post" action="index.php?screen=refugee_camp&amp;action=create" onSubmit="this.submit.disabled=true;">
		<table class="vis">
			<tr>
				<th colspan="2">Dodawanie wiosek barbarzyñskich</th>
			</tr>
			<tr>
				<td width="350">Ile ustawiæ wiosek?<br />(maksymalnie 2000)</td>
				<td><input type="text" name="num" value="0"></td>
			</tr>
			<tr>
				<td colspan="2"><input type="submit" name="submit" value="Ustawiæ" onload="this.disabled=false;">Mo¿e to potrwaæ 30 sekund</td>
			</tr>
		</table>
</form>
<?php endif; ?>