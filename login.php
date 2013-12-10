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

        //Check against password and if user has had more than 5 login attemps.
        if ($token == $row[3] && $row[4] < 6)
        {
            session_start();
            
            session_regenerate_id(true);

            $_SESSION['name'] = $un_temp;
            $_SESSION['type'] = $row[1];
            $_SESSION['id'] = $row[2];

            die(header('Location: index.php'));
        }
        else{
            //If the user has not atttempted to login in an hour, reset attempts to 0.
            if(time() - strtotime($row[5]) > 60*60){
                $query = "UPDATE users SET attempts=0 WHERE name='$un_temp'";
                $result = mysql_query($query);
            }
        
            $query = "UPDATE users SET attempts=attempts + 1 WHERE name='$un_temp'";
            $result = mysql_query($query);
            
            //If the user has had 5 or more logins in the past hour, don't let them login.
            if($row[4] > 4){
                die("Max attempts reached, try again later.");
            }
            else{
                die("Invalid username/password combination, click back and try again.");
            }
        } 
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
