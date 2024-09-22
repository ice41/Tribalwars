<table>
	<tr>
		<td>
			<img src="graphic/big_buildings/main.png" title="Cladire Principala" alt="" />
		</td>
		<td>
			<h2>Cl&#259;direa principal&#259; (Nivelul {$village.main})</h2> 
			{$description}<td align="right" valign="top" style="white-space:nowrap;"><a href="/help/index.php?article=buildings" target="_blank">
                        Ajutor pentru cl&#259;diri
                        </a></td>
		</td>
	</tr>
</table>
<br />
{* ALLE GEBÄUDE IN DER BAUSCHLEIFE AUSLESEN *}
{if $num_do_build>0}
	<table class="vis">
	<tr><th width="250">Comand&#259; de construc&#355;ie</th><th width="100">Durat&#259; *</th><th width="150">Terminare</th><th>&#206;ntrerupere</th></tr>
	{foreach from=$do_build item=item key=id}
		{assign var="buildname" value=$do_build.$id.build}
			{if $id==0}
				<tr class="lit">
			{else}
				<tr>
			{/if}
					<td>{$cl_builds->get_name($buildname)} (Nivelul {$do_build.$id.stage})</td>
					{if $id==0}
						{if $do_build.$id.finished<$time}
							<td>{$do_build.$id.dauer|format_time}</td>
						{else}
							<td><span class="timer">{$do_build.$id.dauer|format_time}</span></td>
						{/if}
					{else}
						<td>{$do_build.$id.dauer|format_time}</td>
					{/if}
					<td>{$do_build.$id.finished|format_date}</td>
					<td><a href="javascript:ask('&#206;mi puteti chiar anula lucr&#259;rile?', 'game.php?village={$village.id}&amp;screen=main&amp;action=cancel&amp;id={$do_build.$id.r_id}&amp;mode=build&amp;h={$hkey}')">&#238;ntrerupe</a></td>
				</tr>
	{/foreach}
	{* ZUSATZKOSTEN FÜR DEN NÄCHSTEN AUFTRAG*}
	{if $num_do_build>2}
		<tr>
			<td colspan="4">Costuri suplimentare pentru urm&#259;toarea comand&#259; &#238;n circuitul de construc&#355;ie:<b>{$cl_builds->get_buildsharpens_costs($num_do_build)}%</b><br />
			<small>Costurile suplimentare produse de circuitul de construc&#355;ie nu &#238;&#355;i vor fi &#238;napoiate prin &#238;ntrerupere</small></td>
		</tr>
	{/if}
	</table>
	<br />
{/if}

{if !empty($error)}
	<font class="error">{$error}</font>
{/if}
<table class="vis">
<tr>
<th width="220">Cl&#259;diri</th><th colspan="4">Necesitate</th><th width="100">Timp de construc&#355;ie<br /> (hh:mm:ss)</th><th width="200">Construire</th>
</tr>

		{foreach from=$fulfilled_builds item=dbname key=id}
			<tr>
				<td><a href="javascript:popup_scroll('popup_building.php?building={$dbname}', 520, 520)"><img src="graphic/icon_question.gif" width="10" height="14"></a>&nbsp;<a href="game.php?village={$village.id}&screen={$dbname}"><img src="graphic/buildings/{$dbname}.png"> {$cl_builds->get_name($dbname)}</a> (Nivelul {$village.$dbname})</td>
				{if $cl_builds->get_maxstage($dbname)<=$build_village.$dbname}
					<td colspan="6" align="center" class="inactive">Cl&#259;direa complet construit&#259;</td>
				{else}
					<td><img src="graphic/holz.png" title="Lemn" alt="" />{$cl_builds->get_wood($dbname,$build_village.$dbname+1)}</td>
					<td><img src="graphic/lehm.png" title="Argil&#259;" alt="" />{$cl_builds->get_stone($dbname,$build_village.$dbname+1)}</td>
					<td><img src="graphic/eisen.png" title="Fier" alt="" />{$cl_builds->get_iron($dbname,$build_village.$dbname+1)}</td>
					<td>{if $cl_builds->get_bh($dbname,$build_village.$dbname+1)>0}<img src="graphic/face.png" title="Ferm&#259;" alt="" />{$cl_builds->get_bh($dbname,$build_village.$dbname+1)}{/if}</td>
					<td>{$cl_builds->get_time($village.main,$dbname,$build_village.$dbname+1)|format_time}</td>
					{$cl_builds->build($village,$id,$build_village,$plus_costs)}
					{if $cl_builds->get_build_error2()=='not_enough_ress'}
						<td class="inactive"><span>Materii prime disponibile in <span class="timer_replace">{$cl_builds->get_build_error()}</span></span><span style="display:none">Materiile prime disponibile.</span></td>
					{elseif $cl_builds->get_build_error2()=='not_enough_ress_plus'}
						<td class="inactive">Prea pu&#355;ine materii prime , pentru a construii &#238;n continu.</td>
					{elseif $cl_builds->get_build_error2()=='not_fulfilled'}
						<td class="inactive">Condi&#355;iile de construire nu sunt &#238;ndeplinite.</td>
					{elseif $cl_builds->get_build_error2()=='not_enough_bh'}
						<td class="inactive">Prea pu&#355;ine locuri &#238;n ferme</td>
					{elseif $cl_builds->get_build_error2()=='not_enough_storage'}
						<td class="inactive">Magazia este prea mic&#259;</td>
					{else}
						{if $build_village.$dbname < 1}
							{if count($do_build)>2 && $user.confirm_queue==1}
								<td><a href="javascript:ask('Pentru a construii &#238;n continu te cost&#259; &#238;n plus.Continua&#355;i?', 'game.php?village={$village.id}&amp;screen=main&amp;action=build&amp;id={$dbname}&amp;force&amp;h={$hkey}')">Extindere la nivelul</a></td>
							{else}
								<td><a href="game.php?village={$village.id}&screen=main&action=build&id={$dbname}&h={$hkey}">Construie&#351;te</td>
							{/if}
						{else}
							{if count($do_build)>2 && $user.confirm_queue==1}
								<td><a href="javascript:ask('Pentru a construii &#238;n continu te cost&#259; &#238;n plus.Continua&#355;i?', 'game.php?village={$village.id}&amp;screen=main&amp;action=build&amp;id={$dbname}&amp;force&amp;h={$hkey}')">Extindere la nivelul {$build_village.$dbname+1}</a></td>
							{else}
								<td><a href="game.php?village={$village.id}&screen=main&action=build&id={$dbname}&h={$hkey}">Extindere la nivelul {$build_village.$dbname+1}</td>
							{/if}
						{/if}
					{/if}
				{/if}
			</tr>
		{/foreach}

</table>
<table > 
<form action="game.php?village={$village.id}&amp;screen=main&amp;action=change_name&amp;h={$hkey}" method="post">
<table>
<tr>
  <th colspan="3">Modifica numele satului</th>
</tr>
<tr><td><input type="text" name="name" value="{$village.name}"></td><td><input type="submit" value="Modificare"></tr>
</table>
</form>
