<h3>Logowania</h3>
<p>Na tej stronie widzisz, kiedy mia³y miejsce loginy i nieudane próby zalogowania siê do Twojego konta. Je¿eli stwierdzisz, ¿e ktoœ nieupowa¿niony ma dostêp do Twojego konta, powinieneœ niezw³ocznie zmieniæ has³o. Zale¿nie od rodzaju po³¹czenia: numer IP mo¿e siê zmieniaæ, gdy na nowo ³¹czysz siê z internetem.</p>

<h4>20 ostatnich zalogowañ</h4>
<table class="vis">
<tr><th>Data</th><th>IP</th><th>Zastêpstwo</th></tr>
{foreach from=$logins item=arr key=id}
	<tr><td>{$pl->pl_date($arr.time)}</td><td>{$arr.ip}</td><td>{$arr.uv}</td></tr>
{/foreach}
</table>