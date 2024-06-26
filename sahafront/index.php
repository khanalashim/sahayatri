<?php
session_start();
// $_SESSION = array();
// session_destroy();

include "db.php";

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
    <style>
        .bxs-star {
            color: #d1b56a;

        }
    </style>
</head>

<body>
    <div class="container">
        <div class="sidebar">
            <h1>Sahayatri
            </h1>
            <ul>
                <a href="index.php">
                    <li id="active"><i class='bx bx-home'></i>Home</li>
                </a>
                <a href="track_bookings.php">
                    <li><i class='bx bx-task'></i>Track Bookings</li>
                </a>
                <a href="booking_history.php">
                    <li><i class='bx bx-list-plus'></i>Booking History</li>
                </a>
                <a href="services.php">
                    <li><i class='bx bxs-package'></i>Verification</li>
                </a>
                <a href="<?php if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
                    echo "profile.php";
                } else {
                    echo "sahaback/login.php";
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
            <div class="seller">
                <h1><i class='bx bx-money-withdraw'></i>Become a seller</h1>
                <a href="../seller/registration.php">
                    <p>Regsiter<i class='bx bx-right-arrow-alt'></i></p>
                </a>
            </div>
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
                    <?php
                    $query = "SELECT * FROM vehicles";
                    $result = $conn->query($query);
                    $avgrat = 0;

                    if ($result->num_rows > 0) {

                        while ($row = $result->fetch_assoc()) {
                            $veh_id = $row['id'];
                            echo "<div class='vehicle_container'>";
                            echo "<img height='200px' width='160px' src='sahaback/" . $row['img'] . "' alt=''>";
                            echo "<p>" . $row['vehiclename'] . "- " . $row['model'] . "</p>";
                            echo "<p id='para_bold'>";
                            $ratings = 0;
                            $count = 0;

                            $sql_check = "SELECT * FROM comment WHERE veh_id='$veh_id'";
                            $result_check = $conn->query($sql_check);
                            if ($result_check->num_rows > 0) {
                                while ($row4 = $result_check->fetch_assoc()) {
                                    $ratings = $ratings + $row4['rating'];
                                    $count = $count + 1;
                                }
                            }
                            $avgrat = $count > 0 ? $ratings / $count : 0;
                            echo "</i>Rating ⭐ " . $avgrat . "</p>";
                            echo "<p id='para_bold'>" . $row['price'] . "</p>";
                            echo "<a id='reserve_redirect' href='reserve.php?vehicle=$veh_id'><button id='reserve_btn'> More Details</button></a>";
                            echo "</div>";
                        }
                    } ?>

                </div>
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