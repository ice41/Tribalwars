<?php /* Smarty version 2.6.14, created on 2012-04-29 08:58:10
         compiled from ../templates/popup_building.tpl */ ?>
<?php echo '<?xml'; ?>
 version="1.0"<?php echo '?>'; ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php echo $this->_tpl_vars['cl_builds']->get_name($this->_tpl_vars['building']); ?>
</title>
<link rel="stylesheet" type="text/css" href="stamm.css" />
<script src="script.js?1176997364" type="text/javascript"></script>
</head>
<body>
<table class="main" width="100%" align="center"><tr><td>
<h2><?php echo $this->_tpl_vars['cl_builds']->get_name($this->_tpl_vars['building']); ?>
</h2>
<p><?php echo $this->_tpl_vars['cl_builds']->get_description_bydbname($this->_tpl_vars['building']); ?>
</p>

<p>Nivelul maxim de extindere: <b><?php echo $this->_tpl_vars['cl_builds']->get_maxstage($this->_tpl_vars['building']); ?>
</b></p>

<?php if (count ( $this->_tpl_vars['cl_builds']->get_needed_by_dbname($this->_tpl_vars['building']) ) > 0): ?>
	<table class="vis"><tr><th colspan="3">Condi&#355;ii</th></tr>
		<tr>
			<?php $_from = $this->_tpl_vars['cl_builds']->get_needed_by_dbname($this->_tpl_vars['building']); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['n_building'] => $this->_tpl_vars['n_stage']):
?>
				<td><a href="popup_building.php?building=<?php echo $this->_tpl_vars['n_building']; ?>
"><?php echo $this->_tpl_vars['cl_builds']->get_name($this->_tpl_vars['n_building']); ?>
</a> (Nivelul <?php echo $this->_tpl_vars['n_stage']; ?>
)</td>
			<?php endforeach; endif; unset($_from); ?>
		</tr>
	</table>
<?php endif; ?>

<table class="vis">
<tr>
<th>Nivelul</th><th width="220">Necesitate</th><th width="110">Muncitori pentru nivelul/total</th></tr>
<?php unset($this->_sections['foo']);
$this->_sections['foo']['name'] = 'foo';
$this->_sections['foo']['start'] = (int)1;
$this->_sections['foo']['loop'] = is_array($_loop=$this->_tpl_vars['cl_builds']->get_maxstage($this->_tpl_vars['building'])+1) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['foo']['step'] = ((int)1) == 0 ? 1 : (int)1;
$this->_sections['foo']['show'] = true;
$this->_sections['foo']['max'] = $this->_sections['foo']['loop'];
if ($this->_sections['foo']['start'] < 0)
    $this->_sections['foo']['start'] = max($this->_sections['foo']['step'] > 0 ? 0 : -1, $this->_sections['foo']['loop'] + $this->_sections['foo']['start']);
else
    $this->_sections['foo']['start'] = min($this->_sections['foo']['start'], $this->_sections['foo']['step'] > 0 ? $this->_sections['foo']['loop'] : $this->_sections['foo']['loop']-1);
if ($this->_sections['foo']['show']) {
    $this->_sections['foo']['total'] = min(ceil(($this->_sections['foo']['step'] > 0 ? $this->_sections['foo']['loop'] - $this->_sections['foo']['start'] : $this->_sections['foo']['start']+1)/abs($this->_sections['foo']['step'])), $this->_sections['foo']['max']);
    if ($this->_sections['foo']['total'] == 0)
        $this->_sections['foo']['show'] = false;
} else
    $this->_sections['foo']['total'] = 0;
if ($this->_sections['foo']['show']):

            for ($this->_sections['foo']['index'] = $this->_sections['foo']['start'], $this->_sections['foo']['iteration'] = 1;
                 $this->_sections['foo']['iteration'] <= $this->_sections['foo']['total'];
                 $this->_sections['foo']['index'] += $this->_sections['foo']['step'], $this->_sections['foo']['iteration']++):
$this->_sections['foo']['rownum'] = $this->_sections['foo']['iteration'];
$this->_sections['foo']['index_prev'] = $this->_sections['foo']['index'] - $this->_sections['foo']['step'];
$this->_sections['foo']['index_next'] = $this->_sections['foo']['index'] + $this->_sections['foo']['step'];
$this->_sections['foo']['first']      = ($this->_sections['foo']['iteration'] == 1);
$this->_sections['foo']['last']       = ($this->_sections['foo']['iteration'] == $this->_sections['foo']['total']);
?>
<tr>
	<td><?php echo $this->_sections['foo']['index']; ?>
</td>
	<td><img src="graphic/holz.png" title="Lemn" alt="" /><?php echo $this->_tpl_vars['cl_builds']->get_wood($this->_tpl_vars['building'],$this->_sections['foo']['index']); ?>
 <img src="graphic/lehm.png" title="Argil&#259;" alt="" /><?php echo $this->_tpl_vars['cl_builds']->get_stone($this->_tpl_vars['building'],$this->_sections['foo']['index']); ?>
 <img src="graphic/eisen.png" title="Fier" alt="" /><?php echo $this->_tpl_vars['cl_builds']->get_iron($this->_tpl_vars['building'],$this->_sections['foo']['index']); ?>
 </td>
	<td><img src="graphic/face.png" title="Ferma" alt="" /><?php echo $this->_tpl_vars['cl_builds']->get_bh($this->_tpl_vars['building'],$this->_sections['foo']['index']); ?>
 / <?php echo $this->_tpl_vars['cl_builds']->get_bh_total(); ?>
</td>
</tr>
<?php endfor; endif; ?>
</table>

</td></tr></table>
<script type="text/javascript">setImageTitles();</script>
</body>
</html>