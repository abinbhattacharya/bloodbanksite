<?php
//echo "<pre>";
//print_r($_POST);
//echo "</pre>";
require_once('start_session.php');
$css_name='../CommonFiles/style.css';
if(!isset($_SESSION['admin_id']))
{
	require_once('../CommonFiles/header.php');
	?>
    <div id="msg_container">
    	<div id="msg_box">
			<p>Please <a href="index.php">LOG IN</a> to access this page.</p>
        </div>
    </div>
	<?php require_once('../CommonFiles/footer.php');
	exit;
}
	$page_title='Blood Donor Validation';
	if(!isset($_POST['reg_no']))
	{
		$home_url = 'http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'/validate_donor_1.php';
        header('Location: '.$home_url);
		exit;
	}
	
	require_once('../CommonFiles/header.php');
	require_once('../CommonFiles/connect_vars.php');
	$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) or die('Server Error. If problem persists, contact the administrator.');
	$valid=$_POST['valid'];
	$reg_no=$_POST['reg_no'];
	$bg=$_POST['bg'];
	?>
    <div id="menubar1" class="txtl">
		<ul class="menubar"><li><h3>&nbsp;&nbsp;Welcome, <?php echo $_SESSION['admin_id']; ?>&nbsp;&nbsp;</h3></li></ul>
	</div>
	<div id="menubar2" class="txtr">
		<ul class="menubar">
			<li><h3 style="display:inline;"><a href="homepage.php">Home</a></h3></li>
			<li><h3 style="display:inline;"><a href="logout.php">&nbsp;Log Out</a></li></h3>
		</ul>
	</div>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <?php
	$flag=true;
    foreach($valid as $key => $value)
	{
		$query_1="update $bg set valid=$valid[$key] where serial='$key'";
		//echo $query_1;
		$mysqli->query($query_1);
		if($mysqli->errno)
		{
			$flag=false;
			break;
		}
	}
	if($flag==false)
	{
		echo '<h2 class="txtc">There was a problem. Try again later.</h2>';
		
	}
	else
	{
		echo '<h2 class="txtc">Validated succesfully.</h2>';
	}
	echo '<h1 class="txtc"><a href="validate_donor_2.php">Click here</a> to go back and search again</h1>';
	require_once('../CommonFiles/footer.php');
?>	
	