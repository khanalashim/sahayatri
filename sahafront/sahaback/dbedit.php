<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "mydb";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Process form data here
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $email = $_POST["email"];

    $id = $_GET['edit_id'];
    $query2 = "UPDATE users SET firstname='$firstname', lastname='$lastname',email='$email' WHERE id='$id'";
    $result1 = $conn->query($query2);
}
    include"index.php";

$conn->close();
?>
