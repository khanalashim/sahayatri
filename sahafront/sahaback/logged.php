<?php
session_start();
include "../db.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $email = $_POST["email"];
    $password = $_POST["password"];

    if ($email == "admin@gmail.com" and $password == "9821") {
        $_SESSION["Admin_id"] = 0;
        header("location: dashboard.php");
    } else {

        $query = "SELECT * FROM users WHERE email='$email' AND password='$password'";
        $result = $conn->query($query);

        while ($row = $result->fetch_assoc()) {
            $user_id = $row['id'];
            $firstname = $row['firstname'];
            $lastname = $row['lastname'];
            $user_verify = $row['user_verify'];
        }

        if ($result->num_rows > 0) {
            $_SESSION["User_firstname"] = $firstname;
            $_SESSION["User_lastname"] = $lastname;
            $_SESSION["User_email"] = $email;
            $_SESSION["User_id"] = $user_id;
            $_SESSION["User_verify"] = $user_verify;
            $_SESSION["loggedin"] = true;

            echo $_SESSION["User_firstname"], $_SESSION["User_lastname"], $_SESSION["User_email"];
            header('location: ../index.php');
        } else {
            echo "Error! User Doesnot exist";
        }
    }

}