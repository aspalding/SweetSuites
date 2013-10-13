<?php 

$page_title = 'CollegePort - Registered!';
$page_name = 'Registration';
include ('header.html');

$class = $_GET['Register'];

session_start();

$student = $_SESSION['name'];

?>

<div class="col-md-2">
<?php include ('menu.html')?>
</div>


<div class="col-md-10">

<?php

    require_once 'dblogin.php';
	

    $query = "SELECT * FROM courses WHERE Course_ID='$class'";
    $result = mysql_query($query);
        
    if (!$result) die("Database access failed: " . mysql_error());
    elseif (mysql_num_rows($result)){
        $row = mysql_fetch_row($result);
        $slots = $row[3];
        $slots_filled = $row[4];
        $students_registered = $row[9];
    }
    

    if(strpos($students_registered, $student) === false){
        if($slots == $slots_filled){
            $query = "UPDATE courses SET Wait_list=Wait_list + 1, Students = IFNULL(CONCAT(`Students`, '$student'), '$student') WHERE Course_ID='$class'";
            $result = mysql_query($query);
            if (!$result) die ("Database access failed: " . mysql_error());

            mysql_close($db_server);

            echo "<p class='text-center'>We apologize, that suite is filled. We've added you to the waitlist for $class.<br>";
            echo "Click <a href=index.php>here</a> to register for another class.</p>";
        }

        else{
            $query = "UPDATE courses SET Filled_Slots=Filled_Slots + 1, Students = IFNULL(CONCAT(`Students`, '$student '), '$student') WHERE Course_ID='$class'";
            $result = mysql_query($query);
            if (!$result) die ("Database access failed: " . mysql_error());

            mysql_close($db_server);

            echo "<p class='text-center'>You have booked $class.<br>";
            echo "Click <a href=index.php>here</a> to book another suite.</p>";
        }
    }

    else{  
        echo "<p class='text-center'>You've already booked $class.<br>";
        echo "Click <a href=index.php>here</a> to book another suite.</p>";
    }  
    
?>

</div>
