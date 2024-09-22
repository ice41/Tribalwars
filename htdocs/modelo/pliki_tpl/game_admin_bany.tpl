<form action="game.php?village={$village.id}&screen=admin&mode=bany&akcja=zbanuj" method="post" onsubmit="return validateReplyForm(this)">
<table class="vis" width="100%">
<tr><th>{$lang.admin.ban.title}<th></th>

<tr><td>{$lang.admin.ban.nick}:<td><input id="id" name="id" class="text" value="{$gr.username}" type="text" >
<tr><td>{$lang.admin.ban.form}:<td><input type="radio" name="czas" value="1" /> {$lang.admin.ban.sec}<br>
<input type="radio" name="czas" value="60" /> {$lang.admin.ban.min}<br>
<input type="radio" name="czas" value="3600" /> {$lang.admin.ban.hou}<br>
<input type="radio" checked="checked" name="czas" value="86400" /> {$lang.admin.ban.day}<br>
<input type="radio" name="czas" value="604800" /> {$lang.admin.ban.tyg}<br>
<input type="radio" name="czas" value="2419200" /> {$lang.admin.ban.mon}<br>
<input type="radio" name="czas" value="29030400" /> {$lang.admin.ban.yer}<br>
<tr><td>{$lang.admin.ban.o}:<td><input id="koniec" name="koniec" class="text" value="7" type="text" >
<tr><td>{$lang.admin.ban.p}:<td><textarea style="height:100px;width:200px;" id="message" name="powod" onkeyup="liveValidateReplyForm(this)">{$lang.admin.ban.pp}</textarea>
<tr><td colspan="2"><center><input name="sub" type="submit" value="{$lang.admin.ban.sub}" class="btn btn-success btn-small"/>
<input type="reset" value="{$lang.admin.ban.reset}" class="btn btn-danger btn-small"/></center></td></tr>
</table>

</form>
<table class="vis" width="100%"><tr><th>{$lang.admin.ban.tab.1}</th><th>{$lang.admin.ban.tab.2}</th><th>{$lang.admin.ban.tab.3}</th><th>{$lang.admin.ban.tab.4}</th>

{foreach from=$bany item=ban key=id}
					
<tr>
<td><a href="game.php?village={$village.id}&screen=info_player&id={$ban.id}">{$ban.username}</a></td>

<td>	{literal}		<script type='text/javascript'>        
        function liczCzas(ile) {
			dni = Math.floor(ile / 86400);
            godzin = Math.floor((ile - dni * 86400)/ 3600);
            minut = Math.floor((ile - dni * 86400 - godzin * 3600) / 60);
            sekund = ile - dni * 86400 - minut * 60 - godzin * 3600;
            if (godzin < 10){ godzin = '0'+ godzin; }
            if (minut < 10){ minut = '0' + minut; }
            if (sekund < 10){ sekund = '0' + sekund; }
            if (ile > 0) {
                ile--;
                document.getElementById('zegar').innerHTML = dni + ' dni ' +godzin + ':' + minut + ':' + sekund;
                setTimeout('liczCzas('+ile+')', 1000);
            } else {
                document.getElementById('zegar').innerHTML = '[{$lang.admin.ban.end.1}*]';
            }
        }
    </script>{/literal}
{php} 	$pozostalo = $this->_tpl_vars['ban']['koniec_banu'] - time(); {/php}
	<b><span id='zegar'></span></b><script type='text/javascript'>liczCzas({php}echo $pozostalo;{/php})</script> </td>

<td>{$ban.powod_banu}</td>
<td><a href="game.php?village={$village.id}&screen=admin&mode=bany&akcja=del&id={$ban.id}">{$lang.admin.ban.cencel}</a></td></tr>
		{/foreach}
</table>
<i>*{$lang.admin.ban.end.2}</i>