<?php
// session_start();
// $ok = $_SESSION['User_id'];
// if ($ok === 0) {
//   echo "Welcome ,Admin";
// } else {
//   header('location: login.php');
// }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/dashboard.css">
    <link rel="stylesheet" href="style/users.css">
    <link rel="stylesheet" href="style/vehicle.css">
    <link rel="stylesheet" href="style/bookings.css">
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script> -->

</head>

<body>
    <div class="container">
        <div class="sidebar">
            <h1>Sahayatri
            </h1>
            <ul>
                <a href="dashboard.php">
                    <li><i class='bx bx-home'></i>Dashboard</li>
                </a>
                <a href="users.php">
                    <li><i class='bx bx-task'></i>Users</li>
                </a>
                <a href="vehicle.php">
                    <li><i class='bx bx-list-plus'></i>Vehicles</li>
                </a>
                <a href="verify_request.php">
                    <li><i class='bx bx-star'></i>Verify Users</li>
                </a>
                <a href="bookings.php">
                    <li id="active"><i class='bx bx-cart-add'></i>Bookings</li>
                </a>
                <a href="booked_vehicles.php">
                    <li><i class='bx bx-store-alt'></i>Booked</li>
                </a>
                <a href="sellers.php">
                    <li><i class='bx bxs-badge-dollar'></i>Sellers</li>
                </a>
                <a href="verify_seller.php">
                    <li><i class='bx bx-star'></i>Verify Seller</li>
                </a>
            </ul>
            <!-- <div class="seller">
                <h1><i class='bx bx-money-withdraw'></i>Become a Buyer</h1>
                <a href="../sahafront/sahaback/new.php">
                    <p>Regsiter<i class='bx bx-right-arrow-alt'></i></p>
                </a>
            </div> -->
        </div>

        <div class="main">

            <div class="vehicle">
                <div class="nav_search">
                    <!-- <div class="search">
                        <input id="search" type="text" placeholder="Search...">
                        <a href="#">
                            <div class="search_icon">
                                <box-icon name='search'></box-icon>

                            </div>
                        </a>
                    </div> -->



                    <p>Welcome, Admin</p>
                    <div class="profile_image">
                        <img height="40px" width="40px" src="../profile.jpg" alt="img">
                    </div>
                </div>

                <h1>Bookings / Edit /</h1>
                <div class="vehicle_info">


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
                    ?>


                    <?php
                    $edit_id = $_GET['edit_id'];

                    ?>
                    <div class='vehicle_container'>
                        <table class='table'>
                            <thead>
                                <tr>
                                    <td scope="col">S.N</td>
                                    <td scope="col">Vehicle</td>
                                    <td scope="col">Name</td>
                                    <td scope="col">From</td>
                                    <td scope="col">To</td>
                                    <td scope="col">Action</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = "SELECT * FROM bookings WHERE id=$edit_id";
                                $result = $conn->query($query);

                                if ($result->num_rows > 0) {

                                    while ($row = $result->fetch_assoc()) {
                                        $id = $row['id'];
                                        if ($row['status'] == 'f') {
                                            continue;
                                        } else {
                                            echo "<form action='booking_edit_process.php?edit_id=" . $id . "' method='post'>";
                                            echo "<tr>";
                                            echo "<td>" . $row['id'] . "</td>";
                                            echo "<td> <img height='89px' width='120px' src='" . $row['vehicleimg'] . "'></td>";
                                            echo "<td>" . $row['vehiclename'] . "</td>";
                                            echo "<td><input type='date' name='fromdate' value='" . $row['fromdate'] . "'></td>";
                                            echo "<td><input type='date' name='todate' value='" . $row['todate'] . "'></td>";

                                            echo "<td id='action'><button type='submit'>Submit</button>";
                                            echo "</tr></form>";
                                        }

                                    }
                                } ?>
                            </tbody>

                        </table>
                    </div>
                    </a>
                </div>
            </div>
        </div>
    </div>

</body>

</html>