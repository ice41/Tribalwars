<?php /* Smarty version 2.6.14, created on 2012-12-30 01:45:33
         compiled from game_farm.tpl */ ?>
<table>
	<tr>
		<td>
			<img src="graphic/big_buildings/farm.png" title="Ferm&#259;" alt="" />
		</td>
		<td>
			<h2>Ferm&#259; (Nivelul <?php echo $this->_tpl_vars['village']['farm']; ?>
)</h2>
				<?php echo $this->_tpl_vars['description']; ?>

			</td>
		</tr>
	</table>
	<br />
	<table class="vis">
		<tr>
			<td>
				<img src="graphic/face.png" title="Locuitori" alt="" />
				Popula&#355;ie maxim&#259;
			</td>
			<td>
				<b><?php echo $this->_tpl_vars['farm_datas']['farm_size']; ?>
</b>
			</td>
		</tr>

		<?php if (( $this->_tpl_vars['farm_datas']['farm_size_next'] ) == false): ?>

		<?php else: ?>

			<tr>
				<td>
					<img src="graphic/face.png" title="Locuitori" alt="" />
					Popula&#355;ie maxim&#259; pentru (Nivelul <?php echo $this->_tpl_vars['village']['farm']+1; ?>
)
				</td>
				<td>
					<strong><?php echo $this->_tpl_vars['farm_datas']['farm_size_next']; ?>
</strong>
				</td>
			</tr>
    	<?php endif; ?>

</table>