<?php 

$page_title = 'SweetSuites - Register';
$page_name = 'Register';
include ('static/header.html');

require 'templates.php';

require_once 'dblogin.php';
    
?>
    
<div class="col-md-2">
<?php include ('static/menu.html')?>
</div>

<div class="col-md-10">

        <?php
            session_start();    
            if (isset($_SESSION['name']))
            {
                die(header('Location: index.php'));
            }
        ?>
	
	<?php
		echo $twig->render('register.html');
		

        $type = 'underclass';
        $username = mysql_entities_fix_string($_POST['name']);
	    $password = md5(mysql_entities_fix_string($_POST['pass']));

        $query = "INSERT INTO users VALUES('$username', '$type', NULL, '$password', NULL)";

        if ($_POST['name']){
            $result = mysql_query($query);
            if (!$result) die ("Database access failed: " . mysql_error());

            mysql_close($db_server);

            die(header('Location: index.php'));
        }
    ?>

</div>
