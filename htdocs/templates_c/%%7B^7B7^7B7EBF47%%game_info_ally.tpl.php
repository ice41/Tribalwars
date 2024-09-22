<?php /* Smarty version 2.6.14, created on 2012-04-29 08:55:48
         compiled from game_info_ally.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'format_number', 'game_info_ally.tpl', 8, false),)), $this); ?>
<table><tr><td valign="top">

<table class="vis" width="100%">
<tr><th colspan="2">&#206;nsu&#351;iri</th></tr>
<tr><td width="100">Numele tribului:</td><td><?php echo $this->_tpl_vars['info']['name']; ?>
</td></tr>
<tr><td>Prescurtare:</td><td><?php echo $this->_tpl_vars['info']['short']; ?>
</td></tr>
<tr><td>Num&#259;r de membri:</td><td><?php echo $this->_tpl_vars['info']['members']; ?>
</td></tr>
<tr><td>Punctajul celor mai buni 40 juc&#259;tori:</td><td><?php echo ((is_array($_tmp=$this->_tpl_vars['info']['best_points'])) ? $this->_run_mod_handler('format_number', true, $_tmp) : format_number($_tmp)); ?>
</td></tr>
<tr><td>Punctaj total:</td><td><?php echo ((is_array($_tmp=$this->_tpl_vars['info']['points'])) ? $this->_run_mod_handler('format_number', true, $_tmp) : format_number($_tmp)); ?>
</td></tr>
<tr><td>Punctaj mediu:</td><td><?php echo ((is_array($_tmp=$this->_tpl_vars['info']['cutthroungt'])) ? $this->_run_mod_handler('format_number', true, $_tmp) : format_number($_tmp)); ?>
</td></tr>
<tr><td>Loc:</td><td><?php echo $this->_tpl_vars['info']['rank']; ?>
</td></tr>

<tr><td>Homepage:</td><td><a href="<?php echo $this->_tpl_vars['ally']['homepage']; ?>
" target="_blank"><?php echo $this->_tpl_vars['ally']['homepage']; ?>
</a></td></tr>
<?php if (! empty ( $this->_tpl_vars['ally']['irc'] )): ?>
    <tr><td>IRC-Channel:</td><td><?php echo $this->_tpl_vars['ally']['irc']; ?>
</td></tr>
<?php endif; ?>

<tr><td colspan="2" align="center"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=info_member&amp;id=<?php echo $this->_tpl_vars['info']['id']; ?>
">Membri</a></td></tr>
</table>

</td><td valign="top">

<table class="vis" width="300">
<?php if (! empty ( $this->_tpl_vars['info']['image'] )): ?>
	<tr><td align="center"><img src="./graphic/ally/<?php echo $this->_tpl_vars['info']['image']; ?>
"></td></tr>
<?php endif; ?>
<tr><th>Descriere</th></tr>
<tr><td align="center"><?php 
$ce2 = Array("wurde von"," gegründet","Wendet euch bei Fragen an","Dieser Text kann von den Diplomaten des Stammes geändert werden.");
$cu_ce2 = Array("a fost creat de",".","Adresati orice intrebare lui","Acest text poate fi schimbat/editat de liderii tribului.");
echo bb_format(str_replace($ce2,$cu_ce2,$this->_tpl_vars['ally']['description']));
 ?></td></tr>
</table>

</td></tr></table>