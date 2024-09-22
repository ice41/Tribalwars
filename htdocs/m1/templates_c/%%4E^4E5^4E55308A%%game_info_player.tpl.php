<?php /* Smarty version 2.6.14, created on 2019-08-03 13:51:42
         compiled from game_info_player.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'format_number', 'game_info_player.tpl', 17, false),array('modifier', 'bb_format', 'game_info_player.tpl', 69, false),)), $this); ?>
<?php 
	$q01 = mysql_fetch_array(mysql_query("SELECT killed_units_altogether,killed_units_altogether_rank FROM users WHERE id = '".$_GET['id']."'"));
	$this->_tpl_vars['info_user']['killed_units_altogether'] = $q01['0'];
	$this->_tpl_vars['info_user']['killed_units_altogether_rank'] = $q01['1'];

	$texto = $this->_tpl_vars['sex'];
	$this->_tpl_vars['sex'] = str_replace("weiblich","Feminino", $texto);
	$this->_tpl_vars['sex'] = str_replace("männlich","Masculino",$texto);
	$this->_tpl_vars['vills'] = mysql_num_rows(mysql_query("SELECT * FROM `villages` WHERE `userid` = '".$this->_tpl_vars['info_user']['id']."'"));
 ?>
<h2>Jogador: <?php echo $this->_tpl_vars['info_user']['username']; ?>
</h2>
<table width="100%">
	<tr>
		<td valign="top" width="45%">
			<table class="vis" width="100%" style="border-spacing: 1px; background-color: #FEE47D; border:1px solid #fee47d;-moz-border-radius:5px 5px 5px 5px;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px;">
				<tr><th colspan="2">Titulo de nobresa: <?php echo $this->_tpl_vars['tUser']['title']; ?>
</th></tr>
				<tr><td width="100">Pontos:</td><td><?php echo ((is_array($_tmp=$this->_tpl_vars['info_user']['points'])) ? $this->_run_mod_handler('format_number', true, $_tmp) : format_number($_tmp)); ?>
</td></tr>
				<tr><td>Ranking:</td><td><?php echo $this->_tpl_vars['info_user']['rang']; ?>
</td></tr>
				<tr><td width="155">Oponentes derrotados:</td><td><?php echo ((is_array($_tmp=$this->_tpl_vars['info_user']['killed_units_altogether'])) ? $this->_run_mod_handler('format_number', true, $_tmp) : format_number($_tmp)); ?>
 P (Classifica&ccedil;&atilde;o: <B><?php echo $this->_tpl_vars['info_user']['killed_units_altogether_rank']; ?>
</b>)</td></tr>
				<?php if (! empty ( $this->_tpl_vars['info_ally']['short'] )): ?>
				<tr><td>Tribo:</td><td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=info_ally&amp;id=<?php echo $this->_tpl_vars['info_ally']['id']; ?>
"><?php echo $this->_tpl_vars['info_ally']['short']; ?>
</a></td></tr>
				<?php endif; ?>
				<tr><td colspan="2"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=mail&amp;mode=new&amp;player=<?php echo $this->_tpl_vars['info_user']['id']; ?>
">&raquo; Enviar mensagem</a></td></tr>
			<?php if ($this->_tpl_vars['can_invite']): ?>
				<?php if ($this->_tpl_vars['soma'] >= $this->_tpl_vars['limite']): ?>
					<?php echo $this->_tpl_vars['msg']; ?>

				<?php else: ?>
				<tr><td colspan="2"><a href="javascript:ask('Deseja convidar o jogador <?php echo $this->_tpl_vars['info_user']['username']; ?>
 para sua tribo?', 'game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=ally&mode=invite&action=invite_id&id=<?php echo $this->_tpl_vars['info_user']['id']; ?>
&h=<?php echo $this->_tpl_vars['hkey']; ?>
')">&raquo; Convidar para tribo</a></td></tr>
				<?php endif; ?>
			<?php endif; ?>
			</table><br />
			<table class="vis" width="100%" style="border-spacing: 1px; background-color: #FEE47D; border:1px solid #fee47d;-moz-border-radius:5px 5px 5px 5px;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px;">
				<tr>
					<th width="180" <?php  if ($_GET['id'] == $this->_tpl_vars['user']['id']) { echo 'colspan="2"'; } ?>>Aldeias (<?php echo $this->_tpl_vars['vills']; ?>
)</th>
					<th width="80">Coordenada</th>
					<th>Pontos</th>
				</tr>
				<?php $_from = $this->_tpl_vars['villages']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['arr']):
?>
				<tr>
					<?php  if ($_GET['id'] == $this->_tpl_vars['user']['id']) { echo '<td width="10"><a href="game.php?village='.$this->_tpl_vars['id'].'&screen=overview"><img src="../graphic/icons/go.png" /></a></td>'; }  ?>
					<td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=info_village&amp;id=<?php echo $this->_tpl_vars['id']; ?>
"><?php echo $this->_tpl_vars['arr']['name']; ?>
</a></td>
					<td align="center"><?php echo $this->_tpl_vars['arr']['x']; ?>
|<?php echo $this->_tpl_vars['arr']['y']; ?>
</td>
					<td align="center"><?php echo ((is_array($_tmp=$this->_tpl_vars['arr']['points'])) ? $this->_run_mod_handler('format_number', true, $_tmp) : format_number($_tmp)); ?>
</td>
				</tr>
				<?php endforeach; endif; unset($_from); ?>
			</table>
		</td>
		<td align="right" valign="top" width="55%">
			<?php if (! empty ( $this->_tpl_vars['info_user']['image'] ) || $this->_tpl_vars['age'] != '-1' || $this->_tpl_vars['sex'] != '-1' || $this->_tpl_vars['info_user']['home'] != ''): ?>
			<table class="vis" width="100%" style="border-spacing: 1px; background-color: #FEE47D; border:1px solid #fee47d;-moz-border-radius:5px 5px 5px 5px;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px;">
				<tr><th colspan="2">Perfil <span style="float:right;"><?php  if ($_GET['id'] == $this->_tpl_vars['user']['id']) { echo '<a href="game.php?village='.$_GET['village'].'&screen=settings&mode=profile">Editar</a>'; }  ?></span></th></tr>
				<?php if (! empty ( $this->_tpl_vars['info_user']['image'] )): ?>
				<tr><td colspan="2" align="center"><img src="graphic/player/<?php echo $this->_tpl_vars['info_user']['image']; ?>
" title="Bras&atilde;o de: <?php echo $this->_tpl_vars['info_user']['username']; ?>
" /></td></tr>
				<?php endif; ?>
				<?php if ($this->_tpl_vars['age'] != -1): ?>
				<tr><td>Idade:</td><td><?php echo $this->_tpl_vars['age']; ?>
</td></tr>
				<?php endif; ?>
				<?php if ($this->_tpl_vars['sex'] != -1): ?>
				<tr><td>Sexo:</td><td><?php echo $this->_tpl_vars['sex']; ?>
</td></tr>
				<?php endif; ?>
				<?php if ($this->_tpl_vars['info_user']['home'] != ''): ?>
				<tr><td>Localiza&ccedil;&atilde;o:</td><td><?php echo $this->_tpl_vars['info_user']['home']; ?>
</td></tr>
				<?php endif; ?>
			</table><br />
			<?php endif; ?>
			<?php if (! empty ( $this->_tpl_vars['info_user']['personal_text'] )): ?>
			<table class="vis" width="100%" style="border-spacing: 1px; background-color: #FEE47D; border:1px solid #fee47d;-moz-border-radius:5px 5px 5px 5px;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px;">
				<tr><th>Testo pessoal</th></tr>
				<tr><td align="center"><?php echo ((is_array($_tmp=$this->_tpl_vars['info_user']['personal_text'])) ? $this->_run_mod_handler('bb_format', true, $_tmp) : bb_format($_tmp)); ?>
</td></tr>
			</table>
			<?php endif; ?>
		</td>
	</tr>
</table>