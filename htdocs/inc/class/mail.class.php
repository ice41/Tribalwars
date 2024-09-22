<?
class Mail{
	var $Servidor;
	var $Porta;

	var $timeOut = 30;

	var $Autenticado;

	var $Usuario;
	var $Senha;

	var $EmailDe;
	var $EmailDeVisual;

	var $EmailPara;
	var $EmailParaVisual;

	var $Assunto;
	var $Corpo;

	var $erros = false;

	function verificarIntegridade(){
		if($this->Autenticado === true){
			if(empty($this->Usuario) or empty($this->Senha)){
				$this->erros = true;
				return false;
			}
		}
		if(empty($this->Servidor)){
			$this->erros = true;
			return false;
		}
		if(empty($this->EmailDe) or empty($this->EmailPara) or empty($this->Assunto) or empty($this->Corpo)){
			$this->erros = true;
			return false;
		}
		return true;
	}
	function esperarResposta($socket, $response){
		while(substr($server_response, 3, 1) != " "){
			if(!($server_response = fgets($socket, 256))){
				$this->erros = true;
				return false;
			}
			if(!(substr($server_response, 0, 3) == $response)){
				$this->erros = true;
				return false;
			}
		}
		return true;
	}
	function enviaPacote($socket, $data){
		if(!fputs($socket, $data."\r\n")){
			return false;
		}
		return true;
	}
	function Enviar(){
		$boundary = md5(date("r", time()));
		if(!$this->verificarIntegridade()){
			return false;
		}
		if(!$socket = fsockopen($this->Servidor, $this->Porta, &$errno, &$errstr, $this->timeOut)){
			$this->erros = true;
			return false;
		}
		$this->esperarResposta($socket, 220);
		if($this->Autenticado){
			$this->enviaPacote($socket, "EHLO ".$this->Servidor);
			$this->esperarResposta($socket, 250);

			$this->enviaPacote($socket, "AUTH LOGIN");
			$this->esperarResposta($socket, 334);
               
			$this->enviaPacote($socket, base64_encode($this->Usuario));
			$this->esperarResposta($socket, 334);
           
			$this->enviaPacote($socket, base64_encode($this->Senha));
			$this->esperarResposta($socket, 235);
		}else{
			$this->enviaPacote($socket, "HELO ".$this->Servidor);
			$this->esperarResposta($socket, 250);
		}

		$this->enviaPacote($socket, "MAIL FROM: ".$this->EmailDe);
		$this->esperarResposta($socket, 250);

		$Emails = explode(";", $this->EmailPara);
		for($i = 0; $i < count($Emails); $i++){
			$this->enviaPacote($socket, "RCPT TO: ".$Emails[$i]);
			$this->esperarResposta($socket, 250);
		}

		$this->enviaPacote($socket, "DATA");
		$this->esperarResposta($socket, 354);

		if(strlen($this->EmailDeVisual) == 0){
			$this->enviaPacote($socket, "From: ".$this->EmailDe);
		}else{
			$this->enviaPacote($socket, "From: {$this->EmailDeVisual} <{$this->EmailDe}>");
		}

		$To = "To: ";
		$Emails = explode(";", $this->EmailPara);
		for($i = 0; $i < count($Emails); $i++){
			if(empty($Emails[$i])){
				continue;
			}
			$To .= $Emails[$i].", ";
		}
		$To = substr($To, 0, strrpos($To, ","));

		$this->enviaPacote($socket, $To);
		$this->enviaPacote($socket, "Subject: ".$this->Assunto);
		$this->enviaPacote($socket, "Date: ".date("d M y H:i:s"));
		$this->enviaPacote($socket, "MIME-Version: 1.0");
		$this->enviaPacote($socket, "Content-Type: text/html; charset=ISO-8859-1\r\n");
		$this->enviaPacote($socket, $this->Corpo);
		$this->enviaPacote($socket, "\r\n");

		$this->enviaPacote($socket, "\r\n\r\n.");
		$this->esperarResposta($socket, 250);

		$this->enviaPacote($socket, "QUIT");
		fclose($socket);

		if($this->erros == false){
			return true;
		}
		return false;
	}
}
?>