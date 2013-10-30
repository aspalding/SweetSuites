<?php 

$page_title = 'sweet Suites - Booked!';
$page_name = 'Registration';
include ('static/header.html');

$suite = $_GET['Register'];

session_start();

$user = $_SESSION['id'];

?>

<div class="col-md-2">
<?php include ('static/menu.html')?>
</div>


<div class="col-md-10">

<?php

    require_once 'dblogin.php';
	

    $query = "SELECT * FROM rooms WHERE room_ID='$suite'";
    $result = mysql_query($query);
        
    if (!$result) die("Database access failed: " . mysql_error());
    elseif (mysql_num_rows($result)){
        $row = mysql_fetch_row($result);
        $vacancy = $row[5];
    }
    

    if($vacancy == 0){
        echo "<p class='text-center'>We apologize, that suite is filled.<br>";
        echo "Click <a href=index.php>here</a> to book another room.</p>";
    }

    else{
        $query = "UPDATE rooms SET vacancy=vacancy - 1 WHERE room_ID='$suite'";
        $result = mysql_query($query);
        
        $query = "INSERT INTO history VALUES(NULL, '$suite', '$user')";
        $result = mysql_query($query);
        
        if (!$result) die ("Database access failed: " . mysql_error());

        mysql_close($db_server);

        echo "<p class='text-center'>You have booked $suite.<br>";
        echo "Click <a href=index.php>here</a> to book another suite.</p>";
    }
    
?>

</div>
