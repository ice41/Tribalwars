<?php /* Smarty version 2.6.14, created on 2012-04-29 09:15:28
         compiled from game_mail.tpl */ ?>
<h2>Mesaje</h2>
<?php if (! empty ( $this->_tpl_vars['error'] )): ?>
<?php if ($this->_tpl_vars['error'] == 'Betreff muss mindestens zwei Zeichen lang sein!'): ?>
            <?php $this->assign('error', 'Subiectul trebuie s&#259; aib&#259; minim 2 caractere !'); ?>
         <?php endif; ?>
         <?php if ($this->_tpl_vars['error'] == 'Du musst mindestens einen Empfänger angeben.'): ?>
            <?php $this->assign('error', 'Mesajul trebuie s&#259; con&#355;in&#259; un destinatar'); ?>
         <?php endif; ?>
         <?php if ($this->_tpl_vars['error'] == 'Text muss mindestens drei Zeichen lang sein!'): ?>
            <?php $this->assign('error', 'Textul trebuie s&#259; con&#355;in&#259; minim 3 caractere !'); ?>
         <?php endif; ?>
         <?php if ($this->_tpl_vars['error'] == 'Spieler nicht vorhanden'): ?>
            <?php $this->assign('error', 'Juc&#259;torul nu a fost g&#259;sit !'); ?>
         <?php endif; ?>
         <?php if ($this->_tpl_vars['error'] == 'Absender bereits blockiert'): ?>
            <?php $this->assign('error', 'Juc&#259;torul este deja blocat !'); ?>
         <?php endif; ?>
         <?php if ($this->_tpl_vars['error'] == 'Du kannst dich nicht selber blockieren'): ?>
            <?php $this->assign('error', 'Nu te po&#355;i bloca singur !'); ?>
         <?php endif; ?>
         <?php if ($this->_tpl_vars['error'] == 'Empfänger nicht vorhanden.'): ?>
            <?php $this->assign('error', 'Destinatarul nu a fost g&#259;sit !'); ?>
         <?php endif; ?>
	<div style="color:red; font-size:150%"><?php echo $this->_tpl_vars['error']; ?>
</div>
<?php endif; ?>
<table><tr><td valign="top" width="100">
	<table class="vis" width="150">
			<?php if (in == $this->_tpl_vars['mode']): ?>
				<tr>
					<td class="selected" width="180">
						<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=mail&amp;mode=in">Mesaje primite</a>
					</td>
				</tr>
			<?php else: ?>
                <tr>
                    <td width="120">
						<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=mail&amp;mode=in">Mesaje primite</a>
					</td>
				</tr>
			<?php endif; ?>
			<?php if (out == $this->_tpl_vars['mode']): ?>
				<tr>
					<td class="selected" width="120">
						<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=mail&amp;mode=out">Mesaje expediate</a>
					</td>
				</tr>
			<?php else: ?>
                <tr>
                    <td width="120">
						<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=mail&amp;mode=out">Mesaje expediate</a>
					</td>
				</tr>
			<?php endif; ?>
			<?php if (arch == $this->_tpl_vars['mode']): ?>
				<tr>
					<td class="selected" width="120">
						<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=mail&amp;mode=arch">Arhiva</a>
					</td>
				</tr>
			<?php else: ?>
                <tr>
                    <td width="120">
						<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=mail&amp;mode=arch">Arhiva</a>
					</td>
				</tr>
			<?php endif; ?>
				<tr>
					<td width="120">
						<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=mail&amp;mode=new">Scrie un mesaj</a>
					</td>
				</tr>
			<?php if (block == $this->_tpl_vars['mode']): ?>
				<tr>
					<td class="selected" width="120">
						<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=mail&amp;mode=block">Blocheaz&#259; expeditor</a>
					</td>
				</tr>
			<?php else: ?>
                <tr>
                    <td width="120">
						<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=mail&amp;mode=block">Blocheaz&#259; expeditor</a>
					</td>
				</tr>
			<?php endif; ?>
	</table>
	
</td><td valign="top" width="*">
	<?php if (in_array ( $this->_tpl_vars['mode'] , $this->_tpl_vars['allow_mods'] )): ?>
		<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "game_mail_".($this->_tpl_vars['mode']).".tpl", 'smarty_include_vars' => array('title' => 'foo')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	<?php endif; ?>
</td></tr></table>