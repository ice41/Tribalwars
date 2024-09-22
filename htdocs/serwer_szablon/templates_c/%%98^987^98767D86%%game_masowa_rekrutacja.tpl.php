<?php /* Smarty version 2.6.14, created on 2012-01-30 18:43:28
         compiled from game_masowa_rekrutacja.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'format_number', 'game_masowa_rekrutacja.tpl', 34, false),)), $this); ?>
<form action="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=masowa_rekrutacja&amp;action=trenuj" method="post">
	<?php if ($this->_tpl_vars['sekcja']): ?>
    <table class="vis" width="100%">
	    <tr>
		    <td>
			    <?php echo $this->_tpl_vars['sekcja_wiosek']; ?>
 
			</td>
		</tr>
	</table>
	<?php endif; ?>
    <table class="vis" width="100%">
        <tr>
		    <th>Osada</th>
			<th>Surowce</th>
			<th>
				<img src="graphic/face.png"/>
			</th>
            <?php $_from = $this->_tpl_vars['units']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['unit']):
?>
                <th width="50">
					<img src="graphic/unit/<?php echo $this->_tpl_vars['key']; ?>
.png" />
				</th>
            <?php endforeach; endif; unset($_from); ?>
            </tr>

            <?php $_from = $this->_tpl_vars['masowa_rek_wioski']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['wioska']):
?>
		        <tr<?php if ($this->_tpl_vars['wioska']['id'] == $this->_tpl_vars['village']['id']): ?> class="lit"<?php endif; ?>>
		            <td>
						<?php echo $this->_tpl_vars['bonus']->get_bonus_mini_image($this->_tpl_vars['wioska']['bonus']); ?>

                        <a href="game.php?village=<?php echo $this->_tpl_vars['wioska']['id']; ?>
&screen=barracks">
							<?php echo $this->_tpl_vars['wioska']['name']; ?>
 (<?php echo $this->_tpl_vars['wioska']['x']; ?>
|<?php echo $this->_tpl_vars['wioska']['y']; ?>
) K<?php echo $this->_tpl_vars['wioska']['continent']; ?>

						</a>
                    </td>
			        <td>
						<img src="graphic/holz.png"/>&nbsp;<?php echo ((is_array($_tmp=$this->_tpl_vars['wioska']['r_wood'])) ? $this->_run_mod_handler('format_number', true, $_tmp) : format_number($_tmp)); ?>
<br>
			            <img src="graphic/lehm.png"/>&nbsp;<?php echo ((is_array($_tmp=$this->_tpl_vars['wioska']['r_stone'])) ? $this->_run_mod_handler('format_number', true, $_tmp) : format_number($_tmp)); ?>
<br>
			            <img src="graphic/eisen.png"/>&nbsp;<?php echo ((is_array($_tmp=$this->_tpl_vars['wioska']['r_iron'])) ? $this->_run_mod_handler('format_number', true, $_tmp) : format_number($_tmp)); ?>
<br>
			        </td>
		            <td>
		                <img src="graphic/face.png"/>&nbsp;
						<?php echo ((is_array($_tmp=$this->_tpl_vars['wioska']['wolni_osadnicy'])) ? $this->_run_mod_handler('format_number', true, $_tmp) : format_number($_tmp)); ?>

		            </td>
			
		            <?php $_from = $this->_tpl_vars['units']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['unit']):
?>
                        <td>
		        	        <?php if ($this->_tpl_vars['cl_units']->get_recruits_counts($this->_tpl_vars['wioska']['id'],$this->_tpl_vars['key']) === true): ?>
					            <center><img src="graphic/dots/green.png"/><?php echo $this->_tpl_vars['wioska'][$this->_tpl_vars['key']]; ?>
</center>
							<?php else: ?>
								<center><img src="graphic/dots/grey.png"/>&nbsp;<?php echo $this->_tpl_vars['wioska'][$this->_tpl_vars['key']]; ?>
</center>
							<?php endif; ?>
									
                            <?php if ($this->_tpl_vars['wioska']['tech_'.$this->_tpl_vars['key']] > 0):
								$this->_tpl_vars['max_units_cbr'] = $this->_tpl_vars['cl_units']->max_unit_can_be_recruited($this->_tpl_vars['wioska']['r_stone'],$this->_tpl_vars['wioska']['r_wood'],$this->_tpl_vars['wioska']['r_iron'],$this->_tpl_vars['wioska']['wolni_osadnicy'],$this->_tpl_vars['unit']['koszt_stone'],$this->_tpl_vars['unit']['koszt_wood'],$this->_tpl_vars['unit']['koszt_iron'],$this->_tpl_vars['unit']['koszt_bh']);  ?>
								<?php if ($this->_tpl_vars['cl_units']->czy_spelniono_wymagania($this->_tpl_vars['wioska']['budynki'],$this->_tpl_vars['cl_units']->get_needed($this->_tpl_vars['key']))): ?>
									<?php if ($this->_tpl_vars['wioska']['budynki'][$this->_tpl_vars['unit']['rekrutuj_w']] > 0): ?>
										<center>
											<input name="massrek_<?php echo $this->_tpl_vars['wioska']['id']; ?>
-<?php echo $this->_tpl_vars['key']; ?>
" type="text" size="4" maxlength="5" id="massrek_<?php echo $this->_tpl_vars['wioska']['id']; ?>
-<?php echo $this->_tpl_vars['key']; ?>
" />
										</center>
										<center>
											<span class="click" onclick="insertNumId('massrek_<?php echo $this->_tpl_vars['wioska']['id']; ?>
-<?php echo $this->_tpl_vars['key']; ?>
', '<?php echo $this->_tpl_vars['max_units_cbr']; ?>
');countCoins();return false;">
												<span class="link">
													(<?php echo ((is_array($_tmp=$this->_tpl_vars['max_units_cbr'])) ? $this->_run_mod_handler('format_number', true, $_tmp) : format_number($_tmp)); ?>
)
												</span>
											</span>
										</center>
									<?php else: ?>
										<INPUT READONLY NAME="massrek_<?php echo $this->_tpl_vars['wioska']['id']; ?>
-<?php echo $this->_tpl_vars['key']; ?>
" size="4" style="background: rgb(222,222,222); border-color: rgb(188,99,55); margin-left: 1px; border: 1px" >
									<?php endif; ?>
								<?php else: ?>
									<INPUT READONLY NAME="massrek_<?php echo $this->_tpl_vars['wioska']['id']; ?>
-<?php echo $this->_tpl_vars['key']; ?>
" size="4" style="background: rgb(222,222,222); border-color: rgb(188,99,55); margin-left: 1px; border: 1px" >
								<?php endif; ?>
				            <?php else: ?>
									<INPUT READONLY NAME="massrek_<?php echo $this->_tpl_vars['wioska']['id']; ?>
-<?php echo $this->_tpl_vars['key']; ?>
" size="4" style="background: rgb(222,222,222); border-color: rgb(188,99,55); margin-left: 1px; border: 1px" >
					        <?php endif; ?>
			            </td>
                    <?php endforeach; endif; unset($_from); ?>
		        </tr>
            <?php endforeach; endif; unset($_from); ?>
		    <tr>
		        <td colspan=15 style="height:24px;">
		            <input type="submit" name="submitex" value="trenuj" style="margin-top:1px; width:100px;"/>
	     	    </td>
		    <tr>
        </table>
    </form>