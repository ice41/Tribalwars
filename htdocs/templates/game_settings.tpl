<table width="100%" align="center">
	<tr>
		<td>
                        
			<h2>Set&#259;ri</h2>
			{if !empty($error)}
         {if $error=='Aceasta parola este falsa'}
            {assign var='error' value='Parola veche introdus&#259; de tine este incorecta! Te rugam s&#259; introduci parola din nou, dar de aceast&#259; dat&#259; cu mai mult&#259; aten&#355;ie.'}
         {/if}
         {if $error=='Passwörter stimmen nicht überein'}
            {assign var='error' value='Noua parol&#259; introdusa de tine nu corespunde cu parola nou&#259; ce a fost repetata! Te rugam s&#259; introduci din nou cele dou&#259; parole, dar de aceast&#259; dat&#259; cu mai mult&#259; aten&#355;ie.'}
         {/if}
         {if $error=='Marimea maxima este 120kByte ,incearca din nou!'}
            {assign var='error' value='Emblema proprie nu poate depasi 120kb! Te rug&#259;m s&#259; introduci o alt&#259; emblem&#259;.'}
         {/if}
         {if $error=='Acest fisier pe care lai uploadat nu este unul dintre JPEG, JPG, PNG und GIF!'}
            {assign var='error' value='Ebmlema con&#355;ine un format invalid/nepermis! Formaturile sunt: JPEG, PNG, GIF.'}
         {/if}
         {if $error=='Das Wappen darf maximal 240x180px groÃŸ sein!'}
            {assign var='error' value='Emblema este prea mare! Dimensiunile maxime sunt de 240x180!'}
         {/if}


				<h2 class="error">{$error}</h2>
			{/if}
<table width="100%">
					<tr>
						<td valign="top" width="130">
							<table class="vis">
							{if $mode == 'profile'}
									<tr>
                        			<td class="selected" width="200">
										<a href="game.php?village={$village.id}&amp;screen=settings&amp;mode=profile">Profil</a>
									</td>
                    			</tr>

									{else}
                    			<tr>
                        		<td width="120">
									<a href="game.php?village={$village.id}&amp;screen=settings&amp;mode=profile">Profil</a>
								</td>
							</tr>
									{/if}
									{if $mode == 'settings'}
									<tr>
                        			<td class="selected" width="120">
										<a href="game.php?village={$village.id}&amp;screen=settings&amp;mode=settings">Set&#259;ri</a>
									</td>
                    			</tr>

									{else}
                    			<tr>
                        		<td width="120">
									<a href="game.php?village={$village.id}&amp;screen=settings&amp;mode=settings">Set&#259;ri</a>
								</td>
							</tr>
									{/if}	
									{if $mode == 'vacation'}
									<tr>
                        			<td class="selected" width="120">
										<a href="game.php?village={$village.id}&screen=settings&mode=vacation">Mod de vacan&#355;&#259;</a>
									</td>
                    			</tr>

									{else}
                    			<tr>
                        		<td width="120">
									<a href="game.php?village={$village.id}&screen=settings&mode=vacation">Mod de vacan&#355;&#259;</a>
								</td>
							</tr>
									{/if}
									{if $mode == 'quickbar'}
									<tr>
                        			<td class="selected" width="120">
										<a href="game.php?village={$village.id}&amp;screen=settings&amp;mode=quickbar">Bar&#259; link-uri rapide</a>
									</td>
                    			</tr>

									{else}
                    			<tr>
                        		<td width="120">
									<a href="game.php?village={$village.id}&amp;screen=settings&amp;mode=quickbar">Bar&#259; link-uri rapide</a>
								</td>
							</tr>
									{/if}
									{if $mode == 'logins'}
									<tr>
                        			<td class="selected" width="120">
										<a href="game.php?village={$village.id}&amp;screen=settings&amp;mode=logins">Login</a>
									</td>
                    			</tr>

									{else}
                    			<tr>
                        		<td width="120">
									<a href="game.php?village={$village.id}&amp;screen=settings&amp;mode=logins">Login</a>
								</td>
							</tr>
									{/if}
									{if $mode == 'change_passwd'}
									<tr>
                        			<td class="selected" width="120">
										<a href="game.php?village={$village.id}&amp;screen=settings&amp;mode=change_passwd">Modificarea parolei</a>
									</td>
                    			</tr>

									{else}
                    			<tr>
                        		<td width="120">
									<a href="game.php?village={$village.id}&amp;screen=settings&amp;mode=change_passwd">Modificarea parolei</a>
								</td>
							</tr>
									{/if}
									
                                
								
					
								
								{if $mode == 'userdelete'}
								<tr>
                        			<td class="selected" width="120">
										<a href="game.php?village={$village.id}&amp;screen=settings&amp;mode=userdelete">&#350;terge contul</a>
									</td>
                    			</tr>

									{else}
                    			<tr>
                        		<td width="120">
									<a href="game.php?village={$village.id}&amp;screen=settings&amp;mode=userdelete">&#350;terge contul</a>
								</td>
							</tr>
									{/if}
									{if $mode == 'start'}
									<tr>
                        			<td class="selected" width="120">
										<a href="game.php?village={$village.id}&screen=settings&mode=start">&#206;nceput nou</a>
									</td>
                    			</tr>

									{else}
                    			<tr>
                        		<td width="120">
									<a href="game.php?village={$village.id}&screen=settings&mode=start">&#206;nceput nou</a>
								</td>
							</tr>
									{/if}
									<tr>
								<td>
								<a href="game.php?village={$village.id}&amp;screen=support">&#206;ntrebare suport</a>
								</td>
								</tr>
                		</table>
            		</td>
					<td valign="top" align="left">

							{include file="game_settings_$mode.tpl" title=foo}
                            
       
       
            		</td>
				</tr>
			</table>
		</td>
	</tr>
</table>
