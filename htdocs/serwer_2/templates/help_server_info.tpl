<h3>Serverinfo</h3>

<table class="vis">
<tr><th>Eigenschaft</th><th>Wert</th></tr>
<tr><td>Geschwindigkeit</td><td>{$config.speed}</td></tr>
<tr><td>Einheitengeschwindigkeit</td><td>{$config.movement_speed}</td></tr>

<tr><td>Moral</td><td>{if $config.moral_activ}aktiv{else}inaktiv{/if}</td></tr>
<tr><td>Angriffschutz für Neueinsteiger</td><td>{$config.noob_protection} Minuten</td></tr>
<tr><td>Abbruchzeit für Angriffe</td><td>{$config.cancel_dealers} Minuten </td></tr>
<tr><td>Abbruchzeit für Händler</td><td>{$config.cancel_dealers} Minuten </td></tr>

<tr><td>Zustimmungsverlust durch AG</td><td>20 bis 35</td></tr>
<tr><td>Version</td><td>{$config.version}</td>
</tr>
</table>
<br />
