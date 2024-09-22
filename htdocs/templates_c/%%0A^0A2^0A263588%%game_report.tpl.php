<?php /* Smarty version 2.6.14, created on 2011-06-18 10:38:10
         compiled from game_report.tpl */ ?>
<?php 

$public_view=$_GET['public'];
$hash_view=$_GET['hash'];

if ($public_view=="view") {

 ?>

<?php $this->assign('mode', 'public'); ?>

<?php  }  ?>

<h2>Rapoarte</h2>

<table>
	<tr>
		<td valign="top">
			<table class="vis" width="120">
				<?php $_from = $this->_tpl_vars['links']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['f_name'] => $this->_tpl_vars['f_mode']):
?>
         <?php if ($this->_tpl_vars['f_name'] == 'Alle Berichte'): ?>
            <?php $this->assign('f_name', 'Toate rapoartele'); ?>
         <?php endif; ?>
         <?php if ($this->_tpl_vars['f_name'] == 'Angriff'): ?>
            <?php $this->assign('f_name', 'Atacuri'); ?>
         <?php endif; ?>
         <?php if ($this->_tpl_vars['f_name'] == 'Verteididung'): ?>
            <?php $this->assign('f_name', 'Ap&#259;rare'); ?>
         <?php endif; ?>
         <?php if ($this->_tpl_vars['f_name'] == 'Unterstützung'): ?>
            <?php $this->assign('f_name', 'Sprijin'); ?>
         <?php endif; ?>
         <?php if ($this->_tpl_vars['f_name'] == 'Handel'): ?>
            <?php $this->assign('f_name', 'Comer&#355;'); ?>
         <?php endif; ?>
         <?php if ($this->_tpl_vars['f_name'] == 'Sonstiges'): ?>
            <?php $this->assign('f_name', 'Altele'); ?>
         <?php endif; ?>
					<?php if ($this->_tpl_vars['f_mode'] == $this->_tpl_vars['mode']): ?>
						<tr>
							<td class="selected" width="160">
								<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=report&amp;mode=<?php echo $this->_tpl_vars['f_mode']; ?>
"><?php echo $this->_tpl_vars['f_name']; ?>
</a>

							</td>
						</tr>
					<?php else: ?>
		                <tr>
		                    <td width="160">
								<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=report&amp;mode=<?php echo $this->_tpl_vars['f_mode']; ?>
"><?php echo $this->_tpl_vars['f_name']; ?>
</a>
							</td>
						</tr>
					<?php endif; ?>
				<?php endforeach; endif; unset($_from); ?>

			
			</table>
		</td>
		<td valign="top" width="100%">
<?php 
if ($public_view=="view") {
   include "public.php";
} else {
 ?>
		
			<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "game_report_".($this->_tpl_vars['do']).".tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php  }  ?>
		</td>
	</tr>
</table>