<?php
class add_report
{
    function new_report( $playerid )
    {
        $db =& $db;
        mysql_query( "UPDATE users set new_report='1' where id='".$playerid."'" );
    }

    function support( $from_player, $from_village, $from_villagename, $to_player, $to_playername, $to_village, $units, $time )
    {
        $db =& $db;
        $title = ( $from_villagename." unterstützt $to_playername" );
        if ( $to_player != "-1" )
        {
            mysql_query( "INSERT into reports (title,time,type,in_group,receiver_userid,to_user,to_village,from_user,from_village,a_units) VALUES\r\n\t\t\t\t\t\t\t\t('".$title."','$time','support','support','$to_player','$to_player','$to_village','$from_player','$from_village','$units')" );
        }
        if ( $from_player != "-1" && $from_player != $to_player )
        {
            mysql_query( "INSERT into reports (title,time,type,in_group,receiver_userid,to_user,to_village,from_user,from_village,a_units) VALUES\r\n\t\t\t\t\t\t\t\t('".$title."','$time','support','support','$from_player','$to_player','$to_village','$from_player','$from_village','$units')" );
        }
        $this->new_report( $to_player );
        $this->new_report( $from_player );
    }

    function attack( $from_player, $from_playername, $from_village, $to_player, $to_village, $to_villagename, $wins, $att_color, $def_color, $time, $a_units, $b_units, $c_units, $d_units, $e_units, $agreement, $ram, $catapult, $hives, $luck, $moral, $see_def_units )
    {
        $db =& $db;
        $title_att = ( $from_playername." greift $to_villagename an" );
        $titleimage_att = "graphic/dots/".$att_color.".png";
        $title_def = ( $from_playername." greift $to_villagename an" );
        $titleimage_def = "graphic/dots/".$def_color.".png";
        if ( $from_player != "-1" )
        {
            mysql_query( "INSERT into reports (title,title_image,time,type,in_group,receiver_userid,to_user,to_village,from_user,from_village,a_units,b_units,c_units,d_units,e_units,wins,agreement,ram,catapult,hives,luck,moral,see_def_units) VALUES\r\n\t\t\t\t\t\t\t('".$title_att."','$titleimage_att','$time','attack','attack','$from_player','$to_player','$to_village','$from_player','$from_village','$a_units','$b_units','$c_units','$d_units','$e_units','$wins','$agreement','$ram','$catapult','$hives','$luck','$moral','$see_def_units')" );
        }
        if ( $to_player != "-1" && $from_player != $to_player )
        {
            mysql_query( "INSERT into reports (title,title_image,time,type,in_group,receiver_userid,to_user,to_village,from_user,from_village,a_units,b_units,c_units,d_units,e_units,wins,agreement,ram,catapult,hives,luck,moral) VALUES\r\n\t\t\t\t\t\t\t('".$title_def."','$titleimage_def','$time','attack','defense','$to_player','$to_player','$to_village','$from_player','$from_village','$a_units','$b_units','$c_units','$d_units','$e_units','$wins','$agreement','$ram','$catapult','$hives','$luck','$moral')" );
        }
        $this->new_report( $to_player );
        $this->new_report( $from_player );
    }

    function support_attack( $from_player, $from_village, $from_villagename, $to_player, $to_village, $to_villagename, $color, $time, $a_units, $b_units )
    {
        $db =& $db;
        $title = ( "Seu apoio de ".$from_villagename." em $to_villagename foi atacado" );
        $titleimage = "graphic/dots/".$color.".png";
        if ( $from_player != "-1" )
        {
            mysql_query( "INSERT into reports (title,title_image,time,type,in_group,receiver_userid,to_user,to_village,from_user,from_village,a_units,b_units) VALUES\r\n\t\t\t\t\t\t\t('".$title."','$titleimage','$time','supportAttack','defense','$from_player','$to_player','$to_village','$from_player','$from_village','$a_units','$b_units')" );
        }
        $this->new_report( $from_player );
    }

    function sendress( $from_player, $from_village, $from_villagename, $to_player, $to_playername, $to_village, $wood, $stone, $iron, $time )
    {
        $db =& $db;
        $title = ( $from_villagename." beliefert $to_playername" );
        $ress = $wood.";".$stone.";".$iron;
        if ( $from_player != "-1" )
        {
            mysql_query( "INSERT into reports (title,time,type,in_group,receiver_userid,to_user,to_village,from_user,from_village,hives) VALUES\r\n\t\t\t\t\t\t\t('".$title."','$time','sendRess','trade','$from_player','$to_player','$to_village','$from_player','$from_village','$ress')" );
            $this->new_report( $from_player );
        }
        if ( $to_player != "-1" && $from_player != $to_player )
        {
            mysql_query( "INSERT into reports (title,time,type,in_group,receiver_userid,to_user,to_village,from_user,from_village,hives) VALUES\r\n\t\t\t\t\t\t\t('".$title."','$time','sendRess','trade','$to_player','$to_player','$to_village','$from_player','$from_village','$ress')" );
            $this->new_report( $to_player );
        }
    }

    function assume_offer( $from_player, $from_playername, $from_village, $to_player, $to_playername, $to_village, $buy, $sell, $buy_ress, $sell_ress )
    {
        $db =& $db;
        $time = time( );
        $title = ( "Oferta de ".$from_playername." aceite" );
        $ress = $buy.";$sell;$buy_ress;$sell_ress";
        if ( $from_player != "-1" )
        {
            mysql_query( "INSERT into reports (title,time,type,in_group,receiver_userid,to_user,to_village,from_user,from_village,hives) VALUES\r\n\t\t\t\t\t\t\t('".$title."','$time','offer','trade','$to_player','$to_player','$to_village','$from_player','$from_village','$ress')" );
            $this->new_report( $from_player );
        }
        $title = ( $to_playername." aceitou sua oferta" );
        if ( $to_player != "-1" )
        {
            mysql_query( "INSERT into reports (title,time,type,in_group,receiver_userid,to_user,to_village,from_user,from_village,hives) VALUES\r\n\t\t\t\t\t\t\t('".$title."','$time','offer','trade','$from_player','$to_player','$to_village','$from_player','$from_village','$ress')" );
            $this->new_report( $to_player );
        }
    }

    function ally_invite( $from_username, $from_userid, $to_userid, $ally, $allyname )
    {
        $db =& $db;
        $time = time( );
        $title = ( $from_username." covidou-o para '$allyname' " );
        if ( $to_userid != "-1" )
        {
            mysql_query0( "INSERT into reports (title,time,type,in_group,receiver_userid,to_user,from_user,ally,allyname) VALUES\r\n\t\t\t\t\t\t\t('".$title."','$time','ally_invite','other','$to_userid','$to_userid','$from_userid','$ally','$allyname')" );
            $this->new_report( $to_userid );
        }
    }

    function ally_cancel_invite( $from_userid, $to_userid, $ally, $allyname )
    {
        $db =& $db;
        $time = time( );
        $title = ( "O convite para ".$allyname." foi retirado" );
        if ( $to_userid != "-1" )
        {
            mysql_query( "INSERT into reports (title,time,type,in_group,receiver_userid,to_user,from_user,ally,allyname) VALUES\r\n\t\t\t\t\t\t\t('".$title."','$time','ally_cancel_invite','other','$to_userid','$to_userid','$from_userid','$ally','$allyname')" );
            $this->new_report( $to_userid );
        }
    }

    function ally_close( $from_username, $from_userid, $to_userid )
    {
        $db =& $db;
        $time = time( );
        $title = ( ( $from_username )." dissolveu a sua tribo" );
        if ( $to_userid != "-1" )
        {
            mysql_query( "INSERT into reports (title,time,type,in_group,receiver_userid,from_username,from_user) VALUES\r\n\t\t\t\t\t\t\t('".$title."','$time','ally_clear','other','$to_userid','$from_username','$from_userid')" );
            $this->new_report( $to_userid );
        }
    }

    function accept_uv( $from_username, $from_userid, $to_userid )
    {
        $db =& $db;
        $time = time( );
        $title = ( ( $from_username )." aceitou cuidar da sua conta" );
        if ( $to_userid != "-1" )
        {
            mysql_query( "INSERT into reports (title,time,type,in_group,receiver_userid,from_username,from_user) VALUES\r\n\t\t\t\t\t\t\t('".$title."','$time','accept_uv','other','$to_userid','$from_username','$from_userid')" );
            $this->new_report( $to_userid );
        }
    }

    function inquires_uv( $from_username, $from_userid, $to_userid )
    {
        $db =& $db;
        $time = time( );
        $title = ( ( $from_username )." pediu cuidar da sua conta nas férias" );
        if ( $to_userid != "-1" )
        {
            mysql_query( "INSERT into reports (title,time,type,in_group,receiver_userid,from_username,from_user) VALUES\r\n\t\t\t\t\t\t\t('".$title."','$time','inquires_uv','other','$to_userid','$from_username','$from_userid')" );
            $this->new_report( $to_userid );
        }
    }

    function reject_uv( $from_username, $from_userid, $to_userid )
    {
        $db =& $db;
        $time = time( );
        $title = ( ( $from_username )." o pedido de sitter foi recusado" );
        if ( $to_userid != "-1" )
        {
            mysql_query( "INSERT into reports (title,time,type,in_group,receiver_userid,from_username,from_user) VALUES\r\n\t\t\t\t\t\t\t('".$title."','$time','reject_uv','other','$to_userid','$from_username','$from_userid')" );
            $this->new_report( $to_userid );
        }
    }

    function cancel_uv( $from_username, $from_userid, $to_userid )
    {
        $db =& $db;
        $time = time( );
        $title = ( ( $from_username )." cacelou o pedido de sitter" );
        if ( $to_userid != "-1" )
        {
            mysql_query( "INSERT into reports (title,time,type,in_group,receiver_userid,from_username,from_user) VALUES\r\n\t\t\t\t\t\t\t('".$title."','$time','cancel_uv','other','$to_userid','$from_username','$from_userid')" );
            $this->new_report( $to_userid );
        }
    }

    function attack_ally_visit( $from_player, $from_playername, $to_player, $to_village, $to_villagename )
    {
        $db =& $db;
        $title_att = ( $from_playername." besucht $to_villagename" );
        $title_def = ( $from_playername." besucht $to_villagename" );
        $time = time( );
        if ( $from_player != "-1" )
        {
            mysql_query( "INSERT into reports (title,time,type,in_group,receiver_userid,to_user,to_village,from_user) VALUES\r\n\t\t\t\t\t\t\t('".$title_att."','$time','attack_ally_visit_att','attack','$from_player','$to_player','$to_village','$from_player')" );
        }
        if ( $to_player != "-1" && $from_player != $to_player )
        {
            mysql_query( "INSERT into reports (title,time,type,in_group,receiver_userid,to_user,to_village,from_user) VALUES\r\n\t\t\t\t\t\t\t('".$title_def."','$time','attack_ally_visit_def','defense','$to_player','$to_player','$to_village','$from_player')" );
        }
        $this->new_report( $to_player );
        $this->new_report( $from_player );
    }
}

?>
