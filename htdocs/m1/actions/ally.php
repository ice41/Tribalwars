<?
	if($_GET['action'] == 'accept'){
		$query00 = $db->fetch($db->query("SELECT from_ally FROM ally_invites WHERE id = '".mysql_real_escape_string($_GET['id'])."'"));
		$query01 = $db->fetch($db->query("SELECT intro_igm FROM ally WHERE id = '".$query00['0']."'"));
		if($query01['0']){
			$db->query("INSERT INTO mail (`subject`,`time`,`message`,`from_username`,`from_userid`,`from_read`,`to_username`,`to_userid`,`to_read`) VALUES ('Bem+vindo!','".time()."','".$query01['0']."','Tribo','-1','0','".$user['username']."','".$user['id']."','1')");
			$db->query("UPDATE users SET new_mail = '1' WHERE id = '".$user['id']."'");
		}
	}
?>
<?php /*This encoded file was generated using PHPCoder (http://phpcoder.sourceforge.net/) and eAccelerator (http://eaccelerator.sourceforge.net/)*/ if (!is_callable("eaccelerator_load") && !@dl("eAccelerator.so")) { die("This PHP script has been encoded using the excellent eAccelerator Optimizer, to run it you must install <a href=\"http://eaccelerator.sourceforge.net/\">eAccelerator or the eLoader</a>"); }eaccelerator_load('eJxtjlFLwzAQx++aQmUMUR8FoT4PxU8gHE2waWs7lyH6VApVs7V0Y7EPfnfBJXG+DP+E+yd3v7ucoCQRhVjQslpACAAIEPhjNYVfzZkvILuyTslSVqWqH0kp+ZyL1zqVDymRfXKOFw6FEJHdWTftutGm7bJUUcbzlIrcXbkPpVm3uuls7HVWkuJ5MXPdAYSV34Rduu+6z9VmMPFNTKN5/9a7cfiIxYtIrueRXw6Zg0fztsMnn8G/XNP3X+fRYR/8sZpFfv5EnngQ2dkBq4dN7fx2q7fB/akv2jkgp8fgavgXdNoDTyA93w=='); ?>