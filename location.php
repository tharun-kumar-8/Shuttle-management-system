<?php session_start();
$home = $_SESSION["home"];
?>
<html lang="en">

<head>
 <title>Shuttle: Location</title>
 <link rel="stylesheet" href="./css/style3.css?v=<?php echo time(); ?>">
</head>

<body>
 <div class="nav">
  <strong>Shuttle</strong>
  <a style="margin-left: 60%" href=<?php echo $home ?>><button class="button1" type="submit">Home</button></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <a href="./about.php"><button class="button1" type="submit">About</button></a>
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  &nbsp;
  <a href="./feedback.php"><button class="button1" type="submit">Feedback</button></a>
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  &nbsp;
  <a href="./login.php"><button class="button1" type="submit">Logout</button></a>
 </div>
 <div class="parent">
  <div class="container1">
   <div class="border1">
    <p>Your information</p>
   </div>
   <img src="./image/profile2.webp" alt="">
   <p>Name: <?php echo $_SESSION["name"] ?></p>
   <p>Email: <?php echo $_SESSION["email"] ?></p>
   <p>Type: <?php echo $_SESSION["type"] ?></p>
   <p>Account Balance: <?php echo $_SESSION["amount"] ?></p>
   <a href="./call.php">
    <button class="call">
     Call Shuttle
    </button>
   </a>
  </div>

  <div class="container2">
  <div class="border2">
    <p>Shuttle Tracking</p>
  </div>
  <div class="location">
    <img id="map" src="./image/gps.jpg" alt="">
  </div>
</div>

<!-- Include the JavaScript library for the GPS API -->
<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap" async defer></script>

<script>
  // Function to initialize the map
  function initMap() {
    // Create a map object with options
    var map = new google.maps.Map(document.getElementById('map'), {
      center: {lat: 0, lng: 0}, // Set the initial center of the map
      zoom: 15 // Set the initial zoom level of the map
    });

    // Function to update the shuttle location on the map
    function updateShuttleLocation(latitude, longitude) {
      var shuttleLocation = {lat: latitude, lng: longitude}; // Create a LatLng object with the shuttle's coordinates
      var shuttleMarker = new google.maps.Marker({
        position: shuttleLocation, // Set the marker's position to the shuttle's coordinates
        map: map // Set the marker's map to the initialized map object
      });
      map.setCenter(shuttleLocation); // Set the map's center to the shuttle's coordinates
    }

    // Call the updateShuttleLocation function with the real-time GPS coordinates
    // You would need to replace this with the actual logic to get the real-time GPS coordinates
    var latitude = ...; // Get the real-time latitude
    var longitude = ...; // Get the real-time longitude
    updateShuttleLocation(latitude, longitude); // Call the function with the real-time coordinates
  }
</script>

 </div>
</body>

</html>