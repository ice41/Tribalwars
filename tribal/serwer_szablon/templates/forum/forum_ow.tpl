{if $pok_tem}
	<h1>{$forumname}</h1>

	<table width="100%">
		<tbody>
			<tr>
				<td>
					<a href="{$base_link}&sm=new_thread&aktu_fid={$aktu_fid}" class="thread_button">
						<span class="thread_new_open"></span>
						<span class="thread_new">Nowy temat</span>
						<span class="thread_new_close"></span>
					</a>
					<a href="{$base_link}&sm=new_pool&aktu_fid={$aktu_fid}" class="thread_button">
						<span class="thread_poll_open"></span>
						<span class="thread_poll">Nowa ankieta</span>
						<span class="thread_poll_close"></span>
					</a>
				</td>
				<td align="right">
					<a href="{$base_link}&sm=ow&action=mark_read&aktu_fid={$aktu_fid}&h={$hkey}">» zaznacz jako przeczytane</a><br>
					<a href="{$base_link}&sm=ow&action=mark_read_all&aktu_fid={$aktu_fid}&h={$hkey}" onclick="return confirm('Oznaczyæ wszystkie fora jako przeczytane?');">» Oznacz wszystkie fora jako przeczytane</a>
				</td>
			</tr>
		</tbody>
	</table>
	
	<form action="{$base_link}&sm=ow&action=mod&h={$hkey}&aktu_fid={$aktu_fid}" method="post">
		<table class="vis nowrap" width="100%">
			<colgroup>
				<col width="*">

				<col width="180">
				<col width="180">
				<col width="70">
			</colgroup>
			<tbody>
				<tr>
					<th>Tematy</th>
					<th>Autor</th>
					<th>Ostatni wpis</th>
					<th>Odpowiedzi</th>
				</tr>
				{foreach from=$threads_arr key=tid item=t_arr}
					<tr>
						<td style="white-space: normal;">
							{if $can_edit}
								<input name="thread_ids[{$tid}]" type="checkbox"> 
							{/if}
							{if $t_arr.close}
								{if $forum->is_thread_readed($aktu_fid,$tid)}
									<img title="Zamkniête i nie przeczytane" src="/ds_graphic/forum/thread_closed_unread.png" alt="Zamkniête i nie przeczytane">&nbsp;
								{else}
									<img title="Zamkniête" src="/ds_graphic/forum/thread_closed.png" alt="Zamkniête">&nbsp;
								{/if}
							{else}
								{if $forum->is_thread_readed($aktu_fid,$tid)}
									<img title="Nie przeczytane" src="/ds_graphic/forum/thread_unread.png" alt="Nie przeczytane">&nbsp;
								{else}
									<img title="Przeczytane" src="/ds_graphic/forum/thread_read.png" alt="Przeczytane">&nbsp;
								{/if}
							{/if}
							{if $t_arr.pool && $t_arr.important}
								<b>Wa¿na ankieta:&nbsp;</b>
							{else}
								{if $t_arr.pool}
									<b>Ankieta:&nbsp;</b>
								{/if}
								{if $t_arr.important}
									<b>Wa¿ne:&nbsp;</b>
								{/if}
							{/if}
							<a href="{$base_link}&sm=s_thread&aktu_fid={$aktu_fid}&aktu_tid={$tid}">{$t_arr.nazwa}</a>
						</td>
						<td>
							<div style="font-size: 8pt;" align="center">
								{if $t_arr.autor_exists}
									<a href="game.php?village={$village.id}&screen=info_player&id={$t_arr.autor_id}" target="_blank">
										{$t_arr.autor_name}
									</a>
								{else}
									{$t_arr.autor_name}
								{/if}
									
								<br>
									
								{$t_arr.autor_ctime}
							</div>
						</td>
						<td>
							<div style="font-size: 8pt;" align="center">
								{if $t_arr.last_odp_exists}
									<a href="game.php?village={$village.id}&screen=info_player&id={$t_arr.last_odp_id}" target="_blank">
										{$t_arr.last_odp_name}
									</a>
								{else}
									{$t_arr.last_odp_name}
								{/if}
									
								<br>
									
								{$t_arr.last_odp_ctime}
							</div>
						</td>
						<td align="center">
							{$t_arr.odpowiedzi}
						</td>
					</tr>
				{/foreach}
				{if $can_edit}
					<tr>
						<th colspan="5">
							<input name="all" class="selectAll" onclick="selectAll(this.form, this.checked)" type="checkbox">zaznacz wszystkie
						</th>
					</tr>
				{/if}
			</tbody>
		</table>
	{if $can_edit}
		<input src="/ds_graphic/forum/thread_delete.png?1" title="Skasuj" name="del" onclick="return confirm('Temat ma zostaæ skasowany?')" type="image">
		<input src="/ds_graphic/forum/thread_close.png?1" title="Zamknij" name="close" type="image">
		<input src="/ds_graphic/forum/thread_move.png?1" title="Przesuñ" name="move" type="image">
	{/if}
	</form>
{else}
	<span class="error" style="font-size: 18px;">Nie odnaleziono ¿adnych tematów w danym forum</span>
{/if}
