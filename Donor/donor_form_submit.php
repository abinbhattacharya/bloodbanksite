<?php
	if(!isset($_POST['name']))
	{
		$home_url = 'http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'/donor_form.php';
        header('Location: '.$home_url);
		exit;
	}
	$page_title='Blood Donor Registration form';
	$last_login='';
	$js_name='';
	$css_name='../CommonFiles/style.css';
	require_once('../CommonFiles/header.php');
	require_once('../CommonFiles/connect_vars.php');
	//echo "<pre>";
	//print_r($_POST);
	//echo "</pre>";
	$error='';
	$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) or die('Server Error. If problem persists, contact the administrator.');
	$name=strtoupper($mysqli->real_escape_string(trim($_POST['name'])));
	$addr=$mysqli->real_escape_string(trim($_POST['addr']));
	$city=strtoupper($mysqli->real_escape_string(trim($_POST['city'])));
	$pincode=$mysqli->real_escape_string(trim($_POST['pincode']));
	$ph=$mysqli->real_escape_string(trim($_POST['ph']));
	$email=$mysqli->real_escape_string(trim($_POST['email']));
	$dob=$mysqli->real_escape_string(trim($_POST['dob']));
	$gender=$mysqli->real_escape_string(trim($_POST['gender']));
	$bg=$mysqli->real_escape_string(trim($_POST['bg']));
	$query_1="select * from $bg where name='$name' and address='$addr' and pincode='$pincode' and email='$email'";
	$sql_result_1=$mysqli->query($query_1);
	if($sql_result_1->num_rows==1)
	{
			$error='<h1 class="error"> This name is already registered. Please try a different name.<br/><br/>
			<a href="donor_form.php">Click here to register again.</a><br/></h1>';
			$sql_result_1->free();
	}
	else
	{
		$query_2="insert into $bg(name,address,city,pincode,phone,email,gender,dob) 
		values('$name','$addr','$city','$pincode','$ph','$email','$gender','$dob')";
		//echo "$query_2";
		$mysqli->query($query_2);
		if($mysqli->affected_rows==1)
		{
			$sql_result_1=$mysqli->query($query_1);
			$row_1=$sql_result_1->fetch_row();
			$ref=$bg.'-'.$row_1[0];
			echo "<h2 class='txtc'>You have been successfully registered as a donor.<br/><br/>Please email a copy of a complete haemogram blood test to <br/><br/><a href='mailto:bloodbank247365@gmail.com?Subject=Ref:%20$ref%20Blood%20Report' target='_top'>bloodbank247365@gmail.com</a><br/><br/> to validate your registration. You can also post the report to:<br/><br/><address> National Institute Of Technology Calicut</address><br>Mention the reference number $ref<br/><br/><a href='index.html'>Click here to go back</a></h2>";
		}
		else
		{
			$error='<h1 class="error">There was a problem updating the database. <a href="donor_form.php">Please try again.</a></h1>';
		}
	}
	echo "$error";
	$mysqli->close();
	require_once('../CommonFiles/footer.php');	
	?>	