<?php $page_title='Blood Donor Registration form';
$last_login='';
$js_name='';
$css_name='../CommonFiles/style.css';
require_once('../CommonFiles/header.php');
?>

<h2 align=center>Fill in the following details carefully.</h2>
<h2 align=center>All fields are mandatory.</h2>

<form action="donor_form_submit.php" method="post">
	<table style="width=100%" align="center" cellpadding="10">
		<tr>
			<td> Name: </td>
			<td> <input type="text" name="name" size="20" placeholder="Yash Mograi" required><br> </td>
		</tr>
		<tr>
			<td> Address: </td> 
			<td> <!--<input type="text" name="addr"  size="20" placeholder="Professor Apartments" required><br> </td>-->
            <textarea rows="5" cols="20" name="addr" required="required"></textarea>
		</tr>
        <tr>
			<td> City: </td> 
			<td> <input type="text" name="city"  size="20" placeholder="Calicut" required><br> </td>
		</tr>
        <tr>
			<td> Pincode: </td> 
			<td> <input type="text" name="pincode"  size="20" placeholder="673601" pattern="[0-9]{6}" required><br> </td>
		</tr>
		<tr>
			<td> Mobile No: </td>
			<td><input type="text" name="ph" placeholder="+919876543210" pattern="\+91(9|8|7)[0-9]{9}" required size="20"><br> </td>
		</tr>
		<tr>	
			<td> E-mail:</td> 
			<td><input type="email" name="email" placeholder="xyz@gmail.com" required size="20"><br> </td>
		</tr>
		<tr>
			<td> Date of Birth: <br />(dd-mm-yyyy)</td>
			<td><input type="date" name="dob" required size="20" placeholder="17-01-1993" max="<?php echo date('Y-m-d')?>"><br> </td>
		</tr>
		<tr>
			<td> Gender:</td>
			<td> <input type="radio" name="gender"
<?php if (isset($gender) && $gender=="female") echo "checked";?>
value="female" >Female
<input type="radio" name="gender"
<?php if (isset($gender) && $gender=="male") echo "checked";?>
value="male">Male
<input type="radio" name="gender"
<?php if (isset($gender) && $gender=="Others") echo "checked";?>
value="Others">Others</td>
		</tr>	
		<tr>	
			<td>Blood Group:</td>
			<td>
            <select name="bg" required>
            	<option selected="selected">Select one</option>
            	<option value="a_negative">A-</option>
                <option value="a_positive">A+</option>
                <option value="b_negative">B-</option>
                <option value="b_positive">B+</option>
                <option value="o_negative">O-</option>
                <option value="o_positive">O+</option>
                <option value="ab_negative">AB-</option>
                <option value="ab_positive">AB+</option>
            </select>
            </td>
		</tr>
		<tr>	
			<td colspan="2"> <input type="submit" onclick="" value="Submit" class="button"> </td>
		</tr>
	</table>
</form>
<?php require_once('../CommonFiles/footer.php');?>