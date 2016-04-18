<?php
	$page_title='Blood Donor Search';
	$last_login='';
	$js_name='';
	$css_name='../CommonFiles/style.css';
	require_once('../CommonFiles/header.php');
	?>
    <fieldset style="width:60">
       	<legend>Search for Donors</legend>
   		<div class="insideFS">
	<form action="donor_search_submit.php" method="post">
	<table style="width=100%" align="center" cellpadding="10">
        <tr>
			<td> City: </td>
			<td> <input type="text" name="city"  size="20" placeholder="Calicut" required><br> </td>
		</tr>
        <tr>
			<td> Pincode:<br/>(optional) </td> 
			<td> <input type="text" name="pincode"  size="20" placeholder="673601" pattern="[0-9]{6}"><br> </td>
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
		<tr>	
			<td colspan="2"> <input type="submit" onclick="" value="Search" class="button"> </td>
		</tr>
	</table>
</form>
</div>
</fieldset>
            <h3 class="txtc"><a href="index.html">&raquo; Click here to go back</a><h3>
<?php require_once('../CommonFiles/footer.php');?>