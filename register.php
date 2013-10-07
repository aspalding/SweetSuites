<?php 

$page_title = 'SweetSuites - Register';
$page_name = 'Register';
include ('header.html');

require_once 'dblogin.php';
    
?>
    
<div class="col-md-2">
<?php include ('menu.html')?>
</div>

<div class="col-md-10">

        <?php
            session_start();    
            if (isset($_SESSION['name']))
            {
                die(header('Location: index.php'));
            }
        ?>
    
    </p>

	 <h1>New User</h1>
	 <form name="input" method="post">

    User name:<br><input type="text" name="name" size="25"><br>
    Password:<br><input type="text" name="location" size="25"><br>

    <br><input type="submit" value="Submit"></form>

	<?php

        $type = 'underclass';
        $course = mysql_entities_fix_string($_POST['name']);
	    $location = md5(mysql_entities_fix_string($_POST['location']));

        $query = "INSERT INTO users VALUES('$course', '$type', NULL, '$location', NULL)";

        if ($_POST['name']){
            $result = mysql_query($query);
            if (!$result) die ("Database access failed: " . mysql_error());

            mysql_close($db_server);

            die(header('Location: index.php'));
        }
    ?>

</div>
