<?php
$username = $_POST['username'];
$password = $_POST['password'];
$error_message = "";

$con = new mysqli("localhost", "root", "", "auth_db");
if ($con->connect_error) {
    die('Connection failed: ' . $con->connect_error);
} else {
    $stmt = $con->prepare("SELECT * FROM auth WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt_result = $stmt->get_result();
    if ($stmt_result->num_rows > 0) {
        $data = $stmt_result->fetch_assoc();
        if ($data['password'] == $password) {
            if ($username == "admin") {
                header("Location: admin.php");
                exit();
            } else {
                header("Location: order.html");
                exit();
            }
        } else {
            $error_message="Invalid Username or Password";
        }
    } else {
        $error_message="Invalid Username or Password";
    }
}
include('index.html');
?>