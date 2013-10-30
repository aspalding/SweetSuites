<?php 

$page_title = 'SweetSuites - Edit Suites';
$page_name = 'Edit Suites';
include ('static/header.html');

require_once 'dblogin.php';

$suite = $_GET['Register'];

if($suite == null)
    $suite = 'new';

?>
    
<div class="col-md-2">
<?php include ('static/menu.html')?>
</div>

<div class="col-md-10">

	<h1><?php echo $suite; ?></h1>

	<form name="input" method="post">
    Name:<br><input type="text" name="name" size="25"><br>
    Type:<br><input type="text" name="type" size="25"><br>
    Smoking:<br><input type="text" name="smoking" size="25"><br>
    Pet (0,1):<br><input type="text" name="pet" size="25"><br>
    Meal:<br><input type="text" name="meal" size="25"><br>	 
    Rating(*-*****):<br><input type="text" name="rating" size="25"><br>	 
    Price($-$$$$$):<br><input type="text" name="price" size="25"><br><br>	 
    <input type="submit" value="Submit"></form>

	<?php

        
        
        $name = mysql_entities_fix_string($_POST['name']);
	    $type = mysql_entities_fix_string($_POST['type']);
        $smoking = mysql_entities_fix_string($_POST['smoking']);
        $pet = mysql_entities_fix_string($_POST['pet']);
        $vacancy = 5;
        $meal = mysql_entities_fix_string($_POST['meal']);
        $rating = mysql_entities_fix_string($_POST['rating']);
        $price = mysql_entities_fix_string($_POST['price']);

        if($suite == "new"){
            $query = "INSERT INTO rooms VALUES(NULL, '$name', '$type', '$smoking', '$pet', '$vacancy', '$meal', '$rating', '$price')";
        }
        else{
            $query = "UPDATE rooms SET room_name='$name', type='$type', pet='$pet', vacancy = '$vacancy', meal = '$meal', rating = '$rating', price = '$price' WHERE room_ID='$suite'";
        }

        if ($_POST['name']){
            $result = mysql_query($query);
			
            if (!$result) die ("Database access failed: " . mysql_error());

            mysql_close($db_server);

            die(header('Location: index.php'));
        }

    ?>

</div>
