<?php

    session_start();



    unset($_SESSION['name']);
    unset($_SESSION['pass']);
    unset($_SESSION['type']);
    session_destroy();
    
    setcookie("PHPSESSID","",time()-3600,"/");
    
    unset($_COOKIE['PHPSESSID']);


    session_write_close();
    
    session_regenerate_id(true); 

    die(header('Location: index.php'));
    
?>
