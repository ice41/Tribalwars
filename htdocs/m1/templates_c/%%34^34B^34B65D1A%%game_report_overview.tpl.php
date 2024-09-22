<?php /* Smarty version 2.6.14, created on 2016-12-22 21:35:45
         compiled from game_report_overview.tpl */ ?>
<form action="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=report&amp;mode=<?php echo $this->_tpl_vars['mode']; ?>
&amp;action=del_arch&amp;h=<?php echo $this->_tpl_vars['hkey']; ?>
" method="post">
	<table class="vis" width="100%" style="border-spacing: 1px; background-color: #FEE47D; border:1px solid #fee47d;-moz-border-radius:5px 5px 5px 5px;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px;">
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
			<th>Assunto</th>
			<th>Recursos saqueados</th>
			<th width="140">Recebido em</th>
		</tr>
		<?php if (count ( $this->_tpl_vars['reports'] ) > 0): ?>
			<?php $_from = $this->_tpl_vars['reports']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['array']):
?>
				<?php echo $this->_tpl_vars['ida']; ?>

		<tr>
		<?php 
			$arr = $this->_tpl_vars['key']; 
			$hives = mysql_fetch_array(mysql_query("SELECT hives,type,agreement FROM reports WHERE id = '$arr'"));
		 ?>
			<td <?php if($hives['type'] != 'attack'){echo 'colspan="2"';} ?>><input name="id_<?php echo $this->_tpl_vars['reports'][$this->_tpl_vars['key']]['id']; ?>
" type="checkbox" /> <a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=report&amp;mode=<?php echo $this->_tpl_vars['mode']; ?>
&amp;view=<?php echo $this->_tpl_vars['reports'][$this->_tpl_vars['key']]['id']; ?>
">
<?php 
	$explode_agreement = explode(";", $hives['agreement']);
	$data_terminaree=$this->_tpl_vars['reports'][$this->_tpl_vars['key']]['title'];
	if($explode_agreement['1'] < 0){
		if(preg_match('/greift/', $data_terminaree)){
			$data_terminaree = str_replace("greift","conquistou",$data_terminaree);
			$data_terminaree = str_replace(" an","",$data_terminaree);
		}
	}else{
		if(preg_match('/greift/', $data_terminaree)){
			$data_terminaree = str_replace("greift","atacou",$data_terminaree);
			$data_terminaree = str_replace(" an","",$data_terminaree);
		}
	}
	if(preg_match('/eingeladen/', $data_terminaree)) {
		$data_terminaree = str_replace("hat dich in den Stamm","te convidou para a tribo",$data_terminaree);
		$data_terminaree = str_replace(" eingeladen","",$data_terminaree);
	}
	if(preg_match('/Urlaubsvertretung/', $data_terminaree)) {
		$data_terminaree = str_replace("hat um eine Urlaubsvertretung angefragt","solicitou uma substituição!",$data_terminaree);
		$data_terminaree = str_replace("hat die Urlaubsvertretung beendet","terminou a substituição",$data_terminaree);
		$data_terminaree = str_replace("hat die Urlaubsvertretung angenommen","aceitou a solicitação de substituição",$data_terminaree);
	}
	if(preg_match('/eingeladen/', $data_terminaree)) {
		$data_terminaree = str_replace("Deine Unterstützung aus","Seu apoio em",$data_terminaree);
		$data_terminaree = str_replace(" wurde angegriffen","foi atacado",$data_terminaree);
	}
	if(preg_match('/hat deinen Stamm aufgel/', $data_terminaree)) {
		$data_terminaree = str_replace("hat deinen Stamm aufgel","debandou sua tribo",$data_terminaree);
		$data_terminaree = substr_replace($data_terminaree,"",-4);
	}
	$data_terminaree = str_replace("'","",$data_terminaree);
	if(preg_match('/Die Einladung des Stamm/', $data_terminaree)) {
		$data_terminaree = str_replace("Die Einladung des Stamm","O convite para a tribo",$data_terminaree);
		$data_terminaree = str_replace("wurde zur","foi cancelado",$data_terminaree);
		$data_terminaree = substr_replace($data_terminaree,"",-11);
	}
	if(preg_match('/Deine Unterstützung/', $data_terminaree)) {
		$data_terminaree = str_replace("Deine Unterstützung aus","Seu apoio de",$data_terminaree);
		$data_terminaree = str_replace("in","em",$data_terminaree);
		$data_terminaree = str_replace("wurde","foi atacado",$data_terminaree);
		$data_terminaree = substr_replace($data_terminaree,"",-11);
	}
	if(preg_match('/Deine UnterstÃ¼tzung/', $data_terminaree)) {
		$data_terminaree = str_replace("Deine UnterstÃ¼tzung aus","Seu apoio de",$data_terminaree);
		$data_terminaree = str_replace("in","em",$data_terminaree);
		$data_terminaree = str_replace("wurde","foi atacado",$data_terminaree);
		$data_terminaree = substr_replace($data_terminaree,"",-11);
	}

	if(preg_match('/unterstützt/', $data_terminaree)) {
		$data_terminaree = str_replace("unterstützt","apoiou",$data_terminaree);
	}
	if(preg_match('/unterstÃ¼tzt/', $data_terminaree)) {
		$data_terminaree = str_replace("unterstÃ¼tzt","apoiou",$data_terminaree);
	}
	if(preg_match('/Angebot von/', $data_terminaree)) {
		$data_terminaree = str_replace("Angebot von","Sua oferta foi aceita por",$data_terminaree);
		$data_terminaree = str_replace(" angenommen","",$data_terminaree);
	}
	$data_terminaree = str_replace("hat dein Angebot angenommen","aceitou sua oferta",$data_terminaree);
	$data_terminaree = str_replace("beliefert","forneceu",$data_terminaree);
	$data_terminaree = str_replace("besucht","visitou",$data_terminaree);

	$id_raport = $this->_tpl_vars['reports'][$this->_tpl_vars['key']]['id'];

	$titlu = $data_terminaree;
	$titlu = preg_replace("/\<img(.{1,})\>/i","",$titlu);

	$titlu = parse($titlu);

	if($data_terminaree<>$this->_tpl_vars['reports'][$this->_tpl_vars['key']]['title']){
		$sql5 = "UPDATE `reports` SET `title` = '$titlu' WHERE `id` = '$id_raport'";
		$exec_sql1 = mysql_query($sql5);
	}
	$data_terminaree = str_replace("graphic/dots", "../graphic/dots", $data_terminaree);
	echo $data_terminaree;
 ?>
			</a> <?php if ($this->_tpl_vars['reports'][$this->_tpl_vars['key']]['is_new'] == '1'): ?> <strong>(novo)</strong><?php else: ?><span class="inactive">(lido)</span><?php endif; ?></td>
<?php  
	$hivess = explode(";", $hives[0]);
	if($hives['type'] == 'attack'){ echo "<td align=\"center\">".number_format($hivess['3'], 0, '', '.')."<span class='inactive'> / ".number_format($hivess['4'], 0, '', '.')."</span></td>"; }else{ }
 ?> 
			<td><?php echo $this->_tpl_vars['reports'][$this->_tpl_vars['key']]['date']; ?>
</td>
		</tr>
			<?php endforeach; endif; unset($_from); ?>
		<tr>
			<th colspan="2"><input name="all" type="checkbox" onclick="selectAll(this.form, this.checked)" /> Selecionar todos </th>
			<th><div align="center"><input type="submit" value="Apagar" class="button" name="del" /></div></th>
		</tr>
		<?php endif; ?>
	</table>
</form>