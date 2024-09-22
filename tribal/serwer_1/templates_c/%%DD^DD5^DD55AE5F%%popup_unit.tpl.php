<?php /* Smarty version 2.6.14, created on 2014-07-03 02:39:02
         compiled from ../templates/popup_unit.tpl */ ?>
<?php echo '<?xml'; ?>
 version="1.0" encoding="UTF-8"<?php echo '?>'; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title><?php echo $this->_tpl_vars['cl_units']->get_name($this->_tpl_vars['unit']); ?>
</title>
		<meta http-equiv="content-type" content="text/html; charset=windows-1250" />

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
										<th width="150">Zapotrzebowanie</th>
										<th>Osadnicy</th>
										<th>Szybkość</th>
										<th>Łupy</th>
									</tr>

									<tr class="center">
										<td>
											<img src="/ds_graphic/holz.png" title="Drewno" alt="" /><?php echo $this->_tpl_vars['cl_units']->get_woodprice($this->_tpl_vars['unit']); ?>
 
											<img src="/ds_graphic/lehm.png" title="Glina" alt="" /><?php echo $this->_tpl_vars['cl_units']->get_stoneprice($this->_tpl_vars['unit']); ?>
 
											<img src="/ds_graphic/eisen.png" title="Żelazo" alt="" /><?php echo $this->_tpl_vars['cl_units']->get_ironprice($this->_tpl_vars['unit']); ?>
 
										</td>
										<td>
											<img src="/ds_graphic/face.png" title="Wieśniak" alt="" /> <?php echo $this->_tpl_vars['cl_units']->get_bhprice($this->_tpl_vars['unit']); ?>

										</td>
										<td>
											<?php echo $this->_tpl_vars['cl_units']->get_speed($this->_tpl_vars['unit']); ?>
 Minut na pole
										</td>
										<td>
											<?php echo $this->_tpl_vars['cl_units']->get_booty($this->_tpl_vars['unit']); ?>

										</td>
									</tr>
								</table>
								
								<br />

								<table class="vis">
									<tr>
										<td>Siła ataku</td>
										<td>
											<img src="/ds_graphic/unit/att.png" alt="Siła ataku" /> <?php echo $this->_tpl_vars['cl_units']->get_att($this->_tpl_vars['unit'],1); ?>

										</td>
									</tr>
									<tr>
										<td>Siła obrony</td>
										<td>
											<img src="/ds_graphic/unit/def.png" alt="Siła obrony" /> <?php echo $this->_tpl_vars['cl_units']->get_def($this->_tpl_vars['unit'],1); ?>

										</td>
									</tr>
									<tr>
										<td>Siła obrony przeciw kawalerii</td>
										<td>
											<img src="/ds_graphic/unit/def_cav.png" alt="Siła obrony przeciw kawalerii" /> <?php echo $this->_tpl_vars['cl_units']->get_defCav($this->_tpl_vars['unit'],1); ?>
</td>
									</tr>
									<tr>
										<td>Siła obrony przeciw łucznikom</td>
										<td><img src="/ds_graphic/unit/def_archer.png" alt="Siła obrony przeciw łucznikom" /> <?php echo $this->_tpl_vars['cl_units']->get_defArcher($this->_tpl_vars['unit'],1); ?>
</td>
									</tr>
							</table>
							
							<br />

							<table class="vis">
								<tr>
									<th colspan="<?php echo $this->_tpl_vars['cl_units']->get_countNeeded($this->_tpl_vars['unit']); ?>
">Wymagane poziomy budynków, aby móc rekrutować daną jednostkę</th>
								</tr>
								
								<tr>
									<?php if (count ( $this->_tpl_vars['cl_units']->get_needed($this->_tpl_vars['unit']) ) > 0): ?>
										<?php $_from = $this->_tpl_vars['cl_units']->get_needed($this->_tpl_vars['unit']); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['n_unit'] => $this->_tpl_vars['n_stage']):
?>
											<td>
												<a href="popup_building.php?building=<?php echo $this->_tpl_vars['n_unit']; ?>
"><?php echo $this->_tpl_vars['cl_builds']->get_name($this->_tpl_vars['n_unit']); ?>
</a> (Poziom <?php echo $this->_tpl_vars['n_stage']; ?>
)
											</td>
										<?php endforeach; endif; unset($_from); ?>
									<?php else: ?>
										<td>Jednostka dostępna bez wymagań.</td>
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