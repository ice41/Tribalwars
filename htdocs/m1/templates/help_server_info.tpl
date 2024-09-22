<h3>Informa&ccedil;&otilde;es do servidor</h3>
<table class="vis" width="50%" style="border-spacing: 1px; background-color: #FEE47D; border:1px solid #fee47d;-moz-border-radius:5px 5px 5px 5px;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px;margin-left:5px;">
	<tr><th>Configura&ccedil;&atilde;o</th><th>Valor</th></tr>
	<tr><td>Velocidade do mundo:</td><td>{$config.speed}</td></tr>
	<tr><td>Velocidade das tropas:</td><td>{$config.movement_speed}</td></tr>
	<tr><td>Moral</td><td>{if $config.moral_activ} ativa {else}inativa{/if}</td></tr>
	<tr><td>Prote&ccedil;&atilde;o para iniciantes:</td><td>{$config.noob_protection_v1} Minutos</td></tr>
	<tr><td>Descida de lealdade:</td><td>{$config.agreement_min} - {$config.agreement_max}</td></tr>
	<tr><td>Versiune server:</td><td>{$config.version}</td></tr>
</table>