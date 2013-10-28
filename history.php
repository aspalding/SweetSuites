<?php

    $page_title = 'SweetSuites - History';
    $page_name = 'History';
    include ('static/header.html');

    require 'templates.php';

    require_once 'dblogin.php';

?>

<div class="col-md-2">
<?php include ('static/menu.html');?>
</div>

<div class="col-md-10">

<?php
    $query = "SELECT * FROM history";
    $result = mysql_query($query);

    if (!$result) die ("Database access failed: " . mysql_error());

    $num_rows = mysql_num_rows($result);
	$rows = array();
	for($i = 0; $i < $num_rows; ++$i){
		$rows[$i] = mysql_fetch_row($result);
	}
	
	echo $twig->render('@admin/history.html', array('rows' => $rows));

?>

</div>