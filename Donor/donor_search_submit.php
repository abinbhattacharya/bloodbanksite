<?php
	if(!isset($_POST['search']))
	{
		$home_url = 'http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'/donor_search.php';
        header('Location: '.$home_url);
		exit;
	}
	$page_title='Blood Donor Search';
	$last_login='';
	$js_name='';
	$css_name='../CommonFiles/style.css';
	require_once('../CommonFiles/header.php');
	require_once('../CommonFiles/connect_vars.php');
	$error='';
	$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) or die('Server Error. If problem persists, contact the administrator.');
	$city=strtoupper($mysqli->real_escape_string(trim($_POST['city'])));
	$bg=$mysqli->real_escape_string(trim($_POST['bg']));
	if($_POST['pincode']!='')
	{
		$pincode=$mysqli->real_escape_string(trim($_POST['pincode']));
		$query_1="select * from $bg where city='$city' and pincode='$pincode' and valid=1 order by name";
	}
	else
		$query_1="select * from $bg where city='$city' and valid=1 order by name";
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
		<table width="70%" border="1" align="center" id="credit_sheet" cellspacing="0" cellpadding="10">
				<tr><!--Header Row-->
    				<th scope="col">Name</th>
				    <th scope="col">Address</th>
				    <th scope="col">City</th>
				    <th scope="col">Pincode</th>
				    <th scope="col">Email</th>
                    <th scope="col">Phone no.</th>
                    <th scope="col">Gender</th>
				</tr>
		<?php
        while($row_1=$sql_result_1->fetch_row())//Fetch the results
		{?>
        	<tr>
				<td align="center" valign="middle"><?php echo $row_1[1];?></td>
				<td align="center" valign="middle"><?php echo $row_1[2];?></td>
				<td align="center" valign="middle"><?php echo $row_1[3];?></td>
				<td align="center" valign="middle"><?php echo $row_1[4];?></td>
				<td align="center" valign="middle"><?php echo "<a href='mailto:'$row_1[5]' target='_top'>$row_1[5]</a>";?></td>
                <td align="center" valign="middle"><?php echo $row_1[9];?></td>
                <td align="center" valign="middle"><?php echo $row_1[6];?></td>
			</tr>
         <?php
		}
		echo "</table>";
		echo "<h1 align='center'><a href='donor_search.php'>Click here</a> to go back and search again</h1>";
		$sql_result_1->free();
		unset($row_1);
	}
	else
	{
		echo "<h1 align='center' class='error'>There are no such donors.</h1>";
        echo "<h1 align='center'><a href='donor_search.php'>Click here</a> to go back and search again</h1>";
	}
	require_once('../CommonFiles/footer.php');
	?>