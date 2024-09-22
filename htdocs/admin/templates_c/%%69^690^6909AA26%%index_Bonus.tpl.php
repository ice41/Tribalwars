<?php /* Smarty version 2.6.14, created on 2010-12-11 12:09:49
         compiled from index_Bonus.tpl */ ?>
<h1>Sate bonus</h1>
<h3>Editare sate</h3>
<br><?php echo $this->_tpl_vars['status']; ?>

<table border="1" width="100%" style="border-collapse: collapse" bordercolor="#000000" bgcolor="#F8F4E8">
	<tr>
		<td width="20%"><b>ID</b></td>
		<td width="20%"><b>Proprietar</b></td>
		<td width="20%"><b>Nume sat</b></td>
		<td width="20%"><b>Sat bonus</b></td>
		<td width="20%"><b>Actiune</b></td>
	</tr>
	<?php $_from = $this->_tpl_vars['villages']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['vill']):
?>
	<tr>
		<td><?php echo $this->_tpl_vars['vill']['id']; ?>
</td>
		<td><?php echo get_playername($this->_tpl_vars["vill"]["userid"]) ?></td>
		<td><?php echo $this->_tpl_vars['vill']['name']; ?>
</td>
		<td><?php if ($this->_tpl_vars['vill']['bonus'] > '0'): ?>Da<?php else: ?>Nu<?php endif; ?></td>
		<td><?php if ($this->_tpl_vars['vill']['bonus'] > '0'): ?><a href="?screen=bonus&delete=<?php echo $this->_tpl_vars['vill']['id']; ?>
">Sterge bonus</a><?php else: ?><a href="?screen=bonus&add=<?php echo $this->_tpl_vars['vill']['id']; ?>
">Adauga bonus</a><?php endif; ?></td>
	</tr>
	<?php endforeach; endif; unset($_from); ?>
</table>
<br>
<br>

<h3>Creeaza sate bonus</h3>

<form action="?screen=bonus&action=newvillages#status" method="post">
Numar:<br>
<input type="text" name="anzahl" size="3" maxlength="3">
<br><br>

Bonus:<br>
<select name="bonus">
	<option value="0">Aleatoriu</option>
	<option value="1">50% mai multa capacitate de depozitare si negustori</option>
	<option value="2">10% mai multa populatie</option>
	<option value="3">33% productie mai rapida in grajd</option>
	<option value="4">33% productie mai rapida in cazarma</option>
	<option value="5">50% productie mai rapida in atelier</option>
	<option value="6">30% productie marita de resurse ( toate resursele )</option>
</select>
<br><br>

<input type="submit" value="Creeaza">
</form><br>

<a name="status"></a>
<?php echo $this->_tpl_vars['error']; ?>
<br><br>
<center>&copy; by IceMan</center>