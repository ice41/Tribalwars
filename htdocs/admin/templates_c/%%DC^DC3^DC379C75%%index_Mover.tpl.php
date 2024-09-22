<?php /* Smarty version 2.6.14, created on 2010-12-30 22:41:15
         compiled from index_Mover.tpl */ ?>
					<h2>Village Mover</h2>
					Ein kleines Tool, um Dörfer zu bewegen.<br />
					<table width="100%">
					<tr>
					<td width="100%" align="right">
					<?php if (! isset ( $_GET['show_player'] )): ?>
					<h2><a href="index.php?screen=Mover&show_player">Nur Dörfer zeigen, die einem Spieler anzeigen</a></h2>
					<?php endif; ?>
					<?php if (! isset ( $_GET['show_barbs'] )): ?>
					<h2><a href="index.php?screen=Mover&show_barbs">Alle Dörfer zeigen</a></h2>
					<?php endif; ?>
					<?php if (! isset ( $_GET['show_only_barbs'] )): ?>
					<h2><a href="index.php?screen=Mover&show_only_barbs">Nur Barbarendörfer zeigen</a></h2>
					<?php endif; ?>
					</td>
					</tr>
					</table>
					<?php if (! empty ( $this->_tpl_vars['message'] )): ?>
					<h3>Nachricht</h3>
					<?php echo $this->_tpl_vars['message']; ?>

					<a href="index.php?screen=Mover<?php if (isset ( $this->_tpl_vars['page'] )):  echo $this->_tpl_vars['page'];  endif; ?>">Zurück</a>
					<?php endif; ?>
					<?php if (! empty ( $this->_tpl_vars['msg'] )): ?>
					<h1>Dörferliste:</h1>
					<table class="vis">
					<th>DorfId</th><th>Besitzer Name</th><th>Dorfname</th><th>Koordinaten</th>
					<?php $_from = $this->_tpl_vars['msg']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['ms']):
?>
					<?php echo $this->_tpl_vars['ms']; ?>

					<?php endforeach; endif; unset($_from); ?>
					</table>
					<?php endif; ?>
					<br />
					<form action="index.php?screen=Mover<?php if (isset ( $this->_tpl_vars['page'] )):  echo $this->_tpl_vars['page'];  endif; ?>" method="post">
					<?php if (! isset ( $this->_tpl_vars['message'] ) && isset ( $this->_tpl_vars['page'] )): ?>
					<table width="300px" class="vis">
					  <tr>
						<th colspan="2"><a name="confirm">Dorf bewegen</a></th>
					  </tr>
					  <tr>
						<td width="40%" align="right">
						  <label for="name" style="display:block">Dorf-Id</label></td><td width="60%" align="middle"><input type="text" name="id" id="name" value="<?php if (isset ( $this->_tpl_vars['id'] )):  echo $this->_tpl_vars['id'];  endif; ?>" size="11" />
						</td>
					  </tr>
					  <tr>
						<td width="40%" align="right">
						  <label for="xy" style="display:block">Bewege Nach (xxx|yyy)</label></td><td width="60%" align="middle"><input type="text" name="xy" id="xy" size="9" value="<?php if (isset ( $this->_tpl_vars['xy'] )):  echo $this->_tpl_vars['xy'];  endif; ?>" />
						</td>
					  <tr>
						<td colspan="2" align="center">
						  <input type="submit" value="Bewegen!" />
						</td>
					  </tr>
					</table><?php endif; ?>
					</form>
					<br />
					<table width="100%">
					  <tr>
						<td align="right"><a href="?screen=Mover">Start</a><br /><br />Code by <a href="http://dslan.gfx-dose.de/user-11587.html">InsertNameHere</a></td>
					  </tr>
					</table>