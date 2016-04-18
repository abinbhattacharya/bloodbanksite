<?php
	require_once('start_session.php');
	require_once('../CommonFiles/connect_vars.php');
	$page_title='Administrator Sign Up';
	$css_name='../CommonFiles/style.css';
	require_once('../CommonFiles/header.php');
	$error='';
	//$last_login='';
	//print_r($_POST);
	$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) or die('Server Error. If problem persists, contact the administrator.');
	$username='';
	$password_1=$mysqli->real_escape_string(trim($_POST['password_1']));
	$password_2=$mysqli->real_escape_string(trim($_POST['password_2']));
	//echo $password_1;
	//$js_name='../JavaScript/signup.js';
	//echo "Before admin id if";
	if(isset($_SESSION['admin_id']))
	{	
		//echo "Inside admin id if";
		$home_url = 'http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'/homepage.php';
        header('Location: '.$home_url);
		exit;
	}
	if(strlen($password_1)<8)
	{
		//echo "Inside password if";
		//echo $password_1;
		$error='<h1 class="error">Password is too short.<br/><br/>
			<a href="signup.php">Click here to register again.</a><br/></h1>';
	}
	else
	{
		//echo "Inside password else";
		if(isset($_POST['username']))
		{	
			//echo "Inside main if";
			
			$username=$mysqli->real_escape_string(trim($_POST['username']));
			$query_1="Select * from admin where username='$username'";
			$sql_result_1=$mysqli->query($query_1);
			if($sql_result_1->num_rows==1)
			{
				$error='<h1 class="error"> This username is already registered. Please try a different username.<br/><br/>
				<a href="signup.php">Click here to register again.</a><br/></h1>';
				$sql_result_1->free();
				//echo "Inside if";				
			
			}
		
			else
			{
				//echo "Inside else";				
				$query_2="insert into admin values('$username',SHA('$password_1'))";
				//echo $query_2;
				$mysqli->query($query_2);
				if($mysqli->affected_rows==1)
				{
					$_SESSION['admin_id'] = $username;
					setcookie('admin_id', $username, time() + (60*60*2));
					$home_url = 'http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'/homepage.php';
					header('Location: '.$home_url);
					exit;
				}
				$mysqli->close();
			}
			;
		}
	}
	echo "$error";
	require_once('../CommonFiles/footer.php'); 
?>