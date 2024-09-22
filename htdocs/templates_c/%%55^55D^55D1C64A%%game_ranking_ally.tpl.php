<?php /* Smarty version 2.6.14, created on 2011-06-18 10:36:10
         compiled from game_ranking_ally.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'format_number', 'game_ranking_ally.tpl', 12, false),)), $this); ?>
<table class="vis">
<tr>
	<th width="60">Loc</th><th width="60">Numele tribului</th><th width="120">Punctajul celor mai buni 40 juc&#259;tori</th><th width="60">Punctaj total</th><th width="100">Membri</th><th width="100">Medie de puncte juc&#259;tori</th><th width="60">Sate</th><th width="100">Medie de puncte sat</th>
</tr>
	<?php $_from = $this->_tpl_vars['ranks']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['item']):
?>
		<tr <?php echo $this->_tpl_vars['ranks'][$this->_tpl_vars['id']]['mark']; ?>
>
			<td><?php echo $this->_tpl_vars['ranks'][$this->_tpl_vars['id']]['rank']; ?>
</td>
			<td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=info_ally&id=<?php echo $this->_tpl_vars['id']; ?>
"><?php echo $this->_tpl_vars['ranks'][$this->_tpl_vars['id']]['short']; ?>
</a></td>
			<td><?php echo $this->_tpl_vars['ranks'][$this->_tpl_vars['id']]['best_points']; ?>
</td>
			<td><?php echo $this->_tpl_vars['ranks'][$this->_tpl_vars['id']]['points']; ?>
</td>
			<td><?php echo $this->_tpl_vars['ranks'][$this->_tpl_vars['id']]['members']; ?>
</td>
			<td><?php echo ((is_array($_tmp=$this->_tpl_vars['ranks'][$this->_tpl_vars['id']]['cuttrought_members'])) ? $this->_run_mod_handler('format_number', true, $_tmp) : format_number($_tmp)); ?>
</td>
			<td><?php echo $this->_tpl_vars['ranks'][$this->_tpl_vars['id']]['villages']; ?>
</td>
			<td><?php echo ((is_array($_tmp=$this->_tpl_vars['ranks'][$this->_tpl_vars['id']]['cuttrought_villages'])) ? $this->_run_mod_handler('format_number', true, $_tmp) : format_number($_tmp)); ?>
</td>
		</tr>
	<?php endforeach; endif; unset($_from); ?>
</table>

<table class="vis" width="100%"><tr>
<?php if ($this->_tpl_vars['site'] != 1): ?>
	<td align="center">
	<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=ranking&amp;mode=ally&amp;site=<?php echo $this->_tpl_vars['site']-1; ?>
">&lt;&lt;&lt; &#238;n sus</a></td>
<?php endif; ?>
<td align="center">
<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=ranking&amp;mode=ally&amp;site=<?php echo $this->_tpl_vars['site']+1; ?>
">&#238;n jos &gt;&gt;&gt;</a></td>
</tr></table>
<table class="vis" width="100%"><tr> 
 
 
<td style="padding-right:10px; text-align: center;" width="50%"> 
<form action="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=ranking&amp;mode=ally" method="post"> 
Loc: <input name="from" type="text" value="0" size="6" /> 
 <input type="submit" value="OK" /> 
</form> 
</td> 
 
<td style="padding-right:10px;text-align: center;"  width="50%"> 
<form action="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=ranking&amp;mode=ally&amp;search=" method="post"> 
Caut&#259;: <input name="name" type="text" value="" size="20" /> 
<input type="submit" value="OK" /> 
</form> 
</td> 
</tr> 
 
</table>

<table class="vis" width="100%"><tr> 
<td>
<center><b>
<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=ranking&amp;mode=ally&amp;site=1">1</a> &nbsp;<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=ranking&amp;mode=ally&amp;site=2">2</a> &nbsp;<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=ranking&amp;mode=ally&amp;site=3">3</a> &nbsp;<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=ranking&amp;mode=ally&amp;site=4">4</a> &nbsp;<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=ranking&amp;mode=ally&amp;site=5">5</a> &nbsp;<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=ranking&amp;mode=ally&amp;site=6">6</a> &nbsp;<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=ranking&amp;mode=ally&amp;site=7">7</a> &nbsp;<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=ranking&amp;mode=ally&amp;site=8">8</a> &nbsp;<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=ranking&amp;mode=ally&amp;site=9">9</a> &nbsp;<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=ranking&amp;mode=ally&amp;site=10">10</a> &nbsp;</center></b></td></tr></table>

						            		</td>