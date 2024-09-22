<?php
class sid
{
    var $db;
    var $vacation;

    function sid( )
    {
        $this->db = $db =& $db;
    }

    function create_sid( $userid, $is_uv = "false" )
    {
        mysql_query( "DELETE from sessions where userid='".$userid."'" );
        do
        {
            $sid_letters = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
            $sid = "";
            $n = 1;
            for ( ; $n <= 32; ++$n )
            {
                $sid .= $sid_letters[rand( 0, 61 )];
            }
            $result = mysql_query( "SELECT COUNT(sid) AS sid_exist from sessions where sid='".$sid."'" );
        } while ( $row = mysql_fetch_array( $result['sid_exist'] ) == "1" );
        $hkey = "";
        $n = 1;
        for ( ; $n <= 4; ++$n )
        {
            $hkey .= $sid_letters[rand( 0, 61 )];
        }
        if ( $is_uv )
        {
            mysql_query( "INSERT into sessions (userid,sid,hkey,is_vacation) VALUES ('".$userid."','$sid','$hkey',1)" );
        }
        else
        {
            mysql_query( "INSERT into sessions (userid,sid,hkey) VALUES ('".$userid."','$sid','$hkey')" );
        }
        setcookie( "session", "".$sid );
    }

    function logout( $userid )
    {
       mysql_query( "DELETE from sessions where userid='".$userid."'" );
    }

    function check_sid( $sid )
    {

		$row = sql("SELECT * from sessions where sid = '$sid'","assoc");
        if (empty($row['userid']))
        {
            return false;
        }
        else if ($row['is_vacation'] == 1 )
        {
            $this->vacation = true;
        }
        return $row;
    }

    function is_vacation( )
    {
        return $this->vacation;
    }
}

?>
