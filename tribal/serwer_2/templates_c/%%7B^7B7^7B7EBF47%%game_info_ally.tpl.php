<?php /* Smarty version 2.6.14, created on 2014-07-03 03:10:02
         compiled from game_info_ally.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'format_number', 'game_info_ally.tpl', 17, false),)), $this); ?>
<?php 
$ally_id = $this->_tpl_vars['info']['id'];
global $cl_builds,$cl_units,$pl;
$this->tpl_vars['bb_interpreter'] = new bb_interpreter($cl_builds,$cl_units,$pl);

$ally_description = sql("SELECT `description` FROM `ally` WHERE `id` = '$ally_id'","array");
$this->_tpl_vars['info']['description'] = $this->tpl_vars['bb_interpreter']->load_bb($ally_description,$this->_tpl_vars['village']['id']);
 ?>

<table><tr><td valign="top">

<table class="vis" width="350">
<tr><th colspan="2">Propriedades</th></tr>
<tr><td>Nome da tribo:</td><td><?php echo $this->_tpl_vars['info']['name']; ?>
</td></tr>
<tr><td>Sigla:</td><td><?php echo $this->_tpl_vars['info']['short']; ?>
</td></tr>
<tr><td>Número de membros:</td><td><?php echo $this->_tpl_vars['info']['members']; ?>
</td></tr>
<tr><td>Pontos dos 40 melhores jogadores:</td><td><?php echo ((is_array($_tmp=$this->_tpl_vars['info']['best_points'])) ? $this->_run_mod_handler('format_number', true, $_tmp) : format_number($_tmp)); ?>
</td></tr>
<tr><td>Número de pontos:</td><td><?php echo ((is_array($_tmp=$this->_tpl_vars['info']['points'])) ? $this->_run_mod_handler('format_number', true, $_tmp) : format_number($_tmp)); ?>
</td></tr>
<tr><td>Média de pontos por jogador:</td><td><?php echo ((is_array($_tmp=$this->_tpl_vars['info']['cutthroungt'])) ? $this->_run_mod_handler('format_number', true, $_tmp) : format_number($_tmp)); ?>
</td></tr>
<tr><td>Posição:</td><td><?php echo $this->_tpl_vars['info']['rank']; ?>
</td></tr>

<tr><td>Home page:</td><td><a href="<?php echo $this->_tpl_vars['ally']['homepage']; ?>
" target="_blank"><?php echo $this->_tpl_vars['ally']['homepage']; ?>
</a></td></tr>
<?php if (! empty ( $this->_tpl_vars['ally']['irc'] )): ?>
    <tr><td>canal IRC:</td><td><?php echo $this->_tpl_vars['ally']['irc']; ?>
</td></tr>
<?php endif; ?>

<tr><td colspan="2" align="center"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=info_member&amp;id=<?php echo $this->_tpl_vars['info']['id']; ?>
">Membros</a></td></tr>
</table>

</td><td valign="top">

<table class="vis" width="350">
<?php if (! empty ( $this->_tpl_vars['info']['image'] )): ?>
	<tr><td align="center"><img src="graphic/ally/<?php echo $this->_tpl_vars['info']['image']; ?>
"></td></tr>
<?php endif; ?>
<tr><th>Descrição</th></tr>
<tr><td align="center">
<?php 
$ce4 = Array("+wurde+von+","+gegr%FCndet%0AWendet+euch+bei+Fragen+an+","%0A%0ADieser+Text+kann+von+den+Diplomaten+des+Stammes+ge%E4ndert+werden.");
$cu_ce4 = Array(" foi criada por ",". Se tem uma pergunta, na cabeça fale com","<br/><br/><i>Este texto pode ser alterado pelos diplomatas da tribo.<i>");
echo str_replace($ce4,$cu_ce4,$this->_tpl_vars['info']['description']);

// {$info.description}

 ?>
</td></tr>
</table>

</td></tr></table>