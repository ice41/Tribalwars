<h3>Logowania</h3>
<p>Na tej stronie widzisz, kiedy mia³y miejsce loginy i nieudane próby zalogowania siê do Twojego konta. Je¿eli stwierdzisz, ¿e ktoœ nieupowa¿niony ma dostêp do Twojego konta, powinieneœ niezw³ocznie zmieniæ has³o. Zale¿nie od rodzaju po³¹czenia: numer IP mo¿e siê zmieniaæ, gdy na nowo ³¹czysz siê z internetem.</p>

<h4>20 ostatnich zalogowañ</h4>

<table class="vis">
	<tbody>
		<tr>
			<th>Data</th>
			<th>IP</th>
			<th>Zastêpca</th>
		</tr>
		{foreach from=$logins item=login}
			<tr>
				<td>{$login.time}</td>
				<td>{$login.ip}</td>
				<td><a href="game.php?village={$village.id}&screen=info_user&id={$login.uv}"/>{$login.uv_name}</a></td>
			</tr>
		{/foreach}
	</tbody>
</table>