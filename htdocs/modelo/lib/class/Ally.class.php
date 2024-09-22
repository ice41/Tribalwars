<?php

/** 
 * @author steffen
 * Ally Class
 * 
 */
class Ally {	
	/**
	 * Initialed Database Class
	 * @var $db 
	 */
	var $db;
	
	/**
	 * The dbHelper Class
	 * @var $dbHelper
	 */
	var $dbHelper;
	/**
	 * Initialised Lang Class
	 * @var lang
	 */
	var $lang;
	
	/**
	 * Initialised User Class
	 * @var $user
	 */
	var $user;
	/**
	 * Initialised Village Class
	 * @var $village
	 */
	var $village;
	/**
	 * Do_Action Class
	 * @var unknown_type
	 */
	var $c;
	
	/**
	 * Config Class
	 * @var unknown_type
	 */
	var $config;
 
	/**
	 * Reloads the points of $allyid
	 * @param int $allyid
	 */
	function reload_points($allyid) {
		$count = 1;
		$points = 0;
		$best_points = 0;
		$members = 0;
		$villages = 0;
		// Query zum ausrechnen der Punkte	
		$result = mysql_query("SELECT points,villages from users where ally='$allyid' order by points desc");
	while($row = mysql_Fetch_array($result)) {
		if ($count<41) {
			$best_points += $row['points'];
		}
		$points += $row['points'];
		$villages += $row['villages'];
		$members += 1;
		$count++;
	}
	
	// UPDATE schreiben:
	mysql_query("UPDATE ally SET points=$points,best_points=$best_points,villages=$villages,members=$members where id=$allyid");
  }
  /**
   * Reloads All Ally Points
   */
  function reload_all_points() {
	$res = mysql_query("SELECT id from ally");
	while($rowally=mysql_Fetch_array($res)) {
	
		$count = 1;
		$points = 0;
		$best_points = 0;
		// Query zum ausrechnen der Punkte	
		$result = mysql_query("SELECT points,villages from users where ally=".$rowally['id']." order by points desc");
		while($row = mysql_Fetch_array($result)) {
			if ($count<41) {
				$best_points += $row['points'];
			}
			$points += $row['points'];
			$count++;
		}
		
		// UPDATE schreiben:
		mysql_query("UPDATE ally SET points=$points,best_points=$best_points where id=".$rowally['id']."");
	}
  }
  /**
   * Reloads all Ally Rangs
   */
  function reload_ally_rangs() {
	$rang = 1;
	$result = mysql_query("SELECT id,rank from ally order by best_points desc");
	while($row=mysql_Fetch_array($result)) {
		if ($row['rank']!=$rang) {
			mysql_query("UPDATE ally SET rank='$rang' where id='".$row['id']."'");
		}
		$rang++;
	}	
  }
  function create($error,$name,$tag){
    $user=&$user->userInfo;
    $village=&$village->villageInfo;
  	// Name mind. 4 Zeichen:
	if (empty($error) && strlen($name)<4) {
		$error = $lang->grab("error", "ally_name_min");
	}

	// Name max. 32 Zeichen:
	if (empty($error) && strlen($name)>32) {
		$error = $lang->grab("error", "ally_name_max");
	}

	// Tag mind. 2 Zeichen:
	if (empty($error) && strlen($tag)<2) {
		$error = $lang->grab("error", "ally_tag_min");
	}

	// Tag max. 6 Zeichen:
	if (empty($error) && strlen($tag)>6) {
		$error = $lang->grab("error", "ally_tag_max");
	}

	// Schauen, ob Stammesname noch nicht existiert:
	$result = mysql_query("SELECT count(id) AS count from ally where name='".parse($name)."'");
	$row = mysql_Fetch_array($result);
	if (empty($error) && $row['count']>0) {
		$error = $lang->grab("error", "ally_name_exists");
	}

	// Schauen, ob Stammestag noch nicht existiert:
	$result = mysql_query("SELECT count(id) AS count from ally where short='".parse($tag)."'");
	$row = mysql_Fetch_array($result);
	if (empty($error) && $row['count']>0) {
		$error = $lang->grab("error", "ally_tag_exists");
	}

	// Ist User in noch keinem Stamm?
	if ($user['ally']!=-1) {
		$error = "Du bist bereits in einem Stamm!";
	}

	// Wenn kein Fehler aufgetreten ist, dann den Stamm erstellen:
	if (empty($error)) {
    $intern = sprintf($lang->grab("ally_events", "intern"), entparse($user['username']));
		$intern_text = str_replace("<br />", "\\n", $intern);
		$desc = sprintf($lang->grab("ally_events", "desc"), $_POST['name'], entparse($user['username']), entparse($user['username']));
		$description = str_replace("<br />", "\\n", $desc);
		mysql_query("INSERT into ally (short,name,intern_text,description,intro_igm) VALUES ('".parse(@$_POST['tag'])."','".parse(@$_POST['name'])."','$intern_text','$description','')");
		$id = $db->getLastId();
		// User Update:
		mysql_query("UPDATE users SET ally=$id,ally_titel='',ally_found='1',ally_lead='1',ally_invite='1',ally_diplomacy='1',ally_mass_mail='1' where id=".$user['id']."");
		// Staemme aktualisieren:
		$reload_all_points($id);
		$reload_ally_rangs();
		// Ereignis:
		$add_event($id, sprintf($lang->grab("ally_events", "found"), $user['id'], entparse($user['username'])));
		HEADER("LOCATION: game.php?village=".$village['id']."&screen=ally");
		//open();
	}
	//open();
    var_dumP($error);
  }
   /**
    * Adds an event
    * @param unknown_type $ally
    * @param unknown_type $message
    */
   function add_event($ally,$message)
   {
   	mysql_query("INSERT into ally_events (ally,message,time) VALUES ($ally,'$message',".time().")");
   }
   /**
    * Leaves the current Tribe
    * @return boolean|unknown
    */
   function leave(){
	//close();
	$user=&$user->userInfo;
	if ($conf['leave_ally']) {
		$error = "Deixando a Tribo Desativada!";
	}

	// Wenn er Gr�nder ist, dann schauen, ob er nicht der einzige ist:
	if ($user['ally_found']==1) {
		$result = mysql_query("SELECT COUNT(id) AS count from users where ally=".$user['ally']." AND ally_found=1");
		$row = mysql_Fetch_array($result);

		if ($row['count']<2) {
			if (empty($error)) {
				$error = "Deve haver pelo menos 1 fundador em uma tribo!";
			}
		}
	}

	if (empty($error)) {
		// Stamm verlassen
		mysql_query("UPDATE users SET ally=-1 where id=".$user['id']."");
		// Stamm aktualisieren:
		
		$message = 'Jogador <a href="game.php?village=;&screen=info_player&id='.$user['id'].'"> '.$user['username'].'</a> deixou a tribo';
		add_allyevent($user['ally'], parse($message));
		//open();
        return true;
	}

	//open();
	return $error;
   }
   /**
    * Edits the internal message
    * @param Array $ally The standard Ally Array
    * @param string:bool $preview Preview!?
    * @param string $intern The Text
    * @param string:bool $edit Edit!?
    * @param string $error Error (STANDARD=>"")
    * @return boolean
    */
   function edit_intern($ally,$preview,$intern,$edit,$error){
   	$user=&$user->userInfo;
	//close();
   	
	if (empty($error) && strlen($intern>10000)) {
		$error = $lang->grab("error", "intern_text");
	}

	if (empty($error)) {
		// Vorschau:
		if (isset($preview)) {
			$preview = htmlspecialchars(nl2br($intern));
			$ally['edit_intern_text'] = htmlspecialchars($intern);
			$ally['intern_text'] = nl2br(htmlspecialchars($intern));
		}

		// Speichern:
		if (isset($edit)) {
			$text = parse($intern);
			mysql_query("UPDATE ally set intern_text='".$text."' where id=".$user['ally']."");
      $message = sprintf($lang->grab("ally_events", "intern_text"), $user['id'], entparse($user['username']));

      $add_event($user['ally'], parse($message));
			//open();
            return true;
		}
	}
	//open();
	return array("ally"=>$ally,"preview"=>$preview);
   }
   /**
    * Fetches all Ally Events (
    * @param unknown_type $site
    * @param unknown_type $events_per_page
    * @param id $aid Ally ID (Standard: Ally of User)
    * @return Array
    */
   function fetch_events($site,$events_per_page,$aid="user"){
   	$user=&$user->userInfo;
   	$village=&$village->villageInfo;
   	if($aid=="user") $aid=$user['ally'];
    $num_rows=mysql_num_rows(mysql_query("SELECT id FROM ally_events where ally='".$aid."'"));
	$num_pages=(($num_rows%$events_per_page)==0) ? $num_rows/$events_per_page : ceil($num_rows/$events_per_page);
	$start=($site-1)*$events_per_page;
	$events = array();
	$result = mysql_query("SELECT id,time,message from ally_events where ally=".$aid." order by time desc Limit $start,$events_per_page");
	while($row=mysql_Fetch_array($result)) {
		$events[$row['id']]['time'] = date("j.n.",$row['time'])."<br />".date("H:i",$row['time']);
		$village = $_GET['village'];
		$events[$row['id']]['message'] = preg_replace("/village=;/","village=".$village,urldecode($row['message']));
	}  	
   	return $events;
   }
   /**
    * Kicks User $playerid
    * @param int $playerid the id of the player
    * @param int:null $allyid can be null
    * @param string:null $error can be null
    * @return string|unknown
    */
   function kick($playerid,$allyid,$error=null){
   	// Jogadorinfos auslesen:
   			$user=&$user->userInfo;
			$result = mysql_query("SELECT ally,ally_found,username,id from users where id='$playerid'");
			$row = mysql_Fetch_array($result);	
			if(!isset($allyid)) $allyid=$row['ally'];
		
			// Entlasst sich der User selber???
			if (empty($error) && $playerid==$user['id']) {
				$error = $lang->grab("error", "ally_kick_self");
			}
			
			if (!$config->get('leave_ally')) {
				$error = $lang->grab("error", "leave_ally");
			}
			
			// Wenn kein Fehler, dann kann gekickt werden :p
			if (empty($error)) {
				// Ereignis:
				$message = sprintf($lang->grab("ally_events", "kick"), $playerid, entparse($row['username']), $user['id'], entparse($user['username']));
				$add_event($allyid, parse($message));
				mysql_query("UPDATE users SET ally=-1 where id=$playerid");
				$reload_ally_points($allyid);
				$reload_ally_rangs();
				return "";
   }
   return $error;
	}
  /**
   * Invites $name to the Ally $ally
   * @param string $ally Ally
   * @param string $name Username (can be null)
   * @param string $id ID (can be null)
   * @return boolean|string (String=>$error)
   */
  function invite($ally,$name,$id=null){
  	global $cl_reports;
  	//close();
  	$user=$user->userInfo;

	// Schauen, ob Jogador existiert:
	$username = @parse($name);
	if($id==null){
	$result = mysql_query("SELECT id,username,ally from users where username='".$username."'");
	}else{
		$result = mysql_query("SELECT id,username,ally from users where id='".parse((int)$id)."'");
	}
	$row = mysql_Fetch_array($result);
	
	// Schauen, ob Jogador noch nicht im Stamm ist:
	if ($user['ally']==$row['ally']) {
	    $error = $lang->grab("error", "player_already_in_tribe");
	}

	// Existiert User?
	if (empty($error) && empty($row['id'])) {
		$error = $lang->grab("error", "player_not_found");
	}

	// Schauen, ob Jogador noch keine Einladung hat:
	$result = mysql_query("SELECT count(id) AS count from ally_invites where to_userid='".$row['id']."' AND from_ally=".$user['ally']."");
	$invite_row = mysql_Fetch_assoc($result);

	if ($invite_row['count']>0) {
		$error = $lang->grab("error", "player_already_invited");
	}
	
	// Wenn kein Fehler ist, dann Jogador einladen:
	if (empty($error)) {
	    mysql_query("INSERT into ally_invites (time,from_ally,to_userid,to_username) VALUES (".time().",".$user['ally'].",".$row['id'].",'".$row['username']."')");
	    // Bericht verschicken:
    $cl_reports->ally_invite(entparse($user['username']),$user['id'],$row['id'],$user['ally'],$ally['name']);
    $message = sprintf($lang->grab("ally_events", "invitation"), $row['id'], entparse($row['username']), $user['id'], entparse($user['username']));

    $add_event($user['ally'], parse($message));
    #add_allyevent($user['ally'],"<a href=\"game.php?village=;&screen=info_player&id=".$row['id']."\">".entparse($row['username'])."</a> ". $lang->grab("ally_events", "invited_1") . " <a href=\"game.php?village=;&screen=info_player&id=".$user['id']."\">".entparse($user['username'])."</a> " . $lang->grab("ally_events", "invited_2"));
        //open();
	    return true;
	}
	//open();
  	return $error;
  }
  /**
   * Cancels an Invitation
   * @param int $id Id of User
   * @param string:null $error (can be null)
   * @return unknown|boolean
   */
  function cancel_invitation($id,$error=""){
  	global $cl_reports;
  	$user=$user->userInfo;
  	$id = parse(@$id);
	
	// Einladung auslesen:
	$result = mysql_query("SELECT from_ally,to_userid from ally_invites where id='".$id."'");
	$row = mysql_Fetch_array($result);

	if (empty($error) && $row['from_ally']!=$user['ally']) {
	    $error = $lang->grab("error", "invitation_not_available");
	}
	
	// Wenn kein Fehler aufgetreten ist:
	if (empty($error)) {
	    // Einladung l�schen:
	    mysql_query("DELETE from ally_invites where id=$id");
	    if ($db->affectedRows()==0) {
	        $error = $lang->grab("error", "invitation_not_available");
	        return $error;
	    }
	    else
	    {
	        $cl_reports->ally_cancel_invite($user['id'],$row['to_userid'],$user['ally'],$fetch_name($user['ally']));
	        // Username auslesen
	        $result = mysql_query("SELECT username from users where id=".$row['to_userid']."");
	        $user_to = mysql_Fetch_array($result);
          #add_allyevent_invitation_cancel($user['ally'], $row['id'], entparse($row['username']), $user['id'], entparse($user['username']), $config['lang']);
          $message = sprintf($lang->grab("ally_events", "invitation_cancel"), $row['to_userid'], entparse($user_to['username']), $user['id'], entparse($user['username']));
          $add_event($user['ally'], parse($message));
	        //open();
	        return true;
	    }
	}
	
	//open();
	return $error;
  }
  /**
   * Returns a set of Invitations for the Tribe with the ID $allyid
   * @param int $allyid
   * @return Array
   */
  function read_invites($allyid){
  $invites = array();
	$result = mysql_query("SELECT id,to_username,to_userid,time from ally_invites where from_ally=".$allyid." order by time");
	while($row=mysql_Fetch_array($result)) {
		$invites[$row['id']]['to_username'] = entparse($row['to_username']);
		$invites[$row['id']]['to_userid'] = $row['to_userid'];
    	$invites[$row['id']]['time'] = format_date($row['time']);
	}
	return $invites;
  }
  function fetch_by_short($short,$filter="*")
  {
  	$query=mysql_query($dbHelper->buildSelect("ally",$filter,array(""=>"WHERE `short`='".$short."'")));
    return ($row=mysql_Fetch_array($query))!=array()?$row:false;
  }
  /**
   * Gives you the id of a name
   * @param string $name Allyname
   * @return int
   */
  function fetch_id($name)
  {
  	$query=mysql_query($dbHelper->buildSelect("ally","id",array(""=>"WHERE `name`='".$name."'")));
  	return ($row=mysql_Fetch_array($query))!=array()?$row['id']:false;
  }
  /**
   * Gives you the name of an AllyId
   * @param int $allyid
   * * @param string $filter (Standard: only column name)
   * @return string/bool If the Ally isn't available: return=false
   */
  function fetch_name($allyid){
  	$query=mysql_query($dbHelper->buildSelect("ally","name",array(""=>"WHERE `id`='".$allyid."'")));
  	return ($row=mysql_Fetch_array($query))!=array()?$row['name']:false;
  }
  /**
   * Returns a set of all Members
   * @param int $ally AllyId
   * @param bool $flper Stammesgr�ndungs/f�hrungsrechte
   * @return Ambigous <multitype:, string, unknown>
   */
  function read_members($ally,$flper=false){
  // Alle Mitglieder im Stamm auslesen:
	$rank = 1;
	$members = array();
	$result = mysql_query("SELECT 	banned,vacation_id,vacation_name,birthday,last_activity,id,username,points,villages,ally_titel,ally_found,ally_lead,ally_invite,ally_diplomacy,ally_mass_mail from users where ally=".$ally." order by points desc");
		while($row=mysql_Fetch_array($result)) {
	$members[$row['id']]['username'] = entparse($row['username']);
	$members[$row['id']]['rank'] = $rank;
	$members[$row['id']]['points'] = $row['points'];
	$members[$row['id']]['villages'] = $row['villages'];
	$members[$row['id']]['ally_titel'] = entparse($row['ally_titel']);
	
	// Rechte und UV nur bei Stammesf�hrung und Gr�nder anzeigen:
	if ($flper) {
	    $members[$row['id']]['ally_found'] = $row['ally_found'];
	    $members[$row['id']]['ally_lead'] = $row['ally_lead'];
	    $members[$row['id']]['ally_invite'] = $row['ally_invite'];
	    $members[$row['id']]['ally_diplomacy'] = $row['ally_diplomacy'];
	    $members[$row['id']]['ally_mass_mail'] = $row['ally_mass_mail'];
	    $members[$row['id']]['vacation_id'] = $row['vacation_id'];
	    $members[$row['id']]['vacation_name'] = $row['vacation_name'];
	    
	    // Urlaubsertretung
	    if ($row['vacation_id']!=-1) {
	    	$members[$row['id']]['icons'][] = 'vacation';
	    }
	    
	    // Geburtstag
	    if (date('j.n.Y')==$row['birthday']) {
	    	$members[$row['id']]['icons'][] = 'birthday';
	    }
	    
	    // INAKTIV?
	    $time_inactiv = time() - $row['last_activity'];
	    if ($row['banned']=='Y') {
     		$members[$row['id']]['icons'][] = 'banned';
		}
		elseif ($time_inactiv>=604800) {
	    	$members[$row['id']]['icons'][] = 'red';
	    }
	    elseif ($time_inactiv>=172800) {
	    	$members[$row['id']]['icons'][] = 'yellow';
	    }
	    else
	    {
	    	$members[$row['id']]['icons'][] = 'green';
	    }
	}
	
	$rank++;
	}
	return $members;
  }
  /**
   * Adds an contract to the Tribe $from_ally
   * @param unknown_type $from_ally The Source Tribe
   * @param unknown_type $to_ally The Destination Tribe
   * @param unknown_type $tag The Destination Tag
   * @param string       $type Example: NAP,...
   * @param int userid   Id of User
   * @return boolean|string (String=>$error)
   */
  function add_contract($from_ally,$to_ally,$tag,$type,$userid){
  //gibt es schon eine Beziehung zu dem Stamm?
      if(mysql_num_rows(mysql_query("SELECT * FROM ally_contracts WHERE short = '$tag' AND from_ally = $from_ally AND to_ally = $to_ally")) != 0) {
        $error = $lang->grab("error", "already_contract");
      }
      else {
        if($from_ally == $to_ally) {
          $error = $lang->grab("error", "own_tribe");
        }
        else {
        //Stamm eintragen
        mysql_query("INSERT INTO ally_contracts (from_ally, type, short, to_ally) VALUES
                  ('$from_ally', '".$type."', '$tag', '".$to_ally."')");

        mysql_query("UPDATE users SET map_reload='' WHERE id = ".$userid."");
        return true;
        }
      }
      return $error;
  }
  /**
   * Deletes a contract
   * @param int $allyid Sourceallyid
   * @param int $id Id of the Contract
   * @param int $user Userid
   */
  function delete_contract($allyid,$id,$user){
  	$check = mysql_query("SELECT * FROM ally_contracts WHERE to_ally = ".$allyid." AND id = ".$id."");
    if(mysql_num_rows($check) != 0) {
      mysql_query("DELETE FROM ally_contracts WHERE id = ".$id."");
      mysql_query("UPDATE users SET map_reload='' WHERE id = ".$user."");
  	}
    return;
  }
  /**
   * Gets an array about the Contracts (about the tribe with the ID $allyid)
   * @param int $allyid The allyid
   * @return Array
   */
  function get_contracts($allyid){
  //alle Vertr�ge holen
$getAllContracts = mysql_query("SELECT * FROM ally_contracts WHERE to_ally = ".$allyid." ORDER BY id ASC");
while ($row = mysql_Fetch_array($getAllContracts)) {
    //existiert der stamm noch?
    if(mysql_num_rows(mysql_query("SELECT * FROM ally WHERE id = ".$row['from_ally']."")) == 0) {
      mysql_query("DELETE FROM ally_contracts WHERE from_ally = ".$row['id']."");
    }
    else {
    $contracts[] = $row;
    }
	}
	return is_array($contracts)?$contracts:array();
  }
  /**
   * Changes the Perfile of a tribe
   * @param string $name Name of the Tribe
   * @param Array $ally The Ally Array (z.b. ally['name'])
   * @param string $tag The Ally Tag
   * @param string $homepage The Ally Hp
   * @param string $irc The IRC
   * @param string $user The User Array (z.B. user['id'])
   * @param string:null $error
   */
  function change_Perfile($name,$ally,$tag,$homepage,$irc,$user,$error=null){
  // Wurde Stammesnamen ge�ndert?
	$new_name = "";
	$name = trim(@$name);
	if(empty($error) && parse($name)!=$ally['name']) {
		// Name mind. 4 Zeichen:
		if (empty($error) && strlen($name)<4) {
			$error = $lang->grab("error", "ally_name_min");
		}

		// Name max. 32 Zeichen:
		if (empty($error) && strlen($name)>32) {
			$error = $lang->grab("error", "ally_name_max");
		}
		
		// Schauen, ob Stammesname noch nicht existiert:
		$result = mysql_query("SELECT count(id) AS count from ally where name='".parse($name)."'");
		$row = mysql_Fetch_array($result);
		if (empty($error) && $row['count']>0) {
			$error = $lang->grab("error", "ally_name_exists");
		}
		
		// Wenn kein Fehler ist, dann Namen�nderung vorbereiten:
		$new_name = parse($name);
	}
	
	// Wurde Stammestag ge�ndert?
	$new_tag = "";
	$tag = trim(@$tag);
	if(empty($error) && parse($tag)!=$ally['short']) {
		// Tag mind. 2 Zeichen:
		if (empty($error) && strlen($tag)<2) {
			$error = $lang->grab("error", "ally_tag_min");
		}

		// Tag max. 6 Zeichen:
		if (empty($error) && strlen($tag)>6) {
			$error = $lang->grab("error", "ally_tag_max");
		}

		// Schauen, ob Stammestag noch nicht existiert:
		$result = mysql_query("SELECT count(id) AS count from ally where short='".parse($tag)."'");
		$row = mysql_Fetch_array($result);
		if (empty($error) && $row['count']>0) {
			$error = $lang->grab("error", "ally_tag_exists");
		}
		
		// Wenn kein Fehler ist, dann Namen�nderung vorbereiten:
		$new_tag = parse($tag);
	}
	
	// Homepage nicht l�nger als 128 Zeichen:
	$hp = trim(@$homepage);
	if (empty($error) && strlen($hp)>128) {
	    $error = $lang->grab("error", "ally_hp_max");
	    $hp = parse($hp);
	}
	
	// IRC
	$irc = trim(@$irc);
	if (empty($error) && strlen($irc)>128) {
	    $error = $lang->grab("error", "ally_irc_max");
	    $irc = parse($irc);
	}
	
	if (empty($error)) {
		// Stamm UPDATEN:
		$querys = array();
		$querys[] = "homepage='$hp'";
		$querys[] = "irc='$irc'";
		if (!empty($new_name)) {
		    $querys[] = "name='$new_name'";
		}
		if (!empty($new_tag)) {
		    $querys[] = "short='$new_tag'";
		}
		mysql_query("UPDATE ally SET ".implode(",",$querys)." where id=".$user['ally']."");
		//open();
		$message = sprintf($lang->grab("ally_events", "properties"), $user['id'], entparse($user['username']));
		$add_event($user['ally'], parse($message));
		return true;
	}	
  	return $error;
  }
  /**
   * Closes a tribe
   * @param int $allyid Allyid
   * @param Array $user The User Array
   * @param null:string $error
   */
  function close_tribe($allyid,$user,$error=null){
  	global $cl_reports;
  	if (!$config->get('close_ally')) {
 		$error = $lang->grab("error", "close_ally");
	}
	
	if (empty($error)) {
		// Allen Jogadorn einen Bericht schicken:
		$result = mysql_query("SELECT id from users where ally=".$allyid."");
		while($row=mysql_Fetch_array($result)) {
		    // Bericht verschicken:
		    $cl_reports->ally_close($user['username'],$user['id'],$row['id']);
		    // Jogador kicken:
		    mysql_query("UPDATE users SET ally=-1 where id=".$row['id']."");
		}
		
		// Alle Einladungen l�schen:
		mysql_query("DELETE from ally_invites where from_ally=".$allyid."");
		
		// Alle Ereignisse l�schen:
		mysql_query("DELETE from ally_events where ally=".$allyid."");
		
		// Stamm l�schen:
		mysql_query("DELETE from ally where id=".$allyid."");
		
		// Allys Rangliste neu laden:
		$reload_ally_rangs();
		//open();
		return true;
  }
  return $error;
}
   /**
    * Changes the Description of the Tribe
    * @param Array $ally the Standard Ally Array
    * @param string $text The Text
    * @param bool(string) $edit Edit?
    * @param bool(string) $preview Preview?
    * @param string:null:(OUT:array) $error Error/Outputstring
    * @param string $user the Standard User Array
    * @return multitype:string |boolean|unknown
    */
   function change_desc($ally,$text,$edit,$preview,$error=null,$user){
   	if (empty($error) && strlen($text>10000)) {
		$error = $lang->grab("error", "ally_desc_max");
	}

	if (empty($error)) {
		// Vorschau:
		if (isset($preview)) {
			$preview = htmlspecialchars(nl2br($text));
			$ally['edit_description'] = htmlspecialchars($text);
			$ally['description'] = nl2br(htmlspecialchars($text));
			return array("preview"=>$preview,"ally"=>$ally);
		}

		// Speichern:
		if (isset($edit)) {
      $text = parse($text);
			mysql_query("UPDATE ally set description='".$text."' where id=".$user['ally']."");
      $message = sprintf($lang->grab("ally_events", "description"), $user['id'], entparse($user['username']));
      $add_event($user['ally'], parse($message));
			//open();
			return true;
		}
	}
	//open();
	return $error;
   }


}


?>