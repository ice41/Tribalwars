<h2>Plugin Admin</h2>

{if !empty($action_text)}
<h3>Aktion</h3>
{$action_text}
{/if}

<h3>Instaleaza fisier</h3>
<form action="index.php?screen=plugin_admin" method="post" enctype="multipart/form-data">
<input type="file" name="filen" style="border:1px solid #804000;background-color:#F8F4E8;padding:3px;" /><br />
<input type="submit" name="upload" value="Installieren / Updaten" style="text-align:center;border:2px solid #804000;background-color:#F8F4E8;padding:3px;" /> 
</form>

<h3>Instaleaza cod</h3>
<form action="index.php?screen=plugin_admin" method="post">
<textarea name="input" style="width:90%;height:70%;border:1px solid #804000;background-color:#F8F4E8;padding:3px;"></textarea><br />
<input type="submit" value="Installieren / Updaten" style="text-align:center;border:2px solid #804000;background-color:#F8F4E8;padding:3px;" /> 
</form>
