<?
header('Content-Type: text/html; charset=ISO-8859-1'); 
ob_start();

// CONFIGURA��ES DO SQL (CONEX�O COM O SERVIDOR);
define('db_host', 'localhost');			// -- IP MySQL (Padr�o => localhost)
define('db_user', 'root');				// -- Login MySQL (Padr�o => root)
define('db_pw', '');					// -- Senha MySQL
define('db_name', 'login');				// -- Database MySQL (Padr�o => login)

// OUTROS;
define('link_forum', 'http://lanservers.tk');

// CONFIGURA��ES DE SMTP (ENVIO DE E-MAILS)
define('mail_username', 'kevin.kfs@live.com');		// -- E-Mail da conta
define('mail_password', '');				// -- Senha do E-Mail
define('mail_from', 'kevin.kfs@live.com');			// -- E-Mail de quem est� enviando (Recomendando deixar o mesmo E-Mail do usu�rio)
define('smtp_host', 'kevin.kfs@live.com');				// -- Servidor SMTP
define('smtp_port', 587);								// -- Porta do servidor SMTP

// REQUIRES/SECURITY/CONEX�O MySQL (N�O MECHER);
require_once('class/mysql.class.php');
require_once('class/functions.class.php');
require_once('class/time.class.php');
$db = new conexao();
$db->connectar();
$func = new funcoes();
$time = new Time();
?>