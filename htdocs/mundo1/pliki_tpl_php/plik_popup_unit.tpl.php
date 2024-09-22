<?php /* Wersja Smarty_class 2.6.26 Przeróbka By Bartekst221, Plik stworzony 2023-02-26 21:23:02
         Wersja PHP pliku pliki_tpl/popup_unit.tpl */ ?>
<?php echo '<?xml'; ?>
 version="1.0" encoding="UTF-8"<?php echo '?>'; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title><?php echo $this->_tpl_vars['cl_units']->get_name($this->_tpl_vars['unit']); ?>
</title>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8" />

		<link rel="stylesheet" type="text/css" href="game.css?1331133567" />
		<link rel="stylesheet" type="text/css" href="styl.css?1331133567" />

	</head>

	<body id="ds_body" class="header" >
		<table style="margin:auto; margin-top: 15px; width: 100%;padding:5px;">
			<tr>
				<td>
					<table class="content-border" id="content_value" style="border-collapse: collapse; width: 100%; padding: 10px;">
						<tr>
							<td>
								<table>
									<tr>
										<td>
											<img src="/ds_graphic/unit_big/<?php echo $this->_tpl_vars['cl_units']->get_graphicName($this->_tpl_vars['unit']); ?>
.png" alt="<?php echo $this->_tpl_vars['cl_units']->get_name($this->_tpl_vars['unit']); ?>
" />
										</td>
										<td>
											<h2><?php echo $this->_tpl_vars['cl_units']->get_name($this->_tpl_vars['unit']); ?>
</h2>
											<p><?php echo $this->_tpl_vars['cl_units']->get_description($this->_tpl_vars['unit']); ?>
</p>
										</td>
									</tr>
								</table>

								<table class="vis">
									<tr>
										<th width="150">Custos</th>
										<th>colonos</th>
										<th>Velocidade</th>
										<th>custo</th>
									</tr>

									<tr class="center">
										<td>
											<img src="/ds_graphic/holz.png" title="Madeiara" alt="" /><?php echo $this->_tpl_vars['cl_units']->get_woodprice($this->_tpl_vars['unit']); ?>
 
											<img src="/ds_graphic/lehm.png" title="Argila" alt="" /><?php echo $this->_tpl_vars['cl_units']->get_stoneprice($this->_tpl_vars['unit']); ?>
 
											<img src="/ds_graphic/eisen.png" title="Ferro" alt="" /><?php echo $this->_tpl_vars['cl_units']->get_ironprice($this->_tpl_vars['unit']); ?>
 
										</td>
										<td>
											<img src="/ds_graphic/face.png" title="População" alt="" /> <?php echo $this->_tpl_vars['cl_units']->get_bhprice($this->_tpl_vars['unit']); ?>

										</td>
										<td>
											<?php echo $this->_tpl_vars['cl_units']->get_speed($this->_tpl_vars['unit']); ?>
 Minutos por campo
										</td>
										<td>
											<?php echo $this->_tpl_vars['cl_units']->get_booty($this->_tpl_vars['unit']); ?>

										</td>
									</tr>
								</table>
								
								<br />

								<table class="vis">
									<tr>
										<td>Poder de ataque</td>
										<td>
											<img src="/ds_graphic/unit/att.png" alt="Poder de ataque" /> <?php echo $this->_tpl_vars['cl_units']->get_att($this->_tpl_vars['unit'],1); ?>

										</td>
									</tr>
									<tr>
										<td>Poder de defesa</td>
										<td>
											<img src="/ds_graphic/unit/def.png" alt="Poder de defesa" /> <?php echo $this->_tpl_vars['cl_units']->get_def($this->_tpl_vars['unit'],1); ?>

										</td>
									</tr>
									<tr>
										<td>Defesa contra cavalaria</td>
										<td>
											<img src="/ds_graphic/unit/def_cav.png" alt="Defesa contra cavalaria" /> <?php echo $this->_tpl_vars['cl_units']->get_defCav($this->_tpl_vars['unit'],1); ?>
</td>
									</tr>
									<tr>
										<td>Poder de defesa contra arqueiros</td>
										<td><img src="/ds_graphic/unit/def_archer.png" alt="Poder de defesa contra arqueiros" /> <?php echo $this->_tpl_vars['cl_units']->get_defArcher($this->_tpl_vars['unit'],1); ?>
</td>
									</tr>
							</table>
							
							<br />

							<table class="vis">
								<tr>
									<th colspan="<?php echo $this->_tpl_vars['cl_units']->get_countNeeded($this->_tpl_vars['unit']); ?>
">Níveis de construção necessários para recrutar esta unidade</th>
								</tr>
								
								<tr>
									<?php if (count ( $this->_tpl_vars['cl_units']->get_needed($this->_tpl_vars['unit']) ) > 0): ?>
										<?php $_from = $this->_tpl_vars['cl_units']->get_needed($this->_tpl_vars['unit']); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['n_unit'] => $this->_tpl_vars['n_stage']):
?>
											<td>
												<a href="popup_building.php?building=<?php echo $this->_tpl_vars['n_unit']; ?>
"><?php echo $this->_tpl_vars['cl_builds']->get_name($this->_tpl_vars['n_unit']); ?>
</a> (Nível <?php echo $this->_tpl_vars['n_stage']; ?>
)
											</td>
										<?php endforeach; endif; unset($_from); ?>
									<?php else: ?>
										<td>Unidade disponível sem requisitos.</td>
									<?php endif; ?>
								</tr>
							</table>
							<br />
							</td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
	</body>
</html>