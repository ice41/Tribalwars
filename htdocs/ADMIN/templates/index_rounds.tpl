<h3>Runden l&ouml;schen</h3>
<p>Mit diesem Modul kann man vorher gespeicherte Runden ganz einfach l&ouml;schen</p>
<table class="vis">
<th>#</th>
<th>Rundenname</th>
<th>Start</th>
<th>Ende</th>
<tr>
{foreach from=$data item=data}
<td>
{$data.name}
</td>
{/foreach}
</tr>
</table>