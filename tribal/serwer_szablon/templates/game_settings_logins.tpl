<h3>Logowania</h3>
<p>Na tej stronie widzisz, kiedy mia�y miejsce loginy i nieudane pr�by zalogowania si� do Twojego konta. Je�eli stwierdzisz, �e kto� nieupowa�niony ma dost�p do Twojego konta, powiniene� niezw�ocznie zmieni� has�o. Zale�nie od rodzaju po��czenia: numer IP mo�e si� zmienia�, gdy na nowo ��czysz si� z internetem.</p>

<h4>20 ostatnich zalogowa�</h4>

<table class="vis">
	<tbody>
		<tr>
			<th>Data</th>
			<th>IP</th>
			<th>Zast�pca</th>
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