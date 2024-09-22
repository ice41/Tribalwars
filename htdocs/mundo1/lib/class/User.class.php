<?php

/**
 * Handles everything about the user, and its data.
 * merged GetUserData and login
 * 
 * @author ?, rewritten and documented by Christopher <christopher@twlan.org>
 */
class User {

    var $db;
    var $dbHelper;
    var $lang;
    var $session;
    var $userInfo;
    var $userID;

    /**
     * @constructor
     * 
     * @global resource $db 
     */
    function __construct() {
	$this->db = Registry::get('db');
	$this->dbHelper = Registry::get('dbHelper');
	$this->config = Registry::get('config');
	$this->lang = new aLang("error", $this->config->get('lang'));
	$this->session = Registry::get('session');
	$this->initUser();
    }

    function initUser() {
	$this->userID = $this->session['userid'];
	if ($this->userID != false) {
	    $this->userInfo = $this->getInfoByID($this->userID, '*');

	    // update account activity
	    $update = array('last_activity' => time());
	    $this->dbHelper->simpleUpdate('users', $update, 'id = ' . $this->userID);
	}
    }

    function getFirstVillage($userID) {
	$result = $this->dbHelper->simpleSelect(
	    'villages', 
	    'id', 
	    array(
		'WHERE' => 'userid = ' . intval($userID),
		'ORDER BY' => 'name ASC, id ASC',
		'LIMIT' => '1'
	    )
	);

	return ($result !== false) ? $result[0]['id'] : false;
    }

   /**
     * Retorna informações do usuário
     * Mudança recente:
     * GetById -> getinfobyid
     * Count de param $ excluído, que adicionou sem sentido uma contagem (ID) na consulta para verificar se o usuário existe.?!
     *
     * Função usada para retornar $ row ["exist_user"], que afirmava se o usuário existia ou não em 0 ou 1.
     * Em vez disso, a função agora retornará falsa se o usuário não existir.
     *
     * @param int $id user ID
     * @param array $columns colunas de dados do usuário solicitados
     * @return array|bool false se o usuário não encontrado
     */
    function getInfoByID($id, $columns) {
	$id = intval($id);

	$info = $this->dbHelper->simpleSelect(
			'users', $columns, array('WHERE' => 'id = ' . $id)
	);
	// the query only resulted in one row, thus it will be in the zeroth place of $info.
	return ($info !== false) ? $info[0] : false;
    }

    /**
     * returns user information
     * renamed: GetByUsername -> getInfoByUsername
     * 
     * 
     * @param string $username
     * @param array $columns
     * @return bool|array false if user not found
     */
    function getInfoByUsername($username, $columns) {
	$username = parse($username);
	$info = $this->dbHelper->simpleSelect(
			'users', $columns, array("WHERE" => "username = '{$username}'")
	);
	// the query only resulted in one row, thus it will be in the zeroth place of $info.
	return ($info !== false) ? $info[0] : false;
    }

    /**
     * checks whether the password is correct
     * hasn't been used anywhere?
     * 
     * @param int $userID
     * @param string $password
     * @return bool 
     */
    function checkPassword($userID, $password) {
	$columns = array("id", "username", "password", "banned");
	$user = $this->getInfoByID($userID, $columns);

	return ( $user['password'] == md5($password) );
    }

    /**
     * Performs the login of a user
     * Creates sessionID if successful.
     * formerly login::do_login()
     * 
     * @param string $username
     * @param string $password
     * @param bool $setCookie
     * @return int|string returns userID or error message
     */
    function login($username, $password, $setCookie=false) {
	$columns = array("id", "username", "password", "banned");
	$user = $this->getInfoByUsername($username, $columns);
	if ($user === false) {
	    return $this->lang->get("account_not_available");
	} elseif ($user['password'] != md5($password)) {
	    return $this->lang->get("invalid_password");
	} elseif ($user['banned'] == "Y") {
	    return $this->lang->get("account_banned");
	} else {
	    $sessionHandler = new SessionHandler();
	    $sessionHandler = $sessionHandler->initSession($user['id']);

	    // Login loggen:
	    //$this->db->query("INSERT into logins (username,time,ip,userid) VALUES ('".$user['username']."',".time().",'".$_SERVER['REMOTE_ADDR']."',".$user['id'].")");
	    $data = array(
		'username' => $user['username'],
		'time' => time(),
		'ip' => $_SERVER['REMOTE_ADDR'],
		'userid' => $user['id']
	    );
	    $this->dbHelper->simpleInsert('logins', $data);

	    if ($setCookie === true) {
		setcookie("id", $user['id'], time() + 150000);
		setcookie("password", $user['password'], time() + 150000);
	    }
	    $this->userInfo = $user;
	    return $user['id'];
	}
    }

    /**
     * formerly login::login_uv
     * @param type $id
     * @return type 
     */
    function loginVacation($id) {
	$columns = array("id", "username", "banned", "vacation_id", "vacation_name", "vacation_accept");
	$user = $this->getInfoByID($id, $columns);

	// check whether one is the legitimate vacation
	$sid = parse($_COOKIE['session']);
	$res = $this->db->query("SELECT userid FROM sessions WHERE sid='$sid'");
	$row = $this->db->fetch($res);

	if ($user === false) {
	    return $this->lang->get("account_not_available");
	} elseif ($row['userid'] != $user['vacation_id'] || $user['vacation_accept'] == 0) {
	    return $this->lang->get("vacation_cancel");
	} elseif ($user['banned'] == "Y") {
	    return $this->lang->get("account_banned");
	} else {
	    $sessionHandler = new SessionHandler();
	    $sessionHandler = $sessionHandler->initSession($user['id'], true);

	    //$this->db->query("INSERT into logins (username,time,ip,userid,uv) VALUES ('".$user['username']."',".time().",'".$_SERVER['REMOTE_ADDR']."',".$user['id'].",'".$user['vacation_name']."')");
	    $data = array(
		'username' => $user['username'],
		'time' => time(),
		'ip' => $_SERVER['REMOTE_ADDR'],
		'userid' => $user['id'],
		'uv' => $user['vacation_name']
	    );
	    $this->dbHelper->simpleInsert('logins', $data);

	    return $user['id'];
	}
    }
/**
 * Reloads Points of Player with the ID $playerid
 * @param int $playerid
 * @return null
 */
 function reload_points($playerid) {
	// Query zum ausrechnen der Punkte	
	$result = $this->db->query("SELECT SUM(points) AS points from villages where userid='$playerid'");
	$row = $this->db->Fetch($result);
	
	// Punkte in DB schreiben
	$this->db->query("UPDATE users SET points='".$row['points']."' where id='$playerid'");
	
}
/**
 * Reloads the points of EVERY PLAYER
 */
 function reload_all_points() {

	$result = $this->db->query("SELECT id,points from users");
	while($row=$this->db->Fetch($result)) {
	
		$result2 = $this->db->query("SELECT SUM(points) AS points from villages where userid=".$row['id']."");
		$row2 = $this->db->Fetch($result2);
		
		// Punkte in DB schreiben
		if ($row['points']!=$row2['points']) {
			$this->db->query("UPDATE users SET points='".$row2['points']."' where id=".$row['id']."");
		}
	}	
}
/**
 * Reloads all player Rangs
 */
 function reload_player_rangs() {
	$rang = 1;
	$result = $this->db->query("SELECT id,rang from users order by points desc");
	while($row=$this->db->Fetch($result)) {
		if ($row['rang']!=$rang) {
			$this->db->query("UPDATE users SET rang='$rang' where id='".$row['id']."'");
		}
		$rang++;
	}	
}
/**
 * Reloads the Killed Player Stat...
 */
 function reload_kill_player() {
	$rang = 1;
	$result = $this->db->query("SELECT id,killed_units_att_rank from users order by killed_units_att desc");
	while($row=$this->db->Fetch($result)) {
		if ($row['killed_units_att_rank']!=$rang) {
			$this->db->query("UPDATE users SET killed_units_att_rank='$rang' where id='".$row['id']."'");
		}
		$rang++;
	}	
	
	$rang = 1;
	$result = $this->db->query("SELECT id,killed_units_def_rank from users order by killed_units_def desc");
	while($row=$this->db->Fetch($result)) {
		if ($row['killed_units_def_rank']!=$rang) {
			$this->db->query("UPDATE users SET killed_units_def_rank='$rang' where id='".$row['id']."'");
		}
		$rang++;
	}	
	
	$rang = 1;
	$result = $this->db->query("SELECT id,killed_units_altogether_rank from users order by killed_units_altogether desc");
	while($row=$this->db->Fetch($result)) {
		if ($row['killed_units_altogether_rank']!=$rang) {
			$this->db->query("UPDATE users SET killed_units_altogether_rank='$rang' where id='".$row['id']."'");
		}
		$rang++;
	}	
}

}

?>