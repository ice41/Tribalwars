<?php
/*
eaccelerator_load('eJxtlN9vmzAQx21gG1EnBUiUSdMm0Rf6UCZNe9uSTIIka9pkTVeiqZtaRSS4gQZICmRb//c9zGfCjyXw4B9f3/k+Ph8eGL3eYDy4NqaTayQghDBCHGIjhG5Q+l3xbAHzb2lv9Kbnk0tr9tWwrPPvo8GP2fD8bGgYdNrvYwVMkYAx/572sfNgu7GzuhhaxkV/NDTGIxj2WXMZPziuvaKt715cGlZ/ND4Fbw4JE0bCv4Zwq8Rbh7H6TjW28f1fN9qGS3VwM+gdWyKDwzzlRc4ct2GOBSo8o4PHLYmemITEVNnYUUxuxfSMNArmIcrsbDBFd5mKEZfu5zkmaF0MardYFkUYU6NH2lk0c72p6gX2kuieo3vRQnfXAdnAPLQDosfuOkr0zdoLk1iP7HClz0mczHZCQII5iWL9l+f71CXWHRIvIm8DJ1bvo3Wg2r7/pP52SURUz+meCJiFxxwFAJ4Tg0FyB5R5bp7TNiLx1k+wlpLTy7Fqe5mrlTP3hSQL97aWb/bfJmatyEpmwtF4tZ0ppNQL79dY28UQuJ9HqV2W2PERW+BOj5jvm8lLxtKChCZ2EKjkjxcnHokSNfQWbnLcru9uEQ5AwiS9yHoJMI96l6m0Te2z+zBhpcvWuoWraNVLtcC2mLJocMVld62eJa8tVdFIlTRSmQZqm1aIKRUgUglEOgCRMpCdpyblDHIVg1zJIJcZQIbCNOUCQi5ByAcQcgaRuWpyTqFUUSiVFEqZAqqM/RmmUmAoJQzlAEPJMHJfTck5GlUcjUqORpkDCrD0y5mNgqawE5ncYbNOeVMgCf0P88hqHOA2Mty9EFojg/7YBIur5j7hN6ZwgAe/XfpSMBHxIL6gg927ITBTgRN4A0ad9BnoNPcYo/U2dD6xHazmAWmzTLrYJokL9stEa2akVivNFyvDZOPjdgvtngsgtOPYW4YGaN3SxrS/bbFoewc0U0vQu7kBFj+/Yn2ac4T+AZYJ4d0=');*/

if ($screen = 'info_ally') {
$id = $_GET['id'];
} else {
$id = $user['ally'];
}
$result = mysql_query( "SELECT image,id,irc,homepage,name,short,points,rank,best_points,members,villages,description from ally where id='$id'" );
$info = mysql_fetch_array( $result );
if (isset($row['id'] ) )
{
    exit( );
}
$info['homepage'] = ( $info['homepage'] );
$info['irc'] = ( $info['irc'] );
$info['name'] = ( $info['name'] );
$info['short'] = ( $info['short'] );
$info['description'] = nl2br( ( $info['description'] ) );
$info['cutthroungt'] = round( $info['points'] / $info['members'] );
$tpl->assign( "info", $info );


?>