<?php
	$page_title='Blood Donor De-Activation Form';
	$last_login='';
	$js_name='';
	$css_name='../CommonFiles/style.css';
	require_once('../CommonFiles/header.php');
	require_once('../CommonFiles/connect_vars.php');
	$error='';
	if(!isset($_POST['delete']))
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
	$name=strtoupper($mysqli->real_escape_string(trim($_POST['name'])));
	$email=$mysqli->real_escape_string(trim($_POST['email']));
	$query_1="select * from $bg where name='$name' and email='$email' and valid=1 limit 1";
	$sql_result_1=$mysqli->query($query_1);
	if($sql_result_1->num_rows==1)
	{
		$code=mt_rand();
		$query_2="update $bg set code=$code where name='$name' and email='$email' and valid=1";
		$mysqli->query($query_2);
		if($mysqli->affected_rows==1)
		{			
			$headers="";
			$headers .= 'Content-type: text/html;charset=iso-8859-1' . "rn";
			$headers .= 'From: System Admin <noreply@bloodbank247365.com>' . "rn";
			$body ="<html>
			<p>Dear $name,<br/><br/>With respect to your request for Account Removal from the database.<a href='http://localhost/Bloodbank/Donor/donor_deletion_code.php'>Click here</a>  and enter the code given below.<br><br> CODE : $code <br><br>We hope you are in best of your health and we will like to hear back from you.<br>Your Blood can save lives!!! Be a Blood Donor !!! <br><br><b><u><h3>Five minutes of your time + 350 ml. of your blood = One life saved.</h3>
			<img src=http://dksf.org.np/wp-content/uploads/2013/12/blood-donation-banner.jpg align=center>";
			mail($_POST['email'],"Account Removal\n",$body,$headers);
			echo "<h2 class='txtc'>You have been emailed a code.<br/><br/>Please follow the instructions in the email to proceed.</h2>";
			echo "<h1 align='center'><a href='index.html'>Click here</a> to go back.</h1>";
		}
		else
			$error="<h1 align='center' class='error'>There was an error. Please contact the adminnistrator.</h1>
			<h1 align='center'><a href='index.html'>Click here</a> to go back.</h1>";
	}
	else
	{	$error="<h1 align='center' class='error'>There is no such donor.</h1>
	<h1 align='center'><a href='index.html'>Click here</a> to go back.</h1>";
	}
	echo $error;
	require_once('../CommonFiles/footer.php');
?>