<?php
if ( file_exists('actions\mover_save.txt') && !isset ( $_GET['show_barbs']) && !isset ( $_GET['show_only_barbs']) && !isset ( $_GET['show_player'])) {
   $content=file_get_contents('actions\mover_save.txt');
   if ( $content == 'show_barbs') header('Location: index.php?screen=Mover&show_barbs');
   if ( $content == 'show_only_barbs') header ('Location: index.php?screen=Mover&show_only_barbs');
   if ( $content == 'show_player') header ('Location: index.php?screen=Mover&show_player');
}
 if ( !isset ( $_POST['id'] ) && !isset ( $_POST['xy'] ) ) {
  $query = $db -> query ( 'SELECT id,name,userid,x,y FROM villages ORDER BY id' );
  $msg = '';
  while ( $row = mysql_fetch_assoc ( $query ) ) {
    	  $udata = new getuserdata();
		  $arg = array (0 =>'username');
	        $array = $udata -> getbyid($row['userid'],$arg);
			if ( isset ( $_GET['show_barbs']) && !isset ( $_GET['show_player']) && !isset ( $_GET['show_only_barbs'])) {
		  $name = ($array['exist_user']==1)?urldecode($array['username']):'<abbr title="Dieses Dorf geh&ouml;rt den Barbaren">unbekannt</abbr>';
	$msg[] = '
    <tr>
	 <td>
	  '.$row['id'].'
	 </td>
	 <td>
	  '.$name.'
	 </td>
	 <td>
	  <a href="?screen=Mover&show_barbs&village='.$row['id'].'#confirm">'.urldecode($row['name']).'</a>
	 </td>
	 <td>
	  ('.$row['x'].'|'.$row['y'].')
	 </td>
	</tr>';
	} elseif ( !isset($_GET['show_barbs']) && !isset($_GET['show_only_barbs']) && isset ( $_GET['show_player'] )) {
	  if ( $array['exist_user']==1) {
	  $name = urldecode($array['username']);
	$msg[]= '<tr>
	 <td>
	  '.$row['id'].'
	 </td>
	 <td>
	  '.$name.'
	 </td>
	 <td>
	  <a href="?screen=Mover&show_player&village='.$row['id'].'#confirm">'.urldecode($row['name']).'</a>
	 </td>
	 <td>
	  ('.$row['x'].'|'.$row['y'].')
	 </td>
	</tr>';
	  }
	} elseif (!isset($_GET['show_barbs']) && isset($_GET['show_only_barbs']) && !isset ( $_GET['show_players'])) {
	  if ( $array['exist_user'] == 0 ) {
	$msg[] = '
    <tr>
	 <td>
	  '.$row['id'].'
	 </td>
	 <td>
	  <abbr title="Dieses Dorf geh&ouml;t den Barbaren">unbekannt</abbr>
	 </td>
	 <td>
	  <a href="?screen=Mover&show_only_barbs&village='.$row['id'].'#confirm">'.urldecode($row['name']).'</a>
	 </td>
	 <td>
	  ('.$row['x'].'|'.$row['y'].')
	 </td>
	</tr>';		
	  }
	}
  }
  $tpl -> assign('msg',$msg);
  }
  if ( isset ( $_GET['village'] ) ) {
  $udata = new getvillagedata();
  $arg = array (0 =>'id,x,y');
  $array = $udata -> getbyid($_GET['village'],$arg);
  if ( $array['exist_village']==1) {
  $tpl -> assign('xy',$array['x'].'|'.$array['y']);
  $tpl -> assign('id',$array['id']);
   } else {
  $tpl -> assign('id',0);
  }
  }
  if ( isset ( $_POST['id'] ) && isset ( $_POST['xy'] ) ) {
    $vil = new getvillagedata();
	$new = array ( 0 => 'id,name,x,y');
	$arr = $vil -> getbyid($_POST['id'],$new);
	if ( $arr['exist_village'] == 1 ) {
	$pattern = '~[0-9]{1,4}\|[0-9]{1,4}~';
	if ( preg_match($pattern,$_POST['xy']) ) {
	  $coords = explode ('|',$_POST['xy']);
	  $qu = $db -> query ( 'SELECT id FROM villages WHERE x ='.$coords[0].' AND y = '.$coords[1].';');
	  if ( mysql_num_rows($qu) < 1 ) {
	  $con = convert_to_continents($coords[0],$coords[1]);
	  $db -> query ( 'UPDATE villages SET x = '.$coords[0].', y = '.$coords[1].', continent ='.$con['con'].' WHERE id = ' . $arr ['id'] . ';');
	  $tpl -> assign('message', 'Das Dorf '. urldecode($arr['name']).' befindet sich jetzt bei:<br />('.$coords[0].'|'.$coords[1].') K'.$con['con']);
	  } else {
	  $tpl -> assign('message', '<h3 class="warn">Änderung <u>nicht</u> möglich: Der Platz ist bereits belegt.</h3>');
	  }
	} else {
	$tpl -> assign('message', '<h3 class="warn">Keine richtigen Koordinaten eingegeben!</h3>');
	}
	} else {
	$tpl -> assign('message', '<h3 class="warn">Dorf existiert nicht!</h3>');
  }	
  }
  if ( isset ( $_GET['show_barbs']) && !isset ( $_GET['show_only_barbs']) && !isset ( $_GET['show_player'])) {
  $tpl ->assign('page','&show_barbs');
  $page='show_barbs';
  } elseif ( isset ( $_GET['show_only_barbs']) && !isset ( $_GET['show_barbs']) && !isset ( $_GET['show_player'])) {
  $tpl ->assign('page','&show_only_barbs');
  $page='show_only_barbs';
  } elseif ( isset ( $_GET['show_player']) && !isset ( $_GET['show_barbs']) && !isset ( $_GET['show_only_barbs'])) {
  $tpl ->assign('page','&show_player');
  $page='show_player';
  }
  $fp= fopen('actions\mover_save.txt','w+');
  fwrite($fp,$page);
  fclose($fp);
?>