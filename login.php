<?php 

$page_title = 'SweetSuites - Login';
include ('header.html');

require_once 'dblogin.php';


if (isset($_SERVER['PHP_AUTH_USER']) &&
    isset($_SERVER['PHP_AUTH_PW']))
{
    $un_temp = mysql_entities_fix_string($_SERVER['PHP_AUTH_USER']);
    $pw_temp = mysql_entities_fix_string($_SERVER['PHP_AUTH_PW']);
    $query = "SELECT * FROM users WHERE name='$un_temp'";
    $result = mysql_query($query);

    if (!$result) die("Database access failed: " . mysql_error());
    elseif (mysql_num_rows($result))
    {
        $row = mysql_fetch_row($result);
        $token = md5("$pw_temp");

        if ($token == $row[3])
        {
            session_start();

            $_SESSION['name'] = $un_temp;
            $_SESSION['pass'] = $pw_temp;
            $_SESSION['type'] = $row[1];

            die(header('Location: index.php'));
        }
        else die("Invalid username/password combination, click back and try again.");
    }
    else die("Invalid username/password combination, click back and try again.");
}

else
{
    header('WWW-Authenticate: Basic realm="Restricted Section"');
    header('HTTP/1.0 401 Unauthorized');
    die ("Please enter your username and password, click back and try again.");
}

?>
