<?php

/**
 * Converts and IPv4 with an optional subnet to an binary number and subnet
 * @author Lekensteyn <lekensteyn@gmail.com>
 * @param $ip_range An IPv4 address with an optional slash followed by a subnet
 * @return array An array with a binary number and subnet
 */
function ip2bin($ip_range) {
    $ipbin = 0;
    @list($ip, $subnet) = explode('/', $ip_range);
    $subnet = isset($subnet) && $subnet >= 0 && $subnet <= 32 ? (int) $subnet : 32;
    /* IPv4 found */
    if (strpos($ip, '.') !== false) {
	$ip_parts = explode('.', $ip);
	for ($i = 0; $i < 4; $i++) {
	    $ip_part = (int) $ip_parts[$i];
	    if ($ip_part < 0 || $ip_part > 255) {
		/* invalid IP part, quiting... */
		break;
	    }
	    $ipbin += $ip_part << (24 - $i * 8);
	    /* the host bits are not significant */
	    if (8 * $i >= $subnet) {
		break;
	    }
	}
    }
    $significant = 0;
    for ($i = 0; $i < $subnet; $i++) {
	$significant += 1 << (31 - $i);
    }
    return array($ipbin & $significant, $subnet);
}

/**
 * Are we working in PHP5 OR PHP4? Please clarify! Otherwise, we don't need all these requires!
 * 
 * @author Chris <christopher@reiswerk.de>
 * @param string $class_name
 */
function __autoload($class_name) {
    $root = PATH . "/lib/";
    $search_dirs = array(
	'{name}.interface.php',
	'{name}.class.php',
	'class/{name}.class.php',
	'screen/{name}.screen.php',
	'screen/{name}.class.php',
	'smarty/{name}.class.php'
    );

    foreach ($search_dirs as $dir) {
	$dir = str_replace('{name}', $class_name, $dir);

	if (file_exists($root . $dir)) {
	    require_once $root . $dir;
	    break;
	}
    }
}

/**
 * checks whether the IP is within the allowed range or not
 * 
 * @return boolean 
 */
function checkIPs() {
    /* If this is a developer edition, skip IP check */
    if (TWLAN_DEV)
	return true;
    
    $valid_ip_ranges = array();
    $valid_ip_ranges[] = '192.168.0.0/16';
    $valid_ip_ranges[] = '128.0.0.0/8';
    $valid_ip_ranges[] = '10.0.0.0/8';
    $valid_ip_ranges[] = '172.16.0.0/12';
    $valid_ip_ranges[] = '127.0.0.0/8';
    $valid_ip_ranges_bin = array();
    foreach ($valid_ip_ranges as $ip_range) {
	$valid_ip_ranges_bin[] = ip2bin($ip_range);
    }
    $my_own_ip = $_SERVER['REMOTE_ADDR'];
    

    /* IPv4 address */
    if (strpos($my_own_ip, '.') !== false) {
	list($my_own_ip_bin, ) = ip2bin($my_own_ip);
	foreach ($valid_ip_ranges_bin as $ipdata) {
	    list($ip, $ip_range) = $ipdata;
	    $significant = 0;
	    for ($i = 0; $i < $ip_range; $i++) {
		$significant += 1 << (31 - $i);
	    }
	    if (($my_own_ip_bin & $significant) == $ip) {
		$valid_found = true;
		break;
	    }
	}
    } else if ($my_own_ip == '::1') {
	$valid_found = true;
    }
    
    return $valid_found;
}

?>