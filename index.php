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

        $query = "SELECT * FROM courses";
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
		elseif($_SESSION['type'] == 'faculty'){
			echo $twig->render('@admin/view_table.html', array('rows' => $rows));
		}
		elseif($_SESSION['type'] == 'underclass'){
			echo $twig->render('@user/view_table.html', array('rows' => $rows));
		}

		
		/*
        echo '<table class="table table-bordered"><tr>';
        echo '<th></th><th>Hotel</th><th>Date</th><th>Location</th> <th>Vacancy</th> <th>Filled</th> <th>Waitlist</th><th>Rating</th><th>Notes</th><th>City</th>';
        echo '</tr>';
        
        if($type == "faculty")        
            echo '<form name="input" action="edit_suites.php" method="get">';
        else
            echo '<form name="input" action="suites_registered.php" method="get">';

        for ($j = 0 ; $j < $rows ; ++$j)
        {
            $row = mysql_fetch_row($result);
            echo "<tr><td><input type='radio' name='Register' value='$row[6]'>";
            for ($k = 0 ; $k < 8 ; ++$k) echo "<td>$row[$k]</td>";
                echo "</tr>";
        }
        if (!isset($_SESSION['name'])){
            echo 'You must register to book a suite.</br></br>';
        }

        else if($type == "faculty"){
            echo '</table><input type="submit" value="Edit"></form>';
            echo '<form name="input" action="edit_suites.php" method="get">';
            echo "<input type='hidden' id='type' name='Register' value='new'>";
            echo '<input type="submit" value="New Course">';
            echo '</form>';
        }
        else if ($type == "underclass"){
            echo '</table><input type="submit" value="Register"></form>';
        }
  		
	*/
	?>
	
</div>
