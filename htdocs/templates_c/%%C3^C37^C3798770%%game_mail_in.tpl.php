<?php /* Smarty version 2.6.14, created on 2012-04-29 09:15:28
         compiled from game_mail_in.tpl */ ?>
<?php if (empty ( $this->_tpl_vars['view'] )): ?>
	<form action="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=mail&amp;mode=in&amp;action=del_arch&amp;h=<?php echo $this->_tpl_vars['hkey']; ?>
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
&amp;screen=mail&amp;mode=in&amp;site=<?php echo $this->_sections['countpage']['index']; ?>
"> [<?php echo $this->_sections['countpage']['index']; ?>
] </a>
					<?php endif; ?>
				<?php endfor; endif; ?>
			</td>
		</tr>
	<?php endif; ?>
	<tr><th>Titlu</th><th width="160">Expeditor</th><th width="140">Ultima tema</th></tr>
	
		<?php $_from = $this->_tpl_vars['mails']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['arr']):
?>
			<tr>
                                <td><input name="id_<?php echo $this->_tpl_vars['id']; ?>
" type="checkbox" />
				<?php if ($this->_tpl_vars['arr']['is_read'] == 0): ?> <img src="../graphic/new_mail.png" width="15" height="10" title="nou" alt="" /><?php endif;  if ($this->_tpl_vars['arr']['is_read'] == 1): ?> <span class="inactive"><img src="../graphic/read_mail.png" width="15" height="10"  title="citit" alt="" /></span><?php endif; ?> <a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=mail&amp;mode=in&amp;view=<?php echo $this->_tpl_vars['id']; ?>
"><?php echo $this->_tpl_vars['arr']['subject']; ?>
</a></td>
				<td><img src="graphic/answered_mail.png?1" title="trimis" alt="" /> <?php if ($this->_tpl_vars['arr']['from_id'] == -1):  echo $this->_tpl_vars['arr']['from_username'];  else: ?><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=info_player&amp;id=<?php echo $this->_tpl_vars['arr']['from_id']; ?>
"><?php echo $this->_tpl_vars['arr']['from_username']; ?>
</a><?php endif; ?></td>
				<td><?php echo $this->_tpl_vars['arr']['time']; ?>
</td>
			</tr>
		<?php endforeach; endif; unset($_from); ?>
		<?php if (count ( $this->_tpl_vars['mails'] ) > 0): ?>
			<tr><th><input name="all" type="checkbox" onclick="selectAll(this.form, this.checked)">alegele pe toate</th><th colspan="2"></th></tr>
		<?php endif; ?>
	</table>
	
		<table align="left"><tr>
		<td><input type="submit" value="Sterge" name="del" /></td>
		<td><input type="submit" value="Arhivare" name="arch" /></td>
		</tr></table>
	
	</form>
<?php else: ?>
	<?php if (empty ( $this->_tpl_vars['error'] )): ?>
		<table align="center" class="vis"><tr>
		<td align="center" width="120"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=mail&amp;mode=new&amp;reply=<?php echo $this->_tpl_vars['mail']['id']; ?>
">Raspunde</a></td>
		<td align="center" width="25%"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=mail&amp;mode=new&amp;reply=<?php echo $this->_tpl_vars['mail']['id']; ?>
&amp;forward=true">Trimite mai departe</a></td>
		<td align="center" width="25%"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=mail&amp;action=arch&amp;id=<?php echo $this->_tpl_vars['mail']['id']; ?>
&amp;h=<?php echo $this->_tpl_vars['hkey']; ?>
">Arhivare</a></td>
		<td align="center" width="25%"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=mail&amp;action=del&amp;id=<?php echo $this->_tpl_vars['mail']['id']; ?>
&amp;mode=in&amp;h=<?php echo $this->_tpl_vars['hkey']; ?>
">Sterge</a></td>
		</tr>
		</table>
		
		<table class="vis" width="100%">
		<tr><th width="140">Subiect</th><th width="300"><?php echo $this->_tpl_vars['mail']['subject']; ?>
</th></tr>
		<tr><td>Expeditor</td><td><?php if ($this->_tpl_vars['mail']['from_id'] == -1):  echo $this->_tpl_vars['mail']['from_username'];  else: ?><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=info_player&amp;id=<?php echo $this->_tpl_vars['mail']['from_id']; ?>
"><?php echo $this->_tpl_vars['mail']['from_username']; ?>
</a><?php endif; ?></td></tr>
		<tr><td>Primit</td><td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=info_player&amp;id=<?php echo $this->_tpl_vars['mail']['to_id']; ?>
"><?php echo $this->_tpl_vars['mail']['to_username']; ?>
</a></td></tr>
		<tr><td>Trimis</td><td><?php echo $this->_tpl_vars['mail']['time']; ?>
</td></tr>
		</table>
		
		<table class="vis" width="100%">
	<tr>
		<td colspan="2">
			<div class="post">
				<div class="igmline">
					<span  class="author">Ultimul mesaj trimis de <a href="/game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=info_player&amp;id=<?php echo $this->_tpl_vars['mail']['from_id']; ?>
" ><?php echo $this->_tpl_vars['mail']['from_username']; ?>
</a></span>
					 <span class="right date"><?php echo $this->_tpl_vars['mail']['time']; ?>
</span>
				</div>
				<div class="text"><?php echo $this->_tpl_vars['mail']['text']; ?>
</div>
			</div>
		</td>
	</tr>
		</table>
		
		<table align="center" class="vis"><tr>
		<td align="center" width="120"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=mail&amp;mode=new&amp;reply=<?php echo $this->_tpl_vars['mail']['id']; ?>
">Raspunde</a></td>
                <td align="center" width="25%"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=mail&amp;mode=new&amp;reply=<?php echo $this->_tpl_vars['mail']['id']; ?>
&amp;forward=true">Trimite mai departe</a></td>
		<td align="center" width="25%"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=mail&amp;action=arch&amp;id=<?php echo $this->_tpl_vars['mail']['id']; ?>
&amp;h=<?php echo $this->_tpl_vars['hkey']; ?>
">Arhivare</a></td>
		<td align="center" width="25%"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=mail&amp;action=del&amp;id=<?php echo $this->_tpl_vars['mail']['id']; ?>
&amp;mode=in&amp;h=<?php echo $this->_tpl_vars['hkey']; ?>
">Sterge</a></td>
		</tr>
		</table><br />
		
		<table width="100%" align="center" class="vis"><tr>
		<td align="center"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=mail&amp;mode=block&amp;action=block_id&amp;id=<?php echo $this->_tpl_vars['mail']['from_id']; ?>
&amp;h=<?php echo $this->_tpl_vars['hkey']; ?>
">Blocheaz&#259; expeditorul</a></td>
		</tr>
		</table><br />
	<?php endif; ?>
<?php endif; ?>