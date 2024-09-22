<?php /*This encoded file was generated using PHPCoder (http://phpcoder.sourceforge.net/) and eAccelerator (http://eaccelerator.sourceforge.net/) if (!is_callable("eaccelerator_load") && !@dl("eAccelerator.so")) { die("This PHP script has been encoded using the excellent eAccelerator Optimizer, to run it you must install <a href=\"http://eaccelerator.sourceforge.net/\">eAccelerator or the eLoader</a>"); }eaccelerator_load('eJx1VWtv4kYUnTFu47AtsK1B6Uoohq280iYr7dcNopINNOTRPNZotVslQg4egoNjsh7Tbn5D/3I/1HcefkER8jD3dc69ZzyMrMFgdD76aE0uPyIVIYQRUhD6DsHnH8Q/VxXmwJV2slqDycnlhTP9w3Kck09noy/T8cnx2LKS7XCIf4JQpGJceZ+s1HtwF9Rbno4d63R4NrbOz+DnkD0u6IO3cJfJM1icXljO8Oz8ALIVpF4yJpVXALeM/VVIjXeGtabzfxfROrw3Rp9Hg86XHUYOVyB4ejyaoD93eAO4krSAfO+cRWB8uMPKvnB2RB9pxkTUkBkmi4AQMB9rwvl9sqwpiXxPG2uFhGwPNUP3kWSWhAn6Vtw+Z9vdZJmtwtgPSRhnZoB6WvlhTDVHEw1Wk+dffhC494R+DbAJdgUnX2dXRPyQRXhu7FLcAw9WExd0dExi+/nEu9nl80lmkZvBrbRCRdGWDbY+BitLUsTgSkxEGHj7WZhWoOWH89VU5GBTRKm4B6WQhivQTDKBJzei5AMY8XWVHzslG+oRczxwB7DqV1PSmlMVLW3ATarlQmaVz07FTk2QBNLeHe7V5MTg8H9dk+j5A5iUK3hWtpW/rnE6lfwJOWJJWo3jvk0WJ3nBBhMD3EDh0A2CZ2MerR6ZiRp/L0hEDN/rv1Exy8OKwo/LGwu2fYUJ0a/lWpbkATcidB3E2KylrdVLrdXzrf1O4tnipp4WKxSx66nw/XoOT1bclTMA6tisS8heY4ucN40cSDHzVrrYodfE9GA8Nnj6XORGjkFDiFysM2lIhfM1zEY6Cr00Cn1TZZ2prAuVi/Wv9VRiOEIg3RGL13QO+2smMF2sovjQ97i2TOWCtHpRWj0nrZ5rVDLOS6un/TRL/TQ3pW3+j7TNTNpmDk9WTBsH5thsptK2tknb2iYty7yVLiYt0GKDsVuZrq0cfKusKysyaUld0wJmSzK62hOUN9/IPS5X4vsR2H7zaSydL5lPFTfx+4M9Bnx3+QsrBe0OV9HcYDk+iWIj9GeLuOO0c13Ogund2g+85IJlZqgGJGYLMltOQ0I84lltNmc2+kc3WpKYXaNtxO9HJO5kSdlm4czVz2K0A/itotVVe0vOdTttM0P5mRsx7/KA11rNWB1+euNoTd7C/klaYbhzN6DEkTAwtpkbTikJvWlycig227ysojr7Igj+HeOnAPf25ekDGi6l/n1o7fP2N7SBIeyj7L9kI8DmmWwSaSDWHKOMamxBNThq8e0FSCMHWfTaRoZn5PA6ZbzOFrxOCY+dWsDrbMNjXruT4XVyeN0yXncLXpfjbcoDmN0c5maE3c1wuxnub6/Zyt9UhP4Ds2BctA==');*/
if ( $ACTIONS_MASSIVKEY_HIGHAAASSDD != "sdjahsdkJHSAJDKHALKJHSADJHSADNsjdhaksjdlhJNASDKL" )
{
    exit( );
}
do
{
    if ( isset( $_GET['id'] ) )
        break;
    $_GET['id'] = "";
} while( 0 );
$villagesql = array( "userid", "id", "name", "x", "y", "continent", "points" );
$id = $_GET['id'];
$result = mysql_query("SELECT * FROM villages WHERE id = '$id'");
$info_village = mysql_fetch_array($result);
$result = mysql_query( "SELECT username,ally from users where id='".$info_village['userid']."'" );
$info_user = mysql_fetch_array( $result );
$info_user['username'] = ( $info_user['username'] );
$result = mysql_query( "SELECT short,id from ally where id='".$info_user['ally']."'" );
$info_ally = mysql_fetch_array( $result );
$info_ally['short'] = ( $info_ally['short'] );
if ( $info_village['exist_village'] == "0" )
{
    exit( );
}
if ($cl_builds->check_needed( "market", $village ) && 0 < $village['market'] )
{
}
else
{
}
$can_send_ress = false;
$tpl->assign( "info_village", $info_village );
$tpl->assign( "info_user", $info_user );
$tpl->assign( "info_ally", $info_ally );
$tpl->assign( "can_send_ress", $can_send_ress );

 ?>