<?php
// Get the fuel consumption data from the form
$distance = $_POST['distance']; // Distance traveled in miles
$gallons = $_POST['gallons']; // Gallons of fuel consumed

// Calculate fuel efficiency (miles per gallon)
$fuelEfficiency = $distance / $gallons;

// Store the fuel efficiency data in a database
// Replace the database connection details with your own
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "fuel_efficiency_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Insert the fuel efficiency data into the database
$sql = "INSERT INTO fuel_efficiency (distance, gallons, efficiency) VALUES ('$distance', '$gallons', '$fuelEfficiency')";

if ($conn->query($sql) === TRUE) {
    echo "Fuel efficiency data recorded successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Fuel Efficiency Tracker</title>
</head>
<body>
    <h1>Fuel Efficiency Tracker</h1>
    <form action="fuel_efficiency.php" method="post">
        <label for="distance">Distance Traveled (miles):</label>
        <input type="number" name="distance" id="distance" required><br>
        <label for="gallons">Gallons of Fuel Consumed:</label>
        <input type="number" name="gallons" id="gallons" required><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>
