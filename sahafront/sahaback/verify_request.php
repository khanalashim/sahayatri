<?php
session_start();
$ok = $_SESSION['Admin_id'];
if ($ok === 0) {
    echo "";
} else {
    header('location: login.php');
}
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
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

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
                    <li id="active"><i class='bx bx-star'></i>Verify Users</li>
                </a>
                <a href="bookings.php">
                    <li><i class='bx bx-cart-add'></i>Bookings</li>
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

                <h1>Verify Users /</h1>
                <div class="vehicle_info">
                    <div class='vehicle_container'>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">User ID</th>
                                    <th scope="col">Front Face</th>
                                    <th scope="col">Back Face</th>
                                    <th scope="col">Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include "../db.php";


                                $query = "SELECT * FROM verification";
                                $result = $conn->query($query);

                                if ($result->num_rows > 0) {

                                    while ($row = $result->fetch_assoc()) {
                                        $id = $row['v_id'];
                                        $user_id = $row['user_id'];
                                        echo "<tr><th scope='row'>" . $id . "</th>";
                                        echo "<td>" . $row['user_id'] . "</td>";
                                        echo "<td><img height='65px' width='65px' src='" . $row['front_img'] . "'></td>";
                                        echo "<td><img height='65px' width='65px' src='" . $row['back_img'] . "'></td>";
                                        // echo "<td><img height='80px' width='68px' src='" . $row['destination'] . "'</td>";
                                        echo "<td><a href='view_request.php?user_id=$user_id'><button>View</button></a>";
                                        echo "<a href='remove_request.php'><button>Remove</button></a> </td></tr>";

                                    }

                                }

                                ?>
                            </tbody>
                        </table>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>



</body>

</html>
<!--"</td> <td>".$row['lastname']."</td> <td>".$row['email']."</td>"