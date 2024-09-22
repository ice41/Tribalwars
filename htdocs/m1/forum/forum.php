<?php
	// incepem sesiunea
	session_start();
	// includem fisierul pentru smarty class
	include("../lib/smarty/Smarty.class.php");
	// includem fisierul care se conecteaza la baza de date
	include("mysql.php");
	include("forum_functions.php");
	include("forum_bbcode.php");

	// cream o clasa smarty
	$tpl = new Smarty;
	// afla id-ul tribului

	$user_session = $_COOKIE['session'];
	
	// selectare informatii user
	$user = mysql_fetch_assoc(mysql_query("SELECT `userid` FROM `sessions` WHERE `sid` = '$user_session'")) or die (mysql_error());
	$user = mysql_fetch_assoc(mysql_query("SELECT * FROM `users` WHERE `id` = '".$user['userid']."'"));
	
	$ally = mysql_fetch_assoc(mysql_query("SELECT * FROM `ally` WHERE `id` = '".$_GET['ally']."'"));
	$tpl->assign("village_id", $_COOKIE['village_id']);
	$tpl->assign("ally_info",  $ally);
	$tpl->assign("user", $user);
	// verificam daca userul apartine acestui forum
	if($ally['id'] == $user['ally']){


		
		$categorii = mysql_query("SELECT `name`,`id` FROM `forum` WHERE `ally` = '".$user['ally']."'");
		$numar_categorii = mysql_num_rows($categorii);
		
		// verificam daca forumul are vreo categorie
		if($numar_categorii == '0'){
			mysql_query("INSERT INTO `forum` (`name`,`ally`) VALUES ('General', '".$ally['id']."')");
		}
		
		if($_GET['category'] == FALSE AND $_GET['do'] != 'new_category'){
			// ultima categorie
			$ultima_categorie_id = mysql_fetch_assoc(mysql_query("SELECT `id` FROM `forum` WHERE `ally` = '".$ally['id']."' ORDER BY `id` ASC"));
			$_GET['category'] = $ultima_categorie_id['id'];

		}
		// aflam categoria
		$categorie_id = (int) $_GET['category'];
		
		$categorii = mysql_query("SELECT `name`,`id` FROM `forum` WHERE `ally` = '".$user['ally']."' ORDER BY `id` ASC");
		while($a = mysql_fetch_assoc($categorii)){
			$category_id[] = $a['id'];
			$nume[] = htmlentities(stripslashes(urldecode($a['name'])), ENT_QUOTES, "UTF-8");
			$trib[] = $a['ally'];
		}

		$tpl->assign("category_name", $nume);
		$tpl->assign("category_id", $category_id);
		$tpl->assign("category_ally",  $trib);
		$tpl->assign("ally", $user['ally']);
		
		// selectam informatii despre categorie
		$categorie_curenta = mysql_query("SELECT * FROM `forum` WHERE `id` = '".$categorie_id."' AND `ally` = '".$_GET['ally']."'");
		// verificam daca aceasta categorie exista si daca apartine acestui trib
		if(isset($categorie_id) AND mysql_num_rows($categorie_curenta) == 0 AND $_GET['ally'] == $user['ally'] AND $_GET['do'] != 'new_category'){
			$tpl->assign("error_category_ally", "Acest forum nu apartine acestui trib");
		}
		// selectam topicurile din aceasta categorie
		$topicuri = mysql_query("SELECT * FROM `forum_thread` WHERE `category_id` = '".$categorie_id."'");
		// facem un loop
		while($b = mysql_fetch_assoc($topicuri)){
			$thread_id[] = $b['id'];
			$thread_title[] = htmlentities(stripslashes(urldecode($b['title'])), ENT_QUOTES, "UTF-8");
			$thread_message[] = htmlentities(substr(stripslashes(urldecode($b['message'])), 0, 25), ENT_QUOTES, "UTF-8")." ...";
			$thread_author[] = stripslashes(urldecode($b['author']));
			$thread_time[] = date("H:i:s d.m.Y", $b['time']);
			$thread_category_id[] = $b['category_id'];
			$thread_important[] = $b['important'];
			$thread_closed[] = $b['closed'];
			
			// posturile din thread
			$posturi = mysql_query("SELECT * FROM `forum_post` WHERE `thread_id` = '".$b['id']."'");
			// numar posturi
			$nr_posturi[] = mysql_num_rows($posturi);
			// ultimul post
			$last_post = mysql_fetch_assoc(mysql_query("SELECT * FROM `forum_post` WHERE `thread_id` = '".$b['id']."' ORDER BY `time` DESC LIMIT 1"));
			$last_post_author[] = $last_post['posted_by'];
			$last_post_date[] = date("H:i:s d.m.Y", $last_post['time']);
			
			// verificam daca userul a citit thread-ul
			$thread_read[] = mysql_num_rows(mysql_query("SELECT * FROM `forum_read` WHERE `thread_id` = '".$b['id']."' AND `user_id` = '".$user['id']."'"));
			
		}
		$tpl->assign("thread_read", $thread_read);
		$tpl->assign("thread_closed", $thread_closed);
		$tpl->assign("thread_last_post_author", $last_post_author);
		$tpl->assign("thread_last_post_date", $last_post_date);
		$tpl->assign("thread_post_number", $nr_posturi);
		$tpl->assign("thread_id", $thread_id);
		$tpl->assign("thread_title", $thread_title);
		$tpl->assign("thread_message", $thread_message);
		$tpl->assign("thread_author", $thread_author);
		$tpl->assign("thread_time", $thread_time);
		$tpl->assign("thread_category_id", $thread_category_id);
		
	if($user['ally_titel'] == '1' OR $user['ally_lead'] == '1'){
		if(isset($_POST['thread_action_go'])){
			if(isset($_POST['ids'])){
				if($_POST['thread_action'] == 'delete_thread'){
					foreach($_POST['ids'] as $key => $value){
						// selectam informatii despre thread
						$thread = mysql_fetch_assoc(mysql_query("SELECT `category_id` FROM `forum_thread` WHERE `id` = '".$key."'"));
						// selectam informatii despre categorie
						$category = mysql_fetch_assoc(mysql_query("SELECT `ally` FROM `forum` WHERE `id` = '".$thread['category_id']."'"));
						// verificam daca categoria din care thread-ul apartine este al tribului
						if($category['ally'] == $ally['id']){
							mysql_query("DELETE FROM `forum_thread` WHERE `id` = '".$key."'");
							mysql_query("DELETE FROM `forum_post` WHERE `thread_id` = '".$key."'");
							mysql_query("DELETE FROM `forum_read` WHERE `thread_id` = '".$key."'");
						}
					}
				} elseif($_POST['thread_action'] == 'close_thread'){
					foreach($_POST['ids'] as $key => $value){
						// selectam informatii despre thread
						$thread = mysql_fetch_assoc(mysql_query("SELECT `category_id` FROM `forum_thread` WHERE `id` = '".$key."'"));
						// selectam informatii despre categorie
						$category = mysql_fetch_assoc(mysql_query("SELECT `ally` FROM `forum` WHERE `id` = '".$thread['category_id']."'"));
						// verificam daca categoria din care thread-ul apartine este al tribului
						if($category['ally'] == $ally['id']){
							mysql_query("UPDATE `forum_thread` SET `closed` = '1' WHERE `id` = '".$key."'");
						}
					}
				} elseif($_POST['thread_action'] == 'open_thread'){
					foreach($_POST['ids'] as $key => $value){
						// selectam informatii despre thread
						$thread = mysql_fetch_assoc(mysql_query("SELECT `category_id` FROM `forum_thread` WHERE `id` = '".$key."'"));
						// selectam informatii despre categorie
						$category = mysql_fetch_assoc(mysql_query("SELECT `ally` FROM `forum` WHERE `id` = '".$thread['category_id']."'"));
						// verificam daca categoria din care thread-ul apartine este al tribului
						if($category['ally'] == $ally['id']){
							mysql_query("UPDATE `forum_thread` SET `closed` = '0' WHERE `id` = '".$key."'");
						}
					}
				}
			die(header("Location: forum.php?ally=".$_GET['ally']."&category=".$_GET['category']));
			}
		}
	}

		
		if(isset($categorie_id)){
			$nume_categorie = mysql_fetch_assoc(mysql_query("SELECT `name`,`id` FROM `forum` WHERE `id` = '".$categorie_id."'"));
			$tpl->assign("category_n" , htmlentities(stripslashes(urldecode($nume_categorie['name']))), ENT_QUOTES, "UTF-8");
			$tpl->assign("category_i_d", $nume_categorie['id']);
			$tpl->assign("category", $categorie_id);
		}
		$do = $_GET['do'];
		$tpl->assign("do", $do);
		
		if(isset($do)){
			if($do == 'new_category'){
				if($user['ally_titel'] == '1' OR $user['ally_lead'] == '1'){
					include("forum_new_category.php");
				}
			} elseif($do == 'new_thread'){
				include("forum_new_thread.php");
			} elseif($do == 'view_thread'){
				include("forum_view_thread.php");
			}
		}

		
		// folosim template-ul
		$tpl->display("forum.tpl");
		
	} else {
	
		echo "<h2>S-a produs o eroare</h2>";
	
	}
?>
