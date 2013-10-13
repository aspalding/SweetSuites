<?php

require_once 'vendor/autoload.php' ;

$view_table = <<< TEMP

<table class="table table-bordered">
<th>Hotel</th><th>Date</th><th>Location</th> <th>Vacancy</th> <th>Filled</th> <th>Waitlist</th><th>Rating</th><th>Notes</th><th>City</th><th>Address</th>
{% block table %}

{% for row in rows %}
	<tr>
    {% for col in row %}
		<td>{{ col }}</td>
	{% endfor %}
	</tr>
{% endfor %}

{% endblock %}
</table>

TEMP;

$admin_table = <<< TEMP

<table class="table table-bordered">
<th></th><th>Hotel</th><th>Date</th><th>Location</th> <th>Vacancy</th> <th>Filled</th> <th>Waitlist</th><th>Rating</th><th>Notes</th><th>City</th><th>Address</th>
<form name="input" action="edit_suites.php" method="get">

{% block table %}

{% for row in rows %}
	<tr>
	
	<td><input type='radio' name='Register' value='{{ row.6 }}'></td>
	
    {% for col in row %}
		<td>{{ col }}</td>
	{% endfor %}
	</tr>
{% endfor %}

{% endblock %}
</table>

<div class="well" style="max-width: 200px; margin: 0 0 10px;">

<input type="submit" class="btn btn-warning btn-block" value="Edit"></form></br>

<form name='input' action='edit_suites.php' method='get'>
<input type='hidden' id='type' name='Register' value='new'>
<input type="submit" class="btn btn-primary btn-block" value="New Suite">
</form>

</div>


TEMP;

$user_table = <<< TEMP

<table class="table table-bordered">
<th></th><th>Hotel</th><th>Date</th><th>Location</th> <th>Vacancy</th> <th>Filled</th> <th>Waitlist</th><th>Rating</th><th>Notes</th><th>City</th><th>Address</th>
<form name="input" action="suites_registered.php" method="get">

{% block table %}

{% for row in rows %}
	<tr>
	
	<td><input type='radio' name='Register' value='{{ row.6 }}'></td>
	
    {% for col in row %}
		<td>{{ col }}</td>
	{% endfor %}
	</tr>
{% endfor %}

{% endblock %}
</table>

<div class="well" style="max-width: 200px; margin: 0 0 10px;">

<input type="submit" class="btn btn-primary btn-block" value="Book!"></form>

</div>
TEMP;


$register = <<< TEMP

<h1>New User</h1>
<form name="input" method="post">

User name:<br><input type="text" name="name" size="25"><br>
Password:<br><input type="text" name="pass" size="25"><br>

<br><input type="submit" value="Submit"></form>

TEMP;


$loader = new Twig_Loader_Array(array(
    '@unregistered/view_table.html' => $view_table,
	'@admin/view_table.html' => $admin_table,
	'@user/view_table.html' => $user_table,
	'register.html' => $register,

));

$twig = new Twig_Environment($loader);


?>