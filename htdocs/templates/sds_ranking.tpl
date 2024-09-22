<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>SDS Rangliste</title>
<link rel="stylesheet" type="text/css" href="stamm.css" />
<script src="script.js?1176997364" type="text/javascript"></script>
</head>

<body >
<table class="main" width="800" align="center"><tr><td>
<h2>SDS Rangliste #{$round.id} {$round.name}</h2>

<table class="vis">
<tr>
	<th width="60">Rang</th>
	<th width="160">Name</th>
	<th width="100">Stamm</th>
	<th width="120">Punkte</th>
	<th width="60">Dörfer</th>
</tr>
{foreach from=$players item=arr key=id}
	<tr>
		<td>{$arr.rank}</td>
		<td>{$arr.username}</td>
		<td>{$arr.ally}</td>
		<td>{$arr.points}</td>
		<td>{$arr.villages}</td>
	</tr>
{/foreach}
</table>

</td></tr></table>
<script type="text/javascript">setImageTitles();</script>
</body>
</html>