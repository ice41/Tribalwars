{php}

$public_view=$_GET['public'];
$hash_view=$_GET['hash'];

if ($public_view=="view") {

{/php}

{assign var='mode' value='public'}

{php} } {/php}

<h2>Rapoarte</h2>

<table>
	<tr>
		<td valign="top">
			<table class="vis" width="120">
				{foreach from=$links item=f_mode key=f_name}
         {if $f_name=='Alle Berichte'}
            {assign var='f_name' value='Toate rapoartele'}
         {/if}
         {if $f_name=='Angriff'}
            {assign var='f_name' value='Atacuri'}
         {/if}
         {if $f_name=='Verteididung'}
            {assign var='f_name' value='Ap&#259;rare'}
         {/if}
         {if $f_name=='Unterstützung'}
            {assign var='f_name' value='Sprijin'}
         {/if}
         {if $f_name=='Handel'}
            {assign var='f_name' value='Comer&#355;'}
         {/if}
         {if $f_name=='Sonstiges'}
            {assign var='f_name' value='Altele'}
         {/if}
					{if $f_mode==$mode}
						<tr>
							<td class="selected" width="160">
								<a href="game.php?village={$village.id}&amp;screen=report&amp;mode={$f_mode}">{$f_name}</a>

							</td>
						</tr>
					{else}
		                <tr>
		                    <td width="160">
								<a href="game.php?village={$village.id}&amp;screen=report&amp;mode={$f_mode}">{$f_name}</a>
							</td>
						</tr>
					{/if}
				{/foreach}

			
			</table>
		</td>
		<td valign="top" width="100%">
{php}
if ($public_view=="view") {
   include "public.php";
} else {
{/php}
		
			{include file="game_report_$do.tpl"}

{php} } {/php}
		</td>
	</tr>
</table>