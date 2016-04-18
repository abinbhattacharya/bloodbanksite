<?php $page_title='Blood Donor De-Activation form';
$last_login='';
$js_name='';
$css_name='../CommonFiles/style.css';
require_once('../CommonFiles/header.php');
?>
<h1 class="error" >"Your Blood Can Save Lives!!! Please Don't Deactivate...Your Blood is Precious" </h1>
<h2 class="txtc">All fields are mandatory.</h2>

<form action="donor_deletion_final.php" method="post">
	<table style="width=100%" align="center" cellpadding="10">
		<tr>
			<td> Name: </td>
			<td> <input type="text" name="name" size="20" placeholder="Yash Mograi" required>
            <input type="hidden" name="delete_code" value="delete"/><br> </td>
		</tr>
		<tr>	
			<td> E-mail:</td> 
			<td><input type="email" name="email" placeholder="xyz@gmail.com" required size="20"><br> </td>
		</tr>
    <tr>	
			<td>Blood Group:</td>
			<td>
            <select name="bg" required>
            	<option selected="selected" value="">Select one</option>
            	<option value="a_negative">A-</option>
                <option value="a_positive">A+</option>
                <option value="b_negative">B-</option>
                <option value="b_positive">B+</option>
                <option value="o_negative">O-</option>
                <option value="o_positive">O+</option>
                <option value="ab_negative">AB-</option>
                <option value="ab_positive">AB+</option>
            </select>
            <input type="hidden" value="search" name="search"/>
            </td>
		</tr>
        <tr><td>Code:</td>
        	<td><input type="text" name="code" size="20" placeholder="0123456789" required pattern="[0-9]+{10}">
        </tr>
        <tr>
        <td colspan="3">
        <input type="submit" name="Submit" class="button">
        </td>
    </tr>
	</table>
</form>
<h3 class="txtc"><a href="index.html">&raquo; Click here to go back</a><h3>
<?php require_once('../CommonFiles/footer.php');?>