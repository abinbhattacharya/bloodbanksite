<?php
	$page_title='Blood Donor De-Activation Form';
	$last_login='';
	$js_name='';
	$css_name='../CommonFiles/style.css';
	require_once('../CommonFiles/header.php');
	require_once('../CommonFiles/connect_vars.php');
	$error='';
	if(!isset($_POST['delete_code']))
	{
		$home_url = 'http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'/donor_deletion.php';
        header('Location: '.$home_url);
		exit;
	}
	$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) or die('Server Error. If problem persists, contact the administrator.');
	//$city=$mysqli->real_escape_string(trim($_POST['city']));
	$bg=$mysqli->real_escape_string(trim($_POST['bg']));
	$query_name="select name from bg_names where code='$bg'";
	//echo $query_name;
	$sql_result_name=$mysqli->query($query_name);
	$row_name=$sql_result_name->fetch_row();
	$bg_name=$row_name[0];
	$name=$mysqli->real_escape_string(trim($_POST['name']));
	$email=$mysqli->real_escape_string(trim($_POST['email']));
	$code=$mysqli->real_escape_string(trim($_POST['code']));
	$query_1="select * from $bg where name='$name' and email='$email' and valid=1 and code=$code limit 1";
	//echo $query_1;
	$sql_result_1=$mysqli->query($query_1);
	if($sql_result_1->num_rows==1)
	{
		$query_2="delete from $bg where name='$name' and email='$email' and valid=1 and code=$code";
		$mysqli->query($query_2);
		if($mysqli->affected_rows==1)
		{	
			echo "<h2 class='txtc'>You have been successfully removed from the database.<br/><br/>
			<a href='index.html'>Click here to go back</a></h2>";
		}
		else
		{
			$error='<h1 class="error">There was a problem updating the database. <a href="donor_form.php">Please try again.</a></h1>';
		}
	}
	else
	{	$error="<h1 align='center' class='error'>There is no such donor.</h1>
	<h1 align='center'><a href='index.html'>Click here</a> to go back.</h1>";
	}
	echo $error;
	require_once('../CommonFiles/footer.php');