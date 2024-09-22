<h3>Loguri</h3>
Aici sunt afisate ultimele 20 de log&#259;ri (loguri) ale dumneavoastr&#259;.
<table class="vis">
<tr><th>Data</th><th>IP</th></tr>
{foreach from=$logins item=arr key=id}
	<tr><td>

{php}
$data_terminare=$this->_tpl_vars['arr']['time'];
$data_terminare = str_replace("heute um","Ast&#259;zi la ora",$data_terminare);
$data_terminare = str_replace("Uhr","",$data_terminare);
$data_terminare = str_replace("am","&#206;n data de",$data_terminare);
$data_terminare = str_replace("um","La ora",$data_terminare);
$data_terminare = str_replace("morgen","M&#226;ine",$data_terminare);
//Variabila originala tpl: {$arr.time}

echo $data_terminare;

{/php}





</td><td>{$arr.ip}</td></tr>
{/foreach}
</table>