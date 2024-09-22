<?php /* Wersja Smarty_class 2.6.26 Przeróbka By Bartekst221, Plik stworzony 2023-02-26 22:55:34
         Wersja PHP pliku pliki_tpl/game_admin_bany.tpl */ ?>
<form action="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=admin&mode=bany&akcja=zbanuj" method="post" onsubmit="return validateReplyForm(this)">
<table class="vis" width="100%">
<tr><th><?php echo $this->_tpl_vars['lang']['admin']['ban']['title']; ?>
<th></th>

<tr><td><?php echo $this->_tpl_vars['lang']['admin']['ban']['nick']; ?>
:<td><input id="id" name="id" class="text" value="<?php echo $this->_tpl_vars['gr']['username']; ?>
" type="text" >
<tr><td><?php echo $this->_tpl_vars['lang']['admin']['ban']['form']; ?>
:<td><input type="radio" name="czas" value="1" /> <?php echo $this->_tpl_vars['lang']['admin']['ban']['sec']; ?>
<br>
<input type="radio" name="czas" value="60" /> <?php echo $this->_tpl_vars['lang']['admin']['ban']['min']; ?>
<br>
<input type="radio" name="czas" value="3600" /> <?php echo $this->_tpl_vars['lang']['admin']['ban']['hou']; ?>
<br>
<input type="radio" checked="checked" name="czas" value="86400" /> <?php echo $this->_tpl_vars['lang']['admin']['ban']['day']; ?>
<br>
<input type="radio" name="czas" value="604800" /> <?php echo $this->_tpl_vars['lang']['admin']['ban']['tyg']; ?>
<br>
<input type="radio" name="czas" value="2419200" /> <?php echo $this->_tpl_vars['lang']['admin']['ban']['mon']; ?>
<br>
<input type="radio" name="czas" value="29030400" /> <?php echo $this->_tpl_vars['lang']['admin']['ban']['yer']; ?>
<br>
<tr><td><?php echo $this->_tpl_vars['lang']['admin']['ban']['o']; ?>
:<td><input id="koniec" name="koniec" class="text" value="7" type="text" >
<tr><td><?php echo $this->_tpl_vars['lang']['admin']['ban']['p']; ?>
:<td><textarea style="height:100px;width:200px;" id="message" name="powod" onkeyup="liveValidateReplyForm(this)"><?php echo $this->_tpl_vars['lang']['admin']['ban']['pp']; ?>
</textarea>
<tr><td colspan="2"><center><input name="sub" type="submit" value="<?php echo $this->_tpl_vars['lang']['admin']['ban']['sub']; ?>
" class="btn btn-success btn-small"/>
<input type="reset" value="<?php echo $this->_tpl_vars['lang']['admin']['ban']['reset']; ?>
" class="btn btn-danger btn-small"/></center></td></tr>
</table>

</form>
<table class="vis" width="100%"><tr><th><?php echo $this->_tpl_vars['lang']['admin']['ban']['tab']['1']; ?>
</th><th><?php echo $this->_tpl_vars['lang']['admin']['ban']['tab']['2']; ?>
</th><th><?php echo $this->_tpl_vars['lang']['admin']['ban']['tab']['3']; ?>
</th><th><?php echo $this->_tpl_vars['lang']['admin']['ban']['tab']['4']; ?>
</th>

<?php $_from = $this->_tpl_vars['bany']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['ban']):
?>
					
<tr>
<td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=info_player&id=<?php echo $this->_tpl_vars['ban']['id']; ?>
"><?php echo $this->_tpl_vars['ban']['username']; ?>
</a></td>

<td>	<?php echo '		<script type=\'text/javascript\'>        
        function liczCzas(ile) {
			dni = Math.floor(ile / 86400);
            godzin = Math.floor((ile - dni * 86400)/ 3600);
            minut = Math.floor((ile - dni * 86400 - godzin * 3600) / 60);
            sekund = ile - dni * 86400 - minut * 60 - godzin * 3600;
            if (godzin < 10){ godzin = \'0\'+ godzin; }
            if (minut < 10){ minut = \'0\' + minut; }
            if (sekund < 10){ sekund = \'0\' + sekund; }
            if (ile > 0) {
                ile--;
                document.getElementById(\'zegar\').innerHTML = dni + \' dni \' +godzin + \':\' + minut + \':\' + sekund;
                setTimeout(\'liczCzas(\'+ile+\')\', 1000);
            } else {
                document.getElementById(\'zegar\').innerHTML = \'[{$lang.admin.ban.end.1}*]\';
            }
        }
    </script>'; ?>

<?php  	$pozostalo = $this->_tpl_vars['ban']['koniec_banu'] - time();  ?>
	<b><span id='zegar'></span></b><script type='text/javascript'>liczCzas(<?php echo $pozostalo; ?>)</script> </td>

<td><?php echo $this->_tpl_vars['ban']['powod_banu']; ?>
</td>
<td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=admin&mode=bany&akcja=del&id=<?php echo $this->_tpl_vars['ban']['id']; ?>
"><?php echo $this->_tpl_vars['lang']['admin']['ban']['cencel']; ?>
</a></td></tr>
		<?php endforeach; endif; unset($_from); ?>
</table>
<i>*<?php echo $this->_tpl_vars['lang']['admin']['ban']['end']['2']; ?>
</i>