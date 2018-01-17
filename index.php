<?php
//calling User class
require_once('includes/user.php');
//instancing User class
$user=new User(); 

//getting user input
$user_firstname=(isset($_POST['user_firstname'])) ? $_POST['user_firstname'] : '';
$user_lastname=(isset($_POST['user_lastname'])) ? $_POST['user_lastname'] : '';
$user_address=(isset($_POST['user_address'])) ? $_POST['user_address']:'';	 
$user_city=(isset($_POST['user_city'])) ? $_POST['user_city'] :'';
$user_country=(isset($_POST['user_country'])) ? $_POST['user_country'] :'';

//inserting user input via User class
$user->create($user_firstname,$user_lastname,$user_address,$user_city,$user_country);

//getting last inserted data from database
$lastRetrieve=$user->retrieve(); 
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Bem - user input</title>
	<style>
       #map {
        height: 400px;
        width: 100%;
       }
	   
    </style>
  </head>
  <body>
  <div style="float:left;">
	<form method="post" name="usrForm"  onsubmit="return validateForm()" action="">
	<p>
		<input type="text" id="user_firstname" placeholder="Enter first name" name="user_firstname"/>
	</p>	
	<p>
		<input type="text" id="user_lastname" placeholder="Enter last name"  name="user_lastname"/>
	</p>
	<p>	
		<input type="text" id="user_address" placeholder="Enter address"  name="user_address"/>
	</p>
	<p>	
		<input type="text" id="user_city" placeholder="Enter city name"  name="user_city"/>
	</p>
	<p>	
		<input type="text" id="user_country" placeholder="Enter country"  name="user_country"/>
	</p>
	<p>	
		<input type="submit" value="Send" />
	</p>	
	</form>
	</div>
	<div style="float:right;">
		<?php
		$user_address="";
		$user_city="";
		$user_country="";
		
		//listing data from database
			foreach($lastRetrieve as $last){
				extract($last);
				echo "<p>".$user_firstname."</p>";
				echo "<p>".$user_lastname."</p>";
				echo "<p>".$user_address."</p>";
				echo "<p>".$user_city."</p>";
				echo "<p>".$user_country."</p>";
			}
		//creating string 	
		$full_address=$user_address."".$user_city."".$user_country;
			 
			 
		@$coordinates = file_get_contents('http://maps.googleapis.com/maps/api/geocode/json?address='.urlencode($full_address). '&sensor=true');
	    $coordinates = json_decode($coordinates); 
		//getting longitude and latitude
	    $lat= @$coordinates->results[0]->geometry->location->lat; 
	    $lng= @$coordinates->results[0]->geometry->location->lng;
 
 
		?>
		
	</div>
  <div id="map"></div>
    <script>
	function initMap() {
		//inserting data from PHP and setting default value 
		  var lat=parseFloat("<?php echo $lat ?>") ? parseFloat("<?php echo $lat ?>") :44.806231;  
		  console.log(lat);
		//inserting data from PHP and setting default value   
		  var lng=parseFloat("<?php echo $lng ?>") ? parseFloat("<?php echo $lng ?>"):20.460079; 
		  console.log(lng);
        var center = {lat: lat, lng: lng};
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 14,
          center: center
        });
        var marker = new google.maps.Marker({
          position: center,
          map: map
        });
      }
	</script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCa9dYQ4MfLiAXhOHtXyNy0XEv1Nan4TYQ &callback=initMap">
    </script>
	<script src="assets/js/validation.js"></script>
  </body>
</html>