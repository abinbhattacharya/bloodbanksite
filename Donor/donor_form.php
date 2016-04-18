<?php $page_title='Blood Donor Registration form';
$last_login='';
$js_name='';
$css_name='../CommonFiles/style.css';
require_once('../CommonFiles/header.php');
?>
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script> 
<script type="text/javascript"> 
  var geocoder;
  var add;
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(successFunction, errorFunction);
} 
//Get the latitude and the longitude;
function successFunction(position) {
    var lat = position.coords.latitude;
    var lng = position.coords.longitude;
    codeLatLng(lat, lng)
}

function errorFunction(){
    alert("Could not retrieve your location. Check your internet connection.");
}

  function initialize() {
    geocoder = new google.maps.Geocoder();



  }

  function codeLatLng(lat, lng) {

    var latlng = new google.maps.LatLng(lat, lng);
    geocoder.geocode({'latLng': latlng}, function(results, status) {
      if (status == google.maps.GeocoderStatus.OK) {
      console.log(results)
        if (results[1]) {
         //formatted address
        // alert(results[0].formatted_address)
        //find country name
             for (var i=0; i<results[0].address_components.length; i++) {
            for (var b=0;b<results[0].address_components[i].types.length;b++) {

            //there are different types that might hold a city admin_area_lvl_1 usually does in come cases looking for sublocality type will be more appropriate
                if (results[0].address_components[i].types[b] == "administrative_area_level_1") {
                    //this is the object you are looking for
                    city= results[0].address_components[i];
                    break;
                }
            }
        }
        //city data
        //alert(city.short_name + " " + city.long_name)
        //add=add.concat(city.short_name,city.long_name)
       document.getElementById("add").value = results[0].formatted_address +" " + city.short_name + " " + city.long_name ;

        } else {
          alert("No results found");
        }
      } else {
        alert("Geocoder failed due to: " + status);
      }
    });
  }
</script> 
<body onLoad="initialize()">
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
            <textarea rows="5" cols="20" name="addr" id="add" value="" required></textarea>
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
			<td> <input type="radio" name="gender" value="Female" required>Female
					<input type="radio" name="gender" value="Male" required>Male
                    <input type="radio" name="gender" value="Others" required>Others
            </td>
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
            </td>
		</tr>
		<tr>	
			<td colspan="2"> <input type="submit" onClick="" value="Submit" class="button"> </td>
		</tr>
	</table>
</form>
<h3 class="txtc"><a href="index.html">&raquo; Click here to go back</a><h3>
<?php require_once('../CommonFiles/footer.php');?> 