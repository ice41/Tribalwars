<?php /* Smarty version 2.6.14, created on 2011-12-15 17:18:11
         compiled from game_mail_arch.tpl */ ?>
<?php if (empty ( $this->_tpl_vars['view'] )): ?>
	<form action="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=mail&amp;mode=arch&amp;action=del_arch&amp;h=<?php echo $this->_tpl_vars['hkey']; ?>
" method="post">
	
	<table class="vis">
	<?php if ($this->_tpl_vars['num_pages'] > 1): ?>
		<tr>
			<td align="center" colspan="3">
				<?php unset($this->_sections['countpage']);
$this->_sections['countpage']['name'] = 'countpage';
$this->_sections['countpage']['start'] = (int)1;
$this->_sections['countpage']['loop'] = is_array($_loop=$this->_tpl_vars['num_pages']+1) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['countpage']['step'] = ((int)1) == 0 ? 1 : (int)1;
$this->_sections['countpage']['show'] = true;
$this->_sections['countpage']['max'] = $this->_sections['countpage']['loop'];
if ($this->_sections['countpage']['start'] < 0)
    $this->_sections['countpage']['start'] = max($this->_sections['countpage']['step'] > 0 ? 0 : -1, $this->_sections['countpage']['loop'] + $this->_sections['countpage']['start']);
else
    $this->_sections['countpage']['start'] = min($this->_sections['countpage']['start'], $this->_sections['countpage']['step'] > 0 ? $this->_sections['countpage']['loop'] : $this->_sections['countpage']['loop']-1);
if ($this->_sections['countpage']['show']) {
    $this->_sections['countpage']['total'] = min(ceil(($this->_sections['countpage']['step'] > 0 ? $this->_sections['countpage']['loop'] - $this->_sections['countpage']['start'] : $this->_sections['countpage']['start']+1)/abs($this->_sections['countpage']['step'])), $this->_sections['countpage']['max']);
    if ($this->_sections['countpage']['total'] == 0)
        $this->_sections['countpage']['show'] = false;
} else
    $this->_sections['countpage']['total'] = 0;
if ($this->_sections['countpage']['show']):

            for ($this->_sections['countpage']['index'] = $this->_sections['countpage']['start'], $this->_sections['countpage']['iteration'] = 1;
                 $this->_sections['countpage']['iteration'] <= $this->_sections['countpage']['total'];
                 $this->_sections['countpage']['index'] += $this->_sections['countpage']['step'], $this->_sections['countpage']['iteration']++):
$this->_sections['countpage']['rownum'] = $this->_sections['countpage']['iteration'];
$this->_sections['countpage']['index_prev'] = $this->_sections['countpage']['index'] - $this->_sections['countpage']['step'];
$this->_sections['countpage']['index_next'] = $this->_sections['countpage']['index'] + $this->_sections['countpage']['step'];
$this->_sections['countpage']['first']      = ($this->_sections['countpage']['iteration'] == 1);
$this->_sections['countpage']['last']       = ($this->_sections['countpage']['iteration'] == $this->_sections['countpage']['total']);
?>
					<?php if ($this->_tpl_vars['site'] == $this->_sections['countpage']['index']): ?>
						<strong> &gt;<?php echo $this->_sections['countpage']['index']; ?>
&lt; </strong>
					<?php else: ?>
						<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=mail&amp;mode=out&amp;site=<?php echo $this->_sections['countpage']['index']; ?>
"> [<?php echo $this->_sections['countpage']['index']; ?>
] </a>
					<?php endif; ?>
				<?php endfor; endif; ?>
			</td>
		</tr>
	<?php endif; ?>
	<tr><th>Temat</th><th width="160">Nadawca</th><th width="160">Odbiroca</th><th width="140">Data</th></tr>
	
		<?php $_from = $this->_tpl_vars['mails']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['arr']):
?>
			<tr>
				<td><input name="id_<?php echo $this->_tpl_vars['id']; ?>
" type="checkbox" /><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=mail&amp;mode=arch&amp;view=<?php echo $this->_tpl_vars['id']; ?>
"><?php echo $this->_tpl_vars['arr']['subject']; ?>
</a></td>
				<td><?php if ($this->_tpl_vars['arr']['from_id'] == -1):  echo $this->_tpl_vars['arr']['from_username'];  else: ?><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=info_player&amp;id=<?php echo $this->_tpl_vars['arr']['from_id']; ?>
"><?php echo $this->_tpl_vars['arr']['from_username'];  endif; ?></a></td>
				<td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=info_player&amp;id=<?php echo $this->_tpl_vars['arr']['to_id']; ?>
"><?php echo $this->_tpl_vars['arr']['to_username']; ?>
</a></td>
				<td><?php echo $this->_tpl_vars['arr']['time']; ?>
</td>
			</tr>
		<?php endforeach; endif; unset($_from); ?>
		<?php if (count ( $this->_tpl_vars['mails'] ) > 0): ?>
			<tr><th><input name="all" type="checkbox" onclick="selectAll(this.form, this.checked)">Zaznacz wszystka</th><th colspan="3"></th></tr>
		<?php endif; ?>
	</table>
	
		<table align="left"><tr>
		<td><input type="submit" value="Usuñ" name="del" /></td>
		</tr></table>
	
	</form>
<?php else: ?>
	<?php if (empty ( $this->_tpl_vars['error'] )): ?>
		<table align="center" class="vis"><tr>
		<td align="center" width="120"><?php if ($this->_tpl_vars['mail']['from_id'] == -1): ?>Nie przeczytane<?php else: ?><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=mail&amp;mode=new&amp;reply=<?php echo $this->_tpl_vars['mail']['id']; ?>
">Odpisz</a><?php endif; ?></td>
		<td align="center" width="25%"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=mail&amp;mode=new&amp;reply=<?php echo $this->_tpl_vars['mail']['id']; ?>
&amp;forward=true">Napisz</a></td>
		<td align="center" width="25%"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=mail&amp;mode=arch">Archiwum</a></td>
		<td align="center" width="25%"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=mail&amp;action=del&amp;id=<?php echo $this->_tpl_vars['mail']['id']; ?>
&amp;mode=arch&amp;h=<?php echo $this->_tpl_vars['hkey']; ?>
">Usuñ</a></td>
		</tr>
		</table>
		
		<table class="vis" width="100%">
		<tr><th width="140">Temat</th><th width="300"><?php echo $this->_tpl_vars['mail']['subject']; ?>
</th></tr>
		<tr><td>Odbiorca</td><td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=info_player&amp;id=<?php echo $this->_tpl_vars['mail']['from_id']; ?>
"><?php echo $this->_tpl_vars['mail']['from_username']; ?>
</a></td></tr>
		<tr><td>Nadawca</td><td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=info_player&amp;id=<?php echo $this->_tpl_vars['mail']['to_id']; ?>
"><?php echo $this->_tpl_vars['mail']['to_username']; ?>
</a></td></tr>
		<tr><td>Sata</td><td><?php echo $this->_tpl_vars['mail']['time']; ?>
</td></tr>
		</table>
		
		<table class="vis" width="100%">
		<tr><td colspan="2" valign="top" height="160" style="background-color: white; border: solid 1px black;">
		<?php echo $this->_tpl_vars['mail']['text']; ?>

		</td></tr>
		</table>
		
		<table align="center" class="vis"><tr>
		<td align="center" width="120"><?php if ($this->_tpl_vars['mail']['from_id'] == -1): ?>Nie przeczytane<?php else: ?><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=mail&amp;mode=new&amp;reply=<?php echo $this->_tpl_vars['mail']['id']; ?>
">Odpisz</a><?php endif; ?></td>
		<td align="center" width="25%"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=mail&amp;mode=new&amp;reply=<?php echo $this->_tpl_vars['mail']['id']; ?>
&amp;forward=true">Napisz</a></td>
		<td align="center" width="25%"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=mail&amp;mode=arch">Archiwum</a></td>
		<td align="center" width="25%"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=mail&amp;action=del&amp;id=<?php echo $this->_tpl_vars['mail']['id']; ?>
&amp;mode=arch&amp;h=<?php echo $this->_tpl_vars['hkey']; ?>
">Usuñ</a></td>
		</tr>
		</table><br />
	<?php endif; ?>
<?php endif; ?>