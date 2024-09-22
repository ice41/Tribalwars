

<div id="show_reffurge" class="vis moveable widget">
	<h4 class="head">
		<img style="float: right; cursor: pointer;" onclick="return VillageOverview.toggleWidget( 'show_reffurge', this );" src="graphic/minus.png">		{$lang.admin.reffurge.title.add}
	</h4>
	<div class="widget_content" style=""><table class="vis" width="100%">
		<form method="post" action="game.php?village={$village.id}&screen=admin&mode=reffurge&action=create" onSubmit="this.submit.disabled=true;"><tbody>    <tr>
				<td width="350">{$lang.admin.reffurge.village_create}<br />(max 15.000)</td>
				<td><input type="text" name="num" value="0"></td>
			</tr>

<tr><td>Wybierz kierunek:<td><input type="radio" name="kier" value="R" checked="checked" />{$lang.direction.r} <b>{$lang.admin.reffurge.recommended}</b></label><br />
<label><input type="radio" name="kier" value="OW" />{$lang.direction.ow}</label><br />
<label><input type="radio" name="kier" value="OZ" />{$lang.direction.oz}</label><br />
<label><input type="radio" name="kier" value="PW" />{$lang.direction.pw}</label><br />
<label><input type="radio" name="kier" value="PZ" />{$lang.direction.pz}</td></tr>



<tr><td colspan="2"><div id="user"><strong>{$lang.admin.reffurge.id}:</strong><input id="user" name="user" class="text" value="-1" type="text" ></div>

</td></tr>

<tr>			<tr>
				<td colspan="2"><center><input type="submit" name="submit" value="{$lang.admin.buttons.add}" onload="this.disabled=false;" class="btn btn-success btn-small"></td>
			</tr>
</form>
<form method="post" action="game.php?village={$village.id}&screen=admin&mode=reffurge&action=delete" onSubmit="this.submit.disabled=true;">
<tbody><tr><th colspan="2">{$lang.admin.reffurge.title.delete}</th>
    </tr><tr>
      <td>{$lang.admin.reffurge.villages}</td>
      <td><b>{$villages}</b></td>
    </tr>
    <tr>
      <td colspan="2"><input name="potwierdzenie" type="checkbox"> {$lang.admin.reffurge.checkbox}</td>
    </tr>
    <tr>
      <td colspan="2"><center><input value="{$lang.admin.buttons.delete}" type="submit" onload="this.disabled=false;" class="btn btn-success btn-small"></td>
    </tr>
  </tbody>
  
  </form>
  {*Function Polish:*}
<form method="post" action="game.php?village={$village.id}&screen=admin&mode=reffurge&akcja=jed" onSubmit="this.submit.disabled=true;">
<tbody><tr><th colspan="2">Adicione unidades às aldeias:</th>
    </tr><tr>
      <td>Uma maneira de adicionar aldeias</td>
      <td><input type="radio" name="typ" value="1" checked="chceked"/> Jogador<br>
	  <input type="radio" name="typ" value="2" /> Aldeia<br></td>
    </tr>
<tr>
      <td>Wpisz tutaj ID wioski lub ID gracza:</td>
      <td><input type="text" name="id" value="" /><br><br></td>
    </tr>
      {foreach from=$cl_units->get_array('dbname') item=dbname key=name}
        <tr>
          <td><img src="/ds_graphic/unit/{$dbname}.png" alt="" /> <input type="text" name="{$dbname}" size="5" /></td>
        </tr>
      {/foreach}	

    <tr>
      <td colspan="2"><center><input value="Substitua as unidades!" type="submit" onload="this.disabled=false;" class="btn btn-success btn-small"></td>
    </tr>
  </tbody>
  </form>

  
	</tbody></table>
</div>
</div> 
