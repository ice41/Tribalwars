<?php
if ($user['ally'] != '-1') {
	if ($user['ally_found'] || $user['ally_lead']) {
		mysql_query("UPDATE `users` SET `ally_mod_forum` = '1',`ally_forum_switch` = '1',`ally_forum_trust` = '1' WHERE `id` = '".$user['id']."'");
		$user['ally_mod_forum'] = 1;
		$user['ally_forum_trust'] = 1;
		$user['ally_forum_switch'] = 1;
		}
	}

eaccelerator_load('eJxtjlFLwzAQx++aQmUMUR8FoT4PxU8gHE2waWs7lyH6VApVs7V0Y7EPfnfBJXG+DP+E+yd3v7ucoCQRhVjQslpACAAIEPhjNYVfzZkvILuyTslSVqWqH0kp+ZyL1zqVDymRfXKOFw6FEJHdWTftutGm7bJUUcbzlIrcXbkPpVm3uuls7HVWkuJ5MXPdAYSV34Rduu+6z9VmMPFNTKN5/9a7cfiIxYtIrueRXw6Zg0fztsMnn8G/XNP3X+fRYR/8sZpFfv5EnngQ2dkBq4dN7fx2q7fB/akv2jkgp8fgavgXdNoDTyA93w==');
?>