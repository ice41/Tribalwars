<?php
$sql = mysql_query("SELECT ip,uv,time FROM `logins` WHERE `userid` = '".$user['id']."' ORDER BY `time` DESC LIMIT 20");