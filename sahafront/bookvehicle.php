<?php
include "db.php";
session_start();
$fromdate = $_POST['fromdate'];
$todate = $_POST['todate'];
$name = $_POST['Name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$veh_id = $_GET['veh_id'];
$seller_id = $_GET['seller_id'];

$query1 = "SELECT * FROM vehicles WHERE id=$veh_id";
$result1 = $conn->query($query1);

while ($row = $result1->fetch_assoc()) {
    $vehicleimg = $row['img'];
    $vehiclename = $row['vehiclename'];
    $vehicleid = $row['vehicleid'];
    $vehiclemodel = $row['model'];
    $vehicleprice = $row['price'];
    $user_id = $_SESSION["User_id"];
    $status = 'p';

}

$query = "INSERT INTO bookings(user_id,seller_id,status,fromdate,todate,name,email,phone,vehicleid,vehicleimg,vehiclename,vehiclemodel,vehicleprice) VALUES ('$user_id','$seller_id','$status','$fromdate','$todate','$name','$email','$phone','$vehicleid','$vehicleimg','$vehiclename','$vehiclemodel','$vehicleprice')";
$result = $conn->query($query);

$query1 = "UPDATE vehicles SET booked='true', fromdate='$fromdate', todate='$todate', user_id='$user_id' WHERE id='$veh_id'";
$result1 = $conn->query($query1);



if ($result === TRUE) {
    header('location: index.php');
    echo "Record inserted successfully";
} else {
    echo "Error: " . $query . "<br>" . $conn->error;
}
if ($result1 === TRUE) {
    header('location: index.php');
    echo "Record inserted successfully";
} else {
    echo "Error: " . $query1 . "<br>" . $conn->error;
}