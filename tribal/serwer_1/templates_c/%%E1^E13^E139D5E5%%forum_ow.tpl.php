<?php /* Smarty version 2.6.14, created on 2014-07-06 22:12:06
         compiled from forum/forum_ow.tpl */ ?>
<?php if ($this->_tpl_vars['pok_tem']): ?>
	<h1><?php echo $this->_tpl_vars['forumname']; ?>
</h1>

	<table width="100%">
		<tbody>
			<tr>
				<td>
					<a href="<?php echo $this->_tpl_vars['base_link']; ?>
&sm=new_thread&aktu_fid=<?php echo $this->_tpl_vars['aktu_fid']; ?>
" class="thread_button">
						<span class="thread_new_open"></span>
						<span class="thread_new">Nowy temat</span>
						<span class="thread_new_close"></span>
					</a>
					<a href="<?php echo $this->_tpl_vars['base_link']; ?>
&sm=new_pool&aktu_fid=<?php echo $this->_tpl_vars['aktu_fid']; ?>
" class="thread_button">
						<span class="thread_poll_open"></span>
						<span class="thread_poll">Nowa ankieta</span>
						<span class="thread_poll_close"></span>
					</a>
				</td>
				<td align="right">
					<a href="<?php echo $this->_tpl_vars['base_link']; ?>
&sm=ow&action=mark_read&aktu_fid=<?php echo $this->_tpl_vars['aktu_fid']; ?>
&h=<?php echo $this->_tpl_vars['hkey']; ?>
">» zaznacz jako przeczytane</a><br>
					<a href="<?php echo $this->_tpl_vars['base_link']; ?>
&sm=ow&action=mark_read_all&aktu_fid=<?php echo $this->_tpl_vars['aktu_fid']; ?>
&h=<?php echo $this->_tpl_vars['hkey']; ?>
" onclick="return confirm('Oznaczyæ wszystkie fora jako przeczytane?');">» Oznacz wszystkie fora jako przeczytane</a>
				</td>
			</tr>
		</tbody>
	</table>
	
	<form action="<?php echo $this->_tpl_vars['base_link']; ?>
&sm=ow&action=mod&h=<?php echo $this->_tpl_vars['hkey']; ?>
&aktu_fid=<?php echo $this->_tpl_vars['aktu_fid']; ?>
" method="post">
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
				<?php $_from = $this->_tpl_vars['threads_arr']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['tid'] => $this->_tpl_vars['t_arr']):
?>
					<tr>
						<td style="white-space: normal;">
							<?php if ($this->_tpl_vars['can_edit']): ?>
								<input name="thread_ids[<?php echo $this->_tpl_vars['tid']; ?>
]" type="checkbox"> 
							<?php endif; ?>
							<?php if ($this->_tpl_vars['t_arr']['close']): ?>
								<?php if ($this->_tpl_vars['forum']->is_thread_readed($this->_tpl_vars['aktu_fid'],$this->_tpl_vars['tid'])): ?>
									<img title="Zamkniête i nie przeczytane" src="/ds_graphic/forum/thread_closed_unread.png" alt="Zamkniête i nie przeczytane">&nbsp;
								<?php else: ?>
									<img title="Zamkniête" src="/ds_graphic/forum/thread_closed.png" alt="Zamkniête">&nbsp;
								<?php endif; ?>
							<?php else: ?>
								<?php if ($this->_tpl_vars['forum']->is_thread_readed($this->_tpl_vars['aktu_fid'],$this->_tpl_vars['tid'])): ?>
									<img title="Nie przeczytane" src="/ds_graphic/forum/thread_unread.png" alt="Nie przeczytane">&nbsp;
								<?php else: ?>
									<img title="Przeczytane" src="/ds_graphic/forum/thread_read.png" alt="Przeczytane">&nbsp;
								<?php endif; ?>
							<?php endif; ?>
							<?php if ($this->_tpl_vars['t_arr']['pool'] && $this->_tpl_vars['t_arr']['important']): ?>
								<b>Wa¿na ankieta:&nbsp;</b>
							<?php else: ?>
								<?php if ($this->_tpl_vars['t_arr']['pool']): ?>
									<b>Ankieta:&nbsp;</b>
								<?php endif; ?>
								<?php if ($this->_tpl_vars['t_arr']['important']): ?>
									<b>Wa¿ne:&nbsp;</b>
								<?php endif; ?>
							<?php endif; ?>
							<a href="<?php echo $this->_tpl_vars['base_link']; ?>
&sm=s_thread&aktu_fid=<?php echo $this->_tpl_vars['aktu_fid']; ?>
&aktu_tid=<?php echo $this->_tpl_vars['tid']; ?>
"><?php echo $this->_tpl_vars['t_arr']['nazwa']; ?>
</a>
						</td>
						<td>
							<div style="font-size: 8pt;" align="center">
								<?php if ($this->_tpl_vars['t_arr']['autor_exists']): ?>
									<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=info_player&id=<?php echo $this->_tpl_vars['t_arr']['autor_id']; ?>
" target="_blank">
										<?php echo $this->_tpl_vars['t_arr']['autor_name']; ?>

									</a>
								<?php else: ?>
									<?php echo $this->_tpl_vars['t_arr']['autor_name']; ?>

								<?php endif; ?>
									
								<br>
									
								<?php echo $this->_tpl_vars['t_arr']['autor_ctime']; ?>

							</div>
						</td>
						<td>
							<div style="font-size: 8pt;" align="center">
								<?php if ($this->_tpl_vars['t_arr']['last_odp_exists']): ?>
									<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=info_player&id=<?php echo $this->_tpl_vars['t_arr']['last_odp_id']; ?>
" target="_blank">
										<?php echo $this->_tpl_vars['t_arr']['last_odp_name']; ?>

									</a>
								<?php else: ?>
									<?php echo $this->_tpl_vars['t_arr']['last_odp_name']; ?>

								<?php endif; ?>
									
								<br>
									
								<?php echo $this->_tpl_vars['t_arr']['last_odp_ctime']; ?>

							</div>
						</td>
						<td align="center">
							<?php echo $this->_tpl_vars['t_arr']['odpowiedzi']; ?>

						</td>
					</tr>
				<?php endforeach; endif; unset($_from); ?>
				<?php if ($this->_tpl_vars['can_edit']): ?>
					<tr>
						<th colspan="5">
							<input name="all" class="selectAll" onclick="selectAll(this.form, this.checked)" type="checkbox">zaznacz wszystkie
						</th>
					</tr>
				<?php endif; ?>
			</tbody>
		</table>
	<?php if ($this->_tpl_vars['can_edit']): ?>
		<input src="/ds_graphic/forum/thread_delete.png?1" title="Skasuj" name="del" onclick="return confirm('Temat ma zostaæ skasowany?')" type="image">
		<input src="/ds_graphic/forum/thread_close.png?1" title="Zamknij" name="close" type="image">
		<input src="/ds_graphic/forum/thread_move.png?1" title="Przesuñ" name="move" type="image">
	<?php endif; ?>
	</form>
<?php else: ?>
	<span class="error" style="font-size: 18px;">Nie odnaleziono ¿adnych tematów w danym forum</span>
<?php endif; ?>