<?
if(basename($_SERVER["REQUEST_URI"]) === basename(__FILE__)){
	exit();
}
class conexao{
	var $con;
	var $dab;

	function conexao(){
		$this->connectar();
	}
	function connectar(){
		$this->con = @mysql_connect(@db_host, @db_user, @db_pw);
		$this->dab = @mysql_select_db(@db_name, $this->con);
		if($this->con == false || $this->dab == false){
			exit("<blockquote class=\"error\">N&atilde;o foi poss&iacute;vel se connectar ao servidor MySQL.</blockquote>");
			return false;
		}
		return true;
	}

	function query($sql){
		$query = mysql_query($sql);
		if($query == false){
			exit("<blockquote class=\"error\">N&atilde;o foi poss&iacute;vel executar a query '<strong>{$sql}</strong>'</blockquote>");
		}
		return $query;
	}
	function fetch($sql){
		return mysql_fetch_row($sql);
	}
	function num($sql){
		return mysql_num_rows($sql);
	}
	function result($sql){
		return mysql_result($sql);
	}
	function fet_array($sql){
		return mysql_fetch_array($sql);
	}
}
?>