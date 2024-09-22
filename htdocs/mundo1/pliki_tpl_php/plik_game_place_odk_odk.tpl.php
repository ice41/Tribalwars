<?php /* Wersja Smarty_class 2.6.26 Przeróbka By Bartekst221, Plik stworzony 2023-02-26 23:19:43
         Wersja PHP pliku pliki_tpl/game_place_odk_odk.tpl */ ?>


	
	<table class="vis">	<tr><th>Lista de Descobertas de Aldeias:</th></tr>																			
			
						<?php $_from = $this->_tpl_vars['odkrycia']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['o']):
?>
							<?php if ($this->_tpl_vars['o']['wioska'] == $this->_tpl_vars['village']['id']): ?>
						<tr><td>		
				<b><img src="../ds_graphic/secret_scroll_15x15.png"> <?php if ($this->_tpl_vars['o']['typ'] == 1): ?>Fortaleza estrela<?php endif; ?> <?php if ($this->_tpl_vars['o']['typ'] == 2): ?>Pólvora<?php endif; ?> <?php if ($this->_tpl_vars['o']['typ'] == 3): ?>Ocupado<?php endif; ?> <?php if ($this->_tpl_vars['o']['typ'] == 4): ?>Decimais<?php endif; ?> <?php if ($this->_tpl_vars['o']['typ'] == 5): ?>relógio de sol<?php endif; ?> <?php if ($this->_tpl_vars['o']['typ'] == 6): ?>Muszkiet<?php endif; ?> <?php if ($this->_tpl_vars['o']['typ'] == 7): ?>republicanismo clássico<?php endif; ?> <?php if ($this->_tpl_vars['o']['typ'] == 8): ?>Cifra<?php endif; ?> <?php if ($this->_tpl_vars['o']['typ'] == 9): ?>Cartografia<?php endif; ?> <?php if ($this->_tpl_vars['o']['typ'] == 10): ?>Pintura em perspectiva<?php endif; ?> <?php if ($this->_tpl_vars['o']['typ'] == 11): ?>Anatomia<?php endif; ?> <?php if ($this->_tpl_vars['o']['typ'] == 12): ?>Regra de gravação dupla<?php endif; ?>
							</td></tr>	<?php endif; ?>					
							<?php endforeach; endif; unset($_from); ?>
																																





</table>