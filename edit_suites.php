<?php 

$page_title = 'SweetSuites - Edit Suites';
$page_name = 'Edit Suites';
include ('header.html');

require_once 'dblogin.php';

$class = $_GET['Register'];

if($class == null)
    $class = 'new';
    

?>
    
<div class="col-md-2">
<?php include ('menu.html')?>
</div>

<div class="col-md-10">

	 <h1><?php echo $class; ?></h1>
	 <form name="input" method="post">

    Course Name:<br><input type="text" name="name" size="25"><br>
    Time:<br><input type="text" name="time" size="25"><br>
    Location:<br><input type="text" name="location" size="25"><br>
    Total Slots:<br><input type="text" name="slots" size="25"><br>
    Department:<br><input type="text" name="department" size="25"><br>	 

	<?php
        if($class == "new"){
            echo 'Course ID:<br><input type="text" name="course_id" size="25"><br>';
            echo 'Department ID:<br><input type="text" name="department_id" size="25"><br><br>';
            echo '<input type="submit" value="Submit"></form>';
        }
        else{
            echo '<br><input type="submit" value="Submit"></form>';
        }

        $zero = 0;
        $course = mysql_entities_fix_string($_POST['name']);
        $time = mysql_entities_fix_string($_POST['time']);
	    $location = mysql_entities_fix_string($_POST['location']);
        $slots = mysql_entities_fix_string($_POST['slots']);
        $department = mysql_entities_fix_string($_POST['department']);

        if (!$db_server) die("Unable to connect to MySQL: " . mysql_error());
            mysql_select_db($db_database) or die("Unable to select database: " . mysql_error());


        if($class == "new"){
            $course_id = mysql_entities_fix_string($_POST['course_id']);
            $department_id = mysql_entities_fix_string($_POST['department_id']);
            $query = "INSERT INTO courses VALUES('$course', '$time', '$location', '$slots', '$zero', '$zero', '$course_id', '$department', '$department_id', NULL)";
        }
        else{
            $query = "UPDATE courses SET Course_Name='$course', Time='$time', Location='$location', Total_Slots='$slots', Department='$department' WHERE Course_ID='$class'";
        }

        if ($_POST['name']){
            $result = mysql_query($query);
            if (!$result) die ("Database access failed: " . mysql_error());

            mysql_close($db_server);

            die(header('Location: choosedep_reg.php'));
        }

    ?>

</div>
