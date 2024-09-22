<?php /* Smarty version 2.6.14, created on 2011-06-18 10:38:10
         compiled from game_report_overview.tpl */ ?>
<form action="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=report&amp;mode=<?php echo $this->_tpl_vars['mode']; ?>
&amp;action=del_arch&amp;h=<?php echo $this->_tpl_vars['hkey']; ?>
" method="post">
	<table class="vis" width="100%">
		<?php if ($this->_tpl_vars['num_pages'] > 1): ?>
			<tr>
				<td align="center" colspan="2">
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
&amp;screen=report&amp;mode=<?php echo $this->_tpl_vars['mode']; ?>
&amp;site=<?php echo $this->_sections['countpage']['index']; ?>
"> [<?php echo $this->_sections['countpage']['index']; ?>
] </a>
						<?php endif; ?>
					<?php endfor; endif; ?>
				</td>
			</tr>
		<?php endif; ?>
		<tr>
			<th>Subiect</th>
			<th width="140">Primire</th>
		</tr>
		<?php if (count ( $this->_tpl_vars['reports'] ) > 0): ?>
			<?php $_from = $this->_tpl_vars['reports']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['array']):
?>
				<?php echo $this->_tpl_vars['ida']; ?>

				<tr>
					<td><input name="id_<?php echo $this->_tpl_vars['reports'][$this->_tpl_vars['key']]['id']; ?>
" type="checkbox" /> <a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=report&amp;mode=<?php echo $this->_tpl_vars['mode']; ?>
&amp;view=<?php echo $this->_tpl_vars['reports'][$this->_tpl_vars['key']]['id']; ?>
"><?php 

$data_terminaree=$this->_tpl_vars['reports'][$this->_tpl_vars['key']]['title'];
if(preg_match('/greift/', $data_terminaree)) {
$data_terminaree = str_replace("greift","ataca",$data_terminaree);
$data_terminaree = str_replace(" an","",$data_terminaree);
}
if(preg_match('/eingeladen/', $data_terminaree)) {
$data_terminaree = str_replace("hat dich in den Stamm","te-a invitat in tribul",$data_terminaree);
$data_terminaree = str_replace(" eingeladen","",$data_terminaree);
}

if(preg_match('/hat deinen Stamm aufgel/', $data_terminaree)) {
$data_terminaree = str_replace("hat deinen Stamm aufgel","a dizolvat tribul in care te aflai",$data_terminaree);
$data_terminaree = substr_replace($data_terminaree,"",-4);
}
$data_terminaree = str_replace("'","",$data_terminaree);


if(preg_match('/Die Einladung des Stamm/', $data_terminaree)) {
$data_terminaree = str_replace("Die Einladung des Stamm","Invitatia tribului",$data_terminaree);
$data_terminaree = str_replace("wurde zur","a fost retrasa",$data_terminaree);
$data_terminaree = substr_replace($data_terminaree,"",-11);
}

if(preg_match('/Angebot von/', $data_terminaree)) {
$data_terminaree = str_replace("Angebot von","Oferta a fost acceptata de",$data_terminaree);
$data_terminaree = str_replace(" angenommen","",$data_terminaree);
}

$data_terminaree = str_replace("hat dein Angebot angenommen","a acceptat oferta",$data_terminaree);
$data_terminaree = str_replace("beliefert","aprovizioneaza",$data_terminaree);

$data_terminaree = str_replace("besucht","viziteaza",$data_terminaree);
$data_terminaree=urlencode($data_terminaree);

if(preg_match('/Deine/', $data_terminaree)) {
$data_terminaree = str_replace("Deine+Unterst%C3%BCtzung+aus","Sprijinul tau din",$data_terminaree);
$data_terminaree = str_replace("wurde+angegriffen","a fost atacat",$data_terminaree);
}

$data_terminaree = str_replace("unterst%C3%BCtzt","sprijina",$data_terminaree);
$data_terminaree=urldecode($data_terminaree);


$id_raport=$this->_tpl_vars['reports'][$this->_tpl_vars['key']]['id'];



$titlu=$data_terminaree;
$titlu = preg_replace("/\<img(.{1,})\>/i","",$titlu);

$titlu=urlencode($titlu);


if ($data_terminaree<>$this->_tpl_vars['reports'][$this->_tpl_vars['key']]['title']) {

$sql5 = "UPDATE `reports` SET `title` = '$titlu' WHERE `id` = '$id_raport'";
$exec_sql1 = mysql_query($sql5);
}

//Variabila originala tpl:{$reports.$key.title}

echo $data_terminaree;
 ?></a> <?php if ($this->_tpl_vars['reports'][$this->_tpl_vars['key']]['is_new'] == '1'): ?>(nou)<?php endif; ?></td>
					<td><?php echo $this->_tpl_vars['reports'][$this->_tpl_vars['key']]['date']; ?>
</td>
				</tr>
			<?php endforeach; endif; unset($_from); ?>
			<tr>
				<th><input name="all" type="checkbox" onclick="selectAll(this.form, this.checked)" /> Selecta&#355;i toate </th>
				<th></th>
			</tr>
			</table>

			<table class="vis" align="left">
			<tr>
				<td><input type="submit" value="Sterge" name="del" /></td>
			</tr>
		<?php endif; ?>
	</table>
</form>