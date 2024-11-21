<?php
$db_server = "localhost:3306";
$db_user = "root";
$db_password = "";
$db_name = "sampledb";

// Attempt to connect
$conn = mysqli_connect($db_server, $db_user, $db_password, $db_name);

if (!$conn) {
    // Display connection error if failed
    echo "Could not Connect: " . mysqli_connect_error() . "<br>";
} else {
    echo "You are Connected <br>";
}
?>
