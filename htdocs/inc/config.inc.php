<?
header('Content-Type: text/html; charset=ISO-8859-1'); 
ob_start();

// CONFIGURAÇÕES DO SQL (CONEXÃO COM O SERVIDOR);
define('db_host', 'localhost');			// -- IP MySQL (Padrão => localhost)
define('db_user', 'root');				// -- Login MySQL (Padrão => root)
define('db_pw', '');					// -- Senha MySQL
define('db_name', 'login');				// -- Database MySQL (Padrão => login)

// OUTROS;
define('link_forum', 'http://lanservers.tk');

// CONFIGURAÇÕES DE SMTP (ENVIO DE E-MAILS)
define('mail_username', 'kevin.kfs@live.com');		// -- E-Mail da conta
define('mail_password', '');				// -- Senha do E-Mail
define('mail_from', 'kevin.kfs@live.com');			// -- E-Mail de quem está enviando (Recomendando deixar o mesmo E-Mail do usuário)
define('smtp_host', 'kevin.kfs@live.com');				// -- Servidor SMTP
define('smtp_port', 587);								// -- Porta do servidor SMTP

// REQUIRES/SECURITY/CONEXÃO MySQL (NÃO MECHER);
require_once('class/mysql.class.php');
require_once('class/functions.class.php');
require_once('class/time.class.php');
$db = new conexao();
$db->connectar();
$func = new funcoes();
$time = new Time();
?>