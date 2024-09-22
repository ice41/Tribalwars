<?php /* Smarty version 2.6.14, created on 2011-12-20 19:33:51
         compiled from game_edytuj_kolory_graczy.tpl */ ?>
<h2>Edycja kolorów graczy na mapie</h2><?php if (! empty ( $this->_tpl_vars['error'] )): ?>	<font class="error"/><?php echo $this->_tpl_vars['error']; ?>
</font><br><br><?php endif; ?><form action="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=edytuj_kolory_graczy&akcja=dodaj_gracza&h=<?php echo $this->_tpl_vars['hkey']; ?>
" method="post">	Gracz: <input type="text" value="<?php echo $this->_tpl_vars['value']; ?>
" name="gracz"/>			&nbsp;&nbsp;&nbsp;	<select id="kolor" name="kolor">		<option style="background: rgb(55,66,77);" value="177,78,122">Wybierz kolor</option>			<?php 			$e = '';		    for ($a = 0;$a <=10; $a ++)		        {			    for ($b = 0;$b <=10; $b ++)		            {				    for ($c = 0;$c <=10; $c ++)		                {			         	$d = $a*25;			    	    $e = $b*25;					    $f = $c*25;			    	    $q .= '<option style="background: rgb('.$d.','.$e.','.$f.');" value="'.$d.','.$e.','.$f.'">'.$d.','.$e.','.$f.'</option>';					    }			        }			    }			echo $q;				 ?>        </select>	&nbsp;&nbsp;&nbsp;	<input name="submit" value="Dodaj gracza" type="submit"></form><br><br><?php if (count ( $this->_tpl_vars['odznaczeni'] ) > 0): ?>	<table class="vis" width=380>		<tr>		    <th>Zaznaczony gracz</th>			<th>Kolor</th>			<th>Akcja</th>		</tr>		<?php $_from = $this->_tpl_vars['odznaczeni']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['odznaczenie']):
?>		    <tr>		        <td>					<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=info_player&id=<?php echo $this->_tpl_vars['odznaczenie']['do_gracz_id']; ?>
"/><?php echo $this->_tpl_vars['odznaczenie']['do_gracz_name']; ?>
</a>				</td>				<td>					<div style="height:15px;width:100px;margin-top:1px;margin-left:6px; background: rgb(<?php echo $this->_tpl_vars['odznaczenie']['kolor']; ?>
);"/>				</td>				<td>					<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=edytuj_kolory_graczy&akcja=usun_gracza&id=<?php echo $this->_tpl_vars['odznaczenie']['id']; ?>
">&raquo;						 Usuñ odznaczenie					</a>				</td>		    </tr>		<?php endforeach; endif; unset($_from); ?>	</table><?php endif; ?>