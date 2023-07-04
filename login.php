<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "auth_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$query = "SELECT * FROM auth WHERE username = '$username' AND password = '$password'";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    // Valid login
    echo "Login successful!";
} else {
    // Invalid login
    echo "Invalid username or password.";
}

$conn->close();
?>