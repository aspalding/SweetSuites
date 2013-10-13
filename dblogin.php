<?php
$db_hostname = 'localhost';
$db_database = 'sampledb';
$db_username = 'sampleun';
$db_password = 'sample pw';

$db_server = mysqli_connect($db_hostname,$db_username,$db_password,$db_database)

if (!$db_server) die("Unable to connect to MySQL: " . mysqli_error($db_server);
           
            
            
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
