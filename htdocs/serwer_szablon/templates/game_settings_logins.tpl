<h3>Logowania</h3>
<p>Na tej stronie widzisz, kiedy mia�y miejsce loginy i nieudane pr�by zalogowania si� do Twojego konta. Je�eli stwierdzisz, �e kto� nieupowa�niony ma dost�p do Twojego konta, powiniene� niezw�ocznie zmieni� has�o. Zale�nie od rodzaju po��czenia: numer IP mo�e si� zmienia�, gdy na nowo ��czysz si� z internetem.</p>

<h4>20 ostatnich zalogowa�</h4>
<table class="vis">
<tr><th>Data</th><th>IP</th><th>Zast�pstwo</th></tr>
{foreach from=$logins item=arr key=id}
	<tr><td>{$pl->pl_date($arr.time)}</td><td>{$arr.ip}</td><td>{$arr.uv}</td></tr>
{/foreach}
</table>