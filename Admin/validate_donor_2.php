<?php
//echo "<pre>";
//print_r($_POST);
//echo "</pre>";
require_once('start_session.php');
$page_title='Blood Donor Validation';
	$last_login='';
	$js_name='';
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
	if(!isset($_POST['valid']))
	{
		$home_url = 'http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'/validate_donor_1.php';
        header('Location: '.$home_url);
		exit;
	}
	require_once('../CommonFiles/header.php');
	require_once('../CommonFiles/connect_vars.php');
	$error='';
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
		$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) or die('Server Error. If problem persists, contact the administrator.');
		$bg=$mysqli->real_escape_string(trim($_POST['bg']));
		$query_1="select * from $bg order by serial";
		//echo $query_1;
		$query_name="select name from bg_names where code='$bg'";
		//echo $query_name;
		$sql_result_name=$mysqli->query($query_name);
		$row_name=$sql_result_name->fetch_row();
		$bg_name=$row_name[0];
		$sql_result_1=$mysqli->query($query_1);
		if($sql_result_1->num_rows>=1)
		{
			echo "<h1 align='center'> Blood Group $bg_name</h1>"; ?>
        <form name="validate_donor_2" action="validate_donor_3.php" method="post">
        <input type="hidden" name="bg" value='<?php echo "$bg"?>'>
		<table width="70%" border="1" align="center" id="credit_sheet" cellspacing="0" cellpadding="10">
				<tr><!--Header Row-->
                	<th scope="col">Ref No.</th>
    				<th scope="col">Name</th>
				    <th scope="col">Address</th>
				    <th scope="col">City</th>
				    <th scope="col">Pincode</th>
				    <th scope="col">Email</th>
                    <th scope="col">Phone no.</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Valid</th>
				</tr>
		<?php
        while($row_1=$sql_result_1->fetch_row())//Fetch the results
		{
        	$ref=$bg.'-'.$row_1[0];
		?>
			<tr>
            	<td align="center" valign="middle"><?php echo $ref;?></td>
				<td align="center" valign="middle"><?php echo $row_1[1];?>
                	<input type="hidden" value="<?php echo $row_1[0];?>" name="reg_no[]"/>
                </td>
				<td align="center" valign="middle"><?php echo $row_1[2];?></td>
				<td align="center" valign="middle"><?php echo $row_1[3];?></td>
				<td align="center" valign="middle"><?php echo $row_1[4];?></td>
				<td align="center" valign="middle"><?php echo "<a href='mailto:'$row_1[5]' target='_top'>$row_1[5]</a>";?></td>
                <td align="center" valign="middle"><?php echo $row_1[9];?></td>
                <td align="center" valign="middle"><?php echo $row_1[6];?></td>
                <td align="center" valign="middle">
                <?php //echo $row_1[10];?>
					<input type="radio" name="valid[<?php echo $row_1[0];?>]" value="1" <?php if($row_1[10]==1) echo "checked";?>/>Valid
                    <br/>
                    <input type="radio" name="valid[<?php echo $row_1[0];?>]" value="0" <?php if($row_1[10]==0) echo "checked";?>/>Invalid
                </td>
			</tr>
           <?php
		}
		echo "<tr><td colspan='9'>
			<input type='submit' value='Proceed' class='button' style='width:5em; height:2em; font-size:1.2em'/>
			</td></tr>";
		echo "</table>";
		echo "</form>";
		echo "<h1 align='center'><a href='validate_donor_1.php'>Click here</a> to go back and search again</h1>";
		$sql_result_1->free();
		unset($row_1);
	}
	else
	{
		echo "<h1 align='center' class='error'>There are no such donors.</h1>";
        echo '<h1 class="txtc"><a href="validate_donor_1.php">Click here</a> to go back and search again</h1>';
	}
	require_once('../CommonFiles/footer.php');
	?>