<?php





function bb_player($var) {
        $var = parse($var[1]);

        $r1 = mysql_query("SELECT * FROM users WHERE username='$var'");
        $n1 = mysql_num_rows($r1);
        if($n1=="1") {
            if(isset($_GET['village'])) { $villageid='village='.$_GET['village'].'&'; } else { $villageid=""; }
            $result = mysql_query("SELECT * FROM users WHERE username='$var'");
            while($row = mysql_fetch_array($result))
            {
                $echo='<a href="game.php?'.$villageid.'screen=info_player&id='.$row['id'].'">'.entparse($row['username']).'</a>';
                return $echo;
            }
        } else {
            return entparse($var);
        }



}



function bb_ally($var) {
        $var = parse($var[1]);
        //$var1=str_replace(' ','+',$var);
        $r1 = mysql_query("SELECT * FROM ally WHERE short='$var'");
        $n1 = mysql_num_rows($r1);
        if($n1=="1") {
            if(isset($_GET['village'])) { $villageid='village='.$_GET['village'].'&'; } else { $villageid=""; }
            $result = mysql_query("SELECT * FROM ally WHERE short='$var'");
            while($row = mysql_fetch_array($result))
            {
                $echo='<a href="game.php?'.$villageid.'screen=info_ally&id='.$row['id'].'">'.entparse($row['short']).'</a>';
                return $echo;
            }
        } else {
            return entparse($var);
        }

}






function bb_village($var)
{


        $r1 = mysql_query("SELECT * FROM villages WHERE x='$var[1]' AND y='$var[2]'");
        $n1 = mysql_num_rows($r1);
        if($n1=="1") {
            if(isset($_GET['village'])) { $villageid='village='.$_GET['village'].'&'; } else { $villageid=""; }
            $result = mysql_query("SELECT * FROM villages WHERE x='$var[1]' AND y='$var[2]'");
            while($row = mysql_fetch_array($result))
            {
                $echo='<a href="game.php?'.$villageid.'screen=info_village&id='.$row['id'].'">'.entparse($row['name']).'</a>';
                return $echo;
            }
        } else {
            $echo="(Ung&uuml;ltieges Dorf)";
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
                '/\[url\=(.*?)\](.*?)\[\/url\]/is',  
                '/\[url\](.*?)\[\/url\]/is',  
                '/\[align\=(left|center|right)\](.*?)\[\/align\]/is',  
                '/\[img\](.*?)\[\/img\]/is',  
                '/\[font\=(.*?)\](.*?)\[\/font\]/is',  
                '/\[size\=(.*?)\](.*?)\[\/size\]/is',  
                '/\[color\=(.*?)\](.*?)\[\/color\]/is',
                '/\[quote\=(.*?)\](.*?)\[\/quote\]/is',
                '/\[spoiler\](.*?)\[\/spoiler\]/is',  
                );  





    $simple_replace = array(  
                '<strong>$1</strong>',  
                '<em>$1</em>',  
                '<u>$1</u>',
                '<s>$1</s>',  
                '<a href="$1" rel="nofollow" title="$2 - $1">$2</a>',  
                '<a href="$1" rel="nofollow" title="$1">$1</a>',  
                '<div style="text-align: $1;">$2</div>',  
                '<img src="$1" alt="" />',  
                '<span style="font-family: $1;">$2</span>',  
                '<span style="font-size: $1;">$2</span>',  
                '<span style="color: $1;">$2</span>',
                '<table class="quote"><tbody><tr><td></td><td class="quote_author">$1 hat folgendes geschrieben:</td></tr><tr><td width="10"></td><td class="quote_message">$2</td></tr></tbody></table>',  
                '<div id="spoiler"><input value="Spoiler" onclick="toggle_spoiler(this)" type="button"><div><span style="display: none;">$1</span></div></div>'
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



    $a=preg_replace_callback($aa, "bb_player", $str);
    $b=preg_replace_callback($bb, "bb_ally", $a);
    $c=preg_replace_callback($cc, "bb_village", $b);
    $d=preg_replace($simple_search, $simple_replace, $c);

    return $d;

}


?>