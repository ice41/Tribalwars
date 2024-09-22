<?php /* Smarty version 2.6.14, created on 2013-12-24 15:34:15
         compiled from game_overview.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'format_time', 'game_overview.tpl', 239, false),array('modifier', 'format_number', 'game_overview.tpl', 331, false),)), $this); ?>
<br>
<table>
<tr>
  <td width="600" valign="top" valign="top">
   <table class="vis" width="100%">
        <tr>
                <th colspan="2">
          <i>Budynki</i>
         </th>
        </tr>
        <?php if ($this->_tpl_vars['style'] == 'new'): ?>
         <tr>
          <td width="60%">
           <a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=overview&akcja=o_labels"><span><?php if ($this->_tpl_vars['labels']): ?>Ukryj poziomy budynków<?php else: ?>Poka¿ poziomy budynków<?php endif; ?></span></a>
          </td>
          <td>
          <a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=overview&akcja=o_style"><span style="text-align:right;">Do klasycznego przegl¹du wioski</span></a>
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
			         <?php if ($this->_tpl_vars['dbname'] == 'barracks' || $this->_tpl_vars['dbname'] == 'wall' || $this->_tpl_vars['dbname'] == 'market' || $this->_tpl_vars['dbname'] == 'storage'): ?>
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
			         <?php if ($this->_tpl_vars['dbname'] == 'barracks' || $this->_tpl_vars['dbname'] == 'wall' || $this->_tpl_vars['dbname'] == 'market' || $this->_tpl_vars['dbname'] == 'storage'): ?>
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
			         <?php if ($this->_tpl_vars['dbname'] == 'barracks' || $this->_tpl_vars['dbname'] == 'wall' || $this->_tpl_vars['dbname'] == 'market' || $this->_tpl_vars['dbname'] == 'storage'): ?>
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
                 Do graficznego przegl¹du wioski
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
                 (Poziom <?php echo $this->_tpl_vars['village'][$this->_tpl_vars['dbname']]; ?>
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
                 <th>Inne rozkazy (<?php echo count($this->_tpl_vars['other_movements']); ?>)</th>
                 <th>Na miejscu</th>
                 <th>Na miejscu za</th>
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
                 <th>W³asne rozkazy (<?php echo count($this->_tpl_vars['my_movements']); ?>)</th>
                 <th>Na miejscu</th>
                 <th>Na miejscu za</th>
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
                         Przerwij
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

  <td valign="top" <?php if ($this->_tpl_vars['style'] == 'new'): ?>width="100%<?php endif;  if ($this->_tpl_vars['style'] == 'classic'): ?>width="40%<?php endif; ?>">
   <?php if ($this->_tpl_vars['noob']): ?>
        <table class="vis" width="100%">
         <tr>
          <th>
           <i>Ochrona pocz¹tkowa</i>
          </th>
         </tr>
         <tr>
          <td>
           Koñczy siê <?php echo $this->_tpl_vars['noob_end']; ?>

          </td>
         </tr>
        </table>
        <br />
   <?php endif; ?>
   <table class="vis" width="100%">
        <tr>
         <th colspan="2">
          <i>Produkcja</i>
         </th>
        </tr>
        <tr>
         <td width="80">
          <span class="icon header wood"> </span>
          Drewno
         </td>
         <td>
          <strong>
           <?php echo ((is_array($_tmp=$this->_tpl_vars['wood_per_hour'])) ? $this->_run_mod_handler('format_number', true, $_tmp) : format_number($_tmp)); ?>

          </strong>
           na godzinê
         </td>
        </tr>
        <tr>
         <td width="80">
          <span class="icon header stone"> </span>
           Glina
         </td>
         <td>
          <strong>
           <?php echo ((is_array($_tmp=$this->_tpl_vars['stone_per_hour'])) ? $this->_run_mod_handler('format_number', true, $_tmp) : format_number($_tmp)); ?>

          </strong>
           na godzinê
         </td>
        </tr>
        <tr>
         <td width="80">
          <span class="icon header iron"> </span>
           ¯elazo
         </td>
         <td>
          <strong>
           <?php echo ((is_array($_tmp=$this->_tpl_vars['iron_per_hour'])) ? $this->_run_mod_handler('format_number', true, $_tmp) : format_number($_tmp)); ?>

          </strong>
           na godzinê
         </td>
        </tr>
   </table>
   <br />
   <table class="vis" width="100%">
        <tr>
         <th>
          <i>Jednostki</i>
         </th>
        </tr>
                                <?php $_from = $this->_tpl_vars['in_village_units']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['dbname'] => $this->_tpl_vars['num']):
?>
                                 <tr>
          <td>
           <img src="/ds_graphic/unit/<?php echo $this->_tpl_vars['dbname']; ?>
.png">
           <b>
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
&amp;screen=train&mode=train">» rekrutowaæ</a></td>
        </tr>
   </table>
   <br />
   <table class="vis" width="100%">
        <tr>
         <th>
          <i>Przynale¿noœæ do grupy</i>
         </th>
        </tr>
        <?php if ($this->_tpl_vars['village']['group'] === 'all'): ?>
         <tr>
          <td>
           <a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=overview_villages&amp;mode=groups">» opracuj</a>
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
&amp;screen=overview_villages&amp;mode=groups">» opracuj</a>
          </td>
         </tr>
        <?php endif; ?>
   </table>
   <br />
   <?php if ($this->_tpl_vars['village']['agreement'] != '100'): ?>
        <table class="vis" width="100%">
         <tr>
          <th>
           <i>Poparcie</i>
          </th>
          <th style="color: <?php echo $this->_tpl_vars['color']; ?>
">
           <?php echo $this->_tpl_vars['village']['agreement']; ?>

          </th>
         </tr>
        </table>
        <br />
   <?php endif; ?>
  </td>
</tr>
</table>