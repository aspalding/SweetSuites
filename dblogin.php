<?php
$db_hostname = 'sample host';
$db_database = 'sample db';
$db_username = 'sample user';
$db_password = 'sample password';

$db_server = mysql_connect($db_hostname, $db_username, $db_password);

if (!$db_server) die("Unable to connect to MySQL: " . mysql_error());
            mysql_select_db($db_database) or die("Unable to select database: " . mysql_error());
            
            
/* Stop injections */
function mysql_entities_fix_string($string)
{
    return htmlentities(mysql_fix_string($string));
}
function mysql_fix_string($string)
{
    if (get_magic_quotes_gpc()) $string = stripslashes($string);
    return mysql_real_escape_string($string);
}

?>
