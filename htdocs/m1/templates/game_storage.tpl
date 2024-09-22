<table>
	<tr>
		<td><img src="../graphic/build/storage.jpg" title="Armaz&eacute;m" alt="" /></td>
		<td>
			<h2>Armaz&eacute;m ({$village.storage|nivel})</h2>
			{$description}
		</td>
	</tr>
</table>
<table width="100%">
	<tr>
		<td valign="top" width="50%">
			<table class="vis" width="100%" style="border-spacing: 1px; background-color: #FEE47D; border:1px solid #fee47d;-moz-border-radius:5px 5px 5px 5px;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px;">
				<tr>
					<td width="220">Armazenamento atual:</td>
					<td><b>{$store_datas.storage_size}</b> Unidades de cada recurso</td>
				</tr>
				{if ($store_datas.storage_size_next)!=false}
				<tr>
					<td>Armazenamento no ({$village.storage+1|nivel})</td>
					<td><b>{$store_datas.storage_size_next}</b> Unidades de cada recurso</td>
				</tr>
				{/if}
{php}
	$asdf = $this->_tpl_vars['village']['storage'];
	$bon = mysql_fetch_array(mysql_query("SELECT bonus FROM villages WHERE id = '".$_GET['village']."'"));
	include("include/config.php");
	if($bon['bonus'] == '1'){
		$include = "bonus/max_storage_bonus.php";
	}else{
		$include = "configs/max_storage.php";
	}
	include("include/$include");
{/php}
				{php}if ($arr_maxstorage[$asdf+2]){{/php}
				<tr>
					<td>Armazenamento no ({$village.storage+2|nivel})</td>
					<td><b>{php} echo $arr_maxstorage[$asdf+2]; {/php}</b> Unidades de cada recurso</td>
				</tr>
				{php}}{/php}
				{php}if($arr_maxstorage[$asdf+3]){{/php}
				<tr>
					<td>Armazenamento no ({$village.storage+3|nivel})</td>
					<td><b>{php} echo $arr_maxstorage[$asdf+3]; {/php}</b> Unidades de cada recurso</td>
				</tr>
				{php}}{/php}
				{php}if($arr_maxstorage[$asdf+4]){{/php}
				<tr>
					<td>Armazenamento no ({$village.storage+4|nivel})</td>
					<td><b>{php} echo $arr_maxstorage[$asdf+4]; {/php}</b> Unidades de cada recurso</td>
				</tr>
				{php}}{/php}
				{php}if($arr_maxstorage[$asdf+5]){{/php}
				<tr>
					<td>Armazenamento no ({$village.storage+5|nivel})</td>
					<td><b>{php} echo $arr_maxstorage[$asdf+5]; {/php}</b> Unidades de cada recurso</td>
				</tr>
				{php}}{/php}
			</table>
		</td>
		<td valign="top" width="50%">
			<table class="vis" width="100%" style="border-spacing: 1px; background-color: #FEE47D; border:1px solid #fee47d;-moz-border-radius:5px 5px 5px 5px;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px;">
				<tr>
					<th width="150">Recurso</th>
					<th>Dura&ccedil;&atilde;o (hh:mm:ss)</th>
				</tr>
				{if $wood_sec!=0}
				<tr>
					<td width="250">
						<img src="../graphic/icons/wood.png" title="Madeira" alt="" />
						{$wood_sec_date|format_date|replace:"heute um":"hoje &agrave;s"|replace:"Uhr":""|replace:"am":"em"|replace:"um":"&agrave;s"|replace:"morgen":"amanh&atilde;"}
					</td>
					<td>
						<span class="timer">{$wood_sec|format_time}</span>
					</td>
				</tr>
				{else}
				<tr>
					<td width="250" colspan="2">
						<div class="error">
							<img src="../graphic/icons/wood.png" title="Madeira" alt="" />
							Completo. Os trabalhadores terminaram de colher a madeira!
						</div>
					</td>
				</tr>
				{/if}
				{if $stone_sec!=0}
				<tr>
					<td width="250">
						<img src="../graphic/icons/stone.png" title="Argila" alt="" />
						{$stone_sec_date|format_date|replace:"heute um":"hoje &agrave;s"|replace:"Uhr":""|replace:"am":"em"|replace:"um":"&agrave;s"|replace:"morgen":"amanh&atilde;"}
					</td>
					<td>
						<span class="timer">{$stone_sec|format_time}</span>
					</td>
				</tr>
				{else}
				<tr>
					<td width="250" colspan="2">
						<div class="error">
							<img src="../graphic/icons/stone.png" title="Argila" alt="" />
							Completo. Os trabalhadores terminaram de colher a argila!
						</div>
					</td>
				</tr>
				{/if}
				{if $iron_sec!=0}
				<tr>
					<td width="250">
						<img src="../graphic/icons/iron.png" title="Ferro" alt="" />
						{$iron_sec_date|format_date|replace:"heute um":"hoje &agrave;s"|replace:"Uhr":""|replace:"am":"em"|replace:"um":"&agrave;s"|replace:"morgen":"amanh&atilde;"}
					</td>
					<td>
						<span class="timer">{$iron_sec|format_time}</span>
					</td>
				</tr>
				{else}
				<tr>
					<td width="250" colspan="2">
						<div class="error">
							<img src="../graphic/icons/iron.png" title="Ferro" alt="" />
							Completo. Os trabalhadores terminaram de colher o ferro!
						</div>
					</td>
				</tr>
				{/if}
			</table>
		</td>
	</tr>
</table>