<?php /* Smarty version 2.6.14, created on 2012-05-04 11:07:29
         compiled from game_info_player.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'format_number', 'game_info_player.tpl', 23, false),)), $this); ?>
<?php 
$sql = "SELECT `personal_text` FROM `users` WHERE `id` = '".$this->_tpl_vars['info_user']['id']."'";
$this->_tpl_vars['info_user']['personal_text'] = sql($sql,'array');

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
<h2>Gracz <?php echo $this->_tpl_vars['info_user']['username']; ?>
</h2>

<table><tr><td valign="top">

<table class="vis" width="100%">
	<tr><th colspan="2"><?php echo $this->_tpl_vars['info_user']['username']; ?>
</th></tr>
	<tr><td width="80">Punkty:</td><td><?php echo ((is_array($_tmp=$this->_tpl_vars['info_user']['points'])) ? $this->_run_mod_handler('format_number', true, $_tmp) : format_number($_tmp)); ?>
</td></tr>
	<tr><td>Ranga:</td><td><?php echo $this->_tpl_vars['info_user']['rang']; ?>
</td></tr>
	<?php if (empty ( $this->_tpl_vars['info_ally']['short'] )): ?>
		<tr><td>Plemiê:</td><td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=info_ally&amp;id=0"></a></td></tr>
	<?php else: ?>
		<tr><td>Plemiê:</td><td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=info_ally&amp;id=<?php echo $this->_tpl_vars['info_ally']['id']; ?>
"><?php echo $this->_tpl_vars['info_ally']['short']; ?>
</a></td></tr>
	<?php endif; ?>

		<tr><td colspan="2"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=mail&amp;mode=new&amp;player=<?php echo $this->_tpl_vars['info_user']['id']; ?>
">&raquo; Napisz wiadomoœæ</a></td></tr>
		<?php if ($this->_tpl_vars['can_mark']): ?>
			<tr><td colspan="2"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=edytuj_kolory_graczy&amp;player=<?php echo $this->_tpl_vars['info_user']['id']; ?>
">&raquo; Zaznacz na mapie</a></td></tr>
		<?php endif; ?>
		<?php if ($this->_tpl_vars['can_invite']): ?>
			<tr><td colspan="2"><a href="javascript:ask('Czy chcesz zaprosiæ <?php echo $this->_tpl_vars['info_user']['username']; ?>
 do plemienia?', 'game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=ally&mode=invite&action=invite_id&id=<?php echo $this->_tpl_vars['info_user']['id']; ?>
&h=<?php echo $this->_tpl_vars['hkey']; ?>
')">&raquo; Zaprosiæ do plemienia</a></td></tr>
		<?php endif; ?>
		
	</table><br />



<table class="vis" width="100%">
	<tr><th width="180">Wioska</th><th width="80">Wspó³¿êdne</th><th>Punkty</th></tr>
		<?php $_from = $this->_tpl_vars['villages']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['arr']):
?>
			<tr><td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=info_village&amp;id=<?php echo $this->_tpl_vars['id']; ?>
"><?php echo $this->_tpl_vars['arr']['name']; ?>
</a></td><td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=map&x=<?php echo $this->_tpl_vars['arr']['x']; ?>
&y=<?php echo $this->_tpl_vars['arr']['y']; ?>
"/>(<?php echo $this->_tpl_vars['arr']['x']; ?>
|<?php echo $this->_tpl_vars['arr']['y']; ?>
)</a></td><td><?php echo ((is_array($_tmp=$this->_tpl_vars['arr']['points'])) ? $this->_run_mod_handler('format_number', true, $_tmp) : format_number($_tmp)); ?>
</td></tr>
		<?php endforeach; endif; unset($_from); ?>
	</table>

</td><td align="right" valign="top">

	
<table class="vis" width="100%">
	<tr><th colspan="2">Profil</th></tr>
	<?php if (! empty ( $this->_tpl_vars['info_user']['image'] )): ?>
		<tr><td colspan="2" align="center"><img src="graphic/player/<?php echo $this->_tpl_vars['info_user']['image']; ?>
" /></td></tr>
	<?php endif; ?>
	<?php if ($this->_tpl_vars['age'] != -1): ?>
		<tr><td>Wiek:</td><td><?php echo $this->_tpl_vars['age']; ?>
</td></tr>
	<?php endif; ?>
	<?php if ($this->_tpl_vars['sex'] != -1): ?>
		<tr><td>P³eæ:</td><td><?php echo $this->_tpl_vars['sex']; ?>
</td></tr>
	<?php endif; ?>
	<?php if ($this->_tpl_vars['info_user']['home'] != ''): ?>
		<tr><td>Miejsce zamieszkania:</td><td><?php echo $this->_tpl_vars['info_user']['home']; ?>
</td></tr>
	<?php endif; ?>
			
	</table>
	<br />
	<?php if (! empty ( $this->_tpl_vars['info_user']['personal_text'] )): ?>
		<table class="vis" width="100%">
			<tr><th>W³asny tekst</th></tr>
			<tr><td align="center"><?php echo $this->_tpl_vars['info_user']['personal_text']; ?>
</td></tr>
		</table>
	<?php endif; ?>
	<?php if ($this->_tpl_vars['display_awards']): ?>
		<?php echo $this->_tpl_vars['awards']->get_user_awards($this->_tpl_vars['info_user']['id'],$this->_tpl_vars['user']['id']); ?>

	<?php endif; ?>
</td></tr></table>