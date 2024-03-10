<?php
include 'db.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/track_bookings.css">
    <link rel="stylesheet" href="style/booking_history.css">

</head>

<body>
    <div class="container">
        <div class="sidebar">
            <h1>Sahayatri</h1>
            <ul>
                <a href="index.php">
                    <li><i class='bx bx-home'></i>Home</li>
                </a>
                <a href="track_bookings.php">
                    <li><i class='bx bx-task'></i>Track Bookings</li>
                </a>
                <a href="booking_history.php">
                    <li id="active"><i class='bx bx-list-plus'></i>Booking History</li>
                </a>
                <a href="services.php">
                    <li><i class='bx bxs-package'></i>Verification</li>
                </a>
                <a href="<?php if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
                    echo "profile.php";
                    $user_available = true;
                } else {
                    echo "sahaback/login.php";
                    $user_available = false;
                } ?>">
                    <li><i class='bx bx-log-in'></i>
                        <?php if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
                            echo "Profile";
                        } else {
                            echo "Login";
                        } ?>
                    </li>
                </a>
            </ul>
        </div>

        <div class="main">
            <div class="vehicle">
                <div class="nav_search">
                    <div class="search">
                        <input id="search" type="text" placeholder="Search...">
                        <a href="#">
                            <div class="search_icon">
                                <box-icon name='search'></box-icon>

                            </div>
                        </a>
                    </div>



                    <p>Welcome,
                        <?php if (isset($_SESSION["User_firstname"])) {
                            // User is logged in, so echo the first name
                            echo $_SESSION["User_firstname"];
                        } else {
                            // User is not logged in
                            echo "User";
                        } ?>
                    </p>
                    <div class="profile_image">
                        <img height="40px" width="40px" src="profile.jpg" alt="">

                    </div>
                </div>

                <h1>Home /</h1>
                <div class="vehicle_info">
                    <table class='table'>
                        <thead class='table-light'>
                            <tr>
                                <td>S.N</td>
                                <td>Vehicle</td>
                                <td>Name</td>
                                <td>From</td>
                                <td>To</td>
                                <td>Status</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $user_id = 0;
                            if (isset($_SESSION["User_id"])) {
                                $user_id = $_SESSION["User_id"];
                            } else {
                                echo "Login/Register First";
                            }
                            $query = "SELECT * FROM bookings WHERE user_id='$user_id'";
                            $result = $conn->query($query);

                            if ($result->num_rows > 0) {

                                while ($row = $result->fetch_assoc()) {
                                    $id = $row['id'];
                                    echo "<tr>";
                                    echo "<td>" . $row['id'] . "</td>";
                                    echo "<td> <img height='89px' width='120px' src='sahaback/" . $row['vehicleimg'] . "'></td>";
                                    echo "<td>" . $row['vehiclename'] . "</td>";
                                    echo "<td>" . $row['fromdate'] . "</td>";
                                    echo "<td>" . $row['todate'] . "</td>";
                                    if ($row['status'] == 'c') {
                                        echo "<td id='action_c'>Completed</td>";
                                    } elseif ($row['status'] == 'p') {
                                        echo "<td id='action_p'>Pending</td>";
                                    } elseif ($row['status'] == 'f') {
                                        echo "<td id='action_f'>Failed</td>";
                                    }

                                    echo "</tr>";

                                }
                            } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <script>
            var profile = document.querySelector('.profile_image');

            profile.addEventListener('click', function () {
                window.location.href = 'logout.php';
            });
        </script>
</body>

</html>