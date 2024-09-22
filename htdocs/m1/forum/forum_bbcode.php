<?php
$villageid = $_COOKIE['village_id'];

function bb_player($player) {
		$player = urlencode($player[1]);
		$villageid = $_COOKIE['village_id'];
        $r1 = mysql_query("SELECT * FROM users WHERE username='".$player."'");
        $n1 = mysql_num_rows($r1);
        if($n1=="1") {
            $result = mysql_query("SELECT * FROM users WHERE username='".$player."'");
            while($row = mysql_fetch_array($result))
            {
                $echo='<a href="../game.php?village='.$villageid.'&screen=info_player&id='.$row['id'].'" target="_top">'.urldecode($row['username']).'</a>';
                return $echo;
            }
        } else {
            return urldecode($player);
        }



}

function bb_ally($var) {
        $var = urlencode($var['1']);
		$villageid = $_COOKIE['village_id'];
        $r1 = mysql_query("SELECT * FROM ally WHERE short='".$var."'");
        $n1 = mysql_num_rows($r1);
        if($n1=="1") {
            $result = mysql_query("SELECT * FROM ally WHERE short='".$var."'");
            while($row = mysql_fetch_array($result))
            {
                $echo='<a href="../game.php?village='.$villageid.'&screen=info_ally&id='.$row['id'].'" target="_top">'.urldecode($row['short']).'</a>';
                return $echo;
            }
        } else {
            return urldecode($var);
        }

}

function bb_village($var)
{		
		$var = str_replace("'", "", $var);
		$villageid = $_COOKIE['village_id'];
        $r1 = mysql_query("SELECT * FROM villages WHERE x='$var[1]' AND y='$var[2]'");
        $n1 = mysql_num_rows($r1);
        if($n1=="1") {
            $result = mysql_query("SELECT `id`,`name`,`x`,`y` FROM villages WHERE x='$var[1]' AND y='$var[2]'");
            while($row = mysql_fetch_array($result))
            {
                $echo='<a href="game.php?village='.$villageid.'&screen=info_village&id='.$row['id'].'" target="_top">'.$row['name'].' ('.$row['x'].'|'.$row['y'].')</a>';
                return $echo;
            }
        } else {
            $echo="(Nu exista nici un sat la aceste coordonate)";
            return $echo;
        }
}





function bb_format($test) {

    $str=$test;
    



    $simple_search = array(  
                '/\[b\](.*?)\[\/b\]/is',  
                '/\[i\](.*?)\[\/i\]/is',  
                '/\[u\](.*?)\[\/u\]/is',
                '/\[s\](.*?)\[\/s\]/is',
				 '/\[li\](.*?)\[\/li\]/is',  
                '/\[url\=(.*?)\](.*?)\[\/url\]/is',  
                '/\[url\](.*?)\[\/url\]/is',  
                '/\[align\=(left|center|right)\](.*?)\[\/align\]/is',  
                '/\[img\](.*?)\[\/img\]/is',  
                '/\[font\=(.*?)\](.*?)\[\/font\]/is',  
                '/\[size\=(.*?)\](.*?)\[\/size\]/is',  
                '/\[color\=(.*?)\](.*?)\[\/color\]/is',
                '/\[quote\=(.*?)\](.*?)\[\/quote\]/is',
                '/\[spoiler\](.*?)\[\/spoiler\]/is',  


                '/\:\(/i',
				'/\:\;/i',
                '/\:d/i',
				'/\;\;\)/i',
				'/\;\)\)/i',
				'/\:x/i',
				'/\:">/i',
				'/\:\)\)/i',                
			'/\:\)/i',
	 '/\[quote\](.*?)\[\/quote\]/is',  
	'/\:help/i',
				);





    $simple_replace = array(  
                '<strong>$1</strong>',  
                '<em>$1</em>',  
                '<u>$1</u>',
                '<s>$1</s>',
				'<li>$1</li>', 
                '<a href="$1" rel="nofollow" target="_blank" title="$2 - $1">$2</a>',  
                '<a href="$1" rel="nofollow" target="_blank" title="$1">$1</a>',  
                '<div style="text-align: $1;">$2</div>',  
                '<img src="$1" alt="" />',  
                '<span style="font-family: $1;">$2</span>',  
                '<font size=$1;">$2</font>',  
                '<span style="color: $1;">$2</span>',
                '<blockquote><cite>$1 a scris:</cite>$2</blockquote>',  
                '<div id="spoiler"><input value="Spoiler" onclick="toggle_spoiler(this)" type="button"><div><span style="display: none;">$1</span></div></div>',
				
				'<img src="../../graphic/bbcodes/smileys/2.gif" alt="frown" />',
				'<img src="../../graphic/bbcodes/smileys/3.gif" alt="smile" />',
				'<img src="../../graphic/bbcodes/smileys/4.gif" alt="smile" />',
				'<img src="../../graphic/bbcodes/smileys/5.gif" alt="smile" />',
				'<img src="../../graphic/bbcodes/smileys/6.gif" alt="smile" />',
				'<img src="../../graphic/bbcodes/smileys/8.gif" alt="smile" />',
				'<img src="../../graphic/bbcodes/smileys/9.gif" alt="smile" />',
				'<img src="../../graphic/bbcodes/smileys/21.gif" alt="smile" />',
				'<img src="../../graphic/bbcodes/smileys/1.gif" alt="smile" />',
	'<blockquote><cite>Citat:</cite> $1 </blockquote>',  
	'<img src="../graphic/bbcodes/smileys/help.gif" />',
                );  

  





    $aa = array(  
                '/\[player\](.*?)\[\/player\]/is',  
                );

    $bb = array(  
                '/\[ally\](.*?)\[\/ally\]/is',  
                );


    $cc = array(  
                '/\[village\](.*?)\|(.*?)\[\/village\]/is',  
                );
    $dd = array(  
                 '/\[report\](.*?)\[\/report\]/is',  
                );



    $a=preg_replace_callback($aa, "bb_player", $str);
    $b=preg_replace_callback($bb, "bb_ally", $a);
    $c=preg_replace_callback($cc, "bb_village", $b);
    $c=preg_replace($simple_search, $simple_replace, $c);

    return $c;

}


?>
