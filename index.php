<?php 

$page_title = 'SweetSuites - Portal';
$page_name = 'Portal';
include ('static/header.html');

require 'templates.php';

require_once 'dblogin.php';

?>

<div class="col-md-2">
<?php include ('static/menu.html');?>
</div>

<div class="col-md-10">
	<p>
	    <?php
	        session_start();    
	        if (isset($_SESSION['name']))
	        {
	            $name = $_SESSION['name'];
	            $type = $_SESSION['type'];

	            echo "Hello $name, you are a $type. ";
	        }
	        else echo "Please <a href=login.php>click here</a> to log in.";
	    ?>

	    This site is under construction.</br>

	</p>

    
    <?php

        $query = "SELECT * FROM rooms";
        $result = mysql_query($query);

        if (!$result) die ("Database access failed: " . mysql_error());

        $num_rows = mysql_num_rows($result);
		$rows = array();
		for($i = 0; $i < $num_rows; ++$i){
			$rows[$i] = mysql_fetch_row($result);
		}
		
		if (!isset($_SESSION['name'])){
			echo $twig->render('@unregistered/view_table.html', array('rows' => $rows));
		}
		elseif($_SESSION['type'] == 'admin'){
			echo $twig->render('@admin/view_table.html', array('rows' => $rows));
		}
		elseif($_SESSION['type'] == 'user'){
			echo $twig->render('@user/view_table.html', array('rows' => $rows));
		}

	?>
	
</div>
