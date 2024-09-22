<?php /* Wersja Smarty_class 2.6.26 Przeróbka By Bartekst221, Plik stworzony 2024-01-10 02:19:16
         Wersja PHP pliku pliki_tpl/game_overview.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'format_time', 'game_overview.tpl', 252, false),array('modifier', 'format_number', 'game_overview.tpl', 341, false),)), $this); ?>


<br>
<table>
<tr>
  <td width="600" valign="top" valign="top">
   <table class="vis" width="100%">
        <tr>
                <th colspan="2">
          <i>Edifícios</i>
         </th>
        </tr>
        <?php if ($this->_tpl_vars['style'] == 'new'): ?>
         <tr>
          <td width="60%">
           <a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=overview&akcja=o_labels"><span><?php if ($this->_tpl_vars['labels']): ?>Ocultar níveis de construção<?php else: ?>Mostrar níveis de construção<?php endif; ?></span></a>
          </td>
          <td>
          <a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=overview&akcja=o_style"><span style="text-align:right;">Visão geral clássica da aldeia</span></a>
          </td>
         </tr>
         <tr>
          <td colspan="2">
           <table cellpadding="5">
                <tr>
                 <td>
                  <div style="position: relative; width: 600px;height: 418px; background-image: url(/ds_graphic/<?php echo $this->_tpl_vars['visual']; ?>
/back_none.jpg);"/>
                   <img class="empty" src="/ds_graphic/map/empty.png" alt="" usemap="#mapa" />
                   <map name="mapa" id="mapa">
                        <?php $_from = $this->_tpl_vars['cl_builds']->get_array('dbname'); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['dbname']):
?>
                         <?php if ($this->_tpl_vars['village'][$this->_tpl_vars['dbname']] > 0): ?>
                          <?php if ($this->_tpl_vars['cl_builds']->get_maxstage($this->_tpl_vars['dbname']) == 1): ?>
                           <area shape="poly" coords="<?php echo $this->_tpl_vars['builds_graphic_coords'][$this->_tpl_vars['dbname']]; ?>
" href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=<?php echo $this->_tpl_vars['dbname']; ?>
" alt="<?php echo $this->_tpl_vars['cl_builds']->get_name($this->_tpl_vars['dbname']); ?>
" title="<?php echo $this->_tpl_vars['cl_builds']->get_name($this->_tpl_vars['dbname']); ?>
"/>
                            <?php if ($this->_tpl_vars['dbname'] == 'place'): ?>
				   <a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=<?php echo $this->_tpl_vars['dbname']; ?>
"><img class="align_<?php echo $this->_tpl_vars['dbname']; ?>
" src="/ds_graphic/<?php echo $this->_tpl_vars['visual']; ?>
/<?php echo $this->_tpl_vars['dbname']; ?>
1.<?php echo $this->_tpl_vars['barracks']; ?>
" alt=""/></a>
                            <?php endif; ?>
		            <?php if ($this->_tpl_vars['dbname'] == 'snob'): ?>
				   <a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=<?php echo $this->_tpl_vars['dbname']; ?>
"><img class="align_<?php echo $this->_tpl_vars['dbname']; ?>
" src="/ds_graphic/<?php echo $this->_tpl_vars['visual']; ?>
/<?php echo $this->_tpl_vars['dbname']; ?>
1.<?php echo $this->_tpl_vars['snob']; ?>
" alt=""/></a>
                            <?php endif; ?>
		            <?php if ($this->_tpl_vars['dbname'] == 'statue'): ?>
				   <a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=<?php echo $this->_tpl_vars['dbname']; ?>
"><img class="align_<?php echo $this->_tpl_vars['dbname']; ?>
" src="/ds_graphic/<?php echo $this->_tpl_vars['visual']; ?>
/<?php echo $this->_tpl_vars['dbname']; ?>
1.png" alt=""/></a>
                            <?php endif; ?>
		            <?php if ($this->_tpl_vars['dbname'] == 'church'): ?>
				   <a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=<?php echo $this->_tpl_vars['dbname']; ?>
"><img class="align_<?php echo $this->_tpl_vars['dbname']; ?>
" src="/ds_graphic/<?php echo $this->_tpl_vars['visual']; ?>
/<?php echo $this->_tpl_vars['dbname']; ?>
3.png" alt=""/></a>
                            <?php endif; ?>							
		           <?php if ($this->_tpl_vars['labels']): ?>
                                <label class="stagetip label_<?php echo $this->_tpl_vars['dbname']; ?>
"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=<?php echo $this->_tpl_vars['dbname']; ?>
"><?php echo $this->_tpl_vars['village'][$this->_tpl_vars['dbname']]; ?>
</a></label>
								
                           <?php endif; ?>
                          <?php else: ?>
                           <?php if ($this->_tpl_vars['dbname'] == 'snob' || $this->_tpl_vars['dbname'] == 'hide'): ?>
                                <area shape="poly" coords="<?php echo $this->_tpl_vars['builds_graphic_coords'][$this->_tpl_vars['dbname']]; ?>
" href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=<?php echo $this->_tpl_vars['dbname']; ?>
" alt="<?php echo $this->_tpl_vars['cl_builds']->get_name($this->_tpl_vars['dbname']); ?>
" title="<?php echo $this->_tpl_vars['cl_builds']->get_name($this->_tpl_vars['dbname']); ?>
"/> 
					   <a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=<?php echo $this->_tpl_vars['dbname']; ?>
"><img class="align_<?php echo $this->_tpl_vars['dbname']; ?>
" src="/ds_graphic/<?php echo $this->_tpl_vars['visual']; ?>
/<?php echo $this->_tpl_vars['dbname']; ?>
1.png" alt=""/></a>
					  <?php if ($this->_tpl_vars['labels']): ?>
                                 <label class="stagetip label_<?php echo $this->_tpl_vars['dbname']; ?>
"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=<?php echo $this->_tpl_vars['dbname']; ?>
"><?php echo $this->_tpl_vars['village'][$this->_tpl_vars['dbname']]; ?>
</a></label>
                                <?php endif; ?>
                           <?php else: ?>
                                <?php 
                                 $this->_tpl_vars['aktu_build_prc'] = $this->_tpl_vars['village'][$this->_tpl_vars['dbname']] / $this->_tpl_vars['cl_builds']->get_maxstage($this->_tpl_vars['dbname']);
                                 ?>
                                <?php if ($this->_tpl_vars['aktu_build_prc'] > 0.5): ?>
                                 <area shape="poly" coords="<?php echo $this->_tpl_vars['builds_graphic_coords'][$this->_tpl_vars['dbname']]; ?>
" href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=<?php echo $this->_tpl_vars['dbname']; ?>
" alt="<?php echo $this->_tpl_vars['cl_builds']->get_name($this->_tpl_vars['dbname']); ?>
" title="<?php echo $this->_tpl_vars['cl_builds']->get_name($this->_tpl_vars['dbname']); ?>
"/>
                                 <?php if ($this->_tpl_vars['dbname'] == 'main'): ?>
                                  <a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=<?php echo $this->_tpl_vars['dbname']; ?>
"><img class="align_mainflag" src="/ds_graphic/<?php echo $this->_tpl_vars['visual']; ?>
/mainflag3.gif" alt=""/></a>
                                 <?php endif; ?>
				 <?php if ($this->_tpl_vars['dbname'] == 'main'): ?>
                 <a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=<?php echo $this->_tpl_vars['dbname']; ?>
"><img class="align_<?php echo $this->_tpl_vars['dbname']; ?>
" src="/ds_graphic/<?php echo $this->_tpl_vars['visual']; ?>
/<?php echo $this->_tpl_vars['dbname']; ?>
3.<?php echo $this->_tpl_vars['main']; ?>
" alt=""/></a>
				 <?php endif; ?>
				 <?php if ($this->_tpl_vars['dbname'] == 'smith'): ?>
                 <a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=<?php echo $this->_tpl_vars['dbname']; ?>
"><img class="align_<?php echo $this->_tpl_vars['dbname']; ?>
" src="/ds_graphic/<?php echo $this->_tpl_vars['visual']; ?>
/<?php echo $this->_tpl_vars['dbname']; ?>
3.<?php echo $this->_tpl_vars['smith']; ?>
" alt=""/></a>
				 <?php endif; ?>
				 <?php if ($this->_tpl_vars['dbname'] == 'garage'): ?>
                 <a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=<?php echo $this->_tpl_vars['dbname']; ?>
"><img class="align_<?php echo $this->_tpl_vars['dbname']; ?>
" src="/ds_graphic/<?php echo $this->_tpl_vars['visual']; ?>
/<?php echo $this->_tpl_vars['dbname']; ?>
3.<?php echo $this->_tpl_vars['garage']; ?>
" alt=""/></a>
				 <?php endif; ?>
				 <?php if ($this->_tpl_vars['dbname'] == 'stable'): ?>
                 <a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=<?php echo $this->_tpl_vars['dbname']; ?>
"><img class="align_<?php echo $this->_tpl_vars['dbname']; ?>
" src="/ds_graphic/<?php echo $this->_tpl_vars['visual']; ?>
/<?php echo $this->_tpl_vars['dbname']; ?>
3.<?php echo $this->_tpl_vars['stable']; ?>
" alt=""/></a>
				 <?php endif; ?>
				 
				 <?php if ($this->_tpl_vars['dbname'] == 'wood'): ?>
                 <a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=<?php echo $this->_tpl_vars['dbname']; ?>
"><img class="align_<?php echo $this->_tpl_vars['dbname']; ?>
" src="/ds_graphic/<?php echo $this->_tpl_vars['visual']; ?>
/<?php echo $this->_tpl_vars['dbname']; ?>
3.<?php echo $this->_tpl_vars['wood']; ?>
" alt=""/></a>
				 <?php endif; ?>
				 <?php if ($this->_tpl_vars['dbname'] == 'stone'): ?>
                 <a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=<?php echo $this->_tpl_vars['dbname']; ?>
"><img class="align_<?php echo $this->_tpl_vars['dbname']; ?>
" src="/ds_graphic/<?php echo $this->_tpl_vars['visual']; ?>
/<?php echo $this->_tpl_vars['dbname']; ?>
3.<?php echo $this->_tpl_vars['stone']; ?>
" alt=""/></a>
				 <?php endif; ?>
				 <?php if ($this->_tpl_vars['dbname'] == 'iron'): ?>
                 <a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=<?php echo $this->_tpl_vars['dbname']; ?>
"><img class="align_<?php echo $this->_tpl_vars['dbname']; ?>
" src="/ds_graphic/<?php echo $this->_tpl_vars['visual']; ?>
/<?php echo $this->_tpl_vars['dbname']; ?>
3.<?php echo $this->_tpl_vars['iron']; ?>
" alt=""/></a>
				 <?php endif; ?>
				 <?php if ($this->_tpl_vars['dbname'] == 'farm'): ?>
                 <a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=<?php echo $this->_tpl_vars['dbname']; ?>
"><img class="align_<?php echo $this->_tpl_vars['dbname']; ?>
" src="/ds_graphic/<?php echo $this->_tpl_vars['visual']; ?>
/<?php echo $this->_tpl_vars['dbname']; ?>
3.<?php echo $this->_tpl_vars['farm']; ?>
" alt=""/></a>
				 <?php endif; ?>
			         <?php if ($this->_tpl_vars['dbname'] == 'barracks' || $this->_tpl_vars['dbname'] == 'wall' || $this->_tpl_vars['dbname'] == 'market' || $this->_tpl_vars['dbname'] == 'church' || $this->_tpl_vars['dbname'] == 'storage'): ?>
				  <a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=<?php echo $this->_tpl_vars['dbname']; ?>
"><img class="align_<?php echo $this->_tpl_vars['dbname']; ?>
" src="/ds_graphic/<?php echo $this->_tpl_vars['visual']; ?>
/<?php echo $this->_tpl_vars['dbname']; ?>
3.png" alt=""/></a>
			         <?php endif; ?>
				<?php if ($this->_tpl_vars['labels']): ?>
                                  <label class="stagetip label_<?php echo $this->_tpl_vars['dbname']; ?>
"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=<?php echo $this->_tpl_vars['dbname']; ?>
"><?php echo $this->_tpl_vars['village'][$this->_tpl_vars['dbname']]; ?>
</a></label>
                                <?php endif; ?>
                                <?php else: ?>
                                 <?php if ($this->_tpl_vars['aktu_build_prc'] > 0.2): ?>
                                  <area shape="poly" coords="<?php echo $this->_tpl_vars['builds_graphic_coords'][$this->_tpl_vars['dbname']]; ?>
" href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=<?php echo $this->_tpl_vars['dbname']; ?>
" alt="<?php echo $this->_tpl_vars['cl_builds']->get_name($this->_tpl_vars['dbname']); ?>
" title="<?php echo $this->_tpl_vars['cl_builds']->get_name($this->_tpl_vars['dbname']); ?>
"/>
                                  <?php if ($this->_tpl_vars['dbname'] == 'main'): ?>
                                   <a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=<?php echo $this->_tpl_vars['dbname']; ?>
"><img class="align_mainflag" src="/ds_graphic/<?php echo $this->_tpl_vars['visual']; ?>
/mainflag2.gif" alt=""/></a>
                                  <?php endif; ?>
				 <?php if ($this->_tpl_vars['dbname'] == 'main'): ?>
                 <a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=<?php echo $this->_tpl_vars['dbname']; ?>
"><img class="align_<?php echo $this->_tpl_vars['dbname']; ?>
" src="/ds_graphic/<?php echo $this->_tpl_vars['visual']; ?>
/<?php echo $this->_tpl_vars['dbname']; ?>
2.<?php echo $this->_tpl_vars['main']; ?>
" alt=""/></a>
				 <?php endif; ?>
				 <?php if ($this->_tpl_vars['dbname'] == 'smith'): ?>
                 <a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=<?php echo $this->_tpl_vars['dbname']; ?>
"><img class="align_<?php echo $this->_tpl_vars['dbname']; ?>
" src="/ds_graphic/<?php echo $this->_tpl_vars['visual']; ?>
/<?php echo $this->_tpl_vars['dbname']; ?>
2.<?php echo $this->_tpl_vars['smith']; ?>
" alt=""/></a>
				 <?php endif; ?>
				 <?php if ($this->_tpl_vars['dbname'] == 'garage'): ?>
                 <a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=<?php echo $this->_tpl_vars['dbname']; ?>
"><img class="align_<?php echo $this->_tpl_vars['dbname']; ?>
" src="/ds_graphic/<?php echo $this->_tpl_vars['visual']; ?>
/<?php echo $this->_tpl_vars['dbname']; ?>
2.<?php echo $this->_tpl_vars['garage']; ?>
" alt=""/></a>
				 <?php endif; ?>
				 <?php if ($this->_tpl_vars['dbname'] == 'stable'): ?>
                 <a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=<?php echo $this->_tpl_vars['dbname']; ?>
"><img class="align_<?php echo $this->_tpl_vars['dbname']; ?>
" src="/ds_graphic/<?php echo $this->_tpl_vars['visual']; ?>
/<?php echo $this->_tpl_vars['dbname']; ?>
2.<?php echo $this->_tpl_vars['stable']; ?>
" alt=""/></a>
				 <?php endif; ?>
				 <?php if ($this->_tpl_vars['dbname'] == 'church'): ?>
                 <a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=<?php echo $this->_tpl_vars['dbname']; ?>
"><img class="align_<?php echo $this->_tpl_vars['dbname']; ?>
" src="/ds_graphic/<?php echo $this->_tpl_vars['visual']; ?>
/<?php echo $this->_tpl_vars['dbname']; ?>
2.<?php echo $this->_tpl_vars['church']; ?>
" alt=""/></a>
				 <?php endif; ?>
				 <?php if ($this->_tpl_vars['dbname'] == 'wood'): ?>
                 <a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=<?php echo $this->_tpl_vars['dbname']; ?>
"><img class="align_<?php echo $this->_tpl_vars['dbname']; ?>
" src="/ds_graphic/<?php echo $this->_tpl_vars['visual']; ?>
/<?php echo $this->_tpl_vars['dbname']; ?>
2.<?php echo $this->_tpl_vars['wood']; ?>
" alt=""/></a>
				 <?php endif; ?>
				 <?php if ($this->_tpl_vars['dbname'] == 'stone'): ?>
                 <a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=<?php echo $this->_tpl_vars['dbname']; ?>
"><img class="align_<?php echo $this->_tpl_vars['dbname']; ?>
" src="/ds_graphic/<?php echo $this->_tpl_vars['visual']; ?>
/<?php echo $this->_tpl_vars['dbname']; ?>
2.<?php echo $this->_tpl_vars['stone']; ?>
" alt=""/></a>
				 <?php endif; ?>
				 <?php if ($this->_tpl_vars['dbname'] == 'iron'): ?>
                 <a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=<?php echo $this->_tpl_vars['dbname']; ?>
"><img class="align_<?php echo $this->_tpl_vars['dbname']; ?>
" src="/ds_graphic/<?php echo $this->_tpl_vars['visual']; ?>
/<?php echo $this->_tpl_vars['dbname']; ?>
2.<?php echo $this->_tpl_vars['iron']; ?>
" alt=""/></a>
				 <?php endif; ?>
				 <?php if ($this->_tpl_vars['dbname'] == 'farm'): ?>
                 <a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=<?php echo $this->_tpl_vars['dbname']; ?>
"><img class="align_<?php echo $this->_tpl_vars['dbname']; ?>
" src="/ds_graphic/<?php echo $this->_tpl_vars['visual']; ?>
/<?php echo $this->_tpl_vars['dbname']; ?>
2.<?php echo $this->_tpl_vars['farm']; ?>
" alt=""/></a>
				 <?php endif; ?>
			         <?php if ($this->_tpl_vars['dbname'] == 'barracks' || $this->_tpl_vars['dbname'] == 'wall' || $this->_tpl_vars['dbname'] == 'market' || $this->_tpl_vars['dbname'] == 'church' || $this->_tpl_vars['dbname'] == 'storage'): ?>
				  <a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=<?php echo $this->_tpl_vars['dbname']; ?>
"><img class="align_<?php echo $this->_tpl_vars['dbname']; ?>
" src="/ds_graphic/<?php echo $this->_tpl_vars['visual']; ?>
/<?php echo $this->_tpl_vars['dbname']; ?>
2.png" alt=""/></a>
			         <?php endif; ?>
				  <?php if ($this->_tpl_vars['labels']): ?>
                                   <label class="stagetip label_<?php echo $this->_tpl_vars['dbname']; ?>
"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=<?php echo $this->_tpl_vars['dbname']; ?>
"><?php echo $this->_tpl_vars['village'][$this->_tpl_vars['dbname']]; ?>
</a></label>
                                  <?php endif; ?>
                                 <?php else: ?>
                                  <area shape="poly" coords="<?php echo $this->_tpl_vars['builds_graphic_coords'][$this->_tpl_vars['dbname']]; ?>
" href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=<?php echo $this->_tpl_vars['dbname']; ?>
" alt="<?php echo $this->_tpl_vars['cl_builds']->get_name($this->_tpl_vars['dbname']); ?>
" title="<?php echo $this->_tpl_vars['cl_builds']->get_name($this->_tpl_vars['dbname']); ?>
"/>
                                  <?php if ($this->_tpl_vars['dbname'] == 'main'): ?>
                                   <a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=<?php echo $this->_tpl_vars['dbname']; ?>
"><img class="align_mainflag" src="/ds_graphic/<?php echo $this->_tpl_vars['visual']; ?>
/mainflag1.gif" alt=""/></a>
                                  <?php endif; ?>
				 <?php if ($this->_tpl_vars['dbname'] == 'main'): ?>
                 <a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=<?php echo $this->_tpl_vars['dbname']; ?>
"><img class="align_<?php echo $this->_tpl_vars['dbname']; ?>
" src="/ds_graphic/<?php echo $this->_tpl_vars['visual']; ?>
/<?php echo $this->_tpl_vars['dbname']; ?>
1.<?php echo $this->_tpl_vars['main']; ?>
" alt=""/></a>
				 <?php endif; ?>
				 <?php if ($this->_tpl_vars['dbname'] == 'smith'): ?>
                 <a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=<?php echo $this->_tpl_vars['dbname']; ?>
"><img class="align_<?php echo $this->_tpl_vars['dbname']; ?>
" src="/ds_graphic/<?php echo $this->_tpl_vars['visual']; ?>
/<?php echo $this->_tpl_vars['dbname']; ?>
1.<?php echo $this->_tpl_vars['smith']; ?>
" alt=""/></a>
				 <?php endif; ?>
				 <?php if ($this->_tpl_vars['dbname'] == 'garage'): ?>
                 <a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=<?php echo $this->_tpl_vars['dbname']; ?>
"><img class="align_<?php echo $this->_tpl_vars['dbname']; ?>
" src="/ds_graphic/<?php echo $this->_tpl_vars['visual']; ?>
/<?php echo $this->_tpl_vars['dbname']; ?>
1.<?php echo $this->_tpl_vars['garage']; ?>
" alt=""/></a>
				 <?php endif; ?>
				 <?php if ($this->_tpl_vars['dbname'] == 'stable'): ?>
                 <a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=<?php echo $this->_tpl_vars['dbname']; ?>
"><img class="align_<?php echo $this->_tpl_vars['dbname']; ?>
" src="/ds_graphic/<?php echo $this->_tpl_vars['visual']; ?>
/<?php echo $this->_tpl_vars['dbname']; ?>
1.<?php echo $this->_tpl_vars['stable']; ?>
" alt=""/></a>
				 <?php endif; ?>
                 <?php if ($this->_tpl_vars['dbname'] == 'church'): ?>
                 <a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=<?php echo $this->_tpl_vars['dbname']; ?>
"><img class="align_<?php echo $this->_tpl_vars['dbname']; ?>
" src="/ds_graphic/<?php echo $this->_tpl_vars['visual']; ?>
/<?php echo $this->_tpl_vars['dbname']; ?>
1.<?php echo $this->_tpl_vars['church']; ?>
" alt=""/></a>
				 <?php endif; ?>
				 <?php if ($this->_tpl_vars['dbname'] == 'wood'): ?>
                 <a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=<?php echo $this->_tpl_vars['dbname']; ?>
"><img class="align_<?php echo $this->_tpl_vars['dbname']; ?>
" src="/ds_graphic/<?php echo $this->_tpl_vars['visual']; ?>
/<?php echo $this->_tpl_vars['dbname']; ?>
1.<?php echo $this->_tpl_vars['wood']; ?>
" alt=""/></a>
				 <?php endif; ?>
				 <?php if ($this->_tpl_vars['dbname'] == 'stone'): ?>
                 <a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=<?php echo $this->_tpl_vars['dbname']; ?>
"><img class="align_<?php echo $this->_tpl_vars['dbname']; ?>
" src="/ds_graphic/<?php echo $this->_tpl_vars['visual']; ?>
/<?php echo $this->_tpl_vars['dbname']; ?>
1.<?php echo $this->_tpl_vars['stone']; ?>
" alt=""/></a>
				 <?php endif; ?>
				 <?php if ($this->_tpl_vars['dbname'] == 'iron'): ?>
                 <a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=<?php echo $this->_tpl_vars['dbname']; ?>
"><img class="align_<?php echo $this->_tpl_vars['dbname']; ?>
" src="/ds_graphic/<?php echo $this->_tpl_vars['visual']; ?>
/<?php echo $this->_tpl_vars['dbname']; ?>
1.<?php echo $this->_tpl_vars['iron']; ?>
" alt=""/></a>
				 <?php endif; ?>
				 <?php if ($this->_tpl_vars['dbname'] == 'farm'): ?>
                 <a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=<?php echo $this->_tpl_vars['dbname']; ?>
"><img class="align_<?php echo $this->_tpl_vars['dbname']; ?>
" src="/ds_graphic/<?php echo $this->_tpl_vars['visual']; ?>
/<?php echo $this->_tpl_vars['dbname']; ?>
1.<?php echo $this->_tpl_vars['farm']; ?>
" alt=""/></a>
				 <?php endif; ?>
			         <?php if ($this->_tpl_vars['dbname'] == 'barracks' || $this->_tpl_vars['dbname'] == 'wall' || $this->_tpl_vars['dbname'] == 'market' || $this->_tpl_vars['dbname'] == 'church' || $this->_tpl_vars['dbname'] == 'storage'): ?>
				  <a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=<?php echo $this->_tpl_vars['dbname']; ?>
"><img class="align_<?php echo $this->_tpl_vars['dbname']; ?>
" src="/ds_graphic/<?php echo $this->_tpl_vars['visual']; ?>
/<?php echo $this->_tpl_vars['dbname']; ?>
1.png" alt=""/></a>
			         <?php endif; ?>
				  <?php if ($this->_tpl_vars['labels']): ?>
                                   <label class="stagetip label_<?php echo $this->_tpl_vars['dbname']; ?>
"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=<?php echo $this->_tpl_vars['dbname']; ?>
"><?php echo $this->_tpl_vars['village'][$this->_tpl_vars['dbname']]; ?>
</a></label>
                                  <?php endif; ?>
                                 <?php endif; ?>
                                <?php endif; ?>
                           <?php endif; ?>
                          <?php endif; ?>
                         <?php else: ?>
                          <?php 
                           if (get_counts_on_build($this->_tpl_vars['village']['id'],$this->_tpl_vars['dbname']) > 0):
                           ?>
                           <img class="align_<?php echo $this->_tpl_vars['dbname']; ?>
" src="/ds_graphic/<?php echo $this->_tpl_vars['visual']; ?>
/<?php echo $this->_tpl_vars['dbname']; ?>
0.gif" alt=""/>
                          <?php 
                           endif;
                           ?>
                         <?php endif; ?>
                        <?php endforeach; endif; unset($_from); ?>
                
                        
			<?php if ($this->_tpl_vars['anim'] == 1): ?>
                         <a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=<?php echo $this->_tpl_vars['dbname']; ?>
"><img class="align_conversation" src="/ds_graphic/<?php echo $this->_tpl_vars['visual']; ?>
/conversation.gif" alt=""/>
                        <?php endif; ?>
			<?php if ($this->_tpl_vars['anim'] == 2): ?>
                         <img class="align_juggler" src="/ds_graphic/<?php echo $this->_tpl_vars['visual']; ?>
/juggler.gif" alt=""/>
                        <?php endif; ?>
            <?php if ($this->_tpl_vars['anim'] == 3): ?>
			 <img class="align_guard" src="/ds_graphic/<?php echo $this->_tpl_vars['visual']; ?>
/guard.gif" alt=""/>
                        <?php endif; ?>
			<?php if ($this->_tpl_vars['village']['r_bh'] < $this->_tpl_vars['max_bh']): ?>
			 <img class="align_farmer" src="/ds_graphic/<?php echo $this->_tpl_vars['visual']; ?>
/farmer.gif" alt=""/>
                        <?php endif; ?>
                   </map>
                  </div>
                 </td>
                </tr>
           </table>
          </td> 
         </tr>
        
        <?php elseif ($this->_tpl_vars['style'] == 'classic'): ?>
         <tr>
          <td>
           <a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=overview&akcja=o_style">
                <span style="text-align:right;">
                 Para uma visão geral gráfica da aldeia
                </span>
           </a>
          </td>
         </tr>
         <?php $_from = $this->_tpl_vars['built_builds']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['dbname']):
?>
          <tr>
           <td>
                <a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=<?php echo $this->_tpl_vars['dbname']; ?>
"><img src="/ds_graphic/buildings/<?php echo $this->_tpl_vars['dbname']; ?>
.png"> <?php echo $this->_tpl_vars['cl_builds']->get_name($this->_tpl_vars['dbname']); ?>
</a>
                 (Nível <?php echo $this->_tpl_vars['village'][$this->_tpl_vars['dbname']]; ?>
)
                </td>
          </tr>
         <?php endforeach; endif; unset($_from); ?>
        <?php endif; ?>

        <tr>
                  <?php if (count ( $this->_tpl_vars['other_movements'] ) > 0): ?>
          <td colspan="2">
           <table class="vis" width="100%">
                <tr>
                 <th>Outras ordens (<?php echo count($this->_tpl_vars['other_movements']); ?>)</th>
                 <th>No local</th>
                 <th>No local às</th>
                </tr>
                <?php $_from = $this->_tpl_vars['other_movements']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['array']):
?>
                 <tr>
                  <td>
                   <a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=info_command&amp;id=<?php echo $this->_tpl_vars['array']['id']; ?>
&amp;type=other">
                        <img src="/ds_graphic/command/<?php echo $this->_tpl_vars['array']['type']; ?>
.png"> <?php echo $this->_tpl_vars['array']['message']; ?>

                   </a>
                  </td>
                  <td>
                   <?php echo $this->_tpl_vars['array']['end_time']; ?>

                  </td>
                  <?php if ($this->_tpl_vars['array']['arrival_in'] < 0): ?>
                   <td>
                        <?php echo ((is_array($_tmp=$this->_tpl_vars['array']['arrival_in'])) ? $this->_run_mod_handler('format_time', true, $_tmp) : format_time($_tmp)); ?>

                   </td>
                  <?php else: ?>
                   <td>
                        <span class="timer">
                         <?php echo ((is_array($_tmp=$this->_tpl_vars['array']['arrival_in'])) ? $this->_run_mod_handler('format_time', true, $_tmp) : format_time($_tmp)); ?>

                        </span>
                   </td>
                  <?php endif; ?>
                 </tr>
                <?php endforeach; endif; unset($_from); ?>
           </table>
          </td>
         <?php endif; ?>
        </tr>
        <tr>
                  <?php if (count ( $this->_tpl_vars['my_movements'] ) > 0): ?>
          <td colspan="2">
          <br>
           <table class="vis" width="100%">
                <tr>
                 <th>Próprias Ordens (<?php echo count($this->_tpl_vars['my_movements']); ?>)</th>
                 <th>No local</th>
                 <th>No local às</th>
                </tr>
                <?php $_from = $this->_tpl_vars['my_movements']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['array']):
?>
                 <tr>
                  <td>
                   <a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=info_command&amp;id=<?php echo $this->_tpl_vars['array']['id']; ?>
&amp;type=own">
                        <img src="/ds_graphic/command/<?php echo $this->_tpl_vars['array']['type']; ?>
.png"> <?php echo $this->_tpl_vars['array']['message']; ?>

                   </a>
                  </td>
                  <td>
                   <?php echo $this->_tpl_vars['array']['end_time']; ?>

                  </td>
                  <?php if ($this->_tpl_vars['array']['arrival_in'] < 0): ?>
                   <td>
                        <?php echo ((is_array($_tmp=$this->_tpl_vars['array']['arrival_in'])) ? $this->_run_mod_handler('format_time', true, $_tmp) : format_time($_tmp)); ?>

                   </td>
                  <?php else: ?>
                   <td>
                        <span class="timer">
                         <?php echo ((is_array($_tmp=$this->_tpl_vars['array']['arrival_in'])) ? $this->_run_mod_handler('format_time', true, $_tmp) : format_time($_tmp)); ?>

                        </span>
                   </td>
                  <?php endif; ?>
                  <?php if ($this->_tpl_vars['array']['can_cancel']): ?>
                   <td>
                        <a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=place&amp;action=cancel&amp;id=<?php echo $this->_tpl_vars['array']['id']; ?>
&amp;h=<?php echo $this->_tpl_vars['hkey']; ?>
">
                         Cancelar
                        </a>
                   </td>
                  <?php endif; ?>
                 </tr>
                <?php endforeach; endif; unset($_from); ?>
           </table>
          </td>
         <?php endif; ?>
        </tr>
   </table>
  </td>

  <td valign="top" <?php if ($this->_tpl_vars['style'] == 'new'): ?>width="100%<?php endif; ?><?php if ($this->_tpl_vars['style'] == 'classic'): ?>width="40%<?php endif; ?>">
   <?php if ($this->_tpl_vars['noob']): ?>
        <table class="vis" width="100%">
         <tr>
          <th>
           <i>Proteção inicial</i>
          </th>
         </tr>
         <tr>
          <td>
           acaba <?php echo $this->_tpl_vars['noob_end']; ?>

          </td>
         </tr>
        </table>
        <br />
   <?php endif; ?>
<div id="show_prod" class="vis moveable widget">
	<h4 class="head">
		<img style="float: right; cursor: pointer;" onclick="return VillageOverview.toggleWidget( 'show_prod', this );" src="graphic/minus.png">		Produção
	</h4>
	<div class="widget_content" style="display: block;"><table width="100%">
			<tbody><tr class="nowrap">
			<td width="70">
								<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=wood"><span class="icon header wood"> </span></a> Madeira
							</td>
			<td>
				<strong> <?php echo ((is_array($_tmp=$this->_tpl_vars['wood_per_hour'])) ? $this->_run_mod_handler('format_number', true, $_tmp) : format_number($_tmp)); ?>
</strong> por hora			</td>
		</tr>
			<tr class="nowrap">
			<td width="70">
								<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=stone"><span class="icon header stone"> </span></a> Argila
							</td>
			<td>
				<strong> <?php echo ((is_array($_tmp=$this->_tpl_vars['stone_per_hour'])) ? $this->_run_mod_handler('format_number', true, $_tmp) : format_number($_tmp)); ?>
</strong> por hora			</td>
		</tr>
			<tr class="nowrap">
			<td width="70">
								<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=iron"><span class="icon header iron" > </span></a> Ferro
							</td>
			<td>
				<strong> <?php echo ((is_array($_tmp=$this->_tpl_vars['iron_per_hour'])) ? $this->_run_mod_handler('format_number', true, $_tmp) : format_number($_tmp)); ?>
</strong> por hora			</td>
		</tr>
			<tr>
		
	</tr>
	</tbody></table>
</div>
</div>

<div style="opacity: 1;" id="show_units" class="vis moveable widget">
	<h4 class="head">
		<img style="float: right; cursor: pointer;" onclick="return VillageOverview.toggleWidget( 'show_units', this );" src="graphic/minus.png">		Unidades
	</h4>
	<div class="widget_content" style="display: block;"><table class="vis" width="100%">
					<tbody>
                                <?php $_from = $this->_tpl_vars['in_village_units']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['dbname'] => $this->_tpl_vars['num']):
?>
                                 <tr>
          <td>
           <a href="#" class="unit_link" onclick="return UnitPopup.open(event, '<?php echo $this->_tpl_vars['dbname']; ?>
')"><img src="/ds_graphic/unit/<?php echo $this->_tpl_vars['dbname']; ?>
.png">
           <b></a>
                <?php echo $this->_tpl_vars['num']; ?>

           </b>
           <?php if ($this->_tpl_vars['dbname'] === 'unit_paladin'): ?>
                <?php echo $this->_tpl_vars['pala_name']; ?>

           <?php else: ?>
                <?php echo $this->_tpl_vars['cl_units']->get_name($this->_tpl_vars['dbname']); ?>

           <?php endif; ?>
          </td>
         </tr>
                                <?php endforeach; endif; unset($_from); ?>
        <tr>
         <td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=train&mode=train">Recrutar</a></td>
        </tr>
	</tbody></table>
</div>
</div>
<script type="text/javascript" src="/js/unit_popup.js"></script>
<?php echo '<script type="text/javascript">
//<![CDATA[
	$(function() {
		UnitPopup.unit_data = {"spear":{"name":"Lanceiro\\u00f3w","desc":"Lanceiro é o mais simples\\u0105 unidade\\u0105. É eficaz na defesa contra eles\\u017ada.","wood":50,"stone":30,"iron":10,"pop":1,"speed":0.0009259259259,"attack":10,"attack_buildings":null,"defense":15,"defense_cavalry":45,"defense_archer":20,"carry":25,"type":"infantry","image":"unit\\/unit_spear.png","prod_building":"barracks","attackpoints":4,"defpoints":1,"build_time":1020,"shortname":"Lança","count":"40","reqs":[{"building_id":"barracks","building_link":"\\/game.php?village=5886&amp;screen=barracks","name":"Koszary","level":1}]},"sword":{"name":"Espadachim\\u00f3w","desc":"Espadachim s\\u0105 eficaz contra a infantaria. Jogada\\u0105 si\\u0119 porém bem devagar.","wood":30,"stone":30,"iron":70,"pop":1,"speed":0.0007575757576,"attack":25,"attack_buildings":null,"defense":50,"defense_cavalry":15,"defense_archer":40,"carry":15,"type":"infantry","image":"unit\\/unit_sword.png","prod_building":"barracks","attackpoints":5,"defpoints":2,"build_time":1500,"shortname":"Espada","count":"21","reqs":[{"building_id":"smith","building_link":"\\/game.php?village=5886&amp;screen=smith","name":"Ku\\u017ania","level":1}]},"axe":{"name":"Viking\\u00f3w","desc":"Viking to mocna jednostka atakuj\\u0105ca. Jak szaleni atakuj\\u0105 wioski przeciwnik\\u00f3w.","wood":60,"stone":30,"iron":40,"pop":1,"speed":0.0009259259259,"attack":40,"attack_buildings":null,"defense":10,"defense_cavalry":5,"defense_archer":10,"carry":10,"type":"infantry","image":"unit\\/unit_axe.png","prod_building":"barracks","attackpoints":1,"defpoints":4,"build_time":1320,"shortname":"Top\\u00f3r","count":"10","reqs":[{"building_id":"smith","building_link":"\\/game.php?village=5886&amp;screen=smith","name":"Ku\\u017ania","level":2}],"tech_costs":{"wood":700,"stone":840,"iron":820}},"knight":{"name":"Paladino","desc":"Paladino chroni twoj\\u0105 wiosk\\u0119, jak r\\u00f3wnie\\u017c twoich sprzymierze\\u0144c\\u00f3w, przed obcymi napadami. Ka\\u017cdy gracz mo\\u017ce posiada\\u0107 tylko jednego rycerza.","wood":20,"stone":20,"iron":40,"pop":10,"speed":0.001666666667,"attack":150,"attack_buildings":null,"defense":250,"defense_cavalry":400,"defense_archer":150,"carry":100,"type":"cavalry","image":"unit\\/unit_knight.png","prod_building":"statue","attackpoints":40,"defpoints":20,"build_time":21600,"shortname":"Paladino"}};
		UnitPopup.init();
			});
//]]>
</script>'; ?>

			<script type="text/javascript" src="../../js/promo_popup.js?1378724545"></script>
			<script type="text/javascript" src="../../js/overniew.js?1378724545"></script>			
<div id="inline_popup" class="hidden" style="width:700px;">
	<div id="inline_popup_menu">
		<span id="inline_popup_title"></span>
		<a id="inline_popup_close" href="javascript:inlinePopupClose()">X</a>
	</div>
	<div id="inline_popup_main" style="height: auto;">
		<div id="inline_popup_content"></div>
	</div>
</div>

<div id="unit_popup_template" style="display: none">
		<div class="inner-border main content-border" style="border: none; font-weight: normal">
			<table style="float: left;width:450px">
			<tr>
				<td>
					<p class="unit_desc"></p>
				</td>
			</tr>
			<tr>
				<td>
					<table style="border: 1px solid #DED3B9;" class="vis" width="100%">
						<tr>
							<th width="180">Koszta</th>
							<th>População</th>
							<th>Velocidade</th>
							<th>Carregar</th>
						</tr>
						<tr class="center">
							<td><nobr><span class="icon header wood"> </span><span class="unit_wood"></span></nobr> <nobr><span class="icon header stone"> </span><span class="unit_stone"></span></nobr> <nobr><span class="icon header iron" > </span><span class="unit_iron"></span></nobr></td>
							<td><span class="icon header population"> </span><span class="unit_pop"></span></td>
							<td id="unit_speed"></td>
							<td class="unit_carry"></td>
						</tr>
					</table>
					<br />

					<table class="vis event_loot" style="display: none; width: 100%">
						<tr>
							<th colspan="2">Detalhes do evento</th>
						</tr>
						<tr>
							<td>Carregar:</td>
							<td><span class="unit_event_loot"></span> <span class="unit_event_res_name"></span></td>
					</table>
					<br />

					<table class="vis has_levels_only" style="border: 1px solid #DED3B9;text-align:center" class="vis"  width="100%">
						<tr><th colspan="3">Estatísticas de batalha</th></tr>
						<tr><td align="left">A força do ataque</td><td width="20px"><img src="../ds_graphic/unit/att.png?1bdd4" alt="A força do ataque" /></td><td><span class="unit_attack"></span></td></tr>
						<tr><td align="left">Defesa em geral</td><td><img src="../ds_graphic/unit/def.png?12421" alt="Defesa em geral" /></td><td><span class="unit_defense"></span></td></tr>
						<tr><td align="left">Defesa contra cavalaria</td><td><img src="../ds_graphic/unit/def_cav.png?46b3d" alt="Defesa contra cavalaria" /></td><td><span class="unit_defense_cavalry"></span></td></tr>
												<tr><td align="left">Defesa contra arqueiros</td><td><img src="../ds_graphic/unit/def_archer.png?faccf" alt="Defesa contra arqueiros" /></td><td><span class="unit_defense_archer"></span></td></tr>
											</table>
					<br />

					<div class="show_if_has_reqs">
						<table class="vis" width="100%">
							<tr><th id="reqs_count" colspan="1">Requisitos para poder pesquisar uma unidade</th></tr>
							<tr id="reqs"></tr>
						</table>
						<br />
					</div>

					<table class="unit_tech vis unit_tech_levels"  width="100%">
						<tr style="text-align:center">
							<th>Nível tecnológico</th>
							<th width="350">Custos de teste (se necessário)</th>
							<th width="30" style="text-align:center"><img src="../ds_graphic/unit/att.png?1bdd4" alt="A força do ataque" /></th>
							<th width="30" style="text-align:center"><img src="../ds_graphic/unit/def.png?12421" alt="Defesa em geral" /></th>
							<th width="30" style="text-align:center"><img src="../ds_graphic/unit/def_cav.png?46b3d" alt="Defesa contra cavalaria" /></th>
							<th width="30" style="text-align:center"><img src="../ds_graphic/unit/def_archer.png?faccf" alt="Defesa contra arqueiros" /></th>						</tr>
						<tr id="unit_tech_prototype" style="display: none;text-align:center">
							<td class="tech_level"></td>
							<td>
								<span class="grey tech_researched">já pesquisado</span>
								<span class="tech_res_list">
									<span class="icon header wood"> </span><span class="tech_wood"></span> <span class="icon header stone"> </span><span class="tech_stone"></span> <span class="icon header iron" > </span><span class="tech_iron"></span>
								</span>
							</td>
							<td class="tech_att"></td>
							<td class="tech_def"></td>
							<td class="tech_def_cav"></td>
														<td class="tech_def_archer"></td>
													</tr>
					</table>
					<table class="vis unit_tech unit_tech_cost"  width="100%">
						<tr><th>Custos de teste (se necessário)</th></tr>
						<tr><td><span class="icon header wood"> </span><span class="tech_cost_wood"></span> <span class="icon header stone"> </span><span class="tech_cost_stone"></span> <span class="icon header iron" > </span><span class="tech_cost_iron"></span></td></tr>
					</table>
				</td>
			</tr>
		</table>
		<img style="margin-top: 60px; max-width: 200px; display: none" id="unit_image" src="graphic/map/empty.png" alt="" />
		</div>
	</div>

<div id="show_group" class="vis moveable widget">
	<h4 class="head">
		<img style="float: right; cursor: pointer;" onclick="return VillageOverview.toggleWidget( 'show_group', this );" src="graphic/minus.png">		Grupo
	</h4>
	<div class="widget_content" style=""><table class="vis" width="100%">
		<tbody>        <?php if ($this->_tpl_vars['village']['group'] === 'all'): ?>
         <tr>
          <td>
           <a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=overview_villages&amp;mode=grocusto">Adicionar</a>
          </td>
         </tr>
        <?php else: ?>
         <tr>
          <td>
           <?php echo $this->_tpl_vars['village']['group']; ?>

          </td>
         </tr>
         <tr>
          <td>
           <a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=overview_villages&amp;mode=grocusto">Adicionar</a>
          </td>
         </tr>
        <?php endif; ?>
	</tbody></table>
</div>
</div>


   <br />
   <br />
 <?php echo '  <style>
   .green-bar {
    height: 5px;
    background-color: green;
}
.yellow-bar {
    height: 5px;
    background-color: yellow;
}
.orange-bar {
    height: 5px;
    background-color: orange;
}
.red-bar {
    height: 5px;
    background-color: red;
}
   </style>
 

   '; ?>

   
<div id="show_agreement" class="vis moveable widget">
	<h4 class="head">
		<img style="float: right; cursor: pointer;" onclick="return VillageOverview.toggleWidget( 'show_agreement', this );" src="graphic/minus.png">		Moral
	</h4>
	<div class="widget_content" style=""><table class="vis" width="100%">
		<tbody>    <tr>              <div id="pop"><t<?php if ($this->_tpl_vars['color'] == yellow): ?>h<?php else: ?>d<?php endif; ?> style="color: <?php echo $this->_tpl_vars['color']; ?>
">
           <center><?php echo $this->_tpl_vars['village']['agreement']; ?>
 / <font color="green">100</font>
	</center>
		    <div class="<?php echo $this->_tpl_vars['color']; ?>
-bar" style=" width: <?php echo $this->_tpl_vars['village']['agreement']; ?>
%;">
          </td></div></tr>
	</tbody></table>
</div>
</div>  


<?php if ($this->_tpl_vars['village']['bonus'] == 0 && $this->_tpl_vars['premium']): ?><div id="show_b" class="vis moveable widget">
	<h4 class="head">
		<img style="float: right; cursor: pointer;" onclick="return VillageOverview.toggleWidget( 'show_b', this );" src="graphic/minus.png">		Resgatar um bônus de aldeia!
	</h4>
	<div class="widget_content" style=""><table class="vis" width="100%">
		<tbody>    <tr>              
		
		Se quiser comprar um bônus para aldeia, deve ter Pontos Premium :<center><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=kody">códigos</a></center>
		<?php if ($this->_tpl_vars['user']['premium_p'] >= 50): ?>
		<form action="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=overview&akcja=bonus" method="post">
		<td>Pontos premium: <b><?php echo $this->_tpl_vars['ilosc_sz']; ?>
</b></td><tr><td><b>Um bônus custa 50 Premium!</b></td>
		<tr><th>Escolha um bônus:</th>
		<tr><td><input type="radio" name="bonus" value="1" checked="checked"/> Aumento da capacidade da fazenda e comerciantes
        <tr><td><input type="radio" name="bonus" value="2" /> Aumento da produção de recursos (todos os recursos)
		<tr><td><input type="radio" name="bonus" value="3" /> Mais produção de madeira
		<tr><td><input type="radio" name="bonus" value="4" /> Mais produção de argila
		<tr><td><input type="radio" name="bonus" value="5" /> Aumento da produção de ferro
		<tr><td><input type="radio" name="bonus" value="6" /> Treinamento mais rápido no quartel
		<tr><td><input type="radio" name="bonus" value="7" /> Treinamento mais rápido nos estábulos
		<tr><td><input type="radio" name="bonus" value="8" /> Produção mais rápida na oficina
		<tr><td><input type="radio" name="bonus" value="9" /> Mais população
		<tr><td><center><input type="submit" class="btn btn-build" value="Comprar Bônus!"/>	</center>	
		</form>
		<?php endif; ?>
		</tr>
	</tbody></table>
</div>
</div>  <?php endif; ?>

</table>
<script>
                    $( function() { if( document.location.hash == "#bonus_1_dodany" ) UI.SuccessMessage( "O bônus foi adicionado!", 3000 ); });	
					$( function() { if( document.location.hash == "#bonus_2_dodany" ) UI.SuccessMessage( "O bônus foi adicionado!", 3000 ); });
					$( function() { if( document.location.hash == "#bonus_3_dodany" ) UI.SuccessMessage( "O bônus foi adicionado!", 3000 ); });
					$( function() { if( document.location.hash == "#bonus_4_dodany" ) UI.SuccessMessage( "O bônus foi adicionado!", 3000 ); });
					$( function() { if( document.location.hash == "#bonus_5_dodany" ) UI.SuccessMessage( "O bônus foi adicionado!", 3000 ); });
					$( function() { if( document.location.hash == "#bonus_6_dodany" ) UI.SuccessMessage( "O bônus foi adicionado!", 3000 ); });
					$( function() { if( document.location.hash == "#bonus_7_dodany" ) UI.SuccessMessage( "O bônus foi adicionado!", 3000 ); });
					$( function() { if( document.location.hash == "#bonus_8_dodany" ) UI.SuccessMessage( "O bônus foi adicionado!", 3000 ); });
					$( function() { if( document.location.hash == "#bonus_9_dodany" ) UI.SuccessMessage( "O bônus foi adicionado!", 3000 ); });

</script>